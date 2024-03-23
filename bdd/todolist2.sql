-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 23 mars 2024 à 10:47
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist2`
--

-- --------------------------------------------------------

--
-- Structure de la table `tdl_categorise`
--

DROP TABLE IF EXISTS `tdl_categorise`;
CREATE TABLE IF NOT EXISTS `tdl_categorise` (
  `Id_Category` int NOT NULL,
  `Id_Task` int NOT NULL,
  PRIMARY KEY (`Id_Category`,`Id_Task`),
  KEY `categorise_Task0_FK` (`Id_Task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_categorise`
--

INSERT INTO `tdl_categorise` (`Id_Category`, `Id_Task`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tdl_category`
--

DROP TABLE IF EXISTS `tdl_category`;
CREATE TABLE IF NOT EXISTS `tdl_category` (
  `Id_Category` int NOT NULL AUTO_INCREMENT,
  `Nom_Category` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_category`
--

INSERT INTO `tdl_category` (`Id_Category`, `Nom_Category`) VALUES
(1, 'Personnel'),
(2, 'Travail'),
(3, 'Famille'),
(4, 'Amis');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_priority`
--

DROP TABLE IF EXISTS `tdl_priority`;
CREATE TABLE IF NOT EXISTS `tdl_priority` (
  `Id_Priority` int NOT NULL AUTO_INCREMENT,
  `Nom_Priority` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Priority`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_priority`
--

INSERT INTO `tdl_priority` (`Id_Priority`, `Nom_Priority`) VALUES
(1, 'Normal'),
(2, 'Important'),
(3, 'Urgent');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_task`
--

DROP TABLE IF EXISTS `tdl_task`;
CREATE TABLE IF NOT EXISTS `tdl_task` (
  `Id_Task` int NOT NULL AUTO_INCREMENT,
  `Titre_Task` varchar(50) NOT NULL,
  `Description_Task` varchar(50) NOT NULL,
  `Date_Task` date NOT NULL,
  `Id_User` int NOT NULL,
  `Id_Priority` int NOT NULL,
  PRIMARY KEY (`Id_Task`),
  KEY `Task_User_FK` (`Id_User`),
  KEY `Task_Priority0_FK` (`Id_Priority`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_task`
--

INSERT INTO `tdl_task` (`Id_Task`, `Titre_Task`, `Description_Task`, `Date_Task`, `Id_User`, `Id_Priority`) VALUES
(2, 'Faire les des salto', 'Pensez à acheter du lait', '2024-03-21', 1, 1),
(3, 'Faire du sport', '30 min cardio', '2024-03-20', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tdl_user`
--

DROP TABLE IF EXISTS `tdl_user`;
CREATE TABLE IF NOT EXISTS `tdl_user` (
  `Id_User` int NOT NULL AUTO_INCREMENT,
  `Nom_User` varchar(50) NOT NULL,
  `Prenom_User` varchar(50) NOT NULL,
  `Mdp_User` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email_User` varchar(80) NOT NULL,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `User_AK` (`Email_User`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_user`
--

INSERT INTO `tdl_user` (`Id_User`, `Nom_User`, `Prenom_User`, `Mdp_User`, `Email_User`) VALUES
(1, 'Martin', 'Guillaume', '8723E1B97EFE514CD40A8EDE72A686CFC01D874DFEB61BFE57', 'g.martin@gmail.com'),
(3, 'BEAU', 'Jean-Luc', '123456', 'jlbeau@gmail.com'),
(25, 'Burteaux', 'Salomé', '$2y$10$7ZJQAy2q38X.lMfaBs27xe74QY8ltXErA86FYBtBz3dMwQWs5EeYS', 'salome.burteaux@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tdl_categorise`
--
ALTER TABLE `tdl_categorise`
  ADD CONSTRAINT `categorise_Category_FK` FOREIGN KEY (`Id_Category`) REFERENCES `tdl_category` (`Id_Category`),
  ADD CONSTRAINT `categorise_Task0_FK` FOREIGN KEY (`Id_Task`) REFERENCES `tdl_task` (`Id_Task`);

--
-- Contraintes pour la table `tdl_task`
--
ALTER TABLE `tdl_task`
  ADD CONSTRAINT `Task_Priority0_FK` FOREIGN KEY (`Id_Priority`) REFERENCES `tdl_priority` (`Id_Priority`),
  ADD CONSTRAINT `Task_User_FK` FOREIGN KEY (`Id_User`) REFERENCES `tdl_user` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
