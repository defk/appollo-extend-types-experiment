<?php

namespace App\Types;

use App\Service;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class VideoStationType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'VideoStation',
            'fields' => [
                'id' => [
                    'type' => Type::int(),
                    'resolve' => static fn(array $content): int => $content['id'],
                ],
                'kilometer' => [
                    'type' => Type::int(),
                    'resolve' => static fn(array $content): int => $content['kilometer'],
                ],
                'meter' => [
                    'type' => Type::int(),
                    'resolve' => static fn(array $content): int => $content['meter'],
                ],
                'road' => [
                    'type' => Service::getType(RoadType::class),
                    'resolve' => static fn(array $content): array => $content['road'],
                ]
            ]
        ]);
    }
}