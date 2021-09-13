<?php

namespace App\Types;

use App\Service;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class QueryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                '_service' => [
                    'type' => Service::getType(GatewayType::class),
                    'resolve' => static fn(): array => [
                        'sdl' => file_get_contents(__DIR__.'/../scheme.graphql'),
                    ],
                ],
                '_entities' => [
                    'type' => Type::listOf(Service::getType(VideoStationType::class)),
                    'args' => [
                        'representations' => [
                            'type' => Type::listOf(Service::getType(AnyScalar::class))
                        ]
                    ],
                    'resolve' => static function($root, $payload) {
                        $stationIds = array_column($payload['representations'], 'id');
                        return (new Service())->getItems($stationIds);
                    }
                ],
            ]
        ]);
    }
}