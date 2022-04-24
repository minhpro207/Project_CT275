<?php
    if(!isset($_SESSION['user'])){
        //Neu chua login thi dan toi login page
        $_SESSION['none-login'] = "<div class='alert alert-warning'>Login to have permission </div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>