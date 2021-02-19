<?php declare(strict_types=1);

namespace App\DesignPatterns\Creational\Pool;

use DateTime;

class StringReverseWorker
{
    private DateTime $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    public function run(string $text): string
    {
        return strrev($text);
    }
}
