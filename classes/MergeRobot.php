<?php

class MergeRobot extends Robot
{
    private $robots = [];

    public function addRobot($robots)
    {
        if(is_array($robots) && !empty($robots)){

            $this->robots = array_merge($this->robots, $robots);

            $this->speed = $robots[0]->speed < $this->speed || $this->speed == 0 ? $robots[0]->speed : $this->speed;
            $this->height += count($robots) * $robots[0]->height;
            $this->weight += count($robots) * $robots[0]->weight;

        } elseif (is_a($robots, 'Robot')) {

            $this->robots[] = $robots;
            $this->speed = $robots->speed < $this->speed || $this->speed == 0 ? $robots->speed : $this->speed;
            $this->height += $robots->height;
            $this->weight += $robots->weight;

        }
    }
}