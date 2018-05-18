<?php

namespace Game;

interface UnitInterface extends MapObjectsInterface
{
    public function setAxis(int $axisX, int $axisY);

    public function getAxisX(): int;
    public function getAxisY(): int;

    public function fire(UnitInterface $target): bool;

    public function getTeam(): TeamInterface;
}