<?php

namespace Weather\Tests;

use Weather\Location\Geocode;
use Weather\Location\Coordinates;
use PHPUnit\Framework\TestCase;

class GeocodeTest extends TestCase
{
    public function testRequest()
    {
        $key = '342...e4';
        $uri = 'https://geocode-maps.yandex.ru/1.x/';
        $location = 'Barnaul';
        $geocode = new Geocode();

        $geocode->setApi($key);
        $geocode->setUri($uri);

        $body = $geocode->request($location);
        $this->assertNotEmpty($body);
    }

    public function testGetCoordinates()
    {
        $key = '34...e4';
        $uri = 'https://geocode-maps.yandex.ru/1.x/';
        $location = 'Barnaul';
        $geocode = new Geocode();

        $geocode->setApi($key);
        $geocode->setUri($uri);
        
        $coordinates = $geocode->getСoordinates($location);
        $this->assertNotEmpty($coordinates);
        print("\n" . 'long: ' . $coordinates->getLongitude());
        print("\n" . 'lat: ' . $coordinates->getLatitude());
    }
}