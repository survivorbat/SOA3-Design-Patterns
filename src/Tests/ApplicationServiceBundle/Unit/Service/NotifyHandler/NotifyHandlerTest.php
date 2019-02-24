<?php

namespace Tests\ApplicationServiceBundle\Entity\SprintObserver;

use ApplicationServiceBundle\Service\NotifyHandler\NotifyHandler;
use PHPUnit\Framework\TestCase;

class NotifyHandlerTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfSendMessageCallsCorrectMethods(): void
    {
        $dummyClass = new class extends NotifyHandler {
            /**
             * @return void
             */
            protected function composeMessageContent(): void
            {
            }

            /**
             * @return void
             */
            protected function deliverMessage(): void
            {
                throw new \BadMethodCallException('This state method has not been implemented.');
            }
        };
        $this->expectException(\BadMethodCallException::class);
        $dummyClass->sendMessage("");
    }
}
