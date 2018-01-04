<?php include "./function.php"; ?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Respon to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <!-- ############### QUERY VIEW POST ############### -->
    <?php
    $query_select = "SELECT * FROM comment";
    $select_comment = mysqli_query($connection, $query_select);

    while ($row_comment = mysqli_fetch_assoc($select_comment)) {
        $comment_id = $row_post['comment_id'];
        $comment_author = $row_post['comment_author'];
        $comment_email = $row_comment['comment_email'];
        $comment_content = $row_comment['comment_content'];
        $comment_status = $row_comment['comment_status'];
        $comment_date = $row_comment['$comment_date'];


        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        // ############### QUERY DISPLAY CATEGORIES ###############
        $query_categories = "SELECT * FROM categories WHERE cat_id = {$post_category}";
        $select_categories = mysqli_query($connection, $query_categories);

        confirm_query($select_categories);

        while ($row_categories = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row_categories['cat_id'];
            $cat_title =$row_categories['cat_title'];

            echo "<td>{$cat_title}</td>";
        }

        echo "<td>{$post_status}</td>";
        echo "<td><img src='images/{$post_image}' class='img-responsive' /></td>";
        echo "<td>{$post_tag}</td>";
        echo "<td>{$post_comment}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='view_post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
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
