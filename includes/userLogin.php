<?php
session_start();
require_once('./connection.php');
  if(isset($_POST['login'])){ 
     $email = $_POST['email']; 
     $password = $_POST['password'];  
     $conpassword = $_POST['conpassword'];  
     
     if($email == "" || $password == "" || $conpassword == ""){
        $_SESSION['error'] = "ll fields are required"; 
        header('location: ../userLogin.php');
        exit();
         
     }elseif($password != $conpassword){
        $_SESSION['error'] = "Password mismatch"; 
        header('location: ../userLogin.php');
        exit();
     }
         
     elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid emeail format"; 
        header('location: ../userLogin.php');
        exit();
     }else{
        //  $hashed_password  = md5($password);
        $sql = "SELECT * FROM register WHERE email = '$email' AND password ='$password' ";
        $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       session_start();
       $_SESSION['userId'] = $row['user_id'];

       if(isset($_SESSION['userId'])){
        $_SESSION['success'] = "You have logged in successfully";
        header('location: ../index.php');
        exit();
       }else{
        $_SESSION['error'] = "Email or password is incorrect"; 
        header('location: ../userLogin.php');
        exit();
       }
     }else{
        $_SESSION['error'] = "User Not Found"; 
        header('location: ../userLogin.php');
        exit();
     }
    }
}else{
echo "error";
}

    ?>