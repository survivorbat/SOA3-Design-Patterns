<?php

namespace DomainBundle\Entity;

interface EntityExportHandlerInterface
{
    /**
     * @param Exportable $entity
     */
    public function export(Exportable $entity): void;
}
