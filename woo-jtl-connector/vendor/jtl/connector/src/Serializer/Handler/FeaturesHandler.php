<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use Jtl\Connector\Core\Model\Features;

class FeaturesHandler implements SubscribingHandlerInterface
{
    /**
     * @return array{array{direction: int, format: string, type: string, method: string}}
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format'    => 'json',
                'type'      => Features::class,
                'method'    => 'serializeFeaturesToJson',
            ],
        ];
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param Features                 $features
     * @param array                    $type
     * @param Context                  $context
     *
     * @return array|array[]
     */
    public function serializeFeaturesToJson( //@phpstan-ignore-line
        JsonSerializationVisitor $visitor,
        Features                 $features,
        array                    $type,
        Context                  $context
    ): array {
        return $features->toArray();
    }
}
