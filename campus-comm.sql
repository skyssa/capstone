-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 02:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_displayUser` ()   BEGIN SELECT * FROM tbl_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (IN `p_username` TEXT, IN `p_password` VARCHAR(100))   BEGIN

SELECT * FROM tbl_user where username =p_username and password = p_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_save` (IN `p_user_id` INT(11), IN `p_fullname` TEXT, IN `p_username` TEXT, IN `p_password` VARCHAR(100), IN `p_user_type` TEXT, IN `p_dep_type` TEXT, IN `p_isdeleted` INT(11), IN `p_date_created` DATE, IN `p_status` INT)   BEGIN 
INSERT INTO tbl_user(user_id,fullname,username,password,user_type,dep_type,isdeleted,date_created,status) VALUES(p_user_id,
p_fullname, 
p_username,
p_password,
p_user_type,
p_dep_type,
0,
now(),
1);
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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fromuser` int(100) NOT NULL,
  `touser` int(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `fromuser`, `touser`, `message`) VALUES
(1, 3, 2, 'xZCcZcZasd'),
(3, 1, 3, 'sdsadsadsa'),
(4, 8, 4, 'dkjsahdkhska'),
(5, 8, 3, 'dasdhsjahdasfasdf');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`a_id`, `title`, `description`, `date_created`, `isdeleted`) VALUES
(1, 'sadsadsa', 'dasdsadsadsad', '2023-04-25 03:02:51', 1),
(2, 'dsadsa', 'sadsadsadsadsa', '2023-04-25 14:35:45', 1),
(3, 'scholarship ', 'dnmsklandkjbsad', '2023-05-13 16:08:21', 1),
(4, 'sdsads', 'sadsadsa', '2023-05-22 05:59:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `isapprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `comment`, `post_id`, `isapprove`) VALUES
(0, 'saomethjinf askjdfaasnmbsad', 1, 0),
(0, 'sdsadsadsad', 1, 0),
(0, 'hahahha \r\n', 1, 0),
(0, 'hahahha \r\ndsadsadsad', 1, 0),
(0, 'bfsdkafasd', 1, 0),
(0, 'awdsadwad', 1, 0),
(0, 'awdsadwadsdcvsc', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `events_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `event` text NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`events_id`, `title`, `event`, `date_posted`) VALUES
(1, 'asdsad', 'sadasdas', '2023-04-25 02:59:53'),
(2, 'asdsad', 'sadasdas', '2023-04-25 03:00:04'),
(3, 'sdsd', 'sdsdsa', '2023-04-25 03:00:53'),
(4, 'asd', 'sadsadsa', '2023-04-25 14:35:28'),
(5, 'campagn', 'ssg', '2023-05-13 09:34:20'),
(6, 'birhtyday', 'dsahkldhsa', '2023-05-13 16:08:00'),
(7, 'dsad', 'asdsadsa', '2023-05-22 05:48:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `user_id`, `names`, `description`, `image`, `date_created`, `isdeleted`, `isapprove`) VALUES
(14, 1, 'jezrael suliano', 'asdfsdafsdf', '', '2023-05-15 21:15:55', 1, 0),
(15, 1, 'jezrael suliano', 'sdf sdanfkslad', '', '2023-05-15 21:37:49', 1, 0),
(18, 1, 'jezrael suliano', 'wadaw', '', '2023-05-15 22:32:16', 1, 0),
(19, 1, 'jezrael suliano', 'b 8vyhjv y', '', '2023-05-15 22:32:36', 1, 0),
(22, 1, 'jezrael suliano', 'qeqwe', '', '2023-05-16 00:58:14', 1, 0),
(23, 1, 'jezrael suliano', 'ayaw pag buut kay di ka gwapo', '', '2023-05-16 02:02:57', 1, 0),
(46, 4, 'Jolly Ford', 'awdsadawd', '', '2023-05-16 09:09:44', 1, 0),
(47, 9, 'test', 'sasdasadsagjsdavjdsa', '', '2023-05-23 20:20:21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `report_type` text NOT NULL,
  `date_reported` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `post_id`, `report_type`, `date_reported`) VALUES
(1, 0, 'illegal content', '2023-05-04'),
(2, 0, 'sexuall content', '2023-05-04'),
(3, 0, 'sexuall content', '2023-05-04'),
(4, 0, 'sexuall content', '2023-05-13'),
(5, 0, 'sexuall content', '2023-05-23');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fullname`, `username`, `password`, `user_type`, `dep_type`, `isdeleted`, `date_created`, `status`, `counterlock`) VALUES
(1, 'jezrael suliano', 'jezra', '123456', 'Teacher', 'BSIT', 0, '2023-05-10', 1, 0),
(2, 'arnel carcela', 'lenra', '1234567', 'Student', 'BSIT', 0, '2023-05-10', 1, 2),
(3, 'bensi john', 'jhon', '12345', 'Student', 'BSHM', 0, '2023-05-11', 1, 0),
(4, 'Jolly Ford', 'jolly', '123456789', 'Teacher', 'BSED', 0, '2023-05-12', 1, 0),
(5, 'din dignaran', 'din', '123456789', 'Teacher', 'BEED', 0, '2023-05-13', 1, 0),
(6, 'adcada', 'awdasd', 'awdsadawdsad', 'Student', 'BSIT', 0, '2023-05-16', 1, 0),
(7, 'admin', 'admin', 'admin123', 'admin', 'admin', 0, '0000-00-00', 1, 0),
(8, 'lenraesra', 'jojo', '123456', 'Student', 'BEED', 0, '2023-05-22', 1, 0),
(9, 'test', 'test', 'test123', 'Teacher', 'BSIT', 0, '2023-05-23', 1, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
