<?php declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite;

class TextElement implements Renderable
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return $this->text;
    }
}
