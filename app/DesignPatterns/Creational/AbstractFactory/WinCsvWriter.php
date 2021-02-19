<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Class WinCsvWriter
 * @package App\DesignPatterns\Creational\AbstractFactory
 */
class WinCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\r\n";
    }
}
