<?php

namespace App\Formatter;

use App\Entity\Interfaces\Formatter;

class NumberFormatter implements Formatter
{
    public function format(string $input): string
    {
        return ((int)$input + 0.25);
    }
}
