-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 02:18 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_fifth_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`, `type`, `deleted_date`) VALUES
(1, 'Grooming', 'Both', '0000-00-00'),
(2, 'Supplements', 'Products', '0000-00-00'),
(3, 'Topical', 'Products', '0000-00-00'),
(4, 'Ophthalmic', 'Products', '0000-00-00'),
(5, 'Oral Antibiotics', 'Products', '0000-00-00'),
(6, 'Injectables', 'Products', '0000-00-00'),
(7, 'Deworming', 'Both', '0000-00-00'),
(8, 'Other Meds', 'Products', '0000-00-00'),
(9, 'Accessories', 'Products', '0000-00-00'),
(10, 'Foods', 'Products', '0000-00-00'),
(11, 'Laboratory Tests', 'Services', '0000-00-00'),
(12, 'Anesthesia', 'Services', '0000-00-00'),
(13, 'Boarding', 'Services', '0000-00-00'),
(14, 'Surgery', 'Services', '0000-00-00'),
(15, 'Clothes', 'Both', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `time_id`, `date`, `status`) VALUES
(1, 1, '2019-09-22', 'Available'),
(2, 1, '2019-09-22', 'Available'),
(3, 119, '2019-09-22', 'Not Available'),
(4, 11, '0000-00-00', 'Not Available'),
(5, 11, '2019-09-23', 'Not Available'),
(6, 29, '2019-09-24', 'Not Available'),
(7, 48, '2019-09-25', 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 2, '500.00'),
(2, 1, 13, 1, '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_main`
--

CREATE TABLE `order_main` (
  `order_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `cash` decimal(11,2) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_main`
--

INSERT INTO `order_main` (`order_id`, `total`, `cash`, `order_date`) VALUES
(1, '1150.00', '1200.00', '2019-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id_pet` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `pet_breed` varchar(100) NOT NULL,
  `pet_gender` varchar(50) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id_pet`, `id_cust`, `pet_name`, `pet_type`, `pet_breed`, `pet_gender`, `deleted_date`) VALUES
(1, 3, 'Whitey', 'Cat', 'Persian', 'Female', '0000-00-00'),
(2, 4, 'Fulgoso', 'Dog', 'Golden Retriever', 'Male', '0000-00-00'),
(3, 4, 'Blacky', 'Dog', 'Chihuahua', 'Female', '0000-00-00'),
(4, 3, 'Kaikai', 'Dog', 'Labrador Retriever', 'Male', '0000-00-00'),
(5, 5, 'Mae', 'Cat', 'Bombay', 'Female', '0000-00-00'),
(6, 3, 'Blacky', 'Dog', 'Chihuahua', 'Male', '0000-00-00'),
(7, 5, 'Hatdog', 'Dog', 'Belgian Shepherd Dog', 'Male', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double(13,2) NOT NULL,
  `details` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `total_stocks` int(15) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `id_category`, `name`, `price`, `details`, `photo`, `total_stocks`, `deleted_date`) VALUES
(1, 1, 'Furmagic 1 Liter', 500.00, '<p>Furmagic 1 Liter</p>\r\n', 'Furmagic 1 Liter.jpg', 4, '0000-00-00'),
(2, 1, 'Furmagic 300 mL', 250.00, '<p>Furmagic 300 mL</p>\r\n', 'Furmagic 300 mL.jpg', 12, '0000-00-00'),
(3, 2, 'Arthrox (Glucosamine) Tablet', 40.00, '<p>Arthrox (Glucosamine) Tablet</p>\r\n', 'Arthrox (Glucosamine) Tablet_1564633510.jpg', 8, '0000-00-00'),
(4, 1, 'Pet Expert Pet Shampoo 500 mL', 350.00, '<p>Pet Expert Pet Shampoo 500 mL</p>\r\n', 'Pet Expert Pet Shampoo 500 mL.jpg', 0, '0000-00-00'),
(5, 1, 'Sentry Shampoo for Cats 335 mL', 350.00, '<p>Sentry Shampoo for Cats 335 mL</p>\r\n', 'Sentry Shampoo for Cats 335 mL.jpg', 0, '0000-00-00'),
(6, 1, 'Michiko Nail Clipper', 230.00, '<p>Michiko Nail Clipper</p>\r\n', 'Michiko Nail Clipper.png', 0, '0000-00-00'),
(7, 2, 'Puppy Boost', 730.00, '<p>Puppy Boost</p>\r\n', 'Puppy Boost.jpg', 331, '0000-00-00'),
(8, 3, 'Vetnoderm Cream', 290.00, '<p>Vetnoderm Cream</p>\r\n', 'Vetnoderm Cream.jpg', 0, '0000-00-00'),
(9, 3, 'Mycocide Shampoo', 435.00, '<p>Mycocide Shampoo</p>\r\n', 'Mycocide Shampoo.jpg', 0, '0000-00-00'),
(10, 3, 'Easotic Eardrops', 750.00, '<p>Easotic Eardrops</p>\r\n', 'Easotic Eardrops.jpg', 10, '0000-00-00'),
(11, 1, 'Michiko Slicker Brush (Large)', 180.00, '<p>Michiko Slicker Brush (Large)</p>\r\n', 'Michiko Slicker Brush (Large).jpeg', 0, '0000-00-00'),
(12, 1, 'Metal Comb (Small)', 195.00, '<p>Metal Comb (Small)</p>\r\n', 'Metal Comb (Small).jpg', 92, '0000-00-00'),
(13, 15, 'Superman', 150.00, 'For small pet', 'Superman.jpg', 250, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_pets_id` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `thedate` date NOT NULL,
  `time_reservation` varchar(200) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `findings` varchar(200) NOT NULL,
  `prescription` varchar(200) NOT NULL,
  `products_used` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `prod_price` double(13,2) NOT NULL,
  `total` double(13,2) NOT NULL,
  `amount_paid` double(13,2) NOT NULL,
  `_change` double(13,2) NOT NULL,
  `pay_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `process_done` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_pets_id`, `id_services`, `thedate`, `time_reservation`, `start_time`, `end_time`, `findings`, `prescription`, `products_used`, `qty`, `prod_price`, `total`, `amount_paid`, `_change`, `pay_date`, `status`, `process_done`) VALUES
(1, 2, 8, '2019-09-29', '05:30 p.m - 07:00 p.m', '17:30:00', '19:00:00', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00'),
(2, 1, 7, '2019-09-29', '05:30 p.m - 07:00 p.m', '17:30:00', '19:00:00', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00'),
(3, 1, 0, '2019-09-30', '10:00 a.m - 10:30 a.m', '10:00:00', '10:30:00', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00'),
(4, 1, 8, '2019-09-30', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `day` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `id_type`, `day`) VALUES
(1, 1, 'Sunday'),
(2, 1, 'Monday'),
(3, 1, 'Tuesday'),
(4, 1, 'Wednesday'),
(5, 1, 'Thursday'),
(6, 1, 'Friday'),
(7, 1, 'Saturday'),
(8, 2, 'Sunday'),
(9, 2, 'Monday'),
(10, 2, 'Tuesday'),
(11, 2, 'Wednesday'),
(12, 2, 'Thursday'),
(13, 2, 'Friday'),
(14, 2, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double(13,2) NOT NULL,
  `details` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `id_category`, `name`, `price`, `details`, `photo`, `deleted_date`) VALUES
(1, 12, 'General Anesthesia', 1500.00, '<p>General Anesthesia</p>\r\n', 'General Anesthesia.jpg', '0000-00-00'),
(2, 12, 'Sedation Anesthesia', 750.00, '<p>Sedation Anesthesia</p>\r\n', 'Sedation Anesthesia.jpg', '0000-00-00'),
(3, 13, 'Boarding for Small Breed', 300.00, '<p>Boarding for Small Breed</p>\r\n', 'Boarding for Small Breed.jpg', '0000-00-00'),
(4, 13, 'Boarding for Medium Breed', 400.00, '<p>Boarding for Medium Breed</p>\r\n', 'Boarding for Medium Breed.jpg', '0000-00-00'),
(5, 12, 'Local Anesthesia', 500.00, '<p>Local Anesthesia</p>\r\n', 'Local Anesthesia.jpg', '0000-00-00'),
(6, 13, 'Boarding for Large Breed', 500.00, '<p>Boarding for Large Breed</p>\r\n', 'Boarding for Large Breed.jpg', '0000-00-00'),
(7, 1, 'Toy Breed', 350.00, '<p>Toy Breed</p>\r\n', 'Toy Breed.jpg', '0000-00-00'),
(8, 1, 'Nail Trim for Small Breed', 75.00, '<p>Nail Trim for Small Breed</p>\r\n', 'Nail Trim for Small Breed.jpg', '0000-00-00'),
(9, 1, 'Ear Clean', 150.00, '<p>Ear Clean</p>\r\n', 'Ear Clean_1564633528.jpg', '0000-00-00'),
(10, 1, 'Nail Trim for Medium Breed', 150.00, '<p>Nail Trim for Medium Breed</p>\r\n', 'Nail Trim for Medium Breed.jpg', '0000-00-00'),
(11, 1, 'Nail Trim for Large Breed', 150.00, '<p>Nail Trim for Large Breed</p>\r\n', 'Nail Trim for Large Breed.jpg', '0000-00-00'),
(12, 1, 'Ear Cleaning with Otitis', 350.00, '<p>Ear Cleaning with Otitis</p>\r\n', 'Ear Cleaning with Otitis.jpg', '0000-00-00'),
(13, 7, 'Deworming 0-3 kgs', 200.00, '<p>Deworming 0-3 kgs</p>\r\n', 'Deworming 0-3 kgs.jpg', '0000-00-00'),
(14, 7, 'Deworming 4-6 kgs', 250.00, '<p>Deworming 4-6 kgs</p>\r\n', 'Deworming 4-6 kgs.jpg', '0000-00-00'),
(15, 7, 'Deworming 7-10 kgs', 300.00, '<p>Deworming 7-10 kgs</p>\r\n', 'Deworming 7-10 kgs.jpg', '0000-00-00'),
(16, 7, 'Deworming 11-15 kgs', 450.00, '<p>Deworming 11-15 kgs</p>\r\n', 'Deworming 11-15 kgs.jpg', '0000-00-00'),
(17, 7, 'Deworming 16-20 kgs', 600.00, '<p>Deworming 16-20 kgs</p>\r\n', 'Deworming 16-20 kgs.jpg', '0000-00-00'),
(18, 7, 'Deworming 21-25 kgs', 750.00, '<p>Deworming 21-25 kgs</p>\r\n', 'Deworming 21-25 kgs.jpg', '0000-00-00'),
(19, 11, 'Canine Parvovirus Test', 800.00, '<p>Canine Parvovirus Test</p>\r\n', 'Canine Parvovirus Test.jpeg', '0000-00-00'),
(20, 11, 'Canine Distemper Test', 800.00, '<p>Canine Distemper Test</p>\r\n', 'Canine Distemper Test.jpg', '0000-00-00'),
(21, 11, 'T4', 500.00, '<p>T4</p>\r\n', 'T4.jpg', '0000-00-00'),
(22, 11, 'Ear Swab Test', 250.00, '<p>Ear Swab Test</p>\r\n', 'Ear Swab Test_1564633538.jpg', '0000-00-00'),
(23, 11, 'Skin Scraping Test', 250.00, '<p>Skin Scraping Test</p>\r\n', 'Skin Scraping Test.jpg', '0000-00-00'),
(24, 1, 'Hilot', 150.00, 'hilot para sa pets', 'Hilot.jpg', '0000-00-00'),
(25, 12, 'therapy', -200.00, '<p><em>juihih</em></p>\r\n', 'therapy.jpg', '2019-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_expired`
--

CREATE TABLE `stocks_expired` (
  `id_stocks_expired` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `batch_number` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `stocks` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `expired_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_expired`
--

INSERT INTO `stocks_expired` (`id_stocks_expired`, `id_products`, `batch_number`, `expired_date`, `stocks`, `date_added`, `expired_flag`) VALUES
(1, 3, 1, '2019-02-01', 8, '0000-00-00', 1),
(2, 3, 2, '2019-08-24', 15, '0000-00-00', 1),
(3, 3, 3, '2020-07-25', 2, '0000-00-00', 0),
(4, 12, 1, '2020-02-15', 25, '0000-00-00', 0),
(5, 12, 2, '2020-06-13', 5, '0000-00-00', 0),
(6, 4, 1, '2019-08-31', 100, '2019-08-24', 1),
(7, 3, 4, '2019-08-31', 100, '2019-08-24', 1),
(8, 3, 5, '2019-08-30', 50, '2019-08-24', 1),
(9, 3, 6, '2019-08-31', 10, '2019-08-24', 1),
(10, 3, 7, '2019-08-18', 13, '2019-08-24', 1),
(11, 8, 1, '2019-08-31', 999, '2019-08-24', 1),
(12, 8, 2, '2019-08-31', 888, '2019-08-24', 1),
(13, 8, 3, '2019-08-29', 777, '2019-08-24', 1),
(14, 7, 1, '2019-08-25', 100, '2019-08-24', 1),
(15, 12, 3, '0000-00-00', 50, '2019-09-01', 1),
(16, 13, 1, '0000-00-00', 100, '2019-09-01', 1),
(17, 13, 2, '2019-12-13', 149, '2019-09-01', 0),
(18, 12, 4, '2019-09-30', 10, '2019-09-11', 0),
(19, 12, 5, '2019-09-29', 10, '2019-09-11', 0),
(20, 3, 8, '2019-09-29', 2, '2019-09-11', 0),
(21, 12, 6, '2019-09-29', 2, '2019-09-11', 0),
(22, 3, 9, '2019-09-27', 2, '2019-09-11', 0),
(23, 3, 10, '2019-09-30', 2, '2019-09-11', 0),
(24, 7, 2, '2019-09-27', 2233, '2019-09-11', 0),
(25, 8, 4, '2019-09-27', 11, '2019-09-11', 0),
(26, 7, 3, '2019-11-30', 331, '2019-09-11', 0),
(27, 10, 1, '2019-09-30', 10, '2019-09-11', 0),
(28, 1, 1, '2019-09-30', 0, '2019-09-11', 0),
(29, 1, 2, '2019-09-30', 2, '2019-09-11', 0),
(30, 2, 1, '2019-10-05', 12, '2019-09-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `time_reservation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `schedule_id`, `time_reservation`) VALUES
(1, 1, '12:00 p.m - 12:30 p.m'),
(2, 1, '12:30 p.m - 01:00 p.m'),
(3, 1, '01:00 p.m - 01:30 p.m'),
(4, 1, '01:30 p.m - 02:00 p.m'),
(5, 1, '02:00 p.m - 02:30 p.m'),
(6, 1, '02:30 p.m - 03:00 p.m'),
(7, 1, '03:00 p.m - 03:30 p.m'),
(8, 1, '03:30 p.m - 04:00 p.m'),
(9, 1, '04:00 p.m - 04:30 p.m'),
(10, 1, '04:30 p.m - 05:00 p.m'),
(11, 2, '10:00 a.m - 10:30 a.m'),
(12, 2, '10:30 a.m - 11:00 a.m'),
(13, 2, '11:00 a.m - 11:30 a.m'),
(14, 2, '11:30 a.m - 12:00 p.m'),
(15, 2, '12:00 p.m - 12:30 p.m'),
(16, 2, '12:30 p.m - 01:00 p.m'),
(17, 2, '01:00 p.m - 01:30 p.m'),
(18, 2, '01:30 p.m - 02:00 p.m'),
(19, 2, '02:00 p.m - 02:30 p.m'),
(20, 2, '02:30 p.m - 03:00 p.m'),
(21, 2, '03:00 p.m - 03:30 p.m'),
(22, 2, '03:30 p.m - 04:00 p.m'),
(23, 2, '04:00 p.m - 04:30 p.m'),
(24, 2, '04:30 p.m - 05:00 p.m'),
(25, 2, '05:00 p.m - 05:30 p.m'),
(26, 2, '05:30 p.m - 06:00 p.m'),
(27, 2, '06:00 p.m - 06:30 p.m'),
(28, 2, '06:30 p.m - 07:00 p.m'),
(29, 3, '10:00 a.m - 10:30 a.m'),
(30, 3, '10:30 a.m - 11:00 a.m'),
(31, 3, '11:00 a.m - 11:30 a.m'),
(32, 3, '11:30 a.m - 12:00 p.m'),
(33, 3, '12:00 p.m - 12:30 p.m'),
(34, 3, '12:30 p.m - 01:00 p.m'),
(35, 3, '01:00 p.m - 01:30 p.m'),
(36, 3, '01:30 p.m - 02:00 p.m '),
(37, 3, '02:00 p.m - 02:30 p.m'),
(38, 3, '02:30 p.m - 03:00 p.m'),
(39, 3, '03:00 p.m - 03:30 p.m'),
(40, 3, '03:30 p.m - 04:00 p.m'),
(41, 3, '04:00 p.m - 04:30 p.m'),
(42, 3, '04:30 p.m - 05:00 p.m'),
(43, 3, '05:00 p.m - 05:30 p.m'),
(44, 3, '05:30 p.m - 06:00 p.m'),
(45, 3, '06:00 p.m - 06:30 p.m'),
(46, 3, '06:30 p.m - 07:00 p.m'),
(47, 4, '10:00 a.m - 10:30 a.m'),
(48, 4, '10:30 a.m - 11:00 a.m'),
(49, 4, '11:00 a.m - 11:30 a.m'),
(50, 4, '11:30 a.m - 12:00 p.m'),
(51, 4, '12:00 p.m - 12:30 p.m'),
(52, 4, '12:30 p.m - 01:00 p.m'),
(53, 4, '01:00 p.m - 01:30 p.m'),
(54, 4, '01:30 p.m - 02:00 p.m '),
(55, 4, '02:00 p.m - 02:30 p.m'),
(56, 4, '02:30 p.m - 03:00 p.m'),
(57, 4, '03:00 p.m - 03:30 p.m'),
(58, 4, '03:30 p.m - 04:00 p.m'),
(59, 4, '04:00 p.m - 04:30 p.m'),
(60, 4, '04:30 p.m - 05:00 p.m'),
(61, 4, '05:00 p.m - 05:30 p.m'),
(62, 4, '05:30 p.m - 06:00 p.m'),
(63, 4, '06:00 p.m - 06:30 p.m'),
(64, 4, '06:30 p.m - 07:00 p.m'),
(65, 5, '10:00 a.m - 10:30 a.m'),
(66, 5, '10:30 a.m - 11:00 a.m'),
(67, 5, '11:00 a.m - 11:30 a.m'),
(68, 5, '11:30 a.m - 12:00 p.m'),
(69, 5, '12:00 p.m - 12:30 p.m'),
(70, 5, '12:30 p.m - 01:00 p.m'),
(71, 5, '01:00 p.m - 01:30 p.m'),
(72, 5, '01:30 p.m - 02:00 p.m'),
(73, 5, '02:00 p.m - 02:30 p.m'),
(74, 5, '02:30 p.m - 03:00 p.m'),
(75, 5, '03:00 p.m - 03:30 p.m'),
(76, 5, '03:30 p.m - 04:00 p.m'),
(77, 5, '04:00 p.m - 04:30 p.m'),
(78, 5, '04:30 p.m - 05:00 p.m'),
(79, 5, '05:00 p.m - 05:30 p.m'),
(80, 5, '06:00 p.m - 06:30 p.m'),
(81, 5, '06:00 p.m - 06:30 p.m'),
(82, 5, '06:30 p.m - 07:00 p.m'),
(83, 6, '10:00 a.m - 10:30 a.m'),
(84, 6, '10:30 a.m - 11:00 a.m'),
(85, 6, '11:00 a.m - 11:30 a.m'),
(86, 6, '11:30 a.m - 12:00 p.m'),
(87, 6, '12:00 p.m - 12:30 p.m'),
(88, 6, '01:00 p.m - 01:30 p.m'),
(89, 6, '01:00 p.m - 01:30 p.m'),
(90, 6, '01:30 p.m - 02:00 p.m'),
(91, 6, '02:00 p.m - 02:30 p.m'),
(92, 6, '02:30 p.m - 03:00 p.m'),
(93, 6, '03:00 p.m - 03:30 p.m'),
(94, 6, '03:30 p.m - 04:00 p.m'),
(95, 6, '04:00 p.m - 04:30 p.m'),
(96, 6, '04:30 p.m - 05:00 p.m'),
(97, 6, '05:00 p.m - 05:30 p.m'),
(98, 6, '05:30 p.m - 06:00 p.m'),
(99, 6, '06:00 p.m - 06:30 p.m'),
(100, 6, '06:30 p.m - 07:00 p.m'),
(101, 7, '10:00 a.m - 10:30 a.m'),
(102, 7, '10:30 a.m - 11:00 a.m'),
(103, 7, '11:00 a.m - 11:30 a.m'),
(104, 7, '11:30 a.m - 12:00 p.m'),
(105, 7, '12:00 p.m - 12:30 p.m'),
(106, 7, '12:30 p.m - 01:00 p.m'),
(107, 7, '01:00 p.m - 01:30 p.m'),
(108, 7, '01:30 p.m - 02:00 p.m'),
(109, 7, '02:00 p.m - 02:30 p.m'),
(110, 7, '02:30 p.m - 03:00 p.m'),
(111, 7, '03:00 p.m - 03:30 p.m'),
(112, 7, '03:30 p.m - 04:00 p.m'),
(113, 7, '04:00 p.m - 04:30 p.m'),
(114, 7, '04:30 p.m - 05:00 p.m'),
(115, 7, '05:00 p.m - 05:30 p.m'),
(116, 7, '05:30 p.m - 06:00 p.m'),
(117, 7, '06:00 p.m - 06:30 p.m'),
(118, 7, '06:30 p.m - 07:00 p.m'),
(119, 8, '10:00 a.m - 11:30 a.m'),
(120, 8, '11:30 a.m - 01:00 p.m'),
(121, 8, '01:00 p.m - 02:30 p.m'),
(122, 8, '02:30 p.m - 04:00 p.m'),
(123, 8, '04:00 p.m - 05:30 p.m'),
(124, 8, '05:30 p.m - 07:00 p.m'),
(125, 9, '10:00 a.m - 11:30 a.m'),
(126, 9, '11:30 a.m - 01:00 p.m'),
(127, 9, '01:00 p.m - 02:30 p.m'),
(128, 9, '02:30 p.m - 04:00 p.m'),
(129, 9, '04:00 p.m - 05:30 p.m'),
(130, 9, '05:30 p.m - 07:00 p.m'),
(131, 10, '09:00 a.m - 10:30 a.m'),
(132, 10, '10:30 a.m - 12:00 p.m'),
(133, 10, '12:00 p.m - 01:30 p.m'),
(134, 10, '01:30 p.m - 03:00 p.m'),
(135, 10, '03:00 p.m - 04:30 p.m'),
(136, 10, '04:30 p.m - 06:00 p.m'),
(137, 11, '10:00 a.m - 11:30 a.m'),
(138, 11, '11:30 a.m - 01:00 p.m'),
(139, 11, '01:00 p.m - 02:30 p.m'),
(140, 11, '02:30 p.m - 04:00 p.m'),
(141, 11, '04:00 p.m - 05:30 p.m'),
(142, 11, '05:30 p.m - 07:00 p.m'),
(143, 12, '10:00 a.m - 11:30 a.m'),
(144, 12, '11:30 a.m - 01:00 p.m'),
(145, 12, '01:00 p.m - 02:30 p.m'),
(146, 12, '02:30 p.m - 04:00 p.m'),
(147, 12, '04:00 p.m - 05:30 p.m'),
(148, 12, '05:30 p.m - 07:00 p.m'),
(149, 13, '10:00 a.m - 11:30 a.m'),
(150, 13, '11:30 a.m - 01:00 p.m'),
(151, 13, '01:00 p.m - 02:30 p.m'),
(152, 13, '02:30 p.m - 04:00 p.m'),
(153, 13, '04:00 p.m - 05:30 p.m'),
(154, 13, '05:30 p.m - 07:00 p.m'),
(155, 14, '10:00 a.m - 11:30 a.m'),
(156, 14, '11:30 a.m - 01:00 p.m'),
(157, 14, '01:00 p.m - 02:30 p.m'),
(158, 14, '02:30 p.m - 04:00 p.m'),
(159, 14, '04:00 p.m - 05:30 p.m'),
(160, 14, '05:30 p.m - 07:00 p.m');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'Clinic'),
(2, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_cust` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `home` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_cust`, `firstname`, `lastname`, `home`, `email`, `contact`, `password`, `photo`, `type`, `status`, `activate_code`, `reset_code`) VALUES
(1, 'Andrea', 'Capistrano', 'Unit 25 Emeral Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila', 'andrea_capistrano@gmail.com', '09166437127', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 1, 1, '', ''),
(2, 'Amabelle', 'Capistrano', 'Unit 25 Emeral Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila', 'amabelle_capistrano@gmail.com', '09166437127', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 2, 1, '', ''),
(3, 'Princess', 'Gabayne', '#44 JP. Rizal St. Brgy. Onse, San Juan City', 'princessgabayne@gmail.com', '09463565156', '$2y$10$UD5SR7THyCv7aX77GUkHB.cz5alGBvhHf4r/Ei4Kd6y4XRCtb5BLu', '1970-01-01 08.00.00 1.jpg', 0, 1, '1QjJi4DozveA', ''),
(4, 'Felix', 'Gabayne', '934 Easter St. Saint Gregory Village, Cainta ,Rizal', 'gabaynefelix02@gmail.com', '09223964402', '$2y$10$H3nzBWgTyZgYR.J6chg4sO6C/FeO8VnxGIPb8VwfKFdRQso3yWxSW', '60357400_2726173040731796_2840155198742069248_n.jpg', 0, 1, 'Xa6wM1b285dm', ''),
(5, 'Jona', 'Malacad', '', 'gabayneprincess@gmail.com', '', '$2y$10$L9lbBbN8lI93a8R8ad5kvepb2sMTb8oI9ymLvApzZQEmMNvuzYqOi', '', 0, 1, 'BJheZrDdHwnL', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_pets`
--

CREATE TABLE `user_pets` (
  `user_pets_id` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pets`
--

INSERT INTO `user_pets` (`user_pets_id`, `id_cust`, `id_pet`) VALUES
(1, 3, 1),
(2, 4, 2),
(3, 4, 3),
(4, 3, 4),
(5, 5, 5),
(6, 3, 6),
(7, 5, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `order_main`
--
ALTER TABLE `order_main`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_pet` (`id_pet`,`id_cust`),
  ADD KEY `id_cust` (`id_cust`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_products` (`id_products`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_pets_id` (`user_pets_id`,`id_services`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `id_services` (`id_services`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `id_services` (`id_services`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `stocks_expired`
--
ALTER TABLE `stocks_expired`
  ADD PRIMARY KEY (`id_stocks_expired`),
  ADD KEY `id_stocks_expired` (`id_stocks_expired`,`id_products`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_cust`),
  ADD KEY `id_cust` (`id_cust`);

--
-- Indexes for table `user_pets`
--
ALTER TABLE `user_pets`
  ADD PRIMARY KEY (`user_pets_id`),
  ADD KEY `user_pets_id` (`user_pets_id`,`id_cust`,`id_pet`),
  ADD KEY `id_pet` (`id_pet`),
  ADD KEY `id_cust` (`id_cust`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_main`
--
ALTER TABLE `order_main`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stocks_expired`
--
ALTER TABLE `stocks_expired`
  MODIFY `id_stocks_expired` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_pets`
--
ALTER TABLE `user_pets`
  MODIFY `user_pets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_pets_id`) REFERENCES `user_pets` (`user_pets_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `stocks_expired`
--
ALTER TABLE `stocks_expired`
  ADD CONSTRAINT `stocks_expired_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`);

--
-- Constraints for table `user_pets`
--
ALTER TABLE `user_pets`
  ADD CONSTRAINT `user_pets_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `pets` (`id_pet`),
  ADD CONSTRAINT `user_pets_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `users` (`id_cust`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
