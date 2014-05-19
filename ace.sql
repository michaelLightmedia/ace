-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2014 at 01:48 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `acegroup_lsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `ace_groups`
--

CREATE TABLE `ace_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ace_groups`
--

INSERT INTO `ace_groups` (`id`, `group`) VALUES
(1, 'Administrator'),
(2, 'Client'),
(3, 'Accountant'),
(4, 'Agent'),
(5, 'Super User');

-- --------------------------------------------------------

--
-- Table structure for table `ace_groups_roles`
--

CREATE TABLE `ace_groups_roles` (
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
(2, 1),
(2, 49),
(2, 51),
(2, 61),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 7),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 53),
(3, 55),
(3, 56),
(3, 57),
(3, 59),
(3, 62),
(4, 1),
(4, 2),
(4, 28),
(4, 29),
(4, 30),
(4, 32),
(4, 33),
(4, 34),
(4, 36),
(4, 37),
(4, 38),
(4, 55),
(4, 62),
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

CREATE TABLE `ace_levels` (
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

CREATE TABLE `ace_password_reminders` (
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
('delmar@lightmedia.com.au', '109d0fc9f16dc67af1b301191f9e2cb5f80d4cf1', '2014-01-10 22:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `ace_postmeta`
--

CREATE TABLE `ace_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_ace_postmeta_ace_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3333 ;

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
(2979, 715, '_menu_item_object_id', NULL),
(2980, 715, '_menu_item_object', 'custom'),
(2981, 715, '_menu_item_type', 'custom'),
(2982, 715, '_menu_item_url', 'http://acegroup.lightmedia.com.au/about-us'),
(2983, 716, '_menu_item_object_id', NULL),
(2984, 716, '_menu_item_object', 'custom'),
(2985, 716, '_menu_item_type', 'custom'),
(2986, 716, '_menu_item_url', 'http://acegroup.lightmedia.com.au/contact'),
(2987, 718, '_menu_item_object_id', NULL),
(2988, 718, '_menu_item_object', 'custom'),
(2989, 718, '_menu_item_type', 'custom'),
(2990, 718, '_menu_item_url', 'http://acegroup.lightmedia.com.au/projects'),
(2991, 719, '_menu_item_object_id', NULL),
(2992, 719, '_menu_item_object', 'custom'),
(2993, 719, '_menu_item_type', 'custom'),
(2994, 719, '_menu_item_url', 'http://acegroup.lightmedia.com.au/'),
(2995, 719, '_menu_item_classes', 's:0:"";'),
(2996, 719, '_menu_item_target', '0'),
(2999, 718, '_menu_item_classes', 's:0:"";'),
(3000, 718, '_menu_item_target', '0'),
(3001, 715, '_menu_item_classes', 's:0:"";'),
(3002, 715, '_menu_item_target', '0'),
(3003, 716, '_menu_item_classes', 's:0:"";'),
(3004, 716, '_menu_item_target', '0'),
(3017, 727, 'page_title', ''),
(3018, 727, 'page_meta_description', ''),
(3028, 813, 'banner_url', ''),
(3029, 813, 'button_text', 'Read More <span>Lorem ipsum dolor sit amet</span>'),
(3030, 813, 'banner_target', NULL),
(3032, 817, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/banner-a.jpg","type":"image\\/jpeg","size":177064,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/banner-a.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/banner-a.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/banner-a.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/banner-a.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/banner-a.jpg"}}'),
(3033, 813, 'attachment_title', ''),
(3034, 813, 'attachment_type', 'post'),
(3035, 813, 'attachment', '817'),
(3036, 818, 'page_title', ''),
(3037, 818, 'page_meta_description', ''),
(3039, 820, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/post-1.jpg","type":"image\\/jpeg","size":32945,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/post-1.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/post-1.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/post-1.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/post-1.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/post-1.jpg"}}'),
(3040, 818, 'attachment_title', ''),
(3041, 818, 'attachment_type', 'post'),
(3042, 818, 'attachment', '820'),
(3043, 822, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/post-3.jpg","type":"image\\/jpeg","size":92851,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/post-3.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/post-3.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/post-3.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/post-3.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/post-3.jpg"}}'),
(3047, 821, 'page_title', ''),
(3048, 821, 'page_meta_description', ''),
(3049, 824, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/15\\/people-1.jpg","type":"image\\/jpeg","size":16886,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/15\\/post-thumbnail\\/people-1.jpg","large":"media\\/uploads\\/2014\\/15\\/large\\/people-1.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/15\\/listing-thumbnail\\/people-1.jpg","medium":"media\\/uploads\\/2014\\/15\\/medium\\/people-1.jpg","thumbnail":"media\\/uploads\\/2014\\/15\\/thumbnail\\/people-1.jpg"}}'),
(3050, 823, 'attachment_title', ''),
(3051, 823, 'attachment_type', 'post'),
(3052, 823, 'attachment', '824'),
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
(3091, 836, 'page_title', ''),
(3092, 836, 'page_meta_description', ''),
(3093, 836, 'page_template', 'sidebar-right'),
(3094, 837, 'banner_url', ''),
(3095, 837, 'button_text', 'Read More <span>Lorem ipsum dolor sit amet</span>'),
(3096, 837, 'banner_target', NULL),
(3097, 837, 'attachment_title', ''),
(3098, 837, 'attachment_type', 'post'),
(3099, 837, 'attachment', '817'),
(3100, 838, '_menu_item_object_id', NULL),
(3101, 838, '_menu_item_object', 'custom'),
(3102, 838, '_menu_item_type', 'custom'),
(3103, 838, '_menu_item_url', '#'),
(3132, 838, '_menu_item_classes', 's:0:"";'),
(3133, 838, '_menu_item_target', '0'),
(3148, 846, 'page_template', 'default'),
(3149, 846, 'page_title', ''),
(3150, 846, 'page_meta_description', ''),
(3151, 847, 'page_template', 'contact'),
(3152, 847, 'page_title', ''),
(3153, 847, 'page_meta_description', ''),
(3154, 848, 'page_template', 'default'),
(3155, 848, 'page_title', ''),
(3156, 848, 'page_meta_description', ''),
(3157, 849, 'page_template', 'company'),
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
(3209, 860, '_menu_item_object_id', '859'),
(3210, 860, '_menu_item_object', 'page'),
(3211, 860, '_menu_item_type', 'post'),
(3212, 860, '_menu_item_url', 'http://'),
(3213, 860, '_menu_item_classes', 's:0:"";'),
(3214, 860, '_menu_item_target', '0'),
(3215, 861, '_widget_item_object_id', NULL),
(3216, 861, '_widget_item_object', 'custom'),
(3217, 861, '_widget_item_type', 'custom'),
(3218, 861, '_widget_item_classes', 'N;'),
(3219, 861, '_widget_item_target', '0'),
(3220, 861, '_widget_item_url', 'http://'),
(3225, 863, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/16\\/post-thumb-2.jpg","type":"image\\/jpeg","size":18790,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/16\\/post-thumbnail\\/post-thumb-2.jpg","large":"media\\/uploads\\/2014\\/16\\/large\\/post-thumb-2.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/16\\/listing-thumbnail\\/post-thumb-2.jpg","thumbnail":"media\\/uploads\\/2014\\/16\\/thumbnail\\/post-thumb-2.jpg","medium":"media\\/uploads\\/2014\\/16\\/medium\\/post-thumb-2.jpg","project_thumbnail":"media\\/uploads\\/2014\\/16\\/project_thumbnail\\/post-thumb-2.jpg"}}'),
(3226, 821, 'attachment_title', ''),
(3227, 821, 'attachment_type', 'post'),
(3228, 821, 'attachment', '863'),
(3229, 865, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/16\\/images.jpeg","type":"image\\/jpeg","size":7115,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/16\\/post-thumbnail\\/images.jpeg","large":"media\\/uploads\\/2014\\/16\\/large\\/images.jpeg","listing-thumbnail":"media\\/uploads\\/2014\\/16\\/listing-thumbnail\\/images.jpeg","thumbnail":"media\\/uploads\\/2014\\/16\\/thumbnail\\/images.jpeg","medium":"media\\/uploads\\/2014\\/16\\/medium\\/images.jpeg","project_thumbnail":"media\\/uploads\\/2014\\/16\\/project_thumbnail\\/images.jpeg"}}'),
(3233, 864, 'page_title', ''),
(3234, 864, 'page_meta_description', ''),
(3239, 867, 'page_title', ''),
(3240, 867, 'page_meta_description', ''),
(3248, 869, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/16\\/android-robot-sign-234.jpeg","type":"image\\/jpeg","size":82730,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/16\\/post-thumbnail\\/android-robot-sign-234.jpeg","large":"media\\/uploads\\/2014\\/16\\/large\\/android-robot-sign-234.jpeg","listing-thumbnail":"media\\/uploads\\/2014\\/16\\/listing-thumbnail\\/android-robot-sign-234.jpeg","thumbnail":"media\\/uploads\\/2014\\/16\\/thumbnail\\/android-robot-sign-234.jpeg","medium":"media\\/uploads\\/2014\\/16\\/medium\\/android-robot-sign-234.jpeg","project_thumbnail":"media\\/uploads\\/2014\\/16\\/project_thumbnail\\/android-robot-sign-234.jpeg"}}'),
(3249, 867, 'attachment_title', ''),
(3250, 867, 'attachment_type', 'post'),
(3251, 867, 'attachment', '869'),
(3252, 864, 'attachment_title', ''),
(3253, 864, 'attachment_type', 'post'),
(3254, 864, 'attachment', '869'),
(3258, 727, 'page_template', 'default'),
(3259, 871, '_menu_item_object_id', NULL),
(3260, 871, '_menu_item_object', 'custom'),
(3261, 871, '_menu_item_type', 'custom'),
(3262, 871, '_menu_item_url', 'http://acegroup.lightmedia.com.au/solutions'),
(3263, 871, '_menu_item_classes', 's:0:"";'),
(3264, 871, '_menu_item_target', '0'),
(3265, 872, 'page_template', 'default'),
(3266, 872, 'page_title', ''),
(3267, 872, 'page_meta_description', ''),
(3268, 873, 'page_template', 'default'),
(3269, 873, 'page_title', 'Electrical Infrastructure'),
(3270, 873, 'page_meta_description', ''),
(3271, 874, 'page_template', 'default'),
(3272, 874, 'page_title', 'Ace Environment'),
(3273, 874, 'page_meta_description', ''),
(3274, 875, 'page_template', 'default'),
(3275, 875, 'page_title', ''),
(3276, 875, 'page_meta_description', ''),
(3277, 876, 'page_template', 'default'),
(3278, 876, 'page_title', ''),
(3279, 876, 'page_meta_description', ''),
(3280, 877, 'page_template', 'default'),
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
(3298, 880, 'attachment_title', ''),
(3299, 880, 'attachment_type', 'post'),
(3300, 880, 'attachment', '822'),
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
(3320, 887, 'attachment_title', ''),
(3321, 887, 'attachment_type', 'post'),
(3322, 887, 'attachment', '888'),
(3323, 887, 'page_title', 'Warren Higgs'),
(3324, 887, 'page_meta_description', ''),
(3325, 889, 'page_title', ''),
(3326, 889, 'page_meta_description', ''),
(3327, 890, '_widget_item_object_id', NULL),
(3328, 890, '_widget_item_object', 'custom'),
(3329, 890, '_widget_item_type', 'custom'),
(3330, 890, '_widget_item_classes', 'N;'),
(3331, 890, '_widget_item_target', '0'),
(3332, 890, '_widget_item_url', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `ace_posts`
--

CREATE TABLE `ace_posts` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=891 ;

--
-- Dumping data for table `ace_posts`
--

INSERT INTO `ace_posts` (`id`, `post_title`, `post_content`, `post_excerpt`, `post_type`, `author_id`, `comment_status`, `post_parent`, `post_name`, `guid`, `menu_order`, `menu_level`, `post_mimetype`, `comment_count`, `post_date`, `updated_at`, `post_status`) VALUES
(48, 'Privacy Policy', '<p><span style="background-color:rgb(255, 255, 255)">Sed&nbsp;</span><strong>ut perspiciatis unde omnis</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem&nbsp;</span><strong>sequi nesciunt. Neque porro quisquam</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui', 'page', 1, 'open', 0, '', 'privacy-policy-1', 0, 1, '', '', '2013-12-12 11:05:46', '2013-12-12 11:05:52', 'publish'),
(506, 'Disclaimer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>[contactus &quot;title&quot;=&quot;Contact US&quot;]</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '123', 'page', 1, 'open', 0, '', 'disclaimer', 0, 1, '', '0', '2014-03-17 18:01:04', '2014-03-17 18:01:27', 'publish'),
(641, 'Terms & Conditions', '<p><span style="font-size:18px"><strong>Lorem ipsum dolor</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>Lorem ipsum dolor&nbsp;</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '', 'page', 1, 'open', 0, '', 'terms-conditions', 0, 1, '', '0', '2014-01-13 19:10:16', '2014-01-13 19:10:49', 'publish'),
(657, 'Treatments & Services', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'page', 1, 'open', 0, '', 'treatments-services', 0, 1, '', '0', '2014-01-28 17:22:51', '2014-01-28 17:23:08', 'publish'),
(710, 'Contact us', '', '', 'page', 323, 'open', 0, '', 'contact-us-1', 0, 1, '', '0', '2014-05-15 05:57:56', '2014-05-15 05:58:12', 'publish'),
(715, '<i class="icon icon-briefcase"></i> Company', '', '', 'nav_menu_item', 323, 'close', 0, 'Pricings', 'i-classicon-icon-briefcasei-company', 3, 1, NULL, '0', '2014-05-19 02:03:49', '2014-05-19 02:03:49', 'publish'),
(716, '<i class="icon icon-envelope"></i> Contact Us', '', '', 'nav_menu_item', 323, 'close', 0, 'Blog', 'i-classicon-icon-envelopei-contact-us', 4, 1, NULL, '0', '2014-05-19 02:03:49', '2014-05-19 02:03:49', 'publish'),
(718, '<i class="icon icon-group"></i> Resources', '', '', 'nav_menu_item', 323, 'close', 0, 'Benefits', 'i-classicon-icon-groupi-resources', 2, 1, NULL, '0', '2014-05-19 02:03:49', '2014-05-19 02:03:49', 'publish'),
(719, '<i class="icon icon-home"></i> Home', '', '', 'nav_menu_item', 323, 'close', 0, 'Home', 'i-classicon-icon-homei-home', 0, 1, NULL, '0', '2014-05-19 02:03:49', '2014-05-19 02:03:49', 'publish'),
(727, 'Thanks for contacting us.', '<p>This email is checked regularly during business hours (9-5 EST). We&rsquo;ll get back to you as soon as possible, usually within a few hours. Either John or Jay will respond to your email.</p>\r\n\r\n<p>Until then, make sure to check out the following resources:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Frequently Asked Questions</strong>:&nbsp;<a href="/#">www.acegroup.lightmedia.com.au/faqs/</a>and</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 323, 'open', 0, '', 'contact-us-thank-you', 0, 1, '', '0', '2014-05-16 07:52:08', '2014-05-16 08:10:12', 'publish'),
(813, 'Welcome to Ace Contractors Group Pty. Ltd.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Epsum factorial non deposit quid pro quo hic escorol.', '', 'banner', 323, 'open', 0, '', 'welcome-to-ace-contractors-group-pty-ltd', 1, 1, '', '0', '2014-05-15 07:36:01', '2014-05-15 07:36:06', 'publish'),
(814, 'People', '', '', 'page', 323, 'open', 0, '', 'people', 0, 1, '', '0', '2014-05-19 02:08:59', '2014-05-19 02:10:46', 'publish'),
(817, 'banner-a', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/banner-a.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 05:57:35', '2014-05-15 05:57:35', 'Published'),
(818, 'Lorem ipsum dolor', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'blog', 323, 'open', 0, '', 'auto-draft-1', 0, 1, '', '0', '2014-05-16 03:25:21', '2014-05-16 04:57:08', 'publish'),
(820, 'post-1', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/post-1.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:24:09', '2014-05-15 06:24:09', 'Published'),
(821, 'ipsum lorem hello', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'ipsum-lorem-hello', 0, 1, '', '0', '2014-05-16 06:26:55', '2014-05-16 06:27:34', 'publish'),
(822, 'post-3', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/post-3.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:30:17', '2014-05-15 06:30:17', 'Published'),
(823, 'John Smit', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', 'President of Ace Contractors Group', 'people', 323, 'open', 0, '', 'john-smit', 0, 1, '', '0', '2014-05-19 02:13:02', '2014-05-19 02:13:15', 'publish'),
(824, 'people-1', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/people-1.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:55:09', '2014-05-15 06:55:09', 'Published'),
(825, 'Tony Baker', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', 'consectetur adipisicing elit.', 'people', 323, 'open', 0, '', 'tony-baker', 0, 1, '', '0', '2014-05-19 02:14:16', '2014-05-19 02:14:23', 'publish'),
(826, 'people-2', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/people-2.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:56:12', '2014-05-15 06:56:12', 'Published'),
(827, 'Chuck M.', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 323, 'open', 0, '', 'auto-draft-5', 0, 1, '', '0', '2014-05-15 06:57:35', '2014-05-15 06:58:00', 'publish'),
(828, 'avatar', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:57:01', '2014-05-15 06:57:01', 'Published'),
(829, 'Chuck M.', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 323, 'open', 0, '', 'auto-draft-6', 0, 1, '', '0', '2014-05-15 06:58:07', '2014-05-15 06:58:42', 'publish'),
(830, 'avatar2', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar2.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 06:58:32', '2014-05-15 06:58:32', 'Published'),
(832, 'avatar3', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/15/avatar3.jpg', 0, 1, 'image/jpeg', '0', '2014-05-15 07:00:21', '2014-05-15 07:00:21', 'Published'),
(835, 'Jane Doe', '<p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei,</p>\r\n', '', 'testimonial', 323, 'open', 0, '', 'auto-draft', 0, 1, '', '0', '2014-05-15 07:01:58', '2014-05-15 07:02:19', 'publish'),
(836, 'About Us', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', '', 'page', 323, 'open', 0, '', 'about-us', 0, 1, '', '0', '2014-05-19 02:02:47', '2014-05-19 02:02:52', 'publish'),
(837, 'Welcome to Ace Contractors Group Pty. Ltd.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Epsum factorial non deposit quid pro quo hic escorol.', '', 'banner', 323, 'open', 0, '', 'welcome-to-ace-contractors-group-pty-ltd-1', 1, 1, '', '0', '2014-05-15 07:38:58', '2014-05-15 07:39:19', 'publish'),
(838, 'Home', '', '', 'nav_menu_item', 323, 'close', 0, 'Home', 'home-1', 0, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(846, 'Solutions', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'solutions', 0, 1, '', '0', '2014-05-16 02:10:56', '2014-05-16 02:11:04', 'publish'),
(847, 'Contact', '', '', 'page', 323, 'open', 0, '', 'contact', 0, 1, '', '0', '2014-05-16 01:45:28', '2014-05-16 01:46:35', 'publish'),
(848, 'Projects', '<p>[our-project]</p>\r\n', '', 'page', 323, 'open', 0, '', 'projects', 0, 1, '', '0', '2014-05-16 05:36:40', '2014-05-16 05:36:53', 'publish'),
(849, 'Company', '', '', 'page', 323, 'open', 0, '', 'company', 0, 1, '', '0', '2014-05-16 02:14:08', '2014-05-16 02:14:20', 'publish'),
(850, 'Contact Us', '', '', 'nav_menu_item', 323, 'close', 0, '847', 'contact-us-2', 8, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(851, 'Our People', '', '', 'nav_menu_item', 323, 'close', 0, '814', 'our-people', 2, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(852, 'Profile', '', '', 'nav_menu_item', 323, 'close', 0, '849', 'profile', 1, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(853, 'Culture', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'culture-1', 0, 1, '', '0', '2014-05-16 02:27:56', '2014-05-16 02:28:04', 'publish'),
(854, 'Culture', '', '', 'nav_menu_item', 323, 'close', 0, '853', 'culture', 3, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(855, 'Careers', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'careers', 0, 1, '', '0', '2014-05-16 02:28:44', '2014-05-16 02:29:43', 'publish'),
(856, 'Careers', '', '', 'nav_menu_item', 323, 'close', 0, '855', 'careers-1', 4, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(857, 'Tenders', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'tenders-1', 0, 1, '', '0', '2014-05-16 02:29:49', '2014-05-16 02:30:08', 'publish'),
(858, 'Tenders', '', '', 'nav_menu_item', 323, 'close', 0, '857', 'tenders', 5, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(859, 'Publications', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'publications-1', 0, 1, '', '0', '2014-05-16 02:31:17', '2014-05-16 02:31:35', 'publish'),
(860, 'Publications', '', '', 'nav_menu_item', 323, 'close', 0, '859', 'publications-2', 7, 1, NULL, '0', '2014-05-16 02:31:53', '2014-05-16 02:31:53', 'publish'),
(861, '', '\r\n    <div class="pat pat-l2 navbar-utility-left">\r\n      <p>Call us: <span class="text-orange">(123) 435 3789</span></p>\r\n    </div>\r\n    <div class="navbar-utitity-right">\r\n      <ul class="social social-inline">\r\n        <li class="facebook"><a href="#" target="_BLANK"><span class="fa fa-facebook"></span></a></li>\r\n        <li class="twitter"><a href="#" target="_BLANK"><span class="fa fa-twitter"></span></a></li>\r\n        <li class="linkedin"><a href="#" target="_BLANK"><span class="fa fa-linkedin"></span></a></li>\r\n        <li class="rss"><a href="#" target="_BLANK"><span class="fa fa-rss"></span></a></li>\r\n      </ul>\r\n    </div>\r\n', '0', 'widget_item', 323, 'close', 0, '', '', 0, 1, NULL, '0', '2014-05-16 05:23:56', '2014-05-16 05:23:56', 'publish'),
(863, 'post-thumb-2', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/16/post-thumb-2.jpg', 0, 1, 'image/jpeg', '0', '2014-05-16 06:27:26', '2014-05-16 06:27:26', 'Published'),
(864, 'reprehenderit in voluptate', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'reprehenderit-in-voluptate', 0, 1, '', '0', '2014-05-16 06:51:33', '2014-05-16 06:51:44', 'publish'),
(865, 'images', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/16/images.jpeg', 0, 1, 'image/jpeg', '0', '2014-05-16 06:29:34', '2014-05-16 06:29:34', 'Published'),
(867, 'onsectetur adipisicing elit', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'project', 323, 'open', 0, '', 'onsectetur-adipisicing-elit', 0, 1, '', '0', '2014-05-16 06:46:52', '2014-05-16 06:47:14', 'publish'),
(869, 'android-robot-sign-234', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/16/android-robot-sign-234.jpeg', 0, 1, 'image/jpeg', '0', '2014-05-16 06:47:08', '2014-05-16 06:47:08', 'Published'),
(871, '<i class="icon icon-monitorCheck"></i> Solutions', '', '', 'nav_menu_item', 323, 'close', 0, '<i class="icon icon-monitorCheck"></i> Solutions', 'i-classicon-icon-monitorchecki-solutions', 1, 1, NULL, '0', '2014-05-19 02:03:49', '2014-05-19 02:03:49', 'publish'),
(872, 'Civil Services', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'civil-services', 0, 1, '', '0', '2014-05-19 00:10:41', '2014-05-19 00:11:53', 'publish'),
(873, 'Electrical Infrastructure', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'electrical-infrastructure', 0, 1, '', '0', '2014-05-19 00:13:02', '2014-05-19 00:13:50', 'publish'),
(874, 'Ace Environment', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'ace-environment', 0, 1, '', '0', '2014-05-19 00:15:46', '2014-05-19 00:16:16', 'publish'),
(875, 'Ace Infrastructure', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'ace-infrastructure', 0, 1, '', '0', '2014-05-19 00:16:58', '2014-05-19 00:17:15', 'publish'),
(876, 'Landscape Services', '<p><span style="background-color:rgb(255, 255, 255)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n', '', 'page', 323, 'open', 0, '', 'landscape-services', 0, 1, '', '0', '2014-05-19 00:17:48', '2014-05-19 00:18:08', 'publish'),
(877, 'Ace Water Services', '<p><span style="background-color:rgb(255, 255, 255)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n', '', 'page', 323, 'open', 0, '', 'ace-water-services', 0, 1, '', '0', '2014-05-19 00:22:08', '2014-05-19 00:22:20', 'publish'),
(878, 'Our people!', 'Lorem ipsum dolor sit amet, consectetuer adipis.', '', 'banner', 323, 'open', 0, '', 'our-people-1', 1, 1, '', '0', '2014-05-19 00:47:53', '2014-05-19 00:47:58', 'publish'),
(879, 'OUR PROJECTS!', '[our-projects]', '', 'banner', 323, 'open', 0, '', 'our-projects', 1, 1, '', '0', '2014-05-19 00:48:14', '2014-05-19 00:48:19', 'publish'),
(880, 'OUR SERVICES!', 'Lorem ipsum dolor sit amet, consectetuer adipis.', '', 'banner', 323, 'open', 0, '', 'our-services-1', 1, 1, '', '0', '2014-05-19 00:48:01', '2014-05-19 00:48:06', 'publish'),
(881, 'Our Services!', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 323, 'open', 0, '', 'our-services', 0, 1, '', '0', '2014-05-19 00:37:24', '2014-05-19 00:37:33', 'publish'),
(882, 'Client Testimonials', '[client-testimonials]', '0', 'widget_item', 323, 'close', 0, 'Client Testimonials', 'client-testimonials', 0, 1, NULL, '0', '2014-05-19 01:28:33', '2014-05-19 01:28:33', 'publish'),
(883, 'Russell Moore', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', 'President of Ace Contractors Group', 'people', 323, 'open', 0, '', 'russell-moore', 0, 1, '', '0', '2014-05-19 02:17:04', '2014-05-19 02:21:57', 'publish'),
(884, 'people-3', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-3.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:21:50', '2014-05-19 02:21:50', 'Published'),
(885, 'Simon Cock', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', 'Lorem ipsum dolor sit amet', 'people', 323, 'open', 0, '', 'simon-cock', 0, 1, '', '0', '2014-05-19 02:22:40', '2014-05-19 02:23:06', 'publish'),
(886, 'people-4', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-4.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:22:59', '2014-05-19 02:22:59', 'Published'),
(887, 'Warren Higgs', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', 'consectetur adipisicing elit', 'people', 323, 'open', 0, '', 'warren-higgs', 0, 1, '', '0', '2014-05-19 02:23:11', '2014-05-19 02:24:22', 'publish'),
(888, 'people-5', NULL, NULL, 'attachment', 323, 'close', 0, '', 'http://acegroup.lightmedia.com.au/media/uploads/2014/19/people-5.jpg', 0, 1, 'image/jpeg', '0', '2014-05-19 02:24:17', '2014-05-19 02:24:17', 'Published'),
(889, 'consectetur adipisicing elit', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(102, 102, 102); font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</span></p>\r\n', '', 'people', 323, 'open', 0, '', 'consectetur-adipisicing-elit', 0, 1, '', '0', '2014-05-19 02:25:11', '2014-05-19 02:25:17', 'publish'),
(890, '3 Boxes', '<div class="col-sm-4">\r\n    <div class="post post-block">\r\n      <a href="/people">\r\n        <img src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-1.jpg" alt="">\r\n        <div class="post-content">\r\n          <h2 class="post-title">Our people!</h2>\r\n          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n        </div>\r\n      </a>\r\n    </div>\r\n  </div>\r\n  <div class="col-sm-4">\r\n    <div class="post post-block">\r\n[carousel-projects]\r\n   <div class="post-content">\r\n        <h2 class="post-title">Our Projects!</h2>\r\n        <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  <div class="col-sm-4">\r\n    <div class="post post-block">\r\n      <a href="/our-services">\r\n        <img src="http://acegroup.lightmedia.com.au/assets/site/placeholders/post-3.jpg" alt="">\r\n        <div class="post-content">\r\n          <h2 class="post-title">Our Services!</h2>\r\n          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>\r\n        </div>\r\n      </a>\r\n    </div>\r\n  </div>', '0', 'widget_item', 323, 'close', 0, '', '3-boxes', 0, 1, NULL, '0', '2014-05-19 05:19:17', '2014-05-19 05:19:17', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `ace_posts_comments`
--

CREATE TABLE `ace_posts_comments` (
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

CREATE TABLE `ace_post_recently_viewed` (
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

CREATE TABLE `ace_roles` (
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

CREATE TABLE `ace_settings` (
  `option_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `ace_settings`
--

INSERT INTO `ace_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'admin_email', 'michael@lightmedia.com.au'),
(2, 'timezone_string', '0'),
(3, 'date_format', 'Y/m/d'),
(4, 'date_format_custom', 'Y/m/d'),
(5, 'time_format', 'g:i A'),
(6, 'time_format_custom', 'g:i a'),
(7, 'paypal_email', 'support@lightmedia.com.au'),
(8, 'payment_mode', 'testing'),
(9, 'paypal_currency', 'USD'),
(10, 'default_role', '2'),
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
(39, 'on_user_lock_message', 'You account has temporary locked out.');

-- --------------------------------------------------------

--
-- Table structure for table `ace_terms`
--

CREATE TABLE `ace_terms` (
  `term_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `ace_terms`
--

INSERT INTO `ace_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(48, 'Footer Widget', 'footer-widget', 0),
(54, 'adsfdsfasdfsdf', 'adsfdsfasdfsdf', 0),
(59, 'asfasdf', 'dfasfasdf', 0),
(62, 'dsfasdfadsf', 'asdfasdfasd', 0),
(64, 'asdfasdfasdf', 'asdfasdf', 0),
(65, 'fasdfsdf', 'dsfadsfasd', 0),
(66, 'group buy', 'groupbuy', 0),
(67, 'page 2', 'page-2', 0),
(68, 'blog', 'blog', 0),
(72, 'Nav Menu', 'nav-menu', 0),
(73, 'Home', 'home', 0),
(74, 'Middle Menu', 'middle-menu', 0),
(75, 'Footer Menu', 'footer-menu', 0),
(76, 'Top Right Widget', 'top-right-widget', 0),
(77, 'Configurable Box', 'configurable-box', 0),
(78, 'Sidebar', 'sidebar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_term_relationships`
--

CREATE TABLE `ace_term_relationships` (
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
(813, 71, 0),
(837, 71, 0),
(838, 73, 0),
(852, 73, 0),
(851, 73, 0),
(854, 73, 0),
(856, 73, 0),
(858, 73, 0),
(860, 73, 0),
(850, 73, 0),
(861, 74, 0),
(878, 75, 0),
(880, 75, 0),
(879, 75, 0),
(882, 76, 0),
(719, 70, 0),
(871, 70, 0),
(718, 70, 0),
(715, 70, 0),
(716, 70, 0),
(890, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_term_taxonomy`
--

CREATE TABLE `ace_term_taxonomy` (
  `term_taxonomy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) NOT NULL,
  `taxonomy` varchar(32) DEFAULT NULL,
  `description` longtext,
  `parent` bigint(20) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`term_taxonomy_id`),
  KEY `fk_ace_term_taxonomy_ace_terms_idx` (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `ace_term_taxonomy`
--

INSERT INTO `ace_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(46, 48, 'widget', '', 0, 0),
(56, 59, 'blog-category', 'dsf', 0, 0),
(59, 62, 'category', 'adsdf', 0, 0),
(61, 64, 'promotion-category', 'asdfasdfads', 0, 0),
(62, 64, 'service-treatment-category', 'asdfasdf', 0, 0),
(63, 65, 'event-category', 'asfasdfa', 0, 0),
(64, 66, 'category', 'group buy', 0, 0),
(65, 67, 'page-category', 'page 2', 0, 0),
(66, 68, 'blog-category', 'blog', 0, 0),
(70, 72, 'nav_menu', '', 0, 0),
(71, 73, 'banner-category', '', 0, 0),
(72, 74, 'nav_menu', '', 0, 0),
(73, 75, 'nav_menu', '', 0, 0),
(74, 76, 'widget', '', 0, 0),
(75, 77, 'banner-category', '', 0, 0),
(76, 78, 'widget', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ace_usermeta`
--

CREATE TABLE `ace_usermeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_ace_usermeta_ace_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

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
(85, 331, 'is_locked_out', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ace_users`
--

CREATE TABLE `ace_users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=324 ;

--
-- Dumping data for table `ace_users`
--

INSERT INTO `ace_users` (`id`, `password`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `address_1`, `address_2`, `postcode`, `state`, `country`, `mobile`, `points`, `total_spend`, `nric`, `designation`, `avatar`, `created_at`, `updated_at`, `last_visit`, `group_id`, `activation_code`, `active`) VALUES
(323, '$2y$08$/vPj93GvF5YL6jwVSrSMle.jfsPodR4hDww8EaixStqbq0BdDVkFa', 'michael@lightmedia.com.au', 'Michael', 'Montenegro', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-03-31 02:32:50', '2014-05-14 20:04:41', NULL, 5, '5338d3d2742cd81be53dd90d9ff99cad426c04d972ab4', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ace_groups_roles`
--
ALTER TABLE `ace_groups_roles`
  ADD CONSTRAINT `fk_ace_groups_roles_ace_groups1` FOREIGN KEY (`group_id`) REFERENCES `ace_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ace_groups_roles_ace_roles1` FOREIGN KEY (`role_id`) REFERENCES `ace_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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

--
-- Constraints for table `ace_users`
--
ALTER TABLE `ace_users`
  ADD CONSTRAINT `fk_ace_users_ace_roles1` FOREIGN KEY (`group_id`) REFERENCES `ace_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
