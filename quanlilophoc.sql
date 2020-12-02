-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2020 lúc 04:44 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlilophoc`
--
CREATE DATABASE IF NOT EXISTS `quanlilophoc` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `quanlilophoc`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enrollment`
--

CREATE TABLE `enrollment` (
  `ID` int(30) NOT NULL,
  `MaLopHoc` int(30) NOT NULL,
  `username` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `enrollment`
--

INSERT INTO `enrollment` (`ID`, `MaLopHoc`, `username`) VALUES
(7, 18, 'VanToan'),
(8, 19, 'VanToan'),
(9, 20, 'VanToan'),
(10, 21, 'VanToan'),
(11, 22, 'VanToan'),
(12, 23, 'Loc'),
(13, 24, 'Loc'),
(14, 18, 'minh'),
(15, 20, 'minh'),
(16, 22, 'minh'),
(17, 23, 'minh'),
(18, 25, 'minh'),
(19, 19, 'Hoàng'),
(20, 20, 'Hoàng'),
(21, 22, 'Hoàng'),
(22, 18, 'Hoàng'),
(23, 17, 'Xuan'),
(24, 20, 'Xuan'),
(25, 23, 'Xuan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLopHoc` int(30) NOT NULL,
  `TenLopHoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `PhongHoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `MonHoc` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `Creater` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`MaLopHoc`, `TenLopHoc`, `PhongHoc`, `MonHoc`, `Creater`) VALUES
(18, 'CNTT', 'A405', 'Phân tích thiết kế và giải thu', 'VanToan'),
(19, 'CNTT', 'A0504', 'Nhập môn mạng máy tính', 'VanToan'),
(20, 'Toán', 'B203', 'Toán tổ hợp và đồ thị', 'VanToan'),
(21, 'Toán', 'C501', 'Xác suất và thống kê', 'VanToan'),
(22, 'Bảo mật', 'D202', 'Nhập môn Bảo mật máy tính', 'VanToan'),
(23, 'Ứng dụng CNTT', 'C0102', 'Game và ứng dụng', 'Loc'),
(24, 'Ứng dụng CNTT', 'D0402', 'Web và ứng dụng', 'Loc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`) VALUES
('khoatkfacebook@gmail.com', '645d359a11c4cd58539deae9cbaa66ca');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` int(11) NOT NULL,
  `ChucVu` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `HoTen`, `NgaySinh`, `Email`, `SoDienThoai`, `ChucVu`) VALUES
('Chien', '123456', 'Đỗ Minh Chiến', '2000-06-02', 'Chien@gmail.com', 2, 'HocVien'),
('Gioi', '123456', 'Đoàn Ngọc Giỏi', '2000-01-02', 'Gioi@gmail.com', 948375847, 'Admin'),
('Hoàng', '123456', 'Võ Hoàng', '2000-05-02', 'Hoang@gmail.com', 203326449, 'HocVien'),
('khoa', '123456', 'Khoa Minh', '2020-11-11', 'khoatkfacebook@gmail.com', 985736895, 'HocVien'),
('Loc', '123456', 'Chế Hoài Lộc', '2020-11-18', 'loc@gmail.com', 969606034, 'GiaoVien'),
('minh', '123456', 'Minh Nguyen', '2020-11-12', 'minh@gmail.com', 969606034, 'HocVien'),
('VanToan', '123456', 'Nguyễn Văn Toàn', '2000-10-01', 'Toan@gmail.com', 987657788, 'GiaoVien'),
('Xuan', '123456', 'Pham Xuan', '2000-10-01', 'Xuan@gmail.com', 987657788, 'HocVien');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLopHoc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `MaLopHoc` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
