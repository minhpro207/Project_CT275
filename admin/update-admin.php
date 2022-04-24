<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
            //1. Lay id cua admin da chon
            $id = $_GET['id'];

            //2.Tao truy vanu SQL de lay du lieu
            $sql = "SELECT * FROM admin_table WHERE id=$id";

            //Xu li truy van
            $res = mysqli_query($conn, $sql);

            //Kiem tra xem query co duoc thuc thi hay khong
            if($res == true){
                //Kiem tra du lieu co kha dung hay khong
                $count = mysqli_num_rows($res);
                //Kiem tra xem admin dang co du lieu hay khong
                if($count==1){
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['fullname'];
                    $username = $row['username'];
                } else {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="table table-sm">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input class="btn-sm btn-primary" type="submit" name="submit" value="Update Admin">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    //Kiem tra nut submit
    if(isset($_POST['submit'])){
        //Lay toan bo gia tri tu form de cap nhat
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Tao truy van SQL de cap nhat admin
        $sql = "UPDATE admin_table SET
        fullname = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        //Xu li truy van
        $res = mysqli_query($conn, $sql);

        if($res == true ){
            $_SESSION['update'] = "<div class='alert alert-success'>
            Admin Updated Successfully
            </div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "<div class='alert alert-warning'>
            Admin Updated Fail
            </div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php
    include('partials/footer.php');
?>