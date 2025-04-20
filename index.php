<?php include 'includes/header.php' ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php
            // Fetch categories from the database
            $query = "SELECT * FROM posts";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
            <h1 class="page-header">
                Page heading
                <small>Secondery Text</small>
            </h1>
            <h2><a href="#"><?php echo $post_title ?></a></h2>
            <p>by <a href=""></a><?php echo $post_author ?></p>
            <p><i class="fa-solid fa-clock"></i>  <?php echo $post_date ?></p>
            <hr>
            <img src="images/<?php echo $post_image ?>" class="img-responsive" alt="Responsive image">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>

            <h2><a href="#">Blog Post Title</a></h2>
            <p>by<a href=""></a>Start Bootstarp</p>
            <p><i class="fa-solid fa-clock"></i> Posted on January 1, 2025 at 12:00 PM</p>
            <hr>
            <img src="http://placehold.it/900x300" class="img-responsive" alt="Responsive image">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="col-md-4">
            <?php include 'includes/sidebar.php' ?>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>