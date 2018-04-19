<!--connection database-->
<?php include "admin/include/connection.php"; ?>
<!--custom function-->
<?php include "admin/include/function.php"; ?>
<!--start session-->
<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registration System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">

        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="assets/img/science.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">PESERTA</h4>
                                    <form method="post" action="">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Input Your BARCODE ID Here !</label>
                                            <input type="text" class="form-control" name="barcode" autofocus required>
                                        </div>

                                        <button type="submit" class="btn btn-fill btn-rose" name="search">SEARCH</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                          <div class="card">

                              <div class="card-content">
                                  <h1 class="card-title" style="text-align:center">WELCOME TOKO</h1>
                                  <!-- ############### QUERY SEARCH CUSTOMER ############### -->
                                  <?php

                                  if (isset($_POST['search'])) {
                                      $barcode = $_POST['barcode'];

                                      $query_select = "SELECT groups_name, groups_id FROM groups WHERE groups_barcode = '{$barcode}' ";
                                      $select_customer = mysqli_query($connection, $query_select);

                                      if (mysqli_num_rows($select_customer) == 0) {
                                          echo "<h1 style='text-align:center'><b>DATA TIDAK DITEMUKAN</b></h1>";
                                          echo "</div></div></div>";
                                      } else {
                                          while ($row = mysqli_fetch_array($select_customer)) {
                                              $customer_group = $row['groups_name'];
                                              $customer_id = $row['groups_id'];

                                              echo "<h1 style='text-align:center'><b>$customer_group</b></h1>";
                                              echo "</div></div></div>"; ?>
                                              <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-icon" data-background-color="rose">
                                                        <i class="material-icons">assignment</i>
                                                    </div>
                                                    <div class="card-content">
                                                        <h4 class="card-title">DAFTAR PESERTA</h4>
                                                        <form method="post" action="#">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="text-primary">
                                                                    <th>No.</th>
                                                                    <th>Name</th>
                                                                    <th>Meja</th>
                                                                    <th>Kursi</th>
                                                                    <th>Kota</th>
                                                                    <th>Hadir</th>
                                                                </thead>
                                                                <tbody>

                                                <?php

                                              $query_data = "SELECT * FROM customer WHERE customer_group = {$customer_id} ";
                                              $select_data = mysqli_query($connection, $query_data);

                                              $i=1;
                                              while ($rows = mysqli_fetch_array($select_data)) {
                                                  $customer_id = $rows['customer_id'];
                                                  $customer_name = $rows['customer_name'];
                                                  $customer_town = $rows['customer_town'];
                                                  $customer_meja = $rows['customer_meja'];
                                                  $customer_kursi = $rows['customer_kursi'];
                                                  $customer_status = $rows['customer_status'];

                                                  echo "<tr>";
                                                  echo "<td>$i</td>";
                                                  echo "<td>{$customer_name}</td>";
                                                  echo "<td>{$customer_meja}</td>";
                                                  echo "<td>{$customer_kursi}</td>";
                                                  echo "<td>{$customer_town}</td>"; ?>
                                                  <td>
                                                      <div class="checkbox">
                                                      <label>
                                                          <?php
                                                          if ($customer_status == 1) {
                                                              $disable = 'disabled';
                                                          } else {
                                                              $disable = '';
                                                          }
                                                          ?>
                                                      <input type="checkbox" name="check_hadir[]" value="<?php echo $customer_id ?>" <?php echo $disable ?> > Hadir/Tidak
                                                      </label>
                                                      </div>
                                                  </td>

                                              </tr>


                                                  <?php
                                                  $i=$i+1;
                                              } ?>
                                                                </tbody>
                                                            </table>
                                                            <button type="submit" class="btn btn-fill btn-rose" name="submit">REGISTER</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>

                                              <?php
                                          }
                                      }
                                  }

                                  ?>





                    </div>
                </div>
            </div>

            <footer class="footer">
      <div class="container">

          <p class="copyright pull-right">
              &copy;
              <script>
                  document.write(new Date().getFullYear())
              </script>
              <a href="http://www.wonderland-indonesia.com">Wonderland</a> Indonesia
          </p>
          <a href="login.php" target="_blank"><button class="btn btn-rose pull-right">LOGIN</button></a>

      </div>
  </footer>

        </div>



        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>

<!-- ############### CHECK OPTION REGISTER ############### -->

<?php
if (isset($_POST['submit'])) {
    foreach ($_POST['check_hadir'] as $absensi) {

        $query = "UPDATE customer SET customer_status = 1 WHERE customer_id = {$absensi}";
        $update_query = mysqli_query($connection, $query);

        confirm_query($update_query);
    }
}

?>
