<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Codegen;

use GraphQL\Language\Printer;
use GraphQL\Type\Introspection;
use Spawnia\Sailor\EndpointConfig;

class Introspector
{
    /**
     * @var EndpointConfig
     */
    protected $endpointConfig;

    public function __construct(EndpointConfig $endpointConfig)
    {
        $this->endpointConfig = $endpointConfig;
    }

    public function introspect(): void
    {
        $result = $this->fetch();

        Printer::doPrint();
    }

    public function fetch()
    {
        $client = $this->endpointConfig->client();
        $response = $client->request(Introspection::getIntrospectionQuery());

        if ($response->errors) {
            throw new \Exception('Errors while running the introspection query.');
        }

        return $response->data;
    }
}
