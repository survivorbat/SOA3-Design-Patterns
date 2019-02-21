<?php

namespace DomainBundle\Entity\SCM;

class RepositoryCommit
{
    /** @var string $id */
    private $id = "";
    /** @var string $message */
    private $message = "";
    /** @var string $author */
    private $author = "";
    /** @var int $size */
    private $size = 0;
    /** @var \DateTime $authoredDate */
    private $authoredDate;
    /** @var \DateTime $committedDate */
    private $committedDate;
    /** @var RepositoryBranch|null $branch */
    private $branch;

    /**
     * RepositoryCommit constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->authoredDate = new \DateTime();
        $this->committedDate = new \DateTime();
    }

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
        return $this->authoredDate;
    }

    /**
     * @param \DateTime $authoredDate
     * @return RepositoryCommit
     */
    public function setAuthoredDate(\DateTime $authoredDate): RepositoryCommit
    {
        $this->authoredDate = $authoredDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCommittedDate(): \DateTime
    {
        return $this->committedDate;
    }

    /**
     * @param \DateTime $committedDate
     * @return RepositoryCommit
     */
    public function setCommittedDate(\DateTime $committedDate): RepositoryCommit
    {
        $this->committedDate = $committedDate;
        return $this;
    }

    /**
     * @return RepositoryBranch|null
     */
    public function getBranch(): ?RepositoryBranch
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
