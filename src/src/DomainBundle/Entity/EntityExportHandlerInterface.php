<?php

namespace DomainBundle\Entity;

interface EntityExportHandlerInterface
{
    /**
     * @param \Serializable $sprint
     */
    public function export(\Serializable $sprint): void;
}
