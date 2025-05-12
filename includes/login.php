<?php include "./connection.php"; ?>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$query = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'";
$login_query = mysqli_query($conn, $query);
// confirmQuery($login_query);
if (!$login_query) {
    die("Query failed" . mysqli_error($conn));
}

if (mysqli_num_rows($login_query) == 0) {
    echo "<div class='alert alert-danger'>Invalid username or password</div>";
} else {
    $row = mysqli_fetch_assoc($login_query);
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];

    $_SESSION['username'] = $username;
    $_SESSION['user_firstname'] = $user_firstname;
    $_SESSION['user_lastname'] = $user_lastname;
    $_SESSION['user_role'] = $user_role;
}

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == 'admin') {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}