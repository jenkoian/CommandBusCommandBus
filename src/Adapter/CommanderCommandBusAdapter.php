<?php

namespace Jenko\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\CommandBus;
use Enginebit\Commander\CommandBus as CommanderCommandBus;

class CommanderCommandBusAdapter implements CommandBus
{
    /**
     * @var CommanderCommandBus
     */
    private $commanderCommandBus;

    /**
     * @param CommanderCommandBus $commanderCommandBus
     */
    public function __construct(CommanderCommandBus $commanderCommandBus)
    {
        $this->commanderCommandBus = $commanderCommandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command)
    {
        $this->commanderCommandBus->execute($command);
    }
}
