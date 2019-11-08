<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Car;
use App\Entity\Interfaces\TransportInterface;
use App\Entity\TransportCreator;

class CarFactory extends TransportCreator
{
    /**
     * @param string|null $brand
     * @param string|null $model
     * @param float|null $maxSpeed
     * @param string|null $color
     *
     * @return TransportInterface
     */
    public function factoryMethod(
        ?string $brand = null,
        ?string $model = null,
        ?float $maxSpeed = null,
        ?string $color = null
    ): TransportInterface {
        $ship = new Car();
        $ship->setBrand($brand)
            ->setModel($model)
            ->setMaxSpeed($maxSpeed)
            ->setColor($color);

        return $ship;
    }
}
