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

use Tianmiao\HttpClient\Client\Swoole;

class ClientFactory
{
    /**
     * @return Browser
     */
    public function create(array $options = [], string $class = Swoole::class)
    {
        return new Browser($options, $class);
    }
}
