<?php
declare(strict_types=1);
namespace App\DDD\Generators\LoansNewFiber;

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

        //Отправляем заявки и ставим обработчик в очередь
        $queue = [];
        foreach ($banks as $id => $bank) {
            $queue[$id] = new \Fiber(function () use ($bank){
                return $bank->request(10_000);
            });
            //Запускаем генераторы
            $queue[$id]->start();
            echo "{$bank->name}: Отправлен запрос в API".PHP_EOL;
        }

        //Делаем по 10 проверок готовности в секунду * 3 секунды
        for($i = 0; $i < 90; $i++){
            time_nanosleep(0, 100_000_000);
            foreach ($queue as $id => $item){
                //Спрашиваем у обработчика: "Ну как?"
                $item->resume('check');
                //Если готово - выводим ответ банка и удаляем обработчик из очереди
                if($item->isTerminated()){
                    echo $item->getReturn().PHP_EOL;
                    unset($queue[$id]);
                }
            }
        }
        //3 секунды прошло, больше не ждем, останавливаем "подвисшие" заявки по таймауту
        foreach ($queue as $id => $item){
            $result = $item->send('stop');
            echo $result.PHP_EOL;
        }
    }
}