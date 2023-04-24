<?php

namespace App\DDD\Generators;

class App
{
    public function run(): void
    {
        print("Цена | Остаток | Наименование".'<br>');
        print(str_repeat('-', 110).'<br>');

        $file = $_SERVER['DOCUMENT_ROOT'].'/generators/1/goods.json';

        $fh = fopen($file, 'rb');

        while (($line = fgets($fh)) !== false) {

            //Преобразуем строку в JSON
            $data = json_decode(
                $line,
                false,
                512,
                JSON_THROW_ON_ERROR
            );

            //Проверяем цену
            if($data->price > 9_000) {
                //Выводим строку из таблицы на экран
                printf("%4d | %s".'<br>', $data->price, $data->title);
            }
        }
        fclose($fh);
    }
}