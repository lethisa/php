<?php
// static data in class

class car
{
    public static $whells =14;
    public $hood = 1;

    public static function moveWheels() // use static to call static function
    {
        //$this->wheels=10;//cannot
        car::$whells = 10;
    }
}

$bmw = new car();
//$bmw->wheels; // cannot
//echo car::$whells; //using it

//using function
car::moveWheels();
echo car::$whells;

echo $bmw->hood;

?>
