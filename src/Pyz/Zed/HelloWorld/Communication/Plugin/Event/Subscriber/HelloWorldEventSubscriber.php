<?php

namespace Pyz\Zed\HelloWorld\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\HelloWorld\Communication\Plugin\Event\Listener\HelloWorldMessageStorageListener;
use Pyz\Zed\HelloWorld\Dependency\HelloWorldEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\HelloWorld\Business\HelloWorldFacade getFacade()
 */
class HelloWorldEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @api
     *
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(HelloWorldEvents::ENTITY_SPY_HELLO_WORLD_MESSAGE_CREATE, new HelloWorldMessageStorageListener());
        $eventCollection->addListenerQueued(HelloWorldEvents::ENTITY_SPY_HELLO_WORLD_MESSAGE_UPDATE, new HelloWorldMessageStorageListener());
        $eventCollection->addListenerQueued(HelloWorldEvents::ENTITY_SPY_HELLO_WORLD_MESSAGE_DELETE, new HelloWorldMessageStorageListener());

        return $eventCollection;
    }
}
