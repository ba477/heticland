-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Février 2015 à 15:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `heticland`
--

-- --------------------------------------------------------

--
-- Structure de la table `attaks`
--

CREATE TABLE IF NOT EXISTS `attaks` (
  `idAttak` int(11) NOT NULL AUTO_INCREMENT,
  `nameAttak` varchar(100) NOT NULL,
  `damage` int(11) unsigned NOT NULL,
  `owner` varchar(100) NOT NULL,
  `roomName` varchar(50) NOT NULL,
  PRIMARY KEY (`idAttak`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `attaks`
--

INSERT INTO `attaks` (`idAttak`, `nameAttak`, `damage`, `owner`, `roomName`) VALUES
(1, 'YieldManagment', 0, 'Carlier', '0'),
(2, 'Freemium ', 20, 'Carlier', '0'),
(3, 'attaque1', 0, 'test', '0'),
(4, 'attaque2', 50, 'test', '0'),
(5, 'div', 10, 'Test', 'savoiretre'),
(6, 'Poulet grillé', 20, 'Test', 'savoiretre'),
(7, 'String', 5, 'Test', 'savoiretre'),
(8, 'Plume', 30, 'Test', 'savoiretre'),
(11, 'Plume', 30, 'Test', 'photoshop'),
(12, 'Fusion', 20, 'Test', 'photoshop'),
(13, 'DIV', 5, 'Test', 'photoshop'),
(14, 'PSD', 10, 'Test', 'photoshop'),
(15, 'Kaamelott', 30, 'Test', 'php'),
(16, 'Cigare', 20, 'Test', 'php'),
(17, 'Chaton', 5, 'Test', 'php'),
(18, 'Design', 10, 'Test', 'php'),
(19, 'Array', 20, 'Test', 'javascript'),
(20, 'Ajax', 30, 'Test', 'javascript'),
(21, 'JQuery', 20, 'Test', 'javascript'),
(22, 'Javascript', 5, 'Test', 'javascript'),
(23, 'css', 10, 'Test', 'htmlcss'),
(24, 'Section', 20, 'Test', 'htmlcss'),
(25, 'ID', 30, 'Test', 'htmlcss'),
(26, 'Class', 5, 'Test', 'htmlcss'),
(27, 'Pour', 5, 'Test', 'algo'),
(28, 'Tant que', 10, 'Test', 'algo'),
(29, 'Répeter', 30, 'Test', 'algo'),
(30, 'Si', 20, 'Test', 'algo');

-- --------------------------------------------------------

--
-- Structure de la table `backgrounds`
--

CREATE TABLE IF NOT EXISTS `backgrounds` (
  `idBackground` int(11) NOT NULL AUTO_INCREMENT,
  `nameBackground` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imgBackground` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idBackground`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

CREATE TABLE IF NOT EXISTS `boss` (
  `boss_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `boss_hp` int(11) NOT NULL,
  `boss_roomName` varchar(50) NOT NULL,
  PRIMARY KEY (`boss_id`),
  UNIQUE KEY `boss_roomName` (`boss_roomName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `boss`
--

INSERT INTO `boss` (`boss_id`, `boss_hp`, `boss_roomName`) VALUES
(1, 100, 'savoiretre'),
(2, 100, 'photoshop'),
(4, 100, 'htmlcss'),
(5, 100, 'javascript'),
(6, 100, 'algo'),
(7, 100, 'php');

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `idCharacter` int(11) NOT NULL AUTO_INCREMENT,
  `nameCharacter` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pnj` tinyint(1) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAttak` int(11) NOT NULL,
  `moyenne` int(11) NOT NULL,
  PRIMARY KEY (`idCharacter`),
  KEY `room` (`idRoom`),
  KEY `idUser` (`idUser`),
  KEY `idAttak` (`idAttak`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `characters`
--

INSERT INTO `characters` (`idCharacter`, `nameCharacter`, `pnj`, `idRoom`, `hp`, `idUser`, `idAttak`, `moyenne`) VALUES
(3, 'Test', 0, 1, 700, 1, 2, 0),
(13, 'helloworld', 0, 1, 500, 11, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `idRoom` int(11) NOT NULL AUTO_INCREMENT,
  `nameRoom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `question` varchar(255) CHARACTER SET latin1 NOT NULL,
  `answer` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imageProf` varchar(255) NOT NULL,
  `nameRoom2` varchar(100) NOT NULL,
  `imageGif` varchar(150) NOT NULL,
  PRIMARY KEY (`idRoom`),
  UNIQUE KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`idRoom`, `nameRoom`, `question`, `answer`, `imageProf`, `nameRoom2`, `imageGif`) VALUES
(1, 'php', 'Quelles sont les balises d''''ouverture et de fermeture en PHP ?', '<?php ?>', 'images/salledeclasse/prof-php.png', 'Cours de PHP', 'images/salledeclasse/duel_php.gif'),
(3, 'php', 'Comment déclare-t-on une variable en PHP ?', '$', 'images/salledeclasse/prof-php.png', 'Cours de PHP', 'images/salledeclasse/duel_php.gif'),
(4, 'php', 'Comment on crée un tableau en PHP ?', '$tableau=[]', 'images/salledeclasse/prof-php.png', 'Cours de PHP', 'images/salledeclasse/duel_php.gif'),
(5, 'javascript', 'Quelles sont les balises d''ouverture et de fermeture en JavaScript ?', '<script></script>', 'images/salledeclasse/prof-javascript.png', 'Cours de Javascript', 'images/salledeclasse/duel_javascript.gif'),
(6, 'javascript', 'Quelle est la variable pour créer une fenêtre pop-up en JavaScript?', 'alert(!)', 'images/salledeclasse/prof-javascript.png', 'Cours de Javascript', 'images/salledeclasse/duel_javascript.gif'),
(7, 'javascript', 'Comment crée-t-on une boucle en JavaScript ?', 'for(){}', 'images/salledeclasse/prof-javascript.png', 'Cours de Javascript', 'images/salledeclasse/duel_javascript.gif'),
(8, 'htmlcss', 'Par quoi doit-on commencer un document HTML ? ', '!DOCTYPE html', 'images/salledeclasse/prof-htmlcss.png', 'Cours d''intégration', 'images/salledeclasse/duel_htmlcss.gif'),
(9, 'htmlcss', 'Quelle est la propriété css pour mettre un texte en majuscule ?', 'text-transform : uppercase', 'images/salledeclasse/prof-htmlcss.png', 'Cours d''intégration', 'images/salledeclasse/duel_htmlcss.gif'),
(10, 'htmlcss', 'Quelle est la propriété css qui transforme la sélection lorsqu''on la survole ? ', 'hover', 'images/salledeclasse/prof-htmlcss.png', 'Cours d''intégration', 'images/salledeclasse/duel_htmlcss.gif'),
(12, 'photoshop', 'Quel est le format d''un gif ?', '.gif', 'images/salledeclasse/prof-photoshop.png', 'Cours de Photoshop', 'images/salledeclasse/duel_photoshop.gif'),
(13, 'photoshop', 'Quel est le raccourci clavier pour intervertir la sélection en Photoshop ?', 'ctrl+i', 'images/salledeclasse/prof-photoshop.png', 'Cours de Photoshop', 'images/salledeclasse/duel_photoshop.gif'),
(14, 'photoshop', 'Quel est le raccourci clavier pour fusionner ses calques en Photoshop ?', 'ctrl+e', 'images/salledeclasse/prof-photoshop.png', 'Cours de Photoshop', 'images/salledeclasse/duel_photoshop.gif'),
(15, 'savoiretre', 'Citez un modèle économique ', 'freemium', 'images/salledeclasse/prof-savoiretre.png', 'Cours de Savoir être', 'images/salledeclasse/duel_savoiretre.gif'),
(16, 'savoiretre', 'Quelle l''année de création de la presse mono-source ?', '1631', 'images/salledeclasse/prof-savoiretre.png', 'Cours de Savoir être', 'images/salledeclasse/duel_savoiretre.gif'),
(17, 'savoiretre', 'Quel est le sigle économique pour le commerce de société à société ', 'BtoB', 'images/salledeclasse/prof-savoiretre.png', 'Cours de Savoir être', 'images/salledeclasse/duel_savoiretre.gif'),
(18, 'algo', 'Les constantes se déclarent-elles avant ou après les variables ?', 'avant', 'images/salledeclasse/prof-algo.png', 'Cours d''algorithme', 'images/salledeclasse/duel_algo.gif'),
(19, 'algo', 'Citez le premier mot de la structure répéter en algorithmie', 'POUR', 'images/salledeclasse/prof-algo.png', 'Cours d''algorithme', 'images/salledeclasse/duel_algo.gif'),
(20, 'algo', 'Par quel mot-clé se termine un algorithme ?', 'fin', 'images/salledeclasse/prof-algo.png', 'Cours d''algorithme', 'images/salledeclasse/duel_algo.gif');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_sess_id` varchar(255) NOT NULL,
  `session_ip` varchar(50) NOT NULL,
  `session_date_creation` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_date_modification` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_expiration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `session_sess_id` (`session_sess_id`),
  UNIQUE KEY `session_ip` (`session_ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_sess_id`, `session_ip`, `session_date_creation`, `session_date_modification`, `session_expiration`) VALUES
(3, '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '', '2015-02-13 11:19:09', '2015-02-13 15:36:32', '2015-02-16 15:36:32');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nameUser` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `nameUser`, `password`) VALUES
(1, 'test', '$2y$10$nJ0GMwBu53swW7dtXLviZ.AdVT4rPT.XPLCkukwVw7m.TcV6u8FXa'),
(11, 'helloworld', '0138e3c1c03b9bec0d6393f50e7cc1d5');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`idRoom`),
  ADD CONSTRAINT `characters_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `characters_ibfk_3` FOREIGN KEY (`idAttak`) REFERENCES `attaks` (`idAttak`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
