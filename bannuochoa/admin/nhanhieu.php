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

                        <li class="sidebar-item active">
                            <a href="#" class='sidebar-link'>
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

                        <li class="sidebar-item   ">
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

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Loại Sản Phẩm</h3>
                        </div>
                    </div>
                </div>
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm loại sản phẩm mới</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Tên Loại</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control" name="tenloai" placeholder="Loại sản phẩm" required>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Thêm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <?php
                    require("../ketnoi.php");
                    if(isset($_POST['submit']) && isset($_POST['tenloai'])){
                        $stri = "INSERT INTO nhanhieu VALUES(null,'".$_POST['tenloai']."')";
                        $que = mysqli_query($con,$stri);
                        if($que){
                            echo "<script>alert('Thêm thành công')</script>";
                        }else{
                            echo "<script>alert('Thêm thất bại')</script>";
                        }
                    }
                    else if(isset($_GET['x'])){
                        $x = $_GET['x'];
                        $stri = "DELETE FROM nhanhieu WHERE maloai = ".$x;
                        $que = mysqli_query($con,$stri);
                        if($que){
                            echo "<script>alert('Xóa thành công')</script>";
                        }else{
                            echo "<script>alert('Xóa thất bại')</script>";
                        }
                    }


                ?>

                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Mã Loại</th>
                                        <th>Tên Loại</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $str = "SELECT * FROM nhanhieu";
                                        $que = mysqli_query($con,$str);
                                        if($que){
                                            while ($row = mysqli_fetch_array($que)) {
                                                # code...
                                                echo "<tr>";
                                                    echo "<td>".$row['maloai']."</td>";
                                                    echo "<td>".$row['tenloai']."</td>";
                                                    echo "<td><a href='nhanhieu.php?x=".$row['maloai']."'><button class='badge bg-danger'>Xóa</button></a>";"</td>";
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