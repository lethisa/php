    <!-- ############### QUERY COUNT DRAFT POST ############### -->

    <?php
    $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
    $select_post_draft = mysqli_query($connection, $query);
    $post_count_draft = mysqli_num_rows($select_post_draft);

    confirm_query($select_post_draft);
    ?>

    <!-- ############### QUERY COUNT PUBLISH POST ############### -->
    <?php
    $query = "SELECT * FROM posts WHERE post_status = 'publish' ";
    $select_post_publish = mysqli_query($connection, $query);
    $post_count_publish = mysqli_num_rows($select_post_publish);

    confirm_query($select_post_publish);
    ?>

    <!-- ############### QUERY COUNT COMMENT UNAPPROVE ############### -->
    <?php
    $query = "SELECT * FROM comment WHERE comment_status = 'unapprove' ";
    $select_comment_un = mysqli_query($connection, $query);
    $comment_count_un = mysqli_num_rows($select_comment_un);

    confirm_query($select_comment_un);
    ?>

    <!-- ############### QUERY COUNT COMMENT APPROVE ############### -->
    <?php
    $query = "SELECT * FROM comment WHERE comment_status = 'approve' ";
    $select_comment_app = mysqli_query($connection, $query);
    $comment_count_app = mysqli_num_rows($select_comment_app);

    confirm_query($select_comment_app);
    ?>

    <!-- ############### QUERY COUNT USER SUBSCRIBER ############### -->
    <?php
    $query = "SELECT * FROM user WHERE user_role = 'subscriber' ";
    $select_user_sub = mysqli_query($connection, $query);
    $user_count_sub = mysqli_num_rows($select_user_sub);

    confirm_query($select_user_sub);
    ?>

    <!-- ############### QUERY COUNT USER ADMIN ############### -->
    <?php
    $query = "SELECT * FROM user WHERE user_role = 'admin' ";
    $select_user_ad = mysqli_query($connection, $query);
    $user_count_ad = mysqli_num_rows($select_user_ad);

    confirm_query($select_user_ad);
    ?>

<!-- charts -->
<div class="row ">
      <!-- ############### GOOGLE CHART ############### -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],

            // ############### QUERY COUNT GRAPH ############### -->
            <?php
            $element_text = ['Active Post', 'Draft Post', 'Categorie', 'Admin', 'Subscriber', 'App Comment', 'Un Comment'];
            $element_count = [$post_count_publish, $post_count_draft, $categories_count, $user_count_ad, $user_count_sub, $comment_count_app, $comment_count_un];

            for ($i=0; $i < 7 ; $i++) {
              echo "['{$element_text[$i]}'" . ", " . "{$element_count[$i]}],";
            }

            ?>

          ]);

          var options = {
            chart: {
              title: 'CMS STATISTIC',
              subtitle: 'Post - Comment - Categories - User',
            }
          };

          var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

</div>
