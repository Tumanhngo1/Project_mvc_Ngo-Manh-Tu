-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 07:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(8) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `description`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Adidas', '1646909039-logo1adida.png', '<p>Sản phẩm ch&iacute;nh h&atilde;ng từ Adidas</p>\r\n', 0, '2022-03-01 17:14:49', '2022-03-01 10:14:49'),
(2, 'Nike', '1646909064-log2nike.png', '<p>Sản phẩm ch&iacute;nh h&atilde;ng đến từ Nike</p>\r\n', 0, '2022-03-01 17:23:00', '2022-03-01 10:23:00'),
(3, 'Fila', '1646909086-logofila.png', '<p>Sản phẩm ch&iacute;nh h&atilde;ng từ Fila</p>\r\n', 0, '2022-03-09 13:46:10', '2022-03-09 06:46:10'),
(4, 'Converse', '1646909118-logocons.png', '<p>Sản phẩm ch&iacute;nh h&atilde;ng từ Converse</p>\r\n', 0, '2022-03-09 13:46:51', '2022-03-09 06:46:51'),
(8, 'Accessory', '1646909143-logo.jpg', '<p>Tất cả sản phẩm ch&iacute;nh h&atilde;ng từ shop</p>\r\n', 0, '2022-03-09 13:49:11', '2022-03-09 06:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `name`, `address`, `phone`, `created_at`) VALUES
(25, 10, 'ngô mạnh tú', 'thôn 7 phúcats', 987418333, '2022-03-10 08:39:30'),
(26, 10, 'ngô mạnh tú', 'thôn 7 phúcats', 987418333, '2022-03-10 08:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(10, 'ngô mạnh tú', 'tublue32@gmail.com', '$2y$10$h9ROm2aGh38Os2c8OB/O5e./KUjkCYqoDEF9VEMZQRr9.DNo2RR52', '2022-03-10 14:17:43', '2022-03-10 07:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `code`, `title`, `price`, `quantity`, `created_at`) VALUES
(16, 10, '', 'Alphabounce 2.0', 2000000, 1, '2022-03-10 08:39:30'),
(17, 10, '', 'Alphabounce 2.0', 2000000, 1, '2022-03-10 08:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'CHÍNH SÁCH ĐỔI TRẢ', '<h1>&nbsp;</h1>\r\n\r\n<p><strong>Quy định bảo h&agrave;nh &amp;&nbsp;đổi h&agrave;ng tại TuBlue Shop</strong><br />\r\n1. Tại&nbsp;<strong>TuBlue Shop</strong>tất cả sản phẩm đều được cam kết ch&iacute;nh h&atilde;ng, bảo h&agrave;nh sản phẩm bị lỗi do nh&agrave; sản xuất,&nbsp;<strong>kh&ocirc;ng&nbsp;</strong>bảo h&agrave;nh cho c&aacute;c yếu tố sai phạm hay tại nạn đồ vật khi sử dụng.</p>\r\n\r\n<ul>\r\n	<li><strong>Bảo h&agrave;nh</strong>&nbsp;trong v&ograve;ng 7 ng&agrave;y ( kể từ khi nhận h&agrave;ng )</li>\r\n	<li><strong>Bảo h&agrave;nh&nbsp;</strong>h&agrave;ng c&ograve;n nguy&ecirc;n hiện trạng như l&uacute;c b&aacute;n ra.Kh&aacute;ch h&agrave;ng xin vui l&ograve;ng kiểm tra kĩ sản phẩm như c&aacute;c lỗi d&acirc;y k&eacute;o, bung keo, bung chỉ do nh&agrave; sản xuất ..v..v.. trước khi nhận h&agrave;ng.&nbsp;</li>\r\n	<li>Sản phẩm được ph&eacute;p đổi trả l&agrave;&nbsp;<strong>chưa qua sử dụng</strong>,&nbsp;<strong>t&igrave;nh trạng c&ograve;n mới 100%</strong>&nbsp;như l&uacute;c nhận</li>\r\n	<li>Hỗ trợ<strong>&nbsp;đổi size</strong>&nbsp;với tất cả sản phẩm&nbsp;<strong>c&oacute; sẵn(*)</strong></li>\r\n	<li><strong>Kh&ocirc;ng hỗ trợ&nbsp;</strong>trả lại h&agrave;ng với sản phẩm<strong>&nbsp;giảm gi&aacute; tr&ecirc;n 15%</strong></li>\r\n	<li><strong>Trong qu&aacute; tr&igrave;nh sử dụng ( d&ugrave; 2 đến 5 năm ) ph&aacute;t hiện gi&agrave;y fake, gi&agrave;y gi&aacute; ch&uacute;ng m&igrave;nh sẽ bồi thường 130% gi&aacute; trị sản phẩm</strong></li>\r\n</ul>\r\n', '2022-03-09 18:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `rangeprice` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `rangeprice`, `status`) VALUES
(1, '100000-1000000 đ', 0),
(2, '1000000-3000000 đ', 0),
(3, '3000000-5000000 đ', 0),
(4, 'trên 5000000 đ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avatars` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `price_sale` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(8) DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatars`, `price`, `price_sale`, `description`, `status`, `updated_at`, `created_at`) VALUES
(19, 1, 'Ultraboost ', '1646812451-ultraboost5.jpg', 4000000, 3650000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 14:54:11', '2022-03-09 07:54:11'),
(20, 1, 'ultraboost 4.0', '1646812601-ultraboost2.jpg', 4000000, 3650000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 14:56:41', '2022-03-09 07:56:41'),
(21, 1, 'Pureboost ', '1646813375-boost213.jpg', 3000000, 2985000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 14:59:00', '2022-03-09 07:59:00'),
(22, 1, 'Pureboost 2.0', '1646812789-pureboost2.jpg', 3000000, 2650000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 14:59:49', '2022-03-09 07:59:49'),
(23, 1, 'Pureboost 2.0', '1646813000-pureBoost.jpg', 2950000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 15:03:20', '2022-03-09 08:03:20'),
(24, 1, 'Prophere 4.0', '1646813042-prophere4.jpg', 3500000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:04:02', '2022-03-09 08:04:02'),
(25, 1, 'Prophere 4.0', '1646813071-prophere3.jpg', 3500000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:04:31', '2022-03-09 08:04:31'),
(26, 1, 'Prophere', '1646813110-prophere2.jpg', 4000000, 3750000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:05:10', '2022-03-09 08:05:10'),
(27, 1, 'Prophere 4.0', '1646813172-prophere1.jpg', 4000000, 3750000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:06:12', '2022-03-09 08:06:12'),
(28, 1, 'Stan Smith', '1646813331-stan3.jpg', 2700000, 1700000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:08:51', '2022-03-09 08:08:51'),
(29, 1, 'Stan Smitch', '1646813422-stan2.jpg', 2000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:10:22', '2022-03-09 08:10:22'),
(30, 1, 'Stan Simith', '1646813463-stan1.jpg', 2000000, 1750000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:11:03', '2022-03-09 08:11:03'),
(31, 1, 'Stan Smith', '1646813499-stan.jpg', 1750000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:11:39', '2022-03-09 08:11:39'),
(32, 1, 'Super Star', '1646813533-SuperStarCoreBlack.jpg', 2000000, 1500000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:12:13', '2022-03-09 08:12:13'),
(33, 1, 'Ultraboost 2019', '1646813578-boost191.jpg', 4500000, 4250000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:12:58', '2022-03-09 08:12:58'),
(34, 1, 'Ultraboost 2019', '1646813812-boost192.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:16:52', '2022-03-09 08:16:52'),
(35, 1, 'Ultraboost 2019', '1646813842-boost193.jpg', 4000000, 3650000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:17:22', '2022-03-09 08:17:22'),
(36, 1, 'Ultraboost 2019', '1646813873-boost20.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:17:53', '2022-03-09 08:17:53'),
(37, 1, 'Ultraboost 2020', '1646813902-boost201.jpg', 4000000, 3650000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:18:22', '2022-03-09 08:18:22'),
(38, 1, 'Ultraboost 2020', '1646813924-boost202.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:18:44', '2022-03-09 08:18:44'),
(39, 1, 'Ultraboost 2020', '1646813950-boost203.jpg', 3500000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:19:10', '2022-03-09 08:19:10'),
(40, 1, 'Ultraboost 2020', '1646813978-boost203.jpg', 3500000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:19:38', '2022-03-09 08:19:38'),
(41, 1, 'Ultraboost 2021', '1646814005-boost21.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:20:05', '2022-03-09 08:20:05'),
(42, 1, 'Ultraboost 2021', '1646814031-boost211.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:20:31', '2022-03-09 08:20:31'),
(43, 1, 'Ultraboost 2021', '1646814065-boost212.jpg', 4000000, 3500000, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:21:05', '2022-03-09 08:21:05'),
(44, 1, 'Ultraboost 2021', '1646814089-boost213.jpg', 4000000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:21:29', '2022-03-09 08:21:29'),
(45, 1, 'Yung 96', '1646814127-adidasyung96.jpg', 2100000, 0, 'Giày chính hãng adidas  Hàng chính hãng xách tay từ thương hiệu nước ngoài Mới 100%, full box, tem, tag', 0, '2022-03-09 15:22:07', '2022-03-09 08:22:07'),
(46, 1, 'Ultraboost 2020', '1646814160-ultraboost2.jpg', 3500000, 0, 'Giày chính hãng adidas \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài\r\nMới 100%, full box, tem, tag', 0, '2022-03-09 15:22:40', '2022-03-09 08:22:40'),
(47, 2, 'Nike Air max 97', '1646815064-nike973.jpg', 3500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"', 0, '2022-03-09 15:24:17', '2022-03-09 08:24:17'),
(48, 2, 'Nike AirForce1', '1646814374-airforce12.jpg', 1500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"', 0, '2022-03-09 15:26:14', '2022-03-09 08:26:14'),
(49, 2, 'Nike Shaddow', '1646814444-shadow2.jpg', 2100000, 2000000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"', 0, '2022-03-09 15:27:24', '2022-03-09 08:27:24'),
(50, 2, 'Nike Shadow', '1646814905-airforce1shadow.jpg', 3500000, 3000000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"\"', 0, '2022-03-09 15:35:05', '2022-03-09 08:35:05'),
(51, 2, 'nike ZOOM', '1646814979-nikezoomfly.jpg', 2500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:36:19', '2022-03-09 08:36:19'),
(52, 2, 'Nike ZOOM', '1646815013-nikezoomrun.jpg', 2400000, 2000000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:36:53', '2022-03-09 08:36:53'),
(53, 2, 'Nike air max 97', '1646815110-nike97.jpg', 3500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:38:30', '2022-03-09 08:38:30'),
(54, 2, 'Nike Air 95', '1646815178-nike95.jpg', 3500000, 3450000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"\"', 0, '2022-03-09 15:39:38', '2022-03-09 08:39:38'),
(55, 2, 'Nike Air95', '1646815235-nike951.jpg', 3000000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:40:35', '2022-03-09 08:40:35'),
(56, 2, 'Nike Air 95', '1646815264-nike952.jpg', 3500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:41:04', '2022-03-09 08:41:04'),
(57, 2, 'Nike GD', '1646815325-nike gd.jpg', 4000000, 3500000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:42:05', '2022-03-09 08:42:05'),
(58, 2, 'Nike GD', '1646815366-nikeairforce1.jpeg', 3500000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:42:46', '2022-03-09 08:42:46'),
(59, 2, 'Nike Shadow', '1646815392-nike-air-force-1-shadow.jpg', 4000000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:43:12', '2022-03-09 08:43:12'),
(60, 2, 'Nike Zoom', '1646815556-nikezoomfly2.jpg', 2100000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:45:56', '2022-03-09 08:45:56'),
(61, 2, 'Nike Joyride', '1646815591-nikejoyride.jpg', 4000000, 0, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:46:31', '2022-03-09 08:46:31'),
(62, 2, 'Nike Joyride', '1646815626-nikejoyride1.jpg', 3500000, 3000000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:47:06', '2022-03-09 08:47:06'),
(63, 2, 'Nike Joyride', '1646815657-nikejoyride2.jpg', 3500000, 3000000, 'Giày chính hãng Nike \r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:47:37', '2022-03-09 08:47:37'),
(64, 3, 'Fila Ray', '1646815705-filaray2.jpg', 2000000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 15:48:25', '2022-03-09 08:48:25'),
(65, 3, 'Fila Raycore', '1646815753-filarayy.jpg', 2100000, 1900000, 'Giày chính hãng Fila\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:49:13', '2022-03-09 08:49:13'),
(66, 3, 'Fila Raycore', '1646815784-filaay6.jpg', 1500000, 1000000, 'Giày chính hãng Fila\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:49:44', '2022-03-09 08:49:44'),
(67, 3, 'Fila distupber', '1646815824-fila.jpg', 2100000, 2000000, 'Giày chính hãng Fila\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:50:24', '2022-03-09 08:50:24'),
(68, 4, 'Converse basic', '1646815889-converse1.jpg', 1900000, 1500000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 15:51:29', '2022-03-09 08:51:29'),
(69, 4, 'Converser basic', '1646815937-converse.jpg', 1900000, 0, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:52:17', '2022-03-09 08:52:17'),
(70, 4, 'Converse basic', '1646816064-converse2.jpg', 1100000, 0, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"\"', 0, '2022-03-09 15:54:24', '2022-03-09 08:54:24'),
(71, 4, 'Converse ', '1646816131-converse5.jpg', 1100000, 1000000, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"\"\"', 0, '2022-03-09 15:54:55', '2022-03-09 08:54:55'),
(72, 4, 'Converse basic', '1646816195-converse6.jpg', 1500000, 1350000, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:56:35', '2022-03-09 08:56:35'),
(73, 4, 'Converse Basic', '1646816228-converse7.jpg', 1500000, 0, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:57:08', '2022-03-09 08:57:08'),
(74, 4, 'Converse', '1646816267-converse8.jpg', 1500000, 1000000, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:57:47', '2022-03-09 08:57:47'),
(75, 4, 'Converse', '1646816299-converse9.jpg', 1500000, 1450000, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:58:19', '2022-03-09 08:58:19'),
(76, 4, 'Converse', '1646816323-converse10.jpg', 1500000, 0, 'Giày chính hãng Converse\r\nHàng chính hãng xách tay từ thương hiệu nước ngoài \r\nMới 100%, full box, tem, tag\"\"\"\"\"', 0, '2022-03-09 15:58:43', '2022-03-09 08:58:43'),
(77, 4, 'Converse', '1646816345-converse11.jpg', 1500000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 15:59:05', '2022-03-09 08:59:05'),
(78, 4, 'Converse', '1646816374-conver12.jpg', 2100000, 1950000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 15:59:34', '2022-03-09 08:59:34'),
(79, 4, 'Converse', '1646816406-conver14.jpg', 1500000, 1250000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:00:06', '2022-03-09 09:00:06'),
(80, 4, 'Converse', '1646816612-vans.jpg', 1500000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 16:03:32', '2022-03-09 09:03:32'),
(81, 3, 'Vans old School', '1646816653-vans4.jpg', 2400000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 16:04:13', '2022-03-09 09:04:13'),
(82, 4, 'Vans', '1646816687-vans3.jpg', 1700000, 0, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:04:47', '2022-03-09 09:04:47'),
(83, 4, 'Vans', '1646816712-vans1.jpg', 1500000, 1000000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:05:12', '2022-03-09 09:05:12'),
(84, 4, 'Vans', '1646816738-vans2.jpg', 1500000, 0, '<p>&nbsp;</p>\r\n\r\n<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:05:38', '2022-03-09 09:05:38'),
(85, 8, 'T-Shirt 01', '1646817163-a1.jpg', 500000, 350000, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:12:43', '2022-03-09 09:12:43'),
(86, 8, 'T-Shirt 01', '1646817692-a2.jpg', 500000, 0, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:21:32', '2022-03-09 09:21:32'),
(87, 8, 'T-Shirt 03', '1646817796-a3.jpg', 500000, 0, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:23:16', '2022-03-09 09:23:16'),
(88, 8, 'T_shirt 04', '1646817823-a4.jpg', 500000, 350000, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:23:43', '2022-03-09 09:23:43'),
(89, 8, 'T_Shirt 05', '1646817848-a5.jpg', 500000, 350000, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:24:08', '2022-03-09 09:24:08'),
(90, 1, 'T-Shirt 06', '1646817873-a6.jpg', 500000, 350000, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:24:33', '2022-03-09 09:24:33'),
(91, 1, 'T_Shirt 07', '1646817906-a7.jpg', 500000, 350000, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:25:06', '2022-03-09 09:25:06'),
(92, 1, 'T-Shirt 08', '1646817970-a8.jpg', 500000, 350000, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:25:26', '2022-03-09 09:25:26'),
(93, 1, 'T_Shirt 09', '1646817952-a9.jpg', 500000, 0, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:25:52', '2022-03-09 09:25:52'),
(94, 1, 'T_Shirt 10', '1646818016-a10.jpg', 500000, 0, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:26:56', '2022-03-09 09:26:56'),
(95, 8, 'T-Shirt 11', '1646818044-a11.jpg', 500000, 350000, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:27:24', '2022-03-09 09:27:24'),
(96, 8, 'T-Shirt 12', '1646818071-a12.jpg', 500000, 0, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:27:51', '2022-03-09 09:27:51'),
(97, 8, 'Glasses 01 ', '1646818115-a24.jpg', 200000, 0, 'Kính Mắt Thương hiệu Adidas', 0, '2022-03-09 16:28:35', '2022-03-09 09:28:35'),
(98, 8, 'Glasses', '1646818162-a22.jpg', 250000, 140000, 'Kính mắt hãng Adidas', 0, '2022-03-09 16:29:22', '2022-03-09 09:29:22'),
(99, 1, 'T-Shirt 13', '1646818206-a14.jpg', 500000, 0, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg Size</p>\r\n\r\n<p>L:Cao 1m70-1m74,nặng 51-66kg Size</p>\r\n\r\n<p>XL:Cao 1m75-1m78,nặng 67-71kg Size</p>\r\n\r\n<p>XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:30:06', '2022-03-09 09:30:06');
INSERT INTO `products` (`id`, `category_id`, `title`, `avatars`, `price`, `price_sale`, `description`, `status`, `updated_at`, `created_at`) VALUES
(100, 1, 'T-Shirt 14', '1646818233-a15.jpg', 500000, 350000, '<p>Bảng Size:</p>\r\n\r\n<p>Size M:cao 1m65-1m69,nặng 55-60kg</p>\r\n\r\n<p>Size L:Cao 1m70-1m74,nặng 51-66kg</p>\r\n\r\n<p>Size XL:Cao 1m75-1m78,nặng 67-71kg</p>\r\n\r\n<p>Size XXL:Cao 1m78-1m8,nặng 72-78kg ------------------------------------ ????</p>\r\n\r\n<p>Tham khảo tại: #ZERO #bomacnha#bothethao#bococtay bộ thể thao, bộ mặc nh&agrave;, bộ cộc tay&quot;&quot;&quot;&quot;&quot;</p>\r\n', 0, '2022-03-09 16:30:33', '2022-03-09 09:30:33'),
(101, 8, 'T-Shirt 15', '1646818259-a13.jpg', 500000, 0, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n', 0, '2022-03-09 16:30:59', '2022-03-09 09:30:59'),
(102, 8, 'T-Shirt 16', '1646818292-a18.jpg', 500000, 250000, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n', 0, '2022-03-09 16:31:32', '2022-03-09 09:31:32'),
(103, 1, 'Rook', '1646818319-a19.jpg', 100000, 0, '<p>&quot;</p>\r\n\r\n<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:31:59', '2022-03-09 09:31:59'),
(104, 1, 'Rook 2', '1646818339-a20.jpg', 100000, 0, '<p>&quot;</p>\r\n\r\n<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n\r\n<p>&quot;</p>\r\n', 0, '2022-03-09 16:32:19', '2022-03-09 09:32:19'),
(105, 8, 'T-Shirt', '1646818387-a16.jpg', 500000, 0, '<p>TuBlue chuy&ecirc;n h&agrave;ng ch&iacute;nh h&atilde;ng</p>\r\n\r\n<hr />\r\n<hr />\r\n<p>Chất liệu: 100% Cotton (m&agrave;u x&aacute;m +10% polyeste)</p>\r\n\r\n<p>Chất Heritag tốt nhất nh&agrave; Champion: dầy,đứng form nhất</p>\r\n\r\n<p>Logo &ldquo;C&rdquo; ở tay &aacute;o tr&aacute;i ????Lưu &yacute;: Champion c&oacute; 3 d&ograve;ng Cotton ch&iacute;nh với gi&aacute; từ thấp đến cao đều c&oacute; ưu v&agrave; nhược điểm ri&ecirc;ng từng d&ograve;ng kh&ocirc;ng phải mỏng l&agrave; kh&ocirc;ng tốt hoặc ngược lại Tất cả sản phẩm &aacute;o thun Champion b&ecirc;n m&igrave;nh đều ch&iacute;nh h&atilde;ng vui l&ograve;ng kh&ocirc;ng so s&aacute;nh c&aacute;c h&agrave;ng tr&ocirc;i nổi vnxk,fake.......</p>\r\n\r\n<p>Detail &aacute;o r&otilde; r&agrave;ng (check fake hay real dựa tr&ecirc;n detail &aacute;o c&aacute;c bạn nh&eacute;)</p>\r\n\r\n<p>Sẵn size: S M L Lưu &yacute;: D&ograve;ng Heritag form to hơn c&aacute;c d&ograve;ng kh&aacute;c c&aacute;c bạn lh shop để được tư vấn ạ</p>\r\n\r\n<p>Nhận sỉ cho c&aacute;c shop đồ ch&iacute;nh h&atilde;ng</p>\r\n\r\n<p>#champion #championchinhhang #championauthentic #logochampion #aothunchampion #aothunchampionchinhang #aochampion</p>\r\n', 0, '2022-03-09 16:33:07', '2022-03-09 09:33:07'),
(106, 1, 'Alphabounce', '1646839024-alphabounce.jpg', 3000000, 2500000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n', 0, '2022-03-09 22:13:03', '2022-03-09 15:13:03'),
(107, 1, 'Alphabounce 2.000', '1646839060-alpha.jpg', 4000000, 1000000, '<p>TuBlue chuy&ecirc;n&nbsp;Sneaker Thể Thao&nbsp;: Đ&acirc;y l&agrave; một trong những loại gi&agrave;y hot nhất, với thiết kế đẹp, tinh tế, trẻ trung v&agrave; hiện đại.</p>\r\n\r\n<hr />\r\n<p>???? ƯU ĐIỂM: - Kiểu d&aacute;ng thể thao, mạnh mẽ,ph&ugrave; hợp với c&aacute;c bạn trong độ tuổi 12-35 - Đế cao su bền chắc, c&oacute; độ b&aacute;m cao.</p>\r\n\r\n<p>- Th&iacute;ch hợp khi tham gia c&aacute;c hoạt động thể thao, đạp xe, leo n&uacute;i , trượt v&aacute;n...</p>\r\n\r\n<p>- Dễ d&agrave;ng kết hợp với hầu hết c&aacute;c phong c&aacute;ch thời trang như:đi học,đi chơi,đi du lịch.Giay đ&ocirc;i,gi&agrave;y nh&oacute;m....</p>\r\n\r\n<p>Nh&agrave; sản xuất : shenzhen bao&#39;an district hailun ke garment factory Địa chỉ sản xuất : 4th Floor , building E1 , Gesha Industrial, zone , chancheng district , Fosshan city, Guangdong, china</p>\r\n\r\n<p>Năm sản xuất : 2021 - Trả h&agrave;ng khi h&agrave;ng kh&ocirc;ng như tư vấn, lỗi kĩ thuật - Đổi h&agrave;ng khi kh&ocirc;ng vừa size - 100% h&agrave;ng Việt Nam - Bảo h&agrave;nh keo d&aacute;n trọn đời</p>\r\n\r\n<p>- Chất liệu vải, nỉ... &ecirc;m ch&acirc;n, v&ocirc; c&ugrave;ng thoải m&aacute;i - Đặt h&agrave;ng -&gt; Nhận h&agrave;ng -&gt; Thanh to&aacute;n - Giao h&agrave;ng nhanh to&agrave;n quốc</p>\r\n\r\n<p>Lưu &yacute;: Gi&agrave;y m&agrave;u xanh c&oacute; thể nhạt hơn so với trong ảnh do &aacute;nh s&aacute;ng</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', 1, '2022-03-09 22:17:40', '2022-03-09 15:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `password`, `updated_at`, `created_at`) VALUES
(1, 'admin', '1646841885-a3.jpg', '$2y$10$8wyPYrxUvfZtjGmsRZLnNeUIQKOQpXT9B9/G6Or.vF/oG1nygjUcy', '2022-03-01 17:14:21', '2022-03-01 10:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(8) NOT NULL,
  `total` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
