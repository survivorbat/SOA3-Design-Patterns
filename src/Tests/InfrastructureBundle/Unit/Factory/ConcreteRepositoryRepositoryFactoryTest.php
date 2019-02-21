<?php

namespace Tests\InfrastructureBundle\Unit\Factory;

use InfrastructureBundle\Factory\ConcreteRepositoryRepositoryFactory;
use InfrastructureBundle\Repository\GitRepositoryRepository;
use InfrastructureBundle\Repository\SVNRepositoryRepository;
use PHPUnit\Framework\TestCase;

class ConcreteRepositoryRepositoryFactoryTest extends TestCase
{
    /**
     * TODO: See if it is possible to mock the repository
     *
     * @return void
     */
    public function testIfFactoryReturnsProperInstanceWithGit(): void
    {
        $repositoryFactory = new ConcreteRepositoryRepositoryFactory();

        $gitRepository = $repositoryFactory->getRepositoryInstance('Git');

        $this->assertInstanceOf(GitRepositoryRepository::class, $gitRepository);
    }

    /**
     * TODO: See if it is possible to mock the repository
     *
     * @return void
     */
    public function testIfFactoryReturnsProperInstanceWithSVN(): void
    {
        $repositoryFactory = new ConcreteRepositoryRepositoryFactory();

        $gitRepository = $repositoryFactory->getRepositoryInstance('SVN');

        $this->assertInstanceOf(SVNRepositoryRepository::class, $gitRepository);
    }
}
