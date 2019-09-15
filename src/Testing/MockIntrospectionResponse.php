<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Testing;

use GraphQL\GraphQL;
use Spawnia\Sailor\Response;
use GraphQL\Utils\BuildSchema;
use GraphQL\Type\Introspection;

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
