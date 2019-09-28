-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 04:50 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

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
(1, 65, '2019-10-17', 'Available'),
(2, 66, '2019-10-17', 'Available'),
(3, 3, '2019-10-13', 'Available'),
(4, 5, '2019-10-13', 'Available'),
(5, 11, '2019-10-14', 'Available'),
(6, 30, '2019-09-24', 'Available'),
(7, 12, '2019-10-14', 'Available'),
(8, 11, '2019-10-21', 'Not Available'),
(9, 47, '2019-10-23', 'Not Available'),
(10, 48, '2019-10-23', 'Not Available'),
(11, 30, '2019-10-08', 'Not Available'),
(12, 132, '2019-10-01', 'Not Available'),
(13, 143, '2019-10-24', 'Available'),
(14, 105, '2019-10-05', 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `findings_prescription`
--

CREATE TABLE `findings_prescription` (
  `fp_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `findings` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `findings_prescription`
--

INSERT INTO `findings_prescription` (`fp_id`, `reservation_id`, `findings`, `prescription`) VALUES
(1, 1, 'hatdog', 'asdasdas'),
(2, 1, 'hatdog', 'asdasdas'),
(3, 1, 'marie', 'jona'),
(4, 1, 'marie', 'jona'),
(5, 2, 'ddd', 'jjjj'),
(6, 2, 'ddd', 'jjjj'),
(7, 1, 'testtestes', 'test'),
(8, 1, 'testtestes', 'test'),
(9, 1, 'aa', ''),
(10, 1, '12', '22'),
(11, 1, 'testing', 'testing'),
(12, 1, 'test', 'test'),
(13, 1, '1', '1'),
(14, 1, '1', '1'),
(15, 1, '1', '1'),
(16, 1, '1', '1'),
(17, 1, 'adsnfiure', 'kovdpsjgroi'),
(18, 2, 'asdjisa', 'nckdsfne'),
(19, 1, 'xsdf', 'fehy6y'),
(20, 12, 'aa', 'dsagh'),
(21, 1, 'okay lang', 'biogesic'),
(22, 1, 'okay lang', 'biogesic'),
(23, 17, 'okay ', 'biogesic'),
(24, 17, 'okay ', 'biogesic'),
(25, 11, 'sfjehgfewiu', 'bvfeihgiu'),
(26, 16, 'sgdg', 'vdsbfw'),
(27, 4, 'aaaa', 'nbdofgeoi'),
(28, 4, 'aaaa', 'nbdofgeoi'),
(29, 4, 'aaaa', 'nbdofgeoi'),
(30, 4, 'aaaa', 'nbdofgeoi'),
(31, 4, 'aaaa', 'nbdofgeoi'),
(32, 4, 'aaaa', 'nbdofgeoi');

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
(1, 2, 1, 1, '0.00'),
(2, 3, 3, 1, '40.00'),
(3, 4, 5, 1, '350.00'),
(4, 5, 5, 1, '350.00'),
(5, 5, 10, 10, '750.00');

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
(1, '0.00', '0.00', '2019-09-26'),
(2, '0.00', '0.00', '2019-09-26'),
(3, '0.00', '0.00', '2019-09-26'),
(4, '0.00', '0.00', '2019-09-27'),
(5, '0.00', '0.00', '2019-09-28');

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
(1, 3, 'Bella', 'Cat', 'Persian', 'Female', '0000-00-00'),
(2, 4, 'Cyst', 'Dog', 'Poodle', 'Female', '0000-00-00'),
(3, 5, 'Dai', 'Cat', 'American Bobtail', 'Female', '0000-00-00'),
(4, 6, 'Sammy', 'Dog', 'Chow Chow', 'Male', '0000-00-00'),
(5, 7, 'Max', 'Dog', 'American Eskimo Dog', 'Male', '0000-00-00'),
(6, 8, 'Janella', 'Cat', 'Bombay', 'Female', '0000-00-00'),
(7, 3, 'Ikawatako', 'Dog', 'American Water Spaniel', 'Male', '0000-00-00'),
(8, 8, 'Diakodragon', 'Dog', 'German Shepherd Dog', 'Male', '0000-00-00'),
(9, 10, 'Coffee', 'Dog', 'Pug', 'Female', '0000-00-00'),
(10, 3, 'Wansa', 'Cat', 'American Bobtail', 'Male', '0000-00-00'),
(11, 11, 'Josh', 'Dog', 'American Water Spaniel', 'Female', '0000-00-00'),
(12, 10, 'Panda', 'Dog', 'Beagle', 'Female', '0000-00-00'),
(13, 10, 'shane', 'Dog', 'American Cocker Spaniel', 'Female', '0000-00-00'),
(14, 10, 'Whitey', 'Dog', 'American Hairless Terrier', 'Male', '0000-00-00'),
(15, 10, 'Blonde', 'Dog', 'Australian Shepherd', 'Female', '0000-00-00'),
(16, 12, 'Dai', 'Cat', 'Maine Coon', 'Female', '0000-00-00'),
(17, 3, 'Jose', 'Dog', 'Alaskan Malamute', 'Male', '0000-00-00'),
(18, 13, 'MIMI', 'Dog', 'Basenji', 'Female', '0000-00-00'),
(19, 14, 'Shakira', 'Cat', 'Egyptian Mau', 'Female', '0000-00-00'),
(20, 15, 'Alex', 'Dog', 'Bloodhound', 'Male', '0000-00-00'),
(21, 16, 'Pandan', 'Cat', 'American Bobtail', 'Female', '0000-00-00'),
(22, 17, 'Chowchow', 'Dog', 'Maltese', 'Female', '0000-00-00'),
(23, 17, 'YaoYao', 'Cat', 'American Bobtail', 'Male', '0000-00-00');

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
(1, 1, 'Furmagic 1 Liter', 500.00, '<p>Furmagic 1 Liter</p>\r\n', 'Furmagic 1 Liter.jpg', 61, '0000-00-00'),
(2, 1, 'Furmagic 300 mL', 250.00, '<p>Furmagic 300 mL</p>\r\n', 'Furmagic 300 mL.jpg', 124, '0000-00-00'),
(3, 2, 'Arthrox (Glucosamine) Tablet', 40.00, '<p>Arthrox (Glucosamine) Tablet</p>\r\n', 'Arthrox (Glucosamine) Tablet_1564633510.jpg', 89, '0000-00-00'),
(4, 1, 'Pet Expert Pet Shampoo 500 mL', 350.00, '<p>Pet Expert Pet Shampoo 500 mL</p>\r\n', 'Pet Expert Pet Shampoo 500 mL.jpg', 200, '0000-00-00'),
(5, 1, 'Sentry Shampoo for Cats 335 mL', 350.00, '<p>Sentry Shampoo for Cats 335 mL</p>\r\n', 'Sentry Shampoo for Cats 335 mL.jpg', 188, '0000-00-00'),
(6, 1, 'Michiko Nail Clipper', 230.00, '<p>Michiko Nail Clipper</p>\r\n', 'Michiko Nail Clipper.png', 7, '0000-00-00'),
(7, 2, 'Puppy Boost', 730.00, '<p>Puppy Boost</p>\r\n', 'Puppy Boost.jpg', 85, '0000-00-00'),
(8, 3, 'Vetnoderm Cream', 290.00, '<p>Vetnoderm Cream</p>\r\n', 'Vetnoderm Cream.jpg', 0, '0000-00-00'),
(9, 3, 'Mycocide Shampoo', 435.00, '<p>Mycocide Shampoo</p>\r\n', 'Mycocide Shampoo.jpg', 98, '0000-00-00'),
(10, 3, 'Easotic Eardrops', 750.00, '<p>Easotic Eardrops</p>\r\n', 'Easotic Eardrops.jpg', 90, '0000-00-00'),
(11, 1, 'Michiko Slicker Brush (Large)', 180.00, '<p>Michiko Slicker Brush (Large)</p>\r\n', 'Michiko Slicker Brush (Large).jpeg', -4, '0000-00-00'),
(12, 1, 'Metal Comb (Small)', 195.00, '<p>Metal Comb (Small)</p>\r\n', 'Metal Comb (Small).jpg', 0, '0000-00-00'),
(13, 15, 'Superman', 150.00, 'For small pet', 'Superman.jpg', 100, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products_used`
--

CREATE TABLE `products_used` (
  `pu_id` int(11) NOT NULL,
  `fp_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` double(13,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_used`
--

INSERT INTO `products_used` (`pu_id`, `fp_id`, `productid`, `product`, `price`, `qty`) VALUES
(1, 29, 1, 'Furmagic 1 Liter', 500.00, 2),
(2, 30, 3, 'Arthrox (Glucosamine) Tablet', 40.00, 2),
(3, 31, 2, 'Furmagic 300 mL', 250.00, 2),
(4, 32, 11, 'Michiko Slicker Brush (Large)', 180.00, 2);

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
  `r_type` varchar(50) NOT NULL,
  `total` double(13,2) NOT NULL,
  `amount_paid` double(13,2) NOT NULL,
  `_change` double(13,2) NOT NULL,
  `pay_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `process_done` date NOT NULL,
  `decline_remarks` text,
  `flag_seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_pets_id`, `id_services`, `thedate`, `time_reservation`, `start_time`, `end_time`, `r_type`, `total`, `amount_paid`, `_change`, `pay_date`, `status`, `process_done`, `decline_remarks`, `flag_seen`) VALUES
(1, 10, 0, '2019-11-02', '11:30 a.m - 12:00 p.m', '11:30:00', '12:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'test', 1),
(2, 1, 9, '2019-11-11', '11:30 a.m - 01:00 p.m', '11:30:00', '13:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Confirm', '0000-00-00', NULL, 0),
(3, 12, 12, '2019-11-11', '11:30 a.m - 01:00 p.m', '11:30:00', '13:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', NULL, 0),
(4, 9, 0, '2019-10-31', '06:30 p.m - 07:00 p.m', '18:30:00', '19:00:00', 'Online', 0.00, 2200.00, 2200.00, '2019-09-25', 'Paid', '2019-09-23', NULL, 0),
(5, 12, 0, '2019-10-26', '06:00 p.m - 06:30 p.m', '18:00:00', '18:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'ayaw', 1),
(6, 13, 0, '2019-10-25', '06:30 p.m - 07:00 p.m', '18:30:00', '19:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'sample', 1),
(7, 17, 0, '2020-02-26', '12:30 p.m - 01:00 p.m', '12:30:00', '13:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'ayoko nga e', 1),
(8, 10, 8, '2019-10-24', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(9, 19, 0, '2019-09-25', '02:00 p.m - 02:30 p.m', '14:00:00', '14:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Waiting', '0000-00-00', NULL, 0),
(11, 20, 7, '2019-09-25', '01:00 p.m - 02:30 p.m', '13:00:00', '14:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(12, 20, 11, '2019-09-25', '04:00 p.m - 05:30 p.m', '16:00:00', '17:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(13, 19, 11, '2019-09-25', '04:00 p.m - 05:30 p.m', '16:00:00', '17:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(14, 20, 7, '2019-09-25', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(15, 19, 8, '2019-09-25', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', 'Walkin', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(16, 10, 0, '2019-09-25', '11:30 a.m - 12:00 p.m', '11:30:00', '12:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'ayo q', 1),
(17, 10, 0, '2019-09-25', '11:00 a.m - 11:30 a.m', '11:00:00', '11:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'wwwww', 1),
(18, 7, 0, '2019-10-03', '05:00 p.m - 05:30 p.m', '17:00:00', '17:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Decline', '0000-00-00', 'vhdht', 1),
(19, 21, 7, '2019-09-27', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', 'Walkin', 350.00, 0.00, 0.00, '0000-00-00', 'Confirm', '2019-09-27', NULL, 0),
(20, 22, 0, '2019-10-08', '01:00 p.m - 01:30 p.m', '13:00:00', '13:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(21, 23, 7, '2019-10-08', '12:00 p.m - 01:30 p.m', '12:00:00', '13:30:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(22, 1, 3, '2019-10-12', '09:00 a.m', '00:00:00', '00:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(23, 1, 3, '2019-10-12', '09:00 a.m', '00:00:00', '00:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(24, 7, 3, '2019-10-12', '10:00 a.m', '00:00:00', '00:00:00', 'Online', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0);

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
(31, 13, 1, '2020-08-31', 100, '2019-09-21', 0),
(32, 1, 1, '2020-08-31', 0, '2019-09-21', 0),
(33, 2, 1, '2020-08-31', 24, '2019-09-21', 0),
(34, 3, 1, '2020-08-31', 0, '2019-09-21', 0),
(35, 4, 1, '2020-08-31', 100, '2019-09-21', 0),
(36, 5, 1, '2020-08-31', 88, '2019-09-21', 0),
(37, 1, 2, '2020-05-31', 61, '2019-09-21', 0),
(38, 2, 2, '2020-05-31', 100, '2019-09-21', 0),
(39, 3, 2, '2020-05-31', 0, '2019-09-21', 0),
(40, 4, 2, '2020-05-31', 100, '2019-09-21', 0),
(41, 5, 2, '2020-05-31', 100, '2019-09-21', 0),
(42, 6, 1, '2020-05-31', 7, '2019-09-21', 0),
(43, 9, 1, '2020-05-31', 98, '2019-09-21', 0),
(44, 7, 1, '2020-05-31', 85, '2019-09-21', 0),
(45, 8, 1, '2019-09-25', 150, '2019-09-21', 1),
(46, 8, 2, '2019-09-30', 100, '2019-09-23', 1),
(47, 8, 3, '2019-09-30', 100, '2019-09-23', 1),
(48, 11, 1, '2019-11-01', 20, '2019-09-23', 1),
(49, 3, 3, '2020-08-20', 89, '2019-09-25', 0),
(50, 10, 1, '2022-08-25', 90, '2019-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_supplier` int(11) NOT NULL,
  `contact_person` varchar(200) NOT NULL,
  `contact_number` text NOT NULL,
  `product` varchar(200) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_supplier`, `contact_person`, `contact_number`, `product`, `deleted_date`) VALUES
(1, 'Jollibees', '8700', 'Furmagic 1 Liter', '0000-00-00');

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
(3, 'Princess', 'Gabayne', '', 'princessgabayne@gmail.com', '09463565156', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(4, 'Cess', 'Calanza', '', 'cesscalanza@gmail.com', '09223964402', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(5, 'Pinky', 'Gabayne', '', 'gabayneprincess@gmail.com', '09987654321', '', '', 0, 0, '', ''),
(6, 'Felix', 'Gabayne', '', 'gabaynefelix02@gmail.com', '09963258741', '', '', 0, 0, '', ''),
(7, 'Jason', 'Tumangday', '', 'jason.tumangday@gmail.com', '09987632541', '', '', 0, 0, '', ''),
(8, 'Maxine', 'Salvador', '', 'maxinesalvador10@gmail.com', '097418529633', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(9, 'Sapphire', 'Sap', '', 'sapphire09@gmail.com', '', '$2y$10$KgouAnnPYh8GTRjQ4Xf91O9AY7lQ1RssXqxzQCBfk.GR9VAp4MnHm', '', 0, 0, 'mFjxyIMXZRBL', ''),
(10, 'Safira', 'Masha', '', 'sapphire09sap@gmail.com', '', '$2y$10$NXuXrT.7G6C/ROg34Otu0epxMwbN3B4jxnnyA4PV4v6Q/1nBf7nMm', '', 0, 1, 'nkEq5v1dwf2K', ''),
(11, 'Trisha', 'Shane', '', 'supermariespnz1@gmail.com', '09562348401', '', '', 0, 0, '', ''),
(12, 'Rexcie', 'Abiertas', '', 'abiertasrexcie@yahoo.com', '09123456789', '', '', 0, 0, '', ''),
(13, 'Juna Mimiyuuuh', 'Magdangal', '', 'junamii@gmail.com', '09123456789', '', '', 0, 0, '', ''),
(14, 'jason', 'tumangday', '', 'jasonnosaj@gmail.com', '09123456789', '', '', 0, 0, '', ''),
(15, 'Jona Miimi', 'yuuuh', '', 'mimiyuuh@gmail.com', '091234567364', '', '', 0, 0, '', ''),
(16, 'Marie', 'Espinoza', '', 'mariespnz@gmail.com', '09562348400', '', '', 0, 0, '', ''),
(17, 'Wen', 'Balingit', '', 'supermariespnz@gmail.com', '', '$2y$10$o5Y6pzoyVCbTexG3vJ4jTOrGxHLQfNwBdgvLWZINVemtUAUHwKBw2', '', 0, 1, 'oRnjVEAhrJU3', '');

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
(3, 5, 3),
(4, 6, 4),
(5, 7, 5),
(6, 8, 6),
(7, 3, 7),
(8, 8, 8),
(9, 10, 9),
(10, 3, 10),
(11, 11, 11),
(12, 10, 12),
(13, 10, 13),
(14, 10, 14),
(15, 10, 15),
(16, 12, 16),
(17, 3, 17),
(18, 13, 18),
(19, 14, 19),
(20, 15, 20),
(21, 16, 21),
(22, 17, 22),
(23, 17, 23);

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id_wastage` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` double(13,2) NOT NULL,
  `stocks` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `batch_number` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `findings_prescription`
--
ALTER TABLE `findings_prescription`
  ADD PRIMARY KEY (`fp_id`);

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
-- Indexes for table `products_used`
--
ALTER TABLE `products_used`
  ADD PRIMARY KEY (`pu_id`);

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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_supplier`);

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
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`id_wastage`);

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
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `findings_prescription`
--
ALTER TABLE `findings_prescription`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_main`
--
ALTER TABLE `order_main`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products_used`
--
ALTER TABLE `products_used`
  MODIFY `pu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  MODIFY `id_stocks_expired` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_pets`
--
ALTER TABLE `user_pets`
  MODIFY `user_pets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `id_wastage` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

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
