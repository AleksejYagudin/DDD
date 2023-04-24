<?php
declare(strict_types=1);
namespace App\DDD\Generators\Loans;

class BankGateway
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function request(int $amount): string
    {
        $result = file_get_contents('http://test-otus.ru/generators/3/api.php');
        return "{$this->name}: $result";
    }
}