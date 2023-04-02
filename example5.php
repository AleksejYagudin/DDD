<?php
declare(strict_types=1);

abstract class Plane {
    abstract public function takeOff():void;
    abstract public function land():void;
    abstract public function fuel():void;
}

class Boeng extends Plane {
    public function takeOff(): void
    {
        echo 'Боинг: взлет' .'<br>';
    }

    public function land(): void
    {
        echo 'Боинг: посадка' .'<br>';
    }

    public function fuel(): void
    {

    }
}
class Cessna extends Plane {
    public function takeOff(): void
    {
        echo 'Цессна: взлет' .'<br>';
    }

    public function land(): void
    {
        echo 'Цессна: посадка' .'<br>';
    }

    public function fuel(): void
    {

    }
}

class Person {

}

class Pilot extends Person {
    public function fly(Plane $plane):void {
        $plane->takeOff();
        $plane->land();
    }
}

$pilot = new Pilot();

$plane = new Boeng();
$pilot->fly($plane);

$plane = new Cessna();
$pilot->fly($plane);

