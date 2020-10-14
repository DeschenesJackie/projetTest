<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CurrentWeather extends AbstractController
{
    /**
     * @Route("/weather/current")
     */
    public function current()
    {
        $content = $this->callAPI('45.50888', '-73.561668');
        $current = $content['current'];
        return $this->render('weather/current.html.twig', [
            'timezone' => $content['timezone'],
            'lat' => $content['lat'],
            'lon' => $content['lon'],
            'currentTime' => date("Y-m-d H:i", $current['dt'] + $content['timezone_offset']),
            'sunrise' => date("H:i:s", $current['sunrise'] + $content['timezone_offset']),
            'sunset' => date("H:i:s", $current['sunset'] + $content['timezone_offset']),
            'currentTemp' => $current['temp'],
            'currentFeelTemp' => $current['feels_like'],
            'currentHumidity' => $current['humidity'],
            'currentClouds' => $current['clouds'],
            'currentWind' => $current['wind_speed']*3.6,
            'currentWeathers' => $current['weather'],

        ]);
    }

    public function callAPI($lat, $lon) :array
    {
        $currentWeather = HttpClient::create();
        $response = $currentWeather->request('GET', 'https://api.openweathermap.org/data/2.5/onecall', [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'exclude' => 'minutely,hourly,daily',
                'units' => 'metric',
                'appid' => '7dd2e8675f87b5a8cae35d4fad08f2e1',
                'lang' => 'fr',
            ],
        ]);
        return $response->toArray();
    }
}