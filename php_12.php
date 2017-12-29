<?php

class car
{
    var $wheel = 14;
    var $hood = 1;
    var $engine = 1;
    var $door = 4;

    function moveWheels()
    {
        echo "Wheels Move";
        $this->wheel = 2; // this inside class
    }
}

// instant
$bmw = new car();

// using method
$bmw -> moveWheels();

// using properties
echo $bmw -> wheel;

// change value properies
$bmw -> wheel = 8;
echo $bmw -> wheel;

// check class
if (class_exists("car")) {
    echo "class exist ";
} else {
    echo "class not exist ";
}

// check method
if (method_exists("car", "moveWheels")) {
    echo "method exist ";
} else {
    echo "method not exist ";
}

// inheretance

class plane extends car
{
    // change value in child
    var $wheel = 23;
}

$jet = new plane();
// properti inheretance
echo $jet -> wheel;
// inheritance method
$jet -> moveWheels();

// constructor
class animal
{
    var $foot = 14;
    var $teeth = 1;

    function __construct()
    {
        echo $this -> foot = 4;
    }
}

$duck = new animal();
