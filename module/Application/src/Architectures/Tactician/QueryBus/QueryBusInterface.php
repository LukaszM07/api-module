<?php

namespace Application\Architectures\Tactician\QueryBus;

use Application\Architectures\Tactician\Query;

interface QueryBusInterface
{
    /**
     * @param Query $query
     * @return mixed
     */
    function handle(Query $query);
}