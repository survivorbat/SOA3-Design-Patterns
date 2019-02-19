<?php

namespace DomainBundle\Entity\DevOps;

class PipelineBuild
{
    /** @var string|null $id */
    private $id;
    /** @var int $resultExitCode */
    private $resultExitCode = 0;
    /** @var string $logs */
    private $logs = "";
    /** @var PipelineTaskInterface[]|array $tasks */
    private $tasks = [];

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getResultExitCode(): int
    {
        return $this->resultExitCode;
    }

    /**
     * @param int $resultExitCode
     */
    public function setResultExitCode(int $resultExitCode): void
    {
        $this->resultExitCode = $resultExitCode;
    }

    /**
     * @return string
     */
    public function getLogs(): string
    {
        return $this->logs;
    }

    /**
     * @param string $logs
     */
    public function setLogs(string $logs): void
    {
        $this->logs = $logs;
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
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }
}
