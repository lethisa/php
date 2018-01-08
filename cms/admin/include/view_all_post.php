<?php include "./function.php"; ?>

<form action="" method="post">
      <!-- ############### BULK OPTION POST ############### -->
      <?php
      if (isset($_POST['checkBoxArray'])) {
          foreach ($_POST['checkBoxArray'] as $postValueId) {
              $bulk_options = $_POST['bulk_options'];

              switch ($bulk_options) {
                  case 'publish':
                  $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
                  $update_query_publish = mysqli_query($connection, $query);

                  confirm_query($update_query_publish);
                  break;

                  case 'draft':
                  $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
                  $update_query_draft = mysqli_query($connection, $query);

                  confirm_query($update_query_draft);
                  break;

                  case 'delete':
                  $query = "DELETE FROM posts WHERE post_id = {$postValueId}";
                  $update_query_del = mysqli_query($connection, $query);

                  confirm_query($update_query_del);
                  break;

                  case 'clone':
                  $query = "SELECT * FROM posts WHERE post_id = {$postValueId}";
                  $update_query_clone = mysqli_query($connection, $query);

                  confirm_query($update_query_clone);

                  while ($row = mysqli_fetch_array($update_query_clone)) {
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_author = $row['post_author'];
                        $post_status = $row['post_status'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_tag = $row['post_tag'];
                        $post_content = $row['post_content'];
                        $post_comment_count = $row['post_comment_count'];
                  }

                  $query_insert = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status) ";
                  $query_insert .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', '{$post_date}', '{$post_image}','{$post_content}','{$post_tag}',DEFAULT,'{$post_status}') ";
                  $insert_post = mysqli_query($connection, $query_insert);

                  confirm_query($insert_post);
                  header("Location: http://localhost/php/cms/admin/view_post.php");


                  break;

                  default:

                  break;
              }
          }
      }
      ?>

      <table class="table table-bordered table-hover">

        <div id="bulkOptionContainer" class="col-xs-4">
          <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
          </select>
        </div>

        <div id="bulkOptionContainerButton" class="col-xs-4">
          <input type="submit" name="submit" class="btn btn-success" value="Apply" />
          <a class="btn btn-primary" href="view_post.php?source=add_post">Add New</a>
        </div>

        <thead>
          <tr>
            <th><input type="checkbox" id="selectAllBoxes" /></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tag</th>
            <th>Comment</th>
            <th>Date</th>
            <th>View</th>
            <th>Count</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          <!-- ############### QUERY VIEW POST ############### -->
          <?php
          $query_select = "SELECT * FROM posts ORDER BY post_id DESC";
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
              $post_view_count = $row_post['post_view_count'];

              echo "<tr>";
              echo "<td><input class='checkBoxes' type='checkbox' id='' name='checkBoxArray[]' value='{$post_id}' /></th>";
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
              echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
              echo "<td>{$post_view_count}</td>";
              echo "<td><a href='view_post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
              echo "<td><a onClick=\"javascript: return confirm('Are You Sure Want to Delete'); \" href='view_post.php?delete={$post_id}'>Delete</a></td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
</form>

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
