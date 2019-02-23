<?php

namespace Tests\ApplicationServiceBundle\Intergration\Service\Entity;

use ApplicationServiceBundle\Service\ExportHandler\JSONExportHandler;
use ApplicationServiceBundle\Service\ExportHandler\XMLExportHandler;
use DomainBundle\Entity\BacklogItem;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use DomainBundle\Entity\BacklogTask;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateNew;
use DomainBundle\Entity\User;
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
     * @return void
     */
    public function setUp(): void
    {
        $this->serializer = new Serializer(
            [new ObjectNormalizer()],
            [new XmlEncoder(), new JsonEncoder()]
        );
    }

    /**
     * @return void
     */
    public function testIfSprintGetsExportedCorrectlyWithBacklogItemsInJsonAndThenInXML(): void
    {
        $fileSystem = $this->createMock(Filesystem::class);

        $fileSystem->expects($this->once())
            ->method('dumpFile')
            ->with(
                'sprint_export.json',
                '{"editable":true,"exportHandler":[],"id":"1","name":"De eerste sprint van ons project","createdAt":{"timezone":{"name":"-04:00","transitions":false,"location":false},"offset":-14400,"timestamp":1503159475},"backlogComponents":[{"score":9,"id":"3","title":"Eerste backlog item","description":"Dit is het allereerste backlogitem!","currentState":{"finished":false},"assignedUser":{"id":"10","userName":"r.hermans","firstName":"Ruud","lastName":"Hermans","emailAddress":"r.hermans@avans.nl","phoneNumber":"0629359289"},"priority":"5","children":null,"finished":false}]}'
            );

        $exportHandler = new JSONExportHandler(
            $fileSystem,
            $this->serializer,
            '.',
            '_export'
        );

        $sprint = new Sprint($exportHandler, new SprintStateNew());

        $sprint->setId(1)
            ->setCreatedAt(new \DateTime('2017-08-19 12:17:55 -0400'))
            ->setName('De eerste sprint van ons project');

        $responsibleUser = (new User())
            ->setId(10)
            ->setUserName('r.hermans')
            ->setFirstName('Ruud')
            ->setLastName('Hermans')
            ->setEmailAddress('r.hermans@avans.nl')
            ->setPhoneNumber('0629359289');

        $backlogItem = new BacklogItem(new BacklogComponentStateTodo());
        $backlogItem->setTitle('Eerste backlog item')
            ->setId(3)
            ->setDescription('Dit is het allereerste backlogitem!')
            ->setPriority(5)
            ->setAssignedUser($responsibleUser);

        $backlogItem->addComponent(
            (new BacklogTask(new BacklogComponentStateTodo()))
                ->setId(10)
                ->setAssignedUser($responsibleUser)
                ->setPriority(4)
                ->setScore(5)
                ->setTitle('Taak subitem 1')
                ->setDescription('De taak is nogal groot, dus het is beter deze op te delen')
        );

        $backlogItem->addComponent(
            (new BacklogTask(new BacklogComponentStateTodo()))
                ->setId(9)
                ->setAssignedUser($responsibleUser)
                ->setPriority(2)
                ->setScore(4)
                ->setTitle('Taak subitem 2')
                ->setDescription('De taak is nogal groot, dus het is beter deze op te delen, dit is deel 2')
        );

        $sprint->addBacklogComponent($backlogItem);

        $sprint->export();

        $XMLfileSystem = $this->createMock(Filesystem::class);

        $XMLfileSystem->expects($this->once())
            ->method('dumpFile')
            ->with(
                'sprint_export.xml',
                '<?xml version="1.0"?>
<response><editable>1</editable><exportHandler/><id>1</id><name>De eerste sprint van ons project</name><createdAt><timezone><name>-04:00</name><transitions>0</transitions><location>0</location></timezone><offset>-14400</offset><timestamp>1503159475</timestamp></createdAt><backlogComponents><score>9</score><id>3</id><title>Eerste backlog item</title><description>Dit is het allereerste backlogitem!</description><currentState><finished>0</finished></currentState><assignedUser><id>10</id><userName>r.hermans</userName><firstName>Ruud</firstName><lastName>Hermans</lastName><emailAddress>r.hermans@avans.nl</emailAddress><phoneNumber>0629359289</phoneNumber></assignedUser><priority>5</priority><children/><finished>0</finished></backlogComponents></response>
'
            );

        $XMLexportHandler = new XMLExportHandler(
            $XMLfileSystem,
            $this->serializer,
            '.',
            '_export'
        );

        $sprint->setExportHandler($XMLexportHandler);

        $sprint->export();
    }
}
