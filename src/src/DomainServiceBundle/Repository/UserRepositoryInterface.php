<?php

namespace DomainServiceBundle\Repository;

use DomainBundle\Entity\User;

interface UserRepositoryInterface
{
    /**
     * @return User[]|array
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
     * @return User|null
     */
    public function findById(string $id): ?User;

    /**
     * @param array $criteria
     * @return User|null
     */
    public function findOneBy(array $criteria): ?User;

    /**
     * @param User $user
     */
    public function create(User $user): void;

    /**
     * @param User $user
     */
    public function update(User $user): void;

    /**
     * @param User $user
     */
    public function delete(User $user): void;
}
