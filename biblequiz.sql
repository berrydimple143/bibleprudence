-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

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
(8,	'2024_08_16_023833_create_selections_table',	4);

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
  KEY `quizzes_topic_id_foreign` (`topic_id`),
  CONSTRAINT `quizzes_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `quizzes` (`id`, `question`, `answer`, `verse`, `level`, `topic_id`, `created_at`, `updated_at`) VALUES
(2,	'Who killed Goliath?',	'David',	'1 Samuel 17:48:-51',	'Easy',	1,	'2024-08-12 09:59:38',	'2024-08-12 10:05:35'),
(3,	'What is the name of Abel\'s brother who killed him?',	'Cain',	'Genesis 4:8',	'Easy',	1,	'2024-08-12 10:05:22',	'2024-08-12 10:05:22'),
(4,	'Who created the heaven and the earth?',	'God',	'Genesis 1:1',	'Easy',	3,	'2024-08-16 02:37:14',	'2024-08-16 02:37:14');

DROP TABLE IF EXISTS `selections`;
CREATE TABLE `selections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12,	'Moses',	4,	'2024-08-16 02:39:11',	'2024-08-16 02:39:11');

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `topics` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1,	'History',	1,	'2024-08-11 04:35:54',	'2024-08-11 04:35:54'),
(3,	'Creation',	1,	'2024-08-16 02:37:03',	'2024-08-16 02:37:03');

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
(1,	'Virgil',	'Rosalita',	'Tecson',	NULL,	'dimplevirgil@gmail.com',	'2024-08-11 04:11:33',	'berrydimple',	'$2y$12$fYFWxrPLbDpJaJw.LzbLBuR0NMIT9XK.K8lANkcSjiDy.4IOrRI0y',	1,	'uaE7jomTzjY5x3IH3uK17B1YQdJlJXIxv4QKKzxLCvbG6GqHZMI8hqF1tJ8Z',	'2024-08-11 04:11:33',	'2024-08-11 04:11:33');

-- 2024-08-16 12:47:30
