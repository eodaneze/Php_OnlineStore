<?php
  require_once('./home_header.php');
  require_once('./includes/connection.php');
  require_once('./home_navbar.php');
   
  if(isset($_SESSION['userId'])){
    $id = $_SESSION['userId'];
    $sql = "SELECT * FROM register WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
  }
?>
<style>
  .checkout-content{
    display: flex;
    /* align-items: center; */
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 40px;
    
}
.checkout-left{
    flex-basis: 68%;
    background-color: white;
    border: 1px solid #ccc;
    padding: 20px;
}
.checkout-right{
    flex-basis: 30%;
    background-color: white;
    border: 1px solid #ccc;
    height: 50vh;
}
.delivery-title{
    display: flex;
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px;
    
}
.delivery-title ul{
    margin-left: 15px;
}
.delivery-title i{
    color: green;
}
.delivery-address{
    display: flex;
    justify-content: space-between;
    padding: 20px 0;
    align-items: center;
}
.delivery-address h5 span{
    display: block;
    line-height: 1.5rem;
    color: #555;
    font-weight: 200px
}
.delivery-address h5 span:first-child{
    font-size: 20px
}
.shipment{
    border: 1px solid #ccc;
    /* padding: 15px 0; */
}
.shipment div{
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.shipment div:last-child{
    margin-bottom: 0px;
}

.shipment div img{
    width: 4rem;
    height: 4rem;
}
.shipment div p{
    margin-left: 10px
}
.checkout-right{
    padding: 15px;
    height: fit-content;
}
.checkout-right h5{
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 15px;
}
.checkout-right div{
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 10px;
}
button{
    background-color: #ff523b;
    padding: 8px;
    width: 100%;
    color: white;
    border: none;
}
</style>
<body >
    <div style='background-color: #f0f0f0;' class="all-checkout">

        <div class="container">
            <div class="checkout-content">
                 <div class="checkout-left">
                     <div class='delivery-title'>
                        <i class="fa-solid fa-circle-check"></i>
                         <ul>
                             <li>1. DELIVERY ADDRESS</li>
                         </ul>
                     </div>
                     <div class="delivery-address">
                         <h5>
                            <span><?=$name?></span>
                            <span><?=$address?> | <?=$phone?></span>
                         </h5>
                         <div>
                             <i class="fa fa-edit"></i>
                         </div>
                     </div>
                    <div>
                        <h5>Shipment 1/1</h5>
                    <div class="shipment">
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
                                                   <div>
                                                        <img src="./includes/productImg/<?=$pimage?>" alt="">
                                                        <p><?=$pname?></p>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    }
                                  }
                           ?>
                        
                     </div>
                    </div>
                 </div>
                 <div class="checkout-right">
                     <h5>Order summary</h5>
                     <div>
                          <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span>Item's total ($count)</span>";
                                }
                          ?>
                       
                         <span><i class="fa fa-naira-sign"></i><?=number_format($total, 2)?></span>
                     </div>
                     <button><span>(<i class="fa fa-naira-sign"></i><?=number_format($total, 2)?>)</span> BUY NOW</button>
                 </div>
            </div>
        </div>
    </div>


    <?php

  require_once('./home_footer.php');
?>
</body>