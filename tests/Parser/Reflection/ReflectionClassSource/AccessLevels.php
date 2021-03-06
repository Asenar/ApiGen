<?php declare(strict_types=1);

namespace Project;

/**
 * @property \stdClass[] $issue696
 * @method getSome()
 * @method \stdClass[] methodRelatedToIssue696(\stdClass[] $argument)
 */
final class AccessLevels extends ParentClass implements RichInterface
{
    use SomeTrait;
    use SomeTraitNotPresentHere;

    const LEVEL = 5;

    /**
     * @var mixed
     */
    public $publicProperty;


    /**
     * @var mixed
     */
    protected $protectedProperty;


    /**
     * @var mixed
     */
    private $privateProperty;

    public function publicMethod()
    {
    }

    protected function protectedMethod()
    {
    }

    private function privateMethod()
    {
    }
}
