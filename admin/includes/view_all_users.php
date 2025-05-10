<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th> 
            <th>Role</th>
            <th>Date</th>
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
                $user_password = $row['user_password'];
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
                echo "<td>{$user_image}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['approved'])) {
    $comment_id = $_GET['approved'];
    $query = "UPDATE comments SET comment_status = 'approved' where comment_id = $comment_id";
    $approved_comment_query = mysqli_query($conn, $query);
    header("Location: comments.php");
}

if (isset($_GET['unapproved'])) {
    $comment_id = $_GET['unapproved'];
    $query = "UPDATE comments SET comment_status = 'unapproved'  where comment_id = $comment_id";
    $approved_comment_query = mysqli_query($conn, $query);
    header("Location: comments.php");
}

// Function to delete posts
if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
    $delete_query = mysqli_query($conn, $query);
    header("Location: comments.php");
}