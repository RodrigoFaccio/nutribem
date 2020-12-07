-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2020 at 08:36 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutribem`
--

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `produto` varchar(50) NOT NULL,
  `id_vendedor` varchar(50) NOT NULL,
  `quantidade` varchar(100) NOT NULL,
  `valor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `produto`, `id_vendedor`, `quantidade`, `valor`, `estado`, `obs`) VALUES
(48, '15', '6', '3', '75', 'finalizado', 'qualquer coisa ');

-- --------------------------------------------------------

--
-- Table structure for table `produtoss`
--

CREATE TABLE `produtoss` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco_revendedor` varchar(50) NOT NULL,
  `preco_distribuidor` varchar(50) NOT NULL,
  `categoria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `composicao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `indicacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produtoss`
--

INSERT INTO `produtoss` (`id`, `nome`, `preco_revendedor`, `preco_distribuidor`, `categoria`, `composicao`, `indicacao`) VALUES
(15, 'Ração para gado', '50', '25', 'bovino', 'sodio', 'comer'),
(16, 'Ração suina', '78', '70', 'suino', 'sodio', 'comer');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `contratante` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `a` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `contratante`, `email`, `senha`, `nome`, `endereco`, `cpf`, `telefone`, `a`) VALUES
(6, 'distribuidor', 'adm@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Rodrigo Facioooo', '(35) 9976-0607', 'sapucai-mirim', '044.252.756-07', 1),
(7, 'distribuidor', 'rodrigo1612fm@gmasil.com', '4bab4706be377dc54b635b8385185761', 'dasdas', 'sapucai-mirim', '044.257.560-8', '35997460608', 0),
(8, 'revendedor', 'admrevendedor@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Rodrigo facio revendedor', 'sapucai-mirim', '103.411.316-01', '35997460608', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtoss`
--
ALTER TABLE `produtoss`
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
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `produtoss`
--
ALTER TABLE `produtoss`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
