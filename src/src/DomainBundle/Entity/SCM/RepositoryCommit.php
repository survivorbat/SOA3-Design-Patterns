<?php

namespace DomainBundle\Entity\SCM;

class RepositoryCommit
{
    /** @var string $id */
    private $id;
    /** @var string $message */
    private $message;
    /** @var string $author */
    private $author;
    /** @var int $size */
    private $size;
    /** @var \DateTime $authored_date */
    private $authored_date;
    /** @var \DateTime $committed_date */
    private $committed_date;
    /** @var RepositoryBranch $branch */
    private $branch;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RepositoryCommit
     */
    public function setId(string $id): RepositoryCommit
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return RepositoryCommit
     */
    public function setMessage(string $message): RepositoryCommit
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return RepositoryCommit
     */
    public function setAuthor(string $author): RepositoryCommit
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return RepositoryCommit
     */
    public function setSize(int $size): RepositoryCommit
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAuthoredDate(): \DateTime
    {
        return $this->authored_date;
    }

    /**
     * @param \DateTime $authored_date
     * @return RepositoryCommit
     */
    public function setAuthoredDate(\DateTime $authored_date): RepositoryCommit
    {
        $this->authored_date = $authored_date;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCommittedDate(): \DateTime
    {
        return $this->committed_date;
    }

    /**
     * @param \DateTime $committed_date
     * @return RepositoryCommit
     */
    public function setCommittedDate(\DateTime $committed_date): RepositoryCommit
    {
        $this->committed_date = $committed_date;
        return $this;
    }

    /**
     * @return RepositoryBranch
     */
    public function getBranch(): RepositoryBranch
    {
        return $this->branch;
    }

    /**
     * @param RepositoryBranch $branch
     * @return RepositoryCommit
     */
    public function setBranch(RepositoryBranch $branch): RepositoryCommit
    {
        $this->branch = $branch;
        return $this;
    }
}
