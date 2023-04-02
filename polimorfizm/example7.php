<?php
declare(strict_types=1);

interface Flyable {
    public function takeOff():void;
    public function land():void;
}

abstract class Plane implements Flyable {

    private Pilot $pilot;

    public function setPilot(Pilot $pilot): void {
        $this->pilot = $pilot;
    }

    public function startFlight(): void {
        $aircraft = $this;
        $this->pilot->fly($aircraft);
    }
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
    public function fly(Flyable $aircraft):void {
        $aircraft->takeOff();
        $aircraft->land();
    }
}

class FlightSimulator implements Flyable {
    public function takeOff(): void
    {
        echo 'Тренажер: имитация взлета' .'<br>';
    }

    public function land(): void
    {
        echo 'Тренажер: имитация посадки' .'<br>';
    }
}

$pilot = new Pilot();

$plane = new Boeng();
$plane->setPilot($pilot);
$plane->startFlight();

//$plane = new Cessna();
//$pilot->fly($plane);
//
//$flightSimulator = new FlightSimulator();
//$pilot->fly($flightSimulator);
//
