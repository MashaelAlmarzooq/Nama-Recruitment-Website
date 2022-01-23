-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2021 at 11:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advice`
--

CREATE TABLE `tbl_advice` (
  `advice_id` int(11) NOT NULL,
  `advice_title` varchar(200) NOT NULL,
  `advice` varchar(400) NOT NULL,
  `advice_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emp_id` int(10) NOT NULL,
  `likes` varchar(200) DEFAULT '0',
  `dislikes` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeers`
--

CREATE TABLE `tbl_employeers` (
  `emp_id` int(11) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_password` varchar(200) NOT NULL,
  `emp_phone` varchar(200) NOT NULL,
  `emp_address` varchar(400) NOT NULL,
  `emp_company` varchar(200) NOT NULL,
  `emp_vision` varchar(500) NOT NULL,
  `emp_scope` varchar(500) NOT NULL,
  `emp_mission` varchar(500) NOT NULL,
  `emp_desc` varchar(500) NOT NULL DEFAULT '0',
  `emp_status` int(2) DEFAULT 0,
  `emp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employeers`
--

INSERT INTO `tbl_employeers` (`emp_id`, `emp_email`, `emp_password`, `emp_phone`, `emp_address`, `emp_company`, `emp_vision`, `emp_scope`, `emp_mission`, `emp_desc`, `emp_status`, `emp_date`) VALUES
(1, 'emp@gmail.com', '12345678', '033392770211', 'DotCom Services KP IT Park Board Bazar', 'DotCom Services', 'Neat and  clean softwares', 'Software Developers', 'developers in the room ', 'TEST', 0, '2021-04-14 12:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobpost`
--

CREATE TABLE `tbl_jobpost` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_major` varchar(200) NOT NULL,
  `job_position` varchar(200) NOT NULL,
  `job_desc` varchar(200) NOT NULL,
  `job_skills` varchar(200) NOT NULL,
  `job_qualification` varchar(200) NOT NULL,
  `job_location` varchar(200) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_gender` varchar(100) NOT NULL,
  `job_salary` varchar(100) NOT NULL,
  `job_status` int(2) NOT NULL DEFAULT 1,
  `job_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emp_id` int(11) NOT NULL,
  `company_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jobpost`
--

INSERT INTO `tbl_jobpost` (`job_id`, `job_title`, `job_major`, `job_position`, `job_desc`, `job_skills`, `job_qualification`, `job_location`, `job_type`, `job_gender`, `job_salary`, `job_status`, `job_date`, `emp_id`, `company_name`) VALUES
(1, 'Web developer', 'PHP,HTML,CSS', 'Lead Developer', 'Manage clinet website and web applications', 'PHP,OPPS, Laravel ', 'BS(CS)', 'Saudi Arab', 'full- time', 'Male', '100000 aed', 1, '2021-04-14 12:57:35', 1, 'DotCom Services');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker`
--

CREATE TABLE `tbl_jobseeker` (
  `seeker_id` int(11) NOT NULL,
  `seeker_email` varchar(200) NOT NULL,
  `seeker_password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `seeker_phone` varchar(200) NOT NULL,
  `seeker_current_job` varchar(500) NOT NULL,
  `seeker_majors` varchar(500) NOT NULL,
  `seeker_skills` varchar(500) NOT NULL,
  `seeker_experience` varchar(500) NOT NULL,
  `seeker_gender` varchar(20) NOT NULL,
  `seeker_nationality` varchar(200) NOT NULL,
  `seeker_availability` varchar(20) DEFAULT NULL,
  `seeker_english` varchar(200) DEFAULT NULL,
  `seeker_bio` varchar(500) DEFAULT NULL,
  `seeker_city` varchar(200) DEFAULT NULL,
  `seeker_education` varchar(200) DEFAULT NULL,
  `seeker_dob` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seeker_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jobseeker`
--

INSERT INTO `tbl_jobseeker` (`seeker_id`, `seeker_email`, `seeker_password`, `first_name`, `last_name`, `seeker_phone`, `seeker_current_job`, `seeker_majors`, `seeker_skills`, `seeker_experience`, `seeker_gender`, `seeker_nationality`, `seeker_availability`, `seeker_english`, `seeker_bio`, `seeker_city`, `seeker_education`, `seeker_dob`, `date`, `seeker_status`) VALUES
(1, 'daud@gmail.com', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '2021-04-12 17:39:25', 0),
(3, 'student@gmail.com', '12345678', 'Mian', 'Shah', '033392770211', 'Web Developer ', 'PHP', 'test', 'test', 'Male', 'american', NULL, NULL, NULL, NULL, NULL, '2005-04-08', '2021-04-14 12:58:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_application`
--

CREATE TABLE `tbl_job_application` (
  `app_id` int(11) NOT NULL,
  `job_id` int(20) NOT NULL,
  `job_seeker_id` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `app_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date1` varchar(30) DEFAULT NULL,
  `date2` varchar(30) DEFAULT NULL,
  `date3` varchar(40) DEFAULT NULL,
  `confirm_date` varchar(30) NOT NULL DEFAULT '0',
  `app_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = pending 1= accepted 2=rejected 3=selected  ',
  `confrimed` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_job_application`
--

INSERT INTO `tbl_job_application` (`app_id`, `job_id`, `job_seeker_id`, `emp_id`, `app_date`, `date1`, `date2`, `date3`, `confirm_date`, `app_status`, `confrimed`) VALUES
(11, 1, 3, 1, '2021-04-14 21:17:12', NULL, NULL, NULL, '0', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advice`
--
ALTER TABLE `tbl_advice`
  ADD PRIMARY KEY (`advice_id`),
  ADD KEY `FK_tbl_advice_1` (`emp_id`);

--
-- Indexes for table `tbl_employeers`
--
ALTER TABLE `tbl_employeers`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_email` (`emp_email`);

--
-- Indexes for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `FK_tbl_jobpost_1` (`emp_id`);

--
-- Indexes for table `tbl_jobseeker`
--
ALTER TABLE `tbl_jobseeker`
  ADD PRIMARY KEY (`seeker_id`),
  ADD UNIQUE KEY `seeker_email` (`seeker_email`);

--
-- Indexes for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  ADD PRIMARY KEY (`app_id`),
  ADD UNIQUE KEY `job_id` (`job_id`,`job_seeker_id`),
  ADD KEY `FK_tbl_job_application_1` (`job_id`),
  ADD KEY `FK_tbl_job_application_2` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advice`
--
ALTER TABLE `tbl_advice`
  MODIFY `advice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employeers`
--
ALTER TABLE `tbl_employeers`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobseeker`
--
ALTER TABLE `tbl_jobseeker`
  MODIFY `seeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_advice`
--
ALTER TABLE `tbl_advice`
  ADD CONSTRAINT `FK_tbl_advice_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employeers` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jobpost`
--
ALTER TABLE `tbl_jobpost`
  ADD CONSTRAINT `FK_tbl_jobpost_1` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employeers` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_job_application`
--
ALTER TABLE `tbl_job_application`
  ADD CONSTRAINT `FK_tbl_job_application_1` FOREIGN KEY (`job_id`) REFERENCES `tbl_jobpost` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_job_application_2` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employeers` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
