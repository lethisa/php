<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <!-- ############### QUERY COUNT POST ############### -->
                    <?php
                    $query = "SELECT * FROM posts";
                    $select_post = mysqli_query($connection, $query);
                    $post_count = mysqli_num_rows($select_post);

                    echo "<div class='huge'>{$post_count}</div>";

                    confirm_query($select_post);
                    ?>
                      <div>Publish Posts</div>
                    </div>
                </div>
            </div>
            <a href="view_post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <!-- ############### QUERY COUNT comment ############### -->
                      <?php
                      $query = "SELECT * FROM comment";
                      $select_comment = mysqli_query($connection, $query);
                      $comment_count = mysqli_num_rows($select_comment);

                      echo "<div class='huge'>{$comment_count}</div>";

                      confirm_query($select_comment);
                      ?>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="view_comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <!-- ############### QUERY COUNT USER ############### -->
                      <?php
                      $query = "SELECT * FROM user";
                      $select_user = mysqli_query($connection, $query);
                      $user_count = mysqli_num_rows($select_user);

                      echo "<div class='huge'>{$user_count}</div>";

                      confirm_query($select_user);
                      ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="view_user.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <!-- ############### QUERY COUNT CATEGORIES ############### -->
                      <?php
                      $query = "SELECT * FROM categories";
                      $select_categories = mysqli_query($connection, $query);
                      $categories_count = mysqli_num_rows($select_categories);

                      echo "<div class='huge'>{$categories_count}</div>";

                      confirm_query($select_categories);
                      ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
