<?php

namespace InfrastructureBundle\Repository;

use DomainBundle\Entity\SCM\Repository;
use DomainServiceBundle\Repository\RepositoryRepositoryInterface;

class GitRepositoryRepository implements RepositoryRepositoryInterface
{
    /**
     * @return Repository[]|array
     */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param array $criteria
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria, array $order): array
    {
        // TODO: Implement findBy() method.
    }

    /**
     * @param $id
     * @return Repository|null
     */
    public function findById(string $id): ?Repository
    {
        // TODO: Implement findById() method.
    }

    /**
     * @param array $criteria
     * @return Repository|null
     */
    public function findOneBy(array $criteria): ?Repository
    {
        // TODO: Implement findOneBy() method.
    }

    /**
     * @param Repository $repository
     */
    public function create(Repository $repository): void
    {
        // TODO: Implement create() method.
    }

    /**
     * @param Repository $repository
     */
    public function update(Repository $repository): void
    {
        // TODO: Implement update() method.
    }

    /**
     * @param Repository $repository
     */
    public function delete(Repository $repository): void
    {
        // TODO: Implement delete() method.
    }
}
