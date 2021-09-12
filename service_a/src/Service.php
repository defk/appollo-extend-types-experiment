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
                'id' => 1,
                'kilometer' => 0,
                'meter' => 500,
                'road' => [
                    'id' => 1,
                    'title' => 'Road #1',
                    'code' => 'R-1',
                ],
            ],
            [
                'id' => 2,
                'kilometer' => 0,
                'meter' => 800,
                'road' => [
                    'id' => 1,
                    'title' => 'Road #1',
                    'code' => 'R-1',
                ],
            ],
            [
                'id' => 3,
                'kilometer' => 0,
                'meter' => 100,
                'road' => [
                    'id' => 2,
                    'title' => 'Road #2',
                    'code' => 'R-2',
                ],
            ],
        ];
    }
}