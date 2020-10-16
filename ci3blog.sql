-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 07:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Business'),
(5, 'Entertainment'),
(6, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 18, 'John Osim', 'calabarplaylist@gmail.com', 'The Email field must contain a valid email', '2020-10-11'),
(2, 18, 'Mike Osim', 'playlist@gmail.com', 'The Body field is required', '2020-10-11'),
(3, 6, 'Takon Ajie', 'nkimajie2@gmail.com', 'Surely i will get there, with commitment and devotion', '2020-10-11'),
(4, 18, 'ajetee', 'calabarplaylist@gmail.com', 'omooo is plenty\r\n', '2020-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `postimage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `body`, `postimage`, `created_at`) VALUES
(5, 2, 'Post Two', 'Post-Two', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro perspiciatis autem laudantium veniam iusto? Vitae iure soluta in minus praesentium culpa id maiores numquam! Cumque rerum velit laudantium provident odit.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Porro perspiciatis autem laudantium veniam iusto? Vitae iure soluta in minus praesentium culpa id maiores numquam! Cumque rerum velit laudantium provident odit.', 'noimage.jpg', '2020-10-07 13:23:25'),
(6, 2, 'Post Three', 'Post-Three', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro perspiciatis autem laudantium veniam iusto? Vitae iure soluta in minus praesentium culpa id maiores numquam! Cumque rerum velit laudantium provident odit.</p>\r\n', 'noimage.jpg', '2020-10-07 13:23:55'),
(18, 1, 'Post nine', 'Post-nine', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim</p>\r\n', 'My-Native-fashion-Latest-senator-wears-1.jpg', '2020-10-08 13:31:51'),
(19, 1, 'Lorem ipsum dolor sit', 'Lorem-ipsum-dolor-sit', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim</p>\r\n', '118263640_3270548076372391_5790121726762672936_n.jpg', '2020-10-12 16:51:51'),
(20, 5, 'We want SARS', 'We-want-SARS', '<p>Moments after the Inspector General of Police, Adamu Mohammed, announced the disbandment of SARS some Nigerian parents have come out, to kick against the decision.</p>\r\n\r\n<p>In a viral video on social media, the parents were seen raising their placards, and screaming&nbsp;<em>&ldquo;we want SARS&rdquo;</em></p>\r\n\r\n<p>According to the parents the disbandment of the Special Anti Robbery Squad is not a wise decision, adding that it would increase crime rate in the country.</p>\r\n\r\n<p>Meanwhile many other Nigerians, especially youths who tirelessly fought for the cause, have dragged them for taking such action, and refusing to consider the feelings of the general public, stating that their sons and daughters may be the next victims</p>\r\n', 'c1.JPG', '2020-10-12 17:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Ajie', 'Takon', 'nkimajie2@gmail.com', 'a3269244cec64a32c1222933c988d91b'),
(2, 'okon', 'John', 'calabarplaylist@gmail.com', 'c4dd95d0b264043e4ca6f6cddfe5689e'),
(3, 'mike', 'osim', 'xtremenaija2@gmail.com', 'bf3b2290e229da2ba272a81c602ea88d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
