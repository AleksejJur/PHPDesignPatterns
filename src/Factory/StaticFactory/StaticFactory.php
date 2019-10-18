<?php

namespace App\Factory\StaticFactory;

use App\Entity\Interfaces\Formatter;
use App\Formatter\NumberFormatter;
use App\Formatter\StringFormatter;

/**
 * Similar to the AbstractFactory, this pattern is used to create series of related or dependent objects.
 * The difference between this and the abstract factory pattern is that the static factory pattern uses
 * just one static method to create all types of objects it can create. It is usually named factory or build.
 */

/**
 * Note1: Remember, static means global state which is evil because it can't be mocked for tests
 * Note2: Cannot be subclassed or mock-upped or have multiple different instances.
 */
final class StaticFactory
{
    public static function factory(string $type): Formatter
    {
        if ($type == 'number') {
            return new NumberFormatter();
        }

        if ($type == 'string') {
            return new StringFormatter();
        }

        throw new \InvalidArgumentException('Unknown format given');
    }
}
