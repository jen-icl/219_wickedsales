-- 2019-04-04

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 04, 2019 at 08:32 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `2.19wickedsales`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `misc_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `misc_details`) VALUES
(1, 'Wicked Thing', 2000, 'This product will solve all of your ills, cure famine, and make you look more like bradd pitt, regardless if you are male or female', '{\"height\":\"20cm\",\"width\":\"15cm\",\"weight\":4.2,\"manufacturer\":\"Therbal\"}'),
(2, 'Wicked Clogs', 42150, 'This is the noisiest shoe you will ever wear.', '{\"availableSizes\":[5,6,7,8,9,10,13,14,17,20],\"colors\":\"red, green, blue, natural\",\"materials\":\"pine, balso\"}'),
(3, 'Wicked Brick', 525, 'It\'s brick, it\'s brick, it\'s big, it\'s bad.', '{\"height\":\"3 inches\",\"width\":\"3 inches\",\"length\":\"6 inches\",\"colors\":\"red, cherry, maroon, speckled\",\"manufacturer\":\"Riot Brick Studios\",\"weight\":\"8 lbs\",\"courseness\":\"very rough\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
