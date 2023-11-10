-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2023 at 12:43 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarea_2_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE `calificacion` (
  `cali_id` int NOT NULL,
  `cali_estrellas` int DEFAULT NULL,
  `cali_avg` float DEFAULT NULL,
  `lista_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int NOT NULL,
  `comentario_text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ingre_id` int NOT NULL,
  `ingre_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lista_comentarios`
--

CREATE TABLE `lista_comentarios` (
  `lista_id` int NOT NULL,
  `comentario_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lista_ingredientes`
--

CREATE TABLE `lista_ingredientes` (
  `lista_ing_id` int NOT NULL,
  `ingre_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platillo`
--

CREATE TABLE `platillo` (
  `platillo_id` int NOT NULL,
  `receta_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `receta_id` int NOT NULL,
  `receta_foto` blob,
  `receta_nombre` varchar(100) NOT NULL,
  `receta_instrucciones` varchar(1000) DEFAULT NULL,
  `receta_tiempo` float DEFAULT NULL,
  `receta_diabetico` tinyint(1) DEFAULT NULL,
  `receta_lactosa` tinyint(1) DEFAULT NULL,
  `receta_gluten` tinyint(1) DEFAULT NULL,
  `receta_vegan` tinyint(1) DEFAULT NULL,
  `receta_type` int NOT NULL,
  `comentario_id` int DEFAULT NULL,
  `lista_ing_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_num_almuerzos` int DEFAULT NULL,
  `users_login_date` date DEFAULT NULL,
  `users_login_hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `user_password`, `user_num_almuerzos`, `users_login_date`, `users_login_hour`) VALUES
(1, 'Nicolas Berenguela', 'nicolas@gmail.com', '$2y$12$3TIbkYWlULcOwUHdvSYSUeyII3/EOBIRnB9ZmZ1G05Grz3XNa2ex2', NULL, NULL, NULL),
(2, '360noscopemlgcod', 'flan@gmail.com', '$2y$12$omQ.jx5frKnp4jpk1bzHbuPys6ETz4M7vrNTxGusn3XqA9JFcgUTK', NULL, NULL, NULL),
(3, 'sadfasdfasdf', 'nicolas.berenguela@usm.cl', '$2y$12$wA0nRVSUVPSO3QeugCD5/.k9IaMMXLte5yblp420CRuCKBwwhGKUC', NULL, NULL, NULL),
(4, 'nico', 'nico@gmail.com', '$2y$12$8th9Lh48PLSzmahn6lxHFuK/1BaDYX5eJN3OLcwGOyAOcQulv2HRm', NULL, NULL, NULL),
(5, 'asdffdf', 'asdffd@gmail.com', '$2y$12$EtLC2vx3yyUQA/nQCF6c0eId5lWyGwGcDiX/mvInpqVHoZgqL6LKK', NULL, NULL, NULL),
(6, 'nico2', 'nico2@gmail.com', '$2y$12$GEN6nKfOPsSn0gjgWXMzDucbpe8b.Y6GzT8tahwcaS0kcmcSBBi9K', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_fav_food`
--

CREATE TABLE `users_fav_food` (
  `fav_id` int NOT NULL,
  `receta_id` int DEFAULT NULL,
  `cali_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`cali_id`),
  ADD KEY `lista_id` (`lista_id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ingre_id`);

--
-- Indexes for table `lista_comentarios`
--
ALTER TABLE `lista_comentarios`
  ADD PRIMARY KEY (`lista_id`),
  ADD KEY `comentario_id` (`comentario_id`);

--
-- Indexes for table `lista_ingredientes`
--
ALTER TABLE `lista_ingredientes`
  ADD PRIMARY KEY (`lista_ing_id`),
  ADD KEY `ingre_id` (`ingre_id`);

--
-- Indexes for table `platillo`
--
ALTER TABLE `platillo`
  ADD PRIMARY KEY (`platillo_id`),
  ADD KEY `receta_id` (`receta_id`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`receta_id`),
  ADD KEY `comentario_id` (`comentario_id`),
  ADD KEY `lista_ing_id` (`lista_ing_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_fav_food`
--
ALTER TABLE `users_fav_food`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `receta_id` (`receta_id`),
  ADD KEY `cali_id` (`cali_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `cali_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ingre_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lista_comentarios`
--
ALTER TABLE `lista_comentarios`
  MODIFY `lista_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lista_ingredientes`
--
ALTER TABLE `lista_ingredientes`
  MODIFY `lista_ing_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `platillo`
--
ALTER TABLE `platillo`
  MODIFY `platillo_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `receta_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_fav_food`
--
ALTER TABLE `users_fav_food`
  MODIFY `fav_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`lista_id`) REFERENCES `lista_comentarios` (`lista_id`);

--
-- Constraints for table `lista_comentarios`
--
ALTER TABLE `lista_comentarios`
  ADD CONSTRAINT `lista_comentarios_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios` (`comentario_id`);

--
-- Constraints for table `lista_ingredientes`
--
ALTER TABLE `lista_ingredientes`
  ADD CONSTRAINT `lista_ingredientes_ibfk_1` FOREIGN KEY (`ingre_id`) REFERENCES `ingredientes` (`ingre_id`);

--
-- Constraints for table `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`receta_id`) REFERENCES `recetas` (`receta_id`);

--
-- Constraints for table `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios` (`comentario_id`),
  ADD CONSTRAINT `recetas_ibfk_2` FOREIGN KEY (`lista_ing_id`) REFERENCES `lista_ingredientes` (`lista_ing_id`);

--
-- Constraints for table `users_fav_food`
--
ALTER TABLE `users_fav_food`
  ADD CONSTRAINT `users_fav_food_ibfk_1` FOREIGN KEY (`receta_id`) REFERENCES `recetas` (`receta_id`),
  ADD CONSTRAINT `users_fav_food_ibfk_2` FOREIGN KEY (`cali_id`) REFERENCES `calificacion` (`cali_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
