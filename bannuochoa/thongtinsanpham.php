<?php
    session_start();
    require("ketnoi.php");
    if(!isset($_SESSION['taikhoan'])){
        header("Location: dangnhap.php");
        die();
    }else{
        if(isset($_POST['muahang'])){
            $masanpham = $_GET['id'];
            $soluong = $_POST['soluong'];
            $taikhoan = $_SESSION['taikhoan'];
            $giatien = $_POST['giatien'];
            $str = "INSERT INTO donhang VALUES(null,'".$masanpham."',".$giatien.",".$soluong.",'choxacnhan','".date('d/m/Y')."','".$taikhoan."')";
            $quer = mysqli_query($con,$str);
            if ($quer) {
                # code...
                $s = "UPDATE sanpham SET soluong = soluong - ".$soluong." WHERE sanpham.masanpham = '".$masanpham."'";
                $q = mysqli_query($con,$s);
                header("Location: phuongthucthanhtoan.php");
            }else{
                echo "<script>alert('Mua hàng thất bại')</script>";
            }
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Nước Hoa</title>
<link rel="stylesheet" type="text/css" href="css/banchay1.css" />
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

        	<div id="sanpham" style="height: 500px">
                <?php
                    $id = $_GET['id'];
                    $str = "SELECT * FROM sanpham,nhanhieu WHERE sanpham.maloai = nhanhieu.maloai AND masanpham = '".$id."'";
                    $que = mysqli_query($con,$str);
                    if($que){
                        $row = mysqli_fetch_array($que);
                        echo "<h2>".$row['tensanpham']."</h2>";
                    }
                ?>
                
                <div class="anh">
                    <?php
                	   echo "<img src='image/nuochoa/".$row['masanpham'].".jpg' style='widows: '' />";
                    ?>
                </div>
                <div class="thongtin" style="height: 400px">
                	<div class="mua">	
                        <?php
                            echo "<form method='POST' action='thongtinsanpham.php?id=".$id."'>";
                        ?>
    						<table border="0" align="center"  cellpadding="5px" cellspacing="5px" style="margin: 0 auto;">
                            	<tr>
                                	<td style="text-align:right;">Giá tiền:</td>
                                    <?php
                                        $thanhtien = (int)$row['giagoc'] - (int)$row['giagoc'] * (int)$row['giamgia'] / 100;
                                        echo "<input value='".$thanhtien."' name='giatien' type='hidden' />";
                                        echo "<td style='text-align:right; color:#03F; font-weight:bold;'>".formatMoney($thanhtien)." ₫</td>";
                                    ?>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">Mã sản phẩm:</td>
                                    <?php
                                        echo "<td style='text-align:right; color:red;'>".$id."</td>";
                                    ?>
                                </tr>
                                <tr>
                                	<td style="text-align:right;">Dung tích:</td>
                                    <td style="text-align:center;">
                                        <?php
                                            echo $row['dungtich']." ml";
                                        ?>
                                     </td>
                                </tr>
                                <tr>
                                	<td style="text-align:right;">Năm phát hành:</td>
                                    <td style="text-align:center;">
                                        <?php
                                            echo $row['namphathanh'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td style="text-align:right;">Nhãn hiệu:</td>
                                    <td style="text-align:center;">
                                        <?php
                                            echo $row['tenloai'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td style="text-align:right;">Số lượng:</td>
                                    <?php
                                        if((int)$row['soluong']>0){
                                            echo "<td style='text-align:center;'><input type='number' name='soluong' min='1' max='".$row['soluong']."' value='1' style='width:35px;' /></td>";
                                            echo "</tr>";
                                            echo "<tr>";
                                        	echo "<td></td>";
                                    	    echo "<td style='text-align:center;'><input type='submit' name='muahang' value='Mua Hàng' /></td>";
                                        }else{
                                             echo "<td style='text-align:center;'>Hết hàng</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                 </tr>
                            </table>
                        </form>
                    </div>
                    <div class="chitiet">
                    	<h3 style="margin-left: 5px">Mô tả sản phẩm:</h3>
                        <?php
                            echo "<p>".$row['mota']."</p>";
                        ?>
                    </div>
                </div>
            </div>
            
            <div id="sptt">
            	 <div id="moive">
            <h3 style="margin-left: 10px; margin-bottom: 20px">Sản phẩm tương tự: </h3>
            	<?php
                    $str = "SELECT * FROM sanpham WHERE masanpham!='".$row['masanpham']."' ORDER BY masanpham DESC LIMIT 9";
                    $que = mysqli_query($con,$str);
                    if($que){
                        $hang = 1;
                        $sanpham = 1;
                        while ($row = mysqli_fetch_array($que)) {
                            if($sanpham == 1){
                                echo "<div id='hang.".$hang."'>";
                            }
                            echo "<div id='sp".$sanpham."'>";
                                echo "<a href='thongtinsanpham.php?id=".$row['masanpham']."'>";
                                echo "<img src='image/nuochoa/".$row['masanpham'].".jpg' border='0'/>";
                            echo "</a>"; 
                                echo "<dd><a href='thongtinsanpham.php?id=".$row['masanpham']."' title='".$row['tensanpham']."' style='color:red'>".$row['tensanpham']."</a></dd>";
                                echo "<a href='thongtinsanpham.php?id=".$row['masanpham']."'>Xem chi tiết</a>";
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
                
            </div><!--hết phần mới về -->
            </div>
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
        <p>©2021 NuocHoaVietKy - địa chỉ mua nước hoa online với hơn 2000 mặt hàng nước hoa cao cấp. Cung cấp các loại nước hoa hàng hiệu, nước hoa chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp. Tư vấn và giao hàng trên cả nước. Hệ thống nhân viên giao hàng phong phú phục vụ quý khách hài lòng một cách ưng ý . Mang lại cho khách hàng 1 sản phẩm chính hãng được nhập khẩu từ nhiều thương hiệu nổi tiếng trên thế giới đặc biệt là nước hoa Pháp và nhiều nước<br /> 
Add : Đại học Duy Tân - Hotline: 039.377.2222 <br />
info@nuochoavietky.com. Giờ mở cửa: 9h - 21h Thứ hai đến thứ Bảy. Chủ nhật đặt hàng qua điện thoại </p>
                    <p style="color:#F60; font-size:9px; float:right; font-style:italic">Design by : Lê Viết Kỳ</p>

    </div>
<!---hết chân webstie----->    
</body>
</html>
