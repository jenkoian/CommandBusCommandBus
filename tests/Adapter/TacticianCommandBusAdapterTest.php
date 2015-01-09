<?php

namespace Jenko\Tests\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\Adapter\TacticianCommandBusAdapter;
use League\Tactician\CommandBus\Command;
use League\Tactician\CommandBus\CommandBus as TacticianCommandBus;

class TacticianCommandBusAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testCallsExecuteOnAdaptedCommandBus()
    {
        $command = $this->mockCommand();

        $mockTacticianCommandBus = $this->mockCommandBus();
        $mockTacticianCommandBus
            ->expects($this->once())
            ->method('execute')
            ->with($this->identicalTo($command))
        ;

        $commandBus = new TacticianCommandBusAdapter($mockTacticianCommandBus);

        $commandBus->execute($command);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|TacticianCommandBus
     */
    private function mockCommandBus()
    {
        return $this->getMock('League\Tactician\CommandBus\CommandBus');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Command
     */
    private function mockCommand()
    {
        return $this->getMock('League\Tactician\CommandBus\Command');
    }
}
