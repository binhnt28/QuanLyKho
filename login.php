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
                            <img src="https://o.vdoc.vn/data/image/2020/09/07/hinh-nen-cute-de-thuong-10.jpg" style="width: 100%;height: 100%">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input name="user" type="text" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password">
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <div class="custom-control custom-checkbox small">-->
<!--                                            <input type="checkbox" class="custom-control-input" id="customCheck">-->
<!--                                            <label class="custom-control-label" for="customCheck">Remember-->
<!--                                                Me</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                           <?php
if (isset($_POST['login'])){
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    $test = NhanVien::dangnhap($name,$pass);
    //$data = array('nhanvien'=>$test);
   //  echo  $test->TaiKhoan;

    if ($test!='') {
        $list3 = [];
        $db3 = DB::getInstance();
        $reg3 = $db3->query('SELECT ds.Id ,nv.TaiKhoan ,q.TenQuyen FROM DanhSachQuyen ds JOIN NhanVien nv JOIN Quyen q ON ds.IdNV = nv.Id AND ds.IdQuyen = q.Id where ds.IdNV='.$test->Id.' AND ds.IdQuyen=1');
        foreach ($reg3->fetchAll() as $item3) {
            $list3[] = new PhanQuyen($item3['Id'], $item3['TaiKhoan'], $item3['TenQuyen']);
        }
        $data3 =array('phanquyen'=> $list3);
        //echo $test->Id;
       // unset($_SESSION['active']);
        //$_SESSION['active']="0";
       $_SESSION['active']=$test->IsActive;
       //echo $_SESSION['active'];
      //  echo "<br>".print_r($test->IsActive);
        //echo "<br>".print_r($test);
           $_SESSION['username'] = $name;
           if (isset($list3[0]->IdQuyen)){
               $_SESSION['quyen'] = "admin";
           }
           else {
               $_SESSION['quyen'] = "nhanvien";
           }
      //   echo "<br>" . $_SESSION['quyen'];
         // $_SESSION['active']=1;
            //echo  print_r($_SESSION['active']);
           header('location:index.php');
    }
    else echo  "<h2 class='text-center text-danger'>Username or Password không đúng</h2>";
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


