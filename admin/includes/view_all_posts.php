<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th> 
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
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
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 50) . '...';
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                echo "<tr>";
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";
                $category_query = "SELECT * from categories where cat_id = {$post_category_id}";
                $select_categories_id = mysqli_query($conn, $category_query);
                confirmQuery($select_categories_id);
                while($row = mysqli_fetch_assoc($select_categories_id)){
                 $cat_id = $row['cat_id'];
                 $cat_title = $row['cat_title'];
                 echo "<td>{$cat_title}</td>";
                }
                echo "<td>{$post_status}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><img src='../images/{$post_image}' alt='Post Image' width='100'></td>";
                echo "<td>{$post_content}</td>";
                echo "<td>{$post_tags}</td>";
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