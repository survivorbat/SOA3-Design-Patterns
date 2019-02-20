<?php

namespace Tests\DomainBundle\Unit\Entity\SCM;

use DomainBundle\Entity\SCM\RepositoryCommit;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class RepositoryCommitTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = RepositoryCommit::class;
}