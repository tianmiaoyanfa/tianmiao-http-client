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
use Nyholm\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BaseUrlMiddleware implements MiddlewareInterface
{
    private $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function handleRequest(RequestInterface $request, callable $next)
    {
        $this->setUrl($request);
        return $next($request);
    }

    public function handleResponse(RequestInterface $request, ResponseInterface $response, callable $next)
    {
        return $next($request, $response);
    }

    protected function setUrl(RequestInterface $request): void
    {
        $currentUrl = $request->getUri()->__toString();
        if (! preg_match('/^(http|https):\/\/[^\/]+/i', $currentUrl)) {
            $uri = new Uri($this->baseUrl . $currentUrl);
            $request = $request->withUri($uri);
        }
    }
}
