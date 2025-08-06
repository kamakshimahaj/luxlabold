-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 10:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artificial_jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulkbuyer_profile`
--

CREATE TABLE `bulkbuyer_profile` (
  `ID` int(50) NOT NULL,
  `BB_LOGIN_ID` int(11) NOT NULL,
  `COMP_NAME` varchar(100) NOT NULL,
  `COMP_ADD` varchar(100) NOT NULL,
  `COMP_WEBSITE` varchar(100) NOT NULL,
  `COMP_GST_NO` int(100) NOT NULL,
  `COMP_CONTACT_NO` varchar(15) NOT NULL,
  `COMP_LOGO` varchar(200) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  `CREATION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulkbuyer_profile`
--

INSERT INTO `bulkbuyer_profile` (`ID`, `BB_LOGIN_ID`, `COMP_NAME`, `COMP_ADD`, `COMP_WEBSITE`, `COMP_GST_NO`, `COMP_CONTACT_NO`, `COMP_LOGO`, `ACTIVE`, `CREATION_DATE`) VALUES
(1, 0, 'mangalmani jewellers', 'mangalmanijew@gmail.com', 'mangalmanijew@gmail.com', 4567, '9815402876', 'Screenshot (7).png', 1, '2024-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `pro_image`
--

CREATE TABLE `pro_image` (
  `id` int(50) NOT NULL,
  `pro_id` int(50) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `image_size` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pro_occasion`
--

CREATE TABLE `pro_occasion` (
  `id` int(50) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `occ_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `special_comment` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pro_size`
--

CREATE TABLE `pro_size` (
  `id` int(50) NOT NULL,
  `PRO_ID` int(50) NOT NULL,
  `PRO_SIZE` varchar(80) NOT NULL,
  `UNIT` varchar(90) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL,
  `CREATION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_admin`
--

CREATE TABLE `tab_admin` (
  `id` int(30) NOT NULL,
  `login_id` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_admin`
--

INSERT INTO `tab_admin` (`id`, `login_id`, `password`, `name`, `active`, `creation_date`) VALUES
(1, 'kamakshimhjn@gmail.com', 'cmFLdmVnWEFtQXV2MTMyNDVTMEVBdz09', 'kamakshi', 1, '2024-05-02 11:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `tab_blog`
--

CREATE TABLE `tab_blog` (
  `id` int(50) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` varchar(200) NOT NULL,
  `blog_by` varchar(100) NOT NULL,
  `blog_video` varchar(300) NOT NULL,
  `blog_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_blog`
--

INSERT INTO `tab_blog` (`id`, `blog_title`, `blog_description`, `blog_image`, `blog_by`, `blog_video`, `blog_date`, `status`, `creation_date`) VALUES
(6, 'kundan', 'jncjdncksncdk', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET3.jpg', 'kamakshi', 'polki bridal.png', '2024-05-08', 1, '2024-05-04'),
(7, 'kundan', 'jncjdncksncdk', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET3.jpg', 'kamakshi', 'polki bridal.png', '2024-05-08', 1, '2024-05-04'),
(8, 'jadau', 'jncjdncksncdkkam\"', 'Screenshot (6).png', 'kamakshi', 'Screenshot (6).png', '2024-05-08', 1, '2024-05-04'),
(9, 'kundan', 'jncjdncksncdk', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET3.jpg', 'kamakshi', 'polki bridal.png', '2024-05-08', 1, '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `tab_blog_like_dislike`
--

CREATE TABLE `tab_blog_like_dislike` (
  `id` int(50) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `like_dislike` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_blog_rating`
--

CREATE TABLE `tab_blog_rating` (
  `id` int(50) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `rating` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_bulkbuyer`
--

CREATE TABLE `tab_bulkbuyer` (
  `id` int(11) NOT NULL,
  `name` int(40) NOT NULL,
  `login_id` int(50) NOT NULL,
  `password` int(50) NOT NULL,
  `mob_no` int(10) NOT NULL,
  `active` int(1) NOT NULL,
  `creation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_buyer`
--

CREATE TABLE `tab_buyer` (
  `id` int(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mob_no` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_category`
--

CREATE TABLE `tab_category` (
  `id` int(30) NOT NULL,
  `cat_name` varchar(40) NOT NULL,
  `cat_description` int(11) NOT NULL,
  `parent_cat` varchar(50) DEFAULT NULL,
  `sub_cat` varchar(50) DEFAULT NULL,
  `available` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_category`
--

INSERT INTO `tab_category` (`id`, `cat_name`, `cat_description`, `parent_cat`, `sub_cat`, `available`, `creation_date`) VALUES
(6, 'Necklace Set', 0, NULL, '', 1, '2024-05-06 00:00:00'),
(7, 'designer mala set', 0, '6', NULL, 1, '2024-05-06 00:00:00'),
(8, 'Kundan Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(9, 'Polki Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(10, 'Temple jewellery Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(11, 'Jadau Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(12, 'Oxidised Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(13, 'American Diamond Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(14, 'Rajwadi Necklace Set', 0, '6', '', 1, '2024-05-06 00:00:00'),
(15, 'Bangles', 0, NULL, NULL, 1, '2024-05-06 00:00:00'),
(16, 'Kundan Bangles', 0, '15', '-1', 1, '2024-05-06 00:00:00'),
(17, 'Polki Bangles', 0, '15', '', 1, '2024-05-06 00:00:00'),
(20, 'Rajwadi Bangles', 0, '15', '', 1, '2024-05-06 00:00:00'),
(21, 'American Diamond Bangles', 0, '15', '', 1, '2024-05-06 00:00:00'),
(22, 'Temple Jewellery Bangle', 0, '15', NULL, 1, '2024-05-06 00:00:00'),
(23, 'Jadau Bangles', 0, '15', '', 1, '2024-05-06 00:00:00'),
(24, 'Oxidised Bangles', 0, '15', '', 1, '2024-05-06 00:00:00'),
(25, 'Rings', 0, NULL, NULL, 1, '2024-05-06 00:00:00'),
(26, 'Kundan Rings', 0, '25', NULL, 1, '2024-05-06 00:00:00'),
(27, 'Polki Rings', 0, '25', NULL, 1, '2024-05-06 00:00:00'),
(28, 'Jadau Rings', 0, '25', NULL, 1, '2024-05-06 00:00:00'),
(29, 'Temple Rings', 0, '25', '', 1, '2024-05-06 00:00:00'),
(30, 'Oxidised rings', 0, '25', NULL, 1, '2024-05-07 00:00:00'),
(31, 'Temple Rings', 0, '25', NULL, 1, '2024-05-07 00:00:00'),
(32, 'American Diamond Ring', 0, '25', NULL, 1, '2024-05-07 00:00:00'),
(33, 'Earings', 0, NULL, NULL, 1, '2024-05-07 00:00:00'),
(34, 'Kundan Earings', 0, '33', NULL, 1, '2024-05-07 00:00:00'),
(35, 'Polki Earings', 0, '33', NULL, 1, '2024-05-07 00:00:00'),
(36, 'American Diamon Earings', 0, '33', NULL, 1, '2024-05-07 00:00:00'),
(37, 'Oxidised Earings', 0, '33', NULL, 1, '2024-05-07 00:00:00'),
(38, 'Temple Earings', 0, '33', NULL, 1, '2024-05-07 00:00:00'),
(39, 'Jadau Earing', 0, '33', NULL, 1, '2024-05-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tab_color`
--

CREATE TABLE `tab_color` (
  `id` int(30) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_color`
--

INSERT INTO `tab_color` (`id`, `color_name`, `active`, `creation_date`) VALUES
(2, 'Pink', 1, '2024-05-02 06:52:20'),
(3, 'Red', 1, '2024-05-02 06:52:27'),
(5, 'Aqua', 1, '2024-05-02 06:52:40'),
(6, 'Silver', 1, '2024-05-06 08:18:53'),
(7, 'Golden', 1, '2024-05-06 08:19:01'),
(9, 'Green', 1, '2024-05-06 08:19:13'),
(10, 'Blue', 1, '2024-05-07 08:13:58'),
(11, 'Pastel Color', 1, '2024-05-07 08:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `tab_deliverypartner`
--

CREATE TABLE `tab_deliverypartner` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login_id` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mob_no` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_dresstype`
--

CREATE TABLE `tab_dresstype` (
  `id` int(30) NOT NULL,
  `dress_type` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_dresstype`
--

INSERT INTO `tab_dresstype` (`id`, `dress_type`, `active`, `creation_date`) VALUES
(1, 'Gown', 1, '2024-05-02 06:53:11'),
(2, 'Saree', 1, '2024-05-02 06:53:16'),
(3, 'Lehanga', 1, '2024-05-02 06:53:26'),
(5, 'Suit', 1, '2024-05-06 08:19:52'),
(6, 'Indo Western', 1, '2024-05-06 08:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `tab_occasion`
--

CREATE TABLE `tab_occasion` (
  `id` int(30) NOT NULL,
  `occ_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_occasion`
--

INSERT INTO `tab_occasion` (`id`, `occ_name`, `active`, `creation_date`) VALUES
(1, 'Marraige', 1, '2024-05-02 06:56:29'),
(3, 'Casual', 1, '2024-05-02 06:56:42'),
(4, 'Formal', 1, '2024-05-02 06:56:48'),
(5, 'Party', 1, '2024-05-02 06:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `tab_occasiondress`
--

CREATE TABLE `tab_occasiondress` (
  `id` int(50) NOT NULL,
  `occ_id` int(50) NOT NULL,
  `color_id` int(50) NOT NULL,
  `dresstype_id` int(50) NOT NULL,
  `special_instruction` varchar(300) NOT NULL,
  `image` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_occasiondress`
--

INSERT INTO `tab_occasiondress` (`id`, `occ_id`, `color_id`, `dresstype_id`, `special_instruction`, `image`, `active`, `creation_date`) VALUES
(3, 5, 3, 2, 'product is adjustable\r\n', 'ADNECKLACESET1.jpg', 1, 24),
(4, 1, 9, 1, 'product is adjustable.and in case any stone is removed it can be exchanged', 'ADNECKLACESET4.jpg', 1, 24),
(5, 1, 7, 3, 'product is adjustable.', 'BEAUTIFULPOLKINECKLACESET4.jpg', 1, 24),
(6, 5, 2, 5, 'product is adjustable.', 'GREENRAJWADIKUNDANNECKLACSET.jpg', 1, 24),
(7, 1, 5, 1, 'product is adjustable', 'ADNECKLACESET2.jpg', 1, 24),
(8, 4, 10, 2, 'product is non adjustable', 'BLUEADEARINGS.jpg', 1, 24),
(9, 3, 3, 5, 'product is adjustable', 'TRENDYWITHETHNICWORKKUNDANNECKLACE.jpg', 1, 24),
(10, 1, 7, 5, 'product is non adjustable', 'BLUEKUNDANMEENAKARIBANGLE.jpg', 1, 24),
(11, 1, 7, 5, 'product is non adjustable', 'NAKSHIWORKLAKSHMIDEVIBANGLE.JPG', 1, 24),
(12, 1, 3, 3, 'product is adjustable', 'GOLDMATTWITHREDTEMPLEJEWELLERYBANGLES.jpg', 1, 24),
(13, 1, 5, 6, 'Length of the necklage is long', 'GREENOXIDISEDNECKLACESET.jpg', 1, 24),
(14, 5, 11, 6, 'Length of earing is long suitable for the ones having long neck', 'PASTELBLUEPINKKUNDANEARINGS.jpg', 1, 24),
(15, 3, 7, 5, 'it is a choker set', 'JADAUNECKLACESET4.JPG ', 1, 24),
(16, 5, 11, 5, 'product is non adjustable', 'ADPINKSILVERBANGLE.jpg', 1, 24),
(17, 1, 9, 1, 'Length of the earings is medium.this product is suitable for both long and short neck', 'GREENWHITEADEARING.jpg', 1, 24),
(18, 1, 2, 2, 'Length is medium .this product is suitable for both short and long neck.', 'PINKPOLKIEARINGS.jpg', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tab_offer`
--

CREATE TABLE `tab_offer` (
  `id` int(20) NOT NULL,
  `offer_title` varchar(40) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `offer_percentage` int(30) NOT NULL,
  `offer_image` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_offer`
--

INSERT INTO `tab_offer` (`id`, `offer_title`, `start_date`, `end_date`, `offer_percentage`, `offer_image`, `active`, `creation_date`) VALUES
(3, 'earing ', '2024-05-15', '2024-05-10', 44, 'polki bridal.png', 1, '2024-05-06'),
(4, 'earing ', '2024-05-15', '2024-05-10', 44, 'polki bridal.png', 1, '2024-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `tab_product`
--

CREATE TABLE `tab_product` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_details` varchar(100) NOT NULL,
  `parent_cat` varchar(100) DEFAULT NULL,
  `sub_cat` varchar(100) DEFAULT NULL,
  `pro_img` varchar(250) NOT NULL,
  `pro_size` varchar(90) NOT NULL,
  `pro_price` decimal(38,5) NOT NULL,
  `cul_type` varchar(200) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_product`
--

INSERT INTO `tab_product` (`id`, `pro_name`, `pro_details`, `parent_cat`, `sub_cat`, `pro_img`, `pro_size`, `pro_price`, `cul_type`, `available`, `creation_date`) VALUES
(2, 'TRENDYWITHETHNICWORKKUNDAN NECKLACE ', 'A Kundan necklace set shines with colorful gemstones set in shiny metal, showing off fancy Indian st', '6', '8', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET3.jpg', '18cm X 10cm X 2cm', 900.00000, 'jaipur', 1, '2024-05-06'),
(3, 'TRENDYWITHETHNICWORKKUNDANNECKLACESET', 'Introducing our exquisite Kundan Necklace Set, a blend of timeless elegance and traditional craftsma', '6', '8', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET4.jpg', '18cm X 10cm X 2cm', 850.00000, 'jaipur', 1, '2024-05-06'),
(4, 'TRENDYWITHETHNICWORKKUNDAN NECKLACESET2', 'Elevate your style with this stunning ensemble that captures the essence of Indian heritage and luxu', '6', '8', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET1.jpg', '18cm X 10cm X 2cm', 1200.00000, 'jaipur', 1, '2024-05-06'),
(5, 'TRENDYWITHETHNICWORKKUNDAN NECKLACESET1', 'A Kundan necklace set is a stunning jewelry ensemble that combines  gemstones with shiny gold or sil', '6', '8', 'TRENDY WITH ETHNIC WORK KUNDAN NECKLACE SET2.jpg', '18cm X 10cm X 2cm', 1000.00000, 'jaipur', 1, '2024-05-06'),
(6, 'BEAUTIFULPOLKINECKLACESET1', 'Polki jewelry is a captivating expression of Indian craftsmanship, renowned for its use of uncut dia', '6', '9', 'BEAUTIFUL POLKI NECKLACE SET1.jpg', '18cm X 10cm X 2cm', 2100.00000, 'jaipur', 1, '2024-05-06'),
(7, 'BEAUTIFULPOLKINECKLACESET2', 'Elevate any occasion with the timeless allure and regal charm of this captivating necklace set, desi', '6', '9', 'BEAUTIFUL POLKI NECKLACE SET2.jpg', '18cm X 10cm X 2cm', 2100.00000, 'jaipur', 1, '2024-05-06'),
(8, 'BEAUTIFULPOLKINECKLACESET', 'Elevate any occasion with the timeless allure and regal charm of this captivating necklace set, desi', '6', '9', 'BEAUTIFUL POLKI NECKLACE SET.jpg', '18cm X 10cm X 2cm', 4500.00000, 'jaipur', 1, '2024-05-06'),
(9, 'BEAUTIFULPOLKINECKLACESET4', 'ntroducing our stunning Polki Necklace Set, a true embodiment of elegance and sophistication. This e', '6', '9', 'BEAUTIFUL POLKI NECKLACE SET4.jpg', '18cm X 10cm X 2cm', 4500.00000, 'jaipur', 1, '2024-05-06'),
(10, 'BEAUTIFULPOLKINECKLACESET5', 'Polki jewelry is a captivating expression of Indian craftsmanship, renowned for its use of uncut dia', '6', '9', 'BEAUTIFUL POLKI NECKLACE SET5.jpg', '18cm X 10cm X 2cm', 5000.00000, 'jaipur', 1, '2024-05-06'),
(11, 'POLKINECKLACESET1', 'Polki jewelry is a captivating expression of Indian craftsmanship, renowned for its use of uncut dia', '6', '9', 'POLKI NECKLACE SET1.jpg', '18cm X 10cm X 2cm', 6500.00000, 'jaipur', 1, '2024-05-06'),
(12, 'POLKINECKLACESET2', 'With the unmatched sparkle and timeless allure, Polki jewelry is the perfect choice for those seekin', '6', '9', 'POLKI NECKLACE SET2.jpg', '18cm X 10cm X 2cm', 5000.00000, 'jaipur', 1, '2024-05-06'),
(13, 'GODDESSLASHMIELEPHANTRICEPEARLTEMPLENECKLACDE', 'Temple jewellery, originating from South India, is characterized by intricate designs inspired by te', '6', '10', 'godess lakshmi elephant rice pearl temple necklace.jpg', '18cm X 10cm X 2cm', 2900.00000, 'south indian', 1, '2024-05-06'),
(15, 'GREENREDTEMPLEJEWELLERYNECKLACESET', 'Temple jewellery, steeped in tradition, is an embodiment of divine elegance, featuring intricate des', '6', '10', 'green red temple jewellery necklace set.jpg', '18cm X 10cm X 2cm', 3000.00000, 'south indian', 1, '2024-05-06'),
(16, 'GODDESS LAKSHMI RED GREEN WHITE TEMPLE NECKLACE', 'Temple jewellery, steeped in tradition, is an embodiment of divine elegance, featuring intricate des', '6', '10', 'godess lakshmi red green white temple necklace.jpg', '18cm X 10cm X 2cm', 3000.00000, 'south indian', 1, '2024-05-06'),
(18, 'TEMPLE JEWELLERY GREEN NECKLACE SET', 'Temple jewellery, steeped in tradition, is an embodiment of divine elegance, featuring intricate des', '6', '10', 'temple jewellery green n ecklace set21.jpg', '18cm X 10cm X 2cm', 2500.00000, 'south indian', 1, '2024-05-06'),
(19, 'TEMPLE JEWELLERY NECKLACE SET', 'Temple jewellery, steeped in tradition, is an embodiment of divine elegance, featuring intricate des', '6', '10', 'temple jewellery nmecklace set.jpg', '18cm X 10cm X 2cm', 2600.00000, 'south indian', 1, '2024-05-06'),
(20, 'JADAU GREEN PINK NECKLACE SET', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau green pink necklace set.jpg', '18cm X 10cm X 2cm', 2000.00000, 'punjab', 1, '2024-05-06'),
(21, 'JADAU NECKLACE SET', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau nec klace set.jpg', '18cm X 10cm X 2cm', 2000.00000, 'punjab', 1, '2024-05-06'),
(22, 'JADAU NECKLACE SET 1', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau necklace set4.jpg', '18cm X 10cm X 2cm', 2200.00000, 'punjab', 1, '2024-05-06'),
(23, 'JADAU NECKLACE SET2', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau necklace set6.jpg', '18cm X 10cm X 2cm', 2500.00000, 'punjab', 1, '2024-05-06'),
(24, 'JADAU NECKLACE SET3', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau neklace set1.jpg', '18cm X 10cm X 2cm', 1900.00000, 'punjab', 1, '2024-05-06'),
(26, 'JADAU NECKLACE SET 5', 'Jadau jewellery, a marvel of Indian craftsmanship, is renowned for its intricate designs and vibrant', '6', '11', 'jadau necklace set5.jpg', '18cm X 10cm X 2cm', 1900.00000, 'punjab', 1, '2024-05-06'),
(27, 'AD GREEN NECKLACE SET', 'American diamond jewellery, also known as cubic zirconia jewellery, mimics the brilliance of diamond', '6', '13', 'AD GREEN NECKLACE.jpg', '18cm X 10cm X 2cm', 2600.00000, 'western', 1, '2024-05-06'),
(28, 'AD RED NECKLACE SET', 'American diamond jewellery, also known as cubic zirconia jewellery, mimics the brilliance of diamond', '6', '13', 'AD NECKLACE SET5.jpg', '18cm X 10cm X 2cm', 2700.00000, 'western', 1, '2024-05-06'),
(29, 'AD PINK NECKLACE SET', 'American diamond jewellery, also known as cubic zirconia jewellery, mimics the brilliance of diamond', '6', '13', 'AD PINK NECKLACE SET.jpg', '18cm X 10cm X 2cm', 2700.00000, 'western', 1, '2024-05-06'),
(30, 'AD BLUE NECKLACE SET', 'American diamond jewellery, also known as cubic zirconia jewellery, mimics the brilliance of diamond', '6', '13', 'AD NECKLACE SET2.jpg', '18cm X 10cm X 2cm', 2000.00000, 'western', 1, '2024-05-06'),
(31, 'AD MAGENTA NECKLACE SET', 'American diamond jewellery, also known as cubic zirconia jewellery, mimics the brilliance of diamond', '6', '13', 'AD NECKLACE SET1.jpg', '18cm X 10cm X 2cm', 2800.00000, 'western', 1, '2024-05-06'),
(32, 'GREEN OXIDISED NECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'GREEN OXIDISED NECKLACE SET.jpg', '18cm X 10cm X 2cm', 1500.00000, 'jodhpur', 1, '2024-05-06'),
(33, 'OXIDISED RED GREEN SILVER NECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'OXIDISED SILVER TEMPLE NECKLACE.jpg', '20cm X 15cm X 3cm', 1600.00000, 'jodhpur', 1, '2024-05-06'),
(34, 'OXIDOISED SILVER NECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'OXIDISED TEMPLE NECKLACE SET.jpg', '12cm X 8cm X 2cm', 800.00000, 'jodhpur', 1, '2024-05-06'),
(35, 'OXIDISED YELLOW PINK NECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'YELLOWS PINK NECKLACE.jpg', '11cm X 8cm X 2cm', 1200.00000, 'jodhpur', 1, '2024-05-06'),
(36, 'NAVY BLUE OXIDISED N ECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'NAVY BLUE OXIDISED NECKLACE SET.jpg', '18cm X 10cm X 2cm', 1500.00000, 'jodhpur', 1, '2024-05-06'),
(37, 'RED OXIDISED NECKLACE SET', 'Oxidized jewelry, an emblem of rustic elegance, undergoes a process where metal is deliberately tarn', '6', '12', 'RED OXIDISED NECKLACE SET.jpg', '18cm X 10cm X 2cm', 1400.00000, 'jodhpur', 1, '2024-05-06'),
(38, 'RAJWADI NECKLACE SET', 'A Rajwadi necklace set is a stunning ensemble of jewelry originating from the royal heritage of Raja', '6', '14', 'RAJWADI NECKLACE SET.jpg', '18cm X 10cm X 2cm', 2200.00000, 'jodhpur', 1, '2024-05-06'),
(39, 'GREEN RAJWADI KUNDAN NECKLACE SET', 'A Rajwadi necklace set is a stunning ensemble of jewelry originating from the royal heritage of Raja', '6', '-1', 'GREEN RAJWADI  KUNDAN NECKLACE SET.jpg', '13cm X 9cm X 2cm', 1600.00000, 'jodhpur', 1, '2024-05-06'),
(40, 'PINK MINT RAJWADI KUNDAN NECKLACE SET', 'A Rajwadi necklace set is a stunning ensemble of jewelry originating from the royal heritage of Raja', '6', '14', 'PINK  MINT RAJWADI KUNDAN NECKLACE SET.jpg', '13cm X 9cm X 2cm', 1700.00000, 'jodhpur', 1, '2024-05-06'),
(41, 'MATT GOLD RAJWADI NECKLACE SET', 'A Rajwadi necklace set is a stunning ensemble of jewelry originating from the royal heritage of Raja', '6', '14', 'MATT GOLD RAJWADI NECKLACE SET1.jpg', '16cm X 13cm X 2cm', 1900.00000, 'jodhpur', 1, '2024-05-06'),
(42, 'MATT GOLD RAJWADI NECKLACE SET', 'A Rajwadi necklace set is a stunning ensemble of jewelry originating from the royal heritage of Raja', '6', '14', 'MATT GOLD RAJWADI NECKLACE SET.jpg', '18cm X 10cm X 2cm', 2000.00000, 'jodhpur', 1, '2024-05-06'),
(43, 'KUNDAN BANGLE', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'KUNDAN BANGLE1.jpg', '18cm X 10cm X 2cm', 900.00000, 'jaipur', 1, '2024-05-06'),
(44, 'KUNDAN GREEN BANGLE', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'kundan green bangle.jpg', '18cm X 10cm X 2cm', 800.00000, 'jaipur', 1, '2024-05-06'),
(45, 'KUNDAN RED GOLDEN BANGLE', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'KUNDAN BANGLE3.jpg', '18cm X 10cm X 2cm', 800.00000, 'jaipur', 1, '2024-05-06'),
(46, 'RED KUNDAN MEENAKARI BANGLE', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'RED KUNDAN MEENAKARI BANGLE.jpg', '18cm X 10cm X 2cm', 850.00000, 'jaipur', 1, '2024-05-06'),
(47, 'BLUE KUNDAN MEENAKARI BANGLE', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'BLUE KUNDAN  MEENAKARI BANGLE.jpg', '18cm X 10cm X 2cm', 900.00000, 'jaipur', 1, '2024-05-06'),
(49, 'KUNDAN BANGLE1', 'Kundan bangles are traditional Indian ornaments crafted with intricate gold foil settings and embedd', '15', '16', 'KUNDAN BANGLES.jpg', '18cm X 10cm X 2cm', 950.00000, 'jaipur', 1, '2024-05-06'),
(50, 'POLKI BANGLES', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '17', 'POLKI BANGLES.jpg', '18cm X 10cm X 2cm', 900.00000, 'jaipur', 1, '2024-05-06'),
(51, 'POLKI BANGLES1', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '17', 'POLKI BANGLE2.jpg', '18cm X 10cm X 2cm', 850.00000, 'jaipur', 1, '2024-05-06'),
(52, 'RED POLKI BANGLES', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '17', 'POLKI RED BANGLE.jpg', '18cm X 10cm X 2cm', 880.00000, 'jaipur', 1, '2024-05-06'),
(53, 'GREEN POLKI BANGLE', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '17', 'POLKI GREEN BANGLE.jpg', '18cm X 10cm X 2cm', 880.00000, 'jaipur', 1, '2024-05-06'),
(54, 'BLUE POLKI BANGLE', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '17', 'NAVY BLUE POLKI BANGLE.jpg', '18cm X 10cm X 2cm', 880.00000, 'jaipur', 1, '2024-05-06'),
(55, 'PINK POLKI BANGLES', 'Ad bangles, also known as American diamond bangles, are elegant accessories crafted with high-qualit', '15', '17', 'PINK POLKI BANGLE.jpg', '18cm X 10cm X 2cm', 880.00000, 'jaipur', 1, '2024-05-06'),
(56, 'AD PINK BANGLES', 'Ad bangles, also known as American diamond bangles, are elegant accessories crafted with high-qualit', '15', '21', 'AD PINK SILVER BANGLE.jpg', '18cm X 10cm X 2cm', 600.00000, 'western', 1, '2024-05-06'),
(57, 'AD SILVER BANGLE', 'Polki bangles are exquisite Indian accessories featuring uncut diamonds set in elaborate gold or sil', '15', '21', 'AD SILVER BANGLE.jpg', '18cm X 10cm X 2cm', 650.00000, 'western', 1, '2024-05-06'),
(58, 'RAJWADI RED BANGLES', 'Rajwadi bangles are ornate Indian adornments, often crafted from gold or silver and embellished with', '15', '20', 'RAJWADI BANGLE3.jpg', '18cm X 10cm X 2cm', 880.00000, 'jodhpur', 1, '2024-05-06'),
(59, 'RAJWADI GOLDEN BANGLES', 'Rajwadi bangles are ornate Indian adornments, often crafted from gold or silver and embellished with', '15', '20', 'RAJWADI BANGLE1.jpg', '18cm X 10cm X 2cm', 850.00000, 'jodhpur', 1, '2024-05-06'),
(60, 'PINK GOLDEN RAJWADI BANGLE', 'Rajwadi bangles are ornate Indian adornments, often crafted from gold or silver and embellished with', '15', '20', 'PINK GOLDEN RAJWADI BANGLES.jpg', '18cm X 10cm X 2cm', 850.00000, 'jodhpur', 1, '2024-05-06'),
(61, 'WHITE JADAU BANGLES', 'dau bangles are exquisite Indian jewelry pieces renowned for their intricate craftsmanship and use o', '15', '23', 'WHITE JADAU BANGLE.jpg', '18cm X 10cm X 2cm', 550.00000, 'punjab', 1, '2024-05-06'),
(62, 'RED GREEN JADAU BANGLES', 'jadau bangles are exquisite Indian jewelry pieces renowned for their intricate craftsmanship and use', '15', '23', 'RED GRREN JADAU BANGLE.jpg', '18cm X 10cm X 2cm', 550.00000, 'punjab', 1, '2024-05-06'),
(63, 'PINK GOLDEN JADAU BANGLE', 'jadau bangles are exquisite Indian jewelry pieces renowned for their intricate craftsmanship and use', '15', '23', 'PINK GOLDEN JADAU BANGLE.jpg', '18cm X 10cm X 2cm', 560.00000, 'punjab', 1, '2024-05-06'),
(64, 'RED OXIDISED BANGLES', 'Oxidized bangles are a stylish accessory in contemporary Indian fashion, characterized by their dark', '15', '24', 'RED OXIDISED BANGLE.jpg', '18cm X 10cm X 2cm', 550.00000, 'jodhpur', 1, '2024-05-06'),
(65, 'OXIDISED BANGLES', 'Oxidized bangles are a stylish accessory in contemporary Indian fashion, characterized by their dark', '15', '24', 'OXIDISED BANGLES.jpg', '18cm X 10cm X 2cm', 450.00000, 'jodhpur', 1, '2024-05-06'),
(66, 'GREEN TEMPLE BANGLE', 'Temple bangles are traditional Indian bangles inspired by the architectural motifs found in Hindu te', '15', '22', 'green temple jewllery bangle.jpg', '18cm X 10cm X 2cm', 850.00000, 'south indian', 1, '2024-05-06'),
(67, 'RED TEMPLE BANGLES', 'Temple bangles are traditional Indian bangles inspired by the architectural motifs found in Hindu te', '15', '22', 'red temple bangle.jpg', '18cm X 10cm X 2cm', 850.00000, 'south indian', 1, '2024-05-06'),
(68, 'GOLD MATT WHITE RED TEMPLE BANGLE', 'Temple bangles are traditional Indian bangles inspired by the architectural motifs found in Hindu te', '15', '22', 'GOLD MATT WITH RED TEMPLE JEWELLERY BANGLES.jpg', '18cm X 10cm X 2cm', 900.00000, 'south indian', 1, '2024-05-06'),
(69, 'WHITE RED KUNDAN RING', 'A Kundan ring is a traditional Indian jewelry piece featuring a central gemstone, often a highly fac', '25', '26', 'WHITE RED KUNDAN RING.jpg', '9cm X 8cm ', 150.00000, 'jaipur', 1, '2024-05-06'),
(70, 'KUNDAN RING GOLDEN', 'A Kundan ring is a traditional Indian jewelry piece featuring a central gemstone, often a highly fac', '25', '26', 'kundan ring 2.jpg', '9cm X 8cm ', 150.00000, 'jaipur', 1, '2024-05-06'),
(71, 'RED POLKI RING', 'A Polki ring is a traditional Indian jewelry piece crafted with uncut diamonds, known as Polki or Po', '25', '27', 'RED POLKI RING.jpg', '9cm X 8cm ', 150.00000, 'jaipur', 1, '2024-05-06'),
(72, 'GREEN POLKI RING', 'A Polki ring is a traditional Indian jewelry piece crafted with uncut diamonds, known as Polki or Po', '25', '27', 'GREEN POLKI RING.jpg', '9cm X 8cm ', 150.00000, 'jaipur', 1, '2024-05-06'),
(73, 'RED GREEN OXIDISED RING', 'Oxidized rings typically refer to metal rings that have undergone a chemical reaction with oxygen, r', '25', '30', 'RED GREEN OXIDEISED RING.jpg', '9cm X 8cm ', 100.00000, 'jodhpur', 1, '2024-05-07'),
(74, 'BLUE SILVER OXIDISED RING', 'Oxidized rings\" typically refer to metal rings that have undergone a chemical reaction with oxygen, ', '25', '30', 'BLUE SILVER OXIDISED RING.jpg', '9cm X 8cm ', 100.00000, 'jodhpur', 1, '2024-05-07'),
(75, 'GREEN SILVER OXIDISED RINGS', 'Oxidized rings typically refer to metal rings that have undergone a chemical reaction with oxygen, r', '25', '30', 'GREEN SILVER OXIDISED RING.jpg', '9cm X 8cm ', 110.00000, 'jodhpur', 1, '2024-05-07'),
(76, 'TEMPLE RING1', 'temple rings were ornaments worn in various cultures and religions, often as part of traditional att', '25', '31', 'TEMPLE RING1.jpg', '9cm X 8cm ', 250.00000, 'south indian', 1, '2024-05-07'),
(77, 'TEMPLE RING2', 'temple rings were ornaments worn in various cultures and religions, often as part of traditional att', '25', '31', 'TEMPLE RING2.jpg', '9cm X 8cm ', 240.00000, 'jodhpur', 1, '2024-05-07'),
(78, 'PINK AD RING', 'An \"American diamond ring\" typically refers to a type of jewelry that features simulated diamonds. T', '25', '32', 'PINK AD RING.jpg', '9cm X 8cm ', 300.00000, 'western', 1, '2024-05-07'),
(79, 'RED AD RING', 'An \"American diamond ring\" typically refers to a type of jewelry that features simulated diamonds. T', '25', '32', 'RED AD RING.jpg', '9cm X 8cm ', 260.00000, 'western', 1, '2024-05-07'),
(80, 'BLUE AD RING', 'An \"American diamond ring\" typically refers to a type of jewelry that features simulated diamonds. T', '25', '32', 'BLUE AD RING.jpg', '9cm X 8cm ', 250.00000, 'western', 1, '2024-05-07'),
(81, 'KUNDAN EARING', 'Kundan earrings typically feature a combination of precious metals, such as gold or silver, and gems', '33', '34', 'KUNDAN EARING.jpg', '18cm X 10cm X 2cm', 500.00000, 'jaipur', 1, '2024-05-07'),
(82, 'AQUA BLUE KUNDAN EARING', 'Kundan earrings typically feature a combination of precious metals, such as gold or silver, and gems', '33', '34', 'AQUA BLUE KUNDAN EARINGS.jpg', '18cm X 10cm X 2cm', 550.00000, 'jaipur', 1, '2024-05-07'),
(83, 'RED GOLDEN KUNDAN EARING', 'Kundan earrings typically feature a combination of precious metals, such as gold or silver, and gems', '33', '34', 'RED GOLDEN KUNDAN EARING.jpg', '18cm X 10cm X 2cm', 560.00000, 'jaipur', 1, '2024-05-07'),
(84, 'PASTEL BLUE PINK KUNDAN EARING', 'Kundan earrings typically feature a combination of precious metals, such as gold or silver, and gems', '33', '34', 'PASTEL BLUE PINK KUNDAN EARINGS.jpg', '18cm X 10cm X 2cm', 570.00000, 'jaipur', 1, '2024-05-07'),
(85, 'PINK POLKI EARING', 'Polki jewelry is characterized by the use of uncut diamonds, which are naturally formed and have a r', '33', '35', 'PINK POLKI EARINGS.jpg', '18cm X 10cm X 2cm', 560.00000, 'jaipur', 1, '2024-05-07'),
(86, 'AQUA BLUE POLKI EARING', 'Polki jewelry is characterized by the use of uncut diamonds, which are naturally formed and have a r', '33', '35', 'AQUA BLUE POLKI EARINGS.jpg', '18cm X 10cm X 2cm', 570.00000, 'jaipur', 1, '2024-05-07'),
(87, 'GREEN GOLDEN POLKI EARING', 'Polki jewelry is characterized by the use of uncut diamonds, which are naturally formed and have a r', '33', '35', 'GREEN POLKI EARING.jpg', '18cm X 10cm X 2cm', 570.00000, 'jaipur', 1, '2024-05-07'),
(88, 'GREEN WHITE POLKI EARING', 'Polki jewelry is characterized by the use of uncut diamonds, which are naturally formed and have a r', '33', '35', 'GREEN WHITE POLKI EARINGS.jpg', '18cm X 10cm X 2cm', 550.00000, 'jaipur', 1, '2024-05-07'),
(89, 'RED AD EARING', '\"Ad earrings\" could refer to \"artificial diamond earrings,\" which are also known as cubic zirconia (', '33', '36', 'RED AD EARING.jpg', '18cm X 10cm X 2cm', 500.00000, 'western', 1, '2024-05-07'),
(90, 'GREEN SILVER AD EARING', '\"Ad earrings\" could refer to \"artificial diamond earrings,\" which are also known as cubic zirconia (', '33', '36', 'GREEN WHITE AD EARING.jpg', '18cm X 10cm X 2cm', 750.00000, 'western', 1, '2024-05-07'),
(91, 'BLUE AD EARING', '\"Ad earrings\" could refer to \"artificial diamond earrings,\" which are also known as cubic zirconia (', '33', '36', 'BLUE AD EARINGS.jpg', '18cm X 10cm X 2cm', 850.00000, 'western', 1, '2024-05-07'),
(92, 'PINK SILVER AD EARING', '\"Ad earrings\" could refer to \"artificial diamond earrings,\" which are also known as cubic zirconia (', '33', '36', 'PINK SILVER AD EARING.jpg', '18cm X 10cm X 2cm', 800.00000, 'western', 1, '2024-05-07'),
(93, 'RED GOLDEN TEMPLE EARING', '\"Temple earrings\" typically refer to a style of traditional Indian jewelry that is inspired by the a', '33', '38', 'RED TEMPLE EARINGS.jpg', '18cm X 10cm X 2cm', 850.00000, 'south indian', 1, '2024-05-07'),
(94, 'GREEN TEMPLE EARING', '\"Temple earrings\" typically refer to a style of traditional Indian jewelry that is inspired by the a', '33', '38', 'GREEN TEMPLE EARING.jpg', '18cm X 10cm X 2cm', 900.00000, 'south indian', 1, '2024-05-07'),
(95, 'PINK TEMPLE EARING', '\"Temple earrings\" typically refer to a style of traditional Indian jewelry that is inspired by the a', '33', '38', 'PINK TEMPLE EARING.jpg', '18cm X 10cm X 2cm', 850.00000, 'south indian', 1, '2024-05-07'),
(96, 'GREEN OXIDISED EARINGS', 'Oxidized earrings, also known as oxidized silver earrings, are a type of jewelry where the metal, ty', '33', '37', 'GREEN OXIDISED EARING.jpg', '18cm X 10cm X 2cm', 450.00000, 'jodhpur', 1, '2024-05-07'),
(97, 'AQUA BLUE OXIDISED EARINGS', 'Oxidized earrings, also known as oxidized silver earrings, are a type of jewelry where the metal, ty', '33', '37', 'AQUA BLUE OXIDISED EARING.jpg', '18cm X 10cm X 2cm', 400.00000, 'jodhpur', 1, '2024-05-07'),
(98, 'RED OXIDISED EARINGS', 'Oxidized earrings, also known as oxidized silver earrings, are a type of jewelry where the metal, ty', '33', '37', 'RED OXIDISED EARING.jpg', '18cm X 10cm X 2cm', 430.00000, 'jodhpur', 1, '2024-05-07'),
(99, 'JADAU EARINGS', 'Jadau earrings are a type of traditional Indian jewelry renowned for their intricate craftsmanship a', '33', '39', 'JADAU EARINGS.jpg', '18cm X 10cm X 2cm', 450.00000, 'punjab', 1, '2024-05-07'),
(100, 'PINK GREEN JADAU EARINGS', 'Jadau earrings are a type of traditional Indian jewelry renowned for their intricate craftsmanship a', '33', '39', 'PINK GREEN JADAU EARINGS.jpg', '18cm X 10cm X 2cm', 550.00000, 'punjab', 1, '2024-05-07'),
(101, 'RED GREEN JADAU EARING', 'Jadau earrings are a type of traditional Indian jewelry renowned for their intricate craftsmanship a', '33', '39', 'RED GREEN JADAU EARINGS.jpg', '18cm X 10cm X 2cm', 470.00000, 'punjab', 1, '2024-05-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulkbuyer_profile`
--
ALTER TABLE `bulkbuyer_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pro_image`
--
ALTER TABLE `pro_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_occasion`
--
ALTER TABLE `pro_occasion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_size`
--
ALTER TABLE `pro_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_admin`
--
ALTER TABLE `tab_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_blog`
--
ALTER TABLE `tab_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_blog_like_dislike`
--
ALTER TABLE `tab_blog_like_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_blog_rating`
--
ALTER TABLE `tab_blog_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_bulkbuyer`
--
ALTER TABLE `tab_bulkbuyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_buyer`
--
ALTER TABLE `tab_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_category`
--
ALTER TABLE `tab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_color`
--
ALTER TABLE `tab_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_deliverypartner`
--
ALTER TABLE `tab_deliverypartner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_dresstype`
--
ALTER TABLE `tab_dresstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_occasion`
--
ALTER TABLE `tab_occasion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_occasiondress`
--
ALTER TABLE `tab_occasiondress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_offer`
--
ALTER TABLE `tab_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_product`
--
ALTER TABLE `tab_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulkbuyer_profile`
--
ALTER TABLE `bulkbuyer_profile`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pro_image`
--
ALTER TABLE `pro_image`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_occasion`
--
ALTER TABLE `pro_occasion`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_size`
--
ALTER TABLE `pro_size`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_admin`
--
ALTER TABLE `tab_admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_blog`
--
ALTER TABLE `tab_blog`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tab_blog_like_dislike`
--
ALTER TABLE `tab_blog_like_dislike`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_blog_rating`
--
ALTER TABLE `tab_blog_rating`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_bulkbuyer`
--
ALTER TABLE `tab_bulkbuyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_buyer`
--
ALTER TABLE `tab_buyer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_category`
--
ALTER TABLE `tab_category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tab_color`
--
ALTER TABLE `tab_color`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tab_deliverypartner`
--
ALTER TABLE `tab_deliverypartner`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_dresstype`
--
ALTER TABLE `tab_dresstype`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tab_occasion`
--
ALTER TABLE `tab_occasion`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_occasiondress`
--
ALTER TABLE `tab_occasiondress`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tab_offer`
--
ALTER TABLE `tab_offer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tab_product`
--
ALTER TABLE `tab_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
