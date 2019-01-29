<?php

namespace Pyz\Zed\HelloWorld\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\HelloWorld\Business\HelloWorldBusinessFactory
 */
class HelloWorldFacade extends AbstractFacade
{
    /**
     * @param array $messageIds
     *
     * @return void
     */
    public function publish(array $messageIds): void
    {
        $this->getFactory()
            ->createMessageStorageWriter()
            ->publish($messageIds);
    }

    /**
     * @param array $messageIds
     *
     * @return void
     */
    public function unpublish(array $messageIds): void
    {
        $this->getFactory()
            ->createMessageStorageWriter()
            ->unpublish($messageIds);
    }
}
