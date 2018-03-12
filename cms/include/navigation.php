<!-- Coonection -->
<?php include "include/db.php"; ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">HOME</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                // categories query
                $query_categories = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query_categories);

                // display categories
                while ($row_categories = mysqli_fetch_assoc($select_categories)) {
                    $cat_title = strtoupper($row_categories['cat_title']);
                    $cat_id = $row_categories['cat_id'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
                <li><a href="registration.php">REGISTER</a></li>
                <li><a href="../cms/admin">ADMIN</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.nav -->
