<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$connection = mysqli_connect('localhost', 'lethisa', 'l3th1s4putr17', 'loginapp');

// check connection
if (!$connection) {
    die('Coonection Failed');
}

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
