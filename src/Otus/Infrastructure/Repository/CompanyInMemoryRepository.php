<?php

namespace App\DDD\Otus\Infrastructure\Repository;

use App\DDD\Otus\Domain\Entity\Company;
use App\DDD\Otus\Domain\Repository\CompanyRepositoryInterface;
use App\DDD\Otus\Domain\ValueObject\Id;

class CompanyInMemoryRepository implements CompanyRepositoryInterface
{
    private array $entities = [];

    public function add(Company $entity): void
    {
        $entityKey = $entity->getId()->getValue();
        if(!array_key_exists($entityKey, $this->entities)) {
            $this->entities[$entityKey] = $entityKey;
        }
    }

    public function remove(Company $entity): void
    {
        $entityKey = $entity->getId()->getValue();
        if(array_key_exists($entityKey, $this->entities)) {
            unset($this->entities[$entityKey]);
        }
    }

    public function findById(Id $id): ?Company
    {
        $entityKey = $id->getValue();
        return $this->entities[$entityKey] ?? null;
    }

    public function getNextId(): Id
    {
        return new Id(count($this->entities) + 1);
    }
}