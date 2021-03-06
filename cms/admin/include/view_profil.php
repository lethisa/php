<!-- ############### QUERY SELECT USER PROFIL ############### -->
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query_select = "SELECT * FROM user WHERE username = '$username' ";
    $select_user = mysqli_query($connection, $query_select);

    confirm_query($select_user);

    while ($row_user = mysqli_fetch_assoc($select_user)) {
        $user_id = $row_user['user_id'];
        $username = $row_user['username'];
        $password = $row_user['user_password'];
        $user_firstname = $row_user['user_firstname'];
        $user_lastname = $row_user['user_lastname'];
        $user_email = $row_user['user_email'];
        $user_image = $row_user['user_image'];
        $user_role = $row_user['user_role'];
        $randSalt = $row_user['randSalt'];
    }
} else {
    echo "UNKNOW USER";
}
?>


<!-- ############### FORM USER PROFIL ############### -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>"/>
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Role</label>
    <select name="user_role" id="" class="form-control">
      <option value="<?php echo $user_role; ?>" ><?php echo $user_role; ?></option>
      <!-- ############### ROLE USER OPTION ############### -->
      <?php
      if ($user_role == "admin") {
          echo "<option value='subscriber'>subscriber</option>";
      } else {
          echo "<option value='admin'>Admin</option>";
      }

      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="title">E-Mail</label>
    <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $password; ?>" />
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_user_profile" value="UPDATE PROFIL" />
  </div>

</form>

<!-- ############### QUERY UPDATE USER ############### -->
<?php
  if (isset($_POST['update_user_profile'])) {
      $username_old = $_SESSION['username'];
      $username = $_POST['username'];
      $user_password = $_POST['user_password'];
      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $user_email = $_POST['user_email'];
      $user_role = $_POST['user_role'];

      if (!empty($user_password)) {
        $query_pass = "SELECT user_password FROM user WHERE user_id = {$user_id}";
        $get_user = mysqli_query($connection, $query_pass);
        confirm_query($get_user);

        $row = mysqli_fetch_array($get_user);
        $db_user_pass = $row['user_password'];
      }

      if ($user_password != $db_user_pass) {
        // hash password
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
      }

      $query_update = "UPDATE user SET ";
      $query_update .= "username = '{$username}', ";
      $query_update .= "user_password ='{$user_password}', ";
      $query_update .= "user_firstname = '{$user_firstname}', ";
      $query_update .= "user_lastname ='{$user_lastname}', ";
      $query_update .= "user_role ='{$user_role}', ";
      $query_update .= "user_email = '{$user_email}' ";
      $query_update .= "WHERE username = '{$username_old}' ";
      $update_user = mysqli_query($connection, $query_update);

      confirm_query($update_user);

      header("Location: ../index.php");
  }
?>
