<?php

namespace ApplicationServiceBundle\Service\ExportHandler;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\EntityExportHandlerInterface;

class JSONExportHandlerInterface implements EntityExportHandlerInterface
{
    /**
     * @param \Serializable $sprint
     */
    public function export(\Serializable $sprint): void
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
