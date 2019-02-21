<?php

namespace DomainServiceBundle\Factory;

use DomainServiceBundle\Repository\RepositoryRepositoryInterface;

interface RepositoryRepositoryFactoryInterface
{
    /**
     * Get a repository by VCS name, for example: 'Git' or 'SVN'
     *
     * @param string $type
     * @return RepositoryRepositoryInterface
     */
    public function getRepositoryInstance(string $type): RepositoryRepositoryInterface;
}
