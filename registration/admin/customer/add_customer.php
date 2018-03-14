<!-- ############### QUERY INSERT CUSTOMER ############### -->
<?php

if (isset($_POST['insert_customer'])) {
    $customer_barcode = $_POST['customer_barcode'];
    $customer_name = strtoupper($_POST['customer_name']);
    $customer_town = strtoupper($_POST['customer_town']);
    $customer_group = strtoupper($_POST['customer_group']);
    // query insert customer
    $query_insert = "INSERT INTO customer (customer_barcode, customer_name, customer_town, customer_group) ";
    $query_insert .= "VALUES('{$customer_barcode}','{$customer_name}','{$customer_town}','{$customer_group}') ";
    $insert_customer = mysqli_query($connection, $query_insert);
    // check query
    confirm_query($insert_customer);
    header("Location: customer.php" );
}
?>

<!-- ############### FORM INSERT CUSTOMER ############### -->

<!--input box-->
        <div class="col-md-12">
          <div class="card">

              <form id="" action="" method="post" enctype="multipart/form-data">
                  <div class="card-header card-header-icon" data-background-color="rose">
                      <i class="material-icons">account_box</i>
                  </div>
        <div class="card-content">
            <h4 class="card-title">Add Customer</h4>
            <div class="form-group label-floating">
                <label class="control-label">Barcode ID<small>*</small></label>
                <input class="form-control" name="customer_barcode" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Nama Customer<small>*</small></label>
                <input class="form-control" name="customer_name" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Kota<small>*</small></label>
                <input class="form-control" name="customer_town" id="#" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Group<small>*</small></label>
                <input class="form-control" name="customer_group" id="#" type="text" required="true" />
            </div>
            <div class="category form-category">
                <small>*</small> Required fields
            </div>
            <div class="form-footer text-right">
                    <button type="submit" class="btn btn-rose btn-fill" name="insert_customer">Save</button>
            </div>
        </div>
        </form>

        </div>
           </div>
           <!--./input box-->
