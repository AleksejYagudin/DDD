<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class CompanyInn extends AbstractInn
{
    protected function assertInnIsValid(string $value)
    {
        if (!preg_match('/^\d{10}$/', $value)) {
            throw new \InvalidArgumentException("ИНН юр.лица должен содержать 10 цифр");
        }
    }
}