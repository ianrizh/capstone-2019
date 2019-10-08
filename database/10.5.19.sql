-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 01:42 AM
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
  `status` varchar(50) NOT NULL,
  `in_charge` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `time_id`, `date`, `status`, `in_charge`) VALUES
(1, 11, '2019-10-14', 'Available', 2),
(2, 0, '2019-10-14', 'Available', 1),
(3, 0, '2019-10-14', 'Available', 1),
(4, 0, '2019-10-17', 'Available', 1),
(5, 11, '2019-10-14', 'Available', 2),
(6, 0, '2019-10-14', 'Available', 0),
(7, 125, '2019-10-14', 'Available', 0),
(8, 130, '2019-10-14', 'Not Available', 1),
(9, 13, '2019-10-14', 'Available', 2),
(10, 0, '2019-10-16', 'Available', 0),
(11, 0, '2019-10-16', 'Available', 1);

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
(1, 1, 'ubo', 'solmux'),
(2, 3, 'asdasdasda', 'asdasda'),
(3, 4, 'asdsadas', 'dadasa'),
(4, 6, 'asdasdasda', 'asdasdada'),
(5, 7, 'asdad', 'asdasd'),
(6, 4, 'test', 'test'),
(7, 4, 'test', 'test'),
(8, 4, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_adjustment`
--

CREATE TABLE `inventory_adjustment` (
  `ia_id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double(13,2) NOT NULL,
  `stocks` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `batch_number` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_adjustment`
--

INSERT INTO `inventory_adjustment` (`ia_id`, `id_products`, `category`, `price`, `stocks`, `expired_date`, `batch_number`, `reason`, `qty`) VALUES
(1, 3, 'Supplements', 40.00, 87, '2020-08-20', 49, 'Product Used in Grooming', 7);

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
(1, 1, 1, 1, '500.00'),
(2, 2, 1, 35, '500.00'),
(3, 3, 3, 1, '40.00'),
(4, 4, 4, 2, '350.00'),
(5, 5, 7, 1, '730.00'),
(6, 6, 13, 1, '150.00'),
(7, 7, 6, 1, '230.00'),
(8, 8, 1, 1, '500.00'),
(9, 9, 1, 1, '500.00'),
(10, 10, 1, 1, '500.00'),
(11, 11, 1, 1, '500.00'),
(12, 12, 1, 1, '500.00'),
(13, 13, 1, 1, '500.00'),
(14, 14, 1, 1, '500.00'),
(15, 15, 1, 1, '500.00'),
(16, 16, 1, 1, '500.00'),
(17, 17, 1, 1, '500.00'),
(18, 18, 1, 1, '500.00'),
(19, 19, 1, 1, '500.00'),
(20, 20, 1, 1, '500.00'),
(21, 21, 1, 1, '500.00'),
(22, 22, 1, 1, '500.00'),
(23, 23, 1, 1, '500.00'),
(24, 24, 1, 1, '500.00'),
(25, 25, 1, 1, '500.00'),
(26, 26, 1, 1, '500.00'),
(27, 27, 1, 1, '500.00'),
(28, 28, 1, 1, '500.00'),
(29, 29, 1, 1, '500.00'),
(30, 30, 1, 1, '500.00'),
(31, 31, 1, 1, '500.00'),
(32, 32, 6, 1, '230.00'),
(33, 33, 5, 5, '350.00'),
(34, 34, 2, 2, '250.00'),
(35, 35, 1, 1, '500.00'),
(36, 36, 5, 1, '350.00'),
(37, 37, 1, 99, '500.00');

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
(1, '500.00', '1000.00', '2019-09-28'),
(2, '17500.00', '18000.00', '2019-09-28'),
(3, '40.00', '50.00', '2019-09-29'),
(4, '700.00', '700.00', '2019-09-29'),
(5, '730.00', '1000.00', '2019-09-29'),
(6, '150.00', '200.00', '2019-09-29'),
(7, '230.00', '500.00', '2019-09-29'),
(8, '500.00', '500.00', '2019-09-29'),
(9, '500.00', '500.00', '2019-09-29'),
(10, '500.00', '500.00', '2019-09-29'),
(11, '500.00', '500.00', '2019-09-29'),
(12, '500.00', '500.00', '2019-09-29'),
(13, '500.00', '500.00', '2019-09-29'),
(14, '500.00', '500.00', '2019-09-29'),
(15, '500.00', '500.00', '2019-09-29'),
(16, '500.00', '500.00', '2019-09-29'),
(17, '500.00', '500.00', '2019-09-29'),
(18, '500.00', '500.00', '2019-09-29'),
(19, '500.00', '500.00', '2019-09-29'),
(20, '500.00', '500.00', '2019-09-29'),
(21, '500.00', '500.00', '2019-09-29'),
(22, '500.00', '500.00', '2019-09-29'),
(23, '500.00', '500.00', '2019-09-29'),
(24, '500.00', '500.00', '2019-09-29'),
(25, '500.00', '500.00', '2019-09-29'),
(26, '500.00', '500.00', '2019-09-29'),
(27, '500.00', '500.00', '2019-09-29'),
(28, '500.00', '500.00', '2019-09-29'),
(29, '500.00', '500.00', '2019-09-29'),
(30, '500.00', '500.00', '2019-09-29'),
(31, '500.00', '500.00', '2019-09-29'),
(32, '230.00', '250.00', '2019-10-01'),
(33, '1750.00', '1800.00', '2019-10-03'),
(34, '500.00', '500.00', '2019-10-03'),
(35, '500.00', '500.00', '2019-10-03'),
(36, '350.00', '350.00', '2019-10-04'),
(37, '49500.00', '50000.00', '2019-10-04');

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
(23, 17, 'YaoYao', 'Cat', 'American Bobtail', 'Male', '0000-00-00'),
(24, 18, 'Hachii', 'Dog', 'Golden Retriever', 'Male', '0000-00-00'),
(25, 19, 'Max', 'Dog', 'American Hairless Terrier', 'Male', '0000-00-00');

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
(1, 1, 'Furmagic 1 Liter', 500.00, '<p>Furmagic 1 Liter</p>\r\n', 'Furmagic 1 Liter.jpg', 0, '0000-00-00'),
(2, 1, 'Furmagic 300 mL', 250.00, '<p>Furmagic 300 mL</p>\r\n', 'Furmagic 300 mL.jpg', 238, '0000-00-00'),
(3, 2, 'Arthrox (Glucosamine) Tablet', 40.00, '<p>Arthrox (Glucosamine) Tablet</p>\r\n', 'Arthrox (Glucosamine) Tablet_1564633510.jpg', 80, '0000-00-00'),
(4, 1, 'Pet Expert Pet Shampoo 500 mL', 350.00, '<p>Pet Expert Pet Shampoo 500 mL</p>\r\n', 'Pet Expert Pet Shampoo 500 mL.jpg', 198, '0000-00-00'),
(5, 1, 'Sentry Shampoo for Cats 335 mL', 350.00, '<p>Sentry Shampoo for Cats 335 mL</p>\r\n', 'Sentry Shampoo for Cats 335 mL.jpg', 379, '0000-00-00'),
(6, 1, 'Michiko Nail Clipper', 230.00, '<p>Michiko Nail Clipper</p>\r\n', 'Michiko Nail Clipper.png', 2, '0000-00-00'),
(7, 2, 'Puppy Boost', 730.00, '<p>Puppy Boost</p>\r\n', 'Puppy Boost.jpg', 83, '0000-00-00'),
(8, 3, 'Vetnoderm Cream', 290.00, '<p>Vetnoderm Cream</p>\r\n', 'Vetnoderm Cream.jpg', 0, '0000-00-00'),
(9, 3, 'Mycocide Shampoo', 435.00, '<p>Mycocide Shampoo</p>\r\n', 'Mycocide Shampoo.jpg', 96, '0000-00-00'),
(10, 3, 'Easotic Eardrops', 750.00, '<p>Easotic Eardrops</p>\r\n', 'Easotic Eardrops.jpg', 88, '0000-00-00'),
(11, 1, 'Michiko Slicker Brush (Large)', 180.00, '<p>Michiko Slicker Brush (Large)</p>\r\n', 'Michiko Slicker Brush (Large).jpeg', -4, '0000-00-00'),
(12, 1, 'Metal Comb (Small)', 195.00, '<p>Metal Comb (Small)</p>\r\n', 'Metal Comb (Small).jpg', 0, '0000-00-00'),
(13, 15, 'Superman', 150.00, 'For small pet', 'Superman.jpg', 99, '0000-00-00');

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
  `qty` int(11) NOT NULL,
  `amount` double(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_used`
--

INSERT INTO `products_used` (`pu_id`, `fp_id`, `productid`, `product`, `price`, `qty`, `amount`) VALUES
(1, 1, 10, 'Easotic Eardrops', 750.00, 1, 750.00),
(2, 2, 7, 'Puppy Boost', 730.00, 1, 730.00),
(3, 3, 5, 'Sentry Shampoo for Cats 335 mL', 350.00, 3, 1050.00),
(4, 4, 1, 'Furmagic 1 Liter', 500.00, 2, 1000.00),
(5, 5, 1, 'Furmagic 1 Liter', 500.00, 1, 500.00),
(6, 6, 2, 'Furmagic 300 mL', 250.00, 1, 250.00),
(7, 7, 2, 'Furmagic 300 mL', 250.00, 1, 250.00),
(8, 8, 2, 'Furmagic 300 mL', 250.00, 1, 250.00);

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
  `s_price` decimal(13,2) NOT NULL,
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

INSERT INTO `reservation` (`reservation_id`, `user_pets_id`, `id_services`, `thedate`, `time_reservation`, `start_time`, `end_time`, `r_type`, `s_price`, `total`, `amount_paid`, `_change`, `pay_date`, `status`, `process_done`, `decline_remarks`, `flag_seen`) VALUES
(1, 1, 7, '2019-10-19', '10:00 a.m - 11:30 a.m', '10:00:00', '11:30:00', 'Online', '350.00', 350.00, 0.00, 0.00, '0000-00-00', 'Process Done', '2019-10-05', NULL, 0),
(2, 17, 3, '2019-10-15', '12:00 p.m', '00:00:00', '00:00:00', 'Online', '300.00', 300.00, 500.00, 200.00, '2019-10-05', 'Paid', '2019-10-05', NULL, 0),
(3, 10, 7, '2019-10-15', '09:00 a.m - 10:30 a.m', '09:00:00', '10:30:00', 'Online', '0.00', 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00', NULL, 0),
(4, 1, 0, '2019-10-15', '06:30 p.m - 07:00 p.m', '18:30:00', '19:00:00', 'Online', '250.00', 500.00, 0.00, 0.00, '0000-00-00', 'Process Done', '2019-10-05', NULL, 0);

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
(31, 13, 1, '2020-08-31', 99, '2019-09-21', 0),
(32, 1, 1, '2020-08-31', 0, '2019-09-21', 0),
(33, 2, 1, '2020-08-31', 18, '2019-09-21', 0),
(34, 3, 1, '2020-08-31', 0, '2019-09-21', 0),
(35, 4, 1, '2020-08-31', 98, '2019-09-21', 0),
(36, 5, 1, '2020-08-31', 79, '2019-09-21', 0),
(37, 1, 2, '2020-05-31', 0, '2019-09-21', 0),
(38, 2, 2, '2020-05-31', 100, '2019-09-21', 0),
(39, 3, 2, '2020-05-31', 0, '2019-09-21', 0),
(40, 4, 2, '2020-05-31', 100, '2019-09-21', 0),
(41, 5, 2, '2020-05-31', 100, '2019-09-21', 0),
(42, 6, 1, '2020-05-31', 2, '2019-09-21', 0),
(43, 9, 1, '2020-05-31', 96, '2019-09-21', 0),
(44, 7, 1, '2020-05-31', 83, '2019-09-21', 0),
(45, 8, 1, '2019-09-25', 150, '2019-09-21', 1),
(46, 8, 2, '2019-09-30', 100, '2019-09-23', 1),
(47, 8, 3, '2019-09-30', 100, '2019-09-23', 1),
(48, 11, 1, '2019-11-01', 20, '2019-09-23', 1),
(49, 3, 3, '2020-08-20', 80, '2019-09-25', 0),
(50, 10, 1, '2022-08-25', 88, '2019-09-28', 0),
(51, 5, 3, '2019-12-25', 200, '2019-09-28', 0),
(52, 1, 3, '2019-12-25', 0, '2019-09-28', 0),
(53, 2, 3, '2019-12-25', 120, '2019-09-28', 0);

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
(1, 'Jollibees', '09213809274', 'Furmagic 1 Liter', '0000-00-00'),
(2, 'asdas', '12321', 'Furmagic 300 mL', '2019-10-04');

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
(3, 'Princess', 'Gabayne', 'Marikina', 'princessgabayne@gmail.com', '09463565156', '$2y$10$9feynchV9xseKXM17h1XTeplOj.vGebsxfM4TUmFNNmWcokr8ZuTm', '', 0, 1, '', '2Fwzx3RmCHfG4Du'),
(4, 'Cess', 'Calanza', '', 'cesscalanza@gmail.com', '09223964402', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(18, 'Pinky', 'Gabayne', '', 'gabayneprincess@gmail.com', '09223964402', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(19, 'Felix', 'Gabayne', '', 'gabaynefelix02@gmail.com', '09123456789', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(26, 'Rexcie', 'Abiertas', '', 'abiertasrexcie@yahoo.com', '09987654321', '', '', 0, 0, '', ''),
(27, 'Pau', 'Zorilla', '', 'wen.wenbalingit@gmail.com', '09963258741', '', '', 0, 0, '', ''),
(28, 'Wen', 'Balingit', '', 'zorilla.janpauline@gmail.com', '09951478263', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(29, 'Jona', 'Malacad', '', 'malacad.jona9@gmail.com', '09963255874', '$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', '', 0, 1, '', ''),
(30, 'asdsad', 'asdasd', '', 'princessgabayne@gmail.com', 'asdasda', '', '', 0, 0, '', '');

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
(23, 17, 23),
(24, 18, 24),
(25, 19, 25);

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id_wastage` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` double(13,2) NOT NULL,
  `stocks` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `batch_number` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id_wastage`, `id_products`, `category`, `price`, `stocks`, `expired_date`, `batch_number`, `reason`, `qty`) VALUES
(1, 1, 'Grooming', 500.00, 41, '2020-05-31', 37, 'Broken', 5),
(2, 2, 'Grooming', 250.00, 24, '2020-08-31', 33, 'Broken', 4),
(3, 1, 'Grooming', 500.00, 474, '2019-12-25', 52, 'Broken', 4),
(4, 1, 'Grooming', 500.00, 470, '2019-12-25', 52, 'Broken', 370);

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
-- Indexes for table `inventory_adjustment`
--
ALTER TABLE `inventory_adjustment`
  ADD PRIMARY KEY (`ia_id`);

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
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `findings_prescription`
--
ALTER TABLE `findings_prescription`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory_adjustment`
--
ALTER TABLE `inventory_adjustment`
  MODIFY `ia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_main`
--
ALTER TABLE `order_main`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_used`
--
ALTER TABLE `products_used`
  MODIFY `pu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_stocks_expired` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
