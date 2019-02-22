<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\DevOps\PipelineTaskInterface;

interface PipelineTaskRepositoryInterface
{
    /**
     * @return PipelineTaskInterface[]|array
     */
    public function findAll(): array;

    /**
     * @param array $criteria- fi
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria, array $order): array;

    /**
     * @param $id
     * @return PipelineTaskInterface|null
     */
    public function findById(string $id): ?PipelineTaskInterface;

    /**
     * @param array $criteria
     * @return PipelineTaskInterface|null
     */
    public function findOneBy(array $criteria): ?PipelineTaskInterface;

    /**
     * @param PipelineTaskInterface $pipelineTask
     */
    public function create(PipelineTaskInterface $pipelineTask): void;

    /**
     * @param PipelineTaskInterface $pipelineTask
     */
    public function update(PipelineTaskInterface $pipelineTask): void;

    /**
     * @param PipelineTaskInterface $pipelineTask
     */
    public function delete(PipelineTaskInterface $pipelineTask): void;
}
