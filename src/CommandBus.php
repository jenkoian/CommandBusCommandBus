<?php

namespace Jenko\CommandBusCommandBus;

interface CommandBus
{
    /**
     * @param $command
     * @return mixed
     */
    public function execute($command);
}
