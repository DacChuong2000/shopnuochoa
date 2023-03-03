<?php
    session_start();
    if(!isset($_SESSION['taikhoan'])){
        header("Location: dangnhap.php");
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
                            <h3>Bảng Tài Khoản</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Tài khoản</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Họ tên</th>
                                        <th>Phân Quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require("../ketnoi.php");
                                        $str = "SELECT * FROM taikhoan,phanquyen WHERE taikhoan.phanquyen = phanquyen.id";
                                        $que = mysqli_query($con,$str);
                                        if($que){
                                            while ($row = mysqli_fetch_array($que)) {
                                                # code...
                                                echo "<tr>";
                                                    echo "<td>".$row['taikhoan']."</td>";
                                                    echo "<td>".$row['sdt']."</td>";
                                                    echo "<td>".$row['diachi']."</td>";
                                                    echo "<td>".$row['hoten']."</td>";
                                                    echo "<td>".$row['tenphanquyen']."</td>";
                                                    
                                                echo "</tr>";
                                            }
                                        }

                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
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