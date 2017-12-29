<?php

class car
{
    var $wheel = 4;
    var $hood = 1;
    var $engine = 1;
    var $door = 4;

    public function moveWheels()
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
