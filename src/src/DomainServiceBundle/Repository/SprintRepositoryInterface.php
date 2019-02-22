<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\Sprint;

interface SprintRepositoryInterface
{
    /**
     * @return Sprint[]|array
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
     * @return Sprint|null
     */
    public function findById(string $id): ?Sprint;

    /**
     * @param array $criteria
     * @return Sprint|null
     */
    public function findOneBy(array $criteria): ?Sprint;

    /**
     * @param Sprint $repository
     */
    public function create(Sprint $repository): void;

    /**
     * @param Sprint $repository
     */
    public function update(Sprint $repository): void;

    /**
     * @param Sprint $repository
     */
    public function delete(Sprint $repository): void;
}
