<?php

declare(strict_types=1);

namespace App\Entity\Interfaces;

interface TransportInterface
{
    /**
     * @return string
     */
    public function showMaxSpeed(): string;
}
