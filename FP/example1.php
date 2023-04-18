<?php
declare(strict_types=1);

function foo(callable $a): int {
return 5;
}

//не можем передать в функцию что-то отличное от функции, потому что функция принимает callable
$ll = 10;
foo($ll);