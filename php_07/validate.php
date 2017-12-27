<?php
if (isset($_POST["submit"])) {
  //variable
  $username = $_POST["username"];
  $password = $_POST["password"];

  //database connection
  $connection = mysqli_connect("localhost","lethisa","l3th1s4putr17","loginapp");

  //check connection database type 1
  /*
  if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  } else {
    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($connection) . PHP_EOL;
    // close connection
    mysqli_close($connection);

  }*/

  //chck connection type 2
  if ($connection) {
    // insert query to table user
    $query_insert = "INSERT INTO user (username,password) VALUE ('$username',$password)";
    $result = mysqli_query($connection, $query_insert);

    if (!$result) {
      die("QURY FAILED" . mysqli_error);
    }

  } else {
    //die — Equivalent to exit
    die("Database Connection Failed");
  }

}

?>
