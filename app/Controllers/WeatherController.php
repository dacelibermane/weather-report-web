<?php

namespace App\Controllers;

use App\DataRequest;
//use App\Models\City;

require_once 'app/DataRequest.php';

class WeatherController
{

    public function index():DataRequest
    {
        require_once 'Views/index.php';
        return (new DataRequest($_ENV['API_KEY']));
    }

}