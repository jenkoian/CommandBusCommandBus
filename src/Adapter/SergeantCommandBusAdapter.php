<?php

namespace Jenko\CommandBusCommandBus\Adapter;

use Jenko\CommandBusCommandBus\CommandBus;
use Cairns\Sergeant\Sergeant as SergeantCommandBus;

class SergeantCommandBusAdapter implements CommandBus
{
    /**
     * @var SergeantCommandBus
     */
    private $sergeantCommandBus;

    /**
     * @param SergeantCommandBus $sergeantCommandBus
     */
    public function __construct(SergeantCommandBus $sergeantCommandBus)
    {
        $this->sergeantCommandBus = $sergeantCommandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command)
    {
        $this->sergeantCommandBus->execute($command);
    }
}
