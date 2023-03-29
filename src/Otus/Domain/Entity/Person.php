<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\Entity;

use App\DDD\Otus\Domain\ValueObject\Id;
use App\DDD\Otus\Domain\ValueObject\PersonBirthday;
use App\DDD\Otus\Domain\ValueObject\PersonInn;
use App\DDD\Otus\Domain\ValueObject\PersonName;
use App\DDD\Otus\Domain\ValueObject\PersonPassport;
use App\DDD\Otus\Domain\ValueObject\Phone;

class Person
{
    private Id $id;
    private PersonName $name;
    private PersonInn $inn;
    private PersonBirthday $birthday;
    private PersonPassport $passport;
    private Phone $phone;

    /**
     * @param Id $id
     * @param PersonName $name
     * @param PersonInn $inn
     * @param PersonBirthday $birthday
     * @param PersonPassport $passport
     * @param Phone $phone
     */
    public function __construct(Id $id, PersonName $name, PersonInn $inn, PersonBirthday $birthday, PersonPassport $passport, Phone $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->inn = $inn;
        $this->birthday = $birthday;
        $this->passport = $passport;
        $this->phone = $phone;
    }


    /**
     * @param PersonName $name
     * @return Person
     */
    public function setName(PersonName $name): Person
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param PersonInn $inn
     * @return Person
     */
    public function setInn(PersonInn $inn): Person
    {
        $this->inn = $inn;
        return $this;
    }

    /**
     * @param PersonBirthday $birthday
     * @return Person
     */
    public function setBirthday(PersonBirthday $birthday): Person
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @param PersonPassport $passport
     * @return Person
     */
    public function setPassport(PersonPassport $passport): Person
    {
        $this->passport = $passport;
        return $this;
    }

    /**
     * @param Phone $phone
     * @return Person
     */
    public function setPhone(Phone $phone): Person
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return PersonName
     */
    public function getName(): PersonName
    {
        return $this->name;
    }

    /**
     * @return PersonInn
     */
    public function getInn(): PersonInn
    {
        return $this->inn;
    }

    /**
     * @return PersonBirthday
     */
    public function getBirthday(): PersonBirthday
    {
        return $this->birthday;
    }

    /**
     * @return PersonPassport
     */
    public function getPassport(): PersonPassport
    {
        return $this->passport;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }




}