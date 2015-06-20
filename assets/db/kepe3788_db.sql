# Host: localhost  (Version: 5.6.21)
# Date: 2015-06-20 16:04:21
# Generator: MySQL-Front 5.3  (Build 4.191)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "article"
#

INSERT INTO `article` VALUES (12,2,3,0,'sdfds','sdfsdfs','<p>sdfsdfsd</p>','unpublished','2015-06-13 16:17:54','2015-06-14 04:44:37',NULL);

#
# Structure for table "article_blog"
#

DROP TABLE IF EXISTS `article_blog`;
CREATE TABLE `article_blog` (
  `artcle_blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`artcle_blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_blog"
#

/*!40000 ALTER TABLE `article_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_blog` ENABLE KEYS */;

#
# Structure for table "article_category"
#

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `article_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_category"
#

/*!40000 ALTER TABLE `article_category` DISABLE KEYS */;
INSERT INTO `article_category` VALUES (1,0,'Category 1','CAtegory 1','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL),(2,0,'Category 2','Category 2','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL),(3,0,'Category 3','Category 3','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL);
/*!40000 ALTER TABLE `article_category` ENABLE KEYS */;

#
# Structure for table "article_comment"
#

DROP TABLE IF EXISTS `article_comment`;
CREATE TABLE `article_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_comment"
#

/*!40000 ALTER TABLE `article_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_comment` ENABLE KEYS */;

#
# Structure for table "image"
#

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "image"
#

/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'Slide 1','Kepoabis','Kepoabis','kepoabis','300','assets/img/slider/slider-1.jpg','2015-06-06 07:23:23','2015-06-06 07:23:23',NULL),(2,'kepoabiscom','kepoabiscom','kepoabiscom','kepoabiscom','300','assets/img/slider/slider-3.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL),(3,'kepoabiscom','kepoabiscom','kepoabiscom','kepoabiscom','300','assets/img/slider/slider-2.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL),(4,'kepoabiscom','kepoabiscom','kepoabiscom','kepoabiscom','300','assets/img/slider/slider-4.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

#
# Structure for table "setting"
#

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `contact_address` text,
  `contact_telphone_1` varchar(255) DEFAULT NULL,
  `contact_telphone_2` varchar(255) DEFAULT NULL,
  `contact_fax` varchar(255) DEFAULT NULL,
  `contact_email_1` varchar(255) DEFAULT NULL,
  `contact_email_2` varchar(255) DEFAULT NULL,
  `contact_lat` varchar(255) DEFAULT NULL,
  `contact_long` varchar(255) DEFAULT NULL,
  `footer` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "setting"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (3,1,'Administrator','admin','25d55ad283aa400af464c76d713c07ad','administrator@gmail.com','d697cf246a144e1c5e56a1ed2d91d7fa.jpg','kepoabis','Hai Oyoy','2015-06-06 00:00:00','2015-06-18 21:42:24','2015-06-26 00:00:00'),(32,3,'Herman','Herman','aecd5784f6cc5eadb56c6fbb21f68577','hermanwahyudi@rocketmail.com','4a91a49b776afda15919ce19e8a8e606.jpg','qwerty','qwerty','2015-06-11 19:10:24','2015-06-20 11:02:44',NULL),(34,2,'Syahrul Ramadhan','syahrulramadhan','7e3c888bc51d81e9f092529b0c721135','sramadhan95@gmail.com','78c6d5f7d9b7e79a17b4261867b9baac.jpg','qwerty','qwerty','2015-06-20 11:02:25','2015-06-20 11:02:25',NULL);

#
# Structure for table "user_role_basic"
#

DROP TABLE IF EXISTS `user_role_basic`;
CREATE TABLE `user_role_basic` (
  `user_role_basic_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_name_alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_role_basic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_basic"
#

INSERT INTO `user_role_basic` VALUES (1,'superadmin','Super Administrator',1,'2015-06-20 14:35:20'),(2,'admin','Administrator',1,'2015-06-20 14:35:25'),(3,'crew','Crew',1,'2015-06-20 14:35:31');

#
# Structure for table "user_role_basic_grup"
#

DROP TABLE IF EXISTS `user_role_basic_grup`;
CREATE TABLE `user_role_basic_grup` (
  `user_role_basic_grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_basic_id` int(11) DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_role_basic_grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user_role_basic_grup"
#


#
# Structure for table "user_role_grup"
#

DROP TABLE IF EXISTS `user_role_grup`;
CREATE TABLE `user_role_grup` (
  `user_role_grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_role_grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_grup"
#


#
# Structure for table "user_role_item"
#

DROP TABLE IF EXISTS `user_role_item`;
CREATE TABLE `user_role_item` (
  `user_role_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_grup_id` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_role_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_item"
#


#
# Structure for table "video"
#

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "video"
#

INSERT INTO `video` VALUES (5,'2','qwerty','Like Father Like Daughter','<p>https://www.youtube.com/watch?v=5BedFiOT9b8</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=lbYbFmG7eu0','01.39','published','2015-06-14 04:20:38','2015-06-20 07:57:01',NULL),(6,'1','qwerty','KEPOABIS.COM','<p>wewerwerw</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=TjBvuQ_Qj-0','02.12','published','2015-06-14 04:50:46','2015-06-20 07:56:38',NULL),(7,'3','qwerty','Ace Hardware untuk Indonesia - ACE Hardware Video Competition','<p>adasdas</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=VjN4Xl3DN_I','01.22','published','2015-06-14 04:51:35','2015-06-20 07:55:50',NULL),(8,'1','enjoy, jakarta, kepo, abis','Enjoy Jakarta Enjoy Your Day, Nikmati Caramu','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=dg_IomGAkmU','01.09','published','2015-06-20 07:52:17','2015-06-20 07:52:17',NULL),(9,'1','duit, kepo, abis','Masih Mau Duit Kotor','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=LF0j-DMAxPw','01.09','published','2015-06-20 07:53:14','2015-06-20 07:53:14',NULL),(10,'1','qwerty','Harta, Tahta, & Wanita','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=Y6wUbCjed00','01.09','published','2015-06-20 07:54:22','2015-06-20 07:54:22',NULL),(11,'1','qwery','The Youthpreneur Your future is your choice #VirusWirausaha','<p>qwery</p>','qwery','qwery','qwery','qwery','<p>qwery</p>','https://www.youtube.com/watch?v=icV2JZoqQtY','01.01','published','2015-06-20 14:02:30','2015-06-20 14:02:30',NULL),(12,'1','qwerty','An Impacting Life','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=lkh8mi5phsU','09.57','published','2015-06-20 14:03:04','2015-06-20 14:03:04',NULL),(13,'1','qwerty','This Is My Active Life - Yamaha','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','This Is My Active Life - Yamaha','00.57','published','2015-06-20 14:03:42','2015-06-20 14:03:42',NULL),(14,'1','qwerty','Jeruji Besi','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=T0O-zde6U9I','11.35','published','2015-06-20 14:04:41','2015-06-20 14:04:41',NULL),(15,'1','qwerty','Kepoin Kuliner - Takeya The Japanese Restaurant, Bintaro','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','Kepoin Kuliner - Takeya The Japanese Restaurant, Bintaro','05.10','published','2015-06-20 14:05:18','2015-06-20 14:05:18',NULL),(16,'1','qwerty','Kepoin Event - Seminar & Talk Show Pra Nikah KTMU','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=w3Oth_jpEiA','05.06','published','2015-06-20 14:06:59','2015-06-20 14:06:59',NULL),(17,'1','qwerty','Tips Bertamu Saat Lebaran','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=6uxLckdtomI','06.45','published','2015-06-20 14:07:41','2015-06-20 14:07:41',NULL),(18,'1','qwerty','Tips Berpergian Jauh','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=WEKsZNOV0D4','01.57','published','2015-06-20 14:08:29','2015-06-20 14:08:29',NULL),(19,'1','qwerty','FORMASI 2015','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=1rhDrHn-O_k','01.26','published','2015-06-20 14:09:08','2015-06-20 14:09:08',NULL),(20,'1','qwerty','Video Promosi Formasi 2015 (ver.2)','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=82I_3faUhpc','01.20','published','2015-06-20 14:09:43','2015-06-20 14:09:43',NULL),(21,'1','qwerty','Susu 18 Pasang (Intro KepoAbis.com) - KepoinVlog #1','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=uz91JYDC6GE','03.51','published','2015-06-20 14:10:34','2015-06-20 14:10:34',NULL),(22,'1','qwerty','Kepoin Event - FORMASI 2015 MAN 4 Jakarta','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=ADP679lVYsk','05.46','published','2015-06-20 14:11:05','2015-06-20 14:11:05',NULL),(23,'1','qwerty','Video Promosi KOMPAS','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=bUGZ1LG5T4s','00.47','published','2015-06-20 14:11:44','2015-06-20 14:11:44',NULL),(24,'1','qwerty','Kepoin Event - Ragunan Zoo Application','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=0gxSy7P0a5k','02.49','published','2015-06-20 14:12:26','2015-06-20 14:12:26',NULL),(25,'1','qwerty','Kepoin Event - N3TS School Exhibition','<p>qwerty</p>','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=eyTEU65RHf4','06.35','published','2015-06-20 14:13:08','2015-06-20 14:13:08',NULL);

#
# Structure for table "video_category"
#

DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `video_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "video_category"
#

/*!40000 ALTER TABLE `video_category` DISABLE KEYS */;
INSERT INTO `video_category` VALUES (1,0,'Documenter','Documenter','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(2,0,'Serba-serbi','Serba-serbi','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(3,0,'Vlog','Vlog','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL);
/*!40000 ALTER TABLE `video_category` ENABLE KEYS */;

#
# Structure for table "video_comment"
#

DROP TABLE IF EXISTS `video_comment`;
CREATE TABLE `video_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "video_comment"
#

/*!40000 ALTER TABLE `video_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_comment` ENABLE KEYS */;
