<?php require_once("../resources/config.php") ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
<div class="container">
       <!-- Side Navigation -->
       <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<!-- item -->
<div class="row">
<?php get_item($_GET['id']) ?>
</div>
<!-- /.item -->

</div>

</div><!--Row For Image and Short Description-->
        <hr>

<!--Row for Tab Panel-->
<div class="row">
<?php tab_pane($_GET['id']); ?>
</div><!--Row for Tab Panel-->

</div>

</div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
