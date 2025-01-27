<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Tests\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Spawnia\Sailor\Response;

class ResponseTest extends TestCase
{
    public function testFromResponseInterface(): void
    {
        $stream = self::createMock(StreamInterface::class);
        $stream->method('getContents')
            ->willReturn(/* @lang JSON */ '{"data": {"foo": "bar"}}');

        /** @var MockObject&ResponseInterface $httpResponse */
        $httpResponse = self::createMock(ResponseInterface::class);
        $httpResponse->method('getBody')
            ->willReturn($stream);

        $response = Response::fromResponseInterface($httpResponse);

        self::assertResponseIsFooBar($response);
    }

    public function testFromJson(): void
    {
        $response = Response::fromJson(/* @lang JSON */ '{"data": {"foo": "bar"}}');

        self::assertResponseIsFooBar($response);
    }

    public function testfromStdClass(): void
    {
        $response = Response::fromStdClass(
            (object) [
                'data' => (object) [
                    'foo' => 'bar',
                ],
            ]
        );

        self::assertResponseIsFooBar($response);
    }

    public static function assertResponseIsFooBar(Response $response): void
    {
        self::assertSame('bar', $response->data->foo);
    }
}
