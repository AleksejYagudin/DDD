<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\Repository;

use App\DDD\Otus\Domain\Entity\Person;
use App\DDD\Otus\Domain\ValueObject\Id;

interface PersonRepositoryInterface
{
    public function add(Person $entity): void;
    public function remove(Person $entity): void;
    public function findById(Id $id): ?Person;
    public function getNextId(): Id;
}