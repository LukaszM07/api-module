<?php

declare(strict_types=1);

namespace Application\Architectures\Tactician\QueryBus;

use Application\Architectures\Tactician\Query;
use Interop\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

final class QueryBus implements QueryBusInterface
{
    /** @var array */
    private $handlers;

    /** @var ContainerInterface */
    private $container;

    /**
     * QueryBus constructor.
     * @param array $handlers
     * @param ContainerInterface $container
     */
    public function __construct(array $handlers, ContainerInterface $container)
    {
        $this->handlers = $handlers;
        $this->container = $container;
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function handle(Query $query)
    {
        $handler = $this->getHandlerForQuery(get_class($query));

        return $handler->handle($query);
    }

    /**
     * @param string $className
     * @return mixed
     */
    private function getHandlerForQuery(string $className)
    {
        try {
            return $this->container->get($this->handlers[$className]);
        } catch (NotFoundExceptionInterface $e) {
            throw  new RuntimeException(sprintf('Missing query handler for query %', $className), 0, $e);
        } catch (ContainerExceptionInterface $e) {
            throw new RuntimeException('Container exception', 0, $e);
        }
    }
}