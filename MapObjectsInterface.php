<?php


namespace Game;


interface MapObjectsInterface
{
    public function isPossibleMove(LocationInterface $location): bool;
    public function checkPossibleMove(LocationInterface $location);
}