<?php

declare(strict_types=1);

namespace Spawnia\Sailor\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Spawnia\Sailor\Foo\Foo\Foo;

class TypedObjectTest extends TestCase
{
    public function testDecode(): void
    {
        $data = (object) ['foo' => 'bar'];
        $foo = Foo::fromStdClass($data);

        self::assertSame('bar', $foo->foo);
    }
}
