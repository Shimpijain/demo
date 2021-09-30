-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 11:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `filename` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`filename`) VALUES
('WhatsApp Image 2021-09-11 at 18.24.26.jp'),
('photovisi-download (1).jpg'),
('WhatsApp Image 2021-08-08 at 21.33.49.jp'),
('WhatsApp Image 2021-08-08 at 21.35.01 (2'),
('WhatsApp Image 2021-08-08 at 21.31.27 (1'),
('WhatsApp Image 2021-08-29 at 00.07.03.jp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phoneno` int(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Email`, `Phoneno`, `password`) VALUES
('ravi', 'ravi@gmail.com', 2147483647, 'Ravi1234'),
('Shimpi Jain', 'shi@gmail.com', 2147483647, 'Shimpi8654'),
('Shimpi Jain', 'shimpi@gmail.com', 2147483647, 'Shimpi098'),
('Shimpi Jain', 'shimpij@gmail.com', 2147483647, 'Shimpi98765'),
('Shimpi Jain', 'shimpija@gmail.com', 2147483647, 'Shimpi54637'),
('shimpi jain', 'shimpijain@gmail.com', 2147483647, 'Shimpi1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `Email` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
