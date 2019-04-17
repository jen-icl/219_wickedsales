-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 11, 2019 at 08:36 PM
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
(1, 'Wally Be@rBrick', 12933, 'Where’s Wally? brightened many a childhood, and we finally found him in the highly collectible BE@RBRICK series!\r\nHe’s rocking his blue jeans, red and white striped shirt, and hat as always.', '{\"size\":\"11\\\"\",\"produced\":\"Limited Edition\",\"medium\":\"ABS plastic\",\"released\":2018}'),
(2, 'Wally Books', 1292, 'An activity book that features Wally, along with his friends, who are fiendishly hidden in every scene.', '{\"set\":\"4 Books\", \"pages\": 32,\"language\":\"English\",\"dimensions\":\"10 x 0.2 x 12.4 inches\",\"shipping weight\":\"12.6 oz\"}'),
(3, 'Wally on the Cup', 359, 'Found Wally and friends? They\'re hanging off the edge of the cup to lighten the mood.', '{\"size\":\"2\\\"\",\"medium\":\"ABS plastic\",\"manufacturer\":\"Kitan Club\"}'),
(4, 'Find Wally', 2000, 'Where\'s Wally? is a British series of children\'s puzzle books created by English illustrator Martin Handford. The books consist of a series of detailed double-page spread illustrations depicting dozens or more people doing a variety of amusing things at a given location.', '{\"hat\":\"Red and White Stripes\",\"shirt\":\"Red and White Stripes\",\"pants\":\"Blue Jeans\",\"shoes\":\"Brown\",\"accessories\":[\"Glasses\",\"Cane\"]}'),
(5, 'Wally Puzzle', 2999, 'Fantastic Where\'s Wally puzzle designed to celebrate the 21st Anniversary of this publishing phenomenon. Created by Martin Handford and first published in 1987, Where\'s Wally is one of the most recognizable characters in the world and a pop-culture icon. Distinctively dressed wearing a red and white striped sweater, black framed glasses and a bobble hat, Wally is a word traveller, always in search of the next adventure.', '{\"size\":\"18.9 x 26.8 inches\",\"age\":\"12+\",\"pieces\":1000}'),
(6, 'Wally Figurine', 899, 'Can you find Wally? Wally has jumped out from the pages of his books and into your home or office. Make it a game hiding the Where\'s Wally? somewhere in your house—dangling from a chandelier perhaps, or in a cabinet, or under a pillow. Whoever finds him moves him to a new hiding place, and the game continues! You are sure to have countless hours of fun with the Where\'s Wally?', '{\"size\":\"6\\\"\",\"medium\":\"Plastic\",\"age\":\"3+\",\"type\":[\"Action Figurines\",\"Bendable\"]}');

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
