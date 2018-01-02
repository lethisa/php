<?php

$file = "example.txt";

if ($handle = fopen($file, 'w')) {
    fwrite($handle, "I Love You"); //rewrite - write once

    fclose($handle);
} else {
    echo "the application was not ale to write on this files";
}

?>
