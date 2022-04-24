<?php
    include('partials/menu.php');
?>

<div class="main-content pt-2 pb-2">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br><br>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <form action="" method="POST">
                <table class="table table-sm">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Name">
                        </td>
                    </tr>

                    <tr>
                        <td>User Name: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter User Name">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input class="btn-sm btn-primary" type="submit" name="submit" value="Add">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
    </div>

<?php
    include('partials/footer.php');
?>

<?php
    //Xử lý dữ liệu từ form và lưu vào database

    //Kiểm tra xem nút đã được bấm chưa
    if(isset($_POST['submit'])){

        //1.Lay data tu form
        //$_POST['name'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2.Truy van SQL de save data vao database
        $sql = "INSERT INTO admin_table SET
                fullname = '$full_name',
                username = '$username',
                password = '$password'
        ";

        //3.Truy van va luu vao data base
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4.Kiem tra xem du lieu co duoc insert hay chua va hien thong bao
        if($res == TRUE){
            // echo "Data Inserted";
            $_SESSION['add'] = "<div class='alert alert-success'>
            Admin Added Successfully
            </div>";
            //Dieu huong page toi trang quan ly admin
            header("location:".SITEURL.'admin/manage-admin.php');
        } else {
            // echo "fail";
            $_SESSION['add'] = "<div class='alert alert-warning'>
            Admin Added Failed
            </div>";
            //Dieu huong page toi trang add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    } else {
        
    }
?>