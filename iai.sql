-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 10:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iai2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `target` text NOT NULL,
  `number_trainees` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` text NOT NULL,
  `open_applications` datetime NOT NULL COMMENT 'วันที่เปิดรับสมัคร',
  `close_applications` datetime NOT NULL,
  `payment_details` text NOT NULL,
  `course_file` text NOT NULL COMMENT 'เอกสารต่างๆ',
  `course_type` text NOT NULL,
  `pic` text NOT NULL COMMENT 'รูปปก',
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(5) NOT NULL,
  `cer_min` int(11) NOT NULL,
  `cer_max` int(11) NOT NULL,
  `cer_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `target`, `number_trainees`, `expenses`, `start_date`, `end_date`, `location`, `open_applications`, `close_applications`, `payment_details`, `course_file`, `course_type`, `pic`, `time_stamp`, `status`, `cer_min`, `cer_max`, `cer_pic`) VALUES
(2, 'ชื่อรายการอบรม 1', 'พนักงานทุกระดับ', 20, 0, '2022-01-06 21:30:00', '2022-01-14 21:30:00', 'วิทยาลัยเทคนิคชลบุรี', '2022-01-05 21:31:00', '2022-01-06 12:32:00', '                                                                                                                                                                                                                                                                                                                                                                                            ไม่มีค่าใช้จ่าย                                                                                                                                                                                                                                                                                                                                                    ', '20220214112827pm_ประชุม.pdf', '7', '20220107111937am.jpg', '2022-02-23 09:25:59', 'on', 1, 10, '2_cer.jpg'),
(4, 'หลักสูตรการสนทนาภาษาอังกฤษในชีวิตจริงและการทำงาน (English Conversation in Real Life and Work)', 'เจ้าหน้าที่ทุกคน', 30, 0, '2021-12-28 12:16:00', '2022-01-02 22:16:00', 'อาคาร1', '2021-12-26 12:16:00', '2021-12-28 23:16:00', '                                ไม่มีค่าใช้จ่าย                                                                                                ', '', '8', '20220106041723pm.jpg', '2022-02-23 09:39:40', 'on', 1, 20, '4_cer.jpg'),
(5, 'รายการอบรมทดสอบ', 'ทั่วไป', 20, 0, '2022-02-23 00:00:00', '2022-02-26 00:00:00', 'วิทยาลัยเทคนิคชลบุรี', '2022-02-15 00:00:00', '2022-02-18 00:00:00', '                                ไม่มีค่าใช้จ่าย                            ', '', '8', '20220214112850pm.jpg', '2022-02-14 22:28:50', 'on', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_regis`
--

CREATE TABLE `course_regis` (
  `course_id` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_regis`
--

INSERT INTO `course_regis` (`course_id`, `id_card`, `status`, `time_stamp`) VALUES
(2, '1209501099179', 'nopass', '2022-02-22 08:50:10'),
(4, '1209501099179', 'pass', '2022-02-23 03:50:53'),
(5, '1209501099179', 'wait', '2022-02-22 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE `course_type` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`type_id`, `type_name`) VALUES
(1, 'หลักสูตรรับรองโดยคุรุพัฒนา'),
(2, 'หลักสูตรรับรองโดยคุรุพัฒนา (ออนไลน์)'),
(3, 'หลักสูตรรับรองโดยคุรุพัฒนา (พิเศษ)'),
(4, 'หลักสูตรรับรองโดย ก.ค.ศ.'),
(5, 'หลักสูตรออนไลน์ (Face-to-Face)'),
(6, 'หลักสูตรออนไลน์ (e-Learning)'),
(7, 'หลักสูตรทั่วไป'),
(8, 'หลักสูตรทั่วไป (ออนไลน์)'),
(9, 'หลักสูตรพิเศษ-แผนพัฒนาประสบการณ์');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'การบริหารจัดการ'),
(2, 'การผลิต'),
(3, 'วิศวกรรม'),
(4, 'ควบคุมคุณภาพ (QA QC)'),
(5, 'ซ่อมบำรุง'),
(6, 'ไฟฟ้า'),
(7, 'คอมพิวเตอร์/ ไอที'),
(8, 'หุ่นยนต์และระบบอัตโนมัติ'),
(9, 'บุคคล (HR)'),
(10, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'ยานยนต์และชิ้นส่วน'),
(2, 'อีเล็กทรอนิกส์และไฟฟ้า'),
(3, 'แม่พิมพ์'),
(4, 'ผู้ผลิตเครื่องจักร'),
(5, 'เครื่องจักรกลการเกษตร'),
(6, 'ผู้ให้บริการงานโลหะ'),
(7, 'ชิ้นส่วนอากาศยาน'),
(8, 'เครื่องมือแพทย์'),
(9, 'พลาสติก'),
(10, 'อาหารและเครื่องดื่ม'),
(11, 'บรรจุภัณฑ์'),
(12, 'วัสดุก่อสร้าง'),
(13, 'ผู้จัดจำหน่าย'),
(14, 'พลังงาน'),
(15, 'หน่วยงานภาครัฐ'),
(16, 'สถาบันการศึกษา'),
(17, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `job_position`
--

CREATE TABLE `job_position` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_position`
--

INSERT INTO `job_position` (`id`, `name`) VALUES
(1, 'ผู้บริหารระดับสูง'),
(2, 'ผู้จัดการ'),
(3, 'หัวหน้างาน'),
(4, 'วิศวกร'),
(5, 'ช่างเทคนิค'),
(6, 'เจ้าหน้าที่'),
(7, 'ครู อาจารย์'),
(8, 'นักเรียน นักศึกษา'),
(9, 'ผู้ว่างงาน'),
(10, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `log_id` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `time_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`log_id`, `id_card`, `time_id`, `time_stamp`, `detail`) VALUES
(24, 'admin_IAI', 0, '2022-02-22 19:32:37', 'ดูวิดีโอ'),
(25, 'admin_IAI', 0, '2022-02-22 19:34:08', 'ดูวิดีโอ'),
(26, 'admin_IAI', 0, '2022-02-22 19:34:16', 'ดูวิดีโอ'),
(27, 'admin_IAI', 11, '2022-02-22 19:39:56', 'ดูวิดีโอ'),
(28, '1209501099179', 9, '2022-02-22 19:43:21', 'ดูวิดีโอ');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `time_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `days` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `activity` text NOT NULL,
  `link_doc` text NOT NULL,
  `link_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`time_id`, `course_id`, `days`, `time_start`, `time_end`, `activity`, `link_doc`, `link_video`) VALUES
(9, 4, '2022-02-20', '10:19:00', '12:19:00', 'กิจกกรรม1', 'https://getbootstrap.com/docs/5.0/content/tables/', '<iframe src=\"https://drive.google.com/file/d/1S3SyfkjBRubh3YzMJN-07jhheHaudBRB/preview\"  allow=\"autoplay\"></iframe>'),
(10, 2, '2022-02-21', '01:00:00', '02:00:00', 'กิจกกรรม 1', 'https://drive.google.com/drive/folders/1jrUkm9UlzP7iFdlDqNYAIb1BbeffihwV?usp=sharing', '<iframe src=\"https://drive.google.com/file/d/1S3SyfkjBRubh3YzMJN-07jhheHaudBRB/preview\"  allow=\"autoplay\"></iframe>'),
(11, 4, '2022-02-22', '18:30:00', '20:30:00', 'กิจกรรมที่2', '', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HDBfjAY5vx0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(12, 2, '2022-02-22', '15:31:00', '16:31:00', 'กิจกรรมที่2', 'https://getbootstrap.com/docs/5.0/content/tables/', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HDBfjAY5vx0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `trained`
--

CREATE TABLE `trained` (
  `course_id` int(11) NOT NULL,
  `train_code` int(11) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_card` varchar(13) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `first_name_th` varchar(150) NOT NULL,
  `last_name_th` varchar(150) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `major` varchar(200) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `industry` varchar(200) NOT NULL,
  `job_position` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_card`, `email`, `password`, `first_name_th`, `last_name_th`, `prefix`, `first_name`, `last_name`, `phone`, `birthday`, `education_level`, `major`, `work_experience`, `organization`, `industry`, `job_position`, `department`, `status`) VALUES
('1209501099179', 'kasama@chontech.ac.th', '25f9e794323b453885f5181f1b624d0b', 'กษมา', 'เจริญศรี', 'นาย', 'kasama', 'jaroensri', '0974728763', '1997-12-26', 'ปริญญาตรี', 'IT', 2, 'วิทยาลัยเทคนิคชลบุรี', '16', '7', '7', 'user'),
('admin_IAI', '', '288f277371a3490c6e8fac896eaf8c65', 'admin', 'IAI', '', 'admin', 'IAI', '', '0000-00-00', '', '', 0, '', '', '', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_regis`
--
ALTER TABLE `course_regis`
  ADD PRIMARY KEY (`id_card`,`course_id`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_position`
--
ALTER TABLE `job_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `trained`
--
ALTER TABLE `trained`
  ADD PRIMARY KEY (`course_id`,`train_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_position`
--
ALTER TABLE `job_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
