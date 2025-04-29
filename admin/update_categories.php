<form action="" method="post">
    <div class="form-group">
        <label for="">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * from categories WHERE cat_id = $cat_id";
            $selected_category_id = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($selected_category_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
        <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
        <?php  }
        } ?>

        <!-- Update Query -->
        <?php
        if (isset($_POST['update_category'])) {
            $the_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$the_cat_id}'";
            $update_query = mysqli_query($conn, $query);
            header("Location: categories.php");
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>