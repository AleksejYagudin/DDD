<?php
declare(strict_types=1);
function add(float $a, float $b): float {
    return $a + $b;
}

echo add(1.5, 2.5).PHP_EOL;
echo add((int)10, (int)20).PHP_EOL;