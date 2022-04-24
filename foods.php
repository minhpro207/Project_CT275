<?php
    include('partials-front/menu.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="slider text-center">

    </section>
    <div class="search-box">
        
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
            $sql2 = "SELECT * FROM food_table WHERE active='Yes'";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0){
                while($row = mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['img'];
                    ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($image_name == ""){
                                        echo "<div class='aler alert-warning'>Image not available.</div>";
                                    } else {
                                        ?>
                                            <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>">
                                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt=" " class="img-responsive img-curve">
                                            </a>
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    <?php
                }
            } else {
                echo "<div class='alert alert-warning'>Food not available.</div>";
            }
        ?>

        <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('partials-front/footer.php');
?>