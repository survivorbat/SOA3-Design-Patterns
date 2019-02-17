<?php

namespace ApplicationServiceBundle\Service\ExportHandler;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\EntityExportHandler;

class JSONExportHandler implements EntityExportHandler
{
    /**
     * @param \Serializable $sprint
     */
    public function export(\Serializable $sprint): void
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
