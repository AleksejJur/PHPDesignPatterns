<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Interfaces\TransportInterface;

abstract class TransportCreator
{
    abstract public function factoryMethod(): TransportInterface;

    public function announceTransport()
    {
        $creator = $this->factoryMethod();

        $creator->transportType();
    }
}
