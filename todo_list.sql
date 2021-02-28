-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 10 mai 2020 à 03:10
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todo_list`
--

-- --------------------------------------------------------

--
-- Structure de la table `todos`
--

DROP TABLE IF EXISTS `todos`;
CREATE TABLE IF NOT EXISTS `todos` (
  `todo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `dateC` varchar(255) NOT NULL,
  `complete` varchar(255) NOT NULL,
  PRIMARY KEY (`todo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `todos`
--

INSERT INTO `todos` (`todo_id`, `user_email`, `titre`, `contenu`, `dateC`, `complete`) VALUES
(1, 'djibril@gmail.com', 'todo1', 'todo 1 edited ', 'Saturday, May 2, 2020', 'false'),
(2, 'djibril@gmail.com', 'todo2', 'todo2 bonne nuit', 'Saturday, May 2, 2020', 'false'),
(10, 'djibril@gmail.com', 'todo3', 'jo mappelelle eefefefeefr', 'Tuesday, May 5, 2020', 'false'),
(11, 'djibril@gmail.com', 'todo 4', 'rien a faire lol ', 'Wednesday, May 6, 2020', 'false'),
(12, 'djibril@gmail.com', 'todo 5 ', 'heurou kheud diot neu', 'Wednesday, May 6, 2020', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `mot_de_passe`) VALUES
(5, 'abdou', 'abdou@gmail.com', '$2y$10$Ekv.XTyv9Ry2SZt4Ti68FOEymG4rGZyDDjJH1uyPpNwNEcfL1fYq.'),
(6, 'samba', 'samba@gmail.com', '$2y$10$tAAFuOgLXzXU2te61GVg3.oSgYfm8zuM5XEFqJGcI3twHdJZE1VUu'),
(4, 'djibril', 'djibril@gmail.com', '$2y$10$6H8Zvu6QOXloVAo08NLJ3uNyDx4IC7vN9dgSa7oMd5byoeqPTUoBu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
