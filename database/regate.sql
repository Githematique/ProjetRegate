-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 juil. 2018 à 22:44
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `regate`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `bateau_id` int(11) NOT NULL AUTO_INCREMENT,
  `serie` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numVoile` int(11) NOT NULL,
  `equipiers` text,
  `coefficient` float NOT NULL DEFAULT '1',
  `temps` time DEFAULT NULL,
  `totalSeconds` float DEFAULT NULL,
  PRIMARY KEY (`bateau_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`bateau_id`, `serie`, `nom`, `numVoile`, `equipiers`, `coefficient`, `temps`, `totalSeconds`) VALUES
(20, 'Type 3', 'Paul', 11, 'a:1:{i:11;s:11:\"Chris chris\";}', 0.9, NULL, NULL),
(19, 'Type', 'Didier', 53, NULL, 1.11, NULL, NULL),
(17, 'Type 3', 'Pogba', 25, 'a:0:{}', 0.9, NULL, NULL),
(18, 'Test 2', 'Neymar', 126, 'a:1:{i:10;s:9:\"Paul paul\";}', 1.7, NULL, NULL),
(21, 'Serie 1', 'Jean', 222, 'a:3:{i:12;s:10:\"Qixin YING\";i:9;s:9:\"Jean Jean\";i:13;s:9:\"Test Test\";}', 1.2, '01:12:06', 4326);

-- --------------------------------------------------------

--
-- Structure de la table `bateauequipier`
--

DROP TABLE IF EXISTS `bateauequipier`;
CREATE TABLE IF NOT EXISTS `bateauequipier` (
  `bateau` int(10) UNSIGNED NOT NULL,
  `equipier` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`bateau`,`equipier`),
  KEY `Constr_bateauEquipier_equipier_fk` (`equipier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipier`
--

DROP TABLE IF EXISTS `equipier`;
CREATE TABLE IF NOT EXISTS `equipier` (
  `equipier_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `id_bateau` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`equipier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipier`
--

INSERT INTO `equipier` (`equipier_id`, `nom`, `prenom`, `role`, `id_bateau`) VALUES
(9, 'Jean', 'Jean', 'Capitaine', 21),
(11, 'Chris', 'chris', 'Capitaine', 20),
(10, 'Paul', 'paul', 'Voilier', 18),
(12, 'Qixin', 'YING', 'Capitaine', 21),
(13, 'Test', 'Test', 'Voilier', 21);

-- --------------------------------------------------------

--
-- Structure de la table `regate`
--

DROP TABLE IF EXISTS `regate`;
CREATE TABLE IF NOT EXISTS `regate` (
  `regate_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `club` varchar(255) DEFAULT NULL,
  `ligue` varchar(255) DEFAULT NULL,
  `jury` varchar(255) DEFAULT NULL,
  `comiteDeCourse` varchar(255) DEFAULT NULL,
  `securite` varchar(255) DEFAULT NULL,
  `officierDeJour` varchar(255) DEFAULT NULL,
  `etape` varchar(255) NOT NULL DEFAULT '0',
  `heure_dep` datetime DEFAULT NULL,
  `heure_arr` datetime DEFAULT NULL,
  `bateaux` text NOT NULL,
  PRIMARY KEY (`regate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regate`
--

INSERT INTO `regate` (`regate_id`, `nom`, `date`, `club`, `ligue`, `jury`, `comiteDeCourse`, `securite`, `officierDeJour`, `etape`, `heure_dep`, `heure_arr`, `bateaux`) VALUES
(1, 'Oui', '2018-06-26', 'Barcelone', 'Europa', 'Jean, guillaume', 'Pierre', NULL, 'CHarles', 'terminee', '2018-06-29 15:00:33', '2018-06-29 16:00:38', 'a:5:{i:0;s:2:\"20\";i:1;s:2:\"19\";i:2;s:2:\"21\";i:3;i:17;i:4;i:18;}');

-- --------------------------------------------------------

--
-- Structure de la table `regatebateau`
--

DROP TABLE IF EXISTS `regatebateau`;
CREATE TABLE IF NOT EXISTS `regatebateau` (
  `regate` int(10) UNSIGNED NOT NULL,
  `bateau` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`regate`,`bateau`),
  KEY `Constr_regateBateau_bateau_fk` (`bateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `seriebateau`
--

DROP TABLE IF EXISTS `seriebateau`;
CREATE TABLE IF NOT EXISTS `seriebateau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `coeff` float NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seriebateau`
--

INSERT INTO `seriebateau` (`id`, `type`, `coeff`) VALUES
(5, 'Jolie morgane', 1.5),
(6, 'Test 2', 1.7),
(7, 'Type 3', 0.9),
(8, 'Type', 1.11),
(9, 'Serie 1', 1.2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
