-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 mars 2024 à 13:19
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
-- Base de données : `todolist`
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
  `Priorite_Task` varchar(50) NOT NULL,
  `Categorie_Task` varchar(50) NOT NULL,
  `Id_User` int NOT NULL,
  `Id_Priority` int NOT NULL,
  PRIMARY KEY (`Id_Task`),
  KEY `Task_User_FK` (`Id_User`),
  KEY `Task_Priority0_FK` (`Id_Priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tdl_user`
--

DROP TABLE IF EXISTS `tdl_user`;
CREATE TABLE IF NOT EXISTS `tdl_user` (
  `Id_User` int NOT NULL AUTO_INCREMENT,
  `Nom_User` varchar(50) NOT NULL,
  `Prenom_User` varchar(50) NOT NULL,
  `Mdp_User` varchar(50) NOT NULL,
  `Email_User` varchar(80) NOT NULL,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `User_AK` (`Email_User`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_user`
--

INSERT INTO `tdl_user` (`Id_User`, `Nom_User`, `Prenom_User`, `Mdp_User`, `Email_User`) VALUES
(1, 'Martin', 'Guillaume', '8723E1B97EFE514CD40A8EDE72A686CFC01D874DFEB61BFE57', 'g.martin@gmail.com');

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
