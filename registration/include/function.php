<?php

// ############### CHECK QUERY ###############
function confirm_query($result)
{
    global $connection;

    if (!$result) {
        die("QUERY ERROR" . mysqli_error($connection));
    }
    return $result;
}
