<?php
// public == var
class car
{
    public $wheels = 12;
    protected $hood = 1; // available class + sub class
    private $engine = 2; // only class
    var $doors = 5;

    function moveWheels(){
      $this->wheels = 10;
    }
}

$bmw = new car();
//echo $bmw->hood; // protected

class semi extends car{
  function moving(){
    echo $this->hood; // can use inheretance
    echo $this->engine; // private
  }
}

$truck = new semi();
$truck->moving();
?>
