<?php
    include('partials/menu.php');
?>

    <div class="main-content pt-2 pb-2">
        <div class="wrapper">
            <h1 class="text-center">Manage Category</h1>
            <br><br>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-category-found'])){
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['fail-remove'])){
                    echo $_SESSION['fail-remove'];
                    unset($_SESSION['fail-remove']);
                }
            ?>

            <br><br>

            <a href="add-category.php" class="btn btn-primary">Add Category</a>
            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <?php
                    //Tao truy van voi database
                    $sql = "SELECT * FROM category_table";

                    $res = mysqli_query($conn, $sql);

                    //temp ID
                    $temp = 1;

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Kiem tra database dang co du lieu hay khong
                    if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['img'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                                <tr>
                                    <th><?php echo $temp++; ?></th>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php 
                                            //Kiem tra ten co bi trung hay khong
                                            if($image_name != ""){
                                                ?>
                                                    <img style="width: 120px;" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;  ?>">
                                                <?php
                                            } else {
                                                echo "<div class='alert alert-warning'> Image error. </div>";
                                            }
                                         ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a class="btn btn-success"
                                         href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>">
                                            Update Category
                                        </a>
                                        <a class="btn btn-danger" 
                                         href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&img=<?php echo $image_name; ?>">
                                            Delete Category
                                        </a>
                                    </td>
                                </tr>
                            <?php

                        }
                    } else {
                        ?>

                        <tr>
                            <td colspan="6"><div class="alert alert-warning">No Category Added</div></td>
                        </tr>

                        <?php
                    }
                ?>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>