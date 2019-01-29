<?php

namespace Pyz\Zed\HelloWorld\Communication;

use Pyz\Zed\HelloWorld\Dependency\Facade\HelloWorldToEventBehaviorFacadeInterface;
use Pyz\Zed\HelloWorld\HelloWorldDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class HelloWorldCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\HelloWorld\Dependency\Facade\HelloWorldToEventBehaviorFacadeInterface
     */
    public function getEventBehaviourFacade(): HelloWorldToEventBehaviorFacadeInterface
    {
        return $this->getProvidedDependency(HelloWorldDependencyProvider::FACADE_EVENT_BEHAVIOUR);
    }
}
