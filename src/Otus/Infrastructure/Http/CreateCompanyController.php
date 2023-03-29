<?php

namespace App\DDD\Otus\Infrastructure\Http;

use App\DDD\Otus\Application\UseCase\CreateCompanyUseCase;

class CreateCompanyController
{
    private CreateCompanyUseCase $useCase;

    /**
     * @param CreateCompanyUseCase $useCase
     */
    public function __construct(CreateCompanyUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function createCompany()
    {
        $id = $this->useCase->execute();
    }


}