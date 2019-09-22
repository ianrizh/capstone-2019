-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 01:49 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(13,2) NOT NULL,
  `amount_paid` double(13,2) NOT NULL,
  `_change` double(13,2) NOT NULL,
  `pay_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 'Surgery', 'Services', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `order_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(13,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pet_size` varchar(50) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id_pet`, `id_cust`, `pet_name`, `pet_type`, `pet_breed`, `pet_gender`, `pet_size`, `deleted_date`) VALUES
(1, 3, 'Whitey', 'Cat', 'Persian', 'Female', 'Small', '0000-00-00'),
(2, 4, 'Fulgoso', 'Dog', 'Golden Retriever', 'Male', 'Medium', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `selection` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double(13,2) NOT NULL,
  `details` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `id_category`, `selection`, `name`, `price`, `details`, `photo`, `deleted_date`) VALUES
(1, 1, '', 'Furmagic 1 Liter', 500.00, '<p>Furmagic 1 Liter</p>\r\n', 'Furmagic 1 Liter.jpg', '0000-00-00'),
(2, 1, '', 'Furmagic 300 mL', 250.00, '<p>Furmagic 300 mL</p>\r\n', 'Furmagic 300 mL.jpg', '0000-00-00'),
(3, 2, '', 'Arthrox (Glucosamine) Tablet', 40.00, '<p>Arthrox (Glucosamine) Tablet</p>\r\n', 'Arthrox (Glucosamine) Tablet_1564633510.jpg', '0000-00-00'),
(4, 1, '', 'Pet Expert Pet Shampoo 500 mL', 350.00, '<p>Pet Expert Pet Shampoo 500 mL</p>\r\n', 'Pet Expert Pet Shampoo 500 mL.jpg', '0000-00-00'),
(5, 1, '', 'Sentry Shampoo for Cats 335 mL', 350.00, '<p>Sentry Shampoo for Cats 335 mL</p>\r\n', 'Sentry Shampoo for Cats 335 mL.jpg', '0000-00-00'),
(6, 1, '', 'Michiko Nail Clipper', 230.00, '<p>Michiko Nail Clipper</p>\r\n', 'Michiko Nail Clipper.png', '0000-00-00'),
(7, 2, '', 'Puppy Boost', 730.00, '<p>Puppy Boost</p>\r\n', 'Puppy Boost.jpg', '0000-00-00'),
(8, 3, '', 'Vetnoderm Cream', 290.00, '<p>Vetnoderm Cream</p>\r\n', 'Vetnoderm Cream.jpg', '0000-00-00'),
(9, 3, '', 'Mycocide Shampoo', 435.00, '<p>Mycocide Shampoo</p>\r\n', 'Mycocide Shampoo.jpg', '0000-00-00'),
(10, 3, '', 'Easotic Eardrops', 750.00, '<p>Easotic Eardrops</p>\r\n', 'Easotic Eardrops.jpg', '0000-00-00'),
(11, 1, '', 'Michiko Slicker Brush (Large)', 180.00, '<p>Michiko Slicker Brush (Large)</p>\r\n', 'Michiko Slicker Brush (Large).jpeg', '0000-00-00'),
(12, 1, '', 'Metal Comb (Small)', 195.00, '<p>Metal Comb (Small)</p>\r\n', 'Metal Comb (Small).jpg', '0000-00-00');

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
(1, 1, 0, '2019-09-03', '10:00 a.m - 10:30 a.m', '10:00:00', '10:30:00', 'alaws probs', 'oks lang', '3', 1, 350.00, 600.00, 0.00, 0.00, '0000-00-00', 'Process Done', '2019-08-30'),
(2, 2, 7, '2019-09-03', '09:00 a.m - 10:30 a.m', '09:00:00', '10:30:00', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pending', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(23, 11, 'Skin Scraping Test', 250.00, '<p>Skin Scraping Test</p>\r\n', 'Skin Scraping Test.jpg', '0000-00-00');

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
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_expired`
--

INSERT INTO `stocks_expired` (`id_stocks_expired`, `id_products`, `batch_number`, `expired_date`, `stocks`, `date_added`) VALUES
(1, 3, 1, '2019-02-01', 8, '0000-00-00'),
(2, 3, 2, '2019-08-24', 15, '0000-00-00'),
(3, 3, 3, '2020-07-25', 2, '0000-00-00'),
(4, 12, 1, '2020-02-15', 25, '0000-00-00'),
(5, 12, 2, '2020-06-13', 5, '0000-00-00'),
(6, 4, 1, '2019-08-31', 100, '2019-08-24'),
(7, 3, 4, '2019-08-31', 100, '2019-08-24'),
(8, 3, 5, '2019-08-30', 50, '2019-08-24'),
(9, 3, 6, '2019-08-31', 10, '2019-08-24'),
(10, 3, 7, '2019-08-18', 13, '2019-08-24'),
(11, 8, 1, '2019-08-31', 999, '2019-08-24'),
(12, 8, 2, '2019-08-31', 888, '2019-08-24'),
(13, 8, 3, '2019-08-29', 777, '2019-08-24'),
(14, 7, 1, '2019-08-25', 100, '2019-08-24');

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
(3, 'Princess', 'Gabayne', '', 'princessgabayne@gmail.com', '', '$2y$10$g6DoQ60NlI7eCiFm8oNzwObOxt75nq/aZ3gOjIAlywOO.8hzppS.y', '', 0, 1, 'ykq7brB6Ozvo', ''),
(4, 'Felix', 'Gabayne', '', 'gabaynefelix02@gmail.com', '', '$2y$10$zL4PvSutLaiVDcEbiI9TvOB6b.hhjj.uniqNQz/rZdOQ7l9pz/FUa', '', 0, 1, 'vywVbrzuEIDW', '');

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
(2, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_id` (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pay_id` (`pay_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stocks_expired`
--
ALTER TABLE `stocks_expired`
  MODIFY `id_stocks_expired` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_pets`
--
ALTER TABLE `user_pets`
  MODIFY `user_pets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_products`);

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_products`);

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
