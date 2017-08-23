<?php
namespace TestApi\V1\Rest\Test;

use Application\Architectures\Tactician\CommandBus\CommandBusInterface;
use Application\Architectures\Tactician\QueryBus\QueryBusInterface;
use TestApi\V1\Rest\Test\DB\Application\Command\CreateTestCommand;
use TestApi\V1\Rest\Test\DB\Application\Query\GetTestByIdQuery;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class TestResource extends AbstractResourceListener
{
    /** @var  CommandBusInterface */
    private $commandBus;
    /**
     * @var QueryBusInterface
     */
    private $queryBus;

    /**
     * TestResource constructor.
     * @param CommandBusInterface $commandBus
     * @param QueryBusInterface $queryBus
     */
    public function __construct(CommandBusInterface $commandBus, QueryBusInterface $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $testCommand = new CreateTestCommand('!!==!!');
        $this->commandBus->handle($testCommand);

        return true;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $query = new GetTestByIdQuery($id);
        $result = $this->queryBus->handle($query);

        return $result;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
