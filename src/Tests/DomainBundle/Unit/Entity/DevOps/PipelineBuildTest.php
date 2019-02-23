<?php

namespace Tests\DomainBundle\Unit\Entity\DevOps;

use DomainBundle\Entity\DevOps\PipelineBuild;
use DomainBundle\Entity\DevOps\PipelineTaskInterface;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class PipelineBuildTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = PipelineBuild::class;

    /**
     * @return void
     */
    public function testIfRunReturns0WithNoTasks(): void
    {
        $build = new PipelineBuild();
        $this->assertEquals(0, $build->run());
    }

    /**
     * @return void
     */
    public function testIfTaskInListGetsExecutedWithSuccess(): void
    {
        $mockTask = $this->createMock(PipelineTaskInterface::class);

        $mockTask->expects($this->once())
            ->method('execute')
            ->willReturn(0);

        $build = new PipelineBuild();
        $build->setTasks([$mockTask]);

        $this->assertEquals(0, $build->run());
    }

    /**
     * @return void
     */
    public function testIfTaskInListGetsExecutedWithFailure(): void
    {
        $mockTask = $this->createMock(PipelineTaskInterface::class);

        $mockTask->expects($this->once())
            ->method('execute')
            ->willReturn(1);

        $build = new PipelineBuild();
        $build->setTasks([$mockTask]);

        $this->assertEquals(1, $build->run());
    }

    /**
     * @return void
     */
    public function testIfTasksInListGetsExecuted(): void
    {
        $mockTask = $this->createMock(PipelineTaskInterface::class);
        $mockTask->expects($this->once())
            ->method('execute')
            ->willReturn(0);

        $mockTask2 = $this->createMock(PipelineTaskInterface::class);
        $mockTask2->expects($this->once())
            ->method('execute')
            ->willReturn(0);

        $mockTask3 = $this->createMock(PipelineTaskInterface::class);
        $mockTask3->expects($this->once())
            ->method('execute')
            ->willReturn(0);

        $build = new PipelineBuild();
        $build->setTasks([$mockTask, $mockTask2, $mockTask3]);

        $this->assertEquals(0, $build->run());
    }

    /**
     * @return void
     */
    public function testIfRunShortCircuitsWithFailedTask(): void
    {
        $mockTask = $this->createMock(PipelineTaskInterface::class);
        $mockTask->expects($this->once())
            ->method('execute')
            ->willReturn(0);

        $mockTask2 = $this->createMock(PipelineTaskInterface::class);
        $mockTask2->expects($this->once())
            ->method('execute')
            ->willReturn(3);

        $mockTask3 = $this->createMock(PipelineTaskInterface::class);
        $mockTask3->expects($this->never())
            ->method('execute')
            ->willReturn(0);

        $build = new PipelineBuild();
        $build->setTasks([$mockTask, $mockTask2, $mockTask3]);

        $this->assertEquals(3, $build->run());
    }
}
