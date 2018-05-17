<?php

namespace Game;


class GameMapBuilder
{
    private $gameMap = 0;

    private $countLocationList = [];

    private $countTeams = 0;

    private $countHumans = 0;
    private $countPlans = 0;
    private $countTransports = 0;

    private $height = 0;
    private $width = 0;

    public function __construct()
    {
        $this->gameMap = new GameMap();
    }

    public function setCountHumans(int $countHumans)
    {
        $this->countHumans = $countHumans;
    }

    public function setCountPlans(int $countPlans)
    {
        $this->countPlans = $countPlans;
    }

    public function setCountTransports(int $countTransports)
    {
        $this->countTransports = $countTransports;
    }

    public function setCountMountains(int $countMountains)
    {
        $this->countLocationList['Mountains'] = $countMountains;
    }

    public function setCountPlains(int $countPlains)
    {
        $this->countLocationList['Plain'] = $countPlains;
    }

    public function setCountSwamps(int $countSwamps)
    {
        $this->countLocationList['Swamp'] = $countSwamps;
    }

    public function setCountWaters(int $countWaters)
    {
        $this->countLocationList['Water'] = $countWaters;
    }

    public function setCountTeams(int $countTeams)
    {
        $this->countTeams = $countTeams;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function getGameMap(): GameMapInterface
    {
        $this->checkSize();
        $this->addLocations();
        $this->addUnits();

        return $this->gameMap;
    }

    private function checkSize()
    {
        if ($this->height * $this->width != array_sum($this->countLocationList)) {
            throw new \Exception('Incorrect size map or count locations');
        }
    }

    private function addLocations()
    {
        $countLocationList = $this->countLocationList;
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                $indexLocation = rand(0, count($countLocationList) - 1);
                $keys = array_keys($countLocationList);
                $className = 'Game\\Locations\\' . $keys[$indexLocation];
                $this->gameMap->addLocation($j, $i, new $className());

                $countLocationList[$indexLocation]--;
                if ($countLocationList[$indexLocation] < 1) {
                    unset($countLocationList[$indexLocation]);
                }
            }
        }
    }

    private function addUnits()
    {
        $teamFactory = new TeamFactory();

        $teamFactory->setCountHumans($this->countHumans);
        $teamFactory->setCountPlanes($this->countPlans);
        $teamFactory->setCountTransports($this->countTransports);

        for ($teamIndex = 0; $teamIndex < $this->countTeams; $teamIndex++) {
            $team = $teamFactory->create();

            $this->gameMap->addBase($this->randAxisX(), $this->randAxisY(), $team->getBase());
            $this->allocationUnits($team->getHumans());
            $this->allocationUnits($team->getPlanes());
            $this->allocationUnits($team->getTransports());
        }
    }

    private function allocationUnits($units)
    {
        foreach ($units as $unit) {
            $this->allocationUnit($unit);
        }
    }

    private function allocationUnit(UnitInterface $unit)
    {
        $axisXList = $this->generateUniqueArray($this->width - 1);
        $axisYList = $this->generateUniqueArray($this->height - 1);

        $message = '';
        foreach ($axisXList as $axisX) {
            foreach ($axisYList as $axisY) {
                try {
                    $this->gameMap->addUnit($axisX, $axisY, $unit);

                    return;
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                }
            }
        }

        throw new \Exception($message);
    }

    private function randAxisX(): int
    {
        return rand(0, $this->width - 1);
    }

    private function randAxisY(): int
    {
        return rand(0, $this->height - 1);
    }

    private function generateUniqueArray(int $length): array
    {
        $array = range(0, $length);
        shuffle($array);

        return $array;
    }

}