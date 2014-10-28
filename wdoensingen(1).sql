-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2014 at 12:31 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wdoensingen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `print_date` datetime NOT NULL,
  `paid_date` datetime NOT NULL,
  `bill_type_id` int(11) NOT NULL,
  `bill_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `create_date`, `print_date`, `paid_date`, `bill_type_id`, `bill_number`) VALUES
(1, 1, '2014-10-19 12:17:00', '2014-10-19 12:17:00', '2014-10-19 12:17:00', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `bill_positions`
--

CREATE TABLE IF NOT EXISTS `bill_positions` (
`id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `vat` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bill_positions`
--

INSERT INTO `bill_positions` (`id`, `bill_id`, `description`, `price`, `vat`, `amount`) VALUES
(1, 1, 'Produkt1', 12, 1, 12),
(2, 1, 'asfasdfasdfasd', 13, 0, 4545);

-- --------------------------------------------------------

--
-- Table structure for table `bill_types`
--

CREATE TABLE IF NOT EXISTS `bill_types` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`id`, `name`) VALUES
(1, 'Neulieferung');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Elac', 0),
(2, 'Klipsch', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `title` enum('Herr','Frau') NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `city` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `firstname`, `lastname`, `street`, `zip`, `city`, `phone`, `mobile`, `email`) VALUES
(1, 'Herr', 'Filip', 'Hofer', 'Balsthalstr 4', '3000', 'Bern', '123456789', '123456789', 'a@b.ch');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `bill_number` (`bill_number`), ADD KEY `bill_type_id` (`bill_type_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bill_positions`
--
ALTER TABLE `bill_positions`
 ADD PRIMARY KEY (`id`), ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `bill_types`
--
ALTER TABLE `bill_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill_positions`
--
ALTER TABLE `bill_positions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bill_types`
--
ALTER TABLE `bill_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`bill_type_id`) REFERENCES `bill_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bill_positions`
--
ALTER TABLE `bill_positions`
ADD CONSTRAINT `bill_positions_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
