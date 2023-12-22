-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 10:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus-comm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayAnnounce` ()   BEGIN
SELECT * FROM tbl_announcement ORDER BY date_created DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayComment` ()   BEGIN
SELECT * FROM tbl_comments;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayEvents` ()   BEGIN
SELECT * FROM tbl_events;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayPost` ()   BEGIN
SELECT * FROM tbl_post ORDER BY date_created DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayUser` ()   BEGIN SELECT * FROM tbl_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (IN `p_username` TEXT, IN `p_password` VARCHAR(100))   BEGIN

SELECT * FROM tbl_user where username =p_username and password = p_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveAnnounce` (IN `p_title` TEXT, IN `p_description` TEXT, IN `p_date_created` DATETIME, IN `p_isdeleted` INT(11))   BEGIN
INSERT INTO tbl_announcement(title,description,date_created,isdeleted) VALUES(p_title,p_description,now(),1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveEvents` (IN `p_title` TEXT, IN `p_date` DATE, IN `p_event` TEXT, IN `p_date_posted` DATETIME)   BEGIN
INSERT INTO tbl_events(title,date,event,date_posted) VALUES(p_title,p_date,p_event,now());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_savelogin` (IN `p_username` TEXT, IN `p_password` VARCHAR(100))   BEGIN
declare ret int;
if exists(SELECT * FROM `tbl_user` WHERE username = p_username and password = p_password)THEN
	set ret = 1;
    SELECT *,ret FROM `tbl_user` WHERE username = p_username and password = p_password;
    
else 
	set ret = 2;
    select ret;
end if;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `a_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`a_id`, `title`, `description`, `date_created`, `isdeleted`, `type`) VALUES
(2, 'pahibalo sa tanan', 'pahibalo sa tanan nga ig ka pitsa 18 sa decembre kay wala kini klasi tungos sa bagyo, stay safe everyone.', '2023-12-22 04:50:05', 1, 'homepage'),
(8, 'No Christmas Party', 'pahibalo sa tanan wala kitay christmas party karong tuiga, salamat ug maligayong pasko ninyo.', '2023-12-22 14:59:21', 1, 'homepage'),
(10, 'ANNOUNCEMENT!!!!!', 'This is Announcement', '2023-12-22 22:07:57', 1, 'bsit'),
(11, 'asdsadasdsad', 'asdsadsad', '2023-12-23 00:48:21', 1, 'beed'),
(12, 'beed', 'beed', '2023-12-23 01:18:12', 1, 'beed'),
(13, 'bshm', 'bshm', '2023-12-23 01:31:41', 1, 'bshm'),
(14, 'bsed', 'bsed', '2023-12-23 02:09:23', 1, 'bsed');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `isapprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `pos_id`, `user_id`, `uname`, `comment`, `date`, `isapprove`) VALUES
(20, 28, 20, 'arnel lamanilao', 'dasdsadsa', '2023-12-22 19:25:07', 0),
(24, 29, 20, 'arnel lamanilao', 'sadsadsadsad', '2023-12-22 19:37:32', 0),
(25, 29, 20, 'arnel lamanilao', 'sadsadsadsad', '2023-12-22 19:41:22', 0),
(26, 29, 20, 'arnel lamanilao', 'dsadsadsad', '2023-12-22 19:43:55', 0),
(27, 21, 20, 'arnel lamanilao', 'wonderfull view', '2023-12-22 20:23:41', 0),
(28, 28, 20, 'arnel lamanilao', 'sadsadsadsadsadsasadsadsadsa', '2023-12-22 20:26:33', 0),
(29, 29, 20, 'arnel lamanilao', 'dsadsadsad', '2023-12-22 20:49:55', 0),
(30, 21, 20, 'arnel lamanilao', 'sdsadsadsadsad', '2023-12-22 20:54:18', 0),
(31, 29, 33, 'Student', 'this is comment', '2023-12-22 22:14:43', 0),
(32, 28, 26, 'hannah may tionzion', 'sadsadsadsa', '2023-12-22 22:25:22', 0),
(33, 27, 26, 'hannah may tionzion', 'asdsadsadsaxzcxz', '2023-12-22 22:25:38', 0),
(34, 30, 20, 'arnel lamanilao', 'asdsadsadsa', '2023-12-23 00:15:25', 0),
(35, 30, 15, 'jezrael suliano', 'sadsadsadsadsadas', '2023-12-23 00:16:29', 0),
(36, 24, 15, 'jezrael suliano', 'asdasd', '2023-12-23 00:20:08', 0),
(37, 32, 30, 'jj olatunji', 'asdsadasdsa', '2023-12-23 00:44:31', 0),
(38, 32, 49, 'asdsadsadsa', 'sadsadsadsa', '2023-12-23 00:59:51', 0),
(39, 29, 30, 'jj olatunji', 'dsadsasda', '2023-12-23 01:17:06', 0),
(40, 32, 30, 'jj olatunji', 'xzcxzcxz', '2023-12-23 01:17:23', 0),
(41, 32, 49, 'asdsadsadsa', 'asdsadsa', '2023-12-23 01:17:47', 0),
(42, 36, 28, 'sarah geronimo', 'sadsadsaxzcxzc', '2023-12-23 01:28:06', 0),
(43, 35, 28, 'sarah geronimo', 'xzvcbcvcv', '2023-12-23 01:28:12', 0),
(44, 34, 28, 'sarah geronimo', '34354654', '2023-12-23 01:28:18', 0),
(45, 33, 28, 'sarah geronimo', '555555', '2023-12-23 01:28:24', 0),
(46, 36, 50, 'bshm', 'dgdgdf', '2023-12-23 01:45:15', 0),
(47, 43, 51, 'bsed', 'bsed', '2023-12-23 02:14:27', 0),
(48, 43, 52, 'bsed student', 'sadadsa', '2023-12-23 02:22:03', 0),
(49, 42, 52, 'bsed student', 'nice bed', '2023-12-23 02:22:11', 0),
(50, 25, 53, 'alumni', 'sdsadsa', '2023-12-23 02:41:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `month` text NOT NULL,
  `day` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `event` text NOT NULL,
  `date_posted` datetime NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `title`, `month`, `day`, `year`, `event`, `date_posted`, `type`) VALUES
(2, 'Aquintance party', 'November', 22, 2023, 'Acquaintance party will be held at Cordova Sport Complex, our theme is White party , be sure to wear Whites.', '2023-12-22 04:33:42', 'homepage'),
(3, 'IT DAY', 'February', 22, 2023, 'It day is coming, many games and events will be held come and join us.', '2023-12-22 04:35:15', 'homepage'),
(5, 'asdsad', 'dasasdsa', 213, 2132, 'sadsadsadsadsadsa', '2023-12-22 18:58:32', 'bsit'),
(6, 'Christmas', 'Dec', 25, 2023, 'Merry Christmas Evryone', '2023-12-22 22:08:37', 'bsit'),
(7, 'asd', 'Dec', 32, 1233, 'Merry Christmas Evryone', '2023-12-23 00:21:53', 'bsit'),
(8, 'sadsa', 'Dec', 213, 132132, 'Merry Christmas Evryone', '2023-12-23 00:54:51', 'beed'),
(9, 'beed', 'Dec', 21, 2123, 'beed', '2023-12-23 01:18:29', 'beed'),
(10, 'bshm', 'jan', 21, 2222, 'bshm', '2023-12-23 01:36:27', 'bshm'),
(11, 'bshm', 'jan', 21, 2222, 'bshm', '2023-12-23 01:36:30', 'bshm'),
(12, 'bsed', 'bsed', 21, 32121, 'bsed', '2023-12-23 02:14:14', 'bsed');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `n_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `description` text NOT NULL,
  `image` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `isapprove` int(11) NOT NULL,
  `type` text NOT NULL,
  `n_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`n_id`, `user_id`, `names`, `description`, `image`, `date_created`, `isdeleted`, `isapprove`, `type`, `n_read`) VALUES
(1, 20, 'arnel lamanilao', 'sadsadsadsad', 0, '2023-12-23 04:52:01', 1, 0, 'homepage', 1),
(2, 20, 'arnel lamanilao', 'lasdf.asdfm.', 0, '2023-12-23 05:12:37', 1, 0, 'homepage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `isapprove` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `names`, `description`, `image`, `date_created`, `isdeleted`, `isapprove`, `type`) VALUES
(21, 20, 'arnel lamanilao', 'wonderful view', 'h-2.jpg', '2023-12-22 14:47:21', 1, 0, 'homepage'),
(22, 20, 'arnel lamanilao', 'What is the difference between an array and a linked list?', '', '2023-12-22 15:32:52', 1, 0, 'bsit'),
(23, 20, 'arnel lamanilao', 'How important is continuous learning in programming?', '', '2023-12-22 15:33:22', 1, 0, 'bsit'),
(24, 20, 'arnel lamanilao', 'What are some common strategies for debugging code?', 'e-5.jpg', '2023-12-22 15:34:08', 1, 0, 'bsit'),
(25, 26, 'hannah may tionzion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in nulla quis velit ultricies finibus. Sed ligula sem, mattis vel fringilla sed, pharetra in sapien. Praesent cursus purus ante, sit amet tincidunt dolor convallis id. Cras imperdiet gravida turpis sed porta. Etiam imperdiet metus diam, at fermentum enim vehicula quis. Nullam eu ultrices nisl. Pellentesque tincidunt felis vel risus rhoncus laoreet. Donec eget mattis libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus hendrerit risus sed tincidunt porttitor. Nunc rhoncus nisl ac suscipit dapibus. In hac habitasse platea dictumst. Donec a ex sit amet nulla aliquam tempus vitae sed nulla. Nullam id tellus fermentum nisi mollis lacinia sit amet ac erat.', '', '2023-12-22 16:25:07', 1, 0, 'alumni'),
(26, 30, 'jj olatunji', 'amazing skyscrapper', 'e-4.jpg', '2023-12-22 19:07:22', 1, 0, 'homepage'),
(27, 29, 'gordon ramsay', 'in a lobby ', 'p-4.jpg', '2023-12-22 19:09:56', 1, 0, 'homepage'),
(28, 27, 'daniel padilla', 'chillin', 'p-1.jpg', '2023-12-22 19:10:45', 1, 0, 'homepage'),
(29, 28, 'sarah geronimo', 'nice clothes', 'p-3-1.jpg', '2023-12-22 19:13:12', 1, 0, 'homepage'),
(30, 32, 'Teacher', 'hello everyone', 'bb-16.png', '2023-12-22 22:07:23', 1, 0, 'bsit'),
(31, 20, 'arnel lamanilao', 'asdsadsadsa', '', '2023-12-23 00:24:20', 1, 0, 'bsit'),
(32, 30, 'jj olatunji', 'hello hi haloo', '', '2023-12-23 00:42:43', 1, 0, 'beed'),
(33, 28, 'sarah geronimo', 'asdasdsadsa', '', '2023-12-23 01:24:38', 1, 0, 'bshm'),
(34, 28, 'sarah geronimo', 'asdasdsadsaaSasA', '', '2023-12-23 01:26:03', 1, 0, 'bshm'),
(35, 28, 'sarah geronimo', 'SDSADSADSAD', '', '2023-12-23 01:26:36', 1, 0, 'bshm'),
(36, 28, 'sarah geronimo', 'SADSADSAD', '', '2023-12-23 01:27:04', 1, 0, 'bshm'),
(37, 51, 'bsed', 'sasasadsad', '', '2023-12-23 01:59:30', 1, 0, 'bsed'),
(38, 51, 'bsed', 'xcxbbbvbn,\r\n', '', '2023-12-23 01:59:48', 1, 0, 'bsed'),
(39, 51, 'bsed', 'sacxzcxzcxz', '', '2023-12-23 02:00:50', 1, 0, 'bsed'),
(40, 51, 'bsed', 'xcxzcxzcx', '', '2023-12-23 02:01:06', 1, 0, 'bsed'),
(41, 51, 'bsed', 'xccxvxcvxc', '', '2023-12-23 02:02:03', 1, 0, 'bsed'),
(42, 51, 'bsed', 'mayng buntag', 'h-6.jpg', '2023-12-23 02:04:28', 1, 0, 'bsed'),
(43, 51, 'bsed', 'bsed', '', '2023-12-23 02:14:22', 1, 0, 'bsed'),
(44, 53, 'alumni', 'xzcxzcxzc', '', '2023-12-23 02:40:12', 1, 0, 'alumni'),
(45, 53, 'alumni', 'xzcxzcxzcxz', '', '2023-12-23 02:40:20', 1, 0, 'bsitalumni'),
(46, 20, 'arnel lamanilao', 'asdsadsadsadsadsad', '', '2023-12-23 04:43:23', 1, 0, 'homepage'),
(47, 20, 'arnel lamanilao', 'zxcxzcxzcxzcz', '', '2023-12-23 04:45:20', 1, 0, 'homepage'),
(48, 20, 'arnel lamanilao', 'asdsadsadsa', '', '2023-12-23 04:51:07', 1, 0, 'homepage'),
(49, 20, 'arnel lamanilao', 'sadsadsadsad', '', '2023-12-23 04:52:01', 1, 0, 'homepage'),
(50, 20, 'arnel lamanilao', 'lasdf.asdfm.', '', '2023-12-23 05:12:37', 1, 0, 'homepage');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `report_type` text NOT NULL,
  `date_reported` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `post_id`, `report_type`, `date_reported`) VALUES
(8, 95, 'spam', '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` text NOT NULL,
  `dep_type` text NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL,
  `counterlock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `user_type`, `dep_type`, `isdeleted`, `date_created`, `status`, `counterlock`) VALUES
(15, 'jezrael suliano', 'jezra', '123456', 'Student', 'BSIT', 1, '2023-12-02', 0, 0),
(20, 'arnel lamanilao', 'arnel', '12345', 'Teacher', 'BSIT', 1, '2023-12-02', 0, 0),
(21, 'admin', 'admin', 'admin123', 'admin', 'admin', 0, '0000-00-00', 0, 0),
(23, 'Jhon Richard Bensi', 'bensi', '1234', 'Alumni', 'BSIT', 1, '2023-12-20', 0, 0),
(24, 'ranel soulyaknow', 'ranel', '12345678', 'Teacher', 'BSIT', 1, '2023-12-20', 0, 0),
(26, 'hannah may tionzion', 'hannah', '123456789', 'Alumni', 'BSIT', 1, '2023-12-22', 0, 0),
(27, 'daniel padilla', 'daniel', '12345', 'Teacher', 'BSIT', 1, '2023-12-22', 0, 0),
(28, 'sarah geronimo', 'sarah', '12345', 'Teacher', 'BSHM', 1, '2023-12-22', 0, 0),
(29, 'gordon ramsay', 'ramsay', '12345', 'Teacher', 'BSED', 1, '2023-12-22', 0, 0),
(30, 'jj olatunji', 'ksi', '12345', 'Teacher', 'BEED', 1, '2023-12-22', 0, 0),
(31, 'Teacher Bsit', 'teacher', '123456789', 'Teacher', 'BSIT', 1, '2023-12-22', 0, 0),
(32, 'Teacher', 'teacher', '123456789', 'Teacher', 'BSIT', 1, '2023-12-22', 0, 0),
(33, 'Student', 'Student', '123456', 'Student', 'BSIT', 1, '2023-12-22', 0, 0),
(49, 'asdsadsadsa', 'halo', '123456', 'Student', 'BEED', 1, '2023-12-23', 0, 0),
(50, 'bshm', 'bshm', '123', 'Student', 'BSHM', 1, '2023-12-23', 0, 0),
(51, 'bsed', 'bsed', '123456', 'Teacher', 'BSED', 1, '2023-12-23', 0, 0),
(52, 'bsed student', 'ed', '123456', 'Student', 'BSED', 1, '2023-12-23', 0, 0),
(53, 'alumni', 'alumni', 'alumni', 'Alumni', 'BSIT', 1, '2023-12-23', 0, 0),
(54, 'qwewq', 'qwewq', 'b5b037a78522671b89a2c1b21d9b80c6', 'Teacher', 'BSIT', 1, '2023-12-23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `yr_sec` varchar(50) NOT NULL,
  `acadyr` varchar(50) NOT NULL,
  `role_in_school` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `pic` text NOT NULL,
  `cover` text NOT NULL,
  `date_registered` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `approval` varchar(100) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `school_id`, `fullname`, `email`, `address`, `number`, `yr_sec`, `acadyr`, `role_in_school`, `department`, `pic`, `cover`, `date_registered`, `status`, `approval`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(6, 24, 232132131, 'ranel soulyaknow', 'ranel@gmail.com', 'marigondon', 2147483647, '', '', 'Part-time', 'BSIT', 'user-21.png', 'chip.png', '2023-12-20', 'active', 'approve', NULL, NULL),
(7, 20, 12321321, 'arnel lamanilao', 'arnelcarcela@gmail.com', 'soong 1', 1234657890, '', '', 'Chairperson', 'BSIT', 'user-22.png', 'h-1.jpg', '2023-12-22', 'active', 'approve', '87efed73499941f67182dfada363cf957031616dd83d3d90815d3833427b9aa0', '2023-12-22 21:25:54'),
(9, 15, 21321321, 'jezrael suliano', 'jezra@gmail.com', 'soong 1', 2147483647, '4-a', '2023-08-28', 'Student', 'BSIT', 'pt-1.jpg', 'e-2.jpg', '2023-12-22', 'active', 'approve', NULL, NULL),
(10, 32, 200020094, 'Teacher', 'teacher@gmail.com', 'cpc', 2147483647, '', '', 'Chairperson', 'BSIT', 'female-profile.png', 'g-3.jpg', '2023-12-22', 'active', 'approve', NULL, NULL),
(11, 33, 2000094, 'Student', 'student@gmail.com', 'student', 123456789, '4-A', '2023-08-31', 'Student', 'BSIT', 'user-6.png', 'e-2.jpg', '2023-12-22', 'active', 'approve', NULL, NULL),
(12, 26, 21321, 'hannah may tionzion', 'arnel@gmail.com', 'dsadsad', 0, '', '45654', 'Alumni', 'BSIT', '', '', '2023-12-22', 'active', 'approve', NULL, NULL),
(16, 49, 0, 'asdsadsadsa', '', '', 0, '', '', 'Student', 'BEED', '', '', '2023-12-23', 'active', 'pending', NULL, NULL),
(17, 50, 0, 'bshm', '', '', 0, '', '', 'Student', 'BSHM', '', '', '2023-12-23', 'active', 'pending', NULL, NULL),
(18, 51, 0, 'bsed', '', '', 0, '', '', 'Teacher', 'BSED', '', '', '2023-12-23', 'active', 'pending', NULL, NULL),
(19, 52, 0, 'bsed student', '', '', 0, '', '', 'Student', 'BSED', '', '', '2023-12-23', 'active', 'pending', NULL, NULL),
(20, 53, 0, 'alumni', '', '', 0, '', '', 'Alumni', 'BSIT', '', '', '2023-12-23', 'active', 'pending', NULL, NULL),
(21, 54, 0, 'qwewq', '', '', 0, '', '', 'Teacher', 'BSIT', '', '', '2023-12-23', 'active', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_msg`
--

CREATE TABLE `user_msg` (
  `id` int(11) NOT NULL,
  `incoming_id` int(11) NOT NULL,
  `outgoing_id` int(11) NOT NULL,
  `messages` varchar(299) NOT NULL,
  `files` text NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_msg`
--

INSERT INTO `user_msg` (`id`, `incoming_id`, `outgoing_id`, `messages`, `files`, `date_send`) VALUES
(18, 20, 15, 'dsadsadsa', '', '2023-12-17 16:00:00'),
(19, 20, 15, 'dsadsadsad', '', '2023-12-17 16:00:00'),
(20, 20, 15, 'dasdsad', '', '2023-12-17 16:00:00'),
(21, 20, 15, 'dsadsad', '', '2023-12-17 16:00:00'),
(22, 20, 15, 'dsadsad', '', '2023-12-17 16:00:00'),
(23, 20, 15, 'dasdsad', '', '2023-12-17 16:00:00'),
(24, 20, 15, 'dsadsad', '', '2023-12-17 16:00:00'),
(25, 20, 15, 'sasadsadsad', '', '2023-12-18 12:12:07'),
(27, 24, 15, 'kmhjvbyctyun', '', '2023-12-20 04:59:23'),
(28, 20, 15, 'ndhaskldsadsa', '', '2023-12-20 05:02:33'),
(29, 15, 20, 'ui unsa man', '', '2023-12-20 05:03:06'),
(30, 15, 24, 'SADSADSADSA', '', '2023-12-21 04:30:25'),
(31, 15, 24, 'dsadsadsadsa', '', '2023-12-21 05:14:51'),
(32, 15, 24, 'sadsadsadsa', '', '2023-12-21 05:14:57'),
(33, 15, 24, 'sadsadsadsad', '', '2023-12-21 05:19:05'),
(34, 15, 24, 'sadsadsadsa', '', '2023-12-21 05:19:08'),
(35, 15, 24, 'sdsadsad', '', '2023-12-21 05:19:09'),
(36, 15, 24, 'sadsadsadsa', '', '2023-12-21 05:28:02'),
(37, 15, 24, 'xddfsd', '', '2023-12-21 05:29:18'),
(38, 15, 24, 'dsadsadsad', '', '2023-12-21 05:30:06'),
(39, 15, 24, 'dsadsadsad', '../uploads/\'GROUP 7 QUIZ.xlsx', '2023-12-21 05:30:06'),
(40, 15, 24, 'dsadsadsad', '', '2023-12-21 05:33:03'),
(41, 15, 24, 'dsadsadsad', '../uploads/Project-Management-Plan-1 (1).docx', '2023-12-21 05:33:03'),
(42, 15, 24, 'dsadsadsadsadsa', '', '2023-12-21 05:35:17'),
(43, 15, 24, 'dsadsadsadsadsa', 'STATISTICS-REPORT.pptm', '2023-12-21 05:35:17'),
(44, 15, 24, 'dsadsadsada', '', '2023-12-21 05:36:30'),
(45, 15, 24, 'dsadsadsada', 'Project-Management-Plan-1 (1).docx', '2023-12-21 05:36:30'),
(46, 15, 24, 'sdsadsadsa', 'GROUP 7 QUIZ.xlsx', '2023-12-21 05:39:15'),
(47, 15, 24, '654413541354115', 'STATISTICS-REPORT.pptm', '2023-12-21 05:51:17'),
(48, 15, 24, '111', 'STATISTICS-REPORT.pptm', '2023-12-21 06:00:09'),
(49, 15, 24, '324132132', 'STATISTICS-REPORT.pptm', '2023-12-21 06:00:50'),
(50, 15, 24, 'skladfjklsdjafljsdla;f', 'STATISTICS-REPORT.pptm', '2023-12-21 06:10:03'),
(51, 20, 24, 'dsadsadsadsadsa', '', '2023-12-21 15:40:51'),
(52, 15, 24, 'sadsadsa', 'CORDOVA PUBLIC COLLEGE.docx', '2023-12-21 16:59:04'),
(53, 20, 15, 'documention', 'campuscomm-spmp-21.docx', '2023-12-22 08:40:38'),
(54, 15, 32, 'this is message!!!', 'campuscomm sdd.docx', '2023-12-22 14:09:23'),
(55, 15, 33, 'this is message', '', '2023-12-22 14:15:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `user_msg`
--
ALTER TABLE `user_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_msg`
--
ALTER TABLE `user_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
