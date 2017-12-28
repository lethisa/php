<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Session 2</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <?php
      echo '<h3>If Statements</h3>';
      // if structure
      if (3 >= 10) {
        echo 'three is less than ten';
      } elseif (3 <=4) {
        echo 'three is less than four';
      } else {
        echo 'it is not';
      }
      echo '<br />';
    ?>

    <?php
      echo '<h3>Comparison Opeartor</h3>';
      // equal ==
      // identical ===
      // compare > < >= <= <>
      // not equl !=
      // not identical !==

      // || -----> or
      // && -----> and
      // !  -----> not

      if ((4 == 4) && (5 > 7)) {
        echo 'true';
      } else {
        echo 'false';
      }
    ?>

    <?php
      echo '<h3>Switch Statements</h3>';
      $number = 10;
      // switch structure
      switch ($number) {
        case 34:
          echo 'is it 34';
          break;
        case 35:
          echo 'is it 35';
          break;
        default:
          echo 'not include';
          break;
      }
      echo '<br />';
    ?>

    <?php
      echo '<h3>While Loops</h3>';
      // while loop structure
      $counter = 0; // initializer - counter variable
      while ($counter < 10) {
        echo 'number'.' '.$counter;
        echo '<br />';
        //$counter = $counter + 1;
        $counter++;
      }
    ?>

    <?php
      echo '<h3>Foor Loops</h3>';
      // for loops structure
      for ($i=0; $i < 10; $i++) { // index - condition - increment
        echo 'number'.' '.$i;
        echo '<br />';
      }
     ?>

     <?php
      echo '<h3>Foreach Loop</h3>';
      // foreach structure type 1
      $numbers = array(1,2,3,4,5,6,7,8,9,10);
      foreach ($numbers as $key) { //variable - key
        echo $key;
        echo '<br />';
      }

      // foreach structure type 2
      $name = array (1 => 'Dinda', 2 => 'Dodi', 3 => 'Bodu');
      foreach ($name as $keyName => $dataName) {
        echo 'This number'.' '.$keyName.' is'.' '.$dataName;
        echo '<br />';
      }
     ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
