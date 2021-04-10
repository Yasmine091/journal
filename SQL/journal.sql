-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 10 avr. 2021 à 15:53
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `journal`
--

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

CREATE TABLE `records` (
  `id` int NOT NULL,
  `month` int NOT NULL,
  `week` int NOT NULL,
  `day` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feelings` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tech` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `next` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `todo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `problems` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solutions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resources` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `records`
--

INSERT INTO `records` (`id`, `month`, `week`, `day`, `feelings`, `mission`, `tech`, `next`, `todo`, `done`, `problems`, `solutions`, `resources`) VALUES
(1, 1, 1, 'Vendredi', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `ip`) VALUES
(1, 'Kuki', 'contact@crealivity.eu', '$2y$10$4WzhWYvU2A8JgEkdGj0eLel9SQnCnpIBsGA587LMaLSXrKQ/PEPFK', '176.180.86.109');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `records`
--
ALTER TABLE `records`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
