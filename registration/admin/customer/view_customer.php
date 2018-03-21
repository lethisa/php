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
                        <th>Barcode ID</th>
                        <th>Nama Peserta</th>
                        <th>Kota Asal</th>
                        <th>Group</th>
                        <th>Telp.</th>
                        <th>Visit Date</th>
                        <th class="disabled-sorting text-right">Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Barcode ID</th>
                        <th>Nama Peserta</th>
                        <th>Kota Asal</th>
                        <th>Group</th>
                        <th>Telp.</th>
                        <th>Visit Date</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <!-- ############### QUERY VIEW CUSTOMER ############### -->
                    <?php
                    $query_select = "SELECT customer.customer_id, customer.customer_hp, customer.customer_name, customer.customer_town, groups.groups_name, groups.groups_barcode, groups.groups_visit FROM customer LEFT JOIN groups ON customer.customer_group = groups.groups_id ";
                    $select_customer = mysqli_query($connection, $query_select);

                    while ($row = mysqli_fetch_assoc($select_customer)) {
                        $customer_id = $row['customer_id'];
                        $customer_hp = $row['customer_hp'];
                        $customer_name = $row['customer_name'];
                        $customer_town = $row['customer_town'];
                        $customer_group = $row['groups_name'];
                        $customer_visit = $row['groups_visit'];
                        $customer_barcode = $row['groups_barcode'];


                        echo "<tr>";
                        echo "<td>{$customer_barcode}</td>";
                        echo "<td>{$customer_name}</td>";
                        echo "<td>{$customer_town}</td>";
                        echo "<td>{$customer_group}</td>";
                        echo "<td>{$customer_hp}</td>";
                        echo "<td>{$customer_visit}</td>";
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
                        header("Location: customer.php" );
                    }

                    ?>
