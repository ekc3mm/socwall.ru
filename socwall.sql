-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2017 at 09:31 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socwall`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `autor` int(11) UNSIGNED DEFAULT NULL,
  `commentator` int(11) UNSIGNED DEFAULT NULL,
  `post` int(11) UNSIGNED DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `autor`, `commentator`, `post`, `text`, `time`) VALUES
(98, 15, 15, 64, 'qwer', '2017-06-17 19:40:32'),
(99, 15, 15, 64, 'qwer', '2017-06-17 19:40:39'),
(100, 15, 15, 65, 'qaa', '2017-06-17 19:46:16'),
(101, 15, 15, 68, 'asdf', '2017-06-17 19:47:05'),
(102, 15, 15, 68, 'asfff', '2017-06-17 19:47:09'),
(103, 15, 15, 67, 'cbb', '2017-06-17 19:47:37'),
(104, 15, 15, 66, 'cvbcc', '2017-06-17 19:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `text`, `time`) VALUES
(64, 15, 'привет мир!', '2017-06-17 19:40:09'),
(65, 15, 'ok', '2017-06-17 19:41:08'),
(66, 15, 'asdf', '2017-06-17 19:46:55'),
(67, 15, 'zxcv', '2017-06-17 19:46:59'),
(68, 15, 'zxcvvv', '2017-06-17 19:47:01'),
(69, 15, 'fdfdfgd', '2017-06-17 19:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `subcomments`
--

CREATE TABLE `subcomments` (
  `id` int(11) UNSIGNED NOT NULL,
  `autor` int(11) UNSIGNED DEFAULT NULL,
  `commentator` int(11) UNSIGNED DEFAULT NULL,
  `post` int(11) UNSIGNED DEFAULT NULL,
  `sub` int(11) UNSIGNED DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcomments`
--

INSERT INTO `subcomments` (`id`, `autor`, `commentator`, `post`, `sub`, `text`, `time`) VALUES
(111, 15, 15, 64, 98, 'qwe', '2017-06-17 19:40:47'),
(112, 15, 15, 64, 98, 'qwe', '2017-06-17 19:40:55'),
(113, 15, 15, 68, 102, 'sdfs', '2017-06-17 19:47:14'),
(114, 15, 15, 68, 102, 'afffff', '2017-06-17 19:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_google` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_google`, `name`, `email`, `link`, `gender`, `picture`) VALUES
(15, '103599467194001206594', 'Виталий Васильев', 'ekc3mm@gmail.com', 'https://plus.google.com/103599467194001206594', 'male', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`),
  ADD KEY `commentator` (`commentator`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_posts_user` (`user_id`);

--
-- Indexes for table `subcomments`
--
ALTER TABLE `subcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`),
  ADD KEY `commentator` (`commentator`),
  ADD KEY `post` (`post`),
  ADD KEY `sub` (`sub`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `subcomments`
--
ALTER TABLE `subcomments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`commentator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`post`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcomments`
--
ALTER TABLE `subcomments`
  ADD CONSTRAINT `subcomments_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subcomments_ibfk_2` FOREIGN KEY (`commentator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subcomments_ibfk_3` FOREIGN KEY (`post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `subcomments_ibfk_4` FOREIGN KEY (`sub`) REFERENCES `comments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
