<?php

declare(strict_types=1);

namespace Application\Architectures\Tactician\QueryBus;

use Application\Architectures\Tactician\Query;
use League\Tactician\CommandBus;

final class QueryBus implements QueryBusInterface
{
    /** @var  CommandBus */
    private $commandBus;

    /**
     * QueryBus constructor.
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function handle(Query $query)
    {
        return $this->commandBus->handle($query);
    }
}