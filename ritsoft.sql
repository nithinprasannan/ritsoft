-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2016 at 06:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ritsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(5) NOT NULL AUTO_INCREMENT,
  `year_batch` int(5) DEFAULT NULL,
  `course_spec_id` int(5) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `year_batch`, `course_spec_id`) VALUES
(1, 2013, 1),
(2, 2014, 1),
(3, 2015, 1),
(4, 2015, 13),
(5, 2016, 13),
(6, 2010, 2),
(7, 2011, 2),
(8, 2015, 6),
(9, 2016, 4),
(10, 2015, 7),
(11, 2015, 7),
(12, 2016, 8),
(13, 2015, 6),
(14, 2015, 9),
(15, 2016, 9),
(16, 2015, 10),
(17, 2014, 12),
(18, 2015, 11),
(19, 2016, 12),
(20, 2021, 11),
(21, 2028, 6),
(22, 2025, 1),
(23, 2025, 13),
(24, 2017, 4),
(25, 2019, 3);

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE IF NOT EXISTS `blood_group` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bgroup` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `bgroup`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'AB+'),
(4, 'AB-'),
(5, 'B+'),
(6, 'B-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `caste`
--

CREATE TABLE IF NOT EXISTS `caste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `caste`
--

INSERT INTO `caste` (`id`, `caste`) VALUES
(1, 'Ezhava'),
(2, 'Nair'),
(3, 'Kurava'),
(4, 'Pulaya'),
(5, 'Orthodox'),
(6, 'Catholica');

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE IF NOT EXISTS `cc` (
  `cc_no` int(5) NOT NULL AUTO_INCREMENT,
  `adm_no` varchar(10) NOT NULL,
  `chrctr` text NOT NULL,
  PRIMARY KEY (`cc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`cc_no`, `adm_no`, `chrctr`) VALUES
(1, '16BC1', 'Good'),
(2, '16ME8', 'GOOD'),
(3, '16ME2', 'Good'),
(4, '16MP10', 'dfs'),
(5, '16BC5', 'GHG');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` varchar(5) NOT NULL,
  `course` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `no_of_semesters` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `category`, `no_of_semesters`) VALUES
('1', 'Btech', 'ug', 8),
('2', 'Mtech', 'pg', 4),
('3', 'Barch', 'ug', 10),
('4', 'MCA', 'pg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_specialization`
--

CREATE TABLE IF NOT EXISTS `course_specialization` (
  `course_spec_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(5) NOT NULL,
  `spec_id` int(5) NOT NULL,
  PRIMARY KEY (`course_spec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `course_specialization`
--

INSERT INTO `course_specialization` (`course_spec_id`, `course_id`, `spec_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 7),
(7, 2, 8),
(8, 2, 9),
(9, 2, 10),
(10, 2, 11),
(11, 2, 5),
(12, 3, 6),
(13, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` varchar(5) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `hod` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dept` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept`, `hod`) VALUES
('1', 'MCA', 'hodca'),
('2', 'CS', 'hodcs'),
('3', 'ECE', 'hodece'),
('4', 'EEE', 'hodee'),
('5', 'CE', 'hodce'),
('6', 'Arch', 'hodarch'),
('7', 'Mech', 'hodmech');

-- --------------------------------------------------------

--
-- Table structure for table `dept_course`
--

CREATE TABLE IF NOT EXISTS `dept_course` (
  `dept_id` varchar(5) NOT NULL,
  `course_id` varchar(5) NOT NULL,
  `spec_id` int(5) NOT NULL,
  KEY `dept_id` (`dept_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_course`
--

INSERT INTO `dept_course` (`dept_id`, `course_id`, `spec_id`) VALUES
('1', '4', 12),
('2', '1', 5),
('2', '2', 5),
('3', '1', 4),
('3', '2', 10),
('3', '2', 11),
('4', '1', 3),
('4', '2', 8),
('5', '1', 1),
('5', '2', 9),
('6', '3', 6),
('7', '1', 2),
('7', '2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `usertype` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`usertype`, `name`, `username`, `password`) VALUES
('dean', 'j', '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
('student', 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912'),
('dean', 'aaa', 'aaa', 'aaa'),
('hod', 'm', 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f'),
('admin', 'admin', 'admin', '123admin'),
('hod', 'hodca', 'hodca', 'hodca'),
('hod', 'cs', 'hodcs', 'cs'),
('hod', 'ec', 'hodece', 'hodece'),
('hod', 'hodmca', 'hodmca', 'daf291bfacad21daf104ce041b262785'),
('officestaff', 'nithin', 'nithin', 'nithin'),
('officestaff', 'officestaff', 'officestaff', 'officestaff'),
('pgdean', 'pgdean', 'pgdean', 'pgdean'),
('principal', 'principal', 'principal', 'principal'),
('dean', 'rob', 'rob', '760061f6bfde75c29af12f252d4d3345'),
('hod', 'rob', 'robert', '684c851af59965b680086b7b4896ff98'),
('student', 'student', 'student', 'student'),
('ugdean', 'ugdean', 'ugdean', 'ugdean'),
('dean', 'unni', 'unni', 'b6dbe4cd5e9a667a65783b81b84a2948'),
('student', 'z', 'z', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE IF NOT EXISTS `pg` (
  `pg_id` int(5) NOT NULL,
  `admno` varchar(10) NOT NULL,
  `roll_no` text,
  `rank` text,
  `quota` text,
  `school_1` text,
  `reg_no_yr_1` text,
  `board_1` text,
  `school_2` text,
  `reg_no_yr_2` text,
  `board_2` text,
  `no_chance` text,
  `name_last` text,
  `total` text,
  `cur_sem` text,
  `gate_score` text NOT NULL,
  PRIMARY KEY (`pg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg`
--

INSERT INTO `pg` (`pg_id`, `admno`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `cur_sem`, `gate_score`) VALUES
(2, '16ME2', '6069692', '152', 'SM', 'KRKPM BHS, KADAMPANAD', '479038, 2008', 'BOARD OF PUBLIC EXAMINATION', 'CAS, ADOOR', '32010802009, 2013', 'KERALA UNIVERSITY', '1', 'CAS, ADOOR', '2.89', 'S1', '7.8'),
(3, '16MP3', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', 'S1', ''),
(4, '16MP4', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', 'S1', ''),
(6, '16MP6', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', 'S1', ''),
(7, '16MP7', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', 'S1', ''),
(8, '16ME8', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', 'S3', '22'),
(10, '16MP10', '2', '2', '2', 'sdfs', 'dgs', 'dg', 'dsgs', 'sdg', 'sdfg', 'sdg', 'dsg', 'sdg', 'S1', ''),
(11, '16MM11', '45', '45', 'sm', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '3.54', 'S1', '45');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE IF NOT EXISTS `religion` (
  `rl_id` int(5) NOT NULL AUTO_INCREMENT,
  `religion` text NOT NULL,
  PRIMARY KEY (`rl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`rl_id`, `religion`) VALUES
(1, 'Hindu'),
(2, 'Christian'),
(3, 'Islam'),
(4, 'Jainism'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `scolarship`
--

CREATE TABLE IF NOT EXISTS `scolarship` (
  `shid` int(10) NOT NULL AUTO_INCREMENT,
  `shname` varchar(25) NOT NULL,
  `method` varchar(10) NOT NULL,
  `total_amonut` double DEFAULT NULL,
  PRIMARY KEY (`shid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `scolarship`
--

INSERT INTO `scolarship` (`shid`, `shname`, `method`, `total_amonut`) VALUES
(1, 'kpcr', 'stud', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE IF NOT EXISTS `sem` (
  `sem_id` int(2) NOT NULL,
  `semester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`sem_id`, `semester`) VALUES
(1, 'S1'),
(2, 'S3'),
(1, 'S1'),
(2, 'S2'),
(3, 'S3'),
(4, 'S4'),
(5, 'S5'),
(6, 'S6'),
(7, 'S7'),
(8, 'S8'),
(9, 'S9'),
(10, 'S10');

-- --------------------------------------------------------

--
-- Table structure for table `sem1`
--

CREATE TABLE IF NOT EXISTS `sem1` (
  `sem_id` int(11) NOT NULL,
  `semester` varchar(5) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem1`
--

INSERT INTO `sem1` (`sem_id`, `semester`) VALUES
(1, 'S1'),
(2, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `sem_batch`
--

CREATE TABLE IF NOT EXISTS `sem_batch` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `batch_id` int(25) NOT NULL,
  `sem_id` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `sem_batch`
--

INSERT INTO `sem_batch` (`id`, `batch_id`, `sem_id`) VALUES
(17, 2, 3),
(18, 0, 0),
(19, 0, 0),
(30, 6, 1),
(31, 6, 2),
(33, 6, 3),
(112, 1, 1),
(113, 1, 2),
(114, 1, 3),
(115, 6, 4),
(116, 1, 4),
(118, 3, 1),
(119, 3, 2),
(120, 3, 3),
(121, 3, 4),
(122, 3, 5),
(123, 3, 6),
(124, 4, 1),
(125, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `serial_no`
--

CREATE TABLE IF NOT EXISTS `serial_no` (
  `seq_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `rcpt_no` int(15) NOT NULL,
  `adm_no` int(15) NOT NULL,
  PRIMARY KEY (`seq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `serial_no`
--

INSERT INTO `serial_no` (`seq_id`, `d_id`, `rcpt_no`, `adm_no`) VALUES
(58, 1, 1, 1),
(59, 1, 2, 1),
(60, 1, 3, 1),
(61, 1, 4, 1),
(62, 1, 5, 1),
(63, 1, 6, 1),
(64, 1, 7, 1),
(65, 1, 8, 1),
(66, 1, 9, 1),
(67, 1, 10, 1),
(68, 1, 11, 1),
(69, 1, 12, 1),
(70, 1, 13, 1),
(71, 1, 14, 1),
(72, 1, 15, 1),
(73, 1, 16, 1),
(74, 1, 17, 1),
(75, 1, 18, 1),
(76, 1, 19, 1),
(77, 1, 20, 1),
(78, 1, 21, 1),
(79, 13, 1, 171),
(80, 1, 22, 456),
(81, 13, 2, 171),
(82, 13, 3, 171),
(83, 1, 23, 1),
(84, 1, 24, 1),
(85, 1, 25, 1),
(86, 1, 26, 1),
(87, 1, 27, 1),
(88, 1, 28, 1),
(89, 13, 4, 171),
(90, 13, 5, 171),
(91, 1, 29, 16),
(92, 1, 29, 16),
(93, 1, 29, 16),
(94, 13, 6, 16),
(95, 13, 7, 16),
(96, 13, 7, 16),
(97, 13, 7, 16),
(98, 13, 8, 16),
(99, 13, 8, 16),
(100, 13, 8, 16),
(101, 1, 30, 16),
(102, 1, 30, 16),
(103, 1, 30, 16),
(104, 1, 31, 16),
(105, 1, 31, 16),
(106, 1, 31, 16),
(107, 1, 32, 16),
(108, 1, 32, 16),
(109, 1, 32, 16),
(110, 1, 33, 16),
(111, 1, 33, 16),
(112, 1, 33, 16),
(113, 1, 34, 16),
(114, 1, 34, 16),
(115, 1, 34, 16),
(116, 1, 35, 16),
(117, 1, 35, 16),
(118, 1, 35, 16),
(119, 1, 36, 16),
(120, 1, 37, 16),
(121, 1, 37, 16),
(122, 1, 37, 16);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE IF NOT EXISTS `specialization` (
  `spec_id` varchar(2) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  PRIMARY KEY (`spec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`spec_id`, `specialisation`) VALUES
('1', 'Civil Engineering'),
('10', 'Advanced Communication & Information System'),
('11', 'Advanced Electronics & Communication'),
('12', 'Computer Application'),
('2', 'Mechanical Engineering'),
('3', 'Electrical & Electronics Engineering'),
('4', 'Electronics & Communication Engineering'),
('5', 'Computer Science & Engineering'),
('6', 'Architecture'),
('7', 'Industrial Engineering & Management'),
('8', 'Industrial Drives & Control'),
('9', 'Transportation Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `staffadvisor`
--

CREATE TABLE IF NOT EXISTS `staffadvisor` (
  `staff_id` varchar(20) NOT NULL,
  `batch_id` int(5) NOT NULL,
  KEY `staff_id` (`staff_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffadvisor`
--

INSERT INTO `staffadvisor` (`staff_id`, `batch_id`) VALUES
('', 1),
('', 1),
('1', 4),
('', 1),
('', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_dep`
--

CREATE TABLE IF NOT EXISTS `staff_dep` (
  `staff_id` varchar(11) NOT NULL,
  `dept_id` varchar(11) NOT NULL,
  KEY `staff_id` (`staff_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_dep`
--

INSERT INTO `staff_dep` (`staff_id`, `dept_id`) VALUES
('1', '1'),
('2', '1'),
('3', '3'),
('4', '4'),
('5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `staff_detail`
--

CREATE TABLE IF NOT EXISTS `staff_detail` (
  `staff_id` varchar(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phn_no` int(20) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_detail`
--

INSERT INTO `staff_detail` (`staff_id`, `name`, `phn_no`) VALUES
('1', 'athira', 121113),
('2', 'sonupriya', 2147483645),
('3', 'nancy', 45454545),
('4', 'reena', 45454545),
('5', 'resmi', 45454545);

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE IF NOT EXISTS `stud` (
  `adm_no` varchar(10) NOT NULL,
  `yr_adm` text,
  `name` text,
  `dob` text,
  `sex` text,
  `religion` text,
  `caste` text,
  `mobile` text,
  `email` text,
  `name_guard` text,
  `relation` text,
  `occupation` text,
  `income` text,
  `address` text,
  `phone` text,
  `image` varchar(50) DEFAULT NULL,
  `admission_type` varchar(25) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `stud_id` int(5) NOT NULL,
  PRIMARY KEY (`adm_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`adm_no`, `yr_adm`, `name`, `dob`, `sex`, `religion`, `caste`, `mobile`, `email`, `name_guard`, `relation`, `occupation`, `income`, `address`, `phone`, `image`, `admission_type`, `blood_group`, `stud_id`) VALUES
('16BA9', '2016-10-16', 'Harsha Sarath', '2016-07-05', 'F', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Nisha', 'Mother', 'Teacher', '100000', 'Athira, Edathitta', '04734222601', '9556aa.jpg', 'Normal', 'B-', 9),
('16BC1', '2016-09-26', 'Nithin Prasannan', '2016-09-01', 'M', 'Hindu', 'Ezhava', '9846261698', 'nithin2710@gmail.com', 'Prasannanandan', 'Father', 'Agriculture', '48000', 'Govindamandhiram, Nellimukal PO, Adoor', '04734222601', '31466myyyyyyyyy.JPG', 'Normal', 'AB+', 1),
('16BC5', '2016-10-16', 'Nithin P', '2016-10-04', 'M', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Prasanannandan', 'Father', 'Farmer', '100000', 'Govindamandhiram', '04734222601', '10060IMG_20160222_191751.jpg', 'Normal', 'AB+', 5),
('16ME2', '2016-09-26', 'Abhishek Pillai', '2016-01-02', 'F', 'Hindu', 'Nair', '9526961416', 'abhipins@gmail.com', 'Somanath', 'Father', 'Gulf', '75000', 'Abhinivas, Pnnivizha PO, Kodumon, Pathanamthitta', '04734222601', '23478IMG_20160222_191751.jpg', 'Normal', 'B+', 2),
('16ME8', '2016-10-16', 'Rajalekshmi', '2016-06-08', 'F', 'Hindu', 'Ezhava', '8111947682', 'abhi@gmail.com', 'Sree', 'Mother', 'Farmer', '100000', 'Sree Bhavan', '04734222601', '8550aa.jpg', 'Lateral', 'A-', 8),
('16MM11', '2016-11-04', 'admin', '2016-11-02', 'F', 'Hindu', 'Nair', '9846261698', 'sruthicab@gmail.com', 'aaaa', 'Father', 'aaa', '1111', 'sdq', '04734222601', '21094FB_IMG_1472924087642.jpg', 'Normal', 'A-', 11),
('16MP10', '2016-10-28', 'aaa', '2016-10-04', 'M', 'Hindu', 'Ezhava', '9846261698', 'haiinithin@gmail.com', 'aaaa', 'Father', 'aaa', '1111', 'aaaa', '9846261698', '17350aa.jpg', 'Normal', 'AB+', 10),
('16MP3', '2016-10-16', 'Rajalekshmi', '2016-05-10', 'F', 'Hindu', 'Ezhava', '8111947682', 'abhi@gmail.com', 'Sarath', 'Father', 'Farmer', '100000', 'adoor', '04734222601', '4908aa.jpg', 'Lateral', 'A-', 3),
('16MP4', '2016-10-16', 'kukku', '2016-05-10', 'F', 'Hindu', 'Ezhava', '7025747973', 'abhi@gmail.com', 'Sarath', 'Father', 'Farmer', '100000', 'adoor', '04734222601', 'student_2-wallpaper-3840x2160.jpg', 'Lateral', 'A-', 4),
('16MP6', '2016-10-16', 'Lalu', '2016-05-10', 'F', 'Hindu', 'Ezhava', '9037526431', 'abhi@gmail.com', 'Sarath', 'Father', 'Farmer', '100000', 'adoor', '04734222601', '4908aa.jpg', 'Lateral', 'A-', 6),
('16MP7', '2016-10-16', 'Abhijith', '2016-01-01', 'M', 'Hindu', 'Ezhava', '9995949915', 'nithin2710@gmail.com', 'Prasanannandan', 'Father', 'Farmer', '100000', 'Govindamandhiram', '04734222601', '18088myyyyyyyyy.JPG', 'Normal', 'AB+', 7);

-- --------------------------------------------------------

--
-- Table structure for table `stud_batch_rel`
--

CREATE TABLE IF NOT EXISTS `stud_batch_rel` (
  `adm_no` varchar(10) NOT NULL,
  `batch_id` varchar(2) NOT NULL,
  `stud_batch_rel_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_batch_rel`
--

INSERT INTO `stud_batch_rel` (`adm_no`, `batch_id`, `stud_batch_rel_id`) VALUES
('16BC1', '1', 1),
('16ME2', '11', 2),
('16MP3', '4', 3),
('16MP4', '4', 4),
('16BC5', '3', 5),
('16MP6', '4', 6),
('16MP7', '4', 7),
('16ME8', '11', 8),
('16BA9', '17', 9),
('16MP10', '4', 10),
('16BA9', '1', 1),
('16BA9', '1', 0),
('16BA9', '1', 1),
('16MM11', '13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `stud_screlation`
--

CREATE TABLE IF NOT EXISTS `stud_screlation` (
  `adm_no` int(11) NOT NULL,
  `shid` int(10) NOT NULL,
  `approved_flag` int(2) NOT NULL,
  `amount_grant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_screlation`
--

INSERT INTO `stud_screlation` (`adm_no`, `shid`, `approved_flag`, `amount_grant`) VALUES
(1, 1, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `stud_sem_registration`
--

CREATE TABLE IF NOT EXISTS `stud_sem_registration` (
  `reg_id` int(50) NOT NULL AUTO_INCREMENT,
  `adm_no` varchar(10) DEFAULT NULL,
  `apl_status` varchar(35) NOT NULL,
  `apl_date` date NOT NULL,
  `apv_status` varchar(35) NOT NULL,
  `apv_date` date NOT NULL,
  `batch_id` int(50) NOT NULL,
  `previous_sem` varchar(4) DEFAULT NULL,
  `new_sem` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `stud_sem_registration`
--

INSERT INTO `stud_sem_registration` (`reg_id`, `adm_no`, `apl_status`, `apl_date`, `apv_status`, `apv_date`, `batch_id`, `previous_sem`, `new_sem`) VALUES
(124, '16BA9', 'Applied', '2016-11-02', 'Approved', '2016-11-02', 1, 'S4', 'S4'),
(125, '16BC1', 'Applied', '2016-11-02', 'Approved', '2016-11-02', 1, 'S3', 'S4'),
(126, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(127, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(128, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(129, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(130, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(131, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(132, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(133, '16BC5', 'Applied', '2016-11-04', 'Not Approved', '0000-00-00', 3, 'S5', 'S6'),
(134, '16MP6', 'Applied', '2016-11-04', 'Approved', '2016-11-04', 4, 'Nil', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE IF NOT EXISTS `tc` (
  `tc_no` int(5) NOT NULL AUTO_INCREMENT,
  `adm_no` varchar(10) NOT NULL,
  `tc_date` text NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`tc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tc`
--

INSERT INTO `tc` (`tc_no`, `adm_no`, `tc_date`, `reason`) VALUES
(1, '16BC1', '2016-10-15', 'Transfer'),
(2, '16ME8', '2016-10-17', 'AAA'),
(3, '16MP7', '2016-11-01', 'sdfvbe');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `temp_no` int(10) NOT NULL AUTO_INCREMENT,
  `course` varchar(10) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `batch` int(5) NOT NULL,
  `yr_adm` text,
  `name` text,
  `dob` text,
  `sex` text,
  `religion` text,
  `caste` text,
  `mobile` text,
  `email` text,
  `name_guard` text,
  `relation` text,
  `occupation` text,
  `income` text,
  `address` text,
  `phone` text,
  `image` varchar(100) DEFAULT NULL,
  `roll_no` text,
  `rank` text,
  `quota` text,
  `school_1` text,
  `reg_no_yr_1` text,
  `board_1` text,
  `school_2` text,
  `reg_no_yr_2` text,
  `board_2` text,
  `no_chance` text,
  `name_last` text,
  `total` text,
  `physics` text,
  `chemistry` text,
  `maths` text,
  `cur_sem` text,
  `admission_type` varchar(25) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gate_score` text NOT NULL,
  PRIMARY KEY (`temp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`temp_no`, `course`, `specialisation`, `batch`, `yr_adm`, `name`, `dob`, `sex`, `religion`, `caste`, `mobile`, `email`, `name_guard`, `relation`, `occupation`, `income`, `address`, `phone`, `image`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `physics`, `chemistry`, `maths`, `cur_sem`, `admission_type`, `blood_group`, `gate_score`) VALUES
(1, 'Btech', 'Civil Engineering', 2013, '2016-09-26', 'Nithin Prasannan', '2016-09-01', 'M', 'Hindu', 'Ezhava', '9846261698', 'nithin2710@gmail.com', 'Prasannanandan', 'Father', 'Agriculture', '48000', 'Govindamandhiram, Nellimukal PO, Adoor', '04734222601', '31466myyyyyyyyy.JPG', '6069692', '152', 'SM', 'KRKPM BHS, KADAMPANAD', '479038, 2008', 'BOARD OF PUBLIC EXAMINATION', 'CAS, ADOOR', '32010802009, 2013', 'KERALA UNIVERSITY', '1', 'CAS, ADOOR', '2.89', '164', '152', '157', 'S1', 'Normal', 'AB+', ''),
(2, 'Btech', 'Civil Engineering', 2014, '2016-09-26', 'Harsha', '2016-09-01', 'F', 'Hindu', 'Ezhava', '9846261698', 'harsha2710@gmail.com', 'Nirmala', 'Mother', 'Housewife', '48000', 'Harsha bhavan, Kollam', '04682285629', '17528aa.jpg', '6069692', '152', 'SM', 'KRKPM BHS, KADAMPANAD', '479038, 2008', 'BOARD OF PUBLIC EXAMINATION', 'CAS, ADOOR', '32010802009, 2013', 'KERALA UNIVERSITY', '1', 'CAS, ADOOR', '2.89', '164', '152', '157', 'S3', 'Normal', 'A+', ''),
(3, 'Mtech', 'Industrial Drives & Control', 2015, '2016-09-26', 'Abhishek Pillai', '2016-01-02', '', 'Hindu', 'Nair', '9526961416', 'abhipins@gmail.com', 'Somanath', 'Father', 'Gulf', '75000', 'Abhinivas, Pnnivizha PO, Kodumon, Pathanamthitta', '04734222601', '23478IMG_20160222_191751.jpg', '6069692', '152', 'SM', 'KRKPM BHS, KADAMPANAD', '479038, 2008', 'BOARD OF PUBLIC EXAMINATION', 'CAS, ADOOR', '32010802009, 2013', 'KERALA UNIVERSITY', '1', 'CAS, ADOOR', '2.89', NULL, NULL, NULL, 'S1', 'Normal', 'B+', '7.8'),
(7, 'Btech', 'Civil Engineering', 2015, '2016-10-16', 'Nithin P', '2016-10-04', 'M', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Prasanannandan', 'Father', 'Farmer', '100000', 'Govindamandhiram', '04734222601', '10060IMG_20160222_191751.jpg', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', '145', '165', '156', 'S1', 'Normal', 'AB+', ''),
(8, 'MCA', 'Computer Application', 2015, '2016-10-16', 'Harsha Sarath', '2016-05-10', 'F', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Sarath', 'Father', 'Farmer', '100000', 'adoor', '04734222601', '4908aa.jpg', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', NULL, NULL, NULL, 'S1', 'Lateral', 'A-', ''),
(9, 'MCA', 'Computer Application', 2015, '2016-10-16', 'Nithin P', '2016-06-08', 'M', 'Hindu', 'Ezhava', '9846261698', 'nithin2710@gmail.com', 'Prasanannandan', 'Father', 'Farmer', '100000', 'Govindamandhiram', '04734222601', '18088myyyyyyyyy.JPG', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', NULL, NULL, NULL, 'S1', 'Normal', 'AB+', ''),
(10, 'Mtech', 'Industrial Drives & Control', 2015, '2016-10-16', 'Sree', '2016-06-08', 'F', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Sree', 'Mother', 'Farmer', '100000', 'Sree Bhavan', '04734222601', '8550aa.jpg', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', NULL, NULL, NULL, 'S3', 'Lateral', 'A-', '22'),
(11, 'Barch', 'Architecture', 2014, '2016-10-16', 'Harsha Sarath', '2016-07-05', 'F', 'Hindu', 'Ezhava', '9846261698', 'abhi@gmail.com', 'Nisha', 'Mother', 'Teacher', '100000', 'Athira, Edathitta', '04734222601', '9556aa.jpg', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', '145', '165', '156', 'S1', 'Normal', 'B-', ''),
(12, 'MCA', 'Computer Application', 2015, '2016-10-28', 'aaa', '2016-10-04', 'M', 'Hindu', 'Ezhava', '9846261698', 'haiinithin@gmail.com', 'aaaa', 'Father', 'aaa', '1111', 'aaaa', '9846261698', '17350aa.jpg', '2', '2', '2', 'sdfs', 'dgs', 'dg', 'dsgs', 'sdg', 'sdfg', 'sdg', 'dsg', 'sdg', NULL, NULL, NULL, 'S1', 'Normal', 'AB+', ''),
(13, 'Btech', 'Mechanical Engineering', 2010, '2016-10-29', 'aa', '2016-10-11', 'F', 'Hindu', 'Ezhava', '9846261698', 'haiinithin@gmail.com', 'aaaa', 'Mother', 'w', '1111', 'rwr', '04734222601', '27238unni.jpg', '2', '2', '2', 'wr', 'wer', '', '', '', '', '', '', '', '', '', '', 'S3', 'Normal', 'AB-', ''),
(14, 'Btech', 'Civil Engineering', 2014, '2016-11-01', 'admin', '2016-11-01', 'M', 'faef', 'Ezhava', '9846261698', 'sruthicab@gmail.com', 'aaaa', 'Father', 'aaa', '1111', 'fasdf', '9846261698', '13432aa.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', 'AB+', ''),
(15, 'Mtech', 'Industrial Engineering & Management', 2015, '2016-11-04', 'admin', '2016-11-02', 'F', 'Hindu', 'Nair', '9846261698', 'sruthicab@gmail.com', 'aaaa', 'Father', 'aaa', '1111', 'sdq', '04734222601', '21094FB_IMG_1472924087642.jpg', '45', '45', 'sm', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '3.54', NULL, NULL, NULL, 'S1', 'Normal', 'A-', '45'),
(16, 'Mtech', 'Industrial Drives & Control', 2015, '2016-11-04', 'gsg', '2016-11-01', 'M', 'Hindu', 'Nair', '9846261698', 'sruthicab@gmail.com', 'aaaa', 'Mother', 'aaa', '1111', 'gsg', '9846261698', '574FB_IMG_1472924087642.jpg', 'dg', 'dg', 'dfg', 'gs', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'S3', 'Normal', 'A+', 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `ug`
--

CREATE TABLE IF NOT EXISTS `ug` (
  `ug_id` int(5) NOT NULL,
  `admno` varchar(10) NOT NULL,
  `roll_no` text,
  `rank` text,
  `quota` text,
  `school_1` text,
  `reg_no_yr_1` text,
  `board_1` text,
  `school_2` text,
  `reg_no_yr_2` text,
  `board_2` text,
  `no_chance` text,
  `name_last` text,
  `total` text,
  `physics` text,
  `chemistry` text,
  `maths` text,
  `cur_sem` text,
  PRIMARY KEY (`ug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ug`
--

INSERT INTO `ug` (`ug_id`, `admno`, `roll_no`, `rank`, `quota`, `school_1`, `reg_no_yr_1`, `board_1`, `school_2`, `reg_no_yr_2`, `board_2`, `no_chance`, `name_last`, `total`, `physics`, `chemistry`, `maths`, `cur_sem`) VALUES
(1, '16BC1', '6069692', '152', 'SM', 'KRKPM BHS, KADAMPANAD', '479038, 2008', 'BOARD OF PUBLIC EXAMINATION', 'CAS, ADOOR', '32010802009, 2013', 'KERALA UNIVERSITY', '1', 'CAS, ADOOR', '2.89', '164', '152', '157', 'S1'),
(5, '16BC5', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', '145', '165', '156', 'S1'),
(9, '16BA9', '200', '13', 'SM', 'KRKPM ADOOR', '2008', 'KERALA', 'CAS ADOOR', '2013', 'KERALA', '1', 'CAS ADOOR', '2.87', '145', '165', '156', 'S1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
