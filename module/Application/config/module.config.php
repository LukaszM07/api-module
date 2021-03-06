<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Application\Architectures\Tactician\CommandBus\CommandBusInterface;
use Application\Architectures\Tactician\CommandBus\TacticianCommandBus;
use Application\Architectures\Tactician\CommandBus\TacticianCommandBusFactory;
use Application\Architectures\Tactician\QueryBus\QueryBus;
use Application\Architectures\Tactician\QueryBus\QueryBusFactory;
use Application\Architectures\Tactician\QueryBus\QueryBusInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'          => [
        'routes' => [
            'home' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers'     => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager'    => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            TacticianCommandBus::class => TacticianCommandBusFactory::class,
            QueryBus::class            => QueryBusFactory::class,
        ],
        'aliases'   => [
            CommandBusInterface::class => TacticianCommandBus::class,
            QueryBusInterface::class   => QueryBus::class,
        ],
    ],
    'tactician'       => [
        'handler-map' => [],
    ],
    'query-bus'       => [
        'handler-map' => [],
    ],
];
