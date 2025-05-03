<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch posts from the database
        $query = "SELECT * FROM posts";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 50) . '...';
                echo "<tr>";
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_title}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><img src='../images/{$post_image}' alt='Post Image' width='100'></td>";
                echo "<td>{$post_content}</td>";
                echo "<td><a href='posts.php?source=edit&p_id={$post_id}'>Edit</a> | <a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        deletePosts()
        ?>
    </tbody>
</table>