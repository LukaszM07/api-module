<?php

namespace TestApi\V1\Rest\Test\DB\Application\ReadModel;

interface TestReadModelInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    function getById(int $id);
}