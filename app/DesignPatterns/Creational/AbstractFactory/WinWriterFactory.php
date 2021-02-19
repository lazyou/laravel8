<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Class WinWriterFactory
 * @package App\DesignPatterns\Creational\AbstractFactory
 */
class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }
}
