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

use Buzz\Middleware\cookie\Cookie;

class CookieMiddleware extends \Buzz\Middleware\CookieMiddleware
{
    public function loadJson($json = ''): void
    {
        $cookies = json_decode($json, true);
        foreach ($cookies as $data) {
            $cookie = new Cookie();
            $cookie->setName($data['name']);
            $cookie->setValue($data['value']);
            unset($data['name'], $data['value']);
            $cookie->setAttributes($data);
            $this->addCookie($cookie);
        }
    }

    public function toJson(): string
    {
        $cookies = [];
        foreach ($this->getCookies() as $cookie) {
            $cookies[] = array_filter([
                'name' => $cookie->getName(),
                'value' => $cookie->getValue(),
                'domain' => $cookie->getAttribute('domain'),
                'path' => $cookie->getAttribute('path'),
                'expires' => $cookie->getAttribute('expires'),
                'max-age' => $cookie->getAttribute('max-age'),
                'size' => $cookie->getAttribute('size'),
                'httpOnly' => $cookie->getAttribute('httpOnly'),
                'secure' => $cookie->getAttribute('secure'),
                'session' => $cookie->getAttribute('session'),
            ]);
        }
        return json_encode($cookies);
    }
}
