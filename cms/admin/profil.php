<!-- Include Header -->
<?php include "include/header.php"; ?>

<?php

?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">PROFIL</h1>
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
                              case "1":
                                include "";
                                break;

                                case "2":
                                include "";
                                break;

                                default:
                                include "include/view_profil.php";
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
