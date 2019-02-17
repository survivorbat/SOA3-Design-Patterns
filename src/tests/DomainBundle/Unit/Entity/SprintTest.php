<?php
/**
 * Created by PhpStorm.
 * User: gerben
 * Date: 17-2-19
 * Time: 21:22
 */

namespace DomainBundle\Entity;


use ApplicationServiceBundle\Entity\SprintObserver\SprintEmailObserver;
use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandler;
use PHPUnit\Framework\TestCase;

/**
 * Class SprintTest
 * @package DomainBundle\Entity
 */
class SprintTest extends TestCase
{
    /** @var Sprint $sprint */
    private $sprint;

    public function setUp(): void
    {
        $entityExportHandler = new JSONExportHandler();
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
}
