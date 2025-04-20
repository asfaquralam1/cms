<?php include 'includes/connection.php' ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                // Fetch categories from the database
                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>{$cat_title}</a>
                              </li>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                } 
                ?>
            </ul>
        </div>
    </div>
</nav>