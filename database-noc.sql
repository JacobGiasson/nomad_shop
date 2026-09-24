-- ==========================================================
-- NOMAD Shop - Script d'import pour l'hebergeur NOC
-- Jacob Giasson - TP1 Programmation Web avancee
--
-- Version sans CREATE DATABASE / USE
-- depuis le panneau NOC (yvsxyjpqpr_nomadshop) et
-- selectionnee dans phpMyAdmin avant l'import.
-- ==========================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- ----------------------------------------------------------
-- Table client : les personnes qui achetent
-- Aucune cle etrangere, c'est elle qui se fait pointer
-- ----------------------------------------------------------
CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `client` (`id`, `name`, `email`, `phone`, `address`, `city`, `zip_code`) VALUES
(2, 'Nathan', 'nat@icloud.com', '438-438-4438', '136 Avenue des Plaines', 'Montréal', 'JK8OP2'),
(3, 'Mathiew', 'mat@outlook.com', '450-658-4432', '5560 Rue Des Avenirs', 'Repentigny', 'J8E9K2'),
(4, 'Jacob Giasson', 'natjeo550@gmail.com', '450-666-6666', '24 Rue Des Prairies', 'Lavaltrie', 'JK78FG');

-- ----------------------------------------------------------
-- Table product : le catalogue
-- ----------------------------------------------------------
CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`) VALUES
(1, 'SafeSip', 'Purifier bottle', 99.00, 55),
(3, 'Cozy', 'Cozy for the SafeSip Purifier', 28.00, 150);

-- ----------------------------------------------------------
-- Table orders : les commandes
-- Relation un-a-plusieurs : un client a plusieurs commandes
-- ----------------------------------------------------------
CREATE TABLE `orders` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `order_date` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `client_id`, `order_date`, `total`) VALUES
(2, 3, '2026-09-23', 226.00),
(3, 2, '2026-09-24', 28.00);

-- ----------------------------------------------------------
-- Table order_product : table de jonction
-- Relation plusieurs-a-plusieurs entre orders et product
-- unit_price fige le prix paye au moment de l'achat
-- ----------------------------------------------------------
CREATE TABLE `order_product` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 2, 1, 2, 99.00),
(2, 2, 3, 1, 28.00),
(3, 3, 3, 1, 28.00);

-- ----------------------------------------------------------
-- Cles primaires et index
-- ----------------------------------------------------------
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_client` (`client_id`);

ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_op_order` (`order_id`),
  ADD KEY `fk_op_product` (`product_id`);

-- ----------------------------------------------------------
-- Auto-increment
-- ----------------------------------------------------------
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `order_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- ----------------------------------------------------------
-- Cles etrangeres
-- Ajoutees en dernier : toutes les tables et donnees existent deja
-- ----------------------------------------------------------
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_op_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_op_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

COMMIT;