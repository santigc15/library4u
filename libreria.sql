-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 04:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(5) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `userid` int(8) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `genero`, `userid`, `fecha_subida`) VALUES
(1, 'la rosa amarilla', 'novela', 10, '2023-04-02 01:57:11'),
(2, 'el resplandor', 'novela', 13, '2023-04-02 01:57:49'),
(3, 'php para primerizos', 'programacion', 13, '2023-04-02 01:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `telefono`, `password`, `perfil`) VALUES
(16, 'pablogarcia', 'pablo@gmail.com', '635252628', '$2y$10$tvPqwxs3.DCXr0IkLoCDbOR9Rt.il4WqiyXYWk03wMXFH7HPY.Odi', 1),
(17, 'martacortazar', 'marta@gmail.com', '656894712', '$2y$10$bjc7xnQQea9iAwZKnCHwzOz8JmmurvQRZVekMWu8GDgjfGMR9bJv2', 1),
(18, 'Lorenagomez', 'lorena@gmail.com', '626585652', '$2y$10$biT6gzPD0Rf5WznBtGNodeEYzQFUv.pTxhf3.ilOCypUUs5NArxdO', 1),
(19, 'Claudiagamez', 'claudia@gmail.com', '686123478', '$2y$10$p55JQr0l3UYYn8lmBqavjO572.OdgfKDBarG06yPh6bFHR0YU9l5O', 1),
(20, 'auroramartin', 'aurora@gmail.com', '625236325', '$2y$10$IzqxJM4EBWAKeVpOerY79O7cSEczkcUQ6lvk99qNJ146.HEEqqUx2', 1),
(31, 'carlotaperez', 'carlota@gmail.com', '654321987', '$2y$10$X4DNKKTTZpTel23MdWwvMe/2vh/nooMtQ4nxghWnQDiR4bXzbXIMe', 1),
(32, 'gabriela21', 'gabriela@gmail.com', '628986532', '$2y$10$Dk0bpU88xq5jdCTVOkG8fOxU/q/8EqiwUvmQbIPVtidJf74yE2.K6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
