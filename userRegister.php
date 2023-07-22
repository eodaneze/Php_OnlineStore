<?php
  require_once('./header.php');
  require_once('./includes/connection.php');

?>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #ff523b">
    <div class='all-register bg-white p-4 border w-50 shadow'> 
    	  <h5 class="text-center mb-3">User Registration</h5>
    	 <div class='container'>
    	 	  <form  action="./includes/userRegister.php" method="post">
    	 	  	    <div class="row">
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>FullName</label>
    	 	 	  	   <input type="text" name="name" class="form-control">
    	 	 	  </div>
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>Email</label>
    	 	 	  	   <input type="email" name="email" class="form-control">
    	 	 	  </div>
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>Address</label>
    	 	 	  	   <input type="text" name="address" class="form-control">
    	 	 	  </div>
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>Phone Number</label>
    	 	 	  	   <input type="text" name="phone" class="form-control">
    	 	 	  </div>
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>Password</label>
    	 	 	  	   <input type="password" name="password" class="form-control">
    	 	 	  </div>
    	 	 	  <div class="col-lg-6 mb-3">
    	 	 	  	   <label>Confirm Passowrd</label>
    	 	 	  	   <input type="password" name="conpassword" class="form-control">
    	 	 	  </div>
    	 	 </div>
    	 	 <button class="btn text-white" style="background-color: #ff523b" name="register">Register</button>  
    	 	  </form>
    	 </div>
    </div>
</body>
</html>