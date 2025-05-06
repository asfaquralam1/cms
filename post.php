<?php include 'includes/header.php' ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php
            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
            } else {
                header("Location: index.php");
            }
            // Fetch categories from the database
            $query = "SELECT * FROM posts where post_id = $the_post_id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
               
            ?>
            <h1 class="page-header">
                Page Heading
                <small style="font-size: 24px;">Secondery Text</small>
            </h1>
            <h2><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
            <p>by <a href=""></a><?php echo $post_author ?></p>
            <p><i class="fa-solid fa-clock"></i>  <?php echo $post_date ?></p>
            <hr>
            <img src="images/<?php echo $post_image ?>" class="img-responsive" alt="Responsive image">
            <hr>
            <p><?php echo $post_content ?></p>
            <hr>
            <?php
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php include 'includes/sidebar.php' ?>
        </div>
    </div>
    <?php include 'includes/footer.php' ?>