<?php

namespace DomainBundle\Entity\DevOps;

use DomainBundle\Entity\SCM\Repository;
use DomainBundle\Entity\SCM\RepositoryBranch;

class Pipeline
{
    /** @var string $id */
    private $id = "";
    /** @var string $title */
    private $title = "";
    /** @var Repository|null $repository */
    private $repository;
    /** @var RepositoryBranch|null $repositoryBranch */
    private $repositoryBranch;
    /** @var PipelineTaskInterface[]|array $tasks */
    private $tasks = [];
    /** @var PipelineBuild[]|array $builds */
    private $builds = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Pipeline
     */
    public function setId(string $id): Pipeline
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Pipeline
     */
    public function setTitle(string $title): Pipeline
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Repository|null
     */
    public function getRepository(): ?Repository
    {
        return $this->repository;
    }

    /**
     * @param Repository|null $repository
     * @return Pipeline
     */
    public function setRepository(?Repository $repository): Pipeline
    {
        $this->repository = $repository;
        return $this;
    }

    /**
     * @return RepositoryBranch|null
     */
    public function getRepositoryBranch(): ?RepositoryBranch
    {
        return $this->repositoryBranch;
    }

    /**
     * @param RepositoryBranch|null $repositoryBranch
     * @return Pipeline
     */
    public function setRepositoryBranch(?RepositoryBranch $repositoryBranch): Pipeline
    {
        $this->repositoryBranch = $repositoryBranch;
        return $this;
    }

    /**
     * @return array|PipelineTaskInterface[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param array|PipelineTaskInterface[] $tasks
     * @return Pipeline
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }

    /**
     * @return array|PipelineBuild[]
     */
    public function getBuilds()
    {
        return $this->builds;
    }

    /**
     * @param PipelineBuild $build
     * @return Pipeline
     */
    public function addBuild(PipelineBuild $build): Pipeline
    {
        $this->builds[] = $build;
        return $this;
    }

    /**
     * @param array|PipelineBuild[] $builds
     * @return Pipeline
     */
    public function setBuilds($builds)
    {
        $this->builds = $builds;
        return $this;
    }

    /**
     * @param PipelineTaskInterface $pipelineTask
     * @return Pipeline
     */
    public function addPipelineTask(PipelineTaskInterface $pipelineTask): Pipeline
    {
        $this->tasks[] = $pipelineTask;
        return $this;
    }

    /**
     * @param PipelineTaskInterface $pipelineTask
     * @return Pipeline
     */
    public function removePipelineTask(PipelineTaskInterface $pipelineTask): Pipeline
    {
        $this->tasks = array_filter(
            $this->tasks,
            function (PipelineTaskInterface $taskInList) use ($pipelineTask) {
                return $taskInList !== $pipelineTask;
            }
        );
        return $this;
    }
}
