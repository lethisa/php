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

    if (!$insert_post) {
      echo "QUERY ERROR" . mysqli_error($connection);
    }


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
    <input type="text" class="form-control" name="post_category_id" />
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
