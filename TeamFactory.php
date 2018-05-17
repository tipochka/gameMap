<?php

namespace Game;


class TeamFactory
{
    private $countHumans = 0;
    private $countPlanes = 0;
    private $countTransports = 0;
    private $team;

    public function setCountHumans(int $countHumans)
    {
        $this->countHumans = $countHumans;
    }

    public function setCountPlanes(int $countPlanes)
    {
        $this->countPlanes = $countPlanes;
    }

    public function setCountTransports(int $countTransports)
    {
        $this->countTransports = $countTransports;
    }

    public function create(): TeamInterface
    {
        $this->team = new Team(new Base);

        $this->createTeamMember($this->countHumans, 'addHuman', 'Game\Units\Human');
        $this->createTeamMember($this->countPlanes, 'addPlane', 'Game\Units\Plane');
        $this->createTeamMember($this->countTransports, 'addTransport', 'Game\Units\Transport');

        return $this->team;
    }

    private function createTeamMember(int $count, string $method, string $className)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->team->$method(new $className($this->team));
        }
    }
}