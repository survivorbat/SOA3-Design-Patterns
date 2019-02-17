<?php

namespace DomainBundle\Entity;

interface EntityExportHandler
{
    /**
     * @param \Serializable $sprint
     */
    public function export(\Serializable $sprint): void;
}
