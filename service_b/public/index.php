<?php

use \GraphQL\Type\Schema;
use \App\Types\QueryType;
use GraphQL\GraphQL;

require '../vendor/autoload.php';

$schema = new Schema([
    'query' => new QueryType(),
]);

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];
    $variableValues = $input['variables'] ?? null;

    file_put_contents(
        '/dev/shm/q.log',
        $rawInput
    );

    $rootValue = [];
    $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
    $output = $result->toArray();
} catch (Throwable $e) {
    $output = [
        'error' => [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ],
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($output, JSON_PRETTY_PRINT);
