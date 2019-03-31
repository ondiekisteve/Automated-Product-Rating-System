-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 08:07 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `quantity`) VALUES
(2, '::1', 0),
(5, '::1', 0),
(6, '::1', 0),
(7, '::1', 0),
(10, '::1', 0),
(11, '::1', 0),
(12, '::1', 0),
(13, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'ELECTRONICS'),
(2, 'COSMETICS'),
(3, 'FASHION'),
(4, 'FOODSTUFFS'),
(5, 'COMPUTER SERVICES'),
(6, 'OTHERS'),
(7, 'alex'),
(8, 'collo'),
(9, 'Steve');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `productId` int(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userId`, `productId`, `message`, `rate`) VALUES
(49, 0, 8, 'shshs good\n                ', ''),
(50, 0, 8, '\n                hshsh good', 'rate :0.15789473684210525'),
(51, 0, 8, 'very very good\n                ', '0.15'),
(52, 0, 1, 'this is super awesome\n                ', '0.3333333333333333'),
(53, 0, 1, 'gssgsggs gpppp\n                ', '0'),
(54, 0, 1, 'good good good\n                ', '0.45'),
(55, 0, 1, 'bad bad bad\n                ', '-0.45'),
(56, 0, 1, '\n      good good good good good god           ', '0.6666666666666666'),
(57, 0, 1, '\n      good good good good good god   good good good         ', '0.9259259259259259'),
(58, 0, 1, 'bad bad bad bad \n                ', '-0.5454545454545454'),
(59, 12, 2, '\n             sshhshshs    ', '0'),
(60, 12, 2, '\n             sshhshshs    ', '0'),
(61, 12, 2, '\n       ssshshs good         ', '0.15789473684210525'),
(62, 0, 4, 'very nice shoes and stunning\n                ', '0.3181818181818182'),
(63, 0, 4, 'very nice shoes and stunning this is also awesome\n                ', '0.4230769230769231'),
(64, 0, 4, 'good awesome\n                ', '0.3684210526315789'),
(65, 0, 4, 'good\n                ', '0.16666666666666666'),
(66, 0, 4, 'good good good', '3'),
(67, 0, 4, 'Great', '3'),
(68, 0, 4, 'Great', '3'),
(69, 0, 4, 'bad bad bad bad ', '-2.4'),
(70, 0, 4, 'bad bad bad bad  bad', '-2.5'),
(71, 0, 4, 'good  good good', '2.25'),
(72, 0, 5, 'good \n                ', '0.15789473684210525'),
(73, 0, 5, 'good \n                ', '0.15789473684210525'),
(74, 0, 17, 'very good and nice \n                ', '0.2727272727272727'),
(75, 0, 17, 'cool\n                ', '0.05555555555555555'),
(76, 0, 17, 'good good good\n                ', '0.45'),
(77, 0, 17, 'good good good\n                ', '0.45'),
(78, 12, 3, 'sgsgsgs good\n                ', '0.16'),
(79, 13, 3, 'Yes we can obama\n                ', '0.05'),
(80, 13, 3, 'This is super awesome\n                ', '0.33'),
(81, 13, 3, '\n  This is cool              ', '0.05'),
(82, 13, 3, 'this is bad\n                ', '-0.15'),
(83, 12, 3, '\n  I like this it is supper awesome              ', '0.25'),
(84, 12, 2, 'I like this\n                ', '0.10'),
(85, 12, 12, 'Super cool\n                ', '0.21'),
(86, 12, 12, 'Super cool\n                ', '0.21');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `idno` int(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `membership_status` int(10) NOT NULL,
  `activation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `idno`, `mobile`, `residence`, `email`, `pwd`, `membership_status`, `activation_code`) VALUES
(9, 'Stephen', 'Ondieki', 31089042, 700837637, 'Nairobi', 'ondiekistephen5@gmail.com', '9daea24b3b4d8bd1f0b2038e77212d99', 0, '1281250232'),
(10, 'gg', 'g', 0, 677, 'hh', 'steve@gmail.com', 'b4fc034dfc6fd2d897da7fb6ea2d5f62', 0, '12123'),
(11, 'shsh', 'hhh', 0, 0, 'hh', 'steve@gmail.com', '5e36941b3d856737e81516acd45edc50', 0, '19205'),
(12, 'stephen', 'ondieki', 373737373, 74646464, 'gwwwwyywy', 'ondieki@gmail.com', '8eebc7b056dd350df3139a8e577b525e', 0, '16595'),
(13, 'victor', 'ondieki', 353553553, 2147483647, 'nairobi', 'v@gmail.com', '8eebc7b056dd350df3139a8e577b525e', 0, '14981');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `subcat_id`, `product_name`, `price`, `product_desc`, `product_image`) VALUES
(1, 1, 2, 'stephen ondieki', 23000, 'This is a 3 in one printer with the capability of scanning, printing and even photocopying. It has a long life span with a very high printing speed						\r\n  						', 'pr.jpg'),
(2, 1, 1, 'Toshiba Laptop', 30000, 'Toshiba L58 latop with 500GB and 4GB RAM. It has a 64bit operating system and it is a brandy new product please contact me		', 'lp17.jpg'),
(3, 3, 3, 'Shoes', 2000, 'A well fashioned shoes for cute ladies. Mostly matched with a red dress or even a black official skirt						\r\n  						', '2011_designer_fashion_ladies_shoes.jpg'),
(4, 3, 3, 'Campus Quuen shoes', 23000, 'An air conditioned shoes just weared during functions such as afternoon dinners and when going out with your sponsor					\r\n  						', 'High-Heel-Fall-Winter-Shoes-Design-Bakra-Eid-Footwear-Collection1.jpg'),
(5, 1, 1, 'Hp ', 45000, 'It has 500GB HDD and 2GB RAM. It is a second hand computer but full featured and working under good condition						\r\n  						', 'lp4.jpg'),
(6, 1, 9, 'Dell Desktops', 24, 'This is a 21 inch Desktop with a full functioning cpu. It has a processor of 64bit. 500GB HDD and $GB RAM.						\r\n  						', '57753.jpeg'),
(7, 3, 3, 'Sandols', 650, 'Different color sandols which are brandy new and are long lasting please give me a call						\r\n  						', '425911306_268.jpg'),
(8, 1, 1, 'Samsung Laptop', 3400, 'A samsung icore 7 laptop with 500GB HDD and 4GB RAM	 with everything under good functionality. I have used it for only a month so its still new		\r\n  						', 'lp20.jpg'),
(9, 1, 1, 'Dell Laptop', 45000, 'Dell laptop with 500GB HDD and RAM 2GB. i have used it for only 1 month so it is still brandy new						\r\n  						', 'lp33.gif'),
(10, 3, 8, 'long dress', 3200, 'This is long dinner dress that should be matched with red cutex						\r\n  						', '54ee4182e5ae0_-_pink-dresses-angelaandalison-21037_s2.jpg'),
(11, 2, 7, 'Nigerian weave', 230, 'Nigerian weave is a soft and easy to maintain weave that is sold at a very cheaper price. It makes a lady look prettier and more beautiful			', 'new_york_remi_curl.jpg'),
(12, 2, 7, 'African weave', 500, 'This is a black weave that makes a lady beautiful people my confuse it with original hair						\r\n  						', 'Virgin-Peruvian-Loose-Wave-Human-Hair-font-b-Weave-b-font-Bundles-Bele-Virgin-Hair-Products.jpg'),
(13, 1, 1, 'Toshiba Laptop', 56000, 'I core 7 toshiba laptop with 600GB HHD and 6GB RAM. it is a brandy new product from USA. I has cool graphics and good processor						\r\n  						', 'lp8.jpg'),
(14, 2, 7, 'Braids ', 760, ' A browny and shyney hair from Nigeria that will make a lady look glamorous. 						\r\n  						', 'wb47.jpg'),
(17, 1, 10, 'Hard Disk', 800, 'A 1TB Hard Disk which is brandy new it is virus free and it has never malfunctioned before						\r\n  						', 'acc4.jpg'),
(18, 2, 12, 'High Class Handbag', 3000, 'Well designed handbag for ladies to use when going out for a party or dinner. It has a nice color and can be matched with a red dress and high heel shoes				\r\n  						', 'Handbags-Designs-2016-for-Girls-and-Women-20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `cat_id`, `subcat_title`) VALUES
(1, 1, 'Laptops'),
(2, 1, 'Printers'),
(3, 3, 'Shoes'),
(4, 3, 'Dresses'),
(5, 4, 'Cakes'),
(6, 4, 'Chapati'),
(7, 4, 'weaves'),
(9, 1, 'Desktops'),
(10, 1, 'Computer Accessories'),
(11, 0, 'Others'),
(12, 0, 'Handbags'),
(13, 0, 'eating'),
(14, 0, 'steve'),
(15, 0, 'steve'),
(16, 0, 'hhhhh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
