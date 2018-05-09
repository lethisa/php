<!-- Header -->
<?php include "include/header.php"; ?>

<!-- Navigation -->
<?php include "include/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php
              if (isset($_GET['category'])) {
                  $category_name = $_GET['category'];

                  if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin')) {
                      $query_post = "SELECT * FROM posts WHERE post_category_id = $category_name ";
                  } else {
                      // posts query
                      $query_post = "SELECT * FROM posts WHERE post_category_id = $category_name AND post_status='publish'";
                  }

                  // posts query
                  /*$query_post = "SELECT * FROM posts WHERE post_category_id = $category_name AND post_status = 'publish' ORDER BY post_id DESC";*/
                  $select_post = mysqli_query($connection, $query_post);

                  
                  if (mysqli_num_rows($select_post) < 1) {
                      echo "<h1 class='text-center'>NO CATEGORY AVAILABLE</h1>";
                  } else {
                      // display posts
                      while ($row_post = mysqli_fetch_assoc($select_post)) {
                          $post_id = $row_post['post_id'];
                          $post_title  = $row_post['post_title'];
                          $post_author = $row_post['post_author'];
                          $post_date = $row_post['post_date'];
                          $post_image = $row_post['post_image'];
                          $post_image = $row_post['post_image'];
                          $post_content = substr($row_post['post_content'], 0, 200); ?>

                  <h1 class="page-header">
                      Page Heading
                      <small>Secondary Text</small>
                  </h1>

                  <!-- Blog Post -->
                  <h2>
                      <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="index.php"><?php echo $post_author ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                  <hr>
                  <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                  <hr>
                  <p><?php echo $post_content ?></p>
                  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                  <hr>
              <?php
                      }
                  }
              } else {
                  header("Location: index.php");
              }?>

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

<!-- Footer -->
<?php include "include/footer.php"; ?>
