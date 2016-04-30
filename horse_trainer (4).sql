-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2016 at 06:49 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
(16, 'Google Maps Key', 'AIzaSyAFqORP5b2aNW54tG5i6IimHrVQlzOn_nI', '2016-03-02 04:46:54', 'google_api', 'API');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(31, '127.0.0.1', 'coachk', 1457591617),
(32, '127.0.0.1', 'coachk', 1457591625);

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
-- Table structure for table `scoring`
--

CREATE TABLE IF NOT EXISTS `scoring` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `score_1_points` int(11) NOT NULL DEFAULT '0',
  `score_1_co` int(11) NOT NULL DEFAULT '0',
  `remarks_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_2_points` int(11) NOT NULL DEFAULT '0',
  `score_2_co` int(11) NOT NULL DEFAULT '0',
  `remarks_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_3_points` int(11) NOT NULL DEFAULT '0',
  `score_3_co` int(11) NOT NULL DEFAULT '0',
  `remarks_3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_4_points` int(11) NOT NULL DEFAULT '0',
  `score_4_co` int(11) NOT NULL DEFAULT '0',
  `remarks_4` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci DEFAULT NULL,
  `score_5_points` int(11) NOT NULL DEFAULT '0',
  `score_5_co` int(11) NOT NULL DEFAULT '0',
  `remarks_5` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_6_points` int(11) NOT NULL DEFAULT '0',
  `score_6_co` int(11) NOT NULL DEFAULT '0',
  `remarks_6` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_7_points` int(11) NOT NULL DEFAULT '0',
  `score_7_co` int(11) NOT NULL DEFAULT '0',
  `remarks_7` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_8_points` int(11) NOT NULL DEFAULT '0',
  `score_8_co` int(11) NOT NULL DEFAULT '0',
  `remarks_8` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_9_points` int(11) NOT NULL DEFAULT '0',
  `score_9_co` int(11) NOT NULL DEFAULT '0',
  `remarks_9` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_10_points` int(11) NOT NULL DEFAULT '0',
  `score_10_co` int(11) NOT NULL DEFAULT '0',
  `remarks_10` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_11_points` int(11) NOT NULL DEFAULT '0',
  `score_11_co` int(11) NOT NULL DEFAULT '0',
  `remarks_11` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_12_points` int(11) NOT NULL DEFAULT '0',
  `score_12_co` int(11) NOT NULL DEFAULT '0',
  `remarks_12` varchar(255) DEFAULT NULL,
  `score_13_points` int(11) NOT NULL DEFAULT '0',
  `score_13_co` int(11) NOT NULL DEFAULT '0',
  `remarks_13` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_14_points` int(11) NOT NULL DEFAULT '0',
  `score_14_co` int(11) NOT NULL DEFAULT '0',
  `remarks_14` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_15_points` int(11) NOT NULL DEFAULT '0',
  `score_15_co` int(11) NOT NULL DEFAULT '0',
  `remarks_15` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `errors` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`id`, `user_id`, `coach_id`, `video_id`, `score_1_points`, `score_1_co`, `remarks_1`, `score_2_points`, `score_2_co`, `remarks_2`, `score_3_points`, `score_3_co`, `remarks_3`, `score_4_points`, `score_4_co`, `remarks_4`, `score_5_points`, `score_5_co`, `remarks_5`, `score_6_points`, `score_6_co`, `remarks_6`, `score_7_points`, `score_7_co`, `remarks_7`, `score_8_points`, `score_8_co`, `remarks_8`, `score_9_points`, `score_9_co`, `remarks_9`, `score_10_points`, `score_10_co`, `remarks_10`, `score_11_points`, `score_11_co`, `remarks_11`, `score_12_points`, `score_12_co`, `remarks_12`, `score_13_points`, `score_13_co`, `remarks_13`, `score_14_points`, `score_14_co`, `remarks_14`, `score_15_points`, `score_15_co`, `remarks_15`, `errors`, `total`, `ts`) VALUES
(8, 1, 1, 110, 5, 5, 'Nice', 2, 2, 'Not so nice', 1, 2, 'Wow', 4, 4, 'Yeah', 4, 3, 'Almost', 2, 2, 'Nailed It', 3, 3, 'Got it', 2, 5, 'Good Job', 2, 3, 'Jump', 6, 5, 'Full Points', 2, 4, 'Comment', 3, 8, 'Another Common', 19, 6, 'You did it', 4, 9, 'Smack It', 19, 20, 'Perfect', 2, 157, '2016-03-07 02:32:57'),
(9, 2, 4, 107, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 5, 120, '2016-03-09 03:32:16');

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
  `company` varchar(100) DEFAULT NULL,
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
  `profile_public` varchar(3) DEFAULT 'yes'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `user_image`, `bio`, `profile_name`, `facebook`, `google`, `twitter`, `instagram`, `emails_on`, `newsletter`, `email_public`, `profile_public`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$.8vYySe6RX48.8iCVJltV.Sr4bfSxkxT.QppPIPjdklTNvbxZGPYW', '', 'bradsf@fdadsf.com', '', NULL, NULL, 'ZRrk8z6K8ba5Mwt0zFIYmO', 1268889823, 1457660242, 1, 'Admin', 'istrator', 'ADMIN', '0', '/uploads/administrator/2016/02/8272751f43f467a15287327ad7d128d7.png', 'Sed sit amet elit ultricies, varius velit gravida, rhoncus nulla. Nulla a porttitor sem, sed porttitor libero. Morbi porta a est eu auctor. In maximus scelerisque elit vitae mollis. Phasellus eget erat quam. Sed id luctus ex, in malesuada augue. Curabitur id consectetur massa. Curabitur vestibulum tincidunt porta. Sed nec dapibus sapien, a ultricies lorem. Aliquam nisi augue, porttitor et augue vitae, convallis finibus mauris. Sed eleifend, felis non dignissim elementum, sapien eros tristique diam, gravida hendrerit neque velit iaculis felis. Integer nunc lacus, pretium vel tincidunt eu, lacinia a sapien. Pellentesque magna elit, aliquet quis cursus vitae, cursus vitae ligula.', 'my-profile-name', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'yes', 'yes', 'yes', 'yes'),
(2, '::1', 'bworkman', '$2y$08$MYqV6JDSM7ywi4PrugC5WurgU3xzwoHjHPBztasK7Yvy3uKqQIUFm', NULL, 'brian.workman@rocketmail.com', NULL, NULL, NULL, NULL, 1455764982, 1457661411, 1, 'Brian', 'Workman', NULL, '7406611411', '/uploads/bworkman/2016/03/96876b18bcf40e2c1028a8f748e424c3.png', '', 'bworkman', '', '', '', '', 'yes', 'yes', 'yes', 'yes'),
(4, '127.0.0.1', 'coachk', '$2y$08$8HANzl3R96lDP4DvDGMAjO/4BHfcJ.he.IXfkEBQi721zeIOp2.CK', NULL, 'brian.workmans@rocketmail.com', '90e0bb9e705600a1033f360d2684742b676d74e7', NULL, NULL, NULL, 1457236831, 1457490717, 1, 'Coach', 'Karl', NULL, '7406611411', '/uploads/coachk/2016/03/9a542138b68412deeff73da37658e033.jpg', '', 'profile', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'https://yahoo.com', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `video_uploads`
--

CREATE TABLE IF NOT EXISTS `video_uploads` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
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
  `public` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `flagged` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `deleting` enum('y','n') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `comp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comp_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `horse_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `video_uploads`
--

INSERT INTO `video_uploads` (`id`, `user_id`, `coach_id`, `size`, `path`, `ext`, `orig_name`, `client_name`, `file_type`, `encypt_name`, `thumb`, `uploaded`, `star_rating`, `public`, `location`, `cords`, `flagged`, `deleting`, `comp_name`, `comp_class`, `date`, `horse_name`) VALUES
(35, 1, NULL, 441, '/uploads/administrator/2016/02/93129c0bdb6967c1f0ad829c64f8f3b9.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Dog Video', 'video/mp4', '93129c0bdb6967c1f0ad829c64f8f3b9.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-21 18:15:12', 0, 'n', '', '', 'y', 'n', '', '', '0000-00-00', ''),
(36, 1, NULL, 8551.58, '/uploads/administrator/2016/02/b2ed38cb4c0147e5fed00355aae0efdc.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Clean Silver with Ketchup', 'video/mp4', 'b2ed38cb4c0147e5fed00355aae0efdc.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-21 19:19:40', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(37, 1, NULL, 441, '/uploads/administrator/2016/02/496cd26adb61ea23ffcbb48bdafd72b4.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Tester', 'video/mp4', '496cd26adb61ea23ffcbb48bdafd72b4.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-22 02:39:41', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(38, 1, NULL, 6116.19, '/uploads/administrator/2016/02/f2174df3b1268e2da41098234143ad14.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Helicopter Crash Pearl Harbor 21816 1015 am ORIGINAL Eyewitness.mp4', 'video/mp4', 'f2174df3b1268e2da41098234143ad14.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 02:36:55', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(39, 1, NULL, 441, '/uploads/administrator/2016/02/7febd343aff0d992c1043efb460f9910.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '7febd343aff0d992c1043efb460f9910.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 06:09:52', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(40, 1, NULL, 441, '/uploads/administrator/2016/02/95bbf08a0b7bc728fb458fa658700e62.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '95bbf08a0b7bc728fb458fa658700e62.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 06:10:41', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(41, 1, NULL, 441, '/uploads/administrator/2016/02/1d2c9cc3a082194058493d74061f80eb.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '1d2c9cc3a082194058493d74061f80eb.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 06:11:09', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(42, 1, NULL, 441, '/uploads/administrator/2016/02/3d648d16ff35b2040526cdffb97b20ee.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '3d648d16ff35b2040526cdffb97b20ee.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 06:11:28', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(43, 1, NULL, 441, '/uploads/administrator/2016/02/181c3be4268963c1d9579cc558635207.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '181c3be4268963c1d9579cc558635207.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 06:11:59', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(44, 1, NULL, 8551.58, '/uploads/administrator/2016/02/6cb8c246f98467963d5595b3d12689d5.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'PureWow Presents How to Clean Silver with Ketchup.mp4', 'video/mp4', '6cb8c246f98467963d5595b3d12689d5.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-25 07:00:24', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(45, 1, NULL, 8551.58, '/uploads/administrator/2016/02/3ce18fda48665288d62c0b9896e580c1.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'PureWow Presents How to Clean Silver with Ketchup.mp4', 'video/mp4', '3ce18fda48665288d62c0b9896e580c1.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-26 05:05:40', 0, 'n', '4040 North High Street, Columbus, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(46, 1, NULL, 441, '/uploads/administrator/2016/02/52ad6055022401c9971a2ee01d4bbb9a.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Teaching a dog to meow.mp4', 'video/mp4', '52ad6055022401c9971a2ee01d4bbb9a.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-26 05:06:31', 0, 'n', '5548 North High Street, Columbus, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(47, 1, NULL, 8551.58, '/uploads/administrator/2016/02/1d3c210ce09c8ea8937eea426162c0b1.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Network', 'video/mp4', '1d3c210ce09c8ea8937eea426162c0b1.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-26 05:08:32', 0, 'n', '44 Maple Avenue, Utica, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(48, 1, NULL, 441, '/uploads/administrator/2016/02/4b2e44bc2a7fe8352a7b2f5ce74fd59c.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Network', 'video/mp4', '4b2e44bc2a7fe8352a7b2f5ce74fd59c.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-26 05:15:48', 0, 'n', '540 Blacksnake Road, Utica, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(49, 1, NULL, 441, '/uploads/administrator/2016/02/8273edbe0812ef213d8595d81151a54c.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Kma', 'video/mp4', '8273edbe0812ef213d8595d81151a54c.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-26 06:22:41', 0, 'n', '87 Morningside Drive, Utica, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(50, 1, NULL, 8551.58, '/uploads/administrator/2016/02/8486cf2465719f7a12ae3ef45f8d39d7.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Testing', 'video/mp4', '8486cf2465719f7a12ae3ef45f8d39d7.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-28 00:54:25', 0, 'n', '585 Mill Street, Utica, OH, United States', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(51, 1, NULL, 6116.19, '/uploads/administrator/2016/02/f52eeeca482f9a3a2d26627253deaee2.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'adsfasd', 'video/mp4', 'f52eeeca482f9a3a2d26627253deaee2.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 02:55:44', 3, 'n', '555 Jefferson Street, Utica, OH, United States', '40.241014|-82.44824299999999', 'n', 'n', '', '', '0000-00-00', ''),
(52, 1, NULL, 6116.19, '/uploads/administrator/2016/02/00e628c7a4986e1bfaecaaf8c31d7607.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '00e628c7a4986e1bfaecaaf8c31d7607.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 03:47:25', 0, 'n', 'A S D F a S D F, New York 55, Swan Lake, NY, United States', '41.75822159999999|-74.78225120000002', 'n', 'n', '', '', '0000-00-00', ''),
(53, 1, NULL, 441, '/uploads/administrator/2016/02/2eb224fea9613112d68d91783ab23e12.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Shire', 'video/mp4', '2eb224fea9613112d68d91783ab23e12.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 03:48:09', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(54, 1, NULL, 6116.19, '/uploads/administrator/2016/02/902502f256b62b32eb158a609f78e206.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '902502f256b62b32eb158a609f78e206.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 03:59:48', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(55, 1, NULL, 8551.58, '/uploads/administrator/2016/02/59c9fca90f7053ca12d4a16944edfa54.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '59c9fca90f7053ca12d4a16944edfa54.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 04:00:30', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(56, 1, NULL, 6116.19, '/uploads/administrator/2016/02/fd9799459a16ac76fe32fe1665013322.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'asdfads', 'video/mp4', 'fd9799459a16ac76fe32fe1665013322.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 04:04:21', 0, 'n', '', '', 'n', 'n', '', '', '0000-00-00', ''),
(57, 1, NULL, 6116.19, '/uploads/administrator/2016/02/f2640106ecc5ff1babe79ae0db650609.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'adsfasd', 'video/mp4', 'f2640106ecc5ff1babe79ae0db650609.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 04:46:20', 0, 'n', 'Reynoldsburg, OH 43068, United States', '39.9518394|-82.78863949999999', 'n', 'n', '', '', '0000-00-00', ''),
(58, 1, NULL, 6116.19, '/uploads/administrator/2016/02/2ffd97b1e51b0051532e1e930fc82a13.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '2ffd97b1e51b0051532e1e930fc82a13.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 04:46:45', 0, 'n', '', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(59, 1, NULL, 8551.58, '/uploads/administrator/2016/02/7bf43d41beddb5564de31b2860dad612.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '7bf43d41beddb5564de31b2860dad612.mp4', 'assets/themes/default/images/video-default.jpg', '2016-02-29 05:41:21', 0, 'n', '5844 North High Street, Worthington, OH, United States', '40.08213199999999|-83.01804500000003', 'n', 'n', '', '', '0000-00-00', ''),
(60, 1, NULL, 6116.19, '/uploads/administrator/2016/03/869b8322ef1cae21b334df6d35e3ff44.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '869b8322ef1cae21b334df6d35e3ff44.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:22:13', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(61, 1, NULL, 6116.19, '/uploads/administrator/2016/03/4193525a680b8f6bc4187bc538aafb04.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '4193525a680b8f6bc4187bc538aafb04.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:23:28', 0, 'n', '591 North Main Street, Utica, OH, United States', '40.241971|-82.45380599999999', 'n', 'n', '', '', '0000-00-00', ''),
(62, 1, NULL, 8551.58, '/uploads/administrator/2016/03/539c3fd5cc1cd50d59d5368e27c4430e.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '539c3fd5cc1cd50d59d5368e27c4430e.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:26:22', 0, 'n', '583 North Main Street, Utica, OH, United States', '40.241856|-82.452587', 'n', 'n', '', '', '0000-00-00', ''),
(63, 1, NULL, 8551.58, '/uploads/administrator/2016/03/7bfd37d615714d075d65840652cfe237.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'KMA', 'video/mp4', '7bfd37d615714d075d65840652cfe237.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:33:10', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(64, 1, NULL, 6116.19, '/uploads/administrator/2016/03/88ae3abb487088066b91a7b226173153.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '88ae3abb487088066b91a7b226173153.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:34:11', 0, 'n', '54645 Somerton Highway, Jerusalem, OH, United States', '39.888875|-81.141816', 'n', 'n', '', '', '0000-00-00', ''),
(65, 1, NULL, 8551.58, '/uploads/administrator/2016/03/0efcc1ffda8c94996767f92e0c68a9eb.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '0efcc1ffda8c94996767f92e0c68a9eb.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:35:29', 0, 'n', '579 Jefferson Street, Utica, OH, United States', '40.2415019|-82.44819799999999', 'n', 'n', '', '', '0000-00-00', ''),
(66, 1, NULL, 6116.19, '/uploads/administrator/2016/03/1ceacc5338d0dea257a5e12e776c350b.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '1ceacc5338d0dea257a5e12e776c350b.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:36:43', 0, 'n', '5588 North High Street, Columbus, OH, United States', '40.0767065|-83.0181968', 'n', 'n', '', '', '0000-00-00', ''),
(67, 1, NULL, 6116.19, '/uploads/administrator/2016/03/9f4f1200602dd51045cab518f6748af9.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'KMA', 'video/mp4', '9f4f1200602dd51045cab518f6748af9.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:43:32', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(68, 1, NULL, 6116.19, '/uploads/administrator/2016/03/aa4c5a7f6a1e29cde30b44986261631f.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', 'aa4c5a7f6a1e29cde30b44986261631f.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:44:22', 0, 'n', '545 Mill Street, Utica, OH, United States', '40.233222|-82.4426919', 'n', 'n', '', '', '0000-00-00', ''),
(69, 1, NULL, 6116.19, '/uploads/administrator/2016/03/c18c0273132036629eaab80c7f0c5db3.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Newest Upload Work', 'video/mp4', 'c18c0273132036629eaab80c7f0c5db3.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:48:35', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(70, 1, NULL, 441, '/uploads/administrator/2016/03/d5309e2364ffc35c5c48520dcb616f9d.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Newest Upload Work', 'video/mp4', 'd5309e2364ffc35c5c48520dcb616f9d.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:49:12', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(71, 1, NULL, 8551.58, '/uploads/administrator/2016/03/add06a283ffbce7b36524f72d4c25f5e.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Video Name', 'video/mp4', 'add06a283ffbce7b36524f72d4c25f5e.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:51:04', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(72, 1, NULL, 8551.58, '/uploads/administrator/2016/03/3b9177ab1de650aff4537e1e2d116708.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'adsfasd', 'video/mp4', '3b9177ab1de650aff4537e1e2d116708.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 19:56:42', 0, 'n', '54654 Sagewood Drive, Mishawaka, IN, United States', '41.7002296|-86.1455211', 'n', 'n', '', '', '0000-00-00', ''),
(73, 1, NULL, 8551.58, '/uploads/administrator/2016/03/6f0a466f8d7c70a44d669e0605527039.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'KMA', 'video/mp4', '6f0a466f8d7c70a44d669e0605527039.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:04:18', 0, 'n', '540 Blacksnake Road, Utica, OH, United States', '40.22756200000001|-82.44154500000002', 'n', 'n', '', '', '0000-00-00', ''),
(74, 1, NULL, 6116.19, '/uploads/administrator/2016/03/02ec679578309a442f2c1e8c82d827ef.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'KMA', 'video/mp4', '02ec679578309a442f2c1e8c82d827ef.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:05:13', 0, 'n', '554 Jefferson Street, Utica, OH, United States', '40.240946|-82.44749000000002', 'n', 'n', '', '', '0000-00-00', ''),
(75, 1, NULL, 8551.58, '/uploads/administrator/2016/03/4a458dcecc5c2b312fc62fe1b9caa10f.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '4a458dcecc5c2b312fc62fe1b9caa10f.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:06:26', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(76, 1, NULL, 6116.19, '/uploads/administrator/2016/03/32114ae83d98d7e5d7941c81cacb1858.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '32114ae83d98d7e5d7941c81cacb1858.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:07:26', 0, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(77, 1, NULL, 6116.19, '/uploads/administrator/2016/03/b3a4eb4c79c7fd2d6da10fafae4440f2.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', 'b3a4eb4c79c7fd2d6da10fafae4440f2.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:29:44', 0, 'n', '540 Blacksnake Road, Utica, OH, United States', '40.22756200000001|-82.44154500000002', 'n', 'n', '', '', '0000-00-00', ''),
(78, 1, NULL, 6116.19, '/uploads/administrator/2016/03/73cebf19afa264f3e90d27fd8e2a81b0.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'KMA', 'video/mp4', '73cebf19afa264f3e90d27fd8e2a81b0.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:32:11', 0, 'n', '510 Blacksnake Road, Utica, OH, United States', '40.228176|-82.44308899999999', 'n', 'n', '', '', '0000-00-00', ''),
(79, 1, 1, 6116.19, '/uploads/administrator/2016/03/7a695ec94ebe49ac9e64f8f9a1575f06.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'New Video', 'video/mp4', '7a695ec94ebe49ac9e64f8f9a1575f06.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:33:40', 2, 'n', '54 Jefferson Street, Utica, OH, United States', '40.235339|-82.44806599999998', 'n', 'n', '', '', '0000-00-00', ''),
(80, 1, NULL, 8551.58, '/uploads/administrator/2016/03/b87ec9517b834664a33cb17b6f86e056.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', 'b87ec9517b834664a33cb17b6f86e056.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 20:57:55', 0, 'n', '540 Blacksnake Road, Utica, OH, United States', '40.22756200000001|-82.44154500000002', 'n', 'n', '', '', '0000-00-00', ''),
(81, 1, NULL, 6116.19, '/uploads/administrator/2016/03/bd652ff3bf9805583cdf02d6c402e47f.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Video Name with image', 'video/mp4', 'bd652ff3bf9805583cdf02d6c402e47f.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:05:48', 0, 'n', '583 North Main Street, Utica, OH, United States', '40.241856|-82.452587', 'n', 'n', '', '', '0000-00-00', ''),
(82, 1, NULL, 8551.58, '/uploads/administrator/2016/03/fbe580a28cba2ede35e7b039f6c9580f.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Video with thumb', 'video/mp4', 'fbe580a28cba2ede35e7b039f6c9580f.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:08:09', 0, 'n', '4944 North High Street, Columbus, OH, United States', '40.06336950000001|-83.01837990000001', 'n', 'n', '', '', '0000-00-00', ''),
(83, 1, NULL, 8551.58, '/uploads/administrator/2016/03/8f6318ebb75c858d922326074fb4e5c5.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Video with image check', 'video/mp4', '8f6318ebb75c858d922326074fb4e5c5.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:10:08', 0, 'n', '5485 North High Street, Columbus, OH, United States', '40.0745849|-83.01924159999999', 'n', 'n', '', '', '0000-00-00', ''),
(84, 1, NULL, 6116.19, '/uploads/administrator/2016/03/3d9f7e74482a3885086c7fe8fca27ad5.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'should have image', 'video/mp4', '3d9f7e74482a3885086c7fe8fca27ad5.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:34:41', 0, 'n', '4944 North High Street, Columbus, OH, United States', '40.06336950000001|-83.01837990000001', 'n', 'n', '', '', '0000-00-00', ''),
(85, 1, NULL, 6116.19, '/uploads/administrator/2016/03/e93bbe5ec4cfad40f2630bc00c1e24c5.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', 'e93bbe5ec4cfad40f2630bc00c1e24c5.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:36:08', 0, 'n', '55 North Main Street, Utica, OH, United States', '40.235489|-82.45296100000002', 'n', 'n', '', '', '0000-00-00', ''),
(86, 1, NULL, 8551.58, '/uploads/administrator/2016/03/88f779bb2acd7fa0ccacf46e9e74d55c.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '88f779bb2acd7fa0ccacf46e9e74d55c.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:39:27', 0, 'n', '545 Mill Street, Utica, OH, United States', '40.233222|-82.4426919', 'n', 'n', '', '', '0000-00-00', ''),
(87, 1, NULL, 6116.19, '/uploads/administrator/2016/03/7f2ecc163df6b27fa40f78152bb266eb.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '7f2ecc163df6b27fa40f78152bb266eb.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:40:30', 0, 'n', '540 Blacksnake Road, Utica, OH, United States', '40.22756200000001|-82.44154500000002', 'n', 'n', '', '', '0000-00-00', ''),
(88, 1, NULL, 6116.19, '/uploads/administrator/2016/03/9f616da4aac755beeeffde818fc9cefb.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '9f616da4aac755beeeffde818fc9cefb.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:41:22', 0, 'n', '5441 Stonequarry Road, Johnstown, OH, United States', '40.135919|-82.60161499999998', 'n', 'n', '', '', '0000-00-00', ''),
(89, 1, NULL, 6116.19, '/uploads/administrator/2016/03/d5d83c766157cb5df0a503823847cdd5.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'file with image', 'video/mp4', 'd5d83c766157cb5df0a503823847cdd5.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:43:59', 0, 'n', '442 Mill Street, Utica, OH, United States', '40.2322599|-82.44428399999998', 'n', 'n', '', '', '0000-00-00', ''),
(91, 1, NULL, 8551.58, '/uploads/administrator/2016/03/0544e905b9283144429b9ec3068299d0.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '0544e905b9283144429b9ec3068299d0.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:48:10', 0, 'n', '88 Berrimore Drive, Utica, OH, United States', '40.230549|-82.42798199999999', 'n', 'n', '', '', '0000-00-00', ''),
(94, 1, NULL, 6116.19, '/uploads/administrator/2016/03/89907455b7d48adc7debb20794e57b9b.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '89907455b7d48adc7debb20794e57b9b.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:55:10', 0, 'n', '55 North Main Street, Utica, OH, United States', '40.235489|-82.45296100000002', 'y', 'n', '', '', '0000-00-00', ''),
(95, 1, NULL, 6116.19, '/uploads/administrator/2016/03/9bf865bc5b170eeb4ae2c05616f142d0.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '9bf865bc5b170eeb4ae2c05616f142d0.mp4', 'assets/themes/default/images/video-default.jpg', '2016-03-05 21:56:14', 0, 'n', '55 North Main Street, Utica, OH, United States', '40.235489|-82.45296100000002', 'n', 'n', '', '', '0000-00-00', ''),
(97, 1, NULL, 8551.58, '/uploads/administrator/2016/03/0138addeb83045e386652c70ee2be592.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'File Name', 'video/mp4', '0138addeb83045e386652c70ee2be592.mp4', 'uploads/administrator/2016/03/thumbs/0138addeb83045e386652c70ee2be592.jpg', '2016-03-05 21:58:41', 0, 'n', '583 North Main Street, Utica, OH, United States', '40.241856|-82.452587', 'n', 'n', '', '', '0000-00-00', ''),
(98, 1, NULL, 441, '/uploads/administrator/2016/03/8fa54fa8e6c69d9aea91342e0a2a2950.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Me goes here', 'video/mp4', '8fa54fa8e6c69d9aea91342e0a2a2950.mp4', 'uploads/administrator/2016/03/thumbs/8fa54fa8e6c69d9aea91342e0a2a2950.jpg', '2016-03-05 22:01:23', 0, 'n', 'Columbus Fair Auto Auction, Groveport Road, Obetz, OH, United States', '39.87341800000001|-82.94350500000002', 'n', 'n', '', '', '0000-00-00', ''),
(99, 1, NULL, 8551.58, '/uploads/administrator/2016/03/7e24605da6f0381c3bf2e90b2edbece7.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '7e24605da6f0381c3bf2e90b2edbece7.mp4', 'uploads/administrator/2016/03/thumbs/7e24605da6f0381c3bf2e90b2edbece7.jpg', '2016-03-05 22:02:30', 0, 'n', '6564 National Road Southeast, Thornville, OH, United States', '39.95899|-82.41894000000002', 'n', 'n', '', '', '0000-00-00', ''),
(101, 2, NULL, 6116.19, '/uploads/bworkman/2016/03/d97af04d38d957997f7065e44c5b0853.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', 'd97af04d38d957997f7065e44c5b0853.mp4', 'uploads/bworkman/2016/03/thumbs/d97af04d38d957997f7065e44c5b0853.jpg', '2016-03-05 23:33:14', 0, 'n', '584 Mill Street, Utica, OH, United States', '40.2323756|-82.44144749999998', 'n', 'n', '', '', '0000-00-00', ''),
(102, 2, NULL, 8551.58, '/uploads/bworkman/2016/03/25da2dddf64e3e8a584225e42f2ecab4.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', '25da2dddf64e3e8a584225e42f2ecab4.mp4', 'uploads/bworkman/2016/03/thumbs/25da2dddf64e3e8a584225e42f2ecab4.jpg', '2016-03-06 03:33:06', 0, 'n', '5555 Granville Road, Mount Vernon, OH, United States', '40.314772|-82.51092', 'n', 'n', '', '', '0000-00-00', ''),
(103, 2, NULL, 8551.58, '/uploads/bworkman/2016/03/ae77e78810e3616cf7aae8d9d9d832e4.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', 'ae77e78810e3616cf7aae8d9d9d832e4.mp4', 'uploads/bworkman/2016/03/thumbs/ae77e78810e3616cf7aae8d9d9d832e4.jpg', '2016-03-06 03:34:16', 0, 'n', 'Ohio Expo Center & State Fair, East 17th Avenue, Columbus, OH, United States', '40.00256600000001|-82.99066900000003', 'n', 'n', '', '', '0000-00-00', ''),
(104, 2, NULL, 441, '/uploads/bworkman/2016/03/f4f6ef08b655b84a157bda568431ce3e.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'Shire', 'video/mp4', 'f4f6ef08b655b84a157bda568431ce3e.mp4', 'uploads/bworkman/2016/03/thumbs/f4f6ef08b655b84a157bda568431ce3e.jpg', '2016-03-06 03:34:37', 0, 'n', '', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(105, 2, NULL, 441, '/uploads/bworkman/2016/03/7c20ce7092ca045091132ed67cf1a2ce.mp4', 0, 'Teaching_a_dog_to_meow.mp4', 'KMA', 'video/mp4', '7c20ce7092ca045091132ed67cf1a2ce.mp4', 'uploads/bworkman/2016/03/thumbs/7c20ce7092ca045091132ed67cf1a2ce.jpg', '2016-03-06 03:35:50', 0, 'n', '', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(106, 2, NULL, 8551.58, '/uploads/bworkman/2016/03/6b5e9b85e3347cd7dfa1ead1d94a7c39.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'KMA', 'video/mp4', '6b5e9b85e3347cd7dfa1ead1d94a7c39.mp4', 'uploads/bworkman/2016/03/thumbs/6b5e9b85e3347cd7dfa1ead1d94a7c39.jpg', '2016-03-06 03:36:25', 0, 'n', '', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(107, 2, 4, 8551.58, '/uploads/bworkman/2016/03/ba0445be22bbf5445bbdfe62c6a5f29b.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'KMA', 'video/mp4', 'ba0445be22bbf5445bbdfe62c6a5f29b.mp4', 'uploads/bworkman/2016/03/thumbs/ba0445be22bbf5445bbdfe62c6a5f29b.jpg', '2016-03-06 03:36:36', 4, 'n', '', NULL, 'n', 'n', '', '', '0000-00-00', ''),
(108, 4, NULL, 6116.19, '/uploads/coachk/2016/03/7274de2684dbe493ba9336bccb279d07.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Shire', 'video/mp4', '7274de2684dbe493ba9336bccb279d07.mp4', 'uploads/coachk/2016/03/thumbs/7274de2684dbe493ba9336bccb279d07.jpg', '2016-03-06 04:01:56', 0, 'n', '454 Mill Street, Utica, OH, United States', '40.232269|-82.44392490000001', 'n', 'n', '', '', '0000-00-00', ''),
(109, 1, NULL, 6116.19, '/uploads/administrator/2016/03/afea26eec7ebb196691c2f1b432b1fb6.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Video Name', 'video/mp4', 'afea26eec7ebb196691c2f1b432b1fb6.mp4', 'uploads/administrator/2016/03/thumbs/afea26eec7ebb196691c2f1b432b1fb6.jpg', '2016-03-06 19:58:45', 0, 'n', '555 Jefferson Street, Utica, OH, United States', '40.241014|-82.44824299999999', 'n', 'n', '', '', '0000-00-00', ''),
(110, 1, 1, 6116.19, '/uploads/administrator/2016/03/6507ca89a813e041fbd6116c1154128a.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'Video Name', 'video/mp4', '6507ca89a813e041fbd6116c1154128a.mp4', 'uploads/administrator/2016/03/thumbs/6507ca89a813e041fbd6116c1154128a.jpg', '2016-03-06 20:07:30', 5, 'n', '', '40.241014|-82.44824299999999', 'n', 'n', 'Fair Grounds', 'E-Class', '2016-05-05', 'Bonnie 5'),
(111, 2, NULL, 8551.58, '/uploads/bworkman/2016/03/d9477547ebc01a4f700d66666238814e.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Shire', 'video/mp4', 'd9477547ebc01a4f700d66666238814e.mp4', 'uploads/bworkman/2016/03/thumbs/d9477547ebc01a4f700d66666238814e.jpg', '2016-03-10 02:11:43', 0, 'n', '583 North Main Street, Utica, OH, United States', '40.241856|-82.452587', 'n', 'n', 'Fair Grounds', 'E-Class', '0000-00-00', 'Bonnie 5'),
(112, 2, NULL, 6116.19, '/uploads/bworkman/2016/03/03ca460cdce2ecf7b7571fec165dad16.mp4', 0, 'Helicopter_Crash_Pearl_Harbor_21816_1015_am_ORIGINAL_Eyewitness.mp4', 'IE Video Upload', 'video/mp4', '03ca460cdce2ecf7b7571fec165dad16.mp4', 'uploads/bworkman/2016/03/thumbs/03ca460cdce2ecf7b7571fec165dad16.jpg', '2016-03-10 06:35:33', 0, 'n', '556 North High Street, Worthington, OH, United States', '40.08474289999999|-83.0180431', 'n', 'n', 'Fair Grounds', 'International', '0000-00-00', 'Clyde 9'),
(113, 2, NULL, 8551.58, '/uploads/bworkman/2016/03/cbcc5a53dd6ee6047d78c3d2f07049d5.mp4', 0, 'PureWow_Presents_How_to_Clean_Silver_with_Ketchup.mp4', 'Name', 'video/mp4', 'cbcc5a53dd6ee6047d78c3d2f07049d5.mp4', 'uploads/bworkman/2016/03/thumbs/cbcc5a53dd6ee6047d78c3d2f07049d5.jpg', '2016-03-11 01:57:50', 0, 'n', '5588 North High Street, Columbus, OH, United States', '40.0767065|-83.0181968', 'n', 'n', 'Fair Grounds', 'test', '0000-00-00', 'Bonnie 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
 ADD PRIMARY KEY (`id`), ADD KEY `group` (`group`);

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
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

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
-- Indexes for table `video_uploads`
--
ALTER TABLE `video_uploads`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `coach_id` (`coach_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
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
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scoring`
--
ALTER TABLE `scoring`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `upload_comments`
--
ALTER TABLE `upload_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `video_uploads`
--
ALTER TABLE `video_uploads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
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
