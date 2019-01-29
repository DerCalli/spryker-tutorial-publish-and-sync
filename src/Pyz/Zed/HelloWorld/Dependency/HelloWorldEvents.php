<?php

namespace Pyz\Zed\HelloWorld\Dependency;

interface HelloWorldEvents
{
    const ENTITY_SPY_HELLO_WORLD_MESSAGE_CREATE = "Entity.spy_hello_world_message.create";
    const ENTITY_SPY_HELLO_WORLD_MESSAGE_UPDATE = "Entity.spy_hello_world_message.update";
    const ENTITY_SPY_HELLO_WORLD_MESSAGE_DELETE = "Entity.spy_hello_world_message.delete";
}
