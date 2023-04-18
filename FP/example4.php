<?php
declare(strict_types=1);

$list = ['OTUS', 'PHP', 'Alex'];

class CapitalCounter {
    public function __invoke(string $string): int
    {
        return mb_strlen(
            preg_replace('/[^A-Z]/', '', $string)
        );
    }
}

$result1 = array_map(new CapitalCounter(), $list);

echo '<pre>';
print_r($result1);
echo '</pre>';

$obj = new CapitalCounter();
echo $obj('TTTrrr');
