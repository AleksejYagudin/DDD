<?php

namespace App\DDD\Generators\Loans;

class App
{
    public function run(): void
    {
        $banks = [
            new BankGateway("Зеленый банк"),
            new BankGateway("Желтый банк"),
            new BankGateway("Красный банк"),
            new BankGateway("Фиолетовый банк"),
            new BankGateway("Ораньжевый банк"),
        ];
        foreach ($banks as $bank){
            echo $bank->request(10_000).PHP_EOL;
        }
    }
}