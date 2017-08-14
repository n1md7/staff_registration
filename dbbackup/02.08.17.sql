-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2017 at 08:46 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharepost`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text,
  `admin` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `admin`, `date_time`) VALUES
(5, 'áƒ“áƒ¦áƒ”áƒ¡ 12áƒ›áƒ“áƒ”', 0, '2017-07-13 13:01:13'),
(6, 'moklet raaaaaaa', 0, '2017-07-14 00:05:15'),
(7, 'áƒ“áƒ¦áƒ”áƒ¡ áƒ¬áƒ•áƒ˜áƒ›áƒ“áƒ áƒ¡áƒáƒ¨áƒ˜áƒœáƒšáƒáƒ“', 0, '2017-07-23 12:36:06'),
(9, 'დღეს რაღაცას აკეტებდნენ', 0, '2017-07-24 17:58:33'),
(10, 'ამდღა ამზადენა ფუტკარშO მუდგარეებს დო შეილებე 2 ლარქ ქიგიაზინასი არძოს', 0, '2017-07-26 13:16:24'),
(11, 'ამდღა 40 გრადუს იი სინჩხე', 0, '2017-07-28 10:04:08'),
(12, 'hmmmmmmmm', 0, '2017-07-29 10:29:19'),
(13, 'დღეს ბეტონს ასხამენ ეზოში, დროებითი მუშებიც არიან, ნიუტონი და დათა', 0, '2017-07-31 13:26:46'),
(21, 'ამდღა ხოლო ბეტონს გივობუნთ', 0, '2017-08-01 14:40:22'),
(22, 'ხვალ ღობე მაქ დასაკერხერებელი', 0, '2017-08-02 22:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `job_cat`
--

CREATE TABLE `job_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `salary` int(4) NOT NULL,
  `monthly` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_cat`
--

INSERT INTO `job_cat` (`id`, `name`, `description`, `salary`, `monthly`) VALUES
(2, 'დამხმარე', 'დახმარება', 10, 0),
(3, 'დაცვა', 'ერგეტის ფართობის დაცვა', 50, 0),
(4, 'დირექტორის მოადგილე', 'საწარმოს საქმიანობებში დახმარება', 18, 0),
(5, 'დირექტორი', 'საწარმოს მართვა', 20, 0),
(6, 'მზარეული', 'საჭმლის მომზადება გავრიკებისთვის', 150, 1),
(7, 'გავრიკი', 'ნებისმიერ საქმეში დახმარება', 15, 0),
(20, 'მთიბავი', 'გათიბვა და რამე', 12, 0),
(21, 'დარაჯი', 'უდარაჯოს სადარაჯოს', 16, 0),
(26, 'ბუღალტერი', 'ბუღალტრული საქმის წარმოება', 50, 1),
(27, 'ფერმერი', 'ძროხების მოვლა/მოწველა/დაბინავება', 200, 1),
(28, 'მებაღე', 'ბოსტანის მოყვანა/მოვლა', 15, 0),
(29, 'ტრაქტორისტი', 'ტრაქტორით მუშაობა/მოვლა, ხვნა-თესვა', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isnot_absent` int(11) NOT NULL DEFAULT '0',
  `admin` varchar(20) NOT NULL DEFAULT 'name',
  `comment` text,
  `paid` int(1) NOT NULL DEFAULT '0',
  `amount` int(5) DEFAULT NULL,
  `bonus` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_id`, `date_time`, `isnot_absent`, `admin`, `comment`, `paid`, `amount`, `bonus`) VALUES
(77, 80, '2017-07-08 15:40:42', 0, 'nimda', NULL, 0, NULL, 0),
(78, 81, '2017-07-08 15:40:42', 0, 'nimda', NULL, 0, NULL, 0),
(79, 3, '2017-07-08 15:40:42', 1, 'nimda', NULL, 0, NULL, 0),
(80, 104, '2017-07-08 15:40:42', 1, 'nimda', NULL, 0, NULL, 0),
(81, 105, '2017-07-08 15:40:42', 1, 'nimda', NULL, 0, NULL, 0),
(82, 106, '2017-07-08 15:40:42', 1, 'nimda', NULL, 0, NULL, 0),
(83, 3, '2017-07-08 20:17:59', 0, 'nimda', NULL, 0, NULL, 0),
(84, 80, '2017-07-08 20:17:59', 0, 'nimda', NULL, 0, NULL, 0),
(85, 81, '2017-07-08 20:17:59', 0, 'nimda', NULL, 0, NULL, 0),
(86, 104, '2017-07-08 20:17:59', 1, 'nimda', NULL, 0, NULL, 0),
(87, 105, '2017-07-08 20:17:59', 1, 'nimda', NULL, 0, NULL, 0),
(88, 106, '2017-07-08 20:17:59', 1, 'nimda', NULL, 0, NULL, 0),
(89, 80, '2017-07-12 10:12:02', 0, 'nimda', NULL, 0, NULL, 0),
(90, 81, '2017-07-12 10:12:02', 0, 'nimda', NULL, 0, NULL, 0),
(91, 3, '2017-07-12 10:12:02', 1, 'nimda', NULL, 0, NULL, 0),
(92, 104, '2017-07-12 10:12:02', 1, 'nimda', NULL, 0, NULL, 0),
(93, 105, '2017-07-12 10:12:02', 1, 'nimda', NULL, 0, NULL, 0),
(94, 106, '2017-07-12 10:12:02', 1, 'nimda', NULL, 0, NULL, 0),
(139, 3, '2017-07-13 09:01:13', 1, 'nimda', 'áƒ áƒ”áƒ–áƒ˜áƒ™áƒ£áƒœáƒ“áƒ', 0, NULL, 0),
(140, 105, '2017-07-13 09:01:13', 0, 'nimda', 'áƒ’áƒáƒáƒªáƒ“áƒ˜áƒœáƒ', 0, NULL, 0),
(141, 3, '2017-07-13 20:05:15', 0, 'nimda', 'vamozoju amdga', 0, NULL, 0),
(142, 105, '2017-07-13 20:05:15', 1, 'nimda', '', 0, NULL, 0),
(143, 106, '2017-07-13 20:05:15', 1, 'nimda', 'amdga 10 lar erziebu', 0, NULL, 0),
(144, 3, '2017-07-23 08:36:05', 0, 'nimda', '', 0, NULL, 0),
(145, 105, '2017-07-23 08:36:05', 1, 'nimda', 'áƒ¡áƒ•áƒáƒœáƒ”áƒ—áƒ¨áƒ˜áƒ', 0, NULL, 0),
(146, 106, '2017-07-23 08:36:05', 0, 'nimda', '', 0, NULL, 0),
(147, 107, '2017-07-23 08:36:05', 0, 'nimda', '', 0, NULL, 0),
(148, 108, '2017-07-23 08:36:05', 1, 'nimda', '', 0, NULL, 0),
(149, 109, '2017-07-23 08:36:05', 1, 'nimda', '', 0, NULL, 0),
(156, 66, '2017-07-24 13:58:33', 0, 'nimda', 'დააგვიანა', 0, NULL, 0),
(157, 69, '2017-07-24 13:58:33', 1, 'nimda', 'ესეც მოვიდა ბოლოს', 0, NULL, 0),
(158, 110, '2017-07-24 13:58:33', 0, 'nimda', 'დღეს მადონა იყო', 0, NULL, 0),
(159, 66, '2017-07-26 09:16:24', 1, 'nimda', 'ენა მუშენს ერგეტას', 0, NULL, 0),
(160, 69, '2017-07-26 09:16:24', 1, 'nimda', 'თაქრე მარა ვართუ მუთუნს', 0, NULL, 0),
(161, 73, '2017-07-26 09:16:24', 0, 'nimda', 'არ მობრძანდა ყვანა მაფუნია ოხაჩქალი დო', 0, NULL, 0),
(162, 110, '2017-07-26 09:16:24', 0, 'nimda', 'დღეს არ გახლავთ', 0, NULL, 0),
(163, 111, '2017-07-26 09:16:24', 1, 'nimda', 'აცხობს რაღაცეებს ', 0, NULL, 0),
(164, 66, '2017-07-28 06:04:07', 1, 'nimda', '', 0, NULL, 0),
(165, 69, '2017-07-28 06:04:07', 0, 'nimda', '', 0, NULL, 0),
(166, 110, '2017-07-28 06:04:07', 0, 'nimda', 'მადონაშ მორიგეობარე ამდღა', 0, NULL, 0),
(167, 111, '2017-07-28 06:04:08', 1, 'nimda', 'რე მარა ვარდასი უჯგუ', 0, NULL, 0),
(168, 66, '2017-07-29 06:29:19', 1, 'nimda', '', 0, NULL, 0),
(169, 69, '2017-07-29 06:29:19', 0, 'nimda', '', 0, NULL, 0),
(170, 110, '2017-07-29 06:29:19', 0, 'nimda', 'dio vauwiens mushoba', 0, NULL, 0),
(171, 111, '2017-07-29 06:29:19', 1, 'nimda', 'ena re mara vardasi ujguuuuu', 0, NULL, 0),
(172, 110, '2017-07-31 09:26:45', 1, 'nimda', '', 0, NULL, 0),
(173, 111, '2017-07-31 09:26:45', 0, 'nimda', 'დღეს არ იყო, არ უწევს მორიგეობა', 0, NULL, 0),
(174, 112, '2017-07-31 09:26:45', 0, 'nimda', 'მეზობლის წლისთავია და არ მოვიდა', 0, NULL, 0),
(175, 113, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(176, 114, '2017-07-31 09:26:46', 0, 'nimda', 'მეზობლის წლისთავია და არ მოვიდა', 0, NULL, 0),
(177, 115, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(178, 116, '2017-07-31 09:26:46', 0, 'nimda', '', 0, NULL, 0),
(179, 117, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(180, 118, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(181, 119, '2017-07-31 09:26:46', 0, 'nimda', '', 0, NULL, 0),
(182, 120, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(183, 121, '2017-07-31 09:26:46', 1, 'nimda', '', 0, NULL, 0),
(268, 110, '2017-08-01 10:40:21', 1, 'nimda', '', 0, NULL, 0),
(269, 111, '2017-08-01 10:40:21', 0, 'nimda', 'ვაზოჯუნს', 0, NULL, 0),
(270, 112, '2017-08-01 10:40:21', 0, 'nimda', '', 0, NULL, 0),
(271, 113, '2017-08-01 10:40:21', 0, 'nimda', 'გვალო ბორიარე თენა', 0, NULL, 0),
(272, 114, '2017-08-01 10:40:21', 0, 'nimda', '', 0, NULL, 0),
(273, 115, '2017-08-01 10:40:21', 0, 'nimda', 'საპპატიორე', 0, NULL, 0),
(274, 116, '2017-08-01 10:40:21', 0, 'nimda', '', 0, NULL, 0),
(275, 117, '2017-08-01 10:40:22', 1, 'nimda', '', 0, NULL, 0),
(276, 118, '2017-08-01 10:40:22', 1, 'nimda', '', 0, NULL, 0),
(277, 119, '2017-08-01 10:40:22', 0, 'nimda', '', 0, NULL, 0),
(278, 120, '2017-08-01 10:40:22', 1, 'nimda', '', 0, NULL, 0),
(279, 121, '2017-08-01 10:40:22', 1, 'nimda', '', 0, NULL, 0),
(280, 110, '2017-08-02 18:34:19', 1, 'nimda', '', 0, NULL, 0),
(281, 111, '2017-08-02 18:34:19', 0, 'nimda', '', 0, NULL, 0),
(282, 112, '2017-08-02 18:34:19', 0, 'nimda', '', 0, NULL, 0),
(283, 113, '2017-08-02 18:34:23', 0, 'nimda', '', 0, NULL, 0),
(284, 114, '2017-08-02 18:34:23', 0, 'nimda', '', 0, NULL, 0),
(285, 115, '2017-08-02 18:34:23', 1, 'nimda', '', 0, NULL, 0),
(286, 116, '2017-08-02 18:34:23', 0, 'nimda', '', 0, NULL, 0),
(287, 117, '2017-08-02 18:34:23', 1, 'nimda', '', 0, NULL, 0),
(288, 118, '2017-08-02 18:34:24', 1, 'nimda', '', 0, NULL, 0),
(289, 119, '2017-08-02 18:34:24', 0, 'nimda', '', 0, NULL, 0),
(290, 120, '2017-08-02 18:34:24', 1, 'nimda', '', 0, NULL, 0),
(291, 121, '2017-08-02 18:34:24', 1, 'nimda', '', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `fathersName` varchar(30) DEFAULT NULL,
  `personalNumber` varchar(20) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `residence` varchar(55) DEFAULT NULL,
  `jobPost` int(2) NOT NULL DEFAULT '1',
  `comment` text,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` int(1) DEFAULT NULL,
  `active` int(1) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstName`, `lastName`, `fathersName`, `personalNumber`, `dateOfBirth`, `phoneNumber`, `email`, `contactNumber`, `residence`, `jobPost`, `comment`, `registration_date`, `gender`, `active`) VALUES
(53, 'Frank', 'Robinson', 'frobinson1g@joomla.org', '50419-702', '0000-00-00', NULL, NULL, NULL, NULL, 29, NULL, '2016-11-16 20:37:42', 0, 2),
(54, 'Michelle', 'Webb', 'mwebb1h@theguardian.com', '51389-104', '0000-00-00', NULL, NULL, NULL, NULL, 84, NULL, '2016-11-16 20:37:42', 0, 2),
(55, 'Janice', 'Gonzalez', 'jgonzalez1i@techcrunch.com', '61995-1106', '0000-00-00', NULL, NULL, NULL, NULL, 38369, NULL, '2016-11-16 20:37:42', 0, 2),
(56, 'Lori', 'Garcia', 'lgarcia1j@bluehost.com', '61715-026', '0000-00-00', NULL, NULL, NULL, NULL, 30, NULL, '2016-11-16 20:37:42', 0, 2),
(57, 'Randy', 'Allen', 'rallen1k@gizmodo.com', '41520-272', '0000-00-00', NULL, NULL, NULL, NULL, 13, NULL, '2016-11-16 20:37:42', 0, 2),
(58, 'Nicholas', 'Graham', 'ngraham1l@vinaora.com', '54482-020', '0000-00-00', NULL, NULL, NULL, NULL, 1882, NULL, '2016-11-16 20:37:42', 0, 2),
(59, 'Craig', 'Carroll', 'ccarroll1m@paginegialle.it', '21130-426', '0000-00-00', NULL, NULL, NULL, NULL, 37, NULL, '2016-11-16 20:37:42', 0, 2),
(60, 'Roy', 'Lane', 'rlane1n@census.gov', '43239-201', '0000-00-00', NULL, NULL, NULL, NULL, 432, NULL, '2016-11-16 20:37:42', 0, 2),
(61, 'Scott', 'Chavez', 'schavez1o@delicious.com', '14783-327', '0000-00-00', NULL, NULL, NULL, NULL, 41, NULL, '2016-11-16 20:37:42', 0, 2),
(62, 'Ronald', 'Brooks', 'rbrooks1p@taobao.com', '35356-825', '0000-00-00', NULL, NULL, NULL, NULL, 8311, NULL, '2016-11-16 20:37:42', 0, 2),
(63, 'George', 'Carr', 'gcarr1q@phoca.cz', '68084-277', '0000-00-00', NULL, NULL, NULL, NULL, 0, NULL, '2016-11-16 20:37:42', 0, 2),
(64, 'Jesse', 'Burke', 'jburke1r@admin.ch', '36987-3341', '0000-00-00', NULL, NULL, NULL, NULL, 1026, NULL, '2016-11-16 20:37:42', 0, 2),
(65, 'Marilyn', 'Burns', 'mburns1s@nbcnews.com', '60193-102', '0000-00-00', NULL, NULL, NULL, NULL, 1, NULL, '2016-11-16 20:37:42', 0, 2),
(66, 'Ryan', 'Weaver', 'rweaver1t@nyu.edu', '68382-005', '0000-00-00', NULL, NULL, NULL, NULL, 1, NULL, '2016-11-16 20:37:43', 0, 2),
(67, 'Diana', 'Daniels', 'ddaniels1u@cnbc.com', '65841-799', '0000-00-00', NULL, NULL, NULL, NULL, 899, NULL, '2016-11-16 20:37:43', 0, 2),
(68, 'Craig', 'Knight', 'cknight1v@forbes.com', '0283-0808', '0000-00-00', NULL, NULL, NULL, NULL, 62, NULL, '2016-11-16 20:37:43', 0, 2),
(69, 'Joyce', 'Webb', 'jwebb1w@google.com.br', '54575-224', '0000-00-00', NULL, NULL, NULL, NULL, 2, NULL, '2016-11-16 20:37:43', 0, 2),
(70, 'Scott', 'Wells', 'swells1x@facebook.com', '57520-0067', '0000-00-00', NULL, NULL, NULL, NULL, 0, NULL, '2016-11-16 20:37:43', 0, 2),
(71, 'Elizabeth', 'Garza', 'egarza1y@wiley.com', '50114-1010', '0000-00-00', NULL, NULL, NULL, NULL, 825, NULL, '2016-11-16 20:37:43', 0, 2),
(72, 'Heather', 'Daniels', 'hdaniels1z@freewebs.com', '64159-6394', '0000-00-00', NULL, NULL, NULL, NULL, 95, NULL, '2016-11-16 20:37:43', 0, 2),
(73, 'Nicole', 'Reyes', 'nreyes20@vistaprint.com', '51769-141', '0000-00-00', NULL, NULL, NULL, NULL, 19, NULL, '2016-11-16 20:37:43', 0, 2),
(74, 'Kelly', 'Morrison', 'kmorrison21@webs.com', '27241-001', '0000-00-00', NULL, NULL, NULL, NULL, 99823, NULL, '2016-11-16 20:37:43', 0, 2),
(75, 'Carol', 'Diaz', 'cdiaz22@hugedomains.com', '41190-731', '0000-00-00', NULL, NULL, NULL, NULL, 33, NULL, '2016-11-16 20:37:43', 0, 2),
(76, 'Steve', 'Schmidt', 'sschmidt23@creativecommons.org', '10019-955', '0000-00-00', NULL, NULL, NULL, NULL, 3, NULL, '2016-11-16 20:37:43', 0, 2),
(77, 'Kimberly', 'Jones', 'kjones24@vimeo.com', '10578-016', '0000-00-00', NULL, NULL, NULL, NULL, 2441, NULL, '2016-11-16 20:37:43', 0, 2),
(78, 'Maria', 'Hanson', 'mhanson25@google.co.jp', '54868-3566', '0000-00-00', NULL, NULL, NULL, NULL, 69862, NULL, '2016-11-16 20:37:43', 0, 2),
(79, 'Craig', 'Larson', 'clarson26@marketwatch.com', '43063-271', '0000-00-00', NULL, NULL, NULL, NULL, 414, NULL, '2016-11-16 20:37:43', 0, 2),
(80, 'Kelly', 'Rivera', 'krivera27@pbs.org', '50544-102', '0000-00-00', NULL, NULL, NULL, NULL, 86781, NULL, '2016-11-16 20:37:43', 0, 2),
(81, 'Joyce', 'Mcdonald', 'jmcdonald28@pagesperso-orange.', '49967-390', '0000-00-00', NULL, NULL, NULL, NULL, 59, NULL, '2016-11-16 20:37:43', 0, 2),
(83, 'Virginia', 'Grant', 'vgrant2a@unc.edu', '52083-242', '0000-00-00', NULL, NULL, NULL, NULL, 2, NULL, '2016-11-16 20:37:43', 0, 2),
(84, 'Jessica', 'Grant', 'jgrant2b@home.pl', '49834-001', '0000-00-00', NULL, NULL, NULL, NULL, 97949, NULL, '2016-11-16 20:37:43', 0, 2),
(110, 'ნინო', 'ჭაფანძე-კორკელია', 'მამუკა', '19001234345', '1971-12-31', '589345678', 'nini@mail.ru', '1283979128', 'კიროვი', 6, 'თვეშI 15 დღე მუშაობს', '2017-07-24 13:46:22', 2, 1),
(111, 'მადონა', 'ბიგვავა', 'ენვერი', '1928123450', '1968-07-12', '1234242', 'maduna@gmail.com', '0129320913', 'დარჩელი', 6, 'თვეში 15 დღე მუშაობს', '2017-07-24 14:06:36', 2, 1),
(112, 'ნუკრი', 'იზორია', '', '19001101232', '1989-09-27', '3213123213', '', '', 'ერგეტა', 7, '', '2017-07-31 09:11:32', 1, 1),
(113, 'ვალერი', 'ჯიქია', '', '128379', '1985-10-31', '132321312', '', '', 'დარჩელი-ერგეტა', 7, '', '2017-07-31 09:12:18', 1, 1),
(114, 'გია', 'ერგეტული', '', '1823791289', '2007-11-30', '2342', '', '', 'ერგეტა', 7, '', '2017-07-31 09:12:48', 1, 1),
(115, 'გოდერძი', 'ჩუხუა', '', '81236873687', '2016-10-30', '345678', '', '', 'დარჩელი', 28, '', '2017-07-31 09:14:40', 1, 1),
(116, 'შეროზია', 'ლალი', '', '4576879809', '2003-11-30', '456789', '', '', 'ზუგდიდი', 26, '', '2017-07-31 09:15:15', 2, 1),
(117, 'დალი', 'ყალიჩავა', '', '00000000000000000', '1999-11-30', '4356789', '', '', 'განმუხური', 27, '', '2017-07-31 09:15:53', 2, 1),
(118, 'დათო', 'ნარსია', '', '284682346237', '1995-10-31', '3456789', '', '', 'ხობი', 21, '', '2017-07-31 09:21:47', 1, 1),
(119, 'ტრისტანი', 'გაბელია', '', '45768789', '2001-11-30', '4567890', '', '', 'დარჩელი', 29, '', '2017-07-31 09:22:12', 1, 1),
(120, 'გიორგი', 'შელია', '', '7264267', '2002-10-31', '456789', '', '', 'დარჩელი', 3, '', '2017-07-31 09:24:11', 1, 1),
(121, 'რეზო', 'კანკია', '', '45678', '1994-11-30', '4356789', '', '', 'დარჩელი', 5, '', '2017-07-31 09:24:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `reg_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `reg_date_time`) VALUES
(35, 'harry', 'harry', 'edfcaf7013659f51e633553730c9063d6b243538', 1, '2017-04-14 12:50:53'),
(36, 'andro', 'andro', 'c3c90692591347b8a69344f96f57941a4836fa6c', 1, '2017-04-14 12:51:06'),
(40, 'nimda', 'nimda', 'e6c96690b1e62c1384758387670c151880ddcf96', 1, '2017-07-08 05:15:50'),
(42, 'dali', 'dali', 'b4da0644c89d90b0c7e11dc422830bdf8dae4269', 1, '2017-07-08 10:41:21'),
(43, 'acer', 'acer', '6144ab8e0ff24d0c3a8ae70949fe0967d582b193', 2, '2017-07-31 09:57:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_cat`
--
ALTER TABLE `job_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `job_cat`
--
ALTER TABLE `job_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
