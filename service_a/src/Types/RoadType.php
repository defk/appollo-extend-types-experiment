<?php

namespace App\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class RoadType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Road',
            'fields' => [
                'id' => [
                    'type' => Type::int(),
                    'resolve' => static fn(array $content): int => $content['id'],
                ],
                'code' => [
                    'type' => Type::string(),
                    'resolve' => static fn(array $content): string => $content['code'],
                ],
                'title' => [
                    'type' => Type::string(),
                    'resolve' => static fn(array $content): string => $content['title'],
                ],
            ],
        ]);
    }
}