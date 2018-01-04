<?php include "./function.php"; ?>
<!-- ############### QUERY INSERT POST ############### -->
<?php

if (isset($_POST['insert_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id =$_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];

    $post_tag = $_POST['post_tag'];
    $post_content = $_POST['post_content'];

    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_tmp, "./images/$post_image");

    $query_insert = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status) ";
    $query_insert .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now(), '{$post_image}','{$post_content}','{$post_tag}','{$post_comment_count}','{$post_status}') ";
    $insert_post = mysqli_query($connection, $query_insert);

    confirm_query($insert_post);
    header("Location: http://localhost/php/cms/admin/view_post.php");

}
?>

<!-- ############### FORM INSERT POST ############### -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title" />
  </div>

  <div class="form-group">
    <label for="title">Post Category</label>
    <select name="post_category_id" id="" class="form-control">
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
    <input type="text" class="form-control" name="post_author" />
  </div>

  <div class="form-group">
    <label for="title">Post Status</label>
    <input type="text" class="form-control" name="post_status" />
  </div>

  <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="post_image" />
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tag" />
  </div>

  <div class="form-group">
    <label for="title">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="insert_post" value="PUBLISH" />
  </div>

</form>
