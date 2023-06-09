-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 04:20 AM
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
  `filename` varchar(255) NOT NULL,
  `userid` int(8) NOT NULL,
  `filesize` int(21) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `downloads` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `filename`, `userid`, `filesize`, `date_uploaded`, `downloads`) VALUES
(1, 'php.pdf', 35, 4158364, '2023-04-17 22:05:31', 0),
(2, 'folleto_ifc_2022_2023.pdf', 35, 3291966, '2023-04-17 22:05:36', 0),
(3, '427_E-REPRE.pdf', 35, 716161, '2023-04-17 22:05:42', 0),
(4, 'Pro PHP MVC.pdf', 35, 5147116, '2023-04-17 22:05:54', 0),
(5, 'Alan_Beaulieu-Learning_SQL-EN.pdf', 35, 1902996, '2023-04-17 22:06:04', 0),
(6, 'bashcookbook.pdf', 35, 7294420, '2023-04-18 02:14:53', 0),
(7, 'professionalgit.pdf', 35, 19522963, '2023-04-18 02:15:03', 0),
(8, 'sqlpocketguide3e.pdf', 35, 2903463, '2023-04-18 02:15:10', 0),
(9, 'IFCD0210.pdf', 35, 2532958, '2023-04-18 02:15:31', 0);

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
(31, 'carlotaperez', 'carlota@gmail.com', '654321987', '$2y$10$7G.lNu9n2p1Mts8Ve2TfFeqyoNL1MDrk5Kj2leU4vlG/Q/BK4UEQS', 1),
(35, 'auroramartin', 'aurora@gmail.com', '625484546', '$2y$10$LqXnLH/B3lPeM43bR6FeE.5pfm9ZFsQ5xUICb1.BSrb6T0fswQzMS', 1);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
