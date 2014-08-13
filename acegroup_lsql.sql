-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2014 at 06:20 AM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acegroup_lsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `ace_groups`
--

CREATE TABLE IF NOT EXISTS `ace_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ace_groups`
--

INSERT INTO `ace_groups` (`id`, `group`) VALUES
(1, 'Administrator'),
(5, 'Super User');

-- --------------------------------------------------------

--
-- Table structure for table `ace_groups_roles`
--

CREATE TABLE IF NOT EXISTS `ace_groups_roles` (
  `group_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `fk_ace_groups_roles_ace_roles1_idx` (`role_id`),
  KEY `fk_ace_groups_roles_ace_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ace_groups_roles`
--

INSERT INTO `ace_groups_roles` (`group_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 53),
(1, 55),
(1, 56),
(1, 57),
(1, 59),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 7),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 53),
(5, 55),
(5, 56),
(5, 57),
(5, 59),
(5, 60),
(5, 61),
(5, 62);

-- --------------------------------------------------------

--
-- Table structure for table `ace_levels`
--

CREATE TABLE IF NOT EXISTS `ace_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ace_levels`
--

INSERT INTO `ace_levels` (`id`, `name`) VALUES
(1, 'Gold Membership'),
(2, 'Elite Gold'),
(3, 'Platinum'),
(4, 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `ace_password_reminders`
--

CREATE TABLE IF NOT EXISTS `ace_password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ace_password_reminders`
--

INSERT INTO `ace_password_reminders` (`email`, `token`, `created_at`) VALUES
('customer14@gmail.com', 'd5e841cb4e0c7c6382f2ffae7549b1b2d6295508', '2013-11-25 09:12:51'),
('philweb.programmer49@gmail.com', '4084fca72db56c6a1edec8794588e5fb51cedb43', '2014-01-07 19:38:01'),
('philweb.programmer49@gmail.com', 'c947a49c5109b930a5ce08fd0734ff6e85303826', '2014-01-07 19:39:19'),
('philweb.programmer49@gmail.com', 'bdc2afe4b6b4aebe7fd19b9f221627062a420165', '2014-01-07 19:40:33'),
('delmar@lightmedia.com.au', '109d0fc9f16dc67af1b301191f9e2cb5f80d4cf1', '2014-01-10 22:10:39'),
('michael@lightmedia.com.au', 'ba098bf7a8c52c1dca56e5d2573a6102c554b0f9', '2014-05-21 18:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `ace_postmeta`
--

CREATE TABLE IF NOT EXISTS `ace_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_ace_postmeta_ace_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3624 ;

--
-- Dumping data for table `ace_postmeta`
--

INSERT INTO `ace_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(313, 48, 'attachment_title', ''),
(314, 48, 'attachment_type', 'post'),
(315, 48, 'attachment', '29'),
(316, 48, 'page_title', 'asdfasdf'),
(317, 48, 'page_meta_description', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui'),
(318, 48, 'notes', 'asdfasdfasdf'),
(1872, 506, 'page_title', '1323'),
(1873, 506, 'page_meta_description', '12 1212 12 123312'),
(1874, 506, 'notes', ''),
(2572, 641, 'page_title', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2573, 641, 'page_meta_description', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2690, 657, 'page_title', 'Treatments & Services '),
(2691, 657, 'page_meta_description', 'Treatments & Services '),
(2929, 657, 'page_template', 'treatments-services-template'),
(2954, 506, 'attachment_title', ''),
(2955, 506, 'attachment_type', 'post'),
(2956, 506, 'attachment', '618'),
(2963, 710, 'page_title', 'Contact us'),
(2964, 710, 'page_meta_description', 'Dsd'),
(3017, 727, 'page_title', ''),
(3018, 727, 'page_meta_description', ''),
(3028, 813, 'banner_url', ''),
(3029, 813, 'button_text', 'Read More <span>Discover this beautifully designed facility</span>'),
(3030, 813, 'banner_target', NULL),
(3032, 817, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/banner-a.jpg","type":"image\\/jpeg","size":177064,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/banner-a.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/banner-a.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/banner-a.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/banner-a.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/banner-a.jpg"}}'),
(3047, 821, 'page_title', ''),
(3048, 821, 'page_meta_description', ''),
(3049, 824, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/people-1.jpg","type":"image\\/jpeg","size":16886,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/people-1.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/people-1.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/people-1.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/people-1.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/people-1.jpg"}}'),
(3053, 823, 'page_title', ''),
(3054, 823, 'page_meta_description', ''),
(3055, 826, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/people-2.jpg","type":"image\\/jpeg","size":5016,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/people-2.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/people-2.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/people-2.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/people-2.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/people-2.jpg"}}'),
(3056, 825, 'attachment_title', ''),
(3057, 825, 'attachment_type', 'post'),
(3058, 825, 'attachment', '826'),
(3059, 825, 'page_title', ''),
(3060, 825, 'page_meta_description', ''),
(3061, 828, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/avatar.jpg","type":"image\\/jpeg","size":4270,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/avatar.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/avatar.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/avatar.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/avatar.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/avatar.jpg"}}'),
(3062, 827, 'attachment_title', ''),
(3063, 827, 'attachment_type', 'post'),
(3064, 827, 'attachment', '828'),
(3065, 827, 'page_title', ''),
(3066, 827, 'page_meta_description', ''),
(3067, 830, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/avatar2.jpg","type":"image\\/jpeg","size":4203,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/avatar2.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/avatar2.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/avatar2.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/avatar2.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/avatar2.jpg"}}'),
(3068, 829, 'attachment_title', ''),
(3069, 829, 'attachment_type', 'post'),
(3070, 829, 'attachment', '830'),
(3071, 829, 'page_title', ''),
(3072, 829, 'page_meta_description', ''),
(3073, 832, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/avatar3.jpg","type":"image\\/jpeg","size":4795,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/avatar3.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/avatar3.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/avatar3.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/avatar3.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/avatar3.jpg"}}'),
(3084, 835, 'attachment_title', ''),
(3085, 835, 'attachment_type', 'post'),
(3086, 835, 'attachment', '832'),
(3087, 835, 'page_title', ''),
(3088, 835, 'page_meta_description', ''),
(3089, 814, 'page_title', ''),
(3090, 814, 'page_meta_description', ''),
(3091, 836, 'page_title', 'test'),
(3092, 836, 'page_meta_description', 'test'),
(3093, 836, 'page_template', 'default'),
(3094, 837, 'banner_url', ''),
(3095, 837, 'button_text', 'About Us <span>The Ace way</span>'),
(3096, 837, 'banner_target', NULL),
(3100, 838, '_menu_item_object_id', NULL),
(3101, 838, '_menu_item_object', 'custom'),
(3102, 838, '_menu_item_type', 'custom'),
(3103, 838, '_menu_item_url', '#'),
(3132, 838, '_menu_item_classes', 's:0:"";'),
(3133, 838, '_menu_item_target', '0'),
(3148, 846, 'page_template', 'sidebar-right'),
(3149, 846, 'page_title', ''),
(3150, 846, 'page_meta_description', ''),
(3151, 847, 'page_template', 'contact'),
(3152, 847, 'page_title', ''),
(3153, 847, 'page_meta_description', ''),
(3154, 848, 'page_template', 'default'),
(3155, 848, 'page_title', ''),
(3156, 848, 'page_meta_description', ''),
(3157, 849, 'page_template', 'sidebar-right'),
(3158, 849, 'page_title', ''),
(3159, 849, 'page_meta_description', ''),
(3160, 814, 'page_template', 'our-people'),
(3161, 850, '_menu_item_object_id', '847'),
(3162, 850, '_menu_item_object', 'page'),
(3163, 850, '_menu_item_type', 'post'),
(3164, 850, '_menu_item_url', 'http://'),
(3165, 850, '_menu_item_classes', 's:0:"";'),
(3166, 850, '_menu_item_target', '0'),
(3167, 851, '_menu_item_object_id', '814'),
(3168, 851, '_menu_item_object', 'page'),
(3169, 851, '_menu_item_type', 'post'),
(3170, 851, '_menu_item_url', 'http://'),
(3171, 851, '_menu_item_classes', 's:0:"";'),
(3172, 851, '_menu_item_target', '0'),
(3173, 852, '_menu_item_object_id', '849'),
(3174, 852, '_menu_item_object', 'page'),
(3175, 852, '_menu_item_type', 'post'),
(3176, 852, '_menu_item_url', 'http://'),
(3177, 852, '_menu_item_classes', 's:0:"";'),
(3178, 852, '_menu_item_target', '0'),
(3179, 853, 'page_template', 'default'),
(3180, 853, 'page_title', ''),
(3181, 853, 'page_meta_description', ''),
(3182, 854, '_menu_item_object_id', '853'),
(3183, 854, '_menu_item_object', 'page'),
(3184, 854, '_menu_item_type', 'post'),
(3185, 854, '_menu_item_url', 'http://'),
(3186, 854, '_menu_item_classes', 's:0:"";'),
(3187, 854, '_menu_item_target', '0'),
(3188, 855, 'page_template', 'default'),
(3189, 855, 'page_title', ''),
(3190, 855, 'page_meta_description', ''),
(3191, 856, '_menu_item_object_id', '855'),
(3192, 856, '_menu_item_object', 'page'),
(3193, 856, '_menu_item_type', 'post'),
(3194, 856, '_menu_item_url', 'http://'),
(3195, 856, '_menu_item_classes', 's:0:"";'),
(3196, 856, '_menu_item_target', '0'),
(3197, 857, 'page_template', 'default'),
(3198, 857, 'page_title', ''),
(3199, 857, 'page_meta_description', ''),
(3200, 858, '_menu_item_object_id', '857'),
(3201, 858, '_menu_item_object', 'page'),
(3202, 858, '_menu_item_type', 'post'),
(3203, 858, '_menu_item_url', 'http://'),
(3204, 858, '_menu_item_classes', 's:0:"";'),
(3205, 858, '_menu_item_target', '0'),
(3206, 859, 'page_template', 'default'),
(3207, 859, 'page_title', ''),
(3208, 859, 'page_meta_description', ''),
(3215, 861, '_widget_item_object_id', NULL),
(3216, 861, '_widget_item_object', 'custom'),
(3217, 861, '_widget_item_type', 'custom'),
(3218, 861, '_widget_item_classes', 'N;'),
(3219, 861, '_widget_item_target', '0'),
(3220, 861, '_widget_item_url', 'http://'),
(3229, 865, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/16\\/images.jpeg","type":"image\\/jpeg","size":7115,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/16\\/post-thumbnail\\/images.jpeg","large":"media\\/uploads\\/2014\\/16\\/large\\/images.jpeg","listing-thumbnail":"media\\/uploads\\/2014\\/16\\/listing-thumbnail\\/images.jpeg","thumbnail":"media\\/uploads\\/2014\\/16\\/thumbnail\\/images.jpeg","medium":"media\\/uploads\\/2014\\/16\\/medium\\/images.jpeg","project_thumbnail":"media\\/uploads\\/2014\\/16\\/project_thumbnail\\/images.jpeg"}}'),
(3233, 864, 'page_title', ''),
(3234, 864, 'page_meta_description', ''),
(3239, 867, 'page_title', ''),
(3240, 867, 'page_meta_description', ''),
(3248, 869, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/16\\/android-robot-sign-234.jpeg","type":"image\\/jpeg","size":82730,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/16\\/post-thumbnail\\/android-robot-sign-234.jpeg","large":"media\\/uploads\\/2014\\/16\\/large\\/android-robot-sign-234.jpeg","listing-thumbnail":"media\\/uploads\\/2014\\/16\\/listing-thumbnail\\/android-robot-sign-234.jpeg","thumbnail":"media\\/uploads\\/2014\\/16\\/thumbnail\\/android-robot-sign-234.jpeg","medium":"media\\/uploads\\/2014\\/16\\/medium\\/android-robot-sign-234.jpeg","project_thumbnail":"media\\/uploads\\/2014\\/16\\/project_thumbnail\\/android-robot-sign-234.jpeg"}}'),
(3258, 727, 'page_template', 'default'),
(3265, 872, 'page_template', 'sidebar-right'),
(3266, 872, 'page_title', ''),
(3267, 872, 'page_meta_description', ''),
(3268, 873, 'page_template', 'sidebar-right'),
(3269, 873, 'page_title', 'Electrical Infrastructure'),
(3270, 873, 'page_meta_description', ''),
(3271, 874, 'page_template', 'sidebar-right'),
(3272, 874, 'page_title', 'Ace Environment'),
(3273, 874, 'page_meta_description', ''),
(3274, 875, 'page_template', 'sidebar-right'),
(3275, 875, 'page_title', ''),
(3276, 875, 'page_meta_description', ''),
(3277, 876, 'page_template', 'sidebar-right'),
(3278, 876, 'page_title', ''),
(3279, 876, 'page_meta_description', ''),
(3280, 877, 'page_template', 'sidebar-right'),
(3281, 877, 'page_title', 'Ace Water Services'),
(3282, 877, 'page_meta_description', ''),
(3283, 878, 'attachment_title', ''),
(3284, 878, 'attachment_type', 'post'),
(3285, 878, 'attachment', '820'),
(3286, 878, 'banner_url', ''),
(3287, 878, 'button_text', ''),
(3288, 878, 'banner_target', NULL),
(3289, 879, 'banner_url', 'http://acegroup.lightmedia.com.au/projects'),
(3290, 879, 'button_text', ''),
(3291, 879, 'banner_target', NULL),
(3292, 881, 'page_template', 'default'),
(3293, 881, 'page_title', ''),
(3294, 881, 'page_meta_description', ''),
(3295, 880, 'banner_url', 'http://acegroup.lightmedia.com.au/our-services'),
(3296, 880, 'button_text', ''),
(3297, 880, 'banner_target', NULL),
(3301, 882, '_widget_item_object_id', NULL),
(3302, 882, '_widget_item_object', 'custom'),
(3303, 882, '_widget_item_type', 'custom'),
(3304, 882, '_widget_item_classes', 'N;'),
(3305, 882, '_widget_item_target', '0'),
(3306, 882, '_widget_item_url', 'http://'),
(3307, 883, 'page_title', ''),
(3308, 883, 'page_meta_description', ''),
(3309, 884, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/19\\/people-3.jpg","type":"image\\/jpeg","size":7912,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/19\\/post-thumbnail\\/people-3.jpg","large":"media\\/uploads\\/2014\\/19\\/large\\/people-3.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/19\\/listing-thumbnail\\/people-3.jpg","thumbnail":"media\\/uploads\\/2014\\/19\\/thumbnail\\/people-3.jpg","medium":"media\\/uploads\\/2014\\/19\\/medium\\/people-3.jpg","project_thumbnail":"media\\/uploads\\/2014\\/19\\/project_thumbnail\\/people-3.jpg"}}'),
(3310, 883, 'attachment_title', ''),
(3311, 883, 'attachment_type', 'post'),
(3312, 883, 'attachment', '884'),
(3313, 885, 'page_title', 'Simon Cock'),
(3314, 885, 'page_meta_description', ''),
(3315, 886, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/19\\/people-4.jpg","type":"image\\/jpeg","size":6850,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/19\\/post-thumbnail\\/people-4.jpg","large":"media\\/uploads\\/2014\\/19\\/large\\/people-4.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/19\\/listing-thumbnail\\/people-4.jpg","thumbnail":"media\\/uploads\\/2014\\/19\\/thumbnail\\/people-4.jpg","medium":"media\\/uploads\\/2014\\/19\\/medium\\/people-4.jpg","project_thumbnail":"media\\/uploads\\/2014\\/19\\/project_thumbnail\\/people-4.jpg"}}'),
(3316, 885, 'attachment_title', ''),
(3317, 885, 'attachment_type', 'post'),
(3318, 885, 'attachment', '886'),
(3319, 888, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/19\\/people-5.jpg","type":"image\\/jpeg","size":6672,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/19\\/post-thumbnail\\/people-5.jpg","large":"media\\/uploads\\/2014\\/19\\/large\\/people-5.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/19\\/listing-thumbnail\\/people-5.jpg","thumbnail":"media\\/uploads\\/2014\\/19\\/thumbnail\\/people-5.jpg","medium":"media\\/uploads\\/2014\\/19\\/medium\\/people-5.jpg","project_thumbnail":"media\\/uploads\\/2014\\/19\\/project_thumbnail\\/people-5.jpg"}}'),
(3323, 887, 'page_title', 'Warren Higgs'),
(3324, 887, 'page_meta_description', ''),
(3327, 890, '_widget_item_object_id', NULL),
(3328, 890, '_widget_item_object', 'custom'),
(3329, 890, '_widget_item_type', 'custom'),
(3330, 890, '_widget_item_classes', 'N;'),
(3331, 890, '_widget_item_target', '0'),
(3332, 890, '_widget_item_url', 'http://'),
(3338, 893, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/22\\/3d-building-construction-image_1600x1200_78613.jpg","type":"image\\/jpeg","size":92113,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/22\\/post-thumbnail\\/3d-building-construction-image_1600x1200_78613.jpg","large":"media\\/uploads\\/2014\\/22\\/large\\/3d-building-construction-image_1600x1200_78613.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/22\\/listing-thumbnail\\/3d-building-construction-image_1600x1200_78613.jpg","medium":"media\\/uploads\\/2014\\/22\\/medium\\/3d-building-construction-image_1600x1200_78613.jpg","project_thumbnail":"media\\/uploads\\/2014\\/22\\/project_thumbnail\\/3d-building-construction-image_1600x1200_78613.jpg","thumbnail":"media\\/uploads\\/2014\\/22\\/thumbnail\\/3d-building-construction-image_1600x1200_78613.jpg"}}'),
(3339, 864, 'attachment_title', ''),
(3340, 864, 'attachment_type', 'post'),
(3341, 864, 'attachment', '893'),
(3342, 894, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/22\\/337072.jpeg","type":"image\\/jpeg","size":151118,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/22\\/post-thumbnail\\/337072.jpeg","large":"media\\/uploads\\/2014\\/22\\/large\\/337072.jpeg","listing-thumbnail":"media\\/uploads\\/2014\\/22\\/listing-thumbnail\\/337072.jpeg","medium":"media\\/uploads\\/2014\\/22\\/medium\\/337072.jpeg","project_thumbnail":"media\\/uploads\\/2014\\/22\\/project_thumbnail\\/337072.jpeg","thumbnail":"media\\/uploads\\/2014\\/22\\/thumbnail\\/337072.jpeg"}}'),
(3343, 867, 'attachment_title', ''),
(3344, 867, 'attachment_type', 'post'),
(3345, 867, 'attachment', '894'),
(3346, 821, 'attachment_title', ''),
(3347, 821, 'attachment_type', 'post'),
(3348, 821, 'attachment', '894'),
(3355, 895, 'page_title', 'project'),
(3356, 895, 'page_meta_description', ''),
(3366, 898, 'page_title', ''),
(3367, 898, 'page_meta_description', ''),
(3374, 901, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/27\\/policy-5.jpg","type":"image\\/jpeg","size":9206,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/27\\/post-thumbnail\\/policy-5.jpg","large":"media\\/uploads\\/2014\\/27\\/large\\/policy-5.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/27\\/listing-thumbnail\\/policy-5.jpg","medium":"media\\/uploads\\/2014\\/27\\/medium\\/policy-5.jpg","project_thumbnail":"media\\/uploads\\/2014\\/27\\/project_thumbnail\\/policy-5.jpg","thumbnail":"media\\/uploads\\/2014\\/27\\/thumbnail\\/policy-5.jpg"}}'),
(3375, 900, 'attachment_title', ''),
(3376, 900, 'attachment_type', 'post'),
(3377, 900, 'attachment', '901'),
(3378, 900, 'page_title', 'Quality Policy'),
(3379, 900, 'page_meta_description', ''),
(3380, 903, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/27\\/policy-4.jpg","type":"image\\/jpeg","size":10510,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/27\\/post-thumbnail\\/policy-4.jpg","large":"media\\/uploads\\/2014\\/27\\/large\\/policy-4.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/27\\/listing-thumbnail\\/policy-4.jpg","medium":"media\\/uploads\\/2014\\/27\\/medium\\/policy-4.jpg","project_thumbnail":"media\\/uploads\\/2014\\/27\\/project_thumbnail\\/policy-4.jpg","thumbnail":"media\\/uploads\\/2014\\/27\\/thumbnail\\/policy-4.jpg"}}'),
(3384, 902, 'page_title', ' Health & Safety Policy'),
(3385, 902, 'page_meta_description', ''),
(3386, 904, 'page_template', 'policies'),
(3387, 904, 'page_title', 'Policies'),
(3388, 904, 'page_meta_description', ''),
(3389, 905, '_widget_item_object_id', NULL),
(3390, 905, '_widget_item_object', 'custom'),
(3391, 905, '_widget_item_type', 'custom'),
(3392, 906, '_widget_item_object_id', NULL),
(3393, 906, '_widget_item_object', 'custom'),
(3394, 906, '_widget_item_type', 'custom'),
(3395, 905, '_widget_item_classes', 'N;'),
(3396, 905, '_widget_item_target', '0'),
(3397, 905, '_widget_item_url', 'http://'),
(3398, 906, '_widget_item_classes', 'N;'),
(3399, 906, '_widget_item_target', '0'),
(3400, 906, '_widget_item_url', 'http://'),
(3401, 907, '_widget_item_object_id', NULL),
(3402, 907, '_widget_item_object', 'custom'),
(3403, 907, '_widget_item_type', 'custom'),
(3404, 907, '_widget_item_classes', 'N;'),
(3405, 907, '_widget_item_target', '0'),
(3406, 907, '_widget_item_url', 'http://'),
(3409, 911, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/27\\/policy-4 (1).jpg","type":"image\\/jpeg","size":10510,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/27\\/post-thumbnail\\/policy-4 (1).jpg","large":"media\\/uploads\\/2014\\/27\\/large\\/policy-4 (1).jpg","listing-thumbnail":"media\\/uploads\\/2014\\/27\\/listing-thumbnail\\/policy-4 (1).jpg","medium":"media\\/uploads\\/2014\\/27\\/medium\\/policy-4 (1).jpg","project_thumbnail":"media\\/uploads\\/2014\\/27\\/project_thumbnail\\/policy-4 (1).jpg","thumbnail":"media\\/uploads\\/2014\\/27\\/thumbnail\\/policy-4 (1).jpg"}}'),
(3410, 902, 'attachment_title', ''),
(3411, 902, 'attachment_type', 'post'),
(3412, 902, 'attachment', '911'),
(3422, 898, 'attachment_title', ''),
(3423, 898, 'attachment_type', 'post'),
(3424, 898, 'attachment', '894'),
(3425, 912, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/28\\/2047464.jpg","type":"image\\/jpeg","size":479015,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/28\\/post-thumbnail\\/2047464.jpg","large":"media\\/uploads\\/2014\\/28\\/large\\/2047464.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/28\\/listing-thumbnail\\/2047464.jpg","medium":"media\\/uploads\\/2014\\/28\\/medium\\/2047464.jpg","project_thumbnail":"media\\/uploads\\/2014\\/28\\/project_thumbnail\\/2047464.jpg","thumbnail":"media\\/uploads\\/2014\\/28\\/thumbnail\\/2047464.jpg"}}'),
(3435, 914, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/28\\/rightSlide.jpg","type":"image\\/jpeg","size":21735,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/28\\/post-thumbnail\\/rightSlide.jpg","large":"media\\/uploads\\/2014\\/28\\/large\\/rightSlide.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/28\\/listing-thumbnail\\/rightSlide.jpg","medium":"media\\/uploads\\/2014\\/28\\/medium\\/rightSlide.jpg","project_thumbnail":"media\\/uploads\\/2014\\/28\\/project_thumbnail\\/rightSlide.jpg","thumbnail":"media\\/uploads\\/2014\\/28\\/thumbnail\\/rightSlide.jpg"}}'),
(3436, 915, 'attachment_title', ''),
(3437, 915, 'attachment_type', 'post'),
(3438, 915, 'attachment', '914'),
(3439, 915, 'page_template', 'default'),
(3440, 915, 'page_title', ''),
(3441, 915, 'page_meta_description', ''),
(3442, 916, '_menu_item_object_id', NULL),
(3443, 916, '_menu_item_object', 'custom'),
(3444, 916, '_menu_item_type', 'custom'),
(3445, 916, '_menu_item_url', 'http://acegroup.lightmedia.com.au/policies'),
(3450, 916, '_menu_item_classes', 's:0:"";'),
(3451, 916, '_menu_item_target', '0'),
(3457, 921, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/28\\/OH&S at its best.jpg","type":"image\\/jpeg","size":80358,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/28\\/post-thumbnail\\/OH&S at its best.jpg","large":"media\\/uploads\\/2014\\/28\\/large\\/OH&S at its best.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/28\\/listing-thumbnail\\/OH&S at its best.jpg","medium":"media\\/uploads\\/2014\\/28\\/medium\\/OH&S at its best.jpg","project_thumbnail":"media\\/uploads\\/2014\\/28\\/project_thumbnail\\/OH&S at its best.jpg","thumbnail":"media\\/uploads\\/2014\\/28\\/thumbnail\\/OH&S at its best.jpg"}}'),
(3461, 921, 'attachment_image_alt', 'Alt Text'),
(3477, 895, 'attachment_title', ''),
(3478, 895, 'attachment_type', 'post'),
(3479, 895, 'attachment', '921'),
(3480, 869, 'attachment_image_alt', ''),
(3481, 923, 'attachment_title', ''),
(3482, 923, 'attachment_type', 'post'),
(3483, 923, 'attachment', '869'),
(3487, 924, 'page_title', ''),
(3488, 924, 'page_meta_description', ''),
(3494, 925, 'page_title', ''),
(3495, 925, 'page_meta_description', ''),
(3496, 925, 'attachment_title', ''),
(3497, 925, 'attachment_type', 'post'),
(3498, 925, 'attachment', '832'),
(3499, 926, 'attachment_title', ''),
(3500, 926, 'attachment_type', 'post'),
(3501, 926, 'attachment', '901'),
(3502, 926, 'page_title', ''),
(3503, 926, 'page_meta_description', ''),
(3504, 927, '_menu_item_object_id', NULL),
(3505, 927, '_menu_item_object', 'custom'),
(3506, 927, '_menu_item_type', 'custom'),
(3507, 927, '_menu_item_url', 'http://acegroup.lightmedia.com.au/'),
(3508, 928, '_menu_item_object_id', NULL),
(3509, 928, '_menu_item_object', 'custom'),
(3510, 928, '_menu_item_type', 'custom'),
(3511, 928, '_menu_item_url', 'http://acegroup.lightmedia.com.au/Policies'),
(3512, 929, '_menu_item_object_id', NULL),
(3513, 929, '_menu_item_object', 'custom'),
(3514, 929, '_menu_item_type', 'custom'),
(3515, 929, '_menu_item_url', 'http://acegroup.lightmedia.com.au/company'),
(3516, 930, '_menu_item_object_id', NULL),
(3517, 930, '_menu_item_object', 'custom'),
(3518, 930, '_menu_item_type', 'custom'),
(3519, 930, '_menu_item_url', 'http://acegroup.lightmedia.com.au/tenders'),
(3520, 931, '_menu_item_object_id', NULL),
(3521, 931, '_menu_item_object', 'custom'),
(3522, 931, '_menu_item_type', 'custom'),
(3523, 931, '_menu_item_url', 'http://acegroup.lightmedia.com.au/contact'),
(3524, 927, '_menu_item_classes', 's:0:"";'),
(3525, 927, '_menu_item_target', '0'),
(3526, 928, '_menu_item_classes', 's:0:"";'),
(3527, 928, '_menu_item_target', '0'),
(3528, 929, '_menu_item_classes', 's:0:"";'),
(3529, 929, '_menu_item_target', '0'),
(3530, 930, '_menu_item_classes', 's:0:"";'),
(3531, 930, '_menu_item_target', '0'),
(3532, 931, '_menu_item_classes', 's:0:"";'),
(3533, 931, '_menu_item_target', '0'),
(3534, 932, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/img_0597.jpg","type":"image\\/jpeg","size":1066855,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/img_0597.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/img_0597.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/img_0597.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/img_0597.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/img_0597.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/img_0597.jpg"}}'),
(3535, 933, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/Docklands.jpg","type":"image\\/jpeg","size":1121392,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/Docklands.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/Docklands.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/Docklands.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/Docklands.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/Docklands.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/Docklands.jpg"}}'),
(3536, 934, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/ace.jpg","type":"image\\/jpeg","size":4560,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/ace.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/ace.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/ace.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/ace.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/ace.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/ace.jpg"}}'),
(3537, 935, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/sidebar-img.jpg","type":"image\\/jpeg","size":20424,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/sidebar-img.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/sidebar-img.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/sidebar-img.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/sidebar-img.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/sidebar-img.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/sidebar-img.jpg"}}'),
(3538, 936, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/HIG01L.jpg","type":"image\\/jpeg","size":59122,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/HIG01L.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/HIG01L.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/HIG01L.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/HIG01L.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/HIG01L.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/HIG01L.jpg"}}'),
(3539, 936, 'attachment_image_alt', ''),
(3540, 937, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/Warren Higgs.jpg","type":"image\\/jpeg","size":59320,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/Warren Higgs.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/Warren Higgs.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/Warren Higgs.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/Warren Higgs.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/Warren Higgs.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/Warren Higgs.jpg"}}'),
(3541, 937, 'attachment_image_alt', ''),
(3542, 887, 'attachment_title', ''),
(3543, 887, 'attachment_type', 'post'),
(3544, 887, 'attachment', '937'),
(3552, 941, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/Mornington.jpg","type":"image\\/jpeg","size":402614,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/Mornington.jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/Mornington.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/Mornington.jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/Mornington.jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/Mornington.jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/Mornington.jpg"}}'),
(3553, 942, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/Mornington (1).jpg","type":"image\\/jpeg","size":402614,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/Mornington (1).jpg","large":"media\\/uploads\\/2014\\/29\\/large\\/Mornington (1).jpg","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/Mornington (1).jpg","medium":"media\\/uploads\\/2014\\/29\\/medium\\/Mornington (1).jpg","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/Mornington (1).jpg","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/Mornington (1).jpg"}}'),
(3557, 943, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/29\\/Berwick Select 3.png","type":"image\\/png","size":514866,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/29\\/post-thumbnail\\/Berwick Select 3.png","large":"media\\/uploads\\/2014\\/29\\/large\\/Berwick Select 3.png","listing-thumbnail":"media\\/uploads\\/2014\\/29\\/listing-thumbnail\\/Berwick Select 3.png","medium":"media\\/uploads\\/2014\\/29\\/medium\\/Berwick Select 3.png","project_thumbnail":"media\\/uploads\\/2014\\/29\\/project_thumbnail\\/Berwick Select 3.png","thumbnail":"media\\/uploads\\/2014\\/29\\/thumbnail\\/Berwick Select 3.png"}}'),
(3558, 924, 'attachment_title', ''),
(3559, 924, 'attachment_type', 'post'),
(3560, 924, 'attachment', '943'),
(3561, 944, '_menu_item_object_id', '814'),
(3562, 944, '_menu_item_object', 'page'),
(3563, 944, '_menu_item_type', 'post'),
(3564, 944, '_menu_item_url', 'http://'),
(3565, 944, '_menu_item_classes', 's:9:" About Us";'),
(3566, 944, '_menu_item_target', '0'),
(3567, 945, '_menu_item_object_id', '506'),
(3568, 945, '_menu_item_object', 'page'),
(3569, 945, '_menu_item_type', 'post'),
(3570, 945, '_menu_item_url', 'http://'),
(3571, 945, '_menu_item_classes', 's:0:"";'),
(3572, 945, '_menu_item_target', '0'),
(3573, 943, 'attachment_image_alt', 'sdas'),
(3580, 880, 'attachment_title', ''),
(3581, 880, 'attachment_type', 'post'),
(3582, 880, 'attachment', '932'),
(3588, 947, 'page_template', 'default'),
(3589, 947, 'page_title', ''),
(3590, 947, 'page_meta_description', ''),
(3591, 948, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/02\\/post-lg.jpg","type":"image\\/jpeg","size":104526,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/02\\/post-thumbnail\\/post-lg.jpg","large":"media\\/uploads\\/2014\\/02\\/large\\/post-lg.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/02\\/listing-thumbnail\\/post-lg.jpg","medium":"media\\/uploads\\/2014\\/02\\/medium\\/post-lg.jpg","project_thumbnail":"media\\/uploads\\/2014\\/02\\/project_thumbnail\\/post-lg.jpg","thumbnail":"media\\/uploads\\/2014\\/02\\/thumbnail\\/post-lg.jpg"}}'),
(3592, 947, 'attachment_title', ''),
(3593, 947, 'attachment_type', 'post'),
(3594, 947, 'attachment', '817'),
(3595, 506, 'page_template', 'default'),
(3596, 837, 'attachment_title', ''),
(3597, 837, 'attachment_type', 'post'),
(3598, 837, 'attachment', '817'),
(3599, 813, 'attachment_title', ''),
(3600, 813, 'attachment_type', 'post'),
(3601, 813, 'attachment', '817'),
(3605, 823, 'attachment_title', ''),
(3606, 823, 'attachment_type', 'post'),
(3607, 823, 'attachment', '884'),
(3608, 836, 'attachment_title', ''),
(3609, 836, 'attachment_type', 'post'),
(3610, 836, 'attachment', '935'),
(3611, 952, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/06\\/post-md.jpg","type":"image\\/jpeg","size":24785,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/06\\/post-thumbnail\\/post-md.jpg","large":"media\\/uploads\\/2014\\/06\\/large\\/post-md.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/06\\/listing-thumbnail\\/post-md.jpg","medium":"media\\/uploads\\/2014\\/06\\/medium\\/post-md.jpg","project_thumbnail":"media\\/uploads\\/2014\\/06\\/project_thumbnail\\/post-md.jpg","thumbnail":"media\\/uploads\\/2014\\/06\\/thumbnail\\/post-md.jpg"}}'),
(3612, 849, 'attachment_title', ''),
(3613, 849, 'attachment_type', 'post'),
(3614, 849, 'attachment', '948'),
(3618, 954, '_widget_item_object_id', NULL),
(3619, 954, '_widget_item_object', 'custom'),
(3620, 954, '_widget_item_type', 'custom'),
(3621, 954, '_widget_item_classes', 'N;'),
(3622, 954, '_widget_item_target', '0'),
(3623, 954, '_widget_item_url', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `ace_posts`
--

CREATE TABLE IF NOT EXISTS `ace_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `post_excerpt` text,
  `post_type` varchar(50) NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `comment_status` varchar(20) NOT NULL DEFAULT 'close',
  `post_parent` bigint(20) NOT NULL DEFAULT '0',
  `post_name` varchar(200) NOT NULL,
  `guid` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_level` int(11) NOT NULL DEFAULT '1',
  `post_mimetype` varchar(100) DEFAULT NULL,
  `comment_count` varchar(20) NOT NULL DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid` (`guid`),
  KEY `fk_ace_posts_ace_users1_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=955 ;

--
-- Dumping data for table `ace_posts`
--

INSERT INTO `ace_posts` (`id`, `post_title`, `post_content`, `post_excerpt`, `post_type`, `author_id`, `comment_status`, `post_parent`, `post_name`, `guid`, `menu_order`, `menu_level`, `post_mimetype`, `comment_count`, `post_date`, `updated_at`, `post_status`) VALUES
(48, 'Privacy Policy', '<p><span style="background-color:rgb(255, 255, 255)">Sed&nbsp;</span><strong>ut perspiciatis unde omnis</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem&nbsp;</span><strong>sequi nesciunt. Neque porro quisquam</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui', 'page', 1, 'open', 0, '', 'privacy-policy-1', 0, 1, '', '', '2013-12-12 11:05:46', '2013-12-12 11:05:52', 'publish'),
(506, 'Disclaimer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>[contactus title="Contact US"]</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '123', 'page', 323, 'open', 0, '', 'disclaimer', 0, 1, '', '0', '2014-06-05 05:33:29', '2014-06-05 05:33:55', 'publish'),
(641, 'Terms & Conditions', '<p><span style="font-size:18px"><strong>Lorem ipsum dolor</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>Lorem ipsum dolor&nbsp;</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '', 'page', 1, 'open', 0, '', 'terms-conditions', 0, 1, '', '0', '2014-01-13 19:10:16', '2014-01-13 19:10:49', 'publish'),
(657, 'Treatments & Services', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'page', 1, 'open', 0, '', 'treatments-services', 0, 1, '', '0', '2014-01-28 17:22:51', '2014-01-28 17:23:08', 'publish'),
(710, 'Contact us', '', '', 'page', 323, 'open', 0, '', 'contact-us-1', 0, 1, '', '0', '2014-05-15 05:57:56', '2014-05-15 05:58:12', 'publish'),
(727, 'Thanks for contacting us.', '<p>This email is checked regularly during business hours (9-5 EST). We&rsquo;ll get back to you as soon as possible, usually within a few hours. Either John or Jay will respond to your email.</p>\r\n\r\n<p>Until then, make sure to check out the following resources:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Frequently Asked Questions</strong>:&nbsp;<a href="/#">www.acegroup.lightmedia.com.au/faqs/</a>and</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 323, 'open', 0, '', 'contact-us-thank-you', 0, 1, '', '0', '2014-05-16 07:52:08', '2014-05-16 08:10:12', 'publish'),
(813, 'Feature Project', 'Mornington Aged Care Centre Redevelopment', '', 'banner', 324, 'open', 0, '', 'feature-project', 1, 1, '', '0', '2014-07-29 09:00:35', '2014-07-29 09:00:38', 'publish'),
(814, 'People', '', '', 'page', 323, 'open', 0, '', 'people', 0, 1, '', '0', '2014-05-19 02:08:59', '2014-05-19 02:10:46', 'publish'),
(817, 'banner-a', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/banner-a.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 05:57:35', '2014-05-15 05:57:35', 'Published'),
(821, 'ipsum lorem hello', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'ipsum-lorem-hello', 0, 1, '', '0', '2014-05-22 16:16:06', '2014-05-22 16:16:39', 'publish'),
(823, 'Asoka Chandrawanka', '<p>Asoka Chandrawanka has over 30 years experience in civil construction. His roles have encompassed estimating, tendering, contract administration, supervision and project management. With expertise in infrastructure construction such as water, sewerage, bridges and roads. Asoka&rsquo;s specialties include bridge construction, traffic and safety management and environmental management.&nbsp;<br />\r\nHe has worked extensively throughout Melbourne and regional Victoria taking on projects that enable him to demonstrate his full range of capabilities in innovative design, engineering and construction solutions.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'General Manager, Ace Infrastructure', 'people', 324, 'open', 0, '', 'asoka-chandrawanka', 0, 1, '', '0', '2014-07-28 12:46:06', '2014-07-28 12:46:27', 'publish'),
(824, 'people-1', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/people-1.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:55:09', '2014-05-15 06:55:09', 'Published'),
(825, 'Tony Barker', '<p>With over 20 years experience in the Civil Construction field in both Victoria and Western Australia, Tony Barker has held a variety of positions from working on mine sites, project managing road reconstruction works inside Barwon Prison , wetland construction, landfill capping works and overseeing the operation of over 330 pieces of plant and equipment. &nbsp;During this time he has developed strong technical and leadership skills which &nbsp;have &nbsp;led to his appointment as General Manager for Ace Civil Services.</p>\r\n', 'General Manager, Ace Civil Services', 'people', 324, 'open', 0, '', 'tony-baker', 0, 1, '', '0', '2014-07-28 12:37:30', '2014-07-28 12:37:33', 'publish'),
(826, 'people-2', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/people-2.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:56:12', '2014-05-15 06:56:12', 'Published'),
(827, 'Chuck M.', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 323, 'open', 0, '', 'auto-draft-5', 0, 1, '', '0', '2014-05-15 06:57:35', '2014-05-15 06:58:00', 'publish'),
(828, 'avatar', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:57:01', '2014-05-15 06:57:01', 'Published'),
(829, 'Chuck M.', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 323, 'open', 0, '', 'auto-draft-6', 0, 1, '', '0', '2014-05-15 06:58:07', '2014-05-15 06:58:42', 'publish'),
(830, 'avatar2', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar2.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:58:32', '2014-05-15 06:58:32', 'Published'),
(832, 'avatar3', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar3.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 07:00:21', '2014-05-15 07:00:21', 'Published'),
(835, 'Jane Doe', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 324, 'open', 0, '', 'auto-draft', 0, 1, '', '0', '2014-05-28 13:55:03', '2014-05-28 13:55:25', 'publish'),
(836, 'About Us', '<p><br />\r\nOur continued success in the civil, environmental, infrastructure, landscape, electrical and water arenas depends on our strong team and our group of specialised companies finding innovative ways of delivering best value to our clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We consistently strive to deliver projects and services that meet the quality, financial and schedule requirements of our clients in every job we take on, big or small. Our dedicated team are all experts in their individual fields who pride themselves on building enduring relationships with their clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 324, 'open', 0, '', 'about-us', 0, 1, '', '0', '2014-07-29 09:02:42', '2014-07-29 09:03:10', 'publish'),
(837, 'Welcome to Ace Contractors Group Pty. Ltd.', 'Specialising in delivering multi-faceted construction projects.', '', 'banner', 324, 'open', 0, '', 'welcome-to-ace-contractors-group-pty-ltd', 1, 1, '', '0', '2014-07-28 12:54:23', '2014-07-28 12:55:12', 'publish'),
(838, 'Home', '', '', 'nav_menu_item', 328, 'close', 0, 'Home', 'home', 0, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(846, 'Solutions', '<p>After more than 41 years of operation Ace Contractors Group continues to diversify and grow.</p>\r\n\r\n<p>We have recently expanded our operations in the Electrical Infrastructure industry; with the expansion Ace Electrical Infrastructure Pty Ltd of the staff from Ace Water Services sees the Ace Group become a major player in the electrical sector throughout Victoria. Electrical, Water, Infrastructure, Environment and Landscape now compliment the core Civil capability that Ace can offer to our clients. Whilst operating as separate companies, all companies are able to combine their capabilities to offer a single interface to the client on any project.</p>\r\n\r\n<p>There are now 6 subsidiary companies belonging to the Ace Contractors Group, namely:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 324, 'open', 0, '', 'solutions', 0, 1, '', '0', '2014-05-28 10:57:35', '2014-05-28 10:57:50', 'publish'),
(847, 'Contact', '', '', 'page', 323, 'open', 0, '', 'contact', 0, 1, '', '0', '2014-05-16 01:45:28', '2014-05-16 01:46:35', 'publish'),
(848, 'Projects', '<p>[our-project]</p>\r\n', '', 'page', 323, 'open', 0, '', 'projects', 0, 1, '', '0', '2014-05-16 05:36:40', '2014-05-16 05:36:53', 'publish'),
(849, 'Company', '<div class="copy copy-sm">\r\n<p>After more than 41 years of operation Ace Contractors Group continues to diversify and grow.</p>\r\n\r\n<p>We have recently expanded our operations in the Electrical Infrastructure industry; with the expansion Ace Electrical Infrastructure Pty Ltd of the staff from Ace Water Services sees the Ace Group become a major player in the electrical sector throughout Victoria. Electrical, Water, Infrastructure, Environment and Landscape now compliment the core Civil capability that Ace can offer to our clients. Whilst operating as separate companies, all companies are able to combine their capabilities to offer a single interface to the client on any project.</p>\r\n\r\n<p>There are now 6 subsidiary companies belonging to the Ace Contractors Group, namely:</p>\r\n\r\n<ul>\r\n	<li>ACE Civil Services Pty Ltd</li>\r\n	<li>ACE Electrical Infrastructure Pty Ltd</li>\r\n	<li>ACE Environmental Services Pty Ltd</li>\r\n	<li>ACE Infrastructure Pty Ltd</li>\r\n	<li>ACE Landscape Services Pty Ltd</li>\r\n	<li>ACE Water Services Pty Ltd</li>\r\n</ul>\r\n\r\n<p>Our continued success as a quality contractor depends on our team of people finding innovative ways of delivering the best value to our clients. Our record of achievement over the past 41 years is testimony to this commitment. We recognise that the key to project delivery is more than the right equipment and people - it&#39;s about action, caring and being enterprising. These are the core values of our business. They are reflected in our record of project delivery, industrial relations harmony, safety and our ongoing business and personal relationships with clients, suppliers and with each other. Ace has a &#39;we&#39;re never too busy&#39; attitude to service and carries the resources to enable projects to gear-up quickly and meet construction deadlines. We have a diverse fleet of modern equipment that is constantly upgraded with the best technology and performance.</p>\r\n\r\n<blockquote>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore</blockquote>\r\n</div>\r\n\r\n<hr />\r\n<div class="row">\r\n<div class="col-xm-12 col-xs-6 col-sm-6">\r\n<div class="post post-default">\r\n<div class="post-img img-inner-bordered"><img alt="" src="http://acegroup.lightmedia.com.au/media/uploads/2014/06/post-md.jpg" /></div>\r\n\r\n<div class="post-content">\r\n<h2 class="post-title"><a href=""> <span>Lorem Ipsum</span> </a></h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-xm-12 col-xs-6 col-sm-6">\r\n<div class="post post-default">\r\n<div class="post-img img-inner-bordered"><img alt="" src="http://acegroup.lightmedia.com.au/media/uploads/2014/06/post-md.jpg" /></div>\r\n\r\n<div class="post-content">\r\n<h2 class="post-title"><a href=""> <span>Lorem Ipsum</span> </a></h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 'page', 323, 'open', 0, '', 'company', 0, 1, '', '0', '2014-08-11 08:33:59', '2014-08-11 08:34:47', 'publish'),
(850, 'Contact Us', '', '', 'nav_menu_item', 328, 'close', 0, '847', 'contact-us', 7, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(851, 'Our People', '', '', 'nav_menu_item', 328, 'close', 0, '814', 'our-people', 2, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(852, 'Profile', '', '', 'nav_menu_item', 328, 'close', 0, '849', 'profile', 3, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(853, 'Culture', '<h3><strong>Our Mission</strong></h3>\r\n\r\n<p>Ace will grow to be a responsible, mid-tier contractor and service provider of choice to quality clients in Australia for the profit of the shareholders and the satisfaction and wellbeing of our employees.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Our Vision</strong></h3>\r\n\r\n<p>Ace will achieve its mission through:</p>\r\n\r\n<p><strong>People</strong></p>\r\n\r\n<p>We&#39;ll be a great place to work which will inspire our staff and attract superior recruits.</p>\r\n\r\n<p><strong>Growth</strong></p>\r\n\r\n<p>We&rsquo;ll seek opportunities to grow and diversify the company organically and through mergers and acquisitions.</p>\r\n\r\n<p><strong>Community</strong></p>\r\n\r\n<p>We&rsquo;ll operate ethically at all times and in a manner that&rsquo;s consistent with community expectations and values.</p>\r\n\r\n<p><strong>Uncetainty</strong></p>\r\n\r\n<p>We&rsquo;ll continue to ameliorate risk and exploit opportunities through diversification, segregation and risk dilution.</p>\r\n\r\n<p><strong>Profit</strong></p>\r\n\r\n<p>We&rsquo;ll continue to maximise shareholder return on investment</p>\r\n\r\n<p><strong>Production</strong></p>\r\n\r\n<p>We&rsquo;ll continue to improve efficiency by improving our administrative and technical systems, by training our staff and adopting new technologies.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Our Values</strong></h3>\r\n\r\n<p>We will:</p>\r\n\r\n<ul>\r\n	<li>Focus on Safety as a Priority.</li>\r\n	<li>Be open, honest and fair in our dealings with others.</li>\r\n	<li>Have an ambitious &ldquo;Can-Do&rdquo; attitude</li>\r\n	<li>Resolve disputes promptly and fairly.</li>\r\n	<li>Be proud to work for Ace.</li>\r\n	<li>Treat our fellow employees with respect .</li>\r\n	<li>Use the Company&rsquo;s money as if it were our own.</li>\r\n	<li>Be innovative &ndash; continually trying new things.</li>\r\n	<li>Do what we say we&rsquo;ll do.</li>\r\n	<li>Strive to meet our client&rsquo;s expectations.</li>\r\n</ul>\r\n', '', 'page', 324, 'open', 0, '', 'culture-1', 0, 1, '', '0', '2014-05-29 14:23:21', '2014-05-29 14:29:09', 'publish'),
(854, 'Culture', '', '', 'nav_menu_item', 328, 'close', 0, '853', 'culture', 4, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(855, 'Careers', '<p>Ace are always looking to employ top quality and highly motivated staff, including Site Foreman/Supervisors, Estimators, Project Managers, Machine Operators and Labourers.</p>\r\n\r\n<p>If you wish to apply for any position please <a href="http://acegroup.lightmedia.com.au/contact">contact us here</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Current Vacancies</h2>\r\n\r\n<h3>Skidsteer Loader Operator</h3>\r\n\r\n<p>We need an experienced final trim skid steer operator to operate a Cat 279 skid steer equipped with a GPS/Laser guided bucket. An immediate start is available for the right candidate with experience and expertise in the placement, moisture conditioning, trimming &amp; compaction of crushed rock. &nbsp;<a href="http://www.seek.com.au/job/26619260">Click here for further details</a></p>\r\n', '', 'page', 324, 'open', 0, '', 'careers', 0, 1, '', '0', '2014-05-29 14:59:37', '2014-05-29 15:15:49', 'publish'),
(856, 'Careers', '', '', 'nav_menu_item', 328, 'close', 0, '855', 'careers-1', 5, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(857, 'Tenders', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'tenders-1', 0, 1, '', '0', '2014-05-16 02:29:49', '2014-05-16 02:30:08', 'publish'),
(858, 'Tenders', '', '', 'nav_menu_item', 328, 'close', 0, '857', 'tenders', 8, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(859, 'Publications', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'publications-1', 0, 1, '', '0', '2014-05-16 02:31:17', '2014-05-16 02:31:35', 'publish'),
(861, '', '    <div class="pat pat-l2 navbar-utility-left">\r\n      <p>Call us: <span class="text-orange">03 9431 3944</span></p>\r\n    </div>\r\n    <div class="navbar-utitity-right">\r\n      <ul class="social social-inline">\r\n        <li class="facebook"><a href="#" target="_BLANK"><span class="fa fa-facebook"></span></a></li>\r\n        <li class="twitter"><a href="#" target="_BLANK"><span class="fa fa-twitter"></span></a></li>\r\n        <li class="linkedin"><a href="#" target="_BLANK"><span class="fa fa-linkedin"></span></a></li>\r\n        <li class="rss"><a href="#" target="_BLANK"><span class="fa fa-rss"></span></a></li>\r\n      </ul>\r\n    </div>\r\n', '0', 'widget_item', 323, 'close', 0, '', '', 0, 1, NULL, '0', '2014-08-12 09:09:11', '2014-08-12 09:09:11', 'publish'),
(864, 'reprehenderit in voluptate', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'reprehenderit-in-voluptate', 0, 1, '', '0', '2014-05-22 15:53:00', '2014-05-22 16:04:21', 'publish'),
(865, 'images', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/16/images.jpeg', 0, 1, 'image/jpeg', '0', '2014-05-16 06:29:34', '2014-05-16 06:29:34', 'Published'),
(867, 'onsectetur adipisicing elit', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'onsectetur-adipisicing-elit', 0, 1, '', '0', '2014-05-22 16:08:04', '2014-05-22 16:09:57', 'publish'),
(869, 'android-robot-sign-234', '', 'Nics Android', 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/16/android-robot-sign-234.jpeg', 0, 1, 'image/jpeg', '0', '2014-05-28 13:51:18', '2014-05-28 13:51:18', 'draft'),
(872, 'Civil Services', '<p>The variety and complexity of projects completed by Ace Civil Services continues to grow. They have included bulk earthworks, site development, road and car park construction, and pavement reconstruction. Our reputation for quality and performance combined with our systems, skilled staff and attention to detail all help to ensure we deliver to the client&#39;s expectations each and every time.</p>\r\n\r\n<p><br />\r\nThe diversity of our operations enables us to deliver successful project outcomes by design and construct, construct only or project management methodologies. This brief record of recent significant projects says it all:</p>\r\n\r\n<ul>\r\n	<li>Large shopping centre construction and reconstruction</li>\r\n	<li>Large urban residential subdivisions</li>\r\n	<li>Road and pavement construction for developers, private contractors, local and state government authorities</li>\r\n	<li>Building platforms for commercial and industrial developments</li>\r\n	<li>Heavy duty pavements at industrial facilities and airports</li>\r\n	<li>Specialist test track pavements for the Defence facilities</li>\r\n	<li>Basement excavation and detention systems</li>\r\n	<li>New schools</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 324, 'open', 0, '', 'civil-services', 0, 1, '', '0', '2014-08-11 10:53:09', '2014-08-11 10:53:23', 'publish'),
(873, 'Electrical Infrastructure', '<p>ACE Electrical Infrastructure is the latest step forward in the continued growth of the ACE group of companies. Having operated under the ACE Water brand for over 10 years, Ace Electrical&#39;s team of experienced engineers and electricians have a reputation for delivering high quality and timely projects to their clients. They take pride in all their projects, large and small, which include design, construct, installation, commissioning and servicing of Switchboards and Control Systems. Their diverse range of clients include Power Authorities, Water Authorities and Private Companies.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Specialising in, but not limited to;</p>\r\n\r\n<ul>\r\n	<li>High Voltage Substations</li>\r\n	<li>Switchboards</li>\r\n	<li>Power reticulation</li>\r\n	<li>Maintenance Services</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>List of clients;</p>\r\n\r\n<ul>\r\n	<li>Barwon Water Alliance</li>\r\n	<li>Alex Fraser Group</li>\r\n	<li>Deakin University</li>\r\n	<li>City West Water</li>\r\n	<li>Yarra Valley Water</li>\r\n	<li>North East Water</li>\r\n	<li>Wannon Water and many more.</li>\r\n</ul>\r\n', '', 'page', 324, 'open', 0, '', 'electrical-infrastructure', 0, 1, '', '0', '2014-08-11 12:12:24', '2014-08-11 12:12:44', 'publish'),
(874, 'Ace Environment', '<p>Ace Environmental Services is a leading provider of comprehensive waste and environmental services in Victoria. The company is strongly committed to a foundation of financial strength, operating excellence and professionalism.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ace Environmental Services tailors its services to meet the needs of each customer group and to ensure consistent, superior service at the local level. The company&rsquo;s network of operations includes transfer stations, active landfill disposal sites, resource recovery facilities, landfill cell development, soil remediation, asbestos removal and general environmental services to industrial, municipal and commercial customers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Drawing on our resources and experience, we actively pursue projects and initiatives that benefit the waste industry, the communities we serve and the environment. Ace Environmental Services works to have a positive influence on the environment in every aspect of its business.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our expertise in the waste industry is vast with our staff having in excess of 15 years experience specialising in the following:</p>\r\n\r\n<ul>\r\n	<li>Landfill Cell Construction</li>\r\n	<li>Soil Remediation</li>\r\n	<li>Management and Operation of Landfills, Transfer Stations and Resource Recovery Facilities</li>\r\n	<li>Rehabilitation Projects</li>\r\n	<li>Waste Auditing</li>\r\n	<li>Asbestos Removal</li>\r\n	<li>Environmental Services</li>\r\n</ul>\r\n', '', 'page', 324, 'open', 0, '', 'ace-environment', 0, 1, '', '0', '2014-08-11 12:16:40', '2014-08-11 12:16:46', 'publish'),
(875, 'Ace Infrastructure', '<p>Since its inception in 2008 ACE Infrastructure has been undertaking construction works for many major statutory authority clients including:</p>\r\n\r\n<ul>\r\n	<li>VicRoads</li>\r\n	<li>Grampians Wimmera Mallee Water</li>\r\n	<li>Goulburn Murray Water</li>\r\n	<li>V/Line Passenger</li>\r\n	<li>Murray Irrigation Limited</li>\r\n	<li>Greater Shepparton City Council</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our diverse team of Engineers and Supervisors are capable of executing a wide variety of projects, but we have focussed on three key areas, namely Water Infrastructure, Road &amp; Bridge projects and Rail work. ACE Infrastructure has already successfully completed projects in all these arenas throughout Victoria and Southern NSW and looks forward to pursuing appropriate projects further afield in the near future.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Together with the strength and experience of our Infrastructure team, our suite of Business and Management Systems (accredited to the three key standards of Safety [AS4801], Quality [ISO9001] &amp; Environment [ISO14001]) underpin our ability to tackle the most technically complex and commercially demanding projects with relative ease.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ACE Infrastructure understands that continually meeting or exceeding client&rsquo;s requirements and expectations is the bedrock on which to build a sustainable business. Accordingly, Ace Infrastructure actively pursues contract outcomes that lead to the development of long term relationships with clients, subcontractors and suppliers, not just short term financial goals.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 324, 'open', 0, '', 'ace-infrastructure', 0, 1, '', '0', '2014-08-11 12:14:40', '2014-08-11 12:14:50', 'publish'),
(876, 'Landscape Services', '<p>ACE Landscape Services operates across a diverse spectrum of projects ranging from the industrially challenging works related to large scale Commercial projects to more technically challenging streetscape type projects for large Statutory and Municipal clients. The company offers Landscape Services in areas of;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Commercial Buildings</li>\r\n	<li>Residential Developments</li>\r\n	<li>Sports Fields &amp; Sporting Facilities</li>\r\n	<li>Municipal Streetscapes</li>\r\n	<li>Open Space Management</li>\r\n	<li>Stormwater harvesting, purification and storage</li>\r\n	<li>Landscape Design and construct</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ACE Landscape works in conjunction with our Civil and Infrastructure divisions to offer a &lsquo;one stop shop&rsquo; for external works, avoiding problems typically associated with the contract interface between the two disciplines.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our strengths come from the high level of standards, systems and processes, along with our long standing presence in the industry. Our &lsquo;can-do&rsquo; attitude and commitment to clients sets us apart from others.</p>\r\n', '', 'page', 324, 'open', 0, '', 'landscape-services', 0, 1, '', '0', '2014-08-11 12:15:23', '2014-08-11 12:15:36', 'publish'),
(877, 'Ace Water Services', '<p>ACE Water is a multi-skilled company with the competence and experience in civil, electrical, mechanical, hydraulic and process works. The team has a proven track record in delivering high quality water industry projects and pride ourselves on working closely with clients to deliver their requirements on time and on budget.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Specialising in, but not limited to, design, construction, installation, commissioning and service of;</p>\r\n\r\n<ul>\r\n	<li>Water and Sewerage Treatment Plants</li>\r\n	<li>Water and Sewerage Pump Stations</li>\r\n	<li>Switchboards</li>\r\n	<li>Pollution Control Facilities</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>List of clients;</p>\r\n\r\n<ul>\r\n	<li>Barwon Water Alliance</li>\r\n	<li>Yarra Valley Water</li>\r\n	<li>North East Water</li>\r\n	<li>City West Water</li>\r\n	<li>Goulburn Valley Water</li>\r\n	<li>Melbourne Water</li>\r\n	<li>South East Water</li>\r\n	<li>Wannon Water and many more.</li>\r\n</ul>\r\n', '', 'page', 324, 'open', 0, '', 'ace-water-services', 0, 1, '', '0', '2014-08-11 12:11:40', '2014-08-11 12:11:48', 'publish'),
(878, 'OUR PEOPLE', 'Meet our key management team', '', 'banner', 324, 'open', 0, '', 'our-people-1', 1, 1, '', '0', '2014-07-28 12:51:04', '2014-07-28 12:51:45', 'publish'),
(879, 'OUR PROJECTS!', '[our-projects]', '', 'banner', 323, 'open', 0, '', 'our-projects', 1, 1, '', '0', '2014-05-29 14:49:29', '2014-05-29 14:50:13', 'publish'),
(880, 'OUR SERVICES!', 'Lorem ipsum dolor sit amet, consectetuer adipis.', '', 'banner', 328, 'open', 0, '', 'our-services-1', 1, 1, '', '0', '2014-05-30 10:18:15', '2014-05-30 10:18:35', 'publish'),
(881, 'Our Services!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'our-services', 0, 1, '', '0', '2014-05-19 00:37:24', '2014-05-19 00:37:33', 'publish'),
(882, 'Client Testimonials', '[client-testimonials]', '0', 'widget_item', 323, 'close', 0, 'Client Testimonials', 'client-testimonials', 0, 1, NULL, '0', '2014-05-19 01:28:33', '2014-05-19 01:28:33', 'publish'),
(883, 'Russell Moore', '<p>Russell Moore has over 20 years experience in both Commercial and Residential Landscape projects. Russell oversees Ace Landscape projects, estimating, planning and &nbsp;business operations whilst supporting Project Management staff in delivering the best outcome to both clients and Ace company stakeholders.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'General Manager, Ace Landscape Services', 'people', 324, 'open', 0, '', 'russell-moore', 0, 1, '', '0', '2014-07-28 12:34:01', '2014-07-28 12:36:06', 'publish'),
(884, 'people-3', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-3.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:21:50', '2014-05-19 02:21:50', 'Published'),
(885, 'Simon Cock', '<p>Simon Cock has worked in the farming, contracting, civil and landscape fields for the past 27 years. &nbsp;Currently overseeing all the projects being run by Ace Group, &nbsp;Simon assists our Project Managers to ensure efficient and effective implementation of building practices on the work site.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Victoria Operations Manager', 'people', 324, 'open', 0, '', 'simon-cock', 0, 1, '', '0', '2014-07-28 12:47:41', '2014-07-28 12:47:58', 'publish'),
(886, 'people-4', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-4.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:22:59', '2014-05-19 02:22:59', 'Published'),
(887, 'Warren Higgs', '<p>Warren Higgs has more than 28 years experience managing challenging major projects including road, bridge and water contracts in Australia and overseas. As CEO of the Ace Group of Companies since January 2008, Warren has restructured the company into a 7 distinct subsidiaries, each focusing on specifi c areas of expertise, viz: Civil, Infrastructure, Landscape, Environmental, Plant, Water &amp; Electrical.<br />\r\nThe company currently has a full time staff of around 140 with a turnover of around $70M.<br />\r\nSince returning to Ace in 2008, Warren has overseen tripling of Ace Revenues through what has been for many others a diffi cult fi nancial period.<br />\r\nOn the Goulburn-Campaspe Link Alliance Warren was instrumental in establishing the Alliance to construct this 47 Km pipeline project and was one of four ALT members guiding the project to a successful conclusion both ahead of Target completion and below Target Cost. Project value $35 million.</p>\r\n', 'CEO', 'people', 324, 'open', 0, '', 'warren-higgs', 0, 1, '', '0', '2014-05-29 14:45:52', '2014-05-29 14:47:27', 'publish'),
(888, 'people-5', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-5.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:24:17', '2014-05-19 02:24:17', 'Published'),
(890, '3 Boxes', '<div class="col-sm-4">\r\n    <div class="post post-block">\r\n      <a href="/people">\r\n        <img src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-3.jpg" alt="">\r\n        <div class="post-content">\r\n          <h2 class="post-title">Our people!</h2>\r\n          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n        </div>\r\n      </a>\r\n    </div>\r\n  </div>\r\n  <div class="col-sm-4">\r\n    <div class="post post-block">\r\n[carousel-projects]\r\n   <div class="post-content">\r\n        <h2 class="post-title">Our Projects!</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div class="col-sm-4">\r\n    <div class="post post-block">\r\n      <a href="/our-services">\r\n        <img src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-3.jpg" alt="">\r\n        <div class="post-content">\r\n          <h2 class="post-title">Our Services!</h2>\r\n          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n        </div>\r\n      </a>\r\n    </div>\r\n  </div>', '0', 'widget_item', 323, 'close', 0, '', '3-boxes', 0, 1, NULL, '0', '2014-05-29 15:21:24', '2014-05-29 15:21:24', 'publish'),
(892, 'Draft', NULL, NULL, 'page', 323, 'open', 0, '', 'draft', 0, 1, NULL, '0', '2014-05-21 16:38:10', '2014-05-21 16:38:10', 'auto-draft'),
(893, '3d-building-construction-image_1600x1200_78613', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/22/3d-building-construction-image_1600x1200_78613.jpg', 0, 1, 'image/jpeg', '0', '2014-05-22 16:02:24', '2014-05-22 16:02:24', 'Published'),
(894, '337072', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/22/337072.jpeg', 0, 1, 'image/jpeg', '0', '2014-05-22 16:09:32', '2014-05-22 16:09:32', 'Published'),
(895, 'Cristiano test', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Occaecat</strong> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Sed do eiusmod tempor</em></p>\r\n\r\n<p>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'project', 328, 'open', 0, '', 'auto-draft-1', 0, 1, '', '0', '2014-05-28 13:51:00', '2014-05-28 13:51:30', 'publish'),
(898, 'test project', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 324, 'open', 0, '', 'auto-draft-2', 0, 1, '', '0', '2014-05-28 09:43:51', '2014-05-28 09:45:21', 'publish'),
(900, 'Quality Policy', '<p>ACE is committed to providing clients with products and services that meet their expectations, whilst upholding applicable legal requirements. Our integrated suite of Management Systems are designed to meet the requirements of AS/NZS ISO 9001:2008 Quality Management Systems which ensures that the quality of our products and services is consistent.</p>\r\n', '', 'policy', 323, 'open', 0, '', 'quality-policy', 0, 1, '', '0', '2014-05-27 02:06:13', '2014-05-27 02:06:17', 'publish'),
(901, 'policy-5', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/27/policy-5.jpg', 0, 1, 'image/jpeg', '0', '2014-05-27 01:48:38', '2014-05-27 01:48:38', 'Published'),
(902, ' Health & Safety Policy', '<p>ACE is committed to providing clients with products and services that meet their expectations, whilst upholding applicable legal requirements. Our integrated suite of Management Systems are designed to meet the requirements of AS/NZS ISO 9001:2008 Quality Management Systems which ensures that the quality of our products and services is consistent.</p>\r\n', '', 'policy', 323, 'open', 0, '', 'health-safety-policy', 0, 1, '', '0', '2014-05-27 18:56:01', '2014-05-27 18:56:46', 'publish'),
(903, 'policy-4', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/27/policy-4.jpg', 0, 1, 'image/jpeg', '0', '2014-05-27 01:50:00', '2014-05-27 01:50:00', 'Published'),
(904, 'Policies', '', '', 'page', 323, 'open', 0, '', 'policies', 0, 1, '', '0', '2014-05-27 01:55:30', '2014-05-27 01:55:38', 'publish'),
(905, 'Publications and Newsletters', '[lists-taxonomy slug="policy-category"]', '0', 'widget_item', 323, 'close', 0, 'Publications and Newsletters', 'publications-and-newsletters', 0, 1, NULL, '0', '2014-05-27 05:34:07', '2014-05-27 05:34:07', 'publish'),
(906, 'Archives', '[cat-archive taxonomy="policy-category" category="newsletters"]', '0', 'widget_item', 323, 'close', 0, 'Archives', 'archives', 1, 1, NULL, '0', '2014-05-27 05:34:07', '2014-05-27 05:34:07', 'publish'),
(907, 'Search:', '[search-form]', '0', 'widget_item', 323, 'close', 0, 'Search:', 'search', 2, 1, NULL, '0', '2014-05-27 05:34:07', '2014-05-27 05:34:07', 'publish'),
(911, 'policy-4 (1)', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/27/policy-4%20%281%29.jpg', 0, 1, 'image/jpeg', '0', '2014-05-27 18:56:35', '2014-05-27 18:56:35', 'Published'),
(912, '2047464', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/28/2047464.jpg', 0, 1, 'image/jpeg', '0', '2014-05-28 09:46:13', '2014-05-28 09:46:13', 'Published'),
(914, 'rightSlide', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/28/rightSlide.jpg', 0, 1, 'image/jpeg', '0', '2014-05-28 10:08:45', '2014-05-28 10:08:45', 'Published');
INSERT INTO `ace_posts` (`id`, `post_title`, `post_content`, `post_excerpt`, `post_type`, `author_id`, `comment_status`, `post_parent`, `post_name`, `guid`, `menu_order`, `menu_level`, `post_mimetype`, `comment_count`, `post_date`, `updated_at`, `post_status`) VALUES
(915, 'Light Media test', '<h1>Heading 1</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cristiano&#39;s test</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>image</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 324, 'open', 0, '', 'lightmediatest', 0, 1, '', '0', '2014-05-28 10:09:27', '2014-05-28 10:11:35', 'publish'),
(916, 'Publications', '', '', 'nav_menu_item', 328, 'close', 0, 'Publications', 'publications', 6, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(919, 'Draft', NULL, NULL, 'page', 324, 'open', 0, '', 'draft-1', 0, 1, NULL, '0', '2014-05-28 10:56:04', '2014-05-28 10:56:04', 'auto-draft'),
(921, 'OH&S at its best', 'Description', 'Caption', 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/28/OH%26S%20at%20its%20best.jpg', 0, 1, 'image/jpeg', '0', '2014-05-28 11:18:50', '2014-05-28 11:18:50', 'draft'),
(923, 'Auto Draft', NULL, NULL, 'project', 324, 'open', 0, '', 'auto-draft-4', 0, 1, NULL, '0', '2014-05-28 13:50:19', '2014-05-28 13:50:20', 'auto-draft'),
(924, 'Nossal High School', '<p>The $14 million co-educational school at Monash University&rsquo;s Clyde Road campus took in 200 of the brightest year 9 students from the south east when it opened in 2010 and is named after one of Victoria&rsquo;s leading scientists, Sir Gustav Nossal. Ace Landscape Services and Ace Civil Services were awarded the civil and landscaping package in a single contract which included<br />\r\nthe following works:<br />\r\nBulk excavation, Drainage, Installation of 2500m2 of Urbanstone Pavers, Construction of basketball/tennis court including plexipave surfacing, linemarking, fencing and accessories, Construction of concrete and timber seating with gabion cage bases, Soft landscaping including planting.</p>\r\n', '', 'project', 324, 'open', 0, '', 'auto-draft-7', 0, 1, '', '0', '2014-05-29 15:53:39', '2014-05-29 16:00:10', 'publish'),
(925, 'Nics Testimonial', '<p>Ace is good</p>\r\n', '', 'testimonial', 324, 'open', 0, '', 'auto-draft-8', 0, 1, '', '0', '2014-05-28 13:53:53', '2014-05-28 13:54:26', 'publish'),
(926, 'Nics Policy', '<p>Do stuff good.&nbsp;</p>\r\n', '', 'policy', 324, 'open', 0, '', 'auto-draft-3', 0, 1, '', '0', '2014-05-28 13:56:24', '2014-05-28 13:57:20', 'publish'),
(927, '<i class="icon icon-home"></i> Home', '', '', 'nav_menu_item', 324, 'close', 0, '<i class="icon icon-home"></i> Home', 'i-classicon-icon-homei-home', 0, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(928, '<i class="icon icon-monitorCheck"></i> Publications', '', '', 'nav_menu_item', 324, 'close', 0, '<i class="icon icon-monitorCheck"></i> Solutions', 'i-classicon-icon-monitorchecki-publications', 3, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(929, '<i class="icon icon-group"></i> About Us', '', '', 'nav_menu_item', 324, 'close', 0, '<i class="icon icon-group"></i> Resources', 'i-classicon-icon-groupi-about-us', 2, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(930, '<i class="icon icon-briefcase"></i> Tenders', '', '', 'nav_menu_item', 324, 'close', 0, '<i class="icon icon-briefcase"></i> Company', 'i-classicon-icon-briefcasei-tenders', 4, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(931, '<i class="icon icon-envelope"></i> Contact Us', '', '', 'nav_menu_item', 324, 'close', 0, '<i class="icon icon-envelope"></i> Contact Us', 'i-classicon-icon-envelopei-contact-us', 5, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(932, 'img_0597', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/img_0597.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 10:44:03', '2014-05-29 10:44:03', 'Published'),
(933, 'Docklands', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/Docklands.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 10:44:57', '2014-05-29 10:44:57', 'Published'),
(934, 'ace', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/ace.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 10:24:12', '2014-05-29 10:24:12', 'Published'),
(935, 'sidebar-img', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/sidebar-img.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 10:24:12', '2014-05-29 10:24:12', 'Published'),
(936, 'Warren Higgs', '', '', 'media', 324, 'open', 0, '', 'warren-higgs-1', 0, 1, '', '0', '2014-05-29 14:45:18', '2014-05-29 14:45:31', 'draft'),
(937, 'Warren Higgs', '', 'Warren Higgs', 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/Warren%20Higgs.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 14:47:20', '2014-05-29 14:47:20', 'draft'),
(938, 'Draft', NULL, NULL, 'page', 324, 'open', 0, '', 'draft-2', 0, 1, NULL, '0', '2014-05-29 15:42:09', '2014-05-29 15:42:09', 'auto-draft'),
(940, 'Draft', NULL, NULL, 'page', 324, 'open', 0, '', 'draft-3', 0, 1, NULL, '0', '2014-05-29 15:45:55', '2014-05-29 15:45:55', 'auto-draft'),
(941, 'Mornington', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/Mornington.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 15:48:23', '2014-05-29 15:48:23', 'Published'),
(942, 'Mornington (1)', NULL, NULL, 'attachment', 324, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/Mornington%20%281%29.jpg', 0, 1, 'image/jpeg', '0', '2014-05-29 15:49:13', '2014-05-29 15:49:13', 'Published'),
(943, 'Berwick Select 3', '', 'asdsfsfd', 'attachment', 328, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/29/Berwick%20Select%203.png', 0, 1, 'image/png', '0', '2014-05-30 10:17:18', '2014-05-30 10:17:18', 'draft'),
(944, '<i class="icon icon-group"></i> People', '', '', 'nav_menu_item', 324, 'close', 0, '814', 'i-classicon-icon-groupi-people', 1, 1, NULL, '0', '2014-07-29 09:17:45', '2014-07-29 09:17:45', 'publish'),
(945, 'Disclaimer', '', '', 'nav_menu_item', 328, 'close', 0, '506', 'disclaimer-1', 1, 1, NULL, '0', '2014-05-30 10:15:49', '2014-05-30 10:15:49', 'publish'),
(947, 'Draft', '<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Nam liber tempor cum soluta nobis eleifend option congue</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Dtem insitam; est usus legentis in iis qui.</p>\r\n\r\n<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore</p>\r\n\r\n<hr />\r\n<p><img alt="" src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-md.jpg" /></p>\r\n\r\n<h2><a href=""> Lorem Ipsum </a></h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>\r\n\r\n<p><img alt="" src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-md.jpg" /></p>\r\n\r\n<h2><a href=""> Lorem Ipsum </a></h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>\r\n', '', 'page', 323, 'open', 0, '', 'draft-4', 0, 1, '', '0', '2014-06-02 15:03:40', '2014-06-02 15:04:14', 'publish'),
(948, 'post-lg', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/02/post-lg.jpg', 0, 1, 'image/jpeg', '0', '2014-06-02 15:14:41', '2014-06-02 15:14:41', 'Published'),
(949, 'Draft', NULL, NULL, 'page', 323, 'open', 0, '', 'draft-5', 0, 1, NULL, '0', '2014-07-22 16:19:16', '2014-07-22 16:19:16', 'auto-draft'),
(950, 'Auto Draft', NULL, NULL, 'testimonial', 323, 'open', 0, '', 'auto-draft-9', 0, 1, NULL, '0', '2014-07-22 16:26:32', '2014-07-22 16:26:32', 'auto-draft'),
(951, 'Draft', NULL, NULL, 'page', 323, 'open', 0, '', 'draft-6', 0, 1, NULL, '0', '2014-07-22 16:26:41', '2014-07-22 16:26:41', 'auto-draft'),
(952, 'post-md', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/06/post-md.jpg', 0, 1, 'image/jpeg', '0', '2014-08-06 16:22:37', '2014-08-06 16:22:37', 'Published'),
(953, 'Draft', NULL, NULL, 'page', 324, 'open', 0, '', 'draft-7', 0, 1, NULL, '0', '2014-08-11 12:13:26', '2014-08-11 12:13:26', 'auto-draft'),
(954, 'General Info', ' <div class="post-testimonial">\r\n          <div class="row">\r\n            <div class="col-xs-12">\r\n              <div class="contact-info">\r\n                18 Brisbane Street, Eltham Vic 3095 <br><br>\r\n                \r\n                Phone 03 9431 3944 <br>\r\n                Fax 03 9431 3842\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>', '0', 'widget_item', 323, 'close', 0, 'General Info', 'general-info', 0, 1, NULL, '0', '2014-08-12 09:06:28', '2014-08-12 09:06:28', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `ace_posts_comments`
--

CREATE TABLE IF NOT EXISTS `ace_posts_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ace_posts_comments_ace_users1_idx` (`user_id`),
  KEY `fk_ace_posts_comments_ace_posts1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ace_post_recently_viewed`
--

CREATE TABLE IF NOT EXISTS `ace_post_recently_viewed` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_type` varchar(60) NOT NULL,
  `date_viewed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ace_recent_viewed_ace_users1_idx` (`user_id`),
  KEY `fk_ace_recent_viewed_ace_posts1` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ace_roles`
--

CREATE TABLE IF NOT EXISTS `ace_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `capability` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `ace_roles`
--

INSERT INTO `ace_roles` (`id`, `capability`) VALUES
(1, 'read'),
(2, 'manage_categories'),
(3, 'manage_reporting'),
(4, 'manage_settings'),
(7, 'manage_navigation'),
(24, 'add_users'),
(25, 'edit_users'),
(26, 'delete_users'),
(27, 'delete_other_users'),
(28, 'add_pages'),
(29, 'edit_pages'),
(30, 'delete_pages'),
(31, 'delete_other_pages'),
(32, 'add_blogs'),
(33, 'edit_blogs'),
(34, 'delete_blogs'),
(35, 'delete_other_blogs'),
(36, 'add_media'),
(37, 'edit_media'),
(38, 'delete_media'),
(39, 'delete_other_media'),
(44, 'manage_users'),
(45, 'manage_pages'),
(46, 'manage_blogs'),
(47, 'manage_orders'),
(48, 'manage_media'),
(49, 'add_comment'),
(50, 'add_recommendations'),
(51, 'share_post'),
(53, 'edit_categories'),
(55, 'upload_media'),
(56, 'create_groupbuy'),
(57, 'delete_categories'),
(59, 'manage_tax'),
(60, 'manage_tax_settings'),
(61, 'can_file_tax_form'),
(62, 'can_manage_user_tax_forms');

-- --------------------------------------------------------

--
-- Table structure for table `ace_settings`
--

CREATE TABLE IF NOT EXISTS `ace_settings` (
  `option_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `ace_settings`
--

INSERT INTO `ace_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'admin_email', 'nholt@acecon.com.au'),
(2, 'timezone_string', '307'),
(3, 'date_format', 'd/m/Y'),
(4, 'date_format_custom', 'Y/m/d'),
(5, 'time_format', 'g:i a'),
(6, 'time_format_custom', 'g:i a'),
(7, 'paypal_email', 'support@lightmedia.com.au'),
(8, 'payment_mode', 'testing'),
(9, 'paypal_currency', 'USD'),
(10, 'default_role', '1'),
(11, 'questions_recipeint', '1,3,5'),
(12, 'prod_currency_symbol', '$'),
(13, 'default_level', '4'),
(14, 'post_per_page', '9'),
(15, 'paypal_api_username', 'michael_mechant_api1.lightmedia.com.au'),
(16, 'paypal_api_password', '1389579739'),
(17, 'paypal_api_signature', 'AQU0e5vuZCvSg-XJploSa.sGUDlpAF0-4u98EpIYnZyweCO7Yrvz0Vbd'),
(18, 'prod_currency_code', 'SGD'),
(19, 'order_recipient_name', 'Gy'),
(20, 'order_recipient_email', 'stephen@lightmedia.com.au'),
(21, 'site_page_title', 'Ace'),
(22, 'site_meta_desc', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(23, 'timeStartToReduceQty', '01:00'),
(24, 'payment_gateway', 'mw'),
(25, 'merchantwarrior_merchant_uuid', 'fadsf asdf a'),
(26, 'merchantwarrior_api_key', 'fa d ss df as df as'),
(27, 'merchantwarrior_api_pass_phrase', ' fasd df as dfa s'),
(28, 'merchantwarrior_api_endpoint', 'ads fa df'),
(29, 'payment_currency', 'AUD'),
(30, 'payment_tax_state', 'CA'),
(31, 'payment_tax_rate', '322'),
(32, 'cost_amount', '23'),
(33, 'analytic_id', '234'),
(34, 'analytic_account', '1234'),
(35, 'analytic_password', '4324324'),
(36, 'google_map', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26081603.294420436!2d-95.677068!3d37.06250000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1395027838909" width="600" height="450" frameborder="0" style="border:0"></iframe>'),
(37, 'maximum_login_attempt', '12'),
(38, 'user_locked_hours', '.75'),
(39, 'on_user_lock_message', 'You account has temporary locked out.'),
(40, 'site_background', 'http://acegroup.lightmedia.com.au/assets/site/i/bg-screen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ace_terms`
--

CREATE TABLE IF NOT EXISTS `ace_terms` (
  `term_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `ace_terms`
--

INSERT INTO `ace_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(48, 'Footer Widget', 'footer-widget', 0),
(68, 'blog', 'blog', 0),
(73, 'Home', 'home', 0),
(74, 'Middle Menu', 'middle-menu', 0),
(75, 'Footer Menu', 'footer-menu', 0),
(76, 'Top Right Widget', 'top-right-widget', 0),
(77, 'Configurable Box', 'configurable-box', 0),
(78, 'Sidebar', 'sidebar', 0),
(79, 'contact-sidebar', 'contact-sidebar', 0),
(80, 'General Info Sidebar', 'general-info-sidebar', 0),
(81, 'Policies', 'policies', 0),
(82, 'Associations', 'associations', 0),
(83, 'Certifications', 'certifications', 0),
(84, 'Newsletters', 'newsletters', 0),
(85, 'Policies Sidebar', 'policies-sidebar', 0),
(87, 'Nav Menu', 'nav-menu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_term_relationships`
--

CREATE TABLE IF NOT EXISTS `ace_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL,
  `term_taxonomy_id` bigint(20) NOT NULL,
  `menu_order` int(11) DEFAULT NULL,
  KEY `fk_ace_term_relationships_ace_term_taxonomy1_idx` (`term_taxonomy_id`),
  KEY `fk_ace_term_relationships_ace_posts1_idx` (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ace_term_relationships`
--

INSERT INTO `ace_term_relationships` (`object_id`, `term_taxonomy_id`, `menu_order`) VALUES
(882, 76, 0),
(900, 78, 0),
(900, 79, 0),
(900, 80, 0),
(900, 81, 0),
(905, 82, 0),
(906, 82, 0),
(907, 82, 0),
(902, 78, 0),
(902, 79, 0),
(902, 80, 0),
(902, 81, 0),
(879, 75, 0),
(890, 46, 0),
(838, 73, 0),
(945, 73, 0),
(851, 73, 0),
(852, 73, 0),
(854, 73, 0),
(856, 73, 0),
(916, 73, 0),
(850, 73, 0),
(858, 73, 0),
(880, 75, 0),
(878, 75, 0),
(837, 71, 0),
(813, 71, 0),
(927, 84, 0),
(944, 84, 0),
(929, 84, 0),
(928, 84, 0),
(930, 84, 0),
(931, 84, 0),
(954, 77, 0),
(861, 74, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `ace_term_taxonomy` (
  `term_taxonomy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) NOT NULL,
  `taxonomy` varchar(32) DEFAULT NULL,
  `description` longtext,
  `parent` bigint(20) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`term_taxonomy_id`),
  KEY `fk_ace_term_taxonomy_ace_terms_idx` (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `ace_term_taxonomy`
--

INSERT INTO `ace_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(46, 48, 'widget', '', 0, 0),
(66, 68, 'blog-category', 'blog', 0, 0),
(71, 73, 'banner-category', '', 0, 0),
(72, 74, 'nav_menu', '', 0, 0),
(73, 75, 'nav_menu', '', 0, 0),
(74, 76, 'widget', '', 0, 0),
(75, 77, 'banner-category', '', 0, 0),
(76, 78, 'widget', '', 0, 0),
(77, 79, 'widget', '', 0, 0),
(78, 81, 'policy-category', '', 0, 0),
(79, 82, 'policy-category', '', 0, 0),
(80, 83, 'policy-category', '', 0, 0),
(81, 84, 'policy-category', '', 0, 0),
(82, 85, 'widget', '', 0, 0),
(84, 87, 'nav_menu', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_usermeta`
--

CREATE TABLE IF NOT EXISTS `ace_usermeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_ace_usermeta_ace_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `ace_usermeta`
--

INSERT INTO `ace_usermeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(3, 296, 'timezoneOffset', '8'),
(4, 297, 'timezoneOffset', '8'),
(5, 298, 'timezoneOffset', '8'),
(6, 299, 'timezoneOffset', '8'),
(7, 301, 'timezoneOffset', '8'),
(8, 302, 'timezoneOffset', '8'),
(9, 303, 'timezoneOffset', '8'),
(10, 304, 'timezoneOffset', '8'),
(11, 305, 'timezoneOffset', '8'),
(12, 306, 'timezoneOffset', '8'),
(13, 307, 'timezoneOffset', '8'),
(14, 308, 'timezoneOffset', '8'),
(15, 309, 'timezoneOffset', '8'),
(16, 311, 'timezoneOffset', '8'),
(17, 315, 'security_q', 'question_2'),
(18, 315, 'security_q_answer', 'question_2'),
(19, 315, 'terms_&_conditions', '1'),
(20, 316, 'security_q', 'question_2'),
(21, 316, 'security_q_answer', 'question_2'),
(22, 316, 'terms_&_conditions', '1'),
(23, 317, 'security_q', 'question_2'),
(24, 317, 'security_q_answer', 'question_2'),
(25, 317, 'terms_&_conditions', '1'),
(26, 318, 'security_q', 'question_1'),
(27, 318, 'security_q_answer', 'question_1'),
(28, 318, 'terms_&_conditions', '1'),
(29, 319, 'security_q', 'question_1'),
(30, 319, 'security_q_answer', 'question_1'),
(31, 319, 'terms_&_conditions', '1'),
(32, 320, 'security_q', 'question_1'),
(33, 320, 'security_q_answer', 'question_1'),
(34, 320, 'terms_&_conditions', '1'),
(35, 321, 'security_q', 'question_1'),
(36, 321, 'security_q_answer', 'question_1'),
(37, 321, 'terms_&_conditions', '1'),
(38, 320, 'is_locked_out', '0'),
(39, 320, 'login_attempt', '1'),
(40, 320, 'lockout_datetime', '1395906359'),
(41, 320, 'locked_out_session_used', 'QZp5yBSXoitmsCnUDmXR9ltjUhKYJGyTFuhZ8Nxp'),
(42, 1, 'is_locked_out', '0'),
(43, 1, 'login_attempt', '1'),
(44, 322, 'security_q', 'question_2'),
(45, 322, 'security_q_answer', 'question_2'),
(46, 322, 'terms_&_conditions', '1'),
(47, 322, 'login_attempt', '1'),
(48, 322, 'is_locked_out', '0'),
(49, 323, 'security_q', 'question_1'),
(50, 323, 'security_q_answer', 'question_1'),
(51, 323, 'terms_&_conditions', '1'),
(52, 324, 'security_q', 'question_1'),
(53, 324, 'security_q_answer', 'question_1'),
(54, 324, 'terms_&_conditions', '1'),
(55, 324, 'login_attempt', '1'),
(56, 324, 'is_locked_out', '0'),
(57, 325, 'security_q', 'question_2'),
(58, 325, 'security_q_answer', 'question_2'),
(59, 325, 'terms_&_conditions', '1'),
(60, 326, 'security_q', 'question_1'),
(61, 326, 'security_q_answer', 'question_1'),
(62, 326, 'terms_&_conditions', '1'),
(63, 326, 'is_locked_out', '0'),
(64, 326, 'login_attempt', '1'),
(65, 323, 'login_attempt', '1'),
(66, 323, 'is_locked_out', '0'),
(67, 327, 'security_q', 'question_1'),
(68, 327, 'security_q_answer', 'question_1'),
(69, 327, 'terms_&_conditions', '1'),
(70, 328, 'security_q', 'question_1'),
(71, 328, 'security_q_answer', 'question_1'),
(72, 328, 'terms_&_conditions', '1'),
(73, 329, 'security_q', 'question_1'),
(74, 329, 'security_q_answer', 'question_1'),
(75, 329, 'terms_&_conditions', '1'),
(76, 329, 'is_locked_out', '0'),
(77, 329, 'login_attempt', '1'),
(78, 330, 'security_q', 'question_1'),
(79, 330, 'security_q_answer', 'question_1'),
(80, 330, 'terms_&_conditions', '1'),
(81, 331, 'security_q', 'question_1'),
(82, 331, 'security_q_answer', 'question_1'),
(83, 331, 'terms_&_conditions', '1'),
(84, 331, 'login_attempt', '1'),
(85, 331, 'is_locked_out', '0'),
(86, 328, 'is_locked_out', '0'),
(87, 328, 'login_attempt', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ace_users`
--

CREATE TABLE IF NOT EXISTS `ace_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` enum('F','M') NOT NULL DEFAULT 'M',
  `birthdate` date DEFAULT NULL,
  `address_1` varchar(100) NOT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) NOT NULL,
  `state` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `points` decimal(10,2) unsigned DEFAULT '0.00',
  `total_spend` decimal(10,2) unsigned NOT NULL,
  `nric` varchar(60) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_visit` timestamp NULL DEFAULT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `activation_code` text NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_ace_users_ace_roles1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=330 ;

--
-- Dumping data for table `ace_users`
--

INSERT INTO `ace_users` (`id`, `password`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `address_1`, `address_2`, `postcode`, `state`, `country`, `mobile`, `points`, `total_spend`, `nric`, `designation`, `avatar`, `created_at`, `updated_at`, `last_visit`, `group_id`, `activation_code`, `active`) VALUES
(323, '$2y$08$/vPj93GvF5YL6jwVSrSMle.jfsPodR4hDww8EaixStqbq0BdDVkFa', 'michael@lightmedia.com.au', 'Michael', 'Montenegro', 'M', '1970-01-01', '', NULL, '', '', '', NULL, '0.00', '0.00', NULL, '', NULL, '2014-03-31 02:32:50', '2014-05-21 16:37:42', NULL, 5, '5338d3d2742cd81be53dd90d9ff99cad426c04d972ab4', 1),
(324, '$2y$08$Own/9wLpr3ltNsfH4/cEYOukuknPywQSdv9V4bJMZrCeEwPTGaTZK', 'nholt@acecon.com.au', 'Nic', 'Holt', 'M', '0000-00-00', '', NULL, '', '', '', NULL, '0.00', '0.00', NULL, '', 'media/uploads/users/324/avatar/avatar.png', '2014-05-23 08:13:43', '2014-05-28 12:29:56', NULL, 5, '', 1),
(327, '$2y$08$Jo7N1.7w3SxM31hBB3RfvO4akuH03eoArHAbPTQ6H2hYRiem7khHS', 'helloworld@yahoo.com', 'asdfsa', 'asdfas', 'M', '0000-00-00', '', NULL, '', '', '', NULL, '0.00', '0.00', NULL, '', NULL, '2014-05-27 19:04:39', '2014-05-27 19:05:05', NULL, 5, '', 1),
(328, '$2y$08$lyBxZ7VWwVy4Y8OyYT8IA.saoRcpL2uWtuBVA3H0BVodhyM07wQUS', 'cris@lightmedia.com.au', 'Cristiano', 'Matsunaga', 'M', '1977-07-19', '', NULL, '', '', '', NULL, '0.00', '0.00', NULL, '', 'media/uploads/users/328/avatar/avatar.png', '2014-05-28 09:53:39', '2014-05-28 12:29:14', NULL, 5, '', 1),
(329, '$2y$08$9kaRM3DcPrvCQzoPfAMsMuPFMx3ULm1kg4nppGKXQbv7ddwwxRhR6', 'kanomi@lightmedia.com.au', 'Kanomi', 'River', 'M', '0000-00-00', '', NULL, '', '', '', NULL, '0.00', '0.00', NULL, '', NULL, '2014-05-28 10:21:39', '2014-05-28 10:21:39', NULL, 5, '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ace_postmeta`
--
ALTER TABLE `ace_postmeta`
  ADD CONSTRAINT `fk_ace_postmeta_ace_posts1` FOREIGN KEY (`post_id`) REFERENCES `ace_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ace_posts_comments`
--
ALTER TABLE `ace_posts_comments`
  ADD CONSTRAINT `fk_ace_posts_comments_ace_posts1` FOREIGN KEY (`post_id`) REFERENCES `ace_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ace_posts_comments_ace_users1` FOREIGN KEY (`user_id`) REFERENCES `ace_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ace_post_recently_viewed`
--
ALTER TABLE `ace_post_recently_viewed`
  ADD CONSTRAINT `ace_post_recently_viewed_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `ace_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ace_post_recently_viewed_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ace_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ace_term_relationships`
--
ALTER TABLE `ace_term_relationships`
  ADD CONSTRAINT `fk_ace_term_relationships_ace_posts1` FOREIGN KEY (`object_id`) REFERENCES `ace_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ace_term_relationships_ace_term_taxonomy1` FOREIGN KEY (`term_taxonomy_id`) REFERENCES `ace_term_taxonomy` (`term_taxonomy_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ace_term_taxonomy`
--
ALTER TABLE `ace_term_taxonomy`
  ADD CONSTRAINT `fk_ace_term_taxonomy_ace_terms` FOREIGN KEY (`term_id`) REFERENCES `ace_terms` (`term_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
