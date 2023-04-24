<?php

namespace App\DDD\Generators;

use App\DDD\Generators\Books2\BookProvider;
use App\DDD\Generators\Books2\ListProcessor;

class AppFp2
{
    public function run(): void
    {
        $bookProvider = new BookProvider();
        $books = $bookProvider->loadBooks();
        $books = ListProcessor::map(static fn($json): object => json_decode($json), $books);
        $books = ListProcessor::filter(static fn($book): bool => $book->price > 9_000, $books);
        $this->print($books);
    }
    private function print(iterable $books): void {
        print("Цена | Остаток | Наименование".PHP_EOL);
        print(str_repeat('-', 110).PHP_EOL);
        foreach ($books as $book) {
            printf("%4d | %s" .PHP_EOL, $book->price, $book->title);
        }
    }
}