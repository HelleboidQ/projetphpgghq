-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 19 Mars 2016 à 11:19
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gghq`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_detail`
--

CREATE TABLE IF NOT EXISTS `commande_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

CREATE TABLE IF NOT EXISTS `univers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `univers`
--

INSERT INTO `univers` (`id`, `nom`) VALUES
(1, 'Films'),
(2, 'Séries'),
(3, 'Jeux Vidéo'),
(4, 'Musique'),
(5, 'BD');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users_adresse`
--

CREATE TABLE IF NOT EXISTS `users_adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `facturation` tinyint(1) NOT NULL,
  `livraison` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`),
  KEY `facturation` (`facturation`),
  KEY `livraison` (`livraison`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
