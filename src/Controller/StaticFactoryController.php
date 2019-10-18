<?php

namespace App\Controller;

use App\Factory\StaticFactory\StaticFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticFactoryController
{
    /**
     * @Route("/staticFactory")
     */
    public function staticFactory()
    {
        $stringFormatter = StaticFactory::factory('string');
        $numberFormatter = StaticFactory::factory('number');

        return new Response($stringFormatter->format('5') . '</br>' . $numberFormatter->format('55'));
    }
}
