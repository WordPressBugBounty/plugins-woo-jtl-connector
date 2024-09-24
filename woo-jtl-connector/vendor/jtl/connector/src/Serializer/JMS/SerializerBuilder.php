<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Serializer\Handler
 */
namespace jtl\Connector\Serializer\JMS;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use jtl\Connector\Serializer\Handler\IdentityHandler;
use jtl\Connector\Serializer\Subscriber\NullValuesSubscriber;

class SerializerBuilder
{
    public static function create()
    {
        return \JMS\Serializer\SerializerBuilder::create()
                ->addDefaultHandlers()
                ->configureHandlers(function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new IdentityHandler());
                })
                ->configureListeners(function (EventDispatcher $dispatcher) {
                    $dispatcher->addSubscriber(new NullValuesSubscriber());
                })
                ->build();
    }
}
