<?php

namespace Tests\DomainBundle\Unit\Entity\BacklogitemState;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDoing;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDone;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use PHPUnit\Framework\TestCase;

class BacklogComponentStateDoneTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfStartThrowsException(): void
    {
        /** @var BacklogComponent $backlogComponent */
        $backlogComponent = $this->createMock(BacklogComponent::class);

        $backlogComponentState = new BacklogComponentStateDone();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->start($backlogComponent);
    }

    /**
     * @return void
     */
    public function testIfFinishThrowsException(): void
    {
        /** @var BacklogComponent $backlogComponent */
        $backlogComponent = $this->createMock(BacklogComponent::class);

        $backlogComponentState = new BacklogComponentStateDone();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->finish($backlogComponent);
    }

    /**
     * @return void
     */
    public function testIfItemCanBeCanceled(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentToDoState = new BacklogComponentStateDone();

        $backlogComponentMock->expects($this->once())
            ->method('setCurrentState')
            ->with(new BacklogComponentStateTodo());

        $backlogComponentToDoState->cancel($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfStateReturnsFinished(): void
    {
        $backlogComponentToDoState = new BacklogComponentStateDone();

        $this->assertTrue($backlogComponentToDoState->isFinished());
    }
}
