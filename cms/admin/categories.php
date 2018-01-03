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
                          <!-- ############### FORM INSERT CATEGORIES ############### -->
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add Categories</label>
                              <input type="text" name="cat_title" class="form-control" />
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="add_cat" value="ADD"/>
                            </div>
                          </form>
                          <!-- ############### QUERY INSERT CATEGORIES ############### -->
                          <?php
                          if (isset($_POST['add_cat'])) {
                              $cat_title = $_POST['cat_title'];

                              if ($cat_title == "" || empty($cat_title)) {
                                  echo "This Field Should Not Be Empty";
                              } else {
                                  $query_add_cat = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                                  $insert_cat = mysqli_query($connection, $query_add_cat);
                                  if (!$insert_cat) {
                                      die("QUERY FAILED" . mysqli_error($connection));
                                  }
                              }
                          }
                          ?>
                          <br />

                          <!-- ############### FORM UPDATE CATEGORIES ############### -->
                          <form action="" method="post">
                            <div class="form-group">
                              <label for=cat_title>Edit Categories</label>

                              <!-- ############### QUERY SELECT CATEGORIES ############### -->
                              <?php
                              if (isset($_GET['edit'])) {
                                  $cat_id = $_GET['edit'];

                                  $query_categories = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                  $select_categories_id = mysqli_query($connection, $query_categories);

                                  // display categories
                                  while ($row_categories_id = mysqli_fetch_assoc($select_categories_id)) {
                                      $cat_title = $row_categories_id['cat_title'];
                                  } ?>
                              <input value=" <?php if (isset($cat_title)) {
                                      echo $cat_title;
                                  } ?>" type="text" class="form-control" name="cat_title" />
                              <?php
                              } ?>

                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="update_cat" value="UPDATE"/>
                            </div>
                          </form>
                          <!-- ############### QUERY UPDATE CATEGORIES ############### -->
                          <?php
                          if (isset($_POST['update_cat'])) {
                              $cat_title = $_POST['cat_title'];
                              $cat_id = $_GET['edit'];

                              $query_update_cat = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id} ";
                              $update_cat = mysqli_query($connection, $query_update_cat);

                              if (!$update_cat) {
                                  die("QUERY FAILED" . mysqli_error($connection));
                              }
                              header("Location: categories.php");
                          }
                          ?>

                        </div>
                        <!-- /.col-xs-6 -->

                        <div class="col-xs-6">
                          <table class="table ">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- ############### QUERY DISPLAY CATEGORIES ############### -->
                              <?php
                              // categories query
                              $query_categories = "SELECT * FROM categories ORDER BY cat_id ASC";
                              $select_categories = mysqli_query($connection, $query_categories);

                              // display categories
                              while ($row_categories = mysqli_fetch_assoc($select_categories)) {
                                  $cat_id = $row_categories['cat_id'];
                                  $cat_title = strtoupper($row_categories['cat_title']);

                                  echo "<tr>";
                                  echo "<td>{$cat_id}</td>";
                                  echo "<td>{$cat_title}</td>";
                                  echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                  echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                  echo "</tr>";
                              }
                              ?>

                              <!-- ############### QUERY DELETE CATEGORIES ############### -->
                              <?php
                              // delete query
                              if (isset($_GET['delete'])) {
                                  $cat_id_del = $_GET['delete'];

                                  $query_delete_cat = "DELETE FROM categories WHERE cat_id = {$cat_id_del}";
                                  $delete_cat = mysqli_query($connection, $query_delete_cat);
                                  header("Location: categories.php");
                              }
                              ?>

                            </tbody>

                          </table>
                          <!-- /.table -->
                        </div>
                        <!-- /.col-xs-6 -->
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
