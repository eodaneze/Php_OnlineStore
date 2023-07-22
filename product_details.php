<?php
require_once('./includes/connection.php');
  require_once('./home_header.php');
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $pname = $row['pname'];
    $pprice = $row['pprice'];
    $prating = $row['prating'];
    $pcat = $row['pcat'];
    $pstock = $row['pstock'];
    $descp = $row['descp'];
    $pimage = $row['pimage'];
   
    
  }
  if (isset($_GET['pcat'])) {
    $getcat = $_GET['pcat'];
  }
 

?>

<body>

    <!-- navbar -->
    <?php
          require_once('./home_navbar.php');
       ?>
    <!-- end of navbar -->


    <!-- end of header -->

    <!-- single product details------ -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="./includes/productImg/<?=$pimage?>" width="100%" id="productImg" />

                <!-- adding small image -->
                <div class="small-img-row">

                    <?php 
                     $sql = "SELECT * FROM products WHERE pcat = '$pcat' LIMIT 4";
                     $result = mysqli_query($conn, $sql);
                     while ($row = mysqli_fetch_assoc($result)){
                        $pimage = $row['pimage'];
                        ?>
                    <div class="small-img-col">
                        <img src="./includes/productImg/<?=$pimage?>" alt="" width="100%" class="small-img" />
                    </div>

                    <?php
                     }

                    
                    ?>
                </div>
                <!--end of adding small image -->
            </div>
            <div class="col-2">
                <p>Home / <?=$pcat?></p>
                <h1><?=$pname?></h1>
                <h4>$<?=number_format($pprice, 2)?></h4>

                <select>
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>Large</option>
                    <option>Medium</option>
                    <option>Small</option>
                </select>

                <input type="number" value="1" />
                <a href="" class="btn">Add To Cart</a>
                <h3>Product Details <i class="fa-solid fa-indent"></i></h3>
                <br />
                <p>
                    <?=$descp?>
                </p>
            </div>
        </div>
    </div>
    <!-- end of single product details------ -->

    <!-- title -->

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Product</h2>
            <p>View More</p>
        </div>
    </div>
    <!-- end of  title -->
    <div class="small-container">
        <div class="row">

            <?php 
           $sql = "SELECT * FROM products WHERE pcat = '$getcat'";
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
                <form action="">
                    <a href="./product_details.php?id=<?=$id?>&pcat=<?=$pcat?>" target="_blank">
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
                        <button style="border: none;  background-color: transparent"><i class="fa fa-shopping-cart"
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
    </div>
    <?php
  require_once('./home_footer.php')
 ?>

</body>

</html>