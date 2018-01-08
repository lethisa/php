<?php include "./function.php"; ?>

<!-- ############### QUERY SELECT POST ID ############### -->
<?php

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query_select = "SELECT * FROM user WHERE user_id = $user_id";
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
}
?>


<!-- ############### FORM UPDATE USER ############### -->
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
        echo "<option value='admin'>admin</option>";
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
    <input class="btn btn-primary" type="submit" name="update_user" value="UPDATE" />
  </div>

</form>

<!-- ############### QUERY UPDATE USER ############### -->
<?php
  if (isset($_POST['update_user'])) {
    $user_id = $_GET['user_id'];
    $username = $_POST['username'];
    $password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    if (!$password == $password) {
      $query = "SELECT randSalt FROM user";
      $select_randSalt = mysqli_query($connection, $query);

      confirm_query($select_randSalt);

      $row = mysqli_fetch_array($select_randSalt);
      // encrypt password
      $salt = $row['randSalt'];
      $password = crypt($password , $salt);
    }

    $query_update = "UPDATE user SET ";
    $query_update .= "username = '{$username}', ";
    $query_update .= "user_password ='{$password}', ";
    $query_update .= "user_firstname = '{$user_firstname}', ";
    $query_update .= "user_lastname ='{$user_lastname}', ";
    $query_update .= "user_role ='{$user_role}', ";
    $query_update .= "user_email = '{$user_email}' ";
    $query_update .= "WHERE user_id = {$user_id}";
    $update_user = mysqli_query($connection, $query_update);

    confirm_query($update_user);

    header("Location: view_user.php");
}
?>
