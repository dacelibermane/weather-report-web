<?php declare(strict_types=1);

namespace App;

class DataRequest
{
    private const API_URL = "https://api.openweathermap.org/";
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getCity(string $cityName): City
    {
        $cityRequest = file_get_contents(self::API_URL . "geo/1.0/direct?q={$cityName}&appid={$this->apiKey}");
        $data = json_decode($cityRequest, true);

        return new City(
            $cityName,
            $data[0]['lat'] ?? 0,
            $data[0]['lon'] ?? 0
        );
    }

    public function getWeather($cityName): Weather
    {
        $city = $this->getCity($cityName);
        $weatherRequest = file_get_contents(self::API_URL . "data/2.5/weather?lat={$city->getLatitude()}&lon={$city->getLongitude()}&appid={$this->apiKey}&units=metric");
        $data = json_decode($weatherRequest, true);

        $icon = $data ['weather'][0]['icon'];
        $iconUrl = self::API_URL . "img/w/" . $icon . ".png";

        return new Weather(
            $iconUrl ?? 0,
            $data['main']['temp'] ?? 0,
            $data['main']['humidity'] ?? 0,
            $data['wind']['speed'] ?? 0
        );
    }
}