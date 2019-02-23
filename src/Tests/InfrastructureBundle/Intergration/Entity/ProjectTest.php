<?php

namespace Tests\InfrastructureBundle\Intergration\Entity;

use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandler;
use ApplicationServiceBundle\Service\ExportHandler\XMLExportHandler;
use DomainBundle\Entity\Project;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ProjectTest extends TestCase
{
    /** @var Serializer $serializer */
    private $serializer;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            [new XmlEncoder(), new JsonEncoder()]
        );
    }

    /**
     * @return void
     */
    public function testIfExportFunctionCallsFileSystemAndReturnsJson(): void
    {
        $fileSystemMock = $this->createMock(Filesystem::class);

        $fileSystemMock->expects($this->once())
            ->method('dumpFile')
            ->with(
                'projectTestSuffix.json',
                '{"exportHandler":[],"sprints":[],"id":"2","users":[],"pipelines":[],"repositories":[],"backlogItems":[],"forumTopics":[],"title":"ProjectTest titel","description":"Een project dat gebouwd is voor school","createdAt":{"timezone":{"name":"-04:00","transitions":false,"location":false},"offset":-14400,"timestamp":1503159475}}'
            );

        $exportHandler = new JsonExportHandler(
            $fileSystemMock,
            $this->serializer,
            'exports',
            'TestSuffix'
        );

        $project = new Project($exportHandler);

        $project->setId(2)
            ->setTitle('ProjectTest titel')
            ->setDescription('Een project dat gebouwd is voor school')
            ->setCreatedAt(new \DateTime('2017-08-19 12:17:55 -0400'));

        $project->export();
    }

    /**
     * @return void
     */
    public function testIfExportFunctionCallsFileSystemAndReturnsXML(): void
    {
        $fileSystemMock = $this->createMock(Filesystem::class);

        $fileSystemMock->expects($this->once())
            ->method('dumpFile')
            ->with(
                'projectTestSuffix.xml',
                '<?xml version="1.0"?>
<response><exportHandler/><sprints/><id>2</id><users/><pipelines/><repositories/><backlogItems/><forumTopics/><title>ProjectTest titel</title><description>Een project dat gebouwd is voor school</description><createdAt><timezone><name>-04:00</name><transitions>0</transitions><location>0</location></timezone><offset>-14400</offset><timestamp>1503159475</timestamp></createdAt></response>
'
            );

        $exportHandler = new XMLExportHandler(
            $fileSystemMock,
            $this->serializer,
            'exports',
            'TestSuffix'
        );

        $project = new Project($exportHandler);

        $project->setId(2)
            ->setTitle('ProjectTest titel')
            ->setDescription('Een project dat gebouwd is voor school')
            ->setCreatedAt(new \DateTime('2017-08-19 12:17:55 -0400'));

        $project->export();
    }
}
