<?php include '../admin/includes/admin_header.php' ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (col-4) -->
            <div class="col-lg-2">
                <?php include "../admin/includes/admin_sidebar.php" ?>
            </div>

            <!-- Dashboard (col-8) -->
            <div class="col-lg-10 bg-light">
                <h1>Welcome to the admin <small style="font-size: 20px;">Author</small></h1>
                <!-- Add cards, charts, tables, etc. here -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-file-text"></i>
                                    </div>
                                    <div class="col-md-9 text-end">
                                        <div class="huge">20</div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
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
                                    <div class="col-md-3">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="col-md-9 text-end">
                                        <div class="huge">20</div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-orange">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="col-md-9 text-end">
                                        <div class="huge">20</div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
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
                                    <div class="col-md-3">
                                        <i class="fas fa-list"></i>
                                    </div>
                                    <div class="col-md-9 text-end">
                                        <div class="huge">20</div>
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
            </div>

        </div>
    </div>
</div>
<?php include "../admin/includes/admin_footer.php" ?>