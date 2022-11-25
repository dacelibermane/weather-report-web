<?php declare(strict_types=1);

namespace Views;

use App\Controllers\WeatherController;
use App\DataRequest;

$city = $_GET['city'] ?? "Riga";
$data = (new WeatherController())->index();
$cityName = $data->getCity($city)->getName();
$weather = $data->getWeather($cityName);
$weather->setTemperature($weather->getTemperature());
$iconUrl = $weather->getIcon();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Global weather</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../img/weather.png"

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
        <label>
            <input type="text" id="city" name="city" placeholder="Riga" required>
        </label><br>
        <button type="submit" name="submit" class="btn">Submit</button>
    </form>
    <!--weather display-->
    <div class="weather">
        <p><?= $cityName ?></p>
        <img src="<?= $iconUrl ?>" alt="weather icon"/>
        <p><i class="fa-solid fa-temperature-three-quarters"></i><?= $weather->getTemperature() . "°C\n" ?></p>
        <p><i class="fa-solid fa-wind"></i><?= $weather->getWindSpeed() . "m/s\n" ?></p>
        <p><i class="fa-solid fa-droplet"></i><?= $weather->getHumidity() . "%\n"; ?></p>
    </div>
</div>
<script src="https://kit.fontawesome.com/24020c059d.js" crossorigin="anonymous"></script>
</body>
</html>
