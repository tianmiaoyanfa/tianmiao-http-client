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
namespace Leonsw\HttpClient\Middleware;

use Buzz\Middleware\MiddlewareInterface;
use Leonsw\HttpClient\Device;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class UserAgentMiddleware implements MiddlewareInterface
{
    public $userAgent;

    public function handleRequest(RequestInterface $request, callable $next)
    {
        if (! $request->hasHeader('User-Agent')) {
            $request = $request->withHeader('User-Agent', $this->userAgent ?: Device::getRandomUserAgent());
        }
        return $next($request);
    }

    public function handleResponse(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return $next($request, $response);
    }
}
