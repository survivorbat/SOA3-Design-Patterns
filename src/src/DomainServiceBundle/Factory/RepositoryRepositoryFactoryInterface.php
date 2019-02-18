<?php

namespace DomainServiceBundle\Factory;

use DomainServiceBundle\Repository\RepositoryRepositoryInterface;

interface RepositoryRepositoryFactoryInterface
{
    /**
     * @param string $type
     * @return RepositoryRepositoryInterface
     */
    public function getRepositoryInstance(string $type): RepositoryRepositoryInterface;
}
