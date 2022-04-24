<?php
    include('partials/menu.php');
?>

    <div class="main-content pt-2 pb-2">
        <div class="wrapper">
            <h1 class="text-center">Manage Admin</h1>
            <br><br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['pwd-unmatch'])){
                echo $_SESSION['pwd-unmatch'];
                unset($_SESSION['pwd-unmatch']);
            }

            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
        ?>
        <br>
            <a class="btn btn-primary" href="add-admin.php">Add Admin</a>
            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FULLNAME</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>

                <?php
                    //truy van tat ca du lieu tu bang admin
                    $sql = "SELECT * FROM admin_table";
                    //Thuc thi truy van
                    $res = mysqli_query($conn, $sql);

                    //Kiem tra truy van co duoc thuc thi hay chua
                    if($res==TRUE){
                        //kiem tra xem co du lieu trong bang hay khong
                        $row = mysqli_num_rows($res);   //lay tat ca hang trong bang admin
                        $idTemp = 1;
                        //kiem tra so luong hang
                        if($row > 0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $full_name = $rows['fullname'];
                                $username = $rows['username'];
                                ?>

                                <tr>
                                    <th><?php echo $idTemp++; ?></th>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" >
                                            Change Password
                                        </a>
                                        <a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>">
                                            Update Admin
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>">
                                            Delete Admin
                                        </a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {

                        }
                    }
                ?>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>