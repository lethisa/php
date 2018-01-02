<?php

  // submit actions
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $name = array('Edwin','John','Marrie','Jane','Tom');
    $minimum = 5;
    $maximum = 10;

    // username length check
    if (strlen($username) < $minimum) {
      echo 'username too short';
    } elseif (strlen($username) > $maximum) {
      echo 'username too long';
    }

    // username check available
    if (!in_array($username, $name)) {
      echo 'not exist';
    } else {
      echo 'welcome';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Form Input</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>

<body>
  <form action="php_05.php" method="post">
    <input type="text" name="username" placeholder="Enter Username" />
    <input type="password" name="password" placeholder="Enter Password" />
    <input type="submit" name="submit"/>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>

</html>
