-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 05:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noithat`
CREATE DATABASE IF NOT EXISTS `noithat` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `noithat`;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  `mota` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `mota`) VALUES
(1, 'Bàn', ''),
(2, 'Ghế', ''),
(3, 'Giường', ''),
(4, 'Dụng cụ bếp', ''),
(5, 'Tủ quần áo', '');

-- --------------------------------------------------------

--
-- Table structure for table `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `macdinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diachi`
--

INSERT INTO `diachi` (`id`, `nguoidung_id`, `diachi`, `macdinh`) VALUES
(1, 3, '123, Phú Thành Long Xuyên An Giang', 0),
(2, 3, '123, Phú Thành Long Xuyên An Giang', 0),
(3, 3, '123, AGU', 0),
(4, 3, '123456dxcfvghb', 0),
(5, 14, 'fgbkfdgbdjfhgbd', 0),
(6, 15, 'fgbkfdgbdjfhgbd', 0),
(7, 16, 'sdbhjs23234', 0),
(8, 17, 'An giang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi_id` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `ngaytaodonhang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhangct`
--

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `giaban` float NOT NULL,
  `giagoc` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giaban`, `giagoc`, `soluongton`, `hinhanh`, `luotxem`, `luotmua`, `danhmuc_id`) VALUES
(1, 'Bàn trà vuông','', 2000000,5000000,5,'image/products/ban1.jpg', 10, 2,1),
(2, 'Bàn trà sứ','', 2000000,5000000,5,'image/products/ban2.jpg',  0, 0, 1),
(3, 'Bàn trà bằng gỗ giá rẻ','',2000000,5000000,5,'image/products/ban3.jpg',  0, 0, 1),
(4, 'Bàn ăn vuông giá rẻ','', 2000000,5000000,5,'image/products/ban4.jpg',  0, 0, 1),
(5, 'Bàn trà tròn bằng sứ gía rẻ ','', 2000000,5000000,5,'image/products/ban5.jpg',  0, 0, 1),
(6, 'Bàn trà 2 tầng giá rẻ','', 2000000,5000000,5,'image/products/ban6.jpg',  0, 0, 1),
(7, 'Ghế Sofa giá rẻ GHE-TP054','', 2000000,5000000,5,'image/products/ghe1.jpg',  0, 0, 1),
(8, 'Ghế Sofa giá rẻ GHE-TP055','', 2000000,5000000,5,'image/products/ghe2.jpg',  0, 0, 2),
(9, 'Ghế Sofa giá rẻ GHE-TP056','', 2000000,5000000,5,'image/products/ghe3.jpg',  0, 0, 2),
(10,'Ghế Sofa giá rẻ GHE-TP057','', 2000000,5000000,5,'image/products/ghe4.jpg',  0, 0, 2),
(11,'Ghế Sofa giá rẻ GHE-TP058','', 2000000,5000000,5,'image/products/ghe5.jpg',  0, 0, 2),
(12,'Ghế Sofa giá rẻ GHE-TP059','', 2000000,5000000,5,'image/products/ghe6.jpg',  0, 0, 2),
(13, 'Giường ngủ cao cấp GIUONG-TP078','', 2000000,5000000,5,'image/products/giuongngu1.jpg',  0, 0, 3),
(14, 'Giường ngủ cao cấp GIUONG-TP079','', 2000000,5000000,5,'image/products/giuongngu2.jpg',  0, 0, 3),
(15, 'Giường ngủ cao cấp GIUONG-TP080','', 2000000,5000000,5,'image/products/giuongngu3.jpg',  0, 0, 3),
(16, 'Giường ngủ cao cấp GIUONG-TP081','', 2000000,5000000,5,'image/products/giuongngu4.jpg',  0, 0, 3),
(17, 'Giường ngủ cao cấp GIUONG-TP082','', 2000000,5000000,5,'image/products/giuongngu5.jpg',  0, 0, 3),
(18, 'Giường ngủ cao cấp GIUONG-TP083','', 2000000,5000000,5,'image/products/giuongngu6.jpg',  0, 0, 3),
(19, 'Tủ bếp Mini cao cấp TUBEP-TP091','', 2000000,5000000,5,'image/products/tubep1.jpg',  0, 0, 4),
(20, 'Tủ bếp Mini cao cấp TUBEP-TP092','', 2000000,5000000,5,'image/products/tubep2.jpg',  0, 0, 4),
(21, 'Tủ bếp Mini cao cấp TUBEP-TP093','', 2000000,5000000,5,'image/products/tubep3.jpg',  0, 0, 4),
(22, 'Tủ bếp Mini cao cấp TUBEP-TP094','', 2000000,5000000,5,'image/products/tubep4.jpg',  0, 0, 4),
(23, 'Tủ bếp Mini cao cấp TUBEP-TP095','', 2000000,5000000,5,'image/products/tubep5.jpg',  0, 0, 4),
(24, 'Tủ bếp Mini cao cấp TUBEP-TP096','', 2000000,5000000,5,'image/products/tubep6.jpg',  0, 0, 4),
(25, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP014','', 2000000,5000000,5,'image/products/tuquanao1.jpg',  0, 0, 5),
(26, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP015', '',2000000,5000000,5,'image/products/tuquanao2.jpg',  0, 0, 5),
(27, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP016', '',2000000,5000000,5,'image/products/tuquanao3.jpg',  0, 0, 5),
(28, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP017', '',2000000,5000000,5,'image/products/tuquanao4.jpg',  0, 0, 5),
(29, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP018', '',2000000,5000000,5,'image/products/tuquanao5.jpg',  0, 0, 5),
(30, 'Tủ quần áo cao cấp giá tốt TUQUANAO-TP019', '',2000000,5000000,5,'image/products/tuquanao6.jpg',  0, 0, 5);


-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `vaitro` tinyint(4) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `trangthai`, `vaitro`, `hinhanh`) VALUES
(1, 'thanh@gmail.com', '4567890123', '202cb962ac59075b964b07152d234b70', 'LuongThanhưerwrewdsjfsjfldsfsdfsfsfsfsfsfs', 1, 1, 'user.png'),
(2, 'truyen123@gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70\r\n', 'Thanh Truyền', 1, 2, 'messi.jpg'),
(3, 'tho@gmail.com', '4567890123', 'e99a18c428cb38d5f260853678922e03', 'Thanh 1234', 1, 3, 'conan1.jpg'),
(4, 'chanh@gmail.com', '5678901234', 'e99a18c428cb38d5f260853678922e03', 'Thanh Lương', 1, 3, ''),
(5, 'abc@gmail.com', '1234567044', '202cb962ac59075b964b07152d234b70', 'Thanh', 1, 2, ''),
(9, 'truyen1234@gmail.com', '1234567856', '202cb962ac59075b964b07152d234b70', 'sahdkajhdjk', 1, 2, ''),
(10, 'thanh@thanh.com', '3456127890', '202cb962ac59075b964b07152d234b70', 'Thanh', 1, 2, ''),
(12, '123@gmail.com', '1234512345', '827ccb0eea8a706c4c34a16891f84e7b', 'qưertyu', 1, 3, ''),
(14, '123456@gmail.com', '1234567891', '0f7e44a922df352c05c5f73cb40ba115', 'sdfghj', 1, 3, ''),
(15, '123456@gmail.com', '1234567891', '0f7e44a922df352c05c5f73cb40ba115', 'sdfghj', 1, 3, ''),
(16, 'hoi@gmail.com', '123', '202cb962ac59075b964b07152d234b70', '1234512345', 1, 3, ''),
(17, 'thanh1234@gmail.com', '123', '202cb962ac59075b964b07152d234b70', '1234512345', 1, 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoimua_id` (`nguoidung_id`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`,`mathang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mathang_ibfk_1` (`danhmuc_id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
