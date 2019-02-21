<?php

namespace DomainBundle\Entity\DevOps;

interface PipelineTaskInterface
{
    /**
     * @return int
     */
    public function execute(): int;
}
