<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Infrastructure\ReadModel;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Types\IntegerType;
use TestApi\V1\Rest\Test\DB\Application\ReadModel\TestReadModelInterface;
use ZF\Hal\Exception\InvalidArgumentException;

final class DbalTestReadModel implements TestReadModelInterface
{
    /** @var  Connection */
    private $connection;

    /**
     * DbalTestReadModel constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $id
     * @return mixed
     */
    function getById(int $id)
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $expr = $queryBuilder->expr();

        $queryBuilder->from('test')
            ->where($expr->eq('id', ':id'))
            ->setParameter('id', $id, IntegerType::INTEGER)
            ->select('*');

        $result = $queryBuilder->execute()->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            throw new InvalidArgumentException('not found', 404);
        }

        return $result;
    }
}