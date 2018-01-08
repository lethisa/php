 <?php  include "include/header.php"; ?>
 <?php include "/admin/function.php"; ?>

    <!-- Navigation -->

    <?php  include "include/navigation.php"; ?>

    <!-- ############### REGISTRATION ############### -->
    <?php
    $message = "";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email  = $_POST['email'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        if (!empty($username) && !empty($password) && !empty($email)) {
            $query = "SELECT randSalt FROM user";
            $select_randSalt = mysqli_query($connection, $query);

            confirm_query($select_randSalt);

            $row = mysqli_fetch_array($select_randSalt);
            // encrypt password
            $salt = $row['randSalt'];
            $password = crypt($password , $salt);
            // insert user
            $query_insert = "INSERT INTO user (username, user_email, user_password) ";
            $query_insert .= "VALUES('{$username}','{$email}','{$password}') ";
            $insert_user = mysqli_query($connection, $query_insert);

            confirm_query($insert_user);
            $message = "Registration Success";


        } else {
            $message = "Registration Not Success Because Empty Field";
        }
    }
    ?>

    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <h6 class="text-center"><?php echo $message; ?></h6>
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
