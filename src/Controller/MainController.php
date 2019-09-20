<?php

declare(strict_types=1);

namespace App\Controller;

use App\Factory\ShipFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MainController extends AbstractController
{
    /**
     * @Route("/index")
     */
    public function showIndex()
    {

        $entityManager = $this->getDoctrine()->getManager();

        $ship = ShipFactory::createShip('ShipBrand', 'ShipModel', 0.55, 'red');
        $car = ShipFactory::createShip('CarBrand', 'CarModel', 290.00, 'blue');

        $entityManager->persist($ship);
        $entityManager->persist($car);
        $entityManager->flush();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $serializedShip = $serializer->serialize($ship, 'json');
        $serializedCar = $serializer->serialize($car, 'json');

        $array = [$serializedShip, $serializedCar];

        return new Response(implode("|", $array));
    }
}
