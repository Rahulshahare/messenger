-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 05:57 AM
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
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(10) NOT NULL,
  `user_two` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`) VALUES
(1, 1, 4),
(2, 1, 6),
(3, 1, 10),
(4, 1, 5),
(5, 1, 9),
(6, 1, 2),
(7, 1, 3),
(8, 1, 8),
(9, 1, 7),
(10, 11, 6),
(11, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(10) NOT NULL,
  `user_from` int(10) NOT NULL,
  `user_to` int(10) NOT NULL,
  `message` text NOT NULL,
  `seen` int(11) NOT NULL,
  `timestamp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_from`, `user_to`, `message`, `seen`, `timestamp`) VALUES
(1, 4, 1, 5, '', 0, '2022.04.28 06:55:48'),
(2, 5, 1, 9, '', 0, '2022.04.28 06:56:12'),
(3, 5, 1, 9, 'good morning', 0, '2022.04.28 06:57:13'),
(4, 1, 1, 4, '1\n', 0, '2022.04.28 07:24:15'),
(5, 4, 1, 5, 'hhjk', 0, '2022.04.28 07:27:28'),
(6, 2, 1, 6, 'q', 0, '2022.04.28 07:27:40'),
(7, 2, 1, 6, 'q', 0, '2022.04.28 07:27:40'),
(8, 2, 1, 6, 'q', 0, '2022.04.28 07:27:41'),
(9, 2, 1, 6, 'q', 0, '2022.04.28 07:27:41'),
(10, 2, 1, 6, 'qq', 0, '2022.04.28 07:27:41'),
(11, 2, 1, 6, 'a', 0, '2022.04.28 07:27:41'),
(12, 2, 1, 6, 'a', 0, '2022.04.28 07:27:42'),
(13, 2, 1, 6, 'a', 0, '2022.04.28 07:27:42'),
(14, 2, 1, 6, 'aa', 0, '2022.04.28 07:27:42'),
(15, 2, 1, 6, 's', 0, '2022.04.28 07:27:42'),
(16, 2, 1, 6, 's', 0, '2022.04.28 07:27:43'),
(17, 2, 1, 6, 's', 0, '2022.04.28 07:27:43'),
(18, 2, 1, 6, 's', 0, '2022.04.28 07:27:43'),
(19, 2, 1, 6, 's', 0, '2022.04.28 07:27:43'),
(20, 2, 1, 6, 'fdkjghjkfg', 0, '2022.04.28 07:27:44'),
(21, 2, 1, 6, 'dsgdsagdg', 0, '2022.04.28 07:27:45'),
(22, 2, 1, 6, 'dsgdsgsd', 0, '2022.04.28 07:27:46'),
(23, 2, 1, 6, 'sdgsdagsadg', 0, '2022.04.28 07:27:47'),
(24, 2, 1, 6, 'dsgdsgasd', 0, '2022.04.28 07:27:47'),
(25, 2, 1, 6, 'gdsgdsgsda', 0, '2022.04.28 07:27:48'),
(26, 2, 1, 6, 'dsgsadg', 0, '2022.04.28 07:27:49'),
(27, 1, 1, 4, 'f', 0, '2022.04.28 07:47:05'),
(28, 1, 1, 4, 'dfs', 0, '2022.04.28 07:47:05'),
(29, 1, 1, 4, 'dsaf', 0, '2022.04.28 07:47:05'),
(30, 1, 1, 4, 'sdaf', 0, '2022.04.28 07:47:05'),
(31, 1, 1, 4, 'daf', 0, '2022.04.28 07:47:05'),
(32, 1, 1, 4, 'asd', 0, '2022.04.28 07:47:06'),
(33, 1, 1, 4, 'fsdf', 0, '2022.04.28 07:47:06'),
(34, 1, 1, 4, 'sdfs', 0, '2022.04.28 07:47:06'),
(35, 1, 1, 4, 'd', 0, '2022.04.28 07:47:07'),
(36, 1, 1, 4, 'afsd', 0, '2022.04.28 07:47:07'),
(37, 1, 1, 4, 'fds', 0, '2022.04.28 07:47:07'),
(38, 1, 1, 4, 'fsdaf', 0, '2022.04.28 07:47:07'),
(39, 1, 1, 4, 'dsf', 0, '2022.04.28 07:47:08'),
(40, 1, 1, 4, 'sdf', 0, '2022.04.28 07:47:08'),
(41, 1, 1, 4, 'dsaf', 0, '2022.04.28 07:47:08'),
(42, 1, 1, 4, 'ads', 0, '2022.04.28 07:47:08'),
(43, 1, 1, 4, 'fas', 0, '2022.04.28 07:47:08'),
(44, 3, 1, 10, 'agasdfasd', 0, '2022.04.28 08:29:06'),
(45, 3, 1, 10, 'ih', 0, '2022.04.28 08:31:23'),
(46, 3, 1, 10, 'h', 0, '2022.04.28 08:31:23'),
(47, 3, 1, 10, 'fs', 0, '2022.04.28 08:31:23'),
(48, 3, 1, 10, 'gf', 0, '2022.04.28 08:31:24'),
(49, 3, 1, 10, 'dg', 0, '2022.04.28 08:31:24'),
(50, 3, 1, 10, 'df', 0, '2022.04.28 08:31:24'),
(51, 3, 1, 10, 'gdf', 0, '2022.04.28 08:31:24'),
(52, 3, 1, 10, 'g', 0, '2022.04.28 08:31:25'),
(53, 3, 1, 10, 'dfg', 0, '2022.04.28 08:31:25'),
(54, 3, 1, 10, 'df', 0, '2022.04.28 08:31:25'),
(55, 3, 1, 10, 'gdf', 0, '2022.04.28 08:31:25'),
(56, 3, 1, 10, 'gdf', 0, '2022.04.28 08:31:25'),
(57, 3, 1, 10, 'gf', 0, '2022.04.28 08:31:25'),
(58, 3, 1, 10, 'gf', 0, '2022.04.28 08:31:26'),
(59, 3, 1, 10, 'g', 0, '2022.04.28 08:31:26'),
(60, 3, 1, 10, 'dfd', 0, '2022.04.28 08:31:26'),
(61, 2, 1, 6, '45454', 0, '2022.04.28 08:55:20'),
(62, 2, 1, 6, '4545', 0, '2022.04.28 08:55:28'),
(63, 2, 1, 6, 'fdsfd', 0, '2022.04.28 08:57:24'),
(64, 2, 1, 6, '4', 0, '2022.04.28 08:57:31'),
(65, 3, 1, 10, 'cvxvcx', 0, '2022.04.28 08:58:24'),
(66, 2, 1, 6, '464', 0, '2022.04.28 09:00:09'),
(67, 2, 1, 6, '5454', 0, '2022.04.28 09:02:12'),
(68, 2, 1, 6, '46', 0, '2022.04.28 09:09:24'),
(69, 2, 1, 6, '46', 0, '2022.04.28 09:10:50'),
(70, 2, 1, 6, '466', 0, '2022.04.28 09:10:58'),
(71, 2, 1, 6, '48648', 0, '2022.04.28 09:11:06'),
(72, 2, 1, 6, '488', 0, '2022.04.28 09:11:11'),
(73, 2, 1, 6, '4444444444446', 0, '2022.04.28 09:11:23'),
(74, 2, 1, 6, '4444444444444', 0, '2022.04.28 09:11:30'),
(75, 2, 1, 6, '16461', 0, '2022.04.28 09:12:53'),
(76, 2, 1, 6, '4444', 0, '2022.04.28 09:13:47'),
(77, 2, 1, 6, '4', 0, '2022.04.28 09:13:51'),
(78, 2, 1, 6, '46', 0, '2022.04.28 09:13:54'),
(79, 2, 1, 6, '\'', 0, '2022.04.28 09:14:01'),
(80, 2, 1, 6, '33', 0, '2022.04.28 09:14:07'),
(81, 2, 1, 6, '33', 0, '2022.04.28 09:14:09'),
(82, 2, 1, 6, '33', 0, '2022.04.28 09:14:11'),
(83, 2, 1, 6, '33', 0, '2022.04.28 09:14:12'),
(84, 2, 1, 6, '33', 0, '2022.04.28 09:14:13'),
(85, 2, 1, 6, '33', 0, '2022.04.28 09:14:15'),
(86, 2, 1, 6, 'jjj', 0, '2022.04.28 09:14:28'),
(87, 2, 1, 6, '4444444444', 0, '2022.04.28 09:14:55'),
(88, 2, 1, 6, 'gjhghj', 0, '2022.04.28 09:15:00'),
(89, 5, 1, 9, '44446l', 0, '2022.04.28 09:15:52'),
(90, 5, 1, 9, 'khjgghgjh', 0, '2022.04.28 09:15:58'),
(91, 10, 11, 6, '454', 0, '2022.04.28 09:18:04'),
(92, 10, 11, 6, 'hjkawehrkej', 0, '2022.04.28 09:18:11'),
(93, 10, 11, 6, 'sfsdafdsa', 0, '2022.04.28 09:18:12'),
(94, 10, 11, 6, '454', 0, '2022.04.28 09:20:10'),
(95, 10, 11, 6, 'l', 0, '2022.04.28 09:20:13'),
(96, 10, 11, 6, '544', 0, '2022.04.28 09:20:17'),
(97, 10, 11, 6, '54546', 0, '2022.04.28 09:20:22'),
(98, 11, 11, 4, 'hi', 0, '2022.04.28 09:21:07'),
(99, 11, 4, 11, 'whats up', 0, '2022.04.28 09:21:21'),
(100, 11, 4, 11, 'new u', 0, '2022.04.28 09:21:50');

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
(1, 'wizkumar', 'wiz@messenger.com', 'MTIzNDU2', 'letter-w.png', '2022.04.26 23:46:32', '2022.04.28 09:16:02', 0),
(2, 'wizkumar', 'wiz2@messenger.com', '$2y$10$G/3gzdBiF9/MZSkV8DeVp.fTXDGW1zrg.8pC4ckvaNKRBCjpQThNa', 'letter-w.png', '2022.04.26 23:48:21', '', 0),
(3, 'wizkumar3', 'wiz3@messenger.com', '$2y$10$YEwsS1PSVSHlwIVBR/.izOyAc2B8uu.55DvFk3uo.Gh9HsWfllZRC', 'letter-w.png', '2022.04.27 04:54:53', '', 0),
(4, 'kgf3', 'kgf@messenger.com', 'MTIzNDU2', 'letter-k.png', '2022.04.27 05:24:41', '2022.04.28 09:20:49', 0),
(5, 'test', 'test@test.test', '', 'letter-t.png', '2022.04.27 12:12:45', '', 0),
(6, 'hkjh', 'only.facebook.access@gmail.com', '', 'letter-h.png', '2022.04.27 13:09:16', '', 0),
(7, 'wizkumar', 'wiz5@messenger.com', '', 'letter-w.png', '2022.04.27 13:11:19', '', 0),
(8, 'wizkumar', 're@gmail.com', 'Nzk4Nzk4', 'letter-w.png', '2022.04.27 13:19:49', '', 0),
(9, 'test2', 'test2@gmail.com', 'MTIzNDU2', 'letter-t.png', '2022.04.27 13:21:17', '2022.04.27 13:09:16', 0),
(10, 'messenger', 'me@messenger.com', 'ODk5OTQ0NTczM1JAaHVs', 'letter-m.png', '2022.04.27 13:22:34', '2022.04.28 05:46:16', 0),
(11, 'guruwar', 'ff@ff.ff', 'ZmZmZg==', 'letter-g.png', '2022.04.28 09:17:41', '2022.04.28 09:17:52', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
