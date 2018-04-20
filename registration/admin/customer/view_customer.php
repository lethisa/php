<!--user table-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
              </div>
              <div class="card-content">
                <h4 class="card-title">Participants List</h4>
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Group</th>
                        <th>Telp.</th>
                        <th>Visit</th>
                        <th>Meja</th>
                        <th>Kursi</th>
                        <th>Status</th>
                        <th class="disabled-sorting text-right">Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Group</th>
                        <th>Telp.</th>
                        <th>Visit </th>
                        <th>Meja</th>
                        <th>Kursi</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <!-- ############### QUERY VIEW CUSTOMER ############### -->
                    <?php
                    $query_select = "SELECT customer.customer_id, customer.customer_hp, customer.customer_meja, customer.customer_status, customer.customer_kursi, customer.customer_name, customer.customer_town, groups.groups_name, groups.groups_barcode, groups.groups_visit, status.status_note FROM customer LEFT JOIN groups ON customer.customer_group = groups.groups_id LEFT JOIN status ON customer.customer_status = status.status_id";
                    $select_customer = mysqli_query($connection, $query_select);

                    while ($row = mysqli_fetch_assoc($select_customer)) {
                        $customer_id = $row['customer_id'];
                        $customer_hp = $row['customer_hp'];
                        $customer_name = $row['customer_name'];
                        $customer_town = $row['customer_town'];
                        $customer_group = $row['groups_name'];
                        $customer_visit = $row['groups_visit'];
                        $customer_barcode = $row['groups_barcode'];
                        $customer_meja = $row['customer_meja'];
                        $customer_kursi = $row['customer_kursi'];
                        $customer_status = $row['status_note'];
                        $customer_status_id = $row['customer_status'];

                        echo "<tr>";
                        echo "<td>{$customer_barcode}</td>";
                        echo "<td>{$customer_name}</td>";
                        echo "<td>{$customer_town}</td>";
                        echo "<td>{$customer_group}</td>";
                        echo "<td>{$customer_hp}</td>";
                        echo "<td>{$customer_visit}</td>";
                        echo "<td>{$customer_meja}</td>";
                        echo "<td>{$customer_kursi}</td>";
                        if ($customer_status_id == 0) {
                            echo "<td><a href='customer.php?status_change={$customer_id}'><button class='btn btn-warning'>{$customer_status}</button></a></td>";
                        } else {
                            echo "<td><a href='customer.php?status_change={$customer_id}'><button class='btn btn-success'>{$customer_status}</button></a></td>";
                        }
                        echo "<td class='text-right'>";
                        echo "<a href='customer.php?source=edit_customer&cust_id={$customer_id}' class='btn btn-simple btn-warning btn-icon edit'><i class='material-icons'>create</i></a>";
                        echo "<a href='customer.php?delete={$customer_id}' class='btn btn-simple btn-danger btn-icon remove'><i class='material-icons'>close</i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }   ?>
                    </tbody>
                  </table>
                </div>
                <!--download button-->
                <a href="include/report_customer.php"><button class="btn btn-info">DOWNLOAD ALL DATA</button></a>
                <a href="include/report_hadir.php"><button class="btn btn-info">DOWNLOAD DATA HADIR</button></a>
              </div>
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
          <!--./user table-->

                    <!-- ############### QUERY DELETE CUSTOMER ############### -->
                    <?php
                    if (isset($_GET['delete'])) {
                        $delete_customer_id = $_GET['delete'];

                        $query_delete = "DELETE FROM customer WHERE customer_id = {$delete_customer_id}";
                        $delete_customer = mysqli_query($connection, $query_delete);

                        confirm_query($delete_customer);
                        header("Location: customer.php");
                    }

                    ?>

                    <!-- ############### QUERY UPDATE STATUS ############### -->
                    <?php
                    if (isset($_GET['status_change'])) {
                        $customer_status_change_id = $_GET['status_change'];

                        $query_select = "SELECT * FROM customer WHERE customer_id = {$customer_status_change_id}";
                        $show = mysqli_query($connection, $query_select);

                        while ($row =mysqli_fetch_assoc($show)) {
                            $customer_status = $row['customer_status'];
                        }

                        if ($customer_status == 0) {
                            $customer_status_change = 1;
                        } else {
                            $customer_status_change =0;
                        }

                        $query_change = "UPDATE customer SET customer_status = '{$customer_status_change}' WHERE customer_id = {$customer_status_change_id}";
                        $change_customer = mysqli_query($connection, $query_change);

                        confirm_query($change_customer);
                        header("Location: customer.php");
                    }

                    ?>
