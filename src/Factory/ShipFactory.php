<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Ship;

class ShipFactory
{
    /**
     * @param string|null $brand
     * @param string|null $model
     * @param float|null $maxSpeed
     * @param string|null $color
     *
     * @return Ship
     */
    public static function createShip(
        ?string $brand = null,
        ?string $model = null,
        ?float $maxSpeed = null,
        ?string $color = null
    ): Ship {
        $ship = new Ship();
        $ship->setBrand($brand)
            ->setModel($model)
            ->setMaxSpeed($maxSpeed)
            ->setColor($color);

        return $ship;
    }
}
