<?php

namespace DomainBundle\Entity\SCM;

class RepositoryPullRequest
{
    /** @var string|null $id */
    private $id;
    /** @var RepositoryBranch|null $sourceBranch */
    private $sourceBranch;
    /** @var RepositoryBranch|null $destinationBranch */
    private $destinationBranch;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return RepositoryPullRequest
     */
    public function setId(?string $id): RepositoryPullRequest
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return RepositoryBranch|null
     */
    public function getSourceBranch(): ?RepositoryBranch
    {
        return $this->sourceBranch;
    }

    /**
     * @param RepositoryBranch|null $sourceBranch
     * @return RepositoryPullRequest
     */
    public function setSourceBranch(?RepositoryBranch $sourceBranch): RepositoryPullRequest
    {
        $this->sourceBranch = $sourceBranch;
        return $this;
    }

    /**
     * @return RepositoryBranch|null
     */
    public function getDestinationBranch(): ?RepositoryBranch
    {
        return $this->destinationBranch;
    }

    /**
     * @param RepositoryBranch|null $destinationBranch
     * @return RepositoryPullRequest
     */
    public function setDestinationBranch(?RepositoryBranch $destinationBranch): RepositoryPullRequest
    {
        $this->destinationBranch = $destinationBranch;
        return $this;
    }
}
