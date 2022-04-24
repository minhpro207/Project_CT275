<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
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
                        <input type="text" name="title" placeholder="Enter title">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Enter Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Img:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                //Lay du lieu tu bang category
                                $sql = "SELECT * FROM category_table WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                //Check co category hay khong
                                $count = mysqli_num_rows($res);

                                if($count > 0 ){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                } else {
                                    ?>
                                        <option value="0">No category.</option>
                                    <?php
                                }
                            ?>
                        </select>
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
                        <input class="btn-sm btn-primary" type="submit" name="submit" value="Add Food">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                //lay du lieu tu form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //Kiem tra nut radion
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

                //Upload img neu duoc chon
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != ""){
                        //auto remane img
                        $ext = end(explode('.', $image_name));

                        //rename
                        $image_name = "Food_name_".rand(0000, 9999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/food/".$image_name;

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
                
                //Insert data
                $sql2 = "INSERT INTO food_table SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        img = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true){
                    $_SESSION['add'] = "<div class='alert alert-success'>Food Added.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } else {
                    $_SESSION['add'] = "<div class='alert alert-error'>Failed.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                } 

            }
        ?>
    </div>
</div>





<?php
    include('partials/footer.php');
?>