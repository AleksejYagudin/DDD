<?php

namespace App\DDD\Generators\Books2;

class ListProcessor
{
    public static function map(callable $fn, iterable $data): iterable {
        foreach ($data as $item) {
            yield $fn($item);
        }
    }

    public static function filter(callable $fn, iterable $data): iterable {
        foreach ($data as $item) {
            if($fn($item)) {
                yield $item;
            }

        }
    }
}