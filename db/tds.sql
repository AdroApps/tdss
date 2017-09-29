-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 04:42 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tds`
--

-- --------------------------------------------------------

--
-- Table structure for table `addemployee`
--

CREATE TABLE `addemployee` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `employeename` varchar(30) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `orgid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addemployee`
--

INSERT INTO `addemployee` (`id`, `userid`, `employeename`, `pan`, `adhar`, `orgid`) VALUES
(13, 14, 'fdgdfgdg', 'x3df34c23f', 'dfg4gdf654b54f4f', 14),
(14, 14, 'fgd', 'fdfgd4', 'gd', 14),
(15, 14, 'sdf', 'dsf', 'sfs', 14),
(16, 14, 'sdf', 'dfs', 'sdf', 14),
(17, 14, 'sdf', 'dfs', 'sdf', 14),
(18, 14, 'sdf', 'dfs', 'sdf', 14),
(19, 14, 'sdfsdfsdfsd', 'dfsdfds3sd', 'dfsdfdsfsdfsdfsd', 14),
(20, 14, 'dfdsf', 'dfs3dsdfsd', 'sdsddfsdfdsfdsfd', 14),
(21, 14, 'dfsdfsdf', 'dsdf3fsdfs', 'dfdfsdfsdfdsfsdf', 14),
(22, 2, 'fdgdfgdg', 'x3df34c23f', 'dfg4gdf654b54f4f', 14),
(23, 2, 'dfd', 'reer', 'reterdfsdfdsfsfs', 14),
(24, 2, 'dfd', 'reer', 'reterdfsdfdsfsfs', 14),
(25, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(26, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(27, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(28, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(29, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(30, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(31, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(32, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(33, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(34, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(35, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(36, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(37, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(38, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(40, 2, 'erter', 'reerjhjhjh', 'reter', 14),
(42, 2, 'erter', 'reerjhjhjh', 'reter', 14);

-- --------------------------------------------------------

--
-- Table structure for table `admincreate`
--

CREATE TABLE `admincreate` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `organization` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincreate`
--

INSERT INTO `admincreate` (`id`, `username`, `organization`, `email`, `password`, `number`) VALUES
(2, 'ram', 'Soft', 'soft@gmail.com', 'softsoft', '12345678910'),
(3, 'me', 'hp', 'hp@gmail.com', 'hphp', '123456789'),
(4, 'kushi', 'RVS finance', 'kushi@gmail.com', 'kushikushi', '123324434234');

-- --------------------------------------------------------

--
-- Table structure for table `clienttable`
--

CREATE TABLE `clienttable` (
  `id` int(11) NOT NULL,
  `organization` varchar(30) NOT NULL,
  `tan` varchar(30) NOT NULL,
  `year` varchar(15) NOT NULL,
  `quarter` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `service` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienttable`
--

INSERT INTO `clienttable` (`id`, `organization`, `tan`, `year`, `quarter`, `status`, `pname`, `email`, `number`, `date`, `service`) VALUES
(1, 'yaminii', '214', '----Financial Y', '', 'Completed', 'awdaf', 'yamini.adigarla@gmail.com', 12412144, '', '200'),
(6, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '', ''),
(8, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '', ''),
(9, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '', ''),
(30, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017-09-05 00:51:36', ''),
(31, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017/09/05', ''),
(32, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017-09-07 12:18:22', ''),
(33, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017-09-07 12:20:40', ''),
(34, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017/09/07', ''),
(35, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017/09/07', ''),
(36, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017/09/07', ''),
(38, 'yam', '2142442', '----Financial Y', '--------Qu', '', 'awdaf', '', 12412144, '2017/09/07', ''),
(39, 'nest', 'jhvb124', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/08', ''),
(42, 'softwar', 'rgv', '----Financial Y', '', '', 'yami', 'yamini@gmail.co', 12345, '2017/09/08', '30'),
(43, 'infotech', 'kjb32323', '----Financial Y', '', 'Processing', 'reena', 'reena@gmail.com', 123456789, '2017/09/10', '200'),
(44, 'kjkjjh ef', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(45, 'kjkjjh ef', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017-09-09 17:57:33', ''),
(46, 'kjkjjh ef', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(47, 'kjkjjh ef', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017-09-09 17:57:33', ''),
(48, 'farheen', '506', '----Financial Y', '', '', '', '', 0, '2017/09/10', ''),
(49, 'farheen', '506', '----Financial Y', 'Q4', '', '', '', 0, '2017/09/10', ''),
(50, 'farheen', '506', '2016-2017', 'Q2', '--------Status-', '', '', 0, '2017/09/10', ''),
(51, 'farheen', '506', '2016-2017', 'Q2', '--------Status-', '', '', 0, '2017/09/10', ''),
(52, 'farheen', '506', '2016-2017', 'Q2', '--------Status-', '', '', 0, '2017/09/10', ''),
(53, 'farheeeeeeeen', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(54, 'farheeeeeeeen', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(55, 'farheeeeeeeen', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(56, 'farheeeeeeeen', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(57, 'testcase1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(58, 'testcase1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(59, 'testcase2', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(60, 'testcase2', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(61, 'testcase3', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(62, 'testcase3', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(63, 'testcase3', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(64, 'testcase4', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(65, 'testcase4', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(66, 'test1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(67, 'test1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(68, 'test1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(69, 'test1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(70, 'test1', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(71, 'test123', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(72, 'test123', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(73, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(74, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(75, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(76, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(77, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(78, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(79, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(81, '', '', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/10', ''),
(82, 'syed', 'jhb123', '2017-2018', 'Q3', 'Completed', 'reena', 'reena@gmail.com', 2147483647, '2017/09/10', '300'),
(84, 'technical', 'jn1323', '2017-2018', 'Q1', 'Processing', 'mee', 'me@gmail.com', 2147483647, '2017/09/10', '100'),
(85, 'technical', 'jn1323', '2017-2018', 'Q1', 'Processing', 'mee', 'me@gmail.com', 2147483647, '2017/09/10', '100'),
(86, 'technical', 'jn1323', '2017-2018', 'Q1', 'Processing', 'mee', 'me@gmail.com', 2147483647, '2017/09/10', '100'),
(87, 'techno', 'jhb3244', '2017-2018', 'Q2', 'Processing', 'mini', 'mini@gmail.com', 123456788, '2017/09/11', '300'),
(88, 'techno', 'jhb3244', '2017-2018', 'Q2', 'Processing', 'mini', 'mini@gmail.com', 123456788, '2017/09/11', '300'),
(89, 'yamini', 'uvkvv', '----Financial Y', '--------Qu', '--------Status-', '', '', 0, '2017/09/12', ''),
(90, 'yaminii', 'ghcnc', '2017-2018', 'Q4', 'Processing', 'mee', 'me@gmail.com', 1234567890, '2017/09/12', '200'),
(91, 'yaminii', 'ghcnc', '2017-2018', 'Q4', 'Processing', 'mee', 'me@gmail.com', 1234567890, '2017/09/12', '200'),
(94, 'Finance', 'jh14241', '2017-2018', 'Q1', 'Completed', 'samm', 'finance@gmail.com', 1234567890, '2017/09/14', '300'),
(95, 'Finance', 'jh14241', '2017-2018', 'Q1', 'Processing', 'samm', 'finance@gmail.com', 1234567890, '2017/09/14', '300'),
(96, 'Finance', 'jh14241', '2017-2018', 'Q1', 'Processing', 'samm', 'finance@gmail.com', 1234567890, '2017/09/14', '300'),
(98, 'Engineer', 'jh7666666', '2017-2018', 'Q1', '--------Status-', 'riya', 'engineer@gmail.com', 2147483647, '2017/09/15', '300'),
(101, 'yaminii', '214', '2017-2018', 'Q4', '--------Status-', 'awdaf', 'yamini.adigarla@gmail.com', 2147483647, '2017/09/18', '300'),
(102, 'Finance', 'jh14241', '2017-2018', 'Q2', '--------Status-', 'samm', 'finance@gmail.com', 1234567890, '2017/09/19', '300'),
(103, 'Finance', 'jh14241', '2017-2018', 'Q2', '--------Status-', 'samm', 'finance@gmail.com', 1234567890, '2017/09/19', '300');

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `id` int(11) NOT NULL,
  `employeename` varchar(30) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `month1` varchar(15) NOT NULL,
  `salary1` varchar(30) NOT NULL,
  `tdsamount1` varchar(35) NOT NULL,
  `month2` varchar(15) NOT NULL,
  `salary2` varchar(30) NOT NULL,
  `tdsamount2` varchar(35) NOT NULL,
  `month3` varchar(15) NOT NULL,
  `salary3` varchar(30) NOT NULL,
  `tdsamount3` varchar(35) NOT NULL,
  `quarter` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`id`, `employeename`, `pan`, `adhar`, `month1`, `salary1`, `tdsamount1`, `month2`, `salary2`, `tdsamount2`, `month3`, `salary3`, `tdsamount3`, `quarter`, `created_date`, `userid`, `qid`) VALUES
(7, 'dfds', 'fsd', '', 'fsd', 'sdffsdf', 'dsf', 'ds', 'sdffdsf', 'dsfs', 'dfds', 'fdsf', 'df', '', '2017-09-28 07:40:17', 14, 92),
(8, 'sdsa', 'sd', '', 'sd', 'asd', 'sdas', 'as', 'sd', 'sdas', 'ds', 'd', 'asda', '', '2017-09-28 07:58:51', 14, 93),
(9, 'dfd', 'saddffsdsd', '', 'October', '4343', '344', 'November', '4334', '545', 'December', '875', '33', '', '2017-09-28 11:59:20', 14, 93),
(10, 'dfds', 'fsd', '', 'October', '232', '23', 'November', '23423', '223', 'December', '3434', '23', '', '2017-09-29 12:07:13', 14, 93);

-- --------------------------------------------------------

--
-- Table structure for table `fileuploads`
--
CREATE TABLE `fileuploads` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `file` text NOT NULL,
  `date` datetime NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileuploads`
--

INSERT INTO `fileuploads` (`id`, `userid`, `file`, `date`, `qid`) VALUES
(23, 14, 'course-1.jpg', '2017-09-29 05:52:14', 94),
(24, 2, 'events-slider1.jpg', '2017-09-29 06:06:51', 94);


-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `user_id`, `rec_id`, `status`, `message`, `date`) VALUES
(3, 2, 92, 0, 'Completed', '2017-09-25 06:18:18'),
(4, 2, 91, 0, 'Completed', '2017-09-25 06:18:33'),
(5, 2, 91, 0, 'Completed', '2017-09-25 06:18:48'),
(6, 2, 91, 0, 'Completed', '2017-09-25 06:18:48'),
(7, 2, 94, 0, 'Completed', '2017-09-25 06:40:11'),
(8, 2, 1, 0, 'Processing', '2017-09-25 06:50:21'),
(9, 2, 1, 0, 'Completed', '2017-09-25 06:52:38'),
(10, 2, 1, 0, 'Processing', '2017-09-25 06:53:21'),
(11, 2, 1, 0, 'Completed', '2017-09-25 06:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`) VALUES
(1, 'yamini', 'yamini'),
(7, 'mee', 'mee');

-- --------------------------------------------------------

--
-- Table structure for table `usercreate`
--

CREATE TABLE `usercreate` (
  `id` int(11) NOT NULL,
  `organization` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `number` int(15) NOT NULL,
  `tan` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercreate`
--

INSERT INTO `usercreate` (`id`, `organization`, `email`, `password`, `pname`, `number`, `tan`, `city`, `area`, `service`, `username`, `userid`) VALUES
(14, 'Finance', 'finance@gmail.com', 'finance', 'samm', 1234567890, 'jh14241', 'hyderabad', 'Banjara Hills', '300', 'ram', 2),
(27, 'test', 'test@gmail.com', 'test', 'tester', 1234545, 'dsfsdf', 'dfdsf', 'ffd', '15', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addemployee`
--
ALTER TABLE `addemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admincreate`
--
ALTER TABLE `admincreate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clienttable`
--
ALTER TABLE `clienttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileuploads`
--
ALTER TABLE `fileuploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercreate`
--
ALTER TABLE `usercreate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addemployee`
--
ALTER TABLE `addemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `admincreate`
--
ALTER TABLE `admincreate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clienttable`
--
ALTER TABLE `clienttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fileuploads`
--
ALTER TABLE `fileuploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usercreate`
--
ALTER TABLE `usercreate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
