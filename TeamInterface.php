<?php

namespace Game;

use Game\Units\{PlaneInterface, HumanInterface, TransportInterface};

interface TeamInterface
{
    public function getBase(): BaseInterface;

    public function addHuman(HumanInterface $human);
    public function getHumans(): array;

    public function addPlane(PlaneInterface $plane);
    public function getPlanes(): array;

    public function addTransport(TransportInterface $transport);
    public function getTransports(): array;
}