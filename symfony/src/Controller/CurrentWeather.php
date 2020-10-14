<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrentWeather
{
    /**
     * @Route("/weather/current")
     */
    public function current(): Response
    {
        return new Response(
            '<html><body>Hello World!</body></html>'
        );
    }
}