<?php

class Robot
{
    protected $speed;
    protected $weight;
    protected $height;

    public function __construct(int $speed = 0, int $weight = 0, int $height = 0)
    {
        $this->speed = $speed;
        $this->weight = $weight;
        $this->height = $height;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getHeight()
    {
        return $this->height;
    }
}