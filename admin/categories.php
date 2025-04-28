<?php include "includes/admin_header.php" ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <?php include "includes/sidebar.php" ?>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php
                            if (isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];

                                if ($cat_title == "" || empty('cat_title')) {
                                    echo "This field is empty";
                                } else {
                                    $query = "insert into categories(cat_title)";
                                    $query .= "value('{$cat_title}')";

                                    $create_category_query = mysqli_query($conn, $query);
                                    if (!$create_category_query) {
                                        die('query feild' . mysqli_error($conn));
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Edit Category</label>
                                    <?php
                                 if (isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];
                                    $query = "SELECT * from categories WHERE cat_id = $cat_id";
                                    $selected_category_id = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($selected_category_id)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                ?>
                                <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                                <?php  } }?>

                                <!-- Update Query -->
                                <?php
                                if (isset($_POST['update_category'])) {
                                    $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$the_cat_id}'";
                                    $update_query = mysqli_query($conn, $query);
                                    header("Location: categories.php");
                                 }
                                ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from categories";
                                $select_sidebar_categories = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($select_sidebar_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                <?php
                                 if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE from categories WHERE cat_id = $the_cat_id";
                                    $deleted_query = mysqli_query($conn, $query);
                                    header("Location: categories.php");
                                 }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php" ?>