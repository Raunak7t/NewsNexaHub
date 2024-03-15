-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 04:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsnexahub`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `feedback`, `stars`) VALUES
(1, 'Raunak', 'Good', 2),
(2, 'Raunak', 'nyc', 4),
(3, 'Satish', 'this website is so good', 4),
(4, 'Tejas', 'this website is so helpful\r\n', 5),
(5, 'satish', 'this news website is so helpful and wonderful', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newsposts`
--

CREATE TABLE `newsposts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `src` text NOT NULL DEFAULT 'https://www.google.com/',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `newsposts`
--

INSERT INTO `newsposts` (`id`, `username`, `title`, `descr`, `src`, `date`, `likes`, `dislikes`) VALUES
(1, 'Raunak', 'This is the first news.', 'This is created for testing purpose.', '', '2024-03-03', 3, 2),
(2, 'Raunak', 'news2', '', '', '2024-03-03', 6, 2),
(3, 'Raunak', 'this is the news of random person', 'this news is established by raunak tiwari ..\r\nhaha haha ha ha', 'www.google.com', '2024-03-03', 4, 3),
(4, 'Satish', 'some one killed a person with bullet shot', 'this happened on sunday 23/03/2006 in the evening', '', '2024-03-04', 2, 0),
(5, 'Tejas', 'The election has tremendous effect on people in maharashtra', 'Government started promising people about various solutions over problems....', '', '2024-03-04', 1, 0),
(6, 'satish', 'this news is about electric cars', 'ev vehicles are becoming cheaper....', '', '2024-03-04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Raunak', 'r@r.com', 'raunak', 'admin'),
(2, 'User 1', '1@r.com', 'raunak', 'user'),
(3, 'User 2', '2@r.com', 'raunak', 'user'),
(5, '3', '3@r.com', 'raunak', 'user'),
(6, 'Satish', 'satish@gmail.com', 'satish', 'user'),
(7, 'Tejas', 'tejas@gmail.com', 'tejas', 'user'),
(8, 'Satish', 'Satish2@gmail.com', 'satish', 'user'),
(9, 'Satish', 'satish123@gmail.com', 'satish', 'user'),
(10, 'satish', 'satish1234@gmail.com', 'satish', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsposts`
--
ALTER TABLE `newsposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsposts`
--
ALTER TABLE `newsposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
