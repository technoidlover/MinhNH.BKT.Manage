-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2024 lúc 05:12 AM
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
(1, 2, 2, 0, 200000, 300, 60000000);

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
(2, '2024-05-09 08:39:00', 1, 1, 60000000, '0');

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
(5, 'Hộp');

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
(1, 'BKT Sample', '0395342134 ', 'BKT_Customer@bkt.com.vn', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Id` int(11) NOT NULL,
  `TenNCC` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`Id`, `TenNCC`, `DienThoai`, `Email`, `DiaChi`) VALUES
(1, 'Demo', '0123123123', 'demo@gmail.com', 'HN');

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
(1, 'BKT.ADMIN', '0123412341', 'admin@bkt.vn', 'HN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(2, 'user', '0123456789', 'user@user.com', 'HN', 'user', '21232f297a57a5a743894a0e4a801fc3', 'manage', '1'),
(3, 'user2', '0123123123', 'user2@user2.vn', 'HN', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user', '1');

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
  `TenSP` varchar(100) DEFAULT NULL,
  `IdDVT` int(11) DEFAULT NULL,
  `IdNCC` int(11) DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Id`, `TenSP`, `IdDVT`, `IdNCC`, `GiaMua`, `GiaBan`, `SoLuong`) VALUES
(2, 'Demo', 4, 1, 100000, 200000, 0);

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
  ADD KEY `IdNCC` (`IdNCC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietban`
--
ALTER TABLE `chitietban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitietmua`
--
ALTER TABLE `chitietmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhsachquyen`
--
ALTER TABLE `danhsachquyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donban`
--
ALTER TABLE `donban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donmua`
--
ALTER TABLE `donmua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IdDVT`) REFERENCES `donvitinh` (`Id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`IdNCC`) REFERENCES `nhacungcap` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
