<?php

namespace Tests\DomainBundle\Unit\Entity\SCM;

use DomainBundle\Entity\SCM\Repository;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class RepositoryTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = Repository::class;
}
