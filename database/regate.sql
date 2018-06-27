-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 juin 2018 à 12:41
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
  `etape` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`regate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regate`
--

INSERT INTO `regate` (`regate_id`, `nom`, `date`, `club`, `ligue`, `jury`, `comiteDeCourse`, `securite`, `officierDeJour`, `etape`) VALUES
(1, 'Oui', '2018-06-26', 'Barcelone', 'Europa', 'Jean, guillaume', 'Pierre', 'Jean', 'CHarles', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
