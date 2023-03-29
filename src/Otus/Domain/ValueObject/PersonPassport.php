<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\ValueObject;

class PersonPassport
{
    private string $serial;
    private string $number;
    private \DateTimeImmutable $date;

    /**
     * @param string $serial
     * @param string $number
     * @param \DateTimeImmutable $date
     */
    public function __construct(string $serial, string $number, \DateTimeImmutable $date)
    {
        $this->assertSerialIsValid($serial);
        $this->assertNumberIsValid($number);
        $this->assertDateIsValid($date);

        $this->serial = $serial;
        $this->number = $number;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSerial(): string
    {
        return $this->serial;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * Возвращает отформатированные паспортные данные
     * @return string
     */
    public function getFullPassportInformation(): string
    {
        return "Паспорт {$this->serial} {$this->number}, выдан {$this->date->format("d.m.Y")}";
    }

    private function assertSerialIsValid(string $value)
    {
        if (!preg_match('/^\d{4}$/', $value)) {
            throw new \InvalidArgumentException("Серия паспорта должна содержать 4 цифры");
        }
    }

    private function assertNumberIsValid(string $value)
    {
        if (!preg_match('/^\d{6}$/', $value)) {
            throw new \InvalidArgumentException("Номер паспорта должен содержать 6 цифр");
        }
    }

    private function assertDateIsValid(\DateTimeImmutable $value)
    {
        if ($value > new \DateTimeImmutable()) {
            throw new \InvalidArgumentException("Дата выдачи паспорта должна быть в прошлом");
        }
    }


}