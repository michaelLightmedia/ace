-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 09:09 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gy_ask_attachments`
--

CREATE TABLE `gy_ask_attachments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `location` text,
  `type` varchar(45) DEFAULT NULL,
  `size` varchar(40) DEFAULT NULL,
  `ask_expert_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_ask_attachments_gy_ask_expert1_idx` (`ask_expert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gy_ask_attachments`
--

INSERT INTO `gy_ask_attachments` (`id`, `filename`, `location`, `type`, `size`, `ask_expert_id`) VALUES
(1, 'plus.png', 'media/uploads/ask-expert/plus.png', 'image/png', '2377', 28),
(2, 'download.jpeg', 'media/uploads/ask-expert/download.jpeg', 'image/jpeg', '5046', 33);

-- --------------------------------------------------------

--
-- Table structure for table `gy_ask_expert`
--

CREATE TABLE `gy_ask_expert` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `sender` bigint(20) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `message` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_ask_expert_gy_users2_idx` (`sender`),
  KEY `fk_gy_ask_expert_gy_ask_subject1_idx` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `gy_ask_expert`
--

INSERT INTO `gy_ask_expert` (`id`, `parent_id`, `sender`, `subject_id`, `message`, `created_at`) VALUES
(1, 0, 298, 14, '<p>this is my test question</p>\r\n', '2014-01-10 14:05:54'),
(2, 0, 282, 4, '<p>hello! this is a world</p>\r\n', '2014-01-13 10:36:20'),
(3, 0, 282, 9, '<p>Hello!!!!!</p>\r\n', '2014-01-13 10:37:36'),
(4, 0, 282, 4, '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 10:44:48'),
(5, 4, 1, 4, '<p>this is an answer</p>\r\n', '2014-01-13 10:45:38'),
(6, 4, 1, 4, '<p>this is an answer with recommendation</p>\r\n', '2014-01-13 10:46:24'),
(9, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:09'),
(10, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:17'),
(11, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:22'),
(12, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:27'),
(13, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:32'),
(14, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:42'),
(15, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:46:54'),
(16, 0, 282, 4, '<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</p>\r\n', '2014-01-13 14:47:23'),
(17, 16, 1, 4, '<p><em>aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,</em></p>\r\n', '2014-01-13 14:49:06'),
(18, 0, 306, 4, '<p>LOrem ipsum :)</p>\r\n', '2014-01-21 02:41:57'),
(19, 0, 306, 4, '<p>Ipsum :)</p>\r\n', '2014-01-21 02:43:48'),
(20, 0, 306, 4, '<p>Lorem ipsum</p>\r\n', '2014-01-21 02:44:02'),
(21, 0, 306, 4, '<p>Helo world:)</p>\r\n', '2014-01-21 02:49:27'),
(23, 0, 306, 4, '<p>Lorem ipsumd olor</p>\r\n', '2014-01-21 02:50:20'),
(24, 23, 1, 4, '<p>asdfasdfasdfads</p>\r\n', '2014-01-23 04:59:05'),
(28, 0, 292, 4, '<p>LOrem ipsum dolor sit amit</p>\r\n', '2014-01-24 02:53:01'),
(29, 28, 1, 4, '<p><img src="http://csk.local/media/uploads/2013/17/large/choose-facial-cleanser-2.jpg" /></p>\r\n', '2014-01-24 02:55:40'),
(32, 0, 292, 4, '<p>aafsdfasdf</p>\r\n', '2014-01-24 09:28:07'),
(33, 0, 292, 4, '<p>asdfasdfasdfadsf</p>\r\n', '2014-01-24 09:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `gy_ask_subject`
--

CREATE TABLE `gy_ask_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `gy_ask_subject`
--

INSERT INTO `gy_ask_subject` (`id`, `subject`, `author_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Facial Wash', 1, 1, '2013-11-19 10:49:03', '2013-11-19 00:14:56'),
(5, 'Body wash', 1, 1, '2013-11-19 10:49:03', '2013-11-19 00:16:14'),
(9, 'Body wash world', 1, 1, '2014-01-23 04:59:24', '2014-01-23 04:59:24'),
(13, 'Sample subject', 0, 1, '2013-11-19 10:49:03', '2013-11-19 01:22:02'),
(14, 'Lorem ipsum dolor', 0, 1, '2013-11-19 10:49:03', '2013-11-19 02:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `gy_countries`
--

CREATE TABLE `gy_countries` (
  `code` char(2) CHARACTER SET latin1 NOT NULL,
  `name` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_countries`
--

INSERT INTO `gy_countries` (`code`, `name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Åland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthélemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BQ', 'Caribbean Netherlands '),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo, Democratic Republic of'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Côte D’Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CW', 'Curaçao'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard and McDonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'North Korea'),
('KR', 'South Korea'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People’s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova'),
('ME', 'Montenegro'),
('MF', 'Saint-Martin (France)'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'The Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'St. Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory, Occupied'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen Islands'),
('SK', 'Slovakia (Slovak Republic)'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SX', 'Saint-Martin (Pays-Bas)'),
('SY', 'Syria'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TZ', 'Tanzania'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (British)'),
('VI', 'Virgin Islands (U.S.)'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna Islands'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `gy_currency`
--

CREATE TABLE `gy_currency` (
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_currency`
--

INSERT INTO `gy_currency` (`country`, `currency`, `code`, `symbol`) VALUES
('Albania', 'Leke', 'ALL', 'Lek'),
('America', 'Dollars', 'USD', '$'),
('Afghanistan', 'Afghanis', 'AFN', '؋'),
('Argentina', 'Pesos', 'ARS', '$'),
('Aruba', 'Guilders', 'AWG', 'ƒ'),
('Australia', 'Dollars', 'AUD', '$'),
('Azerbaijan', 'New Manats', 'AZN', 'ман'),
('Bahamas', 'Dollars', 'BSD', '$'),
('Barbados', 'Dollars', 'BBD', '$'),
('Belarus', 'Rubles', 'BYR', 'p.'),
('Belgium', 'Euro', 'EUR', '€'),
('Beliz', 'Dollars', 'BZD', 'BZ$'),
('Bermuda', 'Dollars', 'BMD', '$'),
('Bolivia', 'Bolivianos', 'BOB', '$b'),
('Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM'),
('Botswana', 'Pula''s', 'BWP', 'P'),
('Bulgaria', 'Leva', 'BGN', 'лв'),
('Brazil', 'Reais', 'BRL', 'R$'),
('Britain (United Kingdom)', 'Pounds', 'GBP', '£'),
('Brunei Darussalam', 'Dollars', 'BND', '$'),
('Cambodia', 'Riels', 'KHR', '៛'),
('Canada', 'Dollars', 'CAD', '$'),
('Cayman Islands', 'Dollars', 'KYD', '$'),
('Chile', 'Pesos', 'CLP', '$'),
('China', 'Yuan Renminbi', 'CNY', '¥'),
('Colombia', 'Pesos', 'COP', '$'),
('Costa Rica', 'Colón', 'CRC', '₡'),
('Croatia', 'Kuna', 'HRK', 'kn'),
('Cuba', 'Pesos', 'CUP', '₱'),
('Cyprus', 'Euro', 'EUR', '€'),
('Czech Republic', 'Koruny', 'CZK', 'Kč'),
('Denmark', 'Kroner', 'DKK', 'kr'),
('Dominican Republic', 'Pesos', 'DOP ', 'RD$'),
('East Caribbean', 'Dollars', 'XCD', '$'),
('Egypt', 'Pounds', 'EGP', '£'),
('El Salvador', 'Colones', 'SVC', '$'),
('England (United Kingdom)', 'Pounds', 'GBP', '£'),
('Euro', 'Euro', 'EUR', '€'),
('Falkland Islands', 'Pounds', 'FKP', '£'),
('Fiji', 'Dollars', 'FJD', '$'),
('France', 'Euro', 'EUR', '€'),
('Ghana', 'Cedis', 'GHC', '¢'),
('Gibraltar', 'Pounds', 'GIP', '£'),
('Greece', 'Euro', 'EUR', '€'),
('Guatemala', 'Quetzales', 'GTQ', 'Q'),
('Guernsey', 'Pounds', 'GGP', '£'),
('Guyana', 'Dollars', 'GYD', '$'),
('Holland (Netherlands)', 'Euro', 'EUR', '€'),
('Honduras', 'Lempiras', 'HNL', 'L'),
('Hong Kong', 'Dollars', 'HKD', '$'),
('Hungary', 'Forint', 'HUF', 'Ft'),
('Iceland', 'Kronur', 'ISK', 'kr'),
('India', 'Rupees', 'INR', 'Rp'),
('Indonesia', 'Rupiahs', 'IDR', 'Rp'),
('Iran', 'Rials', 'IRR', '﷼'),
('Ireland', 'Euro', 'EUR', '€'),
('Isle of Man', 'Pounds', 'IMP', '£'),
('Israel', 'New Shekels', 'ILS', '₪'),
('Italy', 'Euro', 'EUR', '€'),
('Jamaica', 'Dollars', 'JMD', 'J$'),
('Japan', 'Yen', 'JPY', '¥'),
('Jersey', 'Pounds', 'JEP', '£'),
('Kazakhstan', 'Tenge', 'KZT', 'лв'),
('Korea (North)', 'Won', 'KPW', '₩'),
('Korea (South)', 'Won', 'KRW', '₩'),
('Kyrgyzstan', 'Soms', 'KGS', 'лв'),
('Laos', 'Kips', 'LAK', '₭'),
('Latvia', 'Lati', 'LVL', 'Ls'),
('Lebanon', 'Pounds', 'LBP', '£'),
('Liberia', 'Dollars', 'LRD', '$'),
('Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF'),
('Lithuania', 'Litai', 'LTL', 'Lt'),
('Luxembourg', 'Euro', 'EUR', '€'),
('Macedonia', 'Denars', 'MKD', 'ден'),
('Malaysia', 'Ringgits', 'MYR', 'RM'),
('Malta', 'Euro', 'EUR', '€'),
('Mauritius', 'Rupees', 'MUR', '₨'),
('Mexico', 'Pesos', 'MXN', '$'),
('Mongolia', 'Tugriks', 'MNT', '₮'),
('Mozambique', 'Meticais', 'MZN', 'MT'),
('Namibia', 'Dollars', 'NAD', '$'),
('Nepal', 'Rupees', 'NPR', '₨'),
('Netherlands Antilles', 'Guilders', 'ANG', 'ƒ'),
('Netherlands', 'Euro', 'EUR', '€'),
('New Zealand', 'Dollars', 'NZD', '$'),
('Nicaragua', 'Cordobas', 'NIO', 'C$'),
('Nigeria', 'Nairas', 'NGN', '₦'),
('North Korea', 'Won', 'KPW', '₩'),
('Norway', 'Krone', 'NOK', 'kr'),
('Oman', 'Rials', 'OMR', '﷼'),
('Pakistan', 'Rupees', 'PKR', '₨'),
('Panama', 'Balboa', 'PAB', 'B/.'),
('Paraguay', 'Guarani', 'PYG', 'Gs'),
('Peru', 'Nuevos Soles', 'PEN', 'S/.'),
('Philippines', 'Pesos', 'PHP', 'Php'),
('Poland', 'Zlotych', 'PLN', 'zł'),
('Qatar', 'Rials', 'QAR', '﷼'),
('Romania', 'New Lei', 'RON', 'lei'),
('Russia', 'Rubles', 'RUB', 'руб'),
('Saint Helena', 'Pounds', 'SHP', '£'),
('Saudi Arabia', 'Riyals', 'SAR', '﷼'),
('Serbia', 'Dinars', 'RSD', 'Дин.'),
('Seychelles', 'Rupees', 'SCR', '₨'),
('Singapore', 'Dollars', 'SGD', '$'),
('Slovenia', 'Euro', 'EUR', '€'),
('Solomon Islands', 'Dollars', 'SBD', '$'),
('Somalia', 'Shillings', 'SOS', 'S'),
('South Africa', 'Rand', 'ZAR', 'R'),
('South Korea', 'Won', 'KRW', '₩'),
('Spain', 'Euro', 'EUR', '€'),
('Sri Lanka', 'Rupees', 'LKR', '₨'),
('Sweden', 'Kronor', 'SEK', 'kr'),
('Switzerland', 'Francs', 'CHF', 'CHF'),
('Suriname', 'Dollars', 'SRD', '$'),
('Syria', 'Pounds', 'SYP', '£'),
('Taiwan', 'New Dollars', 'TWD', 'NT$'),
('Thailand', 'Baht', 'THB', '฿'),
('Trinidad and Tobago', 'Dollars', 'TTD', 'TT$'),
('Turkey', 'Lira', 'TRY', 'TL'),
('Turkey', 'Liras', 'TRL', '£'),
('Tuvalu', 'Dollars', 'TVD', '$'),
('Ukraine', 'Hryvnia', 'UAH', '₴'),
('United Kingdom', 'Pounds', 'GBP', '£'),
('United States of America', 'Dollars', 'USD', '$'),
('Uruguay', 'Pesos', 'UYU', '$U'),
('Uzbekistan', 'Sums', 'UZS', 'лв'),
('Vatican City', 'Euro', 'EUR', '€'),
('Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs'),
('Vietnam', 'Dong', 'VND', '₫'),
('Yemen', 'Rials', 'YER', '﷼'),
('Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `gy_groups`
--

CREATE TABLE `gy_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gy_groups`
--

INSERT INTO `gy_groups` (`id`, `group`) VALUES
(1, 'Administrator'),
(2, 'Customer'),
(3, 'Doctor'),
(4, 'Staff'),
(5, 'Super User');

-- --------------------------------------------------------

--
-- Table structure for table `gy_groups_roles`
--

CREATE TABLE `gy_groups_roles` (
  `group_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `fk_gy_groups_roles_gy_roles1_idx` (`role_id`),
  KEY `fk_gy_groups_roles_gy_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_groups_roles`
--

INSERT INTO `gy_groups_roles` (`group_id`, `role_id`) VALUES
(2, 1),
(2, 5),
(2, 6),
(2, 20),
(2, 22),
(2, 49),
(2, 51),
(2, 52),
(4, 1),
(4, 2),
(4, 8),
(4, 9),
(4, 10),
(4, 12),
(4, 13),
(4, 14),
(4, 16),
(4, 17),
(4, 18),
(4, 20),
(4, 21),
(4, 22),
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
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
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
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 53),
(3, 54),
(3, 55),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
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
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
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
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58);

-- --------------------------------------------------------

--
-- Table structure for table `gy_inbox`
--

CREATE TABLE `gy_inbox` (
  `user_id` bigint(20) unsigned NOT NULL,
  `ask_expert_id` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  KEY `fk_gy_inbox_gy_users1_idx` (`user_id`),
  KEY `fk_gy_inbox_gy_ask_expert1_idx` (`ask_expert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_inbox`
--

INSERT INTO `gy_inbox` (`user_id`, `ask_expert_id`, `status`) VALUES
(2, 1, 'read'),
(283, 1, 'read'),
(286, 1, 'read'),
(298, 1, 'read'),
(2, 2, 'read'),
(283, 2, 'read'),
(286, 2, 'read'),
(282, 2, 'read'),
(2, 3, 'read'),
(283, 3, 'read'),
(286, 3, 'read'),
(282, 3, 'read'),
(2, 4, 'read'),
(283, 4, 'read'),
(286, 4, 'read'),
(1, 4, 'read'),
(282, 4, 'read'),
(282, 5, 'read'),
(1, 5, 'read'),
(1, 6, 'read'),
(1, 6, 'read'),
(2, 9, 'read'),
(283, 9, 'read'),
(286, 9, 'read'),
(1, 9, 'read'),
(299, 9, 'read'),
(282, 9, 'read'),
(2, 10, 'read'),
(283, 10, 'read'),
(286, 10, 'read'),
(1, 10, 'read'),
(299, 10, 'read'),
(282, 10, 'read'),
(2, 11, 'unread'),
(283, 11, 'unread'),
(286, 11, 'unread'),
(1, 11, 'unread'),
(299, 11, 'unread'),
(282, 11, 'unread'),
(2, 12, 'unread'),
(283, 12, 'unread'),
(286, 12, 'unread'),
(1, 12, 'unread'),
(299, 12, 'unread'),
(282, 12, 'unread'),
(2, 13, 'unread'),
(283, 13, 'unread'),
(286, 13, 'unread'),
(1, 13, 'unread'),
(299, 13, 'unread'),
(282, 13, 'unread'),
(2, 14, 'unread'),
(283, 14, 'unread'),
(286, 14, 'unread'),
(1, 14, 'unread'),
(299, 14, 'unread'),
(282, 14, 'unread'),
(2, 15, 'read'),
(283, 15, 'read'),
(286, 15, 'read'),
(1, 15, 'read'),
(299, 15, 'read'),
(282, 15, 'read'),
(2, 16, 'read'),
(283, 16, 'read'),
(286, 16, 'read'),
(1, 16, 'read'),
(299, 16, 'read'),
(282, 16, 'read'),
(282, 17, 'read'),
(1, 17, 'read'),
(2, 18, 'read'),
(283, 18, 'read'),
(286, 18, 'read'),
(1, 18, 'read'),
(299, 18, 'read'),
(306, 18, 'read'),
(2, 19, 'read'),
(283, 19, 'read'),
(286, 19, 'read'),
(1, 19, 'read'),
(299, 19, 'read'),
(306, 19, 'read'),
(2, 20, 'read'),
(283, 20, 'read'),
(286, 20, 'read'),
(1, 20, 'read'),
(299, 20, 'read'),
(306, 20, 'read'),
(2, 21, 'read'),
(283, 21, 'read'),
(286, 21, 'read'),
(1, 21, 'read'),
(299, 21, 'read'),
(306, 21, 'read'),
(2, 23, 'read'),
(283, 23, 'read'),
(286, 23, 'read'),
(1, 23, 'read'),
(299, 23, 'read'),
(306, 23, 'read'),
(306, 24, 'unread'),
(1, 24, 'read'),
(2, 28, 'read'),
(283, 28, 'read'),
(286, 28, 'read'),
(1, 28, 'read'),
(299, 28, 'read'),
(292, 28, 'read'),
(292, 29, 'read'),
(1, 29, 'read'),
(2, 32, 'read'),
(283, 32, 'read'),
(286, 32, 'read'),
(1, 32, 'read'),
(299, 32, 'read'),
(292, 32, 'read'),
(2, 33, 'read'),
(283, 33, 'read'),
(286, 33, 'read'),
(1, 33, 'read'),
(299, 33, 'read'),
(292, 33, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `gy_levels`
--

CREATE TABLE `gy_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `tsp` decimal(10,2) NOT NULL COMMENT 'Total spend over period',
  `months` int(11) NOT NULL,
  `spend_per_order` decimal(10,2) NOT NULL,
  `earned` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gy_levels`
--

INSERT INTO `gy_levels` (`id`, `name`, `tsp`, `months`, `spend_per_order`, `earned`) VALUES
(1, 'Gold Membership', 8000.00, 12, 100.00, 4),
(2, 'Elite Gold', 2000.00, 12, 100.00, 8),
(3, 'Platinum', 15000.00, 13, 100.00, 12),
(4, 'Registered', 0.00, 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gy_loyalty_points`
--

CREATE TABLE `gy_loyalty_points` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `loyalty_points` decimal(10,2) DEFAULT '0.00',
  `loyalty_information` text,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_loyalty_points_gy_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `gy_loyalty_points`
--

INSERT INTO `gy_loyalty_points` (`id`, `user_id`, `loyalty_points`, `loyalty_information`, `created_at`) VALUES
(1, 282, 2.00, 'Successfull Referral to support@lightmedia.com.au', '2013-12-03 23:25:53'),
(2, 282, 2.00, 'Successfull Referral to gabriel@lightmedia.com.au', '2013-12-04 01:43:27'),
(3, 282, 10.00, 'Successfull Referral to lorenz@lightmedia.com.au', '2013-12-04 02:28:31'),
(4, 291, 10.00, 'Successfully order of 201301180', '2013-12-18 09:31:58'),
(5, 291, 10.00, 'Successfully order of 201301181', '2013-12-18 09:33:01'),
(6, 282, 30.00, 'Successfully order of 201301182', '2013-12-19 03:28:41'),
(7, 287, 50.00, 'Successfully order of 201301183', '2013-12-23 18:23:50'),
(8, 287, 140.00, 'Successfully order of 201301184', '2013-12-23 18:27:59'),
(9, 295, 0.00, 'Redeemed on order of 201301186', '2014-01-03 17:18:43'),
(10, 295, 10.00, 'Successfully order of 201301186', '2014-01-03 17:18:43'),
(11, 282, 0.00, 'Redeemed on order of 201301187', '2014-01-06 17:47:48'),
(12, 282, 50.00, 'Successfully order of 201301187', '2014-01-06 17:47:48'),
(13, 282, 5.00, 'Successfull Referral to serg.casquejo@yahoo.com', '2014-01-07 20:27:42'),
(14, 282, -10.00, 'Redeemed on order of 201301188', '2014-01-08 10:36:05'),
(15, 282, 10.00, 'Successfully order of 201301188', '2014-01-08 10:36:05'),
(16, 282, 0.00, 'Redeemed on order of 201301189', '2014-01-09 16:40:55'),
(17, 282, 100.00, 'Successfully order of 201301189', '2014-01-09 16:40:55'),
(18, 282, -185.00, 'Redeemed on order of 201301190', '2014-01-09 16:42:34'),
(19, 282, 10000.00, 'Successfully order of 201301190', '2014-01-09 16:42:34'),
(20, 296, 0.00, 'Redeemed on order of 201301191', '2014-01-09 16:56:55'),
(21, 296, 1000.00, 'Successfully order of 201301191', '2014-01-09 16:56:55'),
(22, 282, 0.00, 'Redeemed on order of 201301192', '2014-01-10 13:50:39'),
(23, 282, 10.00, 'Successfully order of 201301192', '2014-01-10 13:50:39'),
(24, 298, 0.00, 'Redeemed on order of 201301193', '2014-01-10 13:58:17'),
(25, 298, 20.00, 'Successfully order of 201301193', '2014-01-10 13:58:17'),
(26, 282, 10.00, 'Successfully order of 201301194', '2014-01-13 10:37:29'),
(27, 282, 30.00, 'Successfully order of 201301195', '2014-01-13 11:03:23'),
(28, 282, 10.00, 'Successfully order of 201301197', '2014-01-13 11:37:27'),
(29, 282, -10.00, 'Redeemed on order of 201301198', '2014-01-13 11:52:41'),
(30, 282, 10.00, 'Successfully order of 201301198', '2014-01-13 11:52:41'),
(31, 282, 10.00, 'Successfull Referral to serg.casquejo@yahoo.com', '2014-01-14 08:27:18'),
(32, 306, 2.00, 'Successfull Referral to serg.casquejo@yahoo.com', '2014-01-16 01:12:51'),
(33, 307, 30.00, 'Successfully order of 201301199', '2014-01-16 01:40:19'),
(34, 307, 30.00, 'Successfully order of 201301199', '2014-01-16 01:40:59'),
(35, 307, 20.00, 'Successfully order of 201301200', '2014-01-16 01:46:41'),
(36, 306, 2.00, 'Affiliate serg.casquejo@yahoo.com Successfully order of 201301200', '2014-01-16 01:46:41'),
(37, 306, 10.00, 'Successfully order of 201301201', '2014-01-21 00:53:11'),
(38, 306, 0.40, 'Affiliate philweb.programmer49@gmail.com Successfully order of 201301201', '2014-01-21 00:53:11'),
(39, 306, 38.00, 'Successfully order of 201301202', '2014-01-21 00:56:42'),
(40, 306, 2.00, 'Affiliate philweb.programmer49@gmail.com Successfully order of 201301202', '2014-01-21 00:56:42'),
(41, 306, -45.00, 'Redeemed on order of 201301203', '2014-01-21 01:00:06'),
(42, 306, 45.00, 'Successfully order of 201301203', '2014-01-21 01:00:06'),
(43, 306, 3.00, 'Affiliate philweb.programmer49@gmail.com Successfully order of 201301203', '2014-01-21 01:00:06'),
(44, 306, 40.00, 'Successfully order of 201301204', '2014-01-21 01:42:13'),
(45, 306, 4.00, 'Affiliate philweb.programmer49@gmail.com Successfully order of 201301204', '2014-01-21 01:42:13'),
(46, 292, 30.00, 'Successfully order of 201301205', '2014-01-23 04:06:39'),
(47, 292, -10.00, 'Redeemed on order of 201301206', '2014-01-23 04:08:50'),
(48, 292, 10.00, 'Successfully order of 201301206', '2014-01-23 04:08:50'),
(49, 292, -20.00, 'Redeemed on order of 201301211', '2014-01-23 05:49:14'),
(50, 292, 20.00, 'Successfully order of 201301211', '2014-01-23 05:49:14'),
(51, 292, 150.00, 'Successfully order of 201301212', '2014-01-24 09:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `gy_loyalty_points_settings`
--

CREATE TABLE `gy_loyalty_points_settings` (
  `level_id` int(10) unsigned NOT NULL,
  `redeemed` decimal(10,2) DEFAULT NULL,
  `earned` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1 - active, 0 - Inactive',
  PRIMARY KEY (`level_id`),
  KEY `fk_gy_loyalty_points_settings_gy_levels1_idx` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_loyalty_points_settings`
--

INSERT INTO `gy_loyalty_points_settings` (`level_id`, `redeemed`, `earned`, `status`) VALUES
(1, 5.00, 5.00, 1),
(2, 2.00, 4.00, 1),
(3, 5.00, 10.00, 1),
(4, 3.00, 4.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gy_migrations`
--

CREATE TABLE `gy_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gy_months`
--

CREATE TABLE `gy_months` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `month` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `gy_months`
--

INSERT INTO `gy_months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `gy_orders`
--

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

--
-- Dumping data for table `gy_orders`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `gy_order_details`
--

CREATE TABLE `gy_order_details` (
  `order_id` bigint(20) unsigned NOT NULL,
  `item_code` bigint(20) NOT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_sub_total` decimal(10,2) DEFAULT NULL,
  `customer_to_earned` decimal(10,2) unsigned NOT NULL,
  `customer_to_redemmed` decimal(10,2) unsigned NOT NULL,
  KEY `fk_gy_order_details_gy_products1_idx` (`item_code`),
  KEY `fk_gy_order_details_gy_orders1` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_order_details`
--

INSERT INTO `gy_order_details` (`order_id`, `item_code`, `item_price`, `item_quantity`, `item_sub_total`, `customer_to_earned`, `customer_to_redemmed`) VALUES
(201301196, 2013015, 10.00, 1, 10.00, 10.00, 100.00),
(201301197, 2013015, 10.00, 1, 10.00, 10.00, 100.00),
(201301200, 2013015, 10.00, 1, 10.00, 10.00, 10.00),
(201301204, 2013015, 10.00, 2, 20.00, 20.00, 20.00),
(201301207, 2013021, 1.00, 1, 1.00, 10.00, 10.00),
(201301208, 2013021, 1.00, 1, 1.00, 10.00, 10.00),
(201301209, 2013021, 1.00, 1, 1.00, 10.00, 10.00),
(201301210, 2013021, 1.00, 1, 1.00, 10.00, 10.00),
(201301211, 2013021, 1.00, 1, 1.00, 10.00, 10.00),
(201301212, 2013015, 10.00, 15, 150.00, 150.00, 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `gy_password_reminders`
--

CREATE TABLE `gy_password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gy_password_reminders`
--

INSERT INTO `gy_password_reminders` (`email`, `token`, `created_at`) VALUES
('customer14@gmail.com', 'd5e841cb4e0c7c6382f2ffae7549b1b2d6295508', '2013-11-25 01:12:51'),
('philweb.programmer49@gmail.com', '4084fca72db56c6a1edec8794588e5fb51cedb43', '2014-01-07 11:38:01'),
('philweb.programmer49@gmail.com', 'c947a49c5109b930a5ce08fd0734ff6e85303826', '2014-01-07 11:39:19'),
('philweb.programmer49@gmail.com', 'bdc2afe4b6b4aebe7fd19b9f221627062a420165', '2014-01-07 11:40:33'),
('delmar@lightmedia.com.au', '109d0fc9f16dc67af1b301191f9e2cb5f80d4cf1', '2014-01-10 14:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `gy_payments`
--

CREATE TABLE `gy_payments` (
  `txnid` varchar(70) NOT NULL DEFAULT '',
  `order_number` bigint(20) unsigned NOT NULL,
  `payment_amount` decimal(10,2) unsigned DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`txnid`),
  UNIQUE KEY `txnid` (`txnid`),
  KEY `fk_gy_buyer_gy_orders1` (`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_payments`
--

INSERT INTO `gy_payments` (`txnid`, `order_number`, `payment_amount`, `payment_status`, `created_time`) VALUES
('0SJ923915X6935647', 201301195, 128.49, 'Completed', '2014-01-13 11:03:23'),
('13D91218PS334170R', 201301194, 90.00, 'Completed', '2014-01-13 10:37:28'),
('2D398348FH458883P', 201301212, 150.00, 'Completed', '2014-01-24 09:27:47'),
('2NF18307MK164915G', 201301189, 200.00, 'Completed', '2014-01-09 16:40:55'),
('3DC42360592222001', 201301200, 100.00, 'Completed', '2014-01-16 01:46:41'),
('3NU279591U325941M', 201301204, 200.00, 'Completed', '2014-01-21 01:42:13'),
('3R8582958Y309481Y', 201301192, 90.00, 'Completed', '2014-01-10 13:50:39'),
('57E246568N589032G', 201301206, 20.00, 'Completed', '2014-01-23 04:08:50'),
('59G89630XR189854H', 201301191, 2000.00, 'Completed', '2014-01-09 16:56:55'),
('5C961985YG073853P', 201301202, 100.00, 'Completed', '2014-01-21 00:56:42'),
('5RK59283AK081332U', 201301201, 20.00, 'Completed', '2014-01-21 00:53:11'),
('5VW62730BK520803Y', 201301203, 150.00, 'Completed', '2014-01-21 01:00:06'),
('6V536399WX140174B', 201301198, 20.00, 'Completed', '2014-01-13 11:52:41'),
('7TS718415B013774X', 201301199, 289.00, 'Completed', '2014-01-16 01:40:59'),
('8EK47161H3607304A', 201301197, 10.00, 'Completed', '2014-01-13 11:37:27'),
('8GY77303WX2630210', 201301211, 21.00, 'Completed', '2014-01-23 05:49:14'),
('8ST01389E7395350J', 201301205, 60.00, 'Completed', '2014-01-23 04:06:39'),
('94S49007RD479604T', 201301193, 1566.62, 'Completed', '2014-01-10 13:58:17'),
('9SL36970HG439702K', 201301190, 9000.00, 'Completed', '2014-01-09 16:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `gy_postmeta`
--

CREATE TABLE `gy_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_gy_postmeta_gy_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2938 ;

--
-- Dumping data for table `gy_postmeta`
--

INSERT INTO `gy_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(265, 44, 'attachment_title', ''),
(266, 44, 'attachment_type', 'post'),
(267, 44, 'attachment', '26'),
(268, 44, 'product_terms_and_conditions', '<p>maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n'),
(269, 44, 'product_redemption', '100'),
(270, 44, 'gold_membership', '1000'),
(271, 44, 'elite_gold', '900'),
(272, 44, 'platinum', '800'),
(273, 44, 'registered', '0'),
(274, 44, 'page_title', 'maiores alias consequatur aut perferendis doloribus asperiores repellat."'),
(275, 44, 'page_meta_description', 'maiores alias consequatur aut perferendis doloribus asperiores repellat."'),
(276, 44, 'notes', 'maiores alias consequatur aut perferendis doloribus asperiores repellat."'),
(313, 48, 'attachment_title', ''),
(314, 48, 'attachment_type', 'post'),
(315, 48, 'attachment', '29'),
(316, 48, 'page_title', 'asdfasdf'),
(317, 48, 'page_meta_description', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui'),
(318, 48, 'notes', 'asdfasdfasdf'),
(320, 50, 'page_title', 'sunt in culpa qui officia deserunt mollit anim id est laborum'),
(321, 50, 'page_meta_description', 'sunt in culpa qui officia deserunt mollit anim id est laborum'),
(322, 50, 'notes', 'sunt in culpa qui officia deserunt mollit anim id est laborum'),
(1667, 501, 'product_terms_and_conditions', '<p>S<strong>ed ut perspiciatis unde omnis iste natus</strong> error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, <strong>qui dolorem ipsum quia dolo</strong>r sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n'),
(1668, 501, 'product_redemption', '10'),
(1669, 501, 'gold_membership', '10'),
(1670, 501, 'elite_gold', '10'),
(1671, 501, 'platinum', '10'),
(1672, 501, 'registered', '10'),
(1673, 501, 'page_title', ''),
(1674, 501, 'page_meta_description', ''),
(1675, 501, 'notes', ''),
(1765, 501, 'platinum_redeemed', '100'),
(1766, 501, 'elite_gold_redeemed', '10'),
(1767, 501, 'gold_membership_redeemed', '10'),
(1768, 501, 'platinum_earned', '10'),
(1769, 501, 'elite_gold_earned', '10'),
(1770, 501, 'gold_membership_earned', '10'),
(1869, 505, 'page_title', ''),
(1870, 505, 'page_meta_description', ''),
(1871, 505, 'notes', ''),
(1872, 506, 'page_title', ''),
(1873, 506, 'page_meta_description', ''),
(1874, 506, 'notes', ''),
(1878, 507, 'page_title', 'Quis autem vel eum iure '),
(1879, 507, 'page_meta_description', 'aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'),
(1880, 507, 'notes', ''),
(1890, 510, 'page_title', ''),
(1891, 510, 'page_meta_description', ''),
(1892, 510, 'notes', ''),
(2107, 570, 'banner_title', ''),
(2108, 570, 'banner_meta_description', ''),
(2109, 570, 'notes', ''),
(2117, 572, 'banner_title', ''),
(2118, 572, 'banner_meta_description', ''),
(2119, 572, 'notes', ''),
(2120, 573, 'banner_title', ''),
(2121, 573, 'banner_meta_description', ''),
(2122, 573, 'notes', ''),
(2132, 573, 'banner_url', 'http://csk.local/contact-us-1'),
(2133, 572, 'banner_url', 'http://ww.google.com'),
(2134, 570, 'banner_url', 'www.yahoo.com'),
(2135, 570, 'banner_target', '1'),
(2140, 572, 'banner_target', NULL),
(2145, 573, 'banner_target', NULL),
(2176, 501, 'registered_redeemed', '10'),
(2177, 501, 'registered_earned', '10'),
(2178, 501, 'attachment_title', ''),
(2179, 501, 'attachment_type', 'url'),
(2180, 501, 'attachment', 'http://vimeo.com/81025098'),
(2190, 507, 'attachment_title', ''),
(2191, 507, 'attachment_type', 'url'),
(2192, 507, 'attachment', 'http://vimeo.com/81025098'),
(2244, 579, 'attachment_title', ''),
(2245, 579, 'attachment_type', 'url'),
(2246, 579, 'attachment', 'http://www.youtube.com/watch?v=lEZ8cnVGVZE'),
(2247, 579, 'page_title', ''),
(2248, 579, 'page_meta_description', ''),
(2249, 579, 'notes', ''),
(2250, 580, 'attachment_title', ''),
(2251, 580, 'attachment_type', 'url'),
(2252, 580, 'attachment', 'http://www.youtube.com/watch?v=lEZ8cnVGVZE'),
(2253, 580, 'page_title', ''),
(2254, 580, 'page_meta_description', ''),
(2255, 580, 'notes', ''),
(2262, 581, 'banner_target', '1'),
(2263, 581, 'banner_url', 'http://vimeo.com/81025098'),
(2317, 540, 'page_title', ''),
(2318, 540, 'page_meta_description', ''),
(2319, 540, 'notes', ''),
(2341, 590, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/13\\/no-rinse-facial-cleansers-1.jpg","type":"image\\/jpeg","size":11952,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/13\\/post-thumbnail\\/no-rinse-facial-cleansers-1.jpg","large":"media\\/uploads\\/2013\\/13\\/large\\/no-rinse-facial-cleansers-1.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/13\\/listing-thumbnail\\/no-rinse-facial-cleansers-1.jpg","medium":"media\\/uploads\\/2013\\/13\\/medium\\/no-rinse-facial-cleansers-1.jpg","thumbnail":"media\\/uploads\\/2013\\/13\\/thumbnail\\/no-rinse-facial-cleansers-1.jpg"}}'),
(2342, 591, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/13\\/banner1.png","type":"image\\/png","size":291077,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/13\\/post-thumbnail\\/banner1.png","large":"media\\/uploads\\/2013\\/13\\/large\\/banner1.png","listing-thumbnail":"media\\/uploads\\/2013\\/13\\/listing-thumbnail\\/banner1.png","medium":"media\\/uploads\\/2013\\/13\\/medium\\/banner1.png","thumbnail":"media\\/uploads\\/2013\\/13\\/thumbnail\\/banner1.png"}}'),
(2343, 570, 'attachment_title', ''),
(2344, 570, 'attachment_type', 'post'),
(2345, 570, 'attachment', '591'),
(2346, 573, 'attachment_title', ''),
(2347, 573, 'attachment_type', 'post'),
(2348, 573, 'attachment', '591'),
(2349, 572, 'attachment_title', ''),
(2350, 572, 'attachment_type', 'post'),
(2351, 572, 'attachment', '591'),
(2352, 540, 'attachment_title', ''),
(2353, 540, 'attachment_type', 'post'),
(2354, 540, 'attachment', '591'),
(2358, 592, 'page_title', ''),
(2359, 592, 'page_meta_description', ''),
(2360, 592, 'notes', ''),
(2364, 581, 'attachment_title', ''),
(2365, 581, 'attachment_type', 'post'),
(2366, 581, 'attachment', '591'),
(2370, 595, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/04-facewash.jpg","type":"image\\/jpeg","size":26307,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/04-facewash.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/04-facewash.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/04-facewash.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/04-facewash.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/04-facewash.jpg"}}'),
(2371, 596, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","type":"image\\/jpeg","size":56102,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg"}}'),
(2373, 598, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/professionals.jpg","type":"image\\/jpeg","size":59538,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/professionals.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/professionals.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/professionals.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/professionals.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/professionals.jpg"}}'),
(2374, 599, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/glowing-skin5248-main_Full.jpg","type":"image\\/jpeg","size":25376,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/glowing-skin5248-main_Full.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/glowing-skin5248-main_Full.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/glowing-skin5248-main_Full.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/glowing-skin5248-main_Full.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/glowing-skin5248-main_Full.jpg"}}'),
(2375, 600, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/17\\/132.large.jpg","type":"image\\/jpeg","size":53768,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/17\\/post-thumbnail\\/132.large.jpg","large":"media\\/uploads\\/2013\\/17\\/large\\/132.large.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/17\\/listing-thumbnail\\/132.large.jpg","medium":"media\\/uploads\\/2013\\/17\\/medium\\/132.large.jpg","thumbnail":"media\\/uploads\\/2013\\/17\\/thumbnail\\/132.large.jpg"}}'),
(2376, 594, 'attachment_title', ''),
(2377, 594, 'attachment_type', 'post'),
(2378, 594, 'attachment', '600'),
(2379, 594, 'page_title', ' Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'),
(2380, 594, 'page_meta_description', ' Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'),
(2381, 594, 'notes', ''),
(2431, 610, '_menu_item_object_id', NULL),
(2432, 610, '_menu_item_object', 'custom'),
(2433, 610, '_menu_item_type', 'custom'),
(2434, 610, '_menu_item_url', 'http://csk.local/promotions'),
(2435, 611, '_menu_item_object_id', NULL),
(2436, 611, '_menu_item_object', 'custom'),
(2437, 611, '_menu_item_type', 'custom'),
(2438, 611, '_menu_item_url', 'http://csk.local/events'),
(2439, 612, '_menu_item_object_id', NULL),
(2440, 612, '_menu_item_object', 'custom'),
(2441, 612, '_menu_item_type', 'custom'),
(2442, 612, '_menu_item_url', 'http://csk.local/services-treatments'),
(2443, 613, '_menu_item_object_id', NULL),
(2444, 613, '_menu_item_object', 'custom'),
(2445, 613, '_menu_item_type', 'custom'),
(2446, 613, '_menu_item_url', 'http://csk.local/groupbuy'),
(2447, 614, '_menu_item_object_id', NULL),
(2448, 614, '_menu_item_object', 'custom'),
(2449, 614, '_menu_item_type', 'custom'),
(2450, 614, '_menu_item_url', 'http://csk.local/customer/ask-expert/create'),
(2451, 615, '_menu_item_object_id', NULL),
(2452, 615, '_menu_item_object', 'custom'),
(2453, 615, '_menu_item_type', 'custom'),
(2454, 615, '_menu_item_url', 'http://csk.local/checkout/step/index'),
(2455, 610, '_menu_item_classes', 's:0:"";'),
(2456, 610, '_menu_item_target', '0'),
(2457, 611, '_menu_item_classes', 's:0:"";'),
(2458, 611, '_menu_item_target', '0'),
(2459, 612, '_menu_item_classes', 's:0:"";'),
(2460, 612, '_menu_item_target', '0'),
(2461, 613, '_menu_item_classes', 's:0:"";'),
(2462, 613, '_menu_item_target', '0'),
(2463, 614, '_menu_item_classes', 's:0:"";'),
(2464, 614, '_menu_item_target', '0'),
(2465, 615, '_menu_item_classes', 's:0:"";'),
(2466, 615, '_menu_item_target', '0'),
(2467, 617, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/promotion-thumb.jpg","type":"image\\/jpeg","size":85405,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/promotion-thumb.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/promotion-thumb.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/promotion-thumb.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/promotion-thumb.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/promotion-thumb.jpg"}}'),
(2468, 618, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy5.jpg","type":"image\\/jpeg","size":80093,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy5.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy5.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy5.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy5.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy5.jpg"}}'),
(2469, 619, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy1.jpg","type":"image\\/jpeg","size":73753,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy1.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy1.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy1.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy1.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy1.jpg"}}'),
(2470, 620, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy2.jpg","type":"image\\/jpeg","size":70801,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy2.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy2.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy2.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy2.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy2.jpg"}}'),
(2471, 621, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy3.jpg","type":"image\\/jpeg","size":69905,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy3.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy3.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy3.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy3.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy3.jpg"}}'),
(2472, 622, 'attachment_metadata', '{"file":"media\\/uploads\\/2013\\/18\\/dummy4.jpg","type":"image\\/jpeg","size":111654,"sizes":{"post-thumbnail":"media\\/uploads\\/2013\\/18\\/post-thumbnail\\/dummy4.jpg","large":"media\\/uploads\\/2013\\/18\\/large\\/dummy4.jpg","listing-thumbnail":"media\\/uploads\\/2013\\/18\\/listing-thumbnail\\/dummy4.jpg","medium":"media\\/uploads\\/2013\\/18\\/medium\\/dummy4.jpg","thumbnail":"media\\/uploads\\/2013\\/18\\/thumbnail\\/dummy4.jpg"}}'),
(2473, 616, 'attachment_title', ''),
(2474, 616, 'attachment_type', 'post'),
(2475, 616, 'attachment', '617'),
(2476, 616, 'banner_url', 'http://csk.local/promotions'),
(2477, 616, 'banner_target', NULL),
(2478, 623, 'attachment_title', ''),
(2479, 623, 'attachment_type', 'post'),
(2480, 623, 'attachment', '619'),
(2481, 623, 'banner_url', 'http://csk.local/groupbuy'),
(2482, 623, 'banner_target', NULL),
(2483, 624, 'attachment_title', ''),
(2484, 624, 'attachment_type', 'post'),
(2485, 624, 'attachment', '620'),
(2486, 624, 'banner_url', 'http://csk.local/treatments-services'),
(2487, 624, 'banner_target', NULL),
(2488, 625, 'attachment_title', ''),
(2489, 625, 'attachment_type', 'post'),
(2490, 625, 'attachment', '621'),
(2491, 625, 'banner_url', 'http://csk.local/event-list'),
(2492, 625, 'banner_target', NULL),
(2493, 626, 'attachment_title', ''),
(2494, 626, 'attachment_type', 'post'),
(2495, 626, 'attachment', '622'),
(2496, 626, 'banner_url', 'http://csk.local/blogs'),
(2497, 626, 'banner_target', NULL),
(2498, 627, 'attachment_title', ''),
(2499, 627, 'attachment_type', 'post'),
(2500, 627, 'attachment', '618'),
(2501, 627, 'banner_url', 'http://csk.local/customer/ask-expert/create'),
(2502, 627, 'banner_target', NULL),
(2510, 634, '_widget_item_object_id', NULL),
(2511, 634, '_widget_item_object', 'custom'),
(2512, 634, '_widget_item_type', 'custom'),
(2513, 634, '_widget_item_classes', 'N;'),
(2514, 634, '_widget_item_target', '0'),
(2515, 634, '_widget_item_url', 'http://'),
(2516, 635, '_menu_item_object_id', NULL),
(2517, 635, '_menu_item_object', 'custom'),
(2518, 635, '_menu_item_type', 'custom'),
(2519, 635, '_menu_item_url', '#'),
(2520, 636, '_menu_item_object_id', NULL),
(2521, 636, '_menu_item_object', 'custom'),
(2522, 636, '_menu_item_type', 'custom'),
(2523, 636, '_menu_item_url', '#'),
(2524, 637, '_menu_item_object_id', NULL),
(2525, 637, '_menu_item_object', 'custom'),
(2526, 637, '_menu_item_type', 'custom'),
(2527, 637, '_menu_item_url', '#'),
(2528, 638, '_menu_item_object_id', NULL),
(2529, 638, '_menu_item_object', 'custom'),
(2530, 638, '_menu_item_type', 'custom'),
(2531, 638, '_menu_item_url', '#'),
(2532, 635, '_menu_item_classes', 's:0:"";'),
(2533, 635, '_menu_item_target', '0'),
(2534, 636, '_menu_item_classes', 's:0:"";'),
(2535, 636, '_menu_item_target', '0'),
(2536, 637, '_menu_item_classes', 's:0:"";'),
(2537, 637, '_menu_item_target', '0'),
(2538, 638, '_menu_item_classes', 's:0:"";'),
(2539, 638, '_menu_item_target', '0'),
(2540, 44, 'gold_membership_redeemed', '.25'),
(2541, 44, 'elite_gold_redeemed', '.25'),
(2542, 44, 'platinum_redeemed', '.25'),
(2543, 44, 'registered_redeemed', '.25'),
(2544, 44, 'gold_membership_earned', '.25'),
(2545, 44, 'elite_gold_earned', '.25'),
(2546, 44, 'platinum_earned', '.25'),
(2547, 44, 'registered_earned', '.25'),
(2548, 633, 'attachment_title', ''),
(2549, 633, 'attachment_type', 'post'),
(2550, 633, 'attachment', '621'),
(2551, 633, 'page_title', 'sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2552, 633, 'page_meta_description', 'sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2553, 631, 'attachment_title', ''),
(2554, 631, 'attachment_type', 'post'),
(2555, 631, 'attachment', '629'),
(2556, 631, 'page_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit'),
(2557, 631, 'page_meta_description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit'),
(2564, 639, 'page_title', 'test page'),
(2565, 639, 'page_meta_description', ''),
(2566, 640, '_menu_item_object_id', '510'),
(2567, 640, '_menu_item_object', 'page'),
(2568, 640, '_menu_item_type', 'post'),
(2569, 640, '_menu_item_url', 'http://'),
(2570, 640, '_menu_item_classes', 's:0:"";'),
(2571, 640, '_menu_item_target', '0'),
(2572, 641, 'page_title', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2573, 641, 'page_meta_description', ' Ut enim ad minim veniam, quis nostrud exercitation'),
(2582, 626, 'button_text', 'Read More'),
(2583, 627, 'button_text', 'Ask Now'),
(2584, 623, 'button_text', 'Buy Now'),
(2585, 625, 'button_text', 'Buy Now'),
(2586, 616, 'button_text', 'Buy Now'),
(2587, 624, 'button_text', 'Buy Now'),
(2605, 646, 'attachment_title', ''),
(2606, 646, 'attachment_type', 'post'),
(2607, 646, 'attachment', '598'),
(2608, 646, 'page_title', 'Dolor lorem'),
(2609, 646, 'page_meta_description', 'Dolor lorem'),
(2610, 647, 'attachment_title', ''),
(2611, 647, 'attachment_type', 'post'),
(2612, 647, 'attachment', '597'),
(2613, 647, 'page_title', 'asdfasdf'),
(2614, 647, 'page_meta_description', 'fasdfasdfasdf'),
(2615, 50, 'attachment_title', 'Lorem ipsum'),
(2616, 50, 'attachment_type', 'url'),
(2617, 50, 'attachment', 'http://www.youtube.com/watch?v=NDXkblVJzxs&list=PLB25E61C3586DEB39'),
(2642, 595, 'attachment_image_alt', 'adsfasdf'),
(2643, 652, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/23\\/memos.jpg","type":"image\\/jpeg","size":23134,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/23\\/post-thumbnail\\/memos.jpg","large":"media\\/uploads\\/2014\\/23\\/large\\/memos.jpg","listing-thumbnail":"media\\/uploads\\/2014\\/23\\/listing-thumbnail\\/memos.jpg","medium":"media\\/uploads\\/2014\\/23\\/medium\\/memos.jpg","thumbnail":"media\\/uploads\\/2014\\/23\\/thumbnail\\/memos.jpg"}}'),
(2644, 621, 'attachment_image_alt', ''),
(2645, 596, 'attachment_image_alt', 'adsfasdfadsfadsf'),
(2646, 653, 'attachment_title', ''),
(2647, 653, 'attachment_type', 'post'),
(2648, 653, 'attachment', '618'),
(2649, 653, 'product_terms_and_conditions', '<p>adsfadsfasdf</p>\r\n'),
(2650, 653, 'gold_membership_redeemed', '10'),
(2651, 653, 'elite_gold_redeemed', '10'),
(2652, 653, 'platinum_redeemed', '10'),
(2653, 653, 'registered_redeemed', '10'),
(2654, 653, 'gold_membership_earned', '10'),
(2655, 653, 'elite_gold_earned', '10'),
(2656, 653, 'platinum_earned', '10'),
(2657, 653, 'registered_earned', '10'),
(2658, 653, 'page_title', 'adfadsf'),
(2659, 653, 'page_meta_description', ''),
(2674, 655, 'attachment_title', ''),
(2675, 655, 'attachment_type', 'post'),
(2676, 655, 'attachment', '652'),
(2677, 655, 'product_terms_and_conditions', '<p>adsfadsfadsf</p>\r\n'),
(2678, 655, 'gold_membership_redeemed', '10'),
(2679, 655, 'elite_gold_redeemed', '10'),
(2680, 655, 'platinum_redeemed', '10'),
(2681, 655, 'registered_redeemed', '10'),
(2682, 655, 'gold_membership_earned', '10'),
(2683, 655, 'elite_gold_earned', '10'),
(2684, 655, 'platinum_earned', '10'),
(2685, 655, 'registered_earned', '10'),
(2686, 655, 'page_title', 'asdfadsf'),
(2687, 655, 'page_meta_description', 'adsfasdf'),
(2690, 657, 'page_title', 'Treatments & Services '),
(2691, 657, 'page_meta_description', 'Treatments & Services '),
(2711, 506, 'attachment_title', 'asdfads'),
(2712, 506, 'attachment_type', 'url'),
(2713, 506, 'attachment', 'http://www.youtube.com/watch?v=NDXkblVJzxs&list=PLB25E61C3586DEB39'),
(2714, 663, 'attachment_metadata', '{"file":"media\\/uploads\\/2014\\/23\\/plus.png","type":"image\\/png","size":2377,"sizes":{"post-thumbnail":"media\\/uploads\\/2014\\/23\\/post-thumbnail\\/plus.png","large":"media\\/uploads\\/2014\\/23\\/large\\/plus.png","listing-thumbnail":"media\\/uploads\\/2014\\/23\\/listing-thumbnail\\/plus.png","medium":"media\\/uploads\\/2014\\/23\\/medium\\/plus.png","thumbnail":"media\\/uploads\\/2014\\/23\\/thumbnail\\/plus.png"}}'),
(2818, 687, 'attachment_title', ''),
(2819, 687, 'attachment_type', 'post'),
(2820, 687, 'attachment', '682'),
(2821, 687, 'page_title', 'asdfasdf'),
(2822, 687, 'page_meta_description', 'asdfasdf'),
(2885, 622, 'attachment_image_alt', ''),
(2886, 689, 'banner_target', '1'),
(2887, 689, 'banner_url', 'http://csk.local/event/auto-draft-4'),
(2888, 689, 'button_text', 'View'),
(2889, 689, 'attachment_title', ''),
(2890, 689, 'attachment_type', 'post'),
(2891, 689, 'attachment', '595'),
(2895, 690, 'banner_url', 'http://csk.local/event/auto-draft-4'),
(2896, 690, 'button_text', 'View'),
(2897, 690, 'banner_target', NULL),
(2898, 691, 'attachment_title', ''),
(2899, 691, 'attachment_type', 'post'),
(2900, 691, 'attachment', '621'),
(2901, 691, 'banner_target', '1'),
(2902, 691, 'banner_url', 'http://csk.local/event/auto-draft-4'),
(2903, 691, 'button_text', 'View'),
(2904, 692, 'attachment_title', ''),
(2905, 692, 'attachment_type', 'post'),
(2906, 692, 'attachment', '621'),
(2907, 692, 'banner_url', 'http://csk.local/event/auto-draft-4'),
(2908, 692, 'button_text', 'View'),
(2909, 692, 'banner_target', NULL),
(2910, 693, 'banner_url', 'www.google.com'),
(2911, 693, 'button_text', 'View'),
(2912, 693, 'banner_target', NULL),
(2913, 694, 'attachment_title', ''),
(2914, 694, 'attachment_type', 'post'),
(2915, 694, 'attachment', '622'),
(2916, 694, 'banner_url', 'www.yahoo.com'),
(2917, 694, 'button_text', 'View'),
(2918, 694, 'banner_target', NULL),
(2919, 695, 'attachment_title', ''),
(2920, 695, 'attachment_type', 'post'),
(2921, 695, 'attachment', '621'),
(2922, 695, 'banner_target', '1'),
(2923, 695, 'banner_url', 'www.google.com'),
(2924, 695, 'button_text', 'View'),
(2925, 693, 'attachment_title', ''),
(2926, 693, 'attachment_type', 'post'),
(2927, 693, 'attachment', '618'),
(2928, 507, 'page_template', '0'),
(2929, 657, 'page_template', 'treatments-services-template'),
(2930, 696, 'page_template', 'events-template'),
(2931, 696, 'page_title', ''),
(2932, 696, 'page_meta_description', ''),
(2933, 690, 'attachment_title', ''),
(2934, 690, 'attachment_type', 'post'),
(2935, 690, 'attachment', '618'),
(2936, 655, 'display_to_list', '1'),
(2937, 655, 'hide_to_list', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gy_posts`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=697 ;

--
-- Dumping data for table `gy_posts`
--

INSERT INTO `gy_posts` (`id`, `post_title`, `post_content`, `post_excerpt`, `post_type`, `author_id`, `comment_status`, `post_parent`, `post_name`, `guid`, `menu_order`, `menu_level`, `post_mimetype`, `comment_count`, `post_date`, `updated_at`, `post_status`) VALUES
(44, 'maiores alias consequatur aut perferendis doloribus asperiores repellat', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', 'maiores alias consequatur aut perferendis doloribus asperiores repellat."', 'promotion', 1, 'open', 0, '', 'maiores-alias-consequatur', 0, 1, '', '', '2014-01-30 01:15:35', '2014-01-30 01:15:39', 'publish'),
(48, 'Privacy Policy', '<p><span style="background-color:rgb(255, 255, 255)">Sed&nbsp;</span><strong>ut perspiciatis unde omnis</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem&nbsp;</span><strong>sequi nesciunt. Neque porro quisquam</strong><span style="background-color:rgb(255, 255, 255)">&nbsp;est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n', 'quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui', 'page', 1, 'open', 0, '', 'privacy-policy-1', 0, 1, '', '', '2013-12-12 03:05:46', '2013-12-12 03:05:52', 'publish'),
(50, 'sunt in culpa qui officia deserunt mollit anim id est laborum', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore <strong>magna aliqua. Ut</strong> enim ad minim veniam, quis nostrud exercitation ullamco <strong>laboris</strong> nisi ut aliquip ex <strong>ea commodo</strong> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa <strong>qui officia</strong> deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>asdfasdfasdf</p>\r\n', 'sunt in culpa qui officia deserunt mollit anim id est laborum', 'blog', 1, 'open', 0, '', 'eserunt-mollit', 0, 1, '', '', '2014-01-23 05:01:59', '2014-01-23 05:02:36', 'publish'),
(501, 'chitecto beatae vitae dicta s', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', '', 'promotion', 1, 'open', 0, '', 'auto-draft-1', 0, 1, '', '0', '2013-12-15 22:32:46', '2013-12-15 22:32:54', 'publish'),
(505, 'Email Us', '<p><span style="font-size:18px"><strong><span style="background-color:rgb(255, 255, 255)">Lorem ipsum dolor sit amet.</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><span style="font-size:18px"><span style="background-color:rgb(255, 255, 255)">consectetur adipisicing elit</span></span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong><span style="background-color:rgb(255, 255, 255)">commodo consequat</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 1, 'open', 0, '', 'email-us', 0, 1, '', '0', '2013-12-12 00:49:35', '2013-12-12 00:49:44', 'publish'),
(506, 'Disclaimer', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="background-color:rgb(255, 255, 255)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="background-color:rgb(255, 255, 255)">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>\r\n', '', 'page', 1, 'open', 0, '', 'disclaimer', 0, 1, '', '0', '2014-01-23 06:12:09', '2014-01-23 06:17:05', 'publish'),
(507, 'Contact Us', '<p><span style="font-size:18px"><strong><span style="background-color:rgb(255, 255, 255)">Sed ut perspiciatis unde omnis</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong><span style="background-color:rgb(255, 255, 255)">labore et dolore magnam&nbsp;</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="background-color:rgb(255, 255, 255)">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. ', 'page', 1, 'open', 0, '', 'contact-us-1', 0, 1, '', '0', '2014-01-28 08:29:13', '2014-01-28 08:31:08', 'publish'),
(510, 'Social Media', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="background-color:rgb(255, 255, 255)">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'page', 1, 'open', 0, '', 'social-media', 0, 1, '', '0', '2013-12-12 02:22:37', '2013-12-12 02:34:23', 'publish'),
(540, 'Excepteur sint occaecat cupidatat', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 1, 'open', 0, '', 'excepteur-sint-occaecat-cupidatat', 0, 1, '', '0', '2013-12-15 16:21:32', '2013-12-15 16:21:49', 'publish'),
(570, 'Face Sculpting', 'Having a symmetrical face, well-defined nose, cheekbone and jaw line are considered good looking features desirable by many people. \r\n', 'Achieve flawless, smooth skin', 'banner', 1, 'open', 0, '', 'face-sculpting', 0, 1, '', '0', '2013-12-13 01:16:48', '2013-12-13 01:16:58', 'publish'),
(572, 'Face removal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'banner', 1, 'open', 0, '', 'face-removal', 0, 1, '', '0', '2013-12-13 01:17:15', '2013-12-13 01:17:22', 'publish'),
(573, 'Hair removal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'banner', 1, 'open', 0, '', 'hair-removal', 0, 1, '', '0', '2013-12-13 01:17:03', '2013-12-13 01:17:10', 'publish'),
(579, 'cillum dolore eu fugiat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'page', 1, 'open', 0, '', 'draft-2', 0, 1, '', '0', '2013-12-12 23:36:33', '2013-12-12 23:37:05', 'publish'),
(580, 'mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'blog', 1, 'open', 0, '', 'mollit-anim-id-est-laborum', 0, 1, '', '0', '2013-12-12 23:37:27', '2013-12-12 23:38:00', 'publish'),
(581, 'Difference a Day Makes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'qui officia deserunt mollit anim id est laborum', 'banner', 1, 'open', 0, '', 'difference-a-day-makes', 0, 1, '', '0', '2013-12-15 22:04:15', '2013-12-15 22:20:37', 'publish'),
(590, 'no-rinse-facial-cleansers-1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/13/no-rinse-facial-cleansers-1.jpg', 0, 1, 'image/jpeg', '0', '2013-12-13 01:15:05', '2013-12-13 01:15:05', 'Published'),
(591, 'banner1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/13/banner1.png', 0, 1, 'image/png', '0', '2013-12-13 01:16:27', '2013-12-13 01:16:27', 'Published'),
(592, 'How it works', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '', 'page', 1, 'open', 0, '', 'how-it-works', 0, 1, '', '0', '2013-12-15 17:41:10', '2013-12-15 17:41:30', 'publish'),
(594, 'magnam aliquam quaerat', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n', ' Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'blog', 1, 'open', 0, '', 'magnam-aliquam-quaerat', 0, 1, '', '0', '2013-12-16 16:21:56', '2013-12-16 16:22:11', 'publish'),
(595, '04-facewash', '<p>fasdfasdfasdfasdf</p>\r\n', 'asdfasf', 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/17/04-facewash.jpg', 0, 1, 'image/jpeg', '0', '2014-01-24 01:17:15', '2014-01-24 01:17:15', 'draft'),
(596, '9e29655b84d5ef53_whats-the-best-face-wash.preview', '<p>dsfadsfasdf</p>\r\n', 'asdfasf', 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/17/9e29655b84d5ef53_whats-the-best-face-wash.preview.jpg', 0, 1, 'image/jpeg', '0', '2014-01-23 05:21:04', '2014-01-23 05:21:04', 'draft'),
(598, 'professionals', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/17/professionals.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:40', '2013-12-16 16:21:40', 'Published'),
(599, 'glowing-skin5248-main_Full', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/17/glowing-skin5248-main_Full.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:40', '2013-12-16 16:21:40', 'Published'),
(600, '132.large', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/17/132.large.jpg', 0, 1, 'image/jpeg', '0', '2013-12-16 16:21:41', '2013-12-16 16:21:41', 'Published'),
(610, '<i class="fa fa-gift"></i>Promotions', '', 'Promotions', 'nav_menu_item', 1, 'close', 0, 'Promotions', 'i-classfa-fa-giftipromotions', 0, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(611, '<i class="fa fa-calendar"></i> Events', '', '', 'nav_menu_item', 1, 'close', 0, 'Events', 'i-classfa-fa-calendari-events', 2, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(612, '<i class="fa fa-thumbs-up"></i> Services & Treatments', '', '', 'nav_menu_item', 1, 'close', 0, 'Services & Treatments', 'i-classfa-fa-thumbs-upi-services-treatments', 3, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(613, '<i class="fa fa-clock-o"></i> Group Deals', '', '', 'nav_menu_item', 1, 'close', 0, 'Group Deals', 'i-classfa-fa-clock-oi-group-deals', 4, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(614, '<i class="fa fa-info-circle"></i> Ask an expert', '', '', 'nav_menu_item', 1, 'close', 0, 'Ask an expert', 'i-classfa-fa-info-circlei-ask-an-expert', 5, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(615, '<i class="fa fa-shopping-cart"></i> Checkout', '', '', 'nav_menu_item', 1, 'close', 0, 'Checkout', 'i-classfa-fa-shopping-carti-checkout', 6, 1, NULL, '0', '2014-01-24 01:15:16', '2014-01-24 01:15:16', 'publish'),
(616, 'Promotions', 'Lorem ipsum dolor', '', 'banner', 1, 'open', 0, '', 'promotions', 1, 1, '', '0', '2014-01-16 08:29:31', '2014-01-16 08:30:02', 'publish'),
(617, 'promotion-thumb', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/promotion-thumb.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:01', '2013-12-17 17:13:01', 'Published'),
(618, 'dummy5', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/dummy5.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:01', '2013-12-17 17:13:01', 'Published'),
(619, 'dummy1', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/dummy1.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:02', '2013-12-17 17:13:02', 'Published'),
(620, 'dummy2', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/dummy2.jpg', 0, 1, 'image/jpeg', '0', '2013-12-17 17:13:02', '2013-12-17 17:13:02', 'Published'),
(621, 'dummy3', '', '', 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/dummy3.jpg', 0, 1, 'image/jpeg', '0', '2014-01-23 05:12:06', '2014-01-23 05:12:06', 'draft'),
(622, 'dummy4', '', '', 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2013/18/dummy4.jpg', 0, 1, 'image/jpeg', '0', '2014-01-24 01:20:49', '2014-01-24 01:20:49', 'draft'),
(623, 'Group Buy', 'Lorem ipsum dolor', '', 'banner', 1, 'open', 0, '', 'group-buy', 5, 1, '', '0', '2014-01-16 08:29:33', '2014-01-16 08:29:41', 'publish'),
(624, 'Services & Treatments', 'Lorem ipsum', '', 'banner', 1, 'open', 0, '', 'services-treatments', 6, 1, '', '0', '2014-01-28 08:45:50', '2014-01-28 08:45:55', 'publish'),
(625, 'Events', '', '', 'banner', 1, 'open', 0, '', 'events', 7, 1, '', '0', '2014-01-28 08:46:55', '2014-01-28 08:47:00', 'publish'),
(626, 'Articles', '', '', 'banner', 1, 'open', 0, '', 'articles', 8, 1, '', '0', '2014-01-16 08:28:32', '2014-01-16 08:28:40', 'publish'),
(627, 'Ask Questions', '', '', 'banner', 1, 'open', 0, '', 'ask-questions', 9, 1, '', '0', '2014-01-16 08:28:48', '2014-01-16 08:29:13', 'publish'),
(631, 'How to redeem gy points', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'page', 1, 'open', 0, '', 'how-to-redeem-gy-points', 0, 1, '', '0', '2014-01-10 05:53:38', '2014-01-10 05:54:15', 'publish'),
(633, 'How to earn Gytbo points', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'page', 1, 'open', 0, '', 'how-to-earn-gy-points', 0, 1, '', '0', '2014-01-10 05:51:40', '2014-01-10 05:53:01', 'publish'),
(634, 'Content', '<ul class="social pull-left">\r\n            <li><a class="facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>\r\n            <li><a class="twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>\r\n            <li><a class="pinterest" href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>\r\n            <li><a class="gplus" href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>\r\n            <li><a class="youtube" href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>\r\n            <li><a class="instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>\r\n          </ul>\r\n\r\n          <ul class="list-inline list-inline-separator pull-right">            \r\n            <li>\r\n              Hotline: (65) 6100 6868\r\n            </li>\r\n            <li>\r\n                <span class="copyright">\r\n                  &copy; 2014 Gytbo™\r\n                </span>\r\n              </a>\r\n            </li>\r\n          </ul>', '0', 'widget_item', 1, 'close', 0, 'Content', 'content', 0, 1, NULL, '0', '2014-01-27 02:20:55', '2014-01-27 02:20:55', 'publish'),
(635, 'Menu 1', '', '', 'nav_menu_item', 1, 'close', 0, 'Menu 1', 'menu-1', 0, 1, NULL, '0', '2014-01-24 01:14:50', '2014-01-24 01:14:50', 'publish'),
(636, 'Menu 2', '', '', 'nav_menu_item', 1, 'close', 0, 'Menu 2', 'menu-2', 3, 1, NULL, '0', '2014-01-24 01:14:50', '2014-01-24 01:14:50', 'publish'),
(637, 'Menu 3', '', '', 'nav_menu_item', 1, 'close', 0, 'Menu 3', 'menu-3', 4, 1, NULL, '0', '2014-01-24 01:14:50', '2014-01-24 01:14:50', 'publish'),
(638, 'Menu test', '', '', 'nav_menu_item', 1, 'close', 0, 'Menu 4', 'menu-test', 5, 1, NULL, '0', '2014-01-24 01:14:50', '2014-01-24 01:14:50', 'publish'),
(639, 'test page', '<p>test</p>\r\n', '', 'page', 1, 'open', 0, '', 'testclaersk', 0, 1, '', '0', '2014-01-13 10:21:57', '2014-01-13 10:23:23', 'publish'),
(640, 'Social Media', '', '', 'nav_menu_item', 1, 'close', 0, '510', 'social-media-1', 2, 1, NULL, '0', '2014-01-24 01:14:50', '2014-01-24 01:14:50', 'publish'),
(641, 'Terms & Conditions', '<p><span style="font-size:18px"><strong>Lorem ipsum dolor</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:18px"><strong>Lorem ipsum dolor&nbsp;</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '', 'page', 1, 'open', 0, '', 'terms-conditions', 0, 1, '', '0', '2014-01-13 11:10:16', '2014-01-13 11:10:49', 'publish'),
(646, 'Dolor lorem', '<p>Lorem ipsum dolor</p>\r\n', 'asdfasdf', 'page', 1, 'open', 0, '', 'dolor-lorem', 0, 1, '', '0', '2014-01-23 04:58:08', '2014-01-23 04:58:28', 'publish'),
(647, 'sdfadsfasdf', '<p>fadsfasdfas</p>\r\n', 'dfasdfasdf', 'page', 1, 'open', 0, '', 'draftasdfas', 0, 1, '', '0', '2014-01-23 04:58:35', '2014-01-23 04:58:46', 'publish'),
(652, 'memos', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2014/23/memos.jpg', 0, 1, 'image/jpeg', '0', '2014-01-23 05:11:27', '2014-01-23 05:11:27', 'Published'),
(653, 'adsfadsfasdf', '<p>asdfadsf</p>\r\n', 'asdfasdfasdf', 'event', 1, 'open', 0, '', 'auto-draft-4', 0, 1, '', '0', '2014-01-23 05:27:59', '2014-01-23 05:28:31', 'publish'),
(655, 'asdfasdfasdf', '<p>asdfasdfasdfadsfadsf</p>\r\n', 'asdfadsf', 'promotion', 1, 'open', 0, '', 'sdfadsf', 0, 1, '', '0', '2014-01-30 01:17:49', '2014-01-30 01:18:03', 'publish'),
(657, 'Treatments & Services', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'page', 1, 'open', 0, '', 'treatments-services', 0, 1, '', '0', '2014-01-28 09:22:51', '2014-01-28 09:23:08', 'publish'),
(663, 'plus', NULL, NULL, 'attachment', 1, 'close', 0, '', 'http://csk.local/media/uploads/2014/23/plus.png', 0, 1, 'image/png', '0', '2014-01-23 01:00:55', '2014-01-23 01:00:55', 'Published'),
(687, 'Draft', '<p>asdfasdfasdf</p>\r\n', 'asdfadsf', 'page', 1, 'open', 0, '', 'asdfasdfdraft-1', 0, 1, '', '0', '2014-01-24 01:07:52', '2014-01-24 01:08:08', 'publish'),
(688, 'Auto Draft', NULL, NULL, 'groupbuy', 1, 'open', 0, '', 'auto-draft', 0, 1, NULL, '0', '2014-01-27 21:09:36', '2014-01-27 21:09:36', 'auto-draft'),
(689, 'Christmas Day', '', '', 'banner', 1, 'open', 0, '', 'christmas-day', 1, 1, '', '0', '2014-01-28 07:21:44', '2014-01-28 07:21:57', 'publish'),
(690, 'Lorem ipsum dolor', '', '', 'banner', 1, 'open', 0, '', 'lorem-ipsum-dolor', 1, 1, '', '0', '2014-01-28 08:47:30', '2014-01-28 08:47:39', 'publish'),
(691, 'Event 2', '', '', 'banner', 1, 'open', 0, '', 'event-2', 1, 1, '', '0', '2014-01-28 07:40:05', '2014-01-28 07:40:09', 'publish'),
(692, 'Event 3', '', '', 'banner', 1, 'open', 0, '', 'event-3', 1, 1, '', '0', '2014-01-28 07:24:52', '2014-01-28 07:25:10', 'publish'),
(693, 'Service 1', '', '', 'banner', 1, 'open', 0, '', 'service-1', 1, 1, '', '0', '2014-01-28 07:43:31', '2014-01-28 07:52:46', 'publish'),
(694, 'Services 2', '', '', 'banner', 1, 'open', 0, '', 'services-2', 1, 1, '', '0', '2014-01-28 07:42:56', '2014-01-28 07:43:02', 'publish'),
(695, 'Services 3', '', '', 'banner', 1, 'open', 0, '', 'services-3', 1, 1, '', '0', '2014-01-28 07:43:09', '2014-01-28 07:43:14', 'publish'),
(696, 'Events', '', '', 'page', 1, 'open', 0, '', 'event-list', 0, 1, '', '0', '2014-01-28 08:35:01', '2014-01-28 08:35:13', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `gy_posts_comments`
--

CREATE TABLE `gy_posts_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_posts_comments_gy_users1_idx` (`user_id`),
  KEY `fk_gy_posts_comments_gy_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `gy_posts_comments`
--

INSERT INTO `gy_posts_comments` (`id`, `comment`, `created_at`, `user_id`, `post_id`) VALUES
(4, 'hello world', '2013-11-17 16:35:19', 1, 50),
(5, 'Quis autem vel eum iure reprehenderit qui ', '2013-11-28 01:32:54', 1, 501),
(6, 'sunt in culpa qui officia deserunt mollit anim id est laborum', '2013-11-28 01:34:20', 1, 50),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2013-11-28 22:41:42', 1, 501),
(21, 'dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '2013-12-15 21:24:10', 282, 580),
(22, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-12-15 21:24:35', 1, 580);

-- --------------------------------------------------------

--
-- Table structure for table `gy_posts_shared`
--

CREATE TABLE `gy_posts_shared` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` longtext NOT NULL,
  `date_shared` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_gy_posts_shared_gy_posts1_idx` (`post_id`),
  KEY `fk_gy_posts_shared_gy_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gy_post_recently_viewed`
--

CREATE TABLE `gy_post_recently_viewed` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_type` varchar(60) NOT NULL,
  `date_viewed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gy_recent_viewed_gy_users1_idx` (`user_id`),
  KEY `fk_gy_recent_viewed_gy_posts1` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `gy_post_recently_viewed`
--

INSERT INTO `gy_post_recently_viewed` (`id`, `post_id`, `user_id`, `post_type`, `date_viewed`) VALUES
(120, 594, 287, 'blog', '2013-12-23 18:26:48'),
(122, 594, 282, 'blog', '2014-01-06 17:48:49'),
(134, 501, 282, 'promotion', '2014-01-13 11:09:01'),
(144, 594, 292, 'blog', '2014-01-23 04:07:02'),
(146, 653, 1, 'event', '2014-01-28 07:39:30'),
(148, 653, 292, 'event', '2014-01-23 05:45:36'),
(149, 594, 1, 'blog', '2014-01-28 07:28:51'),
(150, 50, 1, 'blog', '2014-01-28 08:41:28'),
(151, 501, 1, 'promotion', '2014-01-28 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `gy_products`
--

CREATE TABLE `gy_products` (
  `productCode` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantity` int(11) unsigned DEFAULT NULL,
  `min_sale_qty` int(10) unsigned NOT NULL DEFAULT '1',
  `max_sale_qty` int(10) unsigned NOT NULL DEFAULT '1000',
  `is_in_stock` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '1 -  in stock, 0 out of stock',
  `is_qty_limited` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1 -  limit, 0 - no limit',
  `deal_start` timestamp NULL DEFAULT NULL,
  `deal_end` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`productCode`),
  UNIQUE KEY `post_id` (`post_id`),
  KEY `fk_gy_products_gy_posts1_idx` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2013024 ;

--
-- Dumping data for table `gy_products`
--

INSERT INTO `gy_products` (`productCode`, `post_id`, `price`, `sale_price`, `discount`, `quantity`, `min_sale_qty`, `max_sale_qty`, `is_in_stock`, `is_qty_limited`, `deal_start`, `deal_end`) VALUES
(2013009, 44, 1000.00, 900.00, 10, 1000, 1, 1000, 1, 1, NULL, NULL),
(2013015, 501, 100.00, 100.00, 10, 963, 1, 1000, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2013021, 653, 10.00, 10.00, 10, 5, 10, 10, 0, 0, '2014-01-23 05:27:00', '2014-01-30 05:27:00'),
(2013023, 655, 10.00, 10.00, 1, 100, 10, 10, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gy_recommendations`
--

CREATE TABLE `gy_recommendations` (
  `ask_expert_id` bigint(20) NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  KEY `fk_gy_recommendations_gy_posts1_idx` (`post_id`),
  KEY `fk_gy_recommendations_gy_ask_expert1_idx` (`ask_expert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gy_referral_settings`
--

CREATE TABLE `gy_referral_settings` (
  `level_id` int(10) unsigned NOT NULL,
  `successfull_referral` decimal(10,2) DEFAULT NULL,
  `no_of_products` int(11) DEFAULT NULL,
  `percentage_of_products` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1 - active, 0 - inactive',
  PRIMARY KEY (`level_id`),
  UNIQUE KEY `level_id_UNIQUE` (`level_id`),
  KEY `fk_gy_referral_settings_gy_levels1_idx` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_referral_settings`
--

INSERT INTO `gy_referral_settings` (`level_id`, `successfull_referral`, `no_of_products`, `percentage_of_products`, `status`) VALUES
(1, 10.00, 10, 10.00, 1),
(2, 5.00, 6, 10.00, 0),
(3, 10.00, 10, 10.00, 1),
(4, 2.00, 0, 2.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gy_roles`
--

CREATE TABLE `gy_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `capability` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `gy_roles`
--

INSERT INTO `gy_roles` (`id`, `capability`) VALUES
(1, 'read'),
(2, 'manage_categories'),
(3, 'manage_reporting'),
(4, 'manage_settings'),
(5, 'add_questions'),
(6, 'manage_inbox'),
(7, 'manage_navigation'),
(8, 'add_groupbuy'),
(9, 'edit_groupbuy'),
(10, 'delete_groupbuy'),
(11, 'delete_other_groupbuy'),
(12, 'add_promotions'),
(13, 'edit_promotions'),
(14, 'delete_promotions'),
(15, 'delete_other_groupbuy'),
(16, 'add_services_treatements'),
(17, 'edit_services_treatements'),
(18, 'delete_services_treatements'),
(19, 'delete_other_services_treatements'),
(20, 'add_events'),
(21, 'edit_events'),
(22, 'delete_events'),
(23, 'delete_other_events'),
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
(40, 'manage_groupbuy'),
(41, 'manage_promotions'),
(42, 'manage_events'),
(43, 'manage_services_treatements'),
(44, 'manage_users'),
(45, 'manage_pages'),
(46, 'manage_blogs'),
(47, 'manage_orders'),
(48, 'manage_media'),
(49, 'add_comment'),
(50, 'add_recommendations'),
(51, 'share_post'),
(52, 'buy_product'),
(53, 'edit_categories'),
(54, 'delete_askexpert_thread'),
(55, 'upload_media'),
(56, 'create_groupbuy'),
(57, 'delete_categories'),
(58, 'create_promotions');

-- --------------------------------------------------------

--
-- Table structure for table `gy_settings`
--

CREATE TABLE `gy_settings` (
  `option_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gy_settings`
--

INSERT INTO `gy_settings` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'admin_email', 'info@lightmedia.com.au'),
(2, 'timezone_string', 'UTC+0'),
(3, 'date_format', 'Y/m/d'),
(4, 'date_format_custom', 'Y/m/d'),
(5, 'time_format', 'g:i a'),
(6, 'time_format_custom', 'g:i a'),
(7, 'paypal_email', 'support@lightmedia.com.au'),
(8, 'payment_mode', 'sandbox'),
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
(20, 'order_recipient_email', 'michael@lightmedia.com.au'),
(21, 'site_page_title', 'Gytbo'),
(22, 'site_meta_desc', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(23, 'timeStartToReduceQty', '01:00');

-- --------------------------------------------------------

--
-- Table structure for table `gy_terms`
--

CREATE TABLE `gy_terms` (
  `term_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `term_group` bigint(10) DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `gy_terms`
--

INSERT INTO `gy_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(39, 'Home', 'home', 0),
(44, 'Sidebar Navigation', 'sidebar-navigation', 0),
(45, 'Configurable Box', 'configurable-box', 0),
(48, 'Footer Widget', 'footer-widget', 0),
(49, 'Footer Navigation', 'footer-navigation', 0),
(54, 'adsfdsfasdfsdf', 'adsfdsfasdfsdf', 0),
(59, 'asfasdf', 'dfasfasdf', 0),
(62, 'dsfasdfadsf', 'asdfasdfasd', 0),
(64, 'asdfasdfasdf', 'asdfasdf', 0),
(65, 'fasdfsdf', 'dsfadsfasd', 0),
(66, 'group buy', 'groupbuy', 0),
(67, 'page 2', 'page-2', 0),
(68, 'blog', 'blog', 0),
(69, 'Events', 'events', 0),
(70, 'Treatment & Services', 'treatment-services', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gy_term_relationships`
--

CREATE TABLE `gy_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL,
  `term_taxonomy_id` bigint(20) NOT NULL,
  `menu_order` int(11) DEFAULT NULL,
  KEY `fk_gy_term_relationships_gy_term_taxonomy1_idx` (`term_taxonomy_id`),
  KEY `fk_gy_term_relationships_gy_posts1_idx` (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gy_term_relationships`
--

INSERT INTO `gy_term_relationships` (`object_id`, `term_taxonomy_id`, `menu_order`) VALUES
(570, 38, 0),
(573, 38, 0),
(572, 38, 0),
(581, 38, 0),
(626, 43, 0),
(627, 43, 0),
(623, 43, 0),
(616, 43, 0),
(635, 47, 0),
(640, 47, 0),
(636, 47, 0),
(637, 47, 0),
(638, 47, 0),
(610, 42, 0),
(611, 42, 0),
(612, 42, 0),
(613, 42, 0),
(614, 42, 0),
(615, 42, 0),
(634, 46, 0),
(689, 67, 0),
(692, 67, 0),
(691, 67, 0),
(694, 68, 0),
(695, 68, 0),
(693, 67, 0),
(693, 68, 0),
(624, 43, 0),
(625, 43, 0),
(690, 67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gy_term_taxonomy`
--

CREATE TABLE `gy_term_taxonomy` (
  `term_taxonomy_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) NOT NULL,
  `taxonomy` varchar(32) DEFAULT NULL,
  `description` longtext,
  `parent` bigint(20) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`term_taxonomy_id`),
  KEY `fk_gy_term_taxonomy_gy_terms_idx` (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `gy_term_taxonomy`
--

INSERT INTO `gy_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(38, 39, 'banner-category', '', 0, 0),
(42, 44, 'nav_menu', '', 0, 0),
(43, 45, 'banner-category', '', 0, 0),
(46, 48, 'widget', '', 0, 0),
(47, 49, 'nav_menu', '', 0, 0),
(56, 59, 'blog-category', 'dsf', 0, 0),
(59, 62, 'category', 'adsdf', 0, 0),
(61, 64, 'promotion-category', 'asdfasdfads', 0, 0),
(62, 64, 'service-treatment-category', 'asdfasdf', 0, 0),
(63, 65, 'event-category', 'asfasdfa', 0, 0),
(64, 66, 'category', 'group buy', 0, 0),
(65, 67, 'page-category', 'page 2', 0, 0),
(66, 68, 'blog-category', 'blog', 0, 0),
(67, 69, 'banner-category', '', 0, 0),
(68, 70, 'banner-category', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gy_usermeta`
--

CREATE TABLE `gy_usermeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `fk_gy_usermeta_gy_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `gy_usermeta`
--

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
(16, 311, 'timezoneOffset', '8');

-- --------------------------------------------------------

--
-- Table structure for table `gy_users`
--

CREATE TABLE `gy_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
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
  `level_id` int(11) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_gy_users_gy_roles1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=314 ;

--
-- Dumping data for table `gy_users`
--

INSERT INTO `gy_users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `address_1`, `address_2`, `postcode`, `state`, `country`, `mobile`, `points`, `total_spend`, `nric`, `designation`, `avatar`, `created_at`, `updated_at`, `last_visit`, `group_id`, `level_id`, `activation_code`, `active`) VALUES
(1, 'admin', '$2y$08$I0KQ6hvVA5oy0S/t9NWUvOn0hcUwIiA.iR2Yz12BYtg8NYVvtkGgm', 'michael1@lightmedia.com.au', 'Michael', 'Montenegro', 'M', '1989-09-07', 'Camolinas Poblacion Cordova Cebu', '', '6017', 'Cebu', 'PH', '4324324324', 0.00, 0.00, '343454543', '', 'media/uploads/users/1/avatar/avatar.png', '2013-11-02 20:14:23', '2014-01-22 01:12:03', NULL, 5, 4, '', 1),
(2, 'doctor', '$2y$08$uolEfrRqKh1A03yFqYwsteEek9bZbKTpDRctBXtudojRXFXVJgeqa', 'philweb.programmer491@gmail.com.au', 'Rafael', 'Rafael', 'M', '1989-09-07', 'Mandaue Cebu City', '', '3432', 'Cebu', 'PH', '4324324324', 0.00, 0.00, '434234324', '', 'media/uploads/users/2/avatar/avatar.jpg', NULL, '2013-12-10 22:50:42', NULL, 3, 0, '', 1),
(197, 'customer14', '$2y$08$I0KQ6hvVA5oy0S/t9NWUvOn0hcUwIiA.iR2Yz12BYtg8NYVvtkGgm', 'customer14@gmail.com', 'Brad', 'Bread', 'M', '1989-09-07', 'Mandaue Cebu City', 'Maguikay st.', '6017', 'Cebu city', 'PH', '236-6175', 0.00, 0.00, '121654646', '', 'media/uploads/users/197/avatar/avatar.jpg', '2013-11-03 11:01:59', '2013-12-04 01:11:38', NULL, 4, 0, '', 1),
(282, 'gabriel', '$2y$08$ii8MrmAohFKPaFr9oO0scOdS8AqmF2H6AZ/cWp/5XpuBjDEj5OBQu', 'michael@lightmedia.com.au', 'Gabriel', 'Angeles', 'M', '1970-01-01', 'Mandaue Maguikay', 'Maguikay', '6601', 'Cebu', 'PH', '123456789', 10070.00, 17638.49, '423423423', '', 'media/uploads/users/282/avatar/avatar.png', '2013-11-26 01:18:58', '2014-01-16 06:13:39', NULL, 2, 3, '', 1),
(283, 'doctor1', '$2y$08$kK7vEmTl9PqTfyXAhCchk.5JTvHcuUGHg47hefoZESruhEKPau.5.', 'stephen@lorem.com', 'Stephen', 'Clause', 'M', '1970-01-01', 'Mandaue Cebu City', '', '4645', 'Cebu', 'PH', '334324234', 0.00, 0.00, '464654645', '', NULL, '2013-11-28 01:48:15', '2013-11-28 01:54:05', NULL, 3, 0, '', 1),
(284, 'customer1', '$2y$08$31MXlJsAoEIHM1rki5M2dORB8NdtjC3CztUPBu/QvUFm/35auGKHS', 'customer1@gmail.com', 'Customer', 'Lorem', 'M', '2013-02-02', 'Camolinas Poblacion Cordova Cebu', '', '6017', 'Cebu', 'PH', '342342343', 0.00, 0.00, '23423423', '', NULL, '2013-12-03 22:22:09', '2013-12-19 03:25:17', NULL, 2, 4, 'fwHeEFdBm5o5VEF8aquBW8pBGvcZXNsik6Ah06J4', 0),
(285, 'customer2', '$2y$08$z70ONxmpf/UHMV8oOvqr1u52Z2LFd0ZSHNA9inx2TPXRyseGgN5CS', 'support@lightmedia.com.au', 'Support', 'LIghtmedia', 'M', '0000-00-00', 'Melbourne', '', '34343', 'Victoria', 'AU', '3424234234', 0.00, 0.00, '2342342343', '', NULL, '2013-12-03 23:25:53', '2013-12-03 23:25:53', NULL, 2, 4, 'fwHeEFdBm5o5VEF8aquBW8pBGvcZXNsik6Ah06J4', 0),
(286, 'customer3', '$2y$08$JmuF0N9lMGs3VdQEGdSwc.WynBjqXNKbqaxihn50daDM.JPSuVlsy', 'customer3@gmail.com', 'dolor', 'sit amit', 'M', '2013-12-11', '342343', '3432', '423423', '43432', 'AF', '34234', 0.00, 0.00, '23423423', '', NULL, '2013-12-04 01:12:12', '2013-12-04 01:15:29', NULL, 3, 0, '', 1),
(287, 'customer4', '$2y$08$OXmYYCxkGsf8qFv5SO5Ba.q5zMt5IsoewbAqGs6S2ohLfbhos22le', 'gabriel1@lightmedia.com.au', 'Customer', 'four', 'M', '2013-12-04', 'Lorem ipsum dolor', '', '6017', 'Cebu', 'PH', '3423423', 140.00, 4360.00, '234234234', '', 'media/uploads/users/287/avatar/avatar.jpg', '2013-12-04 01:43:27', '2013-12-23 18:28:59', NULL, 2, 2, 'euut5BRI499MOoWpCbZyiQLihoCaxo7KEkSRWHgX', 1),
(289, 'customer5', '$2y$08$WX0ydRpOiciXTOj31V9MXOmBS5EdCKhbZ3Z1mWsjiLVFTEb3ZrqNW', 'lorenz@lightmedia.com.au', 'Lorenz', 'Del mar', 'M', '2013-12-04', 'Lorem ipusm dol', '', '23423', 'dolor', 'AD', '34234234234', 0.00, 0.00, '2342342342', '', NULL, '2013-12-04 02:28:31', '2013-12-04 02:28:31', NULL, 2, 4, 'euut5BRI499MOoWpCbZyiQLihoCaxo7KEkSRWHgX', 0),
(290, 'customer15', '$2y$08$rOD8LCjxO7ueRfjkHfJ3Tue4gJK2oMvUFPabFFCLkBxkP/cM0UDEW', 'customer15@gmail.com', 'customer', 'Lorem ipsum dolor', 'M', NULL, 'Lorem ipsum dolor sit', NULL, '', '', '', '23423423432', 0.00, 0.00, NULL, '', NULL, '2013-12-05 20:53:47', '2013-12-05 20:53:47', NULL, 2, 4, 'yTmjzgu31yQa2knapQaxj03nRfqYVydZwnbOr4cf', 0),
(291, 'customer16', '$2y$08$I637rXNrcyLkvS4.DxWUh.dN0OVgZJf31EmNjD9ESx88mt52zcLvu', 'customer16@gmail.com', 'Customer 17', 'asdfasd', 'M', '1970-01-01', 'fasdfsdfasdf', '', '', '', 'AD', '3434234', 20.00, 0.00, '345345345', '', NULL, '2013-12-05 20:54:27', '2013-12-18 09:33:01', NULL, 2, 4, 'yTmjzgu31yQa2knapQaxj03nRfqYVydZwnbOr4cf', 1),
(292, 'arnel', '$2y$08$.sbMBov.8oFdDbExL4G9geLS5/VOz7B5aok6CizGHI7BCfhf3MEBa', 'arnel@yahoo.com', 'Arnel', 'Penida', 'M', '1970-01-01', 'Camolinas poblacion', '', 'adsf', 'dfads', 'AD', '3423423423', 180.00, 251.00, '', '', 'media/uploads/users/292/avatar/avatar.jpg', '2013-12-10 20:01:13', '2014-01-24 09:27:47', NULL, 2, 4, '94gqO42XpWrSh7Q9f4DwSIYy3QMIWMwXpXYRCICx', 1),
(293, 'pineda', '$2y$08$Y2Gz9YRYTNysHw4o1R7r7OIYaELxncn7IrKjKoqF/DqdtQfciAA0K', 'pineda@loremipsum.com', 'Pineda', 'Ariel', 'M', NULL, 'Lorem ipsum dolor', NULL, '', '', '', '33423423', 0.00, 0.00, NULL, '', NULL, '2013-12-10 20:02:27', '2013-12-10 20:02:27', NULL, 2, 4, '94gqO42XpWrSh7Q9f4DwSIYy3QMIWMwXpXYRCICx', 0),
(294, 'customer11', '$2y$08$yC3My0Zg7847zU9z8U8kK.b/U529ZydtOpCX7FK5gtussuIJVQxqq', 'customer11@gmail.com', 'Lorem', 'Lorem', 'M', '1970-01-01', 'Lorem ipsum dolor', NULL, '', '', '', '3424233423', 0.00, 0.00, '343243242', '', 'media/uploads/users/294/avatar/avatar.jpg', '2013-12-16 01:04:09', '2013-12-18 10:01:59', NULL, 2, 4, 'WLdIlqFKbNn5A5P2FaaDh4YyblYskA8K1oG9mYP9', 0),
(295, 'historymaker', '$2y$08$iut9uW.A9fskD3KXuRE3ourPmxiB0G8H48MCo5jnMCJYISeQe71eO', 'sdsad@sdsd.com', 'Darren', 'Tan', 'M', '1970-01-01', 'wqcxcxzcz', '', '', '', 'AD', 'wqewqe', 10.00, 100.00, '', '', NULL, '2013-12-23 11:20:37', '2014-01-03 17:18:43', NULL, 2, 4, '8buKkflVGS88IJkJxVPQbCOYbv6EWRwsiEiYWxRs', 1),
(298, 'delmar', '$2y$08$7BdcLvISex4ycMsDlQ2PrOBA6WalcL92gAgcGrCVrkuX1ZkbNTDZ6', 'delmar@lightmedia.com.au', 'Lawrence', 'Del Mar', 'M', '1979-02-14', 'test address', 'test', '404', 'test', 'AD', '2361567', 20.00, 1566.62, '', '', 'media/uploads/users/298/avatar/avatar.png', '2014-01-10 13:43:36', '2014-01-16 06:05:12', NULL, 2, 4, '', 1),
(299, 'thisisatest', '$2y$08$K9aMjdUNmo3uZk336D5kKueCVqHNfGLfNbq5V95XjlT2X.qAn9Kkq', 'darren@luxid.co', 'luxid', 'test', 'M', '1970-01-01', 'Tampines', NULL, '', '', '', '82227065', 0.00, 0.00, '', '', NULL, '2014-01-13 11:36:31', '2014-01-13 11:39:11', NULL, 5, 4, 'tWNrKIJnXT0cjz6cwYKe4KLzNHfaZSwdRZs6tBvo', 0),
(305, 'dfadsfds_223', '$2y$08$.iQlYAnXMo7P8cm/RKJNDOBvQGacYGW4mvpXsZoQrNUODTgJLNVuu', 'asdf@dsfsdf.com', 'dfadsf', 'asfasdfasd', 'M', NULL, 'fasdfadsfasdf', NULL, '', '', '', '234234', 0.00, 0.00, NULL, '', NULL, '2014-01-16 00:47:17', '2014-01-16 00:47:17', NULL, 2, 4, '', 1),
(306, 'philweb', '$2y$08$6kxl/BeNcNShM/qhGEJem.ZCRejyMVip4l3BIYugBf9MVjYo2owLG', 'philweb.programmer49@gmail.com', 'Philweb', 'Philwb', 'M', '1970-01-01', 'adfasdfasdfadsf', '', '', '', 'AD', '423423423', 107.18, 470.00, '', '', 'media/uploads/users/306/avatar/avatar.jpg', '2014-01-16 00:48:53', '2014-01-23 01:45:18', NULL, 2, 4, '', 1),
(307, 'loremipsumdolor', '$2y$08$OviyG6WhA4lRACbJpCzwq..IbQzzBqfQpl.Xy0e.V4.neStjaktFe', 'serg.casquejo@yahoo.com', 'Lorem ipsum', 'Dolor', 'M', '1970-01-01', 'Lorem ipsum dolor', '', '', '', 'AD', '3423423423', 80.00, 678.00, '', '', 'media/uploads/users/307/avatar/avatar.jpg', '2014-01-16 01:12:50', '2014-01-16 06:54:10', NULL, 2, 4, 'oU5Qozv6zTYdP7xYePKZ7WWpUIlhl6djne3LWlmM', 1),
(308, 'helloworld', '$2y$08$0PUj3CWYwjLFgVwsTIrF/OoMS7Slw.WdSQ8DrNx2Dgho2RmgmCN2i', 'adsfsd@fadsf.com', 'Hello world', 'World', 'M', NULL, 'fadsfasdfadsf', NULL, '', '', '', '234234234', 0.00, 0.00, NULL, '', NULL, '2014-01-21 11:53:34', '2014-01-21 11:53:34', NULL, 2, 4, 'ZQ7zuHeVGVtqxIvSsiOdw6Q77kVr252KEknsAgFd', 0),
(309, 'asdfasdf', '$2y$08$ldsMw0hl6gEiS8xmSCLDjus6xgUNEOgWCsxAeGchWmPJx5E5nymAy', 'dfasdf@dfadsf.com', 'asdfds', 'adsfadsf', 'M', NULL, 'asdfadsf', NULL, '', '', '', '34234234', 0.00, 0.00, NULL, '', NULL, '2014-01-21 11:54:33', '2014-01-21 11:54:33', NULL, 2, 4, 'ZQ7zuHeVGVtqxIvSsiOdw6Q77kVr252KEknsAgFd', 0),
(310, 'asdfasdfasdf', '$2y$08$WumeZipgfj1JRtmgYL2Xa.cD.2BhOt5ZtWiOWaksXmME5z.tALIHS', 'aasdfasf@dfsdf.com', 'asdfasdf', 'afafasdf', 'M', '2014-01-23', 'dfadsfasf', 'adsfa', '43242', 'sfasfads', 'AF', '3424234', 0.00, 0.00, 'asdfadsf', '', 'media/uploads/users/0/avatar/avatar.png', '2014-01-23 01:22:46', '2014-01-23 01:31:02', NULL, 2, 3, '', 1),
(311, 'asdfasdasdf', '$2y$08$2lSr1lSBeOdGWTRW4LJGxegpjmv/VjqR2NXZ567SXucui3YUJA2uK', 'asdfasd@dfadsf.com', 'asdfadsf', 'adsfasdf', 'M', NULL, '4adsfasdfadsf', NULL, '', '', '', '23423423', 0.00, 0.00, NULL, '', NULL, '2014-01-23 01:36:29', '2014-01-23 01:36:29', NULL, 2, 4, 'fE43hbUtZUQ7xVdkF9awgLMbzfGTFxv3JMYP94Qu', 0),
(312, 'wei_lee872@hotmail.com', 'customer_123', 'wei_lee872@hotmail.com', 'tan', 'alicia tan wei lee', '', '1970-01-01', '#03-20  541 pasir ris street 51', '', '510541', '', 'Singapore', '96346870', 0.00, 0.00, 'g7923094x', '', NULL, '2014-02-09 16:00:00', '2014-02-09 16:00:00', NULL, 2, 4, '', 0),
(313, 'wei_lee873@hotmail.com', 'customer_123', 'wei_lee873@hotmail.com', 'tan', 'alicia tan wei lee', '', '1970-01-01', '#03-20  541 pasir ris street 51', '', '510541', '', 'Singapore', '96346870', 0.00, 0.00, 'g7923094x', '', NULL, '2014-02-09 16:00:00', '2014-02-09 16:00:00', NULL, 2, 4, '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gy_ask_attachments`
--
ALTER TABLE `gy_ask_attachments`
  ADD CONSTRAINT `fk_gy_ask_attachments_gy_ask_expert1` FOREIGN KEY (`ask_expert_id`) REFERENCES `gy_ask_expert` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_ask_expert`
--
ALTER TABLE `gy_ask_expert`
  ADD CONSTRAINT `fk_gy_ask_expert_gy_ask_subject1` FOREIGN KEY (`subject_id`) REFERENCES `gy_ask_subject` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_ask_expert_gy_users2` FOREIGN KEY (`sender`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_groups_roles`
--
ALTER TABLE `gy_groups_roles`
  ADD CONSTRAINT `fk_gy_groups_roles_gy_groups1` FOREIGN KEY (`group_id`) REFERENCES `gy_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_groups_roles_gy_roles1` FOREIGN KEY (`role_id`) REFERENCES `gy_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gy_inbox`
--
ALTER TABLE `gy_inbox`
  ADD CONSTRAINT `fk_gy_inbox_gy_ask_expert1` FOREIGN KEY (`ask_expert_id`) REFERENCES `gy_ask_expert` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_inbox_gy_users1` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_loyalty_points_settings`
--
ALTER TABLE `gy_loyalty_points_settings`
  ADD CONSTRAINT `fk_gy_loyalty_points_settings_gy_levels1` FOREIGN KEY (`level_id`) REFERENCES `gy_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gy_order_details`
--
ALTER TABLE `gy_order_details`
  ADD CONSTRAINT `fk_gy_order_details_gy_orders1` FOREIGN KEY (`order_id`) REFERENCES `gy_orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_order_details_gy_products1` FOREIGN KEY (`item_code`) REFERENCES `gy_products` (`productCode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_payments`
--
ALTER TABLE `gy_payments`
  ADD CONSTRAINT `fk_gy_buyer_gy_orders1` FOREIGN KEY (`order_number`) REFERENCES `gy_orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_postmeta`
--
ALTER TABLE `gy_postmeta`
  ADD CONSTRAINT `fk_gy_postmeta_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_posts`
--
ALTER TABLE `gy_posts`
  ADD CONSTRAINT `fk_gy_posts_gy_users1` FOREIGN KEY (`author_id`) REFERENCES `gy_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gy_posts_comments`
--
ALTER TABLE `gy_posts_comments`
  ADD CONSTRAINT `fk_gy_posts_comments_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_posts_comments_gy_users1` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_posts_shared`
--
ALTER TABLE `gy_posts_shared`
  ADD CONSTRAINT `fk_gy_posts_shared_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_posts_shared_gy_users1` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_post_recently_viewed`
--
ALTER TABLE `gy_post_recently_viewed`
  ADD CONSTRAINT `gy_post_recently_viewed_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `gy_post_recently_viewed_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `gy_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_products`
--
ALTER TABLE `gy_products`
  ADD CONSTRAINT `fk_gy_products_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_recommendations`
--
ALTER TABLE `gy_recommendations`
  ADD CONSTRAINT `fk_gy_recommendations_gy_ask_expert1` FOREIGN KEY (`ask_expert_id`) REFERENCES `gy_ask_expert` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_recommendations_gy_posts1` FOREIGN KEY (`post_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_referral_settings`
--
ALTER TABLE `gy_referral_settings`
  ADD CONSTRAINT `fk_gy_referral_settings_gy_levels1` FOREIGN KEY (`level_id`) REFERENCES `gy_levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gy_term_relationships`
--
ALTER TABLE `gy_term_relationships`
  ADD CONSTRAINT `fk_gy_term_relationships_gy_posts1` FOREIGN KEY (`object_id`) REFERENCES `gy_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gy_term_relationships_gy_term_taxonomy1` FOREIGN KEY (`term_taxonomy_id`) REFERENCES `gy_term_taxonomy` (`term_taxonomy_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_term_taxonomy`
--
ALTER TABLE `gy_term_taxonomy`
  ADD CONSTRAINT `fk_gy_term_taxonomy_gy_terms` FOREIGN KEY (`term_id`) REFERENCES `gy_terms` (`term_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gy_users`
--
ALTER TABLE `gy_users`
  ADD CONSTRAINT `fk_gy_users_gy_roles1` FOREIGN KEY (`group_id`) REFERENCES `gy_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
