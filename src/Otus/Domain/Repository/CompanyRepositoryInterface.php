<?php
declare(strict_types=1);

namespace App\DDD\Otus\Domain\Repository;

use App\DDD\Otus\Domain\Entity\Company;
use App\DDD\Otus\Domain\ValueObject\Id;

interface CompanyRepositoryInterface
{
    public function add(Company $entity): void;
    public function remove(Company $entity): void;
    public function findById(Id $id): ?Company;
    public function getNextId(): Id;
}