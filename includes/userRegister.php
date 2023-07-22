<?php
require_once('./connection.php');
   if(isset($_POST['register'])){
   	  $name = $_POST['name']; 
     $email = $_POST['email']; 
     $address = $_POST['address']; 
     $phone = $_POST['phone']; 
     $password = $_POST['password']; 
     $conpassword = $_POST['conpassword'];


     if($name == "" || $email == "" || $address == "" || $phone== "" || $password == "" || $conpassword == ""){
     	echo "<script>alert('All fields are required')</script>";
            echo "<script>window.location='../userRegister.php'</script>";
            exit();

     }elseif($password !== $conpassword){
     	echo "<script>alert('Password Mismatch')</script>";
            echo "<script>window.location='../userRegister.php'</script>";
            exit();

     }else{
     	$sql = "INSERT INTO register (name, email, phone, address, password)VALUES('$name', '$email', '$phone', '$address', '$password')";

     	$result = mysqli_query($conn, $sql);
     	if($result){
            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.location='../userLogin.php'</script>";
            exit();
     	}else{
             echo "<script>alert('An error occured')</script>";
            echo "<script>window.location='../userRegister.php'</script>";
            exit();
     	}
     }
   }

?>