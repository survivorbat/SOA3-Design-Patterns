<?php

namespace InfrastructureBundle\Repository;

use DomainServiceBundle\Repository\ExportedFileRepositoryInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class ExportedFileRepository implements ExportedFileRepositoryInterface
{
    /** @var Finder $finder */
    private $finder;
    /** @var Filesystem $fileSystem */
    private $fileSystem;
    /** @var string $exportedFileDirectory */
    private $exportedFileDirectory;

    /**
     * ExportedFileRepository constructor.
     * @param Finder $finder
     * @param Filesystem $filesystem
     * @param string $exportedFileDirectory
     */
    public function __construct(
        Finder $finder,
        Filesystem $filesystem,
        $exportedFileDirectory
    ) {
        $this->finder = $finder;
        $this->fileSystem = $filesystem;
        $this->exportedFileDirectory = $exportedFileDirectory;
    }

    /**
     * @return \SplFileInfo[]|array
     */
    public function findAll(): array
    {
        $files = $this->finder->files()
            ->in($this->exportedFileDirectory);

        return iterator_to_array($files->getIterator());
    }

    /**
     * @param array $criteria
     * @param array $order
     * @return \SplFileInfo|array
     */
    public function findBy(array $criteria, array $order): array
    {
        // TODO: Implement findBy() method.
    }

    /**
     * @param array $criteria
     * @return \SplFileInfo
     */
    public function findOneBy(array $criteria): \SplFileInfo
    {
        // TODO: Implement findOneBy() method.
    }

    /**
     * @param string $file
     */
    public function delete(string $file): void
    {
        $this->fileSystem->remove($file);
    }
}
