<?php

namespace Weather\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

abstract class ClientAbstract
{
    const CLIENT_YANDEX = 'yandex';
    const CLIENT_OPEN_WEATHER_MAP = 'open_weather_map';

    protected $apiKey;

    public function setApi($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get data from server
     */
    protected function getFromServer(Request $request)
    {
        $client = new Client();
        $response = $client->send($request, ['timeout' => 2]);
        return $response->getBody();
    }

    abstract public function parseWeather($latitude, $longitude);
}