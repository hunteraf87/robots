<?php

class FactoryRobot
{
    private $types = [];
    private $robots = [];

    public function addType($robot)
    {
        $this->types[get_class($robot)] = $robot;
    }

    public function getTypes()
    {
        return $this->types;
    }

    public function getRobots()
    {
        return $this->robots;
    }

    private function createRobot($classname, $count)
    {
        $robots = [];
        for($i = 1; $i <= $count; $i++)
            $robots[] = $this->types[$classname];
        $this->robots = array_merge($this->robots, $robots);
        return $robots;
    }

    public function __call($name, $arguments)
    {
        if(strpos($name, 'create') == 0){
            $classname = str_replace('create', '', $name);
            if(array_key_exists($classname, $this->types))
                return $this->createRobot($classname, count($arguments) ? intval($arguments[0]) : 1);
        }
    }
}