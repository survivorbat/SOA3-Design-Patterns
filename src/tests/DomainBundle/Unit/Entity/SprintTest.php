<?php

namespace tests\DomainBundle\Unit;

use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandlerInterface;
use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\Sprint;
use PHPUnit\Framework\TestCase;

class SprintTest extends TestCase
{
    /** @var Sprint $sprint */
    private $sprint;

    public function setUp(): void
    {
        $entityExportHandler = new JSONExportHandlerInterface();
        $this->sprint = new Sprint($entityExportHandler);
    }

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

    public function testSetId()
    {
        $this->sprint->setId('0');
        $this->assertEquals("0", $this->sprint->getId());
    }

    public function testItCanHaveBacklogItems()
    {
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $this->sprint->addBacklogComponent($backlogComponent);
        $this->assertEquals("1", $this->sprint->backlogItemsToDo());
    }
}
