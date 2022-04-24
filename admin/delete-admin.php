<?php
    include('../config/constants.php');

    //Lay ID admin se bi xoa
    $id = $_GET['id'];
    //Create SQL query to delete Admin
    $sql = "DELETE FROM admin_table WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //kiem tra xem xoa thanh cong chua
    if($res == true){
        //Tao bien session de hien thong bao da xoa thanh cong
        $_SESSION['delete'] = "<div class='alert alert-success'>
        Admin Deleted Successfully
        </div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['delete'] = "<div class='alert alert-warning'>
        Delete fail
        </div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //Chuyen huong toi trang manage-admin


?>