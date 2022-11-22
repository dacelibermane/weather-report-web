<?php declare(strict_types=1);

namespace App;

class Weather
{
    private string $weatherCondition;
    private float $temperature;
    private int $humidity;
    private float $windSpeed;

    public function __construct(string $weatherCondition, float $temperature, int $humidity, float $windSpeed)
    {
        $this->weatherCondition = $weatherCondition;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
    }

    public function getWeatherCondition(): string
    {
        return $this->weatherCondition;
    }

    public function setWeatherCondition(string $weatherCondition): void
    {
        $this->weatherCondition = ucfirst($weatherCondition);
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = floor($temperature);
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }
}