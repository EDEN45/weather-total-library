<?php

namespace Weather\Client;

class ClientFactory
{
    public static function create($clientName, $apiKey)
    {
        switch ($clientName) {
            case ClientAbstract::CLIENT_YANDEX:
                $client = new Yandex();
                break;
            case ClientAbstract::CLIENT_OPEN_WEATHER_MAP:
            $client = new OpenWeatherMap();
                break;
            
            default:
                throw new \Exception('Ошибка создания клиента погоды');
        }

        $client->setApi($apiKey);

        return $client;
    }
}