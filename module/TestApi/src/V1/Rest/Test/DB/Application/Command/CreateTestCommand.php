<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\Command;

use Application\Architectures\Tactician\Command;

final class CreateTestCommand implements Command
{
    /** @var  string */
    private $name;

    /**
     * CreateTestCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}