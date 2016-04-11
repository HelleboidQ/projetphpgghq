-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2016 at 09:34 PM
-- Server version: 5.5.44-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gghq`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id`, `id_auteur`, `nom`, `description`) VALUES
(1, 1, 'Chris Terrio', 'Chris Terrio est un scénariste et réalisateur américain né le 31 décembre 1976. Il est le réalisateur du film Heights en 2005. Il a gagné l''Oscar du meilleur scénario adapté pour le film Argo de Ben Affleck.');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commande_detail`
--

CREATE TABLE IF NOT EXISTS `commande_detail` (
`id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `news` tinyint(2) NOT NULL COMMENT '1:produit - 2:news',
  `texte` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE IF NOT EXISTS `modele` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float(5,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`id`, `nom`, `id_produit`, `prix`) VALUES
(1, 'dématérialiser', 1, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `auteur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  `id_univers` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `slug`, `nom`, `auteur`, `date`, `contenu`, `id_univers`) VALUES
(1, 'news-test-jv', '1ère news JV', 7, '2016-04-11 15:13:05', 'Test d''une news Jeux Vidéo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE IF NOT EXISTS `news_image` (
`id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_image`
--

INSERT INTO `news_image` (`id`, `id_news`, `url`) VALUES
(1, 1, '/img/test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_univers` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lien_ws` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `visible` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `id_univers`, `titre`, `annee`, `id_auteur`, `type`, `lien_ws`, `stock`, `visible`) VALUES
(1, 'Batman vs Superman', 1, 'Batman vs Superman', 2016, 1, 'action, aventure', 'tt2975590', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produits_image`
--

CREATE TABLE IF NOT EXISTS `produits_image` (
`id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
`id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_promo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `similaire`
--

CREATE TABLE IF NOT EXISTS `similaire` (
`id` int(11) NOT NULL,
  `id_produit1` int(11) NOT NULL,
  `id_produit2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univers`
--

CREATE TABLE IF NOT EXISTS `univers` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univers`
--

INSERT INTO `univers` (`id`, `nom`) VALUES
(1, 'Films'),
(2, 'Séries'),
(3, 'Jeux Vidéo'),
(4, 'Musique'),
(5, 'BD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `admin` tinyint(2) DEFAULT '0',
  `actif` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `pass`, `admin`, `actif`) VALUES
(6, 'test6', 'test6', '$2y$10$w9U9R06jUhU4W/4p0IpEU.RNBaWhnvHc/sjuyJAWY4JeksXPLdJVK', 0, 1),
(7, 'admin', 'admin', '$2y$10$Yn3kc.DT4ASZHxMQVgGpiuuBJmuL09bUETn8Su5PgVza3.E.Zdgwi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_adresse`
--

CREATE TABLE IF NOT EXISTS `users_adresse` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `defaut` int(11) NOT NULL DEFAULT '0',
  `numero` int(11) NOT NULL,
  `cplt_numero` varchar(4) NOT NULL,
  `rue` varchar(150) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `facturation` tinyint(1) NOT NULL,
  `livraison` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_adresse`
--

INSERT INTO `users_adresse` (`id`, `id_users`, `defaut`, `numero`, `cplt_numero`, `rue`, `cp`, `ville`, `facturation`, `livraison`) VALUES
(3, 7, 0, 16, 'TER', 'Route de Mers', '76260', 'Eu', 1, 1),
(5, 7, 0, 25, 'BIS', 'Rue de test', '80000', 'AMIENS', 0, 0),
(6, 7, 0, 22, 'TER', 'test', '80000', 'Amiens', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `commande_detail`
--
ALTER TABLE `commande_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `id_commande` (`id_commande`), ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produit` (`id_produit`), ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits_image`
--
ALTER TABLE `produits_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `similaire`
--
ALTER TABLE `similaire`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produit1` (`id_produit1`), ADD KEY `id_produit2` (`id_produit2`);

--
-- Indexes for table `univers`
--
ALTER TABLE `univers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pseudo_2` (`pseudo`), ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `users_adresse`
--
ALTER TABLE `users_adresse`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`), ADD KEY `facturation` (`facturation`), ADD KEY `livraison` (`livraison`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commande_detail`
--
ALTER TABLE `commande_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_image`
--
ALTER TABLE `news_image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produits_image`
--
ALTER TABLE `produits_image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `similaire`
--
ALTER TABLE `similaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univers`
--
ALTER TABLE `univers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_adresse`
--
ALTER TABLE `users_adresse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
