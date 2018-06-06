-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 juin 2018 à 12:03
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
  PRIMARY KEY (`bateau_id`)
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`regate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bateauEquipier`;
CREATE TABLE IF NOT EXISTS `bateauEquipier` (
    `bateau` INT UNSIGNED NOT NULL,
    `equipier` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`bateau`, `equipier`),
    CONSTRAINT `Constr_bateauEquipier_bateau_fk`
        FOREIGN KEY `bateau_fk` (`bateau`) REFERENCES `bateau` (`bateau_id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Constr_bateauEquipier_equipier_fk`
        FOREIGN KEY `equipier_fk` (`equipier`) REFERENCES `equipier` (`equipier_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `regateBateau`;
CREATE TABLE IF NOT EXISTS `regateBateau` (
    `regate` INT UNSIGNED NOT NULL,
    `bateau` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`regate`, `bateau`),
    CONSTRAINT `Constr_regateBateau_regate_fk`
        FOREIGN KEY `regate_fk` (`regate`) REFERENCES `regate` (`regate_id`)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Constr_regateBateau_bateau_fk`
        FOREIGN KEY `bateau_fk` (`bateau`) REFERENCES `bateau` (`bateau_id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
