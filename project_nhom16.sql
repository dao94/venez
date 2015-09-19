-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 07:18 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_nhom16`
--
CREATE DATABASE IF NOT EXISTS `project_nhom16` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_nhom16`;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `madonhang` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL,
  `ghichu` text NOT NULL,
  KEY `madonhang` (`madonhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`madonhang`, `masp`, `soluong`, `thanhtien`, `ghichu`) VALUES
(2, 4, 1, 100000, ''),
(2, 1, 2, 2444440, ''),
(3, 5, 1, 200000, ''),
(5, 5, 1, 200000, ''),
(5, 7, 1, 270000, ''),
(5, 12, 1, 130000, ''),
(6, 8, 1, 450000, '');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `madonhang` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `ngayban` datetime NOT NULL,
  `note` text NOT NULL,
  `trangthai` int(11) NOT NULL,
  PRIMARY KEY (`madonhang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madonhang`, `makh`, `ngayban`, `note`, `trangthai`) VALUES
(2, 2, '2013-12-18 16:39:24', 'nhanh ho anh cai', 2),
(3, 2, '2013-12-18 21:01:53', 'nhanh nhanh', 3),
(5, 4, '2013-12-18 23:07:10', 'nhNHNHNH', 1),
(6, 5, '2013-12-18 23:16:52', 'chuyen nhanhn cho minh nhe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `ho` varchar(20) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `gioitinh` double NOT NULL,
  `ngaysinh` date NOT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `email`, `ho`, `ten`, `sdt`, `diachi`, `gioitinh`, `ngaysinh`) VALUES
(1, 'thinhit@yahoo.com', 'Nguyễn', 'Thịnh', 1626616817, 'Yên Phong - Bắc Ninh', 1, '1994-09-20'),
(2, 'anhday_1082002@yahoo.com', 'Nguyễn', 'Thịnh', 1626616817, 'Bắc Ninh', 1, '2012-11-30'),
(3, 'wayc0de', 'Nguyễn', 'Văn Thịnh', 1626616817, 'Bắc Ninh', 1, '2013-12-18'),
(4, 'anhday_1082002@yahoo.com', 'Nguyễn', 'Thịnh', 1626616817, 'Bắc Ninh', 1, '2014-01-10'),
(5, 'thinhit@yahoo.com', 'Nguyễn', '234234', 12312123, 'Bắc Ninh', 2, '2013-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(11) NOT NULL AUTO_INCREMENT,
  `maloai` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `mota` text NOT NULL,
  `gia` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL,
  PRIMARY KEY (`masp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `maloai`, `tensp`, `mota`, `gia`, `size`, `hinhanh`, `trangthai`) VALUES
(7, 10, 'Váy xòe đỏ', 'acccc1', 270000, 'XL,XS', 'ed2965ba1ba20b6b1b6afab16b4b715c.jpg', 1),
(8, 10, 'ĐẦM NHUNG VINTAGE', 'Kh&ocirc;ng g&ograve; b&oacute;, khắt khe như trang phục c&ocirc;ng sở, hay đặt nặng sự thoải m&aacute;i, đơn giản như trang phục đi chơi, dạo phố, đầm x&ograve;e lu&ocirc;n thể hiện tinh tế n&eacute;t c&aacute; t&iacute;nh, t&ocirc;n vinh vẻ đẹp của bạn v&agrave; gi&uacute;p bạn th&ecirc;m quyến rũ, thu h&uacute;t.\r\n Nếu như bạn l&agrave; một t&iacute;n đồ thời trang y&ecirc;u th&iacute;ch sự giản đơn, sao bạn kh&ocirc;ng thử phối chiếc đầm n&agrave;y c&ugrave;ng những phụ kiện bắt mắt như v&ograve;ng cổ, v&ograve;ng tay, b&ocirc;ng tai dạng to, bạn tr&ocirc;ng sẽ thật nổi bật đấy', 450000, 'XL', 'd49a92614d2878d769075bd12deb4397.jpg', 1),
(9, 10, 'BỘ SET CH&Acirc;N V&Aacute;Y REN', 'Những bộ set lu&ocirc;n l&agrave; sự lựa chọn ưu ti&ecirc;n đối với nhiều chị em phụ nữ khi muốn thể hện vẻ đẹp sang trọng v&agrave; nữ t&iacute;nh.\r\nChất liệu ren dễ mặc, c&oacute; thể che khuyết điểm lại mang đến vẻ đẹp mềm mại, gợi cảm n&ecirc;n cũng l&agrave; sự chọn lựa tuyệt vời cho c&aacute;c bạn g&aacute;i trong nhiều dịp kh&aacute;c nhau.', 520000, 'XL', '21a1a2cdd67c56e19b0661ba8fa940fa.jpg', 1),
(10, 10, 'ĐẦM CHẤM BI THẮT NƠ', 'Hoạ tiết chấm bi đang l&agrave; một trong những xu hướng thời trang được c&aacute;c bạn g&aacute;i y&ecirc;u th&iacute;ch.\r\nKiểu hoạ tiết n&agrave;y vừa đơn giản nhưng kh&ocirc;ng k&eacute;m phần nổi bật l&agrave; kh&oacute; lỗi thời.\r\n', 540000, 'XL', 'ea4c321349a9e78b9af82e217fbbd516.jpg', 1),
(11, 17, '&Aacute;O SƠ MI R&Acirc;U', ' Đặc biệt logo r&acirc;u n&oacute;n đang trở th&agrave;nh một xu hướng thời trang v&agrave; được y&ecirc;u th&iacute;ch hơn bao giờ hết.\r\nSản phẩm sẽ gi&uacute;p c&aacute;c bạn g&aacute;i th&ecirc;m trẻ trung năng động v&agrave; kh&ocirc;ng k&eacute;m phần tinh nghịch, đ&aacute;ng y&ecirc;u.\r\nThấm h&uacute;t mồ h&ocirc;i, độ bền cao, dễ d&agrave;ng cho việc giặt ủi.', 130000, 'XL', '15168efb04c6070ecaff7d7991a63c7a.jpg', 1),
(12, 17, '&Aacute;O CROPTOP CỔ SƠ MI', '&Aacute;o kiểu d&aacute;ng croptop th&iacute;ch hợp với những c&ocirc; n&agrave;ng trẻ trung, hiện đại.\r\n&Aacute;o được l&agrave;m từ chất liệu cao cấp, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt, cho bạn cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu trong mọi hoạt động.\r\nChỉ cần kết hợp c&ugrave;ng quần short hoặc ch&acirc;n v&aacute;y xinh xắn l&agrave; bạn đ&atilde; trở n&ecirc;n c&aacute; t&iacute;nh v&agrave; xinh đẹp hơn khi đi chơi c&ugrave;ng bạn b&egrave;.', 130000, 'XL', '8b56f4d9cb8c060441c67cbf795deb84.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(11) NOT NULL,
  `ngaydangky` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`user_id`, `makh`, `username`, `password`, `level`, `ngaydangky`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 6, '2013-12-18 20:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `theloaisp`
--

CREATE TABLE IF NOT EXISTS `theloaisp` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(30) NOT NULL,
  `mota` varchar(100) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `theloaisp`
--

INSERT INTO `theloaisp` (`maloai`, `tenloai`, `mota`) VALUES
(7, 'Giầy dép nữ', '12'),
(10, 'Váy , đầm', 'acccc1'),
(12, 'Vest nữ', 'Quần áo vest'),
(13, 'Đồ ngủ ', 'Đồ ngủ '),
(14, 'Đồ bơi', 'Đồ bơi'),
(15, 'Quần dài', ''),
(16, 'Quần thể thao', 'thao'),
(17, 'Quần áo công sở', 'Quần áo công sở');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `matin` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `ngayviet` datetime NOT NULL,
  PRIMARY KEY (`matin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`matin`, `tieude`, `noidung`, `hinhanh`, `ngayviet`) VALUES
(5, 'Hàng chục nghìn học sinh Tây Bắc nghỉ học tránh rét', '<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: center; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">Trẻ mầm non ở B&aacute;t X&aacute;t, L&agrave;o Cai đ&atilde; được cho&nbsp;<a style="padding: 0px; margin: 0px; text-decoration: none; color: #03679f;" href="http://tiin.vn/chuyen-muc/hoc/hoc-sinh-lao-cai-se-duoc-nghi-hoc-trong-hai-ngay.html"><strong style="padding: 0px; margin: 0px;">nghỉ học tr&aacute;nh r&eacute;t</strong></a>.</span></p>\r\n<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: justify; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">Tr&ecirc;n địa b&agrave;n tỉnh L&agrave;o Cai, từ chiều tối ng&agrave;y Chủ nhật (15/12) đ&atilde; xuất hiện mưa tuyết k&eacute;o d&agrave;i v&agrave; rơi rất d&agrave;y ở c&aacute;c huyện Sapa, B&aacute;t X&aacute;t... với nhiệt độ dưới 0 độ C, c&ograve;n tại c&aacute;c huyện Bắc H&agrave;, Si Ma Cai, Mường Khương nhiệt độ cũng xuống đến 4-5 độ C.</span></p>\r\n<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: justify; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">V&igrave; vậy, ng&agrave;y 16/12, Ph&ograve;ng Gi&aacute;o dục huyện Sapa cũng cho ph&eacute;p 11.000 học sinh của 63 trường học tr&ecirc;n địa b&agrave;n, gồm 20 trường mầm non, 22 trường tiểu học, 21 trường THCS v&agrave; phổ th&ocirc;ng d&acirc;n tộc b&aacute;n tr&uacute; THCS cho học sinh tạm thời nghỉ học trong 2 ng&agrave;y (16-17.12), chờ thời tiết ấm l&ecirc;n sẽ tiếp tục đi học.</span></p>\r\n<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: justify; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">C&ograve;n tại huyện B&aacute;t X&aacute;t, Ph&ograve;ng Gi&aacute;o dục cũng căn cứ v&agrave;o thời tiết đ&atilde; cho 10.000 học sinh của 44 trường của c&aacute;c x&atilde; &Yacute; T&yacute;, A L&ugrave;, Ngải Thầu, Dền Th&agrave;ng, Pa Cheo nghỉ học. Huyện Bắc H&agrave; cho học sinh c&aacute;c trường ở x&atilde; Tả Van Chư, Bản G&igrave;a, L&ugrave;ng Ph&igrave;nh, L&ugrave;ng Cải nghỉ học tr&aacute;nh r&eacute;t.</span></p>\r\n<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: justify; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">&Ocirc;ng Nguyễn Anh Ninh - Gi&aacute;m đốc Sở GDĐT L&agrave;o Cai cho biết đ&atilde; chỉ đạo hiệu trưởng c&aacute;c trường học tr&ecirc;n địa b&agrave;n được ph&eacute;p quyết định cho học sinh nghỉ học khi nhiệt độ ngo&agrave;i trời dưới 10 độ C với học sinh tiểu học, mầm non v&agrave; dưới 7 độ C đối với học sinh trung học cơ sở; đồng thời trường học tăng cường c&aacute;c biện ph&aacute;p chống r&eacute;t cho học sinh, gi&uacute;p c&aacute;c em đảm bảo sức khỏe bước v&agrave;o kỳ thi hết học kỳ I. Được biết, Sở đ&atilde; trang bị 170 chăn ấm cho học sinh huyện Si Ma Cai v&agrave; h&agrave;ng ng&agrave;n phần qu&agrave; cho c&aacute;c em v&ugrave;ng cao để tăng cường chống r&eacute;t.</span></p>\r\n<p style="padding: 0px; margin: 0px 0px 15px; line-height: 18px; font-size: 13px; color: #454545; text-align: justify; font-family: Tahoma;"><span style="padding: 0px; margin: 0px; font-family: tahoma, geneva, sans-serif;">C&ograve;n tại Lai Ch&acirc;u, từ ng&agrave;y 16/12, đ&atilde; c&oacute; tr&ecirc;n 8.500 học sinh tiểu học v&agrave; mầm non, tập trung ở những v&ugrave;ng n&uacute;i cao S&igrave;n Hồ, Phong Thổ, Tam Đường được cho nghỉ học v&igrave; r&eacute;t đậm, r&eacute;t hại. Sở GDĐT đ&atilde; chỉ đạo ph&ograve;ng GDĐT c&aacute;c huyện, thị v&agrave; hiệu trưởng c&aacute;c trường căn cứ t&igrave;nh h&igrave;nh thời tiết, cơ sở vật chất trường lớp, linh hoạt trong việc ph&ograve;ng chống r&eacute;t cho học sinh v&agrave; bố tr&iacute; thời gian học tập của học sinh cho hợp l&yacute;, trong đ&oacute; c&aacute;c trường được chủ động quyết định cho học sinh mầm non v&agrave; tiểu học nghỉ học theo quy định khi thời tiết r&eacute;t đậm, r&eacute;t hại.</span></p>', 'ded2017e7610d13f38afbb4ef5eeaf56.jpg', '2013-12-19 12:52:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
