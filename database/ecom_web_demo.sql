-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2023 at 11:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_web_demo`
--
CREATE DATABASE IF NOT EXISTS `ecom_web_demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecom_web_demo`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`) VALUES
(1, 'Nam', NULL),
(2, 'Nữ', NULL),
(3, 'Trẻ em', NULL),
(4, 'Siêu sale tháng 11', NULL),
(14, 'Áo', 1),
(15, 'Quần nam', 1),
(16, 'Giày & Dép', 1),
(17, 'Phụ kiện', 1),
(18, 'Áo thun', 14),
(19, 'Áo khoác nam', 14),
(21, 'Áo Polo', 14),
(22, 'Áo sơ mi', 14),
(23, 'Áo phao', 14),
(25, 'Áo len', 14),
(26, 'Áo vest', 14),
(27, 'Quần jeans', 15),
(28, 'Quẩn short', 15),
(29, 'Quần dài', 15),
(30, 'Quần khaki', 15),
(31, 'Quần tây', 15),
(32, 'Giày / Dép', 16),
(33, 'Phụ kiện', 17),
(34, 'Áo', 2),
(35, 'Áo khoác', 2),
(36, 'Áo dài', 2),
(37, 'Set bộ', 2),
(38, 'Quần & Jumpsuit', 2),
(39, 'Chân váy', 2),
(40, 'Đầm', 2),
(41, 'Senora', 2),
(42, 'Phụ kiện', 2),
(43, 'Áo sơ mi', 34),
(44, 'Áo kiểu', 34),
(45, 'Áo croptop', 34),
(46, 'Áo dáng peplum', 34),
(47, 'Áo thun / len tay ngắn', 34),
(48, 'Áo thun / len dài tay', 34),
(49, 'Áo vest / blazer', 35),
(50, 'Áo khoác dáng lửng', 35),
(51, 'Áo dạ', 35),
(52, 'Áo phao', 35),
(53, 'Áo khoác len', 35),
(54, 'Áo măng tô', 35),
(55, 'Set bộ vest', 37),
(56, 'Set bộ kiểu', 37),
(58, 'Set bộ thun', 37),
(59, 'Quần suông', 38),
(60, 'Quần jeans', 38),
(61, 'Quần ống loe', 38),
(62, 'Quần ống đứng / baggy', 38),
(63, 'Quần lửng / short', 38),
(64, 'Quần thun', 38),
(65, 'Jumpsuit', 38),
(66, 'Chân váy bút chì', 39),
(67, 'Chân váy chữ A', 39),
(68, 'Chân váy xếp ly', 39),
(69, 'Chân váy kiểu', 39),
(70, 'Chân váy jeans', 39),
(71, 'Đầm kiểu', 40),
(72, 'Đầm maxi / voan', 40),
(73, 'Đầm thun', 40),
(74, 'Senora - Đầm dạ hội', 41),
(75, 'Đồ lót', 42),
(76, 'Phụ kiện', 42),
(77, 'Giày / dép & Sandals', 42),
(78, 'Túi / ví', 42),
(79, 'Áo dài', 36),
(80, 'Bé gài', 3),
(81, 'Bé trai', 3),
(82, 'Áo bé gái', 80),
(83, 'Quần bé gái', 80),
(84, 'Váy bé gái', 80),
(85, 'Chân váy bé gái', 80),
(86, 'Phụ kiện bé gái', 80),
(87, 'Áo bé trai', 81),
(88, 'Quần bé trai', 81),
(89, 'Phụ kiện bé trai', 81);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_img`, `product_desc`, `product_brand`, `product_name`, `product_price`, `category_id`) VALUES
(17, '26a096a6a1cd164effeb6e7bcbe9e93f.jpg', 'Áo sơ mi croptop trẻ trung, năng động, thích hợp với nàng yêu thích sự cá tính.\r\n\r\nThiết kế áo dáng croptop với cổ đức cùng tay dài. \r\n\r\nÁo được tạo kiểu 2 lớp: 1 lớp cổ V bên trong và  1 lớp áo giả khoác bên ngoài. \r\n\r\nNàng có thể lựa chọn mix áo cùng chân váy, quần dài, quần short đều rất phù hợp. ', 'Ivymoda', 'ÁO SƠ MI CROPTOP', 1290000, 43),
(18, '3dd38dc22de76b4bb376ce28cfd0fcfa.jpg', 'Sang trọng, thời thượng qua mẫu sơ mi lụa được Quý cô yêu thích từ nhà IVY moda. \r\n\r\nÁo cổ thuyền, dáng thường, thiết kế vai chờm độc đáo cùng điểm nhấn rút vai mới lạ. Để từ đó tạo bên tay lệch bắt mắt. \r\n\r\nCùng với đó, thiết kế lựa chọn chất liệu lụa mềm mại, mang đến cảm giác mặc nhẹ nhàng và vô cùng thoải mái. ', 'Ivymoda', 'ÁO LỤA CỔ THUYỀN', 890000, 43);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `product_color`, `product_size`, `product_quantity`) VALUES
(25, 17, 'Trắng', 'M', 10),
(26, 18, 'Vàng mustard', 'L', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `href_value` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `href_value`, `product_id`) VALUES
(41, 'e2119c7d41f71513c83fc049fd360b02.jpg', 25),
(42, 'e36f097765ca983eb9f0fef09930da51.jpg', 25),
(43, 'd975e60753276755830ce5148b88a0bb.jpg', 25),
(44, 'a08f06469ed908602a057220f6276a39.jpg', 25),
(45, 'a7d33fe2ae98dc3ae820ad95d9667f31.jpg', 25),
(46, '1049df0db495cbe33af760db03218831.jpg', 25),
(47, '26a096a6a1cd164effeb6e7bcbe9e93f.jpg', 25),
(48, '3dd38dc22de76b4bb376ce28cfd0fcfa (1).jpg', 26),
(49, '45dcd6239d55b0c3663a39422d77a611.jpg', 26),
(50, 'b159e2a61c6bd8423c5fa7c29225f2fe.jpg', 26),
(51, 'a6528be04d16a3ee954d2ddeaf03d744.jpg', 26),
(52, '99e07a9b3279837295b83734591233ac.jpg', 26),
(53, 'af19db1a796fce1cfa55ec52d0a139e0.jpg', 26),
(54, '51f813755233b002d8f4464b12771e32.jpg', 26),
(55, 'https://lh6.googleusercontent.com/xr1tWQ0zigU8mFvMGfMmW2oiX9yinGbn8LaRLMHnPXvsh7Bg1ABs2Tk8ZfAoQMv6mPw9Id-iaSB1zuU5UTJmCcnTybFvdiaC-EHxrdTbRmNJT22y1tmSb5rE1--xKXg3TrmwO2z3', 17),
(56, 'https://lh6.googleusercontent.com/xr1tWQ0zigU8mFvMGfMmW2oiX9yinGbn8LaRLMHnPXvsh7Bg1ABs2Tk8ZfAoQMv6mPw9Id-iaSB1zuU5UTJmCcnTybFvdiaC-EHxrdTbRmNJT22y1tmSb5rE1--xKXg3TrmwO2z3', 18),
(57, 'https://mabustudio.com/?attachment_id=3204', 17),
(58, 'https://mabustudio.com/?attachment_id=3204', 17);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rate_value` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `role`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$f0qAzSGAKrW6LfyFv7Gl9OF0qNCCxkC6EDmkJ.0SKJm7kVDk9oAZq', 'Nguyen Tien Dat', 1),
(7, 'admin3', 'tannp.42.student@fit.tdc.edu.vn', '$2y$10$TEzQ/de3x5qGSvhEbyLpPOUvLcLXT2pZkWFIvyF4P5abGmubzXXBC', 'Nguyen Phuong Tan', 0),
(9, 'B1HA6654', 'tannp.42.student@fit.tdc.edu.vn', '$2y$10$qQAH81EBhSri3y5xQiINLO4QC2mvYJk6HbpfPmVYMvnd5X8ZhcBGu', 'Nguyen Phuong Tan', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_ibfk_1` (`parent_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_ibfk_1` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
