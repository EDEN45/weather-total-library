<?php

namespace Weather\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Yandex extends ClientAbstract
{
    public function parseWeather($latitude, $longitude)
    {
        $headers = [ 'X-Yandex-API-Key' => $this->apiKey ];

        $url = 'https://api.weather.yandex.ru/v1/forecast?lat=' . 
            $latitude . '&lon=' . 
            $longitude;

        $request = new Request('GET', $url, $headers);

        $decodeResponse = json_decode($this->getFromServer($request));

        return $decodeResponse->fact->temp;
    }
}