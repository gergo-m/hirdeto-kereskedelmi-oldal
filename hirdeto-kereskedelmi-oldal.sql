-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 06:35 AM
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
-- Database: `hirdeto-kereskedelmi-oldal`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `year_of_foundation` int(11) NOT NULL,
  `services` varchar(255) NOT NULL,
  `owner_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `year_of_foundation`, `services`, `owner_id`) VALUES
(1, 'Pet Pals', 'A pet sitting and walking service catering to busy professionals in the area.', 2018, '🧫 Pet Sitting;nm;prc;$20 per visit;srvc;sprtr;🐶 Dog Walking;nm;prc;$15 for 30 minutes', 'johndoe1'),
(2, 'Green Thumb Gardening', 'Offering personalized garden design, installation, and maintenance services for homeowners who want to beautify their outdoor spaces.', 2016, '🏡 Garden Design;nm;prc;$150 consultation fee + varies based on project scope;srvc;sprtr;👨‍🌾 Monthly Maintenance;nm;prc;Starting from $50/month', 'johndoe1'),
(3, 'Bake Bliss', 'Specializing in custom cakes and desserts for all occasions, from birthdays to weddings.', 2017, '🍰 Custom Cake;nm;prc;Starting from $50;srvc;sprtr;🍨 Dessert Platter;nm;prc;Starting from $30', 'johndoe1'),
(4, 'Tech Tune-Up', 'Providing computer repair, software installation, and troubleshooting services for individuals and small businesses.', 2019, '🛠 Computer Repair;nm;prc;$50/hour;srvc;sprtr;📰 Software Installation;nm;prc;$30 per program', 'johndoe1'),
(5, 'Sew Crafty', 'A sewing studio offering alterations, custom clothing creation, and sewing classes for beginners.', 2015, '⚙ Alterations;nm;prc;Starting from $15;srvc;sprtr;🧵 Sewing Classes;nm;prc;$25 per session', 'johndoe1'),
(6, 'Sweet Honey', 'High-quality honey sourced from local beekeepers: acacia honey, forest mixed honey, linden honey.', 2010, '🍯 Acacia Honey;nm;prc;$10 per jar;srvc;sprtr;🌳 Forest Mixed Honey;nm;prc;$12 per jar', 'johndoe1'),
(7, 'Mary&#039;s Beauty Care', '&quot;You can be more with us&quot;', 2015, '🤗 Facials;nm;prc;Starting from $30;srvc;sprtr;💅 Manicure and Pedicure;nm;prc;$40 for both', 'johndoe1'),
(8, 'Lackó-Repair Autószerelő Kft.', 'Auto repair services by János Lackó, mechanic', 2008, '🚗 Car Maintenance;nm;prc;$50 per hour;srvc;sprtr;🗜 Engine Tune-up;nm;prc;$100', 'johndoe1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `business_owner` tinyint(1) NOT NULL,
  `profile_picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `birth_date`, `phone_number`, `business_owner`, `profile_picture_name`) VALUES
(1, 'John', 'Does', 'johndoe1@gmail.com', '$2y$10$rTt17IdbVjTpl77w92F46u8UsUUVr7tL8ZH3Te9JHC0gGekHQAkXe', '2000-01-01', '+36301234567', 0, 'johndoe1_7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
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
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
