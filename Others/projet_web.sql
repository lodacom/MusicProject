-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 28 Avril 2012 à 14:12
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
-- Base de données: 'projetweb'
--
CREATE DATABASE projetweb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE projetweb;

-- --------------------------------------------------------

--
-- Structure de la table 'album'
--

CREATE TABLE IF NOT EXISTS album (
  num_album int(7) NOT NULL AUTO_INCREMENT,
  nom varchar(30) NOT NULL,
  genre enum('Pop','Rock','Hard-Rock','Classique','RNB','Rap','Dub','Soul','Jazz') NOT NULL,
  sortie datetime NOT NULL,
  popularite int(6) NOT NULL,
  nom_groupe varchar(40) NOT NULL,
  PRIMARY KEY (num_album),
  KEY cfk_nom_groupe_joue (nom_groupe)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'artiste'
--

CREATE TABLE IF NOT EXISTS artiste (
  num_artiste int(5) NOT NULL AUTO_INCREMENT,
  nom_artiste varchar(30) NOT NULL,
  prenom varchar(30) NOT NULL,
  anne_nais date NOT NULL,
  nom_groupe varchar(40) NOT NULL,
  PRIMARY KEY (num_artiste),
  KEY cfk_nom_groupe (nom_groupe)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'coup_coeur_album'
--

CREATE TABLE IF NOT EXISTS coup_coeur_album (
  pseudo varchar(40) NOT NULL,
  num_album int(7) NOT NULL,
  PRIMARY KEY (pseudo,num_album),
  KEY cfk_nalbum_ccalb (num_album)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'coup_coeur_artiste'
--

CREATE TABLE IF NOT EXISTS coup_coeur_artiste (
  pseudo varchar(40) NOT NULL,
  num_artiste int(5) NOT NULL,
  PRIMARY KEY (pseudo,num_artiste),
  KEY cfk_nartiste_ccart (num_artiste)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'coup_coeur_musique'
--

CREATE TABLE IF NOT EXISTS coup_coeur_musique (
  pseudo varchar(40) NOT NULL,
  num_musique int(8) NOT NULL,
  PRIMARY KEY (pseudo,num_musique),
  KEY cfk_nmusique_ccmus (num_musique)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'groupe'
--

CREATE TABLE IF NOT EXISTS groupe (
  nom_groupe varchar(40) NOT NULL,
  anne_crea date NOT NULL,
  anne_diso date NOT NULL,
  PRIMARY KEY (nom_groupe)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'musique'
--

CREATE TABLE IF NOT EXISTS musique (
  num_musique int(8) NOT NULL,
  titre varchar(40) NOT NULL,
  genre enum('Pop','Rock','Hard-Rock','Classique','RNB','Rap','Dub','Soul','Jazz') NOT NULL,
  popularite int(6) NOT NULL,
  duree time NOT NULL,
  num_album int(7) NOT NULL,
  PRIMARY KEY (num_musique),
  KEY cfk_nalbum (num_album)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'panier'
--

CREATE TABLE IF NOT EXISTS panier (
  pseudo varchar(40) NOT NULL,
  num_musique int(8) NOT NULL,
  PRIMARY KEY (pseudo,num_musique),
  KEY cfk_nmusique_panier (num_musique)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'utilisateur'
--

CREATE TABLE IF NOT EXISTS utilisateur (
  pseudo varchar(40) NOT NULL,
  nom varchar(30) DEFAULT NULL,
  prenom varchar(30) DEFAULT NULL,
  mot_passe varchar(8) NOT NULL,
  PRIMARY KEY (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT cfk_nom_groupe_joue FOREIGN KEY (nom_groupe) REFERENCES `groupe` (nom_groupe);

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT cfk_nom_groupe FOREIGN KEY (nom_groupe) REFERENCES `groupe` (nom_groupe);

--
-- Contraintes pour la table `coup_coeur_album`
--
ALTER TABLE `coup_coeur_album`
  ADD CONSTRAINT cfk_nalbum_ccalb FOREIGN KEY (num_album) REFERENCES album (num_album),
  ADD CONSTRAINT cfk_pseudo_ccalb FOREIGN KEY (pseudo) REFERENCES utilisateur (pseudo);

--
-- Contraintes pour la table `coup_coeur_artiste`
--
ALTER TABLE `coup_coeur_artiste`
  ADD CONSTRAINT cfk_nartiste_ccart FOREIGN KEY (num_artiste) REFERENCES artiste (num_artiste),
  ADD CONSTRAINT cfk_pseudo_ccart FOREIGN KEY (pseudo) REFERENCES utilisateur (pseudo);

--
-- Contraintes pour la table `coup_coeur_musique`
--
ALTER TABLE `coup_coeur_musique`
  ADD CONSTRAINT cfk_nmusique_ccmus FOREIGN KEY (num_musique) REFERENCES musique (num_musique),
  ADD CONSTRAINT cfk_pseudo_ccmus FOREIGN KEY (pseudo) REFERENCES utilisateur (pseudo);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT cfk_nalbum FOREIGN KEY (num_album) REFERENCES album (num_album);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT cfk_nmusique_panier FOREIGN KEY (num_musique) REFERENCES musique (num_musique),
  ADD CONSTRAINT cfk_pseudo_panier FOREIGN KEY (pseudo) REFERENCES utilisateur (pseudo);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
