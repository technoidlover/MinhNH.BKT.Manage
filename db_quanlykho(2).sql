-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2024 lúc 03:11 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_quanlykho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietban`
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
-- Đang đổ dữ liệu cho bảng `chitietban`
--

INSERT INTO `chitietban` (`Id`, `IdDonBan`, `IdSP`, `GiaMua`, `GiaBan`, `SoLuong`, `ThanhTien`) VALUES
(1, 2, 2, 0, 200000, 300, 60000000),
(4, 5, 2, 0, 200000, 1, 200000),
(8, NULL, 3, NULL, 2000, 0, 0),
(9, NULL, 2, NULL, 200000, 0, 0),
(16, NULL, 3, NULL, 2000, 0, 0),
(17, NULL, 2, NULL, 200000, 0, 0),
(18, NULL, 2, NULL, 200000, 0, 0),
(19, NULL, 2, NULL, 200000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietduan`
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
-- Đang đổ dữ liệu cho bảng `chitietduan`
--

INSERT INTO `chitietduan` (`Id`, `IdDuAn`, `IdSP`, `GiaMua`, `GiaBan`, `SoLuong`, `ThanhTien`) VALUES
(22, 28, 2, NULL, 200000, 0, 0),
(23, 28, 2, NULL, 200000, 1, 200000),
(24, 29, 2, NULL, 200000, 0, 0),
(25, 29, 2, NULL, 200000, 1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmua`
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

--
-- Đang đổ dữ liệu cho bảng `chitietmua`
--

INSERT INTO `chitietmua` (`Id`, `IdDonMua`, `TenSP`, `IdDVT`, `GiaMua`, `SoLuong`, `ThanhTien`) VALUES
(5, 17, '1112222233333', 4, 2147483647, 2147483647, 2147483647),
(8, 20, 'demo3', 4, 11111111, 1, 11111111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachquyen`
--

CREATE TABLE `danhsachquyen` (
  `Id` int(11) NOT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachquyen`
--

INSERT INTO `danhsachquyen` (`Id`, `IdNV`, `IdQuyen`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donban`
--

CREATE TABLE `donban` (
  `Id` int(11) NOT NULL,
  `NgayBan` datetime DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdKH` int(11) DEFAULT NULL,
  `Tong` int(11) DEFAULT NULL,
  `TrangThai` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donban`
--

INSERT INTO `donban` (`Id`, `NgayBan`, `IdNV`, `IdKH`, `Tong`, `TrangThai`) VALUES
(2, '2024-05-09 08:39:00', 1, 1, 60000000, '1'),
(4, '2024-05-14 15:12:00', 6, 1, 200000, '1'),
(5, '2024-05-27 10:39:00', 1, 1, 200000, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donmua`
--

CREATE TABLE `donmua` (
  `Id` int(11) NOT NULL,
  `NgayMua` datetime DEFAULT NULL,
  `IdNV` int(11) DEFAULT NULL,
  `IdNCC` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL,
  `TrangThai` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donmua`
--

INSERT INTO `donmua` (`Id`, `NgayMua`, `IdNV`, `IdNCC`, `ThanhTien`, `TrangThai`) VALUES
(16, '2024-05-23 10:41:00', 6, 3, 111222333, '0'),
(17, '2024-05-23 10:43:00', 6, 3, 2147483647, '1'),
(20, '2024-05-23 10:54:00', 6, 1, 11111111, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `Id` int(11) NOT NULL,
  `DonVi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`Id`, `DonVi`) VALUES
(4, 'Cái'),
(5, 'Hộp'),
(7, ';;;'),
(8, 'Bộ'),
(9, 'Gói'),
(10, 'Tủ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duan`
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
-- Đang đổ dữ liệu cho bảng `duan`
--

INSERT INTO `duan` (`Id`, `NgayBan`, `IdNV`, `IdKH`, `Tong`, `TrangThai`) VALUES
(28, '2024-05-30 16:25:00', 1, 1, 200000, '0'),
(29, '2024-05-31 08:10:00', 1, 1, 200000, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `Id` int(11) NOT NULL,
  `TenHang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`Id`, `TenHang`) VALUES
(1, 'mitsubishi'),
(2, 'tàu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Id` int(11) NOT NULL,
  `TenKH` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Id`, `TenKH`, `DienThoai`, `Email`, `DiaChi`) VALUES
(1, 'BKT Sample', '0395342134 ', 'BKT_Customer@bkt.com.vn', 'Hà Nội'),
(2, 'kh2', '0123456789', 'k285030389@hupes.edu.vn', 'long bien'),
(3, 'Công ty A', '0365 363 442', 'khuongnd@bkt.com.vn', 'Hoài Đức Hà Nội'),
(4, 'Anh Điệp Mitsubishi - BMS Compal', '123', 'diep@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
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
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`Id`, `TenNCC`, `NguoiLienHe`, `DienThoai`, `Email`, `DiaChi`, `MST`) VALUES
(1, 'Demo', 'dmo001', '0123123123', 'demo@gmail.com', 'HN', '123456789'),
(2, 'user11', 'user11', '0123456789', 'demo122@demo.com', 'HN', '123456789'),
(3, 'Công Ty Cổ Phần BKT  ', 'Mr. Khuong', '096 505 2560  ', 'khuongnd@bkt.com.vn', 'A21  (ghi chú thiếu cột mã số thuế cty) ', '123456789'),
(4, 'demo', 'user11', '0123456789', '5950253f@mozej.com', 'HN', '1234567890'),
(5, 'BKT Sample1', 'user11', '0123456789', '5950253f@mozej.com', 'HN', '1234567890'),
(6, 'Công ty CP ABC', 'Mr. Khương', '0123456789', 'abc@gmail.com', 'Hà Nội', '00000000001'),
(7, 'CÔNG TY CỔ PHẦN CƠ ĐIỆN THƯƠNG MẠI SƠN HÀ', 'Quang Vương', '0969740985', 'codienthuongmaisonha@gmail.com', 'Thôn Dậu 1, Xã Di Trạch, Huyện Hoài Đức, Thành phố Hà Nội, Việt Nam', '0104438937');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
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
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id`, `TenNV`, `DienThoai`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `Quyen`, `IsActive`) VALUES
(1, 'BKT.ADMIN', '0123412341', 'admin@bkt.vn', 'HN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '1'),
(2, 'user', '0123456789', 'user@user.com', 'HN', 'user', '21232f297a57a5a743894a0e4a801fc3', 'Manage', '1'),
(3, 'user2', '0123123123', 'user2@user2.vn', 'HN', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'User', '1'),
(6, 'minhnh1', '0123456789', 'testuser@gmail.com', 'HN', 'minhnh1', 'ba1abcadaf8ac110612bba1347b0c0e8', 'Admin', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomthietbi`
--

CREATE TABLE `nhomthietbi` (
  `Id` int(11) NOT NULL,
  `TenNhom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomthietbi`
--

INSERT INTO `nhomthietbi` (`Id`, `TenNhom`) VALUES
(1, 'tủ điện 1'),
(2, 'tụ điện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `Id` int(11) NOT NULL,
  `TenQuyen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`Id`, `TenQuyen`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
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
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Id`, `MaSP`, `TenSP`, `IdDVT`, `IdNCC`, `IdHSX`, `IdNTB`, `XuatXu`, `GiaMua`, `GiaBan`, `SoLuong`, `imgUrl`, `IdNhomTB`, `IdHangSX`) VALUES
(2, 'sample', 'Demo', 4, 1, 1, 2, 'sample', 100000, 200000, 2996, 'Assets/upload/Screenshot 2024-03-26 222017.png', 1, 1),
(3, 'sample', 'demo2222', 4, 1, 1, 1, 'sample', 1000, 2000, NULL, NULL, 1, 1),
(21, 'cn', 'mẫu', 9, 1, 2, 2, 'cn', 1, 1, NULL, 'Assets/upload/localhost_3001_signup.png', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietban`
--
ALTER TABLE `chitietban`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonBan` (`IdDonBan`),
  ADD KEY `IdSP` (`IdSP`);

--
-- Chỉ mục cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonBan` (`IdDuAn`),
  ADD KEY `IdSP` (`IdSP`);

--
-- Chỉ mục cho bảng `chitietmua`
--
ALTER TABLE `chitietmua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDonMua` (`IdDonMua`),
  ADD KEY `IdDVT` (`IdDVT`);

--
-- Chỉ mục cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdQuyen` (`IdQuyen`);

--
-- Chỉ mục cho bảng `donban`
--
ALTER TABLE `donban`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdKH` (`IdKH`);

--
-- Chỉ mục cho bảng `donmua`
--
ALTER TABLE `donmua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdNCC` (`IdNCC`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdNV` (`IdNV`),
  ADD KEY `IdKH` (`IdKH`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhomthietbi`
--
ALTER TABLE `nhomthietbi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdDVT` (`IdDVT`),
  ADD KEY `IdNCC` (`IdNCC`),
  ADD KEY `sanpham_ibfk_3` (`IdNhomTB`),
  ADD KEY `sanpham_ibfk_4` (`IdHangSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietban`
--
ALTER TABLE `chitietban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `chitietmua`
--
ALTER TABLE `chitietmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donban`
--
ALTER TABLE `donban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `donmua`
--
ALTER TABLE `donmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `duan`
--
ALTER TABLE `duan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhomthietbi`
--
ALTER TABLE `nhomthietbi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietban`
--
ALTER TABLE `chitietban`
  ADD CONSTRAINT `chitietban_ibfk_1` FOREIGN KEY (`IdDonBan`) REFERENCES `donban` (`Id`),
  ADD CONSTRAINT `chitietban_ibfk_2` FOREIGN KEY (`IdSP`) REFERENCES `sanpham` (`Id`);

--
-- Các ràng buộc cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD CONSTRAINT `chitietduan_ibfk_1` FOREIGN KEY (`IdDuAn`) REFERENCES `duan` (`Id`),
  ADD CONSTRAINT `chitietduan_ibfk_2` FOREIGN KEY (`IdSP`) REFERENCES `sanpham` (`Id`);

--
-- Các ràng buộc cho bảng `chitietmua`
--
ALTER TABLE `chitietmua`
  ADD CONSTRAINT `chitietmua_ibfk_1` FOREIGN KEY (`IdDonMua`) REFERENCES `donmua` (`Id`),
  ADD CONSTRAINT `chitietmua_ibfk_2` FOREIGN KEY (`IdDVT`) REFERENCES `donvitinh` (`Id`);

--
-- Các ràng buộc cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  ADD CONSTRAINT `danhsachquyen_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `danhsachquyen_ibfk_2` FOREIGN KEY (`IdQuyen`) REFERENCES `quyen` (`Id`);

--
-- Các ràng buộc cho bảng `donban`
--
ALTER TABLE `donban`
  ADD CONSTRAINT `donban_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `donban_ibfk_2` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`Id`);

--
-- Các ràng buộc cho bảng `donmua`
--
ALTER TABLE `donmua`
  ADD CONSTRAINT `donmua_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `donmua_ibfk_2` FOREIGN KEY (`IdNCC`) REFERENCES `nhacungcap` (`Id`);

--
-- Các ràng buộc cho bảng `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_ibfk_1` FOREIGN KEY (`IdNV`) REFERENCES `nhanvien` (`Id`),
  ADD CONSTRAINT `duan_ibfk_2` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`Id`);

--
-- Các ràng buộc cho bảng `sanpham`
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
