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
              if (isset($_GET['author'])) {
                $author = $_GET['author'];
              }


              // posts query
              $query_post = "SELECT * FROM posts WHERE post_author = '{$author}'";
              $select_post = mysqli_query($connection, $query_post);

              confirm_query($select_post);

              // display posts
              while ($row_post = mysqli_fetch_assoc($select_post)) {
                  $post_id  = $row_post['post_id'];
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
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

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

<!-- Footer -->
<?php include "include/footer.php"; ?>
