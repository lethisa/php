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
    }
}

// inisialisasi
$bmw = new car();
$mercedes = new car();

// using method
$bmw -> moveWheels();
echo $bmw -> wheel;
//$mercedes -> moveWheels();

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
