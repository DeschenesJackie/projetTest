<?php

namespace App\Controller;

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
        return $this->render('weather/current.html.twig', [
            'world' => "Hello World!",
        ]);
    }
}