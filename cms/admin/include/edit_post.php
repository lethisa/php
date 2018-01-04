<?php include "./function.php"; ?>

<!-- ############### QUERY SELECT POST ID ############### -->
<?php

if (isset($_GET['p_id'])) {
  $p_id = $_GET['p_id'];

  $query_select = "SELECT * FROM posts WHERE post_id = {$p_id}";
  $select_post_id = mysqli_query($connection, $query_select);

  while ($row_post = mysqli_fetch_assoc($select_post_id)) {
      $post_category = $row_post['post_category_id'];
      $post_title = $row_post['post_title'];
      $post_author = $row_post['post_author'];
      $post_date = $row_post['post_date'];
      $post_image = $row_post['post_image'];
      $post_content = $row_post['post_content'];
      $post_tag = $row_post['post_tag'];
      $post_comment = $row_post['post_comment_count'];
      $post_status = $row_post['post_status'];
  }
}
?>


<!-- ############### FORM UPDATE POST ############### -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Post Category</label>
    <select name="post_category" id="" class="form-control">

      <!-- ############### QUERY DISPLAY CATEGORIES ############### -->
      <?php
      // categories query
      $query_categories = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query_categories);

      confirm_query($select_categories);

      // display categories
      while ($row_categories = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row_categories['cat_id'];
          $cat_title = $row_categories['cat_title'];

          echo "<option value='$cat_id'>{$cat_title}</option>";
        }
      ?>

    </select>
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Post Image</label>
    <img src="images/<?php echo $post_image ?>" class="img-responsive" />
    <input type="file" name="post_image" />
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag; ?>" />
  </div>

  <div class="form-group">
    <label for="title">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10" /><?php echo $post_content; ?></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="UPDATE" />
  </div>

</form>

<!-- ############### QUERY UPDATE POST ############### -->
<?php
if (isset($_POST['update_post'])) {
    $post_id = $_GET['p_id'];
    $post_title = $_POST['post_title'];
    $post_category_id =$_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];

    $post_tag = $_POST['post_tag'];
    $post_content = $_POST['post_content'];

    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_tmp, "./images/$post_image");

    if (empty($post_image)) {
      $query_img = "SELECT * FROM posts WHERE post_id = $post_id";
      $view_img = mysqli_query($connection, $query_img);

      confirm_query($view_img);

      while ($row_img = mysqli_fetch_assoc($view_img)) {
        $post_image = $row_img['post_image'];
      }
    }

    $query_update = "UPDATE posts SET ";
    $query_update .= "post_title = '{$post_title}', ";
    $query_update .= "post_category_id ={$post_category_id}, ";
    $query_update .= "post_date = now(), ";
    $query_update .= "post_image ='{$post_image}', ";
    $query_update .= "post_content = '{$post_content}', ";
    $query_update .= "post_tag ='{$post_tag}', ";
    $query_update .= "post_status = '{$post_status}', ";
    $query_update .= "post_author = '{$post_author}' ";
    $query_update .= "WHERE post_id = {$post_id}";
    $update_post = mysqli_query($connection, $query_update);

    confirm_query($update_post);

    header("Location: http://localhost/php/cms/admin/view_post.php");

}
?>
