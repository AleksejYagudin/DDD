<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

abstract class AbstractInn
{
    protected string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->assertInnIsValid($value);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    abstract protected function assertInnIsValid(string $value);

}