-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 06:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliated_companies`
--

CREATE TABLE `affiliated_companies` (
  `affiliated_company_id` int(20) NOT NULL,
  `client_username` varchar(20) NOT NULL,
  `company_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affiliated_companies`
--

INSERT INTO `affiliated_companies` (`affiliated_company_id`, `client_username`, `company_id`) VALUES
(1, 'zilqad', 1),
(2, 'tonoy', 1),
(3, 'zilqad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `body` varchar(255) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `appointment_date` date NOT NULL,
  `manager_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `posted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `title`, `body`, `creation_date`, `appointment_date`, `manager_id`, `clients_id`, `posted_by`) VALUES
(1, 'Proposal Day', 'Appointment2 Body', '2020-02-02', '2020-11-22', 1, 1, 'shohag'),
(10, 'Appointment2', 'Appointment1 Body', '2020-11-24', '2020-11-24', 1, 1, 'zilqad'),
(11, 'Appointment1', 'Appointmnet1 Body', '2020-11-25', '2020-11-24', 2, 1, 'zilqad'),
(14, 'random22', 'random', '2021-01-04', '2021-01-14', 1, 1, 'zilqad'),
(15, 'random1', 'random1', '2021-01-05', '2021-01-06', 1, 1, 'zilqad');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(2) NOT NULL,
  `manager_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `title`, `description`, `date`, `client_id`, `manager_id`) VALUES
(1, 'First call', 'this is the first call', '2020-11-25', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `body` text DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `sent_from` varchar(30) NOT NULL,
  `sent_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `body`, `client_id`, `manager_id`, `sent_from`, `sent_at`) VALUES
(1, 'Hello, Tamim!', 1, 1, 'Manager', '2021-01-03 07:01:16'),
(2, 'Hello!', 1, 1, 'Client', '2021-01-05 05:01:21'),
(3, 'Hello, Tamim!!', 1, 2, 'Manager', '2021-01-03 07:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `username`, `password`, `full_name`, `contact_no`, `email`, `address`, `country`, `gender`, `dob`, `status`) VALUES
(1, 'zilqad', 'zilqad', 'Al Zilqad', 1760163265, 'alzilqad@gmail.com', 'fiqwbfib', 'fowbfoqb', 'Male', '1997-01-31', 'Active'),
(2, 'tonoy', 'tonoy', 'Al Zilqad Tonoy', 89251698, 'bfawkjfbjk', 'ifbqiowbf', 'fwbqoifb', 'Male', '1997-12-22', 'active'),
(4, 'sondhi', 'sondhi', 'sondhi', 125, 'sondhi@gmail.com', 'sondhi', 'bangladesh', 'male', '2021-12-06', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `adding_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_country` varchar(20) DEFAULT NULL,
  `billing_zip` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `email`, `phone`, `address`, `city`, `country`, `website`, `added_by`, `adding_date`, `status`, `password`, `billing_city`, `billing_state`, `billing_country`, `billing_zip`) VALUES
(1, 'Shohag', 'asgdd@gmai.com', 787777777, 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Bangladesh', 'aiub.edu', 'koushikur.aiub@gmail.com', '0000-00-00', 'Active', '123456', 'Dhaka', 'Inside Dhaka City', 'Bangladesh', 1207);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `manager_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_address`, `contact_number`, `type`, `manager_id`) VALUES
(1, 'AIUB', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 89456515, 'Software Company', 1),
(2, 'NSU', 'Boshundhora', 1000000000, 'Type2', 2),
(3, 'BRAC', 'Mohakhali', 2147483647, 'Type3', 3),
(4, 'EWU', 'Aftabnagar', 2147483647, 'Type4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `company_name` varchar(50) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `full_name`, `email`, `phone`, `dob`, `address`, `city`, `country`, `company_name`, `joining_date`, `user_name`, `password`, `status`) VALUES
(1, 'Koushikur Islam ', 'koushikur.aiub@gmail.com', 1798452091, '2020-11-22', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Bangladesh', 'AIUB', '2020-10-10', 'shohag', '123', 0),
(2, 'Shohag Islam', 'shohag.cse45@gmail.com', 1798452091, '2020-11-22', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Bangladesh', 'NSU', '2020-10-10', 'koushikur', '123', 0),
(3, 'Abdullah Al Zilqad', 'shohag.cse45@gmail.com', 1798452091, '2020-11-22', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Bangladesh', 'BRAC', '2020-10-10', 'abdullah', 'abdullah', 0),
(4, 'Abdullah Al Nafi', 'shohag.cse45@gmail.com', 1798452091, '2020-11-22', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Bangladesh', 'EWU', '2020-10-10', 'nafi', 'nafi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(50) NOT NULL,
  `manager_id` int(50) NOT NULL,
  `client_id` int(50) NOT NULL,
  `sent_from` varchar(50) NOT NULL,
  `body` varchar(255) NOT NULL,
  `sent_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `manager_id`, `client_id`, `sent_from`, `body`, `sent_at`) VALUES
(1, 1, 1, 'zilqad', 'message1', '2021-01-05 00:00:00'),
(2, 1, 1, 'zilqad', 'message2', '2021-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_01_04_133609_create_transactions_table', 1),
(2, '2021_01_04_134641_create_affiliated_companies_table', 0),
(3, '2021_01_04_134641_create_appointment_table', 0),
(4, '2021_01_04_134641_create_calls_table', 0),
(5, '2021_01_04_134641_create_client_table', 0),
(6, '2021_01_04_134641_create_clients_table', 0),
(7, '2021_01_04_134641_create_company_table', 0),
(8, '2021_01_04_134641_create_manager_table', 0),
(9, '2021_01_04_134641_create_note_table', 0),
(10, '2021_01_04_134641_create_proposal_table', 0),
(11, '2021_01_04_134641_create_service_table', 0),
(12, '2021_01_04_134641_create_service_history_table', 0),
(13, '2021_01_04_134641_create_transactions_table', 0),
(14, '2021_01_04_134642_add_foreign_keys_to_appointment_table', 0),
(15, '2021_01_04_141003_create_affiliated_companies_table', 1),
(16, '2021_01_04_141003_create_appointment_table', 1),
(17, '2021_01_04_141003_create_calls_table', 1),
(18, '2021_01_04_141003_create_client_table', 1),
(19, '2021_01_04_141003_create_clients_table', 1),
(20, '2021_01_04_141003_create_company_table', 1),
(21, '2021_01_04_141003_create_manager_table', 1),
(22, '2021_01_04_141003_create_note_table', 1),
(23, '2021_01_04_141003_create_proposal_table', 1),
(24, '2021_01_04_141003_create_service_table', 1),
(25, '2021_01_04_141003_create_service_history_table', 1),
(26, '2021_01_04_141003_create_transactions_table', 1),
(27, '2021_01_04_141005_add_foreign_keys_to_appointment_table', 1),
(28, '2021_01_04_142135_create_affiliated_companies_table', 2),
(29, '2021_01_04_142135_create_appointment_table', 2),
(30, '2021_01_04_142135_create_calls_table', 2),
(31, '2021_01_04_142135_create_client_table', 2),
(32, '2021_01_04_142135_create_clients_table', 2),
(33, '2021_01_04_142135_create_company_table', 2),
(34, '2021_01_04_142135_create_manager_table', 2),
(35, '2021_01_04_142135_create_note_table', 2),
(36, '2021_01_04_142135_create_pending_transaction_log_table', 2),
(37, '2021_01_04_142135_create_proposal_table', 2),
(38, '2021_01_04_142135_create_service_table', 2),
(39, '2021_01_04_142135_create_service_history_table', 2),
(40, '2021_01_04_142135_create_transactions_table', 2),
(41, '2021_01_04_142137_add_foreign_keys_to_appointment_table', 2),
(42, '2021_01_04_180437_create_affiliated_companies_table', 2),
(43, '2021_01_04_180437_create_appointment_table', 2),
(44, '2021_01_04_180437_create_calls_table', 2),
(45, '2021_01_04_180437_create_client_table', 2),
(46, '2021_01_04_180437_create_clients_table', 2),
(47, '2021_01_04_180437_create_company_table', 2),
(48, '2021_01_04_180437_create_manager_table', 2),
(49, '2021_01_04_180437_create_note_table', 2),
(50, '2021_01_04_180437_create_pending_transaction_log_table', 2),
(51, '2021_01_04_180437_create_proposal_table', 2),
(52, '2021_01_04_180437_create_service_table', 2),
(53, '2021_01_04_180437_create_service_history_table', 2),
(54, '2021_01_04_180437_create_transactions_table', 2),
(55, '2021_01_04_180439_add_foreign_keys_to_appointment_table', 2),
(56, '2021_01_04_203328_create_affiliated_companies_table', 2),
(57, '2021_01_04_203328_create_appointment_table', 2),
(58, '2021_01_04_203328_create_calls_table', 2),
(59, '2021_01_04_203328_create_client_table', 2),
(60, '2021_01_04_203328_create_clients_table', 2),
(61, '2021_01_04_203328_create_company_table', 2),
(62, '2021_01_04_203328_create_manager_table', 2),
(63, '2021_01_04_203328_create_note_table', 2),
(64, '2021_01_04_203328_create_pending_transaction_log_table', 2),
(65, '2021_01_04_203328_create_proposal_table', 2),
(66, '2021_01_04_203328_create_service_table', 2),
(67, '2021_01_04_203328_create_service_history_table', 2),
(68, '2021_01_04_203328_create_transactions_table', 2),
(69, '2021_01_04_203330_add_foreign_keys_to_appointment_table', 2),
(70, '2021_01_04_204437_create_affiliated_companies_table', 2),
(71, '2021_01_04_204437_create_appointment_table', 2),
(72, '2021_01_04_204437_create_calls_table', 2),
(73, '2021_01_04_204437_create_client_table', 2),
(74, '2021_01_04_204437_create_clients_table', 2),
(75, '2021_01_04_204437_create_company_table', 2),
(76, '2021_01_04_204437_create_manager_table', 2),
(77, '2021_01_04_204437_create_note_table', 2),
(78, '2021_01_04_204437_create_pending_transaction_log_table', 2),
(79, '2021_01_04_204437_create_proposal_table', 2),
(80, '2021_01_04_204437_create_service_table', 2),
(81, '2021_01_04_204437_create_service_history_table', 2),
(82, '2021_01_04_204437_create_transactions_table', 2),
(83, '2021_01_04_204438_add_foreign_keys_to_appointment_table', 2),
(84, '2021_01_04_230024_create_affiliated_companies_table', 2),
(85, '2021_01_04_230024_create_appointment_table', 2),
(86, '2021_01_04_230024_create_calls_table', 2),
(87, '2021_01_04_230024_create_client_table', 2),
(88, '2021_01_04_230024_create_clients_table', 2),
(89, '2021_01_04_230024_create_company_table', 2),
(90, '2021_01_04_230024_create_manager_table', 2),
(91, '2021_01_04_230024_create_note_table', 2),
(92, '2021_01_04_230024_create_pending_transaction_log_table', 2),
(93, '2021_01_04_230024_create_proposal_table', 2),
(94, '2021_01_04_230024_create_service_table', 2),
(95, '2021_01_04_230024_create_service_history_table', 2),
(96, '2021_01_04_230024_create_transactions_table', 2),
(97, '2021_01_04_230026_add_foreign_keys_to_appointment_table', 2),
(98, '2021_01_05_011653_create_affiliated_companies_table', 3),
(99, '2021_01_05_011653_create_appointment_table', 3),
(100, '2021_01_05_011653_create_calls_table', 3),
(101, '2021_01_05_011653_create_client_table', 3),
(102, '2021_01_05_011653_create_clients_table', 3),
(103, '2021_01_05_011653_create_company_table', 3),
(104, '2021_01_05_011653_create_manager_table', 3),
(105, '2021_01_05_011653_create_message_table', 3),
(106, '2021_01_05_011653_create_note_table', 3),
(107, '2021_01_05_011653_create_pending_transaction_log_table', 3),
(108, '2021_01_05_011653_create_proposal_table', 3),
(109, '2021_01_05_011653_create_service_table', 3),
(110, '2021_01_05_011653_create_service_history_table', 3),
(111, '2021_01_05_011653_create_transactions_table', 3),
(112, '2021_01_05_011655_add_foreign_keys_to_appointment_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `body` varchar(255) NOT NULL,
  `manager_id` int(2) NOT NULL,
  `client_id` int(2) NOT NULL,
  `creation_date` date NOT NULL,
  `posted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `body`, `manager_id`, `client_id`, `creation_date`, `posted_by`) VALUES
(2, 'Soft Reminder 2!', 'Hello, Hello, Hello, hello?!!!!!', 1, 1, '2020-02-02', 'shohag'),
(3, 'Mask Delivery', 'Body text', 1, 1, '2020-02-02', 'zilqad'),
(8, 'Note2', 'Note2Body', 3, 1, '2021-01-03', 'zilqad'),
(9, 'Note3', 'Note3Body', 1, 1, '2021-01-03', 'zilqad'),
(10, 'Note4', 'note4body', 2, 1, '2021-01-03', 'zilqad'),
(11, 'afbwofb', 'ofbwoqbfoq', 3, 1, '2021-01-03', 'zilqad'),
(13, 'random2', 'random2', 1, 1, '2021-01-04', 'zilqad'),
(14, 'random2', 'random4242', 1, 1, '2021-01-05', 'zilqad');

-- --------------------------------------------------------

--
-- Table structure for table `pending_transaction_list`
--

CREATE TABLE `pending_transaction_list` (
  `id` int(11) NOT NULL,
  `manager_id` int(6) NOT NULL,
  `company_id` int(6) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `issue_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_transaction_list`
--

INSERT INTO `pending_transaction_list` (`id`, `manager_id`, `company_id`, `amount`, `email`, `issue_date`, `status`, `last_updated`) VALUES
(3, 1, 1, 100.00, 'koushikur.aiub@gmail.com', '2021-01-04 23:08:48', 'Pending', '2021-01-04 23:08:48'),
(5, 2, 2, 50.00, 'shohag.cse45@gmail.com', '2021-01-04 23:25:54', 'Pending', '2021-01-04 23:25:54'),
(6, 1, 1, 75.00, 'koushikur.aiub@gmail.com', '2021-01-05 05:16:23', 'Pending', '2021-01-05 05:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `pending_transaction_log`
--

CREATE TABLE `pending_transaction_log` (
  `id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `company` varchar(50) NOT NULL,
  `client_id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `creation_time` date NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_transaction_log`
--

INSERT INTO `pending_transaction_log` (`id`, `type`, `company`, `client_id`, `description`, `price`, `date`, `creation_time`, `created_by`) VALUES
(1, 'Payment', 'AIUB', 1, 'Subscription Payment', 1000, NULL, '2021-01-04', 'zilqad'),
(2, 'Payment', 'AIUB', 1, 'Subscription Payment', 2000, NULL, '2021-01-04', 'zilqad'),
(3, 'Payment', 'NSU', 1, 'Subcription Payment', 3999, NULL, '2021-01-04', 'zilqad');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `starting_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zip_code` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `rate` int(6) NOT NULL,
  `client_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `posted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `title`, `subject`, `body`, `customer_name`, `starting_date`, `deadline_date`, `status`, `address`, `city`, `state`, `country`, `zip_code`, `email`, `phone`, `item`, `quantity`, `rate`, `client_id`, `manager_id`, `company_id`, `posted_by`) VALUES
(1, 'Game', 'Urgent Game Delivery', 'some games are needed.', 'Shohag', '2020-02-02', '2020-03-03', 'Inactive', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Inside Dhaka City', 'Bangladesh', 1207, 'shohag.cse45@gmail.com', 2147483647, 'K95 Mask', 155, 120, 2, 1, 1, 'zilqad'),
(2, 'Mask Delivery', 'Urgent Mask Delivery Request', 'some mask are needed.', 'Shohag', '2020-02-02', '2020-03-03', 'Inactive', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Inside Dhaka City', 'Bangladesh', 1207, 'shohag.cse45@gmail.com', 2147483647, 'K95 Mask', 1, 75, 1, 1, 1, 'shohag'),
(3, 'Game3', 'Urgent Game Delivery', 'some games are needed.', 'Shohag', '2020-02-02', '2020-03-03', 'Inactive', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Inside Dhaka City', 'Bangladesh', 1207, 'shohag.cse45@gmail.com', 2147483647, 'K95 Mask', 155, 120, 1, 1, 1, 'zilqad'),
(4, 'Game2', 'Urgent Game Delivery', 'some games are needed.', 'Shohag', '2020-02-02', '2020-03-03', 'Active', 'E-295, Holy Lane, Shyamoli, Adabor, Dhaka', 'Dhaka', 'Inside Dhaka City', 'Bangladesh', 1207, 'shohag.cse45@gmail.com', 2147483647, 'K95 Mask', 155, 120, 1, 1, 1, 'zilqad'),
(5, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', '2020-12-31', '2020-12-31', 'Active', 'aaaaa', 'aaaaa', 'aaaaa', 'Bangladesh', 9999, 'aaaaa@gmail.com', 2147483647, 'aaaaa', 212, 0, 1, 2, 2, 'zilqad');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `company_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `type`, `cost`, `status`, `company_id`) VALUES
(1, 'Software Development', 'Software', 75000.00, 'available', 1),
(3, 'Garment', 'Garment Supply', 56000.00, 'Available', 1),
(4, 'Hoodie Supply', 'Supply Chain', 50000.00, 'Unavailable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_history`
--

CREATE TABLE `service_history` (
  `service_history_id` int(20) NOT NULL,
  `service_id` int(20) NOT NULL,
  `client_id` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_history`
--

INSERT INTO `service_history` (`service_history_id`, `service_id`, `client_id`, `description`, `start_date`, `end_date`) VALUES
(1, 1, 1, 'description1', '2020-11-16', '2021-01-04'),
(2, 3, 1, 'description2', '2020-11-18', '2021-01-04'),
(3, 4, 2, 'description3', '2020-11-20', '2021-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `validator`
--

CREATE TABLE `validator` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validator`
--

INSERT INTO `validator` (`id`, `email`, `password`, `status`, `user_name`) VALUES
(1, 'watson@gmail.com', '123', 'Active', 'watson'),
(2, 'warner@gmail.com', '123', 'Active', 'warner'),
(3, 'smith@gmail.com', '123', 'Active', 'smith'),
(4, 'finch@gmail.com', '123', 'Active', 'finch'),
(5, 'ponting@gmail.com', '123', 'Active', 'ponting');

-- --------------------------------------------------------

--
-- Table structure for table `valid_transaction_list`
--

CREATE TABLE `valid_transaction_list` (
  `id` int(11) NOT NULL,
  `manager_id` int(5) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `company_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valid_transaction_list`
--

INSERT INTO `valid_transaction_list` (`id`, `manager_id`, `email`, `amount`, `transaction_date`, `company_id`) VALUES
(1, 1, 'koushikur.aiub@gmail.com', 50.00, '2021-01-05 05:06:11', 1),
(2, 1, 'koushikur.aiub@gmail.com', 75.00, '2021-01-05 05:08:01', 1),
(3, 2, 'shohag.cse45@gmail.com', 100.00, '2021-01-05 05:25:27', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliated_companies`
--
ALTER TABLE `affiliated_companies`
  ADD PRIMARY KEY (`affiliated_company_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abc` (`clients_id`),
  ADD KEY `def` (`manager_id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_transaction_log`
--
ALTER TABLE `pending_transaction_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_history`
--
ALTER TABLE `service_history`
  ADD PRIMARY KEY (`service_history_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliated_companies`
--
ALTER TABLE `affiliated_companies`
  MODIFY `affiliated_company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pending_transaction_log`
--
ALTER TABLE `pending_transaction_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_history`
--
ALTER TABLE `service_history`
  MODIFY `service_history_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `abc` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `def` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
