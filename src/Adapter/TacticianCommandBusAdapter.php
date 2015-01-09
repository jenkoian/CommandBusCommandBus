<?php

namespace Jenko\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\CommandBus;
use League\Tactician\CommandBus\CommandBus as TacticianCommandBus;

class TacticianCommandBusAdapter implements CommandBus
{
    /**
     * @var TacticianCommandBus
     */
    private $tacticianCommandBus;

    /**
     * @param TacticianCommandBus $tacticianCommandBus
     */
    public function __construct(TacticianCommandBus $tacticianCommandBus)
    {
        $this->tacticianCommandBus = $tacticianCommandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command)
    {
        $this->tacticianCommandBus->execute($command);
    }
}
