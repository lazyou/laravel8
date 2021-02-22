<?php declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Command\Tests;

use App\DesignPatterns\Behavioral\Command\AddMessageDateCommand;
use App\DesignPatterns\Behavioral\Command\HelloCommand;
use App\DesignPatterns\Behavioral\Command\Invoker;
use App\DesignPatterns\Behavioral\Command\Receiver;
use PHPUnit\Framework\TestCase;

class UndoableCommandTest extends TestCase
{
    public function testInvocation()
    {
        $invoker = new Invoker();
        $receiver = new Receiver();

        $invoker->setCommand(new HelloCommand($receiver));
        $invoker->run();
        $this->assertSame('Hello World', $receiver->getOutput());

        $messageDateCommand = new AddMessageDateCommand($receiver);
        $messageDateCommand->execute();

        $invoker->run();
        $this->assertSame("Hello World\nHello World [".date('Y-m-d').']', $receiver->getOutput());

        $messageDateCommand->undo();

        $invoker->run();
        $this->assertSame("Hello World\nHello World [".date('Y-m-d')."]\nHello World", $receiver->getOutput());
    }
}
