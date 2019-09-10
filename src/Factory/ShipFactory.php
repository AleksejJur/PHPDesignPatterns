<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Ship;

class ShipFactory
{

    public function createShip(): Ship
    {
        return new Ship();
    }
}
