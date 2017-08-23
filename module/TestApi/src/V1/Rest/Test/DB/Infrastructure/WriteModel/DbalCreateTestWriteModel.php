<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Infrastructure\WriteModel;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\StringType;
use TestApi\V1\Rest\Test\DB\Application\WriteModel\TestWriteModelInterface;

final class DbalCreateTestWriteModel implements TestWriteModelInterface
{
    /** @var  Connection */
    private $connection;

    /**
     * DbalCreateTestWriteModel constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $name
     */
    public function create(string $name): void
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder->insert('test')
            ->values(['name' => ':name'])
            ->setParameter('name', $name, StringType::STRING)
            ->execute();
    }
}