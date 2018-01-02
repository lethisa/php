<?php

// database variable
$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "cms";

// define variable array
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

// connection query
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// check connection
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
