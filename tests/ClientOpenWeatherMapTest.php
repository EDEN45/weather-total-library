<?php

namespace Weather\Tests;

use Weather\Client\ClientAbstract;
use Weather\Client\ClientFactory;
use PHPUnit\Framework\TestCase;

class ClientOpenWeatherMapTest extends TestCase
{
    public function testParseWeather()
    {
        $key = '91a9d...352dc';
        $lat = '53.346785';
        $lon = '83.776856';
        $name = ClientAbstract::CLIENT_OPEN_WEATHER_MAP;

        $client = ClientFactory::create($name, $key);
        $client->parseWeather($lat, $lon);
        
        $this->assertNotEmpty($client->parseWeather($lat, $lon));
        print("\nWeather: " . $client->parseWeather($lat, $lon));
    }
}