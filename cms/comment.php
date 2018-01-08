
                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" name="comment_author" placeholder="author" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="comment_email" placeholder="email" />
                      </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content" placeholder="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="insert_comment">Submit</button>
                    </form>
                </div>

                <!-- ############### INSERT COMMENT ############### -->
                <?php
                if (isset($_POST['insert_comment'])) {
                    $comment_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                        $query_insert = "INSERT INTO comment (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query_insert .= "VALUES ($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now()) ";
                        $insert_comment = mysqli_query($connection, $query_insert);

                        confirm_query($insert_comment);

                        $query_add = "UPDATE posts SET post_comment_count = post_comment_count +1 ";
                        $query_add .= "WHERE post_id = $comment_post_id";
                        $count_comment = mysqli_query($connection, $query_add);

                        confirm_query($count_comment);
                    } else {
                        echo "<script>alert('Field Cannot Be Empty')</script>";
                    }
                }
                ?>

                <hr>


                <!-- Comment -->
                <!-- ############### VIEW APPROVED COMMENT ############### -->
                <?php
                $comment_post_id = $_GET['p_id'];
                $query_select = "SELECT * FROM comment WHERE comment_post_id = $comment_post_id AND comment_status = 'approve' ORDER BY comment_id DESC";
                $select_comment = mysqli_query($connection, $query_select);

                confirm_query($select_comment);

                while ($row_comment = mysqli_fetch_assoc($select_comment)) {
                    $comment_content = $row_comment['comment_content'];
                    $comment_date = $row_comment['comment_date'];
                    $comment_author = $row_comment['comment_author']; ?>
                <!-- Posted Comments -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
              <?php
                } ?>




            </div>
