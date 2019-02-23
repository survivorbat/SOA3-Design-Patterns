<?php

namespace Tests\DomainBundle\Unit\Entity\SprintState;

use DomainBundle\Entity\EntityExportHandlerInterface;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintState;
use PHPUnit\Framework\TestCase;

class SprintStateTest extends TestCase
{
    /** @var EntityExportHandlerInterface $mockExportHandler */
    private $mockExportHandler;
    /** @var Sprint $mockSprint */
    private $mockSprint;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->mockExportHandler = $this->createMock(EntityExportHandlerInterface::class);
        $this->mockSprint = $this->createMock(Sprint::class);
    }

    /**
     * @return void
     */
    public function testIfIsEditableStandardFalse(): void
    {
        $dummyClass = new class extends SprintState {
            public function getStateDescription(): string
            {
            }
            public function getStateTitle(): string
            {
            }
        };

        $this->assertFalse($dummyClass->isEditable());
    }

    /**
     * @return void
     */
    public function testIfStartThrowsException(): void
    {
        $dummyClass = new class($this->mockExportHandler) extends SprintState {
            public function getStateDescription(): string
            {
            }
            public function getStateTitle(): string
            {
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->start($this->mockSprint);
    }

    /**
     * @return void
     */
    public function testIfFinishThrowsException(): void
    {
        $dummyClass = new class($this->mockExportHandler) extends SprintState {
            public function getStateDescription(): string
            {
            }
            public function getStateTitle(): string
            {
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->finish($this->mockSprint);
    }

    /**
     * @return void
     */
    public function testIfCancelThrowsException(): void
    {
        $dummyClass = new class($this->mockExportHandler) extends SprintState {
            public function getStateDescription(): string
            {
            }
            public function getStateTitle(): string
            {
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->cancel($this->mockSprint);
    }

    /**
     * @return void
     */
    public function testIfCloseThrowsException(): void
    {
        $dummyClass = new class($this->mockExportHandler) extends SprintState {
            public function getStateDescription(): string
            {
            }
            public function getStateTitle(): string
            {
            }
        };

        $this->expectException(\BadMethodCallException::class);

        $dummyClass->close($this->mockSprint);
    }
}
