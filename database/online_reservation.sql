-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 06:17 AM
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
-- Table structure for table `online_reservation`
--

CREATE TABLE `online_reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_pets_id` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `thedate` date NOT NULL,
  `time_reservation` text NOT NULL,
  `findings` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `total` double(13,2) NOT NULL,
  `pay_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `process_done` datetime NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_reservation`
--

INSERT INTO `online_reservation` (`reservation_id`, `user_pets_id`, `id_services`, `thedate`, `time_reservation`, `findings`, `prescription`, `total`, `pay_date`, `status`, `process_done`, `start_time`, `end_time`) VALUES
(1, 1, 0, '2019-08-12', '02:00 p.m - 02:30 p.m', '', '', 0.00, '0000-00-00', 'Pending', '0000-00-00 00:00:00', '00:00:00', '00:00:00'),
(2, 1, 0, '2019-08-30', '04:30 p.m - 05:00 p.m', '', '', 0.00, '0000-00-00', 'Pending', '0000-00-00 00:00:00', '16:30:00', '17:00:00'),
(3, 1, 0, '2019-08-30', '02:00 p.m - 02:30 p.m', '', '', 0.00, '0000-00-00', 'Pending', '0000-00-00 00:00:00', '14:00:00', '14:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_reservation`
--
ALTER TABLE `online_reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_id` (`reservation_id`,`user_pets_id`,`id_services`),
  ADD KEY `user_pets_id` (`user_pets_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_reservation`
--
ALTER TABLE `online_reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `online_reservation`
--
ALTER TABLE `online_reservation`
  ADD CONSTRAINT `online_reservation_ibfk_1` FOREIGN KEY (`user_pets_id`) REFERENCES `user_pets` (`user_pets_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
