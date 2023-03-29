<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class Id
{
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->assertIdIsValid($value);
        $this->value = $value;
    }

    private function assertIdIsValid(int $value)
    {
        if($value <= 0) {
            throw new \InvalidArgumentException("Идентификатор должен быть натуральным числом");
        }
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}