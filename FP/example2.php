<?php
declare(strict_types=1);

$list = ['OTUS', 'PHP', 'Alex'];

//Императивный стиль
//Вычисление в цикле

$result = [];

foreach ($list as $item) {
    $result[] = mb_strlen($item);
}

echo '<pre>';
print_r($result);
echo '</pre>';

//Функциональный стиль
$list = ['OTUS', 'PHP', 'Alex'];

$resultFP = array_map('mb_strlen', $list);

echo '<pre>';
print_r($resultFP);
echo '</pre>';
