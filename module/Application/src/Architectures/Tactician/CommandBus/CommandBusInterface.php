<?php

namespace Application\Architectures\Tactician\CommandBus;

use Application\Architectures\Tactician\Command;

interface CommandBusInterface
{
    /**
     * @param Command $command
     * @return mixed
     */
    function handle(Command $command);
}