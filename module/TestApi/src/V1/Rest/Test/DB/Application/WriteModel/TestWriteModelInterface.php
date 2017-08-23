<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\WriteModel;

interface TestWriteModelInterface
{
    /**
     * @param string $name
     */
    function create(string $name): void;
}