-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 11:08 AM
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
  `owner_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `year_of_foundation`, `services`, `owner_id`, `business_id`) VALUES
(1, 'Pet Pals', 'A pet sitting and walking service catering to busy professionals in the area.', 2018, 'Pet Sitting;nm;prc;$20 per visit;srvc;sprtr;Dog Walking;nm;prc;$15 for 30 minutes', 'johndoe1_gmail', 'petpals001'),
(2, 'Green Thumb Gardening', 'Offering personalized garden design, installation, and maintenance services for homeowners who want to beautify their outdoor spaces.', 2016, 'Garden Design;nm;prc;$150 consultation fee + varies based on project scope;srvc;sprtr;Monthly Maintenance;nm;prc;Starting from $50/month', 'johndoe2_gmail', 'greenthumb001'),
(3, 'Bake Bliss', 'Specializing in custom cakes and desserts for all occasions, from birthdays to weddings.', 2017, 'Custom Cake;nm;prc;Starting from $50;srvc;sprtr;Dessert Platter;nm;prc;Starting from $30', 'admin_admin', 'bakebliss001'),
(4, 'Tech Tune-Up', 'Providing computer repair, software installation, and troubleshooting services for individuals and small businesses.', 2019, 'Computer Repair;nm;prc;$50/hour;srvc;sprtr;Software Installation;nm;prc;$30 per program', 'johndoe1_gmail', 'techtuneup001'),
(5, 'Sew Crafty', 'A sewing studio offering alterations, custom clothing creation, and sewing classes for beginners.', 2015, 'Alterations;nm;prc;Starting from $15;srvc;sprtr;Sewing Classes;nm;prc;$25 per session', 'johndoe1_gmail', 'sewcrafty001'),
(6, 'Wonderful Honey Farm Ltd.', 'High-quality honey sourced from local beekeepers: acacia honey, forest mixed honey, linden honey.', 2010, 'Acacia Honey;nm;prc;$10 per jar;srvc;sprtr;Forest Mixed Honey;nm;prc;$12 per jar', 'johndoe1_gmail', 'wonderfulhoney001'),
(7, 'Mary\'s Beauty Care', '\"More options with us\"', 2015, 'Facials;nm;prc;Starting from $30;srvc;sprtr;Manicure and Pedicure;nm;prc;$40 for both', 'johndoe1_gmail', 'marysbeauty001'),
(8, 'Lackó-Repair Auto Repair Ltd.', 'Auto repair services by Lackó János, mechanic.', 2008, 'Car Maintenance;nm;prc;$50 per hour;srvc;sprtr;Engine Tune-up;nm;prc;$100', 'johndoe1_gmail', 'lackorepair001'),
(9, 'Crafty Creations Workshop', 'Unique handmade crafts and DIY supplies sourced from local artisans: pottery, jewelry, and knitting materials.', 2013, 'Pottery Class;nm;prc;$25 per session;srvc;sprtr;Jewelry Making Workshop;nm;prc;$30 per person', 'johndoe1_gmail', 'craftycreations001'),
(10, 'Fresh Delight Farmstand', 'Farm-fresh produce and homemade goods straight from local farmers: fruits, vegetables, and artisanal jams.', 2016, 'Farmers Market Bundle;nm;prc;$20;srvc;sprtr;Homemade Jam;nm;prc;$5 per jar', 'johndoe1_gmail', 'freshdelight001'),
(11, 'Fit & Fab Fitness Studio', 'Personalized fitness programs and group classes for all levels of fitness enthusiasts: yoga, HIIT, and strength training.', 2017, 'Yoga Class;nm;prc;$15 per session;srvc;sprtr;Personal Training;nm;prc;$50 per hour', 'johndoe1_gmail', 'fitandfab001'),
(12, 'Bookworm\'s Haven Bookstore', 'A cozy haven for book lovers offering a wide selection of new and used books: fiction, non-fiction, and children\'s literature.', 2014, 'Used Book Sale;nm;prc;Starting from $5;srvc;sprtr;Author Meet-and-Greet Events;nm;prc;Free admission', 'johndoe1_gmail', 'bookwormshaven001');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `message_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `profile_picture_name` varchar(255) NOT NULL,
  `basket_contents` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `birth_date`, `phone_number`, `business_owner`, `profile_picture_name`, `basket_contents`) VALUES
(1, 'John', 'Does', 'johndoe1@gmail.com', '$2y$10$rTt17IdbVjTpl77w92F46u8UsUUVr7tL8ZH3Te9JHC0gGekHQAkXe', '2000-01-01', '+36301234567', 0, 'johndoe1_7.png', ''),
(2, 'Admin', 'John', 'admin@admin.com', '$2y$10$Kl/IdMgnuWPJREjEKJIUB.G439cAWPnR8r37GvLscNvutI0QQL68a', '2000-01-01', '+36301234567', 0, 'admin_likebutton.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
