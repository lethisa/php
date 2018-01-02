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
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                          <form action="">
                            <div class="form-group">
                              <label for="cat_title">Add Categories</label>
                              <input type="text" name="cat_title" class="form-control" />
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Categories"/>
                            </div>
                          </form>
                        </div>

                        <div class="col-xs-6">
                          <table class="table ">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // categories query
                              $query_categories = "SELECT * FROM categories";
                              $select_categories = mysqli_query($connection, $query_categories);

                              // display categories
                              while ($row_categories = mysqli_fetch_assoc($select_categories)) {
                                  $cat_id = $row_categories['cat_id'];
                                  $cat_title = strtoupper($row_categories['cat_title']);

                                  echo "<tr>";
                                  echo "</tr>";
                                  echo "<td>{$cat_id}</td>";
                                  echo "<td>{$cat_title}</td>";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Include Footer -->
<?php include "include/footer.php"; ?>
