<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\StaticFactory\Tests;

use InvalidArgumentException;
use App\DesignPatterns\Creational\StaticFactory\FormatNumber;
use App\DesignPatterns\Creational\StaticFactory\FormatString;
use App\DesignPatterns\Creational\StaticFactory\StaticFactory;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{
    public function testCanCreateNumberFormatter()
    {
        $this->assertInstanceOf(FormatNumber::class, StaticFactory::factory('number'));
    }

    public function testCanCreateStringFormatter()
    {
        $this->assertInstanceOf(FormatString::class, StaticFactory::factory('string'));
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);

        StaticFactory::factory('object');
    }
}
