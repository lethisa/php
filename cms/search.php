<!-- Header -->
<?php include "include/header.php"; ?>

<!-- Navigation -->
<?php include "include/navigation.php"; ?>

<?php

      if (isset($_POST['submit'])) {
          $search = $_POST['search'];
      }
      // query search
      $query_search = "SELECT * FROM posts WHERE post_tag LIKE  '%$search%' ";
      $select_search = mysqli_query($connection, $query_search);

      // validation query
      if (!$select_search) {
          die("QUERY FILE" . mysqli_error($connection));
      }

      // count search
      $count_search = mysqli_num_rows($select_search);
      if ($count_search == 0) {
          echo "<h1>NO RESULT</h1>";
      } else { ?>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                  <?php
                  // display search posts
                  while ($row_post = mysqli_fetch_assoc($select_search)) {
                      $post_title  = $row_post['post_title'];
                      $post_author = $row_post['post_author'];
                      $post_date = $row_post['post_date'];
                      $post_image = $row_post['post_image'];
                      $post_image = $row_post['post_image'];
                      $post_content = $row_post['post_content'];
                  ?>

                      <h1 class="page-header">
                          Page Heading
                          <small>Secondary Text</small>
                      </h1>

                      <!-- Blog Post -->
                      <h2>
                          <a href="#"><?php echo $post_title ?></a>
                      </h2>
                      <p class="lead">
                          by <a href="index.php"><?php echo $post_author ?></a>
                      </p>
                      <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                      <hr>
                      <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                      <hr>
                      <p><?php echo $post_content ?></p>
                      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <hr>
                  <?php } ?>

                    <!-- Pager -->
                    <ul class="pager">
                        <li class="previous">
                            <a href="#">&larr; Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer &rarr;</a>
                        </li>
                    </ul>

                </div>

                <!-- Blog Sidebar Widgets Column -->
                <?php include "include/sidebar.php"; ?>

            </div>
            <!-- /.row -->

            <hr>
      <?php } ?>

<!-- Footer -->
<?php include "include/footer.php"; ?>
