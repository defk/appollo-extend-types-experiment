<?php

namespace App\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GatewayType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'service',
            'fields' => [
                'sdl' => [
                    'type' => Type::string(),
                    'resolve' => static fn(array $content): string => $content['sdl'],
                ]
            ]
        ]);
    }
}