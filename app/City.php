<?php declare(strict_types=1);

namespace App;

class City
{
    private string $name;
    private float $latitude;
    private float $longitude;

    public function __construct(string $name, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = ucfirst(strtolower($name));
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}