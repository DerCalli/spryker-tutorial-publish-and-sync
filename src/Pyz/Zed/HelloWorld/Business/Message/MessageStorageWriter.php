<?php

namespace Pyz\Zed\HelloWorld\Business\Message;

use Generated\Shared\Transfer\HelloWorldStorageTransfer;
use Orm\Zed\HelloWorld\Persistence\SpyHelloWorldMessageQuery;
use Orm\Zed\HelloWorldStorage\Persistence\SpyHelloWorldMessageStorage;
use Orm\Zed\HelloWorldStorage\Persistence\SpyHelloWorldMessageStorageQuery;

class MessageStorageWriter
{
    /**
     * @param array $messageIds
     *
     * @return void
     */
    public function publish(array $messageIds): void
    {
        $messages = SpyHelloWorldMessageQuery::create()
            ->filterByIdHelloWorldMessage_In($messageIds)
            ->find();

        foreach ($messages as $message) {
            $messageStorageTransfer = new HelloWorldStorageTransfer();
            $messageStorageTransfer->fromArray($message->toArray(), true);
            $this->store($message->getIdHelloWorldMessage(), $messageStorageTransfer);
        }
    }

    /**
     * @param array $messageIds
     *
     * @return void
     */
    public function unpublish(array $messageIds): void
    {
        $messages = SpyHelloWorldMessageStorageQuery::create()
            ->filterByFkHelloWorldMessage_In($messageIds)
            ->find();

        foreach ($messages as $message) {
            $message->delete();
        }
    }

    /**
     * @param int $idMessage
     * @param \Generated\Shared\Transfer\HelloWorldStorageTransfer $messageStorageTransfer
     *
     * @return void
     */
    protected function store(int $idMessage, HelloWorldStorageTransfer $messageStorageTransfer): void
    {
        $storageEntity = new SpyHelloWorldMessageStorage();
        $storageEntity->setFkHelloWorldMessage($idMessage);
        $storageEntity->setData($messageStorageTransfer->modifiedToArray());
        $storageEntity->save();
    }
}
