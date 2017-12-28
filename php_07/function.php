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

include 'connection.php';

    function inserData()
    {
      global $connection;
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query_insert = "INSERT INTO user (username,password) VALUE ('$username',$password)";
      $result = mysqli_query($connection, $query_insert);

      if (!$result) {
        die('QUERY FAILED'.mysqli_error());
      }

    }

    function showAllData()
    {
        global $connection;
        $query_select = 'SELECT * FROM user ORDER BY id ASC';
        $result = mysqli_query($connection, $query_select);

        if (!$result) {
            die('QUERY FAILED'.mysqli_error());
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }
    }


    function updateData()
    {
        global $connection;
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = 'UPDATE user SET ';
        $query .= "username = '$username', ";
        $query .= "password = '$password' ";
        $query .= "WHERE id = $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('QUERY FAILED'.mysqli_error($connection));
        }
    }

    function deleteData()
    {
        global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query_delete = 'DELETE FROM user ';
        $query_delete .= "WHERE id = $id";

        $result = mysqli_query($connection, $query_delete);
        if (!$result) {
            die('QUERY FAILED'.mysqli_error($connection));
        }
    }
