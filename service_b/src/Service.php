<?php

namespace App;

use GraphQL\Type\Definition\Type;

class Service
{
    public static function getType(string $type): Type {
        return new $type;
    }
    public function getItems(array $stationIds):array
    {
        $content = [
            [
                'id' => 1,
                'imageId' => 581,
                'isSurface' => false,
                'reaction' => null,
            ],
            [
                'id' => 2,
                'imageId' => 644,
                'isSurface' => false,
                'reaction' => 'negative',
            ],
            [
                'id' => 3,
                'imageId' => 2907,
                'isSurface' => true,
                'reaction' => 'positive',
            ],
        ];
        return
        array_values(
            array_filter(
                $content,
                static fn(array $item):bool => in_array($item['id'], $stationIds)
            )
        );
    }
}