<?php include "./function.php"; ?>
<!-- ############### QUERY INSERT USER ############### -->
<?php

if (isset($_POST['insert_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname =$_POST['user_lastname'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];

    $query_insert = "INSERT INTO user (user_firstname, user_lastname, username, user_email, user_password, user_image, user_role, randSalt) ";
    $query_insert .= "VALUES('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_password}','','{$user_role}','') ";
    $insert_user = mysqli_query($connection, $query_insert);

    confirm_query($insert_user);
    header("Location: http://localhost/php/cms/admin/view_user.php");

}
?>

<!-- ############### FORM INSERT USER ############### -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname" />
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" />
  </div>

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username" />
  </div>

  <div class="form-group">
    <label for="title">Role</label>
    <select name="user_role" id="" class="form-control">
      <option value="subscriber">Subscriber</option>
      <option value="admin">Admin</option>
    </select>
  </div>

  <div class="form-group">
    <label for="title">E-Mail</label>
    <input type="text" class="form-control" name="user_email" />
  </div>

  <div class="form-group">
    <label for="title">Password</label>
    <input type="password" class="form-control" name="user_password" />
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_user" value="UPDATE" />
  </div>

</form>
