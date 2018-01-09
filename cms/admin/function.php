<?php

// ############### USER ONLINE ###############
function users_online()
{
    global $connection;
    $session = session_id();
    $time = time();
    $time_out_in_second = 30;
    $time_out = $time - $time_out_in_second;

    $query = "SELECT * FROM user_online WHERE session_online = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == null) {
        mysqli_query($connection, "INSERT INTO user_online(session_online, time_online) VALUES ('$session','$time')");
    } else {
        mysqli_query($connection, "UPDATE user_online SET time_online = '$time' WHERE session_online = '$session' ");
    }

    $user_online_query = mysqli_query($connection, "SELECT * FROM user_online WHERE time_online > '$time_out'");
    return $count_user = mysqli_num_rows($user_online_query);
}

// ############### CHECK QUERY ###############
function confirm_query($result)
{
    global $connection;

    if (!$result) {
        die("QUERY ERROR" . mysqli_error($connection));
    }
    return $result;
}
