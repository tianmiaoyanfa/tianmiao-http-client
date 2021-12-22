<?php

declare(strict_types=1);
/**
 * This file is part of Tianmiao.
 *
 * @link     https://leonsw.com
 * @document https://docs.leonsw.com
 * @contact  leonsw.com@gmail.com
 * @license  https://leonsw.com/LICENSE
 */
namespace Tianmiao\HttpClient;

use Buzz\Client\Curl;
use Buzz\Client\FileGetContents;
use Buzz\Middleware\MiddlewareInterface;
use Tianmiao\HttpClient\Client\Swoole;
use Tianmiao\HttpClient\Middleware\BaseUrlMiddleware;
use Tianmiao\HttpClient\Middleware\ContentTypeMiddleware;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

class Browser
{
    protected $baseUrl;

    private $browser;

    public function __construct(array $options = [], string $class = Swoole::class)
    {
        if (isset($options['baseUrl'])) {
            $this->baseUrl = rtrim($options['baseUrl'], '/');
            unset($options['baseUrl']);
        }
//        $client = new Curl(new Psr17Factory(), $options);
        //$client = new FileGetContents(new Psr17Factory(), $options);
        $client = new $class(new Psr17Factory(), $options);
        $this->browser = new \Buzz\Browser($client, new Psr17Factory());
//        if (isset($config['baseUrl'])) {
//            $this->addMiddleware(new BaseUrlMiddleware($config['baseUrl']));
//        }
        // 是否检测类型
        // $this->addMiddleware(new ContentTypeMiddleware());
    }

    public function get($url, array $query = [], array $headers = []): Response
    {
        $url = is_array($url) ? $url : [$url];
        $response = $this->browser->get($this->buildUrl(array_merge($url, $query)), $headers);
        return $this->getNewReponse($response);
    }

    public function post($url, $body = '', array $headers = []): Response
    {
        $response = $this->browser->post($this->buildUrl($url), $headers, $this->buildBody($body));
        return $this->getNewReponse($response);
    }

    public function patch($url, $body = '', array $headers = []): Response
    {
        $response = $this->browser->patch($this->buildUrl($url), $headers, $this->buildBody($body));
        return $this->getNewReponse($response);
    }

    public function put($url, $body = '', array $headers = []): Response
    {
        $response = $this->browser->put($this->buildUrl($url), $headers, $this->buildBody($body));
        return $this->getNewReponse($response);
    }

    public function delete($url, $body = '', array $headers = []): Response
    {
        $response = $this->browser->delete($this->buildUrl($url), $headers, $this->buildBody($body));
        return $this->getNewReponse($response);
    }

    public function submit($url, array $fields, array $headers = [], string $method = 'POST'): Response
    {
        $response = $this->browser->submitForm($this->buildUrl($url), $fields, $method, $headers);
        return $this->getNewReponse($response);
    }

    public function head($url, array $headers = []): Response
    {
        $response = $this->browser->head($this->buildUrl($url), $headers);
        return $this->getNewReponse($response);
    }

    public function options($url, array $headers = []): Response
    {
        $response = $this->browser->request('OPTIONS', $this->buildUrl($url), $headers);
        return $this->getNewReponse($response);
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function addMiddleware(MiddlewareInterface $middleware): void
    {
        $this->browser->addMiddleware($middleware);
    }

    public function config(array $config = [])
    {
        if ($this->baseUrl) {
            $config['baseUrl'] = $config['baseUrl'] ?? $this->baseUrl;
        }
        return new static($config);
    }

    public function buildUrl($url)
    {
        $params = (array) $url;
        $anchor = isset($params['#']) ? '#' . $params['#'] : '';
        unset($params['#']);
        $url = $params[0];
        unset($params[0]);
        if (! preg_match('/^(http|https):\/\/[^\/]+/i', $url)) {
            $url = $this->baseUrl . $url;
        }
        if (! empty($params) && ($query = http_build_query($params)) !== '') {
            $url .= '?' . $query;
        }
        return $url . $anchor;
    }

    public function buildBody($body)
    {
        return is_array($body) ? http_build_query($body) : (string) $body;
    }

    protected function getNewReponse(ResponseInterface $response): Response
    {
        return new Response($response);
    }
}
