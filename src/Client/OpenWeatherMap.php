<?php

namespace Weather\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class OpenWeatherMap extends ClientAbstract
{
    public function parseWeather($latitude, $longitude)
    {
        $url = 'api.openweathermap.org/data/2.5/weather?lat=' . 
            $latitude . '&' .'lon=' . 
            $longitude . '&appid=' . 
            $this->apiKey;

        $request = new Request('GET', $url);
        
        $decodeResponse = json_decode($this->getFromServer($request));

        return $decodeResponse->main->temp - 273;
    }
}