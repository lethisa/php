<!-- Category -->
<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">

        <!-- SHOW CATEGORIES -->
        <?php
        $query = "SELECT * FROM categories";
        $result = query($query);
        confirm($result);

        while ($row = fetch_array($result)) {
            echo "<a href='#' class='list-group-item'>{$row['cat_title']}</a>";
        }
        ?>
    </div>
</div>
