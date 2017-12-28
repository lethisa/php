<?php
include "connection.php";

function showAllData(){

  global $connection;
  $query_select = "SELECT * FROM user ORDER BY id ASC";
  $result = mysqli_query($connection, $query_select);

  if (!$result) {
    die("QUERY FAILED" . mysqli_error());
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<option value='$id'>$id</option>";
  }
}

function updateData(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE user SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($connection,$query);
    if (!$result) {
      die ("QUERY FAILED" . mysqli_error($connection));
    }

  }

  function deleteData(){
      global $connection;
      $username = $_POST['username'];
      $password = $_POST['password'];
      $id = $_POST['id'];

      $query = "DELETE FROM user ";
      $query .= "WHERE id = $id";

      $result = mysqli_query($connection,$query);
      if (!$result) {
        die ("QUERY FAILED" . mysqli_error($connection));
      }

    }

?>
