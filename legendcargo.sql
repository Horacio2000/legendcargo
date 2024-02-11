-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 fév. 2024 à 13:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `legendcargo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@legendecargo.com', NULL, '$2y$10$jqY/GdOuKzJ80md5GjKq8udiUAi66k3zhb96StwC6laO4umTybvrK', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `branches`
--

INSERT INTO `branches` (`id`, `name`, `image`, `address`, `city`, `zip_code`, `country`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bénin', NULL, NULL, NULL, NULL, NULL, 'entrepot1@legendecargo.com', '12345678', 'Active', '2023-07-18 11:20:59', '2023-10-18 07:10:39');

-- --------------------------------------------------------

--
-- Structure de la table `courier_infos`
--

DROP TABLE IF EXISTS `courier_infos`;
CREATE TABLE IF NOT EXISTS `courier_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_address` text COLLATE utf8mb4_unicode_ci,
  `receiver_branch_id` bigint UNSIGNED NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` text COLLATE utf8mb4_unicode_ci,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Non reçu','Reçu','Chargé','Arrivé à destination','Retiré') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non reçu',
  `receiver_branch_staff_id` bigint UNSIGNED DEFAULT NULL,
  `payment_receiver_id` int DEFAULT NULL,
  `payment_branch_id` int DEFAULT NULL,
  `payment_status` enum('Non payé','Payé') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non payé',
  `payment_method_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_balance` double(8,2) DEFAULT NULL,
  `payment_transaction_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_infos_user_id_index` (`user_id`),
  KEY `courier_infos_receiver_branch_id_index` (`receiver_branch_id`),
  KEY `courier_infos_receiver_branch_staff_id_index` (`receiver_branch_staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courier_infos`
--

INSERT INTO `courier_infos` (`id`, `user_id`, `sender_name`, `sender_email`, `sender_phone`, `sender_address`, `receiver_branch_id`, `receiver_name`, `receiver_email`, `receiver_phone`, `receiver_address`, `invoice_id`, `status`, `receiver_branch_staff_id`, `payment_receiver_id`, `payment_branch_id`, `payment_status`, `payment_method_name`, `payment_transaction_id`, `payment_date`, `payment_balance`, `payment_transaction_image`, `payment_note`, `code`, `created_at`, `updated_at`) VALUES
(9, 69, 'Adamou Rachidath', 'admin@legendecargo.com', '97256298', NULL, 1, 'ADAMOU', NULL, '97256298', NULL, '1', 'Non reçu', NULL, NULL, NULL, 'Non payé', NULL, NULL, NULL, 260000.00, NULL, NULL, '7EYXTDXYKQPA', '2024-01-04 13:33:29', '2024-01-04 13:33:29'),
(10, 76, 'SOSSOU Horacio', 'hora@gmail.com', '+22994436564', NULL, 1, 'SOSSOU', 'hora@gmail.com', 'Calavi', 'Calavi', '10', 'Reçu', NULL, NULL, NULL, 'Non payé', NULL, NULL, NULL, 260000.00, NULL, NULL, 'VLGZGDGBJFGW', '2024-02-02 11:27:53', '2024-02-02 11:28:46');

-- --------------------------------------------------------

--
-- Structure de la table `courier_product_infos`
--

DROP TABLE IF EXISTS `courier_product_infos`;
CREATE TABLE IF NOT EXISTS `courier_product_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `courier_type` int NOT NULL,
  `courier_quantity` double(8,2) NOT NULL,
  `courier_fee` double(8,2) NOT NULL,
  `courier_details` text COLLATE utf8mb4_unicode_ci,
  `courier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_mode_id` bigint UNSIGNED NOT NULL,
  `courier_info_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `courier_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_article_number` double(8,2) NOT NULL,
  `courier_price` double(8,2) NOT NULL,
  `courier_date_sent` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_product_infos_shipment_mode_id_index` (`shipment_mode_id`),
  KEY `courier_product_infos_courier_info_id_index` (`courier_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courier_product_infos`
--

INSERT INTO `courier_product_infos` (`id`, `courier_type`, `courier_quantity`, `courier_fee`, `courier_details`, `courier_code`, `shipment_mode_id`, `courier_info_id`, `created_at`, `updated_at`, `courier_content`, `courier_article_number`, `courier_price`, `courier_date_sent`) VALUES
(11, 3, 0.51, 260000.00, NULL, '7EYXTDXYKQPA', 2, 9, '2024-01-04 13:33:29', '2024-01-04 13:33:29', '', 0.00, 0.00, NULL),
(12, 3, 0.05, 260000.00, NULL, 'VLGZGDGBJFGW', 2, 10, '2024-02-02 11:27:53', '2024-02-02 11:27:53', '', 0.00, 0.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `courier_types`
--

DROP TABLE IF EXISTS `courier_types`;
CREATE TABLE IF NOT EXISTS `courier_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_id` bigint UNSIGNED NOT NULL,
  `shipment_mode_id` bigint UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courier_types_unit_id_index` (`unit_id`),
  KEY `courier_types_shipment_mode_id_index` (`shipment_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courier_types`
--

INSERT INTO `courier_types` (`id`, `unit_id`, `shipment_mode_id`, `price`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8000.00, 'Articles normaux', 'Active', '2023-07-18 10:24:50', '2023-07-18 10:24:50'),
(2, 1, 1, 9000.00, 'Articles spéciaux', 'Active', '2023-07-18 10:26:54', '2023-07-18 10:26:54'),
(3, 2, 2, 260000.00, 'Normal', 'Active', '2023-07-18 10:27:16', '2023-07-18 10:27:16'),
(4, 1, 1, 12000.00, 'Tablette', 'Active', '2023-07-19 10:48:11', '2023-07-19 10:48:11');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_courier_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_courier_details` text COLLATE utf8mb4_unicode_ci,
  `email_notification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_sent_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` longtext COLLATE utf8mb4_unicode_ci,
  `sms_api` text COLLATE utf8mb4_unicode_ci,
  `departure_courier` int DEFAULT NULL,
  `upcoming_courier` int DEFAULT NULL,
  `total_deliver` int DEFAULT NULL,
  `sms_notification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `registration_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sms_verification` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `base_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `header_title`, `search_courier_title`, `search_courier_details`, `email_notification`, `email_sent_from`, `email_template`, `sms_api`, `departure_courier`, `upcoming_courier`, `total_deliver`, `sms_notification`, `registration_verification`, `email_verification`, `sms_verification`, `base_currency`, `base_currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'LegendCargo', 'LegendCargo', 'Search Courier', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', '0', 'admin@example.com', '<br><br>\\r\\n	<div class=\\\"contents\\\" style=\\\"max-width: 600px; margin: 0 auto; border: 2px solid #000036;\\\">\\r\\n\\r\\n<div class=\\\"header\\\" style=\\\"background-color: #000036; padding: 15px; text-align: center;\\\">\\r\\n	<div class=\\\"logo\\\" style=\\\"width: 260px;text-align: center; margin: 0 auto;\\\">\\r\\n		<img src=\\\"https://i.imgur.com/4NN55uD.png\\\" alt=\\\"COURIERMAN\\\" style=\\\"width: 100%;\\\">\\r\\n	</div>\\r\\n</div>\\r\\n\\r\\n<div class=\\\"mailtext\\\" style=\\\"padding: 30px 15px; background-color: #f0f8ff; font-family: \'Open Sans\', sans-serif; font-size: 16px; line-height: 26px;\\\">\\r\\n\\r\\nHi {{name}},\\r\\n<br><br>\\r\\n{{message}}\\r\\n<br><br>\\r\\n<br><br>\\r\\n</div>\\r\\n\\r\\n<div class=\\\"footer\\\" style=\\\"background-color: #000036; padding: 15px; text-align: center;\\\">\\r\\n<a href=\\\"https://courierman.com/\\\" style=\\\"	background-color: #2ecc71;\\r\\n	padding: 10px 0;\\r\\n	margin: 10px;\\r\\n	display: inline-block;\\r\\n	width: 100px;\\r\\n	text-transform: uppercase;\\r\\n	text-decoration: none;\\r\\n	color: #ffff;\\r\\n	font-weight: 600;\\r\\n	border-radius: 4px;\\\">Website</a>\\r\\n<a href=\\\"https://courierman.com/services\\\" style=\\\"	background-color: #2ecc71;\\r\\n	padding: 10px 0;\\r\\n	margin: 10px;\\r\\n	display: inline-block;\\r\\n	width: 100px;\\r\\n	text-transform: uppercase;\\r\\n	text-decoration: none;\\r\\n	color: #ffff;\\r\\n	font-weight: 600;\\r\\n	border-radius: 4px;\\\">Products</a>\\r\\n<a href=\\\"https://courierman.com/contact\\\" style=\\\"	background-color: #2ecc71;\\r\\n	padding: 10px 0;\\r\\n	margin: 10px;\\r\\n	display: inline-block;\\r\\n	width: 100px;\\r\\n	text-transform: uppercase;\\r\\n	text-decoration: none;\\r\\n	color: #ffff;\\r\\n	font-weight: 600;\\r\\n	border-radius: 4px;\\\">Contact</a>\\r\\n</div>\\r\\n\\r\\n\\r\\n<div class=\\\"footer\\\" style=\\\"background-color: #000036; padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\\\">\\r\\n\\r\\n<strong style=\\\"color: #fff;\\\">© 2020 COURIERMAN. All Rights Reserved.</strong>\\r\\n<p style=\\\"color: #ddd;\\\">CourierMan is not partnered with any other \\r\\ncompany or person. We work as a team and do not have any reseller, \\r\\ndistributor or partner!</p>\\r\\n\\r\\n\\r\\n</div>\\r\\n\\r\\n	</div>\\r\\n<br><br>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&amp;password=*****&amp;sender=CourierMan&amp;SMSText={{message}}&amp;GSM={{number}}&amp;type=longSMS', NULL, NULL, NULL, '0', '0', '1', '0', 'F CFA', 'F CFA', '2022-10-07 09:23:05', '2022-10-07 09:23:05');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_17_233502_create_branches_table', 1),
(6, '2023_06_17_233502_create_users_table', 1),
(7, '2023_06_29_145537_create_admins_table', 1),
(8, '2023_06_29_173445_create_general_settings_table', 1),
(9, '2023_07_01_160249_create_units_table', 1),
(10, '2023_07_01_160325_create_shipment_modes_table', 1),
(11, '2023_07_01_160326_create_courier_types_table', 1),
(12, '2023_07_01_160347_create_courier_infos_table', 1),
(13, '2023_07_01_160407_create_courier_product_infos_table', 1),
(14, '2024_02_10_161552_add_new_fields_to_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('staff1@legendecargo.com', 'yyiggBgMAGzwk4uBl1nFKuqYSaMEkkxmqQeDU9Gow55YsEJcvhXfT6kUEib8', '2023-07-19 07:18:25'),
('kakpokocoujeanpierre@gmail.com', 'DMe81UzoK0m70h1CwnwWXHLftx2mETyD2yepgXuC1lY7rdQVzKKVpVFn73yd', '2023-12-18 02:20:49'),
('kakpokocoujeanpierre@gmail.com', 'dON9EA5ZlML05OTjsqgXmHbi6RJcxXVDnzpqI6hdastmesQBqP5cg3hD6SG0', '2023-12-18 02:21:25'),
('kakpokocoujeanpierre@gmail.com', 'ABjfcP1SbnWrcZJNah5g8GBtcaWwlrWk2QMz3AH4iTosiUF5N2huSS3ZtPti', '2023-12-18 02:27:56'),
('kakpokocoujeanpierre@gmail.com', 'MY2zXSKZ0krTOinvQjJaWT5kHghMOXuKlYG7TxHi1jBBtbHfE8qVDN29wlLM', '2023-12-18 02:38:13'),
('kakpokocoujeanpierre@gmail.com', 'DdinIq31hFlgtVfyfChI2X0nvzJ3ZL79C4gvgbaCBtd73JWAyvUC0HzKjUO1', '2024-01-04 01:36:41');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shipment_modes`
--

DROP TABLE IF EXISTS `shipment_modes`;
CREATE TABLE IF NOT EXISTS `shipment_modes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shipment_modes`
--

INSERT INTO `shipment_modes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Aérien', NULL, '2023-07-18 09:52:30', '2023-07-18 09:52:30'),
(2, 'Maritime', NULL, '2023-07-18 09:52:30', '2023-07-18 09:52:30');

-- --------------------------------------------------------

--
-- Structure de la table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'Active', '2023-07-18 10:00:09', '2023-07-18 10:00:09'),
(2, 'CBM', 'Active', '2023-07-18 10:00:17', '2023-07-18 10:00:17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Manager','Staff','Customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_branch_id_foreign` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `email`, `image`, `phone`, `country`, `city`, `email_verified_at`, `password`, `role`, `status`, `branch_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Junior', 'Thedev', 'juniorthedev@gmail.com', NULL, '67809632', 'AF', 'Cotonou', NULL, '$2y$10$DxMFM6RWQWDRLgN.n/RwQemip9jlVDZT0mF6K8E1ts4.OeefhEH2m', 'Customer', 'Active', NULL, 'amE1eZ8kCrn5TPHsGXterem0W0XEh2XRfDGXlwG0VGuKLdM0TT60mfLuVnLg', '2023-07-18 10:28:21', '2023-07-18 10:28:21'),
(2, 'Test', 'Test', 'test@gmail.com', NULL, '6756436', 'AF', 'Cotonou', NULL, '$2y$10$LXTwTpSH1sVwC/ISzfUu2.znn.N2YbmPOcZiNQ.hpFlQ8Gu782hTi', 'Customer', 'Active', NULL, NULL, '2023-07-18 12:43:16', '2023-07-18 12:43:16'),
(3, 'Gestionnaire', 'A', 'gestionnaire1@legendecargo.com', NULL, '12345678', NULL, NULL, NULL, '$2y$10$IYewWOUXDa5eGiQzecX54.X09dELU8nUkZQ0nuUwG3omZVjjywA5K', 'Manager', 'Active', 1, NULL, '2023-07-19 01:41:33', '2023-07-19 05:31:31'),
(4, 'Espoir', 'Espoir', 'staff1@legendecargo.com', NULL, '67809634', NULL, NULL, NULL, '$2y$10$iTgMJI249s45l50J5Xk0peboXGnkf5nVUElmlYpUw/wXvxW92zldC', 'Staff', 'Active', 1, NULL, '2023-07-19 05:45:52', '2023-07-19 07:17:30'),
(5, 'SOSSOU', 'Horacio', 'horaciosossou16@gmail.com', NULL, '+22962472183', 'BJ', 'Cotonou', NULL, '$2y$10$JNPZbapO1gjNYJUC3yZvsuafGtowBuphQ3cSstqMnC/UARKHFxWTy', 'Customer', 'Active', NULL, NULL, '2023-07-19 10:30:14', '2023-07-19 10:30:14'),
(6, 'Tovalou', 'Ola fermione', 'olafermione@gmail.com', NULL, '97838693', 'BJ', 'Calavi', NULL, '$2y$10$q2dfwmY3.z5qDPZaay5C6.Hii99RHDdExnnMO4YIAoc71T1JcWuki', 'Customer', 'Active', NULL, NULL, '2023-07-19 10:31:50', '2023-07-19 10:31:50'),
(7, 'ADAMOU', 'Rachida', 'Rachidatheadamou@gmail.com', NULL, '97256298', 'BJ', 'Cotonou', NULL, '$2y$10$AujjcQul0EjFTvz89T7IgeHxghIPV/5j8yCiBSlonwZiMtFb59bb6', 'Customer', 'Active', NULL, NULL, '2023-07-19 10:33:10', '2023-07-19 10:33:10'),
(8, 'BOSSOU', 'Abel', 'horaciosossou@gmail.com', NULL, '+22962472183', NULL, NULL, NULL, '$2y$10$GF1siYMQDrt1SzGTIAxaSuHCDQXeG69gDHUsuMbd86q472tnDNldu', 'Manager', 'Active', 1, NULL, '2023-07-19 10:53:13', '2023-07-19 10:53:13'),
(9, 'ADA', 'Rachidath', 'adamourachidath@gmail.com', NULL, '62472183', NULL, NULL, NULL, '$2y$10$oxXu20TxU3tYxSBR6jprC.6J6GMZrF9FcKZQ0czH4/VNNWg9PpxJe', 'Staff', 'Active', 1, NULL, '2023-07-19 11:00:50', '2023-10-18 07:20:51'),
(10, 'SOSSOU', 'Léonce', 'leoncesossou686@gmail.com', NULL, '+22997854012', 'BJ', 'Cotonou', NULL, '$2y$10$n9zjklUonZyv4pi6AO5aZOQOYFaNVHxOEImgj1hhHS5XCP95KbqkK', 'Customer', 'Active', NULL, NULL, '2023-07-22 14:24:43', '2023-07-22 14:24:43'),
(11, 'AGBESSI', 'Ahonakpon Johannès (Hamza)', 'jojohmz4@gmail.com', NULL, '97167255', 'BJ', 'Cotonou', NULL, '$2y$10$FmVkw1WDpiUznWVha0h8zuATAfHSg53yRvpopdHF5XphiK2y8D96u', 'Customer', 'Active', NULL, 'iE38a296GE9rgZxR3pSzvWpUzQtPaKdLsWSyf6O91qDWY2nJamUjsijh3YcM', '2023-07-30 07:41:40', '2023-07-30 07:41:40'),
(12, 'DEGUENON', 'Sybelle', 'deguenonsybelle4@gmail.com', NULL, '56459891', 'BJ', 'Cotonou', NULL, '$2y$10$n..YERROAAQb2w1D1TImqO4L3fZwvQIGf1M2/g/hFFdAxC7C8RXpG', 'Customer', 'Active', NULL, NULL, '2023-08-02 14:29:23', '2023-08-02 14:29:23'),
(13, 'Gadji', 'Yvonne', 'yvonnegadji1@gmail.com', NULL, '67017553', 'BJ', 'Cotonou', NULL, '$2y$10$mJEntsnFufzEiMmASG/sl.aAzgOGDZ6gEpMemQ7W9wJZYd7WEuKk.', 'Customer', 'Active', NULL, NULL, '2023-08-08 12:59:38', '2023-08-08 12:59:38'),
(14, 'YAO', 'ANDY', 'marketopcom@gmail.com', NULL, '+22965764000', 'BJ', 'Cotonou', NULL, '$2y$10$uaJTFFqjKtwEds8iSMVaIOLQE8U2//8hcISpytkV9cD5I.qlxSelW', 'Customer', 'Active', NULL, NULL, '2023-08-08 13:00:58', '2023-08-08 13:00:58'),
(15, 'SOUSSIA', 'Aurel', 'aurelsoussia97@gmail.com', NULL, '96357614', 'BJ', 'Abomey -Calavi', NULL, '$2y$10$ZKTx1qkSxmZqRYfE2DnY.ec3XEy2QHaVA5eSUCJa6W6crQfMVbEH6', 'Customer', 'Active', NULL, NULL, '2023-08-08 13:07:00', '2023-08-08 13:07:00'),
(16, 'AITCHEDJI', 'Idoria', 'Farelleayitchedji98@gmail.com', NULL, '62 92 90 95', 'BJ', 'Cotonou', NULL, '$2y$10$yQLyjIALA578iEOUUKX0uO.sUFJz2GH5GDyLokeEnGgBcCPh2N/IC', 'Customer', 'Active', NULL, NULL, '2023-08-08 14:20:30', '2023-08-08 14:20:30'),
(17, 'AKOGNON', 'Dorcas', 'dorcasakognon@gmail.com', NULL, '97850345', 'BJ', 'COTONOU', NULL, '$2y$10$cpQAT.ehUfQKgeVwOf.gzOu/rnVQgxrrqbfbaCSw3sbEF4vcTaua2', 'Customer', 'Active', NULL, NULL, '2023-08-08 14:25:39', '2023-08-08 14:25:39'),
(18, 'BOGNON', 'Geordan', 'geordanb8@gmail.com', NULL, '67446781', 'BJ', 'Cotonou', NULL, '$2y$10$Ren8P4BeT7Dqw5Ae9ibAI.hRGEIcxG6XKskTyNVNJhwBTNG2B6n7u', 'Customer', 'Active', NULL, NULL, '2023-08-08 14:27:29', '2023-08-08 14:27:29'),
(19, 'LOKO-DADE', 'Mernaud Merveille', 'lokodademerveille@gmail.com', NULL, '65838943', 'BJ', 'Porto-Novo', NULL, '$2y$10$aJ7ijr6yz2TrqaST1oVEpOAQBcRDBbT.s5PHk0vzqpEAx9J6vLH7K', 'Customer', 'Active', NULL, NULL, '2023-08-08 14:53:25', '2023-08-08 14:53:25'),
(20, 'FAFOUMI', 'Victorin', 'omokolawolevictorinf@gmail.com', NULL, '+22966752586', 'BJ', 'Missereté', NULL, '$2y$10$4cK2jQrKAXsZA4SuJGvrK.lDsxm5h5FcDbUz/upJzy2yJgA9YOFhi', 'Customer', 'Active', NULL, NULL, '2023-08-08 15:10:08', '2023-08-08 15:10:08'),
(21, 'Adjadi', 'Darius', 'femiadjadi4@gmail.com', NULL, '90639349', 'BJ', 'Calavi', NULL, '$2y$10$..cIA1WCypReQswiHOC8n.NtiJnBQ4zfXdAznjnIR6epiBsoFpjr6', 'Customer', 'Active', NULL, NULL, '2023-08-08 15:27:04', '2023-08-08 15:27:04'),
(22, 'AZONSOU', 'Fidèle', 'azonsoufidele24@gmail.com', NULL, '67665823', 'BJ', 'Cotonou', NULL, '$2y$10$vLoFbhHMn82jDorGOvBA1OZf1ZF9WTvLcJfnx4c9HmP0.Qj3W2ktG', 'Customer', 'Active', NULL, NULL, '2023-08-08 15:39:09', '2023-08-08 15:39:09'),
(23, 'AGADAN', 'Madjidou', 'Madjidou145@gmail.com', NULL, '69761512', 'BJ', 'Parakou', NULL, '$2y$10$9rtCC1F3ljZnvjmnKgF6QeYdM45u/E3NpyA1M8rFAD5Qtjch3Uclq', 'Customer', 'Active', NULL, 'VYX3TgChBNJhzE7KRaDyIKYMrOdawKFPrgUSs38fNZ1AmCmNWy4gNx5uI3Ls', '2023-08-08 16:24:49', '2023-08-08 16:24:49'),
(24, 'IDOHOU', 'Raoudath', 'idohour11@gmail.com', NULL, '67115467', 'BJ', 'Calavi', NULL, '$2y$10$xOV3h1BPtaM5c2g2.v7Zs.JcOlINJJkIq3zk3Kjdh.5jixGt0WnjW', 'Customer', 'Active', NULL, NULL, '2023-08-08 17:13:06', '2023-08-08 17:13:06'),
(25, 'VIGNONZAN', 'Idrissou', 'crazy.vj55@gmail.com', NULL, '95352578', 'BJ', 'Parakou', NULL, '$2y$10$nL82TOei7/jmRyesn3qngutNbDrXJ5TbPvmRJF88QVOutgqzP74tG', 'Customer', 'Active', NULL, NULL, '2023-08-08 17:25:14', '2023-08-08 17:25:14'),
(26, 'BALLO', 'Lucrece', 'lucreceballo2@gmail.com', NULL, '96804078', 'BJ', 'Cotonou', NULL, '$2y$10$FteanL1pzJbu9EvUFEtSXepbMTy3lbRdZUmohygQZVyE5YmE4Ioo2', 'Customer', 'Active', NULL, NULL, '2023-08-08 19:05:39', '2023-08-08 19:05:39'),
(27, 'APEGNIKOU', 'KODJO', '3nomaxime@gmail.com', NULL, '96038016', 'BJ', 'Cotonou', NULL, '$2y$10$lG3Kml.3k4/patfGEA.qeOGffnGfX.l7Qrtlbse3AiO26J3/MUYpi', 'Customer', 'Active', NULL, NULL, '2023-08-08 20:12:23', '2023-08-08 20:12:23'),
(28, 'CODO TOAFODE', 'Gildas Kevin', 'gilcomaoyigroup@gmail.com', NULL, '00229 67608637', 'BJ', 'Cotonou', NULL, '$2y$10$3/L.LISUIr0rVhDOrgJW.e9OWJtQTNNnh900Ae4.stQlmGxgxY7my', 'Customer', 'Active', NULL, NULL, '2023-08-09 08:51:27', '2023-08-09 08:51:27'),
(29, 'VIGNIAVODE', 'Evariste Prince Gbètoho', 'gbetohoevariste@gmail.com', NULL, '+229 90218476', 'BJ', 'Lokossa', NULL, '$2y$10$A2w/qml3z8PzNMWzK.Civ.O4x5PSjlpEtwA6zrboa.1q/DltsCMXq', 'Customer', 'Active', NULL, NULL, '2023-08-09 19:02:56', '2023-08-09 19:02:56'),
(30, 'Dieter', 'Lucrece', 'lucrece37@gmail.com', NULL, '+229 97 50 38 24', 'BJ', 'Cotonou', NULL, '$2y$10$P4cxNTnqYYxUZNc0Z68OlufWV1yHpJRSEZC2xFs9Chzj01Uvt7YxO', 'Customer', 'Active', NULL, NULL, '2023-08-09 21:28:02', '2023-08-09 21:28:02'),
(31, 'SOSSOU', 'Abel', 'horaciosossou@yahoo.com', NULL, '62472183', 'BJ', 'Cotonou', NULL, '$2y$10$9t1jSlmFgwK5qRpBawVhr.jLqWXFu5H65fKD6MJsi.KNXuXuOHLSe', 'Customer', 'Active', NULL, NULL, '2023-08-10 11:54:57', '2023-08-10 11:54:57'),
(32, 'CHITOU', 'Folakèmi tawakalitou', 'chitoutawakalitou@gmail.com', NULL, '67312628', 'BJ', 'COTONOU', NULL, '$2y$10$OggNa6FML1j/8H9u9l6yqOezOhuTDc2VwOmsCHQ4SkjLNzbYVKEpS', 'Customer', 'Active', NULL, NULL, '2023-08-12 07:15:18', '2023-08-12 07:15:18'),
(33, 'SOGBOSSI', 'Lebriand', 'lsogbossi8@gmail.com', NULL, '60 00 98 17', 'BJ', 'Cotonou', NULL, '$2y$10$ghqcNgIpqUpNP7aDokPuCO8I6b6zGlEYUAC22LPI7GLUA3bhG3ZWm', 'Customer', 'Active', NULL, 'jc3UbVf7FtU4obQSKesxKQeK4shbyxS0xFE5ZjS2jdypheglCzZ2AIHZpy2x', '2023-08-12 07:41:07', '2023-08-12 07:41:07'),
(34, 'DJIDENOU', 'Christian', 'djidenouchristian19@gmail.com', NULL, '0022997907311', 'BJ', 'Cotonou', NULL, '$2y$10$y/VUYsogmUDw3w/BDOOY4u36D.x.peFrJyPwmoweDc7woVhXuLfMy', 'Customer', 'Active', NULL, NULL, '2023-08-13 09:27:58', '2023-08-13 09:27:58'),
(35, 'Eyitoayò', 'Importation', 'efiruth37@gmail.com', NULL, '62531297', 'BJ', 'Yèvié', NULL, '$2y$10$n0LLGFhzm5zp16v3ZB2UruAaTzyJebzOsMpnRigZl1vzAzuP8QQCO', 'Customer', 'Active', NULL, NULL, '2023-08-20 14:17:01', '2023-08-20 14:17:01'),
(36, 'DEKA', 'Sergine', 'serginedekateam@gmail.com', NULL, '64 52 60 56', 'BJ', 'Calavi', NULL, '$2y$10$L1ijetVSyjPHV6QMprXVXepck3Yd5ABC0Hh5PkCNwW8bUGUqxM3.S', 'Customer', 'Active', NULL, NULL, '2023-08-20 19:01:17', '2023-08-20 19:01:17'),
(37, 'AGOUNDOTE', 'Irvine', 'irvinea48@gmail.com', NULL, '67 00 69 17', 'BJ', 'Pobè', NULL, '$2y$10$NdVGdAeU7RMJ1XGl2ryZ.uA9CbNsCV1SkfggQ56jpVU4SUz.hFr.K', 'Customer', 'Active', NULL, NULL, '2023-08-23 14:10:05', '2023-08-23 14:10:05'),
(38, 'Hounsinou', 'Mahouzonsou vera-cruz whiliace', 'mahouzonsouhounsinou@gmail.com', NULL, '97525171', 'BJ', 'Porto-Novo', NULL, '$2y$10$t3I5.TcmkbLcFz1dnKieZ.goDyOQ3llDtUXssIyMR2s7aPb.aogvC', 'Customer', 'Active', NULL, NULL, '2023-08-29 06:48:28', '2023-08-29 06:52:00'),
(39, 'MOUIBI', 'Mohamed Youssouf Alabi Adjadi', 'mohamedmouibi1997@gmail.com', NULL, '67825055', 'BJ', 'Cotonou', NULL, '$2y$10$pRs1GzAddbUSYwLe4zcYGOucorzr9SltX0q.I41LiiEpjVYzn6ily', 'Customer', 'Active', NULL, 'IWB9iIPmqPxGgKInazxLIaXLdi68CKojAnSoYsLEOa13OoAt26g4RNEiJxNn', '2023-08-31 15:46:48', '2023-08-31 15:46:48'),
(40, 'Saib', 'Ak', 'aksaibb@gmail.com', NULL, '+22997761258', 'BJ', 'Cotonou', NULL, '$2y$10$cd5Ynf5RpZYhtmpifaoPiuiu.BWq6CQ7U0pxuUKdkHmabp4Mn9nqO', 'Customer', 'Active', NULL, NULL, '2023-09-02 03:59:40', '2023-09-02 03:59:40'),
(41, 'CAKPO', 'Biennée', 'bienneecakpo@gmail.com', NULL, '67845077', 'BJ', 'Cotonou', NULL, '$2y$10$O7bPT51RZ2ENLPD1hBP6wu528YSCJ/5tWjSvzYlyOOIfrcn8Qs6Ry', 'Customer', 'Active', NULL, NULL, '2023-09-04 19:36:11', '2023-09-04 19:36:11'),
(42, 'Houndjo', 'Justine', 'juste.houndjo@gmail.com', NULL, '97205515', 'BJ', 'Calavi', NULL, '$2y$10$wTFTfqZM2L0CLN0.ku9Tqub7L2wEW5KBRM5rPpfcNZn9PDLdoDnOS', 'Customer', 'Active', NULL, NULL, '2023-10-12 15:50:08', '2023-10-12 15:50:08'),
(43, 'Azemahoussonou', 'Inès', 'iazemahoussonou@gmail.com', NULL, '67894535', 'BJ', 'Parakou', NULL, '$2y$10$H9gnTWO8zTvnDOW9HQwIPuG5.0.WfGwhrH6LVhz7T0Tl7LUlLk2tC', 'Customer', 'Active', NULL, NULL, '2023-10-16 16:33:25', '2023-10-16 16:33:25'),
(44, 'KAKPO', 'Jean-Pierre', 'kakpokocoujeanpierre@gmail.com', NULL, '94872700', NULL, NULL, NULL, '$2y$10$AsVg7OSScUZzsltadL149.j/aaA0hX9qAmgwKdUbO4WRrXpWD1w12', 'Manager', 'Active', 1, NULL, '2023-10-18 07:13:17', '2024-02-02 11:17:28'),
(45, 'Legend', 'Cargo', 'legend.cargo@gmail.com', NULL, '94872700', NULL, NULL, NULL, '$2y$10$iZPaZn7sQIZC/o5jTlEUROTqw1BKjeMeZhumiNtUSWMpLKwXL1iKS', 'Staff', 'Active', 1, NULL, '2023-10-18 07:28:41', '2023-10-18 07:28:41'),
(46, 'Azonsou', 'Fidèle', 'corps.de.reve01@gmail.com', NULL, '67665823', 'BJ', 'Calavi', NULL, '$2y$10$X8DgT3XBFWC3qQaijpQk/eMTfiCyrRnkHUkT6Kbr3dUcMCWiAgLAa', 'Customer', 'Active', NULL, NULL, '2023-10-24 07:47:29', '2023-10-24 07:47:29'),
(47, 'OROU BATA', 'arthur', 'arthuroroubata@gmail.com', NULL, '+22967478301', 'BJ', 'Abomey calavi', NULL, '$2y$10$R70ADRxv0zIKEVBguCT7AeLBTHKXggG/bCcBcCfbDceB0/ydoTix6', 'Customer', 'Active', NULL, 'cuUIRYpHPGMzepCGjNYNgE4aWj6JXzZQFBkF6MKYSMqRaYDQCAA1gZY9eRXf', '2023-11-02 13:29:02', '2023-11-02 13:29:02'),
(48, 'cFpTUaLWEVStfL', 'cFpTUaLWEVStfL', 'eCJIHI.tcbdttm@chiffon.fun', NULL, '262-217-26-41', 'AF', NULL, NULL, '$2y$10$gXSe2rlS1jxKOtzOPEDQdub7auI6jzN5/xj.3BeLdM48537fWWify', 'Customer', 'Active', NULL, NULL, '2023-11-04 06:53:16', '2023-11-04 06:53:16'),
(49, 'Houndjo', 'Justine', 'samarydine@gmail.com', NULL, '97205515', 'BJ', 'Abomey-Calavi', NULL, '$2y$10$fRjfZ8ppViZGR8ZAit8A3.FyEH25yxP9y6B26LmMqqpa76P9CZpN6', 'Customer', 'Active', NULL, 'v1hLl2Pvuaio4w7F9cuFg9OZFZkbVb85DmD0huaWSXne30vY4IenI8fYLR2t', '2023-11-10 06:54:52', '2023-11-10 06:54:52'),
(50, 'oDrVwcinnTIxuVp', 'oDrVwcinnTIxuVp', 'FUNneV.hpwmmp@virilia.life', NULL, '625-511-91-45', 'AF', NULL, NULL, '$2y$10$TEPCq4RjmcozNCQGnCX7Ie1at2OJlaOxa54OXYCDFZH2mqsfH88h.', 'Customer', 'Active', NULL, NULL, '2023-11-16 12:47:50', '2023-11-16 12:47:50'),
(51, 'HAZOUME', 'Mariam', 'raissahazoume@gmail.com', NULL, '+22991193584', 'BJ', 'Cotonou', NULL, '$2y$10$O1vl5sIhtEcOIteCb5cb8eh3LF11Xgd0vj2AZHdkPXEefJTr25eje', 'Customer', 'Active', NULL, NULL, '2023-11-20 09:55:26', '2023-11-20 09:55:26'),
(52, 'kfiWkBlJDRuuEo', 'kfiWkBlJDRuuEo', 'fflXDt.qdmpmdt@zetetic.sbs', NULL, '817-542-37-19', 'AF', NULL, NULL, '$2y$10$hAmw0iuMvoREKsb0BiBUk.vQakTC8gjxdeHDrOC9gRuB8tD02mWK2', 'Customer', 'Active', NULL, NULL, '2023-11-22 07:34:09', '2023-11-22 07:34:09'),
(53, 'efzzxWyNDIFVdP', 'efzzxWyNDIFVdP', 'nMajJz.tdwcjwm@rottack.autos', NULL, '289-876-69-10', 'AF', NULL, NULL, '$2y$10$yoDQsMhMHmwOhGsNblyhQuZdnw16KZ3P15SigrNpTeS5OTH95/IMC', 'Customer', 'Active', NULL, NULL, '2023-11-28 07:44:36', '2023-11-28 07:44:36'),
(54, 'LAWANI', 'Arsene', 'iwaju.office@gmail.com', NULL, '+22963399996', 'BJ', 'Kualalumpur', NULL, '$2y$10$83x33ZcMknYV/cuTNPI2kebXebkp/HuDSvXsN526PJ42/dPwqriO2', 'Customer', 'Active', NULL, NULL, '2023-11-28 10:34:35', '2023-11-28 10:34:35'),
(55, 'TNhJejCrcVdS', 'TNhJejCrcVdS', 'oXsiVi.hmcwhdp@scranch.shop', NULL, '154-109-55-99', 'AF', NULL, NULL, '$2y$10$JID/d5Uxpq8xw.X4tBngL.Q3eGbLtHRaPCjhw8vlAAMCEkBjYGAVu', 'Customer', 'Active', NULL, NULL, '2023-11-30 10:54:22', '2023-11-30 10:54:22'),
(56, 'PvPaVmnmE', 'PvPaVmnmE', 'OlkSjW.hmwjcmh@scranch.shop', NULL, '684-019-80-13', 'AF', NULL, NULL, '$2y$10$o75RfJQ7JpumVxjSZCqQgeE4y50nbpt378p67UFdvRPp1j4Y03d3i', 'Customer', 'Active', NULL, NULL, '2023-11-30 11:51:53', '2023-11-30 11:51:53'),
(57, 'Atcha', 'Christine', 'fleurfine5@gmail.com', NULL, '67408330', 'BJ', 'Godomey', NULL, '$2y$10$Up8IQanKdicsQp/3b3C6z.XIZvIJbJoMKeomJbg2dFdIHx5MQinvG', 'Customer', 'Active', NULL, NULL, '2023-12-04 17:34:56', '2023-12-04 17:34:56'),
(58, 'ALIDOU', 'Abdel Mihad', 'mihaddkr@gmail.com', NULL, '22990121932', 'BJ', 'Calavi', NULL, '$2y$10$W7YXzsK3DXIPcrqiLVG7YeyJuVnK21U3QxpLkYYdWXUYgYhTNa65S', 'Customer', 'Active', NULL, NULL, '2023-12-08 10:15:58', '2023-12-08 10:15:58'),
(59, 'Millie', 'Millie', 'pjFbvP.hcjppbt@rightbliss.beauty', NULL, '690-398-69-03', 'AF', 'Cantu', NULL, '$2y$10$lVk4TXm182k/hrcDseFXV..wYWYU.yVO7kO/ZhrpOTdQ9v1Ti2Le6', 'Customer', 'Active', NULL, NULL, '2023-12-09 23:38:33', '2023-12-09 23:38:33'),
(60, 'Evander', 'Evander', 'vTTvIO.hwtdcpc@wheelry.boats', NULL, '931-019-48-88', 'AF', 'Hart', NULL, '$2y$10$SnEa0YsKjYtIzdtITDHGjOn.PQ1VOJncOhfa2jjX57oUGwBd235zm', 'Customer', 'Active', NULL, NULL, '2023-12-11 11:45:43', '2023-12-11 11:45:43'),
(61, 'HOUESSOU', 'ULRICH', 'gulricko@gmail.com', NULL, '97600997', 'BJ', 'Abomey calavi', NULL, '$2y$10$Yk4fGxPaaB.ODFNTa6moYeDsEs/ZBFPPev7.LW.JOl6vLWdVhc9by', 'Customer', 'Active', NULL, NULL, '2023-12-12 11:50:07', '2023-12-12 11:50:07'),
(62, 'SEVI', 'Grégoire', 'sevigregoire@gmail.com', NULL, '66125464', 'BJ', 'Abomey-Calavi', NULL, '$2y$10$085Ww9jM6Y3y/cx2Twqvm.fPViNoCsgZkGfHZgmpKtVolfnQiZPSO', 'Customer', 'Active', NULL, NULL, '2023-12-14 10:43:59', '2023-12-14 10:43:59'),
(63, 'Greyson', 'Greyson', 'ddypvp.tdcctdw@rushlight.cfd', NULL, '585-293-59-94', 'AF', 'Lester', NULL, '$2y$10$mL0Khx5q9LavdGcJubnMNehSOoYpXFJTXUzIweX4jLwdW2QRi/Vwi', 'Customer', 'Active', NULL, NULL, '2023-12-14 21:24:59', '2023-12-14 21:24:59'),
(64, 'awla', 'hotegni Bernard', 'bernardawla@gmail.com', NULL, '96428366', 'BJ', 'Porto cotonou', NULL, '$2y$10$TEf3HYnpCrpGfD3dZ6unH.x9T5egqDCaDDphk2TC9wOrs4mOG/w42', 'Customer', 'Active', NULL, NULL, '2023-12-19 11:24:26', '2023-12-19 11:24:26'),
(65, 'Luella', 'Luella', 'yJrfKq.mphpph@flexduck.click', NULL, '537-085-48-40', 'AF', 'Phan', NULL, '$2y$10$hMZosRkPvmD.GulELYvDueYbR4S21flsFvh3IRr8xAhGjcGxXgi8K', 'Customer', 'Active', NULL, NULL, '2023-12-26 20:45:39', '2023-12-26 20:45:39'),
(66, 'Kendra', 'Kendra', 'YkCHAk.pdqddhc@spectrail.world', NULL, '349-365-87-56', 'AF', 'Benjamin', NULL, '$2y$10$E2VnG4/KjgyyFo9mohKtbOpOvVVMu/ySzTJqeg..5Ug8SX0MHGTBS', 'Customer', 'Active', NULL, NULL, '2023-12-29 19:20:46', '2023-12-29 19:20:46'),
(67, 'Melissa', 'Melissa', 'YjyIEe.bbdbpdh@carnana.art', NULL, '673-085-58-73', 'AF', 'Herrera', NULL, '$2y$10$CjXfsh4eURhNw5x4YwyKs.4xxeTxGloiooVbgLEF5OQxIlQS.wzHi', 'Customer', 'Active', NULL, NULL, '2024-01-01 08:42:58', '2024-01-01 08:42:58'),
(68, 'Kareem', 'Kareem', 'QLLfnp.cmhwtpp@rottack.autos', NULL, '230-100-97-88', 'AF', 'Herman', NULL, '$2y$10$s7jZWvQ0zE4kpcYAy3KU0eZ4BNXaPf34ScXEMQ0WmH1LzKB/X1S6.', 'Customer', 'Active', NULL, NULL, '2024-01-02 18:40:12', '2024-01-02 18:40:12'),
(69, 'Adamou', 'Rachidath', 'admin@legendecargo.com', NULL, '97256298', 'BJ', 'cotonou', NULL, '$2y$10$OemCIaAeV00w9iiRk3gEkebFROaMSLlrfe0Z2GqpJc47WS7k6VdwS', 'Customer', 'Active', NULL, NULL, '2024-01-04 13:30:59', '2024-01-04 13:30:59'),
(70, 'Paislee', 'Paislee', 'BVPUbw.dwdqdjj@maxeza.click', NULL, '131-599-56-85', 'AF', 'Ellis', NULL, '$2y$10$z5ff/0QZwIFqBUgoffS4e.DBMP8Q0B1xK1Yt1clYl1LcV7.xJAcM.', 'Customer', 'Active', NULL, NULL, '2024-01-10 01:48:26', '2024-01-10 01:48:26'),
(71, 'Edgar', 'Edgar', 'FSQEaO.wbwjcmw@anaphora.team', NULL, '935-214-04-31', 'AF', 'Walker', NULL, '$2y$10$ldbIf0Hm9D9rfuXGRz18TuRvd4CPI31Aq6YtzZ95ld9fGZdSv3qDS', 'Customer', 'Active', NULL, NULL, '2024-01-13 12:24:46', '2024-01-13 12:24:46'),
(72, 'Nalani', 'Nalani', 'wyMijE.qwcqmtq@spectrail.world', NULL, '567-355-82-71', 'AF', 'Keller', NULL, '$2y$10$Xs92MZ0VCWc3MCBWWI9Tju2SGWw5kJBumdHBgVrA9u0oZRZQpsiEO', 'Customer', 'Active', NULL, NULL, '2024-01-18 01:47:52', '2024-01-18 01:47:52'),
(73, 'GOHOUNGO', 'CEDRIC', 'cedoexpress5@gmail.com', NULL, '97935479', 'BJ', 'Bohicon', NULL, '$2y$10$rQyQxe7kMHCemBIsrxJg0OlFaQzTdyHtpUkgZmAOXaTUDgPS6x0Ca', 'Customer', 'Active', NULL, NULL, '2024-01-22 08:06:34', '2024-01-22 08:06:34'),
(74, 'Kohen', 'Kohen', 'Xjefnc.qcjbjp@chiffon.fun', NULL, '458-870-37-88', 'AF', 'Robertson', NULL, '$2y$10$GwIXUPJHFK6RSED//HQ55OLQW4SJEkS6r18pX17OgoItYAk1WhMs6', 'Customer', 'Active', NULL, NULL, '2024-01-24 01:09:23', '2024-01-24 01:09:23'),
(75, 'Alexis', 'Alexis', 'dQSLfy.qhmqqppt@paravane.biz', NULL, '430-439-38-86', 'AF', 'Sampson', NULL, '$2y$10$riDuchpY8X58gm9hujBtN.HxLhGl7059IawJ4MR2IViDlzrBVDugu', 'Customer', 'Active', NULL, NULL, '2024-01-25 20:33:31', '2024-01-25 20:33:31'),
(76, 'SOSSOU', 'Horacio', 'hora@gmail.com', NULL, '+22994436564', 'BJ', 'Cotonou', NULL, '$2y$10$xO7g0DMDljjl7OJNRe5TReZeQY/QvAQ4VWpEF0kYMFo8moq6hr6xq', 'Customer', 'Active', NULL, NULL, '2024-02-02 10:41:22', '2024-02-02 10:41:22'),
(77, 'LEGENDE', 'Cargo', 'legendecargo@gmail.com', NULL, '56536540', NULL, NULL, NULL, '$2y$10$FoRkjUd7g.dSJiGeezu5Z.LhGpA6lmDQ4OVYh266G0eA5PPpVZVuu', 'Staff', 'Active', 1, NULL, '2024-02-02 11:24:29', '2024-02-02 11:24:29');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courier_infos`
--
ALTER TABLE `courier_infos`
  ADD CONSTRAINT `courier_infos_receiver_branch_id_foreign` FOREIGN KEY (`receiver_branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `courier_infos_receiver_branch_staff_id_foreign` FOREIGN KEY (`receiver_branch_staff_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `courier_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `courier_product_infos`
--
ALTER TABLE `courier_product_infos`
  ADD CONSTRAINT `courier_product_infos_courier_info_id_foreign` FOREIGN KEY (`courier_info_id`) REFERENCES `courier_infos` (`id`),
  ADD CONSTRAINT `courier_product_infos_shipment_mode_id_foreign` FOREIGN KEY (`shipment_mode_id`) REFERENCES `shipment_modes` (`id`);

--
-- Contraintes pour la table `courier_types`
--
ALTER TABLE `courier_types`
  ADD CONSTRAINT `courier_types_shipment_mode_id_foreign` FOREIGN KEY (`shipment_mode_id`) REFERENCES `shipment_modes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courier_types_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
