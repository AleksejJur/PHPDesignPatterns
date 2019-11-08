<?php

namespace App\Controller;

use App\Entity\TransportCreator;
use App\Factory\CarFactory;
use App\Factory\ShipFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactoryMethodController extends MainController
{
    /**
     * @Route("/factoryMethod")
     */
    public function factoryMethod()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $arrayWithObjects = [];

        $ship = ShipFactory::factoryMethod('ShipBrand', 'ShipModel', 0.55, 'red');
        $car = CarFactory::factoryMethod('CarBrand', 'CarModel', 290.00, 'blue');

        array_push(
            $arrayWithObjects,
            $ship,
            $car
        );

        foreach ($arrayWithObjects as $object) {
            $entityManager->persist($object);
        }

        $entityManager->flush();

        dump($car->transportType());

        return new Response(implode("</br>", $this->createSerializedJsonArray($arrayWithObjects)));
    }
}
