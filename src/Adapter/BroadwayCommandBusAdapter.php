<?php

namespace Jenko\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\CommandBus;
use Broadway\CommandHandling\CommandBusInterface as BroadwayCommandBus;

class BroadwayCommandBusAdapter implements CommandBus
{
    /**
     * @var BroadwayCommandBus
     */
    private $broadwayCommandBus;

    /**
     * @param BroadwayCommandBus $broadwayCommandBus
     */
    public function __construct(BroadwayCommandBus $broadwayCommandBus)
    {
        $this->broadwayCommandBus = $broadwayCommandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command)
    {
        $this->broadwayCommandBus->dispatch($command);
    }
}
