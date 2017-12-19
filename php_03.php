<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Section 3</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <?php
    echo '<h3>Defining Function</h3>';
    // defining function
    function callName(){
      echo 'Hello Function';
    }
    // call function
    callName();
    ?>

    <?php
    echo '<h3>Function Parameter</h3>';
    // function parameter
    function greeting($message){
      echo $message;
      echo '<br />';
    }

    greeting('text');

    function calculate($number1, $number2){
      $total = $number1 + $number2;
      echo 'Total'.' '.$total;
      echo '<br />';
    }

    calculate(12,4);
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
