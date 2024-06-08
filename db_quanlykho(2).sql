-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 02:36 AM
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
-- Database: `db_quanlykho`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietban`
--

CREATE TABLE `chitietban` (
  `Id` int(11) NOT NULL,
  `IdDonBan` int(11) DEFAULT NULL,
  `IdSP` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietban`
--

INSERT INTO `chitietban` (`Id`, `IdDonBan`, `IdSP`, `GiaMua`, `GiaBan`, `SoLuong`, `ThanhTien`) VALUES
(9, NULL, 25, NULL, 41405000, 1, 41405000);

-- --------------------------------------------------------

--
-- Table structure for table `chitietduan`
--

CREATE TABLE `chitietduan` (
  `Id` int(11) NOT NULL,
  `IdDuAn` int(11) DEFAULT NULL,
  `IdSP` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietduan`
--

INSERT INTO `chitietduan` (`Id`, `IdDuAn`, `IdSP`, `GiaMua`, `GiaBan`, `SoLuong`, `ThanhTien`) VALUES
(121, 89, 72, NULL, 3319000, 1, 3319000);

-- --------------------------------------------------------

--
-- Table structure for table `chitietmua`
--

CREATE TABLE `chitietmua` (
  `Id` int(11) NOT NULL,
  `IdDonMua` int(11) DEFAULT NULL,
  `TenSP` varchar(100) DEFAULT NULL,
  `IdDVT` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhsachquyen`
--

CREATE TABLE `danhsachquyen` (
  `Id` int(11) NOT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhsachquyen`
--

INSERT INTO `danhsachquyen` (`Id`, `IdNV`, `IdQuyen`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donban`
--

CREATE TABLE `donban` (
  `Id` int(11) NOT NULL,
  `NgayBan` datetime DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdKH` int(11) DEFAULT NULL,
  `Tong` int(11) DEFAULT NULL,
  `TrangThai` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donmua`
--

CREATE TABLE `donmua` (
  `Id` int(11) NOT NULL,
  `NgayMua` datetime DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdNCC` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL,
  `TrangThai` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE `donvitinh` (
  `Id` int(11) NOT NULL,
  `DonVi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`Id`, `DonVi`) VALUES
(11, 'Tủ'),
(12, 'Cái'),
(13, 'Bộ'),
(14, 'Gói'),
(15, 'Hộp'),
(16, 'Mét'),
(17, 'Túi'),
(18, 'Thùng'),
(19, 'Kg'),
(20, 'Set');

-- --------------------------------------------------------

--
-- Table structure for table `duan`
--

CREATE TABLE `duan` (
  `Id` int(11) NOT NULL,
  `NgayBan` datetime DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdKH` int(11) DEFAULT NULL,
  `Tong` int(11) DEFAULT NULL,
  `TrangThai` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duan`
--

INSERT INTO `duan` (`Id`, `NgayBan`, `IdNV`, `IdKH`, `Tong`, `TrangThai`) VALUES
(89, '2024-06-06 11:37:00', 13, 6, 3319000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hangsx`
--

CREATE TABLE `hangsx` (
  `Id` int(11) NOT NULL,
  `TenHang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hangsx`
--

INSERT INTO `hangsx` (`Id`, `TenHang`) VALUES
(3, 'SIEMENS'),
(4, 'MITSUBISHI'),
(5, 'SCHNEIDER'),
(6, 'Phoenix Contact'),
(7, 'OMRON'),
(8, 'ABB'),
(9, 'HANYOUNG'),
(10, 'IDEC'),
(11, 'Endress+Hauser'),
(12, 'HAVEC'),
(13, '--'),
(14, '3Onedata'),
(15, 'ICONICS');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `Id` int(11) NOT NULL,
  `TenKH` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`Id`, `TenKH`, `DienThoai`, `Email`, `DiaChi`) VALUES
(5, 'sample', '0123456789', 'sample@bkt.vn', 'HN'),
(6, 'Mr.Điệp Mitsubishi', '0975 769 800', 'luuthanh.diep@mevn.com.vn', 'Tầng 14, Tòa nhà Capital 109 Trần Hưng Đạo, Phường Cửa Nam, Quận Hoàn Kiếm, Hà Nội, Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Id` int(11) NOT NULL,
  `TenNCC` varchar(100) DEFAULT NULL,
  `NguoiLienHe` varchar(200) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `MST` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`Id`, `TenNCC`, `NguoiLienHe`, `DienThoai`, `Email`, `DiaChi`, `MST`) VALUES
(8, 'Công Ty Cổ Phần BKT', 'Nguyễn Thị Nga', '098 227 3889', 'ngatechadmin@bkt.com.vn', 'A21 ngõ 11, đường Huy Du, phường Cầu Diễn, quận Nam Từ Liêm, TP Hà Nội, Việt Nam', '0106123298'),
(9, 'CÔNG TY CỔ PHẦN CƠ ĐIỆN THƯƠNG MẠI SƠN HÀ', 'Quang Vương', '0969740985', 'codienthuongmaisonha@gmail.com', 'Thôn Dậu 1, Xã Di Trạch, Huyện Hoài Đức, Thành phố Hà Nội, Việt Nam', '0104438937'),
(10, 'CÔNG TY CỔ PHẦN CÔNG NGHỆ HỢP LONG', 'Vũ Khánh Huyền', '0967413291', 'sales06@hoplong.com', 'Số 6, ngõ 293, đường Tân Mai, Phường Tân Mai, Quận Hoàng Mai, Thành phố Hà Nội, Việt Nam', '0104509916'),
(11, 'CÔNG TY CỔ PHẦN THIẾT BỊ ĐIỆN HOÀNG PHƯƠNG', 'Ms Phượng', '0866 798 886', 'Codienhoangphuong@gmail.com', 'Số 30, ngách 1,ngõ 84, phố Võ Thị Sáu, P.Thanh Nhàn, Q.Hai Bà Trưng, TP. Hà Nội', '0106798886'),
(12, 'CÔNG TY CỔ PHẦN THƯƠNG MẠI VÀ XAY LẮP ĐIỆN HOÀNG NHẬT', 'Lan Chi', '0974831319', 'pkdhn@tbdhoangnhat.com', 'Số 11 - 13 Trần Nguyên Hãn, Quận Lê Chân, Hải Phòng', '0200 721 947'),
(13, 'CÔNG TY CỔ PHẦN TM & KTKS DƯƠNG HIẾU', 'Mr Trần Thanh Tùng', '0912.661.332', 'tung.tt@duonghieu.com.vn', 'Số 59, đường Võ Chí Công, tổ 14, Phường Nghĩa Đô, Quận Cầu Giấy, Thành phố Hà Nội', '4600341471-002'),
(14, 'CÔNG TY TNHH KỸ THUẬT THƯƠNG MẠI CÔNG NGHỆ MVN', 'Nguyễn Minh Thắng', '0903246884', 'thang.nguyen@mvn.com.vn', 'Số 9 ngõ 92 đường Nguyễn Khánh Toàn - Quan Hoa - Cầu Giấy - Hà Nội', '0106357465'),
(15, 'Công Ty TNHH Mạng Viễn Thông An Bình', 'Ms Lan', '0967.40.70.80', 'info@anbinhnet.com.vn', 'Số 59 Võ Chí Công, P Nghĩa Đô, Q Cầu Giấy, TP Hà Nội', '0109506235'),
(16, 'CÔNG TY TNHH MITSUBISHI ELECTRIC VIỆT NAM', 'Ms Nguyen Thi Thuy Ngan', '0862 886 095', 'NguyenThuy.Ngan@mevn.com.vn', 'Capital Tower, 109 Tran Hung Dao, Cua Nam Ward, Hoan Kiem District, Hanoi, VN.', '0310919107'),
(17, 'Công ty CP Thương mại Kỹ thuật Đông Nam Á (ASEATEC) ', 'Đoàn Hương Lý', '0987 552 027', 'doan-huong.ly@aseatec.com.vn', 'Số 115 ngõ 25 Vũ Ngọc Phan , Phường Láng Hạ, Quận Đống Đa, Thành phố Hà Nội, Việt Nam', '0100510741'),
(18, 'CÔNG TY CỔ PHẦN CHẾ TẠO THIẾT BỊ ĐIỆN VIỆT NAM', 'HAVEC', '0243 686 6376', 'veemhanoi@gmail.com', 'Lưu Phái - Ngũ Hiệp - Thanh Trì - Hà Nội', '0104672648'),
(19, 'CÔNG TY CP THIẾT BỊ CÔNG NGHIỆP VÀ CÔNG NGHỆ MÔI TRƯỜNG DEAHAN', 'Bùi Bích Hằng (Ms.)', '0946 303 230', 'hang.bui@deahan-tech.com', 'Số 3 ngõ 4, Phố Đồng Me, Phường Mễ Trì, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam', '0108258607'),
(20, 'CÔNG TY CỔ PHẦN TẬP ĐOÀN XÂY DỰNG QUANG HƯNG', '-', '0913611177', 'Chongsetquanghung.sle01@gmail.com', 'Km2 - Đường Phan Trọng Tuệ. P.Tam Hiệp, H. Thanh Trì, TP Hà Nội', '0105346164');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id` int(11) NOT NULL,
  `TenNV` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `TaiKhoan` varchar(50) DEFAULT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `Quyen` varchar(20) DEFAULT NULL,
  `IsActive` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Id`, `TenNV`, `DienThoai`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `Quyen`, `IsActive`) VALUES
(1, 'BKT.ADMIN', '0123412341', 'admin@bkt.vn', 'HN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '1'),
(7, 'Đào Văn Thiên', '0333005714', 'thiendv@bkt.com.vn', 'Quỳnh Hoàng - Quỳnh Phụ - Thái Bình', 'thiendv', '594f2ec6b4a19f8153311586adad3832', 'User', '1'),
(8, 'Tạ Ngọc Huấn', '0393325130', 'huantn@bkt.com.vn', 'Số 40, ngõ 180, Lò Đúc', 'huantn', '3cf5f78e1227f5c1530c922c152023fa', 'User', '1'),
(9, 'Nguyễn Thị Nga', '0353034744', 'ngant@bkt.com.vn', 'Văn trì 1, Minh Khai, Bắc Từ Liêm, Hà Nội', 'ngatn', 'd41d8cd98f00b204e9800998ecf8427e', 'Manager', '1'),
(10, 'Đào Xuân Hùng', '0982721858', 'hungdx@bkt.com.vn', 'Từ Sơn - Bắc Ninh', 'hungdx', 'c90cf958f3ac9cf1c8af5a399772b23f', 'Admin', '1'),
(11, 'Đoàn Xuân Hiểu', '0348135661', 'hieudx@bkt.com.vn', 'Nam Định', 'hieudx', '59cd9eb0494fd508e431ba39ca455877', 'User', '1'),
(12, 'Vũ Đình Long', '0983318362', 'longvd@bkt.com.vn', '86 Giáp Bát, Hoàng Mai, Hà Nội', 'longvd', '725f34ceaf6058f93ab1bbf0e10337bc', 'User', '1'),
(13, 'Nguyễn Đức Khương', '096 505 2560', 'khuongnd@bkt.com.vn', 'Hà Đông - Hà Nội', 'khuongnd', 'ceb2ea1a965fb32c8f49451c861e61f8', 'Admin', '1'),
(14, 'Nguyễn Lê Anh Nam', '0375427953', 'anhnamnl@bkt.com.vn', '80/66 Xuân Phương,Nam Từ Liêm ,HN', 'anhnamnl', 'ed4f1f9d2055412ef0385d213d94135f', 'User', '1'),
(15, 'Nguyễn Quang Tuấn', '0983066814', 'tuannq@bkt.com.vn', 'Chung cư Hongkong tower, 243A Đê La Thành, Đống Đa , Hà Nội', 'tuannq', 'd00a091b054708d987a22d3ff3c75164', 'User', '1'),
(16, 'BKT.Admin2', '0349320185', 'beobeo746@gmail.com', 'Long Biên', 'admin2', '1341215dbe9acab4361fd6417b2b11bc', 'Admin', '1'),
(17, 'Nguyễn Tất Thắng', '0977033818', 'thangnt@bkt.com.vn', 'P2308, N02T3, khu chung cư Ngoại Giao đoàn, Xuân Tảo, Bắc Từ Liêm, Hà Nội', 'thangnt', '99ad2f44956a9b9c7c6d3bfc6a30800d', 'Admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nhomthietbi`
--

CREATE TABLE `nhomthietbi` (
  `Id` int(11) NOT NULL,
  `TenNhom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhomthietbi`
--

INSERT INTO `nhomthietbi` (`Id`, `TenNhom`) VALUES
(15, 'PLC'),
(16, 'SERVO'),
(17, 'LVS'),
(18, 'HMI'),
(19, 'ROBOT'),
(20, 'SCADA'),
(21, 'VISION'),
(22, 'RELAY'),
(23, 'PHỤ KIỆN'),
(24, 'POWER'),
(25, 'TỦ ĐIỆN'),
(26, 'THIẾT BỊ MẠNG'),
(27, 'CONVERTER'),
(28, 'CABLE'),
(29, 'INVERTER'),
(30, 'Chống Sét'),
(31, 'Cuộn kháng'),
(32, 'Đèn Báo'),
(33, 'Đo mức'),
(34, 'Timer Electric'),
(35, 'Soft Starter'),
(36, 'Nút Nhấn'),
(37, 'Switch'),
(38, 'Busbar'),
(39, 'Tiếp địa');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `Id` int(11) NOT NULL,
  `TenQuyen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`Id`, `TenQuyen`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Id` int(11) NOT NULL,
  `MaSP` varchar(50) DEFAULT NULL,
  `TenSP` varchar(100) DEFAULT NULL,
  `IdDVT` int(11) DEFAULT NULL,
  `IdNCC` int(11) DEFAULT NULL,
  `IdHSX` int(11) DEFAULT NULL,
  `IdNTB` int(11) DEFAULT NULL,
  `XuatXu` varchar(50) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `imgUrl` varchar(8000) DEFAULT NULL,
  `IdNhomTB` int(11) DEFAULT NULL,
  `IdHangSX` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Id`, `MaSP`, `TenSP`, `IdDVT`, `IdNCC`, `IdHSX`, `IdNTB`, `XuatXu`, `GiaMua`, `GiaBan`, `SoLuong`, `imgUrl`, `IdNhomTB`, `IdHangSX`) VALUES
(25, 'ACS580-01-046A-4+J400 + FPBA-01', 'ACS-01-046A-4 Pid: 22kw, Iid: 43A; ACS-AP-S Asistant control panel + FPBA-01; PROFIBUS dp. DPV0/DPV1', 13, 17, 8, 29, 'China', 41405000, 41405000, 0, 'Assets/upload/image-acs580-edit.jpg', NULL, NULL),
(26, 'ACS580-01-046A-4+J400', 'BIẾN TẦN ACS580 3P 380…480V 22KW, 30HP ACS580-01-046A-4+J400', 13, 17, 8, 29, 'China', 34893000, 34893000, 1, 'Assets/upload/image-acs580-edit 2.jpg', NULL, NULL),
(27, 'FPBA-01', 'Card PROFIBUS DB Biến tần ABB. DPV0/DPV1 Adapter (K454)', 12, 17, 8, 29, 'China', 6512000, 6512000, 1, 'Assets/upload/9IBA008941_720x540__85295.jpg', NULL, NULL),
(28, '3AXD50000010763', 'DPMP-EXT PANEL MOUNTING KIT (DPMP-02 AND CDPI-01) Phụ kiện đưa màn hình biến tần gắn cánh tủ điện', 13, 17, 8, 29, 'China', 5060000, 5060000, 1, 'Assets/upload/abb-3axd50000010763-550x550.jpg', NULL, NULL),
(29, '3209510 - PT 2,5', 'PT 2,5 - Feed-through terminal block 3209510 Feed-through terminal block, nom. voltage: 800 V, nomin', 12, 14, 6, 23, '--', 9300, 9300, 1, 'Assets/upload/00091292_full_b1500.jpg', NULL, NULL),
(30, '3210567 - PTTB 2,5', 'PTTB 2,5 - 3210567 Cầu đấu dây 2 tầng độc lập nhau loại lò xo chống rung lắc theo công nghệ push in ', 12, 14, 6, 23, '--', 22000, 22000, 1, 'Assets/upload/Screenshot 2024-04-20 110448.png', NULL, NULL),
(31, 'TTC-6P-1X2-24DC-PT-I ', 'TTC-6P-1X2-24DC-PT-I - Surge protection device Chống sét tín hiệu Analog 4-20mA', 13, 14, 6, 30, '--', 1400000, 1400000, 1, 'Assets/upload/324_2.jpg', NULL, NULL),
(32, 'VAL-MS 230/3+1', 'VAL-MS 230/3+1- Parasurtenseur de type 2 Chống sét lan truyền 3P +1N', 13, 14, 6, 30, '--', 2500000, 2500000, 1, 'Assets/upload/00103100_full_b1500.jpg', NULL, NULL),
(33, 'HY-226-MD', 'Còi báo Hanyoung Ø22 24V DC', 12, 10, 9, 23, 'Indonesia', 74240, 74240, 1, 'Assets/upload/Coi-bao-Hanyoung-HY-226-MA.jpg', NULL, NULL),
(34, ' 0.200mH 40-50A 3P 380-440V', 'Cuộn kháng 0.200mH 40-50A 3P 380-440V', 12, 18, 12, 31, 'Việt Nam', 1200000, 1200000, 1, 'Assets/upload/DFR-400-050440285877267.jpg', NULL, NULL),
(41, ' iLEC - RV RV 2-4', 'Cos Tròn Bọc Nhựa  cable 2-4mm', 12, 12, 13, 23, '--', 300, 300, 1, 'Assets/upload/1517-ilec-rv-2-4.jpg', NULL, NULL),
(42, 'SC 10-8', 'Cosse SC 10-8 - Đầu Cốt ngắn 10mm2', 12, 12, 13, 23, 'China', 1700, 1700, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(43, 'SC 16-8', 'Cosse SC 16-8 - Đầu Cốt ngắn 16mm2', 12, 12, 13, 23, 'China', 1800, 1800, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(44, 'SC 240-16', 'Cosse SC 240-16 - Đầu Cốt ngắn 240mm2', 12, 12, 13, 23, 'China', 44000, 44000, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(45, 'SC 25-8', 'Cosse SC 25-8 - Đầu Cốt ngắn 25mm2', 12, 12, 13, 23, 'China', 3000, 3000, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(46, 'SC 35-8', 'Cosse SC 35-8 - Đầu Cốt ngắn 35mm2', 12, 12, 13, 23, 'China', 4000, 4000, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(47, 'SC 50-10', 'Cosse SC 50-10 - Đầu Cốt ngắn 50mm2', 12, 8, 13, 23, 'China', 6500, 6500, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(48, 'SC 6-8', 'Cosse SC 6-8 - Đầu Cốt ngắn 6mm2', 12, 12, 13, 23, 'China', 1500, 1500, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(49, 'SC 95-12', 'Cosse SC 95-12 - Đầu Cốt ngắn 95mm2', 12, 12, 13, 23, 'China', 14000, 14000, 1, 'Assets/upload/COS-SC-95-12-dau-cot-ngan-SC-95mm2.png', NULL, NULL),
(50, 'SV2-4', 'ĐẦU COS CHỮ Y SV2-4, COS CHỈA DÙNG CHO DÂY 1.5-2.5MM', 12, 12, 13, 23, 'China', 300, 300, 1, 'Assets/upload/cos-y.jpg', NULL, NULL),
(51, 'YW1P-1EQM3R', 'Đèn báo phẳng Ø22 220V AC/DC bóng LED đỏ', 12, 10, 10, 32, 'China', 37730, 37730, 1, 'Assets/upload/YW1P-1EQM3R662334531.jpg', NULL, NULL),
(52, 'YW1P-1EQM3Y', 'Đèn báo phẳng Ø22 220V AC/DC bóng LED vàng', 12, 10, 10, 32, 'China', 37730, 37730, 1, 'Assets/upload/YW1P-1EQM3Y100152335.jpg', NULL, NULL),
(53, 'YW1P-1EQM3G', 'Đèn báo phẳng Ø22 220V AC/DC bóng LED xanh lá', 12, 10, 10, 32, 'China', 43120, 43120, 1, 'Assets/upload/YW1P-1EQM3G674630473.jpg', NULL, NULL),
(54, 'YW1P-1EQ4W', 'Đèn báo phẳng Ø22 24V AC/DC bóng LED trắng', 12, 10, 10, 32, 'China', 43120, 43120, 1, 'Assets/upload/YW1P-1EQ4W704072853.jpg', NULL, NULL),
(55, 'YW1P-1EQ4G', 'Đèn báo phẳng Ø22 24V AC/DC bóng LED xanh lá', 12, 10, 10, 32, 'China', 43120, 43120, 1, 'Assets/upload/YW1P-1EQM3G674630473.jpg', NULL, NULL),
(56, 'Prosonic FMU42', 'Ultrasonic measurement Time-of-Flight Model: Prosonic FMU42 - Accuracy: +/- 4 mm or +/- 0,2 % of set', 13, 19, 11, 33, 'EU/G7', 71250000, 71250000, 1, 'Assets/upload/Prosonic_FMU42_PP.jpg', NULL, NULL),
(57, '1SVR730120R3100', 'Electronic timer CT-ARS.11A TIME RELAY, TRUE OF-DELAY', 13, 17, 8, 34, '--', 1607000, 1607000, 1, 'Assets/upload/Screenshot 2024-04-18 140424.png', NULL, NULL),
(58, '1SVR550107R4100', 'RƠ LE THỜI GIAN TRỄ KIỂU ON, 24 V AC/DC, 220-240V AC, 1 CO, 0.3-30 S', 13, 17, 8, 34, '--', 831000, 831000, 1, 'Assets/upload/Screenshot 2024-04-18 140628.png', NULL, NULL),
(59, '6AV2124-JC01-0AX0', 'SIMATIC HMI TP900 Comfort, Comfort Panel, Touch operation, 9″ widescreen TFT display, 16 million col', 12, 13, 3, 18, 'China', 35197000, 35197000, 1, 'Assets/upload/6AV2124-1JC01-0AX0.jpg', NULL, NULL),
(60, '1SFA897113R7001', 'KHỞI ĐỘNG MỀM 75KW (230v), 132 KW (400V), 160KW (500V)', 13, 17, 8, 35, '--', 42247000, 42247000, 1, 'Assets/upload/PSE250.jpg', NULL, NULL),
(61, 'A9K27210', 'Aptomat MCB - 2P -10A, 6KA', 12, 11, 5, 17, '--', 230400, 230400, 1, 'Assets/upload/Screenshot 2024-04-19 105816.png', NULL, NULL),
(62, 'A9K27216', 'Aptomat MCB - 2P -16A, 6KA', 12, 11, 5, 17, '--', 230400, 230400, 1, 'Assets/upload/Screenshot 2024-04-19 105512.png', NULL, NULL),
(63, 'A9F84232', 'Aptomat MCB - 2P -32A, 10kA', 12, 11, 5, 17, '--', 786800, 786800, 1, 'Assets/upload/Screenshot 2024-04-19 105816.png', NULL, NULL),
(64, 'A9K27206', 'Aptomat MCB - 2P -6A, 6KA', 12, 11, 5, 17, '--', 230400, 230400, 1, 'Assets/upload/Screenshot 2024-04-19 105816.png', NULL, NULL),
(65, 'LV510334', 'Aptomat MCCB - 3P -50A, 30kA', 12, 11, 5, 17, '--', 1670900, 1670900, 1, 'Assets/upload/LV510334.JPG', NULL, NULL),
(66, 'LV510347', 'Aptomat MCCB - 4P -100A, 36KA', 12, 11, 5, 17, '--', 2476950, 2476950, 1, 'Assets/upload/LV510347.JPG', NULL, NULL),
(67, 'A9D31632', 'Aptomat RCBO - 2P -63A, 10KA, Iro=30mA', 12, 11, 5, 17, '--', 1216800, 1216800, 1, 'Assets/upload/A9D31632.jpg', NULL, NULL),
(68, 'LC1D115M7', 'Contactor Schneider LC1D115M7 115A 1NO+1NC 220V', 13, 11, 5, 17, '--', 4545600, 4545600, 1, 'Assets/upload/Contactor-Schneider-LC1D115.jpg', NULL, NULL),
(69, 'YW1L-MF2E11QM3R', 'Nút nhấn nhả phẳng Ø22 1NO 1NC đèn LED 220V AC/DC màu đỏ', 12, 10, 10, 36, 'China', 132790, 132790, 1, 'Assets/upload/YW1L-MF2E11QM3R732031786.jpg', NULL, NULL),
(70, 'YW1L-MF2E11QM3G', 'Nút nhấn nhả phẳng Ø22 1NO 1NC đèn LED 220V AC/DC màu xanh lá', 12, 10, 10, 36, 'China', 148960, 148960, 1, 'Assets/upload/YW1L-MF2E11QM3G221004834.jpg', NULL, NULL),
(71, '6ES7214-1HG40-0XB0', 'PLC Siemens S7-1200 CPU 1214C DC/DC/RL', 13, 13, 3, 15, 'China', 4830000, 4830000, 1, 'Assets/upload/6ES7214-1HG40-0XB0.jpg', NULL, NULL),
(72, '6ES7231-4HD32-0XB0', 'SIMATIC S7-1200, Analog input, SM 1231, 4 AI, +/-10 V, +/-5 V, +/-2.5 V, or 0-20 mA/4-20 mA, 12 bit+', 12, 13, 3, 15, 'China', 3319000, 3319000, 1, 'Assets/upload/6es7231-4hd32-0xb0-h1163.png', NULL, NULL),
(73, '6ES7232-4HD32-0XB0', 'SIMATIC S7-1200, ANALOG OUTPUT, SM 1232, 4 AO, +/-10V, 14 BIT RESOLUTION, OR 0 – 20 MA/4 – 20 MA, 13', 12, 13, 3, 15, 'China', 5598000, 5598000, 1, 'Assets/upload/Screenshot 2024-04-18 133436.png', NULL, NULL),
(74, '6ES7241-1CH32-0XB0', 'SIMATIC S7-1200, COMMUNICATION MODULE CM 1241, RS422/485, 9 PIN SUB D (FEMALE) SUPPORTS MESSAGE BASE', 12, 13, 3, 15, 'China', 1883000, 1883000, 1, 'Assets/upload/Screenshot 2024-04-18 133704.png', NULL, NULL),
(75, '6ES7221-1BH32-0XB0', 'SIMATIC S7-1200, DIGITAL INPUT SM 1221, 16 DI, 24VDC, SINK/SOURCE INPUT', 12, 13, 3, 15, 'China', 2568000, 2568000, 1, 'Assets/upload/6ES7221-1BH32-0XB0.jpg', NULL, NULL),
(76, '6ES7222-1BH32-0XB0', 'SIMATIC S7-1200, DIGITAL OUTPUT SM 1222, 16 DO, 24V DC, TRANSISTOR 0.5A', 12, 13, 3, 15, 'China', 2568000, 2568000, 1, 'Assets/upload/6ES7222-1BH32-0XB0.jpg', NULL, NULL),
(77, 'QUINT-PS/1AC/24DC/ 5', 'QUINT-PS/1AC/24DC/ 5 - Power supply unit', 13, 14, 6, 24, '--', 3600000, 3600000, 1, 'Assets/upload/00105887_full_b1500.jpg', NULL, NULL),
(78, 'PLC-RSC-24DC/21', 'Rơ le PLC-RSC-24DC/21 – 2966171 là sản phẩm rơ le thuộc dòng Rơ le PLC, mỏng chỉ 6.2mm, điện áp 24VD', 13, 14, 6, 22, '--', 146800, 146800, 1, 'Assets/upload/00126546_full_b1500.jpg', NULL, NULL),
(79, 'EOCRSS-30S', 'Rơ le điện tử EOCR Schneider EOCRSS-60S 24-240V 3-30A', 12, 10, 5, 22, '--', 480000, 480000, 1, 'Assets/upload/ro-le-dien-tu-eocr-schneider-eocrss.jpg', NULL, NULL),
(80, 'EOCRSS-60S', 'Rơ le điện tử EOCR Schneider EOCRSS-60S 24-240V 5-60A', 12, 10, 5, 22, '--', 480000, 480000, 1, 'Assets/upload/ro-le-dien-tu-eocr-schneider-eocrss.jpg', NULL, NULL),
(81, 'RM22TR33', 'Rơle bảo vệ điện áp 3pha (quá áp, thấp áp, cânbằng pha, thứ tự pha, mấtpha..)', 13, 11, 5, 22, '--', 170300, 170300, 1, 'Assets/upload/Screenshot 2024-04-19 105954.png', NULL, NULL),
(82, 'YW1S-2E10', 'Công tắc xoay 2 vị trí tự giữ Ø22 1NO', 12, 10, 10, 37, 'China', 38220, 38220, 1, 'Assets/upload/cong-tac-xoay-2-vi-tri-idec-YW1S-2E10.png', NULL, NULL),
(83, 'YW1S-3E20', 'Công tắc xoay 3 vị trí tự giữ Ø22 2NO', 12, 10, 10, 37, 'China', 55370, 55370, 1, 'Assets/upload/YW1S013744562.jpg', NULL, NULL),
(84, 'HWAV-27-Y', 'Nhãn tên cho nút nhấn khẩn Φ22 Idec - HWAV-27', 12, 10, 10, 15, 'Japan', 72110, 72110, 1, 'Assets/upload/16cf52d552f843e28cde6a8da78a2c75.jpg', NULL, NULL),
(85, 'YW1B-V4E01R', 'Nút dừng khẩn Idec YW1B-V4E01R size 22mm 1NC', 12, 10, 10, 37, 'China', 50960, 50960, 1, 'Assets/upload/nut-dung-khan-idec-YW1B-V4E01R.png', NULL, NULL),
(86, 'HY-P701A', 'Công tắc hành trình HY-P701A gắn cánh tủ điện', 12, 10, 9, 37, 'Indonesia', 57120, 57120, 1, 'Assets/upload/inli.528199-9.jpg', NULL, NULL),
(87, 'IES1028-4GS-2F(MSC2KM)', 'IES1028-4GS-2F(MSC2KM): Switch công nghiệp hỗ trợ 4 cổng Quang tốc độ 1000Base-SFP, 2 cổng Quang tốc', 12, 15, 14, 26, 'China', 15800000, 15800000, 1, 'Assets/upload/IES1028-4GS-2F(MSC2KM) (1).jpg', NULL, NULL),
(88, 'IES2010-2GS', 'IES2010-2GS | Switch công nghiệp, Layer 2, Unmanaged, 2x1G SFP, 8x100M Copper', 12, 15, 3, 26, 'China', 6000000, 6000000, 1, 'Assets/upload/IES2010-2GS.jpg', NULL, NULL),
(89, 'SW3825DI-442', 'SWB3825DI-442 | Module Quang 3Onedata 1.25G SFP, 20km, TX1310/RX1550, Dual LC, Single Mode', 12, 15, 14, 15, 'China', 750000, 750000, 1, 'Assets/upload/SW3825DI-442.jpg', NULL, NULL),
(90, 'SM 51', 'Sứ Đỡ Thanh Cái SM 51 – Gối Đỡ SM 51', 12, 12, 13, 23, 'China', 8000, 8000, 1, 'Assets/upload/quy-cach-goi-do-thanh-cai-sm.jpg', NULL, NULL),
(91, 'DTC40x10', 'Thanh cái đồng 10x40mm', 16, 12, 13, 38, 'Việt Nam', 864000, 864000, 1, 'Assets/upload/tải xuống.jpg', NULL, NULL),
(92, 'DTC15x3', 'Thanh cái đồng 15x3mm', 16, 8, 13, 38, 'Việt Nam', 97200, 97200, 1, 'Assets/upload/tải xuống.jpg', NULL, NULL),
(93, 'DTC20x4', 'Thanh cái đồng 20x4mm', 16, 12, 13, 38, 'Việt Nam', 172800, 172800, 1, 'Assets/upload/tải xuống.jpg', NULL, NULL),
(94, 'QH-MK 63625 (barem +3%)', 'Cọc thép L63x63x6 mm dài 2,5m thép mạ kẽm nhúng nóng Model: QH-MK 63625 (barem +3%) Xuất xứ: Quang H', 12, 20, 13, 39, 'Việt Nam', 420000, 420000, 1, 'Assets/upload/COC-V-NHUNG-NONG.jpg', NULL, NULL),
(95, 'QH-BT 301010', 'Lập là 300x100x10 mm thép mạ kẽm Model: QH-BT 301010 Xuất xứ: Quang Hưng VN', 12, 20, 13, 39, 'Việt Nam', 450000, 450000, 1, 'Assets/upload/Screenshot 2024-04-20 125025.png', NULL, NULL),
(96, 'Thép D10 mạ kẽm', 'Thép D10 mạ kẽm nhúng nóng Xuất xứ: Việt Nam', 16, 20, 13, 39, 'Việt Nam', 20000, 20000, 1, 'Assets/upload/z3351769758300_67431b393e4bb6fc569742e1cc930453.jpg', NULL, NULL),
(97, 'KT:800x550x350 x1.5 mm', 'Bàn điều khiển 800 x 550 x 350 x 1.5 mm. Màu sơn: 7032', 11, 9, 13, 25, 'Việt Nam', 1680000, 1680000, 1, 'Assets/upload/photo_2023-11-09_16-26-30.jpg', NULL, NULL),
(98, 'KT:2200x800x800 x1.5 mm', 'Tủ trong nhà 2200 x 800 x 800 x 1.5 mm, 2 mặt cánh, 1 mặt 2 lớp cánh  Màu sơn: 7032', 11, 9, 13, 25, 'Việt Nam', 8280000, 8280000, 1, 'Assets/upload/photo_2023-11-25_16-20-11.jpg', NULL, NULL),
(99, 'KT:800x600x300 x1.5 mm', 'Tủ trong nhà 800 x 600 x 300 x 1.5 mm, 1 lớp cánh. Màu sơn: 7032', 11, 9, 13, 25, 'Việt Nam', 1460000, 1460000, 1, 'Assets/upload/photo_2023-11-17_17-40-43.jpg', NULL, NULL),
(100, 'KT:900x700x300 x1.5 mm', 'Tủ trong nhà 900 x 700 x 300 x 1.5 mm, 1 lớp cánh. Màu sơn: 7032', 11, 9, 13, 25, 'Việt Nam', 1740000, 1740000, 1, 'Assets/upload/photo_2023-11-17_17-40-44.jpg', NULL, NULL),
(101, 'GEN64-BASIC-75', 'GENESIS64 BASIC Application Server with Development, Advanced Client, and 75 Configured-Tags', 20, 16, 15, 20, 'US', 10107000, 10107000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(102, 'GEN64-BASIC-150', 'GENESIS64 BASIC Application Server with Development, Advanced Client, and 150 Configured-Tags', 20, 16, 15, 20, 'US', 14674000, 14674000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(103, 'GEN64-BASIC-500', 'GENESIS64 BASIC Application Server with Development, Advanced Client, and 500 Configured-Tags', 20, 8, 15, 20, 'US', 22286000, 22286000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(104, 'GEN64-BASIC-1500', 'GENESIS64 BASIC Application Server with Development, Advanced Client, and 1,500 Configured-Tags', 20, 16, 15, 20, 'US', 40551000, 40551000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(105, 'GEN64-BASIC-5000', 'GENESIS64 BASIC Application Server with Development, Advanced Client, and 5,000 Configured-Tags', 20, 16, 15, 20, 'US', 55774000, 55774000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(106, 'UP15GEN64-BASIC-75', 'SupportWorX Standard for  GENESIS64 BASIC Application Server with Development, Advanced Client, and ', 20, 16, 15, 20, 'US', 1516000, 1516000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(107, 'UP15GEN64-BASIC-150', 'SupportWorX Standard for  GENESIS64 BASIC Application Server with Development, Advanced Client, and ', 20, 8, 15, 20, 'US', 2201000, 2201000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(108, 'UP15GEN64-BASIC-500', 'SupportWorX Standard for  GENESIS64 BASIC Application Server with Development, Advanced Client, and ', 20, 16, 15, 20, 'US', 3343000, 3343000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(109, 'UP15GEN64-BASIC-1500', 'SupportWorX Standard for  GENESIS64 BASIC Application Server with Development, Advanced Client, and ', 20, 16, 15, 20, 'US', 6083000, 6083000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(110, 'UP15GEN64-BASIC-5000', 'SupportWorX Standard for  GENESIS64 BASIC Application Server with Development, Advanced Client, and ', 20, 16, 15, 20, 'US', 8366000, 8366000, 1, 'Assets/upload/GENESIS64.png', NULL, NULL),
(111, 'HW KEY-USB+', 'Hardware key, requires available USB port.', 12, 16, 15, 20, 'US', 7117000, 7117000, 1, 'Assets/upload/HardwareKey ICONICS.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietban`
--
ALTER TABLE `chitietban`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonBan` (`IdDonBan`),
  ADD KEY `IdSP` (`IdSP`);

--
-- Indexes for table `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonBan` (`IdDuAn`),
  ADD KEY `IdSP` (`IdSP`);

--
-- Indexes for table `chitietmua`
--
ALTER TABLE `chitietmua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonMua` (`IdDonMua`),
  ADD KEY `IdDVT` (`IdDVT`);

--
-- Indexes for table `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdQuyen` (`IdQuyen`);

--
-- Indexes for table `donban`
--
ALTER TABLE `donban`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdKH` (`IdKH`);

--
-- Indexes for table `donmua`
--
ALTER TABLE `donmua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdNCC` (`IdNCC`);

--
-- Indexes for table `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdKH` (`IdKH`);

--
-- Indexes for table `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhomthietbi`
--
ALTER TABLE `nhomthietbi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDVT` (`IdDVT`),
  ADD KEY `IdNCC` (`IdNCC`),
  ADD KEY `sanpham_ibfk_3` (`IdNhomTB`),
  ADD KEY `sanpham_ibfk_4` (`IdHangSX`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietban`
--
ALTER TABLE `chitietban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chitietduan`
--
ALTER TABLE `chitietduan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `chitietmua`
--
ALTER TABLE `chitietmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donban`
--
ALTER TABLE `donban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donmua`
--
ALTER TABLE `donmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `duan`
--
ALTER TABLE `duan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nhomthietbi`
--
ALTER TABLE `nhomthietbi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietban`
--
ALTER TABLE `chitietban`
  ADD CONSTRAINT `chitietban_ibfk_1` FOREIGN KEY (`IdDonBan`) REFERENCES `donban` (`Id`),
  ADD CONSTRAINT `chitietban_ibfk_2` FOREIGN KEY (`IdSP`) REFERENCES `sanpham` (`Id`);

--
-- Constraints for table `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD CONSTRAINT `chitietduan_ibfk_1` FOREIGN KEY (`IdDuAn`) REFERENCES `duan` (`Id`),
  ADD CONSTRAINT `chitietduan_ibfk_2` FOREIGN KEY (`IdSP`) REFERENCES `sanpham` (`Id`);

--
-- Constraints for table `chitietmua`
--
ALTER TABLE `chitietmua`
  ADD CONSTRAINT `chitietmua_ibfk_1` FOREIGN KEY (`IdDonMua`) REFERENCES `donmua` (`Id`),
  ADD CONSTRAINT `chitietmua_ibfk_2` FOREIGN KEY (`IdDVT`) REFERENCES `donvitinh` (`Id`);

--
-- Constraints for table `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD CONSTRAINT `danhsachquyen_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `danhsachquyen_ibfk_2` FOREIGN KEY (`IdQuyen`) REFERENCES `quyen` (`Id`);

--
-- Constraints for table `donban`
--
ALTER TABLE `donban`
  ADD CONSTRAINT `donban_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `donban_ibfk_2` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`Id`);

--
-- Constraints for table `donmua`
--
ALTER TABLE `donmua`
  ADD CONSTRAINT `donmua_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `donmua_ibfk_2` FOREIGN KEY (`IdNCC`) REFERENCES `nhacungcap` (`Id`);

--
-- Constraints for table `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `duan_ibfk_2` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`Id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IdDVT`) REFERENCES `donvitinh` (`Id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`IdNCC`) REFERENCES `nhacungcap` (`Id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`IdNhomTB`) REFERENCES `nhomthietbi` (`Id`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`IdHangSX`) REFERENCES `hangsx` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
