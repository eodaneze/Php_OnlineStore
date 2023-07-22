<?php
require_once('./connection.php');
  if(isset($_POST['add'])){
    $pname = isset($_POST['pname']) ? trim($_POST['pname']) : "";
    $pprice = isset($_POST['pprice']) ? trim($_POST['pprice']) : "";
    $pstock = isset($_POST['pstock']) ? trim($_POST['pstock']) : "";
    $descp = isset($_POST['descp']) ? trim($_POST['descp']) : "";
    $prating = isset($_POST['prating']) ? trim($_POST['prating']) : "";
    $pcat = isset($_POST['pcat']) ? trim($_POST['pcat']) : ""; 
     
     if($pname == "" || $pprice == "" || $prating == "" || $pstock == "" || $pcat == "" || $descp == ""){
         $error = urlencode("All Fields are required"); 
         header('location: ../addProduct.php?error='.$error);
         exit();
     }else{
        $pname = trimData($pname);
        $pprice = trimData($pprice);
        $pstock = trimData($pstock);
        $descp = trimData($descp);
        $prating = trimData($prating);
        $pcat = trimData($pcat);
     }
         
         if($_FILES['file']['name'] != ''){
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileext = explode('.', $filename);
            $fileactualext = strtolower(end($fileext));

            $allow = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($fileactualext, $allow)){
                if($filesize < 8000000){
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $filedestination = 'productImg/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                        $sql = "INSERT INTO `products`(`pname`, `pprice`, `prating`, `pcat`, `pstock`, `descp`, `pimage`) VALUES ('$pname','$pprice','$prating','$pcat','$pstock','$descp','$pic')";
                        $result = mysqli_query( $conn, $sql);
                          if($result){
                            $success = urlencode("Product Added successfully"); 
                            header('location: ../addProduct.php?success='.$success);
                            exit();
                           }else{
                              $error = urlencode("error adding product");
                               header('location: ../addProduct.php?error='.$error);
                                 exit();
                           }
                    }else{
                        $error = urlencode("error Uploading Picture");
                        header('location: ../addProduct.php?error='.$error);
                        exit();
                    }
                }else{
                    $error = urlencode("Unsupported file format");
                    header('location: ../addProduct.php?error='.$error);
                     exit();
                }
            }else{
                $error = urlencode("Please upload a picture");
                header('location: ../addProduct.php?error='.$error);
                exit();
            }
         }
  
}

function trimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
}
?>