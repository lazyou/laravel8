<?php declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Visitor;

interface Role
{
    public function accept(RoleVisitor $visitor);
}
