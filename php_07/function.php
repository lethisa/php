<?php
include "connection.php";

function showAllData(){

  global $connection;
  $query_select = "SELECT * FROM user ORDER BY id ASC";
  $result = mysqli_query($connection, $query_select);

  if (!$result) {
    die("Query Failed" . mysqli_error());
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    echo "<option value='$id'>$id</option>";
  }


}

?>
