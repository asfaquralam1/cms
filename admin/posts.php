<?php include "../admin/includes/admin_header.php" ?>
<div class="container-fuild">
    <div class="row">
        <div class="col-lg-2">
            <?php include "../admin/includes/admin_sidebar.php" ?>
        </div>
        <div class="col-lg-10">
            <h1 class="page-header">Welcome to admin <small>Author</small></h1>
            <div class="row">
                <div class="col-lg-12">
                <?php
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch($source) {
                        case 'add_post':
                            include "includes/add_post.php";
                            break;
                        case 'edit':
                            include "includes/edit_post.php";
                            break;
                        default:
                            include "includes/view_all_posts.php";
                            break;
                    }
                      ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../admin/includes/admin_footer.php" ?>