<?php
require_once('./connection.php');
if(isset($_POST['update'])){
    $pname = isset($_POST['pname']) ? trim($_POST['pname']) : "";
    $pprice = isset($_POST['pprice']) ? trim($_POST['pprice']) : "";
    $pstock = isset($_POST['pstock']) ? trim($_POST['pstock']) : "";
    $descp = isset($_POST['descp']) ? trim($_POST['descp']) : "";
    $prating = isset($_POST['prating']) ? trim($_POST['prating']) : "";
    $pcat = isset($_POST['pcat']) ? trim($_POST['pcat']) : ""; 
     $photo =  $_POST['photo'];
     $id =  $_POST['id'];
     
     if($pname == "" || $pprice == "" || $prating == "" || $pstock == "" || $pcat == "" || $descp == ""){
        $error = urlencode("All Fields are required"); 
        header('location:../updateProduct.php?error='.$error.'&id='.$id);
        exit();
 
    }else{
        if($_FILES['file']['name'] != ''){
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileext = explode('.', $filename);
            $fileactualexe = strtolower(end($fileext));
            
            $allow = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($fileactualexe, $allow)){
                if($filesize < 8000000){
                   $pic = uniqid('', true).'.'.$fileactualexe;
                   $filedestination = 'productImg/'.$pic;
                   if(move_uploaded_file($filetmp, $filedestination)){
                      $sql = "UPDATE `products` SET `pname`='$pname',`pprice`='[$pprice',`prating`='$prating',`pcat`='[$pcat',`pstock`='$pstock',`descp`='$descp',`pimage`='$pic' WHERE `id` = '$id'";
                         $result = mysqli_query($conn, $sql);
                         if($result){
                             unlink('productImg/'.$photo);
                            $success = urlencode("Product updated successfully");
                            header('location:../updateProduct.php?success='.$success.'&id='.$id);
                            exit();
                            }else{
                                $error = urlencode("Error updating product"); 
                                header('location:../updateProduct.php?error='.$error.'&id='.$id);
                                exit();
                            }
                   }else{
                      $error = urlencode("Failed to upload image"); 
                      header('location:../updateProduct.php?error='.$error);
                      exit();
                   }
                   
                }else{
                   $error = urlencode("file is too large"); 
                   header('location:../updateProduct.php?error='.$error);
                   exit();
                }
                
            }else{
             $error = urlencode("Unsupported file format"); 
             header('location:../updateProduct.php?error='.$error);
             exit();
            }
        }else{
            $sql = "UPDATE `products` SET `pname`='$pname',`pprice`='[$pprice',`prating`='$prating',`pcat`='[$pcat',`pstock`='$pstock',`descp`='$descp' WHERE `id` = '$id'";
             $result = mysqli_query($conn, $sql);
             if($result){
                $success = urlencode("Product Updated"); 
                header('location:../updateProduct.php?success='.$success.'&id='.$id);
                exit(); 
             }else{
                 
                 $error = urlencode("Error Updating Product"); 
                 header('location:../updateProduct.php?error='.$error.'&id='.$id);
                 exit(); 
             }
        }
    }
}

?>