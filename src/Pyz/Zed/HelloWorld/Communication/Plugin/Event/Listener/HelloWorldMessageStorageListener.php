<?php

namespace Pyz\Zed\HelloWorld\Communication\Plugin\Event\Listener;

use Pyz\Zed\HelloWorld\Dependency\HelloWorldEvents;
use Spryker\Shared\Log\LoggerTrait;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class HelloWorldMessageStorageListener
 * @package Pyz\Zed\HelloWorld\Communication\Plugin\Event\Listener
 * @method \Pyz\Zed\HelloWorld\Business\HelloWorldFacade
 * @method \Pyz\Zed\HelloWorld\Business\HelloWorldFacade getFacade()
 * @method \Pyz\Zed\HelloWorld\Communication\HelloWorldCommunicationFactory getFactory()
 */
class HelloWorldMessageStorageListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    use LoggerTrait;

    /**
     * @param array $eventTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventTransfers, $eventName): void
    {
        $messageIds = $this->getFactory()->getEventBehaviourFacade()->getEventTransferIds($eventTransfers);

        if ($eventName === HelloWorldEvents::ENTITY_SPY_HELLO_WORLD_MESSAGE_CREATE) {
            $this->getFacade()->publish($messageIds);
        } elseif ($eventName === HelloWorldEvents::ENTITY_SPY_HELLO_WORLD_MESSAGE_DELETE) {
            $this->getFacade()->unpublish($messageIds);
        }
    }
}
