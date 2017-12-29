<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Session 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <?php
      echo "<h3>Variable</h3>";
      // Variable
      $name = "John Doe";
      $number = 100;
      // concatenation
      echo $name." ".$number;
      echo "</br>";
      echo "</br>";
    ?>

    <?php
      echo "<h3>Math Operation</h3>";
      // addition operation
      echo 12 + 13;
      echo "</br>";
      // reduction - subtraction
      echo 12 - 5;
      echo "</br>";
      // multiplication
      echo 12 * 5;
      echo "</br>";
      // division
      echo 12 / 4;
      echo "</br>";
      // parenthis
      echo (5 + 5) * 10;
      echo "</br>";

      $number1 = 12;
      $number2 = 13;

      echo $number1 + $number2;
      echo "</br>";
      echo "</br>";
    ?>

    <?php
      echo "<h3>Arrays</h3>";
      // multiple assign value with any type
      $numberList = array(267,8765,345,'5345',345,'<b>Hello</b>');
      echo $numberList[0];
      echo "</br>";

      print_r($numberList);
      echo "</br>";
      echo "</br>";
    ?>

    <?php
      echo "<h3>Associative Arrays</h3>";
      // normal array
      $number3 = array("a","b");
      echo $number3[0];
      echo "</br>";

      // associative array(key-value) => label
      $name3 = array("firstName" => "Edward", 2 => "ucok");
      print_r($name3);
      echo "</br>";
      echo $name3["firstName"];
      echo "</br>";
      echo $name3[2];
      echo "</br>";
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
