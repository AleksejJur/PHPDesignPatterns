<?php

namespace App\Tests\Functional;

use App\Entity\Ship;
use App\Factory\SimpleFactory\SimpleFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SimpleFactoryTest extends WebTestCase
{
    public function testCanCreateShip()
    {
        $simpleFactory = new SimpleFactory();

        $ship = $simpleFactory->createShip('ShipBrand', 'ShipModel', 0.55, 'red');

        $this->assertInstanceOf(Ship::class, $ship);
    }
}
