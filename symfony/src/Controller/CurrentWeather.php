<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CurrentWeather extends AbstractController
{
    private $currentWeather;
    /**
     * @Route("/weather/current")
     */
    public function current()
    {
        $currentWeather = HttpClient::create();
        $response = $currentWeather->request('GET', 'https://api.openweathermap.org/data/2.5/onecall', [
            'query' => [
                'lat' => '45.508888',
                'lon' => '-73.561668',
                'exclude' => 'minutely,hourly,daily',
                'units' => 'metric',
                'appid' => '7dd2e8675f87b5a8cae35d4fad08f2e1',
            ],
        ]);
        $content = $response->toArray();
        return $this->render('weather/current.html.twig', [
            'world' => $content['timezone'],
        ]);
    }
}