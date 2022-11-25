<?php declare(strict_types=1);

namespace App\Models;

class Weather
{
    private string $icon;
    private float $temperature;
    private int $humidity;
    private float $windSpeed;

    public function __construct(string $icon, float $temperature, int $humidity, float $windSpeed)
    {
        $this->icon = $icon;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
    }

    public function getIcon(): string
    {
        return $this->icon;
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