<?php

namespace App\DDD\Generators\Books;

class BookProvider
{
    public function loadBooks(): array
    {
        $books = [];
        $file = $_SERVER['DOCUMENT_ROOT'].'/generators/1/goods.json';
        $fh = fopen($file, 'rb');
        while (($line = fgets($fh)) !== false) {
            $books[] = $line;
        }
        fclose($fh);
        return $books;
    }
}