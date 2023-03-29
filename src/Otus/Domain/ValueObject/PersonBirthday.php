<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;
class PersonBirthday
{
    private \DateTimeImmutable $value;

    /**
     * @param \DateTimeImmutable $value
     */
    public function __construct(\DateTimeImmutable $value)
    {
        $this->assertDateIsInThePast($value);
        $this->value = $value;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getValue(): \DateTimeImmutable
    {
        return $this->value;
    }

    private function assertDateIsInThePast(\DateTimeImmutable $value)
    {
        if ($value > new \DateTimeImmutable) {
            throw new \InvalidArgumentException("Дата рождения должна быть в прошлом");
        }
    }

}