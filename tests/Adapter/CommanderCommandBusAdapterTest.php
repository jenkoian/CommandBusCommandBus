<?php

namespace Jenko\Tests\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\Adapter\CommanderCommandBusAdapter;
use Enginebit\Commander\CommandBus as CommanderCommandBus;

class CommanderCommandBusAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testCallsExecuteOnAdaptedCommandBus()
    {
        $command = new \StdClass();

        $mockCommanderCommandBus = $this->mockCommandBus();
        $mockCommanderCommandBus
            ->expects($this->once())
            ->method('execute')
            ->with($this->identicalTo($command))
        ;

        $commandBus = new CommanderCommandBusAdapter($mockCommanderCommandBus);

        $commandBus->execute($command);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|CommanderCommandBus
     */
    private function mockCommandBus()
    {
        return $this->getMock('Enginebit\Commander\CommandBus');
    }
}
