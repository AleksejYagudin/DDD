<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class PersonInn extends AbstractInn
{
    protected function assertInnIsValid(string $value)
    {
        if (!preg_match('/^\d{12}$/', $value)) {
            throw new \InvalidArgumentException("ИНН физ.лица должен содержать 12 цифр");
        }
    }
}