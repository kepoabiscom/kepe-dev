-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2015 at 02:18 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kepe3788_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `summary` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  FULLTEXT KEY `summary` (`summary`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_category_id`, `user_id`, `image_id`, `title`, `tag`, `summary`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(12, 2, 3, 17, 'The standard Lorem Ipsum', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', 'published', '2015-04-13 16:17:54', '2015-04-13 16:17:54', NULL),
(13, 1, 3, 18, 'The standard Lorem Ipsum First', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', 'published', '2015-05-20 17:22:29', '2015-05-20 17:22:29', NULL),
(14, 3, 3, 19, 'The standard Lorem Ipsum Second', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', 'published', '2015-06-20 17:22:53', '2015-06-20 17:23:20', NULL),
(15, 1, 3, 20, 'The standard Lorem Ipsum Last', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', 'published', '2015-06-20 17:22:53', '2015-06-20 17:23:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_blog`
--

CREATE TABLE IF NOT EXISTS `article_blog` (
  `artcle_blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`artcle_blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `article_blog`
--

INSERT INTO `article_blog` (`artcle_blog_id`, `article_id`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-13 16:17:54', NULL, NULL),
(2, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-13 16:17:54', NULL, NULL),
(3, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-13 16:17:54', NULL, NULL),
(4, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-20 17:22:29', NULL, NULL),
(5, 13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-20 17:22:29', NULL, NULL),
(6, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-20 17:22:53', NULL, NULL),
(7, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-06-20 17:22:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `article_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_category_id`, `image_id`, `title`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 0, 'Videografi', 'Videografi', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL),
(2, 0, 'Sinematografi', 'Sinematografi', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL),
(3, 0, 'Fotografi', 'Fotografi', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE IF NOT EXISTS `article_comment` (
  `article_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `body` text,
  `type` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=24 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `title`, `tag`, `body`, `type`, `size`, `path`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/slider/slider-1.jpg', '2015-06-06 07:23:23', '2015-06-06 07:23:23', NULL),
(2, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/slider/slider-3.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL),
(3, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/slider/slider-2.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL),
(4, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/slider/slider-4.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL),
(5, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (1).jpg', NULL, NULL, NULL),
(6, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (2).jpg', NULL, NULL, NULL),
(7, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (3).jpg', NULL, NULL, NULL),
(8, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (4).jpg', NULL, NULL, NULL),
(9, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (5).jpg', NULL, NULL, NULL),
(10, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (6).jpg', NULL, NULL, NULL),
(11, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (7).jpg', NULL, NULL, NULL),
(12, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (8).jpg', NULL, NULL, NULL),
(13, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (9).jpg', NULL, NULL, NULL),
(14, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (10).jpg', NULL, NULL, NULL),
(15, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (11).jpg', NULL, NULL, NULL),
(16, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/video/img (13).jpg', NULL, NULL, NULL),
(17, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/article/img (1).jpg', NULL, NULL, NULL),
(18, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/article/img (4).jpg', NULL, NULL, NULL),
(19, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/article/img (10).jpg', NULL, NULL, NULL),
(20, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/article/img (11).jpg', NULL, NULL, NULL),
(21, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/news/img (3).jpg', NULL, NULL, NULL),
(22, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/news/img (9).jpg', NULL, NULL, NULL),
(23, 'kepoabiscom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '', '', 'assets/img/news/img (13).jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('unpublished','pending','published') CHARACTER SET latin1 DEFAULT 'pending',
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `position`, `type`, `name`, `path`, `status`, `active`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 0, 1, 'static_content', 'About Us', 'about-us', 'published', 1, '2015-06-21 04:00:00', NULL, NULL),
(2, 0, 1, 'default', 'Portfolio', 'portfolio', 'published', 1, '2015-06-21 04:00:00', NULL, NULL),
(3, 0, 1, 'default', 'Contact Us', 'contact-us', 'published', 1, '2015-06-21 04:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `summary` text,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  FULLTEXT KEY `summary` (`summary`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_category_id`, `user_id`, `image_id`, `title`, `tag`, `summary`, `body`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 1, 3, 21, '1914 translation by H. Rackham First', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', '<p>This blog post shows a few different types of content that''s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\n   <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n   <ul>\n      <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\n      <li>Donec id elit non mi porta gravida at eget metus.</li>\n      <li>Nulla vitae elit libero, a pharetra augue.</li>\n   </ul>\n   <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\n   <ol>\n      <li>Vestibulum id ligula porta felis euismod semper.</li>\n     <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\n      <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\n    </ol>\n   <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 'published', '2015-04-13 16:17:54', '2015-04-13 16:17:54', NULL),
(2, 1, 3, 22, '1914 translation by H. Rackham Second', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', '<p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\n       <blockquote>\n          <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n        </blockquote>\n       <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\n        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>', 'published', '2015-05-01 17:22:29', '2015-05-01 17:22:29', NULL),
(3, 1, 3, 23, '1914 translation by H. Rackham Last', 'lorem, Ipsum', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.</p>', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n        <ul>\n          <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\n          <li>Donec id elit non mi porta gravida at eget metus.</li>\n          <li>Nulla vitae elit libero, a pharetra augue.</li>\n       </ul>\n       <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\n        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>', 'published', '2015-06-20 17:22:53', '2015-06-20 17:23:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `news_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`news_category_id`, `image_id`, `title`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 0, 'Event', 'Event', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_comment`
--

CREATE TABLE IF NOT EXISTS `news_comment` (
  `news_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `description` text,
  `background_color` varchar(255) DEFAULT NULL,
  `contact_address` text,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_phone_mobile_first` varchar(255) DEFAULT NULL,
  `contact_phone_mobile_second` varchar(255) DEFAULT NULL,
  `contact_fax` varchar(255) DEFAULT NULL,
  `contact_email_address_first` varchar(255) DEFAULT NULL,
  `contact_email_address_second` varchar(255) DEFAULT NULL,
  `contact_lat` varchar(255) DEFAULT NULL,
  `contact_long` varchar(255) DEFAULT NULL,
  `contact_city` varchar(255) DEFAULT NULL,
  `contact_state` varchar(255) DEFAULT NULL,
  `contact_zip` varchar(255) DEFAULT NULL,
  `contact_country` varchar(255) DEFAULT NULL,
  `contact_facebook` varchar(255) DEFAULT NULL,
  `contact_twitter` varchar(255) DEFAULT NULL,
  `contact_googleplus` varchar(255) DEFAULT NULL,
  `created_year` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `footer` text,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `user_id`, `title`, `logo`, `tagline`, `description`, `background_color`, `contact_address`, `contact_phone`, `contact_phone_mobile_first`, `contact_phone_mobile_second`, `contact_fax`, `contact_email_address_first`, `contact_email_address_second`, `contact_lat`, `contact_long`, `contact_city`, `contact_state`, `contact_zip`, `contact_country`, `contact_facebook`, `contact_twitter`, `contact_googleplus`, `created_year`, `version`, `footer`) VALUES
(1, 0, 'KepoAbis.com', 'b7d6537d27b26a5878d476104cf70186.png', 'Always make you curious', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.</p>', '#000000', '<p>Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati</p>', '085697309204', '', '', '23456', 'hi@kepoabis.com', 'contact@kepoabis.com', '-6.290491', '106.860785', 'Jakarta Timur', 'DKI Jakarta', '13540', 'Indonesia', 'https://www.facebook.com/kepoabiscom', 'https://twitter.com/KepoAbisCom', 'https://plus.google.com/108330573883645796122', '2014', '1.0.0', '<p>© Copyright 2015 Haamill Productions - All Rights reserved</p>');

-- --------------------------------------------------------

--
-- Table structure for table `static_content`
--

CREATE TABLE IF NOT EXISTS `static_content` (
  `static_content_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `summary` text,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`static_content_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `static_content`
--

INSERT INTO `static_content` (`static_content_Id`, `user_id`, `image_id`, `title`, `tag`, `parameter`, `summary`, `body`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 3, 0, 'About Us', 'about, us', 'about-us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '2015-06-20 17:22:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_basic_id` int(11) NOT NULL DEFAULT '3',
  `nama_lengkap` varchar(25) NOT NULL DEFAULT '',
  `user_name` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role_basic_id`, `nama_lengkap`, `user_name`, `password`, `email`, `image`, `position`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(3, 1, 'Administrator', 'admin', '25d55ad283aa400af464c76d713c07ad', 'administrator@gmail.com', 'd697cf246a144e1c5e56a1ed2d91d7fa.jpg', 'kepoabis', 'qwerty', '2015-06-06 00:00:00', '2015-06-20 16:43:01', '2015-06-26 00:00:00'),
(32, 3, 'Herman', 'hermanwahyudi', 'e10adc3949ba59abbe56e057f20f883e', 'hermanwahyudi@rocketmail.com', 'f110bb8bed420f53695516d798ce9303.jpg', 'qwerty', 'qwerty', '2015-06-11 19:10:24', '2015-06-28 07:01:28', NULL),
(34, 2, 'Syahrul Ramadhan', 'syahrulramadhan', '7e3c888bc51d81e9f092529b0c721135', 'sramadhan95@gmail.com', '78c6d5f7d9b7e79a17b4261867b9baac.jpg', 'qwerty', 'qwerty', '2015-06-20 11:02:25', '2015-06-20 11:02:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_basic`
--

CREATE TABLE IF NOT EXISTS `user_role_basic` (
  `user_role_basic_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_name_alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_role_basic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role_basic`
--

INSERT INTO `user_role_basic` (`user_role_basic_id`, `role_name`, `role_name_alias`, `active`, `created_date`) VALUES
(1, 'superadmin', 'Super Administrator', 1, '2015-06-20 18:35:20'),
(2, 'admin', 'Administrator', 1, '2015-06-20 18:35:25'),
(3, 'crew', 'Crew', 1, '2015-06-20 18:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `video_category_id` varchar(50) NOT NULL DEFAULT '',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `tag` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `story_ide` varchar(50) DEFAULT NULL,
  `screenwriter` varchar(50) DEFAULT NULL,
  `film_director` varchar(50) DEFAULT NULL,
  `cameramen` varchar(50) DEFAULT NULL,
  `artist` text,
  `url` varchar(255) NOT NULL DEFAULT '',
  `duration` varchar(8) NOT NULL DEFAULT '',
  `status` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=27 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `user_id`, `video_category_id`, `image_id`, `tag`, `title`, `description`, `story_ide`, `screenwriter`, `film_director`, `cameramen`, `artist`, `url`, `duration`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(5, 3, '2', 8, 'qwerty', 'Like Father Like Daughter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=lbYbFmG7eu0', '01.39', 'published', '2015-06-14 04:20:38', '2015-06-20 07:57:01', NULL),
(6, 3, '1', 12, 'qwerty', 'KEPOABIS.COM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=TjBvuQ_Qj-0', '02.12', 'published', '2015-03-14 04:50:46', '2015-03-14 04:50:46', NULL),
(7, 3, '3', 5, 'qwerty', 'Ace Hardware untuk Indonesia - ACE Hardware Video Competition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=VjN4Xl3DN_I', '01.22', 'published', '2015-06-14 04:51:35', '2015-06-20 07:55:50', NULL),
(8, 3, '1', 7, 'enjoy, jakarta, kepo, abis', 'Enjoy Jakarta Enjoy Your Day, Nikmati Caramu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=dg_IomGAkmU', '01.09', 'published', '2015-03-14 04:50:46', '2015-03-14 04:50:46', NULL),
(9, 34, '1', 6, 'duit, kepo, abis', 'Masih Mau Duit Kotor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=LF0j-DMAxPw', '01.09', 'published', '2015-03-14 04:50:46', '2015-03-14 04:50:46', NULL),
(10, 32, '1', 9, 'qwerty', 'Harta, Tahta, & Wanita', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=Y6wUbCjed00', '01.09', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(11, 32, '1', 13, 'qwery', 'The Youthpreneur Your future is your choice #VirusWirausaha', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwery', 'qwery', 'qwery', 'qwery', '<p>qwery</p>', 'https://www.youtube.com/watch?v=icV2JZoqQtY', '01.01', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(12, 32, '1', 10, 'qwerty', 'An Impacting Life', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=lkh8mi5phsU', '09.57', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(13, 3, '1', 14, 'qwerty', 'This Is My Active Life - Yamaha', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=ycZwlD7cCus', '00.57', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(14, 3, '1', 11, 'qwerty', 'Jeruji Besi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=T0O-zde6U9I', '11.35', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(15, 3, '1', 15, 'qwerty', 'Kepoin Kuliner - Takeya The Japanese Restaurant, Bintaro', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=_QbBXLBLRyw', '05.10', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(16, 34, '1', 0, 'qwerty', 'Kepoin Event - Seminar & Talk Show Pra Nikah KTMU', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=w3Oth_jpEiA', '05.06', 'published', '2015-04-20 07:54:22', '2015-04-20 07:54:22', NULL),
(17, 3, '1', 0, 'qwerty', 'Tips Bertamu Saat Lebaran', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=6uxLckdtomI', '06.45', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(18, 34, '1', 0, 'qwerty', 'Tips Berpergian Jauh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=WEKsZNOV0D4', '01.57', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(19, 3, '1', 0, 'qwerty', 'FORMASI 2015', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=1rhDrHn-O_k', '01.26', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(20, 3, '1', 0, 'qwerty', 'Video Promosi Formasi 2015 (ver.2)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=82I_3faUhpc', '01.20', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(21, 32, '1', 16, 'qwerty', 'Susu 18 Pasang (Intro KepoAbis.com) - KepoinVlog #1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=uz91JYDC6GE', '03.51', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(22, 3, '1', 0, 'qwerty', 'Kepoin Event - FORMASI 2015 MAN 4 Jakarta', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=ADP679lVYsk', '05.46', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(23, 3, '1', 0, 'qwerty', 'Video Promosi KOMPAS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=bUGZ1LG5T4s', '00.47', 'published', '2015-05-20 14:07:41', '2015-05-20 14:07:41', NULL),
(24, 3, '1', 0, 'qwerty', 'Kepoin Event - Ragunan Zoo Application', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=0gxSy7P0a5k', '02.49', 'published', '2015-06-20 14:12:26', '2015-06-20 14:12:26', NULL),
(25, 34, '1', 0, 'qwerty', 'Kepoin Event - N3TS School Exhibition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=eyTEU65RHf4', '06.35', 'published', '2015-06-20 14:13:08', '2015-06-20 14:13:08', NULL),
(26, 34, '1', 0, 'qwerty', 'Kepoin Travel - JAPAN', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', 'qwerty', 'qwerty', 'qwerty', 'qwerty', '<p>qwerty</p>', 'https://www.youtube.com/watch?v=w8-G0nISX9U', '07.21', 'published', '2015-06-21 20:04:36', '2015-06-21 20:04:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

CREATE TABLE IF NOT EXISTS `video_category` (
  `video_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video_category`
--

INSERT INTO `video_category` (`video_category_id`, `image_id`, `title`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 0, 'Documenter', 'Documenter', '2015-06-13 00:00:00', '2015-06-13 00:00:00', NULL),
(2, 0, 'Serba-serbi', 'Serba-serbi', '2015-06-13 00:00:00', '2015-06-13 00:00:00', NULL),
(3, 0, 'Vlog', 'Vlog', '2015-06-13 00:00:00', '2015-06-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE IF NOT EXISTS `video_comment` (
  `video_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
