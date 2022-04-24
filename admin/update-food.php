<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <?php
            //Kiem tra du lieu co ton tai hay khong
            if(isset($_GET['id'])){
                // echo "Getting the Data";
                $id = $_GET['id'];

                $sql = "SELECT * FROM food_table WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['img'];
                    $price = $row['price'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                } else {
                    $_SESSION['no-category-found'] = "<div class='alert alert-warning'>Category not found. </div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

            } else {
                header('location:'.SITEURL.'admin/manage-food.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-sm">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Img: </td>
                    <td>
                        <?php
                            if($current_image != ""){
                                ?>
                                    <img style="width: 150px;" src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>">
                                <?php
                            } else {
                                echo "<div class='alert alert-warning'>Image not add yet.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Img: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";} ?>  type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input class="btn-sm btn-primary" type="submit" name="submit" value="Update Food">
                    </td>
                </tr>
            </table>
        </form>

        <?php

            if(isset($_POST['submit'])){
                //Lay tat ca du lieu tu input
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $price = $_POST['price'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //Cap nhat img neu duoc thay doi
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != ""){
                        
                        $ext = end(explode('.', $image_name));

                        //rename
                        $image_name = "Food_item_".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/food/".$image_name;

                        //Upload last move
                        $upload = move_uploaded_file($source_path, $destination_path);
                        
                        if($upload == false){
                            $_SESSION['upload'] = "<div class='alert alert-warning'>Failed to upload img. </div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //Stop the process
                            die();
                        }

                        //Xoa img cũ
                        if($current_image != ""){
                            $remove_path = "../images/food/".$current_image;
                        
                            $remove = unlink($remove_path);
    
                            //Kiem tra xem img da duoc remove chua
                            if($remove == false){
                                $_SESSION['fail-remove'] = "<div class='alert alert-warning'>Remove fail  </div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                        }
                        
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image;
                }

                //Cap nhat database
                $sql2 = "UPDATE food_table SET 
                        title = '$title',
                        img = '$image_name',
                        featured = '$featured',
                        price = '$price',
                        active = '$active'
                        WHERE id = '$id'
                ";

                $res2 = mysqli_query($conn, $sql2);
                //Chuyen den trang manage
                if($res2 == true){
                    $_SESSION['update'] = "<div class='alert alert-success'>Category updated succsess.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } else {
                    $_SESSION['update'] = "<div class='alert alert-warning'>Update fail.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }

        ?>

    </div>
</div>


<?php 
    include('partials/footer.php');
?>