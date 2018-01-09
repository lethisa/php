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
                        <h1 class="page-header">
                            WELCOME
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                 <!-- widget -->
                 <?php include "include/widget.php"; ?>

                 <!-- charts -->
                 <?php include "include/chart.php"; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Include Footer -->
<?php include "include/footer.php"; ?>
