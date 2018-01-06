<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c] 2014-2016 Zend Technologies USA Inc. (http://www.zend.com]
 */

return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db'                     => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
    'doctrine'               => [
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'migrations',
                'namespace' => 'Migrations',
                'table'     => 'migrations',
            ],
        ],
        'configuration'            => [
            'orm_default' => [
                'types' => [
                ],
            ],
        ],
    ],
];
