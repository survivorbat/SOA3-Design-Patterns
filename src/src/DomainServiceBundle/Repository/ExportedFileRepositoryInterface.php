<?php

namespace DomainServiceBundle\Repository;

interface ExportedFileRepositoryInterface
{
    /**
     * @return \SplFileInfo[]|array
     */
    public function findAll(): array;

    /**
     * @param array $criteria
     * @param array $order
     * @return \SplFileInfo|array
     */
    public function findBy(array $criteria, array $order): array;

    /**
     * @param array $criteria
     * @return \SplFileInfo
     */
    public function findOneBy(array $criteria): \SplFileInfo;

    /**
     * @param string $backlogComponent
     */
    public function delete(string $backlogComponent): void;
}
