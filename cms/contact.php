 <?php  include "include/header.php"; ?>
 <?php include "/admin/function.php"; ?>

    <!-- Navigation -->

    <?php  include "include/navigation.php"; ?>

    <!-- ############### CONTACT ############### -->
    <?php

    if (isset($_POST['submit'])) {
        $to = "dongkrak366@gmail.com";
        $subject  = $_POST['subject'];
        $body = $_POST['body'];
    }
    ?>

    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                           <label for="subject" class="sr-only">Subject</label>
                           <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
                       </div>
                       <div class="form-group">
                           <textarea name="body" id="body" class="form-control" cols="50" rows="10"></textarea>
                        </div>
                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php"; ?>