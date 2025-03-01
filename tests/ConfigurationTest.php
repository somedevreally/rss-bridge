<?php

declare(strict_types=1);

namespace RssBridge\Tests;

use Configuration;
use PHPUnit\Framework\TestCase;

final class ConfigurationTest extends TestCase
{
    public function test()
    {
        putenv('RSSBRIDGE_system_timezone=Europe/Berlin');
        Configuration::loadConfiguration();

        // test nonsense
        $this->assertSame(null, Configuration::getConfig('foobar', ''));
        $this->assertSame(null, Configuration::getConfig('foo', 'bar'));
        $this->assertSame(null, Configuration::getConfig('cache', ''));

        // test value from env
        $this->assertSame('Europe/Berlin', Configuration::getConfig('system', 'timezone'));
    }
}
