<?php

namespace DomainBundle\Entity\SCM;

class RepositoryBranch
{
    /** @var string $id */
    private $id;
    /** @var string $name */
    private $name;
    /** @var RepositoryCommit[]|array $commits */
    private $commits;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RepositoryBranch
     */
    public function setId(string $id): RepositoryBranch
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RepositoryBranch
     */
    public function setName(string $name): RepositoryBranch
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array|RepositoryCommit[]
     */
    public function getCommits()
    {
        return $this->commits;
    }

    /**
     * @param array|RepositoryCommit[] $commits
     * @return RepositoryBranch
     */
    public function setCommits($commits)
    {
        $this->commits = $commits;
        return $this;
    }
}
