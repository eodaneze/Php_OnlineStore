<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="all-form">
        <div class="container">
            <div class="row bg-white border p-4 mt-5">
                <div class="col-lg-6">
                    <h4 class="text-center mb-3">Admin Register</h4>
                    <form action="./includes/adminRegister.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Profile picture</label>
                                <input type="file" name="file" class="form-control">
                            </div>

                        </div>
                        <button class="btn btn-secondary" name="register">REGISTER</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h4 class="text-center mb-3">Admin Login</h4>
                    <form action="./includes/adminLogin.php" method="post">
                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="conpassword" class="form-control">
                            </div>


                        </div>
                        <button class="btn btn-secondary" name="login">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>