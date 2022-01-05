-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 14:41
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `toutdouxliste`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(80) DEFAULT NULL,
  `visibilite` int NOT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`id`, `titre`, `description`, `visibilite`, `userid`) VALUES
(41, 'Liste de course', 'Simple liste de course', 1, NULL),
(42, 'Ménage', 'Le ménage à faire à la maison.', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `fait` tinyint(1) NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `listeid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `titre`, `description`, `fait`, `dateFin`, `listeid`) VALUES
(61, 'Acheter du pain', '', 0, '2022-01-10 15:30:00', 41),
(62, 'Aller à la boucherie', 'Acheter du jambon', 1, '0000-00-00 00:00:00', 41),
(63, 'Passer aspirateur', '', 1, '0000-00-00 00:00:00', 42),
(64, 'Faire les fenêtres', '', 0, '0000-00-00 00:00:00', 42);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
