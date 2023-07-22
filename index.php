<?php
  require_once('./home_header.php');
  require_once('./includes/connection.php');

?>

<body>
    <div class="header">
        <!-- navbar -->
        <?php
          require_once('./home_navbar.php')

        ?>
        <!-- end of navbar -->

        <!-- hero -->
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>
                        Give Your Workout <br />
                        A New Style!
                    </h1>
                    <p>
                        Success isn't always about greatness. It's about consistency.
                        Consistent <br />
                        hard work gains success. Greatness will come
                    </p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="./assets/images/image1.png" alt="" />
                </div>
            </div>
        </div>
        <!--end of hero hero -->
    </div>

    <!-- end of header -->

    <!-- featured categories -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <?php
                   $sql = "SELECT * FROM category";
                   $result = mysqli_query($conn, $sql);
                   while($row = mysqli_fetch_assoc($result)){
                       $name = $row['cat_name'];
                       $pic = $row['cat_img'];
 
                       ?> <div class="col-3">
                    <img src="./includes/categorydp/<?=$pic?>" alt="" />
                </div><?php
                }
                ?>

            </div>
        </div>
    </div>
    <!--end of featured categories -->

    <div class="small-container">
        <!-- featured products -->
        <h2 class="title">Featured Products</h2>
        <div class="row">

            <?php 
          $sql = "SELECT * FROM products WHERE pcat = 'shoe'";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $pname = $row['pname'];
            $pprice = $row['pprice'];
            $prating = $row['prating'];
            $pcat = $row['pcat'];
            $pstock = $row['pstock'];
            $descp = $row['descp'];
            $pimage = $row['pimage'];
            $id = $row['id'];
            ?>
            <div class="col-4">
                <form action="./includes/cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?=$id?>">
                    <a href="./product_details.php?id=<?=$id?>&pcat=<?=$pcat?>">
                        <img src="./includes/productImg/<?=$pimage?>" alt="" />
                    </a>
                    <h4>Red Printed Tshirt</h4>
                    <div class="rating">
                        <?php 
                   if ($prating == 5){
                   ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <?php
                   }elseif ($prating==4) {
                         ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                   }elseif ($prating==3) {
                         ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                    }elseif ($prating==2) {
                         ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                    }elseif ($prating==1) {
                         ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                    }else {
                        ?>
                        <p>No review yet</p>

                        <?php
                    }
                   ?>
                    </div>
                    <p>$<?=number_format($pprice,2)?></p>
                    <div class="cart" style="display: flex; align-items: center; margin-top: 20px;">


                        <?php 
                        if ($pstock > 0) {
                            ?>
                        <button name="add_cart" style="border: none;  background-color: transparent"><i
                                class="fa fa-shopping-cart"
                                style="background-color: #ff523b; width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white"></i>
                        </button>

                        <?php
                        }else {
                            ?>
                        <button style="background-color: #f0f0f0; border: none; padding:10px;
                    margin-left: 20px" disabled>Out of Stock</button>

                        <?php
                        }
                        
                        
                        ?>

                    </div>
                </form>

            </div>


            <?php
          }
          
          
          ?>
        </div>
        <!-- end of featured products -->

        <div class="row">

            <?php 
           $sql = "SELECT * FROM products WHERE pcat = 'Shirt'";
           $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
             $pname = $row['pname'];
             $pprice = $row['pprice'];
             $prating = $row['prating'];
             $pcat = $row['pcat'];
             $pstock = $row['pstock'];
             $descp = $row['descp'];
             $pimage = $row['pimage'];
             $id = $row['id'];
             ?>
            <div class="col-4">
                <form action="./includes/cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?=$id?>">
                    <a href="./product_details.php?id=<?=$id?>&pcat=<?=$pcat?>">
                        <img src="./includes/productImg/<?=$pimage?>" alt="" />
                    </a>
                    <h4>Red Printed Tshirt</h4>
                    <div class="rating">
                        <?php 
                    if ($prating == 5){
                    ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <?php
                    }elseif ($prating==4) {
                          ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                    }elseif ($prating==3) {
                          ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                     }elseif ($prating==2) {
                          ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                     }elseif ($prating==1) {
                          ?>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <i class="fa fa-star" style="color: #ccc;"></i>
                        <?php
                     }else {
                         ?>
                        <p>No review yet</p>

                        <?php
                     }
                    ?>
                    </div>
                    <p>$<?=number_format($pprice,2)?></p>
                    <div class="cart" style="display: flex; align-items: center; margin-top: 20px;">


                        <?php 
                         if ($pstock > 0) {
                             ?>
                        <button name="add_cart" style="border: none;  background-color: transparent"><i
                                class="fa fa-shopping-cart"
                                style="background-color: #ff523b; width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: white"></i>
                        </button>

                        <?php
                         }else {
                             ?>
                        <button style="background-color: #f0f0f0; border: none; padding:10px;
                     margin-left: 20px" disabled>Out of Stock</button>

                        <?php
                         }
                         
                         
                         ?>

                    </div>
                </form>

            </div>


            <?php
           }
           
           
           ?>
        </div><!-- latest product section -->
        <h2 class="title">Latest Product</h2>

        <!--end of latest product section -->
    </div>

    <!-- offer section -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img class="offer-img" src="./assets/images/exclusive.png" alt="" />
                </div>
                <div class="col-2">
                    <p>Exclusively Avalable on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart band 4 features a 39.9% larger (than Mi Band 3)
                        AMOLED color full-touch display with adjuestable brightness, so
                        everything is clear as can be</small>
                    <a href="" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!--end of offer section -->

    <!-- testimonial section -->
    <div class="testimonial">
        <div class="small-container">
            <h2 class="title">Testimonials</h2>
            <div class="row">
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam,
                        voluptas maxime? Possimus delectus temporibus voluptatem accusamus
                        qui, maiores impedit ea?.
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                    </div>
                    <img src="./assets/images/user-1.png" alt="" />
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam,
                        voluptas maxime? Possimus delectus temporibus voluptatem accusamus
                        qui, maiores impedit ea?.
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                    </div>
                    <img src="./assets/images/user-2.png" alt="" />
                    <h3>Kelvin James</h3>
                </div>
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam,
                        voluptas maxime? Possimus delectus temporibus voluptatem accusamus
                        qui, maiores impedit ea?.
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                    </div>
                    <img src="./assets/images/user-3.png" alt="" />
                    <h3>Mabel Jeo</h3>
                </div>
            </div>
        </div>
    </div>
    <!--end of testimonial section -->

    <!-- brands -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="./assets/images/logo-godrej.png" />
                </div>
                <div class="col-5">
                    <img src="./assets/images/logo-oppo.png" />
                </div>
                <div class="col-5">
                    <img src="./assets/images/logo-coca-cola.png" />
                </div>
                <div class="col-5">
                    <img src="./assets/images/logo-paypal.png" />
                </div>
                <div class="col-5">
                    <img src="./assets/images/logo-philips.png" />
                </div>
            </div>
        </div>
    </div>
    <!--end of brands -->

    <?php
  require_once('./home_footer.php')
?>


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    <?php 
       if(isset($_SESSION['error'])){
          ?>alertify.set('notifier', 'position', 'top-right');
    alertify.error('<?=$_SESSION['error']?>');
    <?php
          unset($_SESSION['error']);
       }elseif(isset($_SESSION['success'])){
                ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?=$_SESSION['success']?>');
    <?php
        unset($_SESSION['success']);
       }
     ?>
    </script>
</body>

</html>