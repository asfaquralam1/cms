<?php include "./connection.php"; ?>
<?php session_start() ?>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$query = "SELECT * FROM users WHERE username = '{$username}'";
$login_query = mysqli_query($conn, $query);

if (!$login_query) {
    die("Query failed" . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($login_query)) {
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
}
if ($username == $db_username && $password == $db_user_password) {
    $_SESSION['user_id'] = $db_user_id;
    $_SESSION['username'] = $db_username;
    $_SESSION['user_firstname'] = $db_user_firstname;
    $_SESSION['user_lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;

    header("Location: ../admin/index.php");
} else {
    header("Location: ../index.php");
}