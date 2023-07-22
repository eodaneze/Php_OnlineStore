<?php
 require_once('./home_header.php');
 require_once('./includes/connection.php');

?>

<body>
    <div class="container">
        <!-- navbar -->
        <?php
           require_once('./home_navbar.php')
         ?>
        <!-- end of navbar -->
    </div>

    <!-- end of header -->

    <!-- cart-item-details -->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
                 $total = 0;
                     if(isset($_SESSION['cart'])){
                         $product_id = array_column($_SESSION['cart'], 'product_id');
                         $sql = "SELECT * FROM products";

                         $result = mysqli_query($conn, $sql);

                         while($row = mysqli_fetch_assoc($result)){
                              foreach($product_id as $id){
                                  if($row['id'] == $id){
                                    $pimage = $row['pimage'];
                                    $pname = $row['pname'];
                                    $pprice = $row['pprice'];
                                    $total += $row['pprice'];

                                    ?>


            <tr>
                <form method="post" action="./includes/cart.php?action=remove&id=<?=$id?>">
                    <td>
                        <div class="cart-info">
                            <img src="./includes/productImg/<?=$pimage?>" alt="" />
                            <div>
                                <p><?=$pname?></p>
                                <small>Price: $<?=number_format($pprice, 2)?></small><br />
                                <button name="remove" style="background-color: transparent; border: none"><i
                                        class="fa fa-trash" style="color: red"></i></button>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" value="1" /></td>
                    <td>$<?=number_format($pprice, 2)?></td>
                </form>
            </tr>
            <?php
;                                  }
                              }
                         }
                     }else{
                         echo "Cart is empty";
                         die();
                     }

                ?>


        </table>

        <!-- total price -->
        <div class="total-price">
            <table>

                <tr>
                    <td>Total</td>
                    <td>$<?=number_format($total, 2)?></td>
                </tr>
            </table>

        </div>
        <div class="checkout" style="text-align: right;">
            <button class="btn" style="border: none;"><a href="./checkout.php"
                    style="color: white;">Checkout</a></button>
        </div>
    </div>
    <!-- end of cart-item-details -->

    <?php
     require_once('./home_footer.php')

?>
</body>

</html>