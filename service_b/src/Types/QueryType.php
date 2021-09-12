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
                'videoStationSurface' => [
                    'type' =>  Type::listOf(Service::getType(VideoStationSurfaceType::class)),
                    'resolve' => static fn(): array => (new Service())->getItems(),
                ],
            ]
        ]);
    }
}