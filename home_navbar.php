<?php
require_once('./includes/connection.php');
 if(isset($_SESSION['userId'])){
      $id = $_SESSION['userId'];
      $sql = "SELECT * FROM register WHERE user_id = '$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $name = $row['name'];
 }
?>
<div class="main-nav">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="./index.php">
                    <img src="./assets/images/logo.png" alt="" width="125px" /></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <!-- this id is needed in js -->
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./product.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li>
                        <?php
                            if(isset($_SESSION['userId'])){
                                ?><a href=""><i class="fa fa-user"></i> <strong>Hi</strong>, <?=$name?></a><?php
                            }else{
                                ?><a href="">Login</a><?php 
                            }
                        ?>
                    </li>
                    <li>
                        <?php
                            if(isset($_SESSION['userId'])){
                                ?><a href="./includes/logout.php">Logout</a><?php
                            }else{
                                echo ""; 
                            }
                        ?>
                    </li>
                </ul>
            </nav>
            <a href="./cart.php"><img src="./assets/images/cart.png" alt="" width="30px" height="30px" />
                <?php 
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                ?> <span class="cart-count"><?=$count?></span><?php
            }else {
                ?> <span class="cart-count">0</span><?php
            }
            
            ?>
            </a>

            <!-- add this after coding the footer -->
            <img src="./assets/images/menu.png" class="menu-icon" onclick="menuToggle()" />
            <!-- <img src="./assets/images/buy-1.jpg" alt="" class="login-check"><span>Daniel</span> -->
        </div>
    </div>
</div>