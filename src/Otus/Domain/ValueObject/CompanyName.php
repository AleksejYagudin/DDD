<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class CompanyName
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    private function assertNameIsValid(string $value)
    {
        if (!preg_match('/^ООО .+$/u', $value)) {
            throw new \InvalidArgumentException("Название компании должно начинаться с ООО");
        }
    }


}