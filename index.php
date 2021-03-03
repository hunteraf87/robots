<?php

require 'classes/FactoryRobot.php';
require 'classes/Robot.php';
require 'classes/MergeRobot.php';

spl_autoload_register('robots');

/**
 * @param string $classname
 */
function robots($classname) {
    if(strpos($classname, 'Robot') == 0)
        eval("class $classname extends Robot{}");
}

$factory = new FactoryRobot();

$factory->addType(new Robot1(100, 100, 50));
$factory->addType(new Robot2(200, 200, 100));

//var_dump($factory->createRobot1(3));
//var_dump($factory->createRobot2(2));

$MergeRobot = new MergeRobot();
$MergeRobot->addRobot($factory->createRobot2(3));
$MergeRobot->addRobot(new Robot1(100, 100, 50));

$factory->addType($MergeRobot);

$res = reset($factory->createMergeRobot(3));

var_dump($res->getSpeed());
var_dump($res->getWeight());
var_dump($res->getHeight());