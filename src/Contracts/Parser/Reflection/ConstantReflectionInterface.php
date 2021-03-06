<?php declare(strict_types=1);

namespace ApiGen\Contracts\Parser\Reflection;

use ApiGen\Contracts\Parser\Reflection\Behavior\InClassInterface;
use ApiGen\Contracts\Parser\Reflection\Behavior\InNamespaceInterface;
use ApiGen\Contracts\Parser\Reflection\Behavior\LinedInterface;

interface ConstantReflectionInterface extends
    ElementReflectionInterface,
    InNamespaceInterface,
    InClassInterface,
    LinedInterface
{
    public function getTypeHint(): string;

    /**
     * @return mixed
     */
    public function getValue();

    public function getValueDefinition(): string;
}
