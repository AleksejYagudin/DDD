<?php
declare(strict_types=1);

//Рациональные числа
class RationalNumber {}

class IntegerNumber extends RationalNumber {}

class Sensor {
    //Возвращает текущие расходы воды
    public function getCurrent(): IntegerNumber {
        return new IntegerNumber(42);
    }
}

class WaterMeter {
    //Добавляет текущий расход к суммарному итогу
    public function accumulate(IntegerNumber $current): IntegerNumber {
        return new IntegerNumber(240);
    }
}

class PreciseWaterMeter extends WaterMeter {
    public function accumulate(RationalNumber $current): RationalNumber
    {
        return new RationalNumber(204.12);
    }
}

class MosRuApi {
    //Отправляет суммарный итог
    public function report(IntegerNumber $amount): void {}
}

$sensor = new Sensor();
$waterMeter = new WaterMeter();
$mosRuApi = new MosRuApi();

$current = $sensor->getCurrent();
$total = $waterMeter->accumulate($current);
$mosRuApi->report($total);