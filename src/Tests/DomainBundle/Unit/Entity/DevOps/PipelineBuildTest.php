<?php

namespace Tests\DomainBundle\Unit\Entity\DevOps;

use DomainBundle\Entity\DevOps\PipelineBuild;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class PipelineBuildTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = PipelineBuild::class;
}
