<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="search" id="">
            <span class="input-group-text"> 
                <button class="btn btn-default" name="submit" type="submit" id="search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </span>
        </div>
    </form>
</div>
<?php
$query = "SELECT * FROM categories LIMIT 5";
$select_all_categories = mysqli_query($conn, $query);
?>
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                while ($row = mysqli_fetch_assoc($select_all_categories)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li><a class='nav-link' href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>