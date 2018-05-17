<?php

namespace Game;

interface GameMapInterface
{
    public function addLocation(int $axisX, int $axisY, LocationInterface $location);

    public function addUnit(int $axisX, int $axisY, UnitInterface $unit);

    public function addBase(int $axisX, int $axisY, BaseInterface $base);

    public function moveUnit(int $axisX, int $axisY, UnitInterface $unit);

    public function removeUnit(int $axisX, int $axisY);
}