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

              if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin')) {
                  $post_query_count = "SELECT * FROM posts";
              } else {
                  // posts query
                  $post_query_count = "SELECT * FROM posts WHERE post_status= 'publish'";
              }
              //pagination
              /*$post_query_count = "SELECT * FROM posts WHERE post_status= 'publish'";*/
              $find_count = mysqli_query($connection, $post_query_count);
              $count = mysqli_num_rows($find_count);

              if ($count < 1) {
                  echo "<h1 class='text-center'>NO POST AVAILABLE</h1>";
              } else {

              $per_page = 3;
              $count = ceil($count / $per_page);

              // pagination function
              if (isset($_GET['page'])) {
                  $page = $_GET['page'];

              } else {
                  $page = 0;
              }

              if ($page == 0 || $page == 1) {
                  $page_1 = 0;
              } else {
                  $page_1 = ($page * $per_page) - $per_page;
              }

              // posts query
              $query_post = "SELECT * FROM posts LIMIT 3 OFFSET $page_1 ";
              $select_posts = mysqli_query($connection, $query_post);

              // display posts
              while ($row_posts = mysqli_fetch_assoc($select_posts)) {
                  $post_id = $row_posts['post_id'];
                  $post_title  = $row_posts['post_title'];
                  $post_author = $row_posts['post_author'];
                  $post_date = $row_posts['post_date'];
                  $post_image = $row_posts['post_image'];
                  $post_image = $row_posts['post_image'];
                  $post_content = substr($row_posts['post_content'],0,200);
                  $post_status = $row_posts['post_status'];

                  if ($post_status == "publish" || $_SESSION['user_role'] == 'admin') { ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_post.php?author=<?php echo $post_author ?>"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id ?>">
                      <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php
                }?>

              <?php }} ?>

                <!-- Pager -->
                <ul class="pager">
                    <!-- ############### SHOW PAGINATION NUMBER ############### -->
                    <?php
                    for ($i=1; $i <= $count; $i++) {
                        if ($i == $page) {
                          echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                        } else {
                          echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                        }


                    }
                    ?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "include/footer.php"; ?>
