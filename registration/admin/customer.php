<!--connection database-->
<?php include "include/connection.php"; ?>
<!--custom function-->
<?php include "include/function.php"; ?>
<!--include header-->
<?php include "include/header.php"; ?>
<!--include navigation-->
<?php include "include/navigation.php"; ?>

                <!-- ############### CASE OPTION ############### -->
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = "";
                }

                switch ($source) {
                    case "add_customer":
                        include "customer/add_customer.php";
                        break;

                    case "edit_customer":
                        include "customer/edit_customer.php";
                        break;
                    case "group":
                        include "customer/group.php";
                        break;

                    default:
                        include "customer/view_customer.php";
                        break;
                }

                ?>

<!--include footer-->
<?php include "include/footer.php"; ?>
