<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Car;

class CarFactory
{
    /**
     * @param string|null $brand
     * @param string|null $model
     * @param float|null $maxSpeed
     * @param string|null $color
     *
     * @return Car
     */
    public function createCar(
        ?string $brand = null,
        ?string $model = null,
        ?float $maxSpeed = null,
        ?string $color = null
    ): Car {
        $ship = new Car();
        $ship->setBrand($brand)
            ->setModel($model)
            ->setMaxSpeed($maxSpeed)
            ->setColor($color);

        return $ship;
    }
}
