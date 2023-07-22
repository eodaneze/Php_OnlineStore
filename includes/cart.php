<?php 
session_start();
if (isset($_POST['add_cart'])) {

    $product_id = $_POST['product_id'];
     

    if(isset($_SESSION['userId'])){
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'],
            'product_id');
    
            if (in_array($product_id, $item_array_id)) {
                echo "<script>alert('product already added to cart')</script>";
                echo "<script>window.location='../index.php'</script>";
                exit();
            }else{
    
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $product_id
                );
                $_SESSION['cart'][$count] = $item_array;
                echo "<script>alert('product have been added successfully')</script>";
            echo "<script>window.location='../index.php'</script>";
            // exit();
            }
            
        }else {
            $item_array = array(
                'product_id' => $product_id
            );
            $_SESSION['cart'][0] = $item_array;
            
        
        }
    }else{
        echo "<script>alert('Please Login first ')</script>";
        echo "<script>window.location='../userLogin.php'</script>";
    }
    

}
    

    
if(isset($_POST['remove'])){
     if($_GET['action'] == 'remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($value['product_id'] == $_GET['id']){
                 unset($_SESSION['cart'][$key]);
                 echo "<script>alert('product have been deleted successfully')</script>";
                echo "<script>window.location='../cart.php'</script>";
             }
         }
     }
}

?>