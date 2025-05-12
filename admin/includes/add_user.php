<?php
if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}','{$username}', '{$user_email}', '{$user_password}')";

    $create_post_query = mysqli_query($conn, $query);
    if (!$create_post_query) {
        die('Query failed' . mysqli_error($conn));
    }
    confirmQuery($create_post_query);
}
?>

<form action="" method="post" enctype="multipart/form-data" style="background-color: white;">
    <div class="form-group mb-2">
        <label for="">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group mb-2">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group mb-2">
        <label for="">User Role</label>
        <select class="form-select" name="user_role">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="user_image">User Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group mb-2">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group mb-2">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group mb-2">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>