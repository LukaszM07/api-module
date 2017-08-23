<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\Command;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use TestApi\V1\Rest\Test\DB\Application\WriteModel\TestWriteModelInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

final class CreateTestCommandHandlerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CreateTestCommandHandler(
            $container->get(TestWriteModelInterface::class)
        );
    }
}