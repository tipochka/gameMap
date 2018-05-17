<?php

namespace Game\Units;

use Game\Unit;
use Game\{LocationInterface, UnitInterface};

class Plane extends Unit implements PlaneInterface
{
    public function isPossibleMove(LocationInterface $location): bool
    {
        return true;
    }

    protected function isPossibleDestroyUnitType(UnitInterface $target): bool
    {
        if ($target instanceof TransportInterface) {
            return true;
        }

        return false;
    }
}