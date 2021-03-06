-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mai 2016 à 21:04
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `id_auteur`, `nom`, `description`) VALUES
(1, 1, 'Chris Terrio', 'Chris Terrio est un scénariste et réalisateur américain né le 31 décembre 1976. Il est le réalisateur du film Heights en 2005. Il a gagné l''Oscar du meilleur scénario adapté pour le film Argo de Ben Affleck.');

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
  `id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_users`, `time`, `id_adresse`) VALUES
(13, 7, '2016-05-30 19:30:27', 6),
(14, 7, '2016-05-30 20:13:38', 6),
(15, 7, '2016-05-30 20:13:52', 6),
(16, 7, '2016-05-30 20:14:20', 6),
(17, 7, '2016-05-31 17:23:26', 6),
(18, 7, '2016-05-31 17:24:18', 6),
(19, 7, '2016-05-31 17:24:31', 6),
(20, 7, '2016-05-31 17:29:12', 6),
(21, 7, '2016-05-31 20:51:36', 6),
(22, 7, '2016-05-31 20:53:03', 6),
(23, 7, '2016-05-31 20:54:33', 6),
(24, 7, '2016-05-31 20:54:36', 6),
(25, 7, '2016-05-31 20:57:01', 6);

-- --------------------------------------------------------

--
-- Structure de la table `commande_detail`
--

DROP TABLE IF EXISTS `commande_detail`;
CREATE TABLE IF NOT EXISTS `commande_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float(5,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_detail`
--

INSERT INTO `commande_detail` (`id`, `id_commande`, `id_produit`, `prix`, `quantite`) VALUES
(24, 15, 9, 33.00, 1),
(23, 15, 2, 25.00, 21),
(22, 15, 3, 20.00, 3),
(21, 15, 1, 10.00, 4),
(20, 14, 9, 33.00, 1),
(19, 14, 2, 25.00, 21),
(18, 14, 3, 20.00, 3),
(17, 14, 1, 10.00, 4),
(16, 13, 9, 33.00, 1),
(15, 13, 2, 25.00, 21),
(14, 13, 3, 20.00, 3),
(13, 13, 1, 10.00, 4),
(25, 16, 1, 10.00, 4),
(26, 16, 3, 20.00, 3),
(27, 16, 2, 25.00, 21),
(28, 16, 9, 33.00, 1),
(29, 17, 1, 10.00, 4),
(30, 17, 3, 20.00, 3),
(31, 17, 2, 25.00, 21),
(32, 17, 9, 33.00, 1),
(33, 18, 1, 10.00, 4),
(34, 18, 3, 20.00, 3),
(35, 18, 2, 25.00, 21),
(36, 18, 9, 33.00, 1),
(37, 19, 1, 10.00, 4),
(38, 19, 3, 20.00, 3),
(39, 19, 2, 25.00, 21),
(40, 19, 9, 33.00, 1),
(41, 20, 2, 25.00, 1),
(42, 21, 1, 10.00, 2),
(43, 23, 10, 15.00, 1),
(44, 25, 11, 10.00, 1);

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
  `texte` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medias`
--

INSERT INTO `medias` (`id`, `nom`, `url`) VALUES
(1, 'Trevor', 'trevor.png'),
(2, 'Minecraft', 'minecraft.jpg'),
(3, 'Star Wars', 'Star-Wars-7-New-Banner.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix` float(5,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `modele`
--

INSERT INTO `modele` (`id`, `nom`, `id_produit`, `prix`, `stock`) VALUES
(1, 'Dématérialisé', 1, 10.00, NULL),
(2, 'Blu-ray', 1, 25.00, 6),
(3, 'DVD', 1, 20.00, 18),
(6, 'Origins Edition', 3, 60.00, 100),
(7, 'Classique, dématérialisé', 3, 40.00, 0),
(8, 'Classique, boite', 3, 40.00, 12),
(9, 'Modèle 4', 3, 33.00, 9),
(10, 'Dématérialisé', 4, 15.00, NULL),
(11, 'CD', 4, 10.00, 101),
(12, 'Vinyl : Hipster Edition', 4, 20.00, 22),
(13, 'Dématérialisé', 5, 20.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `auteur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  `id_univers` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `slug`, `nom`, `auteur`, `date`, `contenu`, `id_univers`) VALUES
(1, 'news-test-jv', '1ère news JV', 7, '2016-04-11 15:13:05', '<p>Test d&#39;une news Jeux Vid&eacute;os</p>\r\n', 3),
(2, '', 'tests', 7, '2016-04-20 16:02:06', '<p>dsfsd</p>\r\n', 1),
(3, 'news-test-jv', '2e news JV', 7, '2016-04-11 15:13:05', 'Test d''une news Jeux Vidéo', 3),
(4, 'news-test-jv', '3e news JV', 7, '2016-04-11 15:13:05', 'Test d''une news Jeux Vidéo', 3),
(5, 'news-test-jv', '4e news JV', 7, '2016-04-11 15:13:05', 'Test d''une news Jeux Vidéo', 3),
(6, 'news-test-jv', '5e news JV', 7, '2016-04-11 15:13:05', '<p>Test d&#39;une news Jeux Vid&eacute;os</p>\r\n', 3),
(7, 'foals-festivals', 'Foals : les festivals de cet été !', 7, '2016-05-30 19:11:30', '<p>Test d&#39;une news Musique</p>', 4),
(8, 'zombi-film', 'Zombillénium : Le film pour cet hiver !', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">gfggd</span>', 5),
(9, 'overwatch-depart-canon', 'Overwatch : Un départ canon !', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 3),
(10, 'the-100-final', 'The 100 Saison 3 : Un final inattendu...', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 2),
(11, 'rick-des-nouvelles', 'Rick & Morty saison 3 : Premier teaser !', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 2),
(12, 'rip-in-peace', '[Exclu] Son personnage tué, Peter Dinklage remplace Passe-Partout cet été au Fort !', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 2),
(13, 'rip-in-peace', 'Les Simpson : La Fox rempile jusqu''à la saison 33 !', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 2),
(14, 'rip-in-peace', 'Alt-J sort "Live At Red Rocks", son 1er album Live', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 4),
(15, 'angouleme-1ers-auteurs', 'Festival d''Angoulême 2017 : Les premières rumeurs...', 7, '2016-05-30 19:11:37', '<span style="font-weight: bold;">Texte de la news</span>', 5);

-- --------------------------------------------------------

--
-- Structure de la table `news_image`
--

DROP TABLE IF EXISTS `news_image`;
CREATE TABLE IF NOT EXISTS `news_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news_image`
--

INSERT INTO `news_image` (`id`, `id_news`, `url`) VALUES
(1, 1, '/img/test.jpg'),
(2, 3, '/img/Star-Wars-7-New-Banner.jpg'),
(3, 4, '/img/minecraft.jpg'),
(4, 6, '/img/trevor.png'),
(5, 5, '/img/1kki.png'),
(6, 7, 'img/foals.jpeg'),
(7, 8, 'img/zombillenium.jpg'),
(8, 9, 'img/overwatch.jpg'),
(9, 10, 'img/the100.png'),
(10, 11, 'img/rick.jpg'),
(11, 12, 'img/tyrion.jpg'),
(12, 13, 'img/simpson.jpg'),
(13, 14, 'img/altj.jpg'),
(14, 15, 'img/angouleme.jpg');

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
  `id_modele` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
  `visible` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `id_univers`, `titre`, `annee`, `id_auteur`, `type`, `lien_ws`, `stock`, `visible`) VALUES
(1, 'Batman vs Superman', 1, 'Batman vs Superman', 2015, 6, '', '', 0, 1),
(2, 'test2', 1, 'test2', 2016, 7, 'typeosef', 'fgdgdg', 0, 1),
(3, 'Overwatch', 3, 'Overwatch', 2016, 7, '', '', 0, 1),
(4, 'L''attrape-rêves', 4, 'L''attrape-rêves', 2016, 7, '', '', 0, 1),
(5, 'Goat Simulator', 3, 'Goat Simulator', 2013, 7, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_image`
--

DROP TABLE IF EXISTS `produits_image`;
CREATE TABLE IF NOT EXISTS `produits_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_image`
--

INSERT INTO `produits_image` (`id`, `id_produit`, `url`) VALUES
(1, 1, 'img/test.jpg'),
(2, 4, 'img/christophemae1.jpg'),
(3, 3, 'img/overwatch.jpg'),
(4, 5, 'img/goat.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `couleur` varchar(50) NOT NULL,
  `slug` varchar(10) NOT NULL COMMENT 'Utilisé pour les classes CSS à l''affichage (bannières notamment)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `univers`
--

INSERT INTO `univers` (`id`, `nom`, `couleur`, `slug`) VALUES
(1, 'Films', 'teal lighten-3', 'films'),
(2, 'Séries', '', 'series'),
(3, 'Jeux Vidéo', '', 'jv'),
(4, 'Musique', '', 'musique'),
(5, 'Bande Dessinée', '', 'bd');

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

DROP TABLE IF EXISTS `users_adresse`;
CREATE TABLE IF NOT EXISTS `users_adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `defaut` int(11) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users_adresse`
--

INSERT INTO `users_adresse` (`id`, `id_users`, `defaut`, `numero`, `cplt_numero`, `rue`, `cp`, `ville`, `facturation`, `livraison`) VALUES
(3, 7, 0, 16, 'TER', 'Route de Mers', '76260', 'Eu', 1, 1),
(5, 7, 1, 25, 'BIS', 'Rue de test', '80000', 'AMIENS', 0, 0),
(6, 7, 0, 22, '', 'rue de test', '80000', 'Amiens', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
