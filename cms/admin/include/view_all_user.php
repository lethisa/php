<?php include "./function.php"; ?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Role</th>
      <th colspan="2">Change Role</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>

    <!-- ############### QUERY VIEW USER ############### -->
    <?php
    $query_select = "SELECT * FROM user";
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

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='view_user.php?change_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='view_user.php?change_sub={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='view_user.php?delete={$user_id}'>Delete</a></td>";
        echo "<td><a href='view_user.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>

    <!-- ############### QUERY DELETE USER ############### -->
    <?php
    if (isset($_GET['delete'])) {
        $del_user_id = $_GET['delete'];

        $query_delete = "DELETE FROM user WHERE user_id = {$del_user_id}";
        $delete_user = mysqli_query($connection, $query_delete);

        confirm_query($delete_user);
        header("Location: http://localhost/php/cms/admin/view_user.php");
    }

    ?>

    <!-- ############### QUERY UPDATE USER ROLE ############### -->
    <?php
    if (isset($_GET['change_admin'])) {
        $change_admin = $_GET['change_admin'];

        $query_update = "UPDATE user SET user_role = 'admin' WHERE user_id = $change_admin ";
        $change_user = mysqli_query($connection, $query_update);

        confirm_query($change_user);
        header("Location: http://localhost/php/cms/admin/view_user.php");
    }

    ?>

    <!-- ############### QUERY UPDATE USER ROLE ############### -->
    <?php
    if (isset($_GET['change_sub'])) {
        $change_sub = $_GET['change_sub'];

        $query_update = "UPDATE user SET user_role = 'subscriber' WHERE user_id = $change_sub ";
        $change_user = mysqli_query($connection, $query_update);

        confirm_query($change_user);
        header("Location: http://localhost/php/cms/admin/view_user.php");
    }

    ?>
