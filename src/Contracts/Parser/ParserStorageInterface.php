<?php declare(strict_types=1);

namespace ApiGen\Contracts\Parser;

use ApiGen\Contracts\Parser\Reflection\ClassReflectionInterface;
use ApiGen\Contracts\Parser\Reflection\ConstantReflectionInterface;
use ApiGen\Contracts\Parser\Reflection\FunctionReflectionInterface;

interface ParserStorageInterface
{
    /**
     * @return mixed[]
     */
    public function getElementsByType(string $type): array;

    /**
     * @return int[]
     */
    public function getDocumentedStats(): array;

    /**
     * @return ClassReflectionInterface[]
     */
    public function getClasses(): array;

    /**
     * @return ConstantReflectionInterface[]
     */
    public function getConstants(): array;

    /**
     * @return FunctionReflectionInterface[]
     */
    public function getFunctions(): array;

    /**
     * @return string[]
     */
    public function getTypes(): array;

    /**
     * @param ClassReflectionInterface[] $classes
     */
    public function setClasses(array $classes): void;

    /**
     * @param ConstantReflectionInterface[] $constants
     */
    public function setConstants(array $constants): void;

    /**
     * @param FunctionReflectionInterface[] $functions
     */
    public function setFunctions(array $functions): void;

    /**
     * @return ClassReflectionInterface[]
     */
    public function getDirectImplementersOfInterface(ClassReflectionInterface $reflectionClass): array;

    /**
     * @return ClassReflectionInterface[]
     */
    public function getIndirectImplementersOfInterface(ClassReflectionInterface $reflectionClass): array;
}
