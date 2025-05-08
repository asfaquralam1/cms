<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th> 
            <th>In Response to</th>
            <th>Date</th>
            <th>Approved</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch posts from the database
        $query = "SELECT * FROM comments";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = substr($row['comment_content'], 0, 50) . '...';
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_status}</td>";
                $query = "SELECT * from posts where post_id = {$comment_post_id}";
                $select_posts_id_query = mysqli_query($conn, $query);
                // confirmQuery($select_categories_id);
                while($row = mysqli_fetch_assoc($select_posts_id_query)){
                 $post_id = $row['post_id'];
                 $post_title = $row['post_title'];
                 echo "<td><a class='nav-link' href='./posts.php?p_id=$post_id'>{$post_title}</a></td>";
                }
                echo "<td>Some Title</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td><a href='comments.php?source=edit_comment &p_id={$comment_id}'>Approve</a></td>";
                echo "<td><a href='comments.php?source=edit_comment &p_id={$comment_id}'>Edit</a> | <a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        deletePosts()
        ?>
    </tbody>
</table>