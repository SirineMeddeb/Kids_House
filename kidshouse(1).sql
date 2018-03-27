-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 mars 2018 à 08:55
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kidshouse`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `CIN` int(8) NOT NULL,
  PRIMARY KEY (`Id_Admin`),
  KEY `CIN` (`CIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `animatrice`
--

DROP TABLE IF EXISTS `animatrice`;
CREATE TABLE IF NOT EXISTS `animatrice` (
  `Id_Animatrice` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `CIN` int(8) NOT NULL,
  PRIMARY KEY (`Id_Animatrice`),
  KEY `CIN` (`CIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Rôle` varchar(50) NOT NULL,
  `CIN` int(8) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `CIN` (`CIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `id_Parent` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Parent` (`id_Parent`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id`, `Nom`, `Prenom`, `Date`, `sex`, `photo`, `id_Parent`) VALUES
(1, 'Rafif', 'chakroun', '2013-02-13', 'fille', 'e1.jpg', '301'),
(2, 'Yahia', 'Ben Ali', '2016-03-12', 'garçon', 'e2.jpg', '302'),
(3, 'Salma', 'Ben Yahmed', '2018-02-15', 'fille', 'e3.jpg', '302');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id_Parent` int(11) NOT NULL AUTO_INCREMENT,
  `CIN` varchar(8) NOT NULL,
  PRIMARY KEY (`id_Parent`),
  KEY `CIN` (`CIN`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id_Parent`, `CIN`) VALUES
(301, '09621377'),
(302, '09621378');

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `CIN` int(8) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Tel` int(8) NOT NULL,
  PRIMARY KEY (`CIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`CIN`, `Nom`, `Prenom`, `Tel`) VALUES
(9621377, 'Sirine', 'Meddeb', 58046326),
(9621378, 'Nizar', 'Ghrab', 56149015),
(9621379, 'Malek ', 'Saadeni ', 22799459),
(9621380, 'Rim', 'Yahya', 23000165);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `password`, `nom`, `prenom`, `mail`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin@gmail.com'),
('sirine', 'sirine', 'Sirine', 'Meddeb', 'syrinemeddeb23@gmail.com'),
('lmdkmlkd', 'odmldlk', 'lsklks', 'lkdmlksml', 'mlkdmklm'),
('ww', 'ww', 'ww', 'ww', 'ww'),
('11', '11', '11', '11', '11'),
('ss', 'ss', 'ss', 'ss', 'ss'),
('aa', 'aa', 'aa', 'aa', 'aa'),
('nizzar', 'nizzar', 'nizar', 'nizzar', 'nizzar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
