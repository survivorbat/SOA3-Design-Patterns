<?php

namespace Tests\DomainBundle\Unit\Entity\BacklogitemState;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDoing;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDone;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use PHPUnit\Framework\TestCase;

class BacklogComponentStateTodoTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfUnimplementedMethodsThrowExceptions(): void
    {
        /** @var BacklogComponent $backlogComponent */
        $backlogComponent = $this->createMock(BacklogComponent::class);

        $backlogComponentState = new BacklogComponentStateTodo();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->finish($backlogComponent);
        $backlogComponentState->cancel($backlogComponent);
    }

    /**
     * @return void
     */
    public function testIfItemCanBeStarted(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentToDoState = new BacklogComponentStateTodo();

        $backlogComponentMock->expects($this->once())
            ->method('setCurrentState')
            ->with(new BacklogComponentStateDoing());

        $backlogComponentToDoState->start($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfStateDoesNotReturnFinished(): void
    {
        $backlogComponentToDoState = new BacklogComponentStateTodo();

        $this->assertFalse($backlogComponentToDoState->isFinished());
    }
}
