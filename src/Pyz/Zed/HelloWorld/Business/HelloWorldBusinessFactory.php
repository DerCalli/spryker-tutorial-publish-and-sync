<?php

namespace Pyz\Zed\HelloWorld\Business;

use Pyz\Zed\HelloWorld\Business\Message\MessageStorageWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class HelloWorldBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\HelloWorld\Business\Message\MessageStorageWriter
     */
    public function createMessageStorageWriter(): MessageStorageWriter
    {
        return new MessageStorageWriter();
    }
}
