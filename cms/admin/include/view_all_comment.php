<?php include "./function.php"; ?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>Respon</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    <!-- ############### QUERY VIEW COMMENT ############### -->
    <?php
    $query_select = "SELECT * FROM comment";
    $select_comment = mysqli_query($connection, $query_select);

    while ($row_comment = mysqli_fetch_assoc($select_comment)) {
        $comment_id = $row_comment['comment_id'];
        $comment_post_id =$row_comment['comment_post_id'];
        $comment_author = $row_comment['comment_author'];
        $comment_email = $row_comment['comment_email'];
        $comment_content = $row_comment['comment_content'];
        $comment_status = $row_comment['comment_status'];
        $comment_date = $row_comment['comment_date'];


        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        // ############### QUERY RELATED POST ###############
        $query_comment_id = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $post_comment = mysqli_query($connection, $query_comment_id);

        while ($row_com = mysqli_fetch_assoc($post_comment)) {
          $post_id = $row_com['post_id'];
          $post_title = $row_com['post_title'];

          echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";

        echo "<td><a href='view_comment.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='view_comment.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='view_comment.php?delete={$comment_id}'>Delete</a></td>";

        echo "</tr>";
    }
    ?>
  </tbody>
</table>

    <!-- ############### QUERY DELETE COMMENT ############### -->
    <?php
    if (isset($_GET['delete'])) {
        $del_comment_id = $_GET['delete'];

        $query_delete = "DELETE FROM comment WHERE comment_id = {$del_comment_id}";
        $delete_comment = mysqli_query($connection, $query_delete);

        confirm_query($delete_comment);

        header("Location: view_comment.php");
    }

    // ############### QUERY UNAPPROVE COMMENT ###############

    if (isset($_GET['unapprove'])) {
        $unapprove_comment = $_GET['unapprove'];

        $query_update = "UPDATE comment SET comment_status = 'unapprove' WHERE comment_id = $unapprove_comment";
        $unapprove_comment = mysqli_query($connection, $query_update);

        confirm_query($unapprove_comment);

        header("Location: view_comment.php");
    }

    // ############### QUERY UNAPPROVE COMMENT ###############

    if (isset($_GET['approve'])) {
        $approve_comment = $_GET['approve'];

        $query_update = "UPDATE comment SET comment_status = 'approve' WHERE comment_id = $approve_comment";
        $unapprove_comment = mysqli_query($connection, $query_update);

        confirm_query($approve_comment);

        header("Location: view_comment.php");
    }

    ?>
