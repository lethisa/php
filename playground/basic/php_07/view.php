<?php
include "connection.php";

// check connection
if ($connection) {
    $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    // if query failed
    if (!$result) {
        die("Query Failed".mysqli_error);
    }

    // if connection failed
} else {
    die("Coonection Failed");
}
