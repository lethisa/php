<!--group form input -->
<div class="row">

        <!--input box-->
        <div class="col-md-6">
            <div class="card">

                    <!-- ############### QUERY INSERT GROUP ############### -->
                    <?php

                    if (isset($_POST['insert_group'])) {
                        $groups_name = strtoupper($_POST['group_name_add']);
                        $groups_barcode = strtoupper($_POST['group_barcode_add']);
                        $groups_visit = $_POST['group_visit_add'];
                        // query insert customer
                        $query_insert = "INSERT INTO groups (groups_name, groups_barcode, groups_visit) ";
                        $query_insert .= "VALUES('{$groups_name}','{$groups_barcode}','{$groups_visit}') ";
                        $insert_groups = mysqli_query($connection, $query_insert);
                        // check query
                        confirm_query($insert_groups);
                        header("Location: customer.php?source=group" );
                    }
                    ?>

        <form id="" action="" method="post" enctype="multipart/form-data">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">account_box</i>
            </div>
            <div class="card-content">
            <h4 class="card-title">Add Group</h4>
            <div class="form-group label-floating">
                <label class="control-label">Group ID<small>*</small></label>
                <input class="form-control" name="group_barcode_add" type="text" required="true" />
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Group Name<small>*</small></label>
                <input class="form-control" name="group_name_add" type="text" required="true" />
            </div>
            <div class="form-group ">
                <label class="control-label">Visit Date<small>*</small></label>
                <input type="text" name="group_visit_add" class="form-control datepicker" required="true"/>
            </div>

            <div class="category form-category">
                <small>*</small> Required fields
            </div>
            <div class="form-footer text-right">
                    <button type="submit" class="btn btn-rose btn-fill" name="insert_group">Save</button>
            </div>
        </div>
        </form>

            </div>
        </div>
        <!--./input box-->

        <!--input box-->
        <div class="col-md-6">
            <div class="card">

        <form id="" action="" method="post" enctype="multipart/form-data">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">account_box</i>
            </div>
            <div class="card-content">
            <h4 class="card-title">Edit Group</h4>

            <!-- ############### QUERY SELECT GROUPS + ID ############### -->
            <?php
            if (isset($_GET['edit'])) {
                    $groups_id = $_GET['edit'];

                    $query_select = "SELECT * FROM groups WHERE groups_id = $groups_id";
                    $select_groups = mysqli_query($connection, $query_select);

                    while ($row = mysqli_fetch_assoc($select_groups)) {
                        $groups_name = $row['groups_name'];
                        $groups_barcode = $row['groups_barcode'];
                        $groups_visit = $row['groups_visit'];
                }
                ?>
                <div class="form-group label-floating">
                        <label class="control-label">Group ID<small>*</small></label>
                        <input value="<?php if(isset($groups_barcode)) { echo $groups_barcode; } ?>"class="form-control" name="group_barcode_edit" type="text" required="true" />
                </div>
                <div class="form-group label-floating">
                        <label class="control-label">Group Name<small>*</small></label>
                        <input value="<?php if(isset($groups_name)) { echo $groups_name; } ?>"class="form-control" name="group_name_edit" type="text" required="true" />
                </div>
                <div class="form-group">
                        <label class="control-label">Group Visit<small>*</small></label>
                        <input value="<?php if(isset($groups_visit)) { echo $groups_visit; } ?>"class="form-control datepicker" name="group_visit_edit" type="text" required="true" />
                </div>
                <div class="category form-category">
                    <small>*</small> Required fields
                </div>

            <?php } ?>


            <div class="form-footer text-right">
                    <button type="submit" class="btn btn-rose btn-fill" name="update_group">Update</button>
            </div>

            <!-- ############### QUERY UPDATE CATEGORIES ############### -->
                <?php
                if (isset($_POST['update_group'])) {
                        $groups_id = $_GET['edit'];
                        $groups_name = strtoupper($_POST['group_name_edit']);
                        $groups_barcode = $_POST['group_barcode_edit'];
                        $groups_visit = $_POST['group_visit_edit'];

                        $query_update_groups = "UPDATE groups SET groups_name = '{$groups_name}', groups_barcode = '{$groups_barcode}', groups_visit = '{$groups_visit}'  WHERE groups_id = {$groups_id} ";
                        $update_groups = mysqli_query($connection, $query_update_groups);

                        confirm_query($update_groups);
                        header("Location: customer.php?source=group" );
                }
                ?>

        </div>
        </form>

            </div>
        </div>
        <!--./input box-->

</div>
<!--./row-->


        <!--user table--> <!--group list -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
              </div>
              <div class="card-content">
                <h4 class="card-title">Group List</h4>
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>Barcode ID</th>
                        <th>Group Name</th>
                        <th>Group Visit</th>
                        <th>Barcode</th>
                        <th class="disabled-sorting text-right">Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Barcode ID</th>
                      <th>Group Name</th>
                      <th>Group Visit</th>
                      <th>Barcode</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <!-- ############### QUERY VIEW GROUP ############### -->
                    <?php
                    $query_select = "SELECT * FROM groups";
                    $select_groups = mysqli_query($connection, $query_select);

                    while ($row = mysqli_fetch_assoc($select_groups)) {
                        $groups_id = $row['groups_id'];
                        $groups_name = $row['groups_name'];
                        $groups_visit = $row['groups_visit'];
                        $groups_barcode = $row['groups_barcode'];

                        echo "<tr>";
                        echo "<td>{$groups_barcode}</td>";
                        echo "<td>{$groups_name}</td>";
                        echo "<td>{$groups_visit}</td>";
                        echo "<td><img alt='barcode id' src='barcode/barcode.php?text={$groups_barcode}' /></td>";
                        echo "<td class='text-right'>";
                        echo "<a href='customer.php?source=group&edit={$groups_id}' class='btn btn-simple btn-warning btn-icon edit'><i class='material-icons'>create</i></a>";
                        echo "<a href='customer.php?source=group&delete={$groups_id}' class='btn btn-simple btn-danger btn-icon remove'><i class='material-icons'>close</i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }   ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
          <!--./user table-->

                    <!-- ############### QUERY DELETE GROUP ############### -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $delete_group_id = $_GET['delete'];

                        $query_delete = "DELETE FROM groups WHERE groups_id = {$delete_group_id}";
                        $delete_group = mysqli_query($connection, $query_delete);

                        confirm_query($delete_group);
                        header("Location: customer.php?source=group" );
                    }

                    ?>
