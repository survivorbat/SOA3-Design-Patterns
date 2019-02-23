<?php

namespace InfrastructureBundle\Repository;

use DomainBundle\Entity\DevOps\PipelineTaskInterface;
use DomainServiceBundle\Repository\PipelineTaskRepositoryInterface;

class MockPipelineTaskRepository implements PipelineTaskRepositoryInterface
{
    /**
     * @return PipelineTaskInterface[]|array
     */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param array $criteria - fi
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria, array $order): array
    {
        // TODO: Implement findBy() method.
    }

    /**
     * @param $id
     * @return PipelineTaskInterface|null
     */
    public function findById(string $id): ?PipelineTaskInterface
    {
        // TODO: Implement findById() method.
    }

    /**
     * @param array $criteria
     * @return PipelineTaskInterface|null
     */
    public function findOneBy(array $criteria): ?PipelineTaskInterface
    {
        // TODO: Implement findOneBy() method.
    }

    /**
     * @param PipelineTaskInterface $repository
     */
    public function create(PipelineTaskInterface $repository): void
    {
        // TODO: Implement create() method.
    }

    /**
     * @param PipelineTaskInterface $repository
     */
    public function update(PipelineTaskInterface $repository): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @param PipelineTaskInterface $repository
     */
    public function delete(PipelineTaskInterface $repository): void
    {
        // TODO: Implement delete() method.
    }
}
