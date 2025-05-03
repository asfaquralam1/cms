<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['author'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_title, post_category_id, post_author, post_date, post_image, post_tags, post_content) ";
    $query .= "VALUES('{$post_title}', '{$post_category_id}', '{$post_author}', now(), '{$post_image}', '{$post_tags}', '{$post_content}')";

    $create_post_query = mysqli_query($conn, $query);
    if (!$create_post_query) {
        die('Query failed' . mysqli_error($conn));
    } 
    confirmQuery($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data" style="background-color: white;">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <input type="number" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="post_category">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="from-group">
        <label for="post_tags">Post Tages</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>