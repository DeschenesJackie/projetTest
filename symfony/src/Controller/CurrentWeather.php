<?php

namespace App\Controller;

use App\Entity\WeatherReport;
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
        $entityManager = $this->getDoctrine()->getManager();
        $content = $this->callAPI('45.50888', '-73.561668');
        $current = $content['current'];

        $weatherReport = new WeatherReport();
        $weatherReport->setTimezone($content['timezone']);
        $weatherReport->setLat($content['lat']);
        $weatherReport->setLon($content['lon']);
        $weatherReport->setDateTime(date("Y-m-d H:i", $current['dt'] + $content['timezone_offset']));
        $weatherReport->setSunrise(date("H:i:s", $current['sunrise'] + $content['timezone_offset']));
        $weatherReport->setSunset(date("H:i:s", $current['sunset'] + $content['timezone_offset']));
        $weatherReport->setTemp($current['temp']);
        $weatherReport->setRealFeel($current['feels_like']);
        $weatherReport->setHumidity($current['humidity']);
        $weatherReport->setClouds($current['clouds']);
        $weatherReport->setWinds($current['wind_speed']*3.6);
        
        if (sizeof($current['weather']) > 0) {
            $conditions = "";
            for ($i = 0; $i < sizeof($current['weather']); $i++) {
                $conditions.= ($current['weather'][$i])['description'];
                $conditions.=" ";
            }
            $weatherReport->setConditions($conditions);
        }

        $entityManager->persist($weatherReport);
        $entityManager->flush();

        return $this->render('weather/current.html.twig', [
            'timezone' => $weatherReport->getTimezone(),
            'lat' => $weatherReport->getLat(),
            'lon' => $weatherReport->getLon(),
            'currentTime' => $weatherReport->getDateTime(),
            'sunrise' => $weatherReport->getSunrise(),
            'sunset' => $weatherReport->getSunset(),
            'currentTemp' => $weatherReport->getTemp(),
            'currentFeelTemp' => $weatherReport->getRealFeel(),
            'currentHumidity' => $weatherReport->getHumidity(),
            'currentClouds' => $weatherReport->getClouds(),
            'currentWind' => $weatherReport->getWinds(),
            'currentWeathers' => $weatherReport->getConditions(),
        ]);
    }


    /** NOT FUNCTIONNAL LEFT THERE TO SHOW ATTEMPT */
    /**
     * @Route("/weather/current/{id}", name="report_show")
     */
    /*
    public function show($id)
    {
        $weatherReport = $this->getDoctrine()
            ->getRepository(WeatherReport::class)
            ->find($id);
        if (!$weatherReport) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('weather/current.html.twig', [
            'timezone' => $weatherReport->getTimezone(),
            'lat' => $weatherReport->getLat(),
            'lon' => $weatherReport->getLon(),
            'currentTime' => $weatherReport->getDateTime(),
            'sunrise' => $weatherReport->getSunrise(),
            'sunset' => $weatherReport->getSunset(),
            'currentTemp' => $weatherReport->getTemp(),
            'currentFeelTemp' => $weatherReport->getRealFeel(),
            'currentHumidity' => $weatherReport->getHumidity(),
            'currentClouds' => $weatherReport->getClouds(),
            'currentWind' => $weatherReport->getWinds(),
            'currentWeathers' => $weatherReport->getConditions(),
        ]);
    }
    */
    /**
     * @Route("/weather/dbstats")
     */
    public function db_stats()
    {
        $totalReport = $this->getDoctrine()->getRepository(WeatherReport::class)->findAmountOfReport();
        $avgTemp = $this->getDoctrine()->getRepository(WeatherReport::class)->getAvgTemp();


        return $this->render('weather/db_stats.html.twig',[
            'nbTotalReport' => $totalReport,
            'avgTemp' => $avgTemp,
        ]);
    }

    public function callAPI($lat, $lon) :array
    {
        $currentWeather = HttpClient::create();
        $response = $currentWeather->request('GET', 'https://api.openweathermap.org/data/2.5/onecall', [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'exclude' => 'minutely,hourly,daily,alerts',
                'units' => 'metric',
                'appid' => '7dd2e8675f87b5a8cae35d4fad08f2e1',
                'lang' => 'fr',
            ],
        ]);
        return $response->toArray();
    }
}