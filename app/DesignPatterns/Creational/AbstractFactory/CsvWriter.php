<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Interface CsvWriter
 * @package App\DesignPatterns\Creational\AbstractFactory
 */
interface CsvWriter
{
    public function write(array $line): string;
}
