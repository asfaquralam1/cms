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
                        case 'add_user':
                            include "includes/add_user.php";
                            break;
                        case 'edit_user':
                            include "includes/edit_user.php";
                            break;
                        default:
                            include "includes/view_all_users.php";
                            break;
                    }
                      ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../admin/includes/admin_footer.php" ?>