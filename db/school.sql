-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:02 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `id` int(10) NOT NULL,
  `p_count` varchar(100) NOT NULL,
  `c_count` varchar(100) NOT NULL,
  `s_count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `p_count`, `c_count`, `s_count`) VALUES
(1, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dswp`
--

CREATE TABLE `dswp` (
  `id` int(10) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `IP_address` varchar(100) NOT NULL,
  `date_of_join` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dswp`
--

INSERT INTO `dswp` (`id`, `school_name`, `email`, `picture`, `unique_id`, `password`, `IP_address`, `date_of_join`, `status`) VALUES
(29, 'Mascot Academy', 'Mascotacademy@gmail.com', 'DB98612437041724838am.png', 'DB98612437041724838am', '$2y$10$4UCuudzHldyeM/86LRKlSOeLsZBXY3dUcnap6rbZIDeq8iQPRqH/S', '::1', '2024-04-17 06:38:25', 1),
(30, 'Asad Academy', 'Asadin@gmail.com', 'DB233479771042724138pm.png', 'DB233479771042724138pm', '$2y$10$FEIEXk/p1aZBpRn8CJA8tuqJ/MBfe8uv.1YAVRe8oUeDyik.HA9dq', '::1', '2024-04-27 11:38:25', 1),
(31, 'Government Girl School Kaduna', 'kaduna@gmail.com', '', 'DB1651728341071024849am', '$2y$10$XkpbgPkJlAuHIJ.iH/OZLucPmMBBqNNhDFgwcT/FuNa5ofLOZ3DfK', '::1', '2024-07-10 06:49:56', 1),
(32, 'Damba Academy', 'Abdul@gmail.com', '', 'DB543644140710241134am', '$2y$10$EqfCwFZ1qSu/jaDnbIY7LubzDzoRJ8M5il0ZI7nzH4/ialOToyGTK', '::1', '2024-07-10 09:34:11', 1),
(33, 'Random', 'abdul@1gmail.com', '', 'DB17359357550710241208pm', '$2y$10$kSEzlM3pFxLBHoATdTUiXO2uDiTnC.3rK0MrpRrbs/hqClpb/nfbW', '::1', '2024-07-10 10:08:12', 1),
(34, 'Mascot Asq', 'Abdul@gmail1.com', '', 'DB11039884110710241211pm', '$2y$10$4UWU7G2uKaWnXKNeimWKCOjeHGat2OPhtSzzoyxi5TqYykoeGWSYO', '::1', '2024-07-10 10:11:11', 1),
(35, 'Mascot Asw', 'Abdul@gmail2.com', '', 'DB19835985650710241214pm', '$2y$10$CkGjzaNcvZTdgViRIWvefeJBDxpZQlQ8r0nXQN0v6Tx.rZtsRn/yu', '::1', '2024-07-10 10:14:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `Array_key` varchar(100) NOT NULL,
  `Array_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `Array_key`, `Array_value`) VALUES
(1, '', 'home'),
(2, 'register', 'register'),
(3, 'admin', 'admin'),
(4, 'login', 'login'),
(5, 'auth', 'school_owner'),
(6, 'prt', 'parent'),
(7, 'std', 'student'),
(8, 'Mascot', 'Mascot'),
(9, 'test', 'test'),
(12, 'regschool', 'regschool'),
(15, 'tcr', 'teacher'),
(16, 'log', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `smart picker`
--

CREATE TABLE `smart picker` (
  `id` int(11) NOT NULL,
  `smart_id` varchar(100) NOT NULL,
  `activities` varchar(300) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smart picker`
--

INSERT INTO `smart picker` (`id`, `smart_id`, `activities`, `date`) VALUES
(1, '0', 'New School Governent Girl School Zaria have just be added with Gov@gmail.com', '2024-04-17 06:32:53.827305'),
(2, 'DB98612437041724838am', 'New School Mascot Academy have just be added with email: Mascotacademy@gmail.com', '2024-04-17 06:38:28.531724'),
(3, '041824852pm101', 'Staff have successful added by admin the email is Malik@yahoo.com', '2024-04-18 18:52:43.500352'),
(4, '042724131pm102', 'Staff have successful added by admin the email is a@gmail.cpn', '2024-04-27 11:31:42.313765'),
(5, '042724136pm103', 'Staff have successful added by admin the email is a@gmail.com', '2024-04-27 11:36:13.727910'),
(6, '4748910580429241100amactivitiespageaddtest', 'New Page test have just be added by admin', '2024-04-29 09:00:52.308249'),
(7, '13054023460429241101amactivitiespageaddtest', 'New Page test have just be added by admin', '2024-04-29 09:01:10.185430'),
(8, '160020967042924539pmactivitiesUpatestaffniceaziz', 'staff profile edited by admin with id 102:', '2024-04-29 15:39:57.105483'),
(9, '1202214594042924540pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-29 15:40:15.150741'),
(10, '914242851042924542pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-29 15:42:44.922959'),
(11, '1690891086042924714pmactivitiesUpatestaffSalis S1', 'staff profile edited by admin with id 103:', '2024-04-29 17:14:03.466255'),
(12, '1061998185043024517pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:17:13.432501'),
(13, '394432638043024518pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:18:41.003688'),
(14, '1731413702043024518pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:18:53.548037'),
(15, '151931725043024519pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:19:48.463311'),
(16, '413267153043024523pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:23:25.114014'),
(17, '655959447043024525pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:25:22.116111'),
(18, '973894894043024525pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:25:35.871405'),
(19, '1744713352043024525pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:25:38.627753'),
(20, '873631974043024525pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:25:53.853197'),
(21, '2039388592043024526pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:26:04.874154'),
(22, '1910197719043024526pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:26:42.248569'),
(23, '83533280043024527pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:27:58.407658'),
(24, '1063313553043024528pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:28:12.540287'),
(25, '292669984043024528pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:28:19.340198'),
(26, '1561876239043024531pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:31:42.179726'),
(27, '1931250332043024532pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by admin with id 100:', '2024-04-30 15:32:02.525013'),
(28, '1502847509043024533pmactivitiesUpatestaffAbdulaziz Aliyu', 'staff profile edited by admin with id 102:', '2024-04-30 15:33:25.055297'),
(29, '1765459628043024533pmactivitiesUpatestaffJemeelu Salis', 'staff profile edited by admin with id 103:', '2024-04-30 15:33:50.155267'),
(30, '1892578428050124453pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 14:53:02.204720'),
(31, '28495266050124458pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 14:58:28.886177'),
(32, '120196362050124459pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 14:59:42.840123'),
(33, '115461593050124501pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 15:01:29.474308'),
(34, '1355465471050124501pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 15:01:30.093686'),
(35, '925701433050124502pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 1 with id 100:', '2024-05-01 15:02:50.406799'),
(36, '1246545373050124505pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 103 with id 100:', '2024-05-01 15:05:19.316481'),
(37, '270734901050124505pmactivitiesUpatestaffAbdulmajeed Malik salim', 'staff profile edited by 103 with id 101:', '2024-05-01 15:05:52.437705'),
(38, '675757362050124506pmactivitiesUpatestaffAbdulaziz Aliyu', 'staff profile edited by 103 with id 102:', '2024-05-01 15:06:09.754355'),
(39, '1976421399050124506pmactivitiesUpatestaff', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:06:59.174717'),
(40, '195291189050124507pmactivitiesUpatestaff', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:07:18.650664'),
(41, '1148561266050124507pmactivitiesUpatestaff', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:07:51.145820'),
(42, '831042810050124508pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:08:11.480916'),
(43, '521425060050124508pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 103 with id 100:', '2024-05-01 15:08:51.099155'),
(44, '261106486050124509pmactivitiesUpatestaffAbdulaziz Aliyu', 'staff profile edited by 103 with id 102:', '2024-05-01 15:09:04.077842'),
(45, '890867052050124514pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 103 with id 100:', '2024-05-01 15:14:24.832857'),
(46, '213287030050124515pmactivitiesUpatestaffAbdulmajeed Malik salim', 'staff profile edited by 103 with id 101:', '2024-05-01 15:15:50.756578'),
(47, '981194921050124518pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 103 with id 100:', '2024-05-01 15:18:59.074755'),
(48, '954091390050124519pmactivitiesUpatestaffAbdulmajeed Malik salim', 'staff profile edited by 103 with id 101:', '2024-05-01 15:19:10.471763'),
(49, '324926609050124519pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:19:22.537603'),
(50, '782852753050124523pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:23:34.135912'),
(51, '1788875724050124524pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:24:03.347707'),
(52, '1428258947050124524pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:24:23.146270'),
(53, '797235068050124524pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:24:49.651603'),
(54, '2037303870050124525pmactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-01 15:25:46.485322'),
(55, '685614552050324409pmactivitiesUpateSchool', 'school profile image edited by 103 with id DB98612437041724838am:', '2024-05-03 14:09:06.652028'),
(56, '1443720712050324413pmactivitiesUpateSchool', 'school profile image edited by 103 with id DB233479771042724138pm:', '2024-05-03 14:13:26.262308'),
(57, '1552652465050324414pmactivitiesUpatestaff', 'staff profile image edited by  with id 103:', '2024-05-03 14:14:47.870227'),
(58, '1240854074050324416pmactivitiesUpatestaff', 'staff profile image edited by 103 with id 103:', '2024-05-03 14:16:59.144974'),
(59, '1602369941050324604pmactivitiespageaddregschool', 'New Page regschool have just be added by 103', '2024-05-03 16:04:30.394171'),
(60, '2122708319050824540amactivitiesUpatestaff', 'staff profile image edited by 103 with id 101:', '2024-05-08 03:40:28.006475'),
(61, '1684641379051024849amactivitiesUpatestaffMascot Academy', 'School profile and password edited by 103 with id DB98612437041724838am:', '2024-05-10 06:49:50.882436'),
(62, '1148379964051024849amactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-10 06:49:50.922136'),
(63, '149643069051024851amactivitiesUpatestaffMascot Academy', 'School profile edited by 103 with id DB98612437041724838am:', '2024-05-10 06:51:19.777968'),
(64, 'schoolunitialwithid1239701236051024859am', 'School is on the run now with the name Mascot Academy', '2024-05-10 06:59:13.648528'),
(65, 'schoolunitialwithid2017154519051024904am', 'School is on the run now with the name Mascot Academy', '2024-05-10 07:04:22.036113'),
(66, '1928971001062324413pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 101 with id 100:', '2024-06-23 14:13:59.838801'),
(67, '177942538062324414pmactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 101 with id 100:', '2024-06-23 14:14:59.394485'),
(68, '1653224763062324415pmactivitiesUpatestaffMascot Academy', 'School profile edited by 101 with id DB98612437041724838am:', '2024-06-23 14:15:15.158422'),
(69, '223210911062324725pmactivitiesUpatestaffMascot Academy', 'School profile edited by 100 with id DB98612437041724838am:', '2024-06-23 17:25:30.703101'),
(70, '1048513717062324804pmactivitiespageaddteacher', 'New Page teacher have just be added by 101', '2024-06-23 18:04:07.610513'),
(71, '1405624598062324804pmactivitiespageaddtcr', 'New Page tcr have just be added by 101', '2024-06-23 18:04:33.557805'),
(72, '900026370062324806pmactivitiespageaddteacher', 'New Page teacher have just be added by 101', '2024-06-23 18:06:05.731587'),
(73, '4976662110628241128pmactivitiesUpateSchool', 'school profile image edited by 100 with id DB233479771042724138pm:', '2024-06-28 21:28:11.038004'),
(74, '3787363770628241128pmactivitiesUpateSchool', 'school profile image edited by 100 with id DB98612437041724838am:', '2024-06-28 21:28:54.595439'),
(75, '6746990300628241130pmactivitiesUpatestaff', 'staff profile image edited by 100 with id 101:', '2024-06-28 21:30:47.509439'),
(76, '16340318490628241131pmactivitiesUpatestaff', 'staff profile image edited by 100 with id 102:', '2024-06-28 21:31:23.335397'),
(77, '15288169890628241133pmactivitiesUpatestaff', 'staff profile image edited by 100 with id 103:', '2024-06-28 21:33:05.027575'),
(78, '17315739820628241146pmactivitiesUpatestaff', 'staff profile image edited by 100 with id 100:', '2024-06-28 21:46:00.793469'),
(79, '13077112930705241240amactivitiespageadd/logout', 'New Page /logout have just be added by 100', '2024-07-04 22:40:14.202480'),
(80, '44060390705241017amactivitiesUpatestaffAbdulaziz Aliyu', 'staff profile edited by 100 with id 102:', '2024-07-05 08:17:05.576052'),
(81, '576641380070524617pmactivitiesUpatestaffMascot Academy', 'School profile edited by 101 with id DB98612437041724838am:', '2024-07-05 16:17:13.538319'),
(82, '1400031960070524617pmactivitiesUpatestaffMascot Academy', 'School profile edited by 101 with id DB98612437041724838am:', '2024-07-05 16:17:57.246566'),
(83, '207083200070524621pmactivitiesUpatestaffAsad Academy', 'School profile edited by 101 with id DB233479771042724138pm:', '2024-07-05 16:21:32.010531'),
(84, '387057029070524621pmactivitiesUpatestaffAsad Academy', 'School profile edited by 101 with id DB233479771042724138pm:', '2024-07-05 16:21:55.607100'),
(85, '1392789413070524622pmactivitiesUpatestaffMascot Academy', 'School profile edited by 101 with id DB98612437041724838am:', '2024-07-05 16:22:05.129521'),
(86, '1198712499070524625pmactivitiesUpatestaffMascot Academy', 'School profile edited by 101 with id DB98612437041724838am:', '2024-07-05 16:25:18.756673'),
(87, '12117780220706241100amactivitiesUpatestaffAsad Academy', 'School profile edited by 100 with id DB233479771042724138pm:', '2024-07-06 09:00:43.867592'),
(88, '7432658380706241101amactivitiesUpatestaffMascot Academy', 'School profile edited by 100 with id DB98612437041724838am:', '2024-07-06 09:01:04.945586'),
(89, '9951662130706241101amactivitiesUpatestaffMascot Academy', 'School profile edited by 100 with id DB98612437041724838am:', '2024-07-06 09:01:28.124769'),
(90, '4536765070724226pmactivitiesUpatestaffAbdulmajeed Malik salim', 'staff profile edited by 100 with id 101:', '2024-07-07 12:26:05.250167'),
(91, '1733128708070924132pmactivitiesUpatestaffAsad Academy', 'School profile edited by 100 with id DB233479771042724138pm:', '2024-07-09 11:32:17.473450'),
(92, '1834272630710241202amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:02:58.343955'),
(93, '11524971130710241227amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:27:46.907600'),
(94, '17251164960710241228amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:28:12.477080'),
(95, '19033889220710241228amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:28:43.654789'),
(96, '9208012890710241234amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:34:27.594737'),
(97, '398218860710241235amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:35:33.810629'),
(98, '11129343100710241236amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 22:36:03.181059'),
(99, '1587100442071024105amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:05:36.219632'),
(100, '1693514149071024106amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:06:41.798349'),
(101, '429512003071024106amactivitiesUpatestaffAbdulmajeed Aliyu1', 'staff profile edited by 100 with id 100:', '2024-07-09 23:06:54.106142'),
(102, '1206346293071024107amactivitiesUpatestaffAbdulmajeed Aliy', 'staff profile edited by 100 with id 100:', '2024-07-09 23:07:49.744223'),
(103, '1893374749071024110amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:10:02.199749'),
(104, '1654663793071024110amactivitiesUpatestaffAbdulmajeed Aliyu1', 'staff profile edited by 100 with id 100:', '2024-07-09 23:10:15.167360'),
(105, '1385356320071024111amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:11:32.884221'),
(106, '1755982829071024112amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:12:03.142069'),
(107, '993537891071024113amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:13:47.427402'),
(108, '1006075830071024115amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:15:58.851178'),
(109, '684491561071024118amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:18:01.325054'),
(110, '1178205647071024121amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:21:42.599372'),
(111, '1658093292071024122amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:22:05.476448'),
(112, '1486752951071024124amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:24:11.898324'),
(113, '409956632071024124amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:24:32.820010'),
(114, '396032442071024124amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:24:44.858213'),
(115, '1907104338071024124amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:24:57.981311'),
(116, '1111621325071024129amactivitiesUpatestaffAbdulaziz Aliyu', 'staff profile edited by 100 with id 102:', '2024-07-09 23:29:17.733208'),
(117, '146898940071024129amactivitiesUpatestaffAbdulmajeed', 'staff profile edited by 100 with id 101:', '2024-07-09 23:29:32.981510'),
(118, '1153398629071024129amactivitiesUpatestaffAbdulaziz', 'staff profile edited by 100 with id 102:', '2024-07-09 23:29:47.571817'),
(119, '1884810259071024130amactivitiesUpatestaffJemeelu', 'staff profile edited by 100 with id 103:', '2024-07-09 23:30:19.062314'),
(120, '980096371071024132amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:32:46.496431'),
(121, '1944917121071024132amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:32:56.964094'),
(122, '750216305071024133amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:33:36.800614'),
(123, '1608499566071024133amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:33:48.146192'),
(124, '81174464071024142amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:42:33.860443'),
(125, '2071882723071024143amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:43:03.338220'),
(126, '1631627178071024143amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:43:16.188835'),
(127, '1337563145071024144amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:44:09.476327'),
(128, '696245095071024144amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:44:24.062314'),
(129, '1216960258071024145amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:45:45.347682'),
(130, '1676263221071024147amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:47:00.250469'),
(131, '1465211494071024149amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:49:12.186544'),
(132, '1092014293071024149amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:49:27.566184'),
(133, '4891195071024151amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:51:10.198569'),
(134, '1516246384071024152amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:52:27.837455'),
(135, '1453657047071024157amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:57:36.489230'),
(136, '154603008071024159amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-09 23:59:14.659984'),
(137, '454417743071024226amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 00:26:06.142610'),
(138, '1105688949071024226amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 00:26:18.899481'),
(139, '488977926071024229amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 00:29:39.215399'),
(140, '1576808768071024232amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 00:32:50.660714'),
(141, '1353808531071024702amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:02:36.915437'),
(142, '2017962869071024702amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:02:55.251855'),
(143, '612206784071024706amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:06:48.374879'),
(144, '380410900071024707amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:07:19.049993'),
(145, '1406266877071024708amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:08:46.588645'),
(146, '1321943885071024712amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:12:50.820555'),
(147, '487381724071024713amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:13:11.659134'),
(148, '1257211261071024713amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:13:35.301855'),
(149, '1461687464071024714amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:14:20.839062'),
(150, '412209726071024715amactivitiesUpatestaffAbdulmajeed Aliyu', 'staff profile edited by 100 with id 100:', '2024-07-10 05:15:23.465327'),
(151, '071024759am104', 'Staff have successful added by 100 the email is a@fmail.com', '2024-07-10 05:59:24.617502'),
(152, '071024803am105', 'Staff have successful added by 100 the email is email@fmail.com', '2024-07-10 06:03:17.059434'),
(153, '071024813am106', 'Staff have successful added by 100 the email is email@gmail.com', '2024-07-10 06:13:54.276020'),
(154, '071024846am107', 'Staff have successful added by 100 the email is staff@gmail.com', '2024-07-10 06:46:44.097091'),
(155, '632743908071024847amactivitiesUpatestaffAsad Academy1', 'School profile edited by 100 with id DB233479771042724138pm:', '2024-07-10 06:47:53.513778'),
(156, '2088437068071024848amactivitiesUpatestaffAsad Academy', 'School profile edited by 100 with id DB233479771042724138pm:', '2024-07-10 06:48:11.270962'),
(157, 'DB1651728341071024849am', 'New School Government Girl School Kaduna have just be added with kaduna@gmail.com', '2024-07-10 06:49:58.501560'),
(158, 'DB543644140710241134am', 'New School Damba Academy have just be added with Abdul@gmail.com', '2024-07-10 09:34:13.975132'),
(159, 'schoolunitialwithid19938542290710241239pm', 'School is on the run now with the name Mascot Asw', '2024-07-10 10:39:33.007665');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(300) NOT NULL,
  `staff_location` varchar(300) NOT NULL,
  `staff_post` varchar(300) NOT NULL,
  `staff_email` varchar(300) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `picture` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dateOfJoin` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `number` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `staff_username` varchar(300) NOT NULL,
  `staffId` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_name`, `staff_location`, `staff_post`, `staff_email`, `dateOfBirth`, `picture`, `password`, `dateOfJoin`, `number`, `status`, `staff_username`, `staffId`) VALUES
(10, 'Abdulmajeed Aliyu', 'N0.2 Kaduna National Eye Mahuta', 'CEO', 'airmjaylil@yahoo.com', '1999-02-02', '100.jpg', '$2y$10$5JgOSPBPa4cNZ/0D81n7PeidH9v8Ll8QyBsGgIu6SdNVZ01Y8/jMi', '2024-07-10 05:13:35.215277', '', 1, 'Abdulmajeed Aliyu', '100'),
(11, 'Abdulmajeed Malik salim', 'N0.2 ABU Zaria', 'SEO manager', 'Malik@yahoo.com', '1999-11-04', '101.jpeg', '$2y$10$5JgOSPBPa4cNZ/0D81n7PeidH9v8Ll8QyBsGgIu6SdNVZ01Y8/jMi', '2024-07-09 23:29:32.919738', '', 1, 'Abdulmajeed', '101'),
(12, 'Abdulaziz Aliyu', 'Kaduna National Eye Center', 'Help care support', 'niceaziz5@gmail.cpn', '1994-04-04', '102.jpeg', '$2y$10$5JgOSPBPa4cNZ/0D81n7PeidH9v8Ll8QyBsGgIu6SdNVZ01Y8/jMi', '2024-07-09 23:29:47.448629', '', 1, 'Abdulaziz', '102'),
(13, 'Jemeelu Salis', 'Dusch City Abuja', 'Assistant Secretary', 'a@gmail.com', '1993-04-18', '103.jpeg', '$2y$10$5JgOSPBPa4cNZ/0D81n7PeidH9v8Ll8QyBsGgIu6SdNVZ01Y8/jMi', '2024-07-09 23:30:18.993201', '', 1, 'Jemeelu', '103'),
(16, 'Abdulmajeed Sadiq', 'kastina gra', 'manager', 'email@gmail.com', '2002-02-04', '', '$2y$10$tZDxBg8O3JOpmQ/Dncyx1O72lTFb9Hxp3e726L/fHV31gqmhRXTGi', '2024-07-10 06:13:54.231650', '', 1, 'sadiq', '106'),
(17, 'Halim sadiq', 'Kano', 'Secretary', 'staff@gmail.com', '2003-01-28', '', '$2y$10$6o4ZKB2bxlW2cVZFYKdmuuzq256ZO5J7xZ8s6q7UmOusDu6V2U/0G', '2024-07-10 06:46:44.028793', '', 1, 'Sad', '107');

-- --------------------------------------------------------

--
-- Table structure for table `staffcount`
--

CREATE TABLE `staffcount` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffcount`
--

INSERT INTO `staffcount` (`id`) VALUES
(107);

-- --------------------------------------------------------

--
-- Table structure for table `staff_session`
--

CREATE TABLE `staff_session` (
  `id` int(10) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_session`
--

INSERT INTO `staff_session` (`id`, `userId`, `session`, `date`) VALUES
(40, '103', '1169066332060824437pm103', '2024-06-08 14:37:37.005071'),
(67, 'Password@gmail.com', '823584706062824704amPassword@gmail.com', '2024-06-28 05:04:13.189796'),
(82, 'olumide@gmail.com', '1183457308062924107pmolumide@gmail.com', '2024-06-29 11:07:51.861126'),
(108, '101', '1600915000070524558pm101', '2024-07-05 15:58:15.512892'),
(121, '5', '510399570070624208pm5', '2024-07-06 12:08:23.325102'),
(124, '7', '25650049070624319pm7', '2024-07-06 13:19:34.182561'),
(149, '4', '10403557420707241012pm4', '2024-07-07 20:12:36.661466'),
(159, 'Abdul@gmail2.com', '20301527920710241251pmAbdul@gmail2.com', '2024-07-10 10:51:15.219423'),
(163, '100', '1419601977071024351pm100', '2024-07-10 13:51:08.688659'),
(167, 'Abdulmajeedaliyu@gmail.com', '856471415071024400pmAbdulmajeedaliyu@gmail.com', '2024-07-10 14:00:44.444763'),
(169, 'Asadin@gmail.com', '750060640071024512pmAsadin@gmail.com', '2024-07-10 15:12:24.599876'),
(170, '3', '4796319500710241127pm3', '2024-07-10 21:27:53.734884'),
(173, '2', '17626300280710241128pm2', '2024-07-10 21:28:42.738340'),
(174, '1', '10106373590710241133pm1', '2024-07-10 21:33:45.838877'),
(175, 'Mohammed@gmail.com', '6550599030711241225amMohammed@gmail.com', '2024-07-10 22:25:20.286697'),
(176, 'Mascotacademy@gmail.com', '472150960711241229amMascotacademy@gmail.com', '2024-07-10 22:29:28.733293');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dswp`
--
ALTER TABLE `dswp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart picker`
--
ALTER TABLE `smart picker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffcount`
--
ALTER TABLE `staffcount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_session`
--
ALTER TABLE `staff_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dswp`
--
ALTER TABLE `dswp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `smart picker`
--
ALTER TABLE `smart picker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staffcount`
--
ALTER TABLE `staffcount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `staff_session`
--
ALTER TABLE `staff_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
