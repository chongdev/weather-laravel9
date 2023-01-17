<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;

class HomeController extends Controller
{
    public function index()
    {
        $wt = new Weather();

        // https://home.openweathermap.org/history_bulks/new
        $info = $wt->getCurrentByCity('Bangkok');    // Get current weather by city name

        // By city ID - download list of city id here http://bulk.openweathermap.org/sample/
        // $info = $wt->getCurrentByCity(1609348);

        // By Zip Code - string with country code 
        // $info = $wt->getCurrentByZip('94040, us');  // If no country code specified, us will be default

        // $weather = $info->weather[0];
        $res = json_decode(json_encode($info));
        $weather = $res->weather[0];

        // $date = $res['dt'];
        // $name = $res['name'];
        // $wind = $res['wind'];

        // $res = json_decode($info, true);

        // $info->weather();

        // dd(json_decode(json_encode($info), 1));

        // http://openweathermap.org/img/wn/10d@2x.png

        return view('weather')->with([
            'post' => $res,
            'weather' => $weather,
        ]);
    }
}
