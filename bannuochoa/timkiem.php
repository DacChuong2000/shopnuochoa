<?php
    session_start();
?>
<!DOCTYPE html">
<html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Nước Hoa</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="icon/icon.jpg" />
</head>

<body background="image/bg2.jpg" style="background-repeat:repeat;">
    <div class="menutren">
        <ul>
            <li><a class="home" href="index.php"><img src="image/home.png" /></a></li>
            <?php
                if(isset($_SESSION['taikhoan'])){
                    echo "<li><a class='wishlist' href='donhang.php'>Đơn hàng</a></li>";
                    echo "<li><a class='account' href='taikhoan.php'>Tài khoản</a></li>";
                }
            
            ?>
            <li><a class="checkout"href="phuongthucthanhtoan.php">Thông tin Thanh toán</a></li>
            <?php
                if(isset($_SESSION['taikhoan'])){
                    echo "<h4><img src='image/account.png' />&nbsp;<a href='.?l=true'>Đăng xuất</a></h4>";
                }else{
                    echo "<h4><img src='image/account.png' />&nbsp;<a href='dangnhap.php'>Đăng nhập</a> &nbsp;|&nbsp; <a href='dangki.php'>Đăng kí</a></h4>";
                }
            ?>
        </ul>
    </div>
<!--khung bao trang-->
    <div id="baotrang">
<!--Banner-->
        <div id="banner" style="background:url(image/images.jpg)">
            <div class="logo">
                <img src="image/5.png" style="width:130px; height:130px; float:left;" />
                <p>NUOCHOA<span>SHOP<span></p>
            </div>
            
            <iframe src="flash/bnfix.swf" style="width:350px; height:45px; float:right; margin-top:15px; border:#FFF;"></iframe>
            
            <div class="timkiem">
                <table border="0" align="" style="margin-right:5px; margin:0;">
                    <tr>
                        <form method="GET" action="timkiem.php">
                            <td><input type="text" size="30px" name="s" placeholder="Tên sản phẩm, mã sản phẩm,..." style="-moz-border-radius: 10px;-webkit-border-radius: 10px; height:30px; background:#FFF;" required /><td>
                            <td><input type="submit" value="Tìm Kiếm" style="-moz-border-radius: 10px;-webkit-border-radius: 10px; height:30px; background:url(image/linkz_menu.png); color:#CCC; font-weight:bold;" /></td>
                        </form>
                    </tr>
                </table>
            </div>
        </div><!--hết banner-->
<!--menu sp-->
        <div id="menu">
            <ul>
                <?php
                    require('ketnoi.php');
                    $str = "SELECT * FROM nhanhieu";
                    $que = mysqli_query($con,$str);
                    if($que){
                        while ($row = mysqli_fetch_array($que)) {
                            # code...
                            echo "<li><a href='timkiem.php?nhanhieu=".$row['maloai']."'>".$row['tenloai']."</a></li>";
                        }
                    }
                ?>
            </ul>
        </div>
        <div id="khoangtrong">
     
        </div>       
        <div id="cottrai">
            <form method="GET" action="timkiem.php">
                <div id="chon">
                <p style="text-align:center; color:#F60;"> TÙY CHỌN</p>
                <hr />
                <p> <span>Nhãn Hiệu</span> 
                <p><select name="nhanhieu">
                    <?php
                        $str = "SELECT * FROM nhanhieu";
                        $que = mysqli_query($con,$str);
                        if($que){
                            while ($row = mysqli_fetch_array($que)) {
                                echo "<option value='".$row['maloai']."'>".$row['tenloai']."</option>";
                            }
                        }

                    ?>
                    
                </select></p></p>
               
                <p><span>Năm Phát Hành</span>
                <p><select name="namphathanh">
                    <?php
                        $str = "SELECT * FROM sanpham GROUP BY namphathanh ORDER BY namphathanh ASC";
                        $que = mysqli_query($con,$str);
                        if($que){
                            while ($row = mysqli_fetch_array($que)) {
                                echo "<option value='".$row['namphathanh']."'>".$row['namphathanh']."</option>";
                            }
                        }

                    ?>
                </select></p></p>
               
                <p><span>Dung Tích</span>
                <p><select name="dungtich">
                    <?php
                        $str = "SELECT * FROM sanpham GROUP BY dungtich ORDER BY dungtich ASC";
                        $que = mysqli_query($con,$str);
                        if($que){
                            while ($row = mysqli_fetch_array($que)) {
                                echo "<option value='".$row['dungtich']."'>".$row['dungtich']." ml</option>";
                            }
                        }

                    ?>
                </select></p></p>
                
                <p><input type="submit" name='t' value="Tìm Nhanh" /></p>
                </div>
            </form>
            <div id="timtheogia">
            <p style="text-align:center; color:#F60;"> TÌM THEO GIÁ</p>
            <hr />
            <p><a href="timkiem.php?g=true&gia=200" >Từ 10k - 200k</a></p>
            <p><a href="timkiem.php?g=true&gia=500" >Từ 200k - 500k</a></p>
            <p><a href="timkiem.php?g=true&gia=1000" >Từ 500k - 1000k</a></p>
            <p><a href="timkiem.php?g=true&gia=2000" >Từ 1000k - 2000k</a></p>
            <p><a href="timkiem.php?g=true&gia=3000" >Từ 2000k - 3000k</a></p>
            <p><a href="timkiem.php?g=true&gia=4000" >Từ 3000k trở lên</a></p>
            </div>
            <hr />
<!---quảng cáo---------->          
            <div id="quangcao">
                <p>Chát với nick hỗ trợ Viết Kỳ ( giờ hành chính )</p>
                <p>( sáng 8h30 -> 12h30, chiều 2h30 -> 22h )</p>
                <img src="image/online.gif" />
                <img src="image/online.gif" />
                <img src="image/online.gif" />
            </div>
            <hr>
<!----hết QC-----> 

        </div>
<!--Hết cột trái-->

<!--cột phải-->
        <div id="cotphai">
            <div id="moive">
                <?php
                    if(isset($_GET['s'])){
                        $s = $_GET['s'];
                    }else{
                        if (isset($_GET['gia'])) {
                            # code...
                            $gia = $_GET['gia'];
                            $min = 0;
                            $max = 0;
                            switch ($gia) {
                                case '200':
                                    # code...
                                    $max = 200000;
                                    break;
                                
                                case '500':
                                    # code...
                                    $min = 200000;
                                    $max = 500000;
                                    break;
                                case '1000':
                                    # code...
                                    $min = 500000;
                                    $max = 1000000;
                                    break;
                                case '2000':
                                    # code...
                                    $min = 1000000;
                                    $max = 2000000;
                                    break;
                                case '3000':
                                    # code...
                                    $min = 2000000;
                                    $max = 3000000;
                                    break;
                                case '4000':
                                    # code...
                                    $min = 4000000;
                                    break;
                            }

                            $str = "SELECT * FROM sanpham WHERE giagoc-giagoc*giamgia/100>=".$min." AND giagoc-giagoc*giamgia/100 < ".$max;
                            if($min==4000000){
                                $s="theo giá từ 3,000,000 trở lên";
                            }else{
                                $s="theo giá từ ".formatMoney($min)." tới ".formatMoney($max);
                            }
                            
                        }
                        if(isset($_GET['t'])){
                            $s = "nhãn hiệu, năm phát hành, dung tích,..";
                            $nhanhieu =  $_GET['nhanhieu'];
                            $namphathanh = $_GET['namphathanh'];
                            $dungtich = $_GET['dungtich'];
                            $str = "SELECT * FROM sanpham,nhanhieu WHERE sanpham.maloai = nhanhieu.maloai AND nhanhieu.maloai = '".$nhanhieu."' AND sanpham.namphathanh = ".$namphathanh." AND dungtich = ".$dungtich;
                        }
                        if(isset($_GET['nhanhieu'])){
                            $nhanhieu = $_GET['nhanhieu'];
                            $s = "theo nhãn hiệu...";
                        }
                    }
                    echo "<p>Tìm kiếm: ".$s."</p><br><br>";
                    if(isset($_GET['s'])){

                        $str = "SELECT * FROM sanpham WHERE tensanpham LIKE '%".$s."%' OR masanpham LIKE '%".$s."%'";
                    }else{
                        if(!isset($_GET['t'])){
                            if(isset($_GET['nhanhieu'])){
                                $str = "SELECT * FROM sanpham,nhanhieu WHERE sanpham.maloai = nhanhieu.maloai AND nhanhieu.maloai = ".$nhanhieu;
                            }else{
                                if($min==4000000){
                                    $str = "SELECT * FROM sanpham WHERE giagoc - giagoc*giamgia/100 >=3000000";
                                }
                            }
                            
                        }
                        
                    }
                    
                    $que = mysqli_query($con,$str);
                    if($que){
                        $hang = 1;
                        $sanpham = 1;
                        while ($row = mysqli_fetch_array($que)) {
                            if($sanpham == 1){
                                echo "<div id='hang.".$hang."'>";
                            }
                            echo "<div id='sp".$sanpham."'>";
                                echo "<a class='img-zoom' href='thongtinsanpham.php?id=".$row['masanpham']."'>";
                                    echo "<img src='image/nuochoa/".$row['masanpham'].".jpg' border='0'/>";
                                    echo "<span style='color:#FFF;'>";
                                    echo "<img src='image/nuochoa/".$row['masanpham'].".jpg' style='width:350px; height:250px;' />";
                                    echo "<br />";
                                    echo "<i>".$row['mota']."</i>";
                                    echo "</span>";
                                echo "</a>";
                                echo "<dd><a href='thongtinsanpham.php?id=".$row['masanpham']."'>".rutnganten($row['tensanpham'])."</a></dd>";

                                $thanhtien = (int)$row['giagoc'] - (int)$row['giagoc'] * (int)$row['giamgia'] / 100;
                                echo "<span style='color:blue'>".formatMoney($thanhtien)." ₫</span>";
                            echo "</div>";
                            if($sanpham == 1){
                                echo "</div>";
                            }

                            if($sanpham == 3){
                                $sanpham = 1;
                                $hang = 2;
                            }else{
                                $sanpham++;
                            }
                        }
                    }
                                
                ?>
                
        </div>
<!--hết cột phải-->

<!--hết bao trang ---------------------------------->
    </div>
    
    <div id="dautrang">
        <div class="dautrang1">
            <a href="." title="về đầu trang"><img src="image/Up.png" /></a>
        </div>
    </div>
<!---chân website--->
    <div id="footer">
        
        <a href="#" title="yahoo"><img src="image/yahoo.png" /></a>
        <a href="#" title="facebook"><img src="image/facebook.png" /></a>
        <a href="#" title="twitter"><img src="image/twitter.png" /></a>
        <a href="#" title="mail"><img src="image/gmail.png" /></a>
        <a href="#" title="youtube"><img src="image/youtube.png" /></a>
              
        <div class="phan2">
            <a href="#">&nbsp;Chính sách giao hàng&nbsp; |</a>
            <a href="#" target="_blank">&nbsp; Tuyển dụng&nbsp; | </a>
            <a href="thongtinthanhtoan.php">&nbsp; Phương thức thanh toán&nbsp;|</a>
            <a href="#">&nbsp; Yêu cầu&nbsp;|</a>
            <a href="#">&nbsp; Nhận xét sản phẩm&nbsp;|</a>
            <a href="#">&nbsp; Đăng kí theo dõi&nbsp;|</a>
            <a href="#">|&nbsp; Lỗi sản phẩm&nbsp;|</a>
        </div>
        <br />
        <p>©2021 NuocHoaVietKy - Địa chỉ mua nước hoa online với hơn 2000 mặt hàng nước hoa cao cấp. Cung cấp các loại nước hoa hàng hiệu, nước hoa chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp. Tư vấn và giao hàng trên cả nước. Hệ thống nhân viên giao hàng phong phú phục vụ quý khách hài lòng một cách ưng ý . Mang lại cho khách hàng 1 sản phẩm chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp và nhiều nước<br /> 
Add : Đại học Duy Tân - Hotline: 039.377.2222 <br />
info@nuochoavietky.com. Giờ mở cửa: 9h - 21h Thứ hai đến thứ Bảy. Chủ nhật đặt hàng qua điện thoại </p>
                    <p style="color:#F60; font-size:9px; float:right; font-style:italic">Design by : Lê Viết Kỳ</p>

    </div>
<!---hết chân webstie----->    
</body>
</html>
