<!-- ############### QUERY SELECT CUSTOMER ############### -->
<?php

if (isset($_GET['cust_id'])) {
    $customer_id = $_GET['cust_id'];

    // query insert customer
    $query_select = "SELECT customer.customer_id, customer.customer_group, customer.customer_hp, customer.customer_meja, customer.customer_kursi, customer.customer_name, customer.customer_town, groups.groups_name, groups.groups_barcode, groups.groups_visit FROM customer LEFT JOIN groups ON customer.customer_group = groups_id WHERE customer_id = {$customer_id}";
    $select_customer_id = mysqli_query($connection, $query_select);
    // check query
    confirm_query($select_customer_id);

    while ($row_customer = mysqli_fetch_assoc($select_customer_id)) {
        $customer_name = $row_customer['customer_name'];
        $customer_town = $row_customer['customer_town'];
        $customer_meja = $row_customer['customer_meja'];
        $customer_kursi = $row_customer['customer_kursi'];

        $customer_group_name = $row_customer['groups_name'];
        $customer_visit = $row_customer['groups_visit'];
        $customer_hp = $row_customer['customer_hp'];
        $customer_group_id = $row_customer['customer_group'];
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
            <h4 class="card-title">Edit Participants</h4>
            <div class="form-group label-floating">
                <label class="control-label">Nama Peserta<small>*</small></label>
                <input class="form-control" name="customer_name" type="text" required="true" value="<?php echo $customer_name; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Kota<small>*</small></label>
                <input class="form-control" name="customer_town" id="#" type="text" required="true" value="<?php echo $customer_town; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">No. Telp<small>*</small></label>
                <input class="form-control" name="customer_hp" id="#" type="text" required="true" value="<?php echo $customer_hp; ?>" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Meja<small>*</small></label>
                <input class="form-control" name="customer_meja" id="#" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Kursi<small>*</small></label>
                <input class="form-control" name="customer_kursi" id="#" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Group<small>*</small></label>
                    <select class="selectpicker" data-style="btn btn-primary btn-round"  data-size="10" name="customer_group">

                        <!-- ############### QUERY DISPLAY GROUP ############### -->
                        <?php

                        echo "<option value='{$customer_group_id}'>{$customer_group_name}</option>";
                        // categories query
                        $query_group = "SELECT * FROM groups";
                        $select_group = mysqli_query($connection, $query_group);

                        confirm_query($select_group);

                        while ($row_group = mysqli_fetch_assoc($select_group)) {
                            $groups_id = $row_group['groups_id'];
                            $groups_name = $row_group['groups_name'];

                            echo "<option value='{$groups_id}'>{$groups_name}</option>";
                        }
                        ?>
                    </select>
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
               $customer_name = strtoupper($_POST['customer_name']);
               $customer_town = strtoupper($_POST['customer_town']);
               $customer_group = $_POST['customer_group'];
               $customer_hp = $_POST['customer_hp'];
               $customer_meja = $_POST['customer_meja'];
               $customer_kursi = $_POST['customer_kursi'];

               $query_update = "UPDATE customer SET ";
               $query_update .= "customer_name = '{$customer_name}', ";
               $query_update .= "customer_town = '{$customer_town}', ";
               $query_update .= "customer_group = {$customer_group}, ";
               $query_update .= "customer_meja ='{$customer_meja}', ";
               $query_update .= "customer_kursi ='{$customer_kursi}', ";
               $query_update .= "customer_hp ='{$customer_hp}' ";
               $query_update .= "WHERE customer_id = {$customer_id}";

               $update_customer = mysqli_query($connection, $query_update);
               confirm_query($update_customer);

               header("Location: customer.php");
           }
            ?>
