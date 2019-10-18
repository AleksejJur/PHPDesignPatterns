<?php

declare(strict_types=1);

namespace App\Entity\Interfaces;

interface TransportInterface
{
    public function transportType(): string;
}
