<?php

namespace Tests\DomainBundle\Unit\Entity\DevOps;

use DomainBundle\Entity\DevOps\Pipeline;
use DomainBundle\Entity\DevOps\PipelineBuild;
use DomainBundle\Entity\DevOps\PipelineTaskInterface;
use PHPUnit\Framework\TestCase;
use Tests\DomainBundle\Unit\Entity\EntityGetSetTestTrait;

class PipelineTest extends TestCase
{
    use EntityGetSetTestTrait;

    /** @var string $class */
    protected $class = Pipeline::class;

    /**
     * @return void
     */
    public function testIfTasksReturnEmptyArrayWithNoTasksAdded(): void
    {
        $pipeline = new Pipeline();
        $this->assertEmpty($pipeline->getTasks());
    }

    /**
     * @return void
     */
    public function testIfTaskGetsAddedSuccessfully(): void
    {
        /** @var PipelineTaskInterface $pipelineTask */
        $pipelineTask = $this->createMock(PipelineTaskInterface::class);
        
        $pipeline = new Pipeline();

        $pipeline->addPipelineTask($pipelineTask);
        
        $this->assertCount(1, $pipeline->getTasks());
    }

    /**
     * @return void
     */
    public function testIfTaskGetsRemovedSuccessfully(): void
    {
        /** @var PipelineTaskInterface $pipelineTask */
        $pipelineTask = $this->createMock(PipelineTaskInterface::class);

        $pipeline = new Pipeline();

        $pipeline->addPipelineTask($pipelineTask);

        $this->assertCount(1, $pipeline->getTasks());

        $pipeline->removePipelineTask($pipelineTask);

        $this->assertCount(0, $pipeline->getTasks());
    }

    /**
     * @return void
     */
    public function testIfBuildGetsAddedSuccessfully(): void
    {
        $build = $this->createMock(PipelineBuild::class);

        $pipeline = new Pipeline();

        $pipeline->addBuild($build);

        $this->assertContains($build, $pipeline->getBuilds());
    }
}
