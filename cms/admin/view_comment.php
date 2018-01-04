<!-- Include Header -->
<?php include "include/header.php"; ?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">POST</h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">
                      <!-- ############### CASE OPTION ############### -->
                      <?php
                       if (isset($_GET['source'])) {
                           $source = $_GET['source'];
                       } else {
                           $source = "";
                       }

                         switch ($source) {
                             case "add_post":
                               
                               break;

                               case "edit_post":

                                 break;

                             default:
                               include "include/view_all_comment.php";
                               break;
                       }

                      ?>
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Include Footer -->
<?php include "include/footer.php"; ?>
