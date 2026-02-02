-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Fev-2026 às 11:20
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao_financeira_rural`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `descricao`, `valor`, `data`, `criado_em`) VALUES
(2, 'vinho', '0.51', '2026-02-02', '2026-02-01 10:47:23'),
(3, 'Sumol', '300.00', '2026-02-02', '2026-02-02 10:16:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `fluxo_caixa`
--
CREATE TABLE `fluxo_caixa` (
`total_receitas` decimal(32,2)
,`total_despesas` decimal(32,2)
,`total_investimentos` decimal(32,2)
,`saldo_final` decimal(34,2)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `investimentos`
--

CREATE TABLE `investimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `investimentos`
--

INSERT INTO `investimentos` (`id`, `descricao`, `valor`, `data`, `criado_em`) VALUES
(2, 'vinho', '0.01', '2026-02-02', '2026-02-01 11:15:46'),
(3, 'Sumol', '20000.00', '2026-02-02', '2026-02-02 10:17:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `descricao`, `valor`, `data`, `criado_em`) VALUES
(2, 'vinho', '2000.01', '2026-01-31', '2026-01-31 19:39:47'),
(3, 'vinho', '200.00', '2026-01-31', '2026-01-31 20:07:06'),
(4, 'Gasosa', '0.06', '2026-02-02', '2026-02-01 10:00:52'),
(5, 'Sumol', '300.00', '2026-02-04', '2026-02-02 10:15:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(3, 'jaco', '$2y$10$bnmvlalr5nrK0E4uoWnsp.1QEg6UcOl9gVjGCpDkMDJJPCC7SJacC'),
(4, 'virginia', '$2y$10$9J7ha4/ZQcwAZa/acmGrkOpa6MQc05b5nReniVN3o9GhN95O1jWrG');

-- --------------------------------------------------------

--
-- Structure for view `fluxo_caixa`
--
DROP TABLE IF EXISTS `fluxo_caixa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fluxo_caixa`  AS  select (select ifnull(sum(`receitas`.`valor`),0) from `receitas`) AS `total_receitas`,(select ifnull(sum(`despesas`.`valor`),0) from `despesas`) AS `total_despesas`,(select ifnull(sum(`investimentos`.`valor`),0) from `investimentos`) AS `total_investimentos`,((select ifnull(sum(`receitas`.`valor`),0) from `receitas`) - ((select ifnull(sum(`despesas`.`valor`),0) from `despesas`) + (select ifnull(sum(`investimentos`.`valor`),0) from `investimentos`))) AS `saldo_final` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investimentos`
--
ALTER TABLE `investimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `investimentos`
--
ALTER TABLE `investimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
