<?php

namespace InfrastructureBundle\Bundle\Service;

use DomainBundle\Type\RepositoryType;
use DomainServiceBundle\Factory\RepositoryRepositoryFactoryInterface;
use DomainServiceBundle\Repository\RepositoryRepositoryInterface;
use InfrastructureBundle\Repository\GitRepositoryRepositoryInterface;
use InfrastructureBundle\Repository\SVNRepositoryRepositoryInterface;
use Symfony\Component\OptionsResolver\Exception\InvalidArgumentException;

class ConcreteRepositoryRepositoryFactoryInterface implements RepositoryRepositoryFactoryInterface
{
    /**
     * @param string $type
     * @return RepositoryRepositoryInterface
     */
    public function getRepositoryInstance(string $type): RepositoryRepositoryInterface
    {
        return new ($type .  "RepositoryRepositoryInterface");
    }
}