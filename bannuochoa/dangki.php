<?php
    session_start();
    if(isset($_SESSION['taikhoan'])){
        header("Location: .");
        die();
    }
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
                <p>Chát với nick hỗ trợ Thanh Bình ( giờ hành chính )</p>
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
            <form id="dk" name="form" method="post">
                <table  border="0" align="center" cellpadding="6" cellspacing="19" style="margin-left:150px;" >
                    <tr>
                        <td></td>
                        <td><h2> Đăng kí </h2></td>
                    </tr>
                    <tr>
                        <td >Tên đăng nhập : </td>
                        <td><label>
                        <input name="username" type="text" id="txthovaten" style="height:40px; width:240px" required />
                        </label></td>
                    </tr>
                    <tr>
                        <td >Mật khẩu : </td>
                        <td ><label>
                        <input name="mk" type="password" id="mk" style="height:40px; width:240px" required/>
                        </label></td>
                    </tr>
                    <tr>
                        <td>Họ và tên:</td>
                        <td><input name="hoten" type="text" id="txtdiachi" style="height:40px; width:240px" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Điện thoại : </td>
                        <td><input name="sdt" type="text" id="txtdienthoai" style="height:40px; width:240px" required/>
                           </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ : </td>
                        <td>
                        <textarea name="diachi" cols="20" rows="5" id="textnoidung" style="margin: 2px; width: 234px; height: 94px;" required></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><label>
                        <input name="btguitongtin" type="submit" id="btguitongtin" value=" Đăng kí " onclick="return check_form()" />
                        <input name="btxoadangki" type="reset" id="btxoadangki" value=" Làm lại " />
                        </label></td>
                    </tr>
                </table>

			</form>
            
            
        </div>
<!--hết cột phải-->

    <?php
        require("ketnoi.php");
        if(isset($_POST["btguitongtin"])){
            $user = $_POST["username"];
            $mk = $_POST["mk"];
            $hoten = $_POST["hoten"];
            $sdt = $_POST["sdt"];
            $diachi = $_POST["diachi"];
            $str = "INSERT INTO taikhoan VALUES('".$user."','".$mk."','".$sdt."','".$diachi."','".$hoten."','nguoidung')";
            $qu = mysqli_query($con,$str);
            if($qu){
                $_SESSION['taikhoan'] = $user;
                
            }

        }
    ?>
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
        <p>©2021 NuocHoaThanhBinh - địa chỉ mua nước hoa online với hơn 2000 mặt hàng nước hoa cao cấp. Cung cấp các loại nước hoa hàng hiệu, nước hoa chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp. Tư vấn và giao hàng trên cả nước. Hệ thống nhân viên giao hàng phong phú phục vụ quý khách hài lòng một cách ưng ý . Mang lại cho khách hàng 1 sản phẩm chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp và nhiều nước<br /> 
Add : Đại học sư phạm kỹ thuật Vĩnh Long - Hotline: 096 xxx xxxx - 097 xxx xxxx <br />
info@nuochoathanhbinh.com. Giờ mở cửa: 9h - 21h Thứ hai đến thứ Bảy. Chủ nhật đặt hàng qua điện thoại </p>
                    <p style="color:#F60; font-size:9px; float:right; font-style:italic">Design by : Tạ Thanh Bình</p>

    </div>
<!---hết chân webstie----->    
</body>
</html>
