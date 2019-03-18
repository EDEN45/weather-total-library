<?php

namespace Weather\Location;

use GuzzleHttp\Client;
use Weather\Location\Coordinates;

class Geocode
{
    private $apiKey;
    private $uri;

    public function setApi($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function request($location)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://geocode-maps.yandex.ru/1.x/', [
            'query' => [
                'apikey' => $this->apiKey,
                'geocode' => $location
            ]
        ]);

        return $response->getBody();
    }

    public function getСoordinates($location) : Coordinates
    {
        $coordintes = new Coordinates();
        $response = $this->request($location);

        preg_match("/<pos>(\D?\d+\.\d+)\s(\D?\d+\.\d+)<\/pos>/", $response, $matches);

        if (empty($matches[1]) || empty($matches[2])) {
            throw new \Exception('нет координат');
        }

        $coordintes->setLongitude($matches[1]);
        $coordintes->setLatitude($matches[2]);

        return $coordintes;
    }


}