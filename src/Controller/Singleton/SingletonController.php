<?php

declare(strict_types=1);

namespace App\Controller\Singleton;

use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingletonController extends MainController
{

    /**
     * @Route("/singleton")
     */
    public function singleton()
    {
        $singleton = Singleton::getInstance();
        $singleton2 = Singleton::getInstance();

        if ($singleton === $singleton2) {
            $response =  "Singleton works, both variables contain the same instance.";
        } else {
            $response =  "Singleton failed, variables contain different instances.";
        }

        return new Response($response);
    }
}
