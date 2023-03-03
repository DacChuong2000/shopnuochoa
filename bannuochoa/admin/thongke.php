<?php
    session_start();
    if(!isset($_SESSION['taikhoan'])){
        header("Location: dangnhap.php");
    }else{
        require('../ketnoi.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="." class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Đơn Hàng</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="nhanhieu.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Nhãn Hiệu</span>
                            </a>
                            
                        </li>

                        <li class="sidebar-item   ">
                            <a href="sanpham.php" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Sản Phẩm</span>
                            </a>
                            
                        </li>

                        <li class="sidebar-item   ">
                            <a href="taikhoan.php" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Tài Khoản</span>
                            </a>
                            
                        </li>
                        <li class="sidebar-item   ">
                            <a href="thongke.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Thống Kê</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="dangnhap.php?d=true" class='sidebar-link'>
                                <i class="bi bi-door-closed-fill"></i>
                                <span>Đăng Xuất</span>
                            </a>
                            
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-content">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Bảng Thống Kê</h3>
                        </div>
                    </div>
                </div>
                
                <!--  Inverse table start -->
                <section class="section">
                    <div class="row" id="table-inverse">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                
                                    <div class="card-content">
                                        <div class="table-responsive">
                                            <table class="table table-dark mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên</th>
                                                        <th>Giá Trị</th>
                                                        <th>Thể Loại</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $str = "SELECT COUNT(id) AS tongdonhang FROM donhang";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>1.1</td>";
                                                                echo "<td>Tổng đơn hàng</td>";
                                                                echo "<td>".$row['tongdonhang']."</td>";
                                                                echo "<td>Đơn hàng</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(id) AS donhang FROM donhang WHERE tinhtrang ='choxacnhan'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>1.2</td>";
                                                                echo "<td>Đơn hàng chờ xác nhận</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Đơn hàng</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(id) AS donhang FROM donhang WHERE tinhtrang ='chuyendi'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>1.3</td>";
                                                                echo "<td>Đơn hàng chuyển đi</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Đơn hàng</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(id) AS donhang FROM donhang WHERE tinhtrang ='tuchoi'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>1.4</td>";
                                                                echo "<td>Đơn hàng từ chối</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Đơn hàng</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT sum(giagoc) AS donhang FROM donhang WHERE tinhtrang ='hoanthanh'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>1.5</td>";
                                                                echo "<td>Danh thu</td>";
                                                                echo "<td>".formatMoney($row['donhang'])." <strike>đ</strike></td>";
                                                                echo "<td>Đơn hàng</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(maloai) AS donhang FROM nhanhieu";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>2.1</td>";
                                                                echo "<td>Tổng nhãn hiệu</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Nhãn hiệu</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(masanpham) AS donhang FROM sanpham";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>3.1</td>";
                                                                echo "<td>Tổng sản phẩm</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Sản phẩm</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(taikhoan) AS donhang FROM taikhoan WHERE phanquyen = 'admin'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>4.1</td>";
                                                                echo "<td>Tài khoản admin</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Tài khoản</td>";
                                                            echo "</tr>";
                                                        }
                                                        //----
                                                        $str = "SELECT COUNT(taikhoan) AS donhang FROM taikhoan WHERE phanquyen = 'nguoidung'";
                                                        $q = mysqli_query($con,$str);
                                                        if($q){
                                                            $row = mysqli_fetch_array($q);
                                                            echo "<tr>";
                                                                echo "<td>4.2</td>";
                                                                echo "<td>Tài khoản người dùng</td>";
                                                                echo "<td>".$row['donhang']."</td>";
                                                                echo "<td>Tài khoản</td>";
                                                            echo "</tr>";
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Inverse table end -->
            </div>

        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>