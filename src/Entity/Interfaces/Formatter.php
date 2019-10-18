<?php

namespace App\Entity\Interfaces;

interface Formatter
{
    public function format(string $input): string;
}
