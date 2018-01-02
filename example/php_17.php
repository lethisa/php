<?php

$file = "example.txt";

if ($handle = fopen($file, 'r')) {
    echo $content = fread($handle, filesize($file)); // each bits equals to character
    fclose($handle);
} else {
    echo "the application was not ale to write on this files";
}
