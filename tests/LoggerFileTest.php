<?php

namespace Weather\Tests;

use Weather\Logger\File;
use Weather\WeatherLogger;
use PHPUnit\Framework\TestCase;

class LoggerFileTest extends TestCase
{
    public function testGetWaether()
    {
        $logger = new File('/tmp/log/');
        WeatherLogger::setLogger($logger);
        $logger->log('hello world');
        WeatherLogger::log('Error');
    }
}