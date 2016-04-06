-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Avril 2016 à 20:28
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gghq`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande_detail`
--

DROP TABLE IF EXISTS `commande_detail`;
CREATE TABLE IF NOT EXISTS `commande_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `news` tinyint(2) NOT NULL COMMENT '1:produit - 2:news',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_univers` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lien_ws` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `dateDebut` timestamp NOT NULL,
  `dateFin` timestamp NOT NULL,
  `id_promo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `similaire`
--

DROP TABLE IF EXISTS `similaire`;
CREATE TABLE IF NOT EXISTS `similaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit1` int(11) NOT NULL,
  `id_produit2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit1` (`id_produit1`),
  KEY `id_produit2` (`id_produit2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

DROP TABLE IF EXISTS `univers`;
CREATE TABLE IF NOT EXISTS `univers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `admin` tinyint(2) DEFAULT '0',
  `actif` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_2` (`pseudo`),
  KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users_adresse`
--

DROP TABLE IF EXISTS `users_adresse`;
CREATE TABLE IF NOT EXISTS `users_adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `cplt_numero` varchar(4) NOT NULL,
  `rue` varchar(150) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `facturation` tinyint(1) NOT NULL,
  `livraison` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  KEY `facturation` (`facturation`),
  KEY `livraison` (`livraison`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
