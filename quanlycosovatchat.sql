-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2025 lúc 03:24 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlycosovatchat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assets`
--

CREATE TABLE `assets` (
  `Id_Assets` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Status` varchar(200) NOT NULL DEFAULT 'Tốt',
  `Location` varchar(200) NOT NULL,
  `PurchaDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `assets`
--

INSERT INTO `assets` (`Id_Assets`, `Name`, `Img`, `Type`, `Status`, `Location`, `PurchaDate`) VALUES
(14, 'minh', 'Screenshot_2024-10-04_101538.png', 'Máy', 'Tốt', 'ha noi', '2025-01-10'),
(15, 'Vũ Kiệt', 'Screenshot_2024-10-04_101538.png', '123', 'Tốt', 'ha noi', '2025-01-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maintenance`
--

CREATE TABLE `maintenance` (
  `Id` int(10) NOT NULL,
  `Id_Assets` int(10) NOT NULL,
  `MaintenanceDate` date NOT NULL DEFAULT current_timestamp(),
  `Description` text NOT NULL,
  `MaintenanceStatus` varchar(100) NOT NULL DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `maintenance`
--

INSERT INTO `maintenance` (`Id`, `Id_Assets`, `MaintenanceDate`, `Description`, `MaintenanceStatus`) VALUES
(1, 15, '2025-01-10', '123', 'Đang xử lý'),
(2, 14, '2025-01-10', 'hỏng', 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id_User` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Id_User`, `username`, `password`, `role`) VALUES
(1, 'hk123', '123', 'user'),
(2, 'minhha1192003@gamil.com', '123', 'user'),
(3, 'kiet', '123', 'user'),
(4, 'tomsmith', '123', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`Id_Assets`);

--
-- Chỉ mục cho bảng `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Assets` (`Id_Assets`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `assets`
--
ALTER TABLE `assets`
  MODIFY `Id_Assets` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`Id_Assets`) REFERENCES `assets` (`Id_Assets`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
