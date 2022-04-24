<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../css/admin.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
    include('../config/constants.php')
?>
<body-login>
    <div id="login">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div style="
                                margin-top: 120px;
                                max-width: 900px;
                                height: 520px;
                                border: 1px solid #9C9C9C;
                                background-color: #EAEAEA;
                                " 
                    id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Login</h3>
                            
                            <?php
                                if(isset($_SESSION['login'])){
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                }

                                if(isset($_SESSION['none-login'])){
                                    echo $_SESSION['none-login'];
                                    unset($_SESSION['none-login']);
                                }
                            ?>

                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" placeholder="Enter Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Enter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body-login>

<?php

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password' ";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1){
            $_SESSION['login'] = "<div class='alert alert-success'>Login Success.</div>";
            //kiem tra xem user login hay chua va logout se under session
            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');
        } else {
            $_SESSION['login']  = "<div class='alert alert-warning'>Failed To Login.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>