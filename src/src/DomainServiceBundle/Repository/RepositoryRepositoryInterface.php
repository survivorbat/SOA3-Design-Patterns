<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\SCM\Repository;

interface RepositoryRepositoryInterface
{
    /**
     * @return Repository[]|array
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
     * @return Repository|null
     */
    public function findById(string $id): ?Repository;

    /**
     * @param array $criteria
     * @return Repository|null
     */
    public function findOneBy(array $criteria): ?Repository;

    /**
     * @param Repository $repository
     */
    public function create(Repository $repository): void;

    /**
     * @param Repository $repository
     */
    public function update(Repository $repository): void;

    /**
     * @param Repository $repository
     */
    public function delete(Repository $repository): void;
}
