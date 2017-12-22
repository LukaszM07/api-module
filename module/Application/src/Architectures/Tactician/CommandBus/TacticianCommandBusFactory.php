<?php

declare(strict_types=1);

namespace Application\Architectures\Tactician\CommandBus;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

final class TacticianCommandBusFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return TacticianCommandBus
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TacticianCommandBus(
            $container->get(CommandBus::class)
        );
    }
}