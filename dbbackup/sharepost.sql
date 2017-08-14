-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 11:09 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
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
  `gender` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstName`, `lastName`, `fathersName`, `personalNumber`, `dateOfBirth`, `phoneNumber`, `email`, `contactNumber`, `residence`, `jobPost`, `comment`, `registration_date`, `gender`) VALUES
(1, 'nika', 'mink', 'yle', 'nink', '2016-11-01', '6578998767', 'asdjh@Jhgasd.com', '345789', 'sayleveti', 1, 'magari gandonia', '2016-11-13 15:39:30', NULL),
(2, 'fghjkl', 'jhghjkhg', 'hjj', 'hjj', '0000-00-00', 'kh', 'jk', 'j', 'k', 0, 'jh', '2016-11-13 18:47:41', 0),
(3, 'áƒ áƒ”áƒ–áƒ', 'áƒ™áƒáƒœáƒ™áƒ˜áƒ', 'áƒ›áƒáƒœáƒ£áƒ©áƒáƒ áƒ˜', '32456789', '1999-12-31', '234567899', '', '324567899', 'áƒ“áƒáƒ áƒ©áƒ”áƒšáƒ˜', 3, 'ეს არ ის კომენტარის ველი აქ  შეიძ₾ება დაიწეროს ის რასაც ფიქრობა ნა რამე სისულელე კაროჩე მოკლედ ე სკომენტარია და ყტუ მუშის შესახებ რამე დამატებიტი ინფოა აქ უდნა აიწეროს მოკლეს ეს მიმისტვისა რის რომრამე დაწერ დამამტებით მშიშთვის და მეტია რაფრის თმა არ ინიდა ამის ედა არ ასარადგსაჯჰ', '2016-11-13 19:36:34', 1),
(4, 'jhgjhgjh', 'gjhgj', 'hgj', '768976657989', '1997-05-27', '91234567890', 'b.adsa@ads.co', '234567890', 'asdfghjjkjhgfd', 3, 'akj dgasjdg asldgsadhsjkadhsa\r\n', '2016-11-16 13:02:10', 1),
(5, 'Louise', 'Morales', 'lmorales4@craigslist.org', '60683-106', '0000-00-00', NULL, NULL, NULL, NULL, 8798, NULL, '2016-11-16 20:37:40', 0),
(6, 'Howard', 'Matthews', 'hmatthews5@multiply.com', '37012-950', '0000-00-00', NULL, NULL, NULL, NULL, 20666, NULL, '2016-11-16 20:37:40', 0),
(7, 'Victor', 'Shaw', 'vshaw6@trellian.com', '57955-8699', '0000-00-00', NULL, NULL, NULL, NULL, 7, NULL, '2016-11-16 20:37:40', 0),
(9, 'Gloria', 'Green', 'ggreen8@apple.com', '42291-625', '0000-00-00', NULL, NULL, NULL, NULL, 3, NULL, '2016-11-16 20:37:40', 0),
(10, 'Jean', 'Berry', 'jberry9@jiathis.com', '57520-0391', '0000-00-00', NULL, NULL, NULL, NULL, 5, NULL, '2016-11-16 20:37:40', 0),
(11, 'Henry', 'Snyder', 'hsnydera@samsung.com', '54868-6035', '0000-00-00', NULL, NULL, NULL, NULL, 123, NULL, '2016-11-16 20:37:40', 0),
(12, 'Theresa', 'Thomas', 'tthomasb@quantcast.com', '65044-0779', '0000-00-00', NULL, NULL, NULL, NULL, 24701, NULL, '2016-11-16 20:37:40', 0),
(13, 'Norma', 'Shaw', 'nshawc@slashdot.org', '10191-1795', '0000-00-00', NULL, NULL, NULL, NULL, 5949, NULL, '2016-11-16 20:37:40', 0),
(14, 'Ruth', 'Pierce', 'rpierced@washingtonpost.com', '43419-015', '0000-00-00', NULL, NULL, NULL, NULL, 66555, NULL, '2016-11-16 20:37:40', 0),
(15, 'Mildred', 'Green', 'mgreene@php.net', '52125-041', '0000-00-00', NULL, NULL, NULL, NULL, 74772, NULL, '2016-11-16 20:37:40', 0),
(16, 'Diana', 'Hunt', 'dhuntf@sfgate.com', '35356-955', '0000-00-00', NULL, NULL, NULL, NULL, 49948, NULL, '2016-11-16 20:37:40', 0),
(17, 'Virginia', 'Perry', 'vperryg@joomla.org', '49288-0625', '0000-00-00', NULL, NULL, NULL, NULL, 1, NULL, '2016-11-16 20:37:41', 0),
(18, 'Stephanie', 'Hart', 'sharth@blog.com', '63548-0069', '0000-00-00', NULL, NULL, NULL, NULL, 220, NULL, '2016-11-16 20:37:41', 0),
(19, 'Billy', 'Hudson', 'bhudsoni@newyorker.com', '63629-2612', '0000-00-00', NULL, NULL, NULL, NULL, 258, NULL, '2016-11-16 20:37:41', 0),
(20, 'Douglas', 'Ramos', 'dramosj@mashable.com', '51655-009', '0000-00-00', NULL, NULL, NULL, NULL, 255, NULL, '2016-11-16 20:37:41', 0),
(21, 'Aaron', 'Smith', 'asmithk@oracle.com', '68405-017', '0000-00-00', NULL, NULL, NULL, NULL, 88, NULL, '2016-11-16 20:37:41', 0),
(22, 'Norma', 'Hawkins', 'nhawkinsl@mayoclinic.com', '24385-937', '0000-00-00', NULL, NULL, NULL, NULL, 5635, NULL, '2016-11-16 20:37:41', 0),
(23, 'John', 'Perkins', 'jperkinsm@sakura.ne.jp', '68382-092', '0000-00-00', NULL, NULL, NULL, NULL, 96679, NULL, '2016-11-16 20:37:41', 0),
(24, 'Anthony', 'Marshall', 'amarshalln@google.com.br', '36987-2514', '0000-00-00', NULL, NULL, NULL, NULL, 12678, NULL, '2016-11-16 20:37:41', 0),
(25, 'Julia', 'Kelly', 'jkellyo@hc360.com', '51801-013', '0000-00-00', NULL, NULL, NULL, NULL, 93, NULL, '2016-11-16 20:37:41', 0),
(26, 'Andrea', 'West', 'awestp@e-recht24.de', '48433-314', '0000-00-00', NULL, NULL, NULL, NULL, 942, NULL, '2016-11-16 20:37:41', 0),
(27, 'Clarence', 'Parker', 'cparkerq@mapquest.com', '62191-009', '0000-00-00', NULL, NULL, NULL, NULL, 3075, NULL, '2016-11-16 20:37:41', 0),
(28, 'Philip', 'Black', 'pblackr@hhs.gov', '76119-1212', '0000-00-00', NULL, NULL, NULL, NULL, 75757, NULL, '2016-11-16 20:37:41', 0),
(29, 'Todd', 'Hughes', 'thughess@patch.com', '44738-6001', '0000-00-00', NULL, NULL, NULL, NULL, 91, NULL, '2016-11-16 20:37:41', 0),
(30, 'Phillip', 'Smith', 'psmitht@army.mil', '98132-870', '0000-00-00', NULL, NULL, NULL, NULL, 62, NULL, '2016-11-16 20:37:41', 0),
(31, 'Deborah', 'Hudson', 'dhudsonu@webs.com', '42227-081', '0000-00-00', NULL, NULL, NULL, NULL, 76304, NULL, '2016-11-16 20:37:41', 0),
(32, 'Charles', 'Fuller', 'cfullerv@amazon.co.uk', '54569-5840', '0000-00-00', NULL, NULL, NULL, NULL, 1499, NULL, '2016-11-16 20:37:41', 0),
(33, 'Andrea', 'Baker', 'abakerw@state.tx.us', '0062-0575', '0000-00-00', NULL, NULL, NULL, NULL, 630, NULL, '2016-11-16 20:37:41', 0),
(34, 'Karen', 'Fields', 'kfieldsx@tmall.com', '0093-0265', '0000-00-00', NULL, NULL, NULL, NULL, 17, NULL, '2016-11-16 20:37:41', 0),
(35, 'Roy', 'Clark', 'rclarky@nhs.uk', '55118-225', '0000-00-00', NULL, NULL, NULL, NULL, 59, NULL, '2016-11-16 20:37:41', 0),
(36, 'Joseph', 'Castillo', 'jcastilloz@hugedomains.com', '36987-1547', '0000-00-00', NULL, NULL, NULL, NULL, 1, NULL, '2016-11-16 20:37:41', 0),
(37, 'Richard', 'Ramos', 'rramos10@army.mil', '0527-1380', '0000-00-00', NULL, NULL, NULL, NULL, 690, NULL, '2016-11-16 20:37:41', 0),
(38, 'Robert', 'Carr', 'rcarr11@seesaa.net', '55154-6826', '0000-00-00', NULL, NULL, NULL, NULL, 8, NULL, '2016-11-16 20:37:41', 0),
(39, 'Samuel', 'Garza', 'sgarza12@baidu.com', '31722-536', '0000-00-00', NULL, NULL, NULL, NULL, 8, NULL, '2016-11-16 20:37:42', 0),
(40, 'Lori', 'Gilbert', 'lgilbert13@wordpress.com', '53567-0706', '0000-00-00', NULL, NULL, NULL, NULL, 799, NULL, '2016-11-16 20:37:42', 0),
(41, 'Jerry', 'Morrison', 'jmorrison14@buzzfeed.com', '55289-238', '0000-00-00', NULL, NULL, NULL, NULL, 7113, NULL, '2016-11-16 20:37:42', 0),
(42, 'Evelyn', 'Dean', 'edean15@amazon.de', '0363-0183', '0000-00-00', NULL, NULL, NULL, NULL, 3, NULL, '2016-11-16 20:37:42', 0),
(43, 'Sandra', 'Bennett', 'sbennett16@netlog.com', '0615-7656', '0000-00-00', NULL, NULL, NULL, NULL, 91, NULL, '2016-11-16 20:37:42', 0),
(44, 'Diane', 'Edwards', 'dedwards17@google.com', '42794-086', '0000-00-00', NULL, NULL, NULL, NULL, 4150, NULL, '2016-11-16 20:37:42', 0),
(45, 'Lillian', 'Gonzalez', 'lgonzalez18@cdbaby.com', '55154-4799', '0000-00-00', NULL, NULL, NULL, NULL, 89, NULL, '2016-11-16 20:37:42', 0),
(46, 'Evelyn', 'Matthews', 'ematthews19@live.com', '24208-367', '0000-00-00', NULL, NULL, NULL, NULL, 71, NULL, '2016-11-16 20:37:42', 0),
(47, 'Sandra', 'Hall', 'shall1a@imageshack.us', '0944-2924', '0000-00-00', NULL, NULL, NULL, NULL, 44727, NULL, '2016-11-16 20:37:42', 0),
(48, 'Roger', 'Lewis', 'rlewis1b@chronoengine.com', '30142-852', '0000-00-00', NULL, NULL, NULL, NULL, 6, NULL, '2016-11-16 20:37:42', 0),
(49, 'Albert', 'Allen', 'aallen1c@statcounter.com', '49967-369', '0000-00-00', NULL, NULL, NULL, NULL, 3932, NULL, '2016-11-16 20:37:42', 0),
(50, 'Albert', 'Brooks', 'abrooks1d@noaa.gov', '59898-170', '0000-00-00', NULL, NULL, NULL, NULL, 37, NULL, '2016-11-16 20:37:42', 0),
(52, 'Cynthia', 'Wilson', 'cwilson1f@blogger.com', '58194-011', '0000-00-00', NULL, NULL, NULL, NULL, 75273, NULL, '2016-11-16 20:37:42', 0),
(53, 'Frank', 'Robinson', 'frobinson1g@joomla.org', '50419-702', '0000-00-00', NULL, NULL, NULL, NULL, 29, NULL, '2016-11-16 20:37:42', 0),
(54, 'Michelle', 'Webb', 'mwebb1h@theguardian.com', '51389-104', '0000-00-00', NULL, NULL, NULL, NULL, 84, NULL, '2016-11-16 20:37:42', 0),
(55, 'Janice', 'Gonzalez', 'jgonzalez1i@techcrunch.com', '61995-1106', '0000-00-00', NULL, NULL, NULL, NULL, 38369, NULL, '2016-11-16 20:37:42', 0),
(56, 'Lori', 'Garcia', 'lgarcia1j@bluehost.com', '61715-026', '0000-00-00', NULL, NULL, NULL, NULL, 30, NULL, '2016-11-16 20:37:42', 0),
(57, 'Randy', 'Allen', 'rallen1k@gizmodo.com', '41520-272', '0000-00-00', NULL, NULL, NULL, NULL, 13, NULL, '2016-11-16 20:37:42', 0),
(58, 'Nicholas', 'Graham', 'ngraham1l@vinaora.com', '54482-020', '0000-00-00', NULL, NULL, NULL, NULL, 1882, NULL, '2016-11-16 20:37:42', 0),
(59, 'Craig', 'Carroll', 'ccarroll1m@paginegialle.it', '21130-426', '0000-00-00', NULL, NULL, NULL, NULL, 37, NULL, '2016-11-16 20:37:42', 0),
(60, 'Roy', 'Lane', 'rlane1n@census.gov', '43239-201', '0000-00-00', NULL, NULL, NULL, NULL, 432, NULL, '2016-11-16 20:37:42', 0),
(61, 'Scott', 'Chavez', 'schavez1o@delicious.com', '14783-327', '0000-00-00', NULL, NULL, NULL, NULL, 41, NULL, '2016-11-16 20:37:42', 0),
(62, 'Ronald', 'Brooks', 'rbrooks1p@taobao.com', '35356-825', '0000-00-00', NULL, NULL, NULL, NULL, 8311, NULL, '2016-11-16 20:37:42', 0),
(63, 'George', 'Carr', 'gcarr1q@phoca.cz', '68084-277', '0000-00-00', NULL, NULL, NULL, NULL, 0, NULL, '2016-11-16 20:37:42', 0),
(64, 'Jesse', 'Burke', 'jburke1r@admin.ch', '36987-3341', '0000-00-00', NULL, NULL, NULL, NULL, 1026, NULL, '2016-11-16 20:37:42', 0),
(65, 'Marilyn', 'Burns', 'mburns1s@nbcnews.com', '60193-102', '0000-00-00', NULL, NULL, NULL, NULL, 1, NULL, '2016-11-16 20:37:42', 0),
(66, 'Ryan', 'Weaver', 'rweaver1t@nyu.edu', '68382-005', '0000-00-00', NULL, NULL, NULL, NULL, 2200, NULL, '2016-11-16 20:37:43', 0),
(67, 'Diana', 'Daniels', 'ddaniels1u@cnbc.com', '65841-799', '0000-00-00', NULL, NULL, NULL, NULL, 899, NULL, '2016-11-16 20:37:43', 0),
(68, 'Craig', 'Knight', 'cknight1v@forbes.com', '0283-0808', '0000-00-00', NULL, NULL, NULL, NULL, 62, NULL, '2016-11-16 20:37:43', 0),
(69, 'Joyce', 'Webb', 'jwebb1w@google.com.br', '54575-224', '0000-00-00', NULL, NULL, NULL, NULL, 2, NULL, '2016-11-16 20:37:43', 0),
(70, 'Scott', 'Wells', 'swells1x@facebook.com', '57520-0067', '0000-00-00', NULL, NULL, NULL, NULL, 0, NULL, '2016-11-16 20:37:43', 0),
(71, 'Elizabeth', 'Garza', 'egarza1y@wiley.com', '50114-1010', '0000-00-00', NULL, NULL, NULL, NULL, 825, NULL, '2016-11-16 20:37:43', 0),
(72, 'Heather', 'Daniels', 'hdaniels1z@freewebs.com', '64159-6394', '0000-00-00', NULL, NULL, NULL, NULL, 95, NULL, '2016-11-16 20:37:43', 0),
(73, 'Nicole', 'Reyes', 'nreyes20@vistaprint.com', '51769-141', '0000-00-00', NULL, NULL, NULL, NULL, 5, NULL, '2016-11-16 20:37:43', 0),
(74, 'Kelly', 'Morrison', 'kmorrison21@webs.com', '27241-001', '0000-00-00', NULL, NULL, NULL, NULL, 99823, NULL, '2016-11-16 20:37:43', 0),
(75, 'Carol', 'Diaz', 'cdiaz22@hugedomains.com', '41190-731', '0000-00-00', NULL, NULL, NULL, NULL, 33, NULL, '2016-11-16 20:37:43', 0),
(76, 'Steve', 'Schmidt', 'sschmidt23@creativecommons.org', '10019-955', '0000-00-00', NULL, NULL, NULL, NULL, 3, NULL, '2016-11-16 20:37:43', 0),
(77, 'Kimberly', 'Jones', 'kjones24@vimeo.com', '10578-016', '0000-00-00', NULL, NULL, NULL, NULL, 2441, NULL, '2016-11-16 20:37:43', 0),
(78, 'Maria', 'Hanson', 'mhanson25@google.co.jp', '54868-3566', '0000-00-00', NULL, NULL, NULL, NULL, 69862, NULL, '2016-11-16 20:37:43', 0),
(79, 'Craig', 'Larson', 'clarson26@marketwatch.com', '43063-271', '0000-00-00', NULL, NULL, NULL, NULL, 414, NULL, '2016-11-16 20:37:43', 0),
(80, 'Kelly', 'Rivera', 'krivera27@pbs.org', '50544-102', '0000-00-00', NULL, NULL, NULL, NULL, 86781, NULL, '2016-11-16 20:37:43', 0),
(81, 'Joyce', 'Mcdonald', 'jmcdonald28@pagesperso-orange.', '49967-390', '0000-00-00', NULL, NULL, NULL, NULL, 59, NULL, '2016-11-16 20:37:43', 0),
(83, 'Virginia', 'Grant', 'vgrant2a@unc.edu', '52083-242', '0000-00-00', NULL, NULL, NULL, NULL, 2, NULL, '2016-11-16 20:37:43', 0),
(84, 'Jessica', 'Grant', 'jgrant2b@home.pl', '49834-001', '0000-00-00', NULL, NULL, NULL, NULL, 97949, NULL, '2016-11-16 20:37:43', 0),
(85, 'Gregory', 'Hansen', 'ghansen2c@miibeian.gov.cn', '37205-205', '0000-00-00', NULL, NULL, NULL, NULL, 7217, NULL, '2016-11-16 20:37:43', 0),
(86, 'Donna', 'Greene', 'dgreene2d@mediafire.com', '21695-233', '0000-00-00', NULL, NULL, NULL, NULL, 122, NULL, '2016-11-16 20:37:43', 0),
(87, 'Irene', 'Holmes', 'iholmes2e@purevolume.com', '21695-411', '0000-00-00', NULL, NULL, NULL, NULL, 844, NULL, '2016-11-16 20:37:43', 0),
(88, 'George', 'Webb', 'gwebb2f@google.fr', '51523-019', '0000-00-00', NULL, NULL, NULL, NULL, 68, NULL, '2016-11-16 20:37:43', 0),
(89, 'John', 'Freeman', 'jfreeman2g@psu.edu', '49873-402', '0000-00-00', NULL, NULL, NULL, NULL, 54, NULL, '2016-11-16 20:37:43', 0),
(90, 'Harry', 'Fernandez', 'hfernandez2h@accuweather.com', '76125-667', '0000-00-00', NULL, NULL, NULL, NULL, 11, NULL, '2016-11-16 20:37:44', 0),
(91, 'Catherine', 'Roberts', 'croberts2i@ibm.com', '0363-9362', '0000-00-00', NULL, NULL, NULL, NULL, 5, NULL, '2016-11-16 20:37:44', 0),
(92, 'Wanda', 'Little', 'wlittle2j@plala.or.jp', '52125-406', '0000-00-00', NULL, NULL, NULL, NULL, 345, NULL, '2016-11-16 20:37:44', 0),
(93, 'Cynthia', 'Rivera', 'crivera2k@examiner.com', '47593-476', '0000-00-00', NULL, NULL, NULL, NULL, 376, NULL, '2016-11-16 20:37:44', 0),
(94, 'Daniel', 'Vasquez', 'dvasquez2l@issuu.com', '54868-0427', '0000-00-00', NULL, NULL, NULL, NULL, 8, NULL, '2016-11-16 20:37:44', 0),
(95, 'Steve', 'Martinez', 'smartinez2m@answers.com', '59779-324', '0000-00-00', NULL, NULL, NULL, NULL, 8, NULL, '2016-11-16 20:37:44', 0),
(96, 'Karen', 'Watson', 'kwatson2n@nbcnews.com', '16714-295', '0000-00-00', NULL, NULL, NULL, NULL, 18, NULL, '2016-11-16 20:37:44', 0),
(97, 'Henry', 'Ortiz', 'hortiz2o@google.co.uk', '58668-1371', '0000-00-00', NULL, NULL, NULL, NULL, 2678, NULL, '2016-11-16 20:37:44', 0),
(98, 'Roger', 'White', 'rwhite2p@gmpg.org', '0603-7540', '0000-00-00', NULL, NULL, NULL, NULL, 1818, NULL, '2016-11-16 20:37:44', 0),
(99, 'Katherine', 'Smith', 'ksmith2q@t.co', '50865-056', '0000-00-00', NULL, NULL, NULL, NULL, 1310, NULL, '2016-11-16 20:37:44', 0),
(100, 'Alan', 'Sanchez', 'asanchez2r@about.me', '0023-3616', '0000-00-00', NULL, NULL, NULL, NULL, 270, NULL, '2016-11-16 20:37:44', 0),
(101, 'ds', 'sd', 'sd', 'sd', '2016-11-01', 'sd', 'sds', 'sd', 'sad', 1, 'sad', '2016-11-16 23:06:18', NULL),
(102, 'ds', 'sd', 'sd', 'sd', '2016-11-01', 'sd', 'sds', 'sd', 'sad', 1, 'sad', '2016-11-16 23:06:25', NULL),
(103, 'naomi', 'kasha', 'fifa', '1234567890', '2016-12-31', '12345678098765432', 'namikakasha@com.gm', '23456789876543', 'Estonia', 3, 'áƒ”áƒ¡ áƒáƒ  áƒ˜áƒ¡ áƒ™áƒáƒ›áƒ”áƒœáƒ¢áƒáƒ áƒ˜áƒ¡ áƒ•áƒ”áƒšáƒ˜ áƒáƒ¥ áƒ¨áƒ”áƒ˜áƒ«â‚¾áƒ”áƒ‘áƒ áƒ“áƒáƒ˜áƒ¬áƒ”áƒ áƒáƒ¡ áƒ˜áƒ¡ áƒ áƒáƒ¡áƒáƒª áƒ¤áƒ˜áƒ¥áƒ áƒáƒ‘áƒ áƒœáƒ áƒ áƒáƒ›áƒ” áƒ¡áƒ˜áƒ¡áƒ£áƒšáƒ”áƒšáƒ” áƒ™áƒáƒ áƒáƒ©áƒ” áƒ›áƒáƒ™áƒšáƒ”áƒ“ áƒ” áƒ¡áƒ™áƒáƒ›áƒ”áƒœáƒ¢áƒáƒ áƒ˜áƒ áƒ“áƒ áƒ§áƒ¢áƒ£ áƒ›áƒ£áƒ¨áƒ˜áƒ¡ áƒ¨áƒ”áƒ¡áƒáƒ®áƒ”áƒ‘ áƒ áƒáƒ›áƒ” áƒ“áƒáƒ›áƒáƒ¢áƒ”áƒ‘áƒ˜áƒ¢áƒ˜ áƒ˜áƒœáƒ¤áƒáƒ áƒáƒ¥ áƒ£áƒ“áƒœáƒ áƒáƒ˜áƒ¬áƒ”áƒ áƒáƒ¡ áƒ›áƒáƒ™áƒšáƒ”áƒ¡ áƒ”áƒ¡ áƒ›áƒ˜áƒ›áƒ˜áƒ¡áƒ¢áƒ•áƒ˜áƒ¡áƒ áƒ áƒ˜áƒ¡ áƒ áƒáƒ›áƒ áƒáƒ›áƒ” áƒ“áƒáƒ¬áƒ”áƒ  áƒ“áƒáƒ›áƒáƒ›áƒ¢áƒ”áƒ‘áƒ˜áƒ— áƒ›áƒ¨áƒ˜áƒ¨áƒ—áƒ•áƒ˜áƒ¡ áƒ“áƒ áƒ›áƒ”áƒ¢áƒ˜áƒ áƒ áƒáƒ¤áƒ áƒ˜áƒ¡ áƒ—áƒ›áƒ áƒáƒ  áƒ˜áƒœáƒ˜áƒ“áƒ áƒáƒ›áƒ˜áƒ¡ áƒ”áƒ“áƒ áƒáƒ  áƒáƒ¡áƒáƒ áƒáƒ“áƒ’áƒ¡áƒáƒ¯áƒ°', '2016-11-17 12:03:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `reg_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `reg_date_time`) VALUES
(28, 'a', 'a', 'f4ce81e9738a89d8eab5ca6e2858c12df1b2c7b7', 2, '2016-11-12 14:49:50'),
(29, 'admin', 'admin', '452a65aa8f88f42695ca073d945d96dabe3899b9', 1, '2016-11-12 14:51:07'),
(30, 'nimda', 'nimda', 'b8e255bc9c5b6afc74549061d2a515b3597e08d1', 1, '2016-11-13 08:12:02'),
(31, 'a', 'a', 'f4ce81e9738a89d8eab5ca6e2858c12df1b2c7b7', 2, '2016-11-13 08:16:39'),
(32, 'asd', 'asd', 'ee9a275fa00edfaff7e05dc9ed39de8678ebf039', NULL, '2016-11-13 16:43:59'),
(33, 'nimda', 'nimda@nimda.com', '56cc37d049b90909cb89ff8277bf07ee889aa461', 1, '2016-11-16 11:02:27');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
