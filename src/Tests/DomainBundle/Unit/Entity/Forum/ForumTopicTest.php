<?php

namespace Tests\DomainBundle\Unit\Entity\Forum;

use DomainBundle\Entity\Forum\ForumTopic;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class ForumTopicTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = ForumTopic::class;
}
