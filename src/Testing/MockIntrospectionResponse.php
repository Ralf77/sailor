<?php


namespace Spawnia\Sailor\Testing;


use GraphQL\GraphQL;
use GraphQL\Type\Introspection;
use GraphQL\Utils\BuildSchema;
use Spawnia\Sailor\Response;

class MockIntrospectionResponse
{
    public function __construct(string $schema)
    {
        $this->schema = BuildSchema::build($schema);
    }

    public function __invoke(): Response
    {
        $executionResult = GraphQL::executeQuery(
            $this->schema,
            Introspection::getIntrospectionQuery()
        );

        return Response::fromExecutionResult($executionResult);
    }
}
