<?php
require_once ('models/nhanvien.php');
require_once ('models/phanquyen.php');
require_once ('connection.php');
session_start();
unset($_SESSION['active']);
unset($_SESSION['quyen']);
unset($_SESSION['username']);
//$_SESSION['active']="ds";
//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<form method="post" name="login">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <img src="./Assets/img/logo.png" style="width: 90%;height: 90%; margin-top:5%; margin-left: 5%" >
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Xin chào</h1>
                                </div>
                                <form method="post" name="login" class="user">
                                    <div class="form-group">
                                        <input name="user" type="text" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Tài khoản...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Mật khẩu">
                                    </div>

                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Đăng nhập
                                    </button>
                                    <!-- Chèn mã PHP vào đây... -->
                                </form>
                           <?php
if (isset($_POST['login'])){
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    $nhanVien = NhanVien::dangnhap($name, $pass);

    if ($nhanVien) {
       
       $_SESSION['username'] = $name;
       $_SESSION['quyen'] = $nhanVien->Quyen;
       //session id 
         $_SESSION['id'] = $nhanVien->Id;
       header('location:index.php');
    } else {
       echo  "<h2 class='text-center text-danger'>Tài khoản hoặc mật khẩu không đúng</h2>";
    }
}
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</form>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>


