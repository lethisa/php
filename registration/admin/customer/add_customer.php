<!-- ############### QUERY INSERT CUSTOMER ############### -->
<?php

if (isset($_POST['insert_customer'])) {
    $customer_name = strtoupper($_POST['customer_name']);
    $customer_town = strtoupper($_POST['customer_town']);
    $customer_group = strtoupper($_POST['customer_group']);
    $customer_hp = $_POST['customer_hp'];

    // query insert customer
    $query_insert = "INSERT INTO customer (customer_name, customer_town, customer_group, customer_hp) ";
    $query_insert .= "VALUES('{$customer_name}','{$customer_town}','{$customer_group}', '{$customer_hp}') ";
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
            <h4 class="card-title">Add Participants</h4>
            <div class="form-group label-floating">
                <label class="control-label">Nama Peserta<small>*</small></label>
                <input class="form-control" name="customer_name" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Kota<small>*</small></label>
                <input class="form-control" name="customer_town" id="#" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">No. Telp<small>*</small></label>
                <input class="form-control" name="customer_hp" id="#" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Group<small>*</small></label>
                    <select class="selectpicker" data-style="btn btn-primary btn-round" data-size="10" name="customer_group">

                        <!-- ############### QUERY DISPLAY GROUP ############### -->
                        <?php
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
                    <button type="submit" class="btn btn-rose btn-fill" name="insert_customer">Save</button>
            </div>
        </div>
        </form>

        </div>
           </div>
           <!--./input box-->
