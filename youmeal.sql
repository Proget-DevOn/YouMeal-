-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 04 avr. 2021 à 20:20
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `youmeal`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `pseudo_abonne` varchar(30) NOT NULL,
  `pseudo_abonnement` varchar(30) NOT NULL,
  PRIMARY KEY (`pseudo_abonne`,`pseudo_abonnement`),
  KEY `pseudo_abonnement` (`pseudo_abonnement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `Pseudo_emeteur` varchar(30) NOT NULL,
  `id_live` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL,
  PRIMARY KEY (`Pseudo_emeteur`,`id_live`,`date_message`),
  KEY `id_live` (`id_live`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `quantite` varchar(11) NOT NULL,
  `nom_ingredient` varchar(50) NOT NULL,
  `id_recette` int(11) NOT NULL,
  PRIMARY KEY (`nom_ingredient`,`id_recette`),
  KEY `id_recette` (`id_recette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `live`
--

DROP TABLE IF EXISTS `live`;
CREATE TABLE IF NOT EXISTS `live` (
  `ID_live` int(10) NOT NULL AUTO_INCREMENT,
  `date_live` datetime NOT NULL,
  `ID_recette` int(10) NOT NULL,
  `hote` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_live`),
  KEY `hote` (`hote`),
  KEY `ID_recette` (`ID_recette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `miam`
--

DROP TABLE IF EXISTS `miam`;
CREATE TABLE IF NOT EXISTS `miam` (
  `pseudo` varchar(30) NOT NULL,
  `ID_recette` int(11) NOT NULL,
  PRIMARY KEY (`pseudo`,`ID_recette`),
  KEY `ID_recette` (`ID_recette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `ID_live` int(11) NOT NULL,
  `pseudo_participant` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_live`,`pseudo_participant`),
  KEY `pseudo_participant` (`pseudo_participant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `preparation`
--

DROP TABLE IF EXISTS `preparation`;
CREATE TABLE IF NOT EXISTS `preparation` (
  `id_etape` int(11) NOT NULL,
  `description_etape` text NOT NULL,
  `id_recette` int(11) NOT NULL,
  PRIMARY KEY (`id_etape`,`id_recette`),
  KEY `id_recette` (`id_recette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id_recette` int(10) NOT NULL AUTO_INCREMENT,
  `nom_recette` varchar(30) NOT NULL,
  `date_recette` date NOT NULL,
  `temps_execution` time NOT NULL,
  `cout` enum('economique','moyen','couteux') NOT NULL,
  `note` int(11) NOT NULL,
  `auteur` varchar(20) NOT NULL,
  `categorie` enum('entree','plat','desert','aperitif') NOT NULL,
  `regime` enum('vegan','vegetarien','helthy','autre') NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_recette`),
  UNIQUE KEY `auteur` (`auteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `pseudo` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `bio` text,
  PRIMARY KEY (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`pseudo`, `password`, `email`, `date_naissance`, `nom`, `prenom`, `bio`) VALUES
('diana', 'azerty', 'di.diana@live.fr', '1998-01-21', 'diangana', 'diana', NULL),
('dianaa', 'Wp119wP119$*', 'diana@gmail.com', '1998-01-21', 'Diangana', 'Diana', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;