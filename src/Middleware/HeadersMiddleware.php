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
namespace Tianmiao\HttpClient\Middleware;

use Buzz\Middleware\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HeadersMiddleware implements MiddlewareInterface
{
    private $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public function handleRequest(RequestInterface $request, callable $next)
    {
        foreach ($this->headers as $name => $header) {
            $request = $request->withHeader($name, $header);
        }
        return $next($request);
    }

    public function handleResponse(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return $next($request, $response);
    }
}
