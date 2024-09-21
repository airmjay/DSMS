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
-- Database: `db98612437041724838am`
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

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `content`, `type`, `Date_of_add`, `status`) VALUES
(1, 'Beyond Classrooms, Building Futures.**     Caption: Our learning extends beyond textbooks. We prepare students for success in college, careers, and life.      Topic:  This option highlights the school', 'text', '2024-06-23 09:41:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `attend_time` varchar(100) DEFAULT NULL,
  `attend_id` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attend_time`, `attend_id`) VALUES
(1, '06/11/2024', 'AbdulmajeedAliyu704496827'),
(3, '06/11/2024', 'AbdulazeezAliyu1285713255'),
(4, '06/11/2024', 'abdulmajeedAliyu247767709'),
(5, '06/12/2024', 'abdulmajeedAliyu247767709'),
(6, '06/23/2024', 'abdulmajeedAliyu247767709');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_std`
--

CREATE TABLE `attendance_std` (
  `id` int(11) NOT NULL,
  `attend_time` varchar(100) DEFAULT NULL,
  `attend_id` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_std`
--

INSERT INTO `attendance_std` (`id`, `attend_time`, `attend_id`) VALUES
(1, '06/12/2024', 'AbdulsamadIbrahim223901725'),
(2, '06/23/2024', 'AbdulsamadIbrahim223901725'),
(3, '07/06/2024', 'AbdulsamadIbrahim223901725'),
(4, '07/06/2024', 'IfemideAdekunle786538174'),
(5, '07/06/2024', 'bisolaadeyemi360580011'),
(6, '07/06/2024', 'NnekaUzodinma491996750'),
(7, '07/06/2024', 'IfeomaNwamaka598297003'),
(8, '07/06/2024', 'IbrahimBello1459867694'),
(9, '07/06/2024', 'AdeolaOgunsola1478502489'),
(10, '07/06/2024', 'ObinnaChukwuemeka1457387399'),
(11, '07/06/2024', 'AdebayoOnu1575537014'),
(12, '07/07/2024', 'AbdulsamadIbrahim223901725'),
(13, '07/10/2024', 'IfemideAdekunle786538174'),
(14, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(15, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(16, '07/10/2024', 'IfemideAdekunle786538174'),
(17, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(18, '07/10/2024', 'IfemideAdekunle786538174'),
(19, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(20, '07/10/2024', 'IfemideAdekunle786538174'),
(21, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(22, '07/10/2024', 'IfemideAdekunle786538174'),
(23, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(24, '07/10/2024', 'IfemideAdekunle786538174'),
(25, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(26, '07/10/2024', 'IfemideAdekunle786538174'),
(27, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(28, '07/10/2024', 'IfemideAdekunle786538174'),
(29, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(30, '07/10/2024', 'IfemideAdekunle786538174'),
(31, '07/10/2024', 'AbdulsamadIbrahim223901725'),
(32, '07/10/2024', 'IfemideAdekunle786538174'),
(33, '07/10/2024', 'NnekaUzodinma491996750'),
(34, '07/10/2024', 'ObinnaChukwuemeka1457387399'),
(35, '07/10/2024', 'AdeolaOgunsola1478502489'),
(36, '07/10/2024', 'IbrahimBello1459867694'),
(37, '07/10/2024', 'IfeomaNwamaka598297003');

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
(1, 'Student', 'Student Focused Features', 'Learning Management System (LMS): A platform for delivering online learning materials, assignments, and assessments.', 'Learn More', '2024-06-23 09:44:11', 1),
(2, 'Teacher', 'Teacher Focused Features', 'Content Management System: A secure platform for teachers to share and access learning materials.', 'LEARN MORE', '2024-06-23 09:44:17', 2),
(3, 'Administrator', 'Administrator Focused Features', 'Financial Management: Tools for managing school finances, including fees, salaries, and expenditures.', 'Learn more', '2024-06-23 09:44:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `Month` varchar(100) DEFAULT NULL,
  `term` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `activities` varchar(300) DEFAULT NULL,
  `summary` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `Month`, `term`, `type`, `activities`, `summary`) VALUES
(1, 'January 1st 2024 - March 1st 2024 ', 'First term', NULL, 'Classes', '12weeks -  Classes'),
(2, 'March 1st 2024 - March 3rd 2024', 'First term', NULL, 'Visiting day', '3days - visiting day'),
(3, 'March 1st 2024 - March 3rd 2024', 'First term', NULL, 'Visiting day', '3days - visiting day'),
(4, 'March 4th 2024 - March - 20th 2024', 'First term', NULL, 'Revisions', '3weeks - Revisions'),
(5, 'March 20th 2024 - March 30th 2024', 'First term', NULL, 'Test', '1week  - Test '),
(6, 'March 21th 2024 - 5 April 2024 ', 'First term', NULL, 'Examination', '6days Examinations'),
(7, 'April 5st 2024 - April 20 2024', 'First term', NULL, 'Break', '3weeks - break'),
(8, 'April 21 2024 - July 28  2024', 'Second term', NULL, 'Revision of Previous Term', '1weeks - Previous Revisions'),
(9, 'July 29 2024 - July 29 2024 ', 'Second term', NULL, 'Classes', '12weeks - Classes'),
(10, 'July30 2024 - August 6 2024 ', 'Second term', NULL, 'Visiting', '1weeks - Visiting day'),
(11, 'Augusu 7th 2024 - August 14 2024 ', 'Second term', NULL, 'Revisions', '1weeks - Revisions'),
(12, 'August 21 2024 - August 30 2024 ', 'Second term', NULL, 'Examination', '1weeks and 3days - Examination'),
(13, 'August 30 2024  - 21 September 19 2024 ', 'Second term', NULL, 'Break', '14 days'),
(14, 'September 20 2024 - December 20 2024', 'Third term', NULL, 'Classes', '12weeks - Classes'),
(15, 'December 20 2024 - December 23 2024 ', 'Third term', NULL, 'visiting day', '3days - visiting day'),
(16, 'December 24th 2024 - December 30th ', 'Third term', NULL, 'Revisions', '10days - Revision'),
(17, 'January 1 2025 - January 7 2025 ', 'Third term', NULL, 'Examination', '1weeks - Examination'),
(18, 'January 7 2025 - January 30 2025', 'Third term', NULL, 'Break', '3weeks - break ');

-- --------------------------------------------------------

--
-- Table structure for table `calender_status`
--

CREATE TABLE `calender_status` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calender_status`
--

INSERT INTO `calender_status` (`id`, `status`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat_api`
--

CREATE TABLE `chat_api` (
  `id` int(11) NOT NULL,
  `Api` varchar(300) DEFAULT NULL,
  `Date_of_join` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_api`
--

INSERT INTO `chat_api` (`id`, `Api`, `Date_of_join`, `status`) VALUES
(1, ' &lt;script type=&quot;text/javascript&quot;&gt;\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n(function(){\nvar s1=document.createElement(&quot;script&quot;),s0=document.getElementsByTagName(&quot;script&quot;)[0];\ns1.async=true;\ns1.src=&#039;https://embed.tawk.to/6686f8f99d7f358570d72963/1i', '2024-07-06 15:35:21', 0);

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
(1, 'Basic 1', NULL, 'Baba Femiolumide78864097', 0),
(3, 'Basic 2', NULL, 'AdebayoOnu376042984', 0),
(4, 'Basic 3', NULL, 'MohammedHassan221845401', 0),
(5, 'Basic 4', NULL, 'Malam Ibrahim500975342', 0),
(6, 'Basic 5', NULL, 'Wale Adebayo1359933271', 0);

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

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `content`, `Date_of_add`, `status`) VALUES
(1, 'ART', '2024-06-23 10:23:29', 0),
(2, 'ENGLISH', '2024-06-23 10:23:41', 0),
(3, 'MATHEMATICS', '2024-06-23 10:23:57', 0),
(4, 'BASIC SCIENCE', '2024-06-23 10:24:31', 0),
(5, 'COMPUTER', '2024-06-23 10:24:56', 0);

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

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_time`, `event_title`, `event_content`) VALUES
(1, 'JUNE 5 2024', 'Father Day', 'Father day all the parent are expected to be present please'),
(2, 'October 1 2024', 'Independence Day', 'independent day the school is visiting the president house');

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

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `content`, `Date_of_add`, `status`) VALUES
(1, 'Exam Preparation Tools: Provide practice tests, revision materials, and past exam papers aligned with the curriculum.', '2024-06-23 09:42:28', 1),
(2, 'Performance Tracking: Tools to track student attendance, grades, and other key metrics.', '2024-06-23 09:42:32', 2),
(3, 'Parent Portal: Provide parents/guardians with a secure platform to access student progress reports, schedules, and announcements.', '2024-06-23 09:42:36', 3);

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
(1, '1.jpg', '2.jpg', '3.jpg', '2024-06-23 09:47:13', 0);

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
(1, 'Abdulhalim', 'jelil', '', 'Abdulhalimjelil1413574415', '', 'No.2 sokoto street kaduna mando', '25,2,3', 'Abdulhalimjelil1413574415.jpeg', '$2y$10$Y2CFKDzgxJAc4LQSEvHIQezmW.q760S7VfZ8cD04PXsUdcypXDVum', '2024-06-12 12:18:05', 0),
(2, 'Abdulqadir', 'jelil', '', 'Abdulhalimjelil283098748', 'malik@gmail.com', 'No.2 sokoto street kaduna mando', '4,5', 'Abdulhalimjelil283098748.jpeg', '$2y$10$mjCi7J0dN1xtvE8TI5kCUeNRaim5MgTB0hC5VxUypoxJzwY5r2Oqa', '2024-06-12 12:18:30', 0),
(3, 'Ifemide', 'Adekunle', 'Oluwaseun', 'IfemideAdekunle606125017', '', 'No.1 Oluwaseun str', '6', 'IfemideAdekunle606125017.jpeg', '$2y$10$oC39cEZSVfTVNUrv3moU4uRVHvQAiXAWFEdjEcjE2HmJfj1uEe756', '2024-06-29 07:18:55', 0),
(4, 'Nneka', 'Uzodinma', '', 'Dr. NnekaUzodinma354543244', '', 'no.1 igo road', '7,8,9', 'Dr. NnekaUzodinma354543244.jpeg', '$2y$10$zjx/NEQ5iRO.vey2vCMFv.9isn8yIZwVyna9zHDIeN/DljYBs0kYm', '2024-06-29 07:18:56', 0),
(5, 'Obinna', 'Chukwuemeka', 'Kelechi', 'ObinnaChukwuemeka1501771933', '', 'University of Nigeria Nsukka', '10,11', 'ObinnaChukwuemeka1501771933.jpeg', '$2y$10$SbXhPMMyiAnsiQPu7PW5V.reCZ9X3I1HCjtQemzZ7rRDWRgDc.4Ha', '2024-06-29 07:18:56', 0),
(6, 'Adeola', 'Ogunsola', '', 'AdeolaOgunsola472102834', '', 'opp general Market kaduna', '12,13,14', 'AdeolaOgunsola472102834.jpeg', '$2y$10$dxINlmVJWqoZI96UoJ843.WmvPWR941jTv8x0YirrGvg7G18WraeK', '2024-06-29 07:18:56', 0),
(7, 'Ibrahim', 'Bello', '', 'IbrahimBello40179644', '', 'no.2 kano main plaza', '1,17,18', 'IbrahimBello40179644.jpeg', '$2y$10$2titXKYHxqhTbHUPz2kNP.h1.Am3eRloIQsR.pfWNp6vmgsssHw0S', '2024-06-29 07:18:57', 0),
(8, 'Ifeoma', 'Nwamaka', 'Chima', 'IfeomaNwamaka1312488471', '', 'no.2 zaria road kaduna main str', '19,20,21', 'IfeomaNwamaka1312488471.jpeg', '$2y$10$ngLfT5syGDfZg83X/Qo6/uYaW178vw/QZto01FX3bxuMsoSpM/6QO', '2024-06-29 07:18:57', 0),
(9, 'Ifeanyi', 'adeyemi', '', 'Ifeanyiadeyemi1778621228', '', 'no.10 main gate ibadan str', '21,22,23', 'Ifeanyiadeyemi1778621228.jpeg', '$2y$10$0GwfyOdflY5GOXuqle9FCe0/jAb1ov2LUjXfnzAjzkqWFSrsO6uGe', '2024-06-29 07:18:57', 0),
(10, 'Mr. Adebayo', 'Ajayi', '', 'Mr. Adebayo Ajayi325822206', '', 'no.20 kalid str, kaduna', '16,25', 'Mr. Adebayo Ajayi325822206.jpeg', '$2y$10$5cUXt4BSQXpRH9x1SYh8f.ekXpsQlhyLye/tB/XTyrgtnviVrehHy', '2024-06-29 07:18:57', 0);

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

--
-- Dumping data for table `paymentbox`
--

INSERT INTO `paymentbox` (`id`, `Name_of_Made`, `receipt_id`, `made_uniqid_id`, `msg`, `status`, `Date_of_add`) VALUES
(1, 'Abdulqadir jelil', 'DB98612437041724838am712821751', '1', 'Basic 2', 0, '2024-06-28 18:13:10'),
(2, 'Abdulqadir jelil', 'DB98612437041724838am299590136', '1', 'Basic 3', 0, '2024-06-28 18:13:10'),
(4, 'Abdulqadir jelil', 'DB98612437041724838am740174970', '1', 'Basic 4', 0, '2024-06-28 18:13:10'),
(5, 'Ali Gusua', 'direct378034144', '1', 'Basic 3', 1, '2024-06-28 18:13:10'),
(6, 'Ibrahim Bello', 'DB98612437041724838am988784118', '17', 'Basic 1', 0, '2024-07-06 14:24:22'),
(7, 'Abdulhalim jelil', 'DB98612437041724838am837085376', '2', 'Basic 1', 0, '2024-07-10 22:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `payment_api`
--

CREATE TABLE `payment_api` (
  `id` int(11) NOT NULL,
  `Api` varchar(10000) DEFAULT NULL,
  `Date_of_join` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_api`
--

INSERT INTO `payment_api` (`id`, `Api`, `Date_of_join`, `status`) VALUES
(1, ' &lt;script type=&quot;text/javascript&quot;&gt;\nfunction payWithPaystack(e) {\n\n  let handler = PaystackPop.setup({\n    key: &quot;pk_test_7bae361c549bcbf336c74333d5de7fa3f372c2c3&quot;, // Replace with your public key\n    email: &quot;&lt;?= $email ?&gt;&quot;,\n    amount: 100000 * 100,\n    ref: &quot;&lt;?= $random ?&gt;&quot;+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you\n    // label: &quot;Optional string that replaces customer email&quot;\n    onClose: function(){\n      alert(&quot;Payment cancel.&quot;);\n    },\n    callback: function(response){\n      let message = &quot;Payment complete! Reference: &quot; + response.reference;\n      message1 = response.reference;\n      name = $(&quot;#first-name&quot;).val().trim();\n      basic = $(&quot;.basic&quot;).val().trim();\n      student_id = $(&quot;.basicID&quot;).val().trim();\n      \n      $.post(&quot;config/parent/child.php&quot;,{student_id:student_id,message1:message1,basic:basic,name:name},\n        function(data)\n        {\n            swal = swal(&quot;Success&quot;,data, &quot;success&quot;);\n            $(document).on(&quot;click&quot;, &quot;.swal-button--confirm&quot;, function()\n            {\n                location = &quot;/prt&quot;;\n            })\n        })\n      alert(message);\n    }\n  });\n\n  handler.openIframe();\n}\n&lt;/script&gt;', '2024-07-06 15:35:07', 0);

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
  `course` varchar(300) NOT NULL,
  `Date_of_add` datetime DEFAULT current_timestamp(),
  `status` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `class_name`, `tutor`, `name`, `course`, `Date_of_add`, `status`) VALUES
(1, 'Basic 1', 'abdulmajeed Aliyu 1', '06132024579107748.pdf', 'Algorithm', '2024-06-13 12:05:35', 0),
(2, 'Basic 1', 'abdulmajeed Aliyu 1', '061320241201175601.docx', 'statement of the profile 1', '2024-06-13 12:11:06', 0);

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

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `Subject_name`, `grade`, `test`, `exam`, `student_id`, `msg`, `parent_id`, `status`) VALUES
(1, 'Art', '70', 20, 50, '1', '1/Basic 2/1', '1', 0),
(2, 'Culture', '100', 30, 70, '1', '1/Basic 2/1', '1', 0),
(3, 'Basic Science', '60', 20, 40, '1', '1/Basic 2/1', '1', 0),
(4, 'PHE', '60', 30, 30, '1', '1/Basic 2/1', '1', 0),
(5, 'Home Economic', '66', 10, 56, '1', '1/Basic 2/1', '1', 0),
(6, 'Math', '60', 10, 50, '1', '1/Basic 2/1', '1', 0),
(7, 'Art', '70', 20, 50, '1', '1/Basic 2/1', '1', 0),
(8, 'Culture', '90', 10, 80, '2', '2/Basic 1/1', '1', 0),
(9, 'Basic Science', '44', 12, 32, '2', '2/Basic 1/1', '1', 0),
(10, 'PHE', '57', 12, 45, '2', '2/Basic 1/1', '1', 0),
(11, 'Home Economic', '64', 30, 34, '2', '2/Basic 1/1', '1', 0),
(12, 'Math', '61', 20, 41, '2', '2/Basic 1/1', '1', 0),
(13, 'English', '98', 18, 80, '2', '2/Basic 1/1', '1', 0),
(14, 'Art', '40', 20, 20, '2', '2/Basic 1/1', '1', 0),
(15, 'Culture', '90', 10, 80, '3', '3/Basic 2/1', '1', 0),
(16, 'Basic Science', '44', 12, 32, '3', '3/Basic 2/1', '1', 0),
(17, 'PHE', '57', 12, 45, '3', '3/Basic 2/1', '1', 0),
(18, 'Home Economic', '64', 30, 34, '3', '3/Basic 2/1', '1', 0),
(19, 'Math', '61', 20, 41, '3', '3/Basic 2/1', '1', 0),
(20, 'English', '98', 18, 80, '3', '3/Basic 2/1', '1', 0),
(21, 'Art', '40', 20, 20, '3', '3/Basic 2/1', '1', 0),
(22, 'Culture', '65', 10, 55, '4', '4/Basic 3/1', '1', 0),
(23, 'Basic Science', '68', 12, 56, '4', '4/Basic 3/1', '1', 0),
(24, 'PHE', '69', 12, 57, '4', '4/Basic 3/1', '1', 0),
(25, 'Home Economic', '88', 30, 58, '4', '4/Basic 3/1', '1', 0),
(26, 'Math', '79', 20, 59, '4', '4/Basic 3/1', '1', 0),
(27, 'English', '78', 18, 60, '4', '4/Basic 3/1', '1', 0),
(28, 'Art', '81', 20, 61, '4', '4/Basic 3/1', '1', 0),
(29, 'Culture', '50', 10, 40, '5', '5/Basic 4/1', '1', 0),
(30, 'Basic Science', '53', 12, 41, '5', '5/Basic 4/1', '1', 0),
(31, 'PHE', '54', 12, 42, '5', '5/Basic 4/1', '1', 0),
(32, 'Home Economic', '73', 30, 43, '5', '5/Basic 4/1', '1', 0),
(33, 'Math', '64', 20, 44, '5', '5/Basic 4/1', '1', 0),
(34, 'English', '63', 18, 45, '5', '5/Basic 4/1', '1', 0),
(35, 'Art', '66', 20, 46, '5', '5/Basic 4/1', '1', 0),
(36, 'Culture', '45', 10, 35, '6', '6/Basic 5/1', '1', 0),
(37, 'Basic Science', '48', 12, 36, '6', '6/Basic 5/1', '1', 0),
(38, 'PHE', '49', 12, 37, '6', '6/Basic 5/1', '1', 0),
(39, 'Home Economic', '68', 30, 38, '6', '6/Basic 5/1', '1', 0),
(40, 'Math', '59', 20, 39, '6', '6/Basic 5/1', '1', 0),
(41, 'English', '58', 18, 40, '6', '6/Basic 5/1', '1', 0),
(42, 'Art', '61', 20, 41, '6', '6/Basic 5/1', '1', 0),
(43, 'Culture', '44', 10, 34, '7', '7/Basic 1/1', '1', 0),
(44, 'Basic Science', '47', 12, 35, '7', '7/Basic 1/1', '1', 0),
(45, 'PHE', '48', 12, 36, '7', '7/Basic 1/1', '1', 0),
(46, 'Home Economic', '67', 30, 37, '7', '7/Basic 1/1', '1', 0),
(47, 'Math', '58', 20, 38, '7', '7/Basic 1/1', '1', 0),
(48, 'English', '57', 18, 39, '7', '7/Basic 1/1', '1', 0),
(49, 'Art', '60', 20, 40, '7', '7/Basic 1/1', '1', 0),
(50, 'Culture', '65', 10, 55, '8', '8/Basic 2/1', '1', 0),
(51, 'Basic Science', '67', 12, 55, '8', '8/Basic 2/1', '1', 0),
(52, 'PHE', '67', 12, 55, '8', '8/Basic 2/1', '1', 0),
(53, 'Home Economic', '85', 30, 55, '8', '8/Basic 2/1', '1', 0),
(54, 'Math', '75', 20, 55, '8', '8/Basic 2/1', '1', 0),
(55, 'English', '73', 18, 55, '8', '8/Basic 2/1', '1', 0),
(56, 'Art', '75', 20, 55, '8', '8/Basic 2/1', '1', 0),
(57, 'Culture', '55', 10, 45, '9', '9/Basic 3/1', '1', 0),
(58, 'Basic Science', '58', 12, 46, '9', '9/Basic 3/1', '1', 0),
(59, 'PHE', '59', 12, 47, '9', '9/Basic 3/1', '1', 0),
(60, 'Home Economic', '78', 30, 48, '9', '9/Basic 3/1', '1', 0),
(61, 'Math', '69', 20, 49, '9', '9/Basic 3/1', '1', 0),
(62, 'English', '68', 18, 50, '9', '9/Basic 3/1', '1', 0),
(63, 'Art', '71', 20, 51, '9', '9/Basic 3/1', '1', 0),
(64, 'Culture', '48', 10, 38, '10', '10/Basic 4/1', '1', 0),
(65, 'Basic Science', '51', 12, 39, '10', '10/Basic 4/1', '1', 0),
(66, 'PHE', '52', 12, 40, '10', '10/Basic 4/1', '1', 0),
(67, 'Home Economic', '71', 30, 41, '10', '10/Basic 4/1', '1', 0),
(68, 'Math', '62', 20, 42, '10', '10/Basic 4/1', '1', 0),
(69, 'English', '61', 18, 43, '10', '10/Basic 4/1', '1', 0),
(70, 'Art', '64', 20, 44, '10', '10/Basic 4/1', '1', 0),
(78, 'Culture', '48', 10, 38, '11', '11/Basic 5/1', '1', 0),
(79, 'Basic Science', '51', 12, 39, '11', '11/Basic 5/1', '1', 0),
(80, 'PHE', '52', 12, 40, '11', '11/Basic 5/1', '1', 0),
(81, 'Home Economic', '71', 30, 41, '11', '11/Basic 5/1', '1', 0),
(82, 'Math', '62', 20, 42, '11', '11/Basic 5/1', '1', 0),
(83, 'English', '61', 18, 43, '11', '11/Basic 5/1', '1', 0),
(84, 'Art', '64', 20, 44, '11', '11/Basic 5/1', '1', 0),
(85, 'Culture', '60', 10, 50, '12', '12/Basic 1/1', '1', 0),
(86, 'Basic Science', '63', 12, 51, '12', '12/Basic 1/1', '1', 0),
(87, 'PHE', '64', 12, 52, '12', '12/Basic 1/1', '1', 0),
(88, 'Home Economic', '83', 30, 53, '12', '12/Basic 1/1', '1', 0),
(89, 'Math', '74', 20, 54, '12', '12/Basic 1/1', '1', 0),
(90, 'English', '73', 18, 55, '12', '12/Basic 1/1', '1', 0),
(91, 'Art', '76', 20, 56, '12', '12/Basic 1/1', '1', 0),
(92, 'Culture', '60', 10, 50, '13', '13/Basic 2/1', '1', 0),
(93, 'Basic Science', '63', 12, 51, '13', '13/Basic 2/1', '1', 0),
(94, 'PHE', '64', 12, 52, '13', '13/Basic 2/1', '1', 0),
(95, 'Home Economic', '83', 30, 53, '13', '13/Basic 2/1', '1', 0),
(96, 'Math', '74', 20, 54, '13', '13/Basic 2/1', '1', 0),
(97, 'English', '73', 18, 55, '13', '13/Basic 2/1', '1', 0),
(98, 'Art', '76', 20, 56, '13', '13/Basic 2/1', '1', 0),
(99, 'Culture', '60', 10, 50, '14', '14/Basic 3/1', '1', 0),
(100, 'Basic Science', '63', 12, 51, '14', '14/Basic 3/1', '1', 0),
(101, 'PHE', '64', 12, 52, '14', '14/Basic 3/1', '1', 0),
(102, 'Home Economic', '83', 30, 53, '14', '14/Basic 3/1', '1', 0),
(103, 'Math', '74', 20, 54, '14', '14/Basic 3/1', '1', 0),
(104, 'English', '73', 18, 55, '14', '14/Basic 3/1', '1', 0),
(105, 'Art', '76', 20, 56, '14', '14/Basic 3/1', '1', 0),
(106, 'Culture', '60', 10, 50, '15', '15/Basic 4/1', '1', 0),
(107, 'Basic Science', '63', 12, 51, '15', '15/Basic 4/1', '1', 0),
(108, 'PHE', '64', 12, 52, '15', '15/Basic 4/1', '1', 0),
(109, 'Home Economic', '83', 30, 53, '15', '15/Basic 4/1', '1', 0),
(110, 'Math', '74', 20, 54, '15', '15/Basic 4/1', '1', 0),
(111, 'English', '73', 18, 55, '15', '15/Basic 4/1', '1', 0),
(112, 'Art', '76', 20, 56, '15', '15/Basic 4/1', '1', 0),
(113, 'Culture', '60', 10, 50, '16', '16/Basic 5/1', '1', 0),
(114, 'Basic Science', '63', 12, 51, '16', '16/Basic 5/1', '1', 0),
(115, 'PHE', '64', 12, 52, '16', '16/Basic 5/1', '1', 0),
(116, 'Home Economic', '83', 30, 53, '16', '16/Basic 5/1', '1', 0),
(117, 'Math', '74', 20, 54, '16', '16/Basic 5/1', '1', 0),
(118, 'English', '73', 18, 55, '16', '16/Basic 5/1', '1', 0),
(119, 'Art', '76', 20, 56, '16', '16/Basic 5/1', '1', 0),
(120, 'Culture', '60', 10, 50, '17', '17/Basic 1/1', '1', 0),
(121, 'Basic Science', '63', 12, 51, '17', '17/Basic 1/1', '1', 0),
(122, 'PHE', '64', 12, 52, '17', '17/Basic 1/1', '1', 0),
(123, 'Home Economic', '83', 30, 53, '17', '17/Basic 1/1', '1', 0),
(124, 'Math', '74', 20, 54, '17', '17/Basic 1/1', '1', 0),
(125, 'English', '73', 18, 55, '17', '17/Basic 1/1', '1', 0),
(126, 'Art', '76', 20, 56, '17', '17/Basic 1/1', '1', 0),
(127, 'Culture', '55', 5, 50, '18', '18/Basic 2/1', '1', 0),
(128, 'Basic Science', '57', 6, 51, '18', '18/Basic 2/1', '1', 0),
(129, 'PHE', '59', 7, 52, '18', '18/Basic 2/1', '1', 0),
(130, 'Home Economic', '61', 8, 53, '18', '18/Basic 2/1', '1', 0),
(131, 'Math', '63', 9, 54, '18', '18/Basic 2/1', '1', 0),
(132, 'English', '65', 10, 55, '18', '18/Basic 2/1', '1', 0),
(133, 'Art', '67', 11, 56, '18', '18/Basic 2/1', '1', 0),
(134, 'Culture', '70', 20, 50, '19', '19/Basic 3/1', '1', 0),
(135, 'Basic Science', '71', 20, 51, '19', '19/Basic 3/1', '1', 0),
(136, 'PHE', '72', 20, 52, '19', '19/Basic 3/1', '1', 0),
(137, 'Home Economic', '73', 20, 53, '19', '19/Basic 3/1', '1', 0),
(138, 'Math', '74', 20, 54, '19', '19/Basic 3/1', '1', 0),
(139, 'English', '75', 20, 55, '19', '19/Basic 3/1', '1', 0),
(140, 'Art', '76', 20, 56, '19', '19/Basic 3/1', '1', 0),
(141, 'Culture', '70', 20, 50, '20', '20/Basic 4/1', '1', 0),
(142, 'Basic Science', '71', 20, 51, '20', '20/Basic 4/1', '1', 0),
(143, 'PHE', '72', 20, 52, '20', '20/Basic 4/1', '1', 0),
(144, 'Home Economic', '73', 20, 53, '20', '20/Basic 4/1', '1', 0),
(145, 'Math', '74', 20, 54, '20', '20/Basic 4/1', '1', 0),
(146, 'English', '75', 20, 55, '20', '20/Basic 4/1', '1', 0),
(147, 'Art', '76', 20, 56, '20', '20/Basic 4/1', '1', 0),
(148, 'Culture', '60', 20, 40, '21', '21/Basic 5/1', '1', 0),
(149, 'Basic Science', '61', 20, 41, '21', '21/Basic 5/1', '1', 0),
(150, 'PHE', '62', 20, 42, '21', '21/Basic 5/1', '1', 0),
(151, 'Home Economic', '63', 20, 43, '21', '21/Basic 5/1', '1', 0),
(152, 'Math', '64', 20, 44, '21', '21/Basic 5/1', '1', 0),
(153, 'English', '65', 20, 45, '21', '21/Basic 5/1', '1', 0),
(154, 'Art', '66', 20, 46, '21', '21/Basic 5/1', '1', 0);

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
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `lastname`, `phone`, `state`, `dateOfBirth`, `email`, `post`, `password`, `status`, `unique_id`, `dateOfJoin`, `picture`) VALUES
(1, 'Ahmad', 'Farouk', '0808965695', 'Kd', '2024-05-18', 'Mascotacademy@gmail.com', 'principal', '$2y$10$4UCuudzHldyeM/86LRKlSOeLsZBXY3dUcnap6rbZIDeq8iQPRqH/S', 1, 'DB98612437041724838am', '2024-05-10 00:04:22', 'DB98612437041724838am.jpeg'),
(2, 'Abdulmajeed', 'Aliyu', '08107383412', 'Kaduna', '2024-06-04', 'Password@gmail.com', 'Manager', '$2y$10$XMbs.3mekKVmaPVL.I4PGuNPzfFf3StfEhDeDkaHR8EyxKTE1Ncu6', 1, 'Abdulmajeed327853267', '2024-06-07 10:20:42', 'Abdulmajeed327853267.jpeg'),
(3, 'Abdulsalim', 'Lastborn', '0904434334', 'Zaria', '2024-06-04', 'lastborn@gmail.com', 'Cleaner', 'Password', 1, 'Abdulsalim719529140', '2024-06-07 11:49:37', 'Abdulsalim719529140.jpeg'),
(5, 'Abdulazeez', 'Aliyu', '09031905542', '', '2024-06-07', 'aZ@gmail.com', 'Head ICT', '$2y$10$hr.iLfO2VxceCzCJXycFpOs8BDy/cBLDuV876FsdoO6xreEjYUSbW', 1, 'Abdulazeez160111808', '2024-06-09 09:35:44', 'Abdulazeez160111808.jpeg');

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
(1, 'Abdulsamad', 'Ibrahim', 'lamido', NULL, 'NA', 'AbdulsamadIbrahim223901725', 'male', 'Eye center mando', 'Basic 4', 'AbdulsamadIbrahim223901725.jpeg', '$2y$10$m6cBuTrlnoyLrsa0xQnQIOkeasv1MI4jDGITmZV9.BQnQ5TY4s6Vi', '2024-06-12 07:12:49', '2013-12-22'),
(2, 'Ifemide', 'Adekunle', 'Oluwaseun', NULL, 'NA', 'IfemideAdekunle786538174', 'Male', 'no.2 address str', 'Basic 1', 'IfemideAdekunle786538174.jpeg', '$2y$10$41wpfWz0nGaa.cjhBJb.wu1cTOt/pQ289/6qFbRxzQtmr7T8KbSeq', '2024-06-29 07:51:11', '0000-00-00'),
(3, 'Nneka', 'Uzodinma', '', NULL, '', 'NnekaUzodinma491996750', 'Female', 'no.2 address str ', 'Basic 2', 'NnekaUzodinma491996750.jpeg', '$2y$10$Ne3hetZ5jey/e5zAp.5F9eIqEY8gJO5v1xKH34f7hfuaQqYgXAr6e', '2024-06-29 07:51:12', '0000-00-00'),
(4, 'Obinna', 'Chukwuemeka', 'Kelechi', NULL, '', 'ObinnaChukwuemeka1457387399', 'Male', 'no.2 address str ', 'Basic 3', 'ObinnaChukwuemeka1457387399.jpeg', '$2y$10$si1UCcuZvYzQ6KiYTGM.1e1.idycbk4TLDiHzxT9PjAu0Q5EmKlWO', '2024-06-29 07:51:12', '0000-00-00'),
(5, 'Adeola', 'Ogunsola', '', NULL, '', 'AdeolaOgunsola1478502489', 'Female', 'no.2 address str ', 'Basic 4', 'AdeolaOgunsola1478502489.jpeg', '$2y$10$g/PylbjzrAtWvnsjejGP2ejadzVxjPEPWSi.z.D0GtPcqvE96hnAW', '2024-06-29 07:51:12', '0000-00-00'),
(6, 'Ibrahim', 'Bello', '', NULL, '', 'IbrahimBello1459867694', 'Male', 'no.2 address str ', 'Basic 5', 'IbrahimBello1459867694.jpeg', '$2y$10$h.aBKBjEONMLv88/rT3OyehPFA8Y5esAGM5qxlB6BfqaRt.8kZSxq', '2024-06-29 07:51:12', '0000-00-00'),
(7, 'Ifeoma', 'Nwamaka', 'Chima', NULL, '', 'IfeomaNwamaka598297003', 'Male', 'no.2 address str ', 'Basic 1', 'IfeomaNwamaka598297003.jpeg', '$2y$10$V45lkkFmKSYuqV4Eie/6Wu65I0WcLaEa0WqJpNcH9K9K4Tf6UdSQq', '2024-06-29 07:51:13', '0000-00-00'),
(8, 'bisola', 'adeyemi', '', NULL, '', 'bisolaadeyemi360580011', 'Female', 'no.2 address str ', 'Basic 2', 'bisolaadeyemi360580011.jpeg', '$2y$10$72db3fmGIsmdU08ZMyUktezDv.PK2obefM8MGreLC3.mbjp2wm8X.', '2024-06-29 07:51:13', '0000-00-00'),
(9, 'Farida', ' Ajayi', '', NULL, '', 'Farida Ajayi588320144', 'Female', 'no.2 address str ', 'Basic 3', 'Farida Ajayi588320144.jpeg', '$2y$10$B9lvHt47xjLSO/uXDGYB8e3Qu5FcKUweZYm1lKkniiHSLslnIT13C', '2024-06-29 07:51:13', '0000-00-00'),
(10, 'Baba Femi', 'olumide', '', NULL, '', 'Baba Femiolumide1879176848', 'Male', 'no.2 address str ', 'Basic 4', 'Baba Femiolumide1879176848.jpeg', '$2y$10$4GW8r9EM4G/EXnIdgotsR.75JTdVuQge5u7xeAXQw9ojmVt7e8N26', '2024-06-29 07:51:13', '0000-00-00'),
(11, 'Adebayo', 'Onu', '', NULL, '', 'AdebayoOnu1575537014', 'Male', 'no.2 address str ', 'Basic 5', 'AdebayoOnu1575537014.jpeg', '$2y$10$zYxbq6Ija8/DygJk9swMJuVBZ.Xs1nFg4ymofbkUbHCECgz9RI81S', '2024-06-29 07:51:14', '0000-00-00'),
(12, 'Mohammed', 'Hassan', '', NULL, '', 'MohammedHassan273162831', 'Male', 'no.2 address str ', 'Basic 1', 'MohammedHassan273162831.jpeg', '$2y$10$aE1gs1l/j14Y2kKRy1N2WeQwrEu5nnCmCoSMaVCrIZi8b847qomHK', '2024-06-29 07:51:14', '0000-00-00'),
(13, 'Sodiq', 'Ibrahim', '', NULL, '', 'SodiqIbrahim1524872199', 'Male', 'no.2 address str ', 'Basic 2', 'SodiqIbrahim1524872199.jpeg', '$2y$10$drx8tNMH51Uvmnah6orR2e1fKDTIteXjitxSa62XtLU8Ixo6/GlU6', '2024-06-29 07:51:14', '0000-00-00'),
(14, 'Bisi', 'Adebayo', '', NULL, '', 'BisiAdebayo999372771', 'Female', 'no.2 address str ', 'Basic 3', NULL, '$2y$10$suoQQEKIlN0rYwiSsQDZGOmH4jAxrXVH.mGPTrg9R7.DOrMQyFO7y', '2024-06-29 07:51:14', '0000-00-00'),
(15, 'Ifeola', 'Abiboye', '', NULL, '', 'IfeolaAbiboye84558857', 'Female', 'no.2 address str ', 'Basic 4', 'IfeolaAbiboye84558857.jpeg', '$2y$10$4mAglRTCaltuDYxrkrTg8.sRIXLff3w1ulwBrEz5YcKTIAtvMX6/q', '2024-06-29 07:51:15', '0000-00-00'),
(16, 'Omotola', 'Akinsanya', '', NULL, 'NA', 'Omotola Akinsanya336656390', 'Female', 'no.2 address str', 'Basic 5', NULL, '$2y$10$7Pj9GU0GaY9Wb4bKKA.6NufVUEGXt/bTXIYVuztNtXAcndmMBJ5kG', '2024-06-29 07:51:15', '0000-00-00'),
(17, 'John ', 'Obi', ' Mikel', NULL, '', 'John Obi1627822650', 'Male', 'no.2 address str ', 'Basic 1', 'John Obi1627822650.jpeg', '$2y$10$IG/gCeNYq.aV1zmiqm6nV.i.L4O5ori0MiL5jwZiynYojH3RudkZq', '2024-06-29 07:51:15', '0000-00-00'),
(18, 'Ahmed ', 'Kaduna', 'Musa', NULL, '', 'Ahmed Kaduna1133982028', 'Male', 'no.2 address str ', 'Basic 2', NULL, '$2y$10$o6pTyHS92fwLAbkh3hcTcunsGs58xUN6HiOC9PokaieH0PmxMy.au', '2024-06-29 07:51:15', '0000-00-00'),
(19, 'Khadija ', 'Ibrahim', '', NULL, '', 'Khadija Ibrahim1390198331', 'Female', 'no.2 address str ', 'Basic 3', 'Khadija Ibrahim1390198331.jpeg', '$2y$10$zlAuST3Yy4ib4w99YYRpNuaAhnQk1CVpoRuSYJn6xXbFoZnk8BQp6', '2024-06-29 07:51:16', '0000-00-00'),
(20, 'Chioma ', 'Ikokwu', '', NULL, '', 'Chioma Ikokwu359616687', 'Female', 'no.2 address str ', 'Basic 4', 'Chioma Ikokwu359616687.jpeg', '$2y$10$dzPw2nxJjUCK4bwGuP0tcOsSLdWn9N6XATjmEhWvEyNTP3qEcN2Jq', '2024-06-29 07:51:16', '0000-00-00'),
(21, 'Mai ', 'Atafo', '', NULL, '', 'Mai Atafo1425135580', 'Male', 'no.2 address str ', 'Basic 5', NULL, '$2y$10$Nb0MHKJZElJvjnc.ajpN3urV2JOHBAPc2qCg9qY9ygC6jPTCw5d4m', '2024-06-29 07:51:16', '0000-00-00'),
(22, 'Femi ', 'Kuti', '', NULL, '', 'Femi Kuti236997493', 'Male', 'no.2 address str ', 'Basic 1', NULL, '$2y$10$uWdvxa5iTuZ9MUEZ2EkYWOBt9SCt5UfXWC6Dtbn9OsDZLW.yFWaqu', '2024-06-29 07:51:16', '0000-00-00'),
(23, 'Mansa ', 'Musa', '', NULL, '', 'Mansa Musa1529657086', 'Male', 'no.2 address str ', 'Basic 2', NULL, '$2y$10$pywCKYt/nHD9zWKJBtISHOWu2bdMbLHxaDnAk25OMWPUhZcr4VllS', '2024-06-29 07:51:17', '0000-00-00'),
(24, 'Aisha ', 'Yesufu', '', NULL, '', 'Aisha Yesufu1021253689', 'Female', 'no.2 address str ', 'Basic 3', NULL, '$2y$10$SB3zaKo4rBnnHLX8Ttf9HehmHoSU9CVszgXWkIvLno3yFisgUuR2i', '2024-06-29 07:51:17', '0000-00-00'),
(25, 'Kingsley ', 'Chindu', '', NULL, '', 'Kingsley Chindu1607336375', 'Male', 'no.2 address str ', 'Basic 4', 'Kingsley Chindu1607336375.jpeg', '$2y$10$V0aBVGLLdjFS723K.3FWU.Wlp0Jt5P4HVunyF0KPeISLu2gn0epmq', '2024-06-29 07:51:17', '0000-00-00');

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
  `phone` varchar(100) NOT NULL,
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

INSERT INTO `teacher` (`id`, `firstName`, `surName`, `middleName`, `class_id`, `post`, `uniqid_id`, `email`, `phone`, `address`, `T_id`, `picture`, `password`, `Date_of_join`, `status`) VALUES
(1, 'abdulmajeed', 'Aliyu', '', NULL, 'Co ordinator', 'abdulmajeedAliyu247767709', 'Abdulmajeedaliyu@gmail.com', '0903010232', 'Kaduna Sabon gida', 'Basic 2', 'abdulmajeedAliyu247767709.jpg', '$2y$10$R4b63I9OlBCxKLFCpVsC/upeVHPI2xCnQnWl/HX4Dpdq7ln98H1fC', '2024-06-11 16:55:37', 0),
(2, 'Baba Femi', 'olumide', '', NULL, 'level 1', 'Baba Femiolumide78864097', 'olumide@gmail.com', '', 'no.2 central park', 'Basic 1', 'Baba Femiolumide78864097.jpeg', '$2y$10$B/RzXNfaaj2TXHsvQ2JQ4Og.YnORS9Em7R5jyNEjoV6lkscVABP.u', '2024-06-29 07:32:08', 0),
(3, 'Adebayo', 'Onu', '', NULL, 'level 1', 'AdebayoOnu376042984', 'Onu@gmail.com', '', 'no.4 makni str', 'Basic 2', 'AdebayoOnu376042984.jpeg', '$2y$10$Xj5T2O8.zhMtZdheSTmjperGWCIqhLi7trde0P4y4oRWLeXp6opXC', '2024-06-29 07:32:08', 0),
(4, 'Mohammed', 'Hassan', 'Alhaji', NULL, 'level 8', 'MohammedHassan221845401', 'Mohammed@gmail.com', '09010211232', 'no.3 karaye str k', 'Basic 3', 'MohammedHassan221845401.jpeg', '$2y$10$7ODMLAhUAfAlW0plMHwB1up1bNMmAb9oAzSSozm6cA6iUHK3fcsgq', '2024-06-29 07:32:09', 0),
(5, 'Malam', 'Ibrahim', 'Kano', NULL, 'level 2', 'Malam Ibrahim500975342', 'Malam@gmail.com', '', 'no.4 kano road kd', 'Basic 4', 'Malam Ibrahim500975342.jpeg', '$2y$10$wXLXsfwWlpgVx2zLSktYYuNXQMxMACzatzpO8MLCYufZnbQZZU6Uq', '2024-06-29 07:32:09', 0),
(6, 'Wale', 'Adebayo', '', NULL, 'level 4', 'Wale Adebayo1359933271', 'Adebayo@gmail.com', '', 'no.1 aliyu akilu rd', 'Basic 5', 'Wale Adebayo1359933271.jpeg', '$2y$10$8UIpJzzC0b2rtmRUlx8xSuyHFRrt.Y9nfG96wowa//yScOEJuQkG6', '2024-06-29 07:32:09', 0),
(7, 'abdulmajeed ', 'fg', 'l', NULL, 'l', 'abdulmajeed fg1764291277', 'email@fmail.com', '', 'N0.2', 'Basic 2', NULL, '$2y$10$vwRLZk4pvCXGmbE8YDD6tOkn5EpfjujWrAKjt02V16wvYKpevNOiO', '2024-07-10 09:32:02', 0),
(8, 'abdulmajeed ', 'abdulmajeed ', '', NULL, 'Level 1', 'abdulmajeed abdulmajeed 536788901', 'email@gmail.com', '', 'kk', 'Basic 3', NULL, '$2y$10$n3Flusj.l3NM/x.o5JRZ9OddbLROI7V1IYoFXMugehpS904E77ir.', '2024-07-10 15:28:53', 0);

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
-- Dumping data for table `teacher_comment`
--

INSERT INTO `teacher_comment` (`id`, `comment`, `teacher_id`, `Date_of_add`, `status`) VALUES
(1, 'Not all storms come to disrupt your life, some come to clear your path.', 'abdulmajeedAliyu247767709', '2024-06-23 09:51:26', 1),
(2, 'It&#039;s not about how many times you fall, but about how many times you get back up.', 'Baba Femiolumide78864097', '2024-06-23 09:51:35', 2),
(3, 'The more you learn, the more you realize how much you don&#039;t know.', 'MohammedHassan221845401', '2024-06-23 09:52:05', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_std`
--
ALTER TABLE `attendance_std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender_status`
--
ALTER TABLE `calender_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_api`
--
ALTER TABLE `chat_api`
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
-- Indexes for table `payment_api`
--
ALTER TABLE `payment_api`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance_std`
--
ALTER TABLE `attendance_std`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `calender_status`
--
ALTER TABLE `calender_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_api`
--
ALTER TABLE `chat_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paymentbox`
--
ALTER TABLE `paymentbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_api`
--
ALTER TABLE `payment_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_comment`
--
ALTER TABLE `teacher_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
