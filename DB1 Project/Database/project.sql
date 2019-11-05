-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2018 at 08:41 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `Post_ID` int(11) NOT NULL,
  `Audio_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`Post_ID`, `Audio_Name`) VALUES
(5, 'Anthem'),
(9, 'Counting stars');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `Group_ID` int(11) NOT NULL,
  `Groupname` varchar(20) NOT NULL,
  `Group_AdminID` int(11) NOT NULL,
  `Members` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`Group_ID`, `Groupname`, `Group_AdminID`, `Members`) VALUES
(1, 'ICC Volunteers', 1, 500),
(2, 'Rockers', 24, 50),
(3, 'School_group', 20, 85);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_ID` int(11) NOT NULL,
  `Sender_ID` int(11) NOT NULL,
  `Receiver_ID` int(11) NOT NULL,
  `Message_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Sender_ID`, `Receiver_ID`, `Message_Date`) VALUES
(1, 1, 18, '2018-11-07'),
(2, 14, 3, '2018-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `Page_ID` int(11) NOT NULL,
  `Pagename` varchar(20) NOT NULL,
  `Description` text,
  `Page_category` varchar(20) NOT NULL,
  `Followers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`Page_ID`, `Pagename`, `Description`, `Page_category`, `Followers`) VALUES
(1, 'Beautiful Places', 'Information and updates about beautiful places to see all around the world', 'Travel', 650000),
(2, ' Jokes ', ' Funny, sarcastic jokes ', ' Entertainment', 250000),
(3, ' Cricbuzz ', ' News on cricket matches ', 'Sports', 700000),
(4, ' Sarcasm society ', ' sarcastic jokes ', ' Entertainment', 35000),
(5, ' Dresses and accesso', ' Designs of various designer dresses ', ' Lifestyle', 2000),
(6, ' General Knowledge ', ' Information of current affairs in the world ', ' Education', 850000),
(7, ' Desserts ', ' Pictures of various types of desserts ', ' Food', 8000),
(8, ' Trekking ', ' Travel destinations and trekking places all over the world ', ' Travel', 950000),
(9, ' Artificial Intellig', ' Theories behind building artificially intelligent systems and machines ', ' Education', 600000),
(10, ' Gadget Guru ', ' Information on different types of gadgets ', 'Technology', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `Post_ID` int(11) NOT NULL,
  `Photo_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`Post_ID`, `Photo_Name`) VALUES
(1, 'Beautiful Life'),
(3, 'IphoneX');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` int(11) NOT NULL,
  `Post_date` date DEFAULT NULL,
  `Comments` int(11) DEFAULT NULL,
  `Profile_ID` int(11) DEFAULT NULL,
  `Page_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `Post_date`, `Comments`, `Profile_ID`, `Page_ID`) VALUES
(1, '2018-11-01', 1500, 8, 1),
(2, '2018-11-12', 20, 1, NULL),
(3, '2016-10-01', 1060, NULL, 8),
(4, '2015-06-21', 90, NULL, 2),
(5, '2017-12-02', 45, 7, NULL),
(6, '2018-07-11', 77, 4, NULL),
(7, '2011-11-12', 450, 12, NULL),
(8, '2014-10-01', 280, NULL, 5),
(9, '2016-11-12', 50, 17, NULL),
(10, '2013-10-01', 600, NULL, 7),
(34, '2018-05-09', 0, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Profile_ID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `Mobile` char(10) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Profile_ID`, `firstname`, `lastname`, `Mobile`, `DOB`, `Email`, `Username`, `Password`) VALUES
(1, 'Amy ', ' Woolf', '6443789543', '1997-05-22', 'amy@gmail.com', 'amyw', 'amy123'),
(2, 'John ', 'Morris', '6783456233', '1993-07-12', 'johnm@gmail.com', 'john12', 'john123'),
(3, 'Mark ', ' Johnson', '6783656233', '1995-05-02', 'mark@gmail.com', 'markj', 'mark123'),
(4, 'Maria ', ' Bing', '7783656233', '1973-11-25', 'maria@gmail.com', 'maria25', 'maria123'),
(5, 'Anderson', ' Green', '6443799543', '1999-03-21', 'andy@gmail.com', 'andy', 'andy123'),
(6, 'Murphy ', 'Taylor', '6783456833', '1998-02-12', 'murphy@gmail.com', 'murphy12', 'murphy123'),
(7, 'Scott ', ' Jenkins', '8783656233', '1960-11-07', 'scott@gmail.com', 'scott', 'scott123'),
(8, 'Perry ', 'Simons', '9083656233', '1987-12-15', 'perry@gmail.com', 'perry10', 'perry123'),
(9, 'Adams ', ' Baker', '6443755543', '1994-05-22', 'adams@gmail.com', 'adams', 'adams123'),
(10, 'Ross ', 'Hill', '6783999233', '1988-07-12', 'ross@gmail.com', 'ross12', 'ross123'),
(11, 'Allen ', ' Bell', '6734556233', '1973-05-02', 'allen@gmail.com', 'allen', 'allen123'),
(12, 'Stewart ', ' Washington', '7788826233', '1970-11-25', 'stewart@gmail.com', 'stewart25', 'stewart123'),
(13, 'Cox', ' Gray', '6490799543', '1998-03-21', 'cox@gmail.com', 'cox', 'cox123'),
(14, 'Phillips', 'Turner', '6783707833', '1991-02-12', 'phillips@gmail.com', 'phillips12', 'phillips12'),
(15, 'Watson', ' Parker', '8783690433', '1967-11-07', 'watson@gmail.com', 'watson', 'watson123'),
(16, 'Lewis ', ' Evans', '9083691233', '1987-12-15', 'lewis@gmail.com', 'lewis10', 'lewis123'),
(17, 'Nelson ', ' Simons', '9083656003', '1987-12-18', 'nelson3@gmail.com', 'nel4', 'nelson512'),
(18, 'Harry', ' White', '6443755113', '1994-05-12', 'harry12@gmail.com', 'harry', 'harry123'),
(19, 'Ross ', 'Diaz', '6783999233', '1988-07-02', 'ross7@gmail.com', 'diaz12', 'diaz123'),
(20, 'James ', ' Collins', '6711556233', '1973-05-30', 'james@gmail.com', 'james', 'james123'),
(21, 'Watson', ' Lee', '7788864233', '1970-11-28', 'watson@gmail.com', 'watson25', 'watson123'),
(22, 'Miller', ' Reed', '6490889543', '1998-03-04', 'reed@gmail.com', 'miller', 'miller123'),
(23, 'Phillips', 'Turing', '6786637833', '1991-02-11', 'turing@gmail.com', 'turing12', 'turing123'),
(24, 'Jack', ' Moore', '8783828433', '1967-11-15', 'jack@gmail.com', 'jack', 'jack123'),
(25, 'Young ', ' Evans', '9083010233', '1987-12-13', 'young@gmail.com', 'young10', 'young123');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `Post_ID` int(11) NOT NULL,
  `Text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`Post_ID`, `Text`) VALUES
(1, 'Life is what you make it!'),
(2, 'Fake it till you make it!'),
(8, 'The harder you work, the harder it is to surrender.');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `Post_ID` int(11) NOT NULL,
  `Video_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`Post_ID`, `Video_Name`) VALUES
(2, 'Dance'),
(10, 'Machine learning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`Post_ID`,`Audio_Name`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`Group_ID`),
  ADD KEY `Group_AdminID` (`Group_AdminID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_ID`),
  ADD KEY `Sender_ID` (`Sender_ID`),
  ADD KEY `Receiver_ID` (`Receiver_ID`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`Page_ID`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`Post_ID`,`Photo_Name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `Profile_ID` (`Profile_ID`),
  ADD KEY `Page_ID` (`Page_ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Profile_ID`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`Post_ID`,`Text`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Post_ID`,`Video_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `audio_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`Group_AdminID`) REFERENCES `profile` (`Profile_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Sender_ID`) REFERENCES `profile` (`Profile_ID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Receiver_ID`) REFERENCES `profile` (`Profile_ID`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`Profile_ID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`Page_ID`) REFERENCES `page` (`Page_ID`);

--
-- Constraints for table `text`
--
ALTER TABLE `text`
  ADD CONSTRAINT `text_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
