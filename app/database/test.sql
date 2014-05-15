SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `gy_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bsd` int(6) DEFAULT NULL,
  `account_number` char(9) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `gy_cents_per_kilometre` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `engine_capacity` varchar(255) DEFAULT NULL,
  `cents_per_kilometre` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO `gy_cents_per_kilometre` (`id`, `engine_capacity`, `cents_per_kilometre`, `created_at`, `updated_at`) VALUES
(6, 'Rotary 1.301L or Over', 75, NULL, NULL),
(7, 'Rotary .08L or Less', 63, NULL, NULL),
(8, 'Rotary .0801L-1.3L', 74, NULL, NULL),
(9, 'Ordinary 2.601 or Over', 75, NULL, NULL),
(10, 'Ordinary 1.6L or Less', 63, NULL, NULL),
(11, 'Ordinary 1.061L - 2.6L', 74, NULL, NULL);

CREATE TABLE `gy_currencies` (
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_left` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_right` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_point` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '.',
  `thousands_point` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',',
  `decimal_places` tinyint(2) NOT NULL DEFAULT '0',
  `value` float(13,8) NOT NULL DEFAULT '0.00000000',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `gy_currencies` (`code`, `title`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `value`, `created_at`, `updated_at`) VALUES
('AUD', 'Australian Dollars ($)', '$', '', '.', ',', 2, 1.00000000, NULL, NULL),
('BRL', 'Brazilian Real ($)', '$', 'BRL', '.', ',', 2, 1.00000000, NULL, NULL),
('CAD', 'Canadian Dollars ($)', '$', 'CAD', '.', ',', 2, 1.00000000, NULL, NULL),
('EUR', 'Euros (€)', '€', 'EUR', '.', ',', 2, 1.00000000, NULL, NULL),
('GBP', 'Pounds Sterling (£)', '£', 'GBP', '.', ',', 2, 1.00000000, NULL, NULL),
('HKD', 'Hong Kong Dollar ($)', '$', 'HKD', '.', ',', 2, 1.00000000, NULL, NULL),
('HUF', 'Hungarian Forint', 'HUF', '', '.', ',', 2, 1.00000000, NULL, NULL),
('JPY', 'Japanese Yen (¥)', '¥', NULL, '.', ',', 2, 1.00000000, NULL, NULL),
('USD', 'US Dollar ($)', '$', 'USD', '.', ',', 2, 1.00000000, NULL, NULL);

CREATE TABLE `gy_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `gy_groups` (`id`, `group`) VALUES
(1, 'Administrator'),
(2, 'Client'),
(3, 'Accountant'),
(4, 'Agent'),
(5, 'Super User');

CREATE TABLE `gy_groups_roles` (
  `group_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `fk_gy_groups_roles_gy_roles1_idx` (`role_id`),
  KEY `fk_gy_groups_roles_gy_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gy_groups_roles` (`group_id`, `role_id`) VALUES
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

CREATE TABLE `gy_help_rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `taxable_income_from` double(8,0) unsigned DEFAULT NULL,
  `taxable_income_to` double(8,0) unsigned DEFAULT NULL,
  `repayment_rate` double(8,0) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `gy_help_rates` (`id`, `taxable_income_from`, `taxable_income_to`, `repayment_rate`, `created_at`, `updated_at`) VALUES
(7, 0, 51309, 0, '2014-04-30 18:20:41', '2014-04-30 18:20:41'),
(8, 51309, 57153, 4, '2014-04-30 18:21:55', '2014-04-30 18:21:55'),
(9, 57154, 62997, 4, '2014-04-30 18:24:22', '2014-04-30 18:24:22'),
(10, 62998, 66308, 5, '2014-04-30 18:25:43', '2014-04-30 18:25:43');

CREATE TABLE `gy_offset_rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(64) DEFAULT NULL,
  `taxable_income_from` double(7,3) DEFAULT NULL,
  `taxable_income_to` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `gy_offset_rates` (`id`, `status`, `taxable_income_from`, `taxable_income_to`, `created_at`, `updated_at`) VALUES
(4, 'family', 32.000, '34', '2014-03-12 23:47:26', '2014-03-12 23:58:29'),
(5, 'family', 4324.000, '2342343', '2014-03-13 00:03:07', '2014-03-13 00:03:07'),
(6, 'family', 34.000, '234', '2014-03-13 00:05:07', '2014-03-13 00:05:07'),
(7, 'single', 12.000, '12', '2014-03-13 17:01:00', '2014-03-13 17:06:56');

CREATE TABLE `gy_offset_rate_base_levels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `offset_rate_id` bigint(20) DEFAULT NULL,
  `level_from` tinyint(4) DEFAULT '12',
  `level_to` tinyint(4) DEFAULT '20',
  `offset_rate` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

INSERT INTO `gy_offset_rate_base_levels` (`id`, `offset_rate_id`, `level_from`, `level_to`, `offset_rate`, `created_at`, `updated_at`) VALUES
(15, 1, 0, 0, 123, '2014-03-13 16:45:28', '2014-03-13 16:45:28'),
(31, 7, 123, 12, 12, '2014-03-13 17:10:40', '2014-03-13 17:10:40'),
(32, 7, 123, 12, 12, '2014-03-13 17:10:40', '2014-03-13 17:10:40'),
(45, 4, 4, 1, 23, '2014-05-02 12:36:00', '2014-05-02 12:36:00'),
(46, 4, 22, 23, 127, '2014-05-02 12:36:00', '2014-05-02 12:36:00');

CREATE TABLE `gy_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `order_status` enum('In Progress','Cancel','Complete') DEFAULT NULL,
  `total_price` decimal(10,2) unsigned NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_points_to_earn` decimal(10,2) unsigned NOT NULL,
  `redeemable_points` decimal(10,2) unsigned NOT NULL,
  `customer_redeemed_points` decimal(10,2) NOT NULL,
  `date_order` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_orders_gy_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201301213 ;

INSERT INTO `gy_orders` (`id`, `user_id`, `order_status`, `total_price`, `total_item`, `total_points_to_earn`, `redeemable_points`, `customer_redeemed_points`, `date_order`) VALUES
(201301189, 282, 'Complete', 200.00, 10, 100.00, 100.00, 0.00, '2014-01-09 16:40:26'),
(201301190, 282, 'Complete', 9000.00, 1000, 10000.00, 10000.00, 185.00, '2014-01-09 16:42:10'),
(201301191, 296, 'Complete', 2000.00, 100, 1000.00, 1000.00, 0.00, '2014-01-09 16:56:07'),
(201301192, 282, 'Complete', 90.00, 1, 10.00, 10.00, 0.00, '2014-01-10 13:49:52'),
(201301193, 298, 'Complete', 1566.62, 2, 20.00, 20.00, 0.00, '2014-01-10 13:56:50'),
(201301194, 282, 'Complete', 90.00, 1, 10.00, 10.00, 0.00, '2014-01-13 10:36:55'),
(201301195, 282, 'Complete', 128.49, 3, 30.00, 120.00, 0.00, '2014-01-13 11:02:17'),
(201301196, 282, 'In Progress', 10.00, 1, 10.00, 100.00, 100.00, '2014-01-13 11:35:54'),
(201301197, 282, 'Complete', 10.00, 1, 10.00, 100.00, 0.00, '2014-01-13 11:36:53'),
(201301198, 282, 'Complete', 20.00, 1, 10.00, 10.00, 10.00, '2014-01-13 11:51:29'),
(201301199, 307, 'Complete', 289.00, 4, 30.00, 30.00, 0.00, '2014-01-16 01:38:03'),
(201301200, 307, 'Complete', 100.00, 2, 20.00, 20.00, 0.00, '2014-01-16 01:46:14'),
(201301201, 306, 'Complete', 20.00, 1, 10.00, 10.00, 0.00, '2014-01-21 00:51:22'),
(201301202, 306, 'Complete', 100.00, 4, 38.00, 38.00, 0.00, '2014-01-21 00:56:02'),
(201301203, 306, 'Complete', 150.00, 5, 45.00, 45.00, 45.00, '2014-01-21 00:59:27'),
(201301204, 306, 'Complete', 200.00, 4, 40.00, 40.00, 0.00, '2014-01-21 01:40:49'),
(201301205, 292, 'Complete', 60.00, 3, 30.00, 30.00, 0.00, '2014-01-23 04:03:36'),
(201301206, 292, 'Complete', 20.00, 1, 10.00, 10.00, 10.00, '2014-01-23 04:07:51'),
(201301207, 292, 'In Progress', 21.00, 2, 20.00, 20.00, 20.00, '2014-01-23 05:46:01'),
(201301208, 292, 'In Progress', 21.00, 2, 20.00, 20.00, 20.00, '2014-01-23 05:46:17'),
(201301209, 292, 'In Progress', 21.00, 2, 20.00, 20.00, 20.00, '2014-01-23 05:46:38'),
(201301210, 292, 'In Progress', 21.00, 2, 20.00, 20.00, 20.00, '2014-01-23 05:46:57'),
(201301211, 292, 'Complete', 21.00, 2, 20.00, 20.00, 20.00, '2014-01-23 05:48:34'),
(201301212, 292, 'Complete', 150.00, 15, 150.00, 150.00, 0.00, '2014-01-24 09:26:52');

CREATE TABLE `gy_password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `gy_password_reminders` (`email`, `token`, `created_at`) VALUES
('customer14@gmail.com', 'd5e841cb4e0c7c6382f2ffae7549b1b2d6295508', '2013-11-25 01:12:51'),
('philweb.programmer49@gmail.com', '4084fca72db56c6a1edec8794588e5fb51cedb43', '2014-01-07 11:38:01'),
('philweb.programmer49@gmail.com', 'c947a49c5109b930a5ce08fd0734ff6e85303826', '2014-01-07 11:39:19'),
('philweb.programmer49@gmail.com', 'bdc2afe4b6b4aebe7fd19b9f221627062a420165', '2014-01-07 11:40:33'),
('delmar@lightmedia.com.au', '109d0fc9f16dc67af1b301191f9e2cb5f80d4cf1', '2014-01-10 14:10:39');

CREATE TABLE `gy_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `payment_type` enum('fee_from_refund','payment_service_provider') DEFAULT NULL,
  `total_amount_due` double(7,2) DEFAULT NULL,
  `terms_and_condition` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `gy_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_gy_postmeta_gy_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3025 ;

INSERT INTO `gy_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(313, 48, 'attachment_title', ''),
(314, 48, 'attachment_type', 'post'),
(315, 48, 'attachment', '29'),
(316, 48, 'page_title', 'asdfasdf'),
(317, 48, 'page_meta_description', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui'),
(318, 48, 'notes', 'asdfasdfasdf'),
(1872, 506, 'page_title', '1323'),
(1873, 506, 'page_meta_description', '12 1212 12 123312'),
(1874, 506, 'notes', ''),
(2341, 590, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/13\\/no-rinse-facial-cleansers-1.jpg","type":"image\\/jpeg","size":11952,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/13\\/post-thumbnail\\/no-rinse-facial-cleansers-1.jpg","large":"media\\/uploads\\/2013\\/13\\/large\\/no-rinse-facial-cleansers-1.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/13\\/listing-thumbnail\\/no-rinse-facial-cleansers-1.jpg","medium":"media\\/uploads\\/2013\\/13\\/medium\\/no-rinse-facial-cleansers-1.jpg","thumbnail":"media\\/uploads\\/2013\\/13\\/thumbnail\\/no-rinse-facial-cleansers-1.jpg"}}'),
(2342, 591, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/13\\/banner1.png","type":"image\\/png","size":291077,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/13\\/post-thumbnail\\/banner1.png","large":"media\\/uploads\\/2013\\/13\\/large\\/banner1.png","listing-thumbnail":"media\\/uploads\\/2013\\/13\\/listing-thumbnail\\/banner1.png","medium":"media\\/uploads\\/2013\\/13\\/medium\\/banner1.png","thumbnail":"media\\/uploads\\/2013\\/13\\/thumbnail\\/banner1.png"}}'),
(2370, 595, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/04-facewash.jpg","type":"image\\/jpeg","size":26307,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/04-facewash.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/04-facewash.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/04-facewash.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/04-facewash.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/04-facewash.jpg"}}'),
(2371, 596, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","type":"image\\/jpeg","size":56102,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg"}}'),
(2373, 598, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/professionals.jpg","type":"image\\/jpeg","size":59538,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/professionals.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/professionals.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/professionals.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/professionals.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/professionals.jpg"}}'),
(2374, 599, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/glowing-skin5248-main_Full.jpg","type":"image\\/jpeg","size":25376,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/glowing-skin5248-main_Full.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/glowing-skin5248-main_Full.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/glowing-skin5248-main_Full.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/glowing-skin5248-main_Full.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/glowing-skin5248-main_Full.jpg"}}'),
(2375, 600, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/132.large.jpg","type":"image\\/jpeg","size":53768,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/132.large.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/132.large.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/132.large.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/132.large.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/132.large.jpg"}}'),
(2467, 617, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/promotion-thumb.jpg","type":"image\\/jpeg","size":85405,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/promotion-thumb.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/promotion-thumb.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/promotion-thumb.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/promotion-thumb.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/promotion-thumb.jpg"}}'),
(2468, 618, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy5.jpg","type":"image\\/jpeg","size":80093,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy5.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy5.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy5.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy5.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy5.jpg"}}'),
(2469, 619, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy1.jpg","type":"image\\/jpeg","size":73753,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy1.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy1.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy1.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy1.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy1.jpg"}}'),
(2470, 620, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy2.jpg","type":"image\\/jpeg","size":70801,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy2.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy2.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy2.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy2.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy2.jpg"}}'),
(2471, 621, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy3.jpg","type":"image\\/jpeg","size":69905,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy3.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy3.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy3.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy3.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy3.jpg"}}'),
(2472, 622, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy4.jpg","type":"image\\/jpeg","size":111654,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy4.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy4.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy4.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy4.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy4.jpg"}}'),
(2510, 634, '_widget_item_object_id', NULL),
(2511, 634, '_widget_item_object', 'custom'),
(2512, 634, '_widget_item_type', 'custom'),
(2513, 634, '_widget_item_classes', 'N;'),
(2514, 634, '_widget_item_target', '0'),
(2515, 634, '_widget_item_url', 'http://'),
(2572, 641, 'page_title', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2573, 641, 'page_meta_description', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2642, 595, 'attachment_image_alt', 'adsfasdf'),
(2643, 652, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/23\\/memos.jpg","type":"image\\/jpeg","size":23134,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/23\\/post-thumbnail\\/memos.jpg","large":"media\\/uploads\\/2014\\/23\\/large\\/memos.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/23\\/listing-thumbnail\\/memos.jpg","medium":"media\\/uploads\\/2014\\/23\\/medium\\/memos.jpg","thumbnail":"media\\/uploads\\/2014\\/23\\/thumbnail\\/memos.jpg"}}'),
(2644, 621, 'attachment_image_alt', ''),
(2645, 596, 'attachment_image_alt', 'adsfasdfadsfadsf'),
(2690, 657, 'page_title', 'Treatments & Services '),
(2691, 657, 'page_meta_description', 'Treatments & Services '),
(2714, 663, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/23\\/plus.png","type":"image\\/png","size":2377,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/23\\/post-thumbnail\\/plus.png","large":"media\\/uploads\\/2014\\/23\\/large\\/plus.png","listing-thumbnail":"media\\/uploads\\/2014\\/23\\/listing-thumbnail\\/plus.png","medium":"media\\/uploads\\/2014\\/23\\/medium\\/plus.png","thumbnail":"media\\/uploads\\/2014\\/23\\/thumbnail\\/plus.png"}}'),
(2885, 622, 'attachment_image_alt', ''),
(2929, 657, 'page_template', 'treatments-services-template'),
(2938, 697, '_widget_item_object_id', NULL),
(2939, 697, '_widget_item_object', 'custom'),
(2940, 697, '_widget_item_type', 'custom'),
(2941, 698, '_widget_item_object_id', NULL),
(2942, 698, '_widget_item_object', 'custom'),
(2943, 698, '_widget_item_type', 'custom'),
(2950, 652, 'attachment_image_alt', 'sdafdsadf asdf'),
(2954, 506, 'attachment_title', ''),
(2955, 506, 'attachment_type', 'post'),
(2956, 506, 'attachment', '618'),
(2963, 710, 'page_title', 'Contact us'),
(2964, 710, 'page_meta_description', 'Dsd'),
(2973, 713, 'page_title', 'About us'),
(2974, 713, 'page_meta_description', 'About us lorem ipsum'),
(2975, 714, '_menu_item_object_id', '713'),
(2976, 714, '_menu_item_object', 'page'),
(2977, 714, '_menu_item_type', 'post'),
(2978, 714, '_menu_item_url', 'http://'),
(2979, 715, '_menu_item_object_id', NULL),
(2980, 715, '_menu_item_object', 'custom'),
(2981, 715, '_menu_item_type', 'custom'),
(2982, 715, '_menu_item_url', 'http://gytbo.local.com/pricings'),
(2983, 716, '_menu_item_object_id', NULL),
(2984, 716, '_menu_item_object', 'custom'),
(2985, 716, '_menu_item_type', 'custom'),
(2986, 716, '_menu_item_url', 'http://gytbo.local.com/blogs'),
(2987, 718, '_menu_item_object_id', NULL),
(2988, 718, '_menu_item_object', 'custom'),
(2989, 718, '_menu_item_type', 'custom'),
(2990, 718, '_menu_item_url', 'http://gytbo.local.com/benefits'),
(2991, 719, '_menu_item_object_id', NULL),
(2992, 719, '_menu_item_object', 'custom'),
(2993, 719, '_menu_item_type', 'custom'),
(2994, 719, '_menu_item_url', 'http://gytbo.local.com'),
(2995, 719, '_menu_item_classes', 's:0:"";'),
(2996, 719, '_menu_item_target', '0'),
(2997, 714, '_menu_item_classes', 's:0:"";'),
(2998, 714, '_menu_item_target', '0'),
(2999, 718, '_menu_item_classes', 's:0:"";'),
(3000, 718, '_menu_item_target', '0'),
(3001, 715, '_menu_item_classes', 's:0:"";'),
(3002, 715, '_menu_item_target', '0'),
(3003, 716, '_menu_item_classes', 's:0:"";'),
(3004, 716, '_menu_item_target', '0'),
(3007, 724, 'page_title', 'fadsfa'),
(3008, 724, 'page_meta_description', 'asdf adsf'),
(3009, 722, 'page_title', ''),
(3010, 722, 'page_meta_description', ''),
(3017, 727, 'page_title', ''),
(3018, 727, 'page_meta_description', ''),
(3019, 728, '_menu_item_object_id', NULL),
(3020, 728, '_menu_item_object', 'custom'),
(3021, 728, '_menu_item_type', 'custom'),
(3022, 728, '_menu_item_url', 'http://gytbo.local.com/contact-us'),
(3023, 728, '_menu_item_classes', 's:0:"";'),
(3024, 728, '_menu_item_target', '0');

CREATE TABLE `gy_posts` (
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
  KEY `fk_gy_posts_gy_users1_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=729 ;

INSERT INTO `gy_posts` (`id`, `post_title`, `post_content`, `post_excerpt`, `post_type`, `author_id`, `comment_status`, `post_parent`, `post_name`, `guid`, `menu_order`, `menu_level`, `post_mimetype`, `comment_count`, `post_date`, `updated_at`, `post_status`) VALUES
(48, 'Privacy Policy', '<p><span style="background-color:rgb(255, 255, 255)">Sed&nbsp;</span><strong>ut perspiciatis unde omnis</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem&nbsp;</span><strong>sequi nesciunt. Neque porro quisquam</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui', 'page', 1, 'open', 0, '', 'privacy-policy-1', 0, 1, '', '', '2013-12-12 03:05:46', '2013-12-12 03:05:52', 'publish'),
(506, 'Disclaimer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>[contactus &quot;title&quot;=&quot;Contact US&quot;]</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '123', 'page', 1, 'open', 0, '', 'disclaimer', 0, 1, '', '0', '2014-03-17 10:01:04', '2014-03-17 10:01:27', 'publish'),
(590, 'no-rinse-facial-cleansers-1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/13/no-rinse-facial-cleansers-1.jpg', 0, 1, 'image/jpeg', '0', '2013-12-13 01:15:05', '2013-12-13 01:15:05', 'Published'),
(591, 'banner1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/13/banner1.png', 0, 1, 'image/png', '0', '2013-12-13 01:16:27', '2013-12-13 01:16:27', 'Published'),
(595, '04-facewash', '<p>fasdfasdfasdfasdf</p>\r\n', 'asdfasf', 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/17/04-facewash.jpg', 0, 1, 'image/jpeg', '0', '2014-01-24 01:17:15', '2014-01-24 01:17:15', 'draft'),
(596, '9e29655b84d5ef53_whats-the-best-face-wash.preview', '<p>dsfadsfasdf</p>\r\n', 'asdfasf', 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/17/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg', 0, 1, 'image/jpeg', '0', '2014-01-23 05:21:04', '2014-01-23 05:21:04', 'draft'),
(598, 'professionals', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/17/professionals.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:40', '2013-12-16 16:21:40', 'Published'),
(599, 'glowing-skin5248-main_Full', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/17/glowing-skin5248-main_Full.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:40', '2013-12-16 16:21:40', 'Published'),
(600, '132.large', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/17/132.large.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:41', '2013-12-16 16:21:41', 'Published'),
(617, 'promotion-thumb', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/promotion-thumb.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:01', '2013-12-17 17:13:01', 'Published'),
(618, 'dummy5', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/dummy5.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:01', '2013-12-17 17:13:01', 'Published'),
(619, 'dummy1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/dummy1.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:02', '2013-12-17 17:13:02', 'Published'),
(620, 'dummy2', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/dummy2.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:02', '2013-12-17 17:13:02', 'Published'),
(621, 'dummy3', '', '', 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/dummy3.jpg', 0, 1, 'image/jpeg', '0', '2014-01-23 05:12:06', '2014-01-23 05:12:06', 'draft'),
(622, 'dummy4', '', '', 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2013/18/dummy4.jpg', 0, 1, 'image/jpeg', '0', '2014-01-24 01:20:49', '2014-01-24 01:20:49', 'draft'),
(634, 'Content', '<ul class="social pull-left">\r\n            <li><a class="facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>\r\n            <li><a class="twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>\r\n            <li><a class="pinterest" href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>\r\n            <li><a class="gplus" href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>\r\n            <li><a class="youtube" href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>\r\n            <li><a class="instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>\r\n          </ul>\r\n\r\n          <ul class="list-inline list-inline-separator pull-right">            \r\n            <li>\r\n              Hotline: (65) 6100 6868\r\n            </li>\r\n            <li>\r\n                <span class="copyright">\r\n                  &copy; 2014 ClearSK™\r\n                </span>\r\n              </a>\r\n            </li>\r\n          </ul>', '0', 'widget_item', 1, 'close', 0, 'Content', 'content', 0, 1, NULL, '0', '2014-01-27 02:20:55', '2014-01-27 02:20:55', 'publish'),
(641, 'Terms & Conditions', '<p><span style="font-size:18px"><strong>Lorem ipsum dolor</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>Lorem ipsum dolor&nbsp;</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '', 'page', 1, 'open', 0, '', 'terms-conditions', 0, 1, '', '0', '2014-01-13 11:10:16', '2014-01-13 11:10:49', 'publish'),
(652, 'memosadsf', ' asdfasdf', 'afdsfadsfa', 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2014/23/memos.jpg', 0, 1, 'image/jpeg', '0', '2014-03-07 08:09:32', '2014-03-07 08:09:32', 'draft'),
(657, 'Treatments & Services', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'page', 1, 'open', 0, '', 'treatments-services', 0, 1, '', '0', '2014-01-28 09:22:51', '2014-01-28 09:23:08', 'publish'),
(663, 'plus', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://gy.local.com/media/uploads/2014/23/plus.png', 0, 1, 'image/png', '0', '2014-01-23 01:00:55', '2014-01-23 01:00:55', 'Published'),
(697, 'sdf asdf asdf', 'adfasd a asd fasdf', NULL, 'widget_item', 1, 'close', 0, 'sdf asdf asdf', 'sdf-asdf-asdf', 0, 1, NULL, '0', '2014-02-18 09:33:54', '2014-02-18 09:33:54', 'draft'),
(698, 'asdf', 'ads asdf', NULL, 'widget_item', 1, 'close', 0, 'asdf', 'asdf', 0, 1, NULL, '0', '2014-02-18 09:34:09', '2014-02-18 09:34:09', 'draft'),
(710, 'Contact us', '', '', 'page', 1, 'open', 0, '', 'contact-us-1', 0, 1, '', '0', '2014-03-17 07:55:58', '2014-03-17 07:56:04', 'publish'),
(713, 'about-us', '', '', 'page', 1, 'open', 0, '', 'about-us', 0, 1, '', '0', '2014-03-23 02:21:16', '2014-03-23 02:22:14', 'publish'),
(714, 'about-us', '', '', 'nav_menu_item', 1, 'close', 0, '713', 'about-us-1', 1, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish'),
(715, 'Pricings', '', '', 'nav_menu_item', 1, 'close', 0, 'Pricings', 'pricings', 3, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish'),
(716, 'Blogs', '', '', 'nav_menu_item', 1, 'close', 0, 'Blog', 'blogs', 4, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish'),
(717, 'Draft', NULL, NULL, 'page', 1, 'open', 0, '', 'draft-1', 0, 1, NULL, '0', '2014-03-23 02:24:31', '2014-03-23 02:24:31', 'auto-draft'),
(718, 'Benefits', '', '', 'nav_menu_item', 1, 'close', 0, 'Benefits', 'benefits', 2, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish'),
(719, 'Home', '', '', 'nav_menu_item', 1, 'close', 0, 'Home', 'home', 0, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish'),
(722, 'Auto Draft', '<p><span style=\\"font-size:14px\\"><strong>asdfa dsfasdf</strong></span></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam assumenda atque consectetur dolorum ea</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>est, incidunt iste labore magni molestias mollitia nihil nobis nulla officia optio qui reiciendis saepe voluptas!</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam assumenda atque consectetur dolorum ea</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>est, incidunt iste labore magni molestias mollitia nihil nobis nulla officia optio qui reiciendis saepe voluptas!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'blog', 1, 'open', 0, '', 'auto-draft', 0, 1, '', '0', '2014-03-23 03:13:44', '2014-03-17 07:12:46', 'publish'),
(723, 'Auto Draft', NULL, NULL, 'blog', 1, 'open', 0, '', 'auto-draft-1', 0, 1, NULL, '0', '2014-03-17 06:32:19', '2014-03-17 06:32:19', 'auto-draft'),
(724, 'John', '<p>adsfadsf adsf</p>\r\n', 'adfasd ads', 'blog', 1, 'open', 0, '', 'sample1', 0, 1, '', '0', '2014-03-17 06:33:20', '2014-03-17 06:33:55', 'publish'),
(725, 'Draft', NULL, NULL, 'page', 1, 'open', 0, '', 'draft', 0, 1, NULL, '0', '2014-03-17 09:58:56', '2014-03-17 09:58:56', 'auto-draft'),
(727, 'Thanks for contacting us.', '<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This email is checked regularly during business hours (9-5 EST). We&rsquo;ll get back to you as soon as possible, usually within a few hours. Either John or Jay will respond to your email.</p>\r\n\r\n<p>Until then, make sure to check out the following resources:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Frequently Asked Questions</strong>:&nbsp;<a href="/#">www.gytbo.local.com/faqs/</a>and</p>\r\n\r\n\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 1, 'open', 0, '', 'contact-us-thank-you', 0, 1, '', '0', '2014-03-18 07:40:44', '2014-03-18 07:41:39', 'publish'),
(728, 'Contact Us', '', '', 'nav_menu_item', 1, 'close', 0, 'Contact Us', 'contact-us', 5, 1, NULL, '0', '2014-03-18 07:31:35', '2014-03-18 07:31:35', 'publish');

CREATE TABLE `gy_posts_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_posts_comments_gy_users1_idx` (`user_id`),
  KEY `fk_gy_posts_comments_gy_posts1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `gy_post_recently_viewed` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_type` varchar(60) NOT NULL,
  `date_viewed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_recent_viewed_gy_users1_idx` (`user_id`),
  KEY `fk_gy_recent_viewed_gy_posts1` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

INSERT INTO `gy_post_recently_viewed` (`id`, `post_id`, `user_id`, `post_type`, `date_viewed`) VALUES
(153, 724, 1, 'blog', '2014-03-17 07:01:55'),
(154, 722, 1, 'blog', '2014-03-17 07:18:05');

CREATE TABLE `gy_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `capability` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

INSERT INTO `gy_roles` (`id`, `capability`) VALUES
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

CREATE TABLE `gy_settings` (
  `option_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

INSERT INTO `gy_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'admin_email', 'philwebservices.programmer25@gmail.com'),
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
(21, 'site_page_title', 'Gytbo '),
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

CREATE TABLE `gy_tax_address` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `postal_address_1` text,
  `postal_address_2` text,
  `postal_post_code` varchar(16) DEFAULT NULL,
  `postal_suburb` varchar(40) DEFAULT NULL,
  `postal_state` varchar(100) DEFAULT NULL,
  `home_address_1` text,
  `home_address_2` text,
  `home_post_code` varchar(16) DEFAULT NULL,
  `home_suburb` varchar(40) DEFAULT NULL,
  `home_state` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `home_is_postal` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

INSERT INTO `gy_tax_address` (`id`, `user_tax_year_id`, `postal_address_1`, `postal_address_2`, `postal_post_code`, `postal_suburb`, `postal_state`, `home_address_1`, `home_address_2`, `home_post_code`, `home_suburb`, `home_state`, `created_at`, `updated_at`, `deleted_at`, `home_is_postal`) VALUES
(81, 8, 'SDFDSF', 'SDFDS', '3234', 'Johndoe', 'SA', 'DSFDF', '234', '6000', '34234', 'SA', '2014-03-28 13:34:24', '2014-03-28 13:34:24', NULL, 0),
(82, 13, 'SDFDSf', 'SDFDS', '2232', '23', 'NSW', 'SDFDSf', 'SDFDS', '2232', '23', 'NSW', '2014-03-28 18:17:28', '2014-05-01 12:18:52', NULL, 0),
(83, 12, '234234234', '', '2323', 'Subjeodfi', 'NT', '234234234', '', '2323', 'Subjeodfi', 'NT', '2014-03-31 11:14:06', '2014-04-30 11:18:39', NULL, 1),
(84, 21, '234234234', '', '6000', '234234', 'NSW', '234234234', '', '6000', '234234', 'NSW', '2014-04-30 16:34:19', '2014-04-30 16:34:19', NULL, 1);

CREATE TABLE `gy_tax_bank_interests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `interest` double(8,0) unsigned DEFAULT NULL,
  `tax_withheld` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

INSERT INTO `gy_tax_bank_interests` (`id`, `user_tax_year_id`, `bank`, `interest`, `tax_withheld`, `created_at`, `updated_at`, `deleted_at`) VALUES
(152, 2, 'DFSsdf', 23, 2342, '2014-03-28 11:20:01', '2014-03-28 11:20:01', NULL),
(153, 2, 'SDFSDF', 234, 234, '2014-03-28 11:20:01', '2014-03-28 11:20:01', NULL),
(162, 8, 'SDFWEESDD', 34, 12, '2014-03-28 17:51:49', '2014-03-28 17:51:49', NULL),
(198, 12, '23423', 0, 0, '2014-04-30 12:04:06', '2014-04-30 12:04:06', NULL),
(201, 13, 'DSF', 223, 23, '2014-05-01 13:38:37', '2014-05-01 13:38:37', NULL);

CREATE TABLE `gy_tax_car_expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `cents_per_kilometre_id` int(11) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `engine_capacity` varchar(255) DEFAULT NULL,
  `cents_per_kilometre` int(11) DEFAULT NULL,
  `business_kilometre` int(11) DEFAULT NULL,
  `has_claimed_log_book` tinyint(1) DEFAULT '0',
  `total_expenses` double(8,0) unsigned DEFAULT NULL,
  `business_percentage` tinyint(3) DEFAULT NULL,
  `car_purchase_date` date DEFAULT NULL,
  `car_purchase_amount` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

INSERT INTO `gy_tax_car_expenses` (`id`, `user_tax_year_id`, `cents_per_kilometre_id`, `registration`, `engine_capacity`, `cents_per_kilometre`, `business_kilometre`, `has_claimed_log_book`, `total_expenses`, `business_percentage`, `car_purchase_date`, `car_purchase_amount`, `created_at`, `updated_at`) VALUES
(8, 8, 7, 'SDF234', 'Rotary .08L or Less', 63, 23, 0, NULL, NULL, '2014-05-01', NULL, '2014-03-28 15:38:52', '2014-03-28 15:38:52'),
(16, 12, 10, 'DSFD', 'Ordinary 1.6L or Less', 63, 500, 0, NULL, NULL, '2014-05-01', NULL, '2014-03-31 21:37:40', '2014-03-31 21:37:40'),
(18, 13, 7, '123', 'Rotary .08L or Less', 63, 232, 0, NULL, NULL, '2014-05-01', NULL, '2014-05-01 13:34:53', '2014-05-01 13:34:53'),
(42, 21, 6, 'SDF', 'Rotary 1.301L or Over', 75, 0, 1, 123, 23, '2014-01-24', 123, '2014-05-01 23:18:24', '2014-05-01 23:18:24');

CREATE TABLE `gy_tax_dividends` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `unfranked_divident` double(8,0) unsigned DEFAULT NULL,
  `franked_divident` double(8,0) unsigned DEFAULT NULL,
  `franking_credit` double(8,0) unsigned DEFAULT NULL,
  `tax_withheld` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

INSERT INTO `gy_tax_dividends` (`id`, `user_tax_year_id`, `company`, `unfranked_divident`, `franked_divident`, `franking_credit`, `tax_withheld`, `created_at`, `updated_at`, `deleted_at`) VALUES
(80, 2, '23423423', 23, 32, 14, 34, '2014-03-28 11:20:01', '2014-03-28 11:20:01', NULL),
(88, 8, 'werwer', 23, 23, 10, 0, '2014-03-28 17:51:49', '2014-03-28 17:51:49', NULL),
(108, 12, 'SDFSD', 23, 234, 100, 34, '2014-04-30 12:04:06', '2014-04-30 12:04:06', NULL);

CREATE TABLE `gy_tax_family_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `has_dependents` tinyint(1) unsigned DEFAULT NULL,
  `has_spouse` tinyint(1) unsigned DEFAULT NULL,
  `spouses_income` double(7,3) DEFAULT NULL,
  `spouses_from` date DEFAULT NULL,
  `spouses_to` date DEFAULT NULL,
  `spouses_dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link_spouse_account` tinyint(1) DEFAULT NULL,
  `no_of_dependents` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `gy_tax_family_status` (`id`, `user_tax_year_id`, `has_dependents`, `has_spouse`, `spouses_income`, `spouses_from`, `spouses_to`, `spouses_dob`, `link_spouse_account`, `no_of_dependents`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 0, NULL, NULL, NULL, '2014-03-31 07:31:54', NULL, 0, '2014-04-02 13:48:32', '2014-03-28 12:22:15', NULL),
(2, 6, NULL, 0, NULL, NULL, NULL, '2014-03-31 07:31:54', NULL, 0, '2014-03-28 13:02:09', '2014-03-28 13:15:54', NULL),
(3, 6, NULL, 0, NULL, NULL, NULL, '2014-03-31 07:31:54', NULL, 0, '2014-03-28 13:02:15', '2014-03-28 13:02:15', NULL),
(4, 8, NULL, 0, NULL, NULL, NULL, '2014-03-31 07:31:54', NULL, 0, '2014-03-28 13:34:24', '2014-03-28 17:49:55', NULL),
(5, 13, NULL, 0, NULL, NULL, NULL, '2014-03-31 07:31:54', NULL, 0, '2014-03-28 18:17:28', '2014-03-28 18:34:40', NULL),
(6, 12, NULL, 1, 0.000, '2013-11-11', '2013-11-11', '2011-11-26 16:00:00', 0, 1, '2014-03-31 11:14:06', '2014-04-30 12:47:29', NULL),
(7, 21, NULL, 0, NULL, NULL, NULL, '2014-04-30 08:34:19', NULL, 0, '2014-04-30 16:34:19', '2014-04-30 16:34:19', NULL);

CREATE TABLE `gy_tax_help_debt` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `has_help_debt` tinyint(1) DEFAULT '0',
  `help_debt_amount` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

INSERT INTO `gy_tax_help_debt` (`id`, `user_tax_year_id`, `has_help_debt`, `help_debt_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 0, '', '2014-03-27 21:13:03', '2014-03-27 21:13:03', NULL),
(2, NULL, 1, '34', '2014-03-27 21:13:20', '2014-03-27 21:13:20', NULL),
(3, NULL, 1, '34', '2014-03-27 21:13:25', '2014-03-27 21:13:25', NULL),
(4, NULL, 1, '23', '2014-03-27 21:16:02', '2014-03-27 21:16:02', NULL),
(5, NULL, 1, '23', '2014-03-27 21:16:59', '2014-03-27 21:16:59', NULL),
(6, NULL, 1, '23', '2014-03-27 21:17:22', '2014-03-27 21:17:22', NULL),
(18, 2, 1, '23', '2014-03-28 11:37:19', '2014-03-28 11:37:19', NULL),
(40, 8, 1, '234', '2014-03-28 15:17:23', '2014-03-28 15:17:23', NULL),
(45, 21, 1, '23', '2014-05-01 23:17:43', '2014-05-01 23:17:43', NULL);

CREATE TABLE `gy_tax_income_types` (
  `guid` varchar(64) NOT NULL,
  `income_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`guid`),
  UNIQUE KEY `guid_UNIQUE` (`guid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gy_tax_income_types` (`guid`, `income_type_name`) VALUES
('austudy', 'Austudy'),
('foreign_income', 'Foreign Income'),
('newstart', 'NewsStart'),
('pension', 'Pension'),
('rent', 'Rent'),
('youth_allowance', 'Youth Allowance');

CREATE TABLE `gy_tax_medicare` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `exemption` tinyint(3) DEFAULT NULL,
  `has_covered_pphc` tinyint(1) DEFAULT NULL,
  `levy_surcharge_no_days` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

INSERT INTO `gy_tax_medicare` (`id`, `user_tax_year_id`, `exemption`, `has_covered_pphc`, `levy_surcharge_no_days`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 25, 1, 23, '2014-04-02 16:04:02', '2014-03-27 20:24:13', NULL),
(2, 2, 25, 0, NULL, '2014-04-02 16:04:13', '2014-04-02 16:04:13', NULL),
(3, 2, 25, 0, NULL, '2014-04-02 16:04:20', '2014-04-02 16:04:20', NULL),
(4, 2, 25, 0, NULL, '2014-04-02 16:13:40', '2014-04-02 16:13:40', NULL),
(5, 2, 25, 0, NULL, '2014-04-02 16:15:09', '2014-04-02 16:15:09', NULL),
(6, 2, 25, 0, NULL, '2014-04-02 16:17:03', '2014-04-02 16:17:03', NULL),
(7, 2, 25, 0, NULL, '2014-04-02 16:20:43', '2014-04-02 16:20:43', NULL),
(8, 2, 25, 0, NULL, '2014-04-02 16:21:14', '2014-04-02 16:21:14', NULL),
(9, 2, 25, 0, NULL, '2014-04-02 16:22:24', '2014-04-02 16:22:24', NULL),
(10, 2, 25, 0, NULL, '2014-04-02 16:24:53', '2014-04-02 16:24:53', NULL),
(11, 2, 25, 0, NULL, '2014-04-02 16:24:58', '2014-04-02 16:24:58', NULL),
(12, 2, 25, 0, NULL, '2014-04-02 16:25:40', '2014-04-02 16:25:40', NULL),
(13, 2, 25, 0, NULL, '2014-04-02 16:26:22', '2014-04-02 16:26:22', NULL),
(14, 2, 25, 0, NULL, '2014-04-02 16:26:33', '2014-04-02 16:26:33', NULL),
(15, 2, 25, 0, NULL, '2014-04-02 16:26:45', '2014-04-02 16:26:45', NULL),
(16, 2, 25, 0, NULL, '2014-04-02 16:39:22', '2014-04-02 16:39:22', NULL),
(17, 2, 25, 0, NULL, '2014-04-02 16:39:35', '2014-04-02 16:39:35', NULL),
(18, 2, 25, 0, NULL, '2014-04-02 18:04:51', '2014-04-02 18:04:51', NULL),
(19, 2, 25, 0, NULL, '2014-04-03 17:06:35', '2014-04-03 17:06:35', NULL),
(20, 2, 25, 0, NULL, '2014-04-03 17:49:53', '2014-04-03 17:49:53', NULL),
(21, 2, 25, 0, NULL, '2014-04-03 21:00:10', '2014-04-03 21:00:10', NULL),
(22, 2, 25, 0, NULL, '2014-04-03 23:47:15', '2014-04-03 23:47:15', NULL),
(23, 2, 25, 0, NULL, '2014-04-03 23:47:23', '2014-04-03 23:47:23', NULL),
(24, 2, 25, 0, NULL, '2014-04-06 10:29:42', '2014-04-06 10:29:42', NULL),
(25, 2, 25, 0, NULL, '2014-04-06 10:32:43', '2014-04-06 10:32:43', NULL),
(26, 2, 25, 0, NULL, '2014-04-06 13:05:54', '2014-04-06 13:05:54', NULL),
(27, 2, 25, 0, NULL, '2014-04-06 13:42:44', '2014-04-06 13:42:44', NULL),
(28, 2, 25, 0, NULL, '2014-04-06 13:54:55', '2014-04-06 13:54:55', NULL),
(29, 2, 25, 0, NULL, '2014-04-06 14:43:49', '2014-04-06 14:43:49', NULL),
(30, 2, 25, 0, NULL, '2014-04-06 18:01:29', '2014-04-06 18:01:29', NULL),
(31, 2, 25, 0, NULL, '2014-04-07 10:32:10', '2014-04-07 10:32:10', NULL),
(32, 2, 25, 0, NULL, '2014-04-07 11:59:45', '2014-04-07 11:59:45', NULL),
(33, 2, 25, 0, NULL, '2014-04-07 13:01:39', '2014-04-07 13:01:39', NULL),
(34, 2, 25, 0, NULL, '2014-03-25 14:55:08', '2014-03-25 14:55:08', NULL),
(35, 2, 25, 0, NULL, '2014-03-25 16:44:24', '2014-03-25 16:44:24', NULL),
(36, 2, 25, 0, NULL, '2014-03-25 21:08:05', '2014-03-25 21:08:05', NULL),
(37, 2, 25, 0, NULL, '2014-03-26 11:25:03', '2014-03-26 11:25:03', NULL),
(38, 2, 25, 0, NULL, '2014-03-26 12:05:40', '2014-03-26 12:05:40', NULL),
(39, 2, 25, 0, NULL, '2014-03-26 20:18:34', '2014-03-26 20:18:34', NULL),
(40, 2, 25, 0, NULL, '2014-03-26 22:10:20', '2014-03-26 22:10:20', NULL),
(41, 2, 25, 0, NULL, '2014-03-27 10:47:58', '2014-03-27 10:47:58', NULL),
(42, 2, 25, 0, NULL, '2014-03-27 11:29:37', '2014-03-27 11:29:37', NULL),
(43, 6, 23, 0, NULL, '2014-03-28 13:02:09', '2014-03-28 13:02:09', NULL),
(44, 6, 23, 0, NULL, '2014-03-28 13:02:15', '2014-03-28 13:02:15', NULL),
(45, 8, 23, 1, 12, '2014-03-28 13:34:24', '2014-03-28 14:54:50', NULL),
(46, 13, 23, 0, NULL, '2014-03-28 18:17:28', '2014-03-28 18:17:28', NULL),
(47, 12, 127, 0, 0, '2014-03-31 11:14:06', '2014-03-31 15:24:39', NULL),
(48, 21, 60, 0, 23, '2014-04-30 16:34:19', '2014-05-01 22:38:24', NULL);

CREATE TABLE `gy_tax_mls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tax_year` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `taxable_income_from` double(8,0) unsigned DEFAULT NULL,
  `taxable_income_to` double(8,0) unsigned DEFAULT NULL,
  `mls_rate` double(5,2) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO `gy_tax_mls` (`id`, `tax_year`, `status`, `taxable_income_from`, `taxable_income_to`, `mls_rate`, `created_at`, `updated_at`) VALUES
(4, NULL, 'single', 0, 84000, 0.00, '2014-03-31 21:49:50', '2014-03-31 21:50:47'),
(5, NULL, 'single', 84001, 97000, 125.00, '2014-03-31 21:51:20', '2014-03-31 21:52:45'),
(6, NULL, 'single', 130001, 0, 150.00, '2014-03-31 22:05:03', '2014-03-31 22:05:03'),
(7, NULL, 'single', 97001, 130000, 125.00, '2014-03-31 22:08:22', '2014-03-31 22:08:22'),
(8, NULL, 'family', 0, 168000, 0.00, '2014-03-31 22:09:17', '2014-03-31 22:11:32'),
(9, NULL, 'family', 168001, 194000, 100.00, '2014-03-31 22:12:00', '2014-03-31 22:13:45'),
(10, NULL, 'family', 194001, 260000, 125.00, '2014-03-31 22:12:20', '2014-03-31 22:12:52'),
(11, NULL, 'family', 260001, 0, 150.00, '2014-03-31 22:14:04', '2014-03-31 22:15:36');

CREATE TABLE `gy_tax_other_deductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `deduction_type_code` varchar(64) DEFAULT NULL,
  `description` text,
  `amount` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

INSERT INTO `gy_tax_other_deductions` (`id`, `user_tax_year_id`, `deduction_type_code`, `description`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(87, 2, 'other_dividend_deductions', 'SDF', 234, '2014-03-27 22:51:56', '2014-03-27 22:51:56', NULL),
(88, 12, 'other_gift_donation', '123', 123123, '2014-04-30 12:08:37', '2014-04-30 12:08:37', NULL),
(90, 13, 'other_dividend_deductions', '2323', 2323, '2014-05-01 13:35:28', '2014-05-01 13:35:28', NULL);

CREATE TABLE `gy_tax_other_income` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `income_type_guid` varchar(64) DEFAULT NULL,
  `description` text,
  `amount` double(8,0) unsigned DEFAULT NULL,
  `tax_withheld` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

INSERT INTO `gy_tax_other_income` (`id`, `user_tax_year_id`, `income_type_guid`, `description`, `amount`, `tax_withheld`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 2, 'foreign_income', 'The Description field is requir', 234, 23, '2014-03-28 11:20:01', '2014-03-28 11:20:01', NULL);

CREATE TABLE `gy_tax_phi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `health_fund_name` varchar(255) DEFAULT NULL,
  `membership_no` varchar(64) DEFAULT NULL,
  `benefit_code` varchar(64) DEFAULT NULL,
  `type_of_coverage` varchar(255) DEFAULT NULL,
  `tax_claim_code` char(1) DEFAULT NULL,
  `australian_government_rebate` double(8,0) unsigned DEFAULT NULL,
  `premiums_paid` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

INSERT INTO `gy_tax_phi` (`id`, `user_tax_year_id`, `health_fund_name`, `membership_no`, `benefit_code`, `type_of_coverage`, `tax_claim_code`, `australian_government_rebate`, `premiums_paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 8, 'MBP - medicare Private', 'DSFDS', '30', 'MBP - medicare Private', 'A', 23, 23, '0000-00-00 00:00:00', '2014-03-28 15:17:23', NULL),
(59, 12, 'MBP - medicare Private', 'SDFSDF', '30', 'MBP - medicare Private', 'A', 2343, 23423, '0000-00-00 00:00:00', '2014-04-30 13:00:18', NULL),
(60, 13, 'MBP - medicare Private', 'SDF', '30', 'MBP - medicare Private', 'A', 23, 23, '0000-00-00 00:00:00', '2014-05-01 13:35:39', NULL);

CREATE TABLE `gy_tax_rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `taxable_income_from` double(8,0) unsigned DEFAULT NULL,
  `taxable_income_to` double(8,0) unsigned DEFAULT NULL,
  `has_tax` tinyint(1) DEFAULT NULL,
  `start_at` double(8,0) unsigned DEFAULT NULL,
  `cents_per_dollar` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `gy_tax_rates` (`id`, `taxable_income_from`, `taxable_income_to`, `has_tax`, `start_at`, `cents_per_dollar`, `created_at`, `updated_at`) VALUES
(5, 0, 18200, 0, 0, 0, '2014-03-28 15:52:21', '2014-03-28 15:52:21'),
(6, 18201, 37000, 1, 0, 19, '2014-03-28 15:53:08', '2014-03-28 15:53:08'),
(7, 37001, 80000, 1, 3772, 32, '2014-03-28 15:53:51', '2014-03-28 15:55:07'),
(8, 80001, 180000, 1, 17547, 37, '2014-03-28 15:55:56', '2014-03-28 16:04:48'),
(9, 180001, 0, 1, 54547, 45, '2014-03-28 15:57:59', '2014-03-28 16:06:25');

CREATE TABLE `gy_tax_salary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `payers_abn` varchar(64) DEFAULT NULL,
  `payers_name` varchar(64) DEFAULT NULL,
  `gross_salary` double(8,0) unsigned DEFAULT NULL,
  `tax_withheld` double(8,0) unsigned DEFAULT NULL,
  `fringe_benefits` double(8,0) unsigned DEFAULT NULL,
  `allowance_amount` double(8,0) unsigned DEFAULT NULL,
  `lump_sum_amount` double(8,0) unsigned DEFAULT NULL,
  `lump_sum_type` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

INSERT INTO `gy_tax_salary` (`id`, `user_tax_year_id`, `payers_abn`, `payers_name`, `gross_salary`, `tax_withheld`, `fringe_benefits`, `allowance_amount`, `lump_sum_amount`, `lump_sum_type`, `created_at`, `updated_at`) VALUES
(86, 2, '83914571673', '4afadf', 234, 23423, 234, 234, 234, 'R', '2014-03-28 11:20:01', '2014-03-28 11:20:01'),
(101, 8, '83914571673', 'johny doe', 32, 34, 32, 33, 3, 'T', '2014-03-28 17:51:49', '2014-03-28 17:51:49'),
(140, 12, '83004143239', 'Test', 123123, 0, 233, 0, 32, 'R', '2014-04-30 12:04:06', '2014-04-30 12:04:06'),
(147, 13, '83004143239', 'Coles Myer', 95000, 27500, 0, 0, 0, 'T', '2014-05-01 13:38:37', '2014-05-01 13:38:37'),
(160, 21, '830041   432 39', 'Stephne', 50000, 10000, 3423434, 12312312, 0, 'R', '2014-05-02 00:12:23', '2014-05-02 00:12:23'),
(161, 21, '830041   432 39', '123', 13, 123, 123, 123, 0, 'R', '2014-05-02 00:12:23', '2014-05-02 00:12:23');

CREATE TABLE `gy_tax_self_education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `education_expenses` varchar(255) DEFAULT NULL,
  `amount` double(8,0) unsigned DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

INSERT INTO `gy_tax_self_education` (`id`, `user_tax_year_id`, `education_expenses`, `amount`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 2, 'SDF', 3232, 'K', '2014-03-26 22:10:32', '2014-03-26 22:10:32', NULL),
(11, 12, '21323', 263, 'K', '2014-04-30 12:08:28', '2014-04-30 12:08:28', NULL),
(14, 13, '323', 2323, 'O', '2014-05-01 13:35:21', '2014-05-01 13:35:21', NULL);

CREATE TABLE `gy_tax_travel_expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) DEFAULT NULL,
  `description` text,
  `amount` double(8,0) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `gy_tax_travel_expenses` (`id`, `user_tax_year_id`, `description`, `amount`, `updated_at`, `created_at`, `deleted_at`) VALUES
(2, 8, 'SDFSD', 23, '2014-03-28 15:12:58', '2014-03-28 15:12:58', NULL),
(4, 13, 'SDF', 23, '2014-05-01 13:35:05', '2014-05-01 13:35:05', NULL),
(7, 21, 'JOHNDOE', 343, '2014-05-01 23:18:28', '2014-05-01 23:18:28', NULL);

CREATE TABLE `gy_tax_uniform` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `description` text,
  `amount` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `gy_tax_uniform` (`id`, `user_tax_year_id`, `description`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'Protective Clothing', 12, '2014-03-28 14:18:43', '2014-03-28 14:18:43', NULL),
(3, 13, 'Compulsory Work Uniform', 23, '2014-05-01 13:35:14', '2014-05-01 13:35:14', NULL),
(6, 21, 'Compulsory Work Uniform', 23, '2014-05-01 23:18:30', '2014-05-01 23:18:30', NULL);

CREATE TABLE `gy_tax_years` (
  `year` int(11) unsigned NOT NULL,
  `year_from` date DEFAULT '1970-01-01',
  `year_to` date DEFAULT '1970-01-01',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gy_tax_years` (`year`, `year_from`, `year_to`, `created_at`, `updated_at`, `is_active`) VALUES
(2013, '2012-06-10', '2013-12-19', '2014-03-11 17:07:56', '2014-03-11 17:07:56', 1),
(2014, '2014-04-06', '2014-08-22', '2014-04-02 15:25:27', '2014-04-02 15:25:27', 1);

CREATE TABLE `gy_tax_zone_offsets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `zone_a_days` int(11) DEFAULT NULL,
  `zone_a_amount` double(8,0) unsigned DEFAULT NULL,
  `zone_b_days` int(11) DEFAULT NULL,
  `zone_b_amount` double(8,0) unsigned DEFAULT NULL,
  `zone_x_days` int(11) DEFAULT NULL,
  `zone_x_amount` double(8,0) unsigned DEFAULT NULL,
  `zone_y_days` int(11) DEFAULT NULL,
  `zone_y_amount` double(8,0) unsigned DEFAULT NULL,
  `zone_z_days` int(11) DEFAULT NULL,
  `zone_z_amount` double(8,0) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

INSERT INTO `gy_tax_zone_offsets` (`id`, `user_tax_year_id`, `zone_a_days`, `zone_a_amount`, `zone_b_days`, `zone_b_amount`, `zone_x_days`, `zone_x_amount`, `zone_y_days`, `zone_y_amount`, `zone_z_days`, `zone_z_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 0, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-27 20:47:05', '2014-03-27 20:47:05', NULL),
(2, NULL, 23, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-27 20:47:16', '2014-03-27 20:47:16', NULL),
(3, NULL, 0, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-27 21:04:58', '2014-03-27 21:04:58', NULL),
(4, NULL, 0, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-27 21:07:57', '2014-03-27 21:07:57', NULL),
(22, 2, 23, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-28 11:37:19', '2014-03-28 11:37:19', NULL),
(44, 8, 12, 1173, 0, 1173, 0, 338, 0, 57, 0, 338, '2014-03-28 15:17:23', '2014-03-28 15:17:23', NULL);

CREATE TABLE `gy_terms` (
  `term_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

INSERT INTO `gy_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(39, 'Home', 'home', 0),
(45, 'Configurable Box', 'configurable-box', 0),
(48, 'Footer Widget', 'footer-widget', 0),
(54, 'adsfdsfasdfsdf', 'adsfdsfasdfsdf', 0),
(59, 'asfasdf', 'dfasfasdf', 0),
(62, 'dsfasdfadsf', 'asdfasdfasd', 0),
(64, 'asdfasdfasdf', 'asdfasdf', 0),
(65, 'fasdfsdf', 'dsfadsfasd', 0),
(66, 'group buy', 'groupbuy', 0),
(67, 'page 2', 'page-2', 0),
(68, 'blog', 'blog', 0),
(69, 'Events', 'events', 0),
(70, 'Treatment & Services', 'treatment-services', 0),
(71, 'Johny Doe', 'johny-doe', 0),
(72, 'Nav Menu', 'nav-menu', 0);

CREATE TABLE `gy_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL,
  `term_taxonomy_id` bigint(20) NOT NULL,
  `menu_order` int(11) DEFAULT NULL,
  KEY `fk_gy_term_relationships_gy_term_taxonomy1_idx` (`term_taxonomy_id`),
  KEY `fk_gy_term_relationships_gy_posts1_idx` (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gy_term_relationships` (`object_id`, `term_taxonomy_id`, `menu_order`) VALUES
(634, 46, 0),
(697, 69, 0),
(698, 69, 0),
(719, 70, 0),
(714, 70, 0),
(718, 70, 0),
(715, 70, 0),
(716, 70, 0),
(728, 70, 0);

CREATE TABLE `gy_term_taxonomy` (
  `term_taxonomy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) NOT NULL,
  `taxonomy` varchar(32) DEFAULT NULL,
  `description` longtext,
  `parent` bigint(20) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`term_taxonomy_id`),
  KEY `fk_gy_term_taxonomy_gy_terms_idx` (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

INSERT INTO `gy_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(38, 39, 'banner-category', '', 0, 0),
(43, 45, 'banner-category', '', 0, 0),
(46, 48, 'widget', '', 0, 0),
(56, 59, 'blog-category', 'dsf', 0, 0),
(59, 62, 'category', 'adsdf', 0, 0),
(61, 64, 'promotion-category', 'asdfasdfads', 0, 0),
(62, 64, 'service-treatment-category', 'asdfasdf', 0, 0),
(63, 65, 'event-category', 'asfasdfa', 0, 0),
(64, 66, 'category', 'group buy', 0, 0),
(65, 67, 'page-category', 'page 2', 0, 0),
(66, 68, 'blog-category', 'blog', 0, 0),
(67, 69, 'banner-category', '', 0, 0),
(68, 70, 'banner-category', '', 0, 0),
(69, 71, 'widget', '', 0, 0),
(70, 72, 'nav_menu', '', 0, 0);

CREATE TABLE `gy_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `customer_firstname` varchar(64) DEFAULT NULL,
  `customer_last_name` varchar(64) DEFAULT NULL,
  `customer_title` varchar(120) DEFAULT NULL,
  `customer_address1` text,
  `customer_address2` text,
  `customer_post_code` varchar(64) DEFAULT NULL,
  `customer_suburb` varchar(64) DEFAULT NULL,
  `customer_state` varchar(64) DEFAULT NULL,
  `customer_email` varchar(120) DEFAULT NULL,
  `customer_ip` varchar(120) DEFAULT NULL,
  `transaction_amount` double(7,2) DEFAULT NULL,
  `transaction_currency` varchar(64) DEFAULT NULL,
  `transaction_product` bigint(20) DEFAULT NULL,
  `transaction_method` varchar(64) DEFAULT NULL,
  `payment_gateway` varchar(64) DEFAULT NULL,
  `payment_gateway_method` varchar(64) DEFAULT NULL,
  `paypal_txn_id` tinyint(1) DEFAULT NULL,
  `paypal_parent_txn_id` varchar(64) DEFAULT NULL,
  `payment_card_number` text,
  `payment_card_name` varchar(64) DEFAULT NULL,
  `payment_card_expiry` varchar(64) DEFAULT NULL,
  `payment_card_cvv` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `gy_usermeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_gy_usermeta_gy_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

INSERT INTO `gy_usermeta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
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

CREATE TABLE `gy_users` (
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
  KEY `fk_gy_users_gy_roles1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=332 ;

INSERT INTO `gy_users` (`id`, `password`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `address_1`, `address_2`, `postcode`, `state`, `country`, `mobile`, `points`, `total_spend`, `nric`, `designation`, `avatar`, `created_at`, `updated_at`, `last_visit`, `group_id`, `activation_code`, `active`) VALUES
(1, '$2y$08$qrt/84jYEJylRPkJ6qbjC.Xv9Th1dFV6GYsR8Gtte0/gQjQlVg5K.', 'developer@lightmedia.com.au', 'Developer', 'Lightmedia', 'M', '1989-09-07', 'Camolinas Poblacion Cordova Cebu', '', '6017', 'Cebu', 'PH', '4324324324', 0.00, 0.00, '343454543', '', 'media/uploads/users/1/avatar/avatar.png', '2013-11-02 20:14:23', '2014-01-22 01:12:03', NULL, 5, '', 1),
(322, '$2y$08$qrt/84jYEJylRPkJ6qbjC.Xv9Th1dFV6GYsR8Gtte0/gQjQlVg5K.', 'developer2@lightmedia.com.au', 'Developer2', 'Lightmedia', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-03-28 10:01:10', '2014-03-28 10:01:10', NULL, 2, '53354866b6e8f8a89f6b505d4f1b6861174ef0d7fbc1f', 1),
(323, '$2y$08$Jfl9FCLxIiFJOs7OzjZGIu2qAD6620P3.ViV1vpf7TXfSkSy1TV0.', 'michael1@lightmedia.com.au', 'stephen', 'cantila', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-03-30 18:32:50', '2014-03-30 18:32:50', NULL, 5, '5338d3d2742cd81be53dd90d9ff99cad426c04d972ab4', 0),
(324, '$2y$08$j7qZdcshAKgXVg/7aZp22ucWLwClzriAxjKZvMmo8CZW0w1CpIAOi', 'johndoe@gmail.com', 'john', 'doe', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-03-31 02:35:42', '2014-03-31 02:35:42', NULL, 2, '5338d47e65963d3bbfdb8f71c73515184164a7db8d4d1', 1),
(329, '$2y$08$Cti36BNgxhbXmJgqIPjQ2.QEOXKw3H6Um5TFDYn9zNVP0G/NXK3zW', 'stephen@lightmedia.com.au', 'stephen', 'cantila', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-04-30 05:15:18', '2014-04-30 05:15:18', NULL, 2, '', 1),
(330, '$2y$08$6Kxcafmgsn4NAu2xd4q4qebFedywWvc6JBLNjkkVTJwSH7WvhvNEm', 'designer@lightmedia.com.au', 'stephen', 'cantila', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-04-30 05:20:47', '2014-04-30 05:20:47', NULL, 2, '5360882f566aa087114090d24e0324874512d5f077563', 0),
(331, '$2y$08$FDFcyBWcaVsChADTOX2NDO/.wS.2ASsy91TSbRGyqa8Hueu4/alky', 'philwebservices.programmer25@gmail.com', 'Stephen', 'cantila', 'M', NULL, '', NULL, '', '', '', NULL, 0.00, 0.00, NULL, '', NULL, '2014-04-30 05:43:26', '2014-04-30 05:43:26', NULL, 2, '53608d7e88c66991ce259eb65a06b5d167b2d5d3e194c', 0);

CREATE TABLE `gy_usertaxyearmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `meta_value` longtext,
  `meta_key` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

INSERT INTO `gy_usertaxyearmeta` (`meta_id`, `user_tax_year_id`, `meta_value`, `meta_key`) VALUES
(1, 8, '0', 'flag_income'),
(2, 8, '0', 'flag_deductions'),
(3, 9, '0', 'flag_income'),
(4, 9, '0', 'flag_deductions'),
(5, 10, '0', 'flag_income'),
(6, 10, '0', 'flag_deductions'),
(7, 11, '0', 'flag_income'),
(8, 11, '0', 'flag_deductions'),
(9, 12, '0', 'flag_income'),
(10, 12, '0', 'flag_deductions'),
(11, 13, '0', 'flag_income'),
(12, 13, '0', 'flag_deductions'),
(13, 14, '0', 'flag_income'),
(14, 14, '0', 'flag_deductions'),
(15, 15, '0', 'flag_income'),
(16, 15, '0', 'flag_deductions'),
(17, 16, '0', 'flag_income'),
(18, 16, '0', 'flag_deductions'),
(19, 17, '0', 'flag_income'),
(20, 17, '0', 'flag_deductions'),
(21, 18, '0', 'flag_income'),
(22, 18, '0', 'flag_deductions'),
(23, 19, '0', 'flag_income'),
(24, 19, '0', 'flag_deductions'),
(25, 20, '0', 'flag_income'),
(26, 20, '0', 'flag_deductions'),
(27, 21, '0', 'flag_income'),
(28, 21, '0', 'flag_deductions'),
(29, 22, '0', 'flag_income'),
(30, 22, '0', 'flag_deductions');

CREATE TABLE `gy_user_tax_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_tax_year_id` bigint(20) unsigned DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `occupation` varchar(200) DEFAULT NULL,
  `tax_file_number` varchar(64) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `salutation` varchar(200) DEFAULT NULL,
  `is_australian_resident` tinyint(1) unsigned DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

INSERT INTO `gy_user_tax_details` (`id`, `user_tax_year_id`, `firstname`, `lastname`, `email`, `occupation`, `tax_file_number`, `dob`, `landline`, `sex`, `salutation`, `is_australian_resident`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 13, 'Stephen', 'Cantila', 'stephencantila@gmail.com', 'Johndoe', '123456782', '1987-08-14', '23', 'female', 'Mr', 1, '2014-03-28 18:17:28', '2014-03-28 18:26:00', NULL),
(14, 12, 'stephen', 'cantila', 'stephencantila@gmail.com', 'asdfds', '123456782', '1940-03-20', '323', 'female', 'Mr', 0, '2014-03-31 11:14:06', '2014-04-30 11:17:48', NULL),
(15, 21, 'Stephen', 'Cantilaadf', 'stephencantila@gmail.com', '3123123', '123456782', '1993-01-10', '12313', 'female', 'Mr', 0, '2014-04-30 16:34:19', '2014-05-01 20:45:42', NULL);

CREATE TABLE `gy_user_tax_years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `tax_year` int(11) unsigned DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `estimate_refund` double(7,3) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

INSERT INTO `gy_user_tax_years` (`id`, `user_id`, `tax_year`, `status`, `estimate_refund`, `currency_code`, `created_at`, `deleted_at`, `updated_at`) VALUES
(12, 320, 2013, 'in_progress', 0.000, 'AUD', '2014-03-28 18:05:52', NULL, '2014-03-28 18:05:52'),
(13, 322, 2013, 'in_progress', 0.000, 'AUD', '2014-03-28 18:06:01', NULL, '2014-03-28 18:06:01'),
(14, 322, 2014, 'in_progress', 0.000, 'AUD', '2014-03-28 18:06:05', NULL, '2014-03-28 18:06:05'),
(15, 324, 2013, 'in_progress', 0.000, 'AUD', '2014-03-31 10:37:19', NULL, '2014-03-31 10:37:19'),
(16, 326, 2013, 'in_progress', 0.000, 'AUD', '2014-03-31 10:55:10', NULL, '2014-03-31 10:55:10'),
(17, 320, 2014, 'in_progress', 0.000, 'AUD', '2014-03-31 11:13:17', NULL, '2014-03-31 11:13:17'),
(18, 323, 2013, 'in_progress', 0.000, 'AUD', '2014-03-31 11:56:41', NULL, '2014-03-31 11:56:41'),
(19, 323, 2014, 'in_progress', 0.000, 'AUD', '2014-03-31 21:16:31', NULL, '2014-03-31 21:16:31'),
(20, 329, 2013, 'in_progress', 0.000, 'AUD', '2014-04-30 13:15:59', NULL, '2014-04-30 13:15:59'),
(21, 331, 2013, 'in_progress', 0.000, 'AUD', '2014-04-30 13:45:43', NULL, '2014-04-30 13:45:43'),
(22, 331, 2014, 'in_progress', 0.000, 'AUD', '2014-05-01 20:45:30', NULL, '2014-05-01 20:45:30');


ALTER TABLE `gy_groups_roles`
  ADD CONSTRAINT `fk_gy_groups_roles_gy_groups1` FOREIGN KEY (`group_id`) REFERENCES `gy_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_groups_roles_gy_roles1` FOREIGN KEY (`role_id`) REFERENCES `gy_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_postmeta`
  ADD CONSTRAINT `fk_gy_postmeta_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_posts`
  ADD CONSTRAINT `fk_gy_posts_gy_users1` FOREIGN KEY (`author_id`) REFERENCES `gy_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `gy_posts_comments`
  ADD CONSTRAINT `fk_gy_posts_comments_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_posts_comments_gy_users1` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_post_recently_viewed`
  ADD CONSTRAINT `gy_post_recently_viewed_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `gy_post_recently_viewed_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_term_relationships`
  ADD CONSTRAINT `fk_gy_term_relationships_gy_posts1` FOREIGN KEY (`object_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_term_relationships_gy_term_taxonomy1` FOREIGN KEY (`term_taxonomy_id`) REFERENCES `gy_term_taxonomy` (`term_taxonomy_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_term_taxonomy`
  ADD CONSTRAINT `fk_gy_term_taxonomy_gy_terms` FOREIGN KEY (`term_id`) REFERENCES `gy_terms` (`term_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gy_users`
  ADD CONSTRAINT `fk_gy_users_gy_roles1` FOREIGN KEY (`group_id`) REFERENCES `gy_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
