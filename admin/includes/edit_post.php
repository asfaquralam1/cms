<form action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($_GET['p_id'])) {
            $the_post_id = $_GET['p_id'];
        }
            $query = "SELECT * from posts WHERE post_id = $the_post_id";
            $selected_post_by_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selected_post_by_id)) {
                $the_post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];

            }
                // <!-- Update Query -->
                if (isset($_POST['update_post'])) {
                  $post_title = $_POST['post_title'];
                  $post_author = $_POST['post_author'];
                  $post_category_id = $_POST['post_category_id'];
                  $post_status = $_POST['post_status'];
                  $post_image = $_FILES['image']['name'];
                  $post_image_temp = $_FILES['image']['tmp_name'];
                  $post_content = $_POST['post_content']; 
                  $post_tags = $_POST['post_tags'];
                  move_uploaded_file($post_image_temp, "../images/$post_image");
      
                  if (empty($post_image)) {
                      $query = "SELECT * from posts WHERE post_id = $the_post_id";
                      $select_image = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_array($select_image)) {
                          $post_image = $row['post_image'];
                      }
                  }
      
      
                  $query = "UPDATE posts SET ";
                  $query.= "post_category_id = '{$post_category_id}', ";
                  $query.= "post_title = '{$post_title}', ";
                  $query.= "post_author = '{$post_author}', ";  
                  $query.= "post_date = now(), ";
                  $query.= "post_image = '{$post_image}', ";
                  $query.= "post_content = '{$post_content}', ";
                  $query.= "post_tags = '{$post_tags}', ";
                  $query.= "post_status = '{$post_status}' ";
                  $query.= "WHERE post_id = '{$the_post_id}' ";
      
                  $update_query = mysqli_query($conn, $query);
      
                  confirmQuery($update_query);
                  header("Location: posts.php");
              }

        ?>

       


        <div class="form-group mb-2">
          <label for="">Post title</label>
          <input value="<?php if (isset($post_title)) {echo $post_title;} ?>" type="text" class="form-control" name="post_title">
        </div>
        <div class="form-group mb-2">
          <label for="">Post Author</label>
          <input value="<?php if (isset($post_author)) {echo $post_author;} ?>" type="text" class="form-control" name="post_author">
        </div>
        <div class="form-group mb-2">
          <label for="">Select Category</label>
          <select class="form-select" name="post_category_id" id="">
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
        <div>
          <label for="">Post Status</label>
          <select class="form-select" name="post_status" id="">
            <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
            <?php
            if ($post_status == 'published') {
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='published'>Publish</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group mb-2">
          <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
          <input type="file" name="image">
        </div>
        <div class="form-group mb-2">
          <label for="">Post Content</label>
          <input value="<?php if (isset($post_content)) {echo $post_content;} ?>" type="text" class="form-control" name="post_content">
        </div>
        <div class="form-group mb-2">
          <label for="">Post tags</label>
          <input value="<?php if (isset($post_tags)) {echo $post_tags;} ?>" type="text" class="form-control" name="post_tags">
        </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>