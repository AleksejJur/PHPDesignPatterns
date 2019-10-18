<?php


namespace App\Formatter;

use App\Entity\Interfaces\Formatter;

class StringFormatter implements Formatter
{
    public function format(string $input): string
    {
        return $input . 'azaza';
    }
}
