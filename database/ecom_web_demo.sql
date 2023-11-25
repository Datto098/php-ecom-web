-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 21, 2023 lúc 05:35 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecom_web_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`) VALUES
(1, 'Nam', NULL),
(2, 'Nữ', NULL),
(3, 'Trẻ em', NULL),
(4, 'Siêu sale', NULL),
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
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_img`, `product_desc`, `product_brand`, `product_name`, `product_price`, `category_id`) VALUES
(17, '26a096a6a1cd164effeb6e7bcbe9e93f.jpg', 'Áo sơ mi croptop trẻ trung, năng động, thích hợp với nàng yêu thích sự cá tính.\r\n\r\nThiết kế áo dáng croptop với cổ đức cùng tay dài. \r\n\r\nÁo được tạo kiểu 2 lớp: 1 lớp cổ V bên trong và  1 lớp áo giả khoác bên ngoài. \r\n\r\nNàng có thể lựa chọn mix áo cùng chân váy, quần dài, quần short đều rất phù hợp. ', 'Ivymoda', 'ÁO SƠ MI CROPTOP', 1290000, 43),
(18, '3dd38dc22de76b4bb376ce28cfd0fcfa.jpg', 'Sang trọng, thời thượng qua mẫu sơ mi lụa được Quý cô yêu thích từ nhà IVY moda. \r\n\r\nÁo cổ thuyền, dáng thường, thiết kế vai chờm độc đáo cùng điểm nhấn rút vai mới lạ. Để từ đó tạo bên tay lệch bắt mắt. \r\n\r\nCùng với đó, thiết kế lựa chọn chất liệu lụa mềm mại, mang đến cảm giác mặc nhẹ nhàng và vô cùng thoải mái. ', 'Ivymoda', 'ÁO LỤA CỔ THUYỀN', 890000, 43),
(19, '167bfea45ab9765d9161a2bb2e8f18e7.jpg', 'Thiết kế áo kiểu nhẹ nhàng, thanh lịch và tinh tế.\r\n\r\nÁo dáng suông, cổ tròn cách điệu, có khuy cài. Tay áo thiết kế cánh dơi nhẹ, mang  đến cảm giác mềm mại.\r\n\r\nĐặc biệt, áo sử dụng chất liệu lụa sang trọng, thích hợp diện trong nhiều hoàn cảnh khác nhau. ', 'Ivymoda', 'ÁO LỤA TAY KIỂU', 850000, 44),
(20, '8594ae701bddf9d9c0127a350d9dff28.jpg', 'Nàng công sở yêu thích một chút điệu đà, nữ tính chắc chắn không nên bỏ lỡ thiết kế sơ mi Peplum cách điệu lần này.\r\n\r\nÁo được lên dáng xếp tà tạo cổ chữ V quyến rũ, phần tay chờm có điểm rút dây điều chỉnh độ co. Thân dưới áo tạo tà Peplum độc đáo, nhẹ nhàng, mềm mại nhưng vẫn thật  sang trọng và thời thượng.\r\n\r\nGợi ý nàng mix áo cùng chân váy hoặc quần đều phù hợp, thêm các phụ kiện như túi sách, vòng cổ... để hoàn thiện cho Outfit của  mình. ', 'Ivymoda', 'ÁO SƠ MI XẾP TÀ PEPLUM', 890000, 44),
(21, '5417f5b64699195d74da5ccda0b979c0.jpeg', 'Set đồ bao gồm áo croptop và zuýp bút chì. Áo dáng crop xếp ly dưới, tay xếp ly phồng. Áo cái bằng hàng khuy trắng thanh lịch. Chân váy cạp cao, cạp may tạo kiểu, độ dài qua đầu gối. Set đồ được làm từ chất liệu tuysi cao cấp giúp giữ form dáng luôn chỉn chu.\r\n\r\nChẳng cần phải đau đầu khi phối đồ, hãy lựa chọn một outfit theo set khi đi làm hoặc xuống phố. Bộ đôi áo croptop và zuýp sẽ giúp tôn lên dáng xinh của nàng.', 'Ivymoda', 'SET ÁO CROPTOP TAY BỒNG VÀ ZUÝP BÚT CHÌ', 445000, 45),
(22, '071952a1a3767560aef35a53b1d80109.jpg', 'Áo kiểu nữ cổ V tay lửng, cổ tay bo chun phồng, áo cài bằng hàng khuy phía trước. Dáng áo croptop, eo may chun nhúm bản to trẻ trung, tôn vòng eo nàng. Chất liệu vải lụa mềm mịn, thoáng mát cùng họa tiết kẻ ngang và viền lông nổi độc đáo.\r\n\r\nThiết kế giúp làm tôn lên đường nét tinh tế, mềm mại và quyến rũ của phái đẹp. Kết hợp áo với chân vấy ngắn hoặc jeans là nàng đã có 1 outfit đi chơi cực trẻ trung và nữ tính.\r\n\r\n', 'Ivymoda', 'ÁO CROPTOP LỤA HỌA TIẾT KẺ NGANG', 950000, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`detail_id`, `product_id`, `product_color`, `product_size`, `product_quantity`) VALUES
(25, 17, 'Trắng', 'M', 10),
(26, 18, 'Vàng mustard', 'L', 10),
(27, 19, 'Vàng mustard', 'L', 10),
(28, 20, 'Xanh ghi đá', 'L', 10),
(29, 21, 'Hồng san hô', 'L', 10),
(30, 22, 'Họa tiết Xanh tím than', 'L', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `href_value` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`image_id`, `href_value`, `product_id`) VALUES
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
(55, '167bfea45ab9765d9161a2bb2e8f18e7.jpg', 27),
(56, '470a22e2e33e05c4e2b45a52dd47eaab.jpg', 27),
(57, '742c30390328ec2b387a338c3f0b4643.jpg', 27),
(58, 'afb8c189e6a098cdc0637139b6ff4984.jpg', 27),
(59, 'f16bdd5c840f109f4106c0618599f786.jpg', 27),
(60, 'fc84b7fee0da714d477993096facc31c.jpg', 27),
(61, '2d2cbacf48a205d45e4b608d906ff484.jpg', 28),
(62, '10dcdc6dd20bd2f361a187cf2386ca2b.jpg', 28),
(63, '8594ae701bddf9d9c0127a350d9dff28.jpg', 28),
(64, 'a7b2fe4e401425b92d044ef2487a2ab2.jpg', 28),
(65, 'e9dfd5cc02895cdaaaea1e50135777f7.jpg', 28),
(66, 'eab97f8303b60cf92d8449dfa75d3133.jpg', 28),
(67, '1d84c3d47bcb9e2685a46572474ed740.jpeg', 29),
(68, '5417f5b64699195d74da5ccda0b979c0.jpeg', 29),
(69, '9f5ddb834d62aeed037385b8ada95974.jpeg', 29),
(70, '13f6d59d3138952dd85af9cc8b988864.jpeg', 29),
(71, 'd5635f6a22ae082cabb76f57f70d157d.jpeg', 29),
(72, '38bd47f3ca762609c59cb8d868d0831b.jpeg', 29),
(73, '071952a1a3767560aef35a53b1d80109.jpg', 30),
(74, '568656c0f6e9798a61aec6c21e8a823d.jpg', 30),
(75, '4b2a4ec1a6f38dd1dc6d48c21ee6ddc4.jpg', 30),
(76, '9c353e1e0cbd37a15464212174cdb53e.jpg', 30),
(77, '65ef2a2b239c7ad3783244c216eea5e7.jpg', 30),
(78, '74f19c391e52814a77f01c1d420eba3c.jpg', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `rate_value` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`rate_id`, `rate_value`, `product_id`) VALUES
(1, 5, 17),
(2, 4, 17),
(3, 4, 17),
(4, 4, 17),
(5, 4, 17),
(6, 5, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_addresses`
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `fullname`, `role`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$f0qAzSGAKrW6LfyFv7Gl9OF0qNCCxkC6EDmkJ.0SKJm7kVDk9oAZq', 'Nguyen Tien Dat', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_ibfk_1` (`parent_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `product_detail_ibfk_1` (`product_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Chỉ mục cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;