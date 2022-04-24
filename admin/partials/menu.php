<?php
    include('../config/constants.php');
    include('login-check.php');
?>

<?php
    //kiem tra user login hay chua

?>

<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu start -->
        <div class="menu">
            <div class="wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="index.php">Home</a>
                            <a class="nav-link" href="manage-admin.php">Admin</a>
                            <a class="nav-link" href="manage-category.php">Category</a>
                            <a class="nav-link" href="manage-food.php">Food</a>
                            <a class="nav-link" href="manage-order.php">Order</a>
                            <a style="color: red;" class="nav-link" href="logout.php">Logout</a>
                        </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>  
        <!-- Menu end -->