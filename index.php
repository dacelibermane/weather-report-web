<?php declare(strict_types=1);

require_once "vendor/autoload.php";
\Dotenv\Dotenv::createImmutable(__DIR__)->load();
use App\DataRequest;

$apiKey = $_ENV['API_KEY'];


$userCity = readline("Enter city name: ");
$data = new DataRequest($apiKey);
$city = $data->getCity($userCity);
$weather = $data->getWeather($userCity);
echo $city->getName() . ", " . $city->getCountry() . " : " . $weather->getTemperature() . "°C\n";

echo "Weather condition : " . $weather->getWeatherCondition() . ".\n";
echo "Humidity - " . $weather->getHumidity() . "%.\n";
echo "Wind speed " . $weather->getWindSpeed() . "m/s.\n";