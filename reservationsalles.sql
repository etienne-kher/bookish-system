-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 déc. 2019 à 11:00
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_user`) VALUES
(56, 'lllllmmmlmlm', 'kkklkllkl', '2019-12-25 17:00:00', '2019-12-25 19:00:00', 20),
(57, 'megatest', 'c cho', '2019-12-31 08:00:00', '2019-12-31 11:00:00', 20),
(58, 'kkkkkkkkkk', 'lklkl', '2019-12-31 15:00:00', '2019-12-31 19:00:00', 20),
(54, 'yy', 'pop', '2019-12-25 08:00:00', '2019-12-25 12:00:00', 20),
(53, 'mmmm', 'j,,,,,,,,,,', '2019-12-17 09:00:00', '2019-12-17 10:00:00', 20),
(52, 'llllllllll', 'mmmmm', '2019-12-20 09:00:00', '2019-12-20 11:00:00', 20),
(51, 'mmmm', 'kjhjvh', '2019-12-24 08:00:00', '2019-12-24 10:00:00', 20),
(50, 'hhh', 'ghjklkjhgfghjkl', '2019-12-18 08:00:00', '2019-12-18 10:00:00', 20),
(49, 'zdra', 'zdedede', '2019-12-17 08:00:00', '2019-12-17 09:00:00', 20);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(20, 'eti', 'd416c69669cb1ba9a0794a71fba04e8b3d215b311200760484fa1587e66451e0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
