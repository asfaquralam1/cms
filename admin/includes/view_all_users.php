<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th> 
            <th>Role</th>
            <th>Image</th>
            <th>Make Admin</th>
            <th>Make Subscriber</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch posts from the database
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];;
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td>{$user_image}</td>";
                echo "<td><a class='nav-link text-center' href='users.php?admin=$user_id'>Admin</a></td>";
                echo "<td><a class='nav-link text-center' href='users.php?subscriber=$user_id'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a> | <a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['admin'])) {
    $user_id = $_GET['admin'];
    $query = "UPDATE users SET user_role = 'admin' where user_id = $user_id";
    $admin_query = mysqli_query($conn, $query);
    header("Location: users.php");
}

if (isset($_GET['subscriber'])) {
    $user_id = $_GET['subscriber'];
    $query = "UPDATE users SET user_role = 'subscriber'  where user_id = $user_id";
    $subscriber_query = mysqli_query($conn, $query);
    header("Location: users.php");
}

// Function to delete posts
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_query = mysqli_query($conn, $query);
    header("Location: users.php");
}