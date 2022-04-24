<?php
    //Include constants file
    include('../config/constants.php');

    //Kiem tra id va img da co gia tri hay chua
    if( isset($_GET['id']) AND isset($_GET['img']) ){
        $id = $_GET['id'];
        $image_name = $_GET['img'];

        if($image_name != ""){
            //Img co the xoa 
            $path = "../images/food/".$image_name;
            //Xoa img
            $remove = unlink($path);

            //neu xoa that bai thi hien thong bao
            if($remove == false){
                $_SESSION['remove'] = "<div class='alert alert-error'>Failed to remove. </div>";
                
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        //Xoa img tu database
        $sql = "DELETE FROM food_table WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        //kiem tra data da duoc xoa chua
        if($res == true){
            $_SESSION['delete'] = "<div class='alert alert-success'>Category Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        } else {
            $_SESSION['delete'] = "<div class='alert alert-success'>Deleted Failed.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        //Dan ve trang category manage
    } else {
        $_SESSION['unauthorize'] = "<div class='alert alert-warning'>Unauthorize.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>