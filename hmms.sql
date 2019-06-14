-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2019 at 04:35 PM
-- Server version: 5.5.18
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `address` varchar(150) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `phone`, `password`, `photo`) VALUES
(1, 'Arifa Nafees', 'H no. 285 Mohalla Kamboh Marehra Distt-Etah (u.p)', 'nafeesarifa07@gmail.com', '9456232286', '1234', 'admin-icon.png'),
(27, 'Aayesha Fatema', 'D7, Bibi Fatima Hall, AMU', 'atfatema@gmail.com', '9758268146', 'pandapurse', '1.jpg'),
(25, 'Zainab Israr', 'A-205 SN Hall AMU Aligarh', 'zainabisrar99@gmail.com', '9450825561', '1234', 'student-2-512.png'),
(26, 'Tabassum', 'A-219 S.N Hall A.M.U Aligarh', 'tabassum@yahoo.com', '7891236541', '1234', 'admin-icon.png'),
(21, 'Abcd', 'xyz, AMU Aligarh', 'abcd@gmail.com', '9876543210', 'abcd', 'admin-icon.png'),
(22, 'Muhammad Ashhab Khan', 'H no. 285 Moh Kamboh, Marehra Distt etah (U.P)', 'muhammadashhabkhan@gmail.com', '9458633784', 'arifa', ''),
(28, 'Zainab Mansoor', 'D7, Bibi Fatima Hall, AMU', 'jgfgfggh2ghf2@gmail.com', '6546464556', '123456', 'whatsapp-status.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dinningstatus`
--

CREATE TABLE IF NOT EXISTS `dinningstatus` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(10) NOT NULL,
  `current_status` varchar(100) NOT NULL,
  `updated_on` date NOT NULL,
  `month` varchar(100) NOT NULL,
  `no_of_days_present` int(100) NOT NULL,
  `no_of_days_absent` int(100) NOT NULL,
  `foodtype` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `dinningstatus`
--

INSERT INTO `dinningstatus` (`id`, `studentid`, `current_status`, `updated_on`, `month`, `no_of_days_present`, `no_of_days_absent`, `foodtype`) VALUES
(21, 'gi7405', 'off', '2018-03-24', '3', 31, 6, 'veg'),
(23, 'gi7405', 'on', '2018-04-23', '4', 18, 4, 'veg'),
(26, 'gj4889', 'on', '2018-04-30', '4', 29, 0, 'veg'),
(27, 'gj4889', 'on', '2018-05-10', '5', 9, 0, 'veg'),
(28, 'gi7592', 'on', '2018-04-30', '4', 3, 2, 'veg'),
(29, 'gi7592', 'off', '2018-05-09', '5', 16, 8, 'veg'),
(32, 'gi7111', 'on', '2018-04-30', '4', 2, 0, 'veg'),
(33, 'gi7111', 'off', '2018-05-04', '5', 3, 0, 'veg'),
(34, 'gi7428', 'on', '2018-06-04', '6', 0, 0, 'nonveg'),
(35, 'gk9129', 'on', '2018-08-06', '8', 0, 0, 'nonveg'),
(36, 'GK7607', 'on', '2018-11-30', '11', 0, 0, 'nonveg'),
(37, 'Gk7700', 'on', '2018-11-30', '11', 0, 0, 'nonveg');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `enrollno` varchar(100) NOT NULL,
  `no_of_days_present` int(20) NOT NULL,
  `per_day_cost` float NOT NULL,
  `additional_charges` float NOT NULL,
  `total_fees` int(11) NOT NULL,
  `month` int(200) NOT NULL,
  `fees_paid` float NOT NULL,
  `final_fees` int(200) NOT NULL,
  `dues` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `enrollno`, `no_of_days_present`, `per_day_cost`, `additional_charges`, `total_fees`, `month`, `fees_paid`, `final_fees`, `dues`) VALUES
(27, 'gi7579', 6, 30, 130, 180, 4, 570, 310, -260),
(28, 'GI7419', 4, 30, 30, 120, 4, 500, 150, -350),
(31, 'GI7419', 0, 0, 59, 0, 5, 1200, 59, -5341),
(34, 'GI7405', 24, 33, 30, 792, 3, 550, 822, 272),
(36, 'GI7405', 18, 33, 100, 594, 4, 1300, 694, 606),
(48, 'GJ4889', 29, 33, 50, 957, 4, 700, 1007, -307),
(49, 'GJ4889', 9, 33, 0, 297, 5, 300, 297, -310),
(65, 'gi7111', 2, 33, 10, 66, 4, 60, 76, -16),
(66, 'GI7428', 0, 36, 0, 0, 6, 500, 0, -500);

-- --------------------------------------------------------

--
-- Table structure for table `issueitem`
--

CREATE TABLE IF NOT EXISTS `issueitem` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `itemid` int(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `issueitem`
--

INSERT INTO `issueitem` (`id`, `itemid`, `date`, `quantity`) VALUES
(51, 58, '2018-04-22 10:52:53', 1),
(50, 1, '2018-04-22 10:52:53', 10),
(49, 6, '2018-04-22 10:52:53', 10),
(48, 49, '2018-04-20 17:28:43', 5),
(47, 1, '2018-04-20 17:06:09', 1),
(46, 1, '2018-04-19 11:34:48', 50),
(45, 5, '2018-04-19 11:34:48', 40),
(44, 55, '2018-04-19 11:34:48', 50),
(43, 55, '2018-04-09 07:07:52', 10),
(42, 55, '2018-04-11 00:06:58', 10),
(41, 18, '2018-04-11 00:06:58', 5),
(40, 55, '2018-04-06 11:44:29', 10),
(39, 1, '2018-04-06 11:41:59', 20),
(38, 49, '2018-04-06 11:39:31', 50),
(52, 17, '2018-04-22 15:17:33', 20),
(53, 10, '2018-04-22 15:17:33', 10),
(54, 10, '2018-04-22 15:18:01', 10),
(55, 10, '2018-04-22 15:19:57', 10),
(56, 18, '2018-04-23 03:53:44', 2),
(57, 6, '2018-04-23 03:53:44', 2),
(58, 18, '2018-04-23 03:54:23', 1),
(59, 6, '2018-04-23 03:54:23', 1),
(60, 2, '2018-04-23 03:54:23', 10),
(61, 3, '2018-04-28 16:28:23', 30),
(62, 55, '2018-05-31 17:36:54', 100),
(63, 18, '2018-05-31 17:37:26', 1),
(64, 18, '2018-06-04 16:21:49', 1),
(65, 55, '2018-06-04 16:21:49', 20),
(66, 6, '2018-06-04 18:42:04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `itemname`) VALUES
(1, 'Rice'),
(2, 'Wheat'),
(3, 'Sugar'),
(4, 'Salt'),
(5, 'Milk'),
(6, 'Oil'),
(7, 'Pulses'),
(8, 'Vegetable'),
(9, 'Carrot'),
(10, 'Brinjal'),
(11, 'Raddish'),
(12, 'Tea leaves'),
(55, 'Cumin'),
(14, 'Capsicum'),
(15, 'Bitter Gourd'),
(16, 'Onion'),
(17, 'Potato'),
(18, 'Tomato'),
(51, 'Gram'),
(50, 'Butter'),
(26, 'cauliflower'),
(49, 'Bread'),
(58, 'Mixed Veg-Pickle'),
(57, 'Garlic'),
(56, 'Garlic'),
(54, 'Egg'),
(53, 'Chicken'),
(42, 'Green chilli'),
(52, 'garlic'),
(38, 'Coriander'),
(39, 'Bottle gourd'),
(40, 'Ginger');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) CHARACTER SET utf8 NOT NULL,
  `breakfast` varchar(200) CHARACTER SET utf8 NOT NULL,
  `lunch` varchar(200) CHARACTER SET utf8 NOT NULL,
  `dinner` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `day`, `breakfast`, `lunch`, `dinner`) VALUES
(1, 'Monday', 'Bread, Butter, Tea, Poha', 'Aloo ki sabzi, chapati, rice', 'Cauliflower, Chapati, Rice, Dal'),
(2, 'Tuesday', 'Aloo ke parathe, tea', 'soyabean ki sabzi, chapati, rice, daal', 'Veg Biryani with Rayta'),
(3, 'Wednesday', 'burger/ pav bhaji, tea', 'sabzi, rice, daal, chapati', 'Chicken/paneer, daal, chapati'),
(4, 'Thursday', 'Tea,  besan ke parathe, chutney', ' Saambhar, chapati, rice', 'brinjal, rayta, chapati, rice'),
(5, 'Friday', 'bread, buter ,tea, egg', 'tahiri,chutney(tomato/coriander)', 'chicken/paneer, chapati, fried rice, rayta, sweet dish'),
(6, 'Saturday', 'bread, butter, chana, Tea', 'ric, chapati, french fries, chicken shawarma', 'Egg curry, dal, rice, Chapati'),
(7, 'Sunday', 'muffins and cereal', 'chicken kabab', 'broast, pasta, pizza, fried rice');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitem`
--

CREATE TABLE IF NOT EXISTS `purchaseitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller` varchar(60) CHARACTER SET utf8 NOT NULL,
  `itemid` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `quantity` float NOT NULL,
  `qunit` varchar(10) CHARACTER SET utf8 NOT NULL,
  `rate` float NOT NULL,
  `runit` varchar(10) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `purchaseitem`
--

INSERT INTO `purchaseitem` (`id`, `seller`, `itemid`, `quantity`, `qunit`, `rate`, `runit`, `date`, `total`) VALUES
(91, '3', '10', 30, 'kg', 15, '/kg', '2018-04-22', 450),
(90, '2', '10', 30, 'kg', 15, '/kg', '2018-04-21', 450),
(89, '2', '14', 30, 'kg', 15, '/kg', '2018-04-21', 450),
(88, '2', '17', 10, 'kg', 15, '/kg', '2018-04-22', 150),
(87, '2', '17', 10, 'kg', 15, '/kg', '2018-04-22', 150),
(86, '2', '17', 10, 'kg', 15, '/kg', '2018-04-22', 150),
(85, '2', '18', 10, 'kg', 40, '/kg', '2018-04-10', 400),
(84, '2', '55', 300, 'gm', 100, '/gm', '2018-04-06', 30000),
(82, '3', '1', 50, 'kg', 60, '/kg', '2018-04-06', 3000),
(81, '5', '6', 100, 'pack', 67, '/pack', '2018-04-06', 6700),
(83, '3', '49', 60, 'pack', 30, '/pack', '2018-04-06', 1800),
(79, '1', '5', 60, 'pack', 25, '/pack', '2018-04-06', 1500),
(78, '1', '2', 100, 'kg', 60, '/kg', '2018-04-06', 6000),
(77, '1', '1', 100, 'kg', 60, '/kg', '2018-04-06', 6000),
(92, '1', '18', 5, 'kg', 15, '/kg', '2018-04-12', 75),
(93, '2', '58', 10, 'pack', 100, '/pack', '2018-04-22', 1000),
(94, '2', '17', 30, 'kg', 15, '/kg', '2018-04-21', 450),
(95, '3', '3', 50, 'kg', 50, '/kg', '2018-04-27', 2500),
(96, '1', '4', 5, 'pack', 30, '/pack', '2018-05-25', 150),
(97, '3', '11', 10, 'kg', 10, '/kg', '2018-06-04', 100),
(98, '4', '52', 10, 'kg', 20, '/kg', '2018-11-23', 200);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(10) CHARACTER SET utf8 NOT NULL,
  `address` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `shopname`, `contact`, `address`) VALUES
(1, 'K.C Provision Store', '9897982261', 'Vishnupuri Opp. SBI Bank,  Aligarh'),
(2, 'Vardha Grocery', '9152607916', 'Raghuveer Puri, Infront Of Shriram Dhram Shala,  Aligarh'),
(3, 'Sichermart', '9458620113', 'Opp. Pathak sweet, Kishanpur tiraha, Ramghat Road, Aligarh'),
(4, 'Fair Price', '9720444172', 'Rizvi Apartment, Medical Road Aligarh'),
(5, 'Big Bazar', '7417755530', ' Aligarh');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `qunit` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `itemid`, `quantity`, `qunit`) VALUES
(26, 18, 5, 'kg'),
(25, 55, 100, 'gm'),
(24, 6, 80, 'pack'),
(23, 49, 15, 'pack'),
(22, 5, 20, 'pack'),
(21, 2, 90, 'kg'),
(20, 1, 69, 'kg'),
(27, 17, 30, 'kg'),
(28, 14, 30, 'kg'),
(29, 10, 30, 'kg'),
(30, 58, 9, 'pack'),
(31, 3, 20, 'kg'),
(32, 4, 5, 'pack'),
(33, 11, 10, 'kg'),
(34, 52, 10, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `course` varchar(30) CHARACTER SET utf8 NOT NULL,
  `enroll` varchar(6) CHARACTER SET utf8 NOT NULL,
  `room` int(3) NOT NULL,
  `block` varchar(2) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf32 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `course`, `enroll`, `room`, `block`, `email`, `password`, `photo`) VALUES
(1, 'Arifa Nafees', 'DPIT', 'GI7405', 110, 'A', 'nafeesarifa07@gmail.com', '1234', 'student-2-512.png'),
(2, 'Zainab Israr Ansari', 'DPIT', 'GI7419', 205, 'A', 'zainabisrar99@gmail.com', 'zainab', '380ff3f0124c0c77bfcfd0adb3402b8b.jpg'),
(3, 'Falak Naz', 'dpce', 'gi7579', 13, 'A', 'falucknaz@gmail.com', 'arifalak', ''),
(4, 'Samina Parween', 'DPCE', 'GI7593', 14, 'A', 'samina2000pr@gmail.com', 'samina', 'IMG-20171122-WA0013.jpg'),
(5, 'Rukhsar Tasnim', 'DPEE', 'GI7411', 13, 'A', 'rukhsar.tasnim01@gmail.com', '8979tanya', ''),
(6, 'nausheen anwar', 'dpce', 'gi7586', 115, 'B', 'nausheenanwar39@gmail.com', 'nausheen', 'IMG-20171202-WA0003.jpg'),
(7, 'Bushra Yasmeen', 'DPCE', 'gi7431', 114, 'B', 'bushra19yasmeen@gmail.com', 'umakhan', 'IMG-20171130-WA0004.jpg'),
(9, 'Farheen', 'BDS', 'gh7864', 110, 'A', 'farheen@gmail.com', 'farheen', '74306eef5860833e2e47ff169a73b45b.jpg'),
(17, 'Shagufta Parween', 'DPCE', 'GI7401', 12, 'A', 'shagufta12sp@gmail.com', 'arifa', 'IMG-20171202-WA0011.jpg'),
(22, 'xyz', 'dpit', 'gi7111', 110, 'B', 'xyz@gmail.com', '1234', '20170328_183107.jpg'),
(14, 'Aafreen anjum', 'DPEE', 'gi7598', 114, 'A', 'aafreenanjum123@yahoo.com', 'colgate', 'Tulips.jpg'),
(18, 'deeksha', 'diploma in engg', 'gi7415', 111, 'A', 'jadaundeeksha@gmail.com', 'pagal!@#$%', 'student-2-512.png'),
(15, 'Naqoosh Fatima', 'DPIT', 'GJ4881', 110, 'A', 'naqooshfatima1999@gmail.com', 'falak', 'tumblr_ouf5g8beTS1qdxa23o1_500.jpg'),
(23, 'Tabassum yusuf', 'DPEE', 'GI7428', 219, 'A', 'tabassum7507@gmail.com', '12345', 'student-2-512.png'),
(20, 'Fareha Mohammadi', 'DPEE', 'GJ4889', 3, 'A', 'fareha786muz@gmail.com', '8vlm@1yl', 'admin-icon.png'),
(21, 'Umra Khan', 'DPCE', 'GI7592', 114, 'A', 'umrakhan1441@gmail.com', '1234', 'IMG_20180407_220430.jpg'),
(24, 'Asma Irfan', 'Btech', 'gk9129', 10, 'B', 'arisha.asma@gmail.com', 'abc', 'admin-icon.png'),
(25, 'Aayesha Fatema', 'B. Tech', 'GK7607', 7, 'B', 'atfatema@gmail.com', 'pandapurse', 'student-2-512.png'),
(26, 'Zainab Mansoor', 'B. Tech', 'Gk7700', 7, 'B', 'jgfgfggh2ghf2@gmail.com', '123456', 'DSC_0340-EFFECTS.jpg');
