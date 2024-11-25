-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 02:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrift`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`) VALUES
(24, 6, 58),
(25, 6, 59),
(26, 6, 49),
(27, 2, 0),
(28, 2, 49),
(29, 2, 51),
(30, 2, 59),
(31, 2, 58),
(32, 2, 58),
(33, 2, 58),
(34, 2, 58),
(35, 2, 58),
(36, 2, 54),
(37, 2, 0),
(38, 2, 0),
(39, 2, 0),
(40, 2, 0),
(41, 3, 50),
(42, 3, 53),
(43, 3, 49),
(44, 2, 0),
(45, 2, 0),
(46, 2, 0),
(47, 2, 0),
(48, 2, 0),
(49, 2, 0),
(50, 2, 0),
(51, 2, 0),
(52, 2, 0),
(53, 2, 0),
(54, 2, 0),
(55, 2, 0),
(56, 2, 0),
(57, 2, 0),
(58, 2, 0),
(59, 2, 0),
(60, 2, 0),
(61, 2, 0),
(62, 2, 0),
(63, 2, 0),
(64, 2, 0),
(65, 2, 0),
(67, 2, 0),
(68, 2, 0),
(69, 2, 0),
(70, 2, 0),
(73, 2, 0),
(74, 2, 0),
(75, 2, 0),
(76, 6, 78),
(77, 6, 52),
(78, 6, 61),
(80, 2, 0),
(81, 2, 0),
(82, 2, 0),
(83, 2, 0),
(84, 2, 0),
(85, 2, 0),
(87, 2, 0),
(88, 2, 0),
(89, 2, 0),
(90, 2, 0),
(91, 2, 0),
(92, 2, 0),
(93, 2, 0),
(94, 2, 0),
(95, 2, 0),
(96, 2, 0),
(97, 2, 0),
(98, 2, 0),
(99, 2, 0),
(100, 2, 0),
(101, 2, 0),
(102, 2, 0),
(103, 2, 0),
(104, 5, 52),
(105, 2, 0),
(106, 2, 0),
(107, 2, 0),
(108, 2, 0),
(109, 2, 0),
(110, 2, 0),
(111, 2, 0),
(112, 2, 0),
(113, 2, 0),
(114, 2, 0),
(115, 2, 0),
(116, 2, 0),
(117, 2, 0),
(118, 2, 0),
(119, 2, 0),
(120, 2, 0),
(121, 2, 0),
(122, 2, 0),
(123, 2, 0),
(124, 2, 0),
(125, 2, 0),
(126, 22, 69),
(127, 2, 0),
(128, 2, 0),
(129, 2, 0),
(130, 2, 0),
(131, 2, 0),
(132, 2, 0),
(133, 2, 0),
(134, 28, 49),
(135, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`) VALUES
(1, 'one piece', 0, '1'),
(2, 'saree', 0, '1'),
(3, 'two piece', 0, '1'),
(4, 'Bags', 0, '1'),
(5, 'Accessories', 0, '1'),
(6, 'Footwears', 0, '1'),
(7, 'onepiece', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `date` date NOT NULL ,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `days`, `user_id`, `product_id`, `payment_id`, `shipping_id`, `qty`, `price`, `status`, `date`, `return_date`) VALUES
(28, 'buy', NULL, 1, 44, 25, 12, NULL, 471, NULL, '2023-02-11', NULL),
(32, 'buy', NULL, 6, 44, 26, 13, NULL, 471, NULL, '2023-02-12', NULL),
(35, 'rent', NULL, 5, 60, 27, 14, NULL, 271, NULL, '2023-03-08', NULL),
(36, 'rent', NULL, 6, 49, 28, 15, NULL, 554, NULL, '2023-03-10', NULL),
(37, 'rent', NULL, 6, 52, NULL, NULL, NULL, NULL, NULL, '2023-03-11', NULL),
(38, 'rent', NULL, 6, 52, 29, 16, NULL, 663, NULL, '2023-03-11', NULL),
(39, 'rent', NULL, 6, 51, NULL, NULL, NULL, NULL, NULL, '2023-03-11', NULL),
(40, 'rent', NULL, 6, 51, NULL, NULL, NULL, NULL, NULL, '2023-03-11', NULL),
(41, 'rent', NULL, 6, 50, 31, 18, NULL, 738, NULL, '2023-03-11', NULL),
(42, 'buy', NULL, 6, 51, NULL, NULL, NULL, NULL, NULL, '2023-03-11', NULL),
(44, 'rent', 0, 6, 49, 33, 20, NULL, 554, NULL, '2023-03-11', NULL),
(45, 'buy', NULL, 6, 58, 34, 21, NULL, 799, NULL, '2023-03-11', NULL),
(46, 'rent', 0, 3, 50, 35, 22, NULL, 738, NULL, '2023-03-13', NULL),
(47, 'buy', 0, 3, 58, 36, 23, NULL, 799, NULL, '2023-03-13', NULL),
(48, 'buy', NULL, 3, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-13', NULL),
(49, 'rent', 0, 4, 51, 37, 24, NULL, 27, NULL, '2023-03-15', NULL),
(50, 'rent', 0, 1, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-16', NULL),
(51, 'rent', 0, 6, 59, NULL, NULL, NULL, NULL, NULL, '2023-03-17', NULL),
(52, 'buy', 0, 13, 89, 38, 25, NULL, 420, NULL, '2023-03-17', NULL),
(53, 'rent', 0, 6, 86, NULL, NULL, NULL, NULL, NULL, '2023-03-17', NULL),
(54, 'buy', 0, 6, 57, NULL, NULL, NULL, NULL, NULL, '2023-03-17', NULL),
(55, 'buy', 0, 6, 57, NULL, NULL, NULL, NULL, NULL, '2023-03-17', NULL),
(56, 'rent', 0, 6, 57, NULL, NULL, NULL, NULL, NULL, '2023-03-17', NULL),
(57, 'buy', 0, 6, 86, 39, 26, NULL, 490, NULL, '2023-03-18', NULL),
(58, 'buy', 0, 6, 72, 40, 27, NULL, 450, NULL, '2023-03-18', NULL),
(59, 'buy', 0, 6, 82, 41, 28, NULL, 125, NULL, '2023-03-18', NULL),
(60, 'buy', 0, 6, 58, 42, 29, NULL, 799, NULL, '2023-03-18', NULL),
(61, 'buy', NULL, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-18', NULL),
(62, 'buy', 0, 6, 51, NULL, NULL, NULL, NULL, NULL, '2023-03-18', NULL),
(63, 'rent', 0, 6, 70, 43, 30, NULL, 350, NULL, '2023-03-18', NULL),
(64, 'rent', 0, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(65, 'rent', 0, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(66, 'rent', 0, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(67, 'rent', 0, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(68, 'buy', 0, 6, 67, 44, 31, NULL, 420, NULL, '2023-03-19', NULL),
(69, 'rent', 0, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(70, 'buy', 0, 6, 61, 45, 32, NULL, 350, NULL, '2023-03-19', NULL),
(71, 'rent', 0, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(72, 'buy', 0, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(73, 'buy', 0, 6, 80, 46, 33, NULL, 150, NULL, '2023-03-19', NULL),
(74, 'buy', 0, 6, 84, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(75, 'buy', 0, 6, 71, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(76, 'rent', 0, 6, 71, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(77, 'buy', 0, 6, 89, 47, 34, NULL, 420, NULL, '2023-03-19', NULL),
(78, 'rent', 0, 6, 89, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(79, 'buy', 0, 6, 49, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(80, 'buy', 0, 6, 73, 48, 35, NULL, 700, NULL, '2023-03-19', NULL),
(81, 'rent', 0, 6, 72, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(82, 'buy', 0, 6, 68, 49, 36, NULL, 420, NULL, '2023-03-19', NULL),
(83, 'rent', 0, 6, 68, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(84, 'rent', 0, 6, 79, 50, 37, NULL, 207, NULL, '2023-03-19', NULL),
(85, 'buy', NULL, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(86, 'buy', 0, 6, 81, 51, 38, NULL, 125, NULL, '2023-03-19', NULL),
(87, 'rent', 0, 6, 81, NULL, NULL, NULL, NULL, NULL, '2023-03-19', NULL),
(88, 'rent', 0, 6, 82, 52, 39, NULL, 113, NULL, '2023-03-19', NULL),
(89, 'buy', 0, 6, 72, 53, 40, NULL, 450, NULL, '2023-04-15', NULL),
(90, 'rent', 0, 6, 87, 60, 47, NULL, 315, NULL, '2023-04-15', NULL),
(91, 'buy', 0, 6, 86, 61, 48, NULL, 490, NULL, '2023-04-15', NULL),
(92, 'rent', 0, 6, 51, 62, 49, NULL, 27, NULL, '2023-04-15', NULL),
(93, 'rent', 0, 6, 51, 63, 50, NULL, 27, NULL, '2023-04-15', NULL),
(96, 'rent', 0, 6, 88, 69, 56, NULL, 324, NULL, '2023-04-15', NULL),
(97, 'buy', NULL, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-04-15', NULL),
(98, 'buy', NULL, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-04-15', NULL),
(99, 'buy', NULL, 6, 61, NULL, NULL, NULL, NULL, NULL, '2023-04-15', NULL),
(100, 'rent', 0, 6, 87, 70, 57, NULL, 315, NULL, '2023-04-15', NULL),
(102, 'rent', 3, 6, 51, 72, 59, NULL, 27, NULL, '2023-04-11', NULL),
(103, 'rent', 1, 13, 90, 73, 60, NULL, 315, NULL, '2023-04-15', NULL),
(104, 'rent', 2, 13, 89, 74, 61, NULL, 378, NULL, '2023-04-15', NULL),
(105, 'rent', NULL, 13, 72, NULL, NULL, NULL, NULL, NULL, '2023-04-15', NULL),
(106, 'buy', 0, 6, 61, 75, 62, NULL, 350, NULL, '2023-04-16', NULL),
(107, 'rent', NULL, 6, 82, NULL, NULL, NULL, NULL, NULL, '2023-04-16', NULL),
(108, 'buy', 0, 13, 65, 76, 63, NULL, 420, NULL, '2023-04-24', NULL),
(109, 'buy', 0, 6, 73, 77, 64, NULL, 700, NULL, '2023-05-06', NULL),
(110, 'buy', 0, 6, 59, 78, 65, NULL, 339, NULL, '2023-05-06', NULL),
(111, 'buy', 0, 6, 54, 79, 66, NULL, 981, NULL, '2023-05-06', NULL),
(112, 'buy', 0, 6, 61, 80, 67, NULL, 350, NULL, '2023-05-06', NULL),
(113, 'rent', 3, 6, 79, NULL, NULL, NULL, NULL, NULL, '2023-05-01', NULL),
(114, 'rent', 2, 17, 85, 81, 68, NULL, 414, NULL, '2023-06-19', NULL),
(115, 'rent', NULL, 18, 52, NULL, NULL, NULL, NULL, NULL, '2023-06-28', NULL),
(116, 'rent', NULL, 20, 52, NULL, NULL, NULL, NULL, NULL, '2023-06-28', NULL),
(117, 'buy', NULL, 20, 52, NULL, NULL, NULL, NULL, NULL, '2023-06-28', NULL),
(118, 'buy', NULL, 1, 79, NULL, NULL, NULL, NULL, NULL, '2023-06-28', NULL),
(119, 'buy', NULL, 21, 74, NULL, NULL, NULL, NULL, NULL, '2024-01-06', NULL),
(120, 'buy', 0, 21, 74, 82, 69, NULL, 2000, NULL, '2024-01-06', NULL),
(121, 'buy', NULL, 22, 52, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(122, 'buy', NULL, 22, 69, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(123, 'rent', NULL, 22, 69, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(124, 'buy', NULL, 22, 69, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(125, 'buy', NULL, 23, 51, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(126, 'buy', NULL, 23, 70, NULL, NULL, NULL, NULL, NULL, '2024-01-07', NULL),
(127, 'buy', 0, 26, 75, 83, 70, NULL, 500, NULL, '2024-01-07', NULL),
(128, 'buy', 0, 27, 70, 84, 71, NULL, 388, NULL, '2024-01-07', NULL),
(129, 'buy', 0, 28, 51, 85, 72, NULL, 29, NULL, '2024-09-23', NULL),
(130, 'rent', 1, 28, 52, 86, 73, NULL, 663, NULL, '2024-09-23', NULL),
(131, 'buy', NULL, 28, 69, NULL, NULL, NULL, NULL, NULL, '2024-09-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `type`, `price`, `shipping_id`, `status`, `date`) VALUES
(1, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(2, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(3, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(4, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(5, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(6, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(7, 1, 'cash', NULL, 0, NULL, '2023-02-03 17:07:51'),
(8, 1, 'cash', 189, 0, NULL, '2023-02-03 17:07:51'),
(9, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(10, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(11, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(12, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(13, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(14, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(15, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(16, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(17, 1, 'cash', 189, NULL, NULL, '2023-02-03 17:07:51'),
(18, 1, 'cash', 189, NULL, NULL, '2023-02-07 15:42:12'),
(19, 1, 'cash', 189, NULL, NULL, '2023-02-07 15:42:55'),
(20, 1, 'cash', 189, NULL, NULL, '2023-02-07 16:13:27'),
(21, 1, 'cash', 189, NULL, NULL, '2023-02-07 16:14:07'),
(22, 1, 'cash', 189, NULL, NULL, '2023-02-07 16:40:00'),
(23, 1, 'cash', 189, NULL, NULL, '2023-02-07 16:40:56'),
(24, 1, 'khalti', 471, NULL, NULL, '2023-02-11 08:10:30'),
(25, 1, 'cash', 471, NULL, NULL, '2023-02-11 10:18:57'),
(26, 6, 'khalti', 471, NULL, NULL, '2023-02-12 10:11:03'),
(27, 5, 'cash', 271, NULL, NULL, '2023-03-08 15:25:31'),
(28, 6, 'cash', 554, NULL, NULL, '2023-03-10 17:01:07'),
(29, 6, 'cash', 663, NULL, NULL, '2023-03-11 09:17:03'),
(30, 6, 'cash', 738, NULL, NULL, '2023-03-11 10:06:59'),
(31, 6, 'cash', 738, NULL, NULL, '2023-03-11 10:08:50'),
(32, 6, 'cash', 554, NULL, NULL, '2023-03-11 15:58:36'),
(33, 6, 'cash', 554, NULL, NULL, '2023-03-11 16:01:13'),
(34, 6, 'cash', 799, NULL, NULL, '2023-03-11 16:03:47'),
(35, 3, 'cash', 738, NULL, NULL, '2023-03-13 11:08:09'),
(36, 3, 'cash', 799, NULL, NULL, '2023-03-13 11:08:52'),
(37, 4, 'cash', 27, NULL, NULL, '2023-03-15 15:04:31'),
(38, 13, 'cash', 420, NULL, NULL, '2023-03-17 05:00:56'),
(39, 6, 'cash', 490, NULL, NULL, '2023-03-18 08:18:03'),
(40, 6, 'cash', 450, NULL, NULL, '2023-03-18 08:22:05'),
(41, 6, 'cash', 125, NULL, NULL, '2023-03-18 08:22:37'),
(42, 6, 'cash', 799, NULL, NULL, '2023-03-18 08:38:09'),
(43, 6, 'cash', 350, NULL, NULL, '2023-03-18 11:34:19'),
(44, 6, 'khalti', 420, NULL, NULL, '2023-03-19 03:55:08'),
(45, 6, 'khalti', 350, NULL, NULL, '2023-03-19 04:02:31'),
(46, 6, 'khalti', 150, NULL, NULL, '2023-03-19 04:10:35'),
(47, 6, 'khalti', 420, NULL, NULL, '2023-03-19 04:23:57'),
(48, 6, 'khalti', 700, NULL, NULL, '2023-03-19 04:38:14'),
(49, 6, 'khalti', 420, NULL, NULL, '2023-03-19 04:47:11'),
(50, 6, 'khalti', 207, NULL, NULL, '2023-03-19 04:54:30'),
(51, 6, 'khalti', 125, NULL, NULL, '2023-03-19 04:58:26'),
(52, 6, 'cash', 113, NULL, NULL, '2023-03-19 05:00:37'),
(53, 6, 'cash', 450, NULL, NULL, '2023-04-15 06:44:42'),
(54, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:56:49'),
(55, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:57:20'),
(56, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:57:59'),
(57, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:58:33'),
(58, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:58:48'),
(59, 6, 'cash', 315, NULL, NULL, '2023-04-15 06:59:06'),
(60, 6, 'cash', 315, NULL, NULL, '2023-04-15 07:00:15'),
(61, 6, 'cash', 490, NULL, NULL, '2023-04-15 07:00:42'),
(62, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:01:02'),
(63, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:01:23'),
(64, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:06:25'),
(65, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:07:18'),
(66, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:11:32'),
(67, 6, 'cash', 27, NULL, NULL, '2023-04-15 07:11:44'),
(68, 6, 'cash', 378, NULL, NULL, '2023-04-15 07:12:37'),
(69, 6, 'cash', 324, NULL, NULL, '2023-04-15 07:51:14'),
(70, 6, 'cash', 315, NULL, NULL, '2023-04-15 09:27:26'),
(71, 6, 'cash', 441, NULL, NULL, '2023-04-15 09:38:46'),
(72, 6, 'cash', 27, NULL, NULL, '2023-04-15 09:39:48'),
(73, 13, 'cash', 315, NULL, NULL, '2023-04-15 11:03:30'),
(74, 13, 'cash', 378, NULL, NULL, '2023-04-15 11:03:50'),
(75, 6, 'cash', 350, NULL, NULL, '2023-04-16 02:21:36'),
(76, 13, 'khalti', 420, NULL, NULL, '2023-04-24 02:38:19'),
(77, 6, 'cash', 700, NULL, NULL, '2023-05-06 08:44:02'),
(78, 6, 'cash', 339, NULL, NULL, '2023-05-06 08:47:11'),
(79, 6, 'cash', 981, NULL, NULL, '2023-05-06 08:56:59'),
(80, 6, 'cash', 350, NULL, NULL, '2023-05-06 08:57:47'),
(81, 17, 'cash', 414, NULL, NULL, '2023-06-13 01:11:10'),
(82, 21, 'cash', 2000, NULL, NULL, '2024-01-06 15:23:15'),
(83, 26, 'khalti', 500, NULL, NULL, '2024-01-07 06:01:02'),
(84, 27, 'cash', 388, NULL, NULL, '2024-01-07 06:06:31'),
(85, 28, 'cash', 29, NULL, NULL, '2024-09-23 02:50:26'),
(86, 28, 'cash', 663, NULL, NULL, '2024-09-23 02:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rating` float NOT NULL,
  `date` timestamp NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `size`, `color`, `gender`, `age`, `price`, `tags`, `details`, `image`, `status`, `rating`, `date`) VALUES
(49, 1, 1, 'Hashim Mcguire', 'xs', 'Voluptate culpa expe', NULL, 'teen', 615, 'one piece latest beautiful', 'Qui qui minim magnam', '176012-girl-dress-png-image-high-quality.png', 1, 0, '2023-03-08 12:04:36'),
(50, 1, 3, 'Solomon Galloway', 'xl', 'Qui fugiat mollit of', NULL, 'kid', 819, 'two piece latest beautiful', 'Temporibus in ab mol', '33278-9-striped-dress-photos.png', 1, 0, '2023-03-08 12:44:00'),
(51, 1, 1, 'Wyatt Petty', 'xs', 'Inventore consequatu', NULL, 'kid', 29, 'one piece latest beautiful', 'Quod placeat explic', '33159-9-floral-dress-hd.png', 0, 2.5, '2023-03-08 12:55:11'),
(52, 1, 1, 'Athena Sparks', 'md', 'Animi rem tempore ', NULL, 'aged', 736, 'one piece latest beautiful', 'Atque odio aliqua U', '31444-3-dress-hd.png', 0, 0, '2023-03-08 13:09:22'),
(53, 1, 1, 'Vivian Tanner', 'sm', 'Non autem nihil inci', NULL, 'teen', 773, 'one piece latest beautiful', 'Quaerat qui ad susci', '31400-4-dress-transparent.png', 1, 2.5, '2023-03-08 13:09:38'),
(54, 1, 3, 'Rae Hicks', 'lg', 'Qui ex aliquid eveni', NULL, 'teen', 981, 'two piece latest beautiful', 'Lorem officia qui it', '33230-4-floral-dress-image.png', 0, 0, '2023-03-08 13:09:58'),
(55, 1, 1, 'Sydnee Johnson', 'xs', 'In eiusmod autem qui', NULL, 'aged', 492, 'one piece latest beautiful', 'Dolore qui aut alias', '33186-1-floral-dress-transparent-picture.png', 1, 0, '2023-03-08 13:10:07'),
(56, 5, 2, 'Flower print saree', 'xxl', 'Pink', NULL, 'kid', 350, 'saree latest beautiful', '', 'saree1.jpg', 1, 0, '2023-03-08 15:06:20'),
(57, 5, 1, 'Allen Mendoza', 'xxl', 'Placeat atque sit ', NULL, 'adult', 645, 'one piece latest beautiful', 'Esse vero ad volupt', 'SeekPng.com_silk-png_985472.png', 1, 0, '2023-03-08 15:06:34'),
(58, 5, 2, 'Hex dots saree', 'lg', 'Black red', NULL, 'teen', 799, 'saree latest beautiful', '', 'pexels-vivek-baghel-1999895.jpg', 1, 0, '2023-03-08 15:06:50'),
(59, 5, 2, 'Jarjat saree', 'lg', 'Blue', NULL, 'aged', 339, 'saree latest beautiful', '', 'pexels-alena-darmel-7176441.jpg', 0, 0, '2023-03-08 15:07:05'),
(60, 5, 2, 'Printed saree', 'xl', 'Red Maroon', NULL, 'kid', 301, 'saree latest beautiful', '', 'pexels-atul-choudhary-5439054.jpg', 1, 0, '2023-03-08 15:07:20'),
(61, 1, 2, 'Floral print saree', 'md', 'Blue', NULL, 'adult', 350, 'saree floral white blue', 'Blue Floral printed saree', 'saree2.jpg', 0, 0, '2023-03-16 16:02:11'),
(62, 1, 2, 'Chiffon saree', 'md', 'Black ', NULL, 'adult', 450, 'black red saree floral', 'Printed saree', 'saree3.jpg', 1, 0, '2023-03-16 16:03:12'),
(63, 1, 2, 'Chiffon saree', 'lg', 'purple', NULL, 'adult', 370, 'saree purple', 'Printed saree', 'saree4.jpg', 1, 0, '2023-03-16 16:05:31'),
(64, 1, 2, 'Floral print saree', 'xl', 'Pink', NULL, 'adult', 390, 'saree pink ', 'Saree', 'saree5.jpg', 1, 0, '2023-03-16 16:07:52'),
(65, 1, 2, 'Jarjat saree', 'lg', 'Pink', NULL, 'adult', 420, 'saree pink', 'Saree', 'saree6.jpg', 0, 0, '2023-03-16 16:08:51'),
(66, 1, 2, 'Chiffon saree', 'lg', 'Yellow', NULL, 'adult', 350, 'saree', 'Saree', 'saree7.jpg', 1, 0, '2023-03-16 16:09:36'),
(67, 1, 2, 'Jarjet saree', 'lg', 'Green', NULL, 'adult', 420, 'saree green', 'Green saree', 'saree8.jpg', 1, 0, '2023-03-16 16:10:28'),
(68, 1, 2, 'Silk saree', 'md', 'Dark blue', NULL, 'adult', 420, 'saree dark blue', 'Saree', 'saree10.jpg', 1, 0, '2023-03-16 16:11:21'),
(69, 1, 4, 'Bagpack', 'lg', 'Maroon', NULL, 'teen', 550, 'bag bags maroon school', 'Big bag', 'bag1.jpg', 1, 3, '2023-03-16 16:13:05'),
(70, 1, 4, 'Samuel Bags', 'xxl', 'blue', NULL, 'adult', 388, 'blue bags bag', 'Voluptate eum liberosdf', 'bag2.jpg', 0, 1.66667, '2023-03-16 16:15:49'),
(71, 1, 4, 'Small portable bag', 'md', 'Yellow', NULL, 'teen', 250, 'bag bags yellow', 'Yellow Bag', 'bag3.jpg', 1, 3, '2023-03-16 16:30:08'),
(72, 1, 4, 'Small turtle bag', 'sm', 'Pink Blue White Black', NULL, 'teen', 450, 'bag bags beautiful', 'Small portable bags for teen girls!', 'bag4.jpg', 1, 0, '2023-03-16 16:36:45'),
(73, 1, 4, 'College bags', 'md', 'Grey', NULL, 'adult', 700, 'bag bags comfy', 'A comfortable and fluffy bag for students', 'bag5.jpg', 0, 0, '2023-03-16 16:38:41'),
(74, 1, 4, 'Party Bags', 'sm', 'Grey', NULL, 'adult', 2000, 'bag bags party stylish', 'Stylish and party bags for women.', 'bag6.jpg', 0, 0, '2023-03-16 16:40:30'),
(75, 1, 4, 'School Bags', 'sm', 'Orange', NULL, '', 500, 'bag bags school kids', 'School bags for kids', 'bag7.jpg', 0, 0, '2023-03-16 16:42:39'),
(76, 1, 4, 'Side Bag', 'xs', 'Pink', NULL, 'teen', 250, 'bag bags pink', 'Small portable bag', 'bag8.jpg', 1, 0, '2023-03-16 17:10:43'),
(77, 1, 4, 'Tote bag', 'lg', 'Yellow', NULL, 'adult', 250, 'bag bags yellow ', 'Tote bag that can fit your stationaries', 'bag9.jpg', 1, 0, '2023-03-16 17:11:51'),
(78, 1, 4, 'Cross bag', 'lg', 'Black', NULL, 'adult', 120, 'bag  bags black', 'Side bag', 'bag10.jpg', 1, 0, '2023-03-16 17:12:36'),
(79, 1, 5, 'Rectangle stone necklace', 'md', 'Gold plated', NULL, '', 230, 'necklace jewellery accessory gold', '1 layer necklace', 'jewel1.jpg', 1, 0, '2023-03-16 17:16:51'),
(80, 1, 5, 'Perl necklace', 'md', 'Pearl', NULL, 'adult', 150, 'pearl necklace', 'Pearl necklace', 'jewel2.jpg', 1, 0, '2023-03-16 17:19:45'),
(81, 1, 5, 'Butterfly necklace', 'md', 'Gold', NULL, 'adult', 125, 'necklace butterfly chain', 'Two joined Butterfly necklace', 'jewel3.jpg', 1, 0, '2023-03-16 17:21:30'),
(82, 1, 5, 'Chain earrings', 'lg', 'Gold', NULL, 'adult', 125, 'earpiece accessories earring', 'Long chain earpiece', 'jewel4.jpg', 1, 0, '2023-03-16 17:22:38'),
(84, 1, 6, 'Sports shoes', 'md', 'White', NULL, 'adult', 450, 'shoes footwears sports white', 'Comfortable white sports shoes', 'shoe1.jpg', 1, 0, '2023-03-16 17:47:23'),
(85, 1, 6, 'Comfy shoes', 'sm', 'Black and White', NULL, 'teen', 460, 'shoe shoes sports comfortable', 'Comfortable shoes', 'shoe2.jpg', 0, 0, '2023-03-16 17:48:39'),
(86, 1, 6, 'Black heels', 'sm', 'Black', NULL, 'adult', 490, 'heels shoes', 'Block heels', 'shoe3.jpg', 0, 0, '2023-03-16 17:49:30'),
(87, 1, 6, 'Sandals', 'lg', 'White', NULL, 'aged', 350, 'sandals shoes', 'White sandals', 'shoe4.jpg', 1, 0, '2023-03-16 17:50:11'),
(88, 1, 6, 'Lace sandals', 'md', 'Brown', NULL, 'adult', 360, 'shoes heel sandal', 'Brown sandals', 'shoe5.jpg', 1, 0, '2023-03-16 17:51:18'),
(89, 1, 6, 'Sportz shoe', 'sm', 'White', NULL, 'adult', 420, 'shoes ', 'Plain white shoes', 'shoe6.jpg', 0, 0, '2023-03-16 17:52:18'),
(90, 5, 3, 'Hoodie', 'sm', 'Black', NULL, 'teen', 350, 'hoodie two piece ', 'warm hoodie', 'hood.jpg', 0, 0, '2023-03-19 04:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL ,
  `status` int(11) DEFAULT NULL,
  `comment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comments`, `user_id`, `product_id`, `date`, `status`, `comment_type`) VALUES
(326, 'wow nice dress', 6, 71, '2023-05-06 11:03:15', NULL, ''),
(327, 'bad dress', 6, 71, '2023-05-06 11:03:27', NULL, ''),
(328, 'bad quality', 21, 51, '2024-01-06 15:51:13', NULL, 'neutral'),
(329, 'Comfortable one', 21, 51, '2024-01-06 15:51:21', NULL, 'positive'),
(330, 'bad quality', 21, 49, '2024-01-06 16:12:01', NULL, 'neutral'),
(331, 'very good', 22, 69, '2024-01-07 03:04:18', NULL, 'positive'),
(332, 'good quality', 22, 69, '2024-01-07 03:04:37', NULL, 'positive'),
(333, 'i like it', 22, 69, '2024-01-07 03:04:42', NULL, 'neutral'),
(334, 'i love it', 22, 69, '2024-01-07 03:05:14', NULL, 'neutral'),
(335, 'not good not bad', 22, 69, '2024-01-07 03:05:49', NULL, 'neutral'),
(336, 'nice dress', 23, 51, '2024-01-07 03:11:55', NULL, 'positive'),
(337, 'Very Good', 26, 70, '2024-01-07 06:02:37', NULL, 'positive'),
(338, 'bad quality', 26, 70, '2024-01-07 06:03:27', NULL, 'neutral'),
(339, 'nice dress', 28, 53, '2024-09-23 02:52:50', NULL, 'positive'),
(340, 'Comfortable one', 28, 53, '2024-09-23 02:52:57', NULL, 'positive'),
(341, 'bad quality', 28, 53, '2024-09-23 02:53:09', NULL, 'neutral'),
(342, 'i dont like this product.', 28, 53, '2024-09-23 02:53:13', NULL, 'neutral');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `address`, `state`, `province`, `status`) VALUES
(1, 'Quas dolores commodo', NULL, NULL, NULL),
(2, 'Quas dolores commodo', NULL, NULL, NULL),
(3, 'Quas dolores commodo', NULL, NULL, NULL),
(4, 'Quas dolores commodo', NULL, NULL, NULL),
(5, 'Quas dolores commodo', NULL, NULL, NULL),
(6, 'Quas dolores commodo', NULL, NULL, NULL),
(7, 'Quas dolores commodo', NULL, NULL, NULL),
(8, 'Quas dolores commodo', NULL, NULL, NULL),
(9, 'Quas dolores commodo', NULL, NULL, NULL),
(10, 'Quas dolores commodo', NULL, NULL, NULL),
(11, 'Quas dolores commodo', NULL, NULL, NULL),
(12, 'Quas dolores commodo', NULL, NULL, NULL),
(13, 'Ex labore quas beata', NULL, NULL, NULL),
(14, 'Eius et incidunt eo', NULL, NULL, NULL),
(15, 'Ex labore quas beata', NULL, NULL, NULL),
(16, 'Ex labore quas beata', NULL, NULL, NULL),
(17, 'Ex labore quas beata', NULL, NULL, NULL),
(18, 'Ex labore quas beata', NULL, NULL, NULL),
(19, 'Ex labore quas beata', NULL, NULL, NULL),
(20, 'Ex labore quas beata', NULL, NULL, NULL),
(21, 'Ex labore quas beata', NULL, NULL, NULL),
(22, 'Nobis ut qui incidun', NULL, NULL, NULL),
(23, 'Nobis ut qui incidun', NULL, NULL, NULL),
(24, 'Minus consequuntur f', NULL, NULL, NULL),
(25, 'bafal', NULL, NULL, NULL),
(26, 'Ex labore quas beata', NULL, NULL, NULL),
(27, 'Ex labore quas beata', NULL, NULL, NULL),
(28, 'Ex labore quas beata', NULL, NULL, NULL),
(29, 'Ex labore quas beata', NULL, NULL, NULL),
(30, 'Ex labore quas beata', NULL, NULL, NULL),
(31, 'Ex labore quas beata', NULL, NULL, NULL),
(32, 'Ex labore quas beata', NULL, NULL, NULL),
(33, 'Ex labore quas beata', NULL, NULL, NULL),
(34, 'Ex labore quas beata', NULL, NULL, NULL),
(35, 'Ex labore quas beata', NULL, NULL, NULL),
(36, 'Ex labore quas beata', NULL, NULL, NULL),
(37, 'Ex labore quas beata', NULL, NULL, NULL),
(38, 'Ex labore quas beata', NULL, NULL, NULL),
(39, 'Ex labore quas beata', NULL, NULL, NULL),
(40, 'Ex labore quas beata', NULL, NULL, NULL),
(41, 'Ex labore quas beata', NULL, NULL, NULL),
(42, 'Ex labore quas beata', NULL, NULL, NULL),
(43, 'Ex labore quas beata', NULL, NULL, NULL),
(44, 'Ex labore quas beata', NULL, NULL, NULL),
(45, 'Ex labore quas beata', NULL, NULL, NULL),
(46, 'Ex labore quas beata', NULL, NULL, NULL),
(47, 'Ex labore quas beata', NULL, NULL, NULL),
(48, 'Ex labore quas beata', NULL, NULL, NULL),
(49, 'Ex labore quas beata', NULL, NULL, NULL),
(50, 'Ex labore quas beata', NULL, NULL, NULL),
(51, 'Ex labore quas beata', NULL, NULL, NULL),
(52, 'Ex labore quas beata', NULL, NULL, NULL),
(53, 'Ex labore quas beata', NULL, NULL, NULL),
(54, 'Ex labore quas beata', NULL, NULL, NULL),
(55, 'Ex labore quas beata', NULL, NULL, NULL),
(56, 'Ex labore quas beata', NULL, NULL, NULL),
(57, 'Ex labore quas beata', NULL, NULL, NULL),
(58, 'Ex labore quas beata', NULL, NULL, NULL),
(59, 'Ex labore quas beata', NULL, NULL, NULL),
(60, 'bafal', NULL, NULL, NULL),
(61, 'bafal', NULL, NULL, NULL),
(62, 'Ex labore quas beata', NULL, NULL, NULL),
(63, 'bafal', NULL, NULL, NULL),
(64, 'Ex labore quas beata', NULL, NULL, NULL),
(65, 'Ex labore quas beata', NULL, NULL, NULL),
(66, 'Ex labore quas beata', NULL, NULL, NULL),
(67, 'Ex labore quas beata', NULL, NULL, NULL),
(68, 'Kathmandu', NULL, NULL, NULL),
(69, 'Ktm', NULL, NULL, NULL),
(70, 'Gongabu', NULL, NULL, NULL),
(71, 'tokha', NULL, NULL, NULL),
(72, 'kathmandu', NULL, NULL, NULL),
(73, 'kathmandu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `verified_user` tinyint(1) DEFAULT NULL,
  `reg_date` timestamp NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `address`, `phone`, `gender`, `email`, `avatar`, `password`, `verified_user`, `reg_date`) VALUES
(1, 'Expedita Nam qui arc', 'admin', 'Quas dolores commodo', '+1 (257) 433-', 'O', 'abc@abc.com', '', 'pass', 0, '2023-01-28 07:07:02'),
(2, 'Excepturi ut sunt do', '0', 'Optio vitae aute fu', '+1 (984) 543-', 'M', 'pylajuxy@mailinator.com', 'pexels-karolina-grabowska-5993388.jpg', 'Pa$$w0rd!', 0, '0000-00-00 00:00:00'),
(3, 'Velit officiis in il', '0', 'Nobis ut qui incidun', '+1 (869) 141-', 'M', 'jybory@mailinator.com', 'profile.jpg', 'Pa$$w0rd!', 0, '0000-00-00 00:00:00'),
(4, 'Nostrud minus fugit', '0', 'Minus consequuntur f', '+1 (526) 229-', 'F', 'rytovu@mailinator.com', '', 'Pa$$w0rd!', 0, '0000-00-00 00:00:00'),
(5, 'Proident ipsum ass', 'seller', 'Eius et incidunt eo', '+1 (979) 628-', 'F', 'seller@abc.com', '', 'pass', 0, '0000-00-00 00:00:00'),
(6, 'rameshs thapa', '0', 'Ex labore quas beata', '+1 (607) 295-', 'F', 'buyer@abc.com', 'profile.jpg', 'pass', 0, '0000-00-00 00:00:00'),
(7, 'Voluptatibus nulla m', '0', 'Excepturi et quibusd', '+1 (261) 319-', 'O', 'pikuguky@mailinator.com', '', 'Pa$$w0rd!', 0, '0000-00-00 00:00:00'),
(8, 'Sed unde eos elit ', '0', 'Eveniet sunt duis c', '1234567890', 'M', 'nubawaf@mailinator.com', 'Pa$$w0rd!', '0', 0, '0000-00-00 00:00:00'),
(10, 'Repellendus Volupta', 'seller', 'Aut omnis ut ea volu', '1234567890', 'M', 'giqejohew@mailinator.com', 'Pa$$w0rd!', '0', 0, '2023-03-16 22:37:28'),
(11, 'KKINg', 'seller', 'KKing', '9876542315', 'F', 'kking@kking.com', '12345', '0', 0, '2023-03-16 22:40:43'),
(12, 'Abra Kadabra', 'seller', 'Abra', '1234567890', 'F', 'abra@abra.com', '', 'abra', 0, '2023-03-16 23:02:27'),
(14, 'eee', 'vendor', 'eee', '', '', 'buyer@com', '', 'pass', 0, '2023-05-06 03:56:46'),
(15, 'rtytytry', 'seller', 'ffff', '', 'M', 'nksdbfgdf', '', 'pass', 0, '2023-05-06 04:00:49'),
(16, 'dcgeg', 'vendor', 'ddd', '', 'F', 'gffgfghgfsdfsdf@abc.com', '', 'pass', 0, '2023-05-06 04:02:48'),
(17, 'Manish Maharjan', '0', 'Kathmandu', '', 'M', 'maharjanm96@gmail.com', '', 'manish123', 0, '2023-06-12 21:25:11'),
(18, 'rama gurung', '0', 'tokha', '9860469211', 'F', 'Rama@gmail.com', '', 'pass', 0, '2023-06-27 22:18:55'),
(19, 'rama gurung', '0', 'tokha', '9860469211', 'F', 'Rama@gmail.com', '', 'pass', 0, '2023-06-27 22:44:53'),
(20, 'sita', '0', 'tokha', '9860469211', 'F', 'sita@gmail.com', '', 'pass', 0, '2023-06-27 22:46:05'),
(21, 'ayush bhandari', '0', 'Ktm', '', 'M', 'ayush@email.com', '', 'user', 0, '2024-01-06 10:32:31'),
(22, 'rita', '0', 'Ktm', '', 'F', 'rita@gmail.com', '', 'user', 0, '2024-01-06 22:14:57'),
(23, 'shyam', 'seller', 'Ktm', '', 'F', 'shyam@gmail.com', '', 'seller', 0, '2024-01-06 22:24:29'),
(24, 'sita', '0', 'Khusibu', '', 'F', 'sita@gmail.com', '', 'user', 0, '2024-01-07 01:10:29'),
(25, 'shyam', '0', 'dhapasi', '', 'F', 'shyam@gmail.com', '', 'user', 0, '2024-01-07 01:11:46'),
(26, 'dip', '0', 'Gongabu', '9843466363', 'M', 'dip@gmail.com', '', 'user', 0, '2024-01-07 01:13:02'),
(27, 'sangita', '0', 'tokha', '', 'F', 'sangita@gmail.com', '', 'user', 0, '2024-01-07 01:19:48'),
(28, 'Reshma Pokhrel', '0', 'kathmandu', '9862491120', 'F', '9862491120', '', 'reshma@2246', 0, '2024-09-22 23:03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
