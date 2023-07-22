<?php
require_once('./connection.php');
  if(isset($_POST['register'])){
     $name = $_POST['name']; 
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     
     $sql2 = "SELECT * FROM admin WHERE email = '$email'";
     $result2 = mysqli_query($conn, $sql2);
     
     if($name == "" || $email == "" || $password == ""){
         $error = urlencode("All Fields are required"); 
         header('location: ../adminRegister.php?error='.$error);
         exit();
     }
     elseif(mysqli_num_rows($result2) > 0){
        $error = urlencode("Email Already Exist"); 
         header('location: ../adminRegister.php?error='.$error);
         exit();
     }
     elseif(strlen($password) < 8){
        $error = urlencode("Password Must be 8 in length"); 
        header('location: ../adminRegister.php?error='.$error);
        exit();
     }
     elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
       $error = urlencode("Invalid Email Format"); 
        header('location: ../adminRegister.php?error='.$error);
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
                    $filedestination = 'admindp/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                         $sql = "INSERT INTO admin(name, email, password, pic)VALUES('$name', '$email', '$password', '$pic')";
                          $result = mysqli_query($conn, $sql);
                          if($result){
                            $success = urlencode("Your Registration was successful!!"); 
                            header('location: ../adminRegister.php?success='.$success);
                            exit();
                           }else{
                              $error = urlencode("error creating admin");
                               header('location: ../adminRegister.php?error='.$error);
                                 exit();
                           }
                    }else{
                        $error = urlencode("error Uploading Picture");
                        header('location: ../adminRegister.php?error='.$error);
                        exit();
                    }
                }else{
                    $error = urlencode("Unsupported file format");
                    header('location: ../adminRegister.php?error='.$error);
                     exit();
                }
            }else{
                $error = urlencode("Please upload a picture");
                header('location: ../adminRegister.php?error='.$error);
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
        header('location: ../adminRegister.php?success='.$success);
        exit();
    }else{
          $error = urlencode("Failed To Register User"); 
        header('location: ../adminRegister.php?error='.$error);
        exit();
    }
   } -->