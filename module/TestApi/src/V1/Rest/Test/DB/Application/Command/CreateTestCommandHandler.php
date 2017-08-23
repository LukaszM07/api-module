<?php

declare(strict_types=1);

namespace TestApi\V1\Rest\Test\DB\Application\Command;

use TestApi\V1\Rest\Test\DB\Application\WriteModel\TestWriteModelInterface;

final class CreateTestCommandHandler
{
    /** @var  TestWriteModelInterface */
    private $testWriteModel;

    /**
     * CreateTestCommandHandler constructor.
     * @param TestWriteModelInterface $testWriteModel
     */
    public function __construct(TestWriteModelInterface $testWriteModel)
    {
        $this->testWriteModel = $testWriteModel;
    }

    /**
     * @param CreateTestCommand $command
     */
    public function handle(CreateTestCommand $command)
    {
        $this->testWriteModel->create($command->getName());
    }
}