<?php
    include('partials/menu.php')
?>
        
        <div class="main-content pt-2 pb-2">
            <div class="wrapper">
                <h1 class="text-center">DASBOARD</h1>
                <br><br>

                <?php
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>

                <br><br>

                <div class="row text-center">
                    <div class="col bg-white gutter">
                        <?php
                            $sql = "SELECT * FROM category_table";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);
                        ?>

                        <h1><?php echo $count; ?></h1>
                        Categories
                    </div>

                    <div class="col bg-white gutter">
                        <?php
                            $sql2 = "SELECT * FROM food_table";

                            $res2 = mysqli_query($conn, $sql2);

                            $count2 = mysqli_num_rows($res2);
                        ?>

                        <h1><?php echo $count2; ?></h1>
                        Items
                    </div>

                    <div class="col bg-white gutter">
                        <?php
                            $sql3 = "SELECT * FROM order_table";

                            $res3 = mysqli_query($conn, $sql3);

                            $count3 = mysqli_num_rows($res3);
                        ?>

                        <h1><?php echo $count3; ?></h1>
                        Total Orders
                    </div>
                    <div class="col bg-white gutter">
                        <?php
                            $sql4 = "SELECT SUM(total) AS Total FROM order_table WHERE status='Delivered'";

                            $res4 = mysqli_query($conn, $sql4);

                            $row4 = mysqli_fetch_assoc($res4);

                            $total_revenue = $row4['Total'];
                        ?>

                        <h1><?php echo $total_revenue; ?>$</h1>
                        Revenue Generated
                    </div>
                </div>
            </div>
        </div>

<?php
    include('partials/footer.php');
?>