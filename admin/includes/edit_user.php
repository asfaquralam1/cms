<?php
if (isset($_GET['p_id'])) {
    $the_user_id = $_GET['p_id'];

    $query = "SELECT * from users WHERE user_id = $the_user_id";
    $selected_user_by_id = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($selected_user_by_id)) {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        // $post_image = $row['post_image'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }
}
if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "UPDATE users SET 
    user_firstname = '{$user_firstname}', 
    user_lastname = '{$user_lastname}', 
    user_role = '{$user_role}', 
    username = '{$username}', 
    user_email = '{$user_email}', 
    user_password = '{$user_password}' 
    WHERE user_id = {$user_id}";


    $create_post_query = mysqli_query($conn, $query);
    if (!$create_post_query) {
        die('Query failed' . mysqli_error($conn));
    }
    confirmQuery($create_post_query);
     header("Location: users.php");
}
?>

<form action="" method="post" enctype="multipart/form-data" style="background-color: white;">
    <div class="form-group mb-2">
        <label for="">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group mb-2">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group mb-2">
        <label for="">User Role</label>
        <select class="form-select" name="user_role">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="user_image">User Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group mb-2">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group mb-2">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group mb-2">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>
</form>