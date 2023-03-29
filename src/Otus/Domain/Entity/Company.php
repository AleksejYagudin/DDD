<?php

declare(strict_types=1);

namespace App\DDD\Otus\Domain\Entity;

use App\DDD\Otus\Domain\ValueObject\CompanyInn;
use App\DDD\Otus\Domain\ValueObject\CompanyName;
use App\DDD\Otus\Domain\ValueObject\Id;
use App\DDD\Otus\Domain\ValueObject\Phone;

class Company
{
    private Id $id;
    private CompanyName $name;
    private CompanyInn $inn;
    private Phone $phone;
    private Person $ceo;
    private array $shareholders = [];

    /**
     * @param Id $id
     * @param CompanyName $name
     * @param CompanyInn $inn
     * @param Phone $phone
     * @param Person $ceo
     */
    public function __construct(Id $id, CompanyName $name, CompanyInn $inn, Phone $phone, Person $ceo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->inn = $inn;
        $this->phone = $phone;
        $this->ceo = $ceo;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return CompanyName
     */
    public function getName(): CompanyName
    {
        return $this->name;
    }

    /**
     * @return CompanyInn
     */
    public function getInn(): CompanyInn
    {
        return $this->inn;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @return Person
     */
    public function getCeo(): Person
    {
        return $this->ceo;
    }

    /**
     * Добавляем новго участника ООО
     * @param Person $person
     * @return $this
     */
    public function addShareholders(Person $person): Company
    {
        $personKey = $person->getId()->getValue();
        if(!array_key_exists($personKey, $this->shareholders)) {
            $this->shareholders[$personKey] = $person;
        }
        return $this;
    }

    /**
     * Удаляет участника ООО
     * @param Person $person
     * @return $this
     */
    public function removeShareholders(Person $person): Company
    {
        $personKey = $person->getId()->getValue();
        if(array_key_exists($personKey, $this->shareholders)) {
            unset($this->shareholders[$personKey]);
        }
        return $this;
    }




}