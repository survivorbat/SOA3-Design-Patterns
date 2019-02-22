<?php

namespace ApplicationServiceBundle\Service\PipelineTaskInService;

use DomainBundle\Entity\DevOps\PipelineTaskInterface;

interface PipelineTaskServiceInterface
{
    /**
     * @return PipelineTaskInterface[]|array
     */
    public function findAll(): array;

    /**
     * @param array $criteria
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria, array $order): array;

    /**
     * @param $id
     * @return PipelineTaskInterface|null
     */
    public function findById($id): ?PipelineTaskInterface;

    /**
     * @param array $criteria
     * @return PipelineTaskInterface|null
     */
    public function findOneBy(array $criteria): ?PipelineTaskInterface;

    /**
     * @param PipelineTaskInterface $repository
     */
    public function create(PipelineTaskInterface $repository): void;

    /**
     * @param PipelineTaskInterface $repository
     */
    public function update(PipelineTaskInterface $repository): void;

    /**
     * @param PipelineTaskInterface $repository
     */
    public function delete(PipelineTaskInterface $repository): void;
}
