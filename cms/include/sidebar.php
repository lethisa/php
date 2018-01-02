<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
          <div class="input-group">
              <input name="search" type="text" class="form-control">
              <span class="input-group-btn">
                  <button name="submit" class="btn btn-default" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        <!-- /.input-group -->
        </form>
        <!-- /.form -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <!-- Blog Categories 1 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                  // categories query 1
                  $query_categories = "SELECT * FROM categories LIMIT 3";
                  $select_categories_side = mysqli_query($connection, $query_categories);

                  // display categories
                  while ($row_categories_side = mysqli_fetch_assoc($select_categories_side)) {
                      $cat_title = $row_categories_side['cat_title'];

                      echo "<li><a href='#'>{$cat_title}</a></li>";
                  }
                  ?>
                </ul>

            </div>
            <!-- /.col-lg-6 -->

            <!-- Blog Categories 2 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                  // categories query 2
                  $query_categories = "SELECT * FROM categories LIMIT 3";
                  $select_categories_side = mysqli_query($connection, $query_categories);

                  // display categories
                  while ($row_categories_side = mysqli_fetch_assoc($select_categories_side)) {
                      $cat_title = $row_categories_side['cat_title'];

                      echo "<li><a href='#'>{$cat_title}</a></li>";
                  }
                  ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "include/widget.php"; ?>

</div>
<!-- /.Blog Sidebar Widgets Column -->
