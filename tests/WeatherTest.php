<?php

namespace Weather\Tests;

use Weather\WeatherProvider;
use Weather\WeatherLogger;
use Weather\Logger\File;
use Weather\Client\ClientAbstract;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetWaether()
    {
        $keyOpenWeather = '91a...dc';
        $keyYandex = '5e...cc';
        $lat = '53.346785';
        $lon = '83.776856';

        $logger = new File('/tmp/log/');
        WeatherLogger::setLogger($logger);

        $client = new WeatherProvider(ClientAbstract::CLIENT_OPEN_WEATHER_MAP, $keyOpenWeather);
        print("\nWeather: " . $client->getWeather($lat, $lon));

        $client->setClient(ClientAbstract::CLIENT_YANDEX, $keyYandex);
        print("\nWeather: " . $client->getWeather($lat, $lon));
        $this->assertNotEmpty($client->getWeather($lat, $lon));
    }
}