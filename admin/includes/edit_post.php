<form action="" method="post">
    <div class="form-group">
        <label for="">Edit Post</label>
        <?php
        if (isset($_GET['p_id'])) {
            $post_id = $_GET['p_id'];
            $query = "SELECT * from posts WHERE post_id = $post_id";
            $selected_post_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selected_post_id)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];

        ?>
        <input value="<?php if (isset($post_title)) {echo $post_title;} ?>" type="text" class="form-control" name="post_title">
        <input value="<?php if (isset($post_author)) {echo $post_author;} ?>" type="text" class="form-control" name="post_author">
        <input value="<?php if (isset($post_content)) {echo $post_content;} ?>" type="text" class="form-control" name="post_content">
        <?php  }
        } ?>

        <!-- Update Query -->
        <?php
        if (isset($_POST['update_post'])) {
            $the_post_title = $_POST['post_title'];
            $the_post_author = $_POST['post_author'];
            $the_post_content = $_POST['post_content'];
            $query = "UPDATE posts SET post_title = '{$the_post_title}', post_author = '{$the_post_author}', post_content = '{$the_post_content}' WHERE post_id = '{$post_id}'";
            $update_query = mysqli_query($conn, $query);
            if(!$update_query){
                die("Query failed". mysqli_error($conn));
            }
            // header("Location: categories.php");
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>