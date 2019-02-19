<?php

namespace InfrastructureBundle\Factory;

use DomainServiceBundle\Factory\RepositoryRepositoryFactoryInterface;
use DomainServiceBundle\Repository\RepositoryRepositoryInterface;

class ConcreteRepositoryRepositoryFactory implements RepositoryRepositoryFactoryInterface
{
    /**
     * @param string $type
     * @return RepositoryRepositoryInterface
     */
    public function getRepositoryInstance(string $type): RepositoryRepositoryInterface
    {
        $type = "InfrastructureBundle\Repository\\" . $type . "RepositoryRepository";
        return new $type();
    }
}
