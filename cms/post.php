<?php include "/admin/function.php"; ?>

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
              if (isset($_GET['p_id'])) {
                  $post_id = $_GET['p_id'];

                  // view count
                  $query_view = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = '{$post_id}'";
                  $view_count = mysqli_query($connection, $query_view);
                  confirm_query($view_count);

                  if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 'admin')) {
                      $query_post = "SELECT * FROM posts WHERE post_id = '{$post_id}' ";
                  } else {
                      // posts query
                      $query_post = "SELECT * FROM posts WHERE post_id = '{$post_id}' AND post_status='publish'";
                  }
                  
                  $select_post = mysqli_query($connection, $query_post);

                  confirm_query($select_post);

                  // display posts
                  while ($row_post = mysqli_fetch_assoc($select_post)) {
                      $post_title  = $row_post['post_title'];
                      $post_author = $row_post['post_author'];
                      $post_date = $row_post['post_date'];
                      $post_image = $row_post['post_image'];
                      $post_image = $row_post['post_image'];
                      $post_content = $row_post['post_content']; ?>
                <h1 class="page-header">
                    Post
                </h1>

                <!-- Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
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

                <hr>

            <?php
                  }
              } else {
                  header("Location: index.php");
              }


               ?>

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
        <!-- Comment -->
        <?php include "comment.php"; ?>

        <hr>

<!-- Footer -->
<?php include "include/footer.php"; ?>
