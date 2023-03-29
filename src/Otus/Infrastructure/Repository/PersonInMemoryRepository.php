<?php

namespace App\DDD\Otus\Infrastructure\Repository;

use App\DDD\Otus\Domain\Entity\Person;
use App\DDD\Otus\Domain\Repository\PersonRepositoryInterface;
use App\DDD\Otus\Domain\ValueObject\Id;

class PersonInMemoryRepository implements PersonRepositoryInterface
{
    private array $entities = [];

    public function add(Person $entity): void
    {
        $entityKey = $entity->getId()->getValue();
        if(!array_key_exists($entityKey, $this->entities)) {
            $this->entities[$entityKey] = $entityKey;
        }
    }

    public function remove(Person $entity): void
    {
        $entityKey = $entity->getId()->getValue();
        if(array_key_exists($entityKey, $this->entities)) {
            unset($this->entities[$entityKey]);
        }
    }

    public function findById(Id $id): ?Person
    {
        $entityKey = $id->getValue();
        return $this->entities[$entityKey] ?? null;
    }

    public function getNextId(): Id
    {
        return new Id(count($this->entities) + 1);
    }
}