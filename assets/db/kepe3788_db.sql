-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 05:15 AM
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
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_category_id`, `user_id`, `image_id`, `title`, `tag`, `summary`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(12, 2, 3, 0, 'sdfds', 'sdfsdfs', '<p>sdfsdfsd</p>', 'unpublished', '2015-06-13 16:17:54', '2015-06-14 04:44:37', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

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
(1, 0, 'Category 1', 'CAtegory 1', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL),
(2, 0, 'Category 2', 'Category 2', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL),
(3, 0, 'Category 3', 'Category 3', '2015-06-12 00:00:00', '2015-06-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE IF NOT EXISTS `article_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `title`, `tag`, `body`, `type`, `size`, `path`, `created_date`, `modified_date`, `deleted_date`) VALUES
(1, 'Slide 1', 'Kepoabis', 'Kepoabis', 'kepoabis', '300', 'assets/img/slider/slider-1.jpg', '2015-06-06 07:23:23', '2015-06-06 07:23:23', NULL),
(2, 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', '300', 'assets/img/slider/slider-3.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL),
(3, 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', '300', 'assets/img/slider/slider-2.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL),
(4, 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', 'kepoabiscom', '300', 'assets/img/slider/slider-4.jpg', '2015-06-06 08:21:22', '2015-06-06 08:21:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(25) NOT NULL DEFAULT '',
  `user_name` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `user_role` enum('superadmin','admin','crew') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama_lengkap`, `user_name`, `password`, `user_role`, `email`, `image`, `position`, `body`, `created_date`, `modified_date`, `deleted_date`) VALUES
(3, 'Administrator', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin', 'administrator@gmail.com', 'd697cf246a144e1c5e56a1ed2d91d7fa.jpg', 'kepoabis', 'Hai Oyoy', '2015-06-06 00:00:00', '2015-06-13 02:02:36', '2015-06-26 00:00:00'),
(11, 'jaka', 'jaka', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin', 'hermanwahyudi@rocketmail.com', '02033c72364772984452b3e6b0d28195.jpg', 'asdas', '', '2015-06-08 18:37:22', '2015-06-11 18:28:17', NULL),
(20, 'asdasd', 'sdasdas', 'b8c5943d6849d0f9e7615faa57093d49', 'crew', 'hermanwahyudi@rocketmail.com', '410193eb50061dd9c0c2b35ac578912d.jpg', '', '', '2015-06-09 16:42:42', '2015-06-11 18:42:37', NULL),
(21, 'asdas', 'sdas', 'a8f5f167f44f4964e6c998dee827110c', 'superadmin', 'hermanwahyudi@rocketmail.com', NULL, '', '', '2015-06-09 18:15:25', '2015-06-09 18:15:25', NULL),
(26, 'JKKKKKK', 'dsdasd', 'b0c44dc7bd2ecec1ccfd77f4bfbd35cc', 'superadmin', 'hermanwahyudi@rocketmail.com', '0d04c5ad49c0df24404fafd56735f824.jpg', '', '', '2015-06-09 19:48:56', '2015-06-11 18:32:50', NULL),
(28, 'asdasda', 'dsdasdsadas', '6c0cbf5029aed0af395ac4b864c6b095', 'admin', 'hermanwahyudi@rocketmail.com', '5844121f9df8a1f9183c0b7a96af89a1.jpg', 'asdas', '', '2015-06-09 20:02:46', '2015-06-11 19:09:49', NULL),
(30, 'ffff', 'ffff', 'ece926d8c0356205276a45266d361161', 'crew', 'hermanwahyudi@rocketmail.com', '1c68e47b06400e93d3f72ed44d632b6a.jpg', '', '', '2015-06-11 16:47:26', '2015-06-11 19:07:49', NULL),
(32, 'Herman', 'Herman', 'aecd5784f6cc5eadb56c6fbb21f68577', 'crew', 'hermanwahyudi@rocketmail.com', '4a91a49b776afda15919ce19e8a8e606.jpg', 'asdasdas', 'sdasd', '2015-06-11 19:10:24', '2015-06-11 19:12:16', NULL),
(33, 'testuuu', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'crew', 'hermanwahyudi@rocketmail.com', 'default.jpg', '', '', '2015-06-13 05:16:25', '2015-06-14 04:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_category_id` varchar(50) NOT NULL DEFAULT '',
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
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=8 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_category_id`, `tag`, `title`, `description`, `story_ide`, `screenwriter`, `film_director`, `cameramen`, `artist`, `url`, `duration`, `status`, `created_date`, `modified_date`, `deleted_date`) VALUES
(5, '2', 'asdasda', 'dasdas', '<p>https://www.youtube.com/watch?v=5BedFiOT9b8</p>', 'sadas', 'asdas', 'asdasda', 'asdasd', '<p>https://www.youtube.com/watch?v=5BedFiOT9b8</p>', 'https://www.youtube.com/watch?v=71tSzPkUgv0', 'asdas', 'unpublished', '2015-06-14 04:20:38', '2015-06-14 04:44:15', NULL),
(6, '1', 'asdasd', 'asdasda', '<p>wewerwerw</p>', 'asdasd', 'wasdasdas', 'asdasda', 'asdas', '<p>adsasdas</p>', 'https://www.youtube.com/watch?v=71tSzPkUgv0', 'aweaeq', 'unpublished', '2015-06-14 04:50:46', '2015-06-14 04:51:10', NULL),
(7, '3', 'asdasdas', 'dasdasda', '<p>adasdas</p>', 'sdasdas', 'adsasd', 'asdasd', 'asdasd', '<p>asdasda</p>', 'https://www.youtube.com/watch?v=71tSzPkUgv0', 'asdasd', 'unpublished', '2015-06-14 04:51:35', '2015-06-14 04:51:35', NULL);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
