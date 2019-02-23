<?php

namespace ApplicationServiceBundle\Service\ExportHandler;

use DomainBundle\Entity\EntityExportHandlerInterface;
use DomainBundle\Entity\Exportable;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Serializer;

class XMLExportHandler implements EntityExportHandlerInterface
{
    /** @var Serializer $serializer */
    private $serializer;
    /** @var Filesystem $fileSystem */
    private $fileSystem;
    /** @var string $exportDirectory */
    private $exportDirectory;
    /** @var string $exportSuffix */
    private $exportSuffix;

    /**
     * JSONExportHandler constructor.
     * @param Filesystem $filesystem
     * @param Serializer $serializer
     * @param string $exportDirectory
     * @param string $exportSuffix
     */
    public function __construct(
        Filesystem $filesystem,
        Serializer $serializer,
        string $exportDirectory,
        string $exportSuffix
    ) {
        $this->fileSystem = $filesystem;
        $this->serializer = $serializer;
        $this->exportDirectory = $exportDirectory;
        $this->exportSuffix = $exportSuffix;
    }

    /**
     * @param Exportable $exportable
     * @throws \ReflectionException
     */
    public function export(Exportable $exportable): void
    {
        $originalClass = (new \ReflectionClass($exportable))->getShortName();

        $fileName = strtolower($originalClass) . $this->exportSuffix . '.xml';

        $this->fileSystem->dumpFile(
            $fileName,
            $this->serializer->serialize($exportable, 'xml')
        );
    }
}
