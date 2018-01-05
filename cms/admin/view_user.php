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
                        <h1 class="page-header">USER</h1>
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
                              case "add_user":
                                include "include/add_user.php";
                                break;

                                case "edit_user":
                                include "include/edit_user.php";
                                break;

                                default:
                                include "include/view_all_user.php";
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
