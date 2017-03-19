-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2016 at 04:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `issue` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cover` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `download` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue`, `cover`, `file`, `tags`, `view`, `download`, `status`, `publish_date`, `des`) VALUES
(1, 'January 2016', '1473700955-1179071539.jpeg', '1473710164-340139281.pdf', 'sdsd,dfsf', '50', '1', 1, '2016-09-12 20:08:50', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget odio justo. Curabitur id malesuada sem. Maecenas sed aliquam risus. Donec a massa bibendum, gravida nisl vel, volutpat diam. Nam pretium finibus bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec sollicitudin risus, vitae tincidunt risus.<br /><br />Maecenas nec luctus dui. Sed molestie mi sit amet tristique consectetur. Cras elementum nulla eu lectus commodo scelerisque. Praesent aliquet libero ante, id rutrum tortor pulvinar sed. Duis sagittis risus vel egestas interdum. Sed enim tellus, egestas a purus at, mollis lacinia nunc. Praesent facilisis, turpis quis tristique vulputate, ante arcu efficitur neque, ac vulputate purus massa eu velit. Maecenas consequat maximus leo, sit amet dignissim odio ultricies sit amet. Sed nec imperdiet ante, quis suscipit tellus. Etiam a magna id mauris finibus lacinia.<br /><br />Quisque bibendum dapibus pulvinar. Etiam sit amet augue magna. Curabitur vehicula tempus ipsum, ac efficitur lacus. In scelerisque justo sit amet diam vulputate auctor. Nunc vel pretium lectus. Nunc at posuere dolor. Praesent metus justo, rutrum at iaculis id, ornare eu velit. Mauris at est velit. Suspendisse potenti.<br /><br />Morbi consectetur blandit est vitae lacinia. In purus nisi, egestas non arcu vitae, vehicula vehicula est. Phasellus id libero id quam semper pretium eu nec lacus. Maecenas ac vestibulum justo. Morbi vulputate malesuada magna, eu lacinia arcu egestas at. Maecenas porttitor at ipsum ac egestas. Nullam laoreet in lorem at semper.<br /><br />Pellentesque sed nulla vestibulum, maximus ipsum congue, congue est. Vivamus volutpat, ante ac malesuada fringilla, massa est vestibulum ligula, a feugiat libero nunc id magna. Maecenas commodo massa enim, ut convallis lectus tempor in. Vivamus ac sagittis enim, id sollicitudin massa. Aenean iaculis eros ultrices, cursus arcu sed, pharetra augue. Donec ac dapibus mauris. Aliquam scelerisque mauris commodo feugiat tincidunt.<br /><br /></p>'),
(3, 'February 2016', '1473710879-1413209612.jpeg', '1473710879-1551925280.pdf', '', '5', '4', 1, '2016-09-12 20:09:01', '<p>dsdsdsd</p>'),
(4, 'March 2016', '1473711033-444548759.jpeg', '1473711033-1905917174.pdf', '', '1', '5', 1, '2016-09-12 20:10:33', '<p>fgfcgfc</p>'),
(5, 'April 2016', '1473711133-963364823.jpeg', '1473711133-1020866565.pdf', '', '30', '1', 1, '2016-09-12 20:12:13', '<p>czxcz</p>'),
(6, 'May 2016', '1473790419-807189519.jpeg', '1473790419-193562581.pdf', '', '', '', 1, '2016-09-13 18:13:39', '<p>sasas</p>'),
(7, 'June 2016', '1473790501-2073436846.jpeg', '1473790501-2088042074.pdf', '', '5', '', 1, '2016-09-13 18:15:01', '<p>dsdsdsad</p>');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `magazine` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tw` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gplus` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `old_issue` varchar(255) NOT NULL,
  `old_issue_type` int(11) NOT NULL,
  `all_issue` varchar(255) NOT NULL,
  `all_issue_order` text NOT NULL,
  `item` varchar(255) NOT NULL,
  `old_item` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `magazine`, `address`, `email`, `mobile`, `fb`, `tw`, `gplus`, `pin`, `old_issue`, `old_issue_type`, `all_issue`, `all_issue_order`, `item`, `old_item`, `updated_at`) VALUES
(1, 'Arrival Magazine Manager', 'fgfgg', 'jabed.bhoiyan@gmail.com', '8801913687447', 'https://web.facebook.com/StudioArrival/?fref=ts', 'https://web.facebook.com/StudioArrival/?fref=ts', 'https://web.facebook.com/StudioArrival/?fref=ts', 'https://web.facebook.com/StudioArrival/?fref=ts', '10', 0, '10', 'desc', '3', '4', '2016-09-13 11:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `name`, `content`, `created_at`) VALUES
(1, 'About Us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget odio justo. Curabitur id malesuada sem. Maecenas sed aliquam risus. Donec a massa bibendum, gravida nisl vel, volutpat diam. Nam pretium finibus bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec sollicitudin risus, vitae tincidunt risus.<br /><br />Maecenas nec luctus dui. Sed molestie mi sit amet tristique consectetur. Cras elementum nulla eu lectus commodo scelerisque. Praesent aliquet libero ante, id rutrum tortor pulvinar sed. Duis sagittis risus vel egestas interdum. Sed enim tellus, egestas a purus at, mollis lacinia nunc. Praesent facilisis, turpis quis tristique vulputate, ante arcu efficitur neque, ac vulputate purus massa eu velit. Maecenas consequat maximus leo, sit amet dignissim odio ultricies sit amet. Sed nec imperdiet ante, quis suscipit tellus. Etiam a magna id mauris finibus lacinia.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget odio justo. Curabitur id malesuada sem. Maecenas sed aliquam risus. Donec a massa bibendum, gravida nisl vel, volutpat diam. Nam pretium finibus bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec sollicitudin risus, vitae tincidunt risus.<br /><br />Maecenas nec luctus dui. Sed molestie mi sit amet tristique consectetur. Cras elementum nulla eu lectus commodo scelerisque. Praesent aliquet libero ante, id rutrum tortor pulvinar sed. Duis sagittis risus vel egestas interdum. Sed enim tellus, egestas a purus at, mollis lacinia nunc. Praesent facilisis, turpis quis tristique vulputate, ante arcu efficitur neque, ac vulputate purus massa eu velit. Maecenas consequat maximus leo, sit amet dignissim odio ultricies sit amet. Sed nec imperdiet ante, quis suscipit tellus. Etiam a magna id mauris finibus lacinia</p>', '2016-09-13 10:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `fullname`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$IyQ//FwBath.OPbBdeWBVegHEdmImORs/EiYefTLB95fTrgK15dta', 'nxkdexG6hm8ZKCjKMiR5quHmOCEbYljsYvhSFeNAlvPahTKZTkl5fKRdXFeG', '2016-09-11 07:54:18', '2016-09-14 01:27:03', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
