SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `nomad_shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nomad_shop`;

CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `order_date` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `order_product` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_client` (`client_id`);

ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_op_order` (`order_id`),
  ADD KEY `fk_op_product` (`product_id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `order_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_op_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_op_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;
