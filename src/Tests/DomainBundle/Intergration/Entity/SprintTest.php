<?php

namespace Tests\DomainBundle\Intergration\Entity;

use DomainBundle\Entity\EntityExportHandlerInterface;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintTest extends TestCase
{
    /** @var EntityExportHandlerInterface $exportHandler */
    private $exportHandler;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->exportHandler = $this->createMock(EntityExportHandlerInterface::class);
    }

    /**
     * @return void
     */
    public function testIfSprintGoesFromNewToClosed()
    {
        $newState = new SprintStateNew();
        $sprint = new Sprint($this->exportHandler, $newState);

        $sprint->start();
        $sprint->finish();
        $sprint->close();

        $this->expectException(\BadMethodCallException::class);

        $sprint->close();
    }

    /**
     * @return void
     */
    public function testIfSprintGoesFromNewToCanceled()
    {
        $newState = new SprintStateNew();
        $sprint = new Sprint($this->exportHandler, $newState);

        $sprint->start();
        $sprint->finish();
        $sprint->cancel();

        $this->expectException(\BadMethodCallException::class);

        $sprint->cancel();
    }
}
