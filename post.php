<?php include 'includes/header.php' ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
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
                    <h2><a class="nav-link" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
                    <p>by <a href=""></a><?php echo $post_author ?></p>
                    <p><i class="fa-solid fa-clock"></i> <?php echo $post_date ?></p>
                    <hr>
                    <img src="images/<?php echo $post_image ?>" class="img-responsive" alt="Responsive image">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>

                    <?php
                    if(isset($_POST['create_comment'])) {
                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($the_post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
                            $create_comment_query = mysqli_query($conn, $query);
                            if (!$create_comment_query) {
                                die('Query Failed' . mysqli_error($conn));
                            }
                        }
                    }
                    ?>
                    <!-- // Comment Section -->
                    <div class="card my-4">
                        <div class="card-body" style="background-color: #f7f7f9 ;">
                             <h5>Leave a Comment:</h5>
                            <form method="post">
                                <div class="form-group">
                                    <label for="">Author</label>
                                    <input class="form-control" name="comment_author" placeholder="Your Name" required />
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="comment_email" placeholder="Your Email" required />
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">Comment</label>
                                    <textarea class="form-control" name="comment_content" rows="3" placeholder="Your Comment" required></textarea>
                                </div>
                                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
            <?php
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