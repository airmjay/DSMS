-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db233479771042724138pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `number_comment` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `caption`, `number_comment`, `content`, `Date_of_add`, `status`) VALUES
(1, 'h1', 'h2', 'h3', 'h4', '2024-07-09 12:37:21', 1),
(2, 'h1', 'h2', 'h3', 'h4', '2024-07-09 12:37:28', 2),
(3, 'h1', 'h2', 'h3', 'h4', '2024-07-09 12:37:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `uniqid_id` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `class_id`, `uniqid_id`, `status`) VALUES
(1, 'Basic 1', NULL, 'Mallam JemiluSuraju1081094462', 0),
(2, 'Basic 2', NULL, 'No Teacher', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_time` varchar(100) DEFAULT NULL,
  `event_title` varchar(300) DEFAULT NULL,
  `event_content` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_div`
--

CREATE TABLE `image_div` (
  `id` int(11) NOT NULL,
  `image_div1` varchar(100) DEFAULT NULL,
  `image_div2` varchar(100) DEFAULT NULL,
  `image_div3` varchar(100) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_div`
--

INSERT INTO `image_div` (`id`, `image_div1`, `image_div2`, `image_div3`, `Date_of_add`, `status`) VALUES
(1, '1.jpg', '2.jpg', '3.jpg', '2024-07-09 12:32:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `learning_div`
--

CREATE TABLE `learning_div` (
  `id` int(11) NOT NULL,
  `content1` varchar(200) DEFAULT NULL,
  `content2` varchar(200) DEFAULT NULL,
  `content3` varchar(200) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messagebox`
--

CREATE TABLE `messagebox` (
  `id` int(11) NOT NULL,
  `sender` varchar(300) DEFAULT NULL,
  `reciever` varchar(300) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `uniqid_id` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `uniqid_id` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Date_of_join` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `firstName`, `surName`, `middleName`, `uniqid_id`, `email`, `address`, `parent_id`, `picture`, `password`, `Date_of_join`, `status`) VALUES
(1, 'Abdulmajeed', 'Taiye', '', 'AbdulmajeedTaiye1960491014', 'taiye@gmail.com', 'Abuja street kaduna', '1,2', NULL, '$2y$10$6STIv0AZA/pyU1CE7PbfcuFln8FO6PDb0dHbEFdvgwPX.0djQJsB6', '2024-07-10 16:14:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentbox`
--

CREATE TABLE `paymentbox` (
  `id` int(11) NOT NULL,
  `Name_of_Made` varchar(300) DEFAULT NULL,
  `receipt_id` varchar(100) DEFAULT NULL,
  `made_uniqid_id` varchar(100) DEFAULT NULL,
  `msg` varchar(300) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `Date_of_add` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `section` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `unique_id` varchar(100) DEFAULT NULL,
  `question1` varchar(300) DEFAULT NULL,
  `question2` varchar(300) DEFAULT NULL,
  `question3` varchar(300) DEFAULT NULL,
  `question4` varchar(300) DEFAULT NULL,
  `tutor` varchar(300) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `tutor` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `course` varchar(300) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `Subject_name` varchar(300) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `test` int(10) DEFAULT NULL,
  `exam` int(10) DEFAULT NULL,
  `student_id` varchar(100) NOT NULL,
  `msg` varchar(300) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `post` varchar(100) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `unique_id` varchar(100) DEFAULT NULL,
  `dateOfJoin` datetime DEFAULT current_timestamp(),
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `lastname`, `phone`, `state`, `dateOfBirth`, `email`, `post`, `password`, `status`, `unique_id`, `dateOfJoin`, `picture`) VALUES
(1, 'Abdulmajeed', 'Aliyu', '0901212321', 'kaduna', '2024-05-15', 'Asadin@gmail.com', '', '$2y$10$FEIEXk/p1aZBpRn8CJA8tuqJ/MBfe8uv.1YAVRe8oUeDyik.HA9dq', 1, 'DB233479771042724138pm', '2024-05-09 23:24:34', ''),
(2, 'Kamil', 'Auwal', '09123145345', 'kaduna', '1994-01-11', 'email@gmail.com', 'Head of Management', '$2y$10$ivONB88byPEt0JSAwceNyuqfqgwFB8S4MUQKiEh5c3ftHc82lto5S', 1, 'Kamil1088459259', '2024-07-10 16:34:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `post` varchar(300) DEFAULT NULL,
  `uniqid_id` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `S_id` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Date_of_join` datetime DEFAULT current_timestamp(),
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `surName`, `middleName`, `class_id`, `post`, `uniqid_id`, `email`, `address`, `S_id`, `picture`, `password`, `Date_of_join`, `date_of_birth`) VALUES
(1, 'Malik', 'AbdulKadir', '', NULL, 'Head Boy', 'MalikAbdulKadir34302060', 'Male', 'No.2 Kaduna street', 'Basic 2', NULL, '$2y$10$U7FR.FjjKesxEqujS6QdZuNVZXucetwth49l8xqxPmqU2ntuJZnQy', '2024-07-10 18:11:28', '2008-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `post` varchar(300) DEFAULT NULL,
  `uniqid_id` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `T_id` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Date_of_join` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `firstName`, `surName`, `middleName`, `class_id`, `post`, `uniqid_id`, `email`, `address`, `T_id`, `picture`, `password`, `Date_of_join`, `status`) VALUES
(1, 'Mallam Jemilu', 'Suraju', '', NULL, 'Level 4', 'Mallam JemiluSuraju1081094462', 'email@gmail.com', 'kastina street', 'Basic 1', NULL, '$2y$10$a/6/jEu.uKkaeQCmQ9d9v.76CvACqZTTZV8wYjeWGYgzwhmBceAXC', '2024-07-10 18:04:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_comment`
--

CREATE TABLE `teacher_comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `teacher_id` varchar(100) DEFAULT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_div`
--
ALTER TABLE `image_div`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_div`
--
ALTER TABLE `learning_div`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagebox`
--
ALTER TABLE `messagebox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentbox`
--
ALTER TABLE `paymentbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_comment`
--
ALTER TABLE `teacher_comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_div`
--
ALTER TABLE `image_div`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learning_div`
--
ALTER TABLE `learning_div`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagebox`
--
ALTER TABLE `messagebox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentbox`
--
ALTER TABLE `paymentbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_comment`
--
ALTER TABLE `teacher_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
