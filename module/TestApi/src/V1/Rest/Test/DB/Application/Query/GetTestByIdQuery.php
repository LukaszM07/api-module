<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\Query;

use Application\Architectures\Tactician\Query;

final class GetTestByIdQuery implements Query
{
    /** @var  int */
    private $id;

    /**
     * GetTestByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}