-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 déc. 2021 à 13:03
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
  `couleur` varchar(11) NOT NULL,
  `visibilite` int NOT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`id`, `titre`, `description`, `couleur`, `visibilite`, `userid`) VALUES
(2, 'Choses à faire à la Maison', NULL, 'green', 1, NULL),
(3, 'Choses à faire à l\'IUT', NULL, 'red', 1, NULL),
(4, 'course', 'liste de course mon reuf', 'green', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `titre`, `description`, `fait`, `dateFin`, `listeid`) VALUES
(3, 'Passer l\'aspirateur', 'Il faut faire le ménage ', 0, '2021-11-23 16:34:03', 2),
(5, 'Faire le PHP', 'Il faut se bouger le fiac !', 0, '2021-11-24 16:37:00', 3),
(7, 'Faire les recherches de stages', 'il faut trouver du travail', 0, '2021-11-30 16:37:00', 3),
(8, 'faire le php', 'je suis en train de faire le projet php', 0, '0000-00-00 00:00:00', 3),
(26, 'Commit', 'Commit des taches avec dates', 1, '2021-12-27 16:40:00', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
