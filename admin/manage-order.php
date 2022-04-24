<?php
    include('partials/menu.php');
?>

<div class="main-content pt-2 pb-2">
        <div class="wrapper">
            <h1 class="text-center">Manage Order</h1>
            <br><br>

            <?php
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Emai</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <?php
                    $sql = "SELECT * FROM order_table";
                    
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $temp = 1;

                    if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['quantity'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>
                                <tr>
                                    <th><?php echo $temp++; ?></th>
                                    <td><?php echo $food; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>

                                    <td>
                                        <?php
                                            if($status == "Ordered"){
                                                echo "<label>$status</label>";
                                            }
                                            else if($status == "On Deliver"){
                                                echo "<label style='color: blue;'>$status</label>";
                                            }
                                            else if($status == "Delivered"){
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            else if($status == "Cancelled"){
                                                echo "<label style='color: red;'>$status</label>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    <td>
                                        <a class="btn btn-success" href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>">
                                            Update Order
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='12' class='alert alert-warning'>Orders not Available</td></tr>";
                    }
                ?> 

            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>