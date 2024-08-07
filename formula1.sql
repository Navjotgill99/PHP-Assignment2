-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2024 at 04:36 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `points` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `points`, `team_id`) VALUES
(102, 'Lewis', 'Hamilton', 12, 2),
(103, 'George', 'Russell', 45, 2),
(104, 'Nico', 'Hulkenburg', 101, NULL),
(105, 'Logan', 'Sargeant', 35, 5),
(106, 'Lando', 'Norris', 75, 4),
(107, 'Charles', 'Leclerc', 71, 1),
(108, 'Nico', 'Rosberg', 42, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(64) NOT NULL,
  `team_name` varchar(200) NOT NULL,
  `engine_supplier` varchar(200) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `engine_supplier`, `image_path`) VALUES
(1, 'Ferrari', 'Ferrari', '../uploads/Ferrari.jpg'),
(2, 'Mercedes AMG', 'Mercedes', '../uploads/Mercedes.jpg'),
(3, 'Red Bull Racing', 'Honda', '../uploads/Honda.jpeg'),
(4, 'McLaren', 'Mercedes', '../uploads/Mc Mercedes.jpg'),
(5, 'Williams Racing', 'Mercedes', '../uploads/Wi Mercedes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(7) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `creation_date`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'admin', '2024-08-01 10:17:32'),
(4, 'user', '1a1dc91c907325c69271ddf0c944bc72', 'user', '2024-08-01 15:25:20'),
(5, 'user2', 'c1572d05424d0ecb2a65ec6a82aeacbf', 'user', '2024-08-01 15:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
