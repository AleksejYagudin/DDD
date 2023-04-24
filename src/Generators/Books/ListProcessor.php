<?php

namespace App\DDD\Generators\Books;

class ListProcessor
{
    public static function map(callable $fn, array $data): array {
        return array_map($fn, $data);
    }

    public static function filter(callable $fn, array $data): array {
        return array_filter($data, $fn);
    }
}