<?php include "./function.php"; ?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Categories</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tag</th>
      <th>Comment</th>
      <th>Date</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <!-- ############### QUERY VIEW POST ############### -->
    <?php
    $query_select = "SELECT * FROM posts";
    $select_post = mysqli_query($connection, $query_select);

    while ($row_post = mysqli_fetch_assoc($select_post)) {
        $post_id = $row_post['post_id'];
        $post_category = $row_post['post_category_id'];
        $post_title = $row_post['post_title'];
        $post_author = $row_post['post_author'];
        $post_date = $row_post['post_date'];
        $post_image = $row_post['post_image'];
        $post_content = $row_post['post_content'];
        $post_tag = $row_post['post_tag'];
        $post_comment = $row_post['post_comment_count'];
        $post_status = $row_post['post_status'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_category}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img src='images/{$post_image}' class='img-responsive' /></td>";
        echo "<td>{$post_tag}</td>";
        echo "<td>{$post_comment}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='view_post.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>

    <!-- ############### QUERY DELETE POST ############### -->
    <?php
    if (isset($_GET['delete'])) {
      $del_post_id = $_GET['delete'];

      $query_delete = "DELETE FROM posts WHERE post_id = {$del_post_id}";
      $delete_posts = mysqli_query($connection, $query_delete);

      confirm_query($delete_posts);
      header("Location: http://localhost/php/cms/admin/view_post.php");
    }

    ?>
