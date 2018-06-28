-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 27 juin 2018 à 16:20
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `regate`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `bateau_id` int(11) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numVoile` int(11) NOT NULL,
  `equipiers` text,
  `coefficient` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`bateau_id`, `serie`, `nom`, `numVoile`, `equipiers`, `coefficient`) VALUES
(9, 'test', 'Qixin', 112, 'a:1:{i:4;s:19:\"Suliman Abdergadeir\";}', 0),
(13, 'dfdgc', 'tgfcgfdgh', 5659, 'a:1:{i:6;s:13:\"Macron Manuel\";}', 0),
(12, 'test', 'trrr', 65, 'a:0:{}', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bateauequipier`
--

CREATE TABLE `bateauequipier` (
  `bateau` int(10) UNSIGNED NOT NULL,
  `equipier` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipier`
--

CREATE TABLE `equipier` (
  `equipier_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `occupe` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipier`
--

INSERT INTO `equipier` (`equipier_id`, `nom`, `prenom`, `role`, `occupe`) VALUES
(4, 'Abdergadeir', 'Suliman', 'Voilier', 1),
(6, 'Manuel', 'Macron', 'TEst', 1),
(7, 'rersr', 'rererere', 'TEst', 0);

-- --------------------------------------------------------

--
-- Structure de la table `regate`
--

CREATE TABLE `regate` (
  `regate_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `club` varchar(255) NOT NULL,
  `ligue` varchar(255) NOT NULL,
  `jury` varchar(255) NOT NULL,
  `comiteDeCourse` varchar(255) NOT NULL,
  `securite` varchar(255) NOT NULL,
  `officierDeJour` varchar(255) NOT NULL,
  `etape` varchar(255) NOT NULL DEFAULT '0',
  `heure_dep` time DEFAULT NULL,
  `heure_arr` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regate`
--

INSERT INTO `regate` (`regate_id`, `nom`, `date`, `club`, `ligue`, `jury`, `comiteDeCourse`, `securite`, `officierDeJour`, `etape`, `heure_dep`, `heure_arr`) VALUES
(1, 'Oui', '2018-06-26', 'Barcelone', 'Europa', 'Jean, guillaume', 'Pierre', 'Jean', 'CHarles', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `regatebateau`
--

CREATE TABLE `regatebateau` (
  `regate` int(10) UNSIGNED NOT NULL,
  `bateau` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`bateau_id`);

--
-- Index pour la table `bateauequipier`
--
ALTER TABLE `bateauequipier`
  ADD PRIMARY KEY (`bateau`,`equipier`),
  ADD KEY `Constr_bateauEquipier_equipier_fk` (`equipier`);

--
-- Index pour la table `equipier`
--
ALTER TABLE `equipier`
  ADD PRIMARY KEY (`equipier_id`);

--
-- Index pour la table `regate`
--
ALTER TABLE `regate`
  ADD PRIMARY KEY (`regate_id`);

--
-- Index pour la table `regatebateau`
--
ALTER TABLE `regatebateau`
  ADD PRIMARY KEY (`regate`,`bateau`),
  ADD KEY `Constr_regateBateau_bateau_fk` (`bateau`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `bateau`
  MODIFY `bateau_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `equipier`
--
ALTER TABLE `equipier`
  MODIFY `equipier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `regate`
--
ALTER TABLE `regate`
  MODIFY `regate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;