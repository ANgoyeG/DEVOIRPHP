-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 mai 2024 à 23:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comptebancaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `numero_telephone` varchar(20) DEFAULT NULL,
  `role` varchar(11) NOT NULL DEFAULT '',
  `passwd` varchar(8) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `clients`:
--

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `prenom`, `nom`, `adresse`, `numero_telephone`, `role`, `passwd`, `email`) VALUES
(1, 'Adja', 'GUISSE', 'Scat Urbam', '77334421', 'client', '102', 'guise@gmail.com'),
(2, 'Abdoy', 'Wilane', 'Scat Urbam', '77334422', 'client', '20', 'kilyan@gmail.com'),
(3, 'Papi', 'GUISSE', 'SCAT URBAM', '77334427', 'client', '30', 'trendressa@gmail.com'),
(4, 'Abdou', 'Wilane', 'SCAT URBAM', '77334422', 'client', '40', 'mouhamad@gmail.com'),
(5, 'Mohamad', 'Kambel', 'SACRE COEUR', '773344124', 'client', '50', 'risouv@gmail.com'),
(6, 'RAMA', 'DIOP', 'SACRE COEUR', '773344127', 'client', '600', 'pouye@gmail.com'),
(7, 'Aminata D', 'Dabo', 'Liberte\"', '779498690', 'client', '70', 'gouy@gmail.com'),
(8, 'RAMA', 'TALL', 'ERGRTWE', '773344127', 'client', '80', 'balla@gmail.com'),
(9, 'BALLA', 'BEYE', 'OIUYTREDG', '773344129', 'client', '90', 'seckE@gmail.com'),
(10, 'HINATA', 'ORASHIMA', 'KONOA', '779498698', 'client', '42', 'faty@gmail.com'),
(11, 'marietou', 'SAGNA', 'LIBERTE5', '778905663', 'client', '32', 'matas@gmail.com'),
(12, 'Moussa', 'BEN', 'SCAT URBAM', '773364121', 'client', '21', 'namis@gmail.com'),
(78, 'AMINATA', 'DABO', 'Sicp', '778785008', '', '', ''),
(90, 'baba', 'diagne', '58tjt', '778905437', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `comptes_bancaires`
--

CREATE TABLE `comptes_bancaires` (
  `numero_compte` varchar(20) NOT NULL,
  `solde_initial` decimal(10,2) DEFAULT NULL,
  `proprietaire_id` int(11) NOT NULL,
  `solde` decimal(10,2) DEFAULT NULL,
  `id_operation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `comptes_bancaires`:
--

--
-- Déchargement des données de la table `comptes_bancaires`
--

INSERT INTO `comptes_bancaires` (`numero_compte`, `solde_initial`, `proprietaire_id`, `solde`, `id_operation`) VALUES
('005', NULL, 90, 4000.00, 0),
('08976543207', 20900.00, 7, NULL, 0),
('1', 23500000.00, 1, NULL, 0),
('2', 45000000.00, 2, NULL, 0),
('20', 8765432.00, 8, NULL, 0),
('3', 50000.00, 3, NULL, 0),
('4', 43000000.00, 4, NULL, 0),
('5', 2000000.00, 5, NULL, 0),
('56', 2000000.00, 10, NULL, 0),
('6', 2000000.00, 6, NULL, 0),
('67', 200.00, 2, NULL, 0),
('675849', 200475.00, 12, NULL, 0),
('89', 90000.00, 78, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `employés`
--

CREATE TABLE `employés` (
  `id` int(11) NOT NULL,
  `nom_employer` varchar(30) NOT NULL,
  `prenom_employer` varchar(30) NOT NULL,
  `adresse_client` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `employés`:
--

--
-- Déchargement des données de la table `employés`
--

INSERT INTO `employés` (`id`, `nom_employer`, `prenom_employer`, `adresse_client`, `passwd`, `role`, `email`) VALUES
(233, 'DABO', 'Aminata', 'sacre coeur', '220251IAM', 'admin', 'dabs1404@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id_operation` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  `type_operation` varchar(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_operation` date NOT NULL,
  `numero_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONS POUR LA TABLE `operations`:
--

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id_operation`, `compte_id`, `type_operation`, `montant`, `date_operation`, `numero_compte`) VALUES
(0, 0, 'retrait', 0, '0000-00-00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comptes_bancaires`
--
ALTER TABLE `comptes_bancaires`
  ADD PRIMARY KEY (`numero_compte`),
  ADD KEY `id_operation` (`id_operation`);

--
-- Index pour la table `employés`
--
ALTER TABLE `employés`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id_operation`),
  ADD KEY `numero_compte` (`numero_compte`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `employés`
--
ALTER TABLE `employés`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
