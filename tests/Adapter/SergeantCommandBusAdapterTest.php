<?php

namespace Jenko\Tests\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\Adapter\SergeantCommandBusAdapter;
use Cairns\Sergeant\Sergeant as SergeantCommandBus;

class SergeantCommandBusAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testCallsExecuteOnAdaptedCommandBus()
    {
        $command = new \StdClass();

        $mockSergeantCommandBus = $this->mockCommandBus();
        $mockSergeantCommandBus
            ->expects($this->once())
            ->method('execute')
            ->with($this->identicalTo($command))
        ;

        $commandBus = new SergeantCommandBusAdapter($mockSergeantCommandBus);

        $commandBus->execute($command);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|SergeantCommandBus
     */
    private function mockCommandBus()
    {
        return $this->getMock('Cairns\Sergeant\Sergeant');
    }
}
