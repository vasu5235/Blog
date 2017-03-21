-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 12:41 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogger_info`
--

CREATE TABLE `blogger_info` (
  `blogger_id` int(11) NOT NULL,
  `blogger_username` varchar(100) NOT NULL,
  `blogger_password` varchar(100) NOT NULL,
  `blogger_creation_date` datetime DEFAULT NULL,
  `blogger_user_type` int(11) NOT NULL DEFAULT '0',
  `blogger_is_active` int(11) NOT NULL DEFAULT '0',
  `blogger_updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogger_info`
--

INSERT INTO `blogger_info` (`blogger_id`, `blogger_username`, `blogger_password`, `blogger_creation_date`, `blogger_user_type`, `blogger_is_active`, `blogger_updated_date`) VALUES
(0, 'Vasu', '6a5bb6f5ccc79af51d52f51ca5a4023420a43b46', '2016-08-25 05:16:04', 1, 1, NULL),
(1, 'Shantam', '3d787fef57cd272d2eb5dc62c192c3c897391ff9', '2012-10-11 00:00:00', 0, 1, '2016-09-09 04:09:15'),
(3, 'Pradeep', '6edf8b2bd1b6e03a535504401e6969c850269632', '2010-06-22 00:00:00', 0, 0, '2016-08-25 09:53:29'),
(4, 'Sriyansh', '30b304eceb7ca9f2208ff3aa193838f615416e84', '2015-04-21 00:00:00', 0, 1, '2016-08-25 10:04:13'),
(6, 'Atul', '00ab32a8f4dad5a57615960b56b58eccdb2b4896', '2013-08-25 00:00:00', 0, 1, '2016-08-25 06:50:05'),
(25, 'Diphthong', '0bfdc0ce25c926dcd8dd5812ac24b5c8b5d054f4', '2016-08-25 10:05:15', 0, 1, '2016-08-25 10:21:12'),
(26, 'Thespian', '0fef71fb9e9539d2e6dbf8f985d000456da3b92a', '2016-08-31 18:46:54', 0, 1, NULL),
(27, 'Temp', 'd969831eb8a99cff8c02e681f43289e5d3d69664', '2016-09-08 19:51:00', 0, 1, '2016-09-08 19:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `blog_detail`
--

CREATE TABLE `blog_detail` (
  `blog_id` int(100) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `blog_detail_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_detail`
--

INSERT INTO `blog_detail` (`blog_id`, `image_name`, `blog_detail_image`) VALUES
(56, 'myimages', 'myimages/coding.jpg'),
(58, 'myimages', 'myimages/table-tennis.jpg'),
(59, 'myimages', 'myimages/panda.jpg'),
(60, 'myimages', 'myimages/hw.jpg'),
(61, 'myimages', 'myimages/ml.jpg'),
(74, 'myimages', 'myimages/WP_20160513_15_40_40_Pro.jpg'),
(75, 'myimages', 'myimages/hp.jpg'),
(76, 'myimages', 'myimages/hp.jpg'),
(77, 'myimages', 'myimages/sr-71.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `blog_id` int(11) NOT NULL,
  `blogger_id` int(11) DEFAULT NULL,
  `blog_title` varchar(1024) NOT NULL,
  `blog_desc` longtext NOT NULL,
  `blog_category` varchar(100) DEFAULT NULL,
  `blog_author` varchar(50) NOT NULL,
  `blog_is_active` int(1) NOT NULL DEFAULT '0',
  `creation_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_author`, `blog_is_active`, `creation_date`, `updated_date`) VALUES
(8, NULL, 'dummy', 'dummy', 'dummy', '', 0, '0000-00-00 00:00:00', '2015-09-01 00:00:00'),
(56, 1, 'STL with C++ 14.																											', 'TEEMPMAEPEAM\r\nIn computing, sequence containers refer to a group of container class templates in the standard library of the C++ programming language that implement storage of data elements. Being templates, they can be used to store arbitrary elements, such as integers or custom classes. One common property of all sequential containers is that the elements can be accessed sequentially. Like all other standard library components, they reside in namespace std.\r\n\r\nThe following containers are defined in the current revision of the C++ standard: array, vector, list, forward_list, deque. Each of these containers implements different algorithms for data storage, which means that they have different speed guarantees for different operations:[1]\r\n\r\narray implements a compile-time non-resizeable array.\r\nvector implements an array with fast random access and an ability to automatically resize when appending elements.\r\ndeque implements a double-ended queue with comparatively fast random access.\r\nlist implements a doubly linked list.\r\nforward_list implements a singly linked list.}}', 'Competitive Coding.																																													', 'Shantam', 1, '2016-08-25 10:04:40', '2016-09-09 04:09:15'),
(58, 3, 'Table Tennis', 'Table tennis, also known as ping pong, is a sport in which two or four players hit a lightweight ball back and forth across a table using a small paddle. The game takes place on a hard table divided by a net. Except for the initial serve, the rules are generally as follows: players must allow a ball played toward them to bounce one time on their side of the table, and must return it so that it bounces on the opposite side at least once. A point is scored when a player fails to return the ball within the rules. Play is fast and demands quick reactions. Spinning the ball alters its trajectory and limits an opponent''s options, giving the hitter a great advantage.}', 'Sports									', 'Pradeep', 1, '2016-08-25 09:46:27', '2016-08-25 09:53:29'),
(59, 4, 'The giant PANDA!', 'The red panda (Ailurus fulgens), also called the lesser panda, the red bear-cat, and the red cat-bear, is a mammal native to the eastern Himalayas and southwestern China. It has reddish-brown fur, a long, shaggy tail, and a waddling gait due to its shorter front legs, and is slightly larger than a domestic cat. It is arboreal, feeds mainly on bamboo, but also eats eggs, birds, and insects. It is a solitary animal, mainly active from dusk to dawn, and is largely sedentary during the day.', 'Wildlife', 'Sriyansh', 1, '2016-09-25 10:50:50', '2016-08-25 10:59:50'),
(60, 4, 'Hello world!																		', 'Knowing people who do programming can be a completely new aspect in your life. You can learn a lot from a lot of logical approaches to day to day problems in ones life. There are different types of people also within themselves but knowing anyone of them can be a big boost to your conscience. I wrote an infinite program to solve tower of Hanoi.', 'Introduction to Coding.', 'Sriyansh', 1, '2016-08-25 06:32:13', '2016-08-25 10:04:13'),
(61, 25, 'Machine Learning', 'Machine learning is a subfield of computer science[1] that evolved from the study of pattern recognition and computational learning theory in artificial intelligence.[1] In 1959, Arthur Samuel defined machine learning as a "Field of study that gives computers the ability to learn without being explicitly programmed".[2] Machine learning explores the study and construction of algorithms that can learn from and make predictions on data.[3] Such algorithms operate by building a model from example inputs in order to make data-driven predictions or decisions,[4]:2 rather than following strictly static program instructions.', 'Research Areas.', 'Diphthong', 1, '2016-08-25 10:21:12', '2016-08-25 10:02:12'),
(74, 1, 'Another useful blog																																													', 'Sample text by sam29 and thespian on artificial intelligence ,table tennis...}', '8 queen problem																																													', 'Shantam', 0, '2016-09-08 18:47:20', '2016-09-09 03:29:41'),
(76, 27, 'Herwry Pottee', 'Harry Potter is a series of fantasy novels written by British author J. K. Rowling. The novels chronicle the life of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry. The main story arc concerns Harrys struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic, and subjugate all wizards and non-magical people (Muggles).', 'Reality to dreams', 'Temp', 0, '2016-09-08 19:57:58', '2016-09-08 19:57:58'),
(77, 1, 'Exam', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Temp', 'Shantam', 1, '2016-09-09 04:07:25', '2016-09-09 04:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`) VALUES
(1, 'You know who', 'youknowwho@hogwarts.com', 'A magic spell can be used to curse your blogs as well as your users.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger_info`
--
ALTER TABLE `blogger_info`
  ADD PRIMARY KEY (`blogger_id`);

--
-- Indexes for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blogger_id` (`blogger_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger_info`
--
ALTER TABLE `blogger_info`
  MODIFY `blogger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `blog_detail`
--
ALTER TABLE `blog_detail`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD CONSTRAINT `blog_master_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `blogger_info` (`blogger_id`),
  ADD CONSTRAINT `blog_master_ibfk_2` FOREIGN KEY (`blogger_id`) REFERENCES `blogger_info` (`blogger_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
