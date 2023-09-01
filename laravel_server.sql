-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 juil. 2023 à 15:41
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel_server`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_permissions`
--

CREATE TABLE `categorie_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_permissions`
--

INSERT INTO `categorie_permissions` (`id`, `categorie_permission_name`, `created_at`, `updated_at`) VALUES
(1, 'utilisateurs', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(2, 'roles', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(3, 'staff', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(4, 'type_de_staff', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(5, 'departements', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(6, 'domaines', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(7, 'serveurs', '2023-03-10 15:33:46', '2023-03-10 15:33:46'),
(8, 'outils', '2023-03-16 09:33:50', '2023-03-16 09:33:50'),
(9, 'typeOutils', '2023-03-16 09:33:50', '2023-03-16 09:33:50');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_serveurs`
--

CREATE TABLE `categorie_serveurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_serveur_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_serveurs`
--

INSERT INTO `categorie_serveurs` (`id`, `categorie_serveur_name`, `created_at`, `updated_at`) VALUES
(1, 'local-client', '2023-03-14 09:05:28', '2023-03-14 09:05:28'),
(2, 'cloud', '2023-03-14 09:05:50', '2023-03-14 09:05:50');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom_departement`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Finance', 3, 0, '2023-02-27 10:09:49', '2023-02-28 09:05:22'),
(2, 'Commercial', 3, 0, '2023-02-27 10:33:37', '2023-02-28 09:05:27'),
(3, 'RH', 4, 0, '2023-02-27 09:58:34', '2023-02-28 07:34:06'),
(4, 'Service Achat', 5, 0, '2023-02-27 09:59:10', '2023-02-28 09:05:16'),
(5, 'BF', 6, 0, '2023-02-27 09:59:40', '2023-02-28 07:33:44'),
(6, 'Logistique Operation', 5, 0, '2023-02-28 07:41:01', '2023-03-08 13:36:14'),
(7, 'Control de Gestion', 6, 0, '2023-02-28 07:41:34', '2023-02-28 09:05:10'),
(8, 'Achat et Ventes', 2, 0, '2023-02-28 15:34:38', '2023-02-28 15:34:56'),
(9, 'Sciences Culturelles', 5, 0, '2023-03-01 07:11:31', '2023-03-01 08:13:42'),
(10, 'Science', 5, 0, '2023-03-01 07:11:53', '2023-03-01 07:11:53'),
(11, 'Sciences', 2, 0, '2023-03-01 08:09:01', '2023-03-01 08:09:01');

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_domaine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` bigint(20) UNSIGNED NOT NULL,
  `registre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_expiration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id`, `nom_domaine`, `server_id`, `registre`, `date_expiration`, `status`, `is_deleted`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ok.com', 1, 'GoDaddy', '2023-02-28', 1, 0, 'domaine', '2023-02-26 21:34:26', '2023-02-26 21:34:26'),
(2, 'fait.ig', 4, 'Ibrcai', '2023-02-28', 1, 0, 'domaine', '2023-02-27 00:45:49', '2023-02-27 01:21:34'),
(3, 'obi.net', 1, 'Free Heberg', '2023-02-28', 1, 0, 'domaine', '2023-02-27 01:18:21', '2023-02-27 01:42:48'),
(4, 'iyan.dot', 3, 'Free Hoster', '2023-02-28', 1, 0, 'domaine', '2023-02-27 01:24:31', '2023-02-27 01:24:31'),
(5, 'salt.org', 2, 'Free Host', '2023-02-28', 1, 0, 'domaine', '2023-02-27 06:46:32', '2023-02-27 06:46:32'),
(6, 'dela.vigne', 5, 'Free Home', '2023-05-31', 1, 0, 'domaine', '2023-02-28 15:32:07', '2023-05-30 14:21:22'),
(7, 'kokou-groupe.vi', 3, 'Hosteur', '2023-03-02', 1, 0, 'domaine', '2023-03-01 07:09:12', '2023-03-01 08:23:12'),
(8, 'obi.netifly', 7, 'Free Hoster', '2023-03-02', 1, 0, 'domaine', '2023-03-01 09:04:41', '2023-03-01 09:04:41'),
(9, 'ankh.community', 3, 'ANKH-OUDJEB-SENEB', '2023-03-03', 1, 0, 'domaine', '2023-03-02 07:33:49', '2023-03-02 07:33:49'),
(10, 'ijo.9ja', 4, 'LESCIEUX', '2023-03-13', 1, 0, 'domaine', '2023-03-07 07:44:28', '2023-03-07 07:45:03');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `sent_to_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`, `sender_id`, `sent_to_id`, `photo`) VALUES
(1, 'Bonjour, j\'espere que vous allez bien', '2023-04-04 16:54:56', '2023-04-04 16:54:56', 5, 6, NULL),
(2, 'Bonjour,  je me porte a merveille,\r\net de votre coté?', '2023-04-04 16:56:13', '2023-04-04 16:56:13', 6, 5, NULL),
(3, 'bonjour kodjo, j\'espere que tu vas bien', '2023-04-05 08:08:51', '2023-04-05 08:08:51', 13, 9, NULL),
(4, 'Oui, bonjour mon frere, comment tu te portes? j\'espere super bien, sinon, de mon coté, sava, on rend grace', '2023-04-05 08:10:57', '2023-04-05 08:10:57', 9, 13, NULL),
(5, 'Ok super, je vais bien de mon coté egalement', '2023-04-05 10:05:09', '2023-04-05 10:05:09', 13, 9, NULL),
(6, 'ok super, et la mifa?', '2023-04-05 13:07:03', '2023-04-05 13:07:03', 9, 13, NULL),
(7, 'oui, tout le monde va bien', '2023-04-05 13:50:09', '2023-04-05 13:50:09', 13, 9, NULL),
(8, 'super alor', '2023-04-05 13:50:40', '2023-04-05 13:50:40', 9, 13, NULL),
(9, 'Ok, concernant notre projet', '2023-04-05 14:46:48', '2023-04-05 14:46:48', 13, 9, NULL),
(10, 'oui, t\'inquiete pas, j\'y pense tout le temps', '2023-04-05 14:52:23', '2023-04-05 14:52:23', 9, 13, NULL),
(11, 'T\'est sur? parcequ\'il ne nous reste plus assez de temps en faite', '2023-04-05 14:53:29', '2023-04-05 14:53:29', 13, 9, NULL),
(12, 'oui, j\'en suis conscient, j\'ai commencé par faire le planning...', '2023-04-05 14:54:35', '2023-04-05 14:54:35', 9, 13, NULL),
(13, 'ok, d\'accord, j\'aimerais aussi t\'aider, envoi moi une partie des taches a faire', '2023-04-05 14:58:38', '2023-04-05 14:58:38', 13, 9, NULL),
(14, 'ok, d\'accord, pas de soucis, des que c\'est bon, je te ferai signe sur telegramme', '2023-04-05 15:07:53', '2023-04-05 15:07:53', 9, 13, NULL),
(15, 'ok, mais sur mon ancien numero', '2023-04-05 15:18:53', '2023-04-05 15:18:53', 13, 9, NULL),
(16, 'd\'accord', '2023-04-05 15:19:36', '2023-04-05 15:19:36', 9, 13, NULL),
(17, 'ok, super, il faut qu\'on se depeche sur les traveaux', '2023-04-05 15:24:32', '2023-04-05 15:24:32', 13, 9, NULL),
(18, 'oui,oui, je sais, ne t\'inquite pas surtout', '2023-04-05 15:25:02', '2023-04-05 15:25:02', 9, 13, NULL),
(19, '😀', '2023-04-05 16:07:38', '2023-04-05 16:07:38', 9, 6, NULL),
(20, '🤔', '2023-04-05 16:09:39', '2023-04-05 16:09:39', 6, 9, NULL),
(21, 'comment tu vas ma chere?☺️', '2023-04-05 16:12:00', '2023-04-05 16:12:00', 9, 6, NULL),
(22, '😉 je vais bien de mon coté, et toi Vigné gnon?', '2023-04-05 16:21:31', '2023-04-05 16:21:31', 6, 9, NULL),
(23, 'je vais bien egalement, merci', '2023-04-05 16:28:58', '2023-04-05 16:28:58', 9, 6, NULL),
(24, 'Bonjour Benty, comment tu vas aujourd\'hui?😃', '2023-04-06 06:43:07', '2023-04-06 06:43:07', 9, 6, NULL),
(25, 'Bonjour, je me porte à merveil, et toi*?', '2023-04-06 06:44:49', '2023-04-06 06:44:49', 6, 9, NULL),
(26, 'Super bien👍👍', '2023-04-06 06:45:48', '2023-04-06 06:45:48', 9, 6, NULL),
(27, 'Tu connais l\'Ile de Java?', '2023-04-06 07:14:06', '2023-04-06 07:14:06', 6, 9, NULL),
(28, 'j\'ai entendu parle, why?', '2023-04-06 07:17:54', '2023-04-06 07:17:54', 9, 6, NULL),
(29, 'Nous avons une tournée là', '2023-04-06 07:36:52', '2023-04-06 07:36:52', 6, 9, NULL),
(30, 'Si sa t\'interesse, nous pouvons nous y rendre ensemble', '2023-04-06 07:39:01', '2023-04-06 07:39:01', 6, 9, NULL),
(31, 'Alors, t\'en pense quoi?', '2023-04-06 08:13:44', '2023-04-06 08:13:44', 6, 9, NULL),
(32, '???', '2023-04-06 08:14:44', '2023-04-06 08:14:44', 6, 9, NULL),
(33, 'hello ??', '2023-04-06 08:21:22', '2023-04-06 08:21:22', 6, 9, NULL),
(34, 'T\'est là ??', '2023-04-06 08:24:27', '2023-04-06 08:24:27', 6, 9, NULL),
(35, 'Kodjo ???', '2023-04-06 08:25:17', '2023-04-06 08:25:17', 6, 9, NULL),
(36, 'hello !!!', '2023-04-06 08:35:37', '2023-04-06 08:35:37', 6, 9, NULL),
(37, 's\'il vous plait😐', '2023-04-06 08:37:04', '2023-04-06 08:37:04', 6, 9, NULL),
(38, '1248#', '2023-04-06 08:37:56', '2023-04-06 08:37:56', 6, 9, NULL),
(39, 'bonjour', '2023-04-06 08:47:24', '2023-04-06 08:47:24', 6, 13, NULL),
(40, 'comment tu vas?', '2023-04-06 08:49:06', '2023-04-06 08:49:06', 6, 13, NULL),
(41, 'Et la durée?', '2023-04-06 08:52:35', '2023-04-06 08:52:35', 6, 13, NULL),
(42, 'La famille', '2023-04-06 08:56:24', '2023-04-06 08:56:24', 6, 13, NULL),
(43, 'Les activités?', '2023-04-06 08:58:32', '2023-04-06 08:58:32', 6, 13, NULL),
(44, 'sava?', '2023-04-06 09:00:27', '2023-04-06 09:00:27', 6, 13, NULL),
(45, '???', '2023-04-06 09:06:03', '2023-04-06 09:06:03', 6, 13, NULL),
(46, 'Les orchidées blanches', '2023-04-06 09:08:40', '2023-04-06 09:08:40', 6, 13, NULL),
(47, 'Ago', '2023-04-06 09:09:52', '2023-04-06 09:09:52', 6, 13, NULL),
(48, 'Bonjour, je vais bien egalement. Merci.', '2023-04-07 07:06:40', '2023-04-07 07:06:40', 5, 6, NULL),
(49, 'hp9y79yhu', '2023-04-08 19:28:16', '2023-04-08 19:28:16', 30, 17, NULL),
(50, 'hp9y79yhu', '2023-04-08 19:28:26', '2023-04-08 19:28:26', 30, 17, NULL),
(51, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A sunt reiciendis totam, alias facilis sapiente eaque ab corrupti? Inventore totam illo quasi, voluptas ex eveniet ipsa blanditiis ducimus nobis molestias.', '2023-04-08 19:30:46', '2023-04-08 19:30:46', 17, 30, NULL),
(52, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A sunt reiciendis totam, alias facilis sapiente eaque ab corrupti? Inventore totam illo quasi, voluptas ex eveniet ipsa blanditiis ducimus nobis molestias.\nLorem ipsum dolor sit amet consectetur adipisicing elit. A sunt reiciendis totam, alias facilis sapiente eaque ab corrupti? Inventore totam illo quasi, voluptas ex eveniet ipsa blanditiis ducimus nobis molestias.', '2023-04-08 19:32:15', '2023-04-08 19:32:15', 17, 30, NULL),
(53, 'logarithme ne peux rien', '2023-04-08 20:20:04', '2023-04-08 20:20:04', 30, 17, NULL),
(54, 'ok', '2023-04-08 20:20:25', '2023-04-08 20:20:25', 17, 30, NULL),
(55, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A sunt reiciendis totam, alias facilis sapiente eaque ab corrupti? Inventore totam illo quasi, voluptas ex eveniet ipsa blanditiis ducimus nobis molestias.😮', '2023-04-08 20:20:46', '2023-04-08 20:20:46', 30, 17, NULL),
(56, '😍😍😍', '2023-04-08 20:29:29', '2023-04-08 20:29:29', 30, 17, NULL),
(57, 'bjt', '2023-04-10 18:40:23', '2023-04-10 18:40:23', 30, 11, NULL),
(58, 'guguuhu 😘', '2023-04-10 18:48:24', '2023-04-10 18:48:24', 30, 17, NULL),
(59, '.message_content>div:first-child{\n    height: 100%;\n    width: 100%;\n    display: flex!important;\n    background-color: #fff;\n    justify-content: center;\n    align-items: center;\n    border: solid .8px var(--gray-low-important-text);\n}', '2023-04-10 18:48:56', '2023-04-10 18:48:56', 30, 11, NULL),
(60, 'voila le code', '2023-04-10 18:49:42', '2023-04-10 18:49:42', 30, 11, NULL),
(61, 'He', '2023-04-10 18:57:14', '2023-04-10 18:57:14', 30, 17, NULL),
(62, 'uiop', '2023-04-10 18:57:37', '2023-04-10 18:57:37', 17, 30, NULL),
(63, '😏😏😏😏🤩🤩🤩🚓🚓🚓', '2023-04-10 19:14:24', '2023-04-10 19:14:24', 17, 30, NULL),
(64, '😏😏😏😏🤩🤩🤩🚓🚓🚓🚖🚖', '2023-04-10 19:27:25', '2023-04-10 19:27:25', 17, 30, NULL),
(65, 'salut', '2023-04-14 13:31:16', '2023-04-14 13:31:16', 30, 17, NULL),
(66, 'c\'est comment', '2023-04-14 13:31:56', '2023-04-14 13:31:56', 17, 30, NULL),
(67, 'bonjour mon frere', '2023-04-17 07:07:08', '2023-04-17 07:07:08', 17, 30, NULL),
(68, 'oui bonjour', '2023-04-17 07:07:34', '2023-04-17 07:07:34', 30, 17, NULL),
(69, 'hello', '2023-04-17 07:09:18', '2023-04-17 07:09:18', 17, 30, NULL),
(70, 'salut', '2023-04-17 07:11:29', '2023-04-17 07:11:29', 17, 30, NULL),
(71, 'Ok d\'accord, merci beaucoup', '2023-04-17 07:22:01', '2023-04-17 07:22:01', 30, 11, NULL),
(72, 'Ok Bonjour, maintenant, il faut que tu m\'apprenne a l\'utiliser', '2023-04-17 07:22:42', '2023-04-17 07:22:42', 11, 30, NULL),
(73, 'Pas de soucis a se faire, j\'ai une documentation pour ce cas', '2023-04-17 07:23:22', '2023-04-17 07:23:22', 30, 11, NULL),
(74, 'ok d\'accord, s\'il te plait, quand est-ce-que je pourrais avoir la documentation', '2023-04-17 07:36:51', '2023-04-17 07:36:51', 11, 30, NULL),
(75, 'ok, je vois, actuellement, j\'ai quelques soucis de connectivité mais des que c\'est bon, je te ferais signe', '2023-04-17 07:37:49', '2023-04-17 07:37:49', 30, 11, NULL),
(76, 'ok mais déjà, il faut que tu commences par m\'aider sur quelques liens a utiliser', '2023-04-17 07:40:44', '2023-04-17 07:40:44', 11, 30, NULL),
(77, 'oui, pas de soucis a se faire, dis moi juste de quoi tu as besoin', '2023-04-17 07:41:09', '2023-04-17 07:41:09', 30, 11, NULL),
(78, 'oui, pas de soucis a se faire, dis moi juste de quoi tu as besoin', '2023-04-17 07:41:12', '2023-04-17 07:41:12', 30, 11, NULL),
(79, 'ok déjà commencons par le debut', '2023-04-17 07:41:33', '2023-04-17 07:41:33', 11, 30, NULL),
(80, 'oui, rappel moi le premier s\'il\n te plait', '2023-04-17 08:37:44', '2023-04-17 08:37:44', 30, 11, NULL),
(81, 'accordion', '2023-04-17 08:45:05', '2023-04-17 08:45:05', 11, 30, NULL),
(82, 'von neuman', '2023-04-17 08:51:34', '2023-04-17 08:51:34', 30, 17, NULL),
(83, 'battles', '2023-04-17 08:56:05', '2023-04-17 08:56:05', 11, 30, NULL),
(84, 'field', '2023-04-17 09:04:02', '2023-04-17 09:04:02', 11, 30, NULL),
(85, 'ok, un instant s\'il te plait', '2023-04-17 09:35:34', '2023-04-17 09:35:34', 30, 11, NULL),
(86, 'd\'accord', '2023-04-17 09:38:31', '2023-04-17 09:38:31', 11, 30, NULL),
(87, '1-il faut se connecter', '2023-04-17 09:39:12', '2023-04-17 09:39:12', 30, 11, NULL),
(88, '2-Grace a ton email et ton mot de passe', '2023-04-17 09:51:59', '2023-04-17 09:51:59', 30, 11, NULL),
(89, '3-Il y a posibilité que des erreurs surviennent', '2023-04-17 09:52:32', '2023-04-17 09:52:32', 30, 11, NULL),
(90, '4-le plus commun est (email/mot de passe incorrecte) pour ne pas divilguer trop d\'info', '2023-04-17 09:54:38', '2023-04-17 09:54:38', 30, 11, NULL),
(91, '5-Si le email et le mot de passe existent et sont conforme, vous avez acces a la page du tableau de bord', '2023-04-17 09:56:24', '2023-04-17 09:56:24', 30, 11, NULL),
(92, '6-une fois sur cette ou non et selon vos roles et persmissions, vous aurez access a certaines fonctionnalité ou pas', '2023-04-17 10:01:40', '2023-04-17 10:01:40', 30, 11, NULL),
(93, 'c\'est la base, qu\'en pensez vous pour l\'instant?', '2023-04-17 10:04:21', '2023-04-17 10:04:21', 30, 11, NULL),
(94, 'ok, merci, pour l\'instant sa me vas', '2023-04-17 10:06:21', '2023-04-17 10:06:21', 11, 30, NULL),
(95, '😆', '2023-04-17 13:28:19', '2023-04-17 13:28:19', 30, 11, NULL),
(96, '🧐🤓🥳😎 c\'est quoi le soucis frere?', '2023-04-17 13:34:53', '2023-04-17 13:34:53', 11, 30, NULL),
(97, '😊😇😊😊😊😊 comment tu vas pour moi', '2023-04-17 16:12:09', '2023-04-17 16:12:09', 30, 11, NULL),
(98, '😈👿🤑😪🤮😷😬🤢 hello, j\'espere que vous-allez bien !???', '2023-04-18 07:05:03', '2023-04-18 07:05:03', 30, 17, NULL),
(99, '😎😎 hello', '2023-04-18 08:04:13', '2023-04-18 08:04:13', 30, 17, NULL),
(100, 'salut, nous etions entrain de faire des tests pour verifier les cellules🙃🙃🙃😛', '2023-04-18 08:39:59', '2023-04-18 08:39:59', 30, 17, NULL),
(101, 'Hier, j\'etais allé voir KOUGBLENOU, concernant le nouveau projet😏😏😏', '2023-04-18 08:45:03', '2023-04-18 08:45:03', 30, 11, NULL),
(102, 'le', '2023-04-18 09:55:46', '2023-04-18 09:55:46', 30, 17, NULL),
(103, 'Voici l\'image de Mme Asake', '2023-04-18 12:46:27', '2023-04-18 12:46:27', 30, 11, '20230418144627.jpg'),
(104, 'ok d\'accord', '2023-04-18 13:17:06', '2023-04-18 13:17:06', 11, 30, '20230418151706.jpg'),
(105, 'ok, merci beaucoup, un instant s\'il te plait', '2023-04-18 13:23:25', '2023-04-18 13:23:25', 30, 11, NULL),
(106, 'ok, je patiente alors😎😎😎', '2023-04-18 13:25:17', '2023-04-18 13:25:17', 11, 30, NULL),
(107, 'hello', '2023-04-18 13:46:06', '2023-04-18 13:46:06', 30, 11, '20230418154606.pdf'),
(108, NULL, '2023-04-19 07:11:46', '2023-04-19 07:11:46', 30, 17, NULL),
(109, NULL, '2023-04-19 07:12:42', '2023-04-19 07:12:42', 30, 17, '20230419091242.png'),
(110, '🇫🇮🇬🇫🇬🇬🇩🇲🇳🇬🇹🇬🇹🇬🇹🇬', '2023-04-19 10:42:40', '2023-04-19 10:42:40', 30, 17, NULL),
(111, NULL, '2023-04-19 15:26:53', '2023-04-19 15:26:53', 30, 11, '20230419172653.docx'),
(112, NULL, '2023-04-19 15:46:38', '2023-04-19 15:46:38', 30, 11, '20230419174638.txt'),
(113, NULL, '2023-04-19 16:08:17', '2023-04-19 16:08:17', 30, 11, '20230419180817.xlsx'),
(114, 'Bonjour🙂 voila les fichiers', '2023-04-20 06:44:14', '2023-04-20 06:44:14', 30, 11, NULL),
(115, 'bonjour🤔🤔🤔', '2023-05-15 08:15:33', '2023-05-15 08:15:33', 6, 13, NULL),
(116, 'oui, bonjour 😐😐😐', '2023-05-15 08:16:09', '2023-05-15 08:16:09', 6, 13, NULL),
(117, 'salut😶😶😶😶😶', '2023-05-15 08:16:43', '2023-05-15 08:16:43', 13, 6, NULL),
(118, 'Il y a comme un soucis', '2023-05-15 08:17:45', '2023-05-15 08:17:45', 13, 6, NULL),
(119, 'oui, je crois bien', '2023-05-15 08:17:57', '2023-05-15 08:17:57', 6, 13, NULL),
(120, 'Maintenant sa va? ou bien sa persiste?', '2023-05-15 08:18:59', '2023-05-15 08:18:59', 13, 6, NULL),
(121, 'Non,non,  je crois que maintenant, c\'est bon, sa va beaucoup mieux', '2023-05-15 08:19:23', '2023-05-15 08:19:23', 6, 13, NULL),
(122, 'Ah, il le fallait, j\'ai carrement pris peur😅😅😅', '2023-05-15 08:20:06', '2023-05-15 08:20:06', 13, 6, NULL),
(123, 'Ah moi j\'ai triangulairement pris peur😝😝😝', '2023-05-15 08:20:34', '2023-05-15 08:20:34', 6, 13, NULL),
(124, 'Salut😺😺😺', '2023-05-15 09:18:38', '2023-05-15 09:18:38', 5, 6, NULL),
(125, 'Oui, salut, comment tu vas?', '2023-05-15 09:19:30', '2023-05-15 09:19:30', 6, 5, NULL),
(126, 'Je vais super bien, et toi?', '2023-05-15 09:20:02', '2023-05-15 09:20:02', 5, 6, NULL),
(127, 'Je pète la forme', '2023-05-15 09:22:32', '2023-05-15 09:22:32', 6, 5, NULL),
(128, 'Salut, je peux vous aider?🤥🤥🤥', '2023-05-15 09:35:58', '2023-05-15 09:35:58', 9, 6, NULL),
(129, 'Bonjour Mosieur, heuh... non,non sava,sava', '2023-05-15 09:36:43', '2023-05-15 09:36:43', 6, 9, NULL),
(130, 'Vous etes sùr?', '2023-05-15 09:37:03', '2023-05-15 09:37:03', 9, 6, NULL),
(131, 'Biensur que non', '2023-05-15 09:37:18', '2023-05-15 09:37:18', 6, 9, NULL),
(132, 'ok d\'accord', '2023-05-15 10:00:36', '2023-05-15 10:00:36', 6, 9, NULL),
(133, '???', '2023-05-15 10:01:22', '2023-05-15 10:01:22', 9, 6, NULL),
(134, 'hello', '2023-05-15 11:04:26', '2023-05-15 11:04:26', 6, 5, NULL),
(135, '👋👋👋', '2023-05-15 11:19:23', '2023-05-15 11:19:23', 9, 6, NULL),
(136, 'hey !!!', '2023-05-15 11:19:35', '2023-05-15 11:19:35', 6, 9, NULL),
(137, '👍👍👍', '2023-05-15 13:06:37', '2023-05-15 13:06:37', 6, 31, NULL),
(138, '🤙🤙🤙', '2023-05-15 13:13:15', '2023-05-15 13:13:15', 31, 6, NULL),
(139, '👁️‍🗨️👁️‍🗨️👁️‍🗨️', '2023-05-15 13:13:34', '2023-05-15 13:13:34', 6, 31, NULL),
(140, '💪💪💪', '2023-05-15 13:14:19', '2023-05-15 13:14:19', 31, 6, NULL),
(141, '💢💢💢', '2023-05-15 13:15:36', '2023-05-15 13:15:36', 6, 31, NULL),
(142, '🫵👉🖕☠', '2023-05-15 13:16:09', '2023-05-15 13:16:09', 31, 6, NULL),
(143, '😴', '2023-05-15 13:17:30', '2023-05-15 13:17:30', 31, 6, NULL),
(144, 'could you explain please', '2023-05-15 13:17:48', '2023-05-15 13:17:48', 6, 31, NULL),
(145, 'azerty', '2023-05-15 15:42:53', '2023-05-15 15:42:53', 6, 31, NULL),
(146, 'qwerty', '2023-05-15 15:43:12', '2023-05-15 15:43:12', 31, 6, NULL),
(147, 'nevada', '2023-05-15 15:43:30', '2023-05-15 15:43:30', 6, 31, NULL),
(148, 'oklahoma', '2023-05-15 15:44:02', '2023-05-15 15:44:02', 31, 6, NULL),
(149, '👍', '2023-05-15 15:44:24', '2023-05-15 15:44:24', 31, 6, NULL),
(150, 'good', '2023-05-15 15:44:31', '2023-05-15 15:44:31', 6, 31, NULL),
(151, '12', '2023-05-15 15:49:29', '2023-05-15 15:49:29', 6, 31, NULL),
(152, '13', '2023-05-15 15:49:37', '2023-05-15 15:49:37', 31, 6, NULL),
(153, 'Bonjour', '2023-05-16 06:28:30', '2023-05-16 06:28:30', 6, 5, NULL),
(154, 'oui, bonjour, comment tu vas?', '2023-05-16 06:28:43', '2023-05-16 06:28:43', 5, 6, NULL),
(155, 'je vais bien et toi😏', '2023-05-16 06:29:41', '2023-05-16 06:29:41', 6, 5, NULL),
(156, 'je vais bien egalement...merci😀', '2023-05-16 06:30:04', '2023-05-16 06:30:04', 5, 6, NULL),
(157, 'hello', '2023-05-30 06:38:16', '2023-05-30 06:38:16', 6, 31, NULL),
(158, 'hi', '2023-05-30 06:38:22', '2023-05-30 06:38:22', 31, 6, NULL),
(159, 'comment tu vas?', '2023-05-30 06:38:34', '2023-05-30 06:38:34', 6, 31, NULL),
(160, 'je vais bien👍', '2023-05-30 06:38:58', '2023-05-30 06:38:58', 31, 6, NULL),
(161, 'ok merci🙏', '2023-05-30 06:39:40', '2023-05-30 06:39:40', 6, 31, NULL),
(162, '🇩🇪', '2023-05-30 06:49:50', '2023-05-30 06:49:50', 30, 17, NULL),
(163, '😘🤩😇', '2023-05-30 09:22:54', '2023-05-30 09:22:54', 31, 6, NULL),
(164, NULL, '2023-05-30 09:23:21', '2023-05-30 09:23:21', 31, 6, '20230530112321.png');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_14_143543_create_servers_table', 1),
(6, '2023_02_16_063945_create_categorie_permissions_table', 1),
(7, '2023_02_16_063947_create_permission_tables', 1),
(8, '2023_02_22_110806_create_domaines_table', 1),
(9, '2023_02_27_100021_create_departements_table', 1),
(10, '2023_02_27_121047_create_type_staff_table', 1),
(11, '2023_02_27_152015_create_staff_table', 1),
(12, '2023_02_14_143540_create_categorie_serveurs_table', 2),
(20, '0000_00_00_000000_create_websockets_statistics_entries_table', 3),
(21, '2023_03_15_091508_create_type_outils_table', 3),
(22, '2023_03_15_092113_create_outils_table', 3),
(23, '2023_04_04_114151_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 11),
(7, 'App\\Models\\Staff', 5),
(7, 'App\\Models\\Staff', 12),
(7, 'App\\Models\\Staff', 13),
(7, 'App\\Models\\Staff', 22),
(7, 'App\\Models\\Staff', 23),
(7, 'App\\Models\\Staff', 25),
(7, 'App\\Models\\Staff', 28),
(7, 'App\\Models\\Staff', 30),
(8, 'App\\Models\\Staff', 9),
(8, 'App\\Models\\Staff', 14),
(8, 'App\\Models\\Staff', 18),
(8, 'App\\Models\\Staff', 29),
(9, 'App\\Models\\Staff', 15),
(9, 'App\\Models\\Staff', 16),
(9, 'App\\Models\\Staff', 24),
(9, 'App\\Models\\Staff', 26),
(9, 'App\\Models\\Staff', 27),
(9, 'App\\Models\\Staff', 31),
(10, 'App\\Models\\Staff', 17),
(11, 'App\\Models\\Staff', 11);

-- --------------------------------------------------------

--
-- Structure de la table `outils`
--

CREATE TABLE `outils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type_outil_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `outils`
--

INSERT INTO `outils` (`id`, `name`, `username`, `password`, `url`, `is_deleted`, `type_outil_id`, `created_at`, `updated_at`) VALUES
(1, 'name', 'username', 'password', 'http://url.com', '0', 1, '2023-05-15 10:08:54', '2023-05-15 10:08:54'),
(2, 'Ecran', 'screen', '123456789', 'http://screen.com', '0', 2, '2023-05-30 16:27:01', '2023-05-30 16:27:01');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `categorie_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', 'Liste Utilisateur', 1, '2023-02-26 20:19:25', '2023-02-26 20:19:25'),
(2, 'user-create', 'web', 'Creation Utilisateur', 1, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(3, 'user-edit', 'web', 'Edition Utilisateur', 1, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(4, 'user-delete', 'web', 'Suppretion Utilisateur', 1, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(5, 'role-list', 'web', 'Liste de roles', 2, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(6, 'role-create', 'web', 'Creation de role', 2, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(7, 'role-edit', 'web', 'Edition de role', 2, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(8, 'role-delete', 'web', 'Suppretion de role', 2, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(9, 'server-list', 'web', 'Liste de serveurs', 7, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(10, 'server-create', 'web', 'Creation de serveurs', 7, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(11, 'server-view', 'web', 'Voir les serveurs', 7, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(12, 'server-edit', 'web', 'Edition de serveur', 7, '2023-02-26 20:19:26', '2023-02-26 20:19:26'),
(13, 'server-delete', 'web', 'Suppretion de serveur', 7, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(14, 'domaine-list', 'web', 'Liste des domaines', 6, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(15, 'domaine-create', 'web', 'Creation de domaine', 6, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(16, 'domaine-edit', 'web', 'Edition de domaine', 6, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(17, 'domaine-delete', 'web', 'Suppretion de domaine', 6, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(18, 'departement-list', 'web', 'Liste des departements', 5, '2023-03-01 10:43:18', '2023-03-01 10:43:18'),
(19, 'departement-create', 'web', 'Creation de departement', 5, '2023-03-01 10:44:52', '2023-03-01 10:44:52'),
(20, 'departement-edit', 'web', 'Edition des departements', 5, '2023-03-01 10:44:52', '2023-03-01 10:44:52'),
(21, 'departement-delete', 'web', 'Suppretion de departement', 5, '2023-03-01 10:46:26', '2023-03-01 10:46:26'),
(22, 'staff-list', 'web', 'List de staff', 3, '2023-03-01 10:51:01', '2023-03-01 10:51:01'),
(23, 'staff-create', 'web', 'Creation de Staff', 3, '2023-03-01 10:51:01', '2023-03-01 10:51:01'),
(24, 'staff-edit', 'web', 'Edition de staff', 3, '2023-03-01 10:53:42', '2023-03-01 10:53:42'),
(25, 'staff-delete', 'web', 'Suppretion de staff', 3, '2023-03-01 10:53:42', '2023-03-01 10:53:42'),
(26, 'typeStaff-list', 'web', 'Liste de type de staff', 4, '2023-03-01 10:57:47', '2023-03-01 10:57:47'),
(27, 'typeStaff-create', 'web', 'Creation type de staff', 4, '2023-03-01 10:57:47', '2023-03-01 10:57:47'),
(28, 'typeStaff-edit', 'web', 'Edition type staff', 4, '2023-03-01 11:01:04', '2023-03-01 11:01:04'),
(29, 'typeStaff-delete', 'web', 'Suppretion type de staff', 4, '2023-03-01 11:01:04', '2023-03-01 11:01:04'),
(30, 'domaine-view', 'web', 'Voir domaine', 6, '2023-03-01 13:44:36', '2023-03-01 13:44:36'),
(42, 'server-list', 'staffs', 'liste des serveurs', 7, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(43, 'server-create', 'staffs', 'creation de serveur', 7, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(44, 'server-view', 'staffs', 'voir serveur', 7, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(45, 'server-edit', 'staffs', 'edition de serveur', 7, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(46, 'server-delete', 'staffs', 'suppretion de serveur', 7, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(47, 'domaine-list', 'staffs', 'liste de domaine', 6, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(48, 'domaine-create', 'staffs', 'creation de domaine', 6, '2023-03-06 15:08:57', '2023-03-06 15:08:57'),
(49, 'domaine-view', 'staffs', 'voir domaine', 6, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(50, 'domaine-edit', 'staffs', 'edition de domaine', 6, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(51, 'domaine-delete', 'staffs', 'suppretion de domaine', 6, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(52, 'departement-list', 'staffs', 'liste de departement', 5, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(53, 'departement-create', 'staffs', 'creation de departement', 5, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(54, 'departement-edit', 'staffs', 'edition de departement', 5, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(55, 'departement-delete', 'staffs', 'suppretion de departement', 5, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(56, 'staff-list', 'staffs', 'liste de staff', 3, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(57, 'staff-create', 'staffs', 'creation de staff', 3, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(58, 'staff-edit', 'staffs', 'edition de staff', 3, '2023-03-06 15:08:58', '2023-03-06 15:08:58'),
(59, 'staff-delete', 'staffs', 'suppretion de staff', 3, '2023-03-06 15:08:59', '2023-03-06 15:08:59'),
(60, 'typeStaff-list', 'staffs', 'liste de type staff', 4, '2023-03-06 15:08:59', '2023-03-06 15:08:59'),
(61, 'typeStaff-create', 'staffs', 'creation de type staff', 4, '2023-03-06 15:08:59', '2023-03-06 15:08:59'),
(62, 'typeStaff-edit', 'staffs', 'edition de type staff', 4, '2023-03-06 15:08:59', '2023-03-06 15:08:59'),
(63, 'typeStaff-delete', 'staffs', 'suppretion de type staff', 4, '2023-03-06 15:08:59', '2023-03-06 15:08:59'),
(64, 'domaine-total', 'staffs', 'nombre de domaine', 6, '2023-03-10 08:18:34', '2023-03-10 08:18:34'),
(65, 'domaine-expire', 'staffs', 'nombre domaines expiré', 6, '2023-03-10 08:18:34', '2023-03-10 08:18:34'),
(66, 'serveur-total', 'staffs', 'nombre de serveur', 7, '2023-03-10 08:25:19', '2023-03-10 08:25:19'),
(67, 'serveur-expire', 'staffs', 'nombre serveur expiré', 7, '2023-03-10 08:25:19', '2023-03-10 08:25:19'),
(68, 'departement-total-actif', 'staffs', 'nombre departement actif', 5, '2023-03-10 08:27:50', '2023-03-10 08:27:50'),
(69, 'staff-total-actif', 'staffs', 'nombre staff actif', 3, '2023-03-10 08:27:50', '2023-03-10 08:27:50'),
(70, 'domaine-total', 'web', 'nombre de domaine', 6, '2023-03-10 09:15:18', '2023-03-10 09:15:18'),
(71, 'domaine-expire', 'web', 'nombre domaine expiré', 6, '2023-03-10 09:15:18', '2023-03-10 09:15:18'),
(72, 'serveur-total', 'web', 'nombre de serveur', 7, '2023-03-10 09:17:59', '2023-03-10 09:17:59'),
(73, 'serveur-expire', 'web', 'nombre serveur expiré', 7, '2023-03-10 09:17:59', '2023-03-10 09:17:59'),
(74, 'departement-total-actif', 'web', 'nombre departement actif', 5, '2023-03-10 09:21:51', '2023-03-10 09:21:51'),
(75, 'staff-total-actif', 'web', 'nombre staff actif', 3, '2023-03-10 09:21:51', '2023-03-10 09:21:51'),
(94, 'outil-list', 'web', 'liste des outils', 8, '2023-03-16 08:58:16', '2023-03-16 08:58:16'),
(95, 'outil-create', 'web', 'creation d\'un outil', 8, '2023-03-16 08:58:16', '2023-03-16 08:58:16'),
(96, 'outil-view', 'web', 'voir outil', 8, '2023-03-16 08:58:16', '2023-03-16 08:58:16'),
(97, 'outil-edit', 'web', 'edition d\'un outil', 8, '2023-03-16 08:58:16', '2023-03-16 08:58:16'),
(98, 'outil-delete', 'web', 'suppretion d\'un outil', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(99, 'typeOutil-list', 'web', 'liste des type d\'outils', 9, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(100, 'typeOutil-create', 'web', 'creation de type d\'outils', 9, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(101, 'typeOutil-edit', 'web', 'edition du type d\'outil', 9, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(102, 'typeOutil-delete', 'web', 'suppretion du type d\'outil', 9, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(103, 'outil-list', 'staffs', 'liste des outils', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(104, 'outil-create', 'staffs', 'creation d\'un outil', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(105, 'outil-view', 'staffs', 'voir outil', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(106, 'outil-edit', 'staffs', 'edition d\'un outil', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(107, 'outil-delete', 'staffs', 'suppretion d\'un outil', 8, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(108, 'typeOutil-list', 'staffs', 'liste des type d\'outils', 9, '2023-03-16 08:58:17', '2023-03-16 08:58:17'),
(109, 'typeOutil-create', 'staffs', 'creation de type d\'outils', 9, '2023-03-16 08:58:18', '2023-03-16 08:58:18'),
(110, 'typeOutil-edit', 'staffs', 'edition du type d\'outil', 9, '2023-03-16 08:58:18', '2023-03-16 08:58:18'),
(111, 'typeOutil-delete', 'staffs', 'suppretion du type d\'outil', 9, '2023-03-16 08:58:18', '2023-03-16 08:58:18');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Token', 'a20d2c678a20342056a27f9f54b491d2ba2508f9a6a6a20b81bec2cb80380ce1', '[\"*\"]', NULL, NULL, '2023-03-13 15:32:15', '2023-03-13 15:32:15'),
(2, 'App\\Models\\User', 1, 'Token', '55fdac1f59a4813a2a3a9e3671dd5b6f6747f434c0b24b2fa96507754632c6ff', '[\"*\"]', NULL, NULL, '2023-03-13 15:39:32', '2023-03-13 15:39:32'),
(3, 'App\\Models\\User', 1, 'Token', '756d0e03ed073d4c52e11f393bd0ea281e5795ce4cf9c9469541761dc6c66aca', '[\"*\"]', NULL, NULL, '2023-03-13 16:47:26', '2023-03-13 16:47:26'),
(4, 'App\\Models\\User', 2, 'Token', '30142f88a1850f949291b309c8d5be64913383c507a02485b3da674be0fd67b9', '[\"*\"]', NULL, NULL, '2023-03-16 09:26:52', '2023-03-16 09:26:52'),
(5, 'App\\Models\\Staff', 31, 'Token', 'f2936bf198a35916f80654ddb275249a386b1139429944a793f11842fd3dc3a3', '[\"*\"]', NULL, NULL, '2023-03-16 09:27:11', '2023-03-16 09:27:11'),
(6, 'App\\Models\\User', 1, 'Token', '14851148890aa9724eff37b6769a35c74031d36af7de87c267537909adf4cc5f', '[\"*\"]', NULL, NULL, '2023-03-16 09:28:01', '2023-03-16 09:28:01'),
(7, 'App\\Models\\User', 2, 'Token', 'd90d66c5980c9483ed7a85bad517bfb93b4fa06732fecb8899980f510a26bc2d', '[\"*\"]', NULL, NULL, '2023-03-16 09:33:00', '2023-03-16 09:33:00'),
(8, 'App\\Models\\User', 1, 'Token', '2bf1294a3e059b6001dc7735a78939c10273af69d733bbafa3ad33a910e67d53', '[\"*\"]', NULL, NULL, '2023-03-16 09:33:53', '2023-03-16 09:33:53'),
(9, 'App\\Models\\User', 2, 'Token', '2635ca6476bd8f219b66caf72138171c4662556745fe16e523fa33267cf90e45', '[\"*\"]', NULL, NULL, '2023-03-16 09:36:22', '2023-03-16 09:36:22'),
(10, 'App\\Models\\User', 1, 'Token', 'ce8d2a35a533b12fcae194f900cf376b365ac4d662323c920139b64dc073f596', '[\"*\"]', NULL, NULL, '2023-03-16 09:38:47', '2023-03-16 09:38:47'),
(11, 'App\\Models\\User', 1, 'Token', '1bc9642bfc4e1e97c07e359942ba6521f0bf9fa3a6a78bbde450d522da1c1b48', '[\"*\"]', NULL, NULL, '2023-03-30 08:59:12', '2023-03-30 08:59:12'),
(12, 'App\\Models\\User', 1, 'Token', '334a57087cfdaadfabf53941cb936438e14e675353ec59f36d16d834763d8853', '[\"*\"]', NULL, NULL, '2023-04-03 10:14:29', '2023-04-03 10:14:29'),
(13, 'App\\Models\\Staff', 31, 'Token', '575dfdde67b893cbfecdba6fde4131feae34f69d78ae7fa5bcea2bafe2c600b3', '[\"*\"]', NULL, NULL, '2023-04-03 15:04:01', '2023-04-03 15:04:01'),
(14, 'App\\Models\\Staff', 31, 'Token', '8ee7759e05cd0c1900184460def46bfc64d70c9a68d81c62d082d3ed5cbd53d7', '[\"*\"]', NULL, NULL, '2023-04-03 15:05:32', '2023-04-03 15:05:32'),
(15, 'App\\Models\\User', 1, 'Token', '552d858367b0698e98c988568da8c50f29ef413e3595452aad8904ec8196ed52', '[\"*\"]', NULL, NULL, '2023-04-03 15:51:13', '2023-04-03 15:51:13'),
(16, 'App\\Models\\Staff', 31, 'Token', '2da146586971ff5586c4cc4b641631dfaf49c7062f50520191c9716e73633cd6', '[\"*\"]', NULL, NULL, '2023-04-03 15:54:15', '2023-04-03 15:54:15'),
(17, 'App\\Models\\User', 1, 'Token', 'e4c217b15de4052c342e4c4a84bdd4ef48888106b44123bd8378294b9acc4406', '[\"*\"]', NULL, NULL, '2023-04-03 15:54:57', '2023-04-03 15:54:57'),
(18, 'App\\Models\\User', 1, 'Token', 'f0cf7a4c981b7609148aa5013ccac04b796b7b983230dca3eddd703b96a8243a', '[\"*\"]', NULL, NULL, '2023-04-03 15:56:29', '2023-04-03 15:56:29'),
(19, 'App\\Models\\Staff', 31, 'Token', '3285e9b21f80f85f8dd45ebd35bb964e2ec8d556c6b78ce67eda8657f86703c6', '[\"*\"]', NULL, NULL, '2023-04-03 15:59:56', '2023-04-03 15:59:56'),
(20, 'App\\Models\\User', 1, 'Token', 'b5489bc7dd43e23698aaeba472fe622adf3dd9effc82c79b8df500c4b33e5987', '[\"*\"]', NULL, NULL, '2023-04-03 20:20:07', '2023-04-03 20:20:07'),
(21, 'App\\Models\\User', 1, 'Token', '80926731215e6995965543048de5d6473b50612c14919e76cbdbdf6a626c7b54', '[\"*\"]', NULL, NULL, '2023-04-04 06:42:19', '2023-04-04 06:42:19'),
(22, 'App\\Models\\Staff', 5, 'Token', '9fd5665be9297469a5179688546759e5ee4b901505c3475e47fabcdabc3bcab5', '[\"*\"]', NULL, NULL, '2023-04-04 14:59:08', '2023-04-04 14:59:08'),
(23, 'App\\Models\\User', 1, 'Token', 'e7abda4337679839804923189bec74349620749b421484ba0de51784aa63ce80', '[\"*\"]', NULL, NULL, '2023-04-04 16:09:12', '2023-04-04 16:09:12'),
(24, 'App\\Models\\User', 1, 'Token', '1019f18acedbcdeef03c57da445b127cf8a2a69d0e4eb45446e5fa162b5a20e6', '[\"*\"]', NULL, NULL, '2023-04-04 18:05:02', '2023-04-04 18:05:02'),
(25, 'App\\Models\\User', 1, 'Token', '859e84ac696ad31064e0087e24dc42faf41f8823a6bec0092999f849ccf7f36c', '[\"*\"]', NULL, NULL, '2023-04-04 18:22:37', '2023-04-04 18:22:37'),
(26, 'App\\Models\\User', 1, 'Token', '8a8cd0d05c4cfd503046aad3c8b01092e49ca7e5fce8a07be9fb58a003e18356', '[\"*\"]', NULL, NULL, '2023-04-04 18:35:00', '2023-04-04 18:35:00'),
(27, 'App\\Models\\User', 1, 'Token', '4a31e89a0b6408b8cdbdc12d3f348385015657eabd98572899cee25e1b113c00', '[\"*\"]', NULL, NULL, '2023-04-04 18:44:04', '2023-04-04 18:44:04'),
(28, 'App\\Models\\User', 1, 'Token', '6521fb2428ce1483092ab5efcf12a837b802fa79c8255170d85d615230ab42b4', '[\"*\"]', NULL, NULL, '2023-04-04 18:52:11', '2023-04-04 18:52:11'),
(29, 'App\\Models\\User', 1, 'Token', 'c0e59ee3420a630de3af36bab62cb047f99d975e6dc3dce660f7763aabc2b7a2', '[\"*\"]', NULL, NULL, '2023-04-04 19:11:45', '2023-04-04 19:11:45'),
(30, 'App\\Models\\User', 1, 'Token', 'b0b71a2fb2e2df420e7f215c1543b062c218d52ce5e7d3e6803f0e8c75d14676', '[\"*\"]', NULL, NULL, '2023-04-04 19:27:05', '2023-04-04 19:27:05'),
(31, 'App\\Models\\User', 1, 'Token', 'aba31f8c9327936609801339d116213159b5e740eee7ab589e41bf0a9bbde83a', '[\"*\"]', NULL, NULL, '2023-04-04 19:29:02', '2023-04-04 19:29:02'),
(32, 'App\\Models\\User', 1, 'Token', '19c4c7bec85e770f02c3cda1e93749cc006b07b2b89e21f43b59e1413acbe45e', '[\"*\"]', NULL, NULL, '2023-04-04 19:38:42', '2023-04-04 19:38:42'),
(33, 'App\\Models\\User', 1, 'Token', 'cec34ef9f1ead860590a5f56c7b1d7ccc7667f34e4f473dfa3b37c0d2153ff6d', '[\"*\"]', NULL, NULL, '2023-04-05 06:48:17', '2023-04-05 06:48:17'),
(34, 'App\\Models\\User', 1, 'Token', '4d51efe61f1bd1a33c1f4551419e4936def22dbd32d278daed2a1ca2265a5c4a', '[\"*\"]', '2023-04-05 06:49:18', NULL, '2023-04-05 06:48:58', '2023-04-05 06:49:18'),
(35, 'App\\Models\\User', 1, 'Token', 'ac70a6be1dbb8a7878177fd5ba4908c70f59f01e8f3f81d8068f0878921ec893', '[\"*\"]', '2023-04-05 06:56:03', NULL, '2023-04-05 06:54:51', '2023-04-05 06:56:03'),
(36, 'App\\Models\\Staff', 31, 'Token', '8e17d2a0d3fa16ea6b8861295735ae14c7ba7fe9138f096ec8865054c44e8560', '[\"*\"]', '2023-04-05 06:56:27', NULL, '2023-04-05 06:56:18', '2023-04-05 06:56:27'),
(37, 'App\\Models\\User', 1, 'Token', 'e6109abab56cdf95bca296ed294541e11c4b83b350cff72ca14bc409c56dcb2a', '[\"*\"]', '2023-04-05 07:18:19', NULL, '2023-04-05 06:56:43', '2023-04-05 07:18:19'),
(38, 'App\\Models\\Staff', 31, 'Token', 'c078187b8120953f8c88f00e38159b5de03204adb8f3c87171401ef9c440145b', '[\"*\"]', '2023-04-05 07:20:37', NULL, '2023-04-05 07:18:51', '2023-04-05 07:20:37'),
(39, 'App\\Models\\Staff', 16, 'Token', '7b0cc66182a75c902c311fe3fd5a1d0eb0ab55c1c8f9093a0483d184177953dc', '[\"*\"]', '2023-04-05 07:24:01', NULL, '2023-04-05 07:20:48', '2023-04-05 07:24:01'),
(40, 'App\\Models\\Staff', 31, 'Token', 'b6519ae4f626def64900c0c2d4cd631e289478f7e1435eefdfb26abcda683c20', '[\"*\"]', '2023-04-05 07:26:03', NULL, '2023-04-05 07:24:15', '2023-04-05 07:26:03'),
(41, 'App\\Models\\Staff', 30, 'Token', '1ebeb157dd94a9604f972c23f53b2e7fa85cf6dc3278775c36e4ded9b04a3827', '[\"*\"]', '2023-04-05 07:36:07', NULL, '2023-04-05 07:26:42', '2023-04-05 07:36:07'),
(42, 'App\\Models\\Staff', 29, 'Token', '44f70ce0c1c203112ea2f124ac6405cdea8d27104ab17a3c9a89b3a0102d5c62', '[\"*\"]', '2023-04-05 07:37:22', NULL, '2023-04-05 07:36:23', '2023-04-05 07:37:22'),
(43, 'App\\Models\\Staff', 28, 'Token', '65b5c2a0e5c77dd4d5de6f0016e88ee76d8718793ef328a1a7555a4d2f3fd7e3', '[\"*\"]', '2023-04-05 07:39:41', NULL, '2023-04-05 07:37:50', '2023-04-05 07:39:41'),
(44, 'App\\Models\\Staff', 18, 'Token', 'e73b09e8e19052c180ffefe66fb80c3919f9f0bdfa56b4ba522329cca5db8ae1', '[\"*\"]', '2023-04-05 07:40:51', NULL, '2023-04-05 07:40:10', '2023-04-05 07:40:51'),
(45, 'App\\Models\\Staff', 17, 'Token', '9f448d8fe3fc9c0bd77e05fa59349015058e2fafcf6c7f751d7081c38e9f7402', '[\"*\"]', '2023-04-05 07:41:36', NULL, '2023-04-05 07:41:02', '2023-04-05 07:41:36'),
(46, 'App\\Models\\Staff', 16, 'Token', 'b5a626f51cd5ba3df82a071d0c45d6d90c54d67a3646bb2da09315c96ed0d0eb', '[\"*\"]', '2023-04-05 07:42:19', NULL, '2023-04-05 07:41:48', '2023-04-05 07:42:19'),
(47, 'App\\Models\\Staff', 15, 'Token', '66945f368f280bc25c732e1a42e6ca41e7cba69d91b896a8d93f187981af755c', '[\"*\"]', '2023-04-05 07:42:43', NULL, '2023-04-05 07:42:29', '2023-04-05 07:42:43'),
(48, 'App\\Models\\Staff', 14, 'Token', 'd2abb46db3c06944573476fc372aa9eaed1787cf457b391b708d57825d50f213', '[\"*\"]', '2023-04-05 07:43:32', NULL, '2023-04-05 07:43:02', '2023-04-05 07:43:32'),
(49, 'App\\Models\\Staff', 13, 'Token', 'c13cd67426b2ea3c645e37f8f51a033659665ff553e4061fb37511e568e5aa04', '[\"*\"]', '2023-04-05 08:43:30', NULL, '2023-04-05 07:43:43', '2023-04-05 08:43:30'),
(50, 'App\\Models\\Staff', 9, 'Token', 'f691cf112d07422c165cb1ac8b156d9db6a80110beb0c3ff8e240aa07928e249', '[\"*\"]', '2023-04-05 08:50:36', NULL, '2023-04-05 08:09:58', '2023-04-05 08:50:36'),
(51, 'App\\Models\\Staff', 13, 'Token', 'f240027f4c5a694227c792feec6bd77bde2211aecf6ff39e60279074da615385', '[\"*\"]', '2023-04-05 09:44:37', NULL, '2023-04-05 08:46:57', '2023-04-05 09:44:37'),
(52, 'App\\Models\\Staff', 9, 'Token', '48c3f5a4123638e424f2868ff59117dbef74d753b5768f57f525e857a29136ae', '[\"*\"]', '2023-04-05 10:28:55', NULL, '2023-04-05 09:33:09', '2023-04-05 10:28:55'),
(53, 'App\\Models\\Staff', 13, 'Token', '1c866390b19e694f06fbcd8eb032567015417ed0d3e030e2705eb17b4a018953', '[\"*\"]', '2023-04-05 10:30:18', NULL, '2023-04-05 09:57:44', '2023-04-05 10:30:18'),
(54, 'App\\Models\\Staff', 13, 'Token', '9d8531e1b757628891ed2a201fe044ee33c4984fb28743fbb4840bfaa9d92c5e', '[\"*\"]', '2023-04-05 13:50:16', NULL, '2023-04-05 12:53:43', '2023-04-05 13:50:16'),
(55, 'App\\Models\\Staff', 9, 'Token', '3614df08d35d0bc14e91aabfb7ace2c1def2cf5d7204bc7fa7a33c406ff4aa7c', '[\"*\"]', '2023-04-05 13:56:52', NULL, '2023-04-05 12:59:32', '2023-04-05 13:56:52'),
(56, 'App\\Models\\User', 1, 'Token', '88dbad29f1814c7e10821b7e9088b82a66915c7b98bc92a0c5104fdbfdcf1f77', '[\"*\"]', '2023-04-05 14:07:01', NULL, '2023-04-05 13:35:51', '2023-04-05 14:07:01'),
(57, 'App\\Models\\Staff', 13, 'Token', 'ba79cace12e52bfe29f287c5edac646fd243fc50e2b562e59e7f3e70dbd8c13d', '[\"*\"]', '2023-04-05 14:53:59', NULL, '2023-04-05 13:55:12', '2023-04-05 14:53:59'),
(58, 'App\\Models\\Staff', 9, 'Token', 'a3c94afa3cdc38c821b1035a794140487dcf1221cc8763857163bd7073cfa08b', '[\"*\"]', '2023-04-05 15:25:04', NULL, '2023-04-05 14:28:07', '2023-04-05 15:25:04'),
(59, 'App\\Models\\Staff', 13, 'Token', '4b01226ca20a468eb8de9b571b11c641309dd80d5cd15e0393c9e171925ce943', '[\"*\"]', '2023-04-05 15:24:34', NULL, '2023-04-05 14:57:29', '2023-04-05 15:24:34'),
(60, 'App\\Models\\Staff', 9, 'Token', '054db7d2b5840f038aa62caf30a39a7de7240fc71144c19d48e9605a85d15400', '[\"*\"]', '2023-04-06 09:24:05', NULL, '2023-04-05 16:05:31', '2023-04-06 09:24:05'),
(61, 'App\\Models\\Staff', 6, 'Token', '16aac208d4ab13f35acbd3c2930b6fe762a998638436d6172d9818526fbf9512', '[\"*\"]', '2023-04-08 13:40:44', NULL, '2023-04-05 16:08:31', '2023-04-08 13:40:44'),
(62, 'App\\Models\\Staff', 5, 'Token', 'cad3e72221449552c4b13a915456c9c5752278d5eef8fb9ea94346c791e32f91', '[\"*\"]', '2023-04-07 10:37:35', NULL, '2023-04-07 07:03:21', '2023-04-07 10:37:35'),
(63, 'App\\Models\\User', 1, 'Token', 'f0ea5d7fa81f11f4f4a1a827cd0774e4a53494596668801cc560b90c5cbaf50c', '[\"*\"]', '2023-04-08 14:09:41', NULL, '2023-04-08 13:41:10', '2023-04-08 14:09:41'),
(64, 'App\\Models\\User', 1, 'Token', '8d32f0deb725410e1b6d8bef2853b2c1a5a37f82b5466ea1c3ef5fbc5fd79d90', '[\"*\"]', '2023-04-08 14:20:20', NULL, '2023-04-08 14:19:53', '2023-04-08 14:20:20'),
(65, 'App\\Models\\User', 1, 'Token', '338ca1988eb5b29c32f777fcbf7a52de09519a6123b15865fae6c415ba8a4f8d', '[\"*\"]', '2023-04-08 14:22:18', NULL, '2023-04-08 14:20:56', '2023-04-08 14:22:18'),
(66, 'App\\Models\\Staff', 31, 'Token', 'e8e66d4462538b49ce9c2e1cf7f132be646c8072bbb6bb688c20f479c01cd7e7', '[\"*\"]', '2023-04-08 17:26:11', NULL, '2023-04-08 14:23:25', '2023-04-08 17:26:11'),
(67, 'App\\Models\\Staff', 31, 'Token', '037b675cbd93dea0259d1ab0fdf2d1e250b12561777b23f4d8ae3c81ca39cb7f', '[\"*\"]', '2023-04-08 18:32:14', NULL, '2023-04-08 17:26:44', '2023-04-08 18:32:14'),
(68, 'App\\Models\\Staff', 30, 'Token', '65a6ab0320a66481a91921940440a3f60f0567bc9ca7c5be93e31998a2fa1728', '[\"*\"]', '2023-04-17 07:04:03', NULL, '2023-04-08 18:33:42', '2023-04-17 07:04:03'),
(69, 'App\\Models\\Staff', 17, 'Token', '4c82a03f01881bc9d832146acefc80377cf437658892156cfdd556c2eeef0751', '[\"*\"]', '2023-04-11 10:37:25', NULL, '2023-04-08 19:30:09', '2023-04-11 10:37:25'),
(70, 'App\\Models\\Staff', 17, 'Token', 'a59e3c01bc075eeb0716c93f55f0057312428601f9180dbd6cad5820009888af', '[\"*\"]', '2023-04-12 09:41:53', NULL, '2023-04-11 10:37:42', '2023-04-12 09:41:53'),
(71, 'App\\Models\\Staff', 17, 'Token', 'd034b0b90d49a88b7b8e725467dd1ecf2812f08a0fc7d2131561e0e525e2cc5d', '[\"*\"]', '2023-04-13 23:40:03', NULL, '2023-04-12 10:20:49', '2023-04-13 23:40:03'),
(72, 'App\\Models\\Staff', 17, 'Token', '0c867c45849ea077db99ed31f90fbc1b8d2aa59bf650d069157aec1c8da6d622', '[\"*\"]', '2023-04-17 05:53:17', NULL, '2023-04-14 06:50:22', '2023-04-17 05:53:17'),
(73, 'App\\Models\\Staff', 30, 'Token', 'ff86c420f9416e515effcc9d598ffbea6ee773fcc7ba499471c60ace6899e5ee', '[\"*\"]', '2023-04-17 06:56:30', NULL, '2023-04-17 06:49:57', '2023-04-17 06:56:30'),
(74, 'App\\Models\\Staff', 17, 'Token', '6c5eee9b1896a9f2edf0b400b658f380c53d3e2319b3e9dc0b53264e0460c7da', '[\"*\"]', '2023-04-17 07:05:30', NULL, '2023-04-17 06:56:40', '2023-04-17 07:05:30'),
(75, 'App\\Models\\Staff', 30, 'Token', 'de52416c6d4fa547613d359acbe53dfb353cf30889b702afbbe8acc01b374a0f', '[\"*\"]', '2023-04-20 14:57:07', NULL, '2023-04-17 07:05:00', '2023-04-20 14:57:07'),
(76, 'App\\Models\\Staff', 17, 'Token', '570a88788e5732aee46525ac69e4babfb29f8f5428c303aa9fc638ba02fcabf0', '[\"*\"]', '2023-04-17 07:21:06', NULL, '2023-04-17 07:05:49', '2023-04-17 07:21:06'),
(77, 'App\\Models\\Staff', 11, 'Token', '2cad3f0d4f475d00eeded1a7de5f56bffe0a3515d48b1221b9cb0f90d47b8a69', '[\"*\"]', '2023-04-20 09:08:11', NULL, '2023-04-17 07:21:16', '2023-04-20 09:08:11'),
(78, 'App\\Models\\Staff', 11, 'Token', '52d04249d6e47cbbf1762547a4d917cb0acd52355237d4b84ef20e1aebe134cb', '[\"*\"]', '2023-04-20 10:23:17', NULL, '2023-04-20 09:34:35', '2023-04-20 10:23:17'),
(79, 'App\\Models\\User', 1, 'Token', '8b8d15f233ca1db4a61f46277e2983ed251056fabe82ba6cf9a3f96f13343ccb', '[\"*\"]', '2023-05-15 08:09:57', NULL, '2023-05-15 08:03:35', '2023-05-15 08:09:57'),
(80, 'App\\Models\\Staff', 31, 'Token', '76cbbe229998ba3441f73d72a01ff6b0499f6f8044c2d5946704645cc464af0f', '[\"*\"]', '2023-05-15 08:12:08', NULL, '2023-05-15 08:10:17', '2023-05-15 08:12:08'),
(81, 'App\\Models\\Staff', 6, 'Token', '8905829f06b3567307061617053850eebcf1f9632497064bc08ee44ba855863b', '[\"*\"]', '2023-05-16 06:29:40', NULL, '2023-05-15 08:12:16', '2023-05-16 06:29:40'),
(82, 'App\\Models\\Staff', 13, 'Token', '22ed9b7e1c3e084d5a071ec2785678244da9e15fc6147abf70a94845ae2209f9', '[\"*\"]', '2023-05-15 09:15:49', NULL, '2023-05-15 08:13:51', '2023-05-15 09:15:49'),
(83, 'App\\Models\\Staff', 5, 'Token', '2073ae9d8082a350e90dff64c14359606c4b6856ce5a523e43f63f4abd9d8bd7', '[\"*\"]', '2023-05-15 09:34:45', NULL, '2023-05-15 09:16:43', '2023-05-15 09:34:45'),
(84, 'App\\Models\\Staff', 9, 'Token', '12c2812e21db27aa02f124f4b8d8240f72f78b25e8c9fbf7c0829589e4622181', '[\"*\"]', '2023-05-15 13:04:57', NULL, '2023-05-15 09:34:55', '2023-05-15 13:04:57'),
(85, 'App\\Models\\Staff', 31, 'Token', '1dc8ba1c10be0f64afd79a8f4b57475f4ca0db0bf0e67370b473f5961186391f', '[\"*\"]', '2023-05-15 15:49:37', NULL, '2023-05-15 13:05:31', '2023-05-15 15:49:37'),
(86, 'App\\Models\\Staff', 5, 'Token', '36058b547dc772e4b6856c14f136e941229b8a91bf8ad472bf6f89fc31db7dcf', '[\"*\"]', '2023-05-16 06:30:04', NULL, '2023-05-16 06:19:44', '2023-05-16 06:30:04'),
(87, 'App\\Models\\Staff', 31, 'Token', 'e2c180b36e7fc871ff477785e8fb3161883c3e75ca5c958a23debd254238d89f', '[\"*\"]', '2023-05-25 15:48:32', NULL, '2023-05-25 08:39:11', '2023-05-25 15:48:32'),
(88, 'App\\Models\\User', 1, 'Token', 'ab4162efc862781d6506b5cd87ed98177c75bf066b6406ba0a0ff5294079f4e0', '[\"*\"]', '2023-05-30 06:17:28', NULL, '2023-05-30 06:03:12', '2023-05-30 06:17:28'),
(89, 'App\\Models\\User', 2, 'Token', '1b09a185c10ac9277880db52fc2b1c39f562e2b12b1b0550166413dfdf6682de', '[\"*\"]', '2023-05-30 06:08:48', NULL, '2023-05-30 06:08:13', '2023-05-30 06:08:48'),
(90, 'App\\Models\\User', 1, 'Token', '10cfea86889b099600609c59fbf9d4cdc9792e8a49852566cbbbc837fa8817d5', '[\"*\"]', '2023-05-30 06:10:37', NULL, '2023-05-30 06:09:11', '2023-05-30 06:10:37'),
(91, 'App\\Models\\Staff', 31, 'Token', '2a3159c501bed413a2fa0daf0f8f1229e389ecdebf58335f2ff86b9a6e086ecb', '[\"*\"]', '2023-05-30 09:20:25', NULL, '2023-05-30 06:17:44', '2023-05-30 09:20:25'),
(92, 'App\\Models\\Staff', 6, 'Token', 'af11155dd6f6503b5cc59e871d30a3d1592b0da0fcf92769132301c7324d5740', '[\"*\"]', '2023-05-30 09:20:30', NULL, '2023-05-30 06:20:03', '2023-05-30 09:20:30'),
(93, 'App\\Models\\User', 1, 'Token', '0cb70665a24b5c4c0651212dd03d4541a3983ba2d36d50e1bd8dc67e98e5d3b2', '[\"*\"]', '2023-05-30 06:34:25', NULL, '2023-05-30 06:25:43', '2023-05-30 06:34:25'),
(94, 'App\\Models\\User', 1, 'Token', '8a65992fbd2cfba7fce07c6c7091b015ff92914847780bbb6a1c0f690729f6a3', '[\"*\"]', '2023-05-30 06:49:06', NULL, '2023-05-30 06:34:40', '2023-05-30 06:49:06'),
(95, 'App\\Models\\Staff', 30, 'Token', 'b7cfce266a8149641c93267be4ac15ce7008cdafc7d7f069939d50d3dd63243d', '[\"*\"]', '2023-05-30 06:49:55', NULL, '2023-05-30 06:49:21', '2023-05-30 06:49:55'),
(96, 'App\\Models\\User', 1, 'Token', '735bb58fdec7a7fcf315a34df6601eba7b4c50beefdcc444221f42cde45bd392', '[\"*\"]', '2023-05-30 13:32:39', NULL, '2023-05-30 06:50:11', '2023-05-30 13:32:39'),
(97, 'App\\Models\\Staff', 31, 'Token', '42050167cf820af230744cce8d87708e99393a5dad4fde015fe762e576dfb5a8', '[\"*\"]', '2023-05-31 06:37:49', NULL, '2023-05-30 09:20:49', '2023-05-31 06:37:49'),
(98, 'App\\Models\\Staff', 6, 'Token', '885d8229ce896d2a4235dff2d1c99f5975704da5e102e347e458fb9d16d6d655', '[\"*\"]', '2023-05-30 16:29:53', NULL, '2023-05-30 09:21:17', '2023-05-30 16:29:53'),
(99, 'App\\Models\\User', 1, 'Token', '88c00a3a54f2903286a994cda9c659939e5815f932f8c24b5fd6d27ed9159911', '[\"*\"]', '2023-05-30 13:35:46', NULL, '2023-05-30 13:33:10', '2023-05-30 13:35:46'),
(100, 'App\\Models\\User', 1, 'Token', 'f32fe7be757ac73e5ae56ea2ae61d148cb78345130b8c2e6985f976e703a6ff4', '[\"*\"]', '2023-05-30 13:46:39', NULL, '2023-05-30 13:36:35', '2023-05-30 13:46:39'),
(101, 'App\\Models\\User', 1, 'Token', '6c619fffd7342150f4ace90a270a85916345cd5649142f36046f19b36cb45f33', '[\"*\"]', '2023-05-30 17:32:05', NULL, '2023-05-30 13:50:17', '2023-05-30 17:32:05'),
(102, 'App\\Models\\User', 1, 'Token', '7206d6499ca34452c21ce8326c80dcbd2dbbce988716ff3d5c34e18f5bf61431', '[\"*\"]', '2023-06-01 03:10:48', NULL, '2023-05-31 07:10:42', '2023-06-01 03:10:48'),
(103, 'App\\Models\\User', 1, 'Token', '17e215d7c40100ca624bda8cc622b4d26a99d9de7a7546ed6ef44d9fde00860c', '[\"*\"]', '2023-06-15 15:58:42', NULL, '2023-06-15 15:57:37', '2023-06-15 15:58:42'),
(104, 'App\\Models\\User', 1, 'Token', '707d2afccbc6fcde84555944dcf9c409a7efe06c0a3076a7806bd74d597d230d', '[\"*\"]', '2023-07-04 07:54:30', NULL, '2023-07-04 07:07:50', '2023-07-04 07:54:30'),
(105, 'App\\Models\\User', 1, 'Token', '07fda5306308052c8f3019a65f81f8dec9c98ed11db81222165734625b91238a', '[\"*\"]', '2023-07-04 10:44:46', NULL, '2023-07-04 07:54:46', '2023-07-04 10:44:46'),
(106, 'App\\Models\\User', 1, 'Token', 'ef1740c33178547c547ce54ab63c6084ce9b73ee1e1bd33cb7007589a765a2e6', '[\"*\"]', '2023-07-04 08:50:08', NULL, '2023-07-04 07:56:45', '2023-07-04 08:50:08'),
(107, 'App\\Models\\User', 2, 'Token', 'b9a0c2587dfdc4d01e46e47e4708a90d6941e1c7a8082e22c2d325d5c5188a49', '[\"*\"]', '2023-07-04 08:52:01', NULL, '2023-07-04 08:50:28', '2023-07-04 08:52:01'),
(108, 'App\\Models\\User', 2, 'Token', '0942afb6efc8b1475241336874211bbc33262bfbf4acf5922eaea4007358318a', '[\"*\"]', '2023-07-04 08:55:14', NULL, '2023-07-04 08:54:03', '2023-07-04 08:55:14'),
(109, 'App\\Models\\User', 2, 'Token', '0d56b0759d449bf8ffa33b563e8c7826a31da1f05748997048dd4acabfb3fe48', '[\"*\"]', '2023-07-04 09:15:22', NULL, '2023-07-04 08:57:43', '2023-07-04 09:15:22'),
(110, 'App\\Models\\User', 2, 'Token', '4f3bfcf45f96389f918f0dcf0295996fd5630708cb008d5ed5cf063876a5843f', '[\"*\"]', '2023-07-04 09:22:35', NULL, '2023-07-04 09:15:38', '2023-07-04 09:22:35'),
(111, 'App\\Models\\User', 2, 'Token', '5c57dd18231ca7e0bd245abe1f6c02d2e1e4cd2ec6789b00f3b44ab01de6a76f', '[\"*\"]', '2023-07-04 09:30:30', NULL, '2023-07-04 09:23:03', '2023-07-04 09:30:30'),
(112, 'App\\Models\\User', 2, 'Token', '398f70cca98585e27c5d01a68fcd6a2b4eae79d21463d2903e1b6ee07119b4eb', '[\"*\"]', '2023-07-04 10:01:10', NULL, '2023-07-04 09:31:14', '2023-07-04 10:01:10'),
(113, 'App\\Models\\User', 2, 'Token', '304a9c37d8f63900441fe1a704d725cf22312bc5f5256e468631a0f0983ca8f0', '[\"*\"]', '2023-07-04 10:04:11', NULL, '2023-07-04 10:01:40', '2023-07-04 10:04:11'),
(114, 'App\\Models\\User', 2, 'Token', '8e68a7f08fc70aad23bf81c9a401daeb1381023d6ebf6b9e6e9eacb52cc765d8', '[\"*\"]', '2023-07-04 10:08:03', NULL, '2023-07-04 10:05:11', '2023-07-04 10:08:03'),
(115, 'App\\Models\\User', 2, 'Token', 'e54725389a4c0a949fe5ec99fdbb046c08d6e3440093f228b2a4ee98951d2324', '[\"*\"]', '2023-07-04 11:05:06', NULL, '2023-07-04 10:10:55', '2023-07-04 11:05:06'),
(116, 'App\\Models\\User', 2, 'Token', 'f3e387953e9a747247308d9dcd88123ae330065e4d34b85d8070068b6cf44a46', '[\"*\"]', '2023-07-04 11:09:50', NULL, '2023-07-04 11:08:52', '2023-07-04 11:09:50'),
(117, 'App\\Models\\User', 2, 'Token', '9078ea3936fd4c83b08ba5b3c655a003c68e05a07a3203abe23a8816a94f1380', '[\"*\"]', '2023-07-04 11:27:00', NULL, '2023-07-04 11:26:51', '2023-07-04 11:27:00'),
(118, 'App\\Models\\User', 2, 'Token', '583471e9fec8617a0c401a72d1aec48a7e3010d71541b372e8b95cec9c73ccf6', '[\"*\"]', '2023-07-04 11:28:38', NULL, '2023-07-04 11:28:31', '2023-07-04 11:28:38'),
(119, 'App\\Models\\User', 2, 'Token', '0a6af490e97066cda47a0a37ccdcf1f8693798e4db9b371d2854de41f8e377bf', '[\"*\"]', '2023-07-04 11:31:36', NULL, '2023-07-04 11:30:39', '2023-07-04 11:31:36'),
(120, 'App\\Models\\User', 2, 'Token', 'a7def6526ada34cce5e6410ef5e6dcd01c7ca0459ead2c73f9da5900bad2a0ce', '[\"*\"]', '2023-07-04 11:32:55', NULL, '2023-07-04 11:32:48', '2023-07-04 11:32:55'),
(121, 'App\\Models\\User', 2, 'Token', 'e30604f6bffa8bfbfe001657fdaf1aaf61bcdd4428a45f17cdc500a40e6c9706', '[\"*\"]', '2023-07-04 11:33:24', NULL, '2023-07-04 11:33:18', '2023-07-04 11:33:24');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 0, '2023-02-26 20:19:28', '2023-02-26 20:19:28'),
(2, 'Secretaire', 'web', 0, '2023-02-26 20:19:28', '2023-02-28 20:20:00'),
(3, 'Utilisateur', 'web', 0, '2023-02-26 20:19:28', '2023-02-26 20:19:28'),
(4, 'client', 'web', 0, '2023-02-28 15:38:48', '2023-02-28 20:20:08'),
(5, 'user', 'web', 0, '2023-03-01 07:15:20', '2023-03-01 07:15:20'),
(6, 'courtier', 'web', 0, '2023-03-01 15:39:26', '2023-03-01 15:39:26'),
(7, 'tresorier', 'staffs', 0, '2023-03-06 13:59:12', '2023-03-13 16:21:56'),
(8, 'manager', 'staffs', 0, '2023-03-06 14:44:37', '2023-03-06 15:40:13'),
(9, 'invite', 'staffs', 0, '2023-03-06 15:53:08', '2023-03-06 15:53:08'),
(10, 'livreur', 'staffs', 0, '2023-03-09 13:31:22', '2023-03-09 13:31:22'),
(11, 'ouvrier', 'staffs', 0, '2023-03-09 14:03:08', '2023-03-09 14:03:08'),
(12, 'elementaire', 'web', 0, '2023-03-13 09:36:11', '2023-03-13 09:36:11'),
(13, 'elementaire', 'staffs', 0, '2023-03-13 09:37:18', '2023-03-13 09:37:18'),
(14, 'master-1', 'web', 1, '2023-03-13 16:48:29', '2023-03-13 16:50:20'),
(15, 'master-1', 'staffs', 1, '2023-03-13 16:49:33', '2023-03-13 16:49:56'),
(16, 'major', '', 0, NULL, NULL),
(26, 'major-1', 'web', 0, '2023-03-16 15:43:46', '2023-03-16 15:43:46'),
(27, 'major-2', 'web', 0, '2023-03-16 15:44:20', '2023-03-16 15:44:20'),
(28, 'major-3', 'web', 0, '2023-03-16 15:45:07', '2023-03-16 15:45:07'),
(29, 'major-4', 'web', 0, '2023-03-16 15:47:31', '2023-03-16 15:47:31'),
(30, 'major-5', 'web', 0, '2023-03-16 15:48:59', '2023-03-16 15:48:59'),
(31, 'major-6', 'web', 0, '2023-03-16 15:51:02', '2023-03-16 15:51:02'),
(32, 'major-7', 'web', 0, '2023-03-16 15:55:22', '2023-03-16 15:55:22'),
(33, 'major-8', 'web', 0, '2023-03-16 15:57:50', '2023-03-16 15:57:50');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 12),
(1, 27),
(1, 31),
(2, 1),
(2, 14),
(2, 27),
(2, 28),
(3, 1),
(4, 1),
(4, 28),
(4, 32),
(5, 1),
(5, 12),
(6, 1),
(6, 14),
(7, 1),
(7, 30),
(8, 1),
(8, 30),
(8, 32),
(9, 1),
(9, 5),
(9, 6),
(9, 33),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 32),
(14, 1),
(14, 4),
(14, 5),
(14, 29),
(15, 1),
(15, 14),
(15, 29),
(16, 1),
(17, 1),
(17, 32),
(18, 1),
(18, 6),
(19, 1),
(19, 14),
(20, 1),
(21, 1),
(21, 32),
(22, 1),
(22, 12),
(22, 33),
(23, 1),
(24, 1),
(25, 1),
(25, 32),
(26, 1),
(26, 12),
(26, 33),
(27, 1),
(28, 1),
(29, 1),
(29, 32),
(30, 1),
(42, 9),
(42, 10),
(42, 15),
(47, 8),
(47, 10),
(47, 11),
(47, 15),
(48, 11),
(52, 8),
(52, 10),
(56, 8),
(56, 11),
(56, 15),
(63, 13),
(64, 7),
(64, 11),
(64, 13),
(65, 9),
(65, 10),
(66, 7),
(66, 8),
(67, 8),
(67, 9),
(68, 10),
(69, 11),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(94, 1),
(94, 2),
(94, 33),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(98, 32),
(99, 1),
(99, 2),
(99, 26),
(99, 33),
(100, 1),
(100, 26),
(101, 1),
(102, 1);

-- --------------------------------------------------------

--
-- Structure de la table `servers`
--

CREATE TABLE `servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_connexion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_expiration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprietaire_serveur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'serveur',
  `categorie_serveur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `servers`
--

INSERT INTO `servers` (`id`, `name`, `username`, `password`, `url_connexion`, `description`, `date_expiration`, `proprietaire_serveur`, `status`, `is_deleted`, `type`, `categorie_serveur_id`, `created_at`, `updated_at`) VALUES
(1, 'KFC', 'KFC_USER', '123456789', 'http://KFC.net', '<p>une description concernant kfc</p>', '2023-03-15', 'Bienheureux', 0, 0, 'serveur', 2, '2023-02-21 07:35:00', '2023-03-14 10:53:51'),
(2, 'GDG', 'GDG_USER', '123456789', 'http://gd', '<p>description sur GDG</p>', '2023-03-16', 'Maitre', 0, 0, 'serveur', 2, '2023-02-21 07:37:59', '2023-03-14 10:53:16'),
(3, 'TRU', 'TRU_US', '123456789', 'http://tru.com', '<p>Une description de TRU</p>', '2023-03-16', 'Ibn Batuta', 0, 0, 'serveur', 1, '2023-02-21 07:40:59', '2023-03-14 10:50:33'),
(4, 'SOS', 'SOS_USERS', '123456789', 'http://sos', '<p>description de sos&nbsp;</p>', '2023-03-16', 'Ibn Hawkal l', 0, 0, 'serveur', 1, '2023-02-21 07:45:41', '2023-03-14 11:17:33'),
(5, 'TUSKAN', 'TUSKAN_USER', '123456789', 'http://TUSKAN.net', '<p>Une breve description des TUSKAN !!!</p>', '2023-03-18', 'Ibn Kaldun', 0, 0, 'serveur', 1, '2023-02-28 15:30:19', '2023-03-14 10:49:17'),
(6, 'KFB D', 'KFC_user', '123456789', 'http://kfc.com', '<p>une description de kfc</p>', '2023-03-07', '', 1, 1, 'serveur', 2, '2023-03-01 07:07:38', '2023-03-01 07:08:09'),
(7, 'ODG', 'ODG_USER', '123456789', 'http://odg.com', '<p>description sur odg user</p>', '2023-03-17', 'ANKH', 0, 0, 'serveur', 2, '2023-03-01 08:48:01', '2023-03-14 10:46:25'),
(8, 'DG', 'DG_USER', '123456789', 'http://DG.MIL', '<p>Description a propos de DG</p>', '2023-03-15', 'Magloire', 0, 0, 'serveur', 1, '2023-03-02 06:36:49', '2023-03-14 10:44:02'),
(9, 'ANKH', 'ANKH-PEOPLE', '123456789', 'http://ANKH.COMMUNITY', '<p>Description a propos de ANKH COMMUNITY</p>', '2023-03-15', 'Lumière', 0, 0, 'serveur', 2, '2023-03-02 07:41:26', '2023-03-14 11:12:13'),
(10, 'sTep', 'tep_users', '123456789', 'http://tep.net', '<p>Tep description</p>', '2023-05-31', 'Fortune', 0, 0, 'serveur', 1, '2023-03-03 06:36:10', '2023-05-30 13:58:57'),
(11, 'Joy', 'joy_username', '123456789', 'http://joy.com', '<p>description a propos de joy</p>', '2023-03-09', '', 1, 1, 'serveur', 1, '2023-03-08 12:58:46', '2023-03-08 13:01:47'),
(12, 'girku', 'girku_users', '123456789', 'http://girku.net', '<p>Description de girku</p>', '2023-03-15', 'EBA', 0, 0, 'serveur', 2, '2023-03-14 09:59:07', '2023-03-14 09:59:07'),
(14, 'tome', 'tome users', '123456789', 'http://tome.com', '<p>description de tome</p>', '2023-03-15', 'EBA', 0, 0, 'serveur', 1, '2023-03-14 18:04:48', '2023-03-14 18:05:10'),
(15, 'JOI', 'jio', '123456789', 'http://joi.com', '<p>une breve description</p>', '2023-05-31', 'EBA', 0, 0, 'serveur', 2, '2023-05-30 12:41:13', '2023-05-30 12:41:13'),
(16, 'SOPOLO MIX', 'SOPOLO', '987456321', 'http://sopolo.com', '<p>Le serveur de SOPOLO</p>', '2023-05-31', 'EBA', 0, 0, 'serveur', 1, '2023-05-30 13:19:39', '2023-05-30 13:19:39');

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `type_staff_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id`, `nom`, `prenom`, `adresse`, `email`, `photo`, `departement_id`, `type_staff_id`, `is_deleted`, `password`, `checked`, `created_at`, `updated_at`) VALUES
(1, 'AGBEKOUDJI', 'Kodjo', 'sépérépé', 'agbekoudji@kodjo.com', '20230228103205.png', 1, 2, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-27 15:27:43', '2023-03-03 08:27:34'),
(2, 'AGBEKPONOU', 'Komlan', 'Bernard Kopé', 'agbekponou@komlan.com', '20230228103147.png', 2, 5, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-27 15:31:30', '2023-02-28 08:31:47'),
(3, 'Adebola', 'Folashade', 'Abé Okuta', 'adebola@folashade.com', '20230228103219.png', 2, 4, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-28 07:16:56', '2023-02-28 08:43:09'),
(4, 'Amiral', 'Livay', 'Toshiba', 'amiral@livay.com', '20230228103230.png', 5, 5, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-28 07:32:09', '2023-02-28 16:57:17'),
(5, 'Folake', 'Adeshina', 'Ego', 'folake@adeshina.com', '20230403175234.jpg', 4, 3, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-28 07:37:33', '2023-04-03 15:52:34'),
(6, 'Benty', 'Leya', 'Belifornia', 'bent@ley.com', '20230228105803.png', 4, 4, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-28 08:52:40', '2023-02-28 08:58:03'),
(7, 'giles', 'giles', 'Kiro', 'giles@giles.com', '20230228123222.png', 5, 3, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-02-28 10:32:22', '2023-02-28 10:32:22'),
(8, 'Ugozi', 'Chimé Amala', 'Ego', 'ugozi@chime.com', '20230303145927.jpg', 3, 2, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-01 05:07:20', '2023-03-03 12:59:27'),
(9, 'kodjo', 'vignon', 'Fidamé', 'Kodjo@Vignon.com', '20230403175537.jpg', 4, 3, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-01 07:13:01', '2023-04-03 15:55:37'),
(10, 'komlan', 'Afiade', 'Memeramé', 'afiwa@lonm.com', '20230301094809.png', 3, 2, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-01 07:48:09', '2023-03-08 13:37:02'),
(11, 'komlan', 'bebou Abebou', 'Mission TOVE', 'komlan@bebou.com', '20230303172051.png', 6, 4, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 07:39:57', '2023-03-03 08:13:50'),
(12, 'komlan', 'Bebou', 'Sogbossito', 'komlan@beboudedevi.com', '20230303172051.png', 1, 2, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 08:01:57', '2023-03-03 08:08:47'),
(13, 'Yembit', 'Hosse', 'ADKP', 'yembit@hosse.com', '20230303172720.png', 4, 5, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 08:08:19', '2023-03-03 15:27:20'),
(14, 'Yembit', 'Ayao', 'LEGBASSITO', 'yembit@jules.com', '20230308164812.jpg', 3, 3, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 08:40:16', '2023-03-08 14:48:13'),
(15, 'Koffi', 'Elolo', 'Camp Fir', 'koffi@elolo.com', '20230303173504.jpg', 7, 1, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 08:46:19', '2023-03-03 15:35:04'),
(16, 'koffi', 'Mawougnon', 'Occeanos', 'koffi@mawougnon.com', '20230303172051.png', 6, 8, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 09:12:04', '2023-03-03 15:20:51'),
(17, 'Koffi', 'Esse', 'Kopé', 'koffi@esse.com', '20230303171543.jpg', 6, 2, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-03 09:15:16', '2023-03-03 15:15:43'),
(18, 'jhon', 'bokencamp', 'Michigan-Dakota', 'jhon@bokencamp.com', '20230306101101.png', 5, 6, 0, '$2y$10$TFWvhLsHdqJHSm9IGdN3vOEYiLRH6BXrL8nkK6VV6wT7fE5quwLFO', 0, '2023-03-06 08:07:14', '2023-03-09 13:16:11'),
(28, 'jean', 'jean', 'Ketekrachi', 'jean@jean.com', '20230307082730.png', 7, 8, 0, '$2y$10$ZF6.sWj8gI7kXV3yjC4WnukHuiCYdDjHJEvbtM6NE4DdJatYFBTqS', 0, '2023-03-07 06:27:31', '2023-03-07 06:27:31'),
(29, 'ali', 'ali@', 'Legon', 'ali@ali.com', '20230307082917.png', 1, 4, 0, '$2y$10$v5GPi4OekD/bzPjNsFOkDedNq/oPKexlTxBmb4HB3f2fbYCoe.3zG', 0, '2023-03-07 06:29:17', '2023-03-07 06:29:17'),
(30, 'ola', 'ola', 'Ile', 'ola@ola.com', '20230307085745.png', 6, 5, 0, '$2y$10$G047Go86x8FQAtxFm3RaFOoL5n9LOD4S6MWjf5N.cFjkYryDCd0Ha', 0, '2023-03-07 06:57:45', '2023-03-07 06:57:45'),
(31, 'ayo', 'ayo', 'Ife', 'ayo@ayo.com', '20230307085834.png', 4, 4, 0, '$2y$10$NeWV85THsJM4S48JFwr1EOHMsMlEWoV.o7ESSZA4vLrVjrIsyMx1y', 0, '2023-03-07 06:58:34', '2023-03-07 06:58:34');

-- --------------------------------------------------------

--
-- Structure de la table `type_outils`
--

CREATE TABLE `type_outils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_outils`
--

INSERT INTO `type_outils` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'imprimante', '0', '2023-05-15 10:08:00', '2023-05-15 10:08:00'),
(2, 'scanner', '0', '2023-05-15 10:08:00', '2023-05-15 10:08:00'),
(3, 'agraffes', '0', '2023-05-30 16:13:19', '2023-05-30 16:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `type_staff`
--

CREATE TABLE `type_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_staff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_staff`
--

INSERT INTO `type_staff` (`id`, `type_staff`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'remote', 0, '2023-02-27 13:47:52', '2023-02-27 13:47:52'),
(2, 'missionnaires', 0, '2023-02-27 13:06:28', '2023-02-27 13:11:35'),
(3, 'junkies', 0, '2023-02-27 13:10:37', '2023-02-27 13:14:09'),
(4, 'yankees', 0, '2023-02-27 13:12:14', '2023-02-27 13:12:14'),
(5, 'techniciens', 0, '2023-02-27 13:13:19', '2023-02-28 15:35:26'),
(6, 'stagiaires', 0, '2023-03-01 06:57:49', '2023-03-01 08:03:13'),
(7, 'stagiaire', 0, '2023-03-01 06:58:20', '2023-03-01 06:58:20'),
(8, 'Particulier', 0, '2023-03-01 07:48:52', '2023-03-16 09:30:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$09HIq9uqVqnfwfgDl1k/u.7OGCKGAIKVIv9JBQXRFtVsESD53Naci', 0, NULL, '2023-02-26 20:19:27', '2023-02-26 20:19:27'),
(2, 'secretaire', 'secretaire@secretaire.com', NULL, '$2y$10$BNZ74R6WvWuJQo6isHhPgOueaCLPGE/xtt.oTocRmmGLdm5.4vw.i', 0, NULL, '2023-02-26 20:19:27', '2023-07-04 10:06:23'),
(3, 'utilisateur', 'utilisateur@utilisateur.com', NULL, '$2y$10$pnxYTuUSOPNi2R8EDP.0K.DvMihzoSf1EDIqYlMCPsmp.VYPhC8Te', 0, NULL, '2023-02-26 20:19:28', '2023-02-26 20:19:28'),
(4, 'Client', 'client@client.com', NULL, '$2y$10$fUpIzOXUQ2c1HYQbDwzWwe4HTqmqxgn70Enqjkr3zq4PRiTLhtjOS', 0, NULL, '2023-02-27 09:54:23', '2023-02-28 19:45:28'),
(5, 'Agent', 'agent@agent.com', NULL, '$2y$10$wUG0L3SiWzbxHuBV9jFQnupRMh/r68kTQHRdzYsSehzHtq0oDKEX.', 0, NULL, '2023-02-27 09:54:55', '2023-02-27 09:54:55'),
(6, 'Metronome', 'metronome@metronome.com', NULL, '$2y$10$jQm49bWPq3..ddkZlUGSx.H/Zh9Vu./KK7rzpTr986eVEywVJuk2.', 0, NULL, '2023-02-27 09:55:30', '2023-02-28 19:44:08'),
(7, 'Azize', 'azizsamani@Folashade.com', NULL, '$2y$10$befg8pTro.P7deusY22MWuE6HxAcbNouXgidpto9XQpbCGwadrYii', 0, NULL, '2023-02-28 15:28:07', '2023-02-28 19:45:18'),
(8, 'Ade', 'ade@ade.com', NULL, '$2y$10$KFEvrEKeeno4Ecvl1/RVnOCO0xlIgzqgUlPpPLvLyVzZehu0TN5mW', 0, NULL, '2023-03-01 07:16:40', '2023-03-03 09:07:14'),
(9, 'Afi', 'afi@afi.com', NULL, '$2y$10$dUKdx./KDBXkX3XvKVS7x.okKFHdcPU7hq0UoA1.dxFrbBnUEEY86', 0, NULL, '2023-03-01 07:18:07', '2023-03-03 09:06:57'),
(10, 'feikissob', 'feiki@sob.com', NULL, '$2y$10$M.zl/9bioDJmKrxNpyGyVejSAPfWH9yaM0jaVFEDAQjS6xaQH4j2a', 0, NULL, '2023-03-01 15:16:02', '2023-05-30 15:54:24'),
(11, 'feiki', 'feiki@feiki.com', NULL, '$2y$10$sV9FK2gkabBCsshwIyt5W.yKIu.GfDpXDkW3jPghbXYoAJ.bgLGp2', 0, NULL, '2023-03-03 08:58:58', '2023-03-03 09:00:39'),
(12, 'Adebayo', 'Adebayo@Ishola.com', NULL, '$2y$10$PoIgWZqjnuVH/oyyJIoxoeayWVWJP1uKqm5J3dZFrCqzziBVNh3Li', 0, NULL, '2023-03-17 08:42:44', '2023-03-17 08:42:44');

-- --------------------------------------------------------

--
-- Structure de la table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_permissions`
--
ALTER TABLE `categorie_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_serveurs`
--
ALTER TABLE `categorie_serveurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_user_id_foreign` (`user_id`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domaines_server_id_foreign` (`server_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_sent_to_id_foreign` (`sent_to_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `outils`
--
ALTER TABLE `outils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outils_type_outil_id_foreign` (`type_outil_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_categorie_permission_id_unique` (`name`,`guard_name`,`categorie_permission_id`),
  ADD KEY `permissions_categorie_permission_id_foreign` (`categorie_permission_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_serveur_id` (`categorie_serveur_id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`),
  ADD KEY `staff_departement_id_foreign` (`departement_id`),
  ADD KEY `staff_type_staff_id_foreign` (`type_staff_id`);

--
-- Index pour la table `type_outils`
--
ALTER TABLE `type_outils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_staff`
--
ALTER TABLE `type_staff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_permissions`
--
ALTER TABLE `categorie_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categorie_serveurs`
--
ALTER TABLE `categorie_serveurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `outils`
--
ALTER TABLE `outils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `type_outils`
--
ALTER TABLE `type_outils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_staff`
--
ALTER TABLE `type_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD CONSTRAINT `domaines_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `messages_sent_to_id_foreign` FOREIGN KEY (`sent_to_id`) REFERENCES `staff` (`id`);

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `outils_type_outil_id_foreign` FOREIGN KEY (`type_outil_id`) REFERENCES `type_outils` (`id`);

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_categorie_permission_id_foreign` FOREIGN KEY (`categorie_permission_id`) REFERENCES `categorie_permissions` (`id`);

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `staff_type_staff_id_foreign` FOREIGN KEY (`type_staff_id`) REFERENCES `type_staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
