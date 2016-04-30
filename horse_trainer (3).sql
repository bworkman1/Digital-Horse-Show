-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2016 at 04:33 AM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `horse_trainer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE IF NOT EXISTS `admin_settings` (
`id` int(11) NOT NULL,
  `label` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `field_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `label`, `value`, `ts`, `field_name`, `group`) VALUES
(1, 'Plan A', '59.99', '2016-02-18 03:34:51', 'plan_a', ''),
(2, 'Plan B', '79.99', '2016-02-18 03:34:51', 'plan_b', ''),
(3, 'Plan C', '109.99', '2016-02-18 03:35:15', 'plan_c', ''),
(4, 'Facebook', 'http://facebook.com', '2016-03-02 02:04:38', 'facebook', 'social'),
(5, 'Google +', 'https://plus.google.com/', '2016-03-02 02:04:38', 'google_plus', 'social'),
(8, 'Twitter', 'https://twitter.com', '2016-03-02 02:07:14', 'twitter', 'social'),
(9, 'Email', 'admin@adminemail.com', '2016-03-02 02:31:23', 'admin_email', 'contact'),
(10, 'Phone', '5555555555', '2016-03-02 02:31:23', 'admin_phone', 'contact'),
(13, 'Terms', 'http://test.com', '2016-03-02 02:34:34', 'admin_terms', 'email_footer'),
(14, 'Privacy', 'http://test.com', '2016-03-02 02:34:34', 'admin_privacy', 'email_footer'),
(15, 'Header Color', '#D5BDE4', '2016-03-02 02:56:11', 'header_color', 'color_scheme'),
(16, 'Google Maps Key', 'AIzaSyAFqORP5b2aNW54tG5i6IimHrVQlzOn_nI', '2016-03-02 04:46:54', 'google_api', 'API'),
(17, 'Coaching Credits', '15.99', '2016-03-20 00:54:54', 'coaching_credits', ''),
(18, 'Coach Paid Per Video', '29.99', '2016-04-23 17:39:36', 'paid_per_video', 'payments');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
`id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `award_name` varchar(100) NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coach_payments`
--

CREATE TABLE IF NOT EXISTS `coach_payments` (
`id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(11) NOT NULL,
  `notes` text,
  `payment_groups_id` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `payment_per_video` varchar(13) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `coach_payments`
--

INSERT INTO `coach_payments` (`id`, `coach_id`, `ts`, `amount`, `notes`, `payment_groups_id`, `address`, `city`, `state`, `zip`, `payment_per_video`) VALUES
(1, 4, '2016-04-23 23:01:00', 60, 'Sent payment via fedex with a tracking number.', '', '494 Garfield Ave', 'Newark', 'OH', '', '29.99'),
(3, 4, '2016-04-23 23:11:12', 60, NULL, '', '494 Garfield Ave', 'Newark', 'OH', '', '29.99'),
(4, 4, '2016-04-23 23:12:55', 60, NULL, '', '494 Garfield Ave', 'Newark', 'OH', '43055', ''),
(5, 4, '2016-04-23 23:13:15', 60, 'notes', '', '494 Garfield Ave', 'Newark', 'OH', '43055', ''),
(6, 4, '2016-04-23 23:19:34', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(7, 4, '2016-04-23 23:20:23', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(8, 4, '2016-04-23 23:20:34', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(9, 4, '2016-04-23 23:20:58', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(10, 4, '2016-04-23 23:21:01', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(11, 4, '2016-04-23 23:21:14', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(12, 4, '2016-04-23 23:21:50', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(13, 4, '2016-04-23 23:22:38', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(14, 4, '2016-04-23 23:22:53', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(15, 4, '2016-04-23 23:23:27', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99'),
(16, 4, '2016-04-23 23:24:03', 60, 'adfaf', '136|137', '494 Garfield Ave', 'Newark', 'OH', '43055', '29.99');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'coach', 'Coach or Judge');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `trans_id` varchar(100) NOT NULL,
  `approval_code` varchar(100) NOT NULL,
  `paid_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `trans_id`, `approval_code`, `paid_on`, `user_id`, `amount`, `credits`) VALUES
(7, '2253287502', 'RP732Y', '2016-01-15 08:30:35', 2, 143.91, 9),
(8, '2253289747', 'JV8K9Y', '2016-02-29 10:17:37', 2, 127.92, 8),
(9, '2253324167', 'W81SD1', '2016-03-21 05:17:57', 2, 159.9, 10),
(10, '2253324167', 'W81SD1', '2016-04-15 05:17:57', 2, 30.9, 9),
(11, '2253324167', 'W81SD1', '2015-11-10 06:17:57', 2, 175.9, 10),
(12, '2253324167', 'W81SD1', '2015-12-08 06:17:57', 2, 300.5, 9),
(13, '2253324167', 'W81SD1', '2015-10-14 05:17:57', 2, 80.9, 9),
(14, '2253324167', 'W81SD1', '2015-10-08 05:17:57', 2, 150.9, 9),
(15, '2257163910', 'QKQWP4', '2016-04-24 05:53:48', 2, 95.94, 6),
(16, '2257164009', 'MNXH1Y', '2016-04-24 05:54:50', 2, 143.91, 9),
(17, '2257164121', '2WQV1F', '2016-04-24 05:56:00', 2, 175.89, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
`id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scorecard_sections_7`
--

CREATE TABLE IF NOT EXISTS `scorecard_sections_7` (
`id` int(11) NOT NULL,
  `letters` varchar(20) NOT NULL,
  `test` varchar(255) NOT NULL,
  `directive` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `co_effecient` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `divider` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=648 ;

--
-- Dumping data for table `scorecard_sections_7`
--

INSERT INTO `scorecard_sections_7` (`id`, `letters`, `test`, `directive`, `points`, `co_effecient`, `order`, `card_id`, `divider`) VALUES
(103, 'B', 'afsd', 'Breaker', 0, 0, 4, 0, 'y'),
(104, 'C', 'adfsa', 'directive', 0, 0, 7, 0, 'y'),
(105, 'A', 'a', 'adsfasd', 0, 0, 10, 0, 'y'),
(106, 'c', 'bc', 'adfs', 0, 0, 0, 0, 'y'),
(107, 'a', 'asdfasdfasfad', 'asdf', 0, 0, 1, 0, 'n'),
(108, 'a', 'a', 'b', 0, 0, 2, 0, 'n'),
(109, '', '', 'a', 0, 0, 3, 0, ''),
(110, '', '', 'a', 0, 0, 5, 0, ''),
(111, '', '', '', 0, 0, 6, 0, ''),
(112, '', '', '', 0, 0, 8, 0, ''),
(113, '', 'a', '', 0, 0, 9, 0, ''),
(114, '', 'a', '', 0, 0, 11, 0, ''),
(635, 'A', 'Enter working jog\r\nProceed down the center line without halting', 'Straightness; quality of the jog.', 0, 0, 0, 11, 'n'),
(636, 'C', 'Track left, working jog', 'Balance and correct bend through the turn; quality of the jog.', 0, 0, 1, 11, 'n'),
(637, 'E-B', 'Half circle left 20 meters working jog', 'Roundness, balance and correct bend on the half circle; quality of the jog.', 0, 2, 2, 11, 'n'),
(638, 'Between M ', 'Develop working walk', 'Willingness and smoothness of transition; quality of the walk.+', 0, 0, 4, 11, 'n'),
(639, 'H-B', 'Free Walk', 'Walk with horse willing and able to stretch the neck down and forward; relaxation; rhythm, swing through the back.', 0, 0, 5, 11, 'n'),
(640, '6', 'Line Break', '', 0, 0, 3, 11, 'y'),
(641, 'A-B', 'Jump Through Hoops', 'Jump through the hoops and land gracefully', 0, 2, 1, 12, 'n'),
(642, 'C-D', 'Jump over shrubs', 'Jump over the shrubs without falling', 0, 2, 2, 12, 'n'),
(643, 'E', 'Run as fast ', 'Run the horse fast', 0, 0, 3, 12, 'n'),
(644, 'F', 'Stop', 'Stop without throwing rider off', 0, 0, 4, 12, 'n'),
(645, '', 'Bonus Points', '', 0, 0, 5, 12, 'y'),
(646, 'J', 'Hop', 'Hop up and down and round n round', 0, 0, 6, 12, 'n'),
(647, 'K', 'Jump Fence', 'Jump the fence', 0, 2, 7, 12, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `scorecard_sections_7_scores`
--

CREATE TABLE IF NOT EXISTS `scorecard_sections_7_scores` (
`id` int(11) NOT NULL,
  `letters` varchar(20) NOT NULL,
  `test` varchar(255) NOT NULL,
  `directive` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `co_effecient` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `card_id` int(11) NOT NULL,
  `divider` enum('y','n') NOT NULL DEFAULT 'n',
  `remarks` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `scorecard_sections_7_scores`
--

INSERT INTO `scorecard_sections_7_scores` (`id`, `letters`, `test`, `directive`, `points`, `co_effecient`, `video_id`, `card_id`, `divider`, `remarks`) VALUES
(68, 'A-B', 'Jump Through Hoops', 'Jump through the hoops and land gracefully', 5, 2, 136, 12, 'n', 'Great Job'),
(69, 'C-D', 'Jump over shrubs', 'Jump over the shrubs without falling', 2, 2, 136, 12, 'n', 'Could have landed that one a little better'),
(70, 'E', 'Run as fast ', 'Run the horse fast', 4, 0, 136, 12, 'n', 'Here goes nothing'),
(71, 'F', 'Stop', 'Stop without throwing rider off', 15, 4, 136, 12, 'n', 'Wow, Impressive'),
(72, '', 'Bonus Points', '', 0, 0, 136, 12, 'y', ''),
(73, 'J', 'Hop', 'Hop up and down and round n round', 2, 2, 136, 12, 'n', ''),
(74, 'K', 'Jump Fence', 'Jump the fence', 6, 2, 136, 12, 'n', ''),
(75, 'A-B', 'Jump Through Hoops', 'Jump through the hoops and land gracefully', 3, 4, 137, 12, 'n', 'New remark'),
(76, 'C-D', 'Jump over shrubs', 'Jump over the shrubs without falling', 4, 4, 137, 12, 'n', 'Words go here'),
(77, 'E', 'Run as fast ', 'Run the horse fast', 4, 3, 137, 12, 'n', 'Testing'),
(78, 'F', 'Stop', 'Stop without throwing rider off', 2, 1, 137, 12, 'n', 'Work it girl'),
(79, '', 'Bonus Points', '', 0, 0, 137, 12, 'y', ''),
(80, 'J', 'Hop', 'Hop up and down and round n round', 10, 3, 137, 12, 'n', 'Nice Try'),
(81, 'K', 'Jump Fence', 'Jump the fence', 12, 7, 137, 12, 'n', 'Nice jump');

-- --------------------------------------------------------

--
-- Table structure for table `score_cards`
--

CREATE TABLE IF NOT EXISTS `score_cards` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `heading` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `max_score` int(11) NOT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'y',
  `child_of` varchar(100) NOT NULL,
  `option_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `score_cards`
--

INSERT INTO `score_cards` (`id`, `name`, `heading`, `ts`, `max_score`, `active`, `child_of`, `option_name`) VALUES
(11, 'WDAA 2013 WESTERN DRESSAGE INTRODUCTORY LEVEL TEST 1', '<div class="row">\r\n	<div class="col-md-6">\r\n		<p>\r\n			<b>PURPOSE</b></p>\r\n		<p>\r\n			Tests provide an introduction to the discipline of Western Dressage; the horse performs only at the gaits of walk and jog. The rider should demonstrate correct basic position, use of basic aids, and under-standing of figures. The horse should show relaxation; harmony of horse and rider is important. The jog should be a natural gait within the horse&rsquo;s scope and should demonstrate a swinging back.</p>\r\n	</div>\r\n	<div class="col-md-6">\r\n		<p>\r\n			ARENA SIZE: Small 40m x 20m or Large 60m x 20m<br />\r\n			AVERAGE RIDE TIME:<br />\r\n			Small Arena 4:00 min or Large Arena 4:30 min</p>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2016-04-15 01:07:40', 280, 'y', 'Level 2', 'Western Dressage Introductory'),
(12, 'WDAA 2013 WESTERN DRESSAGE INTRODUCTORY LEVEL TEST 2', '<div class="row">\r\n	<div class="col-md-6">\r\n		<b>PURPOSE</b>\r\n		<p>\r\n			Tests provide an introduction to the discipline of Western Dressage; the horse performs only at the gaits of walk and jog. The rider should demonstrate correct basic position, use of basic aids, and under-standing of figures. The horse should show relaxation; harmony of horse and rider is important. The jog should be a natural gait within the horse&rsquo;s scope and should demonstrate a swinging back.</p>\r\n	</div>\r\n	<div class="col-md-6">\r\n		<br />\r\n		ARENA SIZE: Small 40m x 20m or Large 60m x 20m<br />\r\n		AVERAGE RIDE TIME:<br />\r\n		Small Arena 4:15 min or Large Arena 5:00 min</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '2016-04-15 01:49:21', 240, 'y', 'Level 2', 'Dressage Level 2'),
(13, 'Brian Workman', 'Test Scorecard', '2016-04-16 00:03:01', 320, 'y', 'Level 1', 'Dressage Level 2 (empty)');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
`id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `scorecard_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `anwser` varchar(255) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE IF NOT EXISTS `survey_questions` (
`id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `input_type` varchar(255) NOT NULL,
  `options` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`id`, `question`, `input_type`, `options`, `ts`) VALUES
(1, 'How satisfied where with the coaches speed. ', 'select', 'Very Satisfied|Satisfied|Average|Dissatisfied|Very dissatisfied', '2016-04-15 03:02:09'),
(2, 'Comments or Suggestions?', 'textarea', '', '2016-04-15 03:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `upload_comments`
--

CREATE TABLE IF NOT EXISTS `upload_comments` (
`id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `upload_comments`
--

INSERT INTO `upload_comments` (`id`, `video_id`, `ts`, `comment`, `user_id`) VALUES
(11, 19, '2016-02-15 06:04:06', 'Another comment to start off', 1),
(12, 19, '2016-02-15 06:04:20', 'Now post just one!', 1),
(13, 19, '2016-02-15 06:05:34', 'asdf a fdsafdfds', 1),
(14, 19, '2016-02-15 06:05:39', 'asdf a fdsafdfds asdf afsd', 1),
(15, 19, '2016-02-15 06:06:02', 'Teserteae fadsfafd adfs', 1),
(16, 19, '2016-02-15 06:06:20', 'aads ffa sdfasdfsa', 1),
(17, 19, '2016-02-15 06:11:51', 'asdf af sdafsdad', 1),
(18, 19, '2016-02-15 06:14:52', 'Comment one', 1),
(19, 19, '2016-02-15 06:20:26', 'In id lorem molestie parturient torquent a nunc a ipsum hendrerit adipiscing lacus interdum eros lorem parturient per. Netus adipiscing ante a a vulputate eu parturient parturient faucibus sodales habitant convallis dignissim neque accumsan bibendum cras in inceptos. Penatibus at arcu suspendisse adipiscing torquent a adipiscing class etiam blandit cum ultricies donec felis suspendisse ipsum a magna a mattis leo integer. Fusce magna velit cras a et vehicula suspendisse leo cum a arcu dictum suscipit ante luctus duis lacinia.\n\nTristique sed condimentum lorem vestibulum ut ullamcorper justo praesent consectetur pulvinar placerat augue tristique montes a facilisis purus quam cras proin consectetur ipsum scelerisque vestibulum.A a facilisi non parturient parturient consectetur placerat hendrerit ridiculus metus ut suspendisse suspendisse leo consectetur quam tristique adipiscing cursus id pharetra nascetur a ullamcorper metus parturient.A mi in a a condimentum conubia.', 1),
(20, 20, '2016-02-15 06:38:26', 'This is a new comment :)', 1),
(21, 20, '2016-02-15 06:38:51', 'this is another comment again', 1),
(22, 28, '2016-02-18 03:02:25', 'Nice video', 1),
(23, 19, '2016-02-18 03:06:34', 'adsfd asdfa dsf', 1),
(24, 19, '2016-02-18 03:06:39', 'asdf asdfafda', 1),
(25, 22, '2016-02-18 03:07:45', 'Tester', 1),
(26, 30, '2016-02-18 03:15:01', 'Tester ', 2),
(27, 30, '2016-02-18 03:25:08', 'asd fasd fas df', 2),
(28, 20, '2016-02-18 04:31:34', 'Night sara', 1),
(29, 20, '2016-02-19 05:30:41', 'Tester', 1),
(30, 21, '2016-02-20 18:08:55', 'you suck', 1),
(31, 21, '2016-02-21 16:52:52', 'adfasdfs', 1),
(32, 34, '2016-02-21 18:08:59', 'Wow!', 1),
(33, 35, '2016-02-21 18:15:36', 'Hehehe', 1),
(34, 35, '2016-02-22 02:29:53', 'Test from my phone', 1),
(35, 35, '2016-02-22 02:31:08', 'Test from phone android', 1),
(38, 38, '2016-02-25 04:10:37', 'Comment', 1),
(39, 48, '2016-02-26 05:16:55', 'New comment', 1),
(40, 37, '2016-02-27 17:27:47', 'Riah', 1),
(41, 40, '2016-02-27 17:38:35', 'a comment is here', 1),
(42, 40, '2016-02-27 17:38:48', 'Another comment', 1),
(53, 39, '2016-02-27 20:55:19', 'No delete on add', 1),
(54, 51, '2016-02-29 03:18:23', 'Test', 1),
(55, 51, '2016-02-29 03:19:47', 'Another comment', 1),
(56, 51, '2016-02-29 03:40:25', 'adsfasd', 1),
(57, 58, '2016-02-29 04:48:51', 'Comment', 1),
(59, 57, '2016-02-29 05:16:11', 'fgdsgf', 1),
(60, 57, '2016-02-29 05:16:24', 'aadsfasd fadsffasfdf', 1),
(61, 97, '2016-03-05 21:59:30', 'Nice video', 1),
(62, 99, '2016-03-05 22:03:11', '65464', 1),
(63, 100, '2016-03-05 22:20:17', '36545645', 2),
(64, 101, '2016-03-05 23:33:32', 'Comment from someone else that was left by someone else to see it here in the comments section', 1),
(65, 102, '2016-03-06 03:33:41', 'adsfasd', 2),
(66, 103, '2016-03-06 03:40:51', 'afsdafa', 2),
(67, 107, '2016-03-09 02:32:26', 'Nice video', 4),
(68, 107, '2016-03-09 02:32:49', 'Wow that is real!', 4),
(69, 107, '2016-03-09 03:12:13', 'Nice job!', 1),
(70, 107, '2016-03-09 03:13:08', 'Admin comment', 1),
(71, 111, '2016-03-10 06:34:45', 'Submitting a comment from IE ', 2),
(72, 113, '2016-03-11 01:58:04', 'Comments', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'assets/themes/default/images/user-default.jpg',
  `bio` text,
  `profile_name` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `emails_on` varchar(3) DEFAULT 'yes',
  `newsletter` varchar(3) DEFAULT 'yes',
  `email_public` varchar(3) DEFAULT 'yes',
  `profile_public` varchar(3) DEFAULT 'yes',
  `coaching_credits` int(11) NOT NULL,
  `mailing_address` varchar(100) NOT NULL,
  `mailing_city` varchar(60) NOT NULL,
  `mailing_state` varchar(2) NOT NULL,
  `mailing_zip` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `user_image`, `bio`, `profile_name`, `facebook`, `google`, `twitter`, `instagram`, `emails_on`, `newsletter`, `email_public`, `profile_public`, `coaching_credits`, `mailing_address`, `mailing_city`, `mailing_state`, `mailing_zip`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$.8vYySe6RX48.8iCVJltV.Sr4bfSxkxT.QppPIPjdklTNvbxZGPYW', '', 'bradsf@fdadsf.com', '', NULL, NULL, 'ZRrk8z6K8ba5Mwt0zFIYmO', 1268889823, 1461432177, 1, 'Admin', 'istrator', '0', '/uploads/administrator/2016/04/784b70407e92f1b9b79ce27389d29195.jpg', 'Sed sit amet elit ultricies, varius velit gravida, rhoncus nulla. Nulla a porttitor sem, sed porttitor libero. Morbi porta a est eu auctor. In maximus scelerisque elit vitae mollis. Phasellus eget erat quam. Sed id luctus ex, in malesuada augue. Curabitur id consectetur massa. Curabitur vestibulum tincidunt porta. Sed nec dapibus sapien, a ultricies lorem. Aliquam nisi augue, porttitor et augue vitae, convallis finibus mauris. Sed eleifend, felis non dignissim elementum, sapien eros tristique diam, gravida hendrerit neque velit iaculis felis. Integer nunc lacus, pretium vel tincidunt eu, lacinia a sapien. Pellentesque magna elit, aliquet quis cursus vitae, cursus vitae ligula.', 'my-profile-name', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(2, '::1', 'bworkman', '$2y$08$MYqV6JDSM7ywi4PrugC5WurgU3xzwoHjHPBztasK7Yvy3uKqQIUFm', NULL, 'brian.workman@rocketmail.com', NULL, NULL, NULL, NULL, 1455764982, 1461462184, 1, 'Brian', 'Workman', '7406611411', '/uploads/bworkman/2016/04/d8daa2be8e37c4d2d6c07ccda1f921b0.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'bworkman', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'yes', 'yes', 'yes', 'yes', 36, '', '', '', ''),
(4, '127.0.0.1', 'coachk', '$2y$08$8HANzl3R96lDP4DvDGMAjO/4BHfcJ.he.IXfkEBQi721zeIOp2.CK', NULL, 'brian.workmans@rocketmail.com', '90e0bb9e705600a1033f360d2684742b676d74e7', NULL, NULL, NULL, 1457236831, 1461447144, 1, 'Coach', 'Karl', '7406611411', '/uploads/coachk/2016/04/d59d1a9f197ad7bf8f9cf8e278421403.png', '<p>\r\n	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'profile', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'yes', 'yes', 'yes', 'yes', 0, '494 Garfield Ave', 'Newark', 'OH', '43055'),
(5, '127.0.0.1', 'benedmunds752227807', '$2y$08$A9ABo2Zr1fYQaWydSZwMju1ZqUkAWHqf46AFRXAjpmOAH.j14VEE6', NULL, 'ben.edmunds853942885@gmail.com', 'cd9b46be8afaa4546a529851f0b8ec9c6d445ffd', NULL, NULL, NULL, 1460335171, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(6, '127.0.0.1', 'benedmunds77911469', '$2y$08$1nHk85iHITnenYtlL6dXX.mPj2RwkriehDlwBlWMKPqDL9UXt24S.', NULL, 'ben.edmunds603454629@gmail.com', '110399e913f7b96f86bb9970f224c4ead173a4fc', NULL, NULL, NULL, 1460335178, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(7, '127.0.0.1', 'benedmunds196930011', '$2y$08$Zy.jwAfA70Iwe424DIW95uFfp7/puGxAhNxzKPXVKyR3EktSWjT8O', NULL, 'ben.edmunds138977136@gmail.com', '544f315e494b6ea0d218278ed0115d5d3753d0ff', NULL, NULL, NULL, 1460335197, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(8, '127.0.0.1', 'benedmunds360107485', '$2y$08$XwU/.EqFiL9ADhxAkrDBtu3uHkFz81zbGuAVPQzwwoQW.jPVtNhJG', NULL, 'ben.edmunds253448560@gmail.com', '19aacf684d3ee1deb327039b04ea2ea4863660e6', NULL, NULL, NULL, 1460335449, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(9, '127.0.0.1', 'benedmunds300140450', '$2y$08$qejGLj2Sin7LzT/0C9nnXOJHyMpMOKEAZyahtN/LXVp/lhoEQqaYW', NULL, 'ben.edmunds295166086@gmail.com', 'ecbbe9426f94165d4043f20dbab6edb21f69c88e', NULL, NULL, NULL, 1460335457, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(10, '127.0.0.1', 'benedmunds938171392', '$2y$08$/CF./dr4MN4b46sTWHDKmOw.vXzdMO5hozQscG/sxtXCjGLTqbzNi', NULL, 'ben.edmunds43670749@gmail.com', '891bd0bc0d769a08ef4128c634de6f82ac0c9518', NULL, NULL, NULL, 1460335812, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(11, '127.0.0.1', 'benedmunds618988075', '$2y$08$gCkD0lfagQkFnXahRvQFHemy8VtTb/1.jtBJmSCWk.V8GXYtuWvGa', NULL, 'ben.edmunds799560566@gmail.com', '09b70a63a3c8126d18ed787c26007484f70209e7', NULL, NULL, NULL, 1460335834, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(12, '127.0.0.1', 'benedmunds424835262', '$2y$08$S3ekEy6S6U9VHouVltY8U.VSH.eDmf7zycgSNBdo/EAps9wa/nULO', NULL, 'ben.edmunds793151876@gmail.com', 'bddd5bb0927ed2933b6b70021e302aa93ef3de05', NULL, NULL, NULL, 1460335850, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(13, '127.0.0.1', 'benedmunds987762452', '$2y$08$MLNQWOim4hp/ILeCOvD7JuUci4Qzsu7.BfCzKk6hNV4pWQIeRah3C', NULL, 'ben.edmunds683471711@gmail.com', '629b8b156697731914cee7fb511bbbaa15fb6d40', NULL, NULL, NULL, 1460335873, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(14, '127.0.0.1', 'benedmunds861999525', '$2y$08$ZWsaNb9hZ.5RLGlD1xfeU.EdbHkAEC2d7Pgz6ljV8jMSshASuM96S', NULL, 'ben.edmunds740936305@gmail.com', 'cf1e121ae3ea9ebaf1d99872c07718eb1d2d4fca', NULL, NULL, NULL, 1460335893, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(15, '127.0.0.1', 'benedmunds154419029', '$2y$08$cjToscip3cgIaqEHaH1uYeGf79WofcU/MfeL/SgPlNcJnToNQm.DS', NULL, 'ben.edmunds645904576@gmail.com', 'a28b4c0de15dedecb2e9d39d95800884c8f8af27', NULL, NULL, NULL, 1460336027, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(16, '127.0.0.1', 'benedmunds152465905', '$2y$08$a5EDbtltPjtLpmcqvCD5M.bl6Fn7PRAZvFf.DpDloS5vcz0yRMPXi', NULL, 'ben.edmunds433013972@gmail.com', 'c454e84c14ae46d1a4fcccd01cb73fd357bcc685', NULL, NULL, NULL, 1460336064, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(17, '127.0.0.1', 'benedmunds437652644', '$2y$08$B26l383eaZ8/WXLsHdbzyOQQxUze0j2J76FcweX2R6nI8xxrmJiOW', NULL, 'ben.edmunds127746669@gmail.com', 'd6c5619a2f35b040864c12815e25ddf3ad4d27a9', NULL, NULL, NULL, 1460336073, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(18, '127.0.0.1', 'benedmunds486541799', '$2y$08$5VzfKmHgNLwHfUa.d3FQ3ub3l/0KMSKAFBBxUkyTm1.Oou/huuAc.', NULL, 'ben.edmunds675415071@gmail.com', '3c23ccf5b56263dac834353d8900b1f05370c191', NULL, NULL, NULL, 1460336109, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', ''),
(19, '127.0.0.1', 'benedmunds202209552', '$2y$08$Wtw9wzuxjsfhU7N/K2Ls4uqbsRUcDmyIdJkXUocnL2QlRKQQNfvle', NULL, 'ben.edmunds136322107@gmail.com', '3a364e28b9cda00f0eae91b43ee481970444de76', NULL, NULL, NULL, 1460336125, NULL, 0, 'Ben', 'Edmunds', NULL, 'assets/themes/default/images/user-default.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes', 'yes', 'yes', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 4, 3),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 3),
(10, 9, 3),
(11, 10, 3),
(12, 11, 3),
(13, 12, 3),
(14, 13, 3),
(15, 14, 3),
(16, 15, 3),
(17, 16, 3),
(18, 17, 3),
(19, 18, 3),
(20, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_awards`
--

CREATE TABLE IF NOT EXISTS `user_awards` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `earned_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scorecard_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_uploads`
--

CREATE TABLE IF NOT EXISTS `video_uploads` (
`id` int(11) NOT NULL,
  `card_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `score_errors` int(11) DEFAULT NULL,
  `user_viewed` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `scorecard_id` int(11) NOT NULL,
  `size` float NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ext` int(11) NOT NULL,
  `orig_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `encypt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `star_rating` int(11) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `flagged` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `deleting` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `video_uploads`
--

INSERT INTO `video_uploads` (`id`, `card_id`, `score`, `score_errors`, `user_viewed`, `user_id`, `coach_id`, `payment_id`, `scorecard_id`, `size`, `path`, `ext`, `orig_name`, `client_name`, `file_type`, `encypt_name`, `thumb`, `uploaded`, `star_rating`, `location`, `cords`, `flagged`, `deleting`, `date`) VALUES
(136, NULL, 89, 5, '2016-04-17 21:54:00', 2, 4, 16, 12, 6116.19, '/uploads/bworkman/2016/04/4df2c375646f1c95a6317b259a8fc364.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Riding horses all around', 'video/mp4', '4df2c375646f1c95a6317b259a8fc364.mp4', 'uploads/bworkman/2016/04/thumbs/4df2c375646f1c95a6317b259a8fc364.jpg', '2016-04-17 20:24:36', 6, 'Ohio Expo Center & State Fair, East 17th Avenue, Columbus, OH, United States', '40.00256600000001|-82.99066900000003', 'n', 'n', '0000-00-00'),
(137, NULL, 156, 0, '2016-04-17 21:48:46', 2, 4, 16, 12, 8551.58, '/uploads/bworkman/2016/04/990a066d74e0f48cb9f3d2a24db4fa9e.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Riding at the fair', 'video/mp4', '990a066d74e0f48cb9f3d2a24db4fa9e.mp4', 'uploads/bworkman/2016/04/thumbs/990a066d74e0f48cb9f3d2a24db4fa9e.jpg', '2016-04-17 20:27:52', 4, 'Columbus State Community College, East Spring Street, Columbus, OH, United States', '39.9691613|-82.9872143', 'n', 'n', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
 ADD PRIMARY KEY (`id`), ADD KEY `group` (`group`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `coach_payments`
--
ALTER TABLE `coach_payments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scorecard_sections_7`
--
ALTER TABLE `scorecard_sections_7`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`,`order`,`card_id`);

--
-- Indexes for table `scorecard_sections_7_scores`
--
ALTER TABLE `scorecard_sections_7_scores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_cards`
--
ALTER TABLE `score_cards`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `child_of` (`child_of`,`option_name`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`), ADD KEY `survey_id` (`survey_id`,`coach_id`), ADD KEY `scorecard_id` (`scorecard_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_comments`
--
ALTER TABLE `upload_comments`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`,`video_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_awards`
--
ALTER TABLE `user_awards`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`award_id`,`scorecard_id`,`coach_id`);

--
-- Indexes for table `video_uploads`
--
ALTER TABLE `video_uploads`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `coach_id` (`coach_id`), ADD KEY `scorecard_id` (`scorecard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coach_payments`
--
ALTER TABLE `coach_payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scorecard_sections_7`
--
ALTER TABLE `scorecard_sections_7`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=648;
--
-- AUTO_INCREMENT for table `scorecard_sections_7_scores`
--
ALTER TABLE `scorecard_sections_7_scores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `score_cards`
--
ALTER TABLE `score_cards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload_comments`
--
ALTER TABLE `upload_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_awards`
--
ALTER TABLE `user_awards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_uploads`
--
ALTER TABLE `video_uploads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
