<?php

namespace Tests\DomainBundle\Unit\Entity;

use DomainBundle\Entity\BacklogItemState\BacklogComponentState;
use DomainBundle\Entity\BacklogTask;
use PHPUnit\Framework\TestCase;

class BacklogTaskTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfBacklogTaskIsNotFinishedWithOffState(): void
    {
        $mockState = $this->createMock(BacklogComponentState::class);

        $mockState->method('canBeFinished')
            ->willReturn(false);

        $backlogTask = new BacklogTask($mockState);

        $this->assertFalse($backlogTask->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfBacklogTaskIsFinishedWithOnState(): void
    {
        $mockState = $this->createMock(BacklogComponentState::class);

        $mockState->method('canBeFinished')
            ->willReturn(true);

        $backlogTask = new BacklogTask($mockState);

        $this->assertTrue($backlogTask->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfBacklogTaskReturnsProperScore(): void
    {
        $mockState = $this->createMock(BacklogComponentState::class);

        $mockState->method('canBeFinished')
            ->willReturn(true);

        $backlogTask = new BacklogTask($mockState);

        $backlogTask->setScore(10);

        $this->assertEquals(10, $backlogTask->getScore());
    }
}
