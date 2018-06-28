-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 28 juin 2018 à 22:18
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
  PRIMARY KEY (`bateau_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`bateau_id`, `serie`, `nom`, `numVoile`, `equipiers`, `coefficient`) VALUES
(9, '', 'Qixin', 112, 'a:0:{}', 1),
(13, '', 'tgfcgfdgh', 5659, '', 1),
(12, '', 'trrr', 65, 'a:0:{}', 1),
(14, '', 'Morgane', 123, 'a:0:{}', 1),
(16, '', 'XlmTEST', 44, 'a:0:{}', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipier`
--

INSERT INTO `equipier` (`equipier_id`, `nom`, `prenom`, `role`, `id_bateau`) VALUES
(4, 'Abdergadeir', 'Suliman', 'Voilier', 0);

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
  `heure_dep` time DEFAULT NULL,
  `heure_arr` time DEFAULT NULL,
  `bateaux` text NOT NULL,
  PRIMARY KEY (`regate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regate`
--

INSERT INTO `regate` (`regate_id`, `nom`, `date`, `club`, `ligue`, `jury`, `comiteDeCourse`, `securite`, `officierDeJour`, `etape`, `heure_dep`, `heure_arr`, `bateaux`) VALUES
(1, 'Oui', '2018-06-26', 'Barcelone', 'Europa', 'Jean, guillaume', 'Pierre', NULL, 'CHarles', '0', NULL, NULL, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
