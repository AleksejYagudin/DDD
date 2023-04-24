<?php

use App\DDD\Generators\App;
use App\DDD\Generators\AppFp;
use App\DDD\Generators\AppFp2;
use App\DDD\Generators\OneToTenIterator;

include 'D:\OSPanel\domains\test-otus.ru\vendor\autoload.php';
//$test1 = new App();
//$test1->run();
//echo '--------------------'.'<br>';
//$test2 = new AppFp();
//$test2->run();

//$iterator = new OneToTenIterator();
//
//foreach ($iterator as $key => $value) {
//    echo "{$key}: {$value}" . PHP_EOL;
//}

//$test1 = new AppFp2();
//$test1->run();

//$test1 = new \App\DDD\Generators\LoansNew\App();
//$test1->run();

$test1 = new \App\DDD\Generators\LoansNewFiber\App();
$test1->run();