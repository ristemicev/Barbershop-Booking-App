-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 03:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `b_id`, `u_id`, `date`, `time`, `s_id`) VALUES
(6, 2, 15, '15-6-2022', '13:30', 16),
(8, 2, 14, '15-6-2022', '9:30', 15),
(9, 2, 14, '15-6-2022', '10:00', 14),
(10, 2, 14, '15-6-2022', '20:30', 16),
(11, 2, 14, '17-6-2022', '13:00', 15),
(12, 2, 14, '23-6-2022', '10:00', 14),
(13, 7, 14, '12-6-2022', '8:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `barbershop`
--

CREATE TABLE `barbershop` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barbershop`
--

INSERT INTO `barbershop` (`id`, `name`, `address`, `email`, `password`) VALUES
(2, 'JetSet', 'Trg Brolo 10', 'jetset@yahoo.com', '$2y$10$/Xy0yD4emOHgH4ry0gnobejOPLtQkP2GD73d7CcrQr8h/K6aeycuO'),
(3, 'None', 'Trg Brolo 10', 'none@gmail.com', '$2y$10$o5YGYCP3M7RUmIG.xWiBJuftuiAbE6GmtlUIkReVkYQMaL99La65q'),
(6, 'Lazari', '14 maj', 'lazari@gmail.com', '$2y$10$iRgJtV1DUeu4Gx3Nr8dLxeeOIwVj5A4fdJTYp0YGn4vKdupvVS5aq'),
(7, 'Jims Salon', 'Terazije 8', 'jims@gmail.com', '$2y$10$qe33LH5c/sU6AXuJzbKs3uj29E0aL1E9xGPmn1/XAcx4ZGdEaYJwm');

-- --------------------------------------------------------

--
-- Table structure for table `bdecs`
--

CREATE TABLE `bdecs` (
  `id` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bdecs`
--

INSERT INTO `bdecs` (`id`, `description`, `b_id`) VALUES
(1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2),
(4, 'ovoj barbershop e eden od najdobrite ', 3),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `b_id`, `name`) VALUES
(6, 2, '1653938584_1af25dae130848def862.png'),
(8, 2, '1653943918_1c8be8199e1575540078.jpg'),
(12, 7, '1654423555_1eabce72fa3db9f0210c.jpg'),
(14, 7, '1654435034_32066aad62c46dc69a1a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `b_id`) VALUES
(1, 'English', 7),
(2, 'Slovene', 7),
(3, 'Italian', 7);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `duration`, `price`, `b_id`) VALUES
(14, 'FILIP43', 51, 18, 2),
(15, 'gligor43', 123, 12, 2),
(16, 'riste zver', 13, 1234, 2),
(17, 'Beard trim', 30, 10, 7),
(19, 'Short hair haircut', 20, 10, 7),
(20, 'Long hair haircut', 60, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`) VALUES
(14, 'Test', 'Test', 'test@test.com', '$2y$10$IHipdNj2sBMD6HphGeEDEuh6HyvJwFvI171WX88gH5zi5KzjIstg.'),
(15, 'Riste', 'Micev', 'riste.micev1@gmail.com', '$2y$10$OjzHCtzrRL/a9Qipg/2niOHuJtVM67GjqGE11uvtOYCy/NH1qw6x6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `service` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `barbershop`
--
ALTER TABLE `barbershop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bdecs`
--
ALTER TABLE `bdecs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barbershop`
--
ALTER TABLE `barbershop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bdecs`
--
ALTER TABLE `bdecs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `barbershop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bdecs`
--
ALTER TABLE `bdecs`
  ADD CONSTRAINT `bdecs_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `barbershop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `barbershop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `barbershop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `barbershop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
