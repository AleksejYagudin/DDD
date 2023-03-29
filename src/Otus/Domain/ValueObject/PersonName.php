<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class PersonName
{
    private string $surname;
    private string $name;
    private ?string $patronymic = null;

    /**
     * @param string $surname
     * @param string $name
     * @param string|null $patronymic
     */
    private function __construct(string $surname, string $name, ?string $patronymic)
    {
        $this->assertSurnameIsValid($surname);
        $this->assertNameIsValid($name);
        $this->assertPatronymicIsValid($patronymic);

        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }

    public static function fromSurnameAndName(string $surname, string $name): self
    {
        return new self(
            $surname,
            $name,
            null
        );
    }

    public static function fromSurnameAndNameAndPatronymic(string $surname, string $name, string $patronymic): self
    {
        return new self(
            $surname,
            $name,
            $patronymic
        );
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * Возвращает ФИО одной строкой
     * @return string
     */
    public function getFullName(): string
    {
        $notEmptyComponents = array_filter([
            $this->getSurname(),
            $this->getName(),
            $this->getPatronymic()
        ]);


        return implode(' ', $notEmptyComponents);
    }

    /**
     * Возвращает сокращенное ФИО одной строкой.
     * @return string
     */
    public function getAbbreviatedName(): string
    {
        $notEmptyComponents = array_filter([
            $this->getName(),
            $this->getPatronymic()
        ]);
        $abbreviatedComponents = array_map(
            static fn($string) => mb_substr($string, 0,1).'.',
            $notEmptyComponents
        );
        return $this->getSurname().' '.implode($abbreviatedComponents);
    }

    private function assertSurnameIsValid(string $value)
    {
        if (!preg_match('/^[А-ЯЁ][а-яё]+$/u', $value)) {
            throw new \InvalidArgumentException("Фамилия должна содержать русские буквы");
        }
    }

    private function assertNameIsValid(string $value)
    {
        if (!preg_match('/^[А-ЯЁ][а-яё]+$/u', $value)) {
            throw new \InvalidArgumentException("Имя должно содержать русские буквы");
        }
    }

    private function assertPatronymicIsValid(string $value)
    {
        if (!preg_match('/^[А-ЯЁ][а-яё]+$/u', $value)) {
            throw new \InvalidArgumentException("Отчество должно содержать русские буквы");
        }
    }


}