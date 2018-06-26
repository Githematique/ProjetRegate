-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 juin 2018 à 14:46
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
  PRIMARY KEY (`bateau_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`bateau_id`, `serie`, `nom`, `numVoile`, `equipiers`) VALUES
(9, 'test', 'Qixin', 112, 'a:1:{i:0;s:19:\"Suliman Abdergadeir\";}'),
(10, 'Bonjour', 'Aurevoir', 1111, 'a:1:{i:1;s:10:\"Qixin Ying\";}');

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
  PRIMARY KEY (`equipier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipier`
--

INSERT INTO `equipier` (`equipier_id`, `nom`, `prenom`, `role`) VALUES
(4, 'Abdergadeir', 'Suliman', 'Voilier'),
(3, 'Verc', 'Clement', 'Capitaine'),
(5, 'Ying', 'Qixin', 'TEst');

-- --------------------------------------------------------

--
-- Structure de la table `regate`
--

DROP TABLE IF EXISTS `regate`;
CREATE TABLE IF NOT EXISTS `regate` (
  `regate_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `club` varchar(255) NOT NULL,
  `ligue` varchar(255) NOT NULL,
  `jury` varchar(255) NOT NULL,
  `comiteDeCourse` varchar(255) NOT NULL,
  `securite` varchar(255) NOT NULL,
  `officierDeJour` varchar(255) NOT NULL,
  `etape` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`regate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
