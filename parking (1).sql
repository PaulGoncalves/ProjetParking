-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Septembre 2016 à 14:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_c` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mdp` varchar(11) NOT NULL,
  `liste_a` int(255) NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_c`, `nom`, `prenom`, `email`, `telephone`, `mdp`, `liste_a`) VALUES
(33, 'arianfar', '', 'arianfarsamir@gmail.com', '', '6a62415b43a', 0),
(34, 'kaweh', '', 'ari@gmail.com', '', '66aa1cb9a46', 0),
(35, 'toto', '', 'toto@gmail.com', '', 'eb4ac3033e8', 0),
(36, 'toto', '', 'toto@gmail.com', '', 'eb4ac3033e8', 0);

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id_p` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `place`
--

INSERT INTO `place` (`id_p`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_c` int(255) NOT NULL,
  `deb_r` date NOT NULL,
  `fin_r` date NOT NULL,
  `id_r` int(255) NOT NULL AUTO_INCREMENT,
  `id_p` int(255) NOT NULL,
  PRIMARY KEY (`id_r`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_c`, `deb_r`, `fin_r`, `id_r`, `id_p`) VALUES
(1, '2016-09-01', '2016-09-01', 1, 1),
(2, '2016-09-27', '2016-09-27', 2, 2),
(3, '2016-09-28', '2016-09-28', 3, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
