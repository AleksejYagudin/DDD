<?php

namespace App\DDD\Generators;

use App\DDD\Generators\Books\BookProvider;
use App\DDD\Generators\Books\ListProcessor;

class AppFp
{
    public function run(): void
    {
        $bookProvider = new BookProvider();
        $books = $bookProvider->loadBooks();
        $books = ListProcessor::map(static fn($json): object => json_decode($json), $books);
        $books = ListProcessor::filter(static fn($book): bool => $book->price > 9_000, $books);
        $this->print($books);
    }
    private function print(array $books): void {
        print("Цена | Остаток | Наименование".'<br>');
        print(str_repeat('-', 110).'<br>');
        foreach ($books as $book) {
            printf("%4d | %s".'<br>', $book->price, $book->title);
        }
    }
}