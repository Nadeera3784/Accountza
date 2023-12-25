-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2021 at 12:25 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accountz_main_accountza`
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
(7, 2, 'Darren Bogisich', 'Welder', 8, 'cdurgan@corwin.com', '+1-710-644-0826', '3529 DuBuque Landing\nFerminmouth, SD 11413-7062', 'Orlandotown', 'Connecticut', 'East Americahaven', 'Due Payment', '51954', '2020-12-29 18:24:55'),
(24, 11, 'Madusha Sandeepani Thennakoon', 'Manager', 0, 'Info@teachmeit.lk', '0774973804', 'No 243, Kerawalapitiya, Hendala, Wattala', 'Wattala', 'Eastern', 'Null', 'Null', '11300', '2021-04-19 01:02:09'),
(26, 12, 'Piotr Goom A', 'Head of Department of USSR', 10, 'sdsad34@dsfsf.sadas', '3244324324234', 'aspodkpadkasd asodpaskdopaskd dasopdkasdkapsodk', 'spoakdkapsodk', 'sopakdpasdkpask', 'asokdpasdkpasdkoaspkd', 'saakopaskdpaskdpokasd', '234234234', '2021-04-19 07:32:41'),
(28, 29, 'Danesh', 'ceo', 0, 'emagin@gmail.com', '000000000', 'Daman', 'daman', 'Daman And Diu', 'good', 'cash', NULL, '2021-04-20 03:45:00'),
(29, 31, 'Denis Tondereau', 'Director', 0, 'dt@sbe-ltd.ca', '4372239550', '2300 Hogan Drive', 'Mississauga', 'Ontario', 'Sbe canada', 'Direct deposit', NULL, '2021-04-20 04:51:55'),
(30, 7, 'kellaclient', 'Founder', 0, 'kellaclient@yahoo.com', '+94112456789', 'Application, Custom ,Modifications, jake', 'galle', 'sri lanka', 'kellaclient notes', 'hnb', '2343', '2021-04-20 18:28:32'),
(31, 34, 'John Bezos', 'CEO', 0, 'john@example.com', '+48383777123', 'Super Straße 98/40', 'Berlin', '-', '-', '1234 4567 6748 4984 3984', '61-394', '2021-04-23 06:37:46'),
(32, 36, 'Marquise Bradtke', 'Founder', 0, 'aroob@etiquettelatex.com', '+94112456789', 'No. 90, Galle Road, Colombo 3, Sri Lanka', 'Harbor View', 'sri lanka', 'notes', 'onine', '2343', '2021-04-23 17:50:30'),
(33, 42, 'Suheil Gazlan', 'Manager', 0, 'sales@lankaseller.com', '0703803567', '#23, Terrace Street', 'Hambantota', 'Sri lanka', 'Payment is due within 7 days from the invoice date.', 'Bank name : Commercial Bank\r\nBranch : Embilipitiya\r\nAccount holder : R.Nadeera Sampath\r\nAccount number : 8300040962', '82000', '2021-05-29 09:12:47'),
(34, 20, 'MonadLabs', 'founder', 0, 'eric@syncinc.so', '0000000000', '212 4th Ave', 'Venice', 'CA', 'SyncInc blog post series (airtable + syncinc)', 'n/a', NULL, '2021-07-14 17:43:00'),
(35, 20, 'gshah', 'founder', 0, 'gaurang.r.shah@gmail.com', '3472013205', '24 rowland ave', 'clifton', 'nj', 'test', 'n/a', '07012', '2021-07-14 17:45:46'),
(36, 21, 'Checkly GmbH - Hannes Lenke', '-', 0, 'hannes@checklyhq.com', '-', 'Kopernikusstr. 35', 'Berlin', 'Deutschland', 'Checkly VAT ID DE332316406 \r\nianaya89 TAX ID 20349061393', 'Bank of America\r\n100 North Tryon Street\r\n28255, Charlotte - NC -USA\r\nRouting Number: 026009593\r\nAccount Number: 898094627025', '10243', '2021-07-21 15:27:11');

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
(4, 2, 'Xyz  Inc', '795 Folsom Ave', 'Suite 600', 'San Francisco', 'CA', '94107', 'xyzinc@info.com', '034837434', '5844516f7801ac0f5eda7f5da5ff8c98.png', 'USD'),
(5, 11, 'Teach Me It (Private) Limitef', '6/63 A', 'Pahalalanda', 'Ampara', 'Eastern', '32034', 'Info@teachmeit.lk', '0770282037', NULL, 'LKR'),
(23, 7, 'Xyz  Inc', 'colombo 2', 'mt street', 'colombo', 'sri lanka', '9987611', 'delon@yahoo.com', '071118632', '28470ac3775d7e48071be65ccaad0eb1.png', 'AFN'),
(24, 12, 'NOOOOOOOOOOOOOOB!', '75 Lakewood Road Ilebo', '', 'CHINA NA NA NA', 'Democratic Republic of the Congo', '999999', '999999@999999.ocm', '+888888888888', 'bb3b7be577a6010c889094b616077e2c.jpg', 'USD'),
(25, 14, 'Teacher Andrew Online', 'Invivienda Manzana 4696', 'Edificio 10 Apartamento 4D', 'Santo Domingo', 'Districto Nacional', '11802', 'andrewjude01@gmail.com', '8097141174', NULL, 'USD'),
(26, 20, 'GShah Dev', '24 Rowland Avenue, Clifton, NJ, US, 07012', '', 'Clifton', 'NJ', '07012', 'gaurang.r.shah@gmail.com', '3472013205', '67def2ffb6d466d479d7d28ef21c587a.png', 'USD'),
(27, 23, 'Desagner', 'Luiz Bastos Cruz, 18', '', 'Avaré', 'SP', '18700-000', 'wag1well@gmail.com', '14996352828', NULL, 'BRL'),
(28, 25, 'Vojislav Miloradović', '8. Marta 40', '', 'Kostolac', 'Braničevo', '12208', 'vojislav@miloradovic.ml', '+381643686349', NULL, 'RSD'),
(29, 29, 'Shivjy Design Studio', 'Daman', '', 'Daman', 'Daman', '396210', 'shivjy.in@gmail.com', '8511068998', NULL, 'IDR'),
(30, 31, 'iTalkRobot', '247 Fitzgerald Cres', '', 'Milton', 'Ontario', 'L9T 5Y3', 'italkrobot@live.com', '4372239550', NULL, 'CAD'),
(31, 32, 'Tsz Kwong Lee', '583 Village Parkway', '', 'Markham', 'Ontario', 'L3R6C1', 'samuellee.wordpress@gmail.com', '647-869-6543', '788b3d1b43cfe11a2fead7f46d05b99a.png', 'CAD'),
(32, 34, 'Residetns', 'ul. Wolności 34', '', 'Poznań', '-', '61-453', 'company@residents.design', '+48 987 378 378', NULL, 'EUR'),
(33, 36, 'cuoly pvt', '795 Folsom Ave, Suite 600', 'mt street', 'San Francisco', 'CA', '9987611', 'delon@yahoo.com', '071118632', 'a9bd7fb234862f332e26dcbc22cf00fc.png', 'AFN'),
(34, 40, 'AUTO SOUND CENTER LLC', '2512 BALSAM TERRACE', '200', 'TALLAHASSEE', 'Florida', '32303', 'admin@autosoundcenterus.com', '3234523603', '7f1ae7f6766c4bf9f818c2389d62b66d.jpg', 'USD'),
(35, 42, 'Nadeera', '42A', 'Old Kesbewa Rd', 'Nugegoda', 'Sri lanka', '10250', 'nadeera3784@gmail.com', '0754730383', NULL, 'LKR'),
(36, 21, 'ianaya89', 'Juan Bautista Alberdi 227', '', 'Buenos Aires', 'Argentina', '1424', 'hi@ianaya89.dev', '+5491153467741', 'dc7423cd4308a8281ae22979ddb39caa.png', 'USD');

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
  `estimates_status` enum('draft','pending','declined','accepted') DEFAULT 'pending',
  `estimate_subtotal` int(255) NOT NULL,
  `estimate_total` varchar(255) NOT NULL,
  `estimate_created_date` date NOT NULL,
  `estimate_valid_unil_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_estimates`
--

INSERT INTO `app_estimates` (`estimate_id`, `client_id`, `agent_id`, `estimate_no`, `estimate_discount`, `estimates_status`, `estimate_subtotal`, `estimate_total`, `estimate_created_date`, `estimate_valid_unil_date`) VALUES
(15, 33, 42, 'EST-613047', '0', 'pending', 100, '100.00', '2021-05-29', '2021-05-29');

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
(32, 15, 42, 'NE555', '100', '1', '100.00');

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
(22, 4, 2, 'Phone Charger', 'draft', 0, '  Comments', 'Payment', '200.00', '200.00', '2021-01-11'),
(23, 11, 34, 'Mockups', 'paid', 0, '  ', 'Card', '20.00', '20.00', '2021-04-23');

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
(9, 2, 'Travel'),
(11, 34, 'Materials');

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
(39, 22, 2, 'Phone Charger', '200.00', '1', '200.00'),
(40, 23, 34, 'iPhone mockup', '20', '1', '20.00');

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
(39, 2, 7, 'INV-439756', '8.00', 'pending', '100.00', '92.00', '2021-04-22', '2021-04-22'),
(42, 42, 33, 'INV-049317', '0', 'pending', '3000.00', '3000.00', '2021-05-29', '2021-05-31'),
(43, 20, 34, 'INV-327948', '0', 'pending', '1000.00', '1000.00', '2021-07-14', '2021-07-14'),
(44, 20, 35, 'INV-358294', '0', 'pending', '100.00', '100.00', '2021-07-14', '2021-07-14');

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
(60, 39, 2, 'NE555', '100.00', '1', '100.00'),
(64, 42, 42, 'Brandedtools.lk', '3000', '1', '3000.00'),
(65, 43, 20, 'Content Consultation', '1', '1000', '1000.00'),
(66, 44, 20, 'this', '1', '100', '100.00');

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
(2, 2, 'Auth flow chart pre desing sketch', 'User auth flow chart', '{\"nodeData\":{\"id\":\"root\",\"topic\":\"User pool\",\"root\":true,\"children\":[{\"topic\":\"API\",\"id\":\"6f74650de0e1ab1c\",\"direction\":0},{\"topic\":\"firebase sync\",\"id\":\"6f746836786e6ab7\",\"direction\":1},{\"topic\":\"cognito\",\"id\":\"6f7759e1549be972\",\"direction\":0}],\"expanded\":true},\"linkData\":{}}', '2021-01-12'),
(6, 2, 'idea01', 'idea01', '{\"nodeData\":{\"id\":\"root\",\"topic\":\"Idea\",\"root\":true,\"children\":[{\"topic\":\"topic 01\",\"id\":\"8fe8830f58dcf571\",\"direction\":0},{\"topic\":\"topic 02\",\"id\":\"8fe8848b86033162\",\"direction\":1,\"style\":{\"color\":\"#27ae61\"}}],\"expanded\":true,\"style\":{\"color\":\"#f1c40e\"}},\"linkData\":{}}', '2021-04-23');

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
(8, 'TKID-675182', 2, 'test attachment', 'a29c161c726524e3f677b593a9c7362b.jpg', 'Closed', '2021-01-20'),
(9, 'TKID-167930', 19, 'Hi. Please add the Kenyan Shilling (KES). Thanks', NULL, 'Open', '2021-04-19');

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
(15, 5, 2, 'admin', '', 'ba83a172a9191792414777c4a62973ad.png', '2021-01-22 17:13:13'),
(16, 9, 19, 'agent', 'Hi. Please add the Kenyan Shilling (KES). Thanks', NULL, '2021-04-19 13:49:57');

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
  `subscription_id` int(11) NOT NULL,
  `original_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `subscription_id`, `original_date`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$WIDlCsJ/ux5bmaoLqlk86ugIbrPT5UFn48L6bJ3PRZxVWLMc/bEre', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1631037831, 1, 'Admin', 'istrator', 'ADMIN', '0', 3, '2021-04-23 20:26:15'),
(2, '127.0.0.1', NULL, '$2y$10$aZ82euaaHjCBRIUujUBSfuBaZsnGF8kT9QbsbLgSbmwmFbIiuXCLe', 'johndoe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1609082626, 1621147309, 1, 'john', 'doe', 'creative minds', '78(6)6942713515', 3, '2021-04-23 20:26:15'),
(3, '127.0.0.1', NULL, '$2y$10$.Fo35hwmBfo4A6PY8ewOSO56RNlyYtDz8W1f8DI1H5Sq9FdLAJeqy', 'kalin@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1611002347, 1611002382, 1, 'kalin', 'marcus', NULL, '49387493', 4, '2021-04-23 20:26:15'),
(6, '127.0.0.1', 'met mater', '$2y$10$guwfZ94ckiRSUnYCXBdrvebm8WyCXVA31afaiQFDmsjWJiI1vF0uG', 'metmat@gmail.com', 'dc63e6e49d92d78e7857', '$2y$10$V2HIXbAhb73aDzdqDGYLK.HSZNKddNo0EijWEhU./Y3Aa35T0/aT2', NULL, NULL, NULL, NULL, NULL, 1612463132, NULL, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(7, '43.250.241.208', 'kella650018', '$2y$10$HGjK2dwxZkZYX5mqnV5oR.UmPlCiyXpxsaqBC0TFeKtZMG438Hf5u', 'kella650018@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618748522, 1618943234, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(9, '123.231.86.1', 'gossip', '$2y$10$XSAly2HyVfijMWr4.4v8kubX1CvYknBou6Irqn8luc7MnkSCvRQRu', 'gossiplk.me@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618763598, 1619540063, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(10, '123.231.87.7', 'rohan', '$2y$10$VApBPt5jSB0XqXyIuugGjOCwSnLVwxV4UBjrML8Fj0Owa4H7EMZK6', 'rohansin2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618790543, 1618790579, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(11, '116.206.245.250', 'tharukaCodeWorks', '$2y$10$0qdL9QVqkNPdTgkUzIFn.O3fiYuGlFl96zuq3PqVO3t/8NG9K/Aza', 'tharukawapnet@gmail.com', NULL, NULL, NULL, NULL, NULL, '69c8cdeaf8c125e0fa2091df859cb2427cd801f8', '$2y$10$4m7DepUNyKvBUOawytyO1eto8Mlo7aChZHqMWkS1MFcY.ZWMJhnBK', 1618793846, 1618793896, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(12, '183.82.204.242', 'resmead0', '$2y$10$4SQ1Uu7NiejZv.NT.QA14..Zjp/cU2bNqenC6xWDFULze9sPy2Lju', 'dummy@bfa8a8aba10e43cbb9e8.anonaddy.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618817205, 1618817327, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(13, '94.210.16.26', 'payrequest', '$2y$10$wLbfPOEovhudyiPHCX/OLO8rPe63pXS117BSQr7wLp4e6kesdQ8Zm', 'info@payrequest.io', NULL, NULL, NULL, NULL, NULL, 'bf36fcd3bcc77c9fff46c09ef71f9486a945ced3', '$2y$10$YzLAFi.gOCvEXe55bCWqlOT/2bJHI3mJoCgwvNxkVVdoDj675n2p.', 1618819161, 1618819200, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(14, '186.6.125.241', 'andrewjude01', '$2y$10$1a4Iurskbr7Qi.q9kGZDb.K4fXJ.M0Wtl5CDhX5sAEiGqrNtvJAnG', 'andrewjude01@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618826386, 1618826424, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(15, '103.24.124.46', 'praveen', '$2y$10$TtK2iAr62LQRfwSQc5aeXOEsQ1FimDThatzqlEHgHgdCdakug.MaC', 'praveenr019@gmail.com', NULL, NULL, NULL, NULL, NULL, 'e31c45ca36df82a4c9986ee04e38a6c6ef5cc229', '$2y$10$iPuTsv8iyRas6OPyqTNmFeNShoMF1tPph0csi6Ti0DmD.b8aggrNi', 1618826638, 1618826675, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(16, '49.207.195.34', 'hal', '$2y$10$mXcRnN47BKnfCvqswJB2MeY1n/NNGoq4QvzexIu.tcyj/CdZmTb12', '1234halambler@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618833941, 1618833982, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(17, '107.161.86.136', 'bryan', '$2y$10$r26Pyu894PHdhLPaMH/QAuMKhH5IAy0VqIDDskseLR10D2aEJSGta', 'bryan3874287@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618839174, 1618839234, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(18, '213.205.197.148', 'anya', '$2y$10$N7/HbAKCQfJiFiZFGbSWlOvATI2Nj.KybnACQAWTt4aqXKtf.8CYC', 'anya.drozdova89@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618839754, 1618839798, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(19, '197.232.61.205', 'toQen', '$2y$10$S5innUxmrG1inkFLLtuYRO.Qi1M1mA.1shMi.4rGrUv5mPBTrtXJG', 'info@toqen.co.ke', NULL, NULL, NULL, NULL, NULL, '7548dca32a122b612968c9971d6b656c436c93cb', '$2y$10$7pkqaPJvpAqHKH8FHveWZOjtpJtYDYYYrDAB02vRvIQMfADwZEFO6', 1618839977, 1618885340, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(20, '108.53.222.105', 'Gaurang', '$2y$10$JMNR6MuA0DewxB2ryefrHuqbL.yiq7fQ28Dd5gaAqW32bilZ2dRIe', 'gaurang.r.shah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618844587, 1626284846, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(21, '190.244.98.70', 'ianaya89', '$2y$10$VM9i02FHlRLMi5db7mkn0ulOCZr0NiVG7o8TqYqQGPY87v2zpmsSu', 'ignacio.anaya89@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618853940, 1626880935, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(22, '95.93.82.222', 'berna8', '$2y$10$eDF2dOoFLNgOQjvWeI8gg.pJyii4ICweTIcFgKgVmXbGUdjBO5.ZS', 'kishido88@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618856012, 1618856093, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(23, '177.128.154.85', 'wagnerwalmeida', '$2y$10$cyz8B55GZZFKUTcpPcTUyuLjPRgcacqBTZ/sdH8WlFI82.RqlaCWK', 'wag1well@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618860219, 1618860270, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(24, '148.240.26.232', 'pepe', '$2y$10$TWkMCGEaVrWN3TghThN6g.4SPDx2U2yu6F15k8IFaRH67F8Jkfz56', 'ncqicflmkkqptjaqha@twzhhq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618862773, 1618862796, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(25, '45.87.214.115', 'VojislavMiloradovic', '$2y$10$APRWN0KHTBohOlY8cp08AOF6dk2RErdNEVCN3wn48ZuMi50HACIBu', 'vojislav@miloradovic.tk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618873681, 1618873709, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(26, '165.225.226.94', 'ivanrafael', '$2y$10$RmMW8gbKFPj2SkGeqWfJ/e05msStru8JOoW.6jaWvsxJFXlCrc7sy', 'contact@ivanrafael.com', NULL, NULL, NULL, NULL, NULL, '51bd913d79e18523a0345a8a9460b613a889e9fe', '$2y$10$9g5EYK5VrHB0G.RvXgPeU.AeKmtjDv18pUyv0C0GshBARW6xsBafO', 1618878449, 1618878506, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(27, '171.60.220.91', 'Prabu', '$2y$10$RZsh4aeCbVwxH/9s.4VAn.uO1CqWFau7LfIIVlrnJyxUUowChVacy', 'ekalaivan@gmail.com', '1ba8d74afffb278e2567', '$2y$10$myLp6QMH5FkXWS55SaX3IeJUTB/pcCh7qgkSY3uublVD.TWcJs1rm', NULL, NULL, NULL, NULL, NULL, 1618885037, NULL, 0, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(28, '103.35.80.64', 'KristianS', '$2y$10$DmsjbfyYk04/QghUXnOlBOQRdHlx1KBc3JuvoOI9ija/knat4ewF6', 'kstartari@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1618885960, 1618885986, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(29, '103.137.193.22', 'shivprakash', '$2y$10$vQvBfvSCZBMT7F2kCOcxlu4KRq7uFMAqiN3kO7ROp8mI.QCh4ky4K', 'shivprakash.design@gmail.com', NULL, NULL, NULL, NULL, NULL, '0c07e888a5b0950d44ec97a068dfb0ead1002ac6', '$2y$10$/SMJ3MkgtBfTXcj.znjxxeNXLSMelZbaJhu2RagzkAkcKCAJ7RWTS', 1618889921, 1618890166, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(30, '119.42.59.167', 'aarav4587', '$2y$10$s3wW2KwGQe3O9VlfyjDdPOEjpmEsDBWNQFvskxRjcyagOKRniHVoC', 'suleman@ilfstest.tk', 'e1d8931d10a404839237', '$2y$10$2n.fubVjKmIvrGjuRZ7doeaCMBpW/OBEJHcA9qeXs45r91toq2FWe', NULL, NULL, NULL, NULL, NULL, 1618893325, NULL, 0, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(31, '162.220.204.133', 'Haashim', '$2y$10$jGgJIDRLWbQKPNoymB1MTet2jvcROUusLFTtmZhTuCoSJyIvNL5Cm', 'haashimrehan@gmail.com', NULL, NULL, NULL, NULL, NULL, 'c92c41c4e8107c811d93c82b5969dc0dc809d1c5', '$2y$10$ScvdT57W7ImwgkKupbt5Eeb2xXKp2pKWCkTZeqi/pam7B6SSHVQwa', 1618894075, 1618894112, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(32, '138.51.247.248', 'sam1001uel', '$2y$10$OARwuQG0M8VnGvefbpuW4OIr5SWLWIoMiGOfWVP/1d3o4oLzFRGxG', 'passionground917@gmail.com', NULL, NULL, NULL, NULL, NULL, '4974b5e3edbb54ffbd5fe78f7efae43d656835e4', '$2y$10$acu6/COghLQmPgM4006QoOe/Lihz4MuWIIRR0TLqtlHGK9iaIzJwq', 1618945744, 1618945784, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(33, '197.232.6.92', 'Dungulu', '$2y$10$zcPE.Ur7ccmjJog2zSbcl.JIZLgsTKUF2SmeWGJURoqerdenVc4l.', 'gdungulu2@gmail.com', NULL, NULL, NULL, NULL, NULL, '9f296da542605ca7e227c16027a9e89b90d4ad3f', '$2y$10$v8guHQ/lnAwtMXtuv1oRO.fQMfKTyXuO1SVCQJY5zBLn9QKyeJbsa', 1618981478, 1618981716, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(34, '188.146.161.189', 'Ivan', '$2y$10$4kZk9FiknGesjAEzd8.cbOjZYPvx/o3kyhbLDTm/mepI0cJ0yVKJe', 'qjitymwxkmgumicdfn@wqcefp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1619159644, 1619163415, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 20:26:15'),
(35, '123.231.105.144', 'Saduka', '$2y$10$60igpTcGgnA3gIAC5MoH0.YVACVkDJNkvPv6vpDY71AUqTEQg5/yO', 'saduka.sachintha@gmail.com', 'c3d40685187f04d8f857', '$2y$10$25.ILIc.L..fuOVLvyAVKu4A8hmDskB8aHcK4CX7dNVosw4q6/4b6', NULL, NULL, NULL, NULL, NULL, 1619195909, NULL, 0, NULL, NULL, NULL, NULL, 2, '2021-04-23 22:08:29'),
(36, '61.245.161.65', 'nbi96577', '$2y$10$88c9Xt9iecoeV3GEQ10c.Op.hURJ92cTX2WJqy5C5ouvLH2X43NSG', 'nbi96577@cuoly.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1619199957, 1619200489, 1, NULL, NULL, NULL, NULL, 2, '2021-04-23 23:15:57'),
(37, '212.104.224.196', 'matt', '$2y$10$lM4a7i3Ip9qsM0d8EgiaJ.i6aqz.36UATjFk/5p/MOs4m4ljmyzDC', 'vagkoeqwvhvbnxdgku@twzhhq.online', NULL, NULL, NULL, NULL, NULL, '64b9a441fb09f87940239500ad17c12af4adc430', '$2y$10$TPRy9s.X5lWdHasMhkpRHe.WJhNeY8A0PAGbCTb2BEoIEX8sO2mjq', 1620068087, 1620068129, 1, NULL, NULL, NULL, NULL, 2, '2021-05-04 00:24:47'),
(38, '43.250.241.174', 'madushan', '$2y$10$7A2de92fTMXmQegrL7zPb.89nht7GkCqycBz.k45AQWd9pvPsdfM.', 'madushangunarathne@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1620216442, 1620216486, 1, NULL, NULL, NULL, NULL, 2, '2021-05-05 17:37:22'),
(39, '175.157.241.131', 'Creative', '$2y$10$Yh/jxF5GJ/A0JYBydO3BqelEatY5aMDXN2VbOBW1dKNKLYZasliT2', 'uvindu.b.perera@gmail.com', '7559a41cff39f2edc1f7', '$2y$10$BYbKJ1ZkZb3uldnumlBkSuhG32ycYS/yS1VuIuRUKAKN5y0/0YpuS', NULL, NULL, NULL, NULL, NULL, 1620369680, NULL, 0, NULL, NULL, NULL, NULL, 2, '2021-05-07 12:11:20'),
(40, '104.7.45.59', 'Azhar', '$2y$10$4mLiU..Fy8Ku5xXs8XoOXutyvTu.BYStlqJ46krSehUJMyFtu7faC', 'sondracurry1@gmail.com', NULL, NULL, NULL, NULL, NULL, '6b5177f9c3ea4d2fc11d8614683be115a9521e8d', '$2y$10$uPhJg1QTKUR/2E0FJyQqvu.sgvXuqrLjKz7qYOFyb0p3SyuLKFwdS', 1620749483, 1620749526, 1, 'Azhar', 'Mahboob', NULL, '3234523603', 2, '2021-05-11 21:41:23'),
(41, '157.51.154.39', 'gavin', '$2y$10$oFPvsD4MGzO/kKtvZovLGOWIL9U/SxbcmcKo/k85sghSYnF90lkIy', 'gavinrich1998@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1621417326, 1621417383, 1, NULL, NULL, NULL, NULL, 2, '2021-05-19 15:12:06'),
(42, '61.245.169.205', 'Nadeera', '$2y$10$CEwjPD2./Am3DXO49SqrfOG/h2ojMfswVveY1xj0LCl/mP0y7I3s2', 'nadeera3784@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1622278546, 1632340302, 1, NULL, NULL, NULL, NULL, 2, '2021-05-29 14:25:46'),
(43, '117.194.83.232', 'Aditya', '$2y$10$z/OSwUyys1rFlJXwxHlv4eBpuy3jYEaGf12UNZrM026aCJS6Pt27i', 'adityaabhayacool@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1622718215, 1622718345, 1, NULL, NULL, NULL, NULL, 2, '2021-06-03 16:33:35'),
(44, '179.41.165.199', 'Aaron Marco Arias', '$2y$10$GB0r43qgIhmi.SX4XpFLiOP0C3tSnkzb8TMn4K9fGyQ93BNJZdRwu', 'aaronmarco@postdigitalist.xyz', NULL, NULL, NULL, NULL, NULL, 'e763d2de387e967b5ca8920ee77ceb018c43dca0', '$2y$10$k3t5P/Rcw.rLfEtIdG/FS.6egnHqc1tKQstKqcBnuiCO7yHfdCsty', 1629930011, 1629930040, 1, NULL, NULL, NULL, NULL, 2, '2021-08-26 03:50:11');

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
(8, 6, 3),
(9, 7, 3),
(11, 9, 3),
(12, 10, 3),
(13, 11, 3),
(14, 12, 3),
(15, 13, 3),
(16, 14, 3),
(17, 15, 3),
(18, 16, 3),
(19, 17, 3),
(20, 18, 3),
(21, 19, 3),
(22, 20, 3),
(23, 21, 3),
(24, 22, 3),
(25, 23, 3),
(26, 24, 3),
(27, 25, 3),
(28, 26, 3),
(29, 27, 3),
(30, 28, 3),
(31, 29, 3),
(32, 30, 3),
(33, 31, 3),
(34, 32, 3),
(35, 33, 3),
(36, 34, 3),
(37, 35, 3),
(38, 36, 3),
(39, 37, 3),
(40, 38, 3),
(41, 39, 3),
(42, 40, 3),
(43, 41, 3),
(44, 42, 3),
(45, 43, 3),
(46, 44, 3);

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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `app_company_settings`
--
ALTER TABLE `app_company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `app_configuration`
--
ALTER TABLE `app_configuration`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `app_estimates`
--
ALTER TABLE `app_estimates`
  MODIFY `estimate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `app_estimate_items`
--
ALTER TABLE `app_estimate_items`
  MODIFY `estimate_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `app_expenses`
--
ALTER TABLE `app_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `app_expense_category`
--
ALTER TABLE `app_expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `app_expense_items`
--
ALTER TABLE `app_expense_items`
  MODIFY `expense_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `app_groups`
--
ALTER TABLE `app_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_invoice`
--
ALTER TABLE `app_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `app_invoice_items`
--
ALTER TABLE `app_invoice_items`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `app_login_attempts`
--
ALTER TABLE `app_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `app_mindmap`
--
ALTER TABLE `app_mindmap`
  MODIFY `mindmap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `supprt_ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `app_supprt_ticket_replies`
--
ALTER TABLE `app_supprt_ticket_replies`
  MODIFY `supprt_ticket_reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `app_users_groups`
--
ALTER TABLE `app_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
