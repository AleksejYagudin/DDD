<?php
declare(strict_types=1);

//function oneToTenGenerator(): Generator
//{
//    yield 1;
//    yield 2;
//    yield 3;
//    yield 4;
//    yield 5;
//    yield 6;
//    yield 7;
//    yield 8;
//    yield 9;
//    yield 10;
//}

function oneToTenGenerator(): Generator
{
    for ($i = 1; $i <= 10; $i++) {
        echo "Возвращаем $i" . PHP_EOL;
        yield $i;
    }
}
$iterator = oneToTenGenerator();

foreach ($iterator as $key => $value) {
    echo "{$key}: {$value}".PHP_EOL;
}
//$l1 = $iterator->next();
//$l11 = $iterator->current();
//$l2 = $iterator->next();
//$l22 = $iterator->current();
//$l3 = $iterator->next();
//$l33 = $iterator->current();

