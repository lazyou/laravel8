<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\Builder\Tests;

use App\DesignPatterns\Creational\Builder\Parts\Car;
use App\DesignPatterns\Creational\Builder\Parts\Truck;
use App\DesignPatterns\Creational\Builder\TruckBuilder;
use App\DesignPatterns\Creational\Builder\CarBuilder;
use App\DesignPatterns\Creational\Builder\Director;
use PHPUnit\Framework\TestCase;

class DirectorTest extends TestCase
{
    public function testCanBuildTruck()
    {
        $truckBuilder = new TruckBuilder();
        $newVehicle = (new Director())->build($truckBuilder);

        $this->assertInstanceOf(Truck::class, $newVehicle);
    }

    public function testCanBuildCar()
    {
        $carBuilder = new CarBuilder();
        $newVehicle = (new Director())->build($carBuilder);

        $this->assertInstanceOf(Car::class, $newVehicle);
    }
}
