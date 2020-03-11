-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 06 Mars 2020 à 16:02
-- Version du serveur :  10.1.41-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vatminton-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_users`
--

CREATE TABLE `c19v12_users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_c19v12_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `c19v12_users`
--

INSERT INTO `c19v12_users` (`id`, `lastname`, `firstname`, `birthdate`, `address`, `phone`, `mail`, `password`, `id_c19v12_roles`) VALUES
(1983, 'CHIV', 'Vathana', '1981-12-19', '23 cité de la glacerie, 02300 SINCENY', '0683863427', 'vathana.chiv@gmail.com', '$2y$10$59Z5VR.opS5LO/Tl9unSuuuVDTYufdrBhVMeawGXbh19Pn4TviWk2', 1),
(1984, 'Guy', 'Louis', '1978-01-01', '1 rue des postes, 02100 SOISSONS', '0678765434', 'guy.louis@free.fr', '$2y$10$F4lIXcikIDdtgqOx5oXaEuKZtFtgjqb3z8U41SV0qXyw0wlkYEbm.', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_users_c19v12_roles_FK` (`id_c19v12_roles`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1985;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  ADD CONSTRAINT `c19v12_users_c19v12_roles_FK` FOREIGN KEY (`id_c19v12_roles`) REFERENCES `c19v12_roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
