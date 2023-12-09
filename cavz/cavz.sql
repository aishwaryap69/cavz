-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cavz`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `book_author` text NOT NULL,
  `book_descr` text NOT NULL,
  `book_publication_date` date NOT NULL,
  `book_pdf` text NOT NULL,
  `book_created_by` int(11) NOT NULL,
  `book_created_at` datetime NOT NULL,
  `book_updated_by` int(11) NOT NULL,
  `book_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_category`, `book_title`, `book_author`, `book_descr`, `book_publication_date`, `book_pdf`, `book_created_by`, `book_created_at`, `book_updated_by`, `book_updated_at`) VALUES
(1, 3, 'Book Name', 'Santhosh', 'description', '2023-12-26', '1702126400.pdf', 27, '2023-12-09 13:53:20', 31, '2023-12-09 15:39:20'),
(2, 4, 'Book Name 2', 'Ganesh', 'Text Content', '2023-12-20', '1702127724.pdf', 27, '2023-12-09 14:15:24', 0, '0000-00-00 00:00:00'),
(3, 7, 'Book3', 'Sundar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-12-20', '1702129590.pdf', 31, '2023-12-09 14:46:30', 0, '0000-00-00 00:00:00'),
(4, 6, 'Book 4', 'Gineesh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-12-29', '1702129619.pdf', 31, '2023-12-09 14:46:59', 0, '0000-00-00 00:00:00'),
(5, 8, 'East of Eden', 'John Steinbeck', 'Lorem Ipsum', '2023-12-19', '1702129677.pdf', 31, '2023-12-09 14:47:57', 0, '0000-00-00 00:00:00'),
(6, 10, 'The Sun Also Rises', 'Ernest Hemingway', 'More Ecclesiastes! This particular quotation is from 1:5, which states that The sun also ariseth, and the sun', '2023-12-14', '1702129748.pdf', 31, '2023-12-09 14:49:08', 0, '0000-00-00 00:00:00'),
(7, 8, 'War and Peace', 'War and Peace', 'Epic in scale, War and Peace delineates in graphic detail events leading up to Napoleon\'s invasion of Russia, and the impact of the', '2023-12-11', '1702131726.pdf', 31, '2023-12-09 15:22:06', 0, '0000-00-00 00:00:00'),
(8, 6, 'Moby Dick', 'Moby Dick', 'Moby Dick', '2023-12-19', '1702131880.pdf', 31, '2023-12-09 15:24:40', 0, '0000-00-00 00:00:00'),
(9, 3, 'The Great Gatsby', 'The Great Gatsby', 'The Great Gatsby', '2023-12-11', '1702131928.pdf', 31, '2023-12-09 15:25:28', 0, '0000-00-00 00:00:00'),
(10, 9, 'Anna Karenina', 'Anna Karenina', 'Anna Karenina', '2023-12-07', '1702131953.pdf', 31, '2023-12-09 15:25:53', 0, '0000-00-00 00:00:00'),
(11, 9, 'Anna Karenina', 'Anna Karenina11', 'Anna Karenina', '2023-12-07', '1702132170.pdf', 31, '2023-12-09 15:29:30', 0, '0000-00-00 00:00:00'),
(12, 9, 'Anna Karenina1', 'Anna Karenina', 'Anna Karenina', '2023-12-07', '1702132205.pdf', 31, '2023-12-09 15:30:05', 0, '0000-00-00 00:00:00'),
(13, 5, 'book name11', 'sanoj', 'description', '2023-12-21', '', 31, '2023-12-09 15:36:34', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'Mystry', 27, '2023-12-09 11:59:45', '0000-00-00 00:00:00', 0),
(3, 'Romance', 27, '2023-12-09 12:00:00', '0000-00-00 00:00:00', 0),
(4, 'Horror', 27, '2023-12-09 12:00:38', '0000-00-00 00:00:00', 0),
(5, 'Historical Fiction', 27, '2023-12-09 12:01:04', '0000-00-00 00:00:00', 0),
(6, 'Thriller', 27, '2023-12-09 12:01:58', '0000-00-00 00:00:00', 0),
(7, 'Fantasy', 31, '2023-12-09 14:41:22', '0000-00-00 00:00:00', 0),
(8, 'Literary fiction', 31, '2023-12-09 14:41:50', '0000-00-00 00:00:00', 0),
(9, 'Action fiction', 31, '2023-12-09 14:42:17', '0000-00-00 00:00:00', 0),
(10, 'Biography', 31, '2023-12-09 14:43:28', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `username`, `password`, `enabled`, `last_login`, `created_at`) VALUES
(10, 'Ayisha K P', 'admin', '202cb962ac59075b964b07152d234b70', 1, '2023-05-29 13:07:23', '2023-10-15 05:30:27'),
(26, 'aishu', 'aishwaryap69@gmail.com', '97435a552890c051c4afc46d29f26bf8', 1, '2023-10-31 17:18:26', '2023-11-01 05:31:14'),
(27, 'Aishwarya', 'aishu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '2023-12-09 09:54:36', '2023-12-09 05:24:36'),
(28, 'Aishwarya', 'aishu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '2023-12-09 09:54:38', '2023-12-09 05:24:38'),
(29, 'Aishwarya', 'aishu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '2023-12-09 09:54:45', '2023-12-09 05:24:45'),
(30, 'Aishwarya', 'aishu@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '2023-12-09 09:55:21', '2023-12-09 05:25:21'),
(31, 'Jibina', 'jibina@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '2023-12-09 13:40:24', '2023-12-09 09:10:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
