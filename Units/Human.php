<?php

namespace Game\Units;

use Game\Unit;
use Game\{LocationInterface, UnitInterface};
use Game\Locations\{SwampInterface, PlainInterface};

class Human extends Unit implements HumanInterface
{
    public function isPossibleMove(LocationInterface $location): bool
    {
        if ($location instanceof SwampInterface) {
            return false;
        }

        return true;
    }

    protected function isPossibleDestroyUnitType(UnitInterface $target): bool
    {
        if ($target instanceof PlainInterface) {
            return false;
        }

        return true;
    }
}