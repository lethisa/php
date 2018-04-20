<?php

// redirect function
function redirect($location)
{
    header("Location: $location");
}

// query function
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

// check query function
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

// escape string function
function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

// fetch array function
function fetch_array($result){
    return mysqli_fetch_array($result);
}
