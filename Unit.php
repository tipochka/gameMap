<?php

namespace Game;

abstract class Unit implements UnitInterface
{
    private $team;
    private $axisX;
    private $axisY;

    public function __construct(TeamInterface $team)
    {
        $this->team = $team;
    }

    public function setAxis(int $axisX, int $axisY)
    {
        $this->axisX = $axisX;
        $this->axisY = $axisY;
    }

    public function getAxisX(): int
    {
        return $this->axisX;
    }

    public function getAxisY(): int
    {
        return $this->axisY;
    }

    public function checkPossibleMove(LocationInterface $location)
    {
        if (!$this->isPossibleMove($location)) {
            throw new \Exception('Not possible to move to this location');
        }
    }

    abstract public function isPossibleMove(LocationInterface $location): bool;

    public function getTeam(): TeamInterface
    {
        return $this->team;
    }

    public function fire(UnitInterface $target): bool
    {
        return $this->isPossibleDestroy($target);
    }

    protected function isPossibleDestroy(UnitInterface $target): bool
    {
        if (!$this->isEnemy($target)) {
            return false;
        }

        return $this->isPossibleDestroyUnitType($target);
    }

    protected function isEnemy(UnitInterface $target): bool
    {
        return $this->team !== $target->getTeam();
    }

    abstract protected function isPossibleDestroyUnitType(UnitInterface $target): bool;
}