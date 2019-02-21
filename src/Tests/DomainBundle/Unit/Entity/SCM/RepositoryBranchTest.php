<?php

namespace Tests\DomainBundle\Unit\Entity\SCM;

use DomainBundle\Entity\SCM\RepositoryBranch;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class RepositoryBranchTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = RepositoryBranch::class;
}
