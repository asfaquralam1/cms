<?php include 'includes/header.php' ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tages LIKE '%$search%'";
                // $result = mysqli_real_escape_string($conn, $search);
                $search_query = mysqli_query($conn, $query);
                if (!$search_query) {
                    die("Query failed: " . mysqli_error($conn));
                }
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1>No result</h1>";
                } else {
                    $query = "SELECT * FROM posts";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            // Fetch categories from the database
            ?>
                            <h1 class="page-header">
                                Page heading
                                <small>Secondery Text</small>
                            </h1>
                            <h2><a href="#"><?php echo $post_title ?></a></h2>
                            <p>by <a href=""></a><?php echo $post_author ?></p>
                            <p><i class="fa-solid fa-clock"></i> <?php echo $post_date ?></p>
                            <hr>
                            <img src="images/<?php echo $post_image ?>" class="img-responsive" alt="Responsive image">
                            <hr>
                            <p><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            <hr>
            <?php }
                    }
                }
            } ?>

        </div>
        <div class="col-md-4">
            <?php include 'includes/sidebar.php' ?>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>