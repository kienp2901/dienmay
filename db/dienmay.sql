-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 01:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dienmay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `User` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Pass` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `Name`, `Email`, `User`, `Pass`, `Level`) VALUES
(1, 'Kien', 'Kien@gmail.com', 'kienadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `Name`) VALUES
(1, 'Oppo'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Dell'),
(5, 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `sID` varchar(255) DEFAULT NULL,
  `productName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `productID`, `sID`, `productName`, `price`, `quantity`, `image`) VALUES
(24, 1, '9u6e0qmod6j44rmkm96mqp82hv', 'Tủ lạnh', '10000000', 3, '82f2ab7dc4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `Name`) VALUES
(1, 'Laptop'),
(2, 'Desktop'),
(3, 'Mobile Phone'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Footware'),
(7, 'Sport and Fitness'),
(8, 'Jewellery'),
(9, 'Clothing'),
(10, 'Home Decor and Kitchen'),
(11, 'Beautiful and Healthcare'),
(12, 'Toys, Kids and Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `productID`, `productName`, `price`, `image`) VALUES
(1, 2, 5, 'Máy tính', '20000000', 'fbb388ec4b.jpg'),
(2, 2, 1, 'Tủ lạnh', '10000000', '82f2ab7dc4.png'),
(3, 3, 6, 'Quạt thông gió', '10000000', '0b915c07fe.jpg'),
(4, 3, 3, 'Máy ảnh', '20000000', '8beb7b0ae3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `zipcode` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(2, 'KienPham ', 'HN', 'TP Ha Noi', 'hcm', '700000', '0379370048', 'kien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'cuong', 'HN', 'TP HCM', 'hcm', '700000', '0379370048', 'cuong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productID`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(1, 5, 'Máy tính', 2, 1, '20000000', 'fbb388ec4b.jpg', 2, '2021-07-06 01:14:39'),
(2, 7, 'Máy say sinh tố', 2, 1, '10000000', '226809afc9.png', 2, '2021-07-06 01:14:39'),
(3, 4, 'Bàn là', 2, 1, '10000000', '8ccb671c9b.png', 2, '2021-07-06 01:14:39'),
(4, 2, 'TV 64inc', 3, 1, '10000000', 'ba4d4a761f.jpg', 2, '2021-07-06 02:17:55'),
(5, 3, 'Máy ảnh', 3, 2, '40000000', '8beb7b0ae3.jpg', 2, '2021-07-06 02:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `brandID` int(11) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `Name`, `catID`, `brandID`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'Tủ lạnh', 8, 1, '<p>Tủ lạnh tiế kiệm điện cho gia đ&igrave;nh</p>', 1, '10000000', '82f2ab7dc4.png'),
(2, 'TV 64inc', 4, 2, '<p>TV đẹp</p>', 1, '10000000', 'ba4d4a761f.jpg'),
(3, 'Máy ảnh', 7, 5, '<p>M&aacute;y ảnh Huawei</p>', 1, '20000000', '8beb7b0ae3.jpg'),
(4, 'Bàn là', 10, 4, '<p>B&agrave;n l&agrave; Dell</p>', 1, '10000000', '8ccb671c9b.png'),
(5, 'Máy tính', 1, 2, '<p>M&aacute;y t&iacute;nh sam sung</p>', 1, '20000000', 'fbb388ec4b.jpg'),
(6, 'Quạt thông gió', 6, 3, '<p>Quatj th&ocirc;ng gi&oacute; h&atilde;ng Apple</p>', 1, '10000000', '0b915c07fe.jpg'),
(7, 'Máy say sinh tố', 12, 4, '<p>M&aacute;y say s&iacute;nh tố h&atilde;ng Dell</p>', 1, '10000000', '226809afc9.png'),
(8, 'Camera', 11, 5, '<p>Camera h&atilde;ng Huawei</p>', 1, '20000000', '84632a647f.jpg'),
(9, 'Áo Nam', 9, 3, '<p>&Aacute;o nam đẹp</p>', 1, '20000', '16e4ecf782.jpg'),
(10, 'Iphone X', 5, 2, '<p>Iphone X đẹp thời thượng</p>', 1, '20000000', '0b7f5c55d9.jpg'),
(11, 'Iphone 11', 3, 3, '<p>Iphone 8</p>', 1, '10000000', '6af2e7cff0.jpg'),
(12, 'Dàn loa', 2, 2, '<p>abcd</p>', 1, '20000000', 'd7a2be2828.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `sliderName`, `sliderImage`, `type`) VALUES
(1, 'Slider 1', '89cb4d9f9b.jpg', 1),
(2, 'Slider 2a', '68cff45dcd.jpg', 1),
(3, 'Slider 3', '2163874b85.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `productID`, `productName`, `price`, `image`, `customer_id`) VALUES
(2, 3, 'Máy ảnh', '20000000', '8beb7b0ae3.jpg', 3),
(3, 4, 'Bàn là', '10000000', '8ccb671c9b.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
