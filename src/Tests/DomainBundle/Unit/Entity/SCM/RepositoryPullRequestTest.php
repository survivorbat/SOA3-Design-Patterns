<?php

namespace Tests\DomainBundle\Unit\Entity\SCM;

use DomainBundle\Entity\SCM\RepositoryPullRequest;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class RepositoryPullRequestTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = RepositoryPullRequest::class;
}