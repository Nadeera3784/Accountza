-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 10:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plugin_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

CREATE TABLE `app_clients` (
  `client_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `payment_info` text NOT NULL,
  `postal_code` varchar(200) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_clients`
--

INSERT INTO `app_clients` (`client_id`, `agent_id`, `name`, `position`, `discount`, `email`, `phone`, `address`, `city`, `state`, `notes`, `payment_info`, `postal_code`, `created_date`) VALUES
(3, 2, 'Giovanni Kutch', 'Equal Opportunity Representative', 0, 'olen36@gmail.com', '+1 (826) 375-2619', '9520 Tremaine LakePort Dan, SD 50334-1533', 'Port Rozella', 'New Hampshire', 'Addisonfort', 'Due Payment', '31332-3523', '2020-12-29 18:24:54'),
(4, 2, 'Daija Tremblay I', 'Electronics Engineering Technician', 5, 'zbeier@kuhlman.com', '373.655.5093 x2736', '997 Arlo Circles Suite 735\nPort Geovany, WY 29648', 'Eichmannville', 'Washington', 'North Walkershire', 'Due Payment', '74128', '2020-12-29 18:24:54'),
(5, 2, 'Melba Toy', 'Audio-Visual Collections Specialist', 5, 'domenica.hane@weissnat.net', '450-403-9573', '52156 Bergnaum View\nLake Eduardobury, DE 66133-0737', 'Lake Wainoland', 'Virginia', 'Amosmouth', 'Due Payment', '54887-6746', '2020-12-29 18:24:54'),
(7, 2, 'Darren Bogisich', 'Welder', 8, 'cdurgan@corwin.com', '+1-710-644-0826', '3529 DuBuque Landing\nFerminmouth, SD 11413-7062', 'Orlandotown', 'Connecticut', 'East Americahaven', 'Due Payment', '51954', '2020-12-29 18:24:55'),
(8, 2, 'Prof. Brady Murazik', 'Taper', 4, 'tnikolaus@yahoo.com', '+1-868-333-5084', '537 Doyle Ridge\nTatyanaton, LA 94937', 'Lake Justyn', 'Utah', 'Yostborough', 'Due Payment', '34585-1138', '2020-12-29 18:24:55'),
(9, 2, 'Elnora Schaden', 'Answering Service', 5, 'myrl.mraz@farrell.com', '+1 (741) 407-4015', '618 Rosenbaum Junction\nWest Broderick, TN 08101', 'Port Brandyn', 'New Jersey', 'West Marc', 'Due Payment', '03670', '2020-12-29 18:24:55'),
(10, 2, 'Francisca McGlynn', 'Manager Tactical Operations', 1, 'ritchie.alessandro@jones.com', '489-633-1459 x34927', '1061 Deckow Dale Suite 410\nPort Christophe, NC 24265', 'East Baylee', 'Wisconsin', 'North Carsonstad', 'Due Payment', '73975', '2020-12-29 18:24:55'),
(11, 2, 'Jarvis Rowe', 'Set and Exhibit Designer', 7, 'theo60@hotmail.com', '229-509-9982 x8357', '9741 Abbie Rue\nNorth Lyrictown, DE 28796', 'North Muhammad', 'New Jersey', 'East Geraldinefurt', 'Due Payment', '86174', '2020-12-29 18:24:55'),
(12, 2, 'Maryjane West', 'Zoologists OR Wildlife Biologist', 9, 'tmccullough@yahoo.com', '597-660-7917 x89729', '59968 Ortiz Crescent\nEast John, AK 42102', 'Port Adaline', 'Arkansas', 'Dillonview', 'Due Payment', '89881-1028', '2020-12-29 18:24:55'),
(13, 2, 'Mr. Josiah Bernier', 'Pressing Machine Operator', 9, 'melyssa70@gmail.com', '+16622439668', '2549 Houston Vista Apt. 339\nGarrickmouth, DC 53088', 'Eudorashire', 'Virginia', 'Vincenzoville', 'Due Payment', '66865-6914', '2020-12-29 18:24:55'),
(14, 2, 'Kristy O\'Connell', 'Plating Operator OR Coating Machine Operator', 9, 'leone97@gorczany.com', '1-432-388-4926 x5338', '4312 Schoen Springs Suite 498\nAudieside, AR 93318-0145', 'Lewfurt', 'Indiana', 'Mayerstad', 'Due Payment', '39368', '2020-12-29 18:24:55'),
(16, 2, 'Loyce Turcotte', 'Paper Goods Machine Operator', 4, 'jefferey66@oconnell.com', '683.302.3400', '505 Lauretta Row\nLake Kay, IA 52712-8149', 'Lake Lizzieside', 'Alaska', 'Derekport', 'Due Payment', '95386', '2020-12-29 18:24:55'),
(17, 2, 'Dr. Tiana Rogahn', 'Financial Services Sales Agent', 3, 'cora.murazik@moore.com', '+1 (358) 659-2379', '79687 Eichmann Greens Apt. 239\nFrancescaville, WY 66596-6681', 'Adahborough', 'Delaware', 'New Vernonbury', 'Due Payment', '60991', '2020-12-29 18:24:55'),
(18, 2, 'Kennith Schowalter', 'Fashion Designer', 4, 'jkeebler@yahoo.com', '1-332-722-7768 x28491', '609 Treutel Rest Apt. 659\nWiegandland, WY 23234-7406', 'Walshstad', 'Louisiana', 'Port Reymundoshire', 'Due Payment', '54976-1810', '2020-12-29 18:24:55'),
(19, 2, 'Aubree Bernier Sr.', 'Mining Machine Operator', 10, 'marta.grimes@dare.com', '614.727.4559 x4825', '6956 Daniel Mount Suite 760\nLake Marta, AZ 41888', 'South Buster', 'Pennsylvania', 'Schmidtshire', 'Due Payment', '85541', '2020-12-29 18:24:55'),
(20, 2, 'Mr. Vidal Hane I', 'Costume Attendant', 1, 'jovan17@koelpin.com', '509.471.6298', '59673 Berge Orchard Apt. 428\nSouth Maurineburgh, IL 83354', 'Kuhlmanville', 'Mississippi', 'Ryanport', 'Due Payment', '11691', '2020-12-29 18:24:55'),
(21, 2, 'Judson Kerluke', 'Short Order Cook', 7, 'durgan.kyra@hotmail.com', '541-855-0400', '4350 Florida Squares\nWest Candida, HI 84717-6582', 'Mrazstad', 'Michigan', 'West Pabloton', 'Due Payment', '10058-6339', '2020-12-29 18:24:55'),
(22, 2, 'Ephraim Armstrong', 'Organizational Development Manager', 2, 'connelly.carole@krajcik.com', '646-474-8946 x83518', '4646 Medhurst Pass\nSouth Gonzalo, OH 97751-8192', 'Keeganland', 'Minnesota', 'Alexanneshire', 'Due Payment', '29507', '2020-12-29 18:24:55'),
(23, 2, 'Hank Howell DVM', 'Computer Security Specialist', 2, 'rkihn@hotmail.com', '+1.269.449.5778', '3304 Lockman Hollow\nLelahside, GA 41695-0225', 'Moenshire', 'Idaho', 'Easterside', 'Due Payment', '74674-4473', '2020-12-29 18:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `app_company_settings`
--

CREATE TABLE `app_company_settings` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_street_01` varchar(100) NOT NULL,
  `company_street_02` varchar(100) NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_state` varchar(50) NOT NULL,
  `company_postal_code` varchar(50) NOT NULL,
  `company_email_address` varchar(50) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_logo` varchar(200) DEFAULT NULL,
  `company_currency` varchar(10) NOT NULL DEFAULT '$'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_company_settings`
--

INSERT INTO `app_company_settings` (`id`, `agent_id`, `company_name`, `company_street_01`, `company_street_02`, `company_city`, `company_state`, `company_postal_code`, `company_email_address`, `company_phone`, `company_logo`, `company_currency`) VALUES
(4, 2, 'Xyz  Inc', '795 Folsom Ave', 'Suite 600', 'San Francisco', 'CA', '94107', 'xyzinc@info.com', '034837434', '629ef3be11e19a2972c6e193fffc20fc.png', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `app_configuration`
--

CREATE TABLE `app_configuration` (
  `conf_id` int(11) NOT NULL,
  `conf_key` varchar(100) NOT NULL,
  `conf_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_configuration`
--

INSERT INTO `app_configuration` (`conf_id`, `conf_key`, `conf_value`) VALUES
(1, 'date_format', 'Y-m-d'),
(2, 'time_format', 'h:i A'),
(3, 'first-day-of-the-week', 'Monday'),
(4, 'rent_interval', ''),
(5, 'calculate_type', 'both'),
(6, 'currency_symbol', 'Rs.'),
(7, 'deposit', '10'),
(8, 'deposit_type', 'percent'),
(9, 'tax', '10'),
(10, 'tax_type', 'price'),
(11, 'age_tax', ''),
(12, 'age_tax_type', 'price'),
(13, 'age_for_tax', '21'),
(14, 'app_name', 'accountza.io');

-- --------------------------------------------------------

--
-- Table structure for table `app_estimates`
--

CREATE TABLE `app_estimates` (
  `estimate_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `estimate_no` varchar(100) NOT NULL,
  `estimate_discount` varchar(50) NOT NULL,
  `estimates_status` enum('draft','pending','declined','accepted') DEFAULT 'draft',
  `estimate_subtotal` int(255) NOT NULL,
  `estimate_total` varchar(255) NOT NULL,
  `estimate_created_date` date NOT NULL,
  `estimate_valid_unil_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_estimates`
--

INSERT INTO `app_estimates` (`estimate_id`, `client_id`, `agent_id`, `estimate_no`, `estimate_discount`, `estimates_status`, `estimate_subtotal`, `estimate_total`, `estimate_created_date`, `estimate_valid_unil_date`) VALUES
(12, 4, 2, 'EST-920178', '5.00', 'accepted', 194, '184.30', '2021-01-16', '2021-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `app_estimate_items`
--

CREATE TABLE `app_estimate_items` (
  `estimate_item_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `estimate_item_name` varchar(50) NOT NULL,
  `estimate_item_unit_price` varchar(255) NOT NULL,
  `estimate_item_qty` varchar(255) NOT NULL,
  `estimate_item_total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_estimate_items`
--

INSERT INTO `app_estimate_items` (`estimate_item_id`, `estimate_id`, `agent_id`, `estimate_item_name`, `estimate_item_unit_price`, `estimate_item_qty`, `estimate_item_total`) VALUES
(27, 12, 2, 'KLD12', '20.00', '1', '20.00'),
(28, 12, 2, 'IN4007', '18.00', '3', '54.00'),
(29, 12, 2, '100uf', '40.00', '3', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses`
--

CREATE TABLE `app_expenses` (
  `expense_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` enum('paid','not-paid','pending','draft') NOT NULL DEFAULT 'paid',
  `vat` int(11) NOT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `payment_method` varchar(200) NOT NULL,
  `subtotal` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_expenses`
--

INSERT INTO `app_expenses` (`expense_id`, `category_id`, `agent_id`, `title`, `status`, `vat`, `comments`, `payment_method`, `subtotal`, `total`, `created_date`) VALUES
(20, 4, 2, 'internet bill', 'paid', 0, '  dfdf', 'dfd', '58.00', '58.00', '2021-01-17'),
(21, 4, 2, 'USB pen drive', 'paid', 0, '  Comments', 'Payment', '150.00', '150.00', '2021-01-15'),
(22, 4, 2, 'Phone Charger', 'draft', 0, '  Comments', 'Payment', '200.00', '200.00', '2021-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `app_expense_category`
--

CREATE TABLE `app_expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_expense_category`
--

INSERT INTO `app_expense_category` (`expense_category_id`, `agent_id`, `name`) VALUES
(4, 2, 'personal'),
(5, 2, 'meals & entertainment'),
(6, 2, 'supplies'),
(7, 2, 'education'),
(9, 2, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `app_expense_items`
--

CREATE TABLE `app_expense_items` (
  `expense_item_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `expense_item_title` varchar(100) NOT NULL,
  `expense_item_unit_price` varchar(200) NOT NULL,
  `expense_item_qty` varchar(200) NOT NULL,
  `expense_item_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_expense_items`
--

INSERT INTO `app_expense_items` (`expense_item_id`, `expense_id`, `agent_id`, `expense_item_title`, `expense_item_unit_price`, `expense_item_qty`, `expense_item_total`) VALUES
(36, 20, 2, 'BS-500', '12', '1', '12.00'),
(37, 20, 2, 'BS-200', '23', '2', '46.00'),
(38, 21, 2, 'USB pen', '150', '1', '150.00'),
(39, 22, 2, 'Phone Charger', '200.00', '1', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `app_groups`
--

CREATE TABLE `app_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_groups`
--

INSERT INTO `app_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(3, 'agent', 'agent user group ');

-- --------------------------------------------------------

--
-- Table structure for table `app_invoice`
--

CREATE TABLE `app_invoice` (
  `invoice_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `invoice_discount` varchar(200) NOT NULL,
  `invoice_status` varchar(100) NOT NULL,
  `invoice_subtotal` varchar(200) NOT NULL,
  `invoice_total` varchar(200) NOT NULL,
  `invoice_issue` date NOT NULL,
  `invoice_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_invoice`
--

INSERT INTO `app_invoice` (`invoice_id`, `agent_id`, `client_id`, `invoice_no`, `invoice_discount`, `invoice_status`, `invoice_subtotal`, `invoice_total`, `invoice_issue`, `invoice_due`) VALUES
(17, 2, 3, 'INV-148239', '0', 'paid', '570.00', '570.00', '2021-01-01', '2021-01-02'),
(19, 2, 10, 'INV-962081', '1', 'pending', '720.00', '712.80', '2021-01-29', '2021-01-31'),
(20, 2, 13, 'INV-827415', '9', 'pending', '1935.00', '1760.85', '2021-01-28', '2021-01-28'),
(21, 2, 18, 'INV-635480', '4', 'paid', '2749.00', '2639.04', '2021-01-28', '2021-01-28'),
(22, 2, 21, 'INV-132407', '7', 'pending', '600.00', '558.00', '2021-01-28', '2021-02-02'),
(23, 2, 23, 'INV-574831', '2', 'pending', '3400.00', '3332.00', '2021-01-30', '2021-01-31'),
(24, 2, 18, 'INV-732041', '4', 'pending', '440.00', '422.40', '2021-01-30', '2021-02-06'),
(25, 2, 11, 'INV-582476', '7', 'paid', '120.00', '111.60', '2021-02-04', '2021-02-07'),
(26, 2, 13, 'INV-140932', '9', 'pending', '50.00', '45.50', '2021-02-10', '2021-02-16'),
(27, 2, 4, 'INV-326057', '10', 'paid', '200.00', '180.00', '2021-02-06', '2021-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `app_invoice_items`
--

CREATE TABLE `app_invoice_items` (
  `invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `invoice_item_name` varchar(100) NOT NULL,
  `invoice_item_unit_price` varchar(200) NOT NULL,
  `invoice_item_qty` varchar(200) NOT NULL,
  `invoice_item_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_invoice_items`
--

INSERT INTO `app_invoice_items` (`invoice_item_id`, `invoice_id`, `agent_id`, `invoice_item_name`, `invoice_item_unit_price`, `invoice_item_qty`, `invoice_item_total`) VALUES
(33, 17, 2, 'JLK12', '200', '2', '400.00'),
(34, 17, 2, 'KJP3734', '34', '5', '170.00'),
(36, 19, 2, 'TLS009', '240', '3', '720.00'),
(37, 20, 2, 'YID342', '200', '3', '600.00'),
(38, 20, 2, 'JDO1123', '445', '3', '1335.00'),
(39, 21, 2, 'LLK23', '2303', '1', '2303.00'),
(40, 21, 2, 'FSJD', '223', '2', '446.00'),
(41, 22, 2, 'JDL32', '200', '3', '600.00'),
(42, 23, 2, 'OPL37463', '3400', '1', '3400.00'),
(43, 24, 2, 'IDPD123', '220', '2', '440.00'),
(44, 25, 2, 'MUE44', '120', '1', '120.00'),
(45, 26, 2, 'RSTBBJ890', '50', '1', '50.00'),
(46, 27, 2, 'C828', '100', '1', '100.00'),
(47, 27, 2, 'D400', '100', '1', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `app_login_attempts`
--

CREATE TABLE `app_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_mindmap`
--

CREATE TABLE `app_mindmap` (
  `mindmap_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `mindmap_title` varchar(200) NOT NULL,
  `mindmap_description` text NOT NULL,
  `mindmap_content` text NOT NULL,
  `mindmap_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_mindmap`
--

INSERT INTO `app_mindmap` (`mindmap_id`, `agent_id`, `mindmap_title`, `mindmap_description`, `mindmap_content`, `mindmap_created`) VALUES
(2, 2, 'Auth flow chart pre desing sketch', 'User auth flow chart', '{\"nodeData\":{\"id\":\"root\",\"topic\":\"User pool\",\"root\":true,\"children\":[{\"topic\":\"API\",\"id\":\"6f74650de0e1ab1c\",\"direction\":0},{\"topic\":\"firebase sync\",\"id\":\"6f746836786e6ab7\",\"direction\":1},{\"topic\":\"cognito\",\"id\":\"6f7759e1549be972\",\"direction\":0}],\"expanded\":true},\"linkData\":{}}', '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `app_modules`
--

CREATE TABLE `app_modules` (
  `id` int(11) NOT NULL,
  `module_name` varchar(55) NOT NULL,
  `installed_version` varchar(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_plugins`
--

CREATE TABLE `app_plugins` (
  `plugin_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_plugins`
--

INSERT INTO `app_plugins` (`plugin_id`, `agent_id`, `name`, `slug`, `icon`, `status`) VALUES
(2, 2, 'Calendar', 'calendar', 'icon-calender', '1');

-- --------------------------------------------------------

--
-- Table structure for table `app_subscriptions`
--

CREATE TABLE `app_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `email` int(11) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_subscriptions`
--

INSERT INTO `app_subscriptions` (`subscription_id`, `title`, `slug`, `email`, `price`) VALUES
(2, 'Free', 'free', 50, '0'),
(3, 'Pro', 'pro', 100, '20'),
(4, 'Lite', 'lite', 80, '8');

-- --------------------------------------------------------

--
-- Table structure for table `app_supprt_tickets`
--

CREATE TABLE `app_supprt_tickets` (
  `supprt_ticket_id` int(11) NOT NULL,
  `ticket_id` varchar(100) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_supprt_tickets`
--

INSERT INTO `app_supprt_tickets` (`supprt_ticket_id`, `ticket_id`, `agent_id`, `description`, `attachment`, `status`, `created_date`) VALUES
(5, 'TKID-706412', 2, 'minimum value \"0.001BTC', NULL, 'Re-Open', '2021-01-19'),
(6, 'TKID-495863', 2, 'Recent Trading Activity', NULL, 'Re-Open', '2021-01-19'),
(7, 'TKID-936758', 2, 'Use this deal code to get up to 15000 instant Discount. Hurry off ending soon!', NULL, 'Open', '2021-01-19'),
(8, 'TKID-675182', 2, 'test attachment', 'a29c161c726524e3f677b593a9c7362b.jpg', 'Closed', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `app_supprt_ticket_replies`
--

CREATE TABLE `app_supprt_ticket_replies` (
  `supprt_ticket_reply_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `identity` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_supprt_ticket_replies`
--

INSERT INTO `app_supprt_ticket_replies` (`supprt_ticket_reply_id`, `ticket_id`, `agent_id`, `identity`, `description`, `attachment`, `created_date`) VALUES
(1, 5, 2, 'agent', 'minimum value \"0.001BTC', NULL, '2021-01-19 15:31:51'),
(2, 6, 2, 'agent', 'Recent Trading Activity', NULL, '2021-01-19 15:32:46'),
(3, 7, 2, 'agent', 'Use this deal code to get up to 15000 instant Discount. Hurry off ending soon!', NULL, '2021-01-19 15:33:01'),
(4, 7, 2, 'admin', 'can you check it now.', NULL, '2021-01-19 16:21:26'),
(5, 7, 2, 'agent', 'still not working i checked it carefully.', NULL, '2021-01-19 16:22:07'),
(9, 5, 2, 'agent', 'hy ineed some help', NULL, '2021-01-20 17:06:49'),
(10, 8, 2, 'agent', 'test attachment', 'a29c161c726524e3f677b593a9c7362b.jpg', '2021-01-20 17:16:29'),
(11, 8, 2, 'agent', 'dssd', NULL, '2021-01-20 17:31:31'),
(12, 7, 2, 'admin', 'yes', NULL, '2021-01-20 18:19:52'),
(13, 5, 2, 'admin', 'it\'s deen here, how can i help your sir?', NULL, '2021-01-20 18:21:00'),
(14, 5, 2, 'agent', 'i am facing this error. help me to fix this', '702774e2d7884f5673cc4598a9128970.jpg', '2021-01-20 18:22:11'),
(15, 5, 2, 'admin', '', 'ba83a172a9191792414777c4a62973ad.png', '2021-01-22 17:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subscription_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `subscription_id`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$8Z.SvvxmJHLDoir2tB0zVOp.pHvxM8GNKElMK/Qf1/nZex1Eoy.Tu', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1612555138, 1, 'Admin', 'istrator', 'ADMIN', '0', 3),
(2, '127.0.0.1', NULL, '$2y$10$aZ82euaaHjCBRIUujUBSfuBaZsnGF8kT9QbsbLgSbmwmFbIiuXCLe', 'johndoe@gmail.com', NULL, NULL, NULL, NULL, NULL, 'd13e2672aba91fbb0f8fa1d68d0668a6a408e209', '$2y$10$VpEl3AiPPpyMS8DuK5.GSuStde5g88wtQlQWQkH/p5kIAZbBabsli', 1609082626, 1612795121, 1, 'john', 'doe', 'creative minds', '78(6)6942713515', 3),
(3, '127.0.0.1', NULL, '$2y$10$.Fo35hwmBfo4A6PY8ewOSO56RNlyYtDz8W1f8DI1H5Sq9FdLAJeqy', 'kalin@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1611002347, 1611002382, 1, 'kalin', 'marcus', NULL, '49387493', 4),
(6, '127.0.0.1', 'met mater', '$2y$10$guwfZ94ckiRSUnYCXBdrvebm8WyCXVA31afaiQFDmsjWJiI1vF0uG', 'metmat@gmail.com', 'dc63e6e49d92d78e7857', '$2y$10$V2HIXbAhb73aDzdqDGYLK.HSZNKddNo0EijWEhU./Y3Aa35T0/aT2', NULL, NULL, NULL, NULL, NULL, 1612463132, NULL, 1, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

CREATE TABLE `app_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 2, 3),
(5, 3, 3),
(8, 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_clients`
--
ALTER TABLE `app_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `app_company_settings`
--
ALTER TABLE `app_company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_configuration`
--
ALTER TABLE `app_configuration`
  ADD PRIMARY KEY (`conf_id`);

--
-- Indexes for table `app_estimates`
--
ALTER TABLE `app_estimates`
  ADD PRIMARY KEY (`estimate_id`);

--
-- Indexes for table `app_estimate_items`
--
ALTER TABLE `app_estimate_items`
  ADD PRIMARY KEY (`estimate_item_id`);

--
-- Indexes for table `app_expenses`
--
ALTER TABLE `app_expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `app_expense_category`
--
ALTER TABLE `app_expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `app_expense_items`
--
ALTER TABLE `app_expense_items`
  ADD PRIMARY KEY (`expense_item_id`);

--
-- Indexes for table `app_groups`
--
ALTER TABLE `app_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_invoice`
--
ALTER TABLE `app_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `app_invoice_items`
--
ALTER TABLE `app_invoice_items`
  ADD PRIMARY KEY (`invoice_item_id`);

--
-- Indexes for table `app_login_attempts`
--
ALTER TABLE `app_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_mindmap`
--
ALTER TABLE `app_mindmap`
  ADD PRIMARY KEY (`mindmap_id`);

--
-- Indexes for table `app_plugins`
--
ALTER TABLE `app_plugins`
  ADD PRIMARY KEY (`plugin_id`);

--
-- Indexes for table `app_subscriptions`
--
ALTER TABLE `app_subscriptions`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `app_supprt_tickets`
--
ALTER TABLE `app_supprt_tickets`
  ADD PRIMARY KEY (`supprt_ticket_id`);

--
-- Indexes for table `app_supprt_ticket_replies`
--
ALTER TABLE `app_supprt_ticket_replies`
  ADD PRIMARY KEY (`supprt_ticket_reply_id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_clients`
--
ALTER TABLE `app_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `app_company_settings`
--
ALTER TABLE `app_company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_configuration`
--
ALTER TABLE `app_configuration`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `app_estimates`
--
ALTER TABLE `app_estimates`
  MODIFY `estimate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `app_estimate_items`
--
ALTER TABLE `app_estimate_items`
  MODIFY `estimate_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `app_expenses`
--
ALTER TABLE `app_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `app_expense_category`
--
ALTER TABLE `app_expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `app_expense_items`
--
ALTER TABLE `app_expense_items`
  MODIFY `expense_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `app_groups`
--
ALTER TABLE `app_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_invoice`
--
ALTER TABLE `app_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `app_invoice_items`
--
ALTER TABLE `app_invoice_items`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `app_login_attempts`
--
ALTER TABLE `app_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_mindmap`
--
ALTER TABLE `app_mindmap`
  MODIFY `mindmap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_plugins`
--
ALTER TABLE `app_plugins`
  MODIFY `plugin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_subscriptions`
--
ALTER TABLE `app_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_supprt_tickets`
--
ALTER TABLE `app_supprt_tickets`
  MODIFY `supprt_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `app_supprt_ticket_replies`
--
ALTER TABLE `app_supprt_ticket_replies`
  MODIFY `supprt_ticket_reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `app_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
