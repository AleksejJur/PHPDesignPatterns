<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\StaticFactory\Tests;

use App\Factory\StaticFactory\StaticFactory;
use App\Formatter\NumberFormatter;
use App\Formatter\StringFormatter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StaticFactoryTest extends WebTestCase
{
    public function testCanCreateNumberFormatter()
    {
        $this->assertInstanceOf(NumberFormatter::class, StaticFactory::factory('number'));
    }
    public function testCanCreateStringFormatter()
    {
        $this->assertInstanceOf(StringFormatter::class, StaticFactory::factory('string'));
    }
    public function testException()
    {
        $this->expectException(\InvalidArgumentException::class);
        StaticFactory::factory('object');
    }
}
