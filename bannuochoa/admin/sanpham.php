<?php
    session_start();
    $check = true;
    if(!isset($_SESSION['taikhoan'])){
        header("Location: dangnhap.php");
    }else{
        require("../ketnoi.php");
        if(isset($_GET['tt']) && isset($_GET['data'])){
            $tt = $_GET['tt'];
            $data = $_GET['data'];
            switch ($tt) {
                case 'x':
                    $check = true;
                    break;
                
                case 's':
                    $check = false;
                    break;
            }
            if($check){
                $str = "DELETE FROM sanpham WHERE masanpham = '".$data."'";
                $que = mysqli_query($con,$str);
                if($que){
                    echo "<script>alert('Xóa thành công')</script>";
                }else{
                    echo "<script>alert('Xóa thất bại')</script>";
                }  
            }
            
        }
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

                        <li class="sidebar-item active">
                            <a href="#" class='sidebar-link'>
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
                            <h3>Sản Phẩm</h3>
                        </div>
                    </div>
                </div>
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm sản phẩm</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Mã sản phẩm</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                $strs = "SELECT * FROM sanpham WHERE masanpham = '".$data."'";
                                                                $qq = mysqli_query($con,$strs);
                                                                if ($qq) {

                                                                    $rows = mysqli_fetch_array($qq);
                                                                    echo "<input type='text' id='first-name' class='form-control' value='".$rows['masanpham']."' required disabled>";
                                                                    echo "<input type='hidden' value='".$rows['masanpham']."' name='masanpham' required>";
                                                                }
                                                            }else{
                                                                $permitted_chars = 'ABCDEFGHIJKLMNOPQRETUVWXYZ';
                                                                $masanpham = substr(str_shuffle($permitted_chars), 0, 10);

                                                                echo "<input type='text' id='first-name' class='form-control' value='".$masanpham."' required disabled>";
                                                                echo "<input type='hidden' value='".$masanpham."' name='masanpham' required>";
                                                            }
                                                            
                                                        ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên sản phẩm</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<input type='text' id='first-name' value='".$rows['tensanpham']."' class='form-control' name='tensanpham' placeholder='Tên sản phẩm' required>";
                                                            }else{
                                                                echo "<input type='text' id='first-name' class='form-control' name='tensanpham' placeholder='Tên sản phẩm' required>";
                                                            }
                                                            
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Giá gốc</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<input type='number' id='email-id' value='".$rows['giagoc']."' class='form-control' name='giagoc' placeholder='1000 đ' required>";
                                                            }else{
                                                                echo "<input type='number' id='email-id' class='form-control' name='giagoc' placeholder='1000 đ' required>";
                                                            }
                                                            
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Dung tích</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<input type='number' id='email-id' value='".$rows['dungtich']."' class='form-control' name='dungtich' placeholder='1000 ml' required>";
                                                            }else{
                                                                echo "<input type='number' id='email-id' class='form-control' name='dungtich' placeholder='1000 ml' required>";
                                                            }
                                                            
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Năm phát hành</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<input type='number' id='email-id' value='".$rows['namphathanh']."' class='form-control' name='namphathanh' placeholder='2021' required>";
                                                            }else{
                                                                echo "<input type='number' id='email-id' class='form-control' name='namphathanh' placeholder='2021' required>";
                                                            }
                                                            
                                                        ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Khuyến mãi</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<input type='number' id='email-id' value='".$rows['giamgia']."' class='form-control' name='khuyenmai' placeholder='-20%' required>";
                                                            }else{
                                                                echo "<input type='number' id='email-id' class='form-control' name='khuyenmai' placeholder='-20%' required>";
                                                            }
                                                            
                                                        ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mô tả</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if(!$check){
                                                                echo "<textarea class='form-control' id='exampleFormControlTextarea1' name='mota' rows='5' required >".$rows['mota']."</textarea>";
                                                            }else{
                                                                echo "<textarea class='form-control' id='exampleFormControlTextarea1' name='mota' rows='5' placeholder='Mô tả sản phẩm' required ></textarea>";
                                                            }
                                                            
                                                        ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nhãn Hiệu</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                            <select name="loaisanpham" class="choices form-select">

                                                                <?php
                                                                    if (!$check) {
                                                                        $str = "SELECT * FROM nhanhieu WHERE maloai = ".$rows['maloai'];
                                                                    }else{
                                                                        $str = "SELECT * FROM nhanhieu";
                                                                    }
                                                                    $que = mysqli_query($con,$str);
                                                                    if($que){
                                                                        while ($row = mysqli_fetch_array($que)) {
                                                                            echo "<option value='".$row['maloai']."'>".$row['tenloai']."</option>";
                                                                        }
                                                                    }

                                                                ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Số lượng</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <?php
                                                            if (!$check) {
                                                                echo "<input type='number' id='contact-info' class='form-control'
                                                                name='soluong' min='0' value='".$rows['soluong']."' required>";
                                                            }else{
                                                                echo "<input type='number' id='contact-info' class='form-control'
                                                                name='soluong' min='1' placeholder='1' value='1' required>";
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <?php
                                                            if(!$check){
                                                                echo "<button type='submit' name='sua' class='badge bg-warning'>Cập nhật</button>";
                                                            }
                                                            else{
                                                               echo "<button type='submit' name='thêm' class='btn btn-primary me-1 mb-1'>Thêm</button>";
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <?php
                    if(isset($_POST["them"])){
                        $masanpham = $_POST['masanpham'];
                        $tensanpham = $_POST['tensanpham'];
                        $giagoc = $_POST['giagoc'];
                        $khuyenmai = $_POST['khuyenmai'];
                        $mota = $_POST['mota'];
                        $loaisanpham = $_POST['loaisanpham'];
                        $dungtich = $_POST['dungtich'];
                        $namphathanh = $_POST['namphathanh'];
                        $soluong = $_POST['soluong'];
                        $str = "INSERT INTO sanpham VALUES('".$masanpham."','".$tensanpham."',".$giagoc.",".$khuyenmai.",'".$mota."',".$loaisanpham.",".$soluong.",".$dungtich.",".$namphathanh.")";
                        $quee = mysqli_query($con,$str);
                        if($quee){
                            echo "<script>alert('Thêm thành công')</script>";
                        }else{
                            echo "<script>alert('Thêm thất bại')</script>";
                        }       
                    }else if(isset($_POST["sua"])){
                        $masanpham = $_POST['masanpham'];
                        $tensanpham = $_POST['tensanpham'];
                        $giagoc = $_POST['giagoc'];
                        $khuyenmai = $_POST['khuyenmai'];
                        $mota = $_POST['mota'];
                        $loaisanpham = $_POST['loaisanpham'];
                        $dungtich = $_POST['dungtich'];
                        $namphathanh = $_POST['namphathanh'];
                        $soluong = $_POST['soluong'];
                        $str = "UPDATE sanpham SET tensanpham = '".$tensanpham."',giagoc = ".$giagoc.",giamgia = ".$khuyenmai.",mota = '".$mota."',soluong = ".$soluong.",dungtich = ".$dungtich.",namphathanh = ".$namphathanh." WHERE masanpham = '".$masanpham."'";
                        $quee = mysqli_query($con,$str);
                        if($quee){
                            echo "<script>alert('Cập nhật thành công')</script>";
                        }else{
                            echo "<script>alert('Cập nhật thất bại')</script>";
                        }
                    }
                ?>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá Góc</th>
                                        <th>Giảm Giá</th>
                                        <th>Mô Tả</th>
                                        <th>Số Lượng</th>
                                        <th>Nhãn Hiệu</th>
                                        <th>Dung Tích</th>
                                        <th>Năm Phát Hành</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $str = "SELECT * FROM nhanhieu,sanpham WHERE nhanhieu.maloai = sanpham.maloai";
                                        $que = mysqli_query($con,$str);
                                        if($que){
                                            while ($row = mysqli_fetch_array($que)) {
                                                # code...
                                                echo "<tr>";
                                                    echo "<td><img src='../image/nuochoa/".$row['masanpham'].".jpg' style='width: 150px; height: 150px;' /></td>";
                                                    echo "<td>".$row['masanpham']."</td>";
                                                    echo "<td>".$row['tensanpham']."</td>";
                                                    echo "<td>".$row['giagoc']."</td>";
                                                    echo "<td>-".$row['giamgia']."%</td>";
                                                    echo "<td>".$row['mota']."</td>";
                                                    echo "<td>".$row['soluong']."</td>";
                                                    echo "<td>".$row['tenloai']."</td>";
                                                    echo "<td>".$row['dungtich']."</td>";
                                                    echo "<td>".$row['namphathanh']."</td>";
                                                    echo "<td>
                                                    <a href='sanpham.php?tt=x&data=".$row['masanpham']."'>
                                                        <button class='badge bg-danger'>Xóa</button>
                                                    </a>
                                                    <br><br>
                                                    <a href='sanpham.php?tt=s&data=".$row['masanpham']."'>
                                                        <button class='badge bg-warning'>Sửa</Button>
                                                    </a></td>";
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