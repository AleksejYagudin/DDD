<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$l = new \App\DDD\Otus\Domain\ValueObject\Phone('22222222');

//не работает подключение. Прочитать ко композеру от отуса

echo '<pre>';
print_r($_SERVER['DOCUMENT_ROOT']);
echo '</pre>';