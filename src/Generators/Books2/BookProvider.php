<?php

namespace App\DDD\Generators\Books2;

class BookProvider
{
    public function loadBooks(): iterable
    {
        $books = [];
        $file = 'D:\OSPanel\domains\test-otus.ru\generators\1\goods.json';
        $fh = fopen($file, 'rb');
        while (($line = fgets($fh)) !== false) {
            //Имитация работы с внешним API
            time_nanosleep(1, random_int(20_000_000, 40_000_000));
            yield $line;
        }
        fclose($fh);
    }
}