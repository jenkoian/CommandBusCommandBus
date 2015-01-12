<?php

namespace Jenko\Tests\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\Adapter\SimpleBusCommandBusAdapter;
use SimpleBus\Command\Command;
use SimpleBus\Command\Bus\CommandBus as SimpleBusCommandBus;

class SimpleBusCommandBusAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testCallsExecuteOnAdaptedCommandBus()
    {
        $command = $this->mockCommand();

        $mockSimpleBusCommandBus = $this->mockCommandBus();
        $mockSimpleBusCommandBus
            ->expects($this->once())
            ->method('handle')
            ->with($this->identicalTo($command))
        ;

        $commandBus = new SimpleBusCommandBusAdapter($mockSimpleBusCommandBus);

        $commandBus->execute($command);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|SimpleBusCommandBus
     */
    private function mockCommandBus()
    {
        return $this->getMock('SimpleBus\Command\Bus\CommandBus');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Command
     */
    private function mockCommand()
    {
        return $this->getMock('SimpleBus\Command\Command');
    }
}
