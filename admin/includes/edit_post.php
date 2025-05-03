<form action="" method="post">
<h6>Edit Post</h6>
        <?php
        if (isset($_GET['p_id'])) {
            $post_id = $_GET['p_id'];
            $query = "SELECT * from posts WHERE post_id = $post_id";
            $selected_post_by_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selected_post_by_id)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_count = $row['post_count'];
                $post_status = $row['post_status'];

        ?>

         <!-- Update Query -->
         <?php
        if (isset($_POST['update_post'])) {
            $the_post_title = $_POST['post_title'];
            $the_post_author = $_POST['post_author'];
            $the_post_content = $_POST['post_content'];
            $the_post_category = $_POST['post_category_id'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($post_image_temp, "../images/$post_image");
            $query = "UPDATE posts SET post_title = '{$the_post_title}', post_author = '{$the_post_author}',post_category_id = {$the_post_category},post_image = {$post_image} post_content = '{$the_post_content}' WHERE post_id = '{$post_id}'";
            $update_query = mysqli_query($conn, $query);
            if(!$update_query){
                die("Query failed". mysqli_error($conn));
            }
            header("Location: posts.php");
        }
        ?>


        <div class="form-group">
          <label for="">Post title</label>
          <input value="<?php if (isset($post_title)) {echo $post_title;} ?>" type="text" class="form-control" name="post_title">
        </div>
        <div class="form-group">
          <label for="">Post Author</label>
          <input value="<?php if (isset($post_author)) {echo $post_author;} ?>" type="text" class="form-control" name="post_author">
        </div>
        <div class="form-group">
          <select name="post_category_id" id="">
          <?php
           $category_query = "SELECT * from categories";
           $select_categories = mysqli_query($conn, $category_query);
           confirmQuery($select_categories);
           while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
           }
          ?>
          </select>
        </div>
        <div class="form-group">
          <img width="100" src="../images/<?php echo $post_image; ?>" name="post_image" alt="">
          <input type="file" name="image">
        </div>
        <div class="form-group">
          <label for="">Post Content</label>
          <input value="<?php if (isset($post_content)) {echo $post_content;} ?>" type="text" class="form-control" name="post_content">
        </div>
        <div class="form-group">
          <label for="">Post tags</label>
          <input value="<?php if (isset($post_tags)) {echo $post_tags;} ?>" type="text" class="form-control" name="post_tags">
        </div>
        <?php  }
        } ?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>