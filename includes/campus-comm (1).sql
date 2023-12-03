-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 08:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
SELECT * FROM tbl_announcement;
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
-- Table structure for table `bsitannouncement`
--

CREATE TABLE `bsitannouncement` (
  `a_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsitevents`
--

CREATE TABLE `bsitevents` (
  `events_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `event` text NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fromuser` int(100) NOT NULL,
  `touser` int(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `a_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `isapprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `events_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `event` text NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `isapprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `user_id`, `names`, `description`, `image`, `date_created`, `isdeleted`, `isapprove`) VALUES
(58, 20, 'arnel lamanilao', 'asdsadsad', 'Screenshot (1).png', '2023-12-03 23:09:04', 1, 0),
(59, 20, 'arnel lamanilao', 'sadsadsa', '', '2023-12-03 23:10:51', 1, 0),
(60, 20, 'arnel lamanilao', '', 'Screenshot (3).png', '2023-12-03 23:58:58', 1, 0),
(61, 20, 'arnel lamanilao', '', 'Screenshot (3).png', '2023-12-03 23:59:12', 1, 0),
(62, 20, 'arnel lamanilao', '', 'Screenshot (2).png', '2023-12-03 23:59:51', 1, 0),
(63, 20, 'arnel lamanilao', 'asdsadsadsadsa', 'Array', '2023-12-04 00:29:55', 1, 0),
(64, 20, 'arnel lamanilao', 'dsadsadsadsadsa', 'Array', '2023-12-04 00:35:14', 1, 0),
(65, 20, 'cpc.png', 'zxvzxz', 'C:\\xampp\\tmp\\phpCCC1.tmp', '2023-12-04 01:03:20', 1, 0),
(66, 20, 'arnel lamanilao', 'dasdsadas', 'Screenshot 2023-12-02 010153.png', '2023-12-04 01:04:46', 1, 0),
(67, 20, 'arnel lamanilao', 'vmvmvbn', 'Screenshot 2023-12-02 010211.png', '2023-12-04 01:06:18', 1, 0),
(68, 20, 'arnel lamanilao', 'yrtwuuhg', 'Screenshot 2023-12-02 010211.png', '2023-12-04 01:06:32', 1, 0),
(69, 20, 'arnel lamanilao', 'kjkfjcvnb', '[\".png\",\".png\"]', '2023-12-04 01:27:39', 1, 0),
(70, 20, 'arnel lamanilao', 'xxjkdk', 'Screenshot (2).png', '2023-12-04 01:30:25', 1, 0),
(71, 20, 'arnel lamanilao', 'dsadsadsadsadsa', 'Screenshot (3).png', '2023-12-04 01:31:31', 1, 0),
(72, 20, 'arnel lamanilao', 'dsadsadsa', 'Screenshot (4).png', '2023-12-04 01:32:24', 1, 0),
(73, 20, 'arnel lamanilao', 'sadsaxzcxzcxz', 'Screenshot 2023-12-02 010153.png', '2023-12-04 01:33:33', 1, 0),
(74, 20, 'arnel lamanilao', 'mbnvjncg', 'cpc.png', '2023-12-04 01:35:38', 1, 0),
(75, 20, 'arnel lamanilao', 'cvvvcvxcvv', 'Screenshot (2).png', '2023-12-04 01:36:41', 1, 0),
(76, 20, 'arnel lamanilao', 'sdfASDWRFWQSZ', 'Screenshot (2).png', '2023-12-04 01:37:33', 1, 0),
(77, 20, 'arnel lamanilao', 'sdfASDWRFWQSZ', 'Screenshot (2).png', '2023-12-04 01:37:34', 1, 0),
(78, 20, 'arnel lamanilao', 'sdfASDWRFWQSZ', 'Screenshot (2).png', '2023-12-04 01:37:34', 1, 0),
(79, 20, 'arnel lamanilao', 'dasdsaca', 'Screenshot (3).png', '2023-12-04 01:40:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postbsit`
--

CREATE TABLE `tbl_postbsit` (
  `post_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `names` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL,
  `isdeleted` int(11) NOT NULL,
  `isapprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_postbsit`
--

INSERT INTO `tbl_postbsit` (`post_id`, `user_id`, `names`, `description`, `image`, `date_created`, `isdeleted`, `isapprove`) VALUES
(7, '20', 'arnel lamanilao', 'sadsadsadsa', '', '2023-12-04 03:01:50', 1, 0),
(8, '20', 'arnel lamanilao', 'dasdsadsa', '', '2023-12-04 03:01:53', 1, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
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

INSERT INTO `tbl_user` (`user_id`, `fullname`, `username`, `password`, `user_type`, `dep_type`, `isdeleted`, `date_created`, `status`, `counterlock`) VALUES
(15, 'jezrael suliano', 'jezra', '123456', 'Student', 'BSIT', 1, '2023-12-02', 0, 0),
(20, 'arnel lamanilao', 'arnel', '12345', 'Teacher', 'BSIT', 1, '2023-12-02', 0, 0);

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
  `date_regsitered` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `approval` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_msg`
--

CREATE TABLE `user_msg` (
  `id` int(11) NOT NULL,
  `incoming_id` int(11) NOT NULL,
  `outgoing_id` int(11) NOT NULL,
  `messages` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_msg`
--

INSERT INTO `user_msg` (`id`, `incoming_id`, `outgoing_id`, `messages`) VALUES
(11, 15, 20, 'sdasdasdsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bsitannouncement`
--
ALTER TABLE `bsitannouncement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bsitevents`
--
ALTER TABLE `bsitevents`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_ibfk_1` (`fromuser`),
  ADD KEY `message_ibfk_2` (`touser`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_postbsit`
--
ALTER TABLE `tbl_postbsit`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_msg`
--
ALTER TABLE `user_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bsitannouncement`
--
ALTER TABLE `bsitannouncement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bsitevents`
--
ALTER TABLE `bsitevents`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_postbsit`
--
ALTER TABLE `tbl_postbsit`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_msg`
--
ALTER TABLE `user_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`fromuser`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`touser`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
