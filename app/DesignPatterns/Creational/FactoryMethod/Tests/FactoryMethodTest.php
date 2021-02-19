<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Tests;

use App\DesignPatterns\Creational\FactoryMethod\FileLogger;
use App\DesignPatterns\Creational\FactoryMethod\FileLoggerFactory;
use App\DesignPatterns\Creational\FactoryMethod\StdoutLogger;
use App\DesignPatterns\Creational\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testCanCreateStdoutLogging()
    {
        $loggerFactory = new StdoutLoggerFactory();
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testCanCreateFileLogging()
    {
        $loggerFactory = new FileLoggerFactory(sys_get_temp_dir());
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}
