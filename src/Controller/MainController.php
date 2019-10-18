<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MainController extends AbstractController
{
    /**
     * @return Serializer
     */
    public function createSerializer(): Serializer
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }

    /**
     * @param array $array
     * @return array
     */
    public function createSerializedJsonArray(array $array): array
    {
        $serializedArray = [];

        foreach ($array as $item) {
            array_push($serializedArray, $this->createSerializer()->serialize($item, 'json'));
        }

        return $serializedArray;
    }
}
