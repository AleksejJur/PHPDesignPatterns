<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Car;
use App\Entity\Ship;

#It differs from the static factory because it is not static.
# Therefore, you can have multiple factories, differently parameterized, you can subclass it and you can mock it.
# It always should be preferred over a static factory!
class SimpleFactory
{
    public function createCar(?string $brand, ?string $model, ?float $maxSpeed, ?string $color): Car
    {
        $ship = new Car();
        $ship->setBrand($brand)
            ->setModel($model)
            ->setMaxSpeed($maxSpeed)
            ->setColor($color);

        return $ship;
    }

    /**
     * @param string|null $brand
     * @param string|null $model
     * @param float|null $maxSpeed
     * @param string|null $color
     * @return Ship
     */
    public function createShip(?string $brand, ?string $model, ?float $maxSpeed, ?string $color): Ship
    {
        $ship = new Ship();
        $ship->setBrand($brand)
            ->setModel($model)
            ->setMaxSpeed($maxSpeed)
            ->setColor($color);

        return $ship;
    }
}
