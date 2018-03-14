<!-- ############### QUERY SELECT CUSTOMER ############### -->
<?php

if (isset($_GET['cust_id'])) {
    $customer_id = $_GET['cust_id'];

    // query insert customer
    $query_select = "SELECT * FROM customer WHERE customer_id = {$customer_id}";
    $select_customer_id = mysqli_query($connection, $query_select);
    // check query
    confirm_query($select_customer_id);

    while ($row_customer = mysqli_fetch_assoc($select_customer_id)) {
        $customer_barcode = $row_customer['customer_barcode'];
        $customer_name = $row_customer['customer_name'];
        $customer_town = $row_customer['customer_town'];
        $customer_group = $row_customer['customer_group'];
    }
}
?>

<!-- ############### FORM UPDATE CUSTOMER ############### -->

<!--input box-->
        <div class="col-md-12">
          <div class="card">

<form id="" action="" method="post" enctype="multipart/form-data">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">account_box</i>
    </div>
        <div class="card-content">
            <h4 class="card-title">Edit Customer</h4>
            <div class="form-group label-floating">
                <label class="control-label">Barcode ID<small>*</small></label>
                <input class="form-control" name="customer_barcode" type="text" required="true" value="<?php echo $customer_barcode; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Nama Customer<small>*</small></label>
                <input class="form-control" name="customer_name" type="text" required="true" value="<?php echo $customer_name; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Kota<small>*</small></label>
                <input class="form-control" name="customer_town" id="#" type="text" required="true" value="<?php echo $customer_town; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Group<small>*</small></label>
                <input class="form-control" name="customer_group" id="#" type="text" required="true" value="<?php echo $customer_group; ?>" />
            </div>
            <div class="category form-category">
                <small>*</small> Required fields
            </div>
            <div class="form-footer text-right">
                    <button type="submit" class="btn btn-rose btn-fill" name="update_customer">Update</button>
            </div>
        </div>
        </form>

    </div>
           </div>
           <!--./input box-->

           <!-- ############### QUERY UPDATE POST ############### -->
           <?php
           if (isset($_POST['update_customer'])) {
               $customer_id = $_GET['cust_id'];
               $customer_barcode = strtoupper($_POST['customer_barcode']);
               $customer_name = strtoupper($_POST['customer_name']);
               $customer_town = strtoupper($_POST['customer_town']);
               $customer_group = strtoupper($_POST['customer_group']);

               $query_update = "UPDATE customer SET ";
               $query_update .= "customer_barcode = '{$customer_barcode}', ";
               $query_update .= "customer_name = '{$customer_name}', ";
               $query_update .= "customer_town = '{$customer_town}', ";
               $query_update .= "customer_group ='{$customer_group}' ";
               $query_update .= "WHERE customer_id = {$customer_id}";

               $update_customer = mysqli_query($connection, $query_update);
               confirm_query($update_customer);

               header("Location: customer.php" );
           }
            ?>
