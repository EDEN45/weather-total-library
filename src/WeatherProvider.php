<?php

namespace Weather;

use Weather\Client\ClientAbstract;
use Weather\Client\ClientFactory;

class WeatherProvider
{

    private $client;

    public function __construct($name = null, $apiKey = null) 
    {
        try {
            if (!empty($name) && !empty($apiKey)) {
                $this->client = ClientFactory::create($name, $apiKey);
                print("\nOK");
            }
        } catch (\Exception $e) {
            WeatherLogger::log('Ошибка создания клиента погоды: ' . $e->getMessage());
        }
        
    }

    public function setApi($key)
    {
        try {
            $this->client->setApi($key);
        } catch (\Exception $e) {
            WeatherLogger::log('Ошибка присвоения ключа: ' . $e->getMessage());
        }
    }

    public function setClient($name, $apiKey) 
    {
        try {
            $this->client = ClientFactory::create($name, $apiKey);
        } catch (\Exception $e) {
            WeatherLogger::log('Ошибка создания клиента погоды: ' . $e->getMessage());
        }
    }

    public function getWeather($latitude, $longitude)
    {

        print("\n" . get_class($this->client));

        try {
            return $this->client->parseWeather($latitude, $longitude);
        } catch (\Exception $e) {
            WeatherLogger::log('Ошибка получения погоды: ' . $e->getMessage());
        }
    }
}