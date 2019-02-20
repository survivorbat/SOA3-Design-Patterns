<?php

namespace Tests\DomainBundle\Unit\Entity\Forum;

use DomainBundle\Entity\Forum\ForumComment;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class ForumCommentTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = ForumComment::class;
}