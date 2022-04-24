<?php
    include('partials/menu.php')
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-sm">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Image select: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="btn-sm btn-primary" type="submit" name="submit" value="Add Category">
                    </td>
                </tr>
            </table>
        </form>

        <?php

            if(isset($_POST['submit'])){
                //Lay du lieu tu form
                $title = $_POST['title'];

                //input selector
                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }
            
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }

                //Kiem tra img da duoc chon hay chua de truyen gia tri vao ten img
                // print_r($_FILES['image']);

                // die();
                if(isset($_FILES['image']['name'])){
                    //Upload img
                    $image_name = $_FILES['image']['name'];

                    //upload the image only when image is selected
                    if($image_name != ""){
                        //auto remane img
                        $ext = end(explode('.', $image_name));

                        //rename
                        $image_name = "Food_category_".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //Upload last move
                        $upload = move_uploaded_file($source_path, $destination_path);
                        
                        if($upload == false){
                            $_SESSION['upload'] = "<div class='alert alert-warning'>Failed to upload img. </div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            //Stop the process
                            die();
                        }
                        //Kiem tra da upload thanh cong chua
                    }
                } else {
                    //khong upload va set img_name = rong~
                    $image_name = "";
                }

                //insert to database
                $sql = "INSERT INTO category_table SET
                        title = '$title',
                        img = '$image_name',
                        featured = '$featured',
                        active = '$active'
                ";

                $res = mysqli_query($conn, $sql);

                //Kiem tra xem tien trinh da thuc hien hay chua
                if($res == true){
                    $_SESSION['add'] = "<div class='alert alert-success'>Category Added.</div>";
                    header("location:".SITEURL.'admin/manage-category.php');
                } else {
                    $_SESSION['add'] = "<div class='alert alert-error'>Failed.</div>";
                    header("location:".SITEURL.'admin/add-category.php');
                }
            }
        ?>
    </div>
</div>


<?php
    include('partials/footer.php')
?>