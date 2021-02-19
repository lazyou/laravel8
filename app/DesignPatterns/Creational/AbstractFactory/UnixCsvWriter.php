<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Class UnixCsvWriter
 * @package DesignPatterns\Creational\AbstractFactory
 */
class UnixCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\n";
    }
}
