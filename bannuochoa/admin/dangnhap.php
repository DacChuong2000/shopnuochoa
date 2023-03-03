<?php
    session_start();
    if (isset($_GET['d'])) {
       unset($_SESSION['taikhoan']);
    }
    if(isset($_SESSION['taikhoan'])){
        header("Location: .");
    }
    else{
        if (isset($_POST['dangnhap'])) {
            require('../ketnoi.php');
            $taikhoan = $_POST['taikhoan'];
            $mk = $_POST['matkhau'];
            $str = "SELECT * FROM taikhoan WHERE taikhoan = '".$taikhoan."' AND matkhau = '".$mk."' AND phanquyen ='admin'";
            //echo $str;
            $que = mysqli_query($con,$str);
            if($que){
                if(mysqli_num_rows($que)>0){
                    echo "string";
                    $_SESSION['taikhoan'] = $taikhoan;
                    header("Location: .");
                }else{
                    echo "<script>alert('Thông tin tài khoản hoặc mật khẩu chưa chính xác')</script>";
                }
            }else{
                echo "<script>alert('Kết nối server thất bại')</script>";
            }
        }else{
            
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Đăng Nhập</h1>
                    <p class="auth-subtitle mb-5">Trang dành riêng cho quản trị viên</p>

                    <form method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="taikhoan" class="form-control form-control-xl" placeholder="Tài khoản" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="matkhau" class="form-control form-control-xl" placeholder="Mật khẩu" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        
                        <input class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" name="dangnhap" value="Đăng Nhập">
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>