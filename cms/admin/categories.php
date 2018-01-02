<!-- Include Header -->
<?php include "include/header.php"; ?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                          <form action="">
                            <div class="form-group">
                              <label for="cat_title">Add Categories</label>
                              <input type="text" name="cat_title" class="form-control" />
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Categories"/>
                            </div>
                          </form>
                        </div>

                        <div class="col-xs-6">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>A01</td>
                                <td>Baseball Categories</td>
                              </tr>
                              <tr>
                                <td>A02</td>
                                <td>Music Categories</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Include Footer -->
<?php include "include/footer.php"; ?>
