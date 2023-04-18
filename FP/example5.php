<?php
declare(strict_types=1);

$list = [1, 2, 3, 4, 5];

//Императивный стиль

$result1 = 0;

foreach ($list as $item) {
    $result1 += $item;
}
echo '<pre>';
print_r($result1);
echo '</pre>';

//Функциональный стиль

$callback = function (int $result, int $item): int {
    return $result + $item;
};

$init = 0;

$result2 = array_reduce($list, $callback, $init);

echo '<pre>';
print_r($result2);
echo '</pre>';
