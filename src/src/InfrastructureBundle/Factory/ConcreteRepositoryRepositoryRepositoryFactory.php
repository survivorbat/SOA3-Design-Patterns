<?php

namespace InfrastructureBundle\Bundle\Service;

use DomainBundle\Type\RepositoryType;
use DomainServiceBundle\Factory\RepositoryRepositoryFactory;
use DomainServiceBundle\Repository\RepositoryRepository;
use InfrastructureBundle\Repository\GitRepositoryRepository;
use InfrastructureBundle\Repository\SVNRepositoryRepository;
use Symfony\Component\OptionsResolver\Exception\InvalidArgumentException;

class ConcreteRepositoryRepositoryRepositoryFactory implements RepositoryRepositoryFactory
{
    /**
     * @param string $type
     * @return RepositoryRepository
     */
    public function getRepositoryInstance(string $type): RepositoryRepository
    {
        return new ($type .  "RepositoryRepository");
    }
}