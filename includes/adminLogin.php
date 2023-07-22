<?php
    require_once('./connection.php');
  if(isset($_POST['login'])){
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     $conpassword = $_POST['conpassword']; 
     
     if($email == "" || $password == ""){
         $error = urlencode("All Fields are required"); 
         header('location: ../adminRegister.php?error='.$error);
         exit();
     }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
       $error = urlencode("Invalid Email Format"); 
        header('location: ../adminRegister.php?error='.$error);
        exit();
     }elseif($password !== $conpassword){
        $error = urlencode("Password mismatch"); 
        header('location: ../adminRegister.php?error='.$error);
        exit();
     }
     else{
        // $new_password = md5($password);
       $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);
         session_start();
         $_SESSION['adminId'] = $row['id'];

         if(isset($_SESSION['adminId'])){
            $success = urlencode("Welcome to dashboard");
           header('location: ../adminPanel.php?success='.$success);
           exit();
         }else{
             $error = urlencode("Email or password is incorrect"); 
            header('location: ../adminRegister.php?error='.$error);
            exit();
         }
       }else{
        $error = urlencode("User not found"); 
        header('location: ../adminRegister.php?error='.$error);
        exit();
       }
   }
}

 ?>