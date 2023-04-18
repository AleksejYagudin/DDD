<?php
$list = [1,2,3,4,5];

$callback = function (int $result, int $item): int {
    $l1=1;
    return $result + $item;
};

$init = 0;

$result = array_reduce($list, $callback, $init);
echo $result;