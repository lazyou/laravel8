<?php

namespace App\DesignPatterns\Creational\AbstractFactory;

/**
 * Interface JsonWriter
 * @package App\DesignPatterns\Creational\AbstractFactory
 */
interface JsonWriter
{
    public function write(array $data, bool $formatted): string;
}
