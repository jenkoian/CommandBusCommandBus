<?php

namespace Jenko\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\CommandBus;
use SimpleBus\Command\Bus\CommandBus as SimpleBusCommandBus;

class SimpleBusCommandBusAdapter implements CommandBus
{
    /**
     * @var SimpleBusCommandBus
     */
    private $simpleBusCommandBus;

    /**
     * @param SimpleBusCommandBus $simpleBusCommandBus
     */
    public function __construct(SimpleBusCommandBus $simpleBusCommandBus)
    {
        $this->simpleBusCommandBus = $simpleBusCommandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command)
    {
        $this->simpleBusCommandBus->handle($command);
    }
}
