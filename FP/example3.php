<?php
declare(strict_types=1);

$list = ['OTUS', 'PHP', 'Alex'];

//Передача функции по имени
function count_capitals($string): int {
    return mb_strlen(
        preg_replace('/[^A-Z]/', '', $string)
    );
}
$result1 = array_map('count_capitals', $list);

echo '<pre>';
print_r($result1);
echo '</pre>';

//Передача функции в переменной
$callback = static function ($string): int {
    return mb_strlen(
        preg_replace('/[^A-Z]/', '', $string)
    );
};

$result2 = array_map($callback, $list);

echo '<pre>';
print_r($result2);
echo '</pre>';


//Inline-функция (обычная)
$result3 = array_map(
    static function ($string): int {
        return mb_strlen(
            preg_replace('/[^A-Z]/', '', $string)
        );
    },
    $list
);

echo '<pre>';
print_r($result3);
echo '</pre>';

//Inline-функция (стрелочная)

$result4 = array_map(
        static fn($string): int => mb_strlen(
            preg_replace('/[^A-Z]/', '', $string)
        ),
    $list
);

echo '<pre>';
print_r($result4);
echo '</pre>';