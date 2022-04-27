-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 04:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` char(250) NOT NULL,
  `email` char(250) NOT NULL,
  `password` char(255) NOT NULL,
  `profile_pic` char(250) NOT NULL,
  `register_on` char(100) NOT NULL,
  `last_login` char(250) NOT NULL,
  `online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `profile_pic`, `register_on`, `last_login`, `online`) VALUES
(1, 'wizkumar', 'wiz@messenger.com', 'MTIzNDU2', 'letter-w.png', '2022.04.26 23:46:32', '', 0),
(2, 'wizkumar', 'wiz2@messenger.com', '$2y$10$G/3gzdBiF9/MZSkV8DeVp.fTXDGW1zrg.8pC4ckvaNKRBCjpQThNa', 'letter-w.png', '2022.04.26 23:48:21', '', 0),
(3, 'wizkumar3', 'wiz3@messenger.com', '$2y$10$YEwsS1PSVSHlwIVBR/.izOyAc2B8uu.55DvFk3uo.Gh9HsWfllZRC', 'letter-w.png', '2022.04.27 04:54:53', '', 0),
(4, 'kgf3', 'kgf@messenger.com', 'MTIzNDU2', 'letter-k.png', '2022.04.27 05:24:41', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
