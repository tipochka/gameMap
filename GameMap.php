<?php

namespace Game;

class GameMap implements GameMapInterface
{
    private $locations = [];
    private $units = [];
    private $bases = [];

    public function addLocation(int $axisX, int $axisY, LocationInterface $location)
    {
        $this->locations[$axisY][$axisX] = $location;
    }

    public function addUnit(int $axisX, int $axisY, UnitInterface $unit)
    {
        $this->checkPossibleMoveUnit($axisX, $axisY, $unit);
        $unit->setAxis($axisX, $axisY);
        $this->units[$axisY][$axisX] = $unit;
    }

    public function addBase(int $axisX, int $axisY, BaseInterface $base)
    {
        $this->checkPossibleAddUnit($axisX, $axisY, $base);
        $this->bases[$axisY][$axisX] = $base;
    }

    public function moveUnit(int $axisX, int $axisY, UnitInterface $unit)
    {
        $this->removeUnit($unit->getAxisX(), $unit->getAxisY());
        $this->addUnit($axisX, $axisY, $unit);
    }

    public function removeUnit(int $axisX, int $axisY)
    {
        unset($this->units[$axisY][$axisX]);
    }

    private function checkPossibleMoveUnit(int $axisX, int $axisY, UnitInterface $unit)
    {
        $this->checkHasLocation($axisX, $axisY);
        $unit->checkPossibleMove($this->locations[$axisY][$axisX]);
    }

    private function checkPossibleAddUnit(int $axisX, int $axisY, BaseInterface $base) {
        $this->checkHasLocation($axisX, $axisY);
        $base->checkPossibleMove($this->locations[$axisY][$axisX]);
    }

    private function checkHasLocation(int $axisX, int $axisY)
    {
        if (empty($this->locations[$axisY][$axisX])) {
            throw new \Exception('No location');
        }
    }
}