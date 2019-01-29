<?php
/**
 * Created by PhpStorm.
 * User: paf
 * Date: 2019-01-28
 * Time: 14:17
 */

namespace Pyz\Zed\HelloWorld\Dependency\Facade;

interface HelloWorldToEventBehaviorFacadeInterface
{
    /**
     * @param array $eventTransfers
     *
     * @return mixed
     */
    public function getEventTransferIds(array $eventTransfers);
}
