-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 07:31 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dangky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `Images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `username`, `pass`, `email`, `fullname`, `birthday`, `gender`, `Images`) VALUES
(2, 'vuvanduy', 'e10adc3949ba59abbe56e057f20f883e', 'abcd@gmail.com', 'asdasd', '2020-08-26', 'Female', 'Screenshot (18).png'),
(3, 'phamvanchung', 'e10adc3949ba59abbe56e057f20f883e', 'adadasd@gmail.ccom', 'asdasd', '2020-08-15', 'Female', 'untitled.png'),
(4, 'phamdongtruong', 'e10adc3949ba59abbe56e057f20f883e', 'anhkhoa516ha@gmail.com', 'asdasd', '2020-08-19', 'Male', 'Screenshot (13).png'),
(5, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'vu.van.duy239@gmail.com', 'vuvanduy', '2020-08-04', 'Female', ''),
(6, 'khoatrando516', 'e10adc3949ba59abbe56e057f20f883e', 'anhkhoa@gmail.com', 'anhkhoa', '2020-08-06', 'Male', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `productnumber` varchar(255) NOT NULL,
  `unitprice` varchar(255) NOT NULL,
  `Images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `productname`, `productnumber`, `unitprice`, `Images`) VALUES
(1, 'dasd', 'dsad', 'dsad', 'untitled.png'),
(2, 'dsad', 'dasd', 'dasdsa', 'untitled.png'),
(3, '12345', 'dsds', 'dsds', 'untitled.png'),
(4, 'quan ao', 'ao', '222', 'untitled.png'),
(5, 'dsad', 'dsada', 'dsadas', 'untitled.png'),
(6, 'sdf', 'sdf', 'sdf', '96462.jpg'),
(7, 'sdfsdfsdf', 'sdfsdf', 'sdfsdfsdf', 'Stubai-Glacier-Snowy-Mountains-Wallpaper-HD.jpg'),
(8, 'Vu Nhu Can', '123123', '123123', 'Screenshot (2).png'),
(9, 'FIFA', '2', '2000', 'Screenshot (222).png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
