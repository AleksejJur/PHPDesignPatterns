<?php

namespace App\Tests\Functional;

use App\Entity\Ship;
use App\Factory\ShipFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SimpleFactoryTest extends WebTestCase
{
    public function testCanCreateShip()
    {
        $shipFactory = new ShipFactory();
        $ship = $shipFactory->createShip('ShipBrand', 'ShipModel', 0.55, 'red');
        $this->assertInstanceOf(Ship::class, $ship);
    }
}
