<?php declare(strict_types=1);

require_once "vendor/autoload.php";
\Dotenv\Dotenv::createImmutable(__DIR__)->load();

use App\DataRequest;


$title = "Weather App";
$apiKey = $_ENV['API_KEY'];
$cityName = $_GET['city'] ?? 'Riga';


$data = new DataRequest($apiKey);
$city = $data->getCity($cityName);
$weather = $data->getWeather($cityName);
$city->setName($cityName);
$weather->setTemperature($weather->getTemperature());
$weather->setWeatherCondition($weather->getWeatherCondition());


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/24020c059d.js" crossorigin="anonymous"></script>
</head>
<body>
<!--Title-->
<h1 class="title">Search Global Weather</h1>

<!--Links-->
<ul class="links">
    <li><a href="/?city=Riga">Riga</a></li>
    <li><a href="/?city=Vilnius">Vilnius</a></li>
    <li><a href="/?city=Tallinn">Tallinn</a></li>
</ul>
<div class="container">
    <!--Form-->
    <form action="index.php" method="get" class="form">
        <label for="city">Enter city</label>
        <input type="text" name="city" placeholder="Riga"><br>
        <button type="submit" name="submit" class="btn">Submit</button>
    </form>
    <!--weather display-->
    <div class="weather">
        <p><?= $city->getName() ?></p>
        <p><?= $weather->getWeatherCondition() . "\n" ?></p>
        <p><i class="fa-solid fa-temperature-three-quarters"></i><?= $weather->getTemperature() . "°C\n" ?></p>
        <p><i class="fa-solid fa-wind"></i><?= $weather->getWindSpeed() . "m/s\n" ?></p>
        <p><i class="fa-solid fa-droplet"></i><?= $weather->getHumidity() . "%\n"; ?>
    </div>
</div>

</body>
</html>

