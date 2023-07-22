<?php
  require_once('./header.php');
  require_once('./includes/connection.php');

?>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #ff523b">
    <div class='all-register bg-white p-4 border w-50 shadow'>
        <h5 class="text-center mb-3">User Login</h5>
        <div class='container'>
            <form action="./includes/userLogin.php" method="post">
                <div class="row">

                    <div class="col-lg-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>


                    <div class="col-lg-6 mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label>Confirm Passowrd</label>
                        <input type="password" name="conpassword" class="form-control">
                    </div>
                </div>
                <button class="btn text-white" style="background-color: #ff523b" name="login">Login</button>
            </form>
        </div>
    </div>



    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    <?php 
       if(isset($_SESSION['error'])){
          ?>alertify.set('notifier', 'position', 'top-right');
    alertify.error('<?=$_SESSION['error']?>');
    <?php
          unset($_SESSION['error']);
       }elseif(isset($_SESSION['success'])){
                ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?=$_SESSION['success']?>');
    <?php
        unset($_SESSION['success']);
       }
     ?>
    </script>
</body>

</html>