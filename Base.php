<?php

namespace Game;

use Game\Locations\PlainInterface;

class Base implements BaseInterface
{
    public function isPossibleMove(LocationInterface $location): bool
    {
        if ($location instanceof PlainInterface) {
            return true;
        }

        return false;
    }

    public function checkPossibleMove(LocationInterface $location)
    {
        if (!$this->isPossibleMove($location)) {
            throw new \Exception('Not possible to move Base to this location');
        }
    }
}