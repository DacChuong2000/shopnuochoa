<?php
    session_start();
    if(!isset($_SESSION['taikhoan'])){
        header("Location: dangnhap.php");
        die();
    }
    else{
        $taikhoan = $_SESSION['taikhoan'];
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
                <p>Chát với nick hỗ trợ Viết KỲ ( giờ hành chính )</p>
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
        <div style="width:780px;float:right;">

            
            <div>
                 <div id="moive">
            <h3 style="margin-left: 10px; margin-bottom: 20px">Danh sách đơn hàng của tôi: </h3>

            <div id="sanpham">
                <table>
                <?php
                    $str = "SELECT donhang.id,donhang.masanpham,sanpham.tensanpham,donhang.giagoc,donhang.soluong,donhang.tinhtrang,donhang.ngaykhoitao,taikhoan.hoten,taikhoan.diachi,taikhoan.sdt FROM donhang,sanpham,taikhoan WHERE donhang.masanpham = sanpham.masanpham AND donhang.nguoimua = taikhoan.taikhoan AND donhang.nguoimua = '".$taikhoan."'";
                    $que = mysqli_query($con,$str);
                    if($que){
                        $hang = 1;
                        while ($row = mysqli_fetch_array($que)) {
                            echo "<tr><td><div id='hang.".$hang."' style='height: 300px;'>";

                            echo "<div style='width: 250px; height: 250px;border: 1px solid #CCC;margin-top:20px;margin-left:5px;float:left;'>";
                            echo "<img src='image/nuochoa/".$row['masanpham'].".jpg' style='width: 200px; height: 200px;' />";
                            echo "</div>";
                            echo "<div style='width:300px;height:250px;float:left;margin-top:20px; margin-left:20px'>";
                            echo "<div style='width:100%;height:250px;border: 1px solid #CCC;-moz-border-radius: 5px;-webkit-border-radius: 5px;font-weight:normal;'>"; 

                            echo "<table border='0' align='center'  cellpadding='5px' cellspacing='5px' style='margin: 0 auto;'>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Giá tiền:</td>";
                                        echo "<td style='text-align:right; color:#03F; font-weight:bold;'>".formatMoney($row['giagoc'])." ₫</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Mã đơn hàng:</td>";
                                    
                                        echo "<td style='text-align:right; color:red;'>".$row['id']."</td>";
                                    
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Mã sản phẩm:</td>";
                                    
                                        echo "<td style='text-align:right; color:red;'>".$row['masanpham']."</td>";
                                    
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Số lượng:</td>";
                                    echo "<td style='text-align:center;'>";
                                        
                                            echo $row['soluong'];
                                        
                                     echo "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Tình trạng:</td>";
                                    echo "<td style='text-align:center;'>";
                                        switch ($row['tinhtrang']) {
                                            case 'choxacnhan':
                                                echo "Chờ xác nhận";
                                                break;
                                            
                                            case 'chuyendi':
                                                echo "Chuyển đi";
                                                break;
                                            case 'hoanthanh':
                                                echo "Hoàn thành";
                                                break;
                                            case 'tuchoi':
                                                echo "Từ chối";
                                                break;
                                        }
                                    echo "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Ngày mua:</td>";
                                    echo "<td style='text-align:center;'>";
                                       
                                         echo $row['ngaykhoitao'];
                                    
                                    echo "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td style='text-align:right;'>Nguoi mua:</td>";
                                    echo "<td style='text-align:center;'>";
                                       
                                         echo $row['hoten'];
                                    
                                    echo "</td>";
                                echo "</tr>";
                            echo "</table>";
                        echo "</div></div></td></tr>";
                            $hang++;
                        }
                    }
                ?>
                </table>
                
                </div>
            
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
