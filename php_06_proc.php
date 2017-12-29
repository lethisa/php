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
