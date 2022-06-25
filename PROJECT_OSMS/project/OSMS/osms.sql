-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 07:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'admin@osms.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `dop` date NOT NULL,
  `p_avail` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `original_cost` int(11) NOT NULL,
  `selling_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`p_id`, `p_name`, `dop`, `p_avail`, `p_total`, `original_cost`, `selling_cost`) VALUES
(4, 'Mouse', '2020-12-16', 38, 40, 80, 150),
(8, 'Keyboard', '2020-12-17', 30, 30, 350, 450);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `r_no` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `requestinfo` text COLLATE utf8_bin NOT NULL,
  `requestdesc` text COLLATE utf8_bin NOT NULL,
  `reqName` varchar(40) COLLATE utf8_bin NOT NULL,
  `requesteradd1` text COLLATE utf8_bin NOT NULL,
  `requesteradd2` text COLLATE utf8_bin NOT NULL,
  `reqCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `reqState` varchar(60) COLLATE utf8_bin NOT NULL,
  `requesterzip` int(11) NOT NULL,
  `requesterEmail` varchar(60) COLLATE utf8_bin NOT NULL,
  `requesterMobile` bigint(11) NOT NULL,
  `assigntech` varchar(60) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`r_no`, `request_id`, `requestinfo`, `requestdesc`, `reqName`, `requesteradd1`, `requesteradd2`, `reqCity`, `reqState`, `requesterzip`, `requesterEmail`, `requesterMobile`, `assigntech`, `date`) VALUES
(8, 30, 'Lenovo Laptop', 'laptop screen is blinking', 'Test User', '1234b', 'railway colony', 'karachi', 'Sindh, Pakistan', 44707, 'user@osms.com', 12345678910, 'Oreal Aslam', '2020-12-10'),
(10, 25, 'Oven Microwave', 'Microwave oven not working', 'Oreal Aslam', '109-B mateen society', 'Butt chowk college road township', 'Lahore', 'Punjab, Pakistan', 12707, 'orealaslam@gmail.com', 3184276019, 'Mr. Murad', '2020-12-15'),
(11, 27, 'Samsung Mobile', 'Samsung A20 glass break', 'Test User', 'Railway road', 'Drig road', 'Karachi', 'Karachi, Pkaistan', 43201, 'testuser@osms.com', 30078756210, 'Technician', '2020-12-15'),
(12, 31, 'Washing Machine', 'Automatic Machine is not displaying anything on display', 'Test User', '113B', 'Malir Karachi, Cantt', 'Karachi', 'Sindh, Pakistan', 44707, 'testuser@osms.com', 90078601, 'Technician', '2020-12-15'),
(13, 32, 'Water Pump', 'water pump is not working', 'Asad Ullah Ch', 'Harbancepura', 'Canal Road', 'Lahore', 'Punjab, Pakistan', 22307, 'assadullahch@gmail.com', 3231122334, 'Oreal', '2020-12-17'),
(14, 33, 'Haier Refrigerator', 'Not cooling properly', 'User', '235A', 'DHA phase-5', 'Lahore', 'Punjab, Pakistan', 33071, 'user@osms.com', 3123456789, 'Tahir', '2020-12-19'),
(15, 34, 'Honda Civic', 'Black smoke', 'Oreal Aslam', '109B', 'College road', 'Township Lahore', 'Punjab Pakistan', 33701, 'orealaslam@gmail.com', 3014370416, 'Tahir', '2020-12-19'),
(16, 37, 'Refrigrator', 'Haier Refrigrator is not working properly', 'Oreal', 'township', 'c-2', 'lahore', 'punjab', 33071, 'orealaslam@gmail.com', 3184276019, 'Tahir', '2021-02-18'),
(17, 36, 'User', 'Honda Accord 2013 model millage problem', 'User at OSMS', 'White Pully', 'Ghorey Shah', 'Lahore', 'Punjab, Pakistan', 33701, 'user@osms.com', 3132345678, 'Tahir', '2021-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cust_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `cust_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cust_addr` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`cust_id`, `p_id`, `cust_name`, `cust_addr`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(54, 4, 'Oreal Aslalm', 'Township Lahore', 'Mouse', 2, 150, 300, '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'Test', 'test@osms.com', '123456'),
(4, 'user', 'user@osms.com', '123456'),
(6, 'Test User', 'test@osms.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `requestinfo` text COLLATE utf8_bin NOT NULL,
  `requestdesc` text COLLATE utf8_bin NOT NULL,
  `reqName` varchar(60) COLLATE utf8_bin NOT NULL,
  `requesteradd1` text COLLATE utf8_bin NOT NULL,
  `requesteradd2` text COLLATE utf8_bin NOT NULL,
  `reqCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `reqState` varchar(60) COLLATE utf8_bin NOT NULL,
  `requesterzip` int(11) NOT NULL,
  `requesterEmail` varchar(60) COLLATE utf8_bin NOT NULL,
  `requesterMobile` bigint(20) NOT NULL,
  `assigntech` varchar(60) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `requestinfo`, `requestdesc`, `reqName`, `requesteradd1`, `requesteradd2`, `reqCity`, `reqState`, `requesterzip`, `requesterEmail`, `requesterMobile`, `assigntech`, `date`) VALUES
(38, 'Honda CD-70', 'Black Smoke', 'Oreal Aslam', 'Lahore', 'Township', 'Lahore', 'Punjab, Pakistan', 3301, 'orealaslam@gmail.com', 3184276019, '', '2021-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `tech_id` int(11) NOT NULL,
  `tech_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `tech_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `tech_city` varchar(30) COLLATE utf8_bin NOT NULL,
  `tech_mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`tech_id`, `tech_name`, `tech_email`, `tech_city`, `tech_mobile`) VALUES
(4, 'Technician', 'tech@osms.com', 'Technician', 900078601),
(5, 'Tahir', 'tahir@osms.com', 'Islamabad', 90078601),
(6, 'Arham Khan', 'arham@osms.com', 'Arham', 512345678);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`tech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
