<?php

namespace Tests\DomainBundle\Unit\Entity;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentState;
use http\Exception\BadMethodCallException;
use PHPUnit\Framework\TestCase;

class BacklogComponentTest extends TestCase
{
    /** @var BacklogComponent $initialState */
    private $initialState;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->initialState = $this->createMock(BacklogComponentState::class);
    }

    /**
     * @return void
     */
    public function testIfSimpleGettersAndSettersWork(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass->setTitle('Title');
        $this->assertEquals('Title', $dummyClass->getTitle());

        $dummyClass->setDescription('Description');
        $this->assertEquals('Description', $dummyClass->getDescription());

        $dummyClass->setPriority(5);
        $this->assertEquals(5, $dummyClass->getPriority());

        $dummyClass->setId(1);
        $this->assertEquals(1, $dummyClass->getId());

        $dummyClass->setScore(50);
        $this->assertEquals(50, $dummyClass->getScore());
    }

    /**
     * @return void
     */
    public function testIfAddingComponentThrowsException(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass2 = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->addComponent($dummyClass2);
    }

    /**
     * @return void
     */
    public function testIfRemovingComponentThrowsException(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass2 = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->removeComponent($dummyClass2);
    }

    /**
     * @return void
     */
    public function testIfGetChildThrowsException(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->getChild(0);
    }

    /**
     * @return void
     */
    public function testIfGetChildrenReturnsNull(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $this->assertNull($dummyClass->getChildren());
    }

    /**
     * @return void
     */
    public function testIfSetCurrentStateWorks(): void
    {
        $dummyClass = new class($this->initialState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyState = $this->createMock(BacklogComponentState::class);

        $this->assertEquals($this->initialState, $dummyClass->getCurrentState());
        $dummyClass->setCurrentState($dummyState);
        $this->assertEquals($dummyState, $dummyClass->getCurrentState());
    }

    /**
     * @return void
     */
    public function testIfIsFinishedCallsState(): void
    {
        $dummyState = $this->createMock(BacklogComponentState::class);
        $dummyState->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);

        $dummyClass = new class($dummyState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass->isFinished();
    }

    /**
     * @return void
     */
    public function testIfFinishCallsState(): void
    {
        $dummyState = $this->createMock(BacklogComponentState::class);
        $dummyState->expects($this->once())
            ->method('finish');

        $dummyClass = new class($dummyState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass->finish();
    }

    /**
     * @return void
     */
    public function testIfStartCallsState(): void
    {
        $dummyState = $this->createMock(BacklogComponentState::class);
        $dummyState->expects($this->once())
            ->method('start');

        $dummyClass = new class($dummyState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass->start();
    }

    /**
     * @return void
     */
    public function testIfCancelCallsState(): void
    {
        $dummyState = $this->createMock(BacklogComponentState::class);
        $dummyState->expects($this->once())
            ->method('cancel');

        $dummyClass = new class($dummyState) extends BacklogComponent {
            public function canBeFinished(): bool
            {
                return false;
            }
            public function getScore(): int
            {
                return $this->score;
            }
        };

        $dummyClass->cancel();
    }
}
