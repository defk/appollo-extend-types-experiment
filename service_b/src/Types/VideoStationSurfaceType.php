<?php

namespace App\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class VideoStationSurfaceType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'VideoStationSurface',
            'fields' => [
                'imageId' => [
                    'type' => Type::int(),
                    'resolve' => static fn(array $content): int => $content['imageId'],
                ],
                'isSurface' => [
                    'type' => Type::boolean(),
                    'resolve' => static fn(array $content): ?bool => $content['isSurface'],
                ],
                'reaction' => [
                    'type' => Type::string(),
                    'resolve' => static fn(array $content): ?string => $content['reaction'],
                ],
            ]
        ]);
    }
}