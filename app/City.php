<?php declare(strict_types=1);

namespace App;

class City
{
    private string $name;
    private float $latitude;
    private float $longitude;
    private string $country;

    public function __construct(string $name, float $latitude, float $longitude, string $country)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->country = $country;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}