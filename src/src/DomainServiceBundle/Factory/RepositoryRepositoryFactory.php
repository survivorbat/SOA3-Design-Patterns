<?php

namespace DomainServiceBundle\Factory;

use DomainBundle\Entity\Repository;
use DomainServiceBundle\Repository\RepositoryRepository;

interface RepositoryRepositoryFactory
{
    /**
     * @param string $type
     * @return RepositoryRepository
     */
    public function getRepositoryInstance(string $type): RepositoryRepository;
}
