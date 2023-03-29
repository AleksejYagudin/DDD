<?php
declare(strict_types=1);

namespace App\DDD\Otus\Application\UseCase;

use App\DDD\Otus\Domain\Entity\Company;
use App\DDD\Otus\Domain\Entity\Person;
use App\DDD\Otus\Domain\Repository\PersonRepositoryInterface;
use App\DDD\Otus\Domain\ValueObject\CompanyInn;
use App\DDD\Otus\Domain\ValueObject\CompanyName;
use App\DDD\Otus\Domain\ValueObject\PersonBirthday;
use App\DDD\Otus\Domain\ValueObject\PersonInn;
use App\DDD\Otus\Domain\ValueObject\PersonName;
use App\DDD\Otus\Domain\ValueObject\PersonPassport;
use App\DDD\Otus\Domain\ValueObject\Phone;


class CreateCompanyUseCase
{
    private PersonRepositoryInterface $personRepository;
    private PersonRepositoryInterface $companyRepository;

    /**
     * @param PersonRepositoryInterface $personRepository
     * @param PersonRepositoryInterface $companyRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository, PersonRepositoryInterface $companyRepository)
    {
        $this->personRepository = $personRepository;
        $this->companyRepository = $companyRepository;
    }

    public function execute()
    {
        $ivanov = new Person(
            $this->personRepository->getNextId(),
            PersonName::fromSurnameAndNameAndPatronymic('Иванов', 'Иван', 'Иванович'),
            new PersonInn('123456789123'),
            new PersonBirthday(new \DateTimeImmutable('1978-11-12')),
            new PersonPassport('1111', '123456', new \DateTimeImmutable('2022-09-10')),
            new Phone('5551234567'),
        );
        $this->personRepository->add($ivanov);

        $petrov = new Person(
            $this->personRepository->getNextId(),
            PersonName::fromSurnameAndNameAndPatronymic('Петров', 'Петр', 'Петрович'),
            new PersonInn('789456123789'),
            new PersonBirthday(new \DateTimeImmutable('1938-11-12')),
            new PersonPassport('2222', '654321', new \DateTimeImmutable('2012-10-20')),
            new Phone('6661234567'),
        );
        $this->personRepository->add($petrov);

        $company = new Company(
            $this->companyRepository->getNextId(),
            new CompanyName('ООО Ромашка'),
            new CompanyInn('1234567891'),
            new Phone('4991234567'),
            $petrov
        );
        $company
            ->addShareholders($ivanov)
            ->addShareholders($petrov);

        return $company->getId()->getValue();

    }


}