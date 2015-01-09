<?php

namespace Jenko\Tests\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\Adapter\BroadwayCommandBusAdapter;
use Broadway\CommandHandling\CommandBusInterface as BroadwayCommandBus;

class BroadwayCommandBusAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testCallsExecuteOnAdaptedCommandBus()
    {
        $command = new \StdClass();

        $mockBroadwayCommandBus = $this->mockCommandBus();
        $mockBroadwayCommandBus
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->identicalTo($command))
        ;

        $commandBus = new BroadwayCommandBusAdapter($mockBroadwayCommandBus);

        $commandBus->execute($command);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|BroadwayCommandBus
     */
    private function mockCommandBus()
    {
        return $this->getMock('Broadway\CommandHandling\CommandBusInterface');
    }
}
