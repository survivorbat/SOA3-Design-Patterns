<?php

namespace InfrastructureBundle\Entity\DevOps;

use DomainBundle\Entity\DevOps\PipelineTaskInterface;

class PipelineGitCloneTask implements PipelineTaskInterface
{
    /**
     * @return int
     */
    public function execute(): int
    {
    }
}
