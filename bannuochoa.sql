-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2021 lúc 03:45 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bannuochoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `masanpham` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `giagoc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `tinhtrang` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'choxacnhan',
  `ngaykhoitao` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `nguoimua` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `masanpham`, `giagoc`, `soluong`, `tinhtrang`, `ngaykhoitao`, `nguoimua`) VALUES
(1, 'FASGASSGW', 240000, 1, 'hoanthanh', '15/4/2021', 'm'),
(2, 'GASG235SF', 60000, 1, 'tuchoi', '15/4/2021', 'p'),
(7, 'TH35DDAA', 8516200, 2, 'choxacnhan', '18-04-2021', 'm'),
(8, 'FASGASSGW', 357750, 3, 'chuyendi', '18-04-2021', 'm'),
(9, 'TH35DDAA', 12774300, 3, 'tuchoi', '18-04-2021', 'm'),
(16, 'TH35DDAA', 4258100, 4, 'tuchoi', '18-04-2021', 'm'),
(17, 'FASGASSGW', 119250, 10, 'choxacnhan', '20-04-2021', 'm'),
(22, 'GASHSSSW', 999999, 3, 'hoanthanh', '01/05/2021', 'k'),
(23, 'GASHSSSW', 999999, 5, 'hoanthanh', '01/05/2021', 'k'),
(24, 'TH35DDAA', 4258100, 1, 'tuchoi', '01/05/2021', 'k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `sanpham` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `nguoimua` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int(11) NOT NULL,
  `ten` text COLLATE utf8_vietnamese_ci NOT NULL,
  `giatri` int(11) NOT NULL,
  `mota` text COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhtrang` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'true',
  `soluong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `ten`, `giatri`, `mota`, `tinhtrang`, `soluong`) VALUES
(1, 'Giảm giá 30% cho tất cả đơn hàng', 30, 'Giảm 30% cho tất cả đơn hàng. số lượng có hạn. mõi tài khoản chỉ sử dụng 1 lần.', 'true', 1),
(2, 'Giảm 20% cho tất cả đơn hàng', 20, 'Giảm 20% cho tất cả đơn hàng', 'true', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanhieu`
--

CREATE TABLE `nhanhieu` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanhieu`
--

INSERT INTO `nhanhieu` (`maloai`, `tenloai`) VALUES
(1, 'Trung Quốc'),
(2, 'Việt Nam'),
(5, 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenphanquyen` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `tenphanquyen`) VALUES
('admin', 'Quản Trị Viên'),
('nguoidung', 'Người Dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `tensanpham` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `giagoc` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL,
  `mota` text COLLATE utf8_vietnamese_ci NOT NULL,
  `maloai` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `dungtich` int(11) NOT NULL,
  `namphathanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `giagoc`, `giamgia`, `mota`, `maloai`, `soluong`, `dungtich`, `namphathanh`) VALUES
('DASBGREW', 'Hoa cùi mía', 200000, 20, 'Ahihi chỉ mún', 1, 10, 1000, 1999),
('DJIAWELPYT', 'Hoa Hải Đường', 26000000, 0, 'Thấy gớm', 5, 10, 1200, 1280),
('FASGASSGW', 'ELISE nước hoa cao cấp', 159000, 25, 'Chất vải: Chiffon.\r\nChiều dài áo: Qua rốn.\r\nChiều dài tay áo: Tay lửng.\r\nHọa tiết: Trơn.\r\nPhong cách: Gợi cảm.', 1, 42, 500, 1988),
('GAHDrERT', 'Cái quan què j đó', 200003, 0, 'bs', 2, 13, 1000, 2014),
('GASG235SF', 'SJGASM  nước hoa', 165000, 10, 'Chất vải: Cotton thun.\r\nKiểu cổ áo: Cổ tròn.\r\nChiều dài váy: Qua gối.\r\nPhong cách: Cổ điển.\r\nHọa tiết: Trơn.\r\nChiều dài tay áo: Tay dài.', 1, 2, 5000, 2021),
('GASHSSSW', 'aaaa', 999999, 0, 'Gsagm ags', 1, 5, 1500, 1989),
('ILQVHADCTK', 'Ú na Ú na Ú nần', 10000, 20, '53', 1, 1, 500, 2021),
('SFASSSSS', 'Nước hoa con gái', 100000, 10, 'sịt ik ùi pk', 2, 10, 2000, 2021),
('SGASXSRA', 'Xuân dược', 200000, 0, 'ahihi', 1, 10, 1000, 2021),
('TH35DDAA', 'Nước hoa Alibaba', 5530000, 23, 'Năm sản xuất: 2016.\r\nXuất xứ: Mỹ.\r\nThương hiệu: Victoria \'s Secret.\r\nGiới tính: Phái nữ.\r\nNhóm hương: Floral.\r\nNồng độ nước hoa: Eau De Perfume.\r\nHương thơm đặc trưng: Hồng tiêu, hoa mẫu đơn lai.\r\nPhong cách : Nữ tính, gợi cảm, quyến rũ.\r\nCách sử dụng: Xịt. ', 2, 0, 1300, 1988),
('TH35DDAS', 'Ahihi nước hoa', 240000, 60, 'Chất liệu : thấm hút mồ hôi, co giãn\r\n\r\n Màu sắc: nhiều màu( liên hệ với shop để shop tư vấn)\r\n\r\n. Các mẹ thoải mái mặc từ bầu bé đến khi sinh ạ\r\n\r\n. Hàng  đẹp nên các mẹ yên tâm về sản phẩm', 1, 1, 1000, 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` text COLLATE utf8_vietnamese_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phanquyen` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `matkhau`, `sdt`, `diachi`, `hoten`, `phanquyen`) VALUES
('k', 'k', '056642', '                                                                                VL                                                                        ', 'Test Thử', 'nguoidung'),
('m', 'm', '056452', 'ff@', 'jjjs', 'nguoidung'),
('p', 'p', 'p', 'p', 'p', 'admin'),
('xprogamer', '1', '0564292312', 'v', 'Huỳnh Văn Thông', 'nguoidung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinthanhtoan`
--

CREATE TABLE `thongtinthanhtoan` (
  `hoten` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `stk` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `nganhang` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `chinhanh` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinthanhtoan`
--

INSERT INTO `thongtinthanhtoan` (`hoten`, `stk`, `nganhang`, `chinhanh`) VALUES
('Thanh Bình', '234543454', 'Vietcombank', 'CN Vĩnh Long'),
('Thanh Bình', '234567543224', 'ACB', 'CN Vĩnh Long');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `nguoimua` (`nguoimua`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham` (`sanpham`),
  ADD KEY `nguoimua` (`nguoimua`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanhieu`
--
ALTER TABLE `nhanhieu`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `maloai` (`maloai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`),
  ADD KEY `phanquyen` (`phanquyen`);

--
-- Chỉ mục cho bảng `thongtinthanhtoan`
--
ALTER TABLE `thongtinthanhtoan`
  ADD PRIMARY KEY (`stk`,`nganhang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanhieu`
--
ALTER TABLE `nhanhieu`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`nguoimua`) REFERENCES `taikhoan` (`taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`sanpham`) REFERENCES `sanpham` (`masanpham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`nguoimua`) REFERENCES `taikhoan` (`taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `nhanhieu` (`maloai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`phanquyen`) REFERENCES `phanquyen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
