-- Create Database if not exist
CREATE DATABASE IF NOT EXISTS `coffeeshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `coffeeshop`;

-- 1. Table users
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(20) NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- user data
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'Amba', '$2y$10$49oh3mjims0pbYhAAnc9d.faTW7LnK2wCkBqF1gBazep3TItq.Tjy', 'Admin'),
(2, 'Rusdi', '$2y$10$hMoR9ayJyXth1b5k2J/0Fum9RaCx1QkuNPedyr.upib9LK/C.eJN6', 'Member'),
(3, 'Aku', '$2y$10$JWU5yur0i6pD9qQ1iQckqekz5o3IdVhlhnel36qYcY3a0BqgLkAm6', 'Member'),
(4, 'Kamu', '$2y$10$ogD1WDvGIR5XSzz91Dlq5uk/wABDZltPGRnrstdUQ0aUTDzM1siaq', 'Member'),
(5, 'admin', '$2y$10$bcXWCrFtZp0szdFSuJM24.N3zDR6WCdUTJxTrMll.BwRbNwtAB1Qe', 'Admin');


-- 2. Table product
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `url_image` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping sample coffee products
INSERT INTO `product` (`id`, `name`, `price`, `url_image`) VALUES
(1, 'Espresso', 20000.00, 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=500&auto=format&fit=crop&q=60'),
(2, 'Caffe Latte', 30000.00, 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?w=500&auto=format&fit=crop&q=60'),
(3, 'Cappuccino', 28000.00, 'https://images.unsplash.com/photo-1534778101976-62847782c213?w=500&auto=format&fit=crop&q=60'),
(4, 'Americano', 25000.00, 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=500&auto=format&fit=crop&q=60'),
(5, 'Caramel Macchiato', 35000.00, 'https://images.unsplash.com/photo-1485808191679-5f86510681a2?w=500&auto=format&fit=crop&q=60');
