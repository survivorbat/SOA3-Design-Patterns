<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\BacklogComponent;

interface BacklogComponentRepositoryInterface
{
    /**
     * @return BacklogComponent[]|array
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
     * @return BacklogComponent|null
     */
    public function findById(string $id): BacklogComponent;

    /**
     * @param array $criteria
     * @return BacklogComponent|null
     */
    public function findOneBy(array $criteria): BacklogComponent;

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function create(BacklogComponent $backlogComponent): void;

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function update(BacklogComponent $backlogComponent): void;

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function delete(BacklogComponent $backlogComponent): void;
}
