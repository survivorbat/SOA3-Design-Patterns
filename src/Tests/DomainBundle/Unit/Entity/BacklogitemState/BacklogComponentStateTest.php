<?php

namespace Tests\DomainBundle\Unit\Entity\BacklogitemState;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentState;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDoing;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDone;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use PHPUnit\Framework\TestCase;

class BacklogComponentStateTest extends TestCase
{
    /** @var BacklogComponentState $testClass */
    private $testClass;

    /**
     * Setup testing variables
     */
    public function setUp()
    {
        $this->testClass = new class extends BacklogComponentState {
            // No custom implementations, just checking the default implementations of this class
        };
    }

    /**
     * @return void
     */
    public function testIfStartThrowsException(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $this->expectException(\BadMethodCallException::class);

        $this->testClass->start($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfCancelThrowsException(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $this->expectException(\BadMethodCallException::class);

        $this->testClass->cancel($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfFinishThrowsException(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $this->expectException(\BadMethodCallException::class);

        $this->testClass->finish($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfDefaultStateIsNotFinished(): void
    {
        $this->assertFalse($this->testClass->isFinished());
    }

    /**
     * @return void
     */
    public function testIfDefaultStateIsCanNotFinished(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $this->assertFalse($this->testClass->canBeFinished($backlogComponentMock));
    }
}
