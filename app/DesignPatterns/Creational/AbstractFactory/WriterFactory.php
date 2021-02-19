<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Interface WriterFactory
 * @package App\DesignPatterns\Creational\AbstractFactory
 */
interface WriterFactory
{
    public function createCsvWriter(): CsvWriter;
    public function createJsonWriter(): JsonWriter;
}
