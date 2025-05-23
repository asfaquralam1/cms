<?php include 'includes/header.php' ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <?php
            // Fetch categories from the database
            $query = "SELECT * FROM posts";
            $result = mysqli_query($conn, $query);
            $published_found = false; // flag to check if any published post is found
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['post_status'] !== 'published') {
                        continue; // skip unpublished posts
                    }
                    $published_found = true; // flag to check if any published post is found
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 50) . '...';
                    $post_status = $row['post_status'];

            ?>

                    <h1 class="page-header">
                        Page Heading
                        <small style="font-size: 24px;">Secondery Text</small>
                    </h1>
                    <h2><a class="nav-link" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
                    <p>by <a href=""></a><?php echo $post_author ?></p>
                    <p><i class="fa-solid fa-clock"></i> <?php echo $post_date ?></p>
                    <hr>
                    <img src="images/<?php echo $post_image ?>" class="img-responsive" alt="Responsive image">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
            <?php
                }
                    if (!$published_found) {
                        echo "<h1 class='text-center'> NO POST SORRY </h1>";
                    }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>
        <div class="col-md-3">
            <?php include 'includes/sidebar.php' ?>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>