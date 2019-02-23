<?php

namespace Tests\InfrastructureBundle\Intergration\Entity;

use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandler;
use ApplicationServiceBundle\Service\ExportHandler\XMLExportHandler;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SprintTest extends TestCase
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
                'sprintTestSuffix.json',
                '{"editable":true,"exportHandler":[],"id":"","name":"Sprint 0","createdAt":{"timezone":{"name":"-04:00","transitions":false,"location":false},"offset":-14400,"timestamp":1503159475},"currentState":{"editable":true,"stateDescription":"Deze sprint is nieuw en nog niet begonnen.","stateTitle":"New"},"prevState":null}'
            );

        $exportHandler = new JsonExportHandler(
            $fileSystemMock,
            $this->serializer,
            'exports',
            'TestSuffix'
        );

        $sprint = new Sprint(
            $exportHandler,
            new SprintStateNew()
        );

        $sprint->setName('Sprint 0')
            ->setCreatedAt(new \DateTime('2017-08-19 12:17:55 -0400'));

        $sprint->export();
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
                'sprintTestSuffix.xml',
                "<?xml version=\"1.0\"?>\n<response><editable>1</editable><exportHandler/><id></id><name>Sprint 0</name><createdAt><timezone><name>-04:00</name><transitions>0</transitions><location>0</location></timezone><offset>-14400</offset><timestamp>1503159475</timestamp></createdAt><currentState><editable>1</editable><stateDescription>Deze sprint is nieuw en nog niet begonnen.</stateDescription><stateTitle>New</stateTitle></currentState><prevState/></response>\n"
            );

        $exportHandler = new XMLExportHandler(
            $fileSystemMock,
            $this->serializer,
            'exports',
            'TestSuffix'
        );

        $sprint = new Sprint(
            $exportHandler,
            new SprintStateNew()
        );

        $sprint->setName('Sprint 0')
            ->setCreatedAt(new \DateTime('2017-08-19 12:17:55 -0400'));

        $sprint->export();
    }
}
