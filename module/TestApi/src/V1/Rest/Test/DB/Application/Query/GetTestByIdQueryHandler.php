<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\Query;

use TestApi\V1\Rest\Test\DB\Application\ReadModel\TestReadModelInterface;

final class GetTestByIdQueryHandler
{
    /** @var  TestReadModelInterface */
    private $testReadModel;

    /**
     * GetTestByIdQueryHandler constructor.
     * @param TestReadModelInterface $testReadModel
     */
    public function __construct(TestReadModelInterface $testReadModel)
    {
        $this->testReadModel = $testReadModel;
    }

    /**
     * @param GetTestByIdQuery $query
     * @return mixed
     */
    public function handle(GetTestByIdQuery $query)
    {
        return $this->testReadModel->getById($query->getId());
    }
}