<?php

use TestApi\V1\Rest\Test\DB\Application\Command\CreateTestCommand;
use TestApi\V1\Rest\Test\DB\Application\Command\CreateTestCommandHandler;
use TestApi\V1\Rest\Test\DB\Application\Command\CreateTestCommandHandlerFactory;
use TestApi\V1\Rest\Test\DB\Application\Query\GetTestByIdQuery;
use TestApi\V1\Rest\Test\DB\Application\Query\GetTestByIdQueryHandler;
use TestApi\V1\Rest\Test\DB\Application\Query\GetTestByIdQueryHandlerFactory;
use TestApi\V1\Rest\Test\DB\Application\ReadModel\TestReadModelInterface;
use TestApi\V1\Rest\Test\DB\Application\WriteModel\TestWriteModelInterface;
use TestApi\V1\Rest\Test\DB\Infrastructure\ReadModel\DbalTestReadModel;
use TestApi\V1\Rest\Test\DB\Infrastructure\ReadModel\DbalTestReadModelFactory;
use TestApi\V1\Rest\Test\DB\Infrastructure\WriteModel\DbalCreateTestWriteModel;
use TestApi\V1\Rest\Test\DB\Infrastructure\WriteModel\DbalCreateTestWriteModelFactory;
use TestApi\V1\Rest\Test\TestResource;
use TestApi\V1\Rest\Test\TestResourceFactory;

return [
    'service_manager'        => [
        'factories' => [
            TestResource::class => TestResourceFactory::class,

            CreateTestCommandHandler::class => CreateTestCommandHandlerFactory::class,
            DbalCreateTestWriteModel::class => DbalCreateTestWriteModelFactory::class,

            GetTestByIdQueryHandler::class => GetTestByIdQueryHandlerFactory::class,
            DbalTestReadModel::class       => DbalTestReadModelFactory::class,
        ],
        'aliases'   => [
            TestWriteModelInterface::class => DbalCreateTestWriteModel::class,

            TestReadModelInterface::class => DbalTestReadModel::class,
        ],
    ],
    'router'                 => [
        'routes' => [
            'test-api.rest.test' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/test[/:test_id]',
                    'defaults' => [
                        'controller' => 'TestApi\\V1\\Rest\\Test\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning'          => [
        'uri' => [
            0 => 'test-api.rest.test',
        ],
    ],
    'zf-rest'                => [
        'TestApi\\V1\\Rest\\Test\\Controller' => [
            'listener'                   => TestResource::class,
            'route_name'                 => 'test-api.rest.test',
            'route_identifier_name'      => 'test_id',
            'collection_name'            => 'test',
            'entity_http_methods'        => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods'    => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size'                  => 25,
            'page_size_param'            => null,
            'entity_class'               => \TestApi\V1\Rest\Test\TestEntity::class,
            'collection_class'           => \TestApi\V1\Rest\Test\TestCollection::class,
            'service_name'               => 'test',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers'            => [
            'TestApi\\V1\\Rest\\Test\\Controller' => 'HalJson',
        ],
        'accept_whitelist'       => [
            'TestApi\\V1\\Rest\\Test\\Controller' => [
                0 => 'application/vnd.test-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'TestApi\\V1\\Rest\\Test\\Controller' => [
                0 => 'application/vnd.test-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal'                 => [
        'metadata_map' => [
            \TestApi\V1\Rest\Test\TestEntity::class     => [
                'entity_identifier_name' => 'id',
                'route_name'             => 'test-api.rest.test',
                'route_identifier_name'  => 'test_id',
                'hydrator'               => \Zend\Hydrator\ArraySerializable::class,
            ],
            \TestApi\V1\Rest\Test\TestCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name'             => 'test-api.rest.test',
                'route_identifier_name'  => 'test_id',
                'is_collection'          => true,
            ],
        ],
    ],
    'tactician'              => [
        'handler-map' => [
            CreateTestCommand::class => CreateTestCommandHandler::class,

            GetTestByIdQuery::class => GetTestByIdQueryHandler::class,
        ],
    ],
];
