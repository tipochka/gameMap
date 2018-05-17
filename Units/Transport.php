<?php

namespace Game\Units;

use Game\Unit;
use Game\{LocationInterface, UnitInterface};
use Game\Locations\{WaterInterface, PlainInterface, MountainsInterface};

class Transport extends Unit implements TransportInterface
{
    public function isPossibleMove(LocationInterface $location): bool
    {
        if ($location instanceof WaterInterface || $location instanceof MountainsInterface) {
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