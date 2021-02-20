<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\StaticFactory;

interface Formatter
{
    public function format(string $input): string;
}
