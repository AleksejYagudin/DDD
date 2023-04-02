<?php
declare(strict_types=1);
class Man {
    public function changeLightbulb(): void {}
}

class Sailor extends Man{
    public function tieBoatingKnot(): void {}
}

class Captain extends Sailor{
    public function commandShip(): void {}
}

function findTrueLove(Sailor $sailor)
{
    $sailor->changeLightbulb();
    $sailor->tieBoatingKnot();
}

//$man = new Man();
$sailor = new Sailor();
$captain = new Captain();

//findTrueLove($man);
findTrueLove($sailor);
findTrueLove($captain);
