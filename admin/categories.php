<?php include "../admin/includes/admin_header.php" ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <?php include "../admin/includes/admin_sidebar.php" ?>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                            <?php insert_categories() ?>
                             <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                      <?php
                      if(isset($_GET['edit'])) {
                          $cat_id = $_GET['edit'];
                          include "../admin/update_categories.php";
                      }
                      ?>
                    </div>
                    <div class="col-lg-6">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php findAllCategories() ?>
                                <?php deleteCategories() ?>
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <?php include "../admin/includes/admin_footer.php" ?>