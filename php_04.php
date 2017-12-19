<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Section 4</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <?php
      echo '<h3>Math Function</h3>';
      // rank
      echo pow(2,2);
      echo '<br />';
      // random
      echo rand(1,50);
      echo '<br />';
      // kuadrat - square
      echo sqrt(100);
      echo '<br />';
      // pembulatan keatas
      echo ceil(4.1);
      echo '<br />';
      // pembulatan ke bawah
      echo floor(4.1);
      echo '<br />';
      // pembulatan standar
      echo round(4.5);
      echo '<br />';
    ?>

    <?php
    echo '<h3>String Function</h3>';
    $string = 'Hello Student do You Like Me';
    //string count
    echo strlen($string);
    echo '<br />';
    //uppercase
    echo strtoupper($string);
    echo '<br />';
    //lowercase
    echo strtolower($string);
    echo '<br />';
    ?>

    <?php
    echo '<h3>Arrays Function</h3>';
    $lists = [1,2,3,4,5,6,7,8,9];
    // max
    echo max($lists);
    echo '<br />';
    //min
    echo min($lists);
    echo '<br />';
    //sort
    sort($lists);
    print_r($lists);
    echo '<br />';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
