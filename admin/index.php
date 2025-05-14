<?php include '../admin/includes/admin_header.php' ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (col-4) -->
            <div class="col-lg-2 col-md-2">
                <?php include "../admin/includes/admin_sidebar.php" ?>
            </div>

            <!-- Dashboard (col-8) -->
            <div class="col-lg-10 col-md-10 bg-light">
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
                                        <?php
                                        $query = "SELECT * FROM posts";
                                        $select_all_posts = mysqli_query($conn, $query);
                                        $post_count = mysqli_num_rows($select_all_posts);
                                        echo "<div class='huge'>{$post_count}</div>";
                                        ?>
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
                                        <?php
                                        $query = "SELECT * from comments";
                                        $select_all_comments = mysqli_query($conn, $query);
                                        $comment_count = mysqli_num_rows($select_all_comments);
                                        echo "<div class='huge'>{$comment_count}</div>";
                                        ?>
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
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($conn, $query);
                                        $user_count = mysqli_num_rows($select_all_users);
                                        echo "<div class='huge'>{$user_count}</div>";
                                        ?>
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
                                        <?php
                                        $query = "SELECT * FROM categories";
                                        $select_all_categories = mysqli_query($conn, $query);
                                        $categories_count = mysqli_num_rows($select_all_categories);
                                        echo "<div class='huge'>{$categories_count}</div>";
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

                <?php
                $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                $select_all_draft_posts = mysqli_query($conn, $query);
                $post_draft_count = mysqli_num_rows($select_all_draft_posts);

                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                $unapproved_comment_query = mysqli_query($conn, $query);
                $unapproved_comment_count = mysqli_num_rows($unapproved_comment_query);

                $query = "SELECT * FROM users WHERE user_role = 'subscribers'";
                $select_subscribers = mysqli_query($conn, $query);
                $subscriber_count = mysqli_num_rows($select_subscribers);
                ?>
                <div class="row">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                <?php
                                $element_text = ['Active Posts','Pending Comments', 'Subscribers', 'Comments'];
                                $element_count = [$post_count, $unapproved_comment_count, $subscriber_count, $comment_count];

                                for($i= 0; $i< 4; $i++){
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                                ?>
                            ]);

                            var options = {
                                chart: {
                                    title: 'Yearly Progess',
                                    subtitle: 'Progessment of: 2022-2025',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>


                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php include "../admin/includes/admin_footer.php" ?>