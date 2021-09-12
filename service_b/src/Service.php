<?php

namespace App;

use GraphQL\Type\Definition\Type;

class Service
{
    public static function getType(string $type): Type {
        return new $type;
    }
    public function getItems():array
    {
        return [
            [
                'imageId' => 1,
                'isSurface' => null,
                'reaction' => null,
            ],
            [
                'imageId' => 2,
                'isSurface' => false,
                'reaction' => 'negative',
            ],
            [
                'imageId' => 3,
                'isSurface' => true,
                'reaction' => 'positive',
            ],
        ];
    }
}