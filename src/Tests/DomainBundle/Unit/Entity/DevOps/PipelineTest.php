<?php

namespace Tests\DomainBundle\Unit\Entity\DevOps;

use DomainBundle\Entity\DevOps\Pipeline;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class PipelineTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = Pipeline::class;
}