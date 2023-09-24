-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Sep 24, 2023 at 02:28 AM
-- Server version: 10.4.31-MariaDB-1:10.4.31+maria~ubu2004-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `skillset` varchar(1024) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `salary`, `skillset`, `description`, `publisher`) VALUES
(1, 'WordPress Plugin Developer', '3', 'wordpress, php, javascript', 'Lorem ipsum dolor sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus', 1),
(2, 'Junior Laravel Developer', '8', 'laravel, php, javascript, vuejs', 'Lorem ipsum dolor sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus!!! sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan done', 1),
(3, 'React Developer', '9', 'reactjs, tailwindcss, javascript, nodejs', 'Lorem ipsureacasad parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE `jobseekers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(1024) NOT NULL,
  `summary` varchar(2025) NOT NULL,
  `position` varchar(1024) NOT NULL,
  `profile_image` varchar(1024) DEFAULT NULL,
  `skills` varchar(1024) NOT NULL,
  `rate` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseekers`
--

INSERT INTO `jobseekers` (`id`, `name`, `email`, `summary`, `position`, `profile_image`, `skills`, `rate`) VALUES
(1, 'John Doe', 'jdoe@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipiscing elit mattis gravida lobortis euismod, ultricies rutrum iaculis penatibus commodo sollicitudin erat interdum congue eros, himenaeos fames mauris viverra suspendisse ullamcorper platea venenatis vitae torquent. Lacinia class lacus sapien nunc aliquam euismod, porttitor sed quam vitae malesuada magna faucibus, diam habitant duis taciti accumsan. Per semper suspendisse tristique nisl imperdiet euismod malesuada pulvinar sollicitudin facilisi litora, eu consequat senectus cubilia volutpat magnis facilisis ridiculus elementum eros. Laoreet neque erat sapien nam nostra aliquam torquent nec dapibus non, nisi pharetra lacus commodo metus volutpat leo cum aliquet, rhoncus hac maecenas mattis vestibulum primis tellus phasellus eget.', 'Web Developer', NULL, 'php, html, photoshop, css', '3'),
(2, 'Jane Hoz', 'jhoz@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipiscing elit mattis gravida lobortis euismod, ultricies rutrum iaculis penatibus commodo sollicitudin erat interdum congue eros, himenaeos fames mauris viverra suspendisse ullamcorper platea venenatis vitae torquent. Lacinia class lacus sapien nunc aliquam euismod, porttitor sed quam vitae malesuada magna faucibus, diam habitant duis taciti accumsan. Per semper suspendisse tristique nisl imperdiet euismod malesuada pulvinar sollicitudin facilisi litora, eu consequat senectus cubilia volutpat magnis facilisis ridiculus elementum eros. Laor', 'Graphic Designer', NULL, 'photoshop, figma', '7.5'),
(3, 'Hart Pableo', 'hpableo12322@gmail.com', 'agittis est aptent. Ac bibendum justo suspendisse aliquam lectus fermentum condimentum, ridiculus potenti morbi netus nam sed, nisl libero purus natoque cubilia mi. Luctus imperdiet eros parturient proin montes libero varius inceptos, potenti penatibus porta phasellus lobortis nisl et condimentum, hendrerit senectus hac ultrices cum per a. Augue quam mauris ornare arcu volutpat sed euismod quis, egestas phasellus viverra pellentesque suspendisse per semper, fusce nunc vel potenti nibh facilisis curabitur. Magna fringilla augue dictumst rutrum gravida habitasse velit orci praesent, pretium quis in sed viverra id iaculis vestibulum pulvinar interdum, facilisi duis tristique taciti enim cubilia per phasellus.', 'PHP Developer', NULL, 'php, wordpress, drupal, laravel', '15'),
(4, 'Test Name', 'tester@gmail.com', 'Nisi sociosqu cras per torquent consequat accumsan fermentum mollis auctor, imperdiet facilisis l', 'Virtual Assistant', NULL, 'photoshop, social media marketing, facebook ads', '13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
