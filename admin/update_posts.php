<form action="" method="post">
    <div class="form-group">
        <label for="">Edit Post</label>
        <?php
        if (isset($_GET['edit'])) {
            $post_id = $_GET['edit'];
            $query = "SELECT * from posts WHERE post_id = $post_id";
            $selected_post_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selected_post_id)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
        ?>
        <input value="<?php if (isset($post_title)) {echo $post_title;} ?>" type="text" class="form-control" name="post_title">
        <input value="<?php if (isset($post_author)) {echo $post_author;} ?>" type="text" class="form-control" name="post_author">
        <?php  }
        } ?>

        <!-- Update Query -->
        <?php
        if (isset($_POST['update_post'])) {
            $the_cat_title = $_POST['cat_title'];
            $query = "UPDATE posts SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_id}'";
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