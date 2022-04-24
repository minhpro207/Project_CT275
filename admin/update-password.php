<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="table table-sm">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="cur_password"
                        placeholder="Enter password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password"
                        placeholder="Enter password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password"
                        placeholder="Enter password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input class="btn-sm btn-primary" type="submit" name="submit" value="Change Password">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        //Lay du lieu tu form
        $id = $_POST['id'];
        $current_password = md5($_POST['cur_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        //Kiem tra xem id nguoi dung va password co trong du lieu khong
        $sql = "SELECT * FROM admin_table WHERE id=$id AND password='$current_password'";
        
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $count = mysqli_num_rows($res);

            if($count==1){//Tai khoan co ton tai
                if($new_password == $confirm_password){
                    $sql2 = "UPDATE admin_table SET
                        password = '$new_password'
                        WHERE id = $id
                    ";

                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 == true){
                        $_SESSION['change-pwd'] = "<div class='alert alert-success'>Changed Password </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    } else {
                        $_SESSION['change-pwd'] = "<div class='alert alert-success'>Changed Password </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                } else {
                    $_SESSION['pwd-unmatch'] = "<div class='alert alert-warning'>Wrong Password </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            } else {
                $_SESSION['user-not-found'] = "<div class='alert alert-warning'>User Not Found </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        } else {

        }

        //Kiem tra mat khau moi va xac nhan mat khau

        //Doi mat khau neu deieu kien la dung
    }

?>

<?php
    include('partials/footer.php');
?>