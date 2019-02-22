<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\Project;

interface ProjectRepositoryInterface
{
    /**
     * @return Project[]|array
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
     * @return Project|null
     */
    public function findById(string $id): ?Project;

    /**
     * @param array $criteria
     * @return Project|null
     */
    public function findOneBy(array $criteria): ?Project;

    /**
     * @param Project $project
     */
    public function create(Project $project): void;

    /**
     * @param Project $project
     */
    public function update(Project $project): void;

    /**
     * @param Project $project
     */
    public function delete(Project $project): void;
}
