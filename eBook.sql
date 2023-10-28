-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 21 oct. 2023 à 18:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eBook`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idChercheur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `dateDebut`, `dateFin`, `idChercheur`) VALUES
(1, '2023-10-16', '2023-10-29', 4);

-- --------------------------------------------------------

--
-- Structure de la table `chercheurs`
--

CREATE TABLE `chercheurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chercheurs`
--

INSERT INTO `chercheurs` (`id`, `nom`, `postnom`, `prenom`, `sexe`) VALUES
(4, 'Byemba', 'Kayembe', 'Josué', 'M'),
(5, 'diogène', 'mbilizi', 'albert', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`) VALUES
(4, '4562/17-18'),
(5, '4562/17-18');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `id` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idPromotion` int(11) NOT NULL,
  `anneeAcademique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id` int(11) NOT NULL,
  `intitule` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `dateDepot` date NOT NULL DEFAULT current_timestamp(),
  `mignature` varchar(50) NOT NULL,
  `url_github` varchar(50) NOT NULL,
  `piecejointe` varchar(50) NOT NULL,
  `nbVue` int(11) NOT NULL DEFAULT 0,
  `statut` enum('Département','Bibliothèque') NOT NULL DEFAULT 'Département',
  `idEtudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `travaux`
--

INSERT INTO `travaux` (`id`, `intitule`, `description`, `dateDepot`, `mignature`, `url_github`, `piecejointe`, `nbVue`, `statut`, `idEtudiant`) VALUES
(5, 'analyse de credit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat doloribus minus harum omnis totam laudantium amet tempore officia. Illum facere obcaecati minus atque similique? Consequuntur sequi suscipit reprehenderit laudantium corporis officiis dolorum necessitatibus, qui blanditiis at magni veritatis perferendis, ducimus itaque molestias assumenda tempora molestiae explicabo, eaque tempore ipsam repellendus.', '2023-10-20', 'armoiries RDC.png', 'https://github.com/NSocrate/ankh-web-design.git', 'attestation de scolarité.pdf', 4, 'Bibliothèque', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fonction` enum('Chercheur','Etudiant','Sec Dep','Bibliothècaire') NOT NULL DEFAULT 'Chercheur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fonction`) VALUES
(1, 'rolande', 'katulanya', 'Sec Dep'),
(3, 'badosagne', 'jean de dieu', 'Chercheur'),
(4, 'byemba', 'byemba', 'Etudiant'),
(5, 'dioli', 'diogène', 'Chercheur'),
(6, 'eliane', 'ziruka', 'Bibliothècaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnements` (`idChercheur`);

--
-- Index pour la table `chercheurs`
--
ALTER TABLE `chercheurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`,`matricule`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEtudiant` (`idEtudiant`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdEtudiant` (`idEtudiant`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chercheurs`
--
ALTER TABLE `chercheurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `posseder`
--
ALTER TABLE `posseder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements` FOREIGN KEY (`idChercheur`) REFERENCES `chercheurs` (`id`);

--
-- Contraintes pour la table `chercheurs`
--
ALTER TABLE `chercheurs`
  ADD CONSTRAINT `chercheurs` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants` FOREIGN KEY (`id`) REFERENCES `chercheurs` (`id`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `posseder` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiants` (`id`),
  ADD CONSTRAINT `posseder_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD CONSTRAINT `travaux_ibfk_1` FOREIGN KEY (`IdEtudiant`) REFERENCES `etudiants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
