-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 06:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `online_reservation1`
--

CREATE TABLE `online_reservation1` (
  `reservation_id` int(11) NOT NULL,
  `user_pets_id` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `thedate` date NOT NULL,
  `time_reservation` text NOT NULL,
  `total` double(13,2) NOT NULL,
  `pay_date` date NOT NULL,
  `status` text NOT NULL,
  `process_done` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_reservation1`
--

INSERT INTO `online_reservation1` (`reservation_id`, `user_pets_id`, `id_services`, `thedate`, `time_reservation`, `total`, `pay_date`, `status`, `process_done`, `start_time`, `end_time`) VALUES
(1, 4, 7, '2019-08-13', '10:30 a.m - 12:00 p.m', 0.00, '0000-00-00', 'Confirm', '0000-00-00', '00:00:00', '00:00:00'),
(2, 1, 3, '2019-08-26', '11:30 a.m - 01:00 p.m', 0.00, '0000-00-00', 'Pending', '0000-00-00', '00:00:00', '00:00:00'),
(12, 1, 7, '2019-08-31', '11:30 a.m - 01:00 p.m', 0.00, '0000-00-00', 'Pending', '0000-00-00', '00:00:00', '00:00:00'),
(15, 1, 7, '2019-08-30', '11:30 a.m - 01:00 p.m', 0.00, '0000-00-00', 'Pending', '0000-00-00', '11:30:00', '13:00:00'),
(16, 4, 7, '2019-08-30', '05:30 p.m - 07:00 p.m', 0.00, '0000-00-00', 'Pending', '0000-00-00', '17:30:00', '19:00:00'),
(17, 1, 7, '2019-08-30', '02:30 p.m - 04:00 p.m', 0.00, '0000-00-00', 'Pending', '0000-00-00', '14:30:00', '16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_reservation1`
--
ALTER TABLE `online_reservation1`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_id` (`reservation_id`,`user_pets_id`,`id_services`),
  ADD KEY `user_pets_id` (`user_pets_id`),
  ADD KEY `service_id` (`id_services`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_reservation1`
--
ALTER TABLE `online_reservation1`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `online_reservation1`
--
ALTER TABLE `online_reservation1`
  ADD CONSTRAINT `online_reservation1_ibfk_1` FOREIGN KEY (`user_pets_id`) REFERENCES `user_pets` (`user_pets_id`),
  ADD CONSTRAINT `online_reservation1_ibfk_2` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
