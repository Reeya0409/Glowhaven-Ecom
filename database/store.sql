-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 11:56 PM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$LqhRi.HWwiXd0upVDMi5euQDkEP/mzL4dIXV.2aJdSDmMXUdZD3Te'),
(2, 'rs', 'reeya@gmail.com', '$2y$10$eEzoGkdiStoLWxKnsflnO.iFeAwabXDfFUhFa0uiAHI.Jeu7V5UJW');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'LAKME'),
(2, 'MAC'),
(3, 'FACES CANADA'),
(4, 'HUDA BEAUTY'),
(5, 'MAY BELLINE'),
(6, 'OLAY'),
(7, 'COLORBAR'),
(8, 'NYKAA'),
(9, 'Kay Beauty'),
(10, 'LOREAL'),
(11, 'MCaffeine'),
(15, 'DOT & KEY'),
(16, 'PLUM');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Eyes'),
(2, 'Lips'),
(3, 'Face'),
(4, 'Hairs'),
(5, 'Nails'),
(6, 'Skin'),
(7, 'Fragrance'),
(10, 'Bath & Body');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `username`, `user_email`, `mobile`, `message`) VALUES
(1, 'reeya', 'reeya@gmail.com', '1234567890', 'Products are amazing'),
(2, 'reeya', 'reeya@gmail.com', '1234567890', 'Products are amazing');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_no`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 766504445, 2, 1, 'pending'),
(3, 1, 821081291, 2, 1, 'pending'),
(4, 1, 1219482582, 5, 1, 'pending'),
(5, 2, 2107459942, 4, 1, 'pending'),
(6, 2, 2056320047, 12, 1, 'pending'),
(7, 2, 317172755, 2, 2, 'pending'),
(8, 2, 1370610155, 9, 1, 'pending'),
(9, 2, 792392907, 14, 1, 'pending'),
(10, 2, 275169064, 13, 1, 'pending'),
(11, 2, 134091110, 12, 1, 'pending'),
(12, 2, 2147275751, 3, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_keywords` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_price`, `date`, `status`) VALUES
(1, 'Kay-Beauty Dry Liquid Eyeliner', 'Kay Beauty Quick Dry Liquid Eyeliner - Bespoke Blue (3ml)', 'Eye, eyeliner, kaybeauty ,eye', 1, 9, 'Kay Beauty Quick Dry Liquid Eyeliner.png', '595', '2025-12-10 00:30:26', 'true'),
(2, 'M.A.C. Connect In Eye Shadow Palette', 'M.A.C. Connect In Colour Eye Shadow Palette X6 - Rose Lens (6.25 g)', 'Eye, Eyeshadow, Shadow, eyes, eye, MAC, eyeshadow', 1, 2, 'M.A.C Connect In Colour Eye Shadow Palette X6.png', '3499', '2025-07-09 16:44:12', 'true'),
(3, 'Colorbar Lipstick', 'Colorbar Kissproof Lipstick - Kinda Sexy 019 (3 g)', 'Lipstick', 2, 7, 'Colorbar Kissproof Lipstick.png', '1000', '2025-04-12 10:19:44', 'true'),
(4, 'Maybelline Fit Me Powder', 'Maybelline New York Fit Me Matte + Poreless Powder - 120 Classic Ivory (8.5gms)', 'Powder', 3, 5, 'Maybelline New York Fit Me Matte + Poreless Powder - 120 Classic Ivory.png', '649', '2025-04-12 10:20:16', 'true'),
(5, ' Faces Canada Nail Enamel Remover', 'Nail Enamel Remover Transparent 01 stain free nail enamel remover', 'remover', 5, 3, 'Faces Nail Enamel Remover.png', '99', '2025-04-12 10:20:53', 'true'),
(6, 'Lakme Matte Lipstick', 'Lakme 9 To 5 Primer + Matte Lipstick - MP8 Rosy Sunday (3.6g)', 'Lips, lipstick, Lakme, matte, Rosy', 2, 1, 'Lakme lipstick 1.png', '549', '2025-06-26 14:07:58', 'true'),
(7, 'Huda Beauty Cream Lipstick', 'Huda Beauty Power Bullet Cream Glow Lipstick - Sweet Cheeks (3gm)', 'Huda , Lip, Lipstick', 2, 4, 'Huda Beauty Power Bullet Cream Glow Lipstick.png', '2200', '2025-06-26 14:09:56', 'true'),
(8, 'Maybelline Fit Me Foundation', 'Maybelline New York Fit Me Matte+Poreless Liquid Foundation 16H Oil Control - 128 Warm Nude (30ml)', 'Maybelline, Matte, Liquid Foundation, warm, nude, foundation', 3, 5, 'Maybelline New York Fit Me Matte+Poreless Liquid Foundation 16H Oil Control - 128 Warm Nude.png', '699', '2025-06-26 14:12:20', 'true'),
(9, 'Olay Niacinamide Face Serum', 'Olay 5% Niacinamide Face Serum For Clear & Even Skin (30ml)', 'Olay, Niacinamide, Face, Serum', 3, 6, 'Olay Face Serum.png', '899', '2025-06-26 17:09:45', 'true'),
(12, 'MCaffeine Epsom Bath Salt   ', 'MCaffeine Epsom Bath Salt with Therapeutic Coffee Vanilla Fragrance - Detoxifies & Relieves Stress (200 g) ', 'MCaffeine, Epsom, Bath, Salt, Therapeutic, Coffee, Vanilla, Detoxifies', 6, 11, 'MCaffeine Epsom Bath Salt.png', '399', '2025-06-26 14:26:21', 'true'),
(13, 'Nykaa Wanderlust Shower Gel', 'Nykaa Wanderlust Mediterranean Sea Salt Shower Gel (300ml)                                                                        ', 'Nykaa, Wanderlust, Mediterranean,Shower, Gel', 6, 8, 'Nykaa Wanderlust Mediterranean Sea Salt Shower Gel.png', '400', '2025-06-26 17:24:09', 'true'),
(14, 'Maybelline New York Lifter Gloss', 'Maybelline New York Lifter Gloss - Moon (5.4ml)', 'Maybelline, Gloss, Moon, Gloss', 2, 5, 'Maybelline New York Lifter Gloss.png', '799', '2025-06-26 17:03:57', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(1, 2, 399, 2056320047, 1, '2025-12-15 19:19:11', 'Complete'),
(2, 2, 6998, 317172755, 1, '2025-12-25 20:42:57', 'Complete'),
(3, 2, 899, 1370610155, 1, '2025-12-26 12:34:13', 'Complete'),
(4, 2, 1793, 792392907, 3, '2025-12-26 12:34:24', 'Complete'),
(5, 2, 3299, 275169064, 3, '2025-12-29 20:31:52', 'pending'),
(6, 2, 1298, 134091110, 2, '2025-12-29 20:57:00', 'pending'),
(7, 2, 4499, 2147275751, 2, '2025-12-29 22:05:54', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_no`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 766504445, 3500, 'Paypal', '2025-06-25 01:55:23'),
(2, 4, 1219482582, 1748, 'UPI', '2025-06-25 01:58:26'),
(3, 1, 2056320047, 399, 'UPI', '2025-12-15 19:19:11'),
(4, 2, 317172755, 6998, 'UPI', '2025-12-25 20:42:57'),
(5, 3, 1370610155, 899, 'Netbanking', '2025-12-26 12:34:13'),
(6, 4, 792392907, 1794, 'Cash on Delivery', '2025-12-26 12:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Reeya', 'reeya@gmail.com', '$2y$10$Pn7bSb7Q4TVq3hbyOnbU5uA/IbTV0uCRRafxH6oMa2cH/EhZwtVAS', 'gt.jpg', '::1', 'Chandigarh', '9999998887'),
(3, 'Shreeya', 'sh@gmail.com', '$2y$10$QmtQqiC2WFO97.6stR/K7.icV5iy8hDttOkMUWRAwos3/p4lgdMIG', 'images.jpeg', '::1', 'Jammu', '7766886543');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
