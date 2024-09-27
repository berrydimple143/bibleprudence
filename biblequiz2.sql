-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `quiz_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_quiz_id_foreign` (`quiz_id`),
  CONSTRAINT `comments_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replied` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contacts_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `download_limits`;
CREATE TABLE `download_limits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `limit` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `app` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `download_limits` (`id`, `limit`, `created_at`, `updated_at`, `app`) VALUES
(1,	100,	'2024-08-30 00:07:20',	'2024-09-16 19:37:17',	'Bible Quiz'),
(3,	100,	'2024-09-16 19:38:38',	'2024-09-16 19:38:38',	'Bible Scavenger'),
(4,	100,	'2024-09-17 02:00:28',	'2024-09-17 02:00:28',	'Bible Outline');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_08_09_151727_create_quizzes_table',	1),
(6,	'2024_08_10_211931_create_topics_table',	2),
(7,	'2024_08_10_221205_create_quizzes_table',	3),
(8,	'2024_08_16_023833_create_selections_table',	4),
(9,	'2024_08_29_011009_create_comments_table',	5),
(10,	'2024_08_30_080052_create_download_limits_table',	6),
(11,	'2024_08_30_082158_create_seo_table',	7),
(12,	'2024_09_04_090239_create_contacts_table',	7),
(13,	'2024_09_17_021921_add_app_to_download_limits_table',	8),
(14,	'2024_09_17_235242_create_scavengers_table',	9),
(15,	'2024_09_17_235945_create_targets_table',	9),
(16,	'2024_09_18_071526_create_seos_table',	10),
(18,	'2024_09_19_135238_add_others_to_seos_table',	11),
(19,	'2024_09_21_064959_create_outlines_table',	12),
(20,	'2024_09_21_065544_create_points_table',	12),
(21,	'2024_09_21_070115_create_subpoints_table',	12),
(22,	'2024_09_24_140056_add_body_to_subpoints_table',	13),
(23,	'2024_09_24_170945_add_replied_to_contacts_table',	14);

DROP TABLE IF EXISTS `outlines`;
CREATE TABLE `outlines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conclusion` text COLLATE utf8mb4_unicode_ci,
  `topic_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `outlines_topic_id_foreign` (`topic_id`),
  CONSTRAINT `outlines_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `outlines` (`id`, `text`, `support_text`, `theme`, `introduction`, `keyword`, `proposition`, `conclusion`, `topic_id`, `created_at`, `updated_at`) VALUES
(2,	'Matthew 8:18-22',	'Luke 9:57-62',	'It takes everything to serve the Lord',	'- It\'s easy to say we will serve the Lord but hard to do',	'necessities',	'There are things which is desperately needed in order to serve the Lord',	'We needed to have these important attitude in order to serve the Lord',	6,	'2024-09-24 05:34:54',	'2024-09-24 08:11:16');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `points`;
CREATE TABLE `points` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `main` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outline_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `points_outline_id_foreign` (`outline_id`),
  CONSTRAINT `points_outline_id_foreign` FOREIGN KEY (`outline_id`) REFERENCES `outlines` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `points` (`id`, `main`, `verse`, `outline_id`, `created_at`, `updated_at`) VALUES
(2,	'We need to love the Lord in order to serve Him',	'Colossians 3:23',	2,	'2024-09-24 06:41:38',	'2024-09-24 06:41:38');

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE `quizzes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question` (`question`(500)),
  KEY `quizzes_topic_id_foreign` (`topic_id`),
  CONSTRAINT `quizzes_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `quizzes` (`id`, `question`, `answer`, `verse`, `level`, `topic_id`, `created_at`, `updated_at`) VALUES
(2,	'Who killed Goliath?',	'David',	'1 Samuel 17:48:-51',	'Easy',	1,	'2024-08-12 09:59:38',	'2024-08-12 10:05:35'),
(3,	'What is the name of Abel\'s brother who killed him?',	'Cain',	'Genesis 4:8',	'Easy',	1,	'2024-08-12 10:05:22',	'2024-08-12 10:05:22'),
(4,	'Who created the heaven and the earth?',	'God',	'Genesis 1:1',	'Easy',	3,	'2024-08-16 02:37:14',	'2024-08-16 02:37:14'),
(5,	'What were the creation of God in the first day?',	'Day and Night',	'Genesis 1:3-5',	'Easy',	3,	'2024-08-22 00:26:13',	'2024-08-22 00:58:07'),
(6,	'What was the creation of God in the second day?',	'Sky',	'Genesis 1:6-8',	'Easy',	3,	'2024-08-22 00:31:37',	'2024-08-22 05:02:05'),
(7,	'What were the creation of God in the third day?',	'Seas, earth and it vegetations',	'Genesis 1:9-12',	'Easy',	3,	'2024-08-22 00:44:14',	'2024-08-22 00:57:48'),
(8,	'What were the creation of God in the fourth day?',	'Sun, Moon and Stars',	'Genesis 1:14-18',	'Easy',	3,	'2024-08-22 01:01:52',	'2024-08-22 01:01:52'),
(9,	'What were the creation of God in the fifth day?',	'Living creatures in the air and in the waters',	'Genesis 1:20-22',	'Easy',	3,	'2024-08-22 04:52:50',	'2024-08-22 04:52:50'),
(10,	'What were the creation of God in the sixth day?',	'Man and Animals',	'Genesis 1:24-30',	'Easy',	3,	'2024-08-22 05:04:20',	'2024-08-22 05:04:20'),
(11,	'What was the creation of God in the seventh day?',	'None',	'Genesis 2:2-3',	'Easy',	3,	'2024-09-05 16:03:20',	'2024-09-05 16:03:20'),
(12,	'What did God used to water the plants of the earth in order to grow during creation?',	'Mist',	'Genesis 2:6',	'Average',	3,	'2024-09-05 16:45:35',	'2024-09-05 16:45:35'),
(13,	'What was the direction of the garden of Eden?',	'East',	'Genesis 2:8',	'Easy',	3,	'2024-09-05 16:50:47',	'2024-09-05 16:50:47'),
(14,	'What is the composition of the body of a human being?',	'Dust of the ground',	'Genesis 2:7',	'Easy',	3,	'2024-09-05 17:06:32',	'2024-09-05 17:06:32'),
(16,	'What was one of the trees which can be found in the midst of the garden of Eden?',	'Tree of life',	'Genesis 2:9',	'Easy',	3,	'2024-09-06 21:50:56',	'2024-09-06 21:50:56'),
(17,	'What is the name of the first river in the garden of Eden?',	'Pison',	'Genesis 2:11',	'Average',	3,	'2024-09-06 21:57:36',	'2024-09-12 20:00:40'),
(19,	'What is the name of the second river in the garden of Eden?',	'Gihon',	'Genesis 2:13',	'Average',	3,	'2024-09-12 23:46:39',	'2024-09-12 23:46:39'),
(20,	'What is the name of the third river in the garden of Eden?',	'Hiddekel',	'Genesis 2:14',	'Average',	3,	'2024-09-13 03:18:45',	'2024-09-13 03:18:45'),
(21,	'What is the name of the fourth river in the garden of Eden?',	'Euphrates',	'Genesis 2:14',	'Average',	3,	'2024-09-13 03:21:53',	'2024-09-13 03:21:53'),
(22,	'What tree did God forbid Adam and Eve to eat from it?',	'Tree of the knowledge of good and evil',	'Genesis 2:17',	'Easy',	3,	'2024-09-24 09:38:57',	'2024-09-24 09:56:06'),
(23,	'What part of Adam was Eve made of?',	'Rib',	'Genesis 2:21-22',	'Easy',	3,	'2024-09-24 09:47:25',	'2024-09-24 09:56:15'),
(24,	'Why was Eve called a \"Woman\"?',	'She was taken out of Man',	'Genesis 2:23',	'Average',	3,	'2024-09-24 09:54:31',	'2024-09-24 09:56:20'),
(25,	'What did Adam and Eve wear after God made them both?',	'None',	'Genesis 2:25',	'Easy',	3,	'2024-09-24 10:02:21',	'2024-09-24 10:02:21'),
(26,	'What beast was more subtil than any beast of the field which the LORD God had made?',	'Serpent',	'Genesis 3:1',	'Easy',	3,	'2024-09-24 10:15:15',	'2024-09-24 10:15:15');

DROP TABLE IF EXISTS `scavengers`;
CREATE TABLE `scavengers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `scavengers` (`id`, `question`, `answer`, `verse`, `status`, `created_at`, `updated_at`) VALUES
(1,	'5th word from the beginning',	'Stone',	'Genesis 31:45',	1,	'2024-09-18 02:39:46',	'2024-09-18 22:14:20'),
(3,	'7th word from the beginning',	'Cross',	'Matthew 10:38',	1,	'2024-09-18 02:48:35',	'2024-09-18 22:14:15'),
(4,	'13th word from the beginning',	'Paper',	'2 John 1:12',	1,	'2024-09-19 03:15:03',	'2024-09-19 03:15:03'),
(5,	'15th word from the beginning',	'Ink',	'2 John 1:12',	1,	'2024-09-19 03:19:17',	'2024-09-19 03:19:17'),
(6,	'6th word from the last',	'Glass',	'Revelation 15:2',	1,	'2024-09-19 03:20:49',	'2024-09-19 03:20:49'),
(7,	'7th word from the beginning',	'Pearls',	'Revelation 21:21',	1,	'2024-09-19 03:22:18',	'2024-09-19 03:22:18'),
(8,	'6th word from the last',	'Fire',	'Revelation 20:14',	1,	'2024-09-19 05:06:00',	'2024-09-19 05:06:00'),
(9,	'8th word from the last',	'Pitcher',	'Genesis 24:18',	1,	'2024-09-24 16:39:17',	'2024-09-24 16:39:17'),
(10,	'3rd word from the last',	'Oil',	'Exodus 39:37',	1,	'2024-09-24 16:43:05',	'2024-09-24 16:43:05'),
(11,	'6th word from the beginning',	'Plant',	'Psalms 107:37',	1,	'2024-09-24 16:46:25',	'2024-09-24 16:46:25'),
(12,	'3rd word from the beginning',	'Table',	'Exodus 31:8',	1,	'2024-09-24 16:48:41',	'2024-09-24 16:48:41');

DROP TABLE IF EXISTS `selections`;
CREATE TABLE `selections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selections_quiz_id_foreign` (`quiz_id`),
  CONSTRAINT `selections_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `selections` (`id`, `option`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1,	'Seth',	3,	'2024-08-15 18:58:03',	'2024-08-15 18:58:03'),
(2,	'Solomon',	3,	'2024-08-15 19:01:25',	'2024-08-15 19:01:25'),
(3,	'Moses',	3,	'2024-08-15 19:02:41',	'2024-08-15 19:02:41'),
(4,	'Cain',	3,	'2024-08-15 19:03:39',	'2024-08-15 19:03:39'),
(5,	'Saul',	2,	'2024-08-15 19:41:36',	'2024-08-15 19:41:36'),
(6,	'David',	2,	'2024-08-15 19:42:12',	'2024-08-15 19:42:12'),
(7,	'Jonathan',	2,	'2024-08-15 20:08:53',	'2024-08-15 20:08:53'),
(8,	'Aaron',	2,	'2024-08-15 20:09:30',	'2024-08-15 20:09:30'),
(9,	'Satan',	4,	'2024-08-16 02:37:58',	'2024-08-16 02:37:58'),
(10,	'Abraham',	4,	'2024-08-16 02:38:18',	'2024-08-16 02:38:18'),
(11,	'God',	4,	'2024-08-16 02:38:32',	'2024-08-16 02:38:32'),
(12,	'Moses',	4,	'2024-08-16 02:39:11',	'2024-08-16 02:39:11'),
(13,	'Sun and Moon',	5,	'2024-08-22 00:27:01',	'2024-08-22 00:27:01'),
(14,	'Day and Night',	5,	'2024-08-22 00:27:53',	'2024-08-22 00:27:53'),
(15,	'Man and Animals',	5,	'2024-08-22 00:28:42',	'2024-08-22 00:28:42'),
(16,	'Birds and Fishes',	5,	'2024-08-22 00:29:10',	'2024-08-22 00:29:10'),
(17,	'Trees and Vegetations',	6,	'2024-08-22 00:32:34',	'2024-08-22 00:32:34'),
(18,	'Land',	6,	'2024-08-22 00:35:43',	'2024-08-22 00:35:43'),
(19,	'Sky',	6,	'2024-08-22 00:36:18',	'2024-08-22 05:01:34'),
(20,	'Storms',	6,	'2024-08-22 00:36:47',	'2024-08-22 00:36:47'),
(21,	'Seas, earth and it vegetations',	7,	'2024-08-22 00:45:54',	'2024-08-22 00:45:54'),
(22,	'Swimming pools',	7,	'2024-08-22 00:46:13',	'2024-08-22 00:46:13'),
(23,	'Stars',	7,	'2024-08-22 00:47:57',	'2024-08-22 00:47:57'),
(24,	'Moons',	7,	'2024-08-22 00:53:13',	'2024-08-22 00:53:13'),
(25,	'Dinasours and Dragons',	8,	'2024-08-22 01:04:40',	'2024-08-22 01:04:40'),
(26,	'Mountains and trees',	8,	'2024-08-22 01:05:21',	'2024-08-22 01:05:21'),
(27,	'Trees and Vegetations',	8,	'2024-08-22 01:11:40',	'2024-08-22 01:11:40'),
(28,	'Sun, Moon and Stars',	8,	'2024-08-22 01:12:40',	'2024-08-22 01:12:40'),
(29,	'Man and Animals',	9,	'2024-08-22 04:53:28',	'2024-08-22 04:53:28'),
(30,	'Trees and Vegetations',	9,	'2024-08-22 04:53:44',	'2024-08-22 04:53:44'),
(31,	'Sun and Moon',	9,	'2024-08-22 04:54:07',	'2024-08-22 04:54:07'),
(32,	'Living creatures in the air and in the waters',	9,	'2024-08-22 04:54:55',	'2024-08-22 04:54:55'),
(33,	'Man and Animals',	10,	'2024-08-22 05:11:13',	'2024-08-22 05:11:13'),
(34,	'Mountains and trees',	10,	'2024-08-22 05:11:40',	'2024-08-22 05:11:40'),
(35,	'Day and Night',	10,	'2024-08-22 05:12:03',	'2024-08-22 05:12:03'),
(36,	'Birds and Fishes',	10,	'2024-08-22 05:13:08',	'2024-08-22 05:13:08'),
(37,	'None',	11,	'2024-09-05 16:04:11',	'2024-09-05 16:04:11'),
(38,	'Monsters',	11,	'2024-09-05 16:04:33',	'2024-09-05 16:04:33'),
(39,	'Wind',	11,	'2024-09-05 16:05:14',	'2024-09-05 16:05:14'),
(40,	'Storms',	11,	'2024-09-05 16:05:28',	'2024-09-05 16:05:28'),
(41,	'Rain',	12,	'2024-09-05 16:46:28',	'2024-09-05 16:46:28'),
(42,	'Mist',	12,	'2024-09-05 16:46:46',	'2024-09-05 16:46:46'),
(43,	'Falls',	12,	'2024-09-05 16:47:00',	'2024-09-05 16:47:00'),
(44,	'River',	12,	'2024-09-05 16:47:11',	'2024-09-05 16:47:11'),
(45,	'West',	13,	'2024-09-05 16:51:19',	'2024-09-05 16:51:19'),
(46,	'North',	13,	'2024-09-05 16:51:28',	'2024-09-05 16:51:28'),
(47,	'South',	13,	'2024-09-05 16:51:48',	'2024-09-05 16:51:48'),
(48,	'East',	13,	'2024-09-05 16:51:57',	'2024-09-05 16:51:57'),
(49,	'Metal',	14,	'2024-09-05 17:07:17',	'2024-09-05 17:07:17'),
(50,	'Wood',	14,	'2024-09-05 17:07:30',	'2024-09-05 17:07:30'),
(51,	'Dust of the ground',	14,	'2024-09-05 17:07:46',	'2024-09-05 17:07:46'),
(52,	'Plastic',	14,	'2024-09-05 17:08:09',	'2024-09-05 17:08:09'),
(53,	'Fig tree',	16,	'2024-09-06 21:51:46',	'2024-09-06 21:51:46'),
(54,	'Olive tree',	16,	'2024-09-06 21:51:59',	'2024-09-06 21:51:59'),
(55,	'Tree of life',	16,	'2024-09-06 21:52:13',	'2024-09-06 21:52:13'),
(56,	'Gopher tree',	16,	'2024-09-06 21:52:29',	'2024-09-06 21:52:29'),
(57,	'Gihon',	17,	'2024-09-12 23:17:10',	'2024-09-12 23:17:10'),
(58,	'Pison',	17,	'2024-09-12 23:18:02',	'2024-09-12 23:18:02'),
(59,	'Hiddekel',	17,	'2024-09-12 23:20:01',	'2024-09-12 23:20:01'),
(60,	'Euphrates',	17,	'2024-09-12 23:21:10',	'2024-09-12 23:21:10'),
(61,	'Pison',	19,	'2024-09-12 23:47:28',	'2024-09-12 23:47:28'),
(62,	'Gihon',	19,	'2024-09-12 23:47:51',	'2024-09-12 23:47:51'),
(63,	'Hiddekel',	19,	'2024-09-12 23:48:04',	'2024-09-12 23:48:04'),
(66,	'Euphrates',	19,	'2024-09-13 00:33:07',	'2024-09-13 03:09:08'),
(67,	'Hiddekel',	20,	'2024-09-13 03:19:18',	'2024-09-13 03:19:18'),
(68,	'Pison',	20,	'2024-09-13 03:19:34',	'2024-09-13 03:19:34'),
(69,	'Gihon',	20,	'2024-09-13 03:19:45',	'2024-09-13 03:19:45'),
(70,	'Euphrates',	20,	'2024-09-13 03:20:00',	'2024-09-13 03:20:00'),
(71,	'Gihon',	21,	'2024-09-13 03:23:56',	'2024-09-13 03:23:56'),
(72,	'Pison',	21,	'2024-09-13 03:24:23',	'2024-09-13 03:24:23'),
(73,	'Euphrates',	21,	'2024-09-13 03:24:47',	'2024-09-13 03:24:47'),
(74,	'Hiddekel',	21,	'2024-09-13 03:25:00',	'2024-09-13 03:25:00'),
(75,	'Tree of life',	22,	'2024-09-24 09:39:24',	'2024-09-24 09:39:24'),
(76,	'Tree of the knowledge of drawing',	22,	'2024-09-24 09:39:55',	'2024-09-24 09:39:55'),
(77,	'Tree of the knowledge of good and evil',	22,	'2024-09-24 09:40:14',	'2024-09-24 09:40:14'),
(78,	'Tree of remembrance',	22,	'2024-09-24 09:41:20',	'2024-09-24 09:41:20'),
(79,	'Heart',	23,	'2024-09-24 09:47:55',	'2024-09-24 09:47:55'),
(80,	'Feet',	23,	'2024-09-24 09:48:18',	'2024-09-24 09:48:18'),
(81,	'Rib',	23,	'2024-09-24 09:48:36',	'2024-09-24 09:48:36'),
(82,	'Skin',	23,	'2024-09-24 09:48:54',	'2024-09-24 09:48:54'),
(83,	'She was made out of the dust of the ground',	24,	'2024-09-24 10:03:53',	'2024-09-24 10:03:53'),
(84,	'She is beautiful',	24,	'2024-09-24 10:04:19',	'2024-09-24 10:04:33'),
(85,	'She is gorgeous',	24,	'2024-09-24 10:05:21',	'2024-09-24 10:05:21'),
(86,	'She was taken out of Man',	24,	'2024-09-24 10:05:48',	'2024-09-24 10:05:48'),
(87,	'None',	25,	'2024-09-24 10:07:04',	'2024-09-24 10:07:04'),
(88,	'Prada',	25,	'2024-09-24 10:08:01',	'2024-09-24 10:08:01'),
(89,	'Skinny Jeans',	25,	'2024-09-24 10:08:19',	'2024-09-24 10:08:19'),
(90,	'Fig leaves',	25,	'2024-09-24 10:08:32',	'2024-09-24 10:08:32'),
(91,	'Serpent',	26,	'2024-09-24 10:15:37',	'2024-09-24 10:15:37'),
(92,	'Lion',	26,	'2024-09-24 10:15:48',	'2024-09-24 10:15:48'),
(93,	'Monkey',	26,	'2024-09-24 10:16:01',	'2024-09-24 10:16:01'),
(94,	'Dolphin',	26,	'2024-09-24 10:16:27',	'2024-09-24 10:16:27');

DROP TABLE IF EXISTS `seo`;
CREATE TABLE `seo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seo_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `seo` (`id`, `model_type`, `model_id`, `description`, `title`, `image`, `author`, `robots`, `canonical_url`, `created_at`, `updated_at`) VALUES
(1,	'App\\Models\\Quiz',	11,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-05 16:03:22',	'2024-09-05 16:03:22'),
(2,	'App\\Models\\Quiz',	12,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-05 16:45:35',	'2024-09-05 16:45:35'),
(3,	'App\\Models\\Quiz',	13,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-05 16:50:47',	'2024-09-05 16:50:47'),
(4,	'App\\Models\\Quiz',	14,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-05 17:06:32',	'2024-09-05 17:06:32'),
(5,	'App\\Models\\Quiz',	15,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-06 21:44:54',	'2024-09-06 21:44:54'),
(6,	'App\\Models\\Quiz',	16,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-06 21:50:56',	'2024-09-06 21:50:56'),
(7,	'App\\Models\\Quiz',	17,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-06 21:57:36',	'2024-09-06 21:57:36'),
(8,	'App\\Models\\Quiz',	18,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-12 18:25:32',	'2024-09-12 18:25:32'),
(9,	'App\\Models\\Quiz',	19,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-12 23:46:39',	'2024-09-12 23:46:39'),
(10,	'App\\Models\\Quiz',	20,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-13 03:18:45',	'2024-09-13 03:18:45'),
(11,	'App\\Models\\Quiz',	21,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-13 03:21:53',	'2024-09-13 03:21:53'),
(12,	'App\\Models\\Quiz',	22,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-24 09:38:57',	'2024-09-24 09:38:57'),
(13,	'App\\Models\\Quiz',	23,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-24 09:47:25',	'2024-09-24 09:47:25'),
(14,	'App\\Models\\Quiz',	24,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-24 09:54:31',	'2024-09-24 09:54:31'),
(15,	'App\\Models\\Quiz',	25,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-24 10:02:21',	'2024-09-24 10:02:21'),
(16,	'App\\Models\\Quiz',	26,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2024-09-24 10:15:15',	'2024-09-24 10:15:15');

DROP TABLE IF EXISTS `seos`;
CREATE TABLE `seos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `application_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `seos` (`id`, `title`, `description`, `image`, `author`, `robots`, `url`, `page`, `created_at`, `updated_at`, `keywords`, `application_name`, `generator`) VALUES
(3,	'Bible Quiz',	'Downloadable Bible Quiz',	'',	'Virgil Rosalita',	'index, follow',	'https://bibleprudence.com',	'Quiz',	'2024-09-18 00:20:21',	'2024-09-19 19:25:17',	'Quiz, Bible, Games',	'Bible Prudence',	'Laravel Livewire 3.0'),
(5,	'Bible Scavenger',	'Downloadable Bible Scavenger',	'',	'Virgil Rosalita',	'index, follow',	'',	'Scavenger',	'2024-09-19 19:32:01',	'2024-09-19 19:32:01',	'Scavenger, Bible, Games',	'Bible Prudence',	'Laravel Livewire 3.0');

DROP TABLE IF EXISTS `subpoints`;
CREATE TABLE `subpoints` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `subpoints_point_id_foreign` (`point_id`),
  CONSTRAINT `subpoints_point_id_foreign` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subpoints` (`id`, `sub`, `verse`, `point_id`, `created_at`, `updated_at`, `body`) VALUES
(2,	'Love is the greatest gift of all',	'1 Corinthians 13',	2,	'2024-09-24 08:12:21',	'2024-09-24 08:12:21',	'There is no impossible things when it comes to love.');

DROP TABLE IF EXISTS `targets`;
CREATE TABLE `targets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scavenger_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `targets_scavenger_id_foreign` (`scavenger_id`),
  CONSTRAINT `targets_scavenger_id_foreign` FOREIGN KEY (`scavenger_id`) REFERENCES `scavengers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `targets` (`id`, `option`, `scavenger_id`, `created_at`, `updated_at`) VALUES
(1,	'Cross',	3,	'2024-09-18 20:23:25',	'2024-09-18 20:23:25'),
(2,	'Rock',	3,	'2024-09-18 20:36:20',	'2024-09-18 20:36:20'),
(3,	'Water',	3,	'2024-09-18 20:36:50',	'2024-09-18 21:16:21'),
(4,	'Wood',	3,	'2024-09-18 20:37:05',	'2024-09-18 20:37:05'),
(5,	'Paper',	1,	'2024-09-18 20:38:39',	'2024-09-18 20:38:39'),
(6,	'Stone',	1,	'2024-09-18 20:38:53',	'2024-09-18 20:38:53'),
(7,	'Steel',	1,	'2024-09-18 20:58:07',	'2024-09-18 20:58:07'),
(9,	'Soil',	1,	'2024-09-18 21:21:12',	'2024-09-18 21:21:12'),
(10,	'Diamonds',	7,	'2024-09-19 04:28:08',	'2024-09-19 04:28:08'),
(11,	'Rubies',	7,	'2024-09-19 04:28:26',	'2024-09-19 04:28:26'),
(12,	'Silvers',	7,	'2024-09-19 04:28:39',	'2024-09-19 04:28:39'),
(13,	'Pearls',	7,	'2024-09-19 04:28:49',	'2024-09-19 04:28:49'),
(14,	'Glass',	6,	'2024-09-19 04:29:42',	'2024-09-19 04:29:42'),
(15,	'River',	6,	'2024-09-19 04:30:15',	'2024-09-19 04:30:15'),
(16,	'Word',	6,	'2024-09-19 04:30:32',	'2024-09-19 04:30:32'),
(17,	'Rock',	6,	'2024-09-19 04:31:37',	'2024-09-19 04:31:37'),
(18,	'Ladder',	4,	'2024-09-19 04:33:17',	'2024-09-19 04:33:17'),
(19,	'Saw',	4,	'2024-09-19 04:33:53',	'2024-09-19 04:33:53'),
(20,	'Paper',	4,	'2024-09-19 04:34:38',	'2024-09-19 04:34:38'),
(21,	'Hand',	4,	'2024-09-19 04:34:52',	'2024-09-19 04:34:52'),
(22,	'Pen',	5,	'2024-09-19 04:36:03',	'2024-09-19 04:36:03'),
(23,	'Ink',	5,	'2024-09-19 04:36:12',	'2024-09-19 04:36:12'),
(24,	'Paint',	5,	'2024-09-19 04:39:52',	'2024-09-19 04:39:52'),
(25,	'Brush',	5,	'2024-09-19 04:40:01',	'2024-09-19 04:40:01'),
(26,	'Fire',	8,	'2024-09-19 05:06:14',	'2024-09-19 05:06:14'),
(27,	'Hood',	8,	'2024-09-19 05:07:49',	'2024-09-19 05:07:49'),
(28,	'Land',	8,	'2024-09-19 05:08:56',	'2024-09-19 05:08:56'),
(29,	'Grass',	8,	'2024-09-19 05:09:18',	'2024-09-19 05:09:18'),
(30,	'Pitcher',	9,	'2024-09-24 16:39:36',	'2024-09-24 16:39:36'),
(31,	'Lamp',	9,	'2024-09-24 16:40:24',	'2024-09-24 16:40:24'),
(32,	'Sandals',	9,	'2024-09-24 16:40:47',	'2024-09-24 16:40:47'),
(33,	'Bag',	9,	'2024-09-24 16:41:45',	'2024-09-24 16:41:45'),
(34,	'Manna',	10,	'2024-09-24 16:43:27',	'2024-09-24 16:43:27'),
(35,	'Oil',	10,	'2024-09-24 16:43:40',	'2024-09-24 16:43:40'),
(36,	'Sling',	10,	'2024-09-24 16:44:01',	'2024-09-24 16:44:01'),
(37,	'Armour',	10,	'2024-09-24 16:44:37',	'2024-09-24 16:44:37'),
(38,	'Plant',	11,	'2024-09-24 16:46:38',	'2024-09-24 16:46:38'),
(39,	'Soil',	11,	'2024-09-24 16:46:52',	'2024-09-24 16:46:52'),
(40,	'Land',	11,	'2024-09-24 16:47:00',	'2024-09-24 16:47:00'),
(41,	'Table',	11,	'2024-09-24 16:47:13',	'2024-09-24 16:47:13'),
(42,	'Chair',	12,	'2024-09-24 16:48:55',	'2024-09-24 16:48:55'),
(43,	'Table',	12,	'2024-09-24 16:49:06',	'2024-09-24 16:49:06'),
(44,	'Ball',	12,	'2024-09-24 16:49:15',	'2024-09-24 16:49:15'),
(45,	'Head',	12,	'2024-09-24 16:49:32',	'2024-09-24 16:49:32');

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`(254))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `topics` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1,	'History',	1,	'2024-08-11 04:35:54',	'2024-08-11 04:35:54'),
(3,	'Creation',	1,	'2024-08-16 02:37:03',	'2024-08-16 02:37:03'),
(4,	'Salvation',	1,	'2024-09-13 04:35:35',	'2024-09-13 04:35:35'),
(6,	'Love',	1,	'2024-09-13 04:36:07',	'2024-09-13 04:42:46'),
(7,	'Temptation',	1,	'2024-09-24 10:11:24',	'2024-09-24 10:11:24');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `middle_name`, `extension_name`, `email`, `email_verified_at`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Virgil',	'Rosalita',	'Tecson',	NULL,	'dimplevirgil@gmail.com',	'2024-08-11 04:11:33',	'berrydimple',	'$2y$12$fYFWxrPLbDpJaJw.LzbLBuR0NMIT9XK.K8lANkcSjiDy.4IOrRI0y',	1,	'MwU5JO9XKD8rcnMIvFB43ImdWxLIf8LT2rsIhe9zx18c6emnmcBDRwDBcwSI',	'2024-08-11 04:11:33',	'2024-08-11 04:11:33');

-- 2024-09-27 03:12:01
