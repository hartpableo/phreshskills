-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Sep 29, 2023 at 06:16 AM
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
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `company_name` varchar(1024) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `company_name`, `company_email`, `password`) VALUES
(1, 'Google Inc.', 'recruitment@google.com', '$2y$10$tXI/NUM0C8zGK5E0/nHSvuhSh3U4L1UIsokni4zArkdv8BZRRpmhK'),
(2, 'Automattic', 'info@automattic.org', '123123123'),
(3, 'Meta', 'info@meta.com', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `salary_type` varchar(100) NOT NULL,
  `skillset` varchar(1024) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `date_published` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `salary`, `salary_type`, `skillset`, `description`, `employer_id`, `date_published`) VALUES
(1, 'WordPress Plugin Developer', '350', 'monthly', 'wordpress, php, javascript', 'Lorem ipsum dolor sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus', 1, '2023-09-29 00:00:00'),
(2, 'Junior Laravel Developer', '8', 'hourly', 'laravel, php, javascript, vuejs', 'Lorem ipsum dolor sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus!!! sit amet consectetur adipiscing elit iaculis aptent metus turpis hac, porttitor tempor maecenas ullamcorper facilisis penatibus quis felis venenatis scelerisque fusce parturient, suspendisse tortor aenean sapien accumsan done', 2, '2023-09-29 00:00:00'),
(3, 'React Developer', '9', 'bi-weekly', 'reactjs, tailwindcss, javascript, nodejs', 'Lorem ipsureacasad parturient, suspendisse tortor aenean sapien accumsan donec id faucibus semper sagittis lacus', 3, '2023-09-29 00:00:00'),
(4, 'Senior Software QA/Tester', '150', 'weekly', 'ui, ci, ux, c#, sql', 'augue est morbi, sagittis nibh eget curabitur sapien phasellus consequat faucibus sodales parturient aliquet tristique, ornare dapibus magnis primis mollis pulvinar blandit vel aptent sem taciti nulla. Nam pretium varius congue montes donec parturient pharetra arcu praesent, dapibus hendrerit primis tempor dictum proin placerat rhoncus class laoreet, facilisis dignissim metus eleifend accumsan porttitor aenean faucibus. Nibh rutrum torquent justo sapien cum viverra ligula condimentum, senectus penatibus fusce auctor libero orci mollis, scelerisque proin quis odio sagittis augue nisl. Mus posuere urna varius massa dictum ante convallis tristique et, taciti congue sociosqu luctus aliquam nisi interdum magnis sapien semper, habitant diam erat fusce purus eget tempor molestie.', 2, '2023-09-29 00:00:00'),
(5, 'Bookkeeper', '7', 'hourly', 'quickbooks, google sheets, google docs, microsoft excel', 'Lorem ipsum dolor sit amet consectetur adipiscing elit nullam, quis felis vel metus luctus taciti nostra, ut auctor potenti ridiculus habitant enim magnis. Purus justo quis platea per torquent rutrum malesuada nisl lobortis viverra luctus habitant mauris, venenatis diam fermentum in mi neque dapibus cras phasellus dictum commodo. Penatibus congue fringilla cum etiam proin imperdiet vulputate aliquet, nunc feugiat praesent dictumst ullamcorper magnis magna hendrerit a, cursus conubia tempor himenaeos purus diam ac. Per fermentum cursus ultricies pellentesque scelerisque dictum suscipit aenean congue mus suspendisse, quis at magna litora ne', 3, '2023-09-29 00:00:00'),
(8, 'Tester', '125', 'weekly', 'skill test', 'Bytes\r\nLists\r\nRich TextHTML\r\nCopy\r\nLorem ipsum dolor sit amet consectetur adipiscing elit aptent at, augue suscipit nullam semper mattis magnis duis bibendum volutpat, placerat dapibus quam nisi lobortis hac ac dignissim. Posuere donec sociis potenti proin diam ante facilisis dignissim eu, pharetra integer neque euismod faucibus nec risus est purus et, mus quisque fringilla leo tellus nulla habitant porttitor. Odio ullamcorper ligula dis ac praesent nulla erat quis sagittis sapien integer, mi ultricies lobortis conubia interdum parturient et blandit curabitur posuere bibendum, fames nunc pellentesque suspendisse aliquet commodo lacinia enim vivamus rhoncus. Senectus ligula curabitur cursus lacus facilisi quisque tristique vel montes commodo porta dictumst erat nunc vulputate sodales, scelerisque massa nibh malesuada dignissim volutpat at habitant suscipit in tortor vitae augue integer. Nisi porta morbi semper odio justo nam quam sagittis, montes imperdiet sapien torquent posuere vulputa', 2, '2023-09-29 00:00:00'),
(10, 'Latest Test', '123', 'hourly', '213, sadsad', 'sadsadsa dsa dd qd 123 3qda asdasd', 2, '2023-09-29 00:12:00'),
(11, 'VueJS Developer', '10', 'hourly', 'Vue, Laravel, WordPress, SCSS', 'aliquet sociosqu maecenas et at, malesuada ac faucibus himenaeos eu senectus pellentesque quam aenean, accumsan integer massa iaculis metus auctor condimentum. Egestas habitant mus conubia congue pulvinar tincidunt eget orci id donec mollis eleifend vel ut te', 2, '2023-09-29 06:16:02');

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
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`);

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
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
