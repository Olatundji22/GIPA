-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 août 2021 à 08:35
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gipa`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `NumDemande` varchar(10) CHARACTER SET utf8 NOT NULL,
  `DateDemande` timestamp NOT NULL DEFAULT current_timestamp(),
  `CodeDoc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Matricule` varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`NumDemande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`NumDemande`, `DateDemande`, `CodeDoc`, `Matricule`) VALUES
('2588', '2021-08-03 08:12:13', 'DOC0004', 'M0001'),
('D001', '2018-07-27 23:25:13', 'DOC01', 'M0001'),
('D002', '2018-07-27 23:25:44', 'DOC02', 'M0002'),
('D003', '2018-07-27 23:26:03', 'DOC03', 'M0005'),
('D004', '2018-07-28 11:14:03', 'DOC01', 'M0002'),
('hbvjhb', '2018-07-25 09:34:27', 'zlefze', '6464'),
('hjvjhvjhv', '2018-07-25 09:34:46', 'zlefze', '65464'),
('khg', '2018-07-25 09:34:36', '6546', '6464');

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `CodeDirection` varchar(10) CHARACTER SET utf8 NOT NULL,
  `LibelDirection` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`CodeDirection`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`CodeDirection`, `LibelDirection`) VALUES
('DAF', 'Direction de l\'Administration et des Finances'),
('DIP', 'Direction de l\'informatique et du PrÃ©-archivage'),
('DPP', 'Direction de la Programmation et de la Prospective');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `CodeDoc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `LibelDoc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `DateEnrgDoc` timestamp NOT NULL DEFAULT current_timestamp(),
  `FonctionDoc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CodeTypeDoc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `file_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`CodeDoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`CodeDoc`, `LibelDoc`, `DateEnrgDoc`, `FonctionDoc`, `CodeTypeDoc`, `file_url`) VALUES
('D100OC', 'Document', '2018-07-28 11:09:23', 'Loi', 'NS', 'files/Epreuve de TEEO.docx'),
('DOC0', 'Decret instituant le ComitÃ© Interministeriel de coordination de la lutte contre la Drogue', '2018-07-28 10:52:57', 'DÃ©cret', 'DEC', 'files/Epreuve de TEEO.docx'),
('DOC0004', 'LIbeleÃ©', '2018-07-28 11:01:04', 'loi', 'DEC', 'files/Epreuve de TEEO.docx'),
('DOC004', 'qsfb', '2018-07-28 10:56:32', 'sdfsf', 'ARR', 'files/TABLE DES MATIERES.docx'),
('DOC01', 'Invitation pour Ã©rÃ©monie de dÃ©coration du president', '2018-07-27 23:18:00', 'Note', 'NS', 'files/La thÃ©orie de Stephen Krashen sur l.doc'),
('DOC02', 'ArretÃ© autorisant l\'ouverture d\'un Ã©tablissement recevant du publique', '2018-07-27 23:22:30', 'ArretÃ©', 'ARR', 'files/Exemple_arrete_maires_ERP.pdf'),
('DOC03', 'Decret instituant le ComitÃ© Interministeriel de coordination de la lutte contre la Drogue', '2018-07-27 23:24:45', 'Decret', 'DEC', 'files/lap_imccdc_model-regulation_fr.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `Matricule` varchar(5) NOT NULL,
  `NomPerso` varchar(20) CHARACTER SET utf8 NOT NULL,
  `PrenPerso` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TelPerso` varchar(10) CHARACTER SET utf8 NOT NULL,
  `AdressPerso` varchar(30) CHARACTER SET utf8 NOT NULL,
  `CodeService` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`Matricule`, `NomPerso`, `PrenPerso`, `TelPerso`, `AdressPerso`, `CodeService`) VALUES
('M0001', 'ALY', 'Olatundji', '66-36-49-5', 'Abomey-Calavi', 'SI'),
('M0002', 'ALODOGNITO', 'Tanguy', '45-69-69-6', 'Cotonou', 'SI'),
('M0003', 'GABIN', 'Pierre ', '96-03-96-9', 'Cotonou', 'SPGS'),
('M0004', 'PAULIN', 'Christof', '66-02-58-9', 'Akassato', 'SRU'),
('M0005', 'SOFIA', 'Armande', '58-98-96-4', 'Apkapka', 'SRU');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `CodeService` varchar(10) CHARACTER SET utf8 NOT NULL,
  `LibelService` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CodeDirection` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`CodeService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`CodeService`, `LibelService`, `CodeDirection`) VALUES
('SI', 'Service Informatique', 'DIP'),
('SPGS', 'Service de PrÃ©-archivage et de Gestion des Savoirs ', 'DIP'),
('SRU', 'Service des Relations avec les Usagers ', 'DIP');

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

DROP TABLE IF EXISTS `type_document`;
CREATE TABLE IF NOT EXISTS `type_document` (
  `CodeTypeDoc` varchar(10) CHARACTER SET utf8 NOT NULL,
  `LibelTypeDoc` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`CodeTypeDoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_document`
--

INSERT INTO `type_document` (`CodeTypeDoc`, `LibelTypeDoc`) VALUES
('ARR', 'ArretÃ©'),
('CI', 'CommuniquÃ© Interne'),
('DEC', 'DÃ©cret'),
('NS', 'Note de Service'),
('PV', 'ProcÃ¨s Verbale');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `NumUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(20) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`NumUtilisateur`),
  UNIQUE KEY `Ideentifiant` (`Identifiant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`NumUtilisateur`, `Identifiant`, `Password`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
