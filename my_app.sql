-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 04:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(500) NOT NULL,
  `school` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `school`) VALUES
(1, 'peterchege442@gmail.com', '$2y$10$nJ8qvc9LRk3btmtRk3B.DO/.EyP.MlA8LDQDXq0riDiC/XeWFJKea', 'chege', 'jkuat'),
(2, 'peterchege@gmail.com', '$2y$10$0FdDTsJnXqXDj6px05g.rud/RGlcUFRw0FgbO9oNZG8iNAIPr6DYe', 'peter', 'jkuat'),
(3, 'ant0@gmail.com', '$2y$10$dlXPesQzL2HMAUG0jcaH.uVxB4Jw79cpI0pOwJtYgKax8Fpo9pB62', 'baru', 'TUM'),
(4, 'peterchege242@gmail.com', '$2y$10$82mt0X.Zr7Z4hXa87D0Ine75ne7Fzcgz1/vyKx37cUp.Od6L.Zf9G', 'bike', 'kcia'),
(5, 'tony@gmail.com', '$2y$10$19qLkcv33Q51w4PEeDLV5eg4Sr501fVrE20UkQWPbWSdX5LOdIJ0a', 'tony', 'tuk'),
(6, 'peterce442@gmail.com', '$2y$10$jE6fhfZ.C6eq8J.yeVnz7eGg1KmZpvHUeclrdQzD9NwSvxprxYypS', 'peter', 'jkuat'),
(7, 'tony1@gmail.com', '$2y$10$/gWsaMyZvmkd18amR2nk7ujVCsvM5PXkxeLjYRLPixKoLT7yg026e', 'tony', 'jkuat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
