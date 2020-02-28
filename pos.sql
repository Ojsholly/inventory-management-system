-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 11:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`) VALUES
(6, '  Choco Milo   ', 'Wheat'),
(7, 'Book', 'This category consists of books'),
(8, 'Accessories', 'This category consists of all the jewelries etc.'),
(9, 'Book', 'nnnnnnnnnn'),
(10, 'Body Spray', 'good foe the body'),
(11, 'Body Spray', 'mmmmmmmmmmmm'),
(12, 'LAPTOPS', 'sdr'),
(13, ' Accessories', 'ewewe'),
(14, ' Accessoriesssss', 'sss'),
(17, 'Entertainment', 'vvvvvvvvvv'),
(18, 'ghjukljhghjkl', 'tyhjukl;\'');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `address`, `phone`, `email`, `logo`) VALUES
(1, 'TREASURE SUPERMARKET AND VARIETY STORES', 'bodija, ibadan oyo state', '07046573829 09049586730', 'pos@yahoo.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(450) NOT NULL,
  `amount` decimal(30,2) NOT NULL,
  `staff_name` varchar(40) NOT NULL,
  `refund_status` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `staff_name`, `refund_status`, `deleted`, `date`) VALUES
(7, 'petrol', '0.00', ' John   Doe ', 1, 0, '2018-11-30'),
(8, 'Diesel', '0.00', ' John   Doe ', 1, 0, '2018-11-01'),
(9, 'kerosene', '4000.00', 'pelumi Agbolabori', 1, 0, '2018-11-01'),
(10, 'ink', '0.00', 'Olusola Ojewunmi', 1, 0, '2018-11-01'),
(11, 'Diesel', '0.00', 'pelumi Agbolabori', 1, 0, '2018-11-01'),
(12, 'kerosene', '2900.00', ' John   Doe ', 0, 0, '0000-00-00'),
(13, 'Fuel', '1000.00', 'Olakunle Titilayo', 0, 0, '0000-00-00'),
(14, 'Fuello', '0.00', 'pelumi agbolabori', 1, 0, '0000-00-00'),
(15, 'Fuel', '20000.00', '   Ade        Dayo     ', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(30,4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `stock_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `image`, `info`, `stock_count`) VALUES
(4, 'Groundnut', 10, '1000.0000', 'bday.jpg', 'Nourish Your Soul', -53),
(5, 'Bodman Perfume', 8, '1.0000', 'streetart4.jpg', 'good foe the body', 7),
(11, 'HP vibes', 8, '15.0000', '', 'Fragile, handle with care', 5),
(14, 'Bisciut', 6, '123454.0000', 'bday.jpg', 'ddd', 7),
(15, 'Wire', 11, '1234.0000', 'banner.jpg', 'rt', 28),
(17, 'cloth', 8, '4444.0000', '', 'tt', 16),
(18, 'Wrist watch', 6, '5.0000', '', 'catchy', 0),
(19, 'Shoe', 8, '10000.0000', '', '', 9),
(20, 'Sun glasses', 8, '1.0000', '', 'Good For the Body', 46),
(21, '', 6, '646464.0000', '15506607253961742972489.jpg', 'Bsbshs', 64646);

-- --------------------------------------------------------

--
-- Table structure for table `product_refund`
--

CREATE TABLE `product_refund` (
  `refund_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL,
  `txn_id` varchar(225) NOT NULL,
  `who` varchar(255) NOT NULL,
  `why_return` varchar(225) NOT NULL,
  `date_bought` date NOT NULL,
  `date_refunded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_refund`
--

INSERT INTO `product_refund` (`refund_id`, `product_id`, `product`, `quantity`, `amount`, `txn_id`, `who`, `why_return`, `date_bought`, `date_refunded`) VALUES
(1, 5, 'Bodman Perfume', 1, 0, '1540915986', '', 'I want to change it to a better one', '2018-10-30', '2018-10-31'),
(2, 14, 'Bisciut', 1, 0, '1540915986', '', 'Change', '2018-10-30', '2018-10-31'),
(3, 0, '', 0, 0, '0', '', 'Change', '0000-00-00', '2018-10-31'),
(4, 0, '', 0, 0, '0', '', 'Change', '0000-00-00', '2018-10-31'),
(5, 5, 'Bodman Perfume', 1, 0, '1540915986', '', '', '2018-10-30', '2018-10-31'),
(6, 0, '', 0, 0, '0', '', 'ncjnef', '0000-00-00', '2018-10-31'),
(7, 7, 'Acura Spray', 1, 123000, '1540917771', '', 'mnjnfee', '2018-10-30', '2018-10-31'),
(8, 4, 'Groundnut', 1, 100, '1540917771', '', '6876', '2018-10-30', '2018-10-31'),
(9, 4, 'Groundnut', 1, 100, '0', '', 'bad', '2018-10-31', '2018-10-31'),
(10, 4, 'Groundnut', 2, 400, '0', '', 'kkgmjk', '2018-10-31', '2018-10-31'),
(11, 4, 'Groundnut', 2, 400, '0', '', 'kkgmjk', '2018-10-31', '2018-10-31'),
(12, 5, 'Bodman Perfume', 3, 9000, '0', '', 'ggh5', '2018-10-31', '2018-10-31'),
(13, 5, 'Bodman Perfume', 3, 9000, '0', '', 'ggh5', '2018-10-31', '2018-10-31'),
(14, 5, 'Bodman Perfume', 3, 9000, 'vJrgBGIHhDG5qI5RnJk7', '', 'ae', '2018-10-31', '2018-10-31'),
(15, 5, 'Bodman Perfume', 0, 9000, 'vJrgBGIHhDG5qI5RnJk7', '', 'wddf', '2018-10-31', '2018-10-31'),
(16, 5, 'Bodman Perfume', 1, 9000, 'vJrgBGIHhDG5qI5RnJk7', '', 'tweetvwt', '2018-10-31', '2018-10-31'),
(17, 5, 'Bodman Perfume', 1, 9000, 'vJrgBGIHhDG5qI5RnJk7', '', 'defe', '2018-10-31', '2018-10-31'),
(18, 4, 'Groundnut', 1, 400, 'vJrgBGIHhDG5qI5RnJk7', '', '', '2018-10-31', '2018-10-31'),
(19, 5, 'Bodman Perfume', 3, 9000, 'vJrgBGIHhDG5qI5RnJk7', '', '', '2018-10-31', '2018-10-31'),
(20, 4, 'Groundnut', 1, 400, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(21, 4, 'Groundnut', 3, 400, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(22, 11, 'HP vibes', 1, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(23, 7, 'Acura Spray', 1, 4, 'QFBeffvUB9qoWstwxqpN', '', '', '2018-10-31', '2018-10-31'),
(24, 11, 'HP vibes', 4, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(25, 11, 'HP vibes', 4, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(26, 11, 'HP vibes', 1, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(27, 11, 'HP vibes', 1, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(28, 11, 'HP vibes', 1, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(29, 11, 'HP vibes', 1, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(30, 19, 'Shoe', 2, 60000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(31, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(32, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(33, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(34, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(35, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(36, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(37, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(38, 11, 'HP vibes', 2, 75000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(39, 11, 'HP vibes', 2, 37500, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(40, 19, 'Shoe', 2, 20000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(41, 11, 'HP vibes', 1, 18750, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(42, 19, 'Shoe', 2, 10000, 'LTCrw0oykMUI22lr0ncu', '', '', '2018-10-31', '2018-10-31'),
(43, 4, 'Groundnut', 1, 100, 'xUp3yMiqI3MCzFXNFhag', '', '', '2018-10-31', '2018-10-31'),
(44, 4, 'Groundnut', 4, 400, 'HzsCQ6Aycm64eBcMlvT2', '', '', '2018-10-31', '2018-10-31'),
(45, 5, 'Bodman Perfume', 2, 3000, 'HzsCQ6Aycm64eBcMlvT2', '', '', '2018-10-31', '2018-10-31'),
(46, 17, 'cloth', 2, 8888, 'HzsCQ6Aycm64eBcMlvT2', '', '', '2018-10-31', '2018-10-31'),
(47, 5, 'Bodman Perfume', 2, 3000, 'HzsCQ6Aycm64eBcMlvT2', '', '', '2018-10-31', '2018-10-31'),
(48, 4, 'Groundnut', 2, 200, 'HzsCQ6Aycm64eBcMlvT2', '', '', '2018-10-31', '2018-10-31'),
(49, 5, 'Bodman Perfume', 1, 1500, 'QFBeffvUB9qoWstwxqpN', '', '', '2018-10-31', '2018-11-01'),
(50, 4, 'Groundnut', 4, 400, '6y8Zh6XKvt7mbuL4kT3Q', '', '', '2018-11-01', '2018-11-01'),
(51, 4, 'Groundnut', 4, 4000, 'lPvobAFJTMC6TUbO07Sv', '', '', '2018-11-01', '2018-11-01'),
(52, 4, 'Groundnut', 3, 3000, 'lPvobAFJTMC6TUbO07Sv', '', '', '2018-11-01', '2018-11-01'),
(53, 19, 'Shoe', 4, 40000, 'lPvobAFJTMC6TUbO07Sv', 'Adebayo', 'Too fragile', '2018-11-01', '2018-11-01'),
(54, 14, 'Bisciut', 0, 0, 'w1uyGsPbevOuldqE6SIk', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(55, 14, 'Bisciut', 0, 0, 'w1uyGsPbevOuldqE6SIk', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(56, 14, 'Bisciut', 0, 0, 'w1uyGsPbevOuldqE6SIk', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(57, 14, 'Bisciut', 1, 123454, 'w1uyGsPbevOuldqE6SIk', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(58, 4, 'Groundnut', 1, 1000, 'LbellD1BUcbKdW9sEnKU', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(59, 4, 'Groundnut', 1, 1000, 'LbellD1BUcbKdW9sEnKU', 'Adebayo', '', '2018-11-06', '2018-11-06'),
(60, 4, 'Groundnut', 5, 5000, 'hvlT5tRmcDX6zi5vgmVP', ',mkgbn ogk', 'efmawor[mvwpk;;', '2019-01-29', '2019-01-29'),
(61, 19, 'Shoe', 6, 60000, 'hvlT5tRmcDX6zi5vgmVP', ',urigirjgjr', 'kmirir', '2019-01-29', '2019-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `expense_id` int(4) NOT NULL,
  `amount` decimal(30,4) NOT NULL,
  `staff_name` varchar(40) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`id`, `expense_id`, `amount`, `staff_name`, `deleted`) VALUES
(2, 0, '4500000.0000', 'pelumi agbolabori', 1),
(3, 0, '4500.0000', 'pelumi agbolaborioii', 0),
(4, 0, '150000.0000', 'pelumi agbolabori', 0),
(5, 0, '5200.0000', 'Olusola Ojewunmi', 0),
(6, 0, '100.0000', 'pelumi Agbolabori', 0),
(7, 0, '200.0000', 'pelumi agbolabori', 0),
(8, 6, '200.0000', 'Olusola Ojewunmi', 0),
(9, 5, '100.0000', ' John   Doe ', 0),
(10, 4, '7000.0000', 'Olusola Ojewunmi', 0),
(11, 4, '200.0000', 'Olusola Ojewunmi', 0),
(12, 4, '7000.0000', ' John   Doe ', 0),
(13, 4, '200.0000', 'Olusola Ojewunmi', 0),
(14, 6, '7000.0000', 'pelumi Agbolabori', 0),
(15, 6, '200.0000', 'Olusola Ojewunmi', 0),
(16, 8, '2000.0000', 'Olusola Ojewunmi', 0),
(17, 9, '5000.0000', 'Olusola Ojewunmi', 0),
(18, 12, '500.0000', 'Olakunle Titilayo', 0),
(19, 12, '500.0000', 'oiufdiuf ljfheuifhw', 0),
(20, 13, '5000.0000', 'Olakunle Titilayo', 0),
(21, 12, '500.0000', 'pelumi agbolabori', 0),
(22, 12, '500.0000', 'pelumi agbolabori', 0),
(23, 12, '100.0000', 'Olakunle Titilayo', 0),
(24, 14, '2200.0000', 'Olakunle Titilayo', 0),
(25, 15, '1000.0000', '   Ade        Dayo     ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `products` mediumtext NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `when_sold` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `txn_id`, `products`, `product_id`, `quantity`, `total`, `payment_method`, `when_sold`) VALUES
(7, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(8, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(9, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(11, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(12, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(13, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(15, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(16, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(17, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(19, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(20, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(21, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(23, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(24, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(25, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(27, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(28, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(29, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(31, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(32, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(33, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(35, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(36, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(37, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(39, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(40, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(41, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(43, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(44, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(45, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(47, '0', 'Groundnut', 4, 3, '3000', 1, '2018-09-02'),
(48, '0', 'Acura Spray', 7, 3, '30000', 1, '2018-09-02'),
(49, '0', 'Bodman Perfume', 5, 3, '4500', 1, '2018-09-02'),
(50, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(51, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(52, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(53, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(54, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(55, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(56, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(57, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(58, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(59, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(60, '0', 'HP vibes', 11, 1, '15000', 1, '2018-09-02'),
(61, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(62, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(63, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(64, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(65, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(66, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(67, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(68, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(69, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(70, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(71, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(72, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(73, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(74, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(75, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(76, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(77, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(78, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(79, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(80, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(81, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(82, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(83, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(84, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(85, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(86, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(87, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(88, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(89, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(90, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(91, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(92, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(93, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(94, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(95, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(96, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(97, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(98, '0', 'HP vibes', 11, 1, '15000', 1, '2018-09-02'),
(99, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(100, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(101, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-09-02'),
(102, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(103, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(104, '0', 'Bisciut', 14, 1, '100', 1, '2018-09-02'),
(105, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-09-02'),
(106, '0', 'Groundnut', 4, 7, '7000', 1, '2018-09-02'),
(107, '0', 'Groundnut', 4, 1, '1000', 1, '2018-09-02'),
(108, '0', 'HP vibes', 11, 1, '15000', 1, '2018-09-02'),
(109, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-23'),
(110, '0', 'Acura Spray', 7, 9, '1107000', 1, '2018-10-23'),
(111, '0', 'Bisciut', 14, 11, '1100', 1, '2018-10-23'),
(112, '0', 'Bisciut', 14, 6, '600', 1, '2018-10-23'),
(113, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-23'),
(114, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-23'),
(116, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-23'),
(117, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(118, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-24'),
(119, '0', 'Bisciut', 14, 1, '100', 1, '2018-10-24'),
(120, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(121, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-24'),
(122, '0', 'Bisciut', 14, 1, '100', 1, '2018-10-24'),
(123, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(124, '0', 'Bisciut', 14, 1, '100', 1, '2018-10-24'),
(125, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(126, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(127, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-24'),
(128, '0', 'Bisciut', 14, 1, '100', 1, '2018-10-24'),
(129, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(130, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(131, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(132, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(133, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(134, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(135, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(136, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(137, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(138, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(139, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(140, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(141, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(142, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(143, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(144, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(145, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(146, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(147, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(148, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(149, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(150, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(151, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(152, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(153, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(154, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(155, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(156, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(157, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(158, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(159, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(160, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(161, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(162, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(163, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(164, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(165, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(166, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(167, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(168, '0', 'Bisciut', 14, 1, '100', 1, '2018-10-24'),
(169, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(170, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(171, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(172, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(174, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-24'),
(175, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(176, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(177, '0', 'Bisciut', 14, 1, '123454', 1, '2018-10-24'),
(178, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(179, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-24'),
(180, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-24'),
(181, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-24'),
(182, '0', 'HP vibes', 11, 11, '165000', 1, '2018-10-24'),
(183, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-24'),
(185, '0', 'Acura Spray', 7, 8, '984000', 1, '2018-10-25'),
(186, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-25'),
(187, '0', 'Bodman Perfume', 5, 4, '6000', 1, '2018-10-25'),
(188, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-25'),
(190, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-25'),
(191, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-25'),
(192, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-25'),
(193, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-25'),
(194, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-25'),
(195, '0', 'Bisciut', 14, 1, '123454', 1, '2018-10-25'),
(197, '0', 'cloth', 0, 1, '4444', 1, '2018-10-25'),
(199, '0', 'Bisciut', 14, 1, '123454', 1, '2018-10-25'),
(200, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-25'),
(201, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(202, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(203, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-29'),
(204, '0', 'Bisciut', 14, 1, '123454', 1, '2018-10-29'),
(205, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-29'),
(206, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(207, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(208, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(209, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(210, '0', 'Bisciut', 14, 1, '123454', 1, '2018-10-29'),
(211, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-29'),
(212, '0', 'HP vibes', 11, 1, '15000', 1, '2018-10-29'),
(213, '0', 'Groundnut', 4, 4, '4000', 1, '2018-10-29'),
(215, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(217, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(219, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(220, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(221, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-29'),
(222, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(223, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(224, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-29'),
(225, '0', 'Acura Spray', 7, 1, '123000', 1, '2018-10-29'),
(226, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(227, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-29'),
(228, '0', 'Groundnut', 4, 1, '1000', 1, '2018-10-29'),
(229, '0', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(230, '1540915778', 'Groundnut', 4, 2, '200', 1, '2018-10-30'),
(231, '1540915779', 'Acura Spray', 7, 3, '369000', 1, '2018-10-30'),
(232, '1540915908', 'HP vibes', 11, 2, '30000', 1, '2018-10-30'),
(233, '1540915908', 'Bisciut', 14, 2, '246908', 1, '2018-10-30'),
(234, '1540915985', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(235, '1540915985', 'Acura Spray', 7, 1, '123000', 1, '2018-10-30'),
(239, '1540915986', 'cloth', 17, 1, '4444', 1, '2018-10-30'),
(241, '1540916150', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(242, '1540916150', 'HP vibes', 11, 1, '15000', 1, '2018-10-30'),
(243, '1540916151', 'Acura Spray', 7, 1, '123000', 1, '2018-10-30'),
(244, '1540916151', 'Bisciut', 14, 1, '123454', 1, '2018-10-30'),
(245, '1540916151', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(246, '1540916151', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-30'),
(247, '1540916151', 'Acura Spray', 7, 1, '123000', 1, '2018-10-30'),
(248, '1540916151', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(249, '1540916264', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-30'),
(250, '1540916264', 'Bisciut', 14, 1, '123454', 1, '2018-10-30'),
(251, '1540916444', 'Bisciut', 14, 1, '123454', 1, '2018-10-30'),
(252, '1540916444', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-30'),
(253, '1540916444', 'Acura Spray', 7, 1, '123000', 1, '2018-10-30'),
(254, '79505', 'Groundnut', 4, 1, '100', 1, '2018-10-30'),
(255, '79505', 'Bisciut', 14, 1, '123454', 1, '2018-10-30'),
(256, '79505', 'HP vibes', 11, 1, '15000', 1, '2018-10-30'),
(257, '79505', 'Bisciut', 14, 0, '123454', 1, '2018-10-30'),
(263, '1540991180', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(264, '1540991180', 'Acura Spray', 7, 1, '123', 1, '2018-10-31'),
(265, '1540991180', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(266, '1540991333', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(267, '1540991333', 'Acura Spray', 7, 1, '123', 1, '2018-10-31'),
(268, '1540991333', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(269, '1540991379', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(270, '1540991379', 'Acura Spray', 7, 1, '123', 1, '2018-10-31'),
(271, '1540991379', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(272, '9', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(273, '9', 'Acura Spray', 7, 1, '1', 1, '2018-10-31'),
(274, '9', 'Bisciut', 14, 1, '123454', 1, '2018-10-31'),
(275, '9', 'HP vibes', 11, 1, '15000', 1, '2018-10-31'),
(276, '0', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(277, '0', 'Acura Spray', 7, 1, '2', 1, '2018-10-31'),
(278, '0', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(279, 'BJn6O0Tv64LUu32EK4B3', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(280, 'BJn6O0Tv64LUu32EK4B3', 'Acura Spray', 7, 1, '3', 1, '2018-10-31'),
(281, 'BJn6O0Tv64LUu32EK4B3', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(282, 'BJn6O0Tv64LUu32EK4B3', 'Bodman Perfume', 5, 1, '1500', 1, '2018-10-31'),
(289, 'LTCrw0oykMUI22lr0ncu', 'HP vibes', 11, 1, '18750', 1, '2018-10-31'),
(290, 'LTCrw0oykMUI22lr0ncu', 'Shoe', 19, 2, '10000', 1, '2018-10-31'),
(291, 'xUp3yMiqI3MCzFXNFhag', 'Groundnut', 4, 2, '200', 1, '2018-10-31'),
(293, 'HzsCQ6Aycm64eBcMlvT2', 'Groundnut', 4, 1, '100', 1, '2018-10-31'),
(295, 'HzsCQ6Aycm64eBcMlvT2', 'cloth', 17, 2, '8888', 1, '2018-10-31'),
(296, '6y8Zh6XKvt7mbuL4kT3Q', 'Groundnut', 4, 2, '200', 1, '2018-11-01'),
(297, 'lPvobAFJTMC6TUbO07Sv', 'Groundnut', 4, 1, '1000', 1, '2018-11-01'),
(298, 'lPvobAFJTMC6TUbO07Sv', 'Bodman Perfume', 5, 4, '4', 1, '2018-11-01'),
(299, 'lPvobAFJTMC6TUbO07Sv', 'Wire', 15, 6, '7404', 1, '2018-11-01'),
(300, 'lPvobAFJTMC6TUbO07Sv', 'Sun glasses', 20, 4, '4', 1, '2018-11-01'),
(301, 'lPvobAFJTMC6TUbO07Sv', 'Shoe', 19, 3, '30000', 1, '2018-11-01'),
(305, 'LbellD1BUcbKdW9sEnKU', 'Groundnut', 4, 1, '1000', 1, '2018-11-06'),
(306, 'hvlT5tRmcDX6zi5vgmVP', 'Groundnut', 4, 1, '1000', 1, '2019-01-29'),
(307, 'hvlT5tRmcDX6zi5vgmVP', 'Bodman Perfume', 5, 4, '4', 1, '2019-01-29'),
(308, 'hvlT5tRmcDX6zi5vgmVP', 'HP vibes', 11, 1, '15', 1, '2019-01-29'),
(309, 'hvlT5tRmcDX6zi5vgmVP', 'HP vibes', 11, 1, '15', 1, '2019-01-29'),
(310, 'hvlT5tRmcDX6zi5vgmVP', 'HP vibes', 11, 1, '15', 1, '2019-01-29'),
(311, 'hvlT5tRmcDX6zi5vgmVP', 'Shoe', 19, 1, '10000', 1, '2019-01-29'),
(312, 'G1rrpg4N2ybPUyhOFxJq', 'Bodman Perfume', 5, 1, '1', 1, '2019-01-29'),
(313, 'G1rrpg4N2ybPUyhOFxJq', 'Bodman Perfume', 5, 1, '1', 1, '2019-01-29'),
(314, 'G1rrpg4N2ybPUyhOFxJq', 'Bodman Perfume', 5, 1, '1', 1, '2019-01-29'),
(315, 'G1rrpg4N2ybPUyhOFxJq', 'HP vibes', 11, 1, '15', 1, '2019-01-29'),
(316, 'G1rrpg4N2ybPUyhOFxJq', 'Groundnut', 4, 1, '1000', 1, '2019-01-29'),
(317, 'G1rrpg4N2ybPUyhOFxJq', 'Bodman Perfume', 5, 1, '1', 1, '2019-01-29'),
(318, 'G1rrpg4N2ybPUyhOFxJq', 'HP vibes', 11, 1, '15', 1, '2019-01-29'),
(319, 'G1rrpg4N2ybPUyhOFxJq', 'Shoe', 19, 1, '10000', 1, '2019-01-29'),
(320, 'yQ1RigL3q5gxClRIBgIB', 'Groundnut', 4, 6, '6000', 1, '2019-03-06'),
(321, 'yQ1RigL3q5gxClRIBgIB', 'Bodman Perfume', 5, 1, '1', 1, '2019-03-06'),
(322, 'yQ1RigL3q5gxClRIBgIB', 'Bisciut', 14, 1, '123454', 1, '2019-03-06'),
(323, 'yQ1RigL3q5gxClRIBgIB', 'Groundnut', 4, 1, '1000', 1, '2019-03-06'),
(324, 'yQ1RigL3q5gxClRIBgIB', 'Shoe', 19, 1, '10000', 1, '2019-03-06'),
(325, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(326, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(327, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(328, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(329, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(330, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(331, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(332, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(333, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(334, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(335, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(336, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(337, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(338, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(339, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(340, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(341, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(342, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(343, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(344, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(345, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(346, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(347, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(348, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(349, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(350, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(351, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(352, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(353, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(354, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(355, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(356, 'NbCXddii7G2qiyDOBNbK', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(357, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(358, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(359, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(360, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(361, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(362, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(363, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(364, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(365, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(366, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(367, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(368, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(369, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(370, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(371, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(372, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(373, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(374, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(375, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11'),
(376, 'IXL7vXiDAS1WhLTe9xuD', 'Groundnut', 4, 1, '1', 1, '2019-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(4) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `phone_number`, `password`, `email`, `role`, `date`) VALUES
(22, ' Samuel ', ' Bolaji ', '09083783990', '6f8f57715090da2632453988d9a1501b', 'dan@k.com', 2, '2018-10-25'),
(23, '    Ade     ', '    Dayo      ', '09083783990', '6f8f57715090da2632453988d9a1501b', 'ade@k.com', 1, '2018-10-25'),
(24, '     Olakunle     ', '     Titilayo     ', '09083783990', '6f8f57715090da2632453988d9a1501b', 'ori@k.com', 0, '2018-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `txn_made`
--

CREATE TABLE `txn_made` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `amount` decimal(30,2) NOT NULL,
  `mode` text NOT NULL,
  `txn_id` varchar(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `txn_made`
--

INSERT INTO `txn_made` (`id`, `name`, `phone`, `amount`, `mode`, `txn_id`, `date`) VALUES
(1, '', '', '100000.00', 'transfer', '36117857', '0000-00-00'),
(2, 'pmmmmm', '09096842230', '1000.00', 'transfer', '64055450', '0000-00-00'),
(3, 'Ojewunmi Olusola Peter', '', '1000.00', 'transfer', '2077359010', '0000-00-00'),
(4, 'Ojewunmi Olusola Peter', '08038606554', '1000.00', 'transfer', '103033906', '0000-00-00'),
(5, 'Buba/tunic', '07046573829', '2344.00', 'cash', '1596753826', '2018-10-23'),
(6, 'olumide daniel', '07046573829', '222.00', 'cash', '869822299', '2018-10-23'),
(7, 'fejiro', '07046573829', '546787.00', 'cash', '1434353016', '2018-10-23'),
(8, 'olumide daniel', '07046573829', '768.00', 'cash', '1939614502', '2018-10-23'),
(9, 'olumide daniel', '07046573829', '7998787.00', 'cash', '1436025408', '2018-10-23'),
(10, 'eewee', 'eee', '3.00', 'cash', '202704231', '2018-10-23'),
(11, 'olumide daniel', '07046573829', '2340.00', 'cash', '1906377944', '2018-10-24'),
(12, 'olumide daniel', '07046573829', '901110000000.00', 'transfer', '318302993', '2018-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `txn_recieved`
--

CREATE TABLE `txn_recieved` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` text NOT NULL,
  `amount` decimal(30,2) NOT NULL,
  `mode` text NOT NULL,
  `txn_id` varchar(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `txn_recieved`
--

INSERT INTO `txn_recieved` (`id`, `name`, `phone`, `amount`, `mode`, `txn_id`, `date`) VALUES
(1, 'Ojewunmi Olusola Peter', '', '1000.00', 'cash', '1709549132', '0000-00-00'),
(2, 'Ojewunmi Olusola Peter', '09096842230', '1000.00', 'cash', '481689107', '0000-00-00'),
(3, 'olumide daniel', '07046573829', '4444.00', 'cash', '375432434', '2018-10-23'),
(4, 'w', '4', '4.00', 'cash', '587755941', '2018-10-24'),
(5, 'Buba/tunic', '07046573829', '12222.00', 'pos', '406410292', '2018-10-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_refund`
--
ALTER TABLE `product_refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `txn_made`
--
ALTER TABLE `txn_made`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- Indexes for table `txn_recieved`
--
ALTER TABLE `txn_recieved`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_refund`
--
ALTER TABLE `product_refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `txn_made`
--
ALTER TABLE `txn_made`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `txn_recieved`
--
ALTER TABLE `txn_recieved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
