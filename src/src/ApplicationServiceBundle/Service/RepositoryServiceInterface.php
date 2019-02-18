<?php

namespace ApplicationServiceBundle\Service\RepositoryService;

use DomainBundle\Entity\Repository;

interface RepositoryServiceInterface
{
    /**
     * @return Repository[]|array
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
     * @return Repository|null
     */
    public function findById($id): ?Repository;

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
