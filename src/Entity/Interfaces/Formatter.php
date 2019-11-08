<?php

declare(strict_types=1);

namespace App\Entity\Interfaces;

interface Formatter
{
    public function format(string $input): string;
}
