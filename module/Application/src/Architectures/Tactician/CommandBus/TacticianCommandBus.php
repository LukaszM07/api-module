<?php

declare(strict_types=1);

namespace Application\Architectures\Tactician\CommandBus;

use Application\Architectures\Tactician\Command;
use League\Tactician\CommandBus;

final class TacticianCommandBus implements CommandBusInterface
{
    /** @var  CommandBus */
    private $commandBus;

    /**
     * TacticianCommandBus constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Command $command
     * @return mixed
     */
    public function handle(Command $command)
    {
        return $this->commandBus->handle($command);
    }

}