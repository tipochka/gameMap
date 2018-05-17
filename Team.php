<?php

namespace Game;

use Game\Units\{PlaneInterface, HumanInterface, TransportInterface};

class Team implements TeamInterface
{
    private $base;
    private $humans = [];
    private $planes = [];
    private $transports = [];

    public function __construct(BaseInterface $base)
    {
        $this->base = $base;
    }

    public function getBase(): BaseInterface
    {
        return $this->base;
    }

    public function addHuman(HumanInterface $human)
    {
        $this->humans[] = $human;
    }

    public function getHumans(): array
    {
        return $this->humans;
    }

    public function addPlane(PlaneInterface $plane)
    {
        $this->planes[] = $plane;
    }

    public function getPlanes(): array
    {
        return $this->planes;
    }

    public function addTransport(TransportInterface $transport)
    {
        $this->transports[] = $transport;
    }

    public function getTransports(): array
    {
        return $this->transports;
    }
}