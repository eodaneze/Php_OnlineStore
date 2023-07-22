<?php
require_once('./connection.php');
  if(isset($_POST['add'])){
     $name = $_POST['name'];  
     
     if($name == ""){
         $error = urlencode("All Fields are required"); 
         header('location: ../addCategory.php?error='.$error);
         exit();
     }else{
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
                    $filedestination = 'categorydp/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                         $sql = "INSERT INTO category(cat_name, cat_img)VALUES('$name', '$pic')";
                          $result = mysqli_query($conn, $sql);
                          if($result){
                            $success = urlencode("Category Added successfully"); 
                            header('location: ../addCategory.php?success='.$success);
                            exit();
                           }else{
                              $error = urlencode("error adding category");
                               header('location: ../addCategory.php?error='.$error);
                                 exit();
                           }
                    }else{
                        $error = urlencode("error Uploading Picture");
                        header('location: ../addCategory.php?error='.$error);
                        exit();
                    }
                }else{
                    $error = urlencode("Unsupported file format");
                    header('location: ../addCategory.php?error='.$error);
                     exit();
                }
            }else{
                $error = urlencode("Please upload a picture");
                header('location: ../addCategory.php?error='.$error);
                exit();
            }
         }
     }
}

?>




<!-- else{
       $sql = "INSERT INTO register(name, email, password)VALUES('$name', '$email', '$password')";
       $result = mysqli_query($conn, $sql);
    if($result){
        $success = urlencode("Your Registration was successful!!"); 
        header('location: ../addCategory.php?success='.$success);
        exit();
    }else{
          $error = urlencode("Failed To Register User"); 
        header('location: ../addCategory.php?error='.$error);
        exit();
    }
   } -->