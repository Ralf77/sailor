<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Tests\Unit\Client;

use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Spawnia\Sailor\Client\Guzzle;
use GuzzleHttp\Handler\MockHandler;

class GuzzleTest extends TestCase
{
    public function testRequest(): void
    {
        $container = [];
        $history = Middleware::history($container);

        $mock = new MockHandler([
            new Response(200, [], /* @lang JSON */ '{"data": {"foo": "bar"}}'),
        ]);
        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $uri = 'http://foo.bar/graphql';
        $client = new Guzzle($uri, ['handler' => $stack]);
        $response = $client->request(/* @lang GraphQL */ '{foo}');

        $this->assertEquals(
            (object) ['foo' => 'bar'],
            $response->data
        );

        /** @var Request $request */
        $request = $container[0]['request'];

        $this->assertSame('POST', $request->getMethod());
        $this->assertSame(/* @lang JSON */ '{"query":"{foo}"}', $request->getBody()->getContents());
        $this->assertSame($uri, $request->getUri()->__toString());
    }
}