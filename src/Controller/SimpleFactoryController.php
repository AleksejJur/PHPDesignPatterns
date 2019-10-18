<?php

/*
 * @copyright C UAB NFQ Technologies
 *
 * This Software is the property of NFQ Technologies
 * and is protected by copyright law – it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * Contact UAB NFQ Technologies:
 * E-mail: info@nfq.lt
 * http://www.nfq.lt
 */

namespace App\Controller;

use App\Factory\SimpleFactory\SimpleFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SimpleFactoryController extends MainController
{
    /**
     * @Route("/simpleFactory")
     */
    public function simpleFactory()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $arrayWithObjects = [];

        $simpleFactory = new SimpleFactory();

        array_push(
            $arrayWithObjects,
            $simpleFactory->createShip('ShipBrand', 'ShipModel', 0.55, 'red'),
            $simpleFactory->createCar('CarBrand', 'CarModel', 310, 'blue')
        );

        foreach ($arrayWithObjects as $object) {
            $entityManager->persist($object);
        }

        $entityManager->flush();

        return new Response(implode("</br>", $this->createSerializedJsonArray($arrayWithObjects)));
    }
}
