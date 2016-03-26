-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 26 Mars 2016 à 10:29
-- Version du serveur :  5.6.28-0ubuntu0.15.04.1
-- Version de PHP :  5.6.4-4ubuntu6.4

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
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande_detail`
--

CREATE TABLE IF NOT EXISTS `commande_detail` (
`id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `news` tinyint(2) NOT NULL COMMENT '1:produit - 2:news'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE IF NOT EXISTS `modele` (
`id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
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
  `stock` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
`id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `dateDebut` timestamp NOT NULL,
  `dateFin` timestamp NOT NULL,
  `id_promo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `similaire`
--

CREATE TABLE IF NOT EXISTS `similaire` (
`id` int(11) NOT NULL,
  `id_produit1` int(11) NOT NULL,
  `id_produit2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

CREATE TABLE IF NOT EXISTS `univers` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
`id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `admin` tinyint(2) DEFAULT '0',
  `actif` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `pass`, `admin`, `actif`) VALUES
(6, 'test6', 'test6', '$2y$10$w9U9R06jUhU4W/4p0IpEU.RNBaWhnvHc/sjuyJAWY4JeksXPLdJVK', 0, 1),
(7, 'admin', 'admin', '$2y$10$Yn3kc.DT4ASZHxMQVgGpiuuBJmuL09bUETn8Su5PgVza3.E.Zdgwi', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_adresse`
--

CREATE TABLE IF NOT EXISTS `users_adresse` (
`id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `facturation` tinyint(1) NOT NULL,
  `livraison` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `commande_detail`
--
ALTER TABLE `commande_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `id_commande` (`id_commande`), ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produit` (`id_produit`), ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promo`
--
ALTER TABLE `promo`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `similaire`
--
ALTER TABLE `similaire`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produit1` (`id_produit1`), ADD KEY `id_produit2` (`id_produit2`);

--
-- Index pour la table `univers`
--
ALTER TABLE `univers`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pseudo_2` (`pseudo`), ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `users_adresse`
--
ALTER TABLE `users_adresse`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`), ADD KEY `facturation` (`facturation`), ADD KEY `livraison` (`livraison`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande_detail`
--
ALTER TABLE `commande_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `promo`
--
ALTER TABLE `promo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `similaire`
--
ALTER TABLE `similaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `univers`
--
ALTER TABLE `univers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users_adresse`
--
ALTER TABLE `users_adresse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
