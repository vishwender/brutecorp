-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 01:21 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brutecor_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `bc_category`
--

CREATE TABLE IF NOT EXISTS `bc_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `category_keyword` varchar(200) NOT NULL,
  `category_url` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_category`
--

INSERT INTO `bc_category` (`category_id`, `category_name`, `category_title`, `category_keyword`, `category_url`) VALUES
(11, 'Landing Page Designs', 'Landing Page Designs', 'Landing Page Designs', 'landing-page-designs'),
(12, 'Ecommerce', 'ecommerce site development', 'eCommerce site, logo design', 'ecommerce'),
(13, 'Dynamic Websites', 'dynamic website', 'dynamic website developement', 'dynamic-websites'),
(14, 'Static Website', 'static website', 'static website', 'static-website'),
(15, 'MLM Websites', 'mlm websites', 'mlm websites', 'mlm-websites'),
(16, 'News Portal', 'News Website Designing, News websites portal', 'News Website Designing, News websites portal', 'news-portal');

-- --------------------------------------------------------

--
-- Table structure for table `bc_links`
--

CREATE TABLE IF NOT EXISTS `bc_links` (
  `link_id` int(11) NOT NULL,
  `link_keyword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bc_links`
--

INSERT INTO `bc_links` (`link_id`, `link_keyword`, `link_url`) VALUES
(3, 'logo design', 'http://brutecorp.com/services/logo-designing'),
(2, 'Static website', 'http://brutecorp.com/services/static-website-designing');

-- --------------------------------------------------------

--
-- Table structure for table `bc_orders`
--

CREATE TABLE IF NOT EXISTS `bc_orders` (
  `order_id` int(11) NOT NULL,
  `order_invoice_no` int(11) NOT NULL,
  `order_invoice_name` varchar(200) NOT NULL,
  `order_invoice_date` date NOT NULL,
  `order_title` varchar(200) NOT NULL,
  `order_category_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_description` varchar(1000) NOT NULL,
  `order_franchise_id` int(11) NOT NULL,
  `order_register_date` date NOT NULL,
  `order_expired_date` date NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_status` enum('inactive','active') NOT NULL,
  `order_invoice_status` enum('Unpaid','Paid') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_orders`
--

INSERT INTO `bc_orders` (`order_id`, `order_invoice_no`, `order_invoice_name`, `order_invoice_date`, `order_title`, `order_category_id`, `order_user_id`, `order_description`, `order_franchise_id`, `order_register_date`, `order_expired_date`, `order_price`, `order_status`, `order_invoice_status`) VALUES
(10, 10003, 'Vision One Consulting Services Ltd', '2014-10-18', 'Email Hosting 10 GB', 2, 8, 'Email Hosting 10 GB with unlimited emails.', 1, '2014-10-11', '2015-10-11', 6000, 'active', 'Unpaid'),
(11, 10005, 'Vij Agro Export Private Limited', '2014-10-21', 'Web Designing', 42, 18, 'Web Designing\nWeb Hosting \nDomain Name', 1, '2014-08-26', '2015-10-26', 6000, 'active', 'Paid'),
(12, 10004, 'Vij Agro Export Private Limited', '2014-10-21', 'Google Adwords', 32, 18, 'Google Adwords PPC Service', 1, '2014-09-01', '2014-09-30', 5000, 'active', 'Paid'),
(13, 10007, '', '2014-10-21', 'Email Software', 40, 15, 'Email script &amp;amp; software\nDomain Name: simrozetravel.com', 1, '2014-09-17', '2015-10-17', 7500, 'active', 'Paid'),
(14, 10006, 'Amandeep Singh', '2014-10-21', 'VPS Hosting', 45, 15, '10 GB VPS Hosting', 1, '2014-10-14', '2014-11-14', 1100, 'active', 'Paid'),
(15, 0, '', '0000-00-00', 'Renewal', 45, 15, 'Web Hosting for email.', 1, '2014-11-14', '2014-12-14', 1100, 'active', 'Unpaid'),
(16, 0, '', '0000-00-00', 'Metispharma.com', 42, 24, 'Dynamic Website with Metispharma.com', 1, '2014-12-10', '2015-12-09', 8000, 'active', 'Unpaid'),
(17, 0, '', '0000-00-00', 'Hosting', 29, 25, 'Hosting Renewal for Powershine.co.in', 1, '2014-01-10', '2015-01-09', 0, 'inactive', 'Unpaid'),
(18, 0, '', '0000-00-00', 'Hoteltrishulmanali.com', 42, 26, 'Hotel Website design with landing page.', 1, '2014-08-05', '2015-08-04', 7500, 'active', 'Unpaid'),
(19, 10010, 'Simroze Tour &amp; Travels', '2015-02-14', 'Renewal', 45, 15, 'VPS Web Hosting Renewal', 1, '2014-12-14', '2015-01-14', 1100, 'active', 'Unpaid'),
(20, 10009, 'Simroze Tour &amp; Travels', '2015-02-14', 'Renewal', 45, 15, 'VPS Web Hosting Renewal', 1, '2015-01-14', '2015-02-13', 1100, 'active', 'Unpaid'),
(21, 10008, 'Simroze Tour &amp; Travels', '2015-02-14', 'Renewal', 45, 15, 'VPS Hosting Renewal', 1, '2015-02-14', '2015-03-13', 1100, 'active', 'Unpaid'),
(22, 10011, 'Simroze Tour &amp; Travels', '2015-06-01', 'Hosting Renewal', 45, 15, 'VPS Hosting Renewal', 1, '2015-02-14', '2015-05-14', 3300, 'active', 'Paid'),
(24, 10013, 'Simroze Tour &amp; Travels', '2015-08-26', 'Renewal 3 Month VPS', 45, 15, 'VPS Renewal for 6 Months', 1, '2015-05-14', '2015-08-14', 3300, 'active', 'Paid'),
(25, 10014, 'Simroze Tour &amp; Travels', '2015-09-03', '1 Year VPS Hosting Plan', 45, 15, '1 year hosting plan', 1, '2015-08-14', '2016-08-14', 10560, 'active', 'Paid'),
(26, 10015, 'Vij Agro Export Private Limited', '2015-09-24', '5 Years Renew', 42, 18, '5 years Domain+hosting renew for Vijagro.com', 1, '2015-08-28', '2020-08-28', 12500, 'active', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `bc_plans`
--

CREATE TABLE IF NOT EXISTS `bc_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_spage_id` int(11) NOT NULL,
  `plan_feature_name` varchar(500) NOT NULL,
  `plan_plan1` varchar(500) NOT NULL,
  `plan_plan2` varchar(500) NOT NULL,
  `plan_plan3` varchar(500) NOT NULL,
  `plan_plan4` varchar(500) NOT NULL,
  `plan_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2355 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_plans`
--

INSERT INTO `bc_plans` (`plan_id`, `plan_spage_id`, `plan_feature_name`, `plan_plan1`, `plan_plan2`, `plan_plan3`, `plan_plan4`, `plan_status`) VALUES
(36, 11, ' Disk Space', 'Unlimted', 'Unlimted', 'Unlimted', '', 'active'),
(37, 11, ' Bandwidth', 'Unlimted', 'Unlimted', 'Unlimted', '', 'active'),
(38, 11, 'Domains Allowed', '1', 'Unlimted', 'Unlimted', '', 'active'),
(57, 4, '', 'Starter', 'Regular', 'Professional ', '', 'active'),
(58, 4, 'Domain Name(.com, .net, .org)', 'Yes', 'Yes', 'Yes', '', 'active'),
(59, 4, 'Web Pages', '1', '5', '15', '', 'active'),
(60, 4, 'Images/Photos', '3', '10', '20', '', 'active'),
(61, 4, 'Contact Form', 'No', 'Yes', 'Yes', '', 'active'),
(62, 4, 'Enquiry/Quote Form', 'No', 'Yes', 'Yes', '', 'active'),
(63, 4, 'Design', 'Template', 'Template Modified', 'Custom', '', 'active'),
(64, 4, 'Logo Design', 'No', 'No', 'Yes', '', 'active'),
(65, 4, 'Slider', 'No', 'No', 'Yes', '', 'active'),
(66, 4, 'Email Accounts', '1', '2', '5', '', 'active'),
(67, 4, 'SEO Friendly', 'Yes', 'Yes', 'Yes', '', 'active'),
(68, 4, 'Statcounter', 'No', 'Yes', 'Yes', '', 'active'),
(69, 4, 'Web Hosting', '200 MB', '500 MB', 'Unlimited', '', 'active'),
(70, 4, 'Bandwidth', '500 MB', 'Unlimited', 'Unlimited', '', 'active'),
(71, 4, 'Sitemap', 'No', 'No', 'Yes', '', 'active'),
(72, 4, '', 'Rs.999/-', 'Rs.2500/-', 'Rs.4500/-', '', 'active'),
(885, 32, '', 'Starter', 'Basic', 'Regular', 'Premium', 'active'),
(886, 32, 'Networks(FB, Google, Bing)', 'Any 1', 'Any 2', 'All', 'All', 'active'),
(887, 32, 'Setup Cost', 'Rs.2500', 'Rs.5000', 'Rs.7500', 'Rs.10000', 'active'),
(888, 32, 'Keywords', '50', '100', 'Unlimited', 'Unlimited', 'active'),
(889, 32, 'Keyword Refining', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(890, 32, 'Ad Copies', '1', '3', '10', '20', 'active'),
(891, 32, 'Geo targeting Setup', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(892, 32, 'Banner Ads', 'No', 'No', 'Yes', 'Yes', 'active'),
(893, 32, 'Shopping Ads', 'No', 'No', 'Yes', 'Yes', 'active'),
(894, 32, 'Landing Page Recommendation', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(895, 32, 'Top 3 Position ', 'No', 'No', 'Yes', 'Yes', 'active'),
(896, 32, 'Remarketing Campaign', 'No', 'No', 'Yes', 'Yes', 'active'),
(897, 32, 'Conversion Tracking', 'No', 'No', 'Yes', 'Yes', 'active'),
(898, 32, 'Keyword Optimization', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(899, 32, 'Ad Copies Optimization', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(900, 32, 'Keyword Bid Optimization', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(901, 32, 'Ad Scheduling Setup', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(902, 32, 'Competitor Analysis', 'No', 'No', 'Yes', 'Yes', 'active'),
(903, 32, 'Google Analytics Set-up', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(904, 32, 'Reports', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(905, 32, 'Chat/Email Support', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(906, 32, 'Phone Support', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(907, 32, 'ROI Analysis', 'No', 'No', 'Yes', 'Yes', 'active'),
(908, 32, 'Monthly Cost', 'Rs.2500', 'Rs.5000', 'Rs.7500', 'Rs.10000*', 'active'),
(1080, 44, '', 'Basic', 'Starter', 'Regular', 'Professional', 'active'),
(1081, 44, 'Disk Space', '5 GB', '10 GB', '25 GB', '50 GB', 'active'),
(1082, 44, 'Bandwidth', '15 GB', '40 GB', '125 GB', '300 GB', 'active'),
(1083, 44, 'Domains Allowed', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(1084, 44, 'Cpanels', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(1085, 44, 'FTP Accounts', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1086, 44, 'WHM', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1087, 44, 'MySQL Databases', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(1088, 44, '99.9% Guarantee', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1089, 44, 'Fast CGI	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1090, 44, 'PHP 5', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1091, 44, 'Ruby On Rails', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1092, 44, 'SSH	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1093, 44, 'Perl', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1094, 44, 'Python', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1095, 44, 'SSI', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1096, 44, 'FrontPage', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1097, 44, 'Cron', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1098, 44, 'Curl', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1099, 44, 'Image Magick	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1100, 44, 'GD 2', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1101, 44, 'Streaming Audio/Video', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1102, 44, 'POP3 Accounts', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1103, 44, '24x7 Support', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1104, 44, 'E-mail Alias	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1105, 44, 'Auto Responders	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1106, 44, 'Mailing Lists	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1107, 44, 'Catch Alls	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1108, 44, 'Spam Assassin', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1109, 44, 'Mail Forwarding', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1110, 44, 'IMAP Support', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1111, 44, 'SMTP', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1112, 44, 'AWStats', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1113, 44, 'Webalizer', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1114, 44, 'Raw Log Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1115, 44, 'Referrer Logs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1116, 44, 'Error Logs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1117, 44, 'QuickInstall', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1118, 44, 'Soholaunch', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1119, 44, 'Hotlink Protection', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1120, 44, 'IP Deny Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1121, 44, 'Custom Error Pages', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1122, 44, 'Instant Blogs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1123, 44, 'Instant Portals', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1124, 44, 'Instant PHPnuke', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1125, 44, 'Instant Forums', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1126, 44, 'Instant Guestbook', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1127, 44, 'Instant Counter', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1128, 44, 'Instant FormMail', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1129, 44, 'Redirect URL', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1130, 44, 'Web Based File Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1131, 44, 'PW Protected Directories	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1132, 44, 'phpMyAdmin', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1133, 44, 'Shared SSL', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1134, 44, 'osCommerce', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1135, 44, 'ZenCart', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1136, 44, 'Cube Cart', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1319, 33, 'Item1', '', '', '', '', 'active'),
(1320, 33, 'Item2', '', '', '', '', 'active'),
(1321, 33, 'Item3', '', '', '', '', 'active'),
(1322, 33, 'Item4', '', '', '', '', 'active'),
(1323, 33, 'Item5', '', '', '', '', 'active'),
(1514, 43, '', 'Ecom 1 ', 'Ecom 2', 'Ecom 3', 'Ecom 4', 'active'),
(1515, 43, '', 'Rs.9999', 'Rs.24,999', 'Rs.44,999', 'Enquire Now', 'active'),
(1516, 43, 'Unlimited Categories', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1517, 43, 'Unlimited Products', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1518, 43, 'Unlimited Manufacturers', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1519, 43, 'Payment Gateway', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1520, 43, 'Framework', 'No', 'No', 'Yes', 'Yes', 'active'),
(1521, 43, 'Responsive', 'No', 'No', 'Yes', 'Yes', 'active'),
(1522, 43, 'Design', 'Template', 'Template Customization', 'Fresh One', 'Responsive', 'active'),
(1523, 43, 'Multi Language', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1524, 43, 'Product Reviews', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1525, 43, 'Related Products', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1526, 43, 'Product Ratings', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1527, 43, 'Multi Currency', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1528, 43, 'SEO Friendly', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1529, 43, 'Multiple Tax Rates', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1530, 43, 'Printable Invoices', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1531, 43, 'Automatic Image Resizing', 'No', 'No', 'Yes', 'Yes', 'active'),
(1532, 43, 'Shipping Weight Calculation', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1533, 43, 'Sales Reports', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1534, 43, 'Information Pages', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1535, 43, 'Discount Coupon System', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1536, 43, 'Domain Name', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1537, 43, 'Disk Space', '500 MB', '1000 MB', '2000 MB', 'Unlimited', 'active'),
(1538, 43, 'Bandwidth', '2000 MB', '5000 MB', '12000 MB', 'Unlimited', 'active'),
(1539, 43, 'Email Account', '1', '2', '5', '10', 'active'),
(1540, 43, 'Slider', '1', '2 Images', '10', 'Unlimited', 'active'),
(1541, 43, 'Statcounter', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1542, 43, 'Enquiry Form', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1543, 43, 'Logo', 'No', 'Simple', 'Professional', 'Professional', 'active'),
(1544, 43, 'Facebook Page', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1545, 43, 'Facebook Likes', 'No', 'No', '100', '1000', 'active'),
(1546, 43, 'Google Map', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1547, 43, 'Sitemap', 'No', 'No', 'Yes', 'Yes', 'active'),
(1548, 43, 'Robots.txt', 'No', 'No', 'Yes', 'Yes', 'active'),
(1549, 43, '', 'Rs.9999', 'Rs.24,999', 'Rs.44,999', 'Enquire Now', 'active'),
(1596, 42, '', 'Dyno 1 ', 'Dyno 2', 'Dyno 3', 'Dyno 4', 'active'),
(1597, 42, '', 'Rs.4999', 'Rs.7499', 'Rs.9999', 'Enquire Now', 'active'),
(1598, 42, 'Domain Name', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1599, 42, 'Disk Space', '500 MB', '1000 MB', '2000 MB', 'Unlimited', 'active'),
(1600, 42, 'Pages', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(1601, 42, 'Admin Panel', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1602, 42, 'Responsive', 'No', 'No', 'Yes', 'Yes', 'active'),
(1603, 42, 'Design', 'Template', 'Template Customization', 'Fresh One', 'Responsive', 'active'),
(1604, 42, 'Bandwidth', '2000 MB', '5000 MB', '12000 MB', 'Unlimited', 'active'),
(1605, 42, 'Email Account', '1', '2', '5', '10', 'active'),
(1606, 42, 'Slider', 'No', '3 Images', '5', 'Unlimited', 'active'),
(1607, 42, 'Image Gallery', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1608, 42, 'Statcounter', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1609, 42, 'Contact Form', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1610, 42, 'Enquiry Form', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1611, 42, 'Logo', 'No', 'Simple', 'Professional', 'Professional', 'active'),
(1612, 42, 'SEO Friendly', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1613, 42, 'Facebook Page', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1614, 42, 'Facebook Likes', 'No', 'No', '100', '1000', 'active'),
(1615, 42, 'Google Map', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(1616, 42, 'Sitemap', 'No', 'No', 'Yes', 'Yes', 'active'),
(1617, 42, 'Robots.txt', 'No', 'No', 'Yes', 'Yes', 'active'),
(1618, 42, '', 'Rs.4999', 'Rs.7499', 'Rs.9999', 'Enquire Now', 'active'),
(1737, 29, '', 'Basic', 'Starter', 'Regular', 'Professional', 'active'),
(1738, 29, '', 'Rs.499 per year', 'Rs.999 per year', 'Rs.1799 per year', 'Rs.4999 per year', 'active'),
(1739, 29, 'Disk Space', '200 MB', '500 MB', '1000 MB', '5000 MB', 'active'),
(1740, 29, 'Bandwidth', '500 MB', '1500 MB', '3000 MB', '20000 MB', 'active'),
(1741, 29, 'Domains Allowed', '1', '3', 'Unlimited', 'Unlimited', 'active'),
(1742, 29, 'Email Accounts', '1', '3', '10', 'Unlimited', 'active'),
(1743, 29, '99.9% Guarantee', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1744, 29, 'Cpanel', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1745, 29, 'MySQL Databases', '1', '3', 'Unlimited', 'Unlimited', 'active'),
(1746, 29, 'CGI	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1747, 29, 'Fast CGI	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1748, 29, 'PHP 5', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1749, 29, 'Ruby On Rails', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1750, 29, 'SSH	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1751, 29, 'Perl', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1752, 29, 'Python', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1753, 29, 'SSI', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1754, 29, 'FrontPage', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1755, 29, 'Cron', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1756, 29, 'Curl', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1757, 29, 'Image Magick	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1758, 29, 'GD 2', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1759, 29, 'Streaming Audio/Video', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1760, 29, 'POP3 Accounts', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1761, 29, '24x7 Support', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1762, 29, 'E-mail Alias	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1763, 29, 'Auto Responders	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1764, 29, 'Mailing Lists	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1765, 29, 'Catch Alls	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1766, 29, 'Spam Assassin', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1767, 29, 'Mail Forwarding', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1768, 29, 'IMAP Support', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1769, 29, 'SMTP', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1770, 29, 'AWStats', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1771, 29, 'Webalizer', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1772, 29, 'Raw Log Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1773, 29, 'Referrer Logs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1774, 29, 'Error Logs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1775, 29, 'QuickInstall', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1776, 29, 'Soholaunch', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1777, 29, 'Hotlink Protection', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1778, 29, 'IP Deny Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1779, 29, 'Custom Error Pages', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1780, 29, 'Instant Blogs', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1781, 29, 'Instant Portals', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1782, 29, 'Instant PHPnuke', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1783, 29, 'Instant Forums', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1784, 29, 'Instant Guestbook', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1785, 29, 'Instant Counter', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1786, 29, 'Instant FormMail', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1787, 29, 'Redirect URL', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1788, 29, 'Web Based File Manager', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1789, 29, 'PW Protected Directories	', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1790, 29, 'phpMyAdmin', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1791, 29, 'Shared SSL', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1792, 29, 'osCommerce', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1793, 29, 'ZenCart', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1794, 29, 'Cube Cart', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(1795, 29, '', 'Rs.499 per year', 'Rs.999 per year', 'Rs.1799 per year', 'Rs.4999 per year', 'active'),
(2146, 52, '', 'MLM - 1', 'MLM - 2', 'MLM - 3', 'Enquire Now', 'active'),
(2147, 52, '', 'Rs.15000', 'Rs.25000', 'Rs.35000', 'Enquiry Now', 'active'),
(2148, 52, 'Plan Type', 'Binary/Matrix/Level', 'Binary/Matrix/Level', 'Binary/Matrix/Level', 'Custom', 'active'),
(2149, 52, 'Domain Name', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2150, 52, 'Design', 'Simple', 'Customized', 'Professional', 'Responsive', 'active'),
(2151, 52, 'Hosting', '2 GB', '5 GB', '10 GB', 'Unlimited', 'active'),
(2152, 52, 'Emails', '2', '5', '10', 'Unlimited', 'active'),
(2153, 52, 'Referral Link Joining', 'No', 'No', 'Yes', 'Yes', 'active'),
(2154, 52, 'SMS', '0', '5000', '10000', '25000', 'active'),
(2155, 52, 'Member Panel', '', '', '', '', 'active'),
(2156, 52, 'Member Profile', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2157, 52, 'Profile With Photo', 'No', 'No', 'Yes', 'Yes', 'active'),
(2158, 52, 'Edit Profile', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2159, 52, 'Registration Certificate', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2160, 52, 'Tree View', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2161, 52, 'Geneology View', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2162, 52, 'Direct Downline Report', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2163, 52, 'Direct Referral Income Detail', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2164, 52, 'Income/Reward Detail', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2165, 52, 'Pin Generate From Balance', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2166, 52, 'Pin Transfer', 'No', 'No', 'Yes', 'Yes', 'active'),
(2167, 52, 'Pins History', 'No', 'No', 'Yes', 'Yes', 'active'),
(2168, 52, 'Withdraw Request', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2169, 52, 'Withdrawal Report ', 'No', 'No', 'Yes', 'Yes', 'active'),
(2170, 52, 'Withdrawal Status', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2171, 52, 'SMS Integration', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2172, 52, 'Support Ticket', 'No', 'No', 'Yes', 'Yes', 'active'),
(2173, 52, 'Admin Panel', '', '', '', '', 'active'),
(2174, 52, 'New Member List', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2175, 52, 'Member''s Profile Edit', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2176, 52, 'Closing', 'Auto', 'Auto', 'Auto/Yourself', 'Auto/Yourself', 'active'),
(2177, 52, 'Contest Panel', 'No', 'No', 'Yes', 'Yes', 'active'),
(2178, 52, 'Testimonial Panel', 'No', 'No', 'Yes', 'Yes', 'active'),
(2179, 52, 'SMS Panel', 'No', 'No', 'Yes', 'Yes', 'active'),
(2180, 52, 'Photo Gallery', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2181, 52, 'News Panel', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2182, 52, 'Members Geneology View', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2183, 52, 'Members Report', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2184, 52, 'Products Panel', 'No', 'No', 'Yes', 'Yes', 'active'),
(2185, 52, 'Pin Creation', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2186, 52, 'Multi Pin Creation', 'No', 'No', 'Yes', 'Yes', 'active'),
(2187, 52, 'Pin Transfer', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2188, 52, 'Pin Reports', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2189, 52, 'Member''s ID Block/Unblock', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2190, 52, 'Members Payouts', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2191, 52, 'TDS Report', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2192, 52, 'Withdrawal Requests', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2193, 52, 'Payment Report', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2194, 52, 'Rewards Status', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2195, 52, 'Reports Download', 'No', 'Excel', 'Excel', 'Excel', 'active'),
(2196, 52, 'Rewards Report', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2197, 52, 'Rewards List', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2198, 52, 'Member Bank Detail', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2199, 52, 'Date Wise Member List', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2200, 52, 'Members Tree View', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2201, 52, 'Support', 'Email', 'Email', 'Email/Phone', 'Email/Phone', 'active'),
(2202, 52, 'Idwise payout Status', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2283, 43, 'Item1', '', '', '', '', 'active'),
(2284, 43, 'Item2', '', '', '', '', 'active'),
(2285, 43, 'Item3', '', '', '', '', 'active'),
(2286, 43, 'Item4', '', '', '', '', 'active'),
(2287, 43, 'Item5', '', '', '', '', 'active'),
(2288, 31, '', 'Static 1 ', 'Static 2', 'Static 3', 'Static 4', 'active'),
(2289, 31, '', 'Rs.999', 'Rs.2999', 'Rs.4500', 'Rs.6000', 'active'),
(2290, 31, 'Domain Name', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2291, 31, 'Disk Space', '100 MB', '200 MB', 'Unlimited', 'Unlimited', 'active'),
(2292, 31, 'Bandwidth', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(2293, 31, 'Pages', '5', '10', '15', '20', 'active'),
(2294, 31, 'Email Account', '5', '7', '10', '20', 'active'),
(2295, 31, 'Slider', 'No', 'No', 'Yes', 'Yes', 'active'),
(2296, 31, 'Image Gallery', '2', '5', '10', '25', 'active'),
(2297, 31, 'Statcounter', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2298, 31, 'Enquiry Form', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2299, 31, 'Design', 'Template', 'Template Customization', 'Fresh One', 'Responsive', 'active'),
(2300, 31, 'Logo', 'No', 'Simple', 'Professional', 'Professional', 'active'),
(2301, 31, 'SEO Friendly', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2302, 31, 'Facebook Page', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2303, 31, 'Facebook Likes', 'No', 'No', '100', '1000', 'active'),
(2304, 31, 'Google Map', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2305, 31, 'Sitemap', 'No', 'No', 'Yes', 'Yes', 'active'),
(2306, 31, 'Robots.txt', 'No', 'No', 'Yes', 'Yes', 'active'),
(2307, 31, '', 'Rs.999', 'Rs.1999', 'Rs.4500', 'Rs.6000', 'active'),
(2332, 63, '', 'Dyno 1 ', 'Dyno 2', 'Dyno 3', 'Dyno 4', 'active'),
(2333, 63, '', 'Rs.999', 'Rs.2999', 'Rs.4999', 'Enquire Now', 'active'),
(2334, 63, 'Domain Name', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2335, 63, 'Disk Space', '500 MB', '1000 MB', '2000 MB', 'Unlimited', 'active'),
(2336, 63, 'Pages', 'Unlimited', 'Unlimited', 'Unlimited', 'Unlimited', 'active'),
(2337, 63, 'Admin Panel', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2338, 63, 'Responsive', 'No', 'No', 'Yes', 'Yes', 'active'),
(2339, 63, 'Design', 'Template', 'Template Customization', 'Fresh One', 'Responsive', 'active'),
(2340, 63, 'Bandwidth', '2000 MB', '5000 MB', '12000 MB', 'Unlimited', 'active'),
(2341, 63, 'Email Account', '1', '2', '5', '10', 'active'),
(2342, 63, 'Slider', 'No', '3 Images', '5', 'Unlimited', 'active'),
(2343, 63, 'Image Gallery', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2344, 63, 'Statcounter', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2345, 63, 'Contact Form', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2346, 63, 'Enquiry Form', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2347, 63, 'Logo', 'No', 'Simple', 'Professional', 'Professional', 'active'),
(2348, 63, 'SEO Friendly', 'Yes', 'Yes', 'Yes', 'Yes', 'active'),
(2349, 63, 'Facebook Page', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2350, 63, 'Facebook Likes', 'No', 'No', '100', '1000', 'active'),
(2351, 63, 'Google Map', 'No', 'Yes', 'Yes', 'Yes', 'active'),
(2352, 63, 'Sitemap', 'No', 'No', 'Yes', 'Yes', 'active'),
(2353, 63, 'Robots.txt', 'No', 'No', 'Yes', 'Yes', 'active'),
(2354, 63, '', 'Rs.4999', 'Rs.7499', 'Rs.9999', 'Enquire Now', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bc_portfolio`
--

CREATE TABLE IF NOT EXISTS `bc_portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_title` varchar(500) NOT NULL,
  `portfolio_description` text NOT NULL,
  `portfolio_category_id` int(11) NOT NULL,
  `portfolio_live_link` varchar(500) NOT NULL,
  `portfolio_image` varchar(500) DEFAULT NULL,
  `portfolio_tags` varchar(500) NOT NULL,
  `portfolio_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_portfolio`
--

INSERT INTO `bc_portfolio` (`portfolio_id`, `portfolio_title`, `portfolio_description`, `portfolio_category_id`, `portfolio_live_link`, `portfolio_image`, `portfolio_tags`, `portfolio_status`) VALUES
(13, 'SMS World', 'Bizbond.in', 11, 'bizbond.in', 'smsworld.JPG', 'Static Website Designing', 'active'),
(14, 'Weight Loss n Tips', 'weightlossntips.com', 11, 'http://www.weightlossntips.com/', 'graciniacombojia.JPG', 'Static Website Designing', 'active'),
(15, 'Hotel Trishul Manali', 'hoteltrishulmanali.com/landing/', 11, 'hoteltrishulmanali.com/landing/', 'hoteltrishulmanali.JPG', 'Static Website Designing', 'active'),
(16, 'Suits Bazar', 'Ecommerce site', 12, 'suitsbazar.com', 'suitbazar.PNG', 'Dynamic Website Designing', 'active'),
(17, 'GNDSSH', 'Guru Nanak Dev Super Specialty Hospital Website', 13, 'http://gndssh.org/', 'gndssh.PNG', 'Dynamic Website Designing', 'active'),
(18, 'Hotel Trishul Manali', 'hotel trishul manali offical website', 13, 'http://hoteltrishulmanali.com/', 'hotel.PNG', 'Dynamic Website Designing', 'active'),
(19, 'Power Shine Car Care', 'Power Shine Car Care Services', 14, 'http://powershine.co.in/', 'pshine.PNG', 'static website designing', 'active'),
(20, 'Vij Agro', 'Vij Agro Rice Mill Offical Website', 13, 'http://vijagro.com/', 'vijagro.PNG', 'Dynamic Website Designing', 'active'),
(21, 'The Kulcha Lord', 'Kulcha Lord Amritsar', 14, 'http://thekulchalord.com/', 'kulcha.PNG', 'static website designing', 'active'),
(22, 'Bharat Spices', 'Bharat Spices', 13, 'http://bharatspices.in/', 'spices.PNG', 'Dynamic Website Designing', 'active'),
(23, 'We Multi Trade Solutions', 'Trading Solutions', 15, 'http://wemultitradesolution.com/', 'multi.PNG', 'MLM Web Development', 'active'),
(24, 'Affiliates Venture', 'Learn Forex Trading', 15, 'http://www.affiliatesventure.com/', 'affiliateventure.PNG', 'MLM Web Development', 'active'),
(25, 'Court Marriage Services', 'Court Marriage Services', 14, 'http://courtmarriageservices.com/', 'courtmarriage.JPG', 'Dynamic Website Designing', 'active'),
(26, 'Bye Tense', 'Bye Tense', 13, 'http://byetense.com/', 'byetense.JPG', 'Dynamic Website Designing', 'active'),
(27, 'Earn From FB', 'Earnfromfb.com', 13, 'http://earnfromfb.com/', 'earnfromfb.JPG', 'Dynamic Website Designing', 'active'),
(28, 'Waheguru Jaap', 'wahegurujaap.com', 13, 'http://www.wahegurujaap.com/', 'waheguru.png', 'Dynamic Website Designing', 'active'),
(29, 'My Voice World', 'myvoiceworld.com', 15, 'http://myvoiceworld.com/', 'myvoiceworld.JPG', 'MLM Web Development', 'active'),
(30, 'Sky Scrapers', 'skyscrapers.co.in', 13, 'http://skyscrapers.co.in/', 'ss.JPG', 'Dynamic Website Designing', 'active'),
(31, 'Punjab News', 'punjabnews.org', 13, 'http://punjabnews.org/', 'pn.JPG', 'Dynamic Website Designing', 'active'),
(32, 'CPA Buck', 'cpabuck.com', 13, 'http://cpabuck.com/', 'Cpabuck.JPG', 'Dynamic Website Designing', 'active'),
(33, 'Tier 4 Extension', 'tier4extension.com', 13, 'http://www.tier4extension.com/', 't4e.JPG', 'Dynamic Website Designing', 'active'),
(34, 'Universal Installers', 'universalinstallers.co.uk', 13, 'http://universalinstallers.co.uk/', 'ui.JPG', 'Dynamic Website Designing', 'active'),
(35, 'The Politics News', 'thepoliticsnews.com', 13, 'http://thepoliticsnews.com/', 'pnews.JPG', 'Dynamic Website Designing', 'active'),
(36, 'Texture Salon', 'texturesalon.in', 13, 'http://texturesalon.in/', 'ts.JPG', 'Dynamic Website Designing', 'active'),
(37, 'Supreme Health Care', 'supremehealthcare.org', 13, 'http://supremehealthcare.org/', 'shc.JPG', 'Dynamic Website Designing', 'active'),
(38, 'PPC Runner', 'ppcrunner.com', 13, 'http://ppcrunner.com/', 'ppc.JPG', 'Dynamic Website Designing', 'active'),
(39, 'Nano Soft Websolutions', 'nanosoftwebsolutions.co.uk', 14, 'http://nanosoftwebsolutions.co.uk/', 'nsws.JPG', 'Static Website Designing', 'active'),
(41, 'HP Tourism', 'http://hptourism.in/', 13, 'http://hptourism.in/', 'hpt.JPG', 'Dynamic Website Designing', 'active'),
(43, 'Buy Sell Chips', 'buysellchips.com', 14, 'http://buysellchips.com/', 'bsc1.JPG', 'Static Website Designing', 'active'),
(44, 'Metis Pharma', 'A pharma company with their unique products.', 13, 'http://metispharma.com', 'metis-pharma.JPG', 'pharmaceutical, Medical', 'active'),
(45, 'KGN Baba Ecommerce', 'An online store with all types of products.', 12, 'http://kgnbaba.com', 'kgn-baba.jpg', 'ecommerce, shopping cart', 'active'),
(46, 'Adwords Coupon', 'Online coupons site', 12, 'http://adwordscoupon.in', 'adwords.JPG', 'Adwords coupons, shopping cart', 'active'),
(47, 'Punjabi Newspaper - BulandLalkar.com', 'A Punjabi news website with stunning design.', 16, 'http://bulandlalkar.com', 'buland-lalkar.JPG', 'punjabi newspaper, punjabi news website', 'active'),
(48, 'English Newspaper - Punjabkitakat.com', 'A professional online news website.', 16, 'http://punjabkitakat.com', 'punjabikitakat.JPG', 'English news, Newspaper in English, online newspaper', 'active'),
(49, 'Taxiinmelbourne.com', 'An Australian based Taxi Service Website.', 13, 'http://taxiinmelbourne.com.au/', 'taxi-in-melbourne.JPG', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(50, 'Affto.com', 'Multi Affiliate Network Approval Website', 13, 'http://www.affto.com/', 'corp1.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(51, 'Anandiniadventures.com', 'Anandani Adventures an Adventure Website.', 13, 'http://anandiniadventures.com/', 'corp2.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(52, 'Blogstree.com', 'Web Development, Graphic Design Blogs Website.', 13, 'http://www.blogstree.com/', 'corp3.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(53, 'Easymytech.com', 'Easy My Tech Appliances Course Website', 13, 'http://easymytech.com/', 'corp4.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(54, 'Dryeshidhoden.com', 'Tibetan Doctor Dharamshala Mcleodganj Website', 13, 'http://dryeshidhonden.com/', 'corp5.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(55, 'Fusionutsav.com', 'Fusion Utsav a Fashion Website', 13, 'http://fusionutsav.com/', 'corp6.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(56, 'Hawkseyessecurity.com.au', 'Security Company In Melbourne, Australia Website', 13, 'http://hawkseyessecurity.com.au/', 'corp7.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(57, 'Hotellivinnamritsar.com', 'A Best Hotel in Amritsar Website.', 13, 'http://hotellivinnamritsar.com/', 'corp8.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(58, 'Mumbaipropertydeals.com', 'Property Deals in Muumbai Website.', 13, 'http://mumbaipropertydeals.com/', 'corp9.png', 'Static Website, Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(59, 'Puneetmakeovers.com', 'Puneet Makeovers Salon Service Website.', 13, 'http://puneetmakeovers.com/', 'corp10.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(60, 'Shaheedbhagatsinghws.com', 'Shaheed Bhagat Singh Welfare Society Website.', 13, 'http://shaheedbhagatsinghws.com/', 'corp11.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(61, 'Sunrisehousebhagsunag.com', 'Sunrise Hotel Bhagsunag in Dharamshala Website', 13, 'http://sunrisehousebhagsunag.com/', 'corp12.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(62, 'Nandinihomestay.com', 'Home Stays Rooms in Dharamshala Website.', 13, 'http://nandinihomestay.com/', 'corp13.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(64, 'Mywebsitepark.com', 'Start Your Professional Website in One Click.', 13, 'http://mywebsitepark.com/', 'corp141.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(65, 'Kunwar.net', 'Kunwar Vijay Partap Singh Inspector General of Police.', 13, 'http://kunwar.net/', 'corp15.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(66, 'Truedreamevents.com', 'Events Management in Amritsar Website.', 13, 'http://truedreamevents.com/', 'corp16.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(67, 'Visheshcreations.com', 'All Types of Laces and Allied Items in Amritsar.', 13, 'http://visheshcreations.com/', 'corp17.png', 'Responsive Website,Professional Website,Dynamic Website Designing', 'active'),
(68, 'dealsdone.in/powerbank', 'Me Bolt Power Bank Landing Page Design.', 11, 'http://dealsdone.in/powerbank/', 'admin.jpg', '#Landing_page #Power_Bank #Web_Designing', 'active'),
(69, 'dealsdone.in/smartwatch', 'Smart Watch with incredible features Landing Page Design.', 11, 'http://dealsdone.in/smartwatch/', 'adminsmart.jpg', '#Landing_page #Power_Bank #Web_Designing', 'active'),
(70, 'Combo Offer', 'BUY 5 IN 1 SMART WATCH & GET POWER BANK FREE', 11, 'http://dealsdone.in/combo-offer/', 'amins.jpg', '#Web_Development #Landing_Page', 'active'),
(71, 'Norton Antivirus', 'Norton Antivirus Online Help Support.', 11, 'http://kabji.com/', 'admins.jpg', '#Web_Designing #PPC #SEO', 'active'),
(72, 'Rehab Treatment', 'Rehab Treatment A rehab treatment website.', 11, 'http://casinoroon.com/rehab/', 'rehab-admin.jpg', '#web_designing #landing_page #PPC #SEO', 'active'),
(73, 'Worksheet', 'Make the move to a Better Future.', 11, 'http://dealsdone.in/worksheet/', 'admin-work.jpg', '#web_designing #PPC #SEO #brutecorp', 'active'),
(74, 'Norton Antivirus', 'Norton Antivirus OnsiteHelp Support.', 11, 'http://www.bikhu.com/', 'anti-admin.jpg', '#Web_development #SEO #PPC #web_Designing', 'active'),
(75, 'Smart Link World', 'Smart Links Provide Fast & Affordable Cargo Service.', 13, 'http://www.slwwl.com/', 'sm-admin.jpg', '#Web_Designing #PPC #SEO', 'active'),
(76, 'Prime News Punjab', 'Prime News Punjab A News Website.', 13, 'http://primenewspunjab.com/', 'pnp-admin.jpg', '#SEO #PPC #Web_Designing', 'active'),
(77, 'Digital Technologies', 'Digital Technologies Web Development & IT Support Website.', 14, 'http://www.digitaltechonoliges.com/', 'dt-admin.jpg', '#Web_Designing #PPC #SEO', 'active'),
(78, 'Norton Antivirus', 'Norton Antivirus Onsite Support Help.', 11, 'http://xullp.com/', 'virus-admin.jpg', '#Web_Designing #SEO #PPC', 'active'),
(79, 'Web Field Flow', 'Web Development & IT Support Website', 14, 'http://www.webfieldflow.com/', 'web-admin.jpg', '#Web_Development #SEO #PPC', 'active'),
(80, 'Webs Crubel', 'Webs Crubel IT Support & Web Development Website.', 14, 'http://www.webscrubel.com/', 'webs-admin.jpg', '#Web_Developmet #SEO #PPC', 'active'),
(81, 'Join Digital Plus', 'Join Digital Plus Web Developmet & It Service Website.', 14, 'http://joindigitalplus.com/', 'digital-admin.jpg', '#Web_Development #SEO #PPC', 'active'),
(82, 'Ckech.com', 'Best Web Designing Packages at affordable Prices.', 14, 'http://ckech.com', 'ck-admin.jpg', '#Web_Development #PPC #SEO', 'active'),
(83, 'Phone Directory', 'Search Peoples By Name, Email, Phone Number.', 14, 'http://vteka.com/', 'phone-admin.jpg', '#SEO #PPC #Web_Development', 'active'),
(84, 'Work Digital Media', 'Web Development & IT_Support Website.', 14, 'http://workdigitalmedia.com/', 'work-admin.jpg', 'Web_Development, SEO #PPC', 'active'),
(85, 'Shri Sai Dry Fruits', 'Shri Sai Dry Fruits - A Dry Fruits Wholesale Company', 11, 'http://shrisaidryfruits.com/', 'ssd-admin.jpg', '#SEO #PPC #WEB-DESIGNING #Brutecorp', 'active'),
(86, 'Decadence Stylish', 'Decadence Stylish - A Affordable Event Decor', 13, 'http://decadencestyling.com/', 'dec-admin.jpg', '#SEO #PPC #WEB-DESIGNING #Brutecorp', 'active'),
(87, 'HR Solutions', 'Payroll Management Service Website', 14, 'http://allhrsol.com/', 'hsr-admin.jpg', '#SEO #PPC #WEB-DESIGNING #Brutecorp', 'active'),
(88, 'Richkart.in', 'The Online Fashion Store', 13, 'https://richkart.in/', 'rich-admin.jpg', '#SEO #PPC #Brutecorop #Web_Development', 'active'),
(89, 'New Fashion Hotspot', 'New Fashion Hotspot Modeling Agency', 14, 'http://www.newfashionhotspot.com/', 'newfashion-admin.jpg', '#SEO #PPC #Brutecorop #Web_Development', 'active'),
(90, 'Trendcharts', 'A Realtime data Provider', 14, 'http://trendcharts.co/', 'tren-admin.jpg', '#SEO #PPC #Brutecorop #Web_Development', 'active'),
(91, 'Grand Apartment Koduvally', 'Comfortable Apartment living Website', 14, 'http://www.grandapartmentkoduvally.com/', 'grand-admin.jpg', '#SEO #PPC #Brutecorop #Web_Development', 'active'),
(92, 'Jai Maa Chamunda Devi', 'A Tour & Travels Website.', 14, 'http://www.chamundadevitravels.com/', 'jai-admin.jpg', '#SEO #PPC #Brutecorop #Web_Development', 'active'),
(93, 'Prabh Jot Singh', 'An Indian Television Actor Website.', 13, 'http://prabhjotsinghofficial.com/', 'prabh-admin.jpg', '#SEO #PPC #Web_Development', 'active'),
(94, 'Makeup By Kamna Sharma', 'Kamna Sharma Best Makeup Artist.', 13, 'http://makeupbykamna.com/', 'kamna-admin.jpg', '#SEO #PPC #Wenb_development #Brutecorp', 'active'),
(95, 'Skills Educator', 'Skills Educator great place to learn Website.', 13, 'http://skillseducator.com/', 'skillst-weet.jpg', '#SEO #PPC #Wenb_development #Brutecorp', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bc_reviews`
--

CREATE TABLE IF NOT EXISTS `bc_reviews` (
  `review_id` int(11) NOT NULL,
  `review_uname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `review_uemail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `review_ucomment` text COLLATE utf8_unicode_ci NOT NULL,
  `review_parent_id` int(11) NOT NULL,
  `review_service_id` int(11) NOT NULL,
  `review_date` datetime NOT NULL,
  `review_status` enum('inactive','active') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bc_reviews`
--

INSERT INTO `bc_reviews` (`review_id`, `review_uname`, `review_uemail`, `review_ucomment`, `review_parent_id`, `review_service_id`, `review_date`, `review_status`) VALUES
(3, 'Parvesh Dogra', 'parveshprog22@gmail.com', 'Hi, I want to buy a domain for ecommerce website for india. So I want to know which is best for me .com/.co.in/.in that is beneficial for my website.', 0, 46, '2013-02-05 04:02:34', 'active'),
(6, 'Suresh Sharma', 'suresh@gmail.com', 'Awesome service. I took static 2 package. happy to receive my website.', 0, 31, '2013-04-18 02:36:44', 'active'),
(7, 'Umesh Rajput', 'umeshr99878@gmail.com', 'We are absolutely satisfied with their work. They were very flexible....turnaround times were good.', 0, 42, '2013-07-24 03:03:37', 'active'),
(8, 'Jason Ventures', 'jason@gmail.com', 'Under Budget + professionally designed. I know that best web design companies combine design sense with strong SEO. and Brutecorp done it for me under my budget. Will come back for more orders :)', 0, 31, '2013-08-29 03:04:25', 'active'),
(9, 'Rohit kapoor', 'rohit.kapoor8@hotmail.com', 'They are extremely cost-competitive and they have great project management for eCommerce websites.i received my eCommerce website ready in very few bugs and they support me very best..', 0, 43, '2013-08-31 03:20:04', 'active'),
(10, 'Tom Ray', 'tomryan69@yahoo.com', 'BruteCorp Web Design have been most helpful recently when updating our web site to enable myself to take over the role of web master. Although I have limited experience with web sites they were very patient with me and have redesigned the web site to enable me to update it my self on a regular basis. Whenever I contacted them they were very quick to respond in a manner that successfully answered my query without using jargon that I did not understand.. They have also ensured that I have the information I require as and when I need to access the website. I would be pleased to recommend BruteCorp for any website design and would use them myself in the future if the need arose.', 0, 31, '2013-09-11 03:27:01', 'active'),
(11, 'gaganpreet', 'ggagan985@gmail.com', 'They take a very methodical approach to design and development. Each stage is approached with extreme care and attention to detail, and their documentation practices are quite fantastic and very best services at all', 0, 42, '2013-10-23 03:29:34', 'active'),
(12, 'Fasal', 'fasal@gmail.com', 'They’re excellent at sitting down with you and strategizing the project as your requirements. They’re extremely proficient thought partners in that respect.\n\nThey take a very methodical approach to design and development. i recommended everyone, Brutecorp is best in web designing.', 0, 31, '2013-11-27 03:34:24', 'active'),
(13, 'jaskiran', 'jaskirandms@gmail.com', 'i think their staff is really strong. The people they put in charge of managing projects are very efficient. They’re calm and very responsive', 0, 31, '2013-12-31 03:44:40', 'active'),
(14, 'Srishti Aggarwal', 'dannycool@hotmail.com', 'Brutecorp are simply the best web design company I know.\n\nFriendly, helpful, affordable, hard working, flexible and trustworthy, they have everything I want and more. \n\nThey always go the extra and have helped with issues outside of web design too. \n\nBruteCorp are not just a company to do your web site, they are a business you will want as a friend and accompany to be joining in a long term partnership.', 0, 31, '2014-01-07 03:47:04', 'active'),
(15, 'Kelvin Robertson', 'kelvinrobertson@gmail.com', 'The strongest comment I have about their work is that the bar for design quality is very high. It''s been very helpful to us, going from being completely unknown to an emerging brand and a website that exceeds our very high design-quality bar in very less time..', 0, 31, '2014-03-05 03:57:04', 'active'),
(16, 'Mark Peter', 'petersenfine@garry.com', 'I enlisted the services of BruteCorp Web Design to build a website to showcase the wedding photography side of my business. I ask them specific instructions about what it was that I wanted - a very straightforward and uncomplicated site consisting of a welcome page which would explain my wedding photography experience, two galleries (one for pre-wedding pictures and one for wedding pictures) and a contact page. I asked that my email be directed to my existing email address.\n\nBrutecorp Complete Web Services worked extremely efficiently and promptly - following my instructions spot on. They grasped the ''feel'' I was looking for without any further discussions - colour scheme was perfect at their first attempt - I loved what they showed me from the start. They checked that everything was exactly as I wanted it t be at each step of the way and when I added extra things or asked that pictures were re-ordered from what I had originally asked for they did so immediately and followed my instructions exactly. \n\nI can not fault BruteCorp in any way - it was highly professional, extremely efficient and I wouldn''t hesitate to recommend them to anyone wanting a professional looking website. I am delighted with my wedding photography website and extremely happy with the service I received from BruteCorp Complete Web Services.', 0, 31, '2014-05-15 04:10:28', 'active'),
(17, 'Bishan Singh', 'creater@erdn.com', 'I have recommended BruteCorp Complete Web Services to others many times because they are great', 0, 31, '2014-09-09 04:11:48', 'active'),
(18, 'Dipansu Chawla', 'dipansucharwla@gmail.com', 'I’ve been very happy with the way that they’ve been able to efficiently, effectively and quickly come up with good solutions at a very reasonable fee..', 0, 31, '2014-09-30 04:40:27', 'active'),
(19, 'Krishan Kumar', 'kishan@gmail.com', 'I was thinking to develop my website.. but I didnt know much about it.. I just given ordered to these guys & I am very thankful to this company for my website. I am very excited for my website... the web designer team is very helpful & done the changes as I said.', 0, 31, '2014-10-31 04:43:58', 'active'),
(20, 'Glenn Charles', 'glenncharles@gmail.com', 'The service offered by BruteCorp was excellent, they proved to be the utmost professionals. I am very happy with my sites and their work, and I will definitely recommend them anytime.', 0, 42, '2014-11-02 05:15:14', 'active'),
(21, 'Mukesh Mital', 'mukesh@hotmail.com', 'Brute Corp has set up two sites for me, and manages them on an ongoing basis. I have recommended others who are also very pleased with the service they received. Raman Kumar is approachable, professional and immediate. He is unperturbed by new challenges!...', 0, 31, '2014-11-04 05:18:53', 'active'),
(22, 'Nisha Randhawa', 'nisha@gmail.com', 'Friendly and helpful and at the end of the phone if you have any questions. Emails to let you know about updates that can be done for you.', 0, 42, '2014-11-04 05:49:57', 'active'),
(23, 'Viki Grover', 'vikigrover@gmail.com', 'My idea has been translated and improved extremely well.I am very happy with the website. I am also impressed with the speed of my initial phone call to the finished product. I can only highly recommend the services of BruteCorp', 0, 42, '2014-11-04 07:15:33', 'active'),
(24, 'Sumit Luthra', 'sumit@rediffmail.com', 'Brutecorp have good personal and business relationship.They are always there when we need some help. They respond to my team quickly and contact with our development personnel. This is key in our business and essential for any person...', 0, 31, '2014-11-06 02:46:40', 'active'),
(25, 'mubashar', 'mubashar@live.it', 'hi sir web send demo forex mlm', 0, 52, '2014-11-14 16:50:46', 'inactive'),
(26, 'Anonymous', 'rahitransportco@gmail.com', 'Brute Corp was very big fraud company they was taking money for website and does not giving the c panel of our website if you want to build a website please contact to other web designer not even if they make free website because after 20-25 days they will crack your information and band your website so please do not build your website from brute corp Then your mind i am  saying my very bad experience so i would like to share with you.', 0, 31, '2015-01-26 02:40:12', 'inactive'),
(27, 'NKM', 'nabathegreat@yahoo.co.in', 'Matrimonial script', 0, 53, '2015-03-03 10:41:19', 'inactive'),
(28, 'Anusha', 'anusha247lcs@gmail.com', 'Hello Sir/Mam,\n\nI would like to know whether you provide public IPv6 for VPS(Linux) services??\nIf you are providing,its free of cost or  what is the cost of  Single IPv6?\nAnd make sure,provide rDNS to IPv6?\nDo you have PayPal as payment method?\n\nKindly reply soon to my mail.Please send the plan link\n \nThank You', 0, 45, '2015-07-17 07:26:38', 'inactive'),
(29, 'w3plans', 'w3plansseo91@gmail.com', 'I found this blog once, then lost it. Took me forever to come back and find it. I wanted to see what comments you got. Nice blog by the way.I wanted to thank you for the excellent info you have posted on your web site.\n<a rel="dofollow" href="http://w3plans.com">cheap vps hosting</a>', 0, 45, '2015-12-26 07:09:23', 'inactive'),
(30, 'arsh', 'www.arshrandhawa5857@gmail.com', 'hi.. there its arsh ....i was looking for logo destining  stuff on internet then i got this .. i knows illustrator ,Photoshop and good in sketching and designing logos.....i wanna work for your business ...send me email on ..: www.arshrandhawa5857@gmail.com .........<<  plz kindly give the feedback ....', 0, 30, '2016-06-11 23:02:55', 'inactive'),
(31, 'hanuaman karwasra', 'loveveer256@gmail.com', 'i am  intrested in franchisess', 0, 61, '2017-09-02 06:22:31', 'inactive'),
(32, 'G.P.Soni', 'artkranti@yahoo.in', 'Start-up Help.Profit Market .Advertising', 0, 33, '2017-09-18 14:39:11', 'inactive'),
(33, 'Ankit Kumar Singh', 'aasas@gmail.com', 'amazing', 0, 43, '2017-11-10 03:45:58', 'inactive'),
(34, 'Richard bennett', 'Rbnetwork@mac.com', 'We are a small company that sells vitamins and other health products. We have found a good web site used by another company that sells same products that we are selling. We want to change the name of the other company where ever it appears on site. And substitute our url. As gotten from go daddy   So we will have same site and prices  under our url aname and e mail address\n\nWe might make some small,color changes etc ,\n\nCan you do this for us. \n\nPlease advise \nRbnetwork@mac.com', 0, 31, '2017-12-20 05:23:12', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `bc_role`
--

CREATE TABLE IF NOT EXISTS `bc_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_role`
--

INSERT INTO `bc_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'advertiser');

-- --------------------------------------------------------

--
-- Table structure for table `bc_sv_category`
--

CREATE TABLE IF NOT EXISTS `bc_sv_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `category_keyword` varchar(200) NOT NULL,
  `category_image` varchar(200) DEFAULT NULL,
  `category_description` text NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_onhome` enum('false','true') NOT NULL,
  `category_slug` varchar(300) NOT NULL,
  `category_tags` varchar(500) NOT NULL,
  `category_sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_sv_category`
--

INSERT INTO `bc_sv_category` (`category_id`, `category_name`, `category_title`, `category_keyword`, `category_image`, `category_description`, `category_parent_id`, `category_onhome`, `category_slug`, `category_tags`, `category_sort`) VALUES
(1, 'Social Media', 'Social Media', 'Social Media', 'socail.png', '<p>We offers several types of services in social media.</p>', 0, 'true', 'social-media', '', 5),
(2, 'Domain & Hosting', 'Domain & Hosting', 'Domain & Hosting', 'hosting.png', '<p>Domain &amp; Hosting</p>', 0, 'true', 'domain-hosting', '', 2),
(3, 'Website Development', 'Website Development', 'Website Development', 'web-development.png', '<p>Website Development</p>', 0, 'true', 'website-development', 'suits bazar', 1),
(8, 'Online Promotion', 'Online Promotion', 'Online Promotion', 'promotion.png', '<p>Online Promotion</p>', 0, 'true', 'online-promotion', '', 3),
(14, 'Designing', 'Web Designing Amritsar, Logo Designing Amritsar, Brochure Designing', 'Cheap Logo Design, Web Designing Amritsar, Logo Designing Amritsar, Brochure Designing', 'list6.png', '<p>Web Page Design</p><p>Logo Design</p><p>Banner Design</p><p>Brochoure Design</p><p>Flash Ebooks</p><p>Flyers</p>', 0, 'true', 'designing', '', 4),
(19, 'Applications', 'Android Applications Developer, Facebook Applications Developer, IOS Applications Developer', 'Android Applications Developer, Facebook Applications Developer, IOS Applications Developer', 'application.png', '<p>Applications</p>', 0, 'false', 'applications', '', 6),
(29, 'Shared Web Hosting', 'Shared Web Hosting, Shared Web Hosting Amritsar, Web Hosting Amritsar', 'Shared Web Hosting, Shared Web Hosting Amritsar, Web Hosting Amritsar', 'swh.jpg', '<ul><li>Do you have a blog or a business website and looking for low cost web hosting service?</li></ul><p>Do check our shared hosting plans that will definitely suit your personal as well as business website needs! It&rsquo;s cost effective, secure, comes with a big list of ad-ons and easiest to use interface.</p><p>Our shared hosting comes with lot of features bundled together to pace up your online presence with more robust, secure and much professional web hosting services.</p><p><strong>The Shared Hosting Advantage:</strong></p><p>Shared hosting is equally advantageous for home based and small businesses, where you have limited resources to create maximum output. By having your website on our shared hosting your all worries about technical stuff and high hosting costs are gone.</p><p>With our shared hosting you get access to:</p><ul><li>Ample disk space and bandwidth.</li><li>Lot of ready to use scripts for blogs, bulletin boards, website makers etc.</li><li>24/7 support.</li></ul>', 2, '', 'shared-web-hosting', '', 0),
(30, 'Logo Designing', 'Professional Logo Design at cheap price, Logo Designing in Amritsar', 'Cheap Logo Design,  Professional Logo Design, Logo Designing Amritsar', 'Logo-Design.jpg', '<p>In the present day, to improve your company revenues and to make it brand, to have to create the best logo design this gives the first awesome impression of the company. If your logo is not impressed the clients then the firms loses brownie points before any business sales are made.</p><p>The good logo developer can helps to increase brand reputation and business ratio by the power of the logo design. So that why our logo developers are very expects and experienced persons.</p><p>A great deal of dedication, creativity and efforts are needed to create the logo. Once you set your eyes on the logo, you should know which company it belongs and what it&rsquo;s selling.</p><p>Having the best logo design, a company&rsquo;s name will reverberate in the annals of the business industry and also among all its customers.</p>', 14, '', 'logo-designing', '', 2),
(31, 'Static Website Designing', 'Static Website Designer, Cheap web designer India, Static Web Designer India', 'Static Website Designer, Cheap web designer India, Static Web Designer India', 'static-web-design1.jpg', '<p><strong>Static Website</strong> is suitable for you, If you don&#39;t or rarely need of changes in your web pages. You can&#39;t run any web application in static website.&nbsp;Static web page are made in HTML &amp; CSS ends with .html&nbsp;</p><p>A static web page is a HTMl page that is provided to user as it is saved on the web server. A static web page provides the same amount of information to all users despite of the level of a visitor as each page is coded in plain HTML. Though today&#39;s servers are able to provide different language options to users depending upon the location of the user, but the actual content remains the same.</p><p>Static pages are simple HTML pages saved on the server as plain HTML files and are delivered to the user as HTTP requests. User make the requests to the server with page url&#39;s and formatted HTML content is delivered to user machine.</p><p>Static sites are the most basic type of websites and are generally quite cheaper to develop. As they are simple text pages, the size of each page is relatively small a and the whole website consumes quite less space and thus lowering the hosting cost.</p><p>Static websites require an expert in web development to update the web content. Means you need a permanent <strong>static website designer</strong> to update your website.</p><p>Static websites are easy to create &amp; cheap in cost. Design is what makes your site look differently from the crowd of your competitors. To design a custom website for personalized and you will have a unique graphic design solution that will help you get your visitors to influence the election design.</p><p>We offer website designs high quality customs and other related services at a very affordable price. Our packages are specially formatted for your small business website up and running quickly, without breaking the bank.</p><p>Our custom website design and illustration new logo is created with passion, intelligence and an eye on industry trends. Whatever your needs, we are confident that our website and logo design will delight your friends and customers.</p>', 3, '', 'static-website-designing', 'suits bazar,ppc runner', 0),
(32, 'PPC ( Adwords, Bing, FB & 7search )', 'Professional PPC Service, Adwords PPC, Yahoo/Bing PPC, Facebook PPC', 'Professional PPC Service, Adwords PPC, Yahoo/Bing PPC, Facebook PPC', 'adwords-ppc.jpg', '<p>When it comes to online marketing for businesses, it&rsquo;s incomplete without PPC. Knowing the importance of Pay Per Click advertising, we&rsquo;ve reserved space for it too! We offer pay per click campaigns strategy, execution and management for AdWords, Micrsoft Ad Center, Yahoo Search Marketing, Facebook and various other platforms, depending upon the requirements of your niche.</p><p>Our Pay Per Click experts and the industry gurus with years of experience in creating and managing Pay Per Click Advertising for local and international businesses. We know that for you budget is the most important factor, so we work at our best to provide you the optimum results at minimum budget!</p><p>Whether you are an individual business consultant, a furniture maker, baker, nationwide car hire service or an SME with regional offices we have packages to cater your exact requirements.</p><p>Check out our packages and select the one that best suits you.</p>', 8, '', 'ppc-adwords-bing-fb-7search', 'ppc runner', 0),
(33, 'Andriod Applications', 'Andriod Applications Service, Get Your Website Andriod Apps', 'Andriod Applications Service, Andriod Apps, Website Andriod Apps', 'aa.jpg', '<p>Andriod Applications Service, Andriod Apps, Website Andriod Apps</p>', 19, '', 'andriod-applications', '', 1),
(34, 'Facebook Applications', 'Facebook Applications, Get Facebook Apps', 'Facebook Applications, Get Facebook Apps', 'fa.jpg', '<p>Facebook Applications, Get Facebook Apps</p>', 19, '', 'facebook-applications', '', 2),
(35, 'IOS Applications', 'IOS Applications, Create IOS Apps, Create Apple Apps', 'IOS Applications, Create IOS Apps, Create Apple Apps', 'ia.jpg', '<p>IOS Applications, Create IOS Apps, Create Apple Apps</p>', 19, '', 'ios-applications', '', 3),
(36, 'Web Banner Designing', 'Web Banner Designing, Professional Banner Designing', 'Web Banner Designing, Professional Banner Designing, Banner Design', 'wbd.jpg', '<p>Banner Desiging is very useful today for advertising on web.If Banner looks good and attractive wvwey one clicks on it..Much like any form of advertising, however, the success of a given campaign can be easily ruined by a bad design. For&nbsp;many sites,Banner Advertsing is fundamental source of revenue.&nbsp;</p><p>Designing a banner ad to be used on someone else&#39;s site is a different process to producing your own entire site for the same purpose. Limited space and control over positioning present challenges to the design process, but with the right planning and consideration, they don&#39;t need to impact your ad that much.</p>', 14, '', 'web-banner-designing', '', 4),
(37, 'Brochure Designing', 'Brochure Designing, Quality Brochure Designing at cheap price', 'Brochure Designing, Quality Brochure Designing, Cheap Brochure Design', 'bd.jpg', '<p>Brochure Designing, Quality Brochure Designing, Cheap Brochure Design</p>', 14, '', 'brochure-designing', '', 3),
(38, 'Landing Page', 'Landing Page Designing, Fully coded landing page with enquiry form', 'Landing Page Designing, Fully coded landing page, Cheap landing page', 'lp.jpg', '<p>Landing Page Designing, A landing page is any web page that a visitor can arrive at or &ldquo;land&rdquo; on. However, when discussing landing pages within the realm of marketing and advertising,&nbsp;Landing pages are often linked to from social media, email campaigns or search engine marketing campaigns in order to enhance the effectiveness of the advertisements.</p>', 14, '', 'landing-page', '', 1),
(39, 'SEO', 'SEO at cheap prices, Cheap SEO Packages, Professional SEO', 'SEO at cheap prices, Cheap SEO Packages, Professional SEO', 'seo.jpg', '<p>SEO at cheap prices, Cheap SEO Packages, Professional SEO</p>', 8, '', 'seo', '', 0),
(40, 'Email Marketing', 'Email Marketing Services, Cheap Email Marketing Services', 'Email Marketing Services, Cheap Email Marketing Services', 'em1.jpg', '<p>Email Marketing Services, Cheap Email Marketing Services</p>', 8, '', 'email-marketing', '', 0),
(42, 'Dynamic Website Designing', 'Dynamic Website Designing at cheap price, Cheap Dynamic Website Design', 'Dynamic Web Development, Dynamic Web Design, Dynamic Website Designing', 'dy.jpg', '<p><strong>Dynamic Website</strong> helps you to add data, images, videos etc in your website without the help of your web designer. You don&#39;t need to contact your web designer to make changes in your website. You can add/delete/edit multiple pages &amp; contents. Simply you can say you are own boss of your website.&nbsp;</p><p>Dynamic websites are like an application or software developed by a web programmer as per your needs. It is little expensive as compare to static website.&nbsp;</p><p>A pivotal key to reach the bank of information through technology is world wide web which is achieved by creating web pages through web designing. One of the approach to accomplish this is by creating dynamic web pages that display different content each time the page is requested. For instance, the page may change with the time of day, the user that accesses the webpage, or the type of user interaction. Dynamic web designing can be attained using Server side scripting or client side scripting.&nbsp;</p><p>Server-side scripting allows user&#39;s request to be fulfilled by running a script directly on the web server to generate dynamic web pages. &nbsp;It is generally used to provide interactive web sites that interact with database or other data stores. The primary advantage for the same is that server-side scripting has the ability to highly customize the response based on the user&#39;s requirements, access rights, or queries into data stores.</p><p>In Client-side scripting, scripts are run by the viewing web browser, usually in JavaScript or any other scripting language. Web browser downloads the web page content from the server, process the code that&#39;s embedded in the web page, and then displays the updated content to the user.</p><p>The most helpful feature of a dynamic approach to web designing is that content of the pages can be easily manipulated using a separate html interface(generally known as Content Management System). Unlike the static websites where the web programmer needs to access each page to modify the content, admin user of the website can easily access the management tool to update the content of the website.</p>', 3, '', 'dynamic-website-designing', '', 1),
(43, 'eCommerce Web Development', 'eCommerce Web Development, Professional eCommerce Web Design', 'eCommerce Web Development, Professional eCommerce Web Design', 'ecomm.jpg', '<p>eCommerce Web Development&nbsp;at cheap price, Professional eCommerce Web Design</p>', 3, '', 'ecommerce-web-development', '', 2),
(44, 'Reseller Hosting', 'Reseller Hosting Amritsar, Reseller Hosting at cheap price', 'Reseller Hosting Amritsar, Reseller Hosting at cheap price', 'rh.jpg', '<p>&nbsp;</p><ul><li><strong><em>Do you have plenty of websites for which you want a perfect web hosting solution?</em></strong></li><li><strong>Are you a web designer who wants to provide value added services to your clients by providing web hosting service?</strong></li><li><strong>Are you planning to run your own small web hosting company?</strong></li></ul><p>&nbsp;</p><p>Well whatever is your business idea, with our reseller hosting you can bring your idea into life. Our reseller web hosting packages best suit the requirements of a webmaster of multiple sites as well as for establishing a small web hosting company.</p><p><strong>What our Reseller Web Hosting Offers?</strong><br />Our reseller hosting service has all the features that can add great value to your business. With our reseller web hosting you can not only run your business smoothly but will have all the happy customers talking about you as well.</p><p><strong>We provide:</strong></p><ul><li>24 x 7 Support to make sure that your business is running smoothly.</li><li>99% uptime guarantee to ensure your customers do not have any trouble.</li><li>Efficient Backup to meet any uncertain situations if there are.</li><li>Up to date technology for the security of your business.</li><li>Competitive prices, so you can take quick decision!</li></ul>', 2, '', 'reseller-hosting', '', 0),
(45, 'VPS Hosting', 'VPS Hosting, Cheap VPS Hosting, VPS Hosting Amritsar', 'VPS Hosting, Cheap VPS Hosting, VPS Hosting Amritsar', 'VH.jpg', '<p>Is your website getting huge with loads of traffic and disk space that your shared hosting is no more enough for it?<br />Are you planning to build a website that will instantly boost with tons of traffic?<br />Are you a business owner who is looking for a dedicated server but concerned about the cost?<br />If you fall under any of the above categories, you must move to VPS hosting!</p><p>Why VPS hosting should be the first choice?<br />90% of the small businesses move to VPS hosting and prefer it over dedicated server mainly because of the price. Besides that VPS hosting is way better then the shared hosting when it comes to freedom of disk space, bandwidth, unique IP addresses, improved security and of course better technology!</p><p>So, it&rsquo;s your choice!<br />Build a strong base for your business with our VPS Web hosting and ensure your secure online presence!</p>', 2, '', 'vps-hosting', '', 0),
(46, 'Domain Registration', 'Domain Registration, Cheap Domain, Domain Registration Amritsar', 'Domain Registration, Cheap Domain, Domain Registration Amritsar', 'DR.jpg', '<p><strong>Seeking for a domain registrar? </strong></p><p>Register a .in, .com, .org, .net, .co.in, .co or with other domain extensions. We have all extension domain register authorization.</p><p><em><strong>Domain Name Matters Most in Your Online Presence</strong></em></p><p>It won&rsquo;t be wrong to say that domain name determines your online identity and that&rsquo;s how Google, Facebook, eBay, Wikipedia and other websites are the players.&nbsp;Register the Right Domain Now!</p><p>We recommend you to select an accurate domain name and double check it before registering. So, if you&rsquo;re done with the brainstorming and are sure about your domain name, register it now before someone else registers it!</p><p><strong>Do Consider Our Domain Selection and Registration Guidelines:</strong></p><ul><li>A good domain is what reflects your business, so if you want to have company name registered as domain it&rsquo;s great.</li><li>Preferably domain name should be short, so if your company name is too long you can always go with the initials.</li><li>For non corporate sites, if it contains a keyword, that&rsquo;s simply great!</li><li>If domain name of your choice is not available, look for one with hyphen, but still a non hyphen alternate will be better.</li><li>Do add some numbers if desired domain name is not available for registration.</li><li>We also register .edu domains which is best for SEO and a reputable domain extension. Send us email to register any domain.</li></ul>', 2, '', 'domain-registration', '', 0),
(47, 'Facebook Website Integration', 'Facebook Website Integration, Facebook Website Page', 'Facebook Website Integration, Facebook Website Page', 'FWI.jpg', '<p>Facebook Website Integration, Facebook Website Page</p>', 1, '', 'facebook-website-integration', 'suits bazar', 0),
(48, 'Facebook Page & Likes', 'Facebook Page & Likes Service, Real FB Likes', 'Facebook Page & Likes Service, Real FB Likes', 'fbpl.png', '<p>Facebook Page &amp; Likes Service, Real FB Likes</p>', 1, '', 'facebook-page-likes', '', 0),
(49, 'Youtube Views', 'Youtube Views Service, Cheap Youtube Views', 'Youtube Views Service, Cheap Youtube Views', 'yv.png', '<p>Youtube Views Service, Cheap Youtube Views</p>', 1, '', 'youtube-views', '', 0),
(50, 'SMS Marketing', 'SMS Marketing, Cheap SMS, Cheap Promotional SMS, Transection SMS Service', 'SMS Marketing, Cheap SMS, Cheap Promotional SMS, Transection SMS Service', 'sm.jpg', '<p>SMS Marketing, Cheap SMS, Cheap Promotional SMS, Transection SMS Service</p>', 8, '', 'sms-marketing', '', 0),
(51, 'SSL Certification', 'Cheap SSL Certification, Fast SSL Certification, Cheap SSL Certification in Amritsar', 'Cheap SSL Certification, Fast SSL Certification, Cheap SSL Certification in Amritsar', 'SSLC.jpg', '<p>Cheap SSL Certification, Fast SSL Certification, Cheap SSL Certification in Amritsar</p>', 2, '', 'ssl-certification', '', 0),
(52, 'MLM Web Development', 'MLM Web Development, MLM Web Designing, MLM Software', 'MLM Web Development, MLM Web Designing, MLM Software', 'mlm.jpg', '<ul><li>Looking to start a MLM plan?</li><li>Do you have any bad experince with previous designer?</li><li>Don&#39;t know about new rules &amp; regulation of MLM in India?</li><li>Looking for a different MLM plan?</li><li>Want to secure MLM software with correct calculations?</li><li>Looking to Upgrade your website, plan &amp; database?</li><li>Not satisfied with your MLM software?</li></ul><p>Come to us. Our team has more than 12 years experince of MLM plan design, correction, secured databases, backup &amp; many more to run your mlm without any tension. We do Binary Plan, Matrix Plan, Level Plan, Board Plan, Generation Plan, Tripple Leg Matching plan, Online Shopping MLM Plan &amp; any type of mlm plan. Our experts can give you a view on your plan &amp; how you can get success with your mlm plan.</p><p>Take a look at following packages of mlm.</p>', 3, '', 'mlm-web-development', '', 3),
(53, 'Clone/Scripts', 'Clone websites, Ready Scripts, Cheap Clone websites', 'Clone websites, Ready Scripts, Cheap Clone websites', 'cs.png', '<p>Our team can do clone of any website, portal with new look &amp; features. So, its looks totally fresh and elegant. Enquire us for any website clone of:</p><ul><li>Matrimonial&nbsp;</li><li>News&nbsp;</li><li>Classified</li><li>Fiverr</li><li>Buy/Sell Listing Property</li><li>Yahoo Answer</li><li>Hyip&nbsp;</li><li>Game</li><li>Youtube&nbsp;</li><li>Dating</li><li>MLM</li><li>E-commerce</li><li>Affiliate Program</li><li>Others</li></ul><p>&nbsp;</p>', 3, '', 'clonescripts', '', 5),
(54, 'Professional Videos', 'Professional Videos, Introduction videos, Video Creation', 'Professional Videos, Introduction videos, Video Creation', 'PV.png', '<p>Professional Videos, Introduction videos, Video Creation</p>', 8, '', 'professional-videos', '', 0),
(55, 'Email Hosting', 'Email Hosting, Cheap Email Hosting, Secure Email Hosting', 'Email Hosting, Cheap Email Hosting, Secure Email Hosting', 'EH.jpg', '<p>Email Hosting, Cheap Email Hosting, Secure Email Hosting</p>', 2, '', 'email-hosting', '', 0),
(56, 'Hotel Web Solutions', 'Hotel Web Solutions India, Hotel Website Designer', 'Hotel Web Solutions India, Hotel Website Designer, Hotel Website', 'hotel-icon.png', '', 0, 'true', 'hotel-web-solutions', '', 4),
(57, 'Hotel Websites', 'Hotel Website Designer, Hotel Website Design', 'Hotel Website Designer, Hotel Website Design', NULL, '<p>We are pioneer in the development of stunning hotel websites.&nbsp;</p>', 56, 'false', 'hotel-websites', '', 0),
(58, 'Online Booking Gateway', 'Online Booking Gateway, Hotel Online Booking Gateway', 'Online Booking Gateway, Hotel Online Booking Gateway', NULL, '<p>Add online booking engine to your website &amp; get jump in your hotel bookings. We can embed hotel bookig engine with payment gateway facility to your website.</p>', 56, '', 'online-booking-gateway', '', 0),
(59, 'Reviews Service', 'Reviews Sites Reputation, Buy tripadvisor Reviews Service', 'Hotel Reviews Service,  Buy tripadvisor Reviews Service', NULL, '<p>Looking to gain solid reputation on hotel reviews websites? Our team will help you to gain reputation over hotel reviews websites by positive reviews.</p>', 56, 'false', 'reviews-service', '', 0),
(60, 'Virtual Tour Video', 'Hotel Virtual Tour Video Service, Virtual Tour Creator, Virtual Tour Video', 'Hotel Virtual Tour Video Service, Virtual Tour Creator, Virtual Tour Video', NULL, '<p>We offer Virtual Tour Video Service to Hotels, Colleges &amp; organizations. Make a contact with us if you are looking for this service.</p>', 56, 'false', 'virtual-tour-video', '', 0),
(61, 'Franchise', 'Web Design Franchise India, Earn Handsome Profits By Our Franchise', 'Web Design Franchise India, Web Design Franchise, It Franchise, Profitable Franchise', 'franchise.jpg', '<ul><li>Are you looking for reputed business?</li><li>Do you want to earn handsome income?</li><li>Do you want to become a part of up growing team?</li><li>Do you want to earn Name &amp; Fame?</li></ul><p>The solution is Brute Corp Franchise program. We offer low risk business opportunities to work with us. Brute Corp and Sunwebsoft Pvt. Ltd. is a world leader in domain registrations, web development and related online business solutions. Established in 2002 company had experienced rapid growth through the delivery of high value online solutions and outstanding customer service.</p><p>With a team of exceptional creative website designers, web site application developers, Search engine optimization, Facebook and Google Advertising, Logo and graphics designing, ecommerce solutions, team leaders, database programmers, website marketing experts, photographers, PPC Analyst and Social Media Marketing, we provides solutions for your specific needs.</p><p>We have been providing internet consulting, web development, web design, branding, system integration and many other scalable business solutions for B2B, B2C and B2E since 2002</p><p>We help companies of all sizes establish their presence on the internet and promote their services and create a brand presence.</p><p>We employ the very latest in the technology, the best creative minds and our vast experience to provide the advantage a business needs to stand out from the crowd.</p><p>Our teams are built on delivering customer satisfaction beyond reasonable expectations. We enjoy perfection as a rule not something to just strive for.</p><p>Our level of professionalism will be visible in quick turnarounds on the projects because our different global units work in unison to bring perfection to your projects</p><p><strong>Franchise Cost</strong>: Rs.1,00,000 to Rs.5,00,000</p><p><strong>Requirements</strong>:</p><ul><li>Well Furnished Office</li><li>PC/Laptop with Printer &amp; Scanner</li><li>Min. 1 Tele Caller</li><li>Min. 1 Marketing Guy</li></ul><p><strong>Benefits</strong>:</p><ul><li>Attractive Offers &amp; Plans</li><li>Marketing Assistance</li><li>Ongoing Support</li><li>Advertisement Support</li><li>High returns on investment</li><li>Success driven business model</li><li>Full Team Support</li><li>Proven business formula</li><li>Easy to handle the business</li><li>Business opportunity with a reputed brand name</li><li>Highly profitable business</li></ul><p><strong>Desired Franchisee Profile:</strong></p><p>&nbsp;Every franchisee will have to sign agreement for three years, where territory to operate is clearly mentioned. Franchisee must have capacity to invest and attitude to accept the franchise model. We select franchisees through the franchisee Application.</p>', 0, 'false', 'franchise', '', 0),
(62, 'Mission Digital India', 'Mission Digital India Website Plan', 'Cheap Website Plan, Mission Digital India Website Plan', NULL, '<p>Our aim is to have a website of each person in India. That&#39;s why we reduced the price to Rs.999 only. Yes, now having a website is possible for everyone.&nbsp;</p>', 0, 'false', 'mission-digital-india', '', 0),
(63, 'Website@Rs.999', 'Get your website just for Rs.999  only', 'Cheap Website Plan, Mission Digital India Website Plan', NULL, '<p>Get your website just for Rs.999 &nbsp;only</p>', 62, 'false', 'websiters999', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bc_users`
--

CREATE TABLE IF NOT EXISTS `bc_users` (
  `user_id` int(12) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_name_on_bill` varchar(200) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_country` int(11) NOT NULL,
  `user_state` varchar(200) NOT NULL,
  `user_city` varchar(200) NOT NULL,
  `user_zip` int(11) NOT NULL,
  `user_mobile` bigint(11) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_website_url` varchar(100) NOT NULL,
  `user_franchise_fee` int(11) NOT NULL,
  `user_franchise_commission` int(11) NOT NULL,
  `user_referred_by` varchar(200) NOT NULL,
  `user_registered_date` datetime NOT NULL,
  `user_last_updated` datetime NOT NULL,
  `user_activation_key` varchar(32) NOT NULL,
  `user_forgot_password_key` varchar(32) NOT NULL,
  `user_status` enum('inactive','active') NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bc_users`
--

INSERT INTO `bc_users` (`user_id`, `user_fullname`, `user_name_on_bill`, `user_username`, `user_email`, `user_password`, `user_dob`, `user_address`, `user_country`, `user_state`, `user_city`, `user_zip`, `user_mobile`, `user_image`, `user_website_url`, `user_franchise_fee`, `user_franchise_commission`, `user_referred_by`, `user_registered_date`, `user_last_updated`, `user_activation_key`, `user_forgot_password_key`, `user_status`, `user_role_id`) VALUES
(1, 'administrator', '', 'admins', 'info@sunwebsoft.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', '', 0, '0', '0', 0, 0, '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'active', 1),
(8, 'Harpreet Singh', 'Vision One Consulting Services Ltd', 'harpreet', 'er.harpreet86@gmail.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', '14 Melton Rd,\nLeicester LE4 5EA, \nUnited Kingdom\n+44 116 266 9986', 0, '', '', 0, 7805193707, '', 'http://visionone.info', 0, 0, '', '2014-10-14 09:24:56', '0000-00-00 00:00:00', 'f808b11f35b58cabe1e435219cd052d7', '', 'active', 2),
(13, 'Darpinder Singh Kamboj', '', 'dhotfresh', 'dpkamboj91@gmail.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', 'Kamboj Sales Corporation\nkishan Nagar Taran Taran Road\nPh- 9988844777', 0, '', '', 0, 9988844777, '', 'http://dhotfresh.com', 0, 0, '', '2014-10-16 05:13:55', '0000-00-00 00:00:00', 'f2b7641c1f0780785b1cf06df19febdb', '', 'active', 2),
(14, 'Isha Mahajan', '', 'ishamahajan', 'piousisha@gmail.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', '1-2', 0, 'Delhi', 'Delhi', 0, 9560706139, '', '', 0, 10, '', '2014-10-16 05:18:59', '0000-00-00 00:00:00', '', '', 'active', 3),
(15, 'Manpreet Singh', 'Simroze Tour &amp; Travels', 'simroze', 'info@simrozetravels.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', 'Simroze Building,2, Ferozdin Road,\n   Below Hussainpura Bridge, Amritsar-143001', 0, '', '', 0, 9216751025, '', 'simrozetravels.com', 0, 0, '', '2014-10-16 09:35:17', '0000-00-00 00:00:00', '1e1c3194559bd4d83703ea007630b8db', '', 'active', 2),
(18, 'Sunny', 'Vij Agro Export Private Limited', 'vijagro', 'vijagro@gmail.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', 'Vij Agro Export Private Limited,\nVill. Bahadur Wala, Mallanwalla Road, Ferozpur City\nHead Office: K.L. Sons, Border Road\nFirozpur - 152002, Punjab, India', 0, '', '', 0, 9814222677, '', 'http://vijagro.com', 0, 0, '', '2014-10-21 07:39:31', '0000-00-00 00:00:00', 'b5cc85171938cf4d92ad6ba0d75c4371', '', 'active', 2),
(21, 'aman', '', 'amandeep', 'aman@gmail.com', 'fc839e7358e6e592a8e0c1a6c9b9e674', '0000-00-00', '1245', 0, 'punjab', 'amritsar', 0, 858585874, '', '', 1000, 21, '', '2014-10-25 07:33:37', '0000-00-00 00:00:00', '', '', 'active', 3),
(22, 'Raghav Arora', 'Dream Media Facilitators', 'dreammedia', 'dreammediafacilitators@gmail.com', '8329c4e1770b2153a738b9156324103a', '0000-00-00', 'A-46, Indira Park Extension, Street no. 8, New Delhi, 110051', 0, '', '', 0, 9888460280, '', 'http://dreammediaproviders.com/', 0, 0, '', '2014-11-27 04:40:01', '0000-00-00 00:00:00', '7e04368ada5d38376a5e89236aadd158', '', 'active', 2),
(23, 'frank pascua', 'frank', 'greygrey', 'frank_07greygrey@yahoo.com', '67d888c039bd06d4746dffc6fcba2795', '0000-00-00', 'MANILA', 0, '', '', 0, 9997731599, '', 'WWW.TWEETER.COM', 0, 0, '', '2014-12-09 07:35:08', '0000-00-00 00:00:00', 'e0e50530a1cbbdc02b1f13b72e8d58c8', '', 'inactive', 2),
(24, 'Puneet Sharma', 'Metis Pharma', 'metispharma', 'sharma.punneett@gmail.com', '76e26b919aafce09f3d2970b347436c6', '0000-00-00', 'Amritsar', 0, '', '', 0, 9463386198, '', 'http://metispharma.com', 0, 0, '', '2014-12-22 07:37:34', '0000-00-00 00:00:00', 'e45bf4b4cfe06328e1deb1ee10557ead', '', 'active', 2),
(25, 'Navpreet Kohli', 'Navpreet Kohli', 'powershine', 'navpreet.kohli@gmail.com', 'dc1a657ab794cb9774732eba7610b76e', '0000-00-00', '432, Green Field, Majitha Road\nAmritsar, Punjab', 0, '', '', 0, 8196909090, '', 'powershine.co.in', 0, 0, '', '2014-12-22 07:57:15', '0000-00-00 00:00:00', '6e49abd378daaf75907e0cc242c1d49e', '', 'active', 2),
(26, 'Amit Gautam', 'Hotel Trishul Manali', 'hoteltrishul', 'amit_trishul@yahoo.co.in', 'ca27c780e54f6e94024c8ca98a644c7c', '0000-00-00', '175 131 Distt. Kullu (H.P.) India,\nManali\nPhone:01902-252254, 253054', 0, '', '', 0, 9816222254, '', 'hoteltrishulmanali.com', 0, 0, '', '2014-12-22 08:13:36', '0000-00-00 00:00:00', '47a629b2a766fc5367b5e5f6ba1fff50', '', 'active', 2),
(27, 'Chitwan Singh', 'Chitwan Singh', 'texture', 'chitwansinghwalia@gmail.com', 'ec6e0944a4fdddf6d31e81cfe57724e3', '0000-00-00', '5 Taylor Road, Narula''s Mall, Mall Road,Amritsar', 0, '', '', 0, 9501932255, '', 'http://texturesalon.in/', 0, 0, '', '2015-03-04 06:27:40', '0000-00-00 00:00:00', 'ac2cfa32cfbbe24ddf1e110365852e17', '', 'active', 2),
(28, 'Daniel Williams', 'Daniel Williams', 'socialeyes', 'socialeyes.au@gmail.com', 'f22a3051234fc50f678a8dc64dd331c5', '0000-00-00', '14 Halliday Road, Mernda', 0, '', '', 0, 405443338, '', 'www.social-eyes.com', 0, 0, 'Sandeep Singh', '2015-05-07 01:04:12', '0000-00-00 00:00:00', '279343929f3931f75586d5526185f89a', '', 'active', 2),
(29, 'ErickVed', 'ErickVed', 'ErickVed', 'erickvedmz@gmail.com', 'bbad208cfef5b19fba777f595c653c19', '0000-00-00', '444 bis 2 Vincom', 0, '', '', 0, 83222713691, '', 'Hmmmm', 0, 0, '', '2017-09-22 10:52:41', '0000-00-00 00:00:00', '96a41df95fa5160e5b577de7516b2328', '', 'inactive', 2),
(30, 'DavidTig', 'DavidTig', 'DavidTig', 'yourmail@gmail.com', '1154fb16bfefcd9042088d688f50ca7f', '0000-00-00', 'United States', 0, '', '', 0, 88163499488, '', 'None', 0, 0, '', '2017-12-06 15:24:51', '0000-00-00 00:00:00', '88e9e2c2e50de3c9cc2b1f771fbb1e58', '', 'inactive', 2),
(31, 'Michaelsog', 'Michaelsog', 'Michaelsog', 'michael2017@gmail.com', 'b8e8f269abe77def0f84f76f85810802', '0000-00-00', 'FTU', 0, '', '', 0, 83915876672, '', 'Hmmmm', 0, 0, '', '2017-12-11 19:10:26', '0000-00-00 00:00:00', '980ffad8c18f6ef7f0eaca9f77079e2b', '', 'inactive', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bc_category`
--
ALTER TABLE `bc_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `bc_links`
--
ALTER TABLE `bc_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `bc_orders`
--
ALTER TABLE `bc_orders`
  ADD PRIMARY KEY (`order_id`), ADD KEY `order_category_id` (`order_category_id`), ADD KEY `order_franchise_id` (`order_franchise_id`), ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `bc_plans`
--
ALTER TABLE `bc_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `bc_portfolio`
--
ALTER TABLE `bc_portfolio`
  ADD PRIMARY KEY (`portfolio_id`), ADD KEY `portfolio_category_id` (`portfolio_category_id`);

--
-- Indexes for table `bc_reviews`
--
ALTER TABLE `bc_reviews`
  ADD PRIMARY KEY (`review_id`), ADD KEY `review_service_id` (`review_service_id`);

--
-- Indexes for table `bc_sv_category`
--
ALTER TABLE `bc_sv_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `bc_users`
--
ALTER TABLE `bc_users`
  ADD PRIMARY KEY (`user_id`), ADD KEY `countrycode` (`user_country`), ADD KEY `statecode` (`user_state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bc_category`
--
ALTER TABLE `bc_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bc_links`
--
ALTER TABLE `bc_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bc_orders`
--
ALTER TABLE `bc_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `bc_plans`
--
ALTER TABLE `bc_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2355;
--
-- AUTO_INCREMENT for table `bc_portfolio`
--
ALTER TABLE `bc_portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `bc_reviews`
--
ALTER TABLE `bc_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `bc_sv_category`
--
ALTER TABLE `bc_sv_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `bc_users`
--
ALTER TABLE `bc_users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bc_orders`
--
ALTER TABLE `bc_orders`
ADD CONSTRAINT `bc_orders_ibfk_1` FOREIGN KEY (`order_category_id`) REFERENCES `bc_sv_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `bc_orders_ibfk_2` FOREIGN KEY (`order_franchise_id`) REFERENCES `bc_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `bc_orders_ibfk_3` FOREIGN KEY (`order_user_id`) REFERENCES `bc_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bc_portfolio`
--
ALTER TABLE `bc_portfolio`
ADD CONSTRAINT `bc_portfolio_ibfk_1` FOREIGN KEY (`portfolio_category_id`) REFERENCES `bc_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bc_reviews`
--
ALTER TABLE `bc_reviews`
ADD CONSTRAINT `bc_reviews_ibfk_1` FOREIGN KEY (`review_service_id`) REFERENCES `bc_sv_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
