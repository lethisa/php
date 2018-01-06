<?php include "db.php"; ?>
<?php include "../admin/function.php"; ?>
<?php session_start(); ?>

<!-- ############### LOGIN VALIDATION ############### -->
<?php
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE username = '{$username}'";
    $select_query = mysqli_query($connection, $query);

    confirm_query($select_query);

    while ($row_user = mysqli_fetch_array($select_query)) {
        $db_user_id = $row_user['user_id'];
        $db_username = $row_user['username'];
        $db_password = $row_user['user_password'];
        $db_user_firstname = $row_user['user_firstname'];
        $db_user_lastname = $row_user['user_lastname'];
        $db_user_role = $row_user['user_role'];
    }
    // REDIRECT
    if ($username === $db_username && $password === $db_password) {
      // SESSION
      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['user_firstname'] = $db_user_firstname;
      $_SESSION['user_lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;

      header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }
}

?>
