-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 06:57 AM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brands_id` int(11) NOT NULL,
  `Brands_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brands_id`, `Brands_title`) VALUES
(1, 'Levi'),
(5, 'Raymond'),
(6, 'Nike'),
(7, 'Allen Solly'),
(8, 'Monte Carlo');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(500) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_title`) VALUES
(1, 'Jeans'),
(6, 'Pants'),
(7, 'Shirts'),
(9, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 424459561, 2, 1, 'pending'),
(2, 2, 1696095250, 3, 1, 'pending'),
(3, 2, 486476107, 3, 4, 'pending'),
(4, 2, 27669228, 8, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` mediumtext NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Brands_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_keywords`, `Category_id`, `Brands_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'Levi Jeans', 'GOod jeans best jean good fiber dark blue good in size', 'Jeans,dark blue jeans fit jeans', 1, 1, '182981227_00_Style Shot.jpg', '182981227_01_Front.jpg', '182981227_02_Back.jpg', '1999.00', '2023-05-17 17:19:53', 'true'),
(4, 'LEVI SKINNY JEANS', 'These blue jeans feature a solid pattern to lend you an edgy look.', 'Skinny ,Blue, jean, size 32', 1, 1, 'skinn.jpg', 'skinny.jpg', 'skinny1.jpg', '2287.00', '2023-06-05 17:54:57', 'true'),
(5, 'MEN BLUE REGULAR FIT JEANS', 'In a style with the perfect number of pockets, these 501 regular fit, blue jeans ', 'Fit, regular ,blue jean', 1, 1, 'fit.jpg', 'fi.jpg', 'fitt.jpg', '4226.00', '2023-06-05 18:02:01', 'true'),
(6, 'RAYMOND Men Regular Fit Blue Trouser', 'Fit: Regular Fit Color: Blue Fabric: 65% POLYESTER/35% VISCOSE', 'Pant,Regular,blue ', 6, 5, 'RMTX04620-B8.jpg', 'RMTX04620-B8 (3).jpg', 'RMTX04620-B8 (4).jpg', '1679.00', '2023-06-05 18:06:43', 'true'),
(7, 'Men Contemporary Fit Dark Blue Trouser', 'Fit: Contemporary Fit Color: Dark Blue Fabric: Pol65%Wool18%Vsc17% Occasion: Casual', 'Dark , pant,fit', 6, 5, 'RMTX04540-B8 (5).jpg', 'RMTX04540-B8 (1).jpg', 'RMTX04540.jpg', '1979.00', '2023-06-05 18:10:20', 'true'),
(8, 'Nike Air Force', 'Air Force 1 became an iconic sneaker around the globe.', 'White shoes,Nike air', 9, 6, 'nike1.jpg', 'nike111.jpg', 'nike11.jpg', '11895.00', '2023-06-05 18:18:08', 'true'),
(9, 'Nike Blazer Mid 77', 'Maturing from a simple canvas high top to a leather mid top and casual low top, this shoe just gets better with age.', 'Grey nike , men shoes', 9, 6, 'blazer.jpg', 'blazer1.jpg', 'blazer11.jpg', '9657.00', '2023-06-05 18:21:10', 'true'),
(10, 'Men Black Slim Fit Solid Full Sleeves Casual Shirts', 'This model has Height 6\'1\", Chest 37\", Waist 30\" and is wearing Size 40', 'Black,Shirt,casual', 7, 7, 'black.jpg', 'black1.jpg', 'black11.jpg', '873.00', '2023-06-05 18:27:42', 'true'),
(11, 'Men Grey Slim Fit Solid Full Sleeves Casual Shirts', 'Look effortlessly stylish when you don this grey solid shirt, tailored for a Slim Fit , from Allen Solly by Allen Solly.', 'Grey shirt,solid,Casual', 7, 7, 'grey.jpg', 'grey1.jpg', 'grey11.jpg', '685.00', '2023-06-05 18:30:42', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(2, 2, 1999, 1696095250, 1, '2023-05-20 15:13:04', 'Complete'),
(3, 2, 7996, 486476107, 1, '2023-05-20 15:19:00', 'Complete'),
(4, 2, 11895, 27669228, 1, '2023-06-15 04:31:54', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 424459561, 1020, '', '2023-05-16 04:47:03'),
(2, 2, 1696095250, 1999, '', '2023-05-20 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'harshit', 'harshit23@gmail.com', '$2y$10$BJyxiAUNRko3R2obiwCx3OVwkRyLFfFiYLRu79jazJIfr/yF0/izy', '182981306_01_Style Shot.jpg', '::1', 'Haldwani', '8547961236');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brands_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
