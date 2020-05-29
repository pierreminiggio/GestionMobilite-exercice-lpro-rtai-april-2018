-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 avr. 2018 à 23:59
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
-- Base de données :  `gestionmobilite`
--

-- --------------------------------------------------------

--
-- Structure de la table `compatible`
--

DROP TABLE IF EXISTS `compatible`;
CREATE TABLE IF NOT EXISTS `compatible` (
  `codeCours1` int(11) NOT NULL,
  `codeCours2` int(11) NOT NULL,
  PRIMARY KEY (`codeCours1`,`codeCours2`),
  KEY `codeCours2` (`codeCours2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composercontrat`
--

DROP TABLE IF EXISTS `composercontrat`;
CREATE TABLE IF NOT EXISTS `composercontrat` (
  `idContrat` int(11) NOT NULL,
  `codeCours` int(11) NOT NULL,
  PRIMARY KEY (`idContrat`,`codeCours`),
  KEY `codeCours` (`codeCours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
CREATE TABLE IF NOT EXISTS `contrats` (
  `idContrat` int(11) NOT NULL AUTO_INCREMENT,
  `duree` int(11) NOT NULL,
  `etatContrat` varchar(30) NOT NULL,
  `ordre` varchar(100) NOT NULL,
  `codeDip` int(11) NOT NULL,
  `intituleP` varchar(100) NOT NULL,
  `refDemMob` varchar(100) NOT NULL,
  PRIMARY KEY (`idContrat`),
  KEY `codeDip` (`codeDip`),
  KEY `intituleP` (`intituleP`),
  KEY `refDemMob` (`refDemMob`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`idContrat`, `duree`, `etatContrat`, `ordre`, `codeDip`, `intituleP`, `refDemMob`) VALUES
(4, 5, 'terminé', 'Université Toulouse 1 Capitole', 6, 'Programme1', '98R-7QS-18Z'),
(5, 10, 'en cours', 'Lycée Ozenne', 3, 'Programme2', 'DS7-XC5-RE6');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `CodeCours` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCours` varchar(50) NOT NULL,
  `nbEcts` int(11) NOT NULL,
  PRIMARY KEY (`CodeCours`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='a';

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`CodeCours`, `libelleCours`, `nbEcts`) VALUES
(2, 'Cours de PHP et JSP avec M Sanchez', 999999999),
(3, 'Cours de réseau', 40),
(4, 'Systèmes informatiques organisés', 120);

-- --------------------------------------------------------

--
-- Structure de la table `demandemobilites`
--

DROP TABLE IF EXISTS `demandemobilites`;
CREATE TABLE IF NOT EXISTS `demandemobilites` (
  `refDemMob` varchar(100) NOT NULL,
  `dateDepotDemMob` date NOT NULL,
  `etatDemMob` varchar(100) NOT NULL,
  `numEtudiant` int(11) NOT NULL,
  `codeDip` int(11) NOT NULL,
  PRIMARY KEY (`refDemMob`),
  KEY `numEtudiant` (`numEtudiant`),
  KEY `codeDip` (`codeDip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandemobilites`
--

INSERT INTO `demandemobilites` (`refDemMob`, `dateDepotDemMob`, `etatDemMob`, `numEtudiant`, `codeDip`) VALUES
('00A-9R8-47D', '2018-04-12', 'en cours', 3, 5),
('98R-7QS-18Z', '2018-04-27', 'en cours', 5, 6),
('DS7-XC5-RE6', '2018-04-12', 'en cours', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `demandesfinancieres`
--

DROP TABLE IF EXISTS `demandesfinancieres`;
CREATE TABLE IF NOT EXISTS `demandesfinancieres` (
  `RefDemandeFin` varchar(11) NOT NULL,
  `DateDepotDemFin` date NOT NULL,
  `EtatDemFin` varchar(30) NOT NULL,
  `MontantAccorde` double NOT NULL,
  `idContrat` int(11) NOT NULL,
  PRIMARY KEY (`RefDemandeFin`),
  KEY `idContrat` (`idContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandesfinancieres`
--

INSERT INTO `demandesfinancieres` (`RefDemandeFin`, `DateDepotDemFin`, `EtatDemFin`, `MontantAccorde`, `idContrat`) VALUES
('007-5FD-9GF', '2018-02-19', 'terminé', 150000, 5),
('00A-9R8-47D', '2018-05-23', 'en cours', 650, 4),
('784-DF0-6Y8', '2018-04-29', 'en cours', 500000, 4),
('90N-V7B-I2O', '2018-04-13', 'en cours', 50000, 5),
('AZX-74K-6F5', '2018-04-04', 'terminé', 5000, 4),
('R1E-5PW-X4G', '2018-03-23', 'terminé', 75000, 5);

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

DROP TABLE IF EXISTS `diplomes`;
CREATE TABLE IF NOT EXISTS `diplomes` (
  `codeDip` int(11) NOT NULL AUTO_INCREMENT,
  `intituleDip` varchar(100) NOT NULL,
  `adresseWebD` varchar(255) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `nomU` varchar(100) NOT NULL,
  PRIMARY KEY (`codeDip`),
  KEY `nomU` (`nomU`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`codeDip`, `intituleDip`, `adresseWebD`, `niveau`, `nomU`) VALUES
(3, 'BTS SIO', 'http://ozenne.entmip.fr/les-formations/sections-de-techniciens-superieurs/bts-services-informatiques-aux-organisations/', 'Bac +2', 'Lycee Ozenne'),
(5, 'DUT RT', 'http://formations.univ-grenoble-alpes.fr/fr/catalogue/dut-diplome-universitaire-de-technologie-CB/sciences-technologies-sante-STS/dut-reseaux-et-telecommunications-program-dut-reseaux-et-telecommunications.html', 'Bac +2', 'Universite Grenobles Alpes'),
(6, 'LPRO RTAI', 'http://www.rtai.fr', 'Bac +3', 'Universite Toulouse 1 Capitole');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `numEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nomEt` varchar(50) NOT NULL,
  `prenomEt` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cv` varchar(150) NOT NULL,
  `codeDip` int(11) NOT NULL,
  PRIMARY KEY (`numEtudiant`),
  KEY `codeDip` (`codeDip`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`numEtudiant`, `nomEt`, `prenomEt`, `email`, `cv`, `codeDip`) VALUES
(3, 'Miniggio', 'Pierre', 'pierre.miniggio@gmail.com', 'http://miniggiodev.fr/docs/cv-Pierre-Miniggio.pdf', 5),
(4, 'Meziere', 'Benjamin', 'benjamin.meziere31@gmail.com', 'http://www.404cvnotfound.fr', 3),
(5, 'Ancien eleve', 'RTAI', 'rtai.rtai@rtai.rtai', 'http://www.rtai.fr', 6);

-- --------------------------------------------------------

--
-- Structure de la table `impliqueu`
--

DROP TABLE IF EXISTS `impliqueu`;
CREATE TABLE IF NOT EXISTS `impliqueu` (
  `nomU` varchar(100) NOT NULL,
  `intituleP` varchar(100) NOT NULL,
  PRIMARY KEY (`nomU`,`intituleP`),
  KEY `intituleP` (`intituleP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `progdiplome`
--

DROP TABLE IF EXISTS `progdiplome`;
CREATE TABLE IF NOT EXISTS `progdiplome` (
  `codeCours` int(11) NOT NULL,
  `codeDip` int(11) NOT NULL,
  PRIMARY KEY (`codeCours`,`codeDip`),
  KEY `codeDip` (`codeDip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `progdiplome`
--

INSERT INTO `progdiplome` (`codeCours`, `codeDip`) VALUES
(4, 3),
(3, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `programmes`
--

DROP TABLE IF EXISTS `programmes`;
CREATE TABLE IF NOT EXISTS `programmes` (
  `intituleP` varchar(100) NOT NULL,
  `explication` varchar(200) NOT NULL,
  PRIMARY KEY (`intituleP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programmes`
--

INSERT INTO `programmes` (`intituleP`, `explication`) VALUES
('Programme1', 'Je suis un programme'),
('Programme2', 'Je suis un deuxieme programme');

-- --------------------------------------------------------

--
-- Structure de la table `universites`
--

DROP TABLE IF EXISTS `universites`;
CREATE TABLE IF NOT EXISTS `universites` (
  `nomU` varchar(100) NOT NULL,
  `adressePostaleU` varchar(200) NOT NULL,
  `adresseWebU` varchar(255) NOT NULL,
  `adresseElectU` varchar(150) NOT NULL,
  PRIMARY KEY (`nomU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `universites`
--

INSERT INTO `universites` (`nomU`, `adressePostaleU`, `adresseWebU`, `adresseElectU`) VALUES
('Lycee Ozenne', '9 Rue Merly 31000 Toulouse', 'http://ozenne.entmip.fr', 'contact@ozenne.entmip.fr'),
('Universite Grenobles Alpes', '621 Avenue Centrale 38400 Saint-Martin-d-Heres', 'https://www.univ-grenoble-alpes.fr', 'contact@univ-grenoble-alpes.fr'),
('Universite Toulouse 1 Capitole', '2 Rue du Doyen-Gabriel-Marty 31042 Toulouse Cedex 9', 'http://www.ut-capitole.fr', 'contact@ut-capitole.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compatible`
--
ALTER TABLE `compatible`
  ADD CONSTRAINT `compatible_ibfk_1` FOREIGN KEY (`codeCours1`) REFERENCES `cours` (`CodeCours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compatible_ibfk_2` FOREIGN KEY (`codeCours2`) REFERENCES `cours` (`CodeCours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `composercontrat`
--
ALTER TABLE `composercontrat`
  ADD CONSTRAINT `composercontrat_ibfk_1` FOREIGN KEY (`idContrat`) REFERENCES `contrats` (`idContrat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composercontrat_ibfk_2` FOREIGN KEY (`codeCours`) REFERENCES `cours` (`CodeCours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`codeDip`) REFERENCES `diplomes` (`codeDip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrats_ibfk_2` FOREIGN KEY (`intituleP`) REFERENCES `programmes` (`intituleP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrats_ibfk_3` FOREIGN KEY (`refDemMob`) REFERENCES `demandemobilites` (`refDemMob`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demandemobilites`
--
ALTER TABLE `demandemobilites`
  ADD CONSTRAINT `demandemobilites_ibfk_1` FOREIGN KEY (`numEtudiant`) REFERENCES `etudiants` (`numEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandemobilites_ibfk_2` FOREIGN KEY (`codeDip`) REFERENCES `diplomes` (`codeDip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demandesfinancieres`
--
ALTER TABLE `demandesfinancieres`
  ADD CONSTRAINT `demandesfinancieres_ibfk_1` FOREIGN KEY (`idContrat`) REFERENCES `contrats` (`idContrat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD CONSTRAINT `diplomes_ibfk_1` FOREIGN KEY (`nomU`) REFERENCES `universites` (`nomU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`codeDip`) REFERENCES `diplomes` (`codeDip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `impliqueu`
--
ALTER TABLE `impliqueu`
  ADD CONSTRAINT `impliqueu_ibfk_1` FOREIGN KEY (`nomU`) REFERENCES `universites` (`nomU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `impliqueu_ibfk_2` FOREIGN KEY (`intituleP`) REFERENCES `programmes` (`intituleP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `progdiplome`
--
ALTER TABLE `progdiplome`
  ADD CONSTRAINT `progdiplome_ibfk_1` FOREIGN KEY (`codeDip`) REFERENCES `diplomes` (`codeDip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progdiplome_ibfk_2` FOREIGN KEY (`codeCours`) REFERENCES `cours` (`CodeCours`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
