<?php

namespace Tests\DomainBundle\Unit\Entity;

use DomainBundle\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $classs */
    protected $class = Project::class;
}