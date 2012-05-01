-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 01 Mai 2012 à 13:48
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetweb`
--
CREATE DATABASE `projetweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetweb`;

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `num_album` int(7) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `genre` enum('Pop','Rock','Hard-Rock','Classique','RNB','Rap','Dub','Soul','Jazz') NOT NULL,
  `sortie` date NOT NULL,
  `popularite` int(6) NOT NULL,
  `nom_groupe` varchar(40) NOT NULL,
  PRIMARY KEY (`num_album`),
  KEY `cfk_nom_groupe_joue` (`nom_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`num_album`, `nom`, `genre`, `sortie`, `popularite`, `nom_groupe`) VALUES(1, 'The Resistance', 'Rock', '2009-01-01', 0, 'Muse');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `num_artiste` int(5) NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `anne_nais` date NOT NULL,
  `nom_groupe` varchar(40) NOT NULL,
  PRIMARY KEY (`num_artiste`),
  KEY `cfk_nom_groupe` (`nom_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `coup_coeur_musique`
--

CREATE TABLE IF NOT EXISTS `coup_coeur_musique` (
  `pseudo` varchar(40) NOT NULL,
  `num_musique` int(8) NOT NULL,
  PRIMARY KEY (`pseudo`,`num_musique`),
  KEY `cfk_nmusique_ccmus` (`num_musique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `nom_groupe` varchar(40) NOT NULL,
  `anne_crea` date NOT NULL,
  `anne_diso` date NOT NULL,
  PRIMARY KEY (`nom_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nom_groupe`, `anne_crea`, `anne_diso`) VALUES('Muse', '1997-01-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE IF NOT EXISTS `musique` (
  `num_musique` int(8) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `genre` enum('Pop','Rock','Hard-Rock','Classique','RNB','Rap','Dub','Soul','Jazz') NOT NULL,
  `popularite` int(6) NOT NULL,
  `duree` time NOT NULL,
  `num_album` int(7) NOT NULL,
  PRIMARY KEY (`num_musique`),
  KEY `cfk_nalbum` (`num_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`num_musique`, `titre`, `genre`, `popularite`, `duree`, `num_album`) VALUES(0, 'Guiding Light', 'Rock', 0, '04:13:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `pseudo` varchar(40) NOT NULL,
  `num_musique` int(8) NOT NULL,
  PRIMARY KEY (`pseudo`,`num_musique`),
  KEY `cfk_nmusique_panier` (`num_musique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `top_album`
--
CREATE TABLE IF NOT EXISTS `top_album` (
`nom` varchar(30)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `top_artiste`
--
CREATE TABLE IF NOT EXISTS `top_artiste` (
`nom_groupe` varchar(40)
,`popu_tot` decimal(33,0)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `top_musique`
--
CREATE TABLE IF NOT EXISTS `top_musique` (
`titre` varchar(40)
);
-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(40) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `mot_passe` varchar(8) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `nom`, `prenom`, `mot_passe`) VALUES('lolo', '', '', 'lolo');

-- --------------------------------------------------------

--
-- Structure de la vue `top_album`
--
DROP TABLE IF EXISTS `top_album`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lolo`@`localhost` SQL SECURITY DEFINER VIEW `top_album` AS select `album`.`nom` AS `nom` from `album` order by `album`.`popularite` desc limit 10;

-- --------------------------------------------------------

--
-- Structure de la vue `top_artiste`
--
DROP TABLE IF EXISTS `top_artiste`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lolo`@`localhost` SQL SECURITY DEFINER VIEW `top_artiste` AS select `g`.`nom_groupe` AS `nom_groupe`,sum((`a`.`popularite` + `m`.`popularite`)) AS `popu_tot` from ((`musique` `m` join `album` `a`) join `groupe` `g`) where ((`g`.`nom_groupe` = `a`.`nom_groupe`) and (`a`.`num_album` = `m`.`num_album`)) order by sum((`a`.`popularite` + `m`.`popularite`)) limit 10;

-- --------------------------------------------------------

--
-- Structure de la vue `top_musique`
--
DROP TABLE IF EXISTS `top_musique`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lolo`@`localhost` SQL SECURITY DEFINER VIEW `top_musique` AS select `musique`.`titre` AS `titre` from `musique` order by `musique`.`popularite` desc limit 10;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `cfk_nom_groupe_joue` FOREIGN KEY (`nom_groupe`) REFERENCES `groupe` (`nom_groupe`);

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `cfk_nom_groupe` FOREIGN KEY (`nom_groupe`) REFERENCES `groupe` (`nom_groupe`);

--
-- Contraintes pour la table `coup_coeur_musique`
--
ALTER TABLE `coup_coeur_musique`
  ADD CONSTRAINT `cfk_nmusique_ccmus` FOREIGN KEY (`num_musique`) REFERENCES `musique` (`num_musique`),
  ADD CONSTRAINT `cfk_pseudo_ccmus` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `cfk_nalbum` FOREIGN KEY (`num_album`) REFERENCES `album` (`num_album`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `cfk_nmusique_panier` FOREIGN KEY (`num_musique`) REFERENCES `musique` (`num_musique`),
  ADD CONSTRAINT `cfk_pseudo_panier` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
