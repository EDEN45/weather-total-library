<?php

namespace Weather;

use Weather\Logger\LoggerInterface;

class WeatherLogger
{
    private static $logger;

    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }

    public static function log($message)
    {
        self::$logger->log($message);
    }
}