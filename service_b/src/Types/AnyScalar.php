<?php

namespace App\Types;

use GraphQL\Language\AST\Node;
use GraphQL\Type\Definition\ScalarType;

class AnyScalar extends ScalarType
{
    public $name = '_Any';

    public function serialize($value)
    {
        return $value;
    }

    public function parseLiteral(Node $valueNode, ?array $variables = null)
    {
        return $valueNode->toArray();
    }

    public function parseValue($value)
    {
        return $value;
    }
}