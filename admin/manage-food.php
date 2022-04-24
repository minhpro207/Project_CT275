<?php
    include('partials/menu.php');
?>

<div class="main-content pt-2 pb-2">
        <div class="wrapper">
            <h1 class="text-center">Manage Food</h1>
            <br><br>

            <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn btn-primary">Add Food</a>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize'])){
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <?php

                    $sql = "SELECT * FROM food_table";

                    $res = mysqli_query($conn, $sql);

                    //Kiem tra database co du lieu hay khong
                    $count = mysqli_num_rows($res);

                    //ID temp
                    $temp = 1;

                    if($count > 0){
                        //Vong lap lay du lieu food
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['img'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>

                                <tr>
                                    <th><?php echo $temp++; ?></th>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td>
                                        <?php 
                                            if($image_name == ""){
                                                echo "<div class='alert alert-warning'> Image not Added. </div>";
                                            } else {
                                                ?>
                                                    <img width='120px' src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $featured; ?>
                                    </td>
                                    <td>
                                        <?php echo $active; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>">
                                            Update Food
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&img=<?php echo $image_name; ?>">
                                            Delete Food
                                        </a>
                                    </td>
                                </tr>

                            <?php
                        }
                    } else {
                        echo "<td colspan='7'><div class='alert alert-warning'>No Food Added</div></td>";
                    }

                ?>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>