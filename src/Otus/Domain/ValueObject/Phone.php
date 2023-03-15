<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class Phone
{
    private string $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    private function assertValidPhone(string $value)
    {
        if (!preg_match('/^\d{10}$/', $value)) {
            throw new \InvalidArgumentException("Телефон должен содержать 10 цифр");
        }
    }
}
