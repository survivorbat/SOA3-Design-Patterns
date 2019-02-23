<?php

namespace tests\DomainBundle\Unit\Entity;

use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandlerInterface;
use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\EntityExportHandlerInterface;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintState;
use PHPUnit\Framework\TestCase;

class SprintTest extends TestCase
{
    /** @var Sprint $sprint */
    private $sprint;

    /**
     * Setup
     *
     * @return void
     */
    public function setUp(): void
    {
        $entityExportHandler = $this->createMock(EntityExportHandlerInterface::class);
        $initialState = $this->createMock(SprintState::class);
        $this->sprint = new Sprint($entityExportHandler, $initialState);
    }

    /**
     * @return void
     */
    public function testObserverGetNotified()
    {
        $observer = $this->getMockBuilder('SplObserver')
            ->setMethods(['update'])
            ->getMock();
        $observer->expects($this->once())
            ->method('update');
        $this->sprint->attach($observer);
        $this->sprint->notify();
    }

    /**
     * @return void
     */
    public function testObserverCanDetach()
    {
        $observer = $this->getMockBuilder('SplObserver')
            ->setMethods(['update'])
            ->getMock();
        $observer->expects($this->once())
            ->method('update');
        $this->sprint->attach($observer);
        $this->sprint->notify();
        $this->sprint->detach($observer);
        $this->sprint->notify();
    }

    /**
     * @return void
     */
    public function testSetId()
    {
        $this->sprint->setId('0');
        $this->assertEquals("0", $this->sprint->getId());
    }

    /**
     * @return void
     */
    public function testSetExportHandler()
    {
        $exportHandler = $this->createMock(EntityExportHandlerInterface::class);
        $this->sprint->setExportHandler($exportHandler);
        $this->assertEquals($exportHandler, $this->sprint->getExportHandler());
    }

    /**
     * @return void
     */
    public function testItCanHaveBacklogItems()
    {
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $this->sprint->addBacklogComponent($backlogComponent);
        $this->assertEquals("1", $this->sprint->backlogItemsToDo());
    }
}
