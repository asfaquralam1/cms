<?php include "includes/header.php" ?>
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
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];

                                if($cat_title == "" || empty('cat_title')){
                                    echo "This field is empty";
                                }else{
                                    $query = "insert into categories(cat_title)";
                                    $query .= "value('{$cat_title}')";

                                    $create_category_query = mysqli_query($conn, $query);
                                    if(!$create_category_query){
                                        die('query feild' . mysqli_error($conn));
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <label for="">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </form>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from categories";
                                $select_sidebar_categories = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($select_sidebar_categories)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "/<tr>";
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