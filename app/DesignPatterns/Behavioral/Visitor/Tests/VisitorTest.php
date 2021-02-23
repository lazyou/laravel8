<?php declare(strict_types=1);

namespace App\DesignPatterns\Tests\Visitor\Tests;

use App\DesignPatterns\Behavioral\Visitor\RecordingVisitor;
use App\DesignPatterns\Behavioral\Visitor\User;
use App\DesignPatterns\Behavioral\Visitor\Group;
use App\DesignPatterns\Behavioral\Visitor\Role;
use App\DesignPatterns\Behavioral\Visitor;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    private RecordingVisitor $visitor;

    protected function setUp(): void
    {
        $this->visitor = new RecordingVisitor();
    }

    public function provideRoles()
    {
        return [
            [new User('Dominik')],
            [new Group('Administrators')],
        ];
    }

    /**
     * @dataProvider provideRoles
     */
    public function testVisitSomeRole(Role $role)
    {
        $role->accept($this->visitor);
        $this->assertSame($role, $this->visitor->getVisited()[0]);
    }
}
