<?php

declare(strict_types=1);

namespace App\Controller;

use App\Factory\ShipFactory;
use App\Factory\SimpleFactory;
use App\Factory\StaticFactory\StaticFactory;
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
        $serializer = $this->createSerializer();

        $ship = ShipFactory::createShip('ShipBrand', 'ShipModel', 0.55, 'red');
        $car = ShipFactory::createShip('CarBrand', 'CarModel', 290.00, 'blue');

        $simpleFactory = new SimpleFactory();
        $newCarCreatedWithSimpleFactory = $simpleFactory->createShip('ShipBrand', 'ShipModel', 0.55, 'red');

        $entityManager->persist($ship);
        $entityManager->persist($car);
        $entityManager->persist($newCarCreatedWithSimpleFactory);
        $entityManager->flush();

        $serializedShip = $serializer->serialize($ship, 'json');
        $serializedCar = $serializer->serialize($car, 'json');
        $serializedCarSimpleFactory = $serializer->serialize($newCarCreatedWithSimpleFactory, 'json');

        $array = [$serializedShip, $serializedCar, $serializedCarSimpleFactory];

        return new Response(implode("|", $array));
    }

    /**
     * @Route("/staticFactory")
     */
    public function staticFactory()
    {
        $stringFormatter = StaticFactory::factory('string');
        $numberFormatter = StaticFactory::factory('number');

        return new Response($stringFormatter->format('5') . '<br>' . $numberFormatter->format('55'));
    }

    /**
     * @return Serializer
     */
    private function createSerializer(): Serializer
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }
}
