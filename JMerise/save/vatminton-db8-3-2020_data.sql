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

INSERT INTO `c19v12_categories` (`id`, `name`) VALUES
(1, 'raquette'),
(2, 'chaussures'),
(3, 'sac');

INSERT INTO `c19v12_products` (`id`, `name`, `reference`, `price`, `picture`, `id_c19v12_categories`) VALUES
(1, 'babolat xtreme', 'RAQ001', '229.00', '', 1),
(2, 'Yonex', 'SHOES001', '90.00', '', 2),
(3, 'Yonex premium black Shoes', 'SHOES003', '89.00', '', 2),
(4, 'Babolat Sport', 'SAC001', '49.00', '', 3),
(5, 'babolat grip xtreme', 'SHOES004', '119.00', '', 2),
(6, 'Yonex big sac', 'SAC002', '79.00', '', 3);

INSERT INTO `c19v12_roles` (`id`, `name`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'fournisseur');

INSERT INTO `c19v12_suppliers` (`id`, `siret`, `society`, `website`, `mail`, `password`, `id_c19v12_roles`) VALUES
(1, 123456789, 'vatou', 'pasdesite.com', 'vatc1@msn.com', '$2y$10$pipEIcJ7CIUfDKpgWX.zquSVqsltnlE2xW8lBdiekuEJb3RyhdQMK', 3),
(2, 987654321, 'tonton Maclou', 'Gunsite.com', 'tontonmaclou@free.fr', '$2y$10$bjBW7oESjeQiHHn6NyjOLOfLROAvz2vxwSAM8WlEA3N/KdzF9.rJ2', 3);

INSERT INTO `c19v12_users` (`id`, `lastname`, `firstname`, `birthdate`, `address`, `phone`, `mail`, `password`, `id_c19v12_roles`) VALUES
(1983, 'CHIV', 'Vathana', '1981-12-19', '23 cité de la glacerie, 02300 SINCENY', '0683863427', 'vathana.chiv@gmail.com', '$2y$10$59Z5VR.opS5LO/Tl9unSuuuVDTYufdrBhVMeawGXbh19Pn4TviWk2', 1),
(1984, 'Guy', 'Louis', '1978-01-01', '1 rue des postes, 02100 SOISSONS', '0678765434', 'guy.louis@free.fr', '$2y$10$F4lIXcikIDdtgqOx5oXaEuKZtFtgjqb3z8U41SV0qXyw0wlkYEbm.', 2),
(1985, 'adam', 'veronique', '1982-03-01', '40 rue de la terre galice, 60153 RETHONDES', '0600000000', 'veronique.adam@free.fr', '$2y$10$t82FLxjML23haZxuYAmr.uRTe9f3PEjB9gUWvh88SKuuVq9sGRkze', 2);

--
-- AUTO_INCREMENT pour la table `c19v12_categories`
--
ALTER TABLE `c19v12_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `c19v12_users`
--
ALTER TABLE `c19v12_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1986;
