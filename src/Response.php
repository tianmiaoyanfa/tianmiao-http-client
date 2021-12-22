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

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class Response.
 *
 * @method int getStatusCode()
 * @method ResponseInterface withStatus($code, $reasonPhrase = '')
 * @method string getReasonPhrase()
 * @method string getProtocolVersion()
 * @method MessageInterface withProtocolVersion($version)
 * @method array getHeaders()
 * @method bool hasHeader($name)
 * @method array getHeader($name)
 * @method string getHeaderLine($name)
 * @method MessageInterface withHeader($name, $value)
 * @method MessageInterface withAddedHeader($name, $value)
 * @method MessageInterface withoutHeader($name)
 * @method StreamInterface getBody()
 * @method MessageInterface withBody(StreamInterface $body)
 */
class Response
{
    private $xmlParser;

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->xmlParser = new XmlParser();
        $this->response = $response;
    }

    public function __call($name, $arguments)
    {
        return $this->response->{$name}(...$arguments);
    }

    public function toArray($fields = []): array
    {
        $body = (string) $this->response->getBody();
        if ($this->isJson($body)) {
            $result = json_decode($body, true);
        } elseif ($this->isXml($body)) {
            $result = $this->xmlParser->parse($body);
        } else {
            $result = ['parse_error' => $body];
        }
        return $result;
    }

    protected function isJson($body): bool
    {
        json_decode($body);

        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function isXml($body): bool
    {
        $previousValue = libxml_use_internal_errors(true);
        $isXml = simplexml_load_string($body);
        libxml_use_internal_errors($previousValue);

        return $isXml !== false;
    }
}
