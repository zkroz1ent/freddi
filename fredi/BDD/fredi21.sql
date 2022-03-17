-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 sep. 2021 à 21:07
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fredi21`
--
CREATE DATABASE IF NOT EXISTS `fredi21` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi21`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `nr_licence` varchar(50) DEFAULT NULL,
  `adr1` varchar(50) DEFAULT NULL,
  `adr2` varchar(50) DEFAULT NULL,
  `adr3` varchar(50) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `lib_club` varchar(50) DEFAULT NULL,
  `adr1` varchar(50) DEFAULT NULL,
  `adr2` varchar(50) DEFAULT NULL,
  `adr3` varchar(50) DEFAULT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE `ligne` (
  `id_ligne` int(11) NOT NULL,
  `dat_ligne` date DEFAULT NULL,
  `lib_trajet` varchar(50) DEFAULT NULL,
  `nb_km` int(11) DEFAULT NULL,
  `mt_km` decimal(15,2) DEFAULT NULL,
  `mt_peage` decimal(15,2) DEFAULT NULL,
  `mt_repas` decimal(15,2) DEFAULT NULL,
  `mt_hebergement` decimal(15,2) DEFAULT NULL,
  `mt_total` decimal(15,2) DEFAULT NULL,
  `id_motif` int(11) NOT NULL,
  `id_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `lib_ligue` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE `motif` (
  `id_motif` int(11) NOT NULL,
  `lib_motif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `est_valide` tinyint(1) DEFAULT NULL,
  `mt_total` decimal(15,2) DEFAULT NULL,
  `dat_remise` date DEFAULT NULL,
  `nr_ordre` int(11) DEFAULT NULL,
  `id_periode` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `lib_periode` varchar(50) DEFAULT NULL,
  `est_active` tinyint(1) NOT NULL DEFAULT 0,
  `mt_km` decimal(8,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `role` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD KEY `fk_id_utilisateur2` (`id_utilisateur`),
  ADD KEY `fk_id_club` (`id_club`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `fk_id_ligue` (`id_ligue`);

--
-- Index pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`id_ligne`),
  ADD KEY `fk_id_motif` (`id_motif`),
  ADD KEY `fk_id_note` (`id_note`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id_motif`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `fk_id_periode` (`id_periode`),
  ADD KEY `fk_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id_motif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `fk_id_club` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`),
  ADD CONSTRAINT `fk_id_utilisateur2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `fk_id_ligue` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

--
-- Contraintes pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD CONSTRAINT `fk_id_motif` FOREIGN KEY (`id_motif`) REFERENCES `motif` (`id_motif`),
  ADD CONSTRAINT `fk_id_note` FOREIGN KEY (`id_note`) REFERENCES `note` (`id_note`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_id_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`),
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

INSERT INTO ligue (id_ligue, lib_ligue) VALUES ('1', 'Ligue de Judo Auvergne-Rhône-Alpes'), ('2', 'Ligue de footbal de Haute-Garonne'), ('3', 'Ligue de footbal Aquitaine'), ('4', 'Ligue de tennis de Corse du Sud'), ('5', 'Ligue équitation du Var'), ('6', 'Ligue de natation du Quercy');


INSERT INTO motif(id_motif, lib_motif) VALUES ('1', 'Réunion'), ('2', 'Compétition régionale'), ('3', 'Compétition nationale'), ('4', 'Compétition internationnale'), ('5', 'Stage'), ('6', 'Visite médicale'), ('7', 'Oxygénation'), ('8', 'Convocation'), ('9', 'Formation');

INSERT INTO club (id_club, lib_club, adr1, adr2,adr3, id_ligue )  VALUES 
('1','Dojo Burgien','1 rue du Docteur DUBY','01000','BOURG EN BRESSE','1'),
('2','Saint-Denis Dojo','239 Allées des sports','1000','ST DENIS LES BOURG','1'),
('3','Judo Club Vallée Arbent','rue du Général ANDREA','1100','ARBENT','1'),
('4','Belli Judo','1 rue du Bac','1100','BELLIGNAT','1'),
('5','Racing Club Montluel Judo','170 rue des Chartinières','1120','DAGNEUX','1'),
('6','Centre Arts Martiaux Pondinois','rue de l\'Oiselon','1160','PONT D AIN','1'),
('7','Judo Club Ornex','58 rue des Pralets','1210','ORNEX','1'),
('8','Dojo Gessien Valserine','Avenue des Voirons','1220','DIVONNE LES BAINS','1'),
('9','Dojo La Vallière','Complexe Sportif','1250','MONTAGNAT','1'),
('10','Football club Merville','Rue Emile Pouvillon','31330','MERVILLE','2'),
('11','Football Club Bassin d\'Arcachon','Boulevard Mestrezat - Stade jean Brousse','33120','ARCACHON','3'),
('12','Andernos Sport Football Club','Plaine des Sports Jacques Rosazza','33510','ANDERNOS LES BAINS','3');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;