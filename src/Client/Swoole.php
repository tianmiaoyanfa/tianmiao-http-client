<?php

declare(strict_types=1);
/**
 * This file is part of Leonsw.
 *
 * @link     https://leonsw.com
 * @document https://docs.leonsw.com
 * @contact  leonsw.com@gmail.com
 * @license  https://leonsw.com/LICENSE
 */
namespace Leonsw\HttpClient\Client;

use Buzz\Client\AbstractClient;
use Buzz\Client\BuzzClientInterface;
use Buzz\Configuration\ParameterBag;
use Buzz\Exception\CallbackException;
use Buzz\Exception\NetworkException;
use Buzz\Exception\RequestException;
use Buzz\Message\ResponseBuilder;
use Nyholm\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Swoole\Coroutine\Http\Client;

class Swoole extends AbstractClient implements BuzzClientInterface
{
    protected $redirect = 0;

    public function sendRequest(RequestInterface $request, array $options = []): ResponseInterface
    {
        $options = $this->validateOptions($options);

        $uri = $request->getUri();
        $host = $uri->getHost();
        $ssl = $uri->getScheme() === 'https';
        if ($ssl) {
            $port = $uri->getPort() ?: 443;
        } else {
            $port = $uri->getPort() ?: 80;
        }

        $http = new Client($host, $port, $ssl);
        $responseBuilder = $this->prepare($http, $request, $options);

        // Header
        $headers = ['content-type' => 'application/json', 'accept' => 'application/json'];
        foreach ($request->getHeaders() as $name => $value) {
            $headers[strtolower($name)] = $request->getHeaderLine($name);
        }
        $http->setHeaders($headers);

        $query = $uri->getQuery();
        $path = $uri->getPath() ?: '/';
        $path = empty($query) ? $path : $path . '?' . $query;

        $method = strtoupper($request->getMethod());
        $http->setMethod($method);

        $body = $request->getBody();
        $bodySize = $body->getSize();
        if ($bodySize !== 0) {
            $http->setData($body);
        }
        $http->execute($path);

        // timeout
        $this->parseError($request, $http->statusCode);

        $responseBuilder->writeBody($http->body);

        $response = $responseBuilder->getResponse();

        foreach ($http->headers as $key => $value) {
            if ($key === 'set-cookie') {
                // ?????????????????? set-cookie, swoole header ????????????????????????????????? set_cookie_headers ???????????? set-cookie
                $response = $response->withHeader('set-cookie', $http->set_cookie_headers);
            } else {
                $response = $response->withHeader($key, $value);
            }
        }
        $response = $response->withStatus($http->statusCode);

        if ($options->get('allow_redirects') && $response->getHeader('Location')) {
            $responseHeaders = $response->getHeaders();
            $uri = new Uri($response->getHeaderLine('Location'));

            if ($response->hasHeader('set-cookie')) {
                $request = $request->withAddedHeader('cookie', $response->getHeaderLine('set-cookie'));
            }
            $response = $this->sendRequest($request->withUri($uri), $options->all());
            $responseHeaders = array_merge_recursive($responseHeaders, $response->getHeaders());
            foreach ($responseHeaders as $key => $value) {
                $response = $response->withHeader($key, $value);
            }
            ++$this->redirect;
            if ($this->redirect > $options->get('max_redirects')) {
                $this->redirect = 0;
                throw new RequestException($request, 'Maximum (' . $options->get('max_redirects') . ') redirects followed');
            }
        } else {
            $this->redirect = 0;
        }

        return $response;
    }

    /**
     * Prepares a cURL resource to send a request.
     *
     * @param resource $curl
     * @param mixed $http
     */
    protected function prepare(Client $http, RequestInterface $request, ParameterBag $options): ResponseBuilder
    {
        $timeout = $options->get('timeout') > 0 ? $options->get('timeout') : -1;

        $http->set(['timeout' => $timeout]);
        $http->set(['keep_alive' => false]);

        $verify = $options->get('verify');
        if ($verify) {
            $http->set([
                'ssl_verify_peer' => $verify,
                'ssl_host_name' => $http->host,
            ]);
        }

        $proxy = $options->get('proxy');
        if ($proxy) {
            [$host, $port] = explode(':', $proxy);
            $http->set([
                'http_proxy_host' => $host,
                'http_proxy_port' => $port,
            ]);
        }

        return new ResponseBuilder($this->responseFactory);
    }

    /**
     * @param resource $curl
     *
     * @throws NetworkException
     * @throws RequestException
     * @throws CallbackException
     */
    protected function parseError(RequestInterface $request, int $errno): void
    {
        switch ($errno) {
            case SWOOLE_HTTP_CLIENT_ESTATUS_CONNECT_FAILED:
                throw new NetworkException($request, '????????????????????????????????????????????????????????????????????? $errCode ??????????????????????????????', $errno);
            case SWOOLE_HTTP_CLIENT_ESTATUS_REQUEST_TIMEOUT:
                throw new NetworkException($request, '??????????????????????????????????????? timeout ??????????????? response', $errno);
            case SWOOLE_HTTP_CLIENT_ESTATUS_SERVER_RESET:
                throw new NetworkException($request, '??????????????????????????????????????????????????????', $errno);
        }
    }

    private function filterHeaders(array $headers): array
    {
        $filtered = [];
        foreach ($headers as $header) {
            if (stripos($header, 'http/') === 0) {
                $filtered = [];
            }

            $filtered[] = $header;
        }

        return $filtered;
    }
}
