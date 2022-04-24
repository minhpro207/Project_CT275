<?php
    include('partials-front/menu.php');
?>

<?php
    if(isset($_GET['category_id'])){
        //set category id
        $category_id = $_GET['category_id'];
        //get category title base on category id
        $sql = "SELECT title FROM category_table WHERE id = $category_id";

        $res = mysqli_query($conn, $sql);

        //Get the value form Database
        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];
    } else {
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" >"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM food_table WHERE category_id=$category_id";
                
                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0){
                    while($row2 = mysqli_fetch_assoc($res2)){
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['img'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name == ""){
                                            echo "<div class='alert alert-warning'>Image not available.</div>";
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
                                    <h4><?php echo $title; ?></h4>
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
                    echo "<div class='text-center'> Food not Available. </div>";
                }
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('partials-front/footer.php');
?>