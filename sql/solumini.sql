-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/07/2023 às 06:09
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `solumini`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `category_id`, `city`, `state`, `description`, `address`, `created`, `modified`) VALUES
(8, 'Pizzaria Central', 1, 'Botucatu', 'SP', 'As melhores pizzas estão aqui', 'Rua Amando de Barros 000', NULL, NULL),
(9, 'Lanches Do Grau', 1, 'Santo André', 'SP', 'Venha experimentar', 'Rua do centro 995', NULL, NULL),
(10, 'Sistemas IT', 2, 'Botucatu', 'SP', 'Solucionando os seus problemas', 'Rua Curuzu 154', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `company_categories`
--

CREATE TABLE `company_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `company_categories`
--

INSERT INTO `company_categories` (`id`, `name`, `created`) VALUES
(1, 'Alimentação', NULL),
(2, 'Serviços', NULL),
(3, 'Comércio', NULL),
(4, 'Saúde', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `company_phones`
--

CREATE TABLE `company_phones` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `company_phones`
--

INSERT INTO `company_phones` (`id`, `company_id`, `number`, `is_main`, `created`) VALUES
(9, 8, '1438840000', NULL, NULL),
(10, 9, '1195985988', NULL, NULL),
(11, 10, '14959586489', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `company_owner` varchar(250) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `seller_name` varchar(250) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contracts`
--

INSERT INTO `contracts` (`id`, `company_owner`, `company_id`, `seller_name`, `expire_date`, `created`) VALUES
(10, 'Matheus Peres', 9, 'Henrique Abreu', '2026-06-09', NULL),
(11, 'Francisco Toledo', 10, 'Marcela Dias', '2022-12-11', NULL),
(12, 'José Fernandes', 8, 'Maicon Silva', '2024-01-12', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Matheus', 'admin@admin.com', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_companies_1_idx` (`category_id`);

--
-- Índices de tabela `company_categories`
--
ALTER TABLE `company_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `company_phones`
--
ALTER TABLE `company_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_phones_1_idx` (`company_id`);

--
-- Índices de tabela `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contracts_1_idx` (`company_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `company_categories`
--
ALTER TABLE `company_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `company_phones`
--
ALTER TABLE `company_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_companies_1` FOREIGN KEY (`category_id`) REFERENCES `company_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `company_phones`
--
ALTER TABLE `company_phones`
  ADD CONSTRAINT `fk_company_phones_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_contracts_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
