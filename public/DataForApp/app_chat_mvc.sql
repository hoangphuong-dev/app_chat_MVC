-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 11:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_chat_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `mes_id` int(11) NOT NULL,
  `mes_body` text DEFAULT NULL,
  `user_from` int(11) DEFAULT NULL,
  `user_receiver` int(11) NOT NULL,
  `date_send` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`mes_id`, `mes_body`, `user_from`, `user_receiver`, `date_send`) VALUES
(4, 'alo Thanh ơi ', 15, 18, '2021-07-19 16:10:51'),
(5, 'Chiều nay có đi học không ', 15, 18, '2021-07-19 16:11:35'),
(6, 'đi thì cầm hộ tau quyển vở ', 15, 18, '2021-07-19 16:11:56'),
(7, 'Nếu seen thì nhắn nhá ', 15, 18, '2021-07-19 16:12:51'),
(8, 'ơ vẫn chưa nhắn à ', 15, 18, '2021-07-19 16:52:44'),
(9, 'Ơi Di chứ không phải Thanh nha :v ', 18, 15, '2021-07-20 10:08:15'),
(10, 'xin lỗi nhé , giờ mời đọc tin nhắn ', 18, 15, '2021-07-20 10:08:30'),
(11, 'tí đi học t cầm cho ', 18, 15, '2021-07-20 10:08:35'),
(13, 'Hello chào bạn mới quen', 18, 19, '2021-07-20 13:27:46'),
(14, 'Phương thanh ơi chiều đi học nhá ', 18, 23, '2021-07-20 13:28:43'),
(15, 'ơi đi học chưa ', 18, 15, '2021-07-20 13:49:09'),
(16, 't cầm rồi nè ', 18, 15, '2021-07-20 13:49:29'),
(17, 'đi đi nhá ', 18, 15, '2021-07-20 13:51:26'),
(18, 't không chờ đâu ', 18, 15, '2021-07-20 13:51:43'),
(19, 'hahah oke ', 15, 18, '2021-07-20 13:52:22'),
(20, 'đang đi đây', 15, 18, '2021-07-20 13:52:40'),
(21, 'ơi về chưa ', 15, 18, '2021-07-20 16:06:02'),
(22, 't vừa về rồi ', 15, 18, '2021-07-20 16:07:38'),
(23, 'tí nhắn bài tập t với nhá ', 15, 18, '2021-07-20 16:12:33'),
(24, 'alo alo ', 15, 18, '2021-07-20 16:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_phone` char(15) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `pass`, `date_create`) VALUES
(15, 'Phương Hoàng', '0123', '202cb962ac59075b964b07152d234b70', '2021-07-18 16:47:15'),
(16, 'Hoàng Ngọc', '0234', '202cb962ac59075b964b07152d234b70', '2021-07-19 07:30:54'),
(18, 'Mai Duyên', '01234', '202cb962ac59075b964b07152d234b70', '2021-07-19 07:31:55'),
(19, 'Hoàng Phương', '0869227057', '202cb962ac59075b964b07152d234b70', '2021-07-19 07:33:55'),
(20, 'Đào Anh Minh', '0111', '202cb962ac59075b964b07152d234b70', '2021-07-19 07:34:05'),
(23, 'Hoàng Phương', '0121', '202cb962ac59075b964b07152d234b70', '2021-07-19 07:38:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`mes_id`),
  ADD KEY `user_from` (`user_from`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messenger`
--
ALTER TABLE `messenger`
  ADD CONSTRAINT `messenger_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
