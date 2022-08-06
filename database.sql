-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 12:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopkeeper_delivery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`, `image`) VALUES
(4, 'Salman', 'tcomprog@gmail.com', '02039482002', '/3q0Hg==', 'Admin_02039482002_basit_.jpeg'),
(5, 'Testing', 'tss@gmail.com', '098324908', '/3q0Hg==', 'Admin_098324908_tss_.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `shopkeeper_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `wholeId` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `shopkeeper_id`, `item_id`, `qty`, `price`, `status`, `wholeId`, `order_id`, `delivery_status`) VALUES
(14, 1, 13, 1, 200, 0, 2, 0, 0),
(16, 2, 6, 1, 30000, 1, 2, 3, 0),
(17, 2, 14, 1, 40, 1, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `admin` int(11) DEFAULT 0,
  `chatroom_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 when message by admin',
  `admin_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `admin`, `chatroom_id`, `date`, `status`, `admin_status`) VALUES
(42, 'Hello', 0, 10, '2021-02-10 22:09:44', 1, 1),
(43, 'Hello', 1, 10, '2021-02-10 22:10:13', 1, 1),
(44, 'How are you', 0, 10, '2021-02-10 22:10:20', 1, 1),
(45, 'Fine What about you', 1, 10, '2021-02-10 22:10:33', 1, 1),
(46, 'I am gread', 0, 10, '2021-02-10 22:10:42', 1, 1),
(47, 'Hello', 0, 10, '2021-02-27 06:39:00', 1, 1),
(48, 'How are you?', 0, 10, '2021-02-27 06:39:30', 1, 1),
(49, 'Hello', 0, 11, '2021-04-28 18:53:59', 1, 1),
(50, 'Hello', 1, 11, '2021-04-28 18:54:51', 1, 1),
(51, 'I have probelem', 0, 11, '2021-04-28 18:55:35', 1, 1),
(52, 'Hi', 0, 12, '2021-04-28 18:57:20', 1, 1),
(53, 'Hello', 1, 12, '2021-04-28 18:58:37', 1, 1),
(54, 'Welcome', 0, 12, '2021-04-28 18:58:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'shopkeeper or wholesale id',
  `status` int(11) DEFAULT NULL,
  `notif` int(11) NOT NULL DEFAULT 0,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`id`, `user_id`, `status`, `notif`, `user_role`) VALUES
(10, 1, 1, 1, 'shopkeeper'),
(11, 2, 1, 1, 'shopkeeper'),
(12, 3, 0, 0, 'wholesale');

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`name`, `mobile`, `email`, `address`) VALUES
('SW Delivery', '03059235079', 'swdelivery@gmail.com', 'F11 main road Islamabad Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `subject` varchar(120) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `wholeId` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `status`, `wholeId`) VALUES
(1, 'Abdul Basit', 'tcomprog@gmail.com', '02039482002', 'I have problem in creating account', 'Testing', 1, 0),
(2, 'Abdul Basit Khan', 'veezlo.com@gmail.com', '02039482002', 'Welcome', 'Run Test', 1, 0),
(3, 'Abdul Basit', 'tcomprog@gmail.com', '897234987234', 'I have problem in creating account', 'Something went wrong', 1, 2),
(4, 'Abdul Basit', 'tcomprog@gmail.com', '897234987234', 'Welcome', 'Testing', 1, 2),
(5, 'Abdul Basit', 'tcomrprog@gmail.com', '0448848448', 'Testing', 'Testing', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company_name` varchar(80) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `quality` varchar(50) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `wholesale_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `company_name`, `price`, `quantity`, `mobile`, `quality`, `des`, `image`, `wholesale_id`, `status`) VALUES
(2, 'Car Tires', 'Super', '20000', 20, '897234987234', 'New', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_20000_20_9_803.jpg', 2, 0),
(3, 'Car Ring', 'China Company', '100000', 10, '897234987234', 'Advance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_100000_10_8_803.jpg', 2, 0),
(4, 'Engine Parts', 'ABC Advance', '10000', 2, '897234987234', 'Old', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_10000_2_12_803.jpg', 2, 0),
(5, 'Truck Bumper', 'Modern China', '40000', 20, '897234987234', 'New', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_40000_20_12_803.jpg', 2, 0),
(6, 'Engine Oil', 'USA Advance', '30000', 30, '897234987234', 'New', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_30000_30_10_803.jpg', 2, 0),
(7, 'Truck Oil', 'PSO', '1000', 30, '897234987234', 'New', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_1000_30_9_803.jpg', 2, 0),
(8, 'Motor Side Part', 'Honda', '20000', 300, '897234987234', 'A1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_20000_300_15_803.jpg', 2, 0),
(9, 'Bike Break Oil', 'Pakistan Oil', '100', 60, '897234987234', 'New', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_100_60_14_803.jpg', 2, 0),
(10, 'Bike LIght', 'BMW', '1000', 20, '897234987234', 'Best', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_1000_20_10_803.jpg', 2, 0),
(11, 'Bike Cycle Tire', 'China', '980', 30, '897234987234', 'B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_980_30_15_803.jpg', 2, 0),
(12, 'Car Tire Reams', 'Service Tire', '3000', 34, '897234987234', 'A1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_3000_34_14_803.jpg', 2, 0),
(13, 'Bike Honda LIght', 'Honda', '200', 100, '897234987234', 'Best', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_200_100_16_803.jpg', 2, 0),
(14, 'Modern Tires', 'New USA', '40', 30, '897234987234', 'Super', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_40_30_12_803.jpg', 2, 0),
(15, 'Oil Buttle New', 'PSO', '120', 30, '897234987234', 'Best', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus a justo venenatis sodales. Ut eu ullamcorper massa. In justo lacus, imperdiet sed nisi at, volutpat scelerisque eros. Mauris sollicitudin convallis sapien ac pellentesque. Maecenas commodo ligula a dignissim aliquet. Pellentesque a dui ipsum. Proin sagittis neque eget risus ultricies, a condimentum orci convallis. Nunc in leo ac diam rutrum congue non sit amet felis. Pellentesque consequat porta ex, at tristique magna iaculis et. Aliquam eu dolor non nisi tincidunt gravida condimentum in sem. Vestibulum sit amet ornare lorem. Etiam vulputate ultrices lectus eu vulputate. Fusce interdum interdum elit, nec ullamcorper dui vehicula ut. Curabitur vel auctor lectus. Aenean pretium elit sapien, ut maximus ipsum aliquet ullamcorper.', 'images/items/items_897234987234_120_30_10_803.png', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `shopkeeper_id` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `number_of_items` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shopkeeper_id`, `price`, `number_of_items`, `status`, `date`) VALUES
(3, 2, 30040, 2, 0, '2021-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `item_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `shopkeeper_id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`item_id`, `rating`, `review`, `shopkeeper_id`, `date`) VALUES
(7, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, '2021-02-07'),
(12, 3, 'lkjasdflkjlk;sdaf', 2, '2021-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper`
--

CREATE TABLE `shopkeeper` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopkeeper`
--

INSERT INTO `shopkeeper` (`id`, `name`, `email`, `cnic`, `mobile`, `address`, `password`, `image`) VALUES
(1, 'Abdul Basit', 'tcomprog@gmail.com', '22401124068', '03059235079', 'Dara Adam Khel', '/3q0Hg==', 'images/shopkeeper/shopkeeper_03059235079_22401124068_8_18.jpg'),
(2, 'Abdul Basit', 'basit@gmail.com', '9834983498934', '03059235079', 'Kohat', '/3q0HsU=', 'images/shopkeeper/shopkeeper_03059235079_9834983498934_8_15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`) VALUES
(3, 'tcomprog@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wholesale`
--

CREATE TABLE `wholesale` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `mobile` varchar(18) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wholesale`
--

INSERT INTO `wholesale` (`id`, `name`, `email`, `cnic`, `mobile`, `address`, `pass`, `image`) VALUES
(2, 'Abdul Basit', 'tcomprog@gmail.com', '8293829382', '897234987234', 'Dara Adam Khel', '/3q0Hg==', 'images/wholesale/Whole_Sale897234987234_8293829382.jpg'),
(3, 'Sheraz', 'sh@gmail.com', '098320948234', '09823409834', 'Peshware', '/3q0HsU=', 'images/wholesale/Whole_Sale09823409834_098320948234.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wholesale_account`
--

CREATE TABLE `wholesale_account` (
  `id` int(11) NOT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `wholesale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `shopkeeper_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `item_id`, `shopkeeper_id`) VALUES
(2, 12, 1),
(3, 11, 1),
(5, 15, 1),
(7, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopkeeper_id` (`shopkeeper_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `wholeId` (`wholeId`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chatroom_id` (`chatroom_id`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wholesale_id` (`wholesale_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopkeeper_id` (`shopkeeper_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`item_id`,`shopkeeper_id`),
  ADD KEY `shopkeeper_id` (`shopkeeper_id`);

--
-- Indexes for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wholesale`
--
ALTER TABLE `wholesale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wholesale_account`
--
ALTER TABLE `wholesale_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wholesale_id` (`wholesale_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `shopkeeper_id` (`shopkeeper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wholesale`
--
ALTER TABLE `wholesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wholesale_account`
--
ALTER TABLE `wholesale_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`shopkeeper_id`) REFERENCES `shopkeeper` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`wholeId`) REFERENCES `wholesale` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatroom` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`wholesale_id`) REFERENCES `wholesale` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`shopkeeper_id`) REFERENCES `shopkeeper` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`shopkeeper_id`) REFERENCES `shopkeeper` (`id`);

--
-- Constraints for table `wholesale_account`
--
ALTER TABLE `wholesale_account`
  ADD CONSTRAINT `wholesale_account_ibfk_1` FOREIGN KEY (`wholesale_id`) REFERENCES `wholesale` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`shopkeeper_id`) REFERENCES `shopkeeper` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
