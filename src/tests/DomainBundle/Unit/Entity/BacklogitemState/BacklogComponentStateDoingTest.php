<?php

namespace Tests\DomainBundle\Unit\Entity\BacklogitemState;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDoing;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDone;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use PHPUnit\Framework\TestCase;

class BacklogComponentStateDoingTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfStartThrowsException(): void
    {
        /** @var BacklogComponent $backlogComponent */
        $backlogComponent = $this->createMock(BacklogComponent::class);

        $backlogComponentState = new BacklogComponentStateDoing();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->start($backlogComponent);
    }

    /**
     * @return void
     */
    public function testIfFinishThrowsExceptionIfItemCanNotBeFinished(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentMock->method('isFinished')
            ->willReturn(false);

        $backlogComponentState = new BacklogComponentStateDoing();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->finish($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfFinishChangesStateIfItemCanBeFinished(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentMock->method('isFinished')
            ->willReturn(true);

        $backlogComponentState = new BacklogComponentStateDoing();

        $backlogComponentMock->expects($this->once())
            ->method('setCurrentState')
            ->with(new BacklogComponentStateDone());

        $backlogComponentState->finish($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfItemCanNotBeFinishedWithSubItems(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentMock->method('isFinished')
            ->willReturn(true);

        $backlogComponentMock->method('getChildren')
            ->willReturn([null, null, null]);

        $backlogComponentState = new BacklogComponentStateDoing();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->finish($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfItemCanNotBeFinishedWithUnfinishedComponent(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentMock->method('isFinished')
            ->willReturn(false);

        $backlogComponentState = new BacklogComponentStateDoing();

        $this->expectException(\BadMethodCallException::class);

        $backlogComponentState->finish($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfItemCanBeCanceled(): void
    {
        $backlogComponentMock = $this->createMock(BacklogComponent::class);

        $backlogComponentState = new BacklogComponentStateDoing();

        $backlogComponentMock->expects($this->once())
            ->method('setCurrentState')
            ->with(new BacklogComponentStateTodo());

        $backlogComponentState->cancel($backlogComponentMock);
    }

    /**
     * @return void
     */
    public function testIfStateDoesNotReturnFinished(): void
    {
        $backlogComponentToDoState = new BacklogComponentStateDoing();

        $this->assertFalse($backlogComponentToDoState->isFinished());
    }
}
