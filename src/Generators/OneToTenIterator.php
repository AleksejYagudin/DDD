<?php

namespace App\DDD\Generators;
class OneToTenIterator implements \Iterator
{
    private int $current = 1;
    public function current(): int
    {
        echo 'Вовзращаем текщее значение'.PHP_EOL;
        return $this->current;
    }

    public function next(): void
    {
        $this->current++;
    }

    public function key(): int
    {
        return $this->current - 1;
    }

    public function valid(): bool
    {
        return $this->current >= 1 && $this->current <=10;
    }

    public function rewind(): void
    {
        $this->current = 1;
    }


}