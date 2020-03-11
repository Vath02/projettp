-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 09 Mars 2020 à 08:50
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
CREATE DATABASE IF NOT EXISTS `vatminton-db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vatminton-db`;

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_categories`
--

CREATE TABLE `c19v12_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `c19v12_categories`
--

INSERT INTO `c19v12_categories` (`id`, `name`) VALUES
(1, 'raquette'),
(2, 'chaussures'),
(3, 'sac');

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_orders`
--

CREATE TABLE `c19v12_orders` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `orderDate` date NOT NULL,
  `deliveryDate` date NOT NULL,
  `id_c19v12_order_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_order_items`
--

CREATE TABLE `c19v12_order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_c19v12_products` int(11) NOT NULL,
  `id_c19v12_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_products`
--

CREATE TABLE `c19v12_products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `reference` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `picture` varchar(150) DEFAULT NULL,
  `id_c19v12_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `c19v12_products`
--

INSERT INTO `c19v12_products` (`id`, `name`, `reference`, `price`, `picture`, `id_c19v12_categories`) VALUES
(1, 'babolat xtreme', 'RAQ001', '229.00', '', 1),
(2, 'Yonex', 'SHOES001', '90.00', '', 2),
(3, 'Yonex premium black Shoes', 'SHOES003', '89.00', '', 2),
(4, 'Babolat Sport', 'SAC001', '49.00', '', 3),
(5, 'babolat grip xtreme', 'SHOES004', '119.00', '', 2),
(6, 'Yonex big sac', 'SAC002', '79.00', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_roles`
--

CREATE TABLE `c19v12_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `c19v12_roles`
--

INSERT INTO `c19v12_roles` (`id`, `name`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'fournisseur');

-- --------------------------------------------------------

--
-- Structure de la table `c19v12_suppliers`
--

CREATE TABLE `c19v12_suppliers` (
  `id` int(11) NOT NULL,
  `siret` int(11) NOT NULL,
  `society` varchar(150) NOT NULL,
  `website` varchar(150) DEFAULT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_c19v12_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `c19v12_suppliers`
--

INSERT INTO `c19v12_suppliers` (`id`, `siret`, `society`, `website`, `mail`, `password`, `id_c19v12_roles`) VALUES
(2, 123456789, 'vatou', 'pasdesite.com', 'vatc1@msn.com', '$2y$10$pipEIcJ7CIUfDKpgWX.zquSVqsltnlE2xW8lBdiekuEJb3RyhdQMK', 3),
(3, 987654321, 'tonton Maclou', 'Gunsite.com', 'tontonmaclou@free.fr', '$2y$10$bjBW7oESjeQiHHn6NyjOLOfLROAvz2vxwSAM8WlEA3N/KdzF9.rJ2', 3);

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
(1984, 'Guy', 'Louis', '1978-01-01', '1 rue des postes, 02100 SOISSONS', '0678765434', 'guy.louis@free.fr', '$2y$10$F4lIXcikIDdtgqOx5oXaEuKZtFtgjqb3z8U41SV0qXyw0wlkYEbm.', 2),
(1985, 'adam', 'veronique', '1982-03-01', '40 rue de la terre galice, 60153 RETHONDES', '0600000000', 'veronique.adam@free.fr', '$2y$10$t82FLxjML23haZxuYAmr.uRTe9f3PEjB9gUWvh88SKuuVq9sGRkze', 2);

-- --------------------------------------------------------

--
-- Structure de la table `suppliersProducts`
--

CREATE TABLE `suppliersProducts` (
  `id` int(11) NOT NULL,
  `id_c19v12_suppliers` int(11) NOT NULL,
  `id_c19v12_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `c19v12_categories`
--
ALTER TABLE `c19v12_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `c19v12_orders`
--
ALTER TABLE `c19v12_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_orders_c19v12_order_items_FK` (`id_c19v12_order_items`);

--
-- Index pour la table `c19v12_order_items`
--
ALTER TABLE `c19v12_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_order_items_c19v12_products_FK` (`id_c19v12_products`),
  ADD KEY `c19v12_order_items_c19v12_users0_FK` (`id_c19v12_users`);

--
-- Index pour la table `c19v12_products`
--
ALTER TABLE `c19v12_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_products_c19v12_categories_FK` (`id_c19v12_categories`);

--
-- Index pour la table `c19v12_roles`
--
ALTER TABLE `c19v12_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `c19v12_suppliers`
--
ALTER TABLE `c19v12_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_suppliers_c19v12_roles_FK` (`id_c19v12_roles`);

--
-- Index pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c19v12_users_c19v12_roles_FK` (`id_c19v12_roles`);

--
-- Index pour la table `suppliersProducts`
--
ALTER TABLE `suppliersProducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliersProducts_c19v12_suppliers_FK` (`id_c19v12_suppliers`),
  ADD KEY `suppliersProducts_c19v12_products0_FK` (`id_c19v12_products`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `c19v12_categories`
--
ALTER TABLE `c19v12_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `c19v12_orders`
--
ALTER TABLE `c19v12_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `c19v12_order_items`
--
ALTER TABLE `c19v12_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `c19v12_products`
--
ALTER TABLE `c19v12_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `c19v12_roles`
--
ALTER TABLE `c19v12_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `c19v12_suppliers`
--
ALTER TABLE `c19v12_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1986;
--
-- AUTO_INCREMENT pour la table `suppliersProducts`
--
ALTER TABLE `suppliersProducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `c19v12_orders`
--
ALTER TABLE `c19v12_orders`
  ADD CONSTRAINT `c19v12_orders_c19v12_order_items_FK` FOREIGN KEY (`id_c19v12_order_items`) REFERENCES `c19v12_order_items` (`id`);

--
-- Contraintes pour la table `c19v12_order_items`
--
ALTER TABLE `c19v12_order_items`
  ADD CONSTRAINT `c19v12_order_items_c19v12_products_FK` FOREIGN KEY (`id_c19v12_products`) REFERENCES `c19v12_products` (`id`),
  ADD CONSTRAINT `c19v12_order_items_c19v12_users0_FK` FOREIGN KEY (`id_c19v12_users`) REFERENCES `c19v12_users` (`id`);

--
-- Contraintes pour la table `c19v12_products`
--
ALTER TABLE `c19v12_products`
  ADD CONSTRAINT `c19v12_products_c19v12_categories_FK` FOREIGN KEY (`id_c19v12_categories`) REFERENCES `c19v12_categories` (`id`);

--
-- Contraintes pour la table `c19v12_suppliers`
--
ALTER TABLE `c19v12_suppliers`
  ADD CONSTRAINT `c19v12_suppliers_c19v12_roles_FK` FOREIGN KEY (`id_c19v12_roles`) REFERENCES `c19v12_roles` (`id`);

--
-- Contraintes pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  ADD CONSTRAINT `c19v12_users_c19v12_roles_FK` FOREIGN KEY (`id_c19v12_roles`) REFERENCES `c19v12_roles` (`id`);

--
-- Contraintes pour la table `suppliersProducts`
--
ALTER TABLE `suppliersProducts`
  ADD CONSTRAINT `suppliersProducts_c19v12_products0_FK` FOREIGN KEY (`id_c19v12_products`) REFERENCES `c19v12_products` (`id`),
  ADD CONSTRAINT `suppliersProducts_c19v12_suppliers_FK` FOREIGN KEY (`id_c19v12_suppliers`) REFERENCES `c19v12_suppliers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
