<?php
require_once('./connection.php');
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "DELETE FROM products WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo "<script>alert('product have been deleted successfully')</script>";
        echo "<script>window.location='../viewProducts.php'</script>";
      }else{
        echo "<script>alert('Error deleting product')</script>";
        echo "<script>window.location='../viewProducts.php'</script>";
      }
      
  }
?>