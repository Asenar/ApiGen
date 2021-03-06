<?php declare(strict_types=1);

namespace ApiGen\Tests\Generator\Resolvers\ElementResolver;

use ApiGen\Contracts\Parser\Reflection\ClassReflectionInterface;
use ApiGen\Contracts\Parser\Reflection\MethodReflectionInterface;

final class ResolveTest extends AbstractElementResolverTest
{
    public function testNonExistingMethod(): void
    {
        $classReflectionMock = $this->createMock(ClassReflectionInterface::class);
        $classReflectionMock->method('hasMethod')
            ->with('nonExistingMethod')
            ->willReturn(false);

        $this->assertNull($this->elementResolver->resolveElement('nonExistingMethod', $classReflectionMock));
    }

    public function testExistingMethod(): void
    {
        $classReflectionMock = $this->createMock(ClassReflectionInterface::class);
        $classReflectionMock->method('hasMethod')
            ->with('someMethod')
            ->willReturn(true);

        $methodReflectionMock = $this->createMock(MethodReflectionInterface::class);

        $classReflectionMock->method('getMethod')
            ->with('someMethod')
            ->willReturn($methodReflectionMock);

        $this->assertSame(
            $methodReflectionMock,
            $this->elementResolver->resolveElement('someMethod', $classReflectionMock)
        );
    }

    public function testNonExistingElement(): void
    {
        $classReflectionMock = $this->createMock(ClassReflectionInterface::class);

        $this->assertNull($this->elementResolver->resolveElement('string', $classReflectionMock));
    }

    public function testThis(): void
    {
        $classReflectionMock = $this->createMock(ClassReflectionInterface::class);

        $this->assertSame($classReflectionMock, $this->elementResolver->resolveElement('$this', $classReflectionMock));
    }

    public function testSelf(): void
    {
        $classReflectionMock = $this->createMock(ClassReflectionInterface::class);

        $this->assertSame($classReflectionMock, $this->elementResolver->resolveElement('self', $classReflectionMock));
    }
}
